<?php
    session_start(); 
?>
<?php 
    require_once('include/connection.php');
?>

<?php 
   require_once('include/function.php');
?>
<?php 
    if(isset($_SESSION['user_id'])){
        header('Location: form.php');
     }
?>

<?php 
 $user = '';
      
   
    if(isset($_POST['submit'])){
        $errors = array();

        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1){
            $errors[] = 'username is Missing/Invalid';
        }

        if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1){
            $errors[] = 'password is Missing/Invalid';
        }

        if(empty($errors)){

          $email = mysqli_real_escape_string($connection, $_POST['email']);
          $password = mysqli_real_escape_string($connection, $_POST['password']);

          $hashed_password = sha1($password);

          $query="SELECT * FROM user 
          WHERE email = '{$email}'
          AND password = '{$hashed_password}'
          LIMIT 1";

          $result_set = mysqli_query($connection, $query); 

          verify_query($result_set);
               //query succesful
               if(mysqli_num_rows($result_set) == 1){
                   // valid user found
                   $user = mysqli_fetch_assoc($result_set);
                   $_SESSION['user_id'] = $user['id'];
                   $_SESSION['first_name'] = $user['first_Name'];
                   //$_SESSION['user_id'] = $user['id'];
                   //Updating last login

                   $query = "UPDATE user SET last_Login = Now()";
                   $query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

                   $result_set = mysqli_query($connection,$query);

                   verify_query($result_set);
                   header("Location:form.php?user_id={$user[id]}");
               }else{
                   //user name and password invalid
                   $errors[] = 'Invalid User Name or Password';
               }


        }
    }

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/stylelog.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>
    <body>
        <div class="container">
            <div class="login-box">
                <div class="row">
                    <div class="col-md-6 login-left">
                        <h2>Login Into Your Account</h2>
                        <?php 
                         if(isset($errors) && !empty($errors)){
                         echo '<p class="error">Invalid User Name or Password!</p>';
                         }
                        ?>

                        <?php 
                         if(isset($_GET['logout'])){
                         echo '<p class="info"> You have successfully logout </p>';
                         }
                        ?>
                        <form action="login.php" method="POST" class="formclass">
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="text" name="email"  placeholder="Email Address" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" name="password" placeholder="Password"  class="form-control" required>
                            </div>
                            <button type="Submit" name="submit" class="btn btn-primary">Login</button>
                            
                            
                        </form>

                        <a href="register.php" class="btnnew"> <button  class="btn btn-primary">Create New Account</button></a>
                        
                    </div>

                
                </div>
            </div>
        </div>
    </body>
</html>

<?php mysqli_close($connection); ?>
