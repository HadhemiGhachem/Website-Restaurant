<?php
/* Verifiez si le paramettre id existe */
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    require_once "config.php";
    
    /* Preparer la requete */
    $sql = "SELECT * FROM reservation WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        
        $param_id = trim($_GET["id"]);
        
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* recuperer l'enregistrement */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                /* recuperer les champs */
                $name = $row["fullname"];
                $phone = $row["phone"];
                $date = $row["date"];
                $email = $row["email"];
                $personnes = $row["personnes"];
                $message = $row["message"];

            } else{
                /* Si pas de id correct retourne la page d'erreur */
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! une erreur est survenue.";
        }
    }
    
    
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($conn);
} else{
    /* Si pas de id correct retourne la page d'erreur */
    header("location: error.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voir l'enregistrement de la Reservation</title>
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
                    <h1 class="mt-5 mb-3">Voir l'enregistrement de la Reservation</h1>
                    <div class="form-group">
                        <label>fullname :</label>
                        <p><b><?php echo $row["fullname"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>phone :</label>
                        <p><b><?php echo $row["phone"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>email :</label>
                        <p><b><?php echo $row["email"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>date :</label>
                        <p><b><?php echo $row["date"]; ?></b> </p>
                    </div>
                    <div class="form-group">
                        <label>personnes :</label>
                        <p><b><?php echo $row["personnes"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>message :</label>
                        <p><b><?php echo $row["message"]; ?></b></p>
                    </div>
                    
                    <p><a href="contactList.php" class="btn btn-primary">Retour</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>