<?php
    setcookie('user_id', $user['Student_id'], time()-3600, "/");
    header('Location: http://localhost/UsptuCamCon/html/main.php');