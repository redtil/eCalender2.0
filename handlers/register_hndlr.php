
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 4:38 PM-->
<!-- */-->

<?php
    include '../functions/db_access.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $pdo = Database::connect();

        // TODO: change these alerts to tooltip messages
        if($_POST["username"])
         $username = $_POST["username"];
        else{
            Print '<script> alert("Please enter Username") </script>';
            Print '<script> window.location.assign("../pages/register.php"); </script>';
//            header('location:../pages/register.php');
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


        $sQuery = "select * from users WHERE username = '$username'";
        foreach($pdo->query($sQuery) as $row){
            Print  '<script> alert("This username is already used by another user.") </script>';
            Print '<script> window.location.assign("../pages/register.php"); </script>';
            exit;
        }

        $eQuery = "select * from users where email = '$email'";
        $eQueryPrepared = $pdo->prepare($eQuery);
        $eQueryPrepared->execute(array($email));
        while( $row = $eQueryPrepared->fetch()){
            Print  '<script> alert("This email address is already used by another user.") </script>';
            Print '<script> window.location.assign("../pages/register.php"); </script>';
            exit;
        }

        $iQuery = 'insert into users (username, password, email) values (?,?,?)';
        $iQueryPrepare = $pdo->prepare($iQuery);
        $iQueryPrepare->execute(array($username,$encrypted_password,$email));
        Database::disconnect();
        header('location:../index.php');
    }
    else{
        echo "You do not have access to this page.";
    }
?>