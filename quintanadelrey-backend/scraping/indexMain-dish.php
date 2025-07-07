<?php   

require_once '../database.php';
//https://simplehtmldom.sourceforge.io/docs/1.9/
include('simple_html_dom.php');

//link
//crear una variable para el link

$link = "https://www.allrecipes.com/recipes/17846/world-cuisine/european/spanish/main-dishes/";



//1. crear una variable para los nombres de archivos que se utilizarán para las imgs
$filenames = [];

//2. crear una variable para los nombres de los platillos
$names = [];

//3. crear una variable para las descripciones de los platillos
$descriptions = [];

//4. crear una variable para los links donde están actualmente las imgs
$images = [];



//crear una variable para determinar la cantidad de platillos o bebidas: iniciarla en 6 para platillos y luego en 2 para las bebidas
$platillos = 15;

//crear una variable para el file_get_html y que reciba como parámetro el link al url que se va a hacer el scraping
$get = file_get_html($link);


//1. usar un ciclo para buscar los platillos que están guardados en la variable con el file_get_html. La clase a buscar se llama .card--no-image
foreach ($get->find('.card--no-image') as $gets) {
    //2. dentro del ciclo:
    //a. crear una variable para guardar el nombre de la receta. Buscar el item con el nombre de clase .card__title-text
    $name = $gets->find('.card__title-text');

    //b. crear una variable para tener más detalles del platillo ($details) y hacer otro scraping con un file_get_html() usando el href del item
    $details = file_get_html($gets->href);

    // c. crear una variable para la descripción del platillo, de la variable del punto b debe buscar al elemento con el nombre de clase .article-subheading
    $description = $details->find('.article-subheading');

    //d. crear una variable para la imagen del platillo, de la variable del punto b debe buscar al elemento con el nombre de clase .primary-image__image
    $image = $details->find('.primary-image__image');

    //i. si el count de esa variable es mayor a 0 entonces asignarla a la variable para los links donde están actualmente las imgs

    if (count($image) > 0) {
        $images[] = $image[0]->src;
    }
    /*ii. si el count es menor a 0, buscar una imagen de reemplazo
                - crear una variable que busque del item a la clase que se llama .universal-image__image
                - si el count de esa variable es mayor a 0 entonces asignarla a la variable para los links donde están actualmente las imgs
                    $image_urls[] = $replace_img[0]->{'data-src'};*/
    else {
        $find_img = $gets->find('.universal-image__image');
        if (count($find_img) > 0) {
            $images[] = $find_img[0]->{'data-src'};
        }
    }

    //e. si el count de la variable para la descripción del platillo es mayor a 0
   
        if (count($description) > 0) {
            //i. validar si variable para determinar la cantidad de platillos o bebidas es igual a 0 (si es así se debe detener el ciclo)
            if ($platillos == 0) break;
            $names[] = trim($name[0]->plaintext);
            $descriptions[] = $description[0]->plaintext;

            $filename = strtolower(trim($name[0]->plaintext));
            $filename = str_replace(')', ' ', $filename);
            $filename = str_replace('(', ' ', $filename);
            $filename = str_replace('\'', ' ', $filename); //revisar esto en caso de no funcionar xD
            $filename = str_replace(' ', '-', $filename);
            $filenames[] = $filename;

            $platillos--;
        }
    

}

//descargar las imágenes desde el sitio y llevarlas a la carpeta images

// foreach ($filenames as $index => $image) {
//     file_put_contents("../img/main-dish-" .$image. ".jpg", file_get_contents($images[$index]));
// }

//para asignar precios aleatorios puede usar esto: rand (1*10, 70*10)/10;
//insert info
// Reference: https://medoo.in/api/insert

for($i=0; $i<16; $i++){
    $database->insert("tb_info_platillo", [
        "platillo_nombre" => $names[$i],
        "platillo_img" =>  "main-dish-".$filenames[$i].".jpg",
        "platillo_catego" =>  "Main dishes",
        "platillo_descrip" => $descriptions[$i],
        "platillo_precio" => rand(1*10, 70*10)/10,
        "platillo_cant_per_porci" => rand(1, 4),
        "destacado" => rand(0, 1)
    ]);
}

 //  $database->insert("tb_categorias", [
//     "categ_descrip" => "Spanish paella makes the perfect one-dish meal, but that's not the only thing Spaniards eat for dinner! Try our Spanish recipes for chicken, fish, and even octopus.",
//     "categ_nombre" =>  "Main dishes"
// ]);

?>