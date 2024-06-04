<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailLogin = $_POST["email_login"];
    $passwordLogin = $_POST["pass_login"];

    if (empty($emailLogin) || empty($passwordLogin)) {
        $_SESSION['status'] = 'error';
        $_SESSION['errors'][] = 'Email and password are required.';
        header('location: SignIn.php?result=validation_error');
        die();
    }


    $sql = "SELECT * FROM signup WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $emailLogin);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Vérifier si le mot de passe fourni correspond au mot de passe haché
            $verify = password_verify($passwordLogin,$row["password"]);
            if ($verify) {
                // Mot de passe correct
                $_SESSION['status'] = 'success';
                $_SESSION['data'][] = 'Login successful.';
                header('Location: welcome.php'); 
                exit();
            } 
            else {
                // Mot de passe incorrect
                $_SESSION['status'] = 'error';
                $_SESSION['errors'][] = 'Login failed. invalid password.';
               
                header('location: SignIn.php?result=validation_error');
                die();
            }
        } else {
            // Aucun utilisateur trouvé avec cet e-mail
            $_SESSION['status'] = 'error';
            $_SESSION['errors'][] = 'No user found with this email address.';
            header('location: SignIn.php?result=validation_error');
            die();
        }
    } else {
        // Erreur de préparation SQL
        $_SESSION['status'] = 'error';
        $_SESSION['errors'][] = 'An error occurred during the login process. Please try again later.';
        error_log("SQL Error: " . $conn->error);
        header('location: SignIn.php?result=validation_error');
        die();
    }
}
?>
