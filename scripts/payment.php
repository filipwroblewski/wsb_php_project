<?php
    session_start();

    $_SESSION['payment'] = 'Płatność zrealizowana pomyślnie. ';

    require_once 'connect.php';

    
    $currentTimestamp = date("Y-m-d H:i:s");
    foreach ($_SESSION['order'] as $value) {
        // createing orders in db
        $sql = "INSERT INTO `orders` (`id`, `seedling_id`, `order_quantity`, `created_at`, `status`) VALUES (NULL, '$value[id]', '$value[orderQuantity]', '$currentTimestamp', 'placed');";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['payment'] .= "Zapisano zamównienie. ";
        }else{
            $_SESSION['payment'] .= "Nie zapisano zamównienia. ";
        }

        $newQuantity = $value['quantity'] - $value['orderQuantity'];
        // update seedling quantity
        $sql = "UPDATE `seedlings` SET `quantity` = '$newQuantity' WHERE `seedlings`.`id` = $value[id];";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            $_SESSION['payment'] .= "Zaktualizowano status sadzonek. ";
        }else{
            $_SESSION['payment'] .= "Nie zaktualizowano statusu sadzonek. ";
        }
    }

    // save payment data
    $user = $_SESSION['cart']['user'];
    $fullPrice = $_SESSION['cart']['fullPrice'];
    $sql = "INSERT INTO `payment` (`id`, `user`, `full_price`, `created_at`) VALUES (NULL, '$user', $fullPrice, '$currentTimestamp');";
    $mysqli->query($sql);
    if ($mysqli->affected_rows){
        $_SESSION['payment'] .= "Zapisano zrealizowaną transakcję. ";
    }else{
        $_SESSION['payment'] .= "Nie zapisano transakcji. ";
    }

    unset($_SESSION['order']);
    unset($_SESSION['cart']);

    header('location: ../view/logged.php');
?>