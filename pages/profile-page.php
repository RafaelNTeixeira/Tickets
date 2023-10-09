<?php
    declare(strict_types = 1);

    require_once('../database/connection.db.php');
    require_once('../templates/profile-page.tpl.php');
    require_once('../utils/session.php');
    require_once('../database/user.class.php');

    session_start();
    $session = new Session(); 
    if(!isset($_SESSION["id"])){
      header("Refresh:0");
      }
    $db = getDatabaseConnection();

    if ($session->isLoggedIn()) {
      $uid = $_SESSION['id'];
      $user = User::getUserWithUserId($db, $uid);
      $_SESSION["user"] = serialize($user);

      if ($user->user_access == "Admin") {
        drawHeaderAdmin();
      } else {
        drawHeader();
      }
      drawEditProfileButton(); 
      drawCards($user);
    }
    else {
      header('Location:../login-register-page.php');
      exit();
    }
?> 