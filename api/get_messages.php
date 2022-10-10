<?php
if(!empty($_POST['conversation_id'])){
    $conversation_id = $_POST['conversation_id'];

    include_once"../database/db.php";
    $stm = $dbh->prepare('SELECT * from ( SELECT * from messages where conversation_id = :conversation_id ORDER BY id DESC  ) sub ORDER BY id ASC');
        //$stm = $dbh->prepare('SELECT * FROM messages WHERE conversation_id = :conversation_id ORDER BY id DESC ');
        $stm->bindValue(':conversation_id',$conversation_id);
        $stm->execute();
        $row = $stm->fetchall(PDO::FETCH_OBJ);
            if($row){
                 $json_data = json_encode($row);
                 //$post_data = json_encode(array('item' => $row), JSON_FORCE_OBJECT);
                 print_r($json_data);
                
            }else{
                echo"{}";
            }
            
    unset($dbh); //Unsetting database connection
}else{
    echo"ERROR IN GETTING MESSAGES";
}
?>