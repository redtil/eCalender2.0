<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 4:38 PM-->
<!-- */-->

<?php
    include '../Entities/Users.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        $userObj = new User();
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(empty($username)){
            Print '<script> alert("Please enter Username")</script>';
            Print '<script> window.location.assign("../pages/login.php")';
            exit;
        }
        if(empty($password)){
            Print '<script> alert("Please enter Password.")</script>';
            Print '<script> window.location.assign("../pages/login.php")</script>';
            exit;
        }

        $rowPassword = $userObj::getUserDetails($username,"password");
        if($rowPassword){
            $userObj::checkPassword($username,$password,$rowPassword);
        }
    }
    else{
        echo "You do not have access to this page.";
//        header('location:../pages/home.php');
    }
?>