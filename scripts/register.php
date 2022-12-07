<?php
    // session_start();

    $error = 0;

    // sprawdzenie czy wprowadzono wszystkie dane
    foreach ($_POST as $key => $value){
        if (empty($value)){
            $error = 1;
        }
    }

    // sprawdzenie czy zatwierdzono regulamin
    if (!isset($_POST['agreeTerms'])){
        $error = 1;
    }

    // sprawdzenie czy email i powtorzony email sa identyczne
    if (($_POST['email1'] != $_POST['email2']) || 
        ($_POST['pass1'] != $_POST['pass2'])){
        $error = 1;
        // TODO: sesja z komunikatem o roznym emailu badz hasle
    }

    if ($error == 1){
        echo "<script>history.back()</script>";
        exit();
    }

    require_once 'connect.php';

    $pass = password_hash($_POST['pass1'], PASSWORD_ARGON2ID);

    try{
        $stmt = $mysqli->prepare("INSERT INTO users(name, email, pass) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_POST['name'], $_POST['email1'], $pass);
        $stmt->execute();

        if ($stmt->affected_rows == 1){
            echo "ok";
            // $_SESSION['success'] = "Prawidłowo dodano użytkownika $_POST[email1]";
        }
    } catch (Exception $e){
        echo $e->getMessage();
        if ($stmt->affected_rows != 1){
            echo "nie ok";
            // $_SESSION['error'] = "Nie udało się dodać użytkownika $_POST[email1]";
        }
    }
    


    
    // else{
    //     echo "nie ok";
    //     $_SESSION['error'] = "Nie udało się dodać użytkownika";
    //     exit();
    // }

    // header('location: ../');
?>