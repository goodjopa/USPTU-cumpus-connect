<?php
    require_once 'connect.php';
    $user_id = $_COOKIE['user_id'];
    $ok = $_POST['ok'];
    $notok = $_POST['notok'];
    if (isset($ok)) {
        $proc = "CALL add_or_delete_events_come('$ok', '$user_id', 'add')";
    } else if (isset($notok)) {
        $proc = "CALL add_or_delete_events_come('$notok', '$user_id', 'delete')";
    }
    $connect->query($proc);
    header('Location: http://localhost/UsptuCamCon/html/look.php');