<?php
    session_start();

    $error = 0;

    // sprawdzenie czy wprowadzono wszystkie dane
    foreach ($_POST as $key => $value){
        if (empty($value)){
            $error = 1;
            $_SESSION['registerWarning'] = "Uzupełnij poprawnie dane";
        }
    }

    // sprawdzenie czy zatwierdzono regulamin
    if (!isset($_POST['agreeTerms'])){
        $_SESSION['registerWarning'] = "W celu założenia konta, musisz zatwierdzić regulamin.";
        $error = 1;
    }

    // sprawdzenie czy email i powtorzony email sa identyczne
    if (($_POST['email1'] != $_POST['email2']) || ($_POST['pass1'] != $_POST['pass2'])){
        $_SESSION['registerWarning'] = "Email i powtórzony email muszą być identyczne,<br>a także hasło i powtórzone hasło muszą być identyczne.";
        $error = 1;
    }
    
    if ($error == 1){
        echo "<script>history.back()</script>";
        exit();
    }

    require_once 'connect.php';

    // sprawdzenie czy email jest juz w bazie danych
    $result = $mysqli->query("SELECT `email` FROM `users` WHERE `email` = \"$_POST[email1]\";");
    if($result->num_rows != 0) {
        $_SESSION['registerWarning'] = "Uzupełnij poprawnie dane";
        echo "<script>history.back()</script>";
        exit();
    }

    $pass = password_hash($_POST['pass1'], PASSWORD_ARGON2ID);

    try{
        $stmt = $mysqli->prepare("INSERT INTO users(name, email, pass) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_POST['name'], $_POST['email1'], $pass);
        $stmt->execute();

        if ($stmt->affected_rows == 1){
            $_SESSION['success'] = "Prawidłowo dodano użytkownika $_POST[email1]";
        }
    } catch (Exception $e){
        echo $e->getMessage();
        if ($stmt->affected_rows != 1){
            $_SESSION['error'] = "Nie udało się dodać użytkownika $_POST[email1]";
        }
    }
    
    // header('location: ../');
?>