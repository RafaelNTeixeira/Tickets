<?php 

declare(strict_types=1); 

require_once('../utils/session.php');
require_once('../database/connection.db.php'); 
require_once('../database/user.class.php'); 

$session = new Session(); 

$db = getDatabaseConnection(); 

$uid = $_SESSION['id']; // the id of the agent in charge

$id = $_POST['user_id']; // who sent the ticket originally
$body = $_POST['body']; // content of the ticket being responded to 'Responding to: '
$date = $_POST['date']; // date the ticket was submitted 'Date: '
$response = $_POST['response']; // What the agent wrote as an answer 'Answer: '

$ticket_id = $_POST['ticket_id']; // ticket identifier

$sql = "INSERT INTO Responses (sender_id, recipient_id, sender_content, date_sent, answer) VALUES (?, ?, ?, ?, ?)"; // insert the response into the Responses table
$stmt = $db->prepare($sql);
$stmt->execute([$id, $uid, $body, $date, $response]);

$sql2 = "UPDATE Ticket SET ticket_status = 'Done' WHERE id = ?"; // update the status of the ticket to 'Done'
$stmt2 = $db->prepare($sql2);
$stmt2->execute([$ticket_id]);

    header('Location: ../pages/respond-ticket-page.php'); 

?> 