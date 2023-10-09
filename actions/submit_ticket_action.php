<?php

declare(strict_types=1);

require_once ('../utils/session.php');
require_once ('../database/connection.db.php');
require_once ('../database/user.class.php');

$session = new Session();

$db = getDatabaseConnection();

$title = $_POST['title']; 
$department = $_POST['assigned_department_id'];
$body= $_POST['body'];
$id = $session->getId(); 

$sql = "INSERT INTO Ticket (title, ticket_status, date_creation, user_id, assigned_department_id,body) VALUES ('$title','Working on', date('now') ,'$id','$department','$body')";

$db->query($sql);
    header('Location: ../pages/check-ticket-page.php');
?>