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

        // add seedling to db
        $sql="INSERT INTO `seedlings` (`id`, `name`, `description`, `price`, `quantity`) VALUES (NULL, '$_POST[name]', '$_POST[description]', '$_POST[price]', '$_POST[quantity]');";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['addSeedlingInfo'] = "Dodano sadzonkę.";
        }else{
            $_SESSION['addSeedlingInfo'] = "Nie dodano sadzonki.";
        }
    }
    header('location: ../view/logged.php');
?>