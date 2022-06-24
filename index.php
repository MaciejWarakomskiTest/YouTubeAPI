<!DOCTYPE html>
<html>
<head>
    <title>YouTube API Test</title>
</head>
<body>
<script src="https://accounts.google.com/gsi/client" async defer></script>
      
<?php

if(empty($_POST['credential']))
    header("Location: login.php");

echo 'POST: <pre>';
print_r($_POST);

/*$test = file_get_contents("https://youtube.googleapis.com/youtube/v3/playlists?part=snippet%2CcontentDetails&maxResults=25&mine=true&key=AIzaSyAXiFwZ8gH9uE7LDv2hPkroBPzl5R4CGMU&access_token=oauth2-token");
echo $test;*/

?>

</body>
</html>