<?php

require_once '../database.php';

$data = $database->select("tb_info_platillo", "*", ["id_platillo" => $_GET["id"]]);

if ($_POST) {
    $database->delete("tb_info_platillo", [
        "id_platillo" => $_POST["delete"]
    ]);

    header("location: ../products-list.php");
}

// if (isset($_GET['tb_info_platillo'])) {
//     $delete = $_GET['id_platillo'];

//     $database->delete("tb_info_platillo", ["id_platillo" => $delete]);

//     header("Location: products-list.php");
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="shortcut icon" href="../img/logo.png">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@500;700&family=Marcellus&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- font -->

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin-main.css">
</head>

<body>
    <form action="delete-product.php" method="post" class="delete-form_ctn" onsubmit="return confirmDelete();">
        <h2 class="title-delete">Delete Product</h2>
        <?php
        echo "<p class='del-text'>You are going to delete: <strong>" . $data[0]["platillo_nombre"] . "</strong> from the Database</p>";
        echo "<label class='del-text' for='delete'>Are you sure to proceed with this action? (<strong>This is not reversible</strong>)</label>";
        ?>
        <input type="hidden" name="delete" id="delete" value="<?php echo $_GET["id"]; ?>">
        <div class="delete-btn">
            <input class="bg-button white" type="submit" value="delete">
            <a class="bg-button" href="../products-list.php"> Go back</a>
        </div>

    </form>

    <script>

        function confirmDelete() {
            return confirm("Are you sure you want to delete this product? This action cannot be undone.");
        }


    </script>
</body>

</html>