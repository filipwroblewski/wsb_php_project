<?php
    session_start();
    
    $orderQuantity = $_POST['orderQuantity'];
    if(!isset($orderQuantity)) 
    {
        header('location: ../view/logged.php');
        exit();
    }else{
        $N = count($orderQuantity);
        
        // load all choosen seedlings quantity
        for($i=0; $i < $N; $i++)
        {
            // captuer when user doesn't type any value
            if($orderQuantity[$i] == ''){
                $orderQuantity[$i] = 0;
            }
            $_SESSION['order'][$i]['orderQuantity'] = $orderQuantity[$i];
        }
    }

    // calculate total price
    $fullPrice = 0;
    foreach ($_SESSION['order'] as $value) {
        $fullPrice+=$value['orderQuantity']*$value['price'];
    }

    // capture nessesary info to save in db when payment will be succesfull
    $_SESSION['cart'] = array(
        "user" => $_SESSION['userData'][2],
        "fullPrice" => $fullPrice,
    );

    header('location: ../view/logged.php');
?>