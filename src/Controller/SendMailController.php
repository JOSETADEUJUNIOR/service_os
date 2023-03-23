<?php
namespace Src\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMailController {
    
    private $mail;
    
    function __construct() {
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet = 'UTF-8';
        $this->mail->SMTPDebug = 0;
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'josetadeu33217610@gmail.com';
        $this->mail->Password = 'pywzxdzggruasrku';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
    }
    
    function sendEmail($to, $subject, $body) {
        try {
            $this->mail->setFrom('josetadeu33217610@gmail.com', 'Jose Tadeu');
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}