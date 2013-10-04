<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require '..\my_phpmailer.php';
$mail = new my_phpmailer;

        $mail->AddAddress("maor@webstuff.co.il", "maor - WEBSTUFF");
        $mail->Subject = "Test";
        $mail->Body    = "Test the Mail";
        $mail->IsHTML (true);

        if(!$mail->Send()) {
            echo "There was an error sending the message";
            exit;
        }
?>