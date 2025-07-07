<?php

require_once '../database.php';

$categories = $database->select("tb_categorias", "*");
$cantpaxs = $database->select("tb_cant_personas", "*");

$message = "";

// if (isset($_GET)) {

//     $item_dish = $database->select("tb_info_platillo", [
//         "[>]tb_categorias" => ["id_categorias" => "id_categorias"]
//     ], [
//         "tb_info_platillo.id_platillo",
//         "tb_info_platillo.platillo_nombre",
//         "tb_info_platillo.platillo_nombre_tr",
//         "tb_info_platillo.platillo_descrip",
//         "tb_info_platillo.platillo_descrip_tr"
       
//     ], [
//         "id_destination" => $_GET["id_destination"]
//     ]);

//     var_dump($item);

// }

if ($_GET) {
    $data = $database->select("tb_info_platillo", "*", ["id_platillo" => $_GET["id"]]);
}



if ($_POST) {
    $item = $database->select("tb_info_platillo", "*", ["id_platillo" => $_GET["id"]]);

    if (isset($_FILES["platillo_img"]) && $_FILES["platillo_img"]["name"] != "") {
        $errors = [];
        $file_name = $_FILES["platillo_img"]["name"];
        $file_size = $_FILES["platillo_img"]["size"];
        $file_tmp = $_FILES["platillo_img"]["tmp_name"];
        $file_type = $_FILES["platillo_img"]["type"];
        $file_ext_arr = explode(".", $_FILES["platillo_img"]["name"]);

        $file_ext = end($file_ext_arr);
        $img_ext = ["jpeg", "png", "jpg", "webp"];


        if (!in_array($file_ext, $img_ext)) {
            $errors[] = "File type is not supported";
            $message = "File type is not supported";
            var_dump("error encontrado");
        }

        if (empty($errors)) {
            //no subir archivos de mas de 2Mg
            $filename = strtolower($_POST["platillo_nombre"]);
            $filename = str_replace(',', '', $filename);
            $filename = str_replace('.', '', $filename);
            $filename = str_replace(' ', '-', $filename);
            $img = $_POST["categ_nombre"] . "-" . $filename . "." . $file_ext;
            move_uploaded_file($file_tmp, "../img/" . $img);
        }
    } else {
        $img = $item[0]["platillo_img"];
    }
    $database->update("tb_info_platillo", [
        "platillo_nombre" => $_POST["platillo_nombre"],
        "platillo_nombre_tr" => $_POST["platillo_nombre_tr"],
        "platillo_img" => $img,
        "platillo_catego" => $_POST["categ_nombre"],
        "platillo_descrip" => $_POST["platillo_descrip"],
        "platillo_descrip_tr" => $_POST["platillo_descrip_tr"],
        "platillo_precio" => $_POST["platillo_precio"],
        "platillo_cant_per_porci" => $_POST["cant_pers"],
        "destacado" => $_POST["valor"]
    ], [
        "id_platillo" => $_GET["id"]

    ]);
    header("location: ../products-list.php");


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@500;700&family=Marcellus&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin-main.css">
</head>

<body>

    <header>
        <div class="div-header-admin" style="justify-content: center;">
            <h1 class="title-admin">Edit Product</h1>
        </div>
    </header>

<main>
    <?php
    echo $message;

    ?>
    <form class="fomr-admin" action="edit-product.php?id=<?php echo $_GET["id"]?>" method="post" enctype="multipart/form-data">
    <div style="width:30rem">
        <div>
        <label class="input-text-admin" for="platillo_nombre">Name:</label>
        <input class="form-input-admin" id="platillo_nombre" name="platillo_nombre" type="text" value="<?php echo $data[0]["platillo_nombre"] ?>">
        </div>

        <div>
        <label class="input-text-admin" for="platillo_nombre_tr">Nombre español:</label>
        <input class="form-input-admin" id="platillo_nombre" name="platillo_nombre_tr" type="text" value="<?php echo $data[0]["platillo_nombre_tr"] ?>">
        </div>

        <div>
        <label class="input-text-admin"  for="platillo_descrip">Description:</label>
        <textarea class="form-input-admin" style="height:10rem" id="platillo_descrip" name="platillo_descrip" cols="30" rows="10"><?php echo $data[0]["platillo_descrip"]; ?></textarea>
        </div>

        <div>
        <label class="input-text-admin"  for="platillo_descrip_tr">Descripción español:</label>
        <textarea class="form-input-admin" style="height:10rem" id="platillo_descrip" name="platillo_descrip_tr" cols="30" rows="10"><?php echo $data[0]["platillo_descrip_tr"]; ?></textarea>
        </div>

        <div>
        <label class="input-text-admin" for="categ_nombre">Category:</label>
        <select class="form-input-admin" name="categ_nombre" id="categ_nombre">
            <?php 
                foreach ($categories as $category) {
                    if ($data[0]["platillo_catego"] == $category["categ_nombre"]) {
                        echo "<option value='" . $category["categ_nombre"] . "' selected>" . $category["categ_nombre"] . "</option>";
                    } else {
                        echo "<option value='" . $category["categ_nombre"] . "'>" . $category["categ_nombre"] . "</option>";
                    }
                }
            ?>
        </select>
        </div>

        <div>
        <label class="input-text-admin" for="cant_pers">Portions:</label>
        <select class="form-input-admin" name="cant_pers" id="cant_pers">
            <?php 
                foreach ($cantpaxs as $cantpax) {
                    if ($data[0]["platillo_cant_per_porci"] == $cantpax["id_cant_pers"]) {
                        echo "<option value='" . $cantpax["id_cant_pers"] . "' selected>" . $cantpax["cant_pers"] . "</option>";
                    } else {
                        echo "<option value='" . $cantpax["id_cant_pers"] . "'>" . $cantpax["cant_pers"] . "</option>";
                    }
                }
            ?>
        </select>
        </div>

        <div>
        <label class="input-text-admin" for="platillo_precio">Price: €</label>
        <input class="form-input-admin" id="platillo_precio" name="platillo_precio" type="text" value="<?php echo $data[0]["platillo_precio"] ?>">
        </div>

        <div class="div-featured-admin">
        <label  class="input-text-admin" for="destacado">Outstanding:</label>

        <div class="toggle-button-cover">
        <div id="button-3" class="button r">
          <input id="destacado" name="destacado" class="checkbox" type="checkbox" onclick="toggleValue()">
          <div class="knobs"></div>
          <div class="layer"></div>
        </div>
        </div>
        <input type="hidden" id="valor" name="valor" value="<?php echo $data[0]["destacado"] ?>">
        </div>

        <div class="add-btn-admin">
                <input class="submit-btn" type="submit" value="Edit Product">
                <a class="submit-btn" href="../products-list.php">Cancel</a>
            </div>

    </div>

    <div class="div-image-add">
    <div class="div-image-add">
                <label class="input-text-admin" style="margin-bottom: 2rem" for="platillo_img">Preview</label>
                <img class="div-image" style="margin-bottom: 2rem" id="preview" src="../img/<?php echo $data[0]["platillo_img"]; ?>" alt="Preview">
                <div class="upload-btn-wrapper">
                <button class="btn">Upload image
                <input id="platillo_img" class="readfile" type="file" name="platillo_img" onchange="readURL(this)">
                </button>
            
            </div>
            </div>
    </div>

    </form>

    </main>

    <footer>

    <div class="div-header-admin bottom-posicion">
            <img src="../img/graphic-identifier.png" alt="">
    </div>

    </footer>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            var checkbox = document.getElementById("destacado");
            var valueField = document.getElementById("valor");

            if (parseInt(valueField.value) === 1) {
                checkbox.checked = true;
            }

            checkbox.addEventListener("click", function () {
                toggleValue();
            });
        });

        function toggleValue() {
            var checkbox = document.getElementById("destacado");
            var valueField = document.getElementById("valor");

            if (checkbox.checked) {
                valueField.value = 1;
            } else {
                valueField.value = 0;
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {

                let reader = new FileReader();

                reader.onload = function (e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        

    </script>


</body>

</html>