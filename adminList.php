<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>admins Liste</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
   
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Liste des Admins</h2>
                        <a href="createAdmin.php" class="btn btn-success"><i class="bi bi-plus"></i> Ajouter</a>
                    </div>
                    <?php 
                    /* Inclure le fichier config */
                    require_once "config.php";
                    
                    /* select query execution */
                    $sql = "SELECT * FROM signup";
                    
                    if($result = $conn->query($sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>firstName</th>";
                                        echo "<th>lastName</th>";
                                        echo "<th>email</th>";
                                        echo "<th>phone</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";

                                        echo "<td>";
                                            echo '<a href="readAdmin.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-eye"></span></a>';
                                            echo '<a href="updateAdmin.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-pencil"></span></a>';
                                            echo '<a href="deleteAdmin.php?id='. $row['id'] .'" ><span class="bi bi-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            /* Free result set */
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Pas d\'enregistrement</em></div>';
                        }
                    } else{
                        echo "Oops! Une erreur est survenue";
                    }
 
                    /* Fermer connection */
                    $conn->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>