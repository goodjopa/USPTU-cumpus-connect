<?php
    require_once 'connect.php';
    file_put_contents('../textcreate.txt',"Создал\n"); 
    $name = $_POST['name'];
    $number = $_POST['number'];
    $date = $_POST['datetime'];
    $interes = $_POST['interes'];
    $description = $_POST['other'];

    $user_id = $_COOKIE['user_id'];
    if(empty($interes)){
        $insert = "INSERT INTO request_to_create(Name_request_to_create, Count, Description, Date_event_to_create, Student_id)
                VALUES ('$name', '$number','$description', '$date', '$user_id')";
    } else{
        $insert = "INSERT INTO request_to_create(Name_request_to_create, Count, Description, Date_event_to_create, Student_id, Interes_Id)
                VALUES ('$name', '$number','$description', '$date', '$user_id', '$interes')";
    }
    if($connect->query($insert)){
        header('Location: http://localhost/UsptuCamCon/html/create.html');
        file_put_contents('../textcreate.txt', "Название: ". $name . " Кол-во мест: ". $number ." Дата и время: ". $date ."\n", FILE_APPEND);
    } else{
        echo 'Введенная дата меньше сегоднешней';
    }