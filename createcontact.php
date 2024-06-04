<?php
/* Inclure le fichier config */
require_once "config.php";
 
/* Definir les variables */
$name = $phone = $message = "";
$name_err = $phone_err = $message_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    /* Validate name */
    $input_name = trim($_POST["name"]);
        if(empty($input_name)){
        $name_err = "Veillez entrez un nom.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Veillez entrez a valid name.";
    } else{
        $name = $input_name;
    }
    
    /* Validate phone */
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Veillez entrez le numéro du téléphone.";     
    } else{
        $phone = $input_phone;
    }
    
     /* Validate message */
     $input_message = trim($_POST["message"]);
     if(empty($input_message)){
         $message_err = "Veillez entrez un message.";     
     }  else{
         $message = $input_message;
     }
    
     
     /* verifier les erreurs avant modification */
     if (empty($name_err) && empty($phone_err) && empty($message_err)) {
        /* Prepare an insert statement */
        $sql = "INSERT INTO contact (name, phone, message) VALUES (?, ?, ?)";
         
        if ($stmt = $conn->prepare($sql)) {
            
            // Assuming 'id' is an auto-incremented column, you don't need to bind it or include it in the SQL query
    
            // Adjust the 'ssss' to match the actual data types of your columns (e.g., 'ssi' for string, string, integer)
            $stmt->bind_param("sss", $param_name, $param_phone, $param_message);
    
            // Assign values to parameters
            $param_name = $name;
            $param_phone = $phone;
            $param_message = $message;
    
            if ($stmt->execute()) {
                /* enregistrement ajouté, retourne */
                header("location: contactList.php");
                exit();
            } else {
                echo "Oops! une erreur est survenue: " . $stmt->error;
            }
            
            mysqli_stmt_close($stmt);
        }
    }
    
         
        // /* Close statement */
        // mysqli_stmt_close($stmt);
    }
    
    /* Close connection */
    mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Créer un Contact</h2>
                    <p>Remplir le formulaire pour enregistrer un contact dans la base de données</p>


                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <textarea name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>"><?php echo $phone; ?></textarea>
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <input type="text" name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>">
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>