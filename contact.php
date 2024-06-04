<?php

session_start();

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = "";
    $phone = "";
    $message = $_POST['message'];

    $data = [];

    // check 

    $errors =[];


    // firstname . required ,alphbets and spaces only 
    if(!empty($_POST["name"])){
        $name = $_POST["name"];

        if(ctype_alpha(str_replace(" " , "" , $name)) === false) {
            $errors[] = "name should contain only alphbets and spaces";    
        }
    }else {
        $errors[] = "name field cannot be empty";
    }

    // phone - required , numbers only

    if(!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (!(preg_match('/^\d+$/', $_POST['phone']))) {
            $errors[] = "phone contain numbers only ";
        }
        
    }else {
        $errors[] = "phone can't be empty";
    }



    
    if($errors) {

        $_SESSION['status'] = 'error';
        $_SESSION['errors'] = $errors;
        header('location:index.php#contact_content');
        die();
    }else{
        $sql = "INSERT INTO contact (name, phone, message) VALUES (?,?,?)";


        if ($stmt = $conn->prepare($sql)) {
            // Binder les paramètres
            $stmt->bind_param("sss", $name, $phone, $message);
        
            // Exécuter la requête
            if ($stmt->execute()) {
                // Vérifier si l'insertion a réussi
                if ($stmt->affected_rows > 0) {
                    echo "Les données ont été insérées avec succès.";
                    header('location:index.php#contact_content');
                } else {
                    echo "Erreur lors de l'insertion des données : " . $stmt->error;
                }
            } else {
                echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
            }
        
            // Fermer le statement
            $stmt->close();
        } else {
            echo "Erreur de préparation de la requête : " . $conn->error;
        }
        

}

}


?>