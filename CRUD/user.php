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
    $fullname = $_POST['fullname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = new user;
    $user->Creatuser($fullname,$name,$email,$password);
    echo " User Created";
}else{
    $data = [
    'status' => 405,
    'message' => $requestMethod. 'Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}