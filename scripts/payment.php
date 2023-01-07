<?php
    session_start();

    $_SESSION['payment'] = 'Płatność zrealizowana pomyślnie. ';

    // echo $_SESSION['payment'];

    require_once 'connect.php';

    // createing orders in db
    $currentTimestamp = date("Y-m-d H:i:s");
    foreach ($_SESSION['order'] as $value) {
        $sql = "INSERT INTO `orders` (`id`, `seedling_id`, `order_quantity`, `created_at`, `status`) VALUES (NULL, '$value[id]', '$value[orderQuantity]', '$currentTimestamp', 'placed');";
        $mysqli->query($sql);
        if ($mysqli->affected_rows){
            echo "Prawidłowo dodano rekord";
            $_SESSION['payment'] .= "Zapisano zamównienie. ";
        }else{
            echo "Nie dodano rekordu";
            $_SESSION['payment'] .= "Nie zapisano zamównienia. ";
        }
    }

    $user = $_SESSION['cart']['user'];
    $fullPrice = $_SESSION['cart']['fullPrice'];
    $sql = "INSERT INTO `payment` (`id`, `user`, `full_price`, `created_at`) VALUES (NULL, '$user', $fullPrice, '$currentTimestamp');";
    $mysqli->query($sql);
    if ($mysqli->affected_rows){
        echo "Prawidłowo dodano rekord";
        // $_SESSION['cart'] = "Zamówienie zostało pomyślnie złożone";
        $_SESSION['payment'] .= "Zapisano zrealizowaną transakcję. ";
    }else{
        echo "Nie dodano rekordu";
        // $_SESSION['cart'] = "Zamówienie nie zostało dodane złożone";
        $_SESSION['payment'] .= "Nie zapisano transakcji. ";
    }

    echo $_SESSION['payment'];
    
    unset($_SESSION['order']);
    unset($_SESSION['cart']);

    header('location: ../view/logged.php');
?>