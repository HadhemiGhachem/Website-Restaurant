<?php
/* Inclure le fichier config */
require_once "config.php";
 
/* Definir les variables */
$firstName = $lastName = $email = $phone  = $password= $confirm_password="";
$firstname_err = $lastname_err = $email_err = $phone_err = $password_err = $confirm_password_err= "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    /* Validate firstname */
    $input_firstname = trim($_POST["firstname"]);
        if(empty($input_firstname)){
        $firstname_err = "enter firstname.";
    } elseif(!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstname_err = "Veillez entrez a valid firstname.";
    } else{
        $firstName = $input_firstname;
    }


     /* Validate lastname */
     $input_lastname= trim($_POST["lastname"]);
     if(empty($input_lastname)){
     $lastname_err = "enter lastname.";
        } elseif(!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $lastname_err = "Veillez entrez a valid lastname.";
        } else{
            $lastName = $input_lastname;
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
     }  else if(filter_var($input_email, FILTER_VALIDATE_EMAIL) !== $input_email) {
        $email_err = "Email is not valid.";
    }else{
         $email = $input_email;
     }
    

    //  validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Veillez entrez le password.";     
    } else{
        $password = $input_password;
    }

    //  validate confirm
    $input_confirm_password = trim($_POST["confirm_password"]);
    if(empty($input_confirm_password)){
        $confirm_password_err = "Veillez entrez le password.";     
        if($password !== $confirm_password) {
            $confirm_password_err="Passwords do not match. Please enter the same password in both fields.";
        }
    } else{
        $confirm_password = $input_confirm_password;
    }


     /* verifier les erreurs avant modification */
     if (empty($firstname_err) && empty($lastname_err) && empty($phone_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        /* Prepare an insert statement */
        $sql = "INSERT INTO signup (firstname, lastname, email, phone, password, confirm_password) VALUES (?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $hashed_confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);
        
            // Adjust the 'ssssss' to match the actual data types of your columns
            $stmt->bind_param("ssssss", $param_firstname, $param_lastname, $param_email, $param_phone, $hashed_password, $hashed_confirm_password);
            
            // Assign values to parameters
            $param_firstname = $firstName;
            $param_lastname = $lastName;
            $param_email = $email;
            $param_phone = $phone;
            
            // The hashed password is now used instead of the plain text password
            $param_password = $hashed_password;
            $param_confirm_password = $hashed_confirm_password;
            
            if ($stmt->execute()) {
                /* enregistrement ajouté, retourne */
                header("location: adminList.php");
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
    <title>Create Record</title>
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
                    <h2 class="mt-5">Créer un Admin</h2>
                    <p>Remplir le formulaire pour enregistrer un Admin dans la base de données</p>


                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>firstname</label>
                            <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstName; ?>">
                            <span class="invalid-feedback"><?php echo $firstname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>lastname</label>
                            <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastName; ?>">
                            <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <textarea name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>"><?php echo $phone; ?></textarea>
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err;?></span>
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