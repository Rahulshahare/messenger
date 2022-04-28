<?php
if(!empty($_GET['userId'])){
    $userId = $_GET['userId'];
    require_once"../database/db.php";

    $stm = $dbh->prepare("SELECT `id`, `full_name`, `email`, `profile_pic`, `register_on`,`last_login`, `online` FROM `user` WHERE id != :id ORDER BY full_name ASC");
    $stm->bindValue(":id", $userId);
    $stm->execute();
    $row = $stm->fetchAll(PDO::FETCH_OBJ);
    if($row){
        print_r( json_encode($row));
    }
}

?>

