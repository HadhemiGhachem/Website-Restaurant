<?php
/* Verifiez si le paramettre id existe */
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    require_once "config.php";
    
    /* Preparer la requete */
    $sql = "SELECT * FROM menu WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        
        $param_id = trim($_GET["id"]);
        
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* recuperer l'enregistrement */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                /* recuperer les champs */
                $categorie = $row["categorie"];
                $num_plat = $row["num_plat"];
                $nom_plat = $row["nom_plat"];
                $prix = $row["prix"];
                $description = $row["description"];
                $image = $row["image"];


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
    <title>Voir l'enregistrement du plat</title>
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
                    <h1 class="mt-5 mb-3">Voir l'enregistrement du plat </h1>
                    <div class="form-group">
                        <label>categorie :</label>
                        <p><b><?php echo $row["categorie"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>numéro du plat :</label>
                        <p><b><?php echo $row["num_plat"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>nom du plat  :</label>
                        <p><b><?php echo $row["num_plat"]; ?></b> </p>
                    </div>
                    <div class="form-group">
                        <label>prix :</label>
                        <p><b><?php echo $row["prix"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>description :</label>
                        <p><b><?php echo $row["description"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>image :</label>
                        <p><b><?php echo $row["image"]; ?></b></p>
                    </div>
                    
                    <p><a href="menuList.php" class="btn btn-primary">Retour</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>