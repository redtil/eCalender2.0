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

        Database::disconnect();

        header('location:../index.php?date='.$_SESSION["date"]);
    }
    else{
        echo "You do not have access to this page.";
        header('location:../pages/home.php');
    }

?>
