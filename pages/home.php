<!DOCTYPE html>
<html lang="en">

<?php
    include 'C:\\Users\\rediet\\PhpstormProjects\\eCalender2.0\\functions\\display_ctrl.php';
    $page = new Display();
    $page ->display_head_tag();
?>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <?php
        $page ->display_navigation_bar();
    ?>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">ECalender</h1>
                        <p class="intro-text">A free, easy to use Ethiopian Calendar.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
