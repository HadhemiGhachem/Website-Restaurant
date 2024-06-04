<?php
/* Inclure le fichier config */
require_once "config.php";
 
/* Definir les variables */
$name = $phone = $date = $personne = $email = $message = "";
$name_err = $phone_err = $email_err = $date_err = $personne_err = $message_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    /* Validate name */
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Veillez entrez un nom.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Veillez entrez un nom valide.";
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

    // validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Veillez entrez votre e-mail.";     
    } elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Veillez entrez un e-mail valide.";
    } else{
        $email = $input_email;
    }

    // validate date
    $input_date = trim($_POST["date"]);
    if(empty($input_date)) {
        $date_err = "Veillez entrer une date.";
    }else{
        $date = $input_date;
    }

    // validate personne
    $input_personne = trim($_POST["choix"]);
    if(empty($input_personne)) {
        $personne_err = "Veillez choisir le nombre de personnes.";
    }else {
        $options =  ["option1" => 1, "option2" => 2,"option3" => 3, "option4" => 4, "option5" => 5, "option6" => 6,"option7" => 7, "option8" => 8,/* add other mappings */];
        $personne = $options[$_POST["choix"]];
    }

    
    /* Validate message */
    $input_message = trim($_POST["message"]);
    if(empty($input_message)){
        $message_err = "Veillez entrez un message.";     
    }  else{
        $message = $input_message;
    }
    
    /* verifier les erreurs avant modification */
    if (empty($name_err) && empty($phone_err) && empty($message_err) && empty($personne_err) && empty($date_err) && empty($email_err)) {
        /* Prepare an insert statement */
        $sql = "INSERT INTO reservation (fullname, phone, email, date, personnes, message) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Adjust the 'ssssss' to match the actual data types of your columns (e.g., 'sssssi' for string, string, string, string, integer)
            $stmt->bind_param("ssssss", $param_name, $param_phone, $param_email, $param_date, $param_personne, $param_message);

            // Assign values to parameters
            $param_name = $name;
            $param_phone = $phone;
            $param_email = $email;
            $param_date = $date;
            $param_personne = $personne;
            $param_message = $message;

            if ($stmt->execute()) {
                /* enregistrement ajouté, retourne */
                header("location: reserveList.php");
                exit();
            } else {
                echo "Oops! une erreur est survenue: " . $stmt->error;
            }
        
            $stmt->close();
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Reservation</title>
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
                    <h2 class="mt-5">Créer une Reservation</h2>
                    <p>Remplir le formulaire pour enregistrer une reservation dans la base de données</p>


                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>

                        <!-- phone -->
                        <div class="form-group">
                            <label>Phone</label>
                            <input 
                            name="phone" 
                            class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $phone; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <label>Email</label>
                            <input 
                            name="email" 
                            class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $email; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        
                        <!-- date -->
                        <div class="form-group">
                            <label>Date</label>
                            <input 
                            type="datetime-local" 
                            name="date" 
                            class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $date; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $date_err;?></span>
                        </div>

                        <!--Nombres de personnes  -->
                        <div class="form-group">
                            <label>Nombres de personnes</label>
                            <select 
                            name="choix" 
                            id="numbers"
                            class=" <?php echo (!empty($personne_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $personne; ?>"

                            >

                            <option value=""></option>
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                            <option value="option5">5</option>
                            <option value="option6">6</option>
                            <option value="option7">7</option>
                            <option value="option8">8</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $personne_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <input type="text" name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>">
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>


                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="reserveList.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
