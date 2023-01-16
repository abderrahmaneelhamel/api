<?php 
require("connection.php");
    class user {
        function getuser(){
            $test = new connection;
            $con = $test->connection();
            $response = array();
            if ($con) {
            $sql = "SELECT * FROM `clients`";
            $result = mysqli_query($con, $sql);
            if($result) {
                $x = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $response [$x]['id'] = $row['id'];
                    $response [$x]['name'] = $row['firstName'];
                    $response [$x]['fullName'] = $row['fullName'];
                    $response [$x]['email'] = $row['email'];
                    $response [$x]['password'] = $row['password'];
                    $response [$x]['role'] = $row['role'];
                    $x++;
                }
                return json_encode($response, JSON_PRETTY_PRINT);
            }
            }
        }
        function creatuser($fullname,$name,$email,$password){
                $role = "client";
                $test = new connection;
                $conn = $test->connection();
                
                if($conn->connect_error){
                   die('conection failed :'.$conn->connect_error);
                   echo "error";
                   }else{
                    mysqli_query($conn,"INSERT INTO `clients` (`fullName`,`firstName`,`email`, `password`,`role`) VALUES ('$fullname','$name','$email','$password','$role')");
                    echo "Success:";
                }
        }
        function updateUser($id,$name,$fullname,$email,$password){
            $test = new connection;
            $conn = $test->connection();
            $sql="UPDATE `clients` SET `fullName` = '$fullname', `firstName` = '$name', `email` = '$email', `password` = '$password'  WHERE `clients`.`id` = $id;";
            if($conn->connect_error){
               die('conection failed :'.$conn->connect_error);
               echo "error";
               }else{
                mysqli_query($conn,$sql);
                echo "Success:";
            }
    }
        function deleteUser($id){
            $test = new connection;
            $conn = $test->connection();
            if($conn->connect_error){
                die('conection failed :'.$conn->connect_error);
                echo "error";
                }else{
                 mysqli_query($conn,"DELETE FROM `clients` WHERE `clients`.`id` = $id");
                 echo "Success:";
             }
        }
    }
?>