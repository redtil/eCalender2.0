
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 4:38 PM-->
<!-- */-->

<?php

    include '../Entities/Users.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $userObj = new User();

//        $pdo = Database::connect();

        // TODO: change these alerts to tooltip messages
        if($_POST["username"])
         $username = $_POST["username"];
        else{
            Print '<script> alert("Please enter Username") </script>';
            Print '<script> window.location.assign("../pages/register.php"); </script>';
            header('location:../pages/register.php');
            exit;
        }

        // TODO: do a password strength check
        if($_POST['password'])
            $encrypted_password = crypt($_POST["password"]);
        else{
            Print '<script> alert("Please enter Password")</script>';
            Print '<script> window.location.assign("../pages/register.php"); </script>';
            exit;
        }

        if($_POST['email'])
            $email = $_POST['email'];
        else{
            Print '<script> alert("Please enter your Email address.")</script>';
            Print '<script> window.location.assign("../pages/register.php"); </script>';
            exit;
        }

        $userObj::insert($username,$encrypted_password,$email);
        Database::disconnect();
        header('location:../index.php?date=today');
    }
    else{
        echo "You do not have access to this page.";
//        header('location:../pages/home.php');
    }
?>