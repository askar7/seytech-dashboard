<?php

require 'vendor/autoload.php';

$name     = $_POST['name'];
$email    = $_POST['email'];
$comments = $_POST['comments'];

// Send Grid
$from = new SendGrid\Email(null, $email);
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "marattig@example.com");
$content = new SendGrid\Content("text/plain", $comments);
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

