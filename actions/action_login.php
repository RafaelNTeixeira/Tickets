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

$email = $_POST['email'];
$password = $_POST['password'];


$user = User::getUserWithEmail($db, $email);
if ($user) {
    $hash = $user->password;
    if (password_verify($password, $hash)) {
        $session->setId($user->user_id);
        $session->setUser($user);
        header('Location: ../pages/profile-page.php');
        exit();
    }
    else{
        $session->addMessage('error', 'Wrong email or password!');
        header('Location: ../pages/login-register-page.php');
        exit(); 
    }
}
?>