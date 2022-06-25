<?php
session_start();
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>YouTube API Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cen"><a class="zaloguj" href="https://accounts.google.com/o/oauth2/v2/auth?
response_type=code&
client_id=<?php echo $config['CLIENT_ID'];?>&
redirect_uri=http://localhost/YouTubeAPI/auth.php&
scope=https%3A//www.googleapis.com/auth/youtube.readonly&
access_type=offline&
include_granted_scopes=true">ZALOGUJ</a></div>

</body>
</html>