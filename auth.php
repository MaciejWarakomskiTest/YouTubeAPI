<?php
session_start();
header('Content-Type: application/json');

$url = "https://oauth2.googleapis.com/token";

if(!empty($_GET['code'])) $code = $_GET['code']; else $code = "";

$fields = [
    'client_id' => '885218019365-77rti44e4g0d7us6dcih9vbf3u8p497d.apps.googleusercontent.com',
    'client_secret' => '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',
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
    $_SESSION['access_token'] = $result->access_token;
    $_SESSION['id_token'] = $result->id_token;
    header('Location: index.php');
}
?>