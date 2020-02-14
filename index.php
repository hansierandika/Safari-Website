<!-- <div class="top-bar clearfix">
    <div class="top-bar-word">
        <ul>
            <li>nomadism</li>
            <li>nomadism</li>
        </ul>
    </div>
    <div class="site-search">
        <form method="get" action="2nd.html">
            <input type="search" name="search-box">
            <button type="submit"></button>
        </form>
    </div>
</div> -->
<?php
require_once('include/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Safari In Sri Lanka</title>
        <!--        <link rel="stylesheet" type="text/css" href="asform.css">-->
        <link rel="stylesheet" type="text/css" href="css/topbar.css">
    </head>
    <body bgcolor="#48D1CC">
        <div class="wrapper">


            <header class="clearfix">
                <div class="logo">
                    <h1 style="font-size:50;"><font face="Brush Script MT"><b>Nomadism</b></font face></h1>
                    <p>Safari In Sri Lanka</p>
                </div>
            </header>

            <?php include('./header.php'); ?>

            <div class="intro clearfix">
                <div class="introimage">
                    <image src="image/m2.jpg" width="550" height="400">
                </div>
                <div class="introtext">
                    <h1><font color="#006400"><center>Safari in sri lanka</center></font></h1><br>
                    <h3><center>Get a Firsthand Experience of Nature at her best:<br> Safari in Sri Lanka</center></h3><br><br><br><br>
                    <p><center>Life is either a daring adventure or nothing.<br> The wildlife and its habitat cannot speak,<br>
                        so we must and we will............</center></p>
                </div>
            </div>

            <div class= "homecontent clearfix">
                <div class="home-col">
                    <center><h4>Wilpattu National Park</h4></center><br>
                    <a href="wilpattu.php"><img src="image/w4.jpg" width="256" height="175"></a>
                </div>

                <div class="home-col">
                    <h4><center> Udawalawa National Park</center></h4><br>
                    <a href="udawalawa.php"><img src="image/u4.jpg" width="256" height="175"></a>
                </div>

                <div class="home-col">
                    <h4> <center>Kumana National Park</center></h4><br>
                    <a href="Kumana.php"><img src="image/k4.jpg" width="256" height="175"></a>
                </div>

                <div class="home-col">
                    <h4><center>Bundala National Park</center></h4><br>
                    <a href="Bundala.php"><img src="image/b4.jpg" width="256" height="175"></a>
                </div>

            </div>
        </div>



        <?php mysqli_close($connection); ?>

        <?php include('./footer.php'); ?>

