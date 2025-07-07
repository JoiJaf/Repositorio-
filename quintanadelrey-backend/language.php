<?php
require_once './database.php';

$dish = [];

if (isset($_SERVER["CONTENT_TYPE"])) {
    $contentType = $_SERVER["CONTENT_TYPE"];


    if ($contentType == "application/json") {
        $content = trim(file_get_contents("php://input"));

        $decoded = json_decode($content, true);

        $response = "server response";
        //echo json_encode($decoded["language"]);

        if ($decoded["language"] == 'EN') {
            $item = $database->select("tb_info_platillo", [
                "tb_info_platillo.platillo_nombre",
                "tb_info_platillo.platillo_descrip"
            ], [
                "id_platillo" => $decoded["id_platillo"]
            ]);

            $dish["name"] = $item[0]["platillo_nombre"];
            $dish["description"] = $item[0]["platillo_descrip"];
        } else {
            $item = $database->select("tb_info_platillo", [
                "tb_info_platillo.platillo_nombre_tr",
                "tb_info_platillo.platillo_descrip_tr"
            ], [
                "id_platillo" => $decoded["id_platillo"]
            ]);
            $dish["name"] = $item[0]["platillo_nombre_tr"];
            $dish["description"] = $item[0]["platillo_descrip_tr"];
        }

        echo json_encode($dish);

    }
}
?>

