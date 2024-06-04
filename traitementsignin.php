<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailLogin = $_POST["email_login"];
    $passwordLogin = $_POST["pass_login"];

    if (empty($emailLogin) || empty($passwordLogin)) {
        $_SESSION['status'] = 'error';
        $_SESSION['errors'][] = 'Email and password are required.';
        header('Location: SignIn.php?result=validation_error');
        exit();
    }


    $sql = "select * from signup where email = '$emailLogin' and password = '$passwordLogin'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['status'] = 'success';
            $_SESSION['data'][] = 'Login successful.';
            header('Location: admin.php'); 
            exit();
        }  
        else{  
            $_SESSION['status'] = 'error';
            $_SESSION['errors'][] = 'Login failed. Invalid username or password.';
            header('Location: SignIn.php?result=validation_error');
            exit();  
        }





    // // Récupérer le mot de passe non haché de la base de données pour l'e-mail donné
    // $sql = "SELECT password FROM signup WHERE email = ?";
    // if ($stmt = $conn->prepare($sql)) {
    //     $stmt->bind_param("s", $emailLogin);
    //     $stmt->execute();
    //     $stmt->bind_result($storedPassword);
    //     $stmt->fetch();
    //     $stmt->close();

    //     // Vérifier si le mot de passe fourni correspond au mot de passe stocké
    //     if ($storedPassword == $passwordLogin) {
    //         // Mot de passe correct
    //         $_SESSION['status'] = 'success';
    //         $_SESSION['data'][] = 'Login successful.';
    //         header('Location: welcome.php'); 
    //         exit();
    //     } else {
    //         // Mot de passe incorrect
    //         $_SESSION['status'] = 'error';
    //         $_SESSION['errors'][] = 'Login failed. Invalid username or password.';
    //         header('Location: SignIn.php?result=validation_error');
    //         exit();
    //     }
    // } else {
    //     // Erreur de préparation SQL
    //     $_SESSION['status'] = 'error';
    //     $_SESSION['errors'][] = 'An error occurred during the login process. Please try again later.';
    //     error_log("SQL Error: " . $conn->error);
    //     header('Location: SignIn.php?result=validation_error');
    //     exit();
    // }
}
?>
