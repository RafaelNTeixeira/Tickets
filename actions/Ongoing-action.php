<?php 

declare(strict_types=1); 

require_once('../utils/session.php');
require_once('../database/connection.db.php'); 
require_once('../database/user.class.php'); 


$session = new Session(); 

$db = getDatabaseConnection(); 

$uid = $_SESSION['id']; #the id of the current user 

$sender_id = $_POST['sender_id']; #who sent the ticket originally
$recipient_id = $_POST['recipient_id']; #id of the site worker
$body = $_POST['body']; #content of the ticket being responded to
$date = $_POST['date']; #date the ticket was submitted originally
$response = $_POST['response']; #What the agent wrote a an answer

$response_id = $_POST['response_id']; #ticket identifier

$sql = "INSERT INTO Responses (sender_id, recipient_id, sender_content, date_sent, answer) VALUES ('$sender_id','$recipient_id','$body','$date','$response')"; #aqui quero responder o ticket ou seja mandar para a tabela responses

$db->query($sql);
    header('Location: ../pages/Ongoing-page.php'); 

?>