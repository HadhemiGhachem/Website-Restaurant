<?php
/* Inclure le fichier */
require_once "config.php";
 
/* Definir les variables */
$firstname = $lastname = $email= $phone  =$password = $confirm_password="";
$firstname_err = $lastname_err =$phone_err = $email_err =$password_err= $confirm_password_err="";
 
/* verifier la valeur id dans le post pour la mise à jour */
if(isset($_POST["id"]) && !empty($_POST["id"])){
    /* recuperation du champ caché */
    $id = $_POST["id"];
    
    /* Validate lastname */
    $input_lastname = trim($_POST["lastname"]);
    if(empty($input_lastname)){
        $lastname_err = "Veillez entrez lastname.";
    } elseif(!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastname_err = "Veillez entrez a valid lastname.";
    } else{
        $lastname = $input_lastname;
    }

     /* Validate firstname */
     $input_firstname = trim($_POST["firstname"]);
     if(empty($input_firstname)){
         $firstname_err = "enter firstname.";
     } elseif(!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $firstname_err = "enter a valid firstname.";
     } else{
         $firstname = $input_firstname;
     }
    
    /* Validate phone */
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Veillez entrez le numéro du téléphone.";     
    } else{
        $phone = $input_phone;
    }
    
    /* Validate email */
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Veillez entrez un email.";     
    }  else{
        $email = $input_email;
    }


    /* Validate password */
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Veillez entrez le password.";     
    } else{
        $password = $input_password;
    }

    /* Validate confirm password */
    $input_confirm_password = trim($_POST["confirm_password"]);
    if(empty($input_confirm_password)){
        $confirm_password_err = "Veillez entrez le password.";     
    } else{
        $confirm_password = $input_confirm_password;
    }
    
    /* verifier les erreurs avant modification */
    if (empty($firstname_err) && empty($phone_err) && empty($lastname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
    
        $sql = "UPDATE signup SET firstname=?, lastname=?, phone=?, email=?, password=?, confirm_password=? WHERE id=?";
        
        $sql = "UPDATE signup SET firstname=?, lastname=?, phone=?, email=?, password=?, confirm_password=? WHERE id=?";
        
        if ($stmt = $conn->prepare($sql)) {
            // Hash the passwords before storing them in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $hashed_confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);
        
            // Assign values to parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_phone = $phone;
            $param_email = $email;
            $param_password = $hashed_password; // Use hashed password
            $param_confirm_password = $hashed_confirm_password; // Use hashed confirm password
            $param_id = $id;
        
            // Assuming 'id' is an integer, adjust the 'i' type accordingly if it's a different type
            $stmt->bind_param("ssssssi", $param_firstname, $param_lastname, $param_phone, $param_email, $param_password, $param_confirm_password, $param_id);
        
            if ($stmt->execute()) {
                // Record updated successfully, redirect
                header("location: adminList.php");
                exit();
            } else {
                echo "Oops! An error occurred.";
            }
        
            mysqli_stmt_close($stmt);
        }
        
        
    }
    
    
    
    
    
    // $stmt->close();
}


else{
    /* si il existe un paramettre id */
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        
        $id =  trim($_GET["id"]);
        
       
        $sql = "SELECT * FROM signup WHERE id = ?";


        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* recupere l'enregistremnt */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    /* recupere les champs */
                    $firstname = $row["firstname"];
                    $lastname = $row["lastname"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $password = $row["password"];
                    $confirm_password=$row["confirm_password"];

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
                    <h2 class="mt-5">Mise à jour de l'enregistremnt de l'Admin</h2>
                    <p>Modifier les champs et enregistrer</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
                        <span class="invalid-feedback"><?php echo $firstname_err;?></span>
                    </div>




                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
                            <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>

                        <div class="form-group">
                            <label> confirm password</label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="adminList.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>