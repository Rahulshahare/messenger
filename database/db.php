

<?php
date_default_timezone_set("Asia/Kolkata");


//mysql hostname
$hostname = 'localhost';
// mysql username
$username = 'root';
// mysql password
$password = '';
// Database name
$db = 'messenger';


//Connection to database
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
    $dbh->exec("set names utf8mb4");
}catch(PDOException $e){
    echo "An Error occured!"; //Error message
    echo $e->getMessage();
}





?>