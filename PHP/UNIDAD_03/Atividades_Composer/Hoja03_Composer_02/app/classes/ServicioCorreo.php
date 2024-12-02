<?php

namespace App\classes; // Asegúrate de que este sea el espacio de nombres correcto

use App\interfaces\InterfazProveedorCorreo; // Importar la interfaz

class ServicioCorreo
{
    private InterfazProveedorCorreo $proveedor; // Propiedad para almacenar el proveedor de correo

    // Constructor que acepta un proveedor de correo
    public function __construct(InterfazProveedorCorreo $proveedor)
    {
        $this->proveedor = $proveedor; // Almacenar el proveedor
    }

    // Método para enviar correo
    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool
    {
        return $this->proveedor->enviarCorreo($paraQuien, $asunto, $cuerpoMensaje);
    }
}
