<?php
    declare(strict_types = 1);

    require_once('../templates/login-register-page.tpl.php');
    require_once('../utils/session.php');
   
   drawHeader();
   
   $session = new Session(); 

   if ($session->isLoggedIn()) {
     session_destroy();
     drawLoginForm();
     drawRegisterForm();
   }
   else {
        drawLoginForm(); 
        drawRegisterForm();
   }
?> 