<?php

require_once ('../database/connection.db.php');
require_once ('../database/tickets.db.php');
require_once ('../utils/session.php');

$session = new Session();

if ($session->isLoggedIn()){
    $user_id = intval($session->getId());
    $db = getDatabaseConnection();

    $list = Ticket::getTicketsByUserId($db, $user_id);

    if(count($list) == 0){
        echo "error";
    } else{
        echo json_encode($list);
    }
}   
else {
    header("..pages/login-register-page.php");
}
?>