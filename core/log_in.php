<?php 
session_start();
require_once 'db.php';

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$conf_password = $_POST['conf_password'];

if ($password === $conf_password) {

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `db_user` (`user_id`, `user_login`, `user_email`, `user_password`) VALUES (NULL, '$login', '$email', '$password')");
    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../auth.php');

} else {
    $_SESSION['message'] = 'Пароли не совпадают!';
    header('Location: ../reg.php');
}