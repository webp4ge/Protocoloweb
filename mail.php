<?php 
if(isset($_POST['submit'])) {
    // 1. Recoger los datos
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // 2. Tu correo donde quieres recibir los mensajes
    $recipient = "diegorap2002@gmail.com"; 
    $subject = "Nuevo mensaje de contacto de: $name";

    // 3. Estructura del cuerpo del correo
    $formcontent = "Has recibido un nuevo mensaje desde tu sitio web.\n\n";
    $formcontent .= "Nombre: $name \n";
    $formcontent .= "Email: $email \n";
    $formcontent .= "Mensaje: \n$message";

    // 4. Headers (Esto es crucial para que llegue bien)
    // Usamos el correo del remitente en 'Reply-To' para que puedas responderle directamente
    $headers = "From: no-reply@tu-dominio.com" . "\r\n"; // Un correo de tu propio dominio
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // 5. Enviar
    if(mail($recipient, $subject, $formcontent, $headers)) {
        echo "¡Gracias! Tu mensaje ha sido enviado correctamente.";
    } else {
        echo "Lo sentimos, hubo un error al enviar el mensaje.";
    }
} else {
    echo "Acceso no permitido.";
}
?>