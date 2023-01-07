<?php
    session_start();
    if (isset($_POST)){
        foreach ($_POST as $value){
            if (empty($value)){
                header('location: ../view/logged.php');
                exit();
            }
        }

        require_once './connect.php';

        // update user data
        $sql = "UPDATE `users` SET `role` = '$_POST[role]', `name` = '$_POST[name]', `email` = '$_POST[email]' WHERE `users`.`id` = $_SESSION[updateuserid];";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['info'] = "Prawidłowo zaktualizowano rekord";
        }else{
            $_SESSION['info'] = "Nie zaktualizowano rekordu";
        }
    }
    header('location: ../view/logged.php');
?>