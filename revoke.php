<?php
session_start();
header('Content-Type: application/json');

$url = "https://oauth2.googleapis.com/revoke";

if(!empty($_GET['token'])) $token = $_GET['token']; else $token = "";

$fields = [
    'token' => $token
    //'redirect_uri' => 'http://localhost/YouTubeAPI/login.php'
];

$fields_string = http_build_query($fields);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
header('Location: login.php');
?>