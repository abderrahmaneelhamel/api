<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');
$file = 'models/userModel.php';
if(file_exists($file)){
    include($file);
}elseif(file_exists('../'.$file)){
    include('../'.$file);
}
$requestMethod = $_SERVER["REQUEST_METHOD"];
if($requestMethod == "POST"){
    $id = $_POST['id'];
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $password = isset($_POST["password"]) ? md5($_POST["password"]) : null;
    $user = new user;
    $user->updateUser($id,$name,$fullname,$email,$password);
    echo " User updated";
}else{
    $data = [
    'status' => 405,
    'message' => $requestMethod. 'Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}