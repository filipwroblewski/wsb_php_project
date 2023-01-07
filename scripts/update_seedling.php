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

        // update seedling data
        $sql = "UPDATE `seedlings` SET `name` = '$_POST[name]', `description` = '$_POST[description]', `price` = '$_POST[price]', `quantity` = '$_POST[quantity]' WHERE `seedlings`.`id` = $_SESSION[updateseedlingid];";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['info'] = "Prawidłowo zaktualizowano rekord";
        }else{
            $_SESSION['info'] = "Nie zaktualizowano rekordu";
        }
    }
    header('location: ../view/logged.php');
?>