<?php

namespace App\classes; // Asegúrate de que este sea el espacio de nombres correcto

use PHPMailer\PHPMailer\PHPMailer; // Importa la clase PHPMailer
use PHPMailer\PHPMailer\Exception; // Importa la clase Exception
use App\interfaces\InterfazProveedorCorreo; // Importa la interfaz que has creado

class ProveedorMailtrap implements InterfazProveedorCorreo
{
    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool
    {
        $mail = new PHPMailer(true); // Crea una nueva instancia de PHPMailer

        try {
            // Configura el servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'f08fe6bdb2801c';
            $mail->Password = '3203bbeb84d02a';
            $mail->Port = 587;

            // Configura el correo
            $mail->setFrom('tu_correo@example.com', 'Tu Nombre');
            $mail->addAddress($paraQuien);
            $mail->Subject = $asunto;
            $mail->Body = $cuerpoMensaje;

            // Envía el correo
            $mail->send();
            echo 'Correo enviado con éxito.';
            return true;
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$e->getMessage()}";
            return false;
        }
    }
}
