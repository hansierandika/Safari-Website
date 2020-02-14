
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
    header('Location: index.php');
}



if (isset($_GET['user_id'])) {
    //getting user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    // if($user_id == $_SESSION['user_id']){
    //     header('Location: users.php?err=cannot_delete_current_user');
    // }else{
    $query = "DELETE FROM triptable WHERE id = '$user_id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        //user deleted
        header('Location: edit-form.php?msg=user_deleted');
    } else {
        header('Location: edit-form.php?err=delete_failed');
    }
} else {
    header('Location: form.php');
}
?>

<?php mysqli_close($connection); ?>

