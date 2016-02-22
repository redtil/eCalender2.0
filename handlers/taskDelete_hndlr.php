
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/21/2016-->
<!-- * Time: 2:58 PM-->
<!-- */-->

<?php
    include '../functions/db_access.php';
    session_start();
    if($_SESSION["username"]){

    }
    else{
        header('location:../pages/home.php');
    }
    $username = $_SESSION["username"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pdo = Database::connect();
        $taskid = $_POST["taskid"];
        $query = "delete from tasks where id=?";
        $queryPrepared = $pdo->prepare($query);
        $queryPrepared->execute(array($taskid));
        Database::disconnect();
        header('location:../index.php?date='.$_SESSION["date"]);
    }
    else{
        echo "You are not authorized to access this page.";
        header('location:../pages/home.php');
    }
?>