<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>YouTube API Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<script src="https://accounts.google.com/gsi/client" async defer></script>
      
<?php

if(empty($_POST['credential']) && empty($_SESSION['access_token']))
    header("Location: login.php");

if(!empty($_SESSION['access_token'])) $access_token = $_SESSION['access_token'];
else $access_token = "";

$result = json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/playlists?part=snippet%2CcontentDetails&maxResults=25&mine=true&key==AIzaSyAXiFwZ8gH9uE7LDv2hPkroBPzl5R4CGMU&access_token=".$_SESSION['access_token']));
echo "<div class='title'>PLAYLISTY MOJEGO KANAŁU YOUTUBE</div>";

echo "<div class='lista'>";
foreach($result->items as $item)
{
    echo $item->snippet->title."<br>";
}
echo '</div>
<br>
<form action="revoke.php">
    <input type="hidden" name="token" value="'.$access_token.'">
    <input type="submit" value="Przejdź do strony logowania" />
</form>';

?>

</body>
</html>