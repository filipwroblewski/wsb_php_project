<?php
    session_start();
    if (!empty($_GET['userid'])){

        require_once './connect.php';

        // remove user from database
        $sql="DELETE FROM users WHERE `users`.`id` = $_GET[userid]";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['info'] = "Prawidłowo usunięto rekord o id=$_GET[userid]";
        }else{
            $_SESSION['info'] = "Nie usunięto rekordu o id=$_GET[userid]";
        }
    }
    header('location: ../view/logged.php');
?>