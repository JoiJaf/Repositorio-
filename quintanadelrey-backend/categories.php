<?php
require_once 'database.php';
$categories = "";
$description = "";
$drinks = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Drinks"]);
$maindishes = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Main dishes"]);
$appetizers = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Appetizers"]);
$desserts = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Desserts"]);


if ($_GET) {

    switch ($_GET["id"]) {
        case 1:
            $categories = "Appetizers";
            $description = $database->select("tb_categorias", "categ_descrip", ["categ_nombre" => "Appetizers"]);
            $banner = $database->select("tb_categorias", "categ_img", ["categ_nombre" => "Appetizers"]);
            $dishes = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Appetizers"]);
            break;
        case 2:
            $categories = "Main dishes";
            $description = $database->select("tb_categorias", "categ_descrip", ["categ_nombre" => "Main dishes"]);
            $banner = $database->select("tb_categorias", "categ_img", ["categ_nombre" => "Main dishes"]);
            $dishes = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Main dishes"]);
            break;
        case 3:
            $categories = "Desserts";
            $description = $database->select("tb_categorias", "categ_descrip", ["categ_nombre" => "Desserts"]);
            $banner = $database->select("tb_categorias", "categ_img", ["categ_nombre" => "Desserts"]);
            $dishes = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Desserts"]);
            break;
        case 4:
            $categories = "Drinks";
            $description = $database->select("tb_categorias", "categ_descrip", ["categ_nombre" => "Drinks"]);
            $banner = $database->select("tb_categorias", "categ_img", ["categ_nombre" => "Drinks"]);
            $dishes = $database->select("tb_info_platillo", "*", ["platillo_catego" => "Drinks"]);
            break;
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

        <div class="banner-platoFuerte" style="background: url('./img/<?php echo $banner[0] ?>'); background-size: cover; height: 45rem; background-position: center center">
            <div class="mask-c align">


                <h1 class="bnr-title ">
                    <?php echo $categories ?>

                </h1>

                <h4 class="bnr-text align-bnr-text ">
                    <?php echo $description[0] ?>
                </h4>

            </div>
        </div>

    </header>

    <main>

        <!-- Categories -->
        <div>
            <div class="titles">
                <h3> Categories</h3>
            </div>
            <div class="categories-container">

                <a class="each-category" href="categories.php?id=1">
                    <img class="categories-image" src="./img/entrada.jpg" alt="Entradas">
                    <h4 class="text-set">Appetizers</h4>
                </a>

                <a class="each-category" href="categories.php?id=2">
                    <img class="categories-image" src="./img/plato_fuerte.jpg" alt="PlatoFuerte">
                    <h4 class="text-set">Main course</h4>
                </a>

                <a class="each-category" href="categories.php?id=3">
                    <img class="categories-image" src="./img/Postres.png" alt="Postres">
                    <h4 class="text-set">Desserts</h4>
                </a>

                <a class="each-category" href="categories.php?id=4">
                    <img class="categories-image" src="./img/bebidas.jpg" alt="bebidas">
                    <h4 class="text-set">Drinks</h4>
                </a>

            </div>
        </div>

        <!-- End Categories -->

        <!-- Filters -->

        <!-- <div class="filters">
            <section class="filters-align">
                <h3 class="filter-title">Mode:</h3>

                <div class="filters-ctn">
                    <h4 class="filter-text">In site:</h4>
                    <img class="filters-img" src="./img/place_black.svg" alt="">
                </div>

                <div class="filters-ctn">
                    <h4 class="filter-text">Carry:</h4>
                    <img class="filters-img" src="./img/carry_black.svg" alt="">
                </div>

                <div class="filters-ctn">
                    <h4 class="filter-text">Empress:</h4>
                    <img class="filters-img" src="./img/express_black.svg" alt="">
                </div>
            </section>

            <section class="filters-align">
                <h3 class="filter-title">Servings:</h3>
                <div class="filters-ctn">
                    <h4 class="filter-text">Sigle:</h4>
                    <img class="filters-img" src="./img/single_black.svg" alt="">
                </div>

                <div class="filters-ctn">
                    <h4 class="filter-text">Couple:</h4>
                    <img class="filters-img" src="./img/couple_black.svg" alt="">
                </div>

                <div class="filters-ctn">
                    <h4 class="filter-text">Familiar:</h4>
                    <img class="filters-img" src="./img/familiar_black.svg" alt="">
                </div>
            </section>
        </div> -->

        <hr>

        <!-- End Filters -->

        <!-- Filtered food -->

        <section>

            <!-- This part is showed base on filters and created by javascript -->


            <div class="cards-container">

                <?php

                foreach ($dishes as $dish) {

               echo "<div class='cards-ctn'>";
               echo "<a href='platillo.php?id=".$dish["id_platillo"]."' class='cards-info main-course cards-ctn ' style='background: url(./img/".$dish["platillo_img"]."); background-size: cover;'>";     
               echo "<div class='opacity'>";         
               echo "<h2 class='cards-title /*cards-title-mod*/'>".$dish["platillo_nombre"]."</h2>";
               echo "<p class='card-text'>".$dish["platillo_descrip"]."</p>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
            
            ?>

                <!--<div class="cards-ctn">
                    <a href="platillo.php" class="cards-info main-course cards-ctn ">
                        <div class="opacity">
                            <h2 class="cards-title /*cards-title-mod*/">Entradas</h2>
                            <p class="card-text">Nisi ratione nemo eligendi excepturi ipsa, aut at error, sit aliquid
                                impedit omnis. Totam delectus, ipsa earum cupiditate eligendi harum molestias iusto.</p>
                        </div>
                    </a>
                </div>-->

            </div>
        </section>

        <!-- Filtered food -->

    </main>

    <?php
    include("./parts/footer.php");
    ?>

    <script src="./js/funtions.js"></script>

</body>

</html>