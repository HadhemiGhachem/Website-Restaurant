<?php

include "config.php";

$sql = "SELECT * FROM menu ORDER BY categorie"; // Trie les résultats par catégorie
$result = $conn->query($sql);

$currentCategory = null; // Variable pour stocker la catégorie précédente

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu page</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <header>
        <!-- NavBar -->
        <nav>
            <div>
                <h1>Foodie</h1>
            </div>
            <div >
                <ul class="list">
                    <a href="index.php"><li>Home</li></a>
                    <a target="_blank" href="index.php#story"><li>About Us</li></a>
                    <a target="_blank" href="menudy.php"><li>Menu</li></a>
                    <a target="_blank" href="reserve.php"><li>Reserve</li></a>
                    <a href="index.php#contact"><li>Contact Us</li></a>
                </ul>
            </div>
            <div class="button-nav">
                <a class="button" href="reserve.php">Reserve</a>
                <a class="button" href="#contact">Contact</a>
                <a class="button" href="form.php">SignIn</a>
            </div>
        </nav>

        <h1>Our <span class="popular-title">Menu</span> </h1>
    </header>

    <!-- Menu items -->
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Vérifiez si la catégorie a changé
            if ($currentCategory !== $row["categorie"]) {
                ?>
                <div class="breakfast_content">
                    <h1><?php echo $row["categorie"]; ?></h1>
                </div>
                <?php
                $currentCategory = $row["categorie"]; // Mettez à jour la catégorie actuelle
            }
            ?>
            <div class="breakfast_content">
                <div class="breakfast_item">
                    <div class="breakfast_title">
                        <div class="breakfast_title_s">
                            <h3><?php echo $row["num_plat"] ; ?></h3>
                            <h3><?php echo $row["nom_plat"] ; ?></h3>
                        </div>
                        <div>
                            <h3><?php echo $row["prix"]; ?></h3>
                        </div>
                    </div>
                    <div class="breakfast_pg">
                        <p><?php echo $row["description"] ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>
