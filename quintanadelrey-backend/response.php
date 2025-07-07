<?php
require_once 'database.php';
// Reference: https://medoo.in/api/insert
if ($_GET) {
    $newUser = $database->select("tb_usuarios", "*", [
        "id_usuario" => $_GET["id"]
    ]);
}
?>
<!-- hay que dar formato a esto -->
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="../img/logo.png">

<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Cabin:wght@500;700&family=Marcellus&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet">
<!-- font -->

<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/admin-main.css">

<style>
    .btn-res-ctn {
        display: flex;
    }

    .title-res {
        font-size: var(--font-size-md);
        font-family: var(--font_roboto);
        text-align: center;
    }

    .ctn-btn-res{
        margin: 2vw;
        display: flex;
        text-align: center;
        flex-direction: column;
        align-items: center;
        gap: 1vw;
       
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response</title>
</head>

<body>
    <div class="delete-form_ctn">
        <img class="div-image" style="margin-bottom: 2rem" id="preview" src="./img/escudo.png" alt="Preview">
        <h1 class="title-res">Thanks for register on our website</h1>
        <?php
        echo "<p class='del-text'>".$newUser[0]["nombre"]." </P>";
        ?>
        <div class="ctn-btn-res">
            <a class="bg-button" href="register.php?=" <?php echo $newUser[0]["id_usuario"]; ?>>Login</a>
            <a class="bg-button" href="index.php">Return to main page</a>
        </div>
        
    </div>


</body>

</html>