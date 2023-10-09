<?php
    declare(strict_types = 1);

    require_once('../database/connection.db.php');
    require_once('../templates/management-page.tpl.php'); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['agent_id'], $_POST['role'])) {
            $db = getDatabaseConnection();
            $agent_id = $_POST['agent_id'];
            $role = $_POST['role']; 
        
            try {
                $stmt = $db->prepare('UPDATE User SET user_access = :role WHERE user_id = :user_id');
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':user_id', $agent_id);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    header('Location: ../pages/management-page.php');
    exit;
?>
