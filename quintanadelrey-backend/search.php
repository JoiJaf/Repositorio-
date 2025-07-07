<?php

require_once 'database.php';

$categories = $database->select("tb_categorias", "*");
$portions = $database->select("tb_cant_personas", "*");
$dishes = $database->select("tb_info_platillo", "*");

$filtereddishes = [];
$message = "";

if ($_POST) {

    foreach ($dishes as $dish) {

        if ($dish["platillo_catego"] == $_POST["category"] && $dish["platillo_cant_per_porci"] == $_POST["portion"]) {
            $filtereddishes[] = $dish;
        }
    }


    if (count($filtereddishes) == 0) {
        $message = "No match results";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quintana del rey</title>
    <link rel="shortcut icon" href="./img/logo.png">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@500;700&family=Marcellus&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- font -->

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/admin-main.css">
</head>

<body>

    <header class="header">

        <?php
        include("./parts/headerNav.php");
        ?>
    </header>

    <main>

        <h1 class="promos-title">Search products</h1>

        <form class="search-form" action="search.php" method="post">

            <div class="div-search">
                <div class="specifications-adjust">
                    <div></div>
                    <h2>Category: </h2>
                    <select class="select" name="category">
                        <?php
                        foreach ($categories as $category) {

                            if(isset($_GET["category"])){

                            }else{
                                echo "<option value='" . $category["categ_nombre"] . "'>" . $category["categ_nombre"] . "</option>";
                            }

                            
                        }
                        ?>
                    </select>
                </div>

                <div class="specifications-adjust">
                    <h2>Portion: </h2>
                    <select class="select" name="portion">
                        <?php
                        foreach ($portions as $portion) {

                            echo "<option value='" . $portion["cant_pers"] . "'>" . $portion["cant_pers"] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="div-login-btn">
                    <input class="login-btn" type="submit" value="Search">
                </div>
            </div>

        </form>

        <?php
        if (count($filtereddishes) > 0) {
            echo "<section>";
            echo "<div class='cards-container'>";
            foreach ($filtereddishes as $filtereddish) {
                echo "<div class='cards-ctn'>";
                echo "<a href='platillo.php?id=" . $filtereddish["id_platillo"] . "' class='cards-info main-course cards-ctn ' style='background: url(./img/" . $filtereddish["platillo_img"] . "); background-size: cover; background-repeat: no-repeat'>";
                echo "<div class='opacity'>";
                echo "<h2 class='cards-title /*cards-title-mod*/'>" . $filtereddish["platillo_nombre"] . "</h2>";
                echo "<p class='card-text'>" . $filtereddish["platillo_descrip"] . "</p>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
            echo "</section>";

        } else {
            echo "<p class='message'>$message </p> " ;
        }
        ?>




    </main>

    <footer>

        <?php
        include("./parts/footer.php");
        ?>

    </footer>


</body>

</html>