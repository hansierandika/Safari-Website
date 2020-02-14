<?php 
    
    //$connection = mysqli_connect(dbserver, dbuser, dbpass, dbname); //connect to database

    $connection = mysqli_connect('localhost','root','','userdb');

    //mysqli_connect_errno(); mysqli_connect_error();

    if(mysqli_connect_errno()){
       die('Database Connection failed' . mysqli_connect_error());
    }else{
        //echo "connection successful!";
    }
   
?>