<?php
    session_start();

    $error = 0;

    // sprawdzenie czy wprowadzono wszystkie dane
    foreach ($_POST as $key => $value){
        if (empty($value)){
            $error = 1;
        }
    }

    if ($error == 1){
        $_SESSION['warning'] = "Sprawdź czy wprowadziłeś wszystkie dane";
        echo "<script>history.back()</script>";
        exit();
    }

    if (isset($_POST['remember']) && isset($_POST['email']) && isset($_POST['pass'])){
        $_SESSION['email'] = $_POST['email'];
    }

    require_once 'connect.php';

    try{
        $stmt = $mysqli->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $stmt->bind_param("s", $_POST['email']); //s -> string
        $stmt->execute();

        // mozna dodac $stmt->affected_rows
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($stmt->affected_rows == 1 && password_verify($_POST['pass'], $user['pass'])) {
            $_SESSION['success'] = "Zalogowano prawidłowo użytkownika $_POST[email]";
            header('location: ../view/logged.php');
            exit();
        }else{
            $_SESSION['error'] = "Nie zalogowano użytkownika użytkownika $_POST[email]";
        }
    } catch (Exception $e){
        echo $e->getMessage();
        if ($stmt->affected_rows != 1){
            $_SESSION['error'] = "Nie zalogowano użytkownika użytkownika $_POST[email]";
        }
    }
    
    header('location: ../');
?>