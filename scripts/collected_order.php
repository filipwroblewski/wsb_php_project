<?php
    session_start();
    if (!empty($_GET['orderid'])){
        require_once './connect.php';
        
        // change order status on collected
        $sql="UPDATE `orders` SET `status` = 'collected' WHERE `orders`.`id` = $_GET[orderid];";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['orderInfo'] = "Zamówienie zostało pomyślnie odebrane";
        }else{
            $_SESSION['orderInfo'] = "Zamówienie nie zostało odebrane";
        }
    }
    header('location: ../view/logged.php');
?>