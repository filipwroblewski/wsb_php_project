<?php
    session_start();
    if (!empty($_GET['orderid'])){
        require_once './connect.php';
        
        $sql="UPDATE `orders` SET `status` = 'sent' WHERE `orders`.`id` = $_GET[orderid];";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['orderInfo'] = "Zmieniono status rekordu o id=$_GET[orderid] jako wysłane";
        }else{
            $_SESSION['orderInfo'] = "Nie zmieniono status rekordu o id=$_GET[orderid]";
        }
    }
    header('location: ../view/logged.php');
?>