<?php
session_start();
print_r($_SESSION);
if(isset($_SESSION['LoggedInUser'])){
    $_SESSION = array();
    unset($_SESSION['LoggedInUser']);
    unset($_SESSION['UserId']);
    unset($_SESSION['loggedin_time']);
    unset($_SESSION['profile_pic']);
    unset($dbh);


    session_destroy(); //destroy the all sessions
    $dbh="";

    header('Location: index.php');
}
?>