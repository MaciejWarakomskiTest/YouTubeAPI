<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>YouTube API Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
      
<?php

if(isset($_SESSION['error']))
{
    die($_SESSION['error']);
}

if(empty($_SESSION['access_token']))
    header("Location: login.php");

if(!empty($_SESSION['access_token'])) $access_token = $_SESSION['access_token'];
else $access_token = "";

$result = json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/playlists?part=snippet%2CcontentDetails&maxResults=25&mine=true&access_token=".$access_token));
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
    <input type="submit" value="WYLOGUJ" />
</form>';

?>

</body>
</html>