<?php
/* Inclure le fichier */
require_once "config.php";
 
/* Definir les variables */
$name = $phone = $message = "";
$name_err = $phone_err = $message_err = "";
 
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
        $phone_err_err = "Veillez entrez le numéro du téléphone.";     
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
    
        $sql = "UPDATE contact SET name=?, phone=?, message=? WHERE id=?";
        
        if ($stmt = $conn->prepare($sql)) {
            
            // Assuming 'id' is an integer, adjust the 'i' type accordingly if it's a different type
            $stmt->bind_param("sssi", $param_name, $param_phone, $param_message, $param_id);
    
            // Assign values to parameters
            $param_name = $name;
            $param_phone = $phone;
            $param_message = $message;
            $param_id = $id;
    
            if ($stmt->execute()) {
                /* enregistrement modifié, retourne */
                header("location: contactList.php");
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
        
       
        $sql = "SELECT * FROM contact WHERE id = ?";


        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* recupere l'enregistremnt */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    /* recupere les champs */
                    $name = $row["name"];
                    $phone = $row["phone"];
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
    <title>Modifier l'enregistremnt</title>
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
                    <h2 class="mt-5">Mise à jour de l'enregistremnt</h2>
                    <p>Modifier les champs et enregistrer</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <input type="text" name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>">
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="contactList.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>