<?php
// edit-profile-action.php

declare(strict_types=1);

session_start();

require_once('../database/connection.db.php');
require_once('../database/user.class.php');

// Retrieve the values from the form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Update the user profile in the database
$db = getDatabaseConnection();
$db = getDatabaseConnection();

// Assuming you have a specific user ID, replace 'user_id' with the actual user ID
$userID = $_SESSION['id']; // Retrieve the user ID from the session or any other way you have it stored

$sql = "UPDATE User SET username = '$username', email = '$email', password = '$password' WHERE user_id = $userID";

$db->query($sql);

// Redirect to a success page or any other desired location
header('Location: ../pages/profile-page.php');
exit();
?>
