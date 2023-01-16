<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');

$requestMethod = $_SERVER["REQUEST_METHOD"];
if($requestMethod == "GET"){
    include("get/user.php");
}
?>