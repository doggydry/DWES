<?php
namespace App\classes;
require_once dirname(__DIR__, 2).'/helper.php';


use App\DB\ConexionBD;
use PDO;

class Autenticarse
{
    //* Solamente llama a la funcion iniciar sesion para iniciarla
    public static function inicializar()
    {
        return iniciar_sesion();
    }

    //* Crea la tabla de usuarios
    public static function configurar()
    {
        $conexion = ConexionBD::getConexion();

        $query = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT AUTO_INCREMENT PRIMARY KEY,
        correo VARCHAR(255) UNIQUE NOT NULL,
        clave VARCHAR(255) NOT NULL)";

        $conexion->exec($query);

        self::crearDatosUsuario();
    }

    //* Metodo privado para crear un usuario
    private static function crearDatosUsuario()
    {
        $conexion = ConexionBD::getConexion();

        //* Verifica si el usario existe
        $query = "SELECT COUNT(*) FROM USUARIOS WHERE correo = :correo";
        $stmt = $conexion->prepare($query);
        //* Remplaza :correo con ejemplo@educantbria.es
        $stmt->execute(['correo' => 'ejemplo@educantabria.es']);
        $usuarioExiste = $stmt->fetchColumn();

        //* Si no existe crea el usuario de ejemplo
        if ($usuarioExiste == 0) {
            $claveHash = password_hash('password', PASSWORD_BCRYPT);
            $query = "INSERT INTO usuarios (correo, clave) VALUES (:correo, :clave)";
            $stmt = $conexion->prepare($query);
            $stmt->execute([
                'correo' => 'ejemplo@educantabria.es',
                'clave' => $claveHash
            ]);
        }
    }
    //* Metodo para autenticar al usuario
    public static function autenticar()
    {

        //* Verifica si el método es POST
        if (!esPost()) {
            //* Si no lo es se crea mensaje de error y se redirige a paginaLogin
        flash('error', 'Metodo HTTP no permitido');
            redireccionar('index.php?action=paginaLogin');
            return;
        }

        //* Comprobamos si el usuario ya está logueado
        if (estaLogueado()) {
            //* Si lo está redirige a paginaConectado
            redireccionar('index.php?action=paginaConectado');
            return;
        }
        //* Recogemos las variables POST de correo y contraseña
        $correo = $_POST['correo'] ?? '';
        $clave = $_POST['clave'] ?? '';

        //* Buscamos el usuario en la base de datos
        $conexion = ConexionBD::getConexion();
        $query = 'SELECT correo, clave FROM usuarios WHERE correo = :correo';
        $stmt = $conexion->prepare($query);
        $stmt->execute(['correo'=>$correo]);
        $usuario = $stmt->fetch();

        //* Verificamos si el correo existe y si la contraseña coincide con la de la base de datos
        if ($usuario && password_verify($clave, $usuario['clave'])){
            redireccionar('index.php?action=paginaConectado');
        } else {
            //* Si hay error, crear un mensaje de error y redirigir a la página de login
            flash('error','Credenciales incorrectas');
            flash('correo',$correo); 
            redireccionar('index.php?action=paginaLogin');
        }
    }

    //* Método para verificar que el usuario este conectado para mostrar la página
    public static function paginaConectado (){
        if (estaLogueado()){
            redirect('index.php?action=paginaConectado');
            return;
        } else {
            flash('error','No tienes acceso a esta página');        
            redireccionar('index.php?action=paginaLogin');
            return;
        }
    }

    //* Metodo para eliminar la sesion
    public static function desconectarse(){
        session_unset();
        session_destroy();
        redireccionar('index.php?action=paginaLogin');
    }

    //* Metodo para verificar que el usuario no esté conectado para mostrar el login
    public static function paginaLogin(){
        if (estaLogueado()){
            redireccionar('index.php?action=paginaConectado');
        } else {
            redireccionar('index.php?action=paginaLogin');
        }
    }

    //* Método para controlar la variable $_GET['accion] para saber que metodo ejecutar
    public static function runAccion (){
        var_dump($_GET); // Depuración
        //* Comprobamos si la variable get accion está definida 
        if(isset($_GET['action'])){

            //* Obtenemos el valor de la acción
            $accion = $_GET['action'];

            //* Llamamos al método adecuado según el valor de la acción
            switch($accion){
                case 'paginaLogin':
                    Autenticarse::paginaLogin();
                    break;
                case 'autenticar':
                    Autenticarse::autenticar();
                    break;
                case 'paginaConectado':
                    Autenticarse::paginaConectado();
                    break;
                case 'desconectarse':
                    Autenticarse::desconectarse();
                    break;
                default:
                //* Si la opción no coincide con ninguna, redireccionar a paginaLogin
                redireccionar('index.php?action=paginaLogin');
                break;
            }
        } else {
             //* Si no existe la variable en la acción URL, redirigimos al login
             echo 'asd';
        }
    }

}
