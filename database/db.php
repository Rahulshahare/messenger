

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

/*
login Scheme
1. user
    CREATE TABLE `messenger`.`user` ( `id` INT NOT NULL , 
    `full_name` CHAR(250) NOT NULL , `email` CHAR(250) NOT NULL ,
    `password` CHAR(250) NOT NULL , `profile_pic` CHAR(250) NOT NULL , 
    `last_login` CHAR(250) NOT NULL , `online` INT(1) NOT NULL ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/



?>

