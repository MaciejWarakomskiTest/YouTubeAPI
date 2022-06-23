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
echo 'credential: '.$_POST['credential'].'<br>';
echo 'g_csrf_token: '.$_POST['g_csrf_token'];

?>

</body>
</html>