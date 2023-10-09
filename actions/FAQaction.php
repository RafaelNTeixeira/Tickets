<?php

declare(strict_types=1);

require_once('../utils/session.php');
require_once('../database/connection.db.php');
require_once('../database/user.class.php');

$session = new Session();

$db = getDatabaseConnection();

$area = $_POST['area'];
$question = $_POST['Question'];
$response = $_POST['Answer'];

$sql = "INSERT INTO FAQs (question, response, area) VALUES (:question, :response, :area)";
$stmt = $db->prepare($sql);
$stmt->bindValue(':question', $question);
$stmt->bindValue(':response', $response);
$stmt->bindValue(':area', $area);
$stmt->execute();

header('Location: ../pages/FAQ-page.php');
