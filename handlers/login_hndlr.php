<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 4:38 PM-->
<!-- */-->

<?php
    include '../functions/db_access.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        $pdo = Database::connect();
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

        $query = "select * from users where username = '$username'";
        $queryPrepared = $pdo->prepare($query);
        $queryPrepared->execute(array($username));
        while($row = $queryPrepared->fetch()){
            if(crypt($password,$row["password"]) == $row["password"]){
                $_SESSION["username"] = $username;
                header('location:../index.php');
            }
            else{
                Print '<script> alert("Password is incorrect") </script>';
                Print '<script> window.location.assign("../pages/login.php")</script>';
                exit;
            }
        }
    }
    else{
        echo "You do not have access to this page.";
    }
?>