<!doctype html>
<?php
session_start();

if (! isset($_SESSION['email']))
{
    header('Location: /');
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>wellcome</h1>
<h5> Username:   <?=  $_SESSION['email']  ?></h5>
<a href="/logout.php">LogOut</a>
</body>
</html>