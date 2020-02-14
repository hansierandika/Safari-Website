
<?php
session_start();
?>
<?php
require_once('include/connection.php');
?>

<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
?>

<?php
$user_id = '';
$errors = array();
$sucess = array();
$safari = '';
$duration = '';
$date = '';
$name = '';
$email = '';
$contact_Num = '';


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
            $first_Name = $result['first_Name'];
            $last_Name = $result['last_Name'];
            $email = $result['email'];
            $name = $first_Name . ' ' . $last_Name;
        } else {
            //user not found
            header('Location: users.php?err=user_not_found');
        }
    } else {
        header('Location: users.php?err=query_failed');
    }
}


if (isset($_POST['submit'])) {

    $safari = $_POST['safari'];
    $duration = $_POST['duration'];
    $date = $_POST['date'];

    // $email = $_POST['email'];
    $contact_Num = $_POST['contact'];


    $req_fields = array('safari', 'duration', 'date', 'contact');
    foreach ($req_fields as $fields) {
        if (empty(trim($_POST[$fields]))) {
            $errors[] = $fields . ' is required  ';
        }
    }



    if (empty($errors)) {
        $safari = mysqli_real_escape_string($connection, $_POST['safari']);
        $duration = mysqli_real_escape_string($connection, $_POST['duration']);
        $date = mysqli_real_escape_string($connection, $_POST['date']);
        // $name = mysqli_real_escape_string($connection, $_POST['name']);
        // $email = mysqli_real_escape_string($connection, $_POST['email']);
        $contact_Num = mysqli_real_escape_string($connection, $_POST['contact']);

        $query = "INSERT INTO triptable ( ";
        $query .= "safari,duration,date,name,email,contact_Num";
        $query .= ") VALUES (";
        $query .= "'{$safari}','{$duration}','{$date}','{$name}','{$email}','{$contact_Num}'";
        $query .= ")";

        $result = mysqli_query($connection, $query);

        if ($result) {
            $sucess[] = "Successfully added new record.!";
        } else {
            $errors[] = 'Failed to add new record.';
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

                <?php
                if (!empty($sucess)) {
                    echo '<div class="msg">';

                    foreach ($sucess as $error) {
                        echo '-' . $error . '<br>';
                    }
                    echo '</div>';
                }
                ?>

                <form action="form.php" method="post" >
                    <fieldset>
                        <legend><h1><font color="Yellow">Plan your trip today</font></h1></legend>
                        <font color="white">

                        Select Your Safari:<br>
                        <select name="safari">
                            <option value="1">Wilpattu National Park </option>
                            <option value="2">Udawalawa National Park</option>
                            <option value="3">Kumana National Park</option>
                            <option value="4">Bundala National Park</option>
                        </select><br><br>

                        Duration:<br>
                        <select name="duration">
                            <option value="1">Full Day(6am-6pm)
                            <option value="2">Half Day(6am-12pm)
                        </select><br><br>

                        Select Date:<br>
                        <input type=text name="date"><br><br>

                        Name:<br>
                        <input type=text name="name" <?php echo 'value= "' . $name . '"'; ?> disabled><br><br>

                        Email Address:<br>
                        <input type=text name="email"  <?php echo 'value= "' . $email . '"'; ?> disabled><br><br>

                        Contact Number:<br>
                        <input type=text name="contact"><br><br>

                        <input type="Submit" name="submit" value="Submit">

                        </font>
                    </fieldset>
                </form>
                <a href="edit-form.php"><font color="white"><u>Your Trips</u></font></a>

            </body>
    </body>
</html>
<?php mysqli_close($connection); ?>

<?php include('./footer.php'); ?>