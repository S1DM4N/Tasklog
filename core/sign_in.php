<?php
session_start();
require_once 'db.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT * FROM `db_user` WHERE `user_login` = '$login' AND `user_password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {
    
    $user= mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        "user_id" => $user['id'],
        "user_login" => $user['login'],
        "user_email" => $user['email']
    ];
header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Не верный логин или пароль!';
    header('Location: ../auth.php');
}