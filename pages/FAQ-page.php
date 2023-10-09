<?php
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../templates/FAQ.tpl.php');
    require_once('../database/FAQ.class.php');
    require_once('../utils/session.php');
    require_once('../database/user.class.php');

    $session = new Session(); 

    $db = getDatabaseConnection();

    if ($session->isLoggedIn()) {
      $uid = $_SESSION['id'];
      $user_role = User::getUserRoleById($db, $uid);
      $FAQs = FAQ::getAllFAQs($db); 
      
      if ($user_role == "Agent") {
        drawHeader();
        drawFAQsAgentAdmin($db,$FAQs); 
      }
      else if ($user_role == "Admin") {
        drawHeader();
        drawFAQsAgentAdmin($db,$FAQs);
      }
      else {
        drawHeader(); 
        drawFAQs($db,$FAQs); 
      }
   }
   else {
    header('../pages/login-register-page.php'); 
   } 

?> 