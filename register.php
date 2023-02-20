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
    <title>Register</title>
</head>

<body>
    <div class="wrapper">
        <h1>Регистрация</h1>
        <form  >
            <label>Name</label>
            <input type="text" name="name">
            <p class="error" id="errorName" class="error-name "></p>

            <label>Login</label>
            <input type="text" name="login">
            <p class="error" id="errorLogin" class="error-login "></p>

            <label>Password</label>
            <input type="password" name="password">
            <p class="error" id="errorPassword" class="error-password "></p>

            <label>Confirm password</label>
            <input type="password" name="confirm_password">
            <p class="error" id="errorPasswordConfirm" class="error-password "></p>

            <label>Email</label>
            <input type="email" name="email">
            <p class="error" id="errorEmail" class="error-email "></p>

            <button class="btn" type="submit" id="register-btn">Зарегистрироваться</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
</body>

</html>