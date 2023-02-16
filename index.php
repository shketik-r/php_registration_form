<?php
session_start();

if(isset($_COOKIE['cookie'])){
    $_SESSION['user_name'] = $_COOKIE['cookie'];
    header('Location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Authorization</title>
</head>

<body>
    <div class="wrapper">
        <h1>Авторизация</h1>
        <form>
            <label>Login</label>
            <input type="text" name="login" id="login">
            <label>Password</label>
            <input type="password" name="password" id="password">
            <p>
                <a href="register.php">зарегистрироваться</a>
            </p>
            <button class="btn" type="submit" id="login-btn">Войти</button>
            <p id="message"  class="msg none"></p>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

</body>
</html>