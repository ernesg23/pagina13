<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
include "../../config.php";
$email = $_POST['email'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$verifyMail = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
while ($response = mysqli_fetch_assoc($verifyMail)) {
    $rows[] = $response;
}
if (mysqli_num_rows($verifyMail) > 0) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "http://localhost/24-4.10-pagina13/modules/users/createNPwd.php?selector=". $selector . "&validator=" . bin2hex($token)."";
    $expireDate = date("U") + 900;
    $queryDel = "DELETE FROM accountrecovery WHERE resetEmail =?;"; 
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $queryDel)){ 
        echo "false";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }
    $queryIns = "INSERT into accountrecovery(resetEmail, resetSelector, token, resetExprires) values (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $queryIns)){ 
        echo "false";
        exit();
    } else {
        $hashedTok = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedTok, $expireDate);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);



    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'pagina13oficial@gmail.com';                     //SMTP username
        $mail->Password   = 'fdocngpvvxblsuhk';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pagina13oficial@gmail.com', 'Pagina13');
        $mail->addAddress('' . $email . '', 'Usuario');     //Add a recipient to sent to

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recuperar cuenta - pagina13';
        $mail->Body = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Cuenta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            max-width: 100px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .content h1 {
            color: #333;
        }
        .content p {
            color: #777;
        }
        .button {
            margin-top: 20px;
        }
        .button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="cid:enterprise_logo" alt="Logo">
        </div>
        <div class="content">
            <h1>Recuperación de Cuenta</h1>
            <p>Hola ' . $rows[0]["name"] . ',</p>
            <p>Recibimos una solicitud para restablecer la contraseña de tu cuenta. Si no realizaste esta solicitud, puedes ignorar este correo.</p>
            <div class="button">
                <a href="'.$url.'" target="_blank">Restablecer Contraseña</a>
            </div>
            <p>Si el botón no funciona, escriba el siguiente link en su navegador: '. $url.'</p>
            <p>Si tienes algún problema, no dudes en contactarnos.</p>
        </div>
        <div class="footer">
            <p>© 2024 pagina13. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
';

        $mail->AddEmbeddedImage('../../views/img/enterprise_logo.png', 'enterprise_logo', 'enterprise_logo.png');


        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
            echo "true";
            exit(0);
        } else {
            echo "false";
            exit(0);
        };
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
