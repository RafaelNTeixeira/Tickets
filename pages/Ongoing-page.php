<?php 

    declare(strict_types=1);
    session_start();

    require_once '../database/connection.db.php';
    require_once '../templates/Ongoing-page-tpl.php';
    require_once '../utils/session.php';
    require_once '../database/response.class.php';
    require_once '../database/department.db.php';

    $session = new Session();

    $db = getDatabaseConnection();


    if ($session->isLoggedIn()) {
        drawHeader();

        $uid = $_SESSION['id'];
        
        $responses = Response::getAllResponsesByID($db, $uid); 
        $responsesAd = Response::getAllResponsesByRecipientID($db, $uid); 

        $user_role = User::getUserRoleById($db, $uid);

        if ($user_role == "Agent") {
            drawResponseTickets($db, $responsesAd); 
          }
          else if ($user_role == "Admin") {
            drawResponseTickets($db, $responsesAd); 
          }
          else {
            drawResponseTickets($db, $responses); 
          }
        
    } else {
        header('Location:.../pages/login-register-page.php');
        exit();
    }