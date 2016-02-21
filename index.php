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
            exit;
        }
        include './functions/display_ctrl.php';
        $username = $_SESSION["username"];
        $page = new Display();
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>eCalender 2.0</title>

        <!-- Include Date Range Picker -->

        <link rel="stylesheet" type="text/css" href="daterangepicker/css/daterangepicker.css" />

        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen"
              href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

<!--        <!-- Bootstrap Core CSS -->
        <link href="pages/grayscale/css/bootstrap.min.css" rel="stylesheet">
<!---->
<!--        <!--  Custom CSS -->
<!--        <link href="./pages/css/grayscale.css" rel="stylesheet">-->

        <link href="pages/grayscale/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">-->
<!--        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">-->

<!--         HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--         WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--        [if lt IE 9]>-->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<!--        <![endif]-->
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Ecalendar</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        echo '<li>
                               <a style="color:#aaaaaa; font-size: 120%; font-weight: bold" href="index.php">Welcome &nbsp;'.$username.' </a>
                           </li>';
                        ?>
                        <li>
                            <a style="column-rule: #aaaaaa;font-size:120%; font-weight: bold" href="./pages/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            <div class="container">
                <div class="row">
                    <h2 align="center"> Activities on </h2>
                </div>
            </div>
        </div>

          <div>
              <div class="container">
                  <div class="row">
                      <div align="center">
                             <input type="text" name="birthdate">
                      </div>
                  </div>
              </div>
          </div>
        </br>
        </br>
        </br>





        <?php
            $userid = Database::getUserDetails($username,"id");
            $page->display_index_panels($userid);
        ?>


        <!-- jQuery -->
        <script src="pages/grayscale/js/jquery.js"></script>


<!--        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>-->
        <script type="text/javascript" src="daterangepicker/js/moment.js"></script>

        <script type="text/javascript" src="daterangepicker/js/daterangepicker.js"></script>
        <script type="text/javascript"
                src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
        </script>

        <script type="text/javascript">
            $(function() {
                $('input[name="birthdate"]').daterangepicker({
                    startDate:moment(),
                    opens:'center',
                    singleDatePicker: true,
                    locale: {
                        format: 'MMMM D, YYYY'
                    }
                });
            });
            $(document).ready(function(){

            // Select all elements with data-toggle="tooltips" in the document
            $('.glyphicon-save').tooltip({title:"Save",placement: function (tooltip, element) {

                    var position = $(element).position();
                    var width = $(window).height();
                    console.log(position);

                    window.setTimeout(function() {
                        console.log(position);
                        $(tooltip)
                            .addClass('right')
                            .css({top: position['top']-5,left:position['left']+10})
                            .find('.tooltip-arrow').css({top:'50%',left: '1%'});

                        $(tooltip).addClass('in');
                    },0);

            }});
                });

        </script>
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({pickDate:false});
                $('#datetimepicker4').datetimepicker({pickDate:false});
            });
        </script>

        <!-- Bootstrap Core JavaScript -->
        <script src="pages/grayscale/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="pages/grayscale/js/jquery.easing.min.js"></script>


<!--         Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script type="./pages/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <!-- Custom Theme JavaScript -->
        <script src="pages/grayscale/js/grayscale.js"></script>
    </body>
</html>