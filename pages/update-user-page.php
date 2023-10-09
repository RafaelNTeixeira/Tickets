<?php
    declare(strict_types = 1);

    session_start();
    

    if(!isset($_SESSION["user"])){
        header('Location:../index.php');
        exit();
    }

    require_once ('../database/connection.db.php');
    require_once ('../database/department.db.php');
    require_once('../templates/update-user-page.tpl.php');
    require_once('../database/user.class.php');

    $db = getDatabaseConnection();

    $user_id = intval($_GET["user_id"]);
    $admin_id = intval($_GET["admin_id"]);

    error_log(strval($admin_id));

    $user = User::getUserWithUserId($db, $user_id);
    $departmentList = Department::getAllDepartments($db);
    foreach($departmentList as $d){
            error_log(strval($d->id));
            error_log($d->department_name);
    }

    drawHeader(); 
    drawSubmitUserForm($user, $departmentList, $admin_id); 
?> 