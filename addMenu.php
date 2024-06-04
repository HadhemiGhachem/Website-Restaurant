<?php
/* Inclure le fichier config */
require_once "config.php";

$categorie = $num_plat = $nom_plat = $prix = $description = $image = "";
$categorie_err = $num_plat_err = $nom_plat_err = $prix_err = $description_err = $image_err = "";  

if($_SERVER["REQUEST_METHOD"] == "POST"){

    /* Validate num plat */
    $input_num = trim($_POST["num_plat"]);
    if(empty($input_num)){
        $num_plat_err = "Veillez entrez le numéro du num.";     
    } else{
        $num_plat = $input_num;
    }


    /* Validate nom du plat */
    $input_nom_plat = trim($_POST["nom_plat"]);
        if(empty($input_nom_plat)){
        $nom_plat_err = "Veillez entrez a valid nom plat.";
    } elseif(!filter_var($input_nom_plat, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nom_plat_err = "Veillez entrez a valid nom plat .";
    } else{
        $nom_plat = $input_nom_plat;
    }

    /* Validate description */
    $input_description = trim($_POST["description"]);
        if(empty($input_description)){
        $description_err = "Veillez entrez la desciption.";
    }  else{
        $description = $input_description;
    }


    /* Validate prix */
    $input_prix = trim($_POST["prix"]);
    if(empty($input_prix)){
        $prix_err = "Veillez entrez le prix.";     
    } else{
        $prix = $input_prix;
    }

  // Validate image
// $input_image = trim($_POST['image']);
// if (empty($input_image )) {
//     $image_err = "Veillez entrez l'image.";

   
// } else {
//     $image = $input_image;
// }




    /*validate choix */
    $input_categorie = trim($_POST["choix"]);
    if(empty($input_categorie)){
        $categorie_err = "Veillez entrez le categorie.";     
    } else{
        $categorie = $input_categorie;
    }

   
    if(empty($categorie_err) && empty($num_plat_err)  && empty($nom_plat_err) && empty($prix_err) && empty($description_err) && empty($image_err)) {

        $sql = "INSERT INTO menu (categorie, num_plat, nom_plat, prix, description, image) VALUES (?, ?, ?, ?, ?,?)";

        if ($stmt = $conn->prepare($sql)) {
            // Assuming 'id' is an auto-incremented column, you don't need to bind it or include it in the SQL query
        
            // Adjust the 'ssssss' to match the actual data types of your columns (e.g., 'ssi' for string, string, integer)
            $stmt->bind_param("ssssss", $param_categorie, $param_num_plat, $param_nom_plat, $param_prix, $param_description, $param_image);
        
            // Assign values to parameters
            $param_categorie = $categorie;
            $param_num_plat = $num_plat;
            $param_nom_plat = $nom_plat;
            $param_prix = $prix;
            $param_description = $description;
            $param_image = $image;
        
            if ($stmt->execute()) {
                /* enregistrement ajouté, retourne */
                header("location: menuList.php");
                exit();
            } else {
                echo "Oops! une erreur est survenue: " . $stmt->error;
            }
        
            mysqli_stmt_close($stmt);
        }
    }        
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addMenu</title>
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
                    <h2 class="mt-5">Créer un nouveau plat</h2>
                    <p>Remplir le formulaire pour enregistrer un plat dans la base de données</p>


                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">


                    <!-- num_plat -->
                        <div class="form-group">
                            <label>Numéro du plat</label>
                            <input
                            type="number" 
                            name="num_plat" 
                            class="form-control <?php echo (!empty($num_plat_err)) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $num_plat; ?>">
                            <span class="invalid-feedback"><?php echo $num_plat_err;?></span>
                        </div>


                        <!-- Nom du plat -->
                        <div class="form-group">
                            <label>Nom du plat</label>
                            <input 
                            name="nom_plat" 
                            class="form-control <?php echo (!empty($nom_plat_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $nom_plat; ?>"
                            >
                            
                            <span class="invalid-feedback"><?php echo $nom_plat_err;?></span>
                        </div>

                        
                        <!-- prix -->
                        <div class="form-group">
                            <label>Prix</label>
                            <input 
                            type="text"
                            name="prix"
                            class="form-control <?php echo (!empty($prix_err)) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $prix; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $prix_err;?></span>
                        </div>


                        <!--  Description  -->
                        <div class="form-group">
                            <label>Description</label>
                            <input 
                            type="text" 
                            name="description" 
                            class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $description; ?>"
                            >
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>


                        <!-- categorie  -->
                        <div class="form-group">
                            <label>Catégorie du plat</label><br>
                            <select 
                            name="choix" 
                            id="categorie"
                            class="form-control <?php echo (!empty($categorie_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $categorie; ?>"
                            >

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


                        

                        <!-- Image -->
                        <div class="form-group">
                            <label>Image</label>
                            <input 
                            type="file" 
                            name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $image; ?>">
                            <span class="invalid-feedback"><?php echo $image_err;?></span>
                        </div>


                        <!--  -->
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="reserveList.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>