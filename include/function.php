<?php 
   function verify_query($result_set){

    global $connection;
      
       if(!$result_set){
           die("database query failed : ".mysqli_error($connection));
       }
   } 
?>