
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 3:48 PM-->
<!-- */-->

<html>
<?php
    include '../functions/display_ctrl.php';
    $page = new Display();
    $page ->display_head_tag();
?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!--Navigation Bar-->
    <?php
        $page ->display_navigation_bar();
    ?>
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <form class="form-horizontal" >
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control"  placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit"  formmethod="post" formaction="../handlers/login_hndlr.php" class="btn btn-default">Login</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- jQuery -->
    <script src="grayscale/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="grayscale/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="grayscale/js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="grayscale/js/grayscale.js"></script>
</body>
</html>