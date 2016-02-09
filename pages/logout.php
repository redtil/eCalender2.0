
/**
 * Created by PhpStorm.
 * User: rediet
 * Date: 2/9/2016
 * Time: 4:52 PM
 */
<?php
    session_start();
    session_destroy();
    header('location:home.php');
?>