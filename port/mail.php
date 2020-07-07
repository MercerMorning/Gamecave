<?php

require_once 'vendor/autoload.php';
require_once 'config.php';
// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
        ->setUsername(USERNAME)
        ->setPassword(PASSWORD)
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom([USERNAME => 'hugopochta@gmail.com'])
        ->setTo(['hugopochta@gmail.com'])
        ->setBody(
            $_POST['name'] . ' с почтой ' . $_POST['email'] . '. ' . 'Message: ' . $_POST['message']
        )
    ;

// Send the message
    $result = $mailer->send($message);

header('Location: http://' . PROJECTNAME);



