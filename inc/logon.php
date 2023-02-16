<?php
session_start();
require_once 'conect.php';
$login = $_POST['login'];
$password = md5($_POST['password']);

$data = json_decode($res, TRUE);
$response = [
    "status" => false
];
if ($data) {
    foreach ($data as $key => $item) {
        if ($login === $item['login'] && $password === $item['password']) {
            $_SESSION['user_name'] = $item['name'];
            $response["status"] = true;
            break;
        } else {
            $response["status"] = false;
        }
    }
    echo json_encode($response);
} else {
    $response = [
        "status" => false
    ];
    echo json_encode($response);
}
