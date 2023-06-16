<?php
$serverHost = "127.0.0.1";
$dbname = "signup_pdo";
$dbUsername = "root";
$dbPassword = "";
try {
    $db = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(PDOexception $exception) {
    $error_message = $exception->getMessage();
    echo $error_message;

}