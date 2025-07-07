<?php
require_once './database.php';
$modalities = $database->select("tb_tipo_pedido", "*");
$data = $database->select("tb_info_platillo", "*");
$related = [];

$link = "";
$url_params = "";
$lang = "";

if ($_GET) {

    if (isset($_GET["lang"]) && $_GET["lang"] == "ES") {

        $dish = $database->select("tb_info_platillo", "*", ["id_platillo" => $_GET["id"]]);
        $portions = $database->select("tb_info_platillo", [
            "[><]tb_cant_personas" => ["platillo_cant_per_porci" => "cant_pers"]
        ], [
            "id_platillo",
            "platillo_nombre_tr",
            "platillo_descrip_tr",
            "cant_pers_descrip"
        ], ["id_platillo" => $_GET["id"]]);

        $dish[0]["platillo_nombre"] = $dish[0]["platillo_nombre_tr"];
        $dish[0]["platillo_descrip"] = $dish[0]["platillo_descrip_tr"];

        $url_params = "id=" . $dish[0]["id_platillo"];
        $lang = "EN";
    } else {
        $dish = $database->select("tb_info_platillo", "*", ["id_platillo" => $_GET["id"]]);
        $portions = $database->select("tb_info_platillo", [
            "[><]tb_cant_personas" => ["platillo_cant_per_porci" => "cant_pers"]
        ], [
            "id_platillo",
            "platillo_nombre",
            "cant_pers_descrip"
        ], ["id_platillo" => $_GET["id"]]);

        $url_params = "id=" . $dish[0]["id_platillo"] . "&lang=ES";
        $lang = "ES";
    }
}


if ($_POST) {

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

        <div class="banner-platillo"
            style="background: url(./img/<?php echo $dish[0]['platillo_img'] ?>);  background-size: cover; height: 35rem; background-position: center center">
            <div class="mask">


            </div>
        </div>

    </header>

    <main>

        <section class="dish">
            <div class="dish-information">
                <?php
                echo "<p id='lang' class='trad' onclick='getTranslation(" . $dish[0]["id_platillo"] . ")'>$lang</p>"
                    ?>
                <h1 class="dish-title" id="platillo-nombre">
                    <?php echo $dish[0]["platillo_nombre"] ?>
                </h1>
                <?php
                if ($dish[0]["destacado"] == 1) {
                    echo "<img class='dish-img' src='./img/star.png' alt='outstanding'>";
                }

                ?>

            </div>

            <h2 class="dish-subtitle">Description: </h2>

            <div class="dish-information">
                <p class="dish-text" id="platillo-description">
                    <?php echo $dish[0]["platillo_descrip"] ?>
                </p>
                <p class="dish-price">€
                    <?php echo $dish[0]["platillo_precio"] ?>
                </p>
            </div>

        </section>

        <!-- parte de filtros -->

        <?php
        if (isset($_SESSION["isLoggedIn"])) {
            ?>

            <form action="cart.php" method="post">

                <div class="specifications">
                    <div class="specifications-adjust">
                        <h2 class="specifications-text">Modality: </h2>
                        <select class="select" name="modality">
                            <?php
                            foreach ($modalities as $modality) {

                                echo "<option value='" . $modality["pedido_descripcion"] . "'>" . $modality["pedido_descripcion"] . "</option>";
                            }
                            ?>
                            <!-- <option value="lounge">lounge</option>
                    <option value="express" selected>Express</option>
                    <option value="go">Go to take away</option> -->
                        </select>
                        <!-- <img src="./img/modality.png" alt="Modality"> -->
                    </div>

                    <div class="specifications-adjust">
                        <h2 class="specifications-text">Portions: </h2>
                        <select class="select">

                            <option value="individual">
                                <?php echo $portions[0]["cant_pers_descrip"] ?>
                            </option>
                            <!-- <option value="couples" selected>Couples</option>
                    <option value="familiar">Familiar</option> -->
                        </select>
                        <!-- <img src="./img/portions.png" alt="portions"> -->
                    </div>

                </div>

                <div class="details-ctn">
                    <div class="accompaniment">
                        <div class="accompaniment-align">
                            <h3 class="accompaniment-text">accompaniment 1</h3>
                            <div class="bg-button">

                                <select class="accompaniment-btn">
                                    <option class="op" value="tortillas">tortillas</option>
                                    <option value="tortillas">Ripe plantains</option>
                                    <option value="tortillas">huevo</option>

                                </select>

                            </div>

                        </div>

                        <hr class="low-bar">

                        <div class="accompaniment-align">
                            <h3 class="accompaniment-text">accompaniment 2</h3>
                            <div class="bg-button">
                                <select class="accompaniment-btn">
                                    <option value="tortillas">salads</option>
                                    <option value="tortillas">picadillo</option>
                                    <option value="tortillas">raspas</option>

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="accompaniment">
                        <div class="accompaniment-align">
                            <h3 class="accompaniment-text">quantity</h3>
                            <input name="quantity" id="quantity" class="quantity" type="number" value="1" min="0" max="8">
                        </div>

                    </div>

                    <h2 class="notes-add">additional notes</h2>

                    <div class="accompaniment">
                        <input type="text" class="text-area" placeholder="Write the instructions you need."></input>
                        <hr class="low-bar">


                    </div>

                </div>

                <!-- button to add to card -->





                <div class="ctn-btn-add">

                    <div class="btn-add">
                        <input type='submit' class='submit-btn-platillos'>
                        <div class="circle">

                            <p id="quantityDish"></p>
                        </div>
                        Add to card

                        <p id="dish-price" class="dish-price">€
                            <?php echo $dish[0]["platillo_precio"] ?>
                        </p>

                    </div>
                </div>
                <input type='hidden' name="id" value="<?php echo $dish[0]["id_platillo"]; ?>">
                <input type='hidden' name="name" value="<?php echo $dish[0]["platillo_nombre"]; ?>">
                <input type='hidden' name="img" value="<?php echo $dish[0]["platillo_img"]; ?>">
                <input type='hidden' name="price" value="<?php echo $dish[0]["platillo_precio"]; ?>">



            </form>

            <?php
        } else {
            ?>

            <form action="register.php" method="post">

                <div class="specifications">
                    <div class="specifications-adjust">
                        <h2 class="specifications-text">Modality: </h2>
                        <select class="select" name="modality">
                            <?php
                            foreach ($modalities as $modality) {

                                echo "<option value='" . $modality["pedido_descripcion"] . "'>" . $modality["pedido_descripcion"] . "</option>";
                            }
                            ?>
                            <!-- <option value="lounge">lounge</option>
        <option value="express" selected>Express</option>
        <option value="go">Go to take away</option> -->
                        </select>
                        <!-- <img src="./img/modality.png" alt="Modality"> -->
                    </div>

                    <div class="specifications-adjust">
                        <h2 class="specifications-text">Portions: </h2>
                        <select class="select">

                            <option value="individual">
                                <?php echo $portions[0]["cant_pers_descrip"] ?>
                            </option>
                            <!-- <option value="couples" selected>Couples</option>
        <option value="familiar">Familiar</option> -->
                        </select>
                        <!-- <img src="./img/portions.png" alt="portions"> -->
                    </div>

                </div>

                <div class="details-ctn">
                    <div class="accompaniment">
                        <div class="accompaniment-align">
                            <h3 class="accompaniment-text">accompaniment 1</h3>
                            <div class="bg-button">

                                <select class="accompaniment-btn">
                                    <option class="op" value="tortillas">tortillas</option>
                                    <option value="tortillas">Ripe plantains</option>
                                    <option value="tortillas">huevo</option>

                                </select>

                            </div>

                        </div>

                        <hr class="low-bar">

                        <div class="accompaniment-align">
                            <h3 class="accompaniment-text">accompaniment 2</h3>
                            <div class="bg-button">
                                <select class="accompaniment-btn">
                                    <option value="tortillas">salads</option>
                                    <option value="tortillas">picadillo</option>
                                    <option value="tortillas">raspas</option>

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="accompaniment">
                        <div class="accompaniment-align">
                            <h3 class="accompaniment-text">quantity</h3>
                            <input name="quantity" id="quantity" class="quantity" type="number" value="1" min="0" max="8">
                        </div>

                    </div>

                    <h2 class="notes-add">additional notes</h2>

                    <div class="accompaniment">
                        <input type="text" class="text-area" placeholder="Write the instructions you need."></input>
                        <hr class="low-bar">


                    </div>

                </div>

                <!-- button to add to card -->





                <div class="ctn-btn-add">

                    <div class="btn-add">
                        <input type='submit' class='submit-btn-platillos'>
                        <div class="circle">

                            <p id="quantityDish"></p>
                        </div>
                        Add to card

                        <p id="dish-price" class="dish-price">€
                            <?php echo $dish[0]["platillo_precio"] ?>
                        </p>

                    </div>
                </div>
                <input type='hidden' name="id" value="<?php echo $dish[0]["id_platillo"]; ?>">
                <input type='hidden' name="name" value="<?php echo $dish[0]["platillo_nombre"]; ?>">
                <input type='hidden' name="img" value="<?php echo $dish[0]["platillo_img"]; ?>">
                <input type='hidden' name="price" value="<?php echo $dish[0]["platillo_precio"]; ?>">



            </form>

            <?php
        }
        ?>

        <!-- button to add to card -->

        <!-- featured -->

        <div class="specifications">
            <h2 class="specifications-text text-bold"> Related dishes</h2>
        </div>

        <div class="carousels-ctn-dishes">
            <div class="arrow-container "><img class="arrow arrow-left" src="./img/left_arrow.svg" alt="left-arrow">
            </div>
            <div class="info-ctn">

                <?php
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]["platillo_catego"] == $dish[0]["platillo_catego"]) {
                        $related[] = $data[$i];
                    }
                }
                foreach ($related as $relatedItem) {

                    echo "<div class='carousel'>";
                    echo "<div class='ctn-carrousel-dish'>";
                    echo "<h3 class='carousels-information-title no-margin'>" . $relatedItem["platillo_nombre"] . "</h3>";
                    echo "<a href='platillo.php?id=" . $relatedItem["id_platillo"] . "' class='image-mask'>";
                    echo "<img class='carousels-image' src='./img/" . $relatedItem["platillo_img"] . "' alt='dish'>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
                <!-- <div class="carousel">
                    <div class="ctn-carrousel-dish">
                        <h3 class="carousels-information-title no-margin">baked rice</h3>
                        <a href="platillo.php" class="image-mask">
                            <img class="carousels-image" src="./img/arroz al horno.png" alt="dish">
                        </a>
                    </div>
                </div>-->

            </div>
            <div class="arrow-container"><img class="arrow arrow-right" src="./img/right_arrow.svg" alt="right-arrow">
            </div>

        </div>

    </main>

    <?php
    include("./parts/footer.php");
    ?>


    <script src="./js/funtions.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let quantity = document.getElementById('quantity');
            let dishPrice = document.getElementById('dish-price');
            let initialDishPrice = <?php echo $dish[0]["platillo_precio"] ?>;
            let quantityDish = document.getElementById('quantityDish');
            let initial = 1;

            dishPrice.textContent = '€ ' + initialDishPrice.toFixed(2);
            quantityDish.textContent = initial;
            quantity.addEventListener('input', function () {
                let quantityNum = parseInt(quantity.value) || 0;
                let totalPrice = initialDishPrice * quantityNum;

                dishPrice.textContent = '€ ' + totalPrice.toFixed(2);


                quantityDish.textContent = quantityNum || 0;

                if (quantityDish == initial) {
                    quantity.value = 1;
                }

            });
        });
    </script>

    <script>

        let requestLang = "ES";

        function switchLang() {
            if (requestLang == "EN") requestLang = "ES";

            else requestLang = "EN";
            document.getElementById("lang").innerText = requestLang;

        }

        function getTranslation(id) {

            let info = {
                id_platillo: id,
                language: requestLang
            };

            //fetch

            fetch(
                "http://localhost:80/quintanadelrey-backend/language.php", {
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    'Accept': 'application/json,text/plain, */*',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(info)
            })
                .then(response => response.json())
                .then(data => {
                    //console.log(data.name);
                    //console.log(data.description);

                    switchLang();
                    document.getElementById("platillo-nombre").innerText = data.name;
                    document.getElementById("platillo-description").innerText = data.description;


                })

                .catch(err => console.log("error: " + err));


        }

    </script>

</body>

</html>