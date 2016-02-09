
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 3:50 PM-->
<!-- */-->

<?php
    include 'db_access.php';

    class Display{
        private static $buttons = array("home"=> "home.php","login"=>"login.php","register"=>"register.php");
        function display_head_tag(){
?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>eCalender 2.0</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/grayscale.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php
    }
    function display_navigation_bar(){

    ?>
        <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <!--<a class="navbar-brand page-scroll" href="#page-top">-->
                    <!--<i class="fa fa-play-circle"></i>  <span class="light">Start</span> Bootstrap-->
                <!--</a>-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                   <?php
                       while(list($name,$url)= each(self::$buttons)){
                           if(!($this->isURLcurrentPage($url)) && !(strpos($_SERVER['SCRIPT_NAME'], "index.php"))){
                               $this->display_navigation_link($name,$url);
                           }
                           else if(strpos($_SERVER['SCRIPT_NAME'], "index.php")){
                               //TODO: change username to firstname and lastname
                               $username = Database::getUserDetails($_SESSION["username"],"username");
                               echo '<li>
                                        <a style="color:#ffffff">Welcome &nbsp;'.$username.'</a>
                                    </li>';
                               $this->display_navigation_link("logout","./pages/logout.php");
                               break;
                           }
                       }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php
    }
    function isURLcurrentPage($url){
        if(strpos($_SERVER["SCRIPT_NAME"],$url)){
            return true;
        }
        else
            return false;
    }
    function display_header(){

    }

    function display_footer(){

    }

    function display_navigation_link($name,$url){
        echo '<li>
            <a class="page-scroll" href="'.$url.'">'.$name.'</a>
        </li>';
    }

    function display_content(){

    }

}
?>