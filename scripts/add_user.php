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

        // add user to database
        $sql="INSERT INTO `users` (`id`, `role`, `name`, `email`) VALUES (NULL, '$_POST[role]', '$_POST[name]', '$_POST[email]');";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['info'] = "Prawidłowo utworzono użytkownika";
        }else{
            $_SESSION['info'] = "Nie utworzono użytkownika";
        }
    }
    header('location: ../view/logged.php');
?>