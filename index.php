<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>YouTube API Test</title>
</head>
<body>
<script src="https://accounts.google.com/gsi/client" async defer></script>
      
<?php

if(empty($_POST['credential']) && empty($_SESSION['access_token']))
    header("Location: login.php");

$test = json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/playlists?part=snippet%2CcontentDetails&maxResults=25&mine=true&key=AIzaSyAXiFwZ8gH9uE7LDv2hPkroBPzl5R4CGMU&access_token=".$_SESSION['access_token']));
echo "lista: <pre>";
print_r($test);

?>

</body>
</html>