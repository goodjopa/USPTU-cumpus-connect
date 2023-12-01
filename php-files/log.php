<?php
    require_once 'connect.php';
    $email = $_POST['email'];
    $password = $_POST['pas'];

    $login = "SELECT Student_id,email, pas 
            FROM users 
            where email = '$email' and pas = '$password'";

    $result = $connect->query($login);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        setcookie('user_id', $user['Student_id'], time()+3600, "/");
        header('Location: http://localhost/UsptuCamCon/html/main.php');
    } else{
        header('Location: http://localhost/UsptuCamCon/html/error.html');
    }