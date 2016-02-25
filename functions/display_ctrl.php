
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 3:50 PM-->
<!-- */-->

<?php
    include (__DIR__."/../Entities/Users.php");

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
        <link href="../pages/grayscale/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../pages/grayscale/css/grayscale.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../pages/grayscale/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<!--        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
        <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
<!--        <![endif]-->
    </head>
    <?php
    }
     function display_navigation_bar(){

    ?>
        <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

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
                               $userObj = new User();
                               $username = $userObj::getUserDetails($_SESSION["username"],"username");
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


        function display_index_panels($userid,$date){
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if($date === "today"){
                $date = date("Y-m-d");
            }
            $query = "select * from tasks where  dateTask='$date' and userid=$userid";
            $queryPrepared = $pdo->prepare($query);
            $queryPrepared->execute(array($date,$userid));
            echo '<div class="container">
                <table class="table" class="fixed">
                <col width="600px"/>
                <col width="30px"/>
                <col width="30px"/>
                <col width="4px"/>';

            while( $row = $queryPrepared->fetch(PDO::FETCH_ASSOC)){
                $taskid = $row["id"];
                echo '

                <tr>
                <td>
                    '.$row["task"].'
                </td>
                <td colspan="2" style="text-align:center">
                    '.$row["startTime"].'-'.$row["endTime"].'
                </td>
                <input type="hidden" name="taskid" value="'.$taskid.'"/>
                <td>
                <button type="submit" formaction="./handlers/taskDelete_hndlr.php" formmethod="post" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>
                </td>
                </tr>
               ';

            }
            echo '
                <form>
                <tr >

                    <td >
                         <input name="task" placeholder="Activity/Task" type="text" style="font-size:10pt;height:20px;width:500px;">
                    </td>



                <td >
                    <div id="datetimepicker3" class="input-append">
                        <input name="starttime" placeholder="Start Time" data-format="hh:mm:ss" type="text" size="6">
                        <span class="add-on" >
                          <i data-time-icon="icon-time">
                          </i>
                        </span>
                    </div>
                </td>

                    <td >
                        <div id="datetimepicker4" class="input-append">
                            <input name="endtime" placeholder="End Time" data-format="hh:mm:ss" type="text" size="6">
                        <span class="add-on" >
                          <i data-time-icon="icon-time" >
                          </i>
                        </span>
                        </div>
                    </td>

                    <td>
                        <button type="submit" formaction="./handlers/taskInsert_hndlr.php" formmethod="post" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span></button>
                    </td>

                </tr>


            </table>
                </div>
               </form> ';
        }

}
?>