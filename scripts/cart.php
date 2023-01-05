<?php
    session_start();

    $orderQuantity = $_POST['orderQuantity'];
    if(!isset($orderQuantity)) 
    {
        header('location: ../view/logged.php');
        exit();
    }else{
        $N = count($orderQuantity);
        
        for($i=0; $i < $N; $i++)
        {
            $_SESSION['order'][$i]['orderQuantity'] = $orderQuantity[$i];
        }
    }

    foreach ($_SESSION['order'] as $value) {
        echo <<< E
        $value[id] $value[orderQuantity] $value[price]<br>
        E;
    }
    
    $_SESSION['cart'] = $_SESSION['order'];

    header('location: ../view/logged.php');
?>