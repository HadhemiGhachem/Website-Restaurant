<?php

session_start();

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = "";
    $lastname = "";
    $email = "";
    $phone = "";
    $password = "";
    $confirm_password = "";

    $data = [];

    // check 

    $errors =[];

    // firstname . required ,alphbets and spaces only 
    if(!empty($_POST["firstname"])){
        $firstname = $_POST["firstname"];

        if(ctype_alpha(str_replace(" " , "" , $firstname)) === false) {
            $errors[] = "firstname should contain only alphbets and spaces";    
        }
    }else {
        $errors[] = "firstname field cannot be empty";
    }


     // lastname . required ,alphbets and spaces only 
     if(!empty($_POST["lastname"])){
        $lastname = $_POST["lastname"];

        if(ctype_alpha(str_replace(" " , "" , $lastname)) === false) {
            $errors[] = "lastname should contain only alphbets and spaces";    
        }
    }else {
        $errors[] = "lastname field cannot be empty";
    }
    

    // Email - required, validate using filter_var() function


    $emailList = "SELECT email FROM signup ";
    $result = $conn->query($emailList);
    $row = $result->fetch_assoc();

    if(!empty($_POST['email'])) {
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL) !== $email) {
            $errors[] = "Email is not valid";
        }else{

        $i = 0;
        while ($row = mysqli_fetch_row($result)) {
         printf($row[$i]);

         if($row[$i] === $email) {
            $errors[]  = "This email is already taken.";
         }
        }
        }
        
    }
    else {
        $errors[] = "Email can't be empty";
    }

    // phone - required , numbers only

    $phoneList = "SELECT phone FROM signup";
    $resultP = $conn->query(($phoneList));


    if(!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (!(preg_match('/^\d+$/', $_POST['phone']))) {
            $errors[] = "phone contain numbers only ";
        }else{
            $i = 0;
            while ($row = mysqli_fetch_row($resultP)) {
             //printf($row[$i]);
             if($row[$i] === $phone){
                $errors[]= "This phone number is already taken.";
             }
            }
        }
        
    }else {
        $errors[] = "phone can't be empty";
    }

    // validate password
    if(!empty($_POST['password'])) {
        $password = $_POST['password'];
        if (preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $password)) {

        }else{
            $errors[] = "Password must contain both alphabets and numbers.";
        }
    }else {
        $errors[] = "password can't be empty";
    }



    // password and confirm password - required , have the same data 
    if(!empty($_POST['confirm_password'])){
        
        $confirm_password = $_POST["confirm_password"];

        if ($password !== $confirm_password) {
            $errors[] = "Passwords do not match. Please enter the same password in both fields. ";
        }
    }else {
        $errors[] = "confirm password can't be empty";
    }


    if($errors) {

        $_SESSION['status'] = 'error';
        $_SESSION['errors'] = $errors;
        header('location:form.php?result=validation_error');
        die();


    }else {

        
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        // $hash_confirm = password_hash($confirm_password, PASSWORD_DEFAULT);

        




         // Préparer la requête SQL
         $sql = "INSERT INTO signup (firstname, lastname, email, phone, password, confirm_password) VALUES (?, ?, ?, ?, ?, ?)";
        
         if ($stmt = $conn->prepare($sql)) {
             // Binder les paramètres
             $stmt->bind_param("ssssss", $firstname, $lastname, $email, $phone, $password, $confirm_password);
         
             // Exécuter la requête
             $stmt->execute();
         
             // Vérifier si l'insertion a réussi
             if ($stmt->affected_rows > 0) {
                 echo "Les données ont été insérées avec succès.";
                 header('location:signIn.php');
             } else {
                 echo "Erreur lors de l'insertion des données : " . $stmt->error;
             }
         
             // Fermer le statement
             $stmt->close();
         } else {
             echo "Erreur de préparation de la requête : " . $conn->error;
         }
         
        }

    }
?>