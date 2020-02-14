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
    header('Location: login.php');
}
?>

<?php
$user_id = '';
$user_list = '';
// $errors = array();
// $sucess = array();
// $safari = '';
// $duration = '';
// $date = '';
// $name = '';
// $email = '';
// $contact_Num = '';


if (isset($_SESSION['user_id'])) {

    $user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);
    $query = "SELECT * FROM user WHERE id = {$user_id} LIMIT 1";
    // $user_id = $_SESSION['user_id'];
    //$email = mysqli_real_escape_string($connection, $_POST['email']);
    // $query = "SELECT email FROM user WHERE id = '{$user_id}' LIMIT 1 ";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $email = $result['email'];

            //$user_list = '';
            //getting the list of users

            $query = "SELECT * FROM triptable WHERE email='$email' ORDER BY id";
            $data = mysqli_query($connection, $query);

            verify_query($data);
            while ($user = mysqli_fetch_assoc($data)) {
                $user_list .= "<tr>";
                $user_list .= "<td>{$user['safari']}</td>";
                $user_list .= "<td>{$user['duration']}</td>";
                $user_list .= "<td>{$user['date']}</td>";
                $user_list .= "<td>{$user['name']}</td>";
                $user_list .= "<td>{$user['email']}</td>";
                $user_list .= "<td>{$user['contact_Num']}</td>";
                $user_list .= "<td><a href=\"delete-data.php?user_id={$user['id']}\">Delete</a></td>";
                $user_list .= "</tr>";
            }
        } else {
            header('Location: form.php?err=query_failed');
        }
    }
}
?>
<style>
    .form{
        background: url('image/m1.jpg')no-repeat center center fixed;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size:cover;
    }
</style>
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
            <body class="form">

                <h1><font color="white">Safari In Sri Lanka</font></h1>

                <table >

                    <tr>
                        <th>Safari</th>
                        <th>Duration</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Contact Number</th>
                        <th>Delete</th>

<?php echo $user_list; ?>
                    </tr>
                </table>




                <a href="form.php"><font color="red"><u>Back</u></font></a>
            </body>
    </body>
</html>
<?php mysqli_close($connection); ?>

