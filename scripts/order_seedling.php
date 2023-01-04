<?php
    session_start();

    if (isset($_POST)){
        foreach ($_POST as $value){
            if (empty($value)){
                header('location: ../view/logged.php');
                exit();
            }
        }

        $selectedId = $_POST['selectedid'];
        if(empty($selectedId)) 
        {
            header('location: ../view/logged.php');
            exit();
        }else{
            $N = count($selectedId);
            
            $selectedIds = "";
            for($i=0; $i < $N; $i++)
            {
                $selectedIds.=$selectedId[$i].",";
            }
            $selectedIds = substr($selectedIds, 0, -1);
            // echo "SELECT * FROM `seedlings` WHERE `seedlings`.`id` IN (".$tmp.")";

            require_once './connect.php';
            $sql="SELECT * FROM `seedlings` WHERE `seedlings`.`id` IN (".$selectedIds.")";
            $result = $mysqli->query($sql);
            $_SESSION['order'] = [];
            while ($seedling = $result->fetch_assoc()) {
                array_push($_SESSION['order'], [
                    "id" => $seedling['id'],
                    "name" => $seedling['name'],
                    "description" => $seedling['description'],
                    "price" => $seedling['price'],
                    "quantity" => $seedling['quantity'],
                ]);
            }
        }
        
        
    }
    header('location: ../view/logged.php');
?>