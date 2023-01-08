<?php
    session_start();
    if (!empty($_GET['orderid'])){
        require_once './connect.php';
        
        // update order status to sent
        $sql="UPDATE `orders` SET `status` = 'sent' WHERE `orders`.`id` = $_GET[orderid];";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['orderInfo'] = "Zmieniono status rekordu o id=$_GET[orderid] jako wysłane";
        }else{
            $_SESSION['orderInfo'] = "Nie zmieniono status rekordu o id=$_GET[orderid]";
        }

        $sql = "SELECT `payment`.`user` FROM `payment` JOIN `orders` ON `payment`.`created_at` = `orders`.`created_at` WHERE `orders`.`id` = '$_GET[orderid]';";
        $result = $mysqli->query($sql);
        $payment = $result->fetch_assoc();
        $user = $payment['user'];
        require_once 'notification.php';
    }

    header('location: ../view/logged.php');
?>