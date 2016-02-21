<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/21/2016-->
<!-- * Time: 11:26 AM-->
<!-- */-->
<?php
    include '../functions/db_access.php';
    session_start();
    if($_SESSION["username"]){

    }
    else{
        header('location: ../index.php');
    }
    $username = $_SESSION["username"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $task = $_POST["task"];
        if(strlen($task) == 0){
            header('location:../index.php');
            exit;
        }
        $startTime = $_POST["starttime"];
        $endTime = $_POST["endtime"];

        $pdo = Database::connect();
        $userid = Database::getUserDetails($username,"id");
        $query = "insert into tasks (task,userid,startTime,endTime) values (?,?,?,?)";
        $queryPrepared = $pdo->prepare($query);
        $queryPrepared->execute(array($task,$userid,$startTime,$endTime));
        header('location:../index.php');
    }
    else{
        echo "You do not have access to this page.";
        header('location:../index.php');
    }

?>
