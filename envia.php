<?php
    require_once('lib/vendor/autoload.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto =$_POST['assunto'];
$mensagem = $_POST['mensagem'];

$mail = new PHPMailer(true);

try {
    //configuração para se autenticar no SMTP
    
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();  
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;    
    $mail->Username   = 'flpsiva4.1@gmail.com'; 
    $mail->Password   = 'ewgy dolz gugf hdua';    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
    $mail->Port       = 465;  

    
   //informacao do rementente
    $mail->setFrom('flpsiva_4.1@gmail.com', 'Formulario do Site');
    $mail->addReplyTo($_POST['email'], $_POST['nome']);
    
    // info do destinatario
    $mail->addAddress('flpsiva_4.1@gmail.com', 'Wilsinho Caldas');

   //Configuracao do email
$mail->isHTML(true);                                  
    $mail->Subject = $assunto;
    $mail->Body    = nl2br($mensagem);
    $mail->AltBody = strip_tags($mensagem);
    
    //enviar o email
    $mail->send();
    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}