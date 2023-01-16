<?php
if(isset($_GET['page'])){
    if($_GET['page'] == "create"){
        include("user.php");
    }elseif($_GET['page'] =="delete"){
        include("deleteUser.php");
    }elseif($_GET['page'] =="update"){
        include("updateUser.php");
    }
}
?>