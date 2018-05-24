<?php
/*SendGrid Library*/
require_once('vendor/autoload.php');

/*Post Data*/
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

    /*Content*/
    $from = new SendGrid\Email('Web Site Inquiry', 'holdridgedesigns@gmail.com');
    $subject = "Need Website Designed";
    $to = new SendGrid\Email("Eric Holdridge", "eholdridge2@gmail.com");
    $content = new SendGrid\Content("text/html", "
    Email : {$email}<br>
    Name : {$name}<br>
    Message : {$message}<br>
    ");

    /*Send the mail*/
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $apiKey = ('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');
    $sg = new \SendGrid($apiKey);

    /*Response*/
    $response = $sg->client->mail()->send()->post($mail);


    /*Print the response*/
    $success = "Message has been sent.";
    header('location: /index.php?sent');

?>


