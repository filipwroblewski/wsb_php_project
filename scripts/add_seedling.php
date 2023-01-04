<?php
    session_start();
    if (isset($_POST)){
        foreach ($_POST as $value){
            if (empty($value)){
                header('location: ../view/logged.php');
                exit();
            }
        }
        require_once './connect.php';
        $sql="INSERT INTO `seedlings` (`id`, `name`, `description`, `price`, `quantity`) VALUES (NULL, '$_POST[name]', '$_POST[description]', '$_POST[price]', '$_POST[quantity]');";
        $mysqli->query($sql);
        if ($conn->affected_rows){
            $_SESSION['info'] = "Prawidłowo dodano rekord";
        }else{
            $_SESSION['info'] = "Nie dodano rekordu";
        }
    }
    header('location: ../view/logged.php');
?>