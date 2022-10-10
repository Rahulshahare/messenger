<?php
if(!empty($_POST['user_one']) && !empty($_POST['user_two']) && !empty($_POST['conversation_id']) ){
    $user_one = $_POST['user_one'];
    $user_two = $_POST['user_two'];
    $conversation_id = $_POST['conversation_id'];
    $message = urldecode($_POST['message']);

    include_once"../database/db.php";
    $stm = $dbh->prepare('INSERT INTO messages 
                                    (conversation_id, user_from, user_to, message, timestamp) 
                                    VALUES (:conversation_id,:user_from,:user_to, :message, :timestamp)' 
                                );
            $stm->execute(
                            array(
                                ":conversation_id"=>"$conversation_id",
                                ":user_from"=>"$user_one",
                                ":user_to"=>"$user_two",
                                ":message"=>"$message",
                                ":timestamp"=>date("Y.m.d H:i:s")
                                
                            )
                    );
            $id = $dbh->lastInsertId();

            if($id){
                echo"send";
            }
    
    unset($dbh); //Unsetting database connection
}else{
    echo"ERROR WHILE SAVING MESSAGE";
}
?>