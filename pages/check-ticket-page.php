<?php
    declare(strict_types = 1);

    session_start(); 
 
    require_once('../database/connection.db.php');
    require_once('../templates/check-ticket-page.tpl.php'); 
    require_once('../utils/session.php');
    require_once('../database/tickets.db.php');

    $session = new Session();

    $db = getDatabaseConnection();

    $uid = $_SESSION['id'];

    if ($session->isLoggedIn()) {
      $uid = $_SESSION['id'];
      $tickets = Ticket::getUserTickets($db, $uid);
      $user_role = User::getUserRoleById($db, $uid);
      if ($user_role == 'Client') {
        drawHeader();
        drawSubmitButton(); 
        drawTickets($tickets);
      }

      if ($user_role == 'Agent') {
        drawHeader(); 
        drawSubmitButton(); 
        drawTickets($tickets); 
      }

      if ($user_role == 'Admin') {
        drawHeaderAdmin(); 
        drawSubmitButton(); 
        drawTickets($tickets);
      }
    }
    else {
      header('Location:../pages/login-register-page.php');
      exit();
    }
?> 