<?php
/* Inclure le fichier */
require_once "config.php";
 
/* Definir les variables */
$name = $phone = $email = $date=$personne= $message = "";
$name_err = $phone_err =$email_err =$date_err=$personne_err= $message_err = "";
 
/* verifier la valeur id dans le post pour la mise à jour */
if(isset($_POST["id"]) && !empty($_POST["id"])){
    /* recuperation du champ caché */
    $id = $_POST["id"];
    
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
         $date_err= "Date field cannot be empty";
     }else{
         $date = $input_date;
     }
 
    // validate personne
$input_personne = trim($_POST["choix"]);
if (empty($input_personne)) {
    $personne_err = "Choix field cannot be empty";
} else {
    $options = ["option1" => 1, "option2" => 2, "option3" => 3, "option4" => 4, "option5" => 5, "option6" => 6, "option7" => 7, "option8" => 8];
    if (array_key_exists($input_personne, $options)) {
        $personne = $options[$input_personne];
    } else {
        $personne_err = "Invalid choice selected";
    }
}



    
    /* Validate message */
    $input_message = trim($_POST["message"]);
    if(empty($input_message)){
        $message_err = "Veillez entrez un message.";     
    }  else{
        $message = $input_message;
    }
    
    /* verifier les erreurs avant modification */
    if (empty($name_err) && empty($phone_err) && empty($email_err) && empty($message_err) && empty($personne_err) && empty($date_err)) {
    
        $sql = "UPDATE reservation SET fullname=?, phone=?,email=?,date=?,personnes=?, message=? WHERE id=?";
        
        if ($stmt = $conn->prepare($sql)) {
    
            // Assuming 'id' is an integer, adjust the 'i' type accordingly if it's a different type
            $stmt->bind_param("ssssssi", $param_name, $param_phone, $param_email, $param_date, $param_personne, $param_message, $param_id);

        
            // Assign values to parameters
            $param_name = $name;
            $param_phone = $phone;
            $param_email = $email;
            $param_date = $date;
            $param_personne = $personne;
            $param_message = $message;
            $param_id = $id;
        
            if ($stmt->execute()) {
                /* enregistrement modifié, retourne */
                header("location: reserveList.php");
                exit();
            } else {
                echo "Oops! une erreur est survenue.";
            }
            
            mysqli_stmt_close($stmt);
        }
        
    }
    
    
    
    // $stmt->close();
} else{
    /* si il existe un paramettre id */
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        
        $id =  trim($_GET["id"]);
        
       
        $sql = "SELECT * FROM reservation WHERE id = ?";


        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* recupere l'enregistremnt */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    /* recupere les champs */
                    $name = $row["fullname"];
                    $phone = $row["phone"];
                    $email = $row["email"];
                    $date= $row["date"];
                    $personne = $row["personnes"];
                    $message = $row["message"];
                } else{
                    
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
        
         /* Close statement */
         mysqli_stmt_close($stmt);

         /* Close connection */
         mysqli_close($conn);
    }  else{
        /* pas de id parametter valid, retourne erreur */
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Reservation</title>
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
                    <h2 class="mt-5">Mise à jour de la Reservation</h2>
                    <p>Modifier les champs et enregistrer</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <!-- name -->
                        <div class="form-group">
                            <label>fullname</label>
                            <input 
                            type="text" 
                            name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $name; ?>">
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
                            
                            
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <!-- date -->
                        <div class="form-group">
                            <label>Date</label>
                            <input 
                            type="datetime-local" 
                            name="date" 
                            class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $date; ?>">
                            <span class="invalid-feedback"><?php echo $date_err;?></span>
                        </div>

<!-- Nombres de personnes  -->
<div class="form-group">
    <label>Nombres de personnes</label>
    <select 
        name="choix" 
        id="numbers"
        class="form-control <?php echo (!empty($personne_err)) ? 'is-invalid' : ''; ?>"
    >
        <option value=""></option>
        <option value="option1" <?php echo ($personne === 1) ? 'selected' : ''; ?>>1</option>
        <option value="option2" <?php echo ($personne === 2) ? 'selected' : ''; ?>>2</option>
        <option value="option3" <?php echo ($personne === 3) ? 'selected' : ''; ?>>3</option>
        <option value="option4" <?php echo ($personne === 4) ? 'selected' : ''; ?>>4</option>
        <option value="option5" <?php echo ($personne === 5) ? 'selected' : ''; ?>>5</option>
        <option value="option6" <?php echo ($personne === 6) ? 'selected' : ''; ?>>6</option>
        <option value="option7" <?php echo ($personne === 7) ? 'selected' : ''; ?>>7</option>
        <option value="option8" <?php echo ($personne === 8) ? 'selected' : ''; ?>>8</option>
    </select>
    <span class="invalid-feedback"><?php echo $personne_err; ?></span>
</div>




                        <!-- message -->
                        <div class="form-group">
                            <label>Message</label>
                            <input type="text" name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>">
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="reserveList.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>