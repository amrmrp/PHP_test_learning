<?php
require "../model/database.php";
session_start();

if (! isset($_SESSION['email']))
{
    header('Location: /');
}
echo "<pre>";
//var_dump($_POST);
echo "</pre>";


function Validate_test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
//    echo "<pre>";
//   // var_dump($_SERVER["REQUEST_METHOD"]);
//    echo "</pre>";
   $data=[
        'email'=>Validate_test_input($_POST['email']),
        'password'=>Validate_test_input($_POST['password'])
   ];
     extract($data);
    if (
        ! empty($email) &&
        ! empty($password)
    ) {
        if (check_user_todatabase($email) && check_password_todatabase($password)) {

            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

        return    header('Location: /panel.php');
        }else{
            $_SESSION['errore']='نام کاربری اشتباه است';
        }

    }else{
        $_SESSION['errore']='فیلد هارا پر نمایید';
    }
}

header('Location: /index.php');

//
//foreach ($data as $key=>$val){
//   echo $val->email;
//}
//













?>