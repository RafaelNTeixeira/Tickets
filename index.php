<?php
    declare(strict_types = 1);

    session_start();

    require_once('database/connection.db.php');
    require_once('templates/index.tpl.php');
    require_once('utils/session.php');
    require_once('database/user.class.php');

    $session = new Session(); 

    $db = getDatabaseConnection();

    if ($session->isLoggedIn()) {
      $uid = $_SESSION['id'];
      $user_role = User::getUserRoleById($db, $uid);
      
      if ($user_role == "Agent") {
        drawHeaderLogoutAgent();
      }
      else if ($user_role == "Admin") {
        drawHeaderLogoutAdmin();
      }
      else {
        drawHeaderLogout(); 
      }
   }
   else {
      drawHeaderLogin(); 
   }
    drawIntro(); 

?> 