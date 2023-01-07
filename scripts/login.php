<?php
    session_start();

    $error = 0;

    // check if all values exists
    foreach ($_POST as $key => $value){
        if (empty($value)){
            $error = 1;
        }
    }

    // if $error = 1 then back to previous
    if ($error == 1){
        $_SESSION['warning'] = "Sprawdź czy wprowadziłeś wszystkie dane";
        echo "<script>history.back()</script>";
        exit();
    }

    // if checked remmember, remmember user data
    if (isset($_POST['remember']) && isset($_POST['email']) && isset($_POST['pass'])){
        // $_SESSION['email'] = $_POST['email'];
        // $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['remember'] = array($_POST['email'], $_POST['pass']);
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
            $_SESSION['userData'] = array($user['name'], $user['role'], $user['email']);
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