<?php
if(!empty($_POST['user_one']) && !empty($_POST['user_two'])){
    $user_one = $_POST['user_one'];
    $user_two = $_POST['user_two'];
    //echo"yes";
    require_once"../database/db.php";

    $stm =  $dbh->prepare('SELECT * FROM `conversation` 
                                WHERE 
                            (user_one=:user_one AND user_two=:user_two) 
                                OR 
                            (user_one=:user_two AND user_two=:user_one)'
                        );
        $stm->bindValue(':user_one',$user_one);
        $stm->bindValue(':user_two',$user_two);
        $stm->execute();
        $count = $stm->rowCount();
        $row = $stm->fetchall(PDO::FETCH_OBJ);
            if($row){
                foreach($row as $key){
                    $conversation_id = $key->id;
                }
                echo $conversation_id;
            }else{
                //Inserting into conversation
                $stm = $dbh->prepare('INSERT INTO conversation (user_one, user_two) VALUES (:user_one, :user_two)');
                $stm->bindValue(':user_one',$user_one);
                $stm->bindValue(':user_two',$user_two);
                $stm->execute();
                $conversation_id = $dbh->lastInsertId();
                    echo $conversation_id;
            }


}else{
    echo"ERROR";
}

?>