<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/21/2016-->
<!-- * Time: 11:26 AM-->
<!-- */-->
<?php

    include '../Entities/Tasks.php';

//    include '../functions/db_access.php';
    session_start();
    if($_SESSION["username"]){

    }
    else{
        header('location: ../pages/home.php');
    }
    $username = $_SESSION["username"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $date = date("Y-m-d",strtotime($_POST["date"]));
        $task = $_POST["task"];
        if(strlen($task) == 0){
            header('location:../index.php?date='.$_SESSION["date"]);
        }
        $startTime = $_POST["starttime"];
        $endTime = $_POST["endtime"];

        $taskObj = new Task();
        $taskObj = $taskObj->create($username);
        $taskObj::insert($task,$startTime,$endTime,$date);
//        $pdo = Database::connect();
//        $userid = Database::getUserDetails($username,"id");
//
//        $query = 'insert into tasks (task,userid,startTime,endTime,dateTask) values (?,?,?,?,?)';
//        $queryPrepared = $pdo->prepare($query);
//        $queryPrepared->execute(array($task,$userid,$startTime,$endTime,$date));
        Database::disconnect();

        header('location:../index.php?date='.$_SESSION["date"]);
    }
    else{
        echo "You do not have access to this page.";
        header('location:../pages/home.php');
    }

?>
