<?php

if(!empty($_POST['conversation_id']) && !empty($_POST['last_message_id'])){
         
    include_once"../database/db.php";

    $stm = $dbh->prepare('SELECT * from ( SELECT * from messages where conversation_id = :cId AND id > :lastMsgId ORDER BY id DESC ) sub ORDER BY id ASC');
        $stm->bindValue(':cId',$_POST['conversation_id']);
        $stm->bindValue(':lastMsgId',$_POST['last_message_id']);
        $stm->execute();
        $row = $stm->fetchall(PDO::FETCH_OBJ);
            if($row){
                $json_data = json_encode($row);
                print_r($json_data);
                
            }else{
                echo "{}";
            }
    unset($dbh); //Unsetting database connection
}else{
    echo"ERROR IS GETTING NEW MSG SERVER";
}

?>