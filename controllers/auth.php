<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once "../config/connect.php";
include_once "../models/Auth.php";

$database = new Database();
$db = $database->connect();
$user = new Auth($db);
$data = json_decode(file_get_contents("php://input"), true);
if (isset($data["register"])) {
    $user->name = $data["name"];
    $user->email = $data["email"];
    $user->password = $data["password"];
    $user->phone = $data["phone"];
    $msg = $user->register();
    echo json_encode($msg);
} else if (isset($data['passworded'])) {
    $user->id = $data["id"];
    $user->password = $data["password"];
    $user->passworded = $data["passworded"];
    $msg = $user->updatePassword();
    echo json_encode($msg);
} else {
    $user->email = $data["email"];
    $user->password = $data["password"];
    $msg = $user->login();
    echo json_encode($msg);
}
