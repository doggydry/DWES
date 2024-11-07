<?php
echo "El archivo Procesar.php se está ejecutando.";

// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Requiere el autoload de Composer
require __DIR__ . '/../vendor/autoload.php';

echo "Autoload cargado."; // Verifica que se carga correctamente

use App\classes\ServicioCorreo;
use App\classes\ProveedorMailtrap;

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica si los campos están establecidos y no están vacíos
    if (!empty($_POST['email']) && !empty($_POST['asunto']) && !empty($_POST['mensaje'])) {

        $paraQuien = $_POST['email']; 
        $asunto =  $_POST['asunto'];
        $cuerpoMensaje = $_POST['mensaje'] ; 

        // Debug: Verificar los datos recibidos
        echo "Datos recibidos: <br>";
        echo "Para: $paraQuien <br>";
        echo "Asunto: $asunto <br>";
        echo "Mensaje: $cuerpoMensaje <br>";
        // Comentado para prueba
        $proveedor = new ProveedorMailtrap();
        $servicioCorreo = new ServicioCorreo($proveedor);

        // // Envía el correo
        $enviado = $servicioCorreo->enviarCorreo($paraQuien, $asunto, $cuerpoMensaje);
        if ($enviado) {
            echo 'Correo enviado con éxito.';
        } else {
            echo 'Error al enviar el correo.';
        }
    } else {
        echo 'Todos los campos son obligatorios.';
    }
} else {
    echo 'Acceso no permitido. Debes enviar el formulario.';
}
