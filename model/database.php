<?php
session_start();

if (! isset($_SESSION['email']))
{
    header('Location: /');
}
function connect(){

    $servername = "localhost";
    $username = "root";
    $password = "@Am41145481311.";

    try {
        return   $conn = new PDO("mysql:host=$servername;dbname=testpro", $username, $password);
        // set the PDO error mode to exception
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function create_user( $data ){
    try {
        extract($data);

        $smtp= connect()->prepare( "INSERT INTO `user` ( email, password)
                VALUES (:email, :password)");
        $smtp-> bindParam(':email', $email);
        $smtp-> bindParam(':password', $password);
      return  $smtp->execute();

    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function check_user_todatabase($email){
    try {

        $smtp= connect()->prepare( "SELECT * FROM `user` WHERE `email`=:email ");
        $smtp-> bindParam(':email', $email);
        $smtp->execute();
        $out_array=$smtp->fetchAll(PDO::FETCH_OBJ);
        return $out_array  ? $out_array  : false  ;


    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}
function check_password_todatabase($password){
    try {

        $smtp= connect()->prepare( "SELECT * FROM `user` WHERE `password`=:password ");
        $smtp-> bindParam(':password', $password);
        $smtp->execute();
        $out_array=$smtp->fetchAll(PDO::FETCH_OBJ);
        return $out_array  ? true  : false  ;


    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function select_user($connect ){
    try {

        $stmt = $connect->prepare("SELECT * FROM `user`");
        $stmt->execute();
        return   $stmt->fetchAll(PDO::FETCH_OBJ);

    } catch(PDOException $e) {
        echo   "<br>" . $e->getMessage();
    }
}







