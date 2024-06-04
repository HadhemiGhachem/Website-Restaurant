<?php
/* Inclure le fichier */
require_once "config.php";
 
/* Définir les variables */
$categorie = $num_plat = $nom_plat = $prix = $description = $image = "";
$categorie_err = $num_plat_err = $nom_plat_err = $prix_err = $description_err = $image_err = "";  
 
/* Vérifier la valeur id dans le post pour la mise à jour */
if(isset($_POST["id"]) && !empty($_POST["id"])){
    /* Récupération du champ caché */
    $id = $_POST["id"];
    
    /* Valider num_plat */
    $input_num = trim($_POST["num_plat"]);
    if(empty($input_num)){
        $num_plat_err = "Veillez entrez le numéro du num.";     
    } else{
        $num_plat = $input_num;
    }

    /* Valider nom du plat */
    $input_nom_plat = trim($_POST["nom_plat"]);
    if(empty($input_nom_plat)){
        $nom_plat_err = "Veillez entrez a valid nom plat.";
    } elseif(!filter_var($input_nom_plat, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nom_plat_err = "Veillez entrez a valid nom plat .";
    } else{
        $nom_plat = $input_nom_plat;
    }

    /* Valider description */
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Veillez entrez la description.";
    } elseif(!filter_var($input_description, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $description_err = "Veillez entrez la description.";
    } else{
        $description = $input_description;
    }

    /* Valider prix */
    $input_prix = trim($_POST["prix"]);
    if(empty($input_prix)){
        $prix_err = "Veillez entrez le prix.";     
    } else{
        $prix = $input_prix;
    }

    /* Valider choix */
    $input_categorie = trim($_POST["choix"]);
    if(empty($input_categorie)){
        $categorie_err = "Veillez entrez le categorie.";     
    } else{
        $categorie = $input_categorie;
    }

    /* Vérifier les erreurs avant modification */
    if(empty($categorie_err) && empty($num_plat_err) && empty($nom_plat_err) && empty($prix_err) && empty($description_err)) {
        $sql = "UPDATE menu SET categorie=?, num_plat=?, nom_plat=?, prix=?, description=? WHERE id=?";
        if ($stmt = $conn->prepare($sql)) {
            // Liaison des paramètres
            $stmt->bind_param("sssssi", $param_categorie, $param_num_plat, $param_nom_plat, $param_prix, $param_description, $param_id);
            // Assignation des valeurs aux paramètres
            $param_categorie = $categorie;
            $param_num_plat = $num_plat;
            $param_nom_plat = $nom_plat;
            $param_prix = $prix;
            $param_description = $description;
            $param_id = $id;
    
            if ($stmt->execute()) {
                /* Enregistrement modifié, redirection */
                header("location: menuList.php");
                exit();
            } else {
                echo "Oops! une erreur est survenue.";
            }
            mysqli_stmt_close($stmt);
        }
    }
} else {
    /* Si un paramètre id existe */
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM menu WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) == 1){
                    /* Récupération de l'enregistrement */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    /* Récupération des champs */
                    $categorie = $row["categorie"];
                    $num_plat = $row["num_plat"];
                    $nom_plat = $row["nom_plat"];
                    $prix = $row["prix"];
                    $description = $row["description"];
                } else{
                    header("location: error.php");
                    exit();
                }
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
        /* Fermeture de la requête */
        mysqli_stmt_close($stmt);
        /* Fermeture de la connexion */
        mysqli_close($conn);
    } else{
        /* Si aucun id valide n'est passé en paramètre, redirection */
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>update plat plat</title>
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
                    <h2 class="mt-5">Mise à jour de l'enregistrement du plat</h2>
                    <p>Modifier les champs et enregistrer</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <!-- num_plat -->
                        <div class="form-group">
                            <label>Numéro du plat</label>
                            <input type="number" name="num_plat" class="form-control <?php echo (!empty($num_plat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $num_plat; ?>">
                            <span class="invalid-feedback"><?php echo $num_plat_err;?></span>
                        </div>
                        <!-- Nom du plat -->
                        <div class="form-group">
                            <label>Nom du plat</label>
                            <input name="nom_plat" class="form-control <?php echo (!empty($nom_plat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom_plat; ?>">
                            <span class="invalid-feedback"><?php echo $nom_plat_err;?></span>
                        </div>
                        <!-- Prix -->
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="text" name="prix" class="form-control <?php echo (!empty($prix_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prix; ?>">
                            <span class="invalid-feedback"><?php echo $prix_err;?></span>
                        </div>
                        <!-- Description -->
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description; ?>">
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>
                        <!-- Catégorie du plat -->
                        <div class="form-group">
                            <label>Catégorie du plat</label><br>
                            <select name="choix" id="categorie" class="form-control <?php echo (!empty($categorie_err)) ? 'is-invalid' : ''; ?>">
                                <option value=""></option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Pasta">Pasta</option>
                                <option value="Pizza">Pizza</option>
                                <option value="Sandwiches">Sandwiches</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Lunch">Lunch</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $categorie_err;?></span>
                        </div>
                        <!-- Champ caché pour l'ID -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="menuList.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
