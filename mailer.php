<?php

$url = 'https://api.sendgrid.com/';
$user = 'two24studios';
$pass = 'uP9V3Qr3@rzd7*76mh]fBn{%qEGg/.%79H2n>WCrD9Zoemi@';

$name = $_POST['form-name'];
$email = $_POST['form-email'];
$phone = $_POST['form-phone'];
$message = $_POST['form-message'];

$params = array(
    'api_user'  => "$user",
    'api_key'   => "$pass",
    'to'        => "contact@bigmntn.com",
    'subject'   => "Contact form submission",
    'html'      => "<html><head><title>Contact Form</title><body>
    <strong>Name:</strong> $name\n<br>
    <strong>Email:</strong> $email\n<br>
    <strong>Phone:</strong> $phone\n<br>
    <strong>Message:</strong> $message <body></title></head></html>",
    'text'      => "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    $message",
    'from'      => "$email",
  );

# curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
$request =  $url.'api/mail.send.json';

$session = curl_init($request);

curl_setopt ($session, CURLOPT_POST, true);

curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($session);
curl_close($session);

header('Location: thanks.html');
exit();

print_r($response);

?>
