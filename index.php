<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 4:39 PM-->
<!-- */-->
<html>

    <?php
        session_start();
        if($_SESSION["username"]){

        }
        else{
            header('location:./pages/home.php');
        }
        include './functions/display_ctrl.php';
        $page = new Display();
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>eCalender 2.0</title>

        <!-- Bootstrap Core CSS -->
        <link href="./pages/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./pages/css/grayscale.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./pages/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <?php
            $page ->display_navigation_bar();
        ?>

        <!-- jQuery -->
        <script src="./pages/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="./pages/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="./pages/js/jquery.easing.min.js"></script>

        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script type="./pages/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <!-- Custom Theme JavaScript -->
        <script src=".pages/js/grayscale.js"></script>
    </body>

</html>