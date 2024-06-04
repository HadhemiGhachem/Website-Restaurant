<?php
session_start();

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = "";
    $phone = "";
    $email = "";
    $date = "";
    $personnes = "";
    $message = $_POST['message'];

    $data = [];

    // Vérification des erreurs
    $errors = [];

    // Prénom - requis, uniquement des alphabets et des espaces
    if (!empty($_POST["name"])) {
        $name = $_POST["name"];

        if (ctype_alpha(str_replace(" ", "", $name)) === false) {
            $errors[] = "Le nom ne doit contenir que des alphabets et des espaces";
        }
    } else {
        $errors[] = "Le champ du nom ne peut pas être vide";
    }

    // Téléphone - requis, uniquement des chiffres
    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (!(preg_match('/^\d+$/', $_POST['phone']))) {
            $errors[] = "Le téléphone ne doit contenir que des chiffres";
        }
    } else {
        $errors[] = "Le champ du téléphone ne peut pas être vide";
    }

    $currentDateTime = date("Y-m-d H:i:s");
    // Date requise
    if (empty($_POST["date"])) {
        $errors[] = "Le champ de la date ne peut pas être vide";
    } else if (($_POST["date"]) <= $currentDateTime) {
        $_SESSION['status'] = 'error';
        $_SESSION['errors'][] = 'Veuillez sélectionner une date et une heure supérieures à la date et l\'heure actuelles.';
        header('location: reserve.php');
        exit();
    } else {
        $date = $_POST["date"];
    }

    /* Validation de l'e-mail */
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== $email) {
            $errors[] = "L'e-mail n'est pas valide.";
        }
        
    } else {
        $errors[] = "L'e-mail ne peut pas être vide";
    }
//  Personnes requises
    if (empty($_POST["choix"])) {
        $errors[] = "Le champ de choix ne peut pas être vide";
    } else {
        $options = ["option1" => 1, "option2" => 2, "option3" => 3, "option4" => 4, "option5" => 5, "option6" => 6, "option7" => 7, "option8" => 8, /* ajoutez d'autres mappages */];
        $personnes = $options[$_POST["choix"]];
    }

    $sqlR = "SELECT COUNT(*) AS total_tables FROM reservation WHERE date= ?";
    $stmtR = $conn->prepare($sqlR);

    if ($stmtR) {
        $stmtR->bind_param("s", $date);
        $stmtR->execute();
        $stmtR->store_result();

        if ($stmtR->num_rows > 0) {
            $stmtR->bind_result($totalTables);
            $stmtR->fetch();
        } else {
            $totalTables = 0;
        }

        $stmtR->close();
    } else {
        $totalTables = 0;
    }

    // Vérifie s'il y a des erreurs
    if ($errors) {
        $_SESSION['status'] = 'error';
        $_SESSION['errors'] = $errors;
        header('location:reserve.php#resrve_content');
        die();
    } else {
        $sql = "INSERT INTO reservation (fullname, phone, email, date, personnes, message) VALUES (?,?,?,?,?,?)";

        if ($stmt = $conn->prepare($sql)) {
            // Liez les paramètres
            $stmt->bind_param("ssssis", $name, $phone, $email, $date, $personnes, $message);

            // Exécutez la requête
            if ($stmt->execute()) {
                // Vérifiez si l'insertion a réussi
                if ($stmt->affected_rows > 0) {
                    echo "Les données ont été insérées avec succès.";
                    header('location:menu.php');
                } else {
                    echo "Erreur lors de l'insertion des données : " . $stmt->error;
                }
            } else {
                echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
            }


            // Fermez la déclaration
            $stmt->close();
        } else {
            echo "Erreur de préparation de la requête : " . $conn->error;
        }
    }
}

?>
