<?php
require "../model/database.php";
session_start();

//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";

function Validate_test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $data=[
        'email'=>Validate_test_input($_POST['email']),
        'password'=>Validate_test_input($_POST['password']),
        'password_confirm'=>Validate_test_input($_POST['password_confirm'])
    ];
    extract($data);
    if (
        ! empty($email) &&
        ! empty($password) &&
        ! empty($password_confirm)
    ){
    if ($password===$password_confirm){

        if (! check_user_todatabase($email)){
            create_user($_POST);
         return   header('Location: /index.php');
        }else{
            $_SESSION['errore']='لطفا نام کاربری خود را تغییر دهید';
        }
        }else{
          $_SESSION['errore']='پسورد صحیح نیست';
     }
    }else{
        $_SESSION['errore']='لطفا مقادیر را وارد کنید';
    }
}

header('Location: /register/index.php');
