<?php
    declare(strict_types = 1);
    require_once ('../database/user.class.php');
    require_once('../utils/session.php');
    require_once('../database/connection.db.php');
    require_once('../templates/management-page.tpl.php'); 
    
    session_start();
    $session = new Session();

    // if (!(CSRF::validate($_POST['token']))) {
    //   exit("Failed CSRF token validation");
    // }
    if(!isset($_SESSION["user"])){
      header('Location:../index.php');
      exit();
    }
    
    $user = unserialize($_SESSION['user']);
    if (!($session->isLoggedIn()) || !($user->user_access == "Admin")) {
      header('Location:../index.php');
      exit();
    }
    $db = getDatabaseConnection();

    $clients = User::getClients($db);
    $agents = User::getAgents($db);

    if ($session->isLoggedIn()) {
      drawHeader();
      drawClients($clients);
      drawAgents($agents);
    } else {
      header('Location:../pages/login-register-page.php');
      exit();
    }
  
?> 