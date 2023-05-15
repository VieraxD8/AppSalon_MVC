<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    
    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }


    public function enviarConfirmacion(){
        //crear el objeto de email

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '1fc7dd80930a64';
        $mail->Password = 'a1f0edd3f10e90';
        $mail->SMTPSecure = 'tls';


        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Confirmar tu Cuenta';

        // set html

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';


        $contenido = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre  . " </strong> Has creado tu cuenta en appsalon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token=".$this->token ."'> Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail

        $mail->send();

    }

    public function enviarInstrucciones(){

           //crear el objeto de email

           $mail = new PHPMailer();
           $mail->isSMTP();
           $mail->Host = 'sandbox.smtp.mailtrap.io';
           $mail->SMTPAuth = true;
           $mail->Port = 2525;
           $mail->Username = '1fc7dd80930a64';
           $mail->Password = 'a1f0edd3f10e90';
           $mail->SMTPSecure = 'tls';
   
   
           $mail->setFrom('cuentas@appsalon.com');
           $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
           $mail->Subject = 'Reestablece tu password';
   
           // set html
   
           $mail->isHTML(true);
           $mail->CharSet = 'UTF-8';
   
   
           $contenido = "<html>";
           $contenido .= "<p><strong> Hola " . $this->nombre  . " </strong>Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerto </p>";
           $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=".$this->token ."'> Reestablecer Password</a></p>";
           $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
           $contenido .= "</html>";
   
           $mail->Body = $contenido;
   
           //Enviar el mail
   
           $mail->send();

    }
    

}






?>