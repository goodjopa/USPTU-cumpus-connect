<?php
    require_once 'connect.php';
    $ok = $_POST['ok'];
    $notok = $_POST['notok'];
    if (isset($ok)) {
        $call = ("CALL add_or_delete_row('$ok', 'add')");
    } else if (isset($notok)) {
        $call = ("CALL add_or_delete_row('$notok', 'delete')");
    }
    $connect->query($call);
    header('Location: http://localhost/UsptuCamCon/html/check.php');