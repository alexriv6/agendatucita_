<?php
include("../componentes/conexion.php");

$id_posible = $_POST["id_posible"];
$correo_destino = $_POST["destino"];
$persona_destino = $_POST["persona"];
$correo_asunto = $_POST["asunto"];
$correo_cuerpo = $_POST["cuerpo"];

$resultado = "";
$color = "";

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hpmcitasconfirmacion@gmail.com';                     //SMTP username
    $mail->Password   = 'stlqqticgecqcyrn';                               //SMTP password
    $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hpmcitasconfirmacion@gmail.com', ' HPM Contadores');
    $mail->addAddress($correo_destino , $persona_destino);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $correo_asunto;
    $mail->Body    = $correo_cuerpo;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $resultado = 'El mensaje se envió correctamente';
    $color = "success";

    
    $sentenciaSQL= $pdo->prepare("UPDATE eventos SET estatus = 2 WHERE id_posible = $id_posible;");
    $sentenciaSQL->execute();

} catch (Exception $e) {
    $resultado = "Error al enviar el mensaje: {$mail->ErrorInfo}";
    $color = "warning";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Login</title>
    <style>
        body{
            margin: 150px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="alert alert-<?php echo $color; ?> text-center" role="alert">
                <h2><strong><?php echo $resultado; ?></strong></h2>
                <br>
                <a href="../agendados.php" class="btn btn-<?php echo $color; ?>"> Click para continuar</a>
            </div>
        </div>
    </div>
</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>