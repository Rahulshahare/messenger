<?php
if(!empty($_GET['userId'])){
    $userId = $_GET['userId'];
    require_once"../database/db.php";

    $stm = $dbh->prepare("SELECT * FROM `user` WHERE id != :id ORDER BY full_name ASC");
    $stm->bindValue(":id", $userId);
    $stm->execute();
    $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    if($row){
        print_r( json_encode($row));
    }
}

?>

