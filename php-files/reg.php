<?php
   require_once 'connect.php';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
  
   if($password === $confirm){
        if($name === '' || $surname === '' || $email ==='' || $password === ''){
          exit('Не все поля заполнены');
        }
        $insert = ("INSERT INTO users (name,surname,email,pas) 
                    VALUES('$name', '$surname', '$email', '$password')");
        if ($connect->query($insert)) {
            header('Location: http://localhost/UsptuCamCon/html/login.html');
          } else {
            echo "Error: " . $insert . "<br>" . $connect->error;
          }
    }
  else{
        echo("Неверно введен повторный пароль");
  }
?>