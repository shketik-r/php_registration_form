<?php
require_once 'conect.php';
require_once '../classes/User.php';

$data = json_decode($res, true);
$response = [];
$trim = function ($val) {
    $val = trim($val);
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
};

$name = $trim($_POST['name']);
$login = $trim($_POST['login']);
$password = $trim($_POST['password']);
$confirm_password = $trim($_POST['confirm_password']);
$email = $trim($_POST['email']);

$patter_name = "/^([А-ЯЁ]{1}[а-яё]{1,30})|([A-Z]{1}[a-z]{1,30})/";
$chek_space = "/[[:space:]]/";
$patter_password = "/^(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{6,}$/";
$patter_login = "/^[0-9a-zA-Z!@#$%^&*]{6,}/";
$flag = true;


if (!preg_match($patter_name, $name) || preg_match($chek_space, $name)) {
    $response['status_name'] = true;
    $response['error_name'] = 'Введите имя без пробелов и с большой буквы';
    $flag= false;
}

if (!preg_match($patter_login, $login) || preg_match($chek_space, $login)) {
    $response['status_login'] = true;
    $response['error_login'] = 'Введите корректный логин';
    $flag= false;
}

if (!preg_match($patter_password, $password) || preg_match($chek_space, $password)) {
    $response['status_password'] = true;
    $response['error_password'] = 'Введите корректный пароль';
    $flag= false;
}

if ($password !== $confirm_password) {
    $response['status_confirm_password'] = true;
    $response['error_confirm_password'] = 'Пароли не совпадают';
    $flag= false;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match($chek_space, $email)) {
    $response['status_email'] = true;
    $response['error_email'] = 'Некорректно введён email';
    $flag= false;
}


$data_record = function ($name, $login, $password, $email, $res) {

    $newUser = new User($name, $login, $password, $email);
    $data = json_decode($res, true);
    unset($res);
    $arrNewUser = $newUser->createNewUser();
    $data[] = $arrNewUser;
    file_put_contents('../db/data.json', json_encode($data));
    unset($data);
};

if ($data && $flag) {
    $check = false;

    foreach ($data as $item) {
        if ($login === $item['login']) {
            $check = true;
            $response["status_login"] = true;
            $response["error_login"] = "Такой логин существует";
        } else {
            $check = false;
        }
        if ($email === $item['email']) {
            $check = true;
            $response["status_email"] = true;
            $response["error_email"] = "Этот email занят";
        } else {
            $check = false;
        }
    }

    if (!$check) {
        $data_record($name, $login, $password, $email, $res);
        $response['status_verification'] = true;
    }
    echo json_encode($response);
} else {
    if ($flag) {
        $data_record($name, $login, $password, $email, $res);
        $response['status_verification'] = true;
    }
    echo json_encode($response);
}
