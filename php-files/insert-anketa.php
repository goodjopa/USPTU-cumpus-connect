<?php 
require_once 'connect.php';
$kurs = $_POST['kurs'];
$group = $_POST['group'];
$phone = $_POST['phone'];
$campus = $_POST['campus'];
$interes = $_POST['interes'];


$user_id = $_COOKIE['user_id'];

if(!empty($kurs)){
   # $update_kurs = "CALL update-users-int(Kurs, '$kurs')"

   $update_kurs = "UPDATE users
                  SET Kurs='$kurs'
                  WHERE Student_id = '$user_id'";
   $connect->query($update_kurs);
}
if(!empty($group)){
   $insert_group = "UPDATE users
                  SET Group_student='$group'
                  WHERE Student_id = '$user_id'";
   $connect->query($insert_group);
}
if(!empty($phone)){
   $insert_phone = "UPDATE users
                  SET Phone='$phone'
                  WHERE Student_id = '$user_id'";
   $connect->query($insert_phone);
}
if(!empty($campus)){
   $insert_campus = "UPDATE users
                  SET Campus='$campus'
                  WHERE Student_id = '$user_id'";
   $connect->query($insert_campus);
}
if(!empty($interes)){
   $insert_to_interes = "INSERT INTO user_interes (Student_id, Interes_id)
                     VALUES ('$user_id', '$interes') ";
   $connect->query($insert_to_interes);
}
header('Location: http://localhost/UsptuCamCon/html/anketa.html');
