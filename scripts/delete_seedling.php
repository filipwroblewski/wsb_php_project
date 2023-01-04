<?php
    session_start();
    if (!empty($_GET['seedlingid'])){
        require_once './connect.php';
        $sql="DELETE FROM seedlings WHERE `seedlings`.`id` = $_GET[seedlingid]";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['info'] = "Prawidłowo usunięto rekord o id=$_GET[seedlingid]";
        }else{
            $_SESSION['info'] = "Nie usunięto rekordu o id=$_GET[seedlingid]";
        }
    }
    header('location: ../view/logged.php');
?>