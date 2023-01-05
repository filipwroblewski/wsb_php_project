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

    $fullPrice = 0;
    foreach ($_SESSION['order'] as $value) {
        $fullPrice+=$value['orderQuantity']*$value['price'];
        // echo <<< E
        // $value[id] $value[orderQuantity] $value[price]<br>
        // E;
    }

    $_SESSION['cart'] = $_SESSION['order'];

    // $_SESSION['cart'] = array_push($_SESSION['cart'], [
    //     "id" => 0,
    //     "user" => $_SESSION['userData'][2],
    //     "fullPrice" => $fullPrice,
    // ]);
    
    // echo "user=".$_SESSION['userData'][2]." fullPrice=".$fullPrice;

    header('location: ../view/logged.php');
?>