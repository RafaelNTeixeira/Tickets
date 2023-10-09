<?php
    declare(strict_types=1);

    session_start();

    require_once '../database/connection.db.php';
    require_once '../templates/respond-ticket-page.tpl.php';
    require_once '../utils/session.php';
    require_once '../database/tickets.db.php';
    require_once '../database/department.db.php';

    $session = new Session();

    $db = getDatabaseConnection();

    if ($session->isLoggedIn()) {
        $uid = $_SESSION['id'];
        $department = User::getUserDepartmentById($db,$uid);
        $ticketsForAgent = Ticket::getOpenTicketsByDepartmentName($db,$department); 
        $ticketsForAdmin = Ticket::getAllOpenTickets($db);

        $ticketsForAdmin = Ticket::getAllOpenTickets($db);
       
        
        $user_role = User::getUserRoleById($db, $uid);
        
        if ($user_role == 'Agent') {
            drawHeaderAdmin();
            drawResponseTickets($db,$ticketsForAgent); 
        } 
        if ($user_role == 'Admin'){
            drawHeaderAdmin();
            drawResponseTickets($db,$ticketsForAdmin);
        }   
    } else {
        header('Location:../pages/login-register-page.php');
        exit();
    }
?>