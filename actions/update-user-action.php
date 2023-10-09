<?php
declare(strict_types=1);

require_once ('../utils/session.php');
require_once ('../database/connection.db.php');
require_once ('../database/user.class.php');

header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: update-user.js");

session_start();
$session = new Session();

$db = getDatabaseConnection();

$json = json_encode($_POST);
$data = json_decode($json);

if($data->user_access == null){
    $data->user_access = "";
}

$user = new User(
    intval($data->user_id),
    $data->name,
    $data->password,
    $data->username,
    $data->user_access,
    $data->email,
    intval($data->department_id)
);

if($user->password != "" && strlen($user->password) > 0 ){
    $user->password = password_hash($user->password, PASSWORD_DEFAULT);
}

if($user->user_access != "Agent"){
    $user->department_id = null;
}

error_log(strval($user->department_id));

$userUpdated = User::updateUser($db, $user);

if(isset($userUpdated) && empty($data->admin_id)){
    $_SESSION["user"] = serialize($userUpdated);
}
?>