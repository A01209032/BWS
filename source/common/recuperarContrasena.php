<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

require_once("models/departamento.php");

//Se obtienen los usuarios y contraseñas
$result=findAllDepartments2();   
$text='';
if(mysqli_num_rows($result)>0){
	$text=$text.'<b>Contraseñas actuales:</b><br>';
	while($row=mysqli_fetch_assoc($result)){
      	$text=$text.$row["NombreDepartamento"].': '.$row["contrasena"].'<br>';
    }
}
mysqli_free_result($result); //Se libera la variable de memoria

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465; //587;                                    // TCP port to connect to
    $mail->Username   = 'apap71@gmail.com';                     // SMTP username
    $mail->Password   = 'unziissreqmrpoac';                               // SMTP password

    //Recipients
    $mail->SetFrom('test@gmail.com');
    $mail->addAddress('apap71@gmail.com');     // Add a recipient
    $mail->addAddress('spatricia69medelesromero@gmail.com');               // Name is optional

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body    = $text;
    $mail->AltBody = $text;

    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo 'Se envió un correo con las contraseñas al administrador. Favor de comunicarse con ella/él';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}

?>