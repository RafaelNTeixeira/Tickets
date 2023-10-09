<?php

declare(strict_types=1);

require_once ('../utils/session.php');
require_once ('../database/connection.db.php');
require_once ('../database/user.class.php');

$session = new Session();

// if(!(CSRF::validate($_POST['token']))){
//     exit("Failed CSRF token validation");
// }

$db = getDatabaseConnection();


$name = htmlspecialchars($_POST['name']); 
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user = new User(0, $name, $password, $username, "Client", $email, null);

// $sql = "INSERT INTO User (name, password, email, username, user_access) VALUES ('$name','$password','$email','$username','Client')";

// $db->query($sql);

User::InsertUser($db, $user);

header('Location: ../pages/login-register-page.php');
?>