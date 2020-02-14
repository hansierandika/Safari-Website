
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
if (!isset($_SESSION['user_id'])) {
    header('Location: form.php');
}
?>

<?php
$errors = array();
$first_Name = '';
$last_Name = '';
$email = '';
$password = '';

if (isset($_POST['submit'])) {
    $first_Name = $_POST['first_Name'];
    $last_Name = $_POST['last_Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $req_fields = array('first_Name', 'last_Name', 'email', 'password');
    foreach ($req_fields as $fields) {
        if (empty(trim($_POST[$fields]))) {
            $errors[] = $fields . ' is required  ';
        }
    }
    $max_len_fields = array('first_Name' => 50, 'last_Name' => 100, 'email' => 100, 'password' => 40);
    foreach ($max_len_fields as $field => $max_len) {
        if (strlen(trim($_POST[$field])) > $max_len) {
            $errors[] = $field . ' must be less than ' . $max_len . ' characters';
        }
    }

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1 ";
    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'Email address already exits';
        }
    }

    if (empty($errors)) {
        $first_Name = mysqli_real_escape_string($connection, $_POST['first_Name']);
        $last_Name = mysqli_real_escape_string($connection, $_POST['last_Name']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $hashed_password = sha1($password);

        $query = "INSERT INTO user ( ";
        $query .= "first_Name,last_Name,email,password,is_deleted";
        $query .= ") VALUES (";
        $query .= "'{$first_Name}','{$last_Name}','{$email}','{$hashed_password}',0";
        $query .= ")";

        $result = mysqli_query($connection, $query);

        if ($result) {
            header('Location: form.php?user_added=true');
        } else {
            $errors[] = 'Failed to add New User';
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
                        <h2>Create Account</h2>
<?php
if (!empty($errors)) {
    echo '<div class="errmsg">';
    echo 'There were errors in the form <br>';

    foreach ($errors as $error) {
        echo '-' . $error . '<br>';
    }
    echo '</div>';
}
?>
                        <form action="register.php" method="POST" class="formclass">
                            <div class="form-group">
                                <lable>First Name:</lable>
                                <input type="text" name="first_Name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <lable>Last Name:</lable>
                                <input type="text" name="last_Name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <lable>email :</lable>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <lable>Password:</lable>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="Submit" name="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </body>
</html>