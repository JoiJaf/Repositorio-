<?php
require_once 'database.php';
$message = "";

if ($_POST) {

    if (isset($_POST["login"])) {

        $user = $database->select("tb_usuarios", "*", [
            "nombre_usuario" => $_POST["userlog"]
        ]);
        var_dump($user);

        if (count($user) > 0) {
            //validate password

            if (password_verify($_POST["passlog"], $user[0]["contrasena"])) {
                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["usr_name"] = $user[0]["nombre_usuario"];
                header("location: index.php");
            } else {
                $message = "wrong username or password";
                var_dump("estoy aqui");
            }
        } else {
            $message = "wrong username or password";
        }

        //validate if user already logged in

        //if(isset($_SESSION["isLoggedIn"])){
        //header("location: book.php?id=".$_POST["login"]);
        //}else{
        //validate login
        //echo "validate login: ".$_POST["login"];
        //}
    }

    if (isset($_POST["register"])) {
        //validate if user already registered
        $validateUsername = $database->select("tb_usuarios", "*", [
            "nombre_usuario" => $_POST["user"]
        ]);
        $validateCedula = $database->select("tb_usuarios", "*", [
            "cedula" => $_POST["id"]
        ]);
        $validateEmail = $database->select("tb_usuarios", "*", [
            "correo" => $_POST["email"]
        ]);

        if (count($validateUsername) > 0) {
            $message = "This username is already registered";
        } else {
            if (count($validateCedula) > 0) {
                $message = "This ID is already registered";
            } else {
                if (count($validateEmail) > 0) {
                    $message = "This email is already registered";
                } else {
                    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);
                    $database->insert("tb_usuarios", [
                        "nombre" => $_POST["firstName"],
                        "apellido" => $_POST["lastName"],
                        "cedula" => $_POST["id"],
                        "telefono" => $_POST["phone"],
                        "correo" => $_POST["email"],
                        "fecha_nacimiento" => $_POST["birthday"],
                        "nombre_usuario" => $_POST["user"],
                        "contrasena" => $pass
                    ]);

                    $id = $database->select("tb_usuarios", "*", [
                        "correo" => $_POST["email"]

                    ]);

                    var_dump($id[0]["id_usuario"]);


                    //header("location: book.php?id=".$_POST["register"]);
                    header("location: response.php?id=" . $id[0]["id_usuario"] . "");
                }
            }


        }
    }



}

if ($_GET) {

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
        <div class="register-ctn">

            <section class="login-ctn">
                <h2 class="login-title">log in</h2>
                <img class="login-shield" src="./img/escudo.png" alt="">
                <div class="login-form-ctn">

                    <form class="form-ctn" method="post" action="register.php">
                        <div class="form-inputs">
                            <img src="./img/min-login.png" alt="">
                            <input class="fr-input_log" type="text" name="userlog" placeholder="Username">
                        </div>

                        <div class="form-inputs">
                            <img src="./img/min-pwd.png" alt="">
                            <input class="fr-input_log" type="password" name="passlog" placeholder="Password">
                        </div>

                        <div class="form-tools"> <!-- a esto hay que corregir y poner un width de 100%-->
                            <div>
                                <input type="checkbox"> <span>remember user</span>
                            </div>
                            <a class="link-pwd" href=""> ¿forget your password?</a>
                        </div>

                        <div class="div-login-btn">
                            <input class="login-btn" type="submit" value="Login">
                        </div>
                        <p>
                            <?php echo $message; ?>
                        </p>
                        <input type="hidden" name="login" value="1">

                    </form>



                    <!-- <a href="index.php">
                        <img src="./img/btn_logIn.png" alt="">
                    </a> -->

                    <hr>

                    <div class="login-btns">
                        <a href="https://www.google.com/?hl=es">
                            <img src="./img/btn_google.png" alt="">
                        </a>
                        <a href="https://www.bing.com/ck/a?!&&p=521e8549451a02dfJmltdHM9MTcwMTY0ODAwMCZpZ3VpZD0wMmYyNGQ0ZS03OGM5LTY3ZDctMDJlYi01YzFlNzk3NzY2OWYmaW5zaWQ9NTE5Nw&ptn=3&ver=2&hsh=3&fclid=02f24d4e-78c9-67d7-02eb-5c1e7977669f&psq=facebook&u=a1aHR0cHM6Ly9lcy1sYS5mYWNlYm9vay5jb20v&ntb=1">
                            <img src="./img/btn_face.png" alt="">
                    </div>


                    </a>

                </div>

            </section>


            <section class="registration">

                <h2 class="login-title">create Account</h2>
                <img class="login-shield" src="./img/escudo.png" alt="">
                <div class="login-form-ctn">
                    <form class="form-ctn" method="post" action="register.php">

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">Name: </p>
                                <input name="firstName" class="fr-input_log" type="text" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">Last name: </p>
                                <input name="lastName" class="fr-input_log" type="text" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">ID: </p>
                                <input name="id" class="fr-input_log" type="text" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">User: </p>
                                <input name="user" class="fr-input_log" type="text" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">Password: </p>
                                <input name="password" class="fr-input_log" type="password" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">Phone: </p>
                                <input name="phone" class="fr-input_log" type="text" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">Email: </p>
                                <input name="email" class="fr-input_log" type="text" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>

                        <div class="register">
                            <div class="register-align">
                                <p class="register-text">Birthday: </p>
                                <input name="birthday" class="fr-input_log" type="date" class=""></input>
                            </div>

                            <hr class="register-bar">
                        </div>
                        <input class="createAcountbtn" type="submit" value="Create acount">
                        <p>
                            <?php echo $message; ?>
                        </p>
                        <input type="hidden" name="register" value="1">
                    </form>

            </section>

        </div>
    </main>

    <?php
    include("./parts/footer.php");
    ?>

    <script src="./js/funtions.js"></script>


</body>

</html>