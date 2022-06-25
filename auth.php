<?php
session_start();
require_once('config.php');
header('Content-Type: application/json');

$url = "https://oauth2.googleapis.com/token";

if(!empty($_GET['code'])) $code = $_GET['code']; else $code = "";

$fields = [
    'client_id' => $config['CLIENT_ID'],
    'client_secret' => $config['CLIENT_SECRET'],
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => 'http://localhost/YouTubeAPI/auth.php'
];

$fields_string = http_build_query($fields);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);

if(!empty($json))
{
    $result= json_decode($json);
    print_r($result);
    if(!empty($result->error) && !empty($result->error_description))
    {
        $_SESSION['error'] = 'Invalid CLIENT_SECRET. Check config.php.';
    }
    else
    {
        if(!empty($_SESSION['error']))
            unset($_SESSION['error']);
        
        $_SESSION['access_token'] = $result->access_token;
        $_SESSION['id_token'] = $result->id_token;
    }
    header('Location: index.php');
}
?>