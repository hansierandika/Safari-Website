<?php
require_once('include/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Udawalawa National Park</title>
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

            <div class="wrapper">
                <h2><font color="#006400">Udawalawa National Park</font></h2>

                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext">1/3</div>
                        <img src="image/u1.jpg" width="100%" height="50%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2/3</div>
                        <img src="image/u2.jpg" width="100%" height="50%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3/3</div>
                        <img src="image/u3.jpg" width="100%" height="50%">
                    </div>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <script>
                    var slideIndex = 0;
                    showSlides();

                    function showSlides() {
                        var i;
                        var slides =
                                document.getElementsByClassName("mySlides");
                        var dots =
                                document.getElementsByClassName("dot");
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        slideIndex++;
                        if (slideIndex > slides.length)
                        {
                            slideIndex = 1
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace("active", " ");
                        }
                        slides[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " active";
                        setTimeout(showSlides, 3000);
                    }
                </script>



                Best time of the year to visit<br>
                <b>Throught the year but the prime time is from October to April</b><br><br>

                Open Hours<br>
                <b>6AM to 6PM</b><br><br>

                Activities
                <b><ul><li>Wild Safari</li>
                        <li>Wildlife Sanctuaries</li>
                        <li>Nature & Wildlife</b></li></ul><br>

                    <b>Little bit about Udawalawa National Park</b><br><br>
                    The third most visited  park in sri lanka, Udawalawa National Park is a popular tourist destination. The park is located 165km away from the city of Colombo.
                    Udawalawa national park, the sixth largest animal sanctuary of sri lanka is located 180km from Colombo in south-central sector of the island.
                    The National is situated just south of the central Higlands.

                    <p><b>How to reach Udawalawa National Park?</b><br><br>
                        The entrance to Udawalawa National Park is located near 11km post between Timboletiya and Tanamanwila on Pelmadulla-Timbolketiya A18 road.

                    <p><b>Things to know before you go</b>
                    <ul><li>Best time to enter the park-6AM and 3PM</li>
                        <li>Do not feed the animals</li>
                        <li>No smoking and No liquor</li>
                        <li>Do not tease the animals</li>
                        <li>Eat at designated rest areas only</li>
                        <li>Do not get down from the safari jeep</li>
                        <li>always listen to the driver's and guide's instructions</li></ul>

                    <h4>Tikets<br><br>Safari Jeep Price*</h4>
                    Half day from LKR 4 500-6 000<br>
                    Full day from around LKR 10 000

                    <h4>Wilpattu National Park Entrance Fee for Foreigners</h4>
                    <table border="1"><tr><th> </th>
                            <th>Single visit</th>
                            <th>Overnight Stay</th>
                            <th>Two visit same day</th></tr>
                        <tr><td>Adult</td>
                            <td>$15</td><td>$30</td><td>$25</td></tr>
                        <tr><td>Kids(6-12yrs)</td><td>$8</td><td>$16</td><td>$12</td></tr>
                    </table>

                    <h4>Wilpattu National Park Entrence Fee for Locals</h4>
                    <table border="1"><tr><th> </th>
                            <th>Single visit</th>
                            <th>Overnight Stay</th>
                            <th>Two visit same day</th></tr>
                        <tr><td>Adult</td>
                            <td>LKR60</td><td>LKR120</td><td>LKR100</td></tr>
                        <tr><td>Kids(6-12yrs)</td><td>LKR30</td><td>LKR60</td><td>LKR50</td></tr>
                        <tr><td>School kids</td><td>LKR 20</td>
                    </table>


                    <?php include('./footer.php'); ?>