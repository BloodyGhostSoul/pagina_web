<?php

    require 'db.php';

    //https://simplehtmldom.sourceforge.io/docs/1.9/
    include('simple_html_dom.php');

    //https://stackoverflow.com/questions/4356289/php-random-string-generator
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

$links = ["https://www.cocinafacil.com.mx/recetas-de-comida/receta/pay-de-calabaza-receta-con-orilla-de-masa/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/sidra-de-manzana-casera-para-el-thanksgiving/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/salsa-tartara-tradicional/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/ensalada-mexicana-con-pollo/",
"https://www.cocinafacil.com.mx/recetas/fajitas-de-res-en-freidora-de-aire/",
"https://www.cocinafacil.com.mx/recetas/sopa-de-cebolla-rostizada/",
"https://www.cocinafacil.com.mx/recetas/pollo-con-salsa-de-arandanos/",
"https://www.cocinafacil.com.mx/recetas/ensalada-con-aderezo-de-yogur/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/pay-de-queso-frio/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/churros-con-chocolate/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/delicioso-chocolate-oaxaqueno-bebida-caliente/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/pancita-en-mole-rojo-con-xoconostles/",
"https://www.cocinafacil.com.mx/recetas/tisana-de-frutos-rojos-beneficios/",
"https://www.cocinafacil.com.mx/recetas/pay-de-pera-con-manzana-y-crumble/",
"https://www.cocinafacil.com.mx/recetas/ponche-de-tamarindo-con-tejocotes/",
"https://www.cocinafacil.com.mx/recetas/atole-de-mandarina/",
"https://www.cocinafacil.com.mx/recetas/mictlan-bebida-de-los-muertos/",
"https://www.cocinafacil.com.mx/recetas/pan-de-muerto-acaramelado/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/tamal-de-flor-de-calabaza/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/molletes-mexicanos/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/sandwich-de-pollo-asado-con-aguacate-y-manzana/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/atun-sellado-con-ensalada/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/cajun-de-langostinos/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/que-preparar-con-una-lata-de-atun-tostadas-rendidoras-y-economicas/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/taco-arabe-de-pescado-empanizado-con-ajonjoli/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/filete-de-salmon-marinado-en-miel/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/ensalada-con-atun-y-arroz/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/recetas-con-espinacas-medallones-de-manzana/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/comida-sana-y-rapida-ensalada-de-jitomate/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/ensalada-de-col-con-brocoli/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/papa-en-fetuccini-con-ragu-de-jitomate-y-berenjena/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/huaraches-con-costilla/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/pasta-cremosa-con-atn/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/la-deliciosa-moussaka/",
"https://www.cocinafacil.com.mx/recetas-de-comida/receta/tarta-de-jitomates-rostizados/"];


    // if($_POST){
        //https://geonode.com/free-proxy-list/
        $proxyurl = '81.95.232.73:3128';

        $context = stream_context_create();
        stream_context_set_params($context, array(
            'proxy' => $proxyurl,
            'ignore_errors' => true, 
            'max_redirects' => 3)
        );

        for($i=0;$i<count($links);$i++){

        $recipe = [];
        $ingredients = [];
        $directions = [];
        
        $detailed_recipe = file_get_html($links[$i], 0, $context);

        $data['name'] = $detailed_recipe->find('h1',0)->plaintext;
        
        $image = $detailed_recipe->find('.post-image img',0);
        if($image == null){
            $data['image'] = "no image";
        }else {
            $data['image'] = $image->src;
            file_put_contents("./imgs/recipes/recipe-".generateRandomString().".png",file_get_contents($image->src));
        }

        $data['description'] = $detailed_recipe->find('.simmer-recipe-description p', 0)->plaintext;
        $data['yields'] = $detailed_recipe->find('.simmer-recipe-details-list li', 1)->plaintext;
        $data['likes'] = $detailed_recipe->find('#voting-results span', 1)->plaintext;
        $data['totaltime'] = $detailed_recipe->find('.simmer-recipe-details-list li', 0)->plaintext;
        
        foreach($detailed_recipe->find('.simmer-ingredients li') as $ingredient){
            $ingredients[] = "<li>".$ingredient->plaintext."</li>";
        }
        $data['ingredients'] = $ingredients;

        foreach($detailed_recipe->find('.simmer-recipe-instructions ol li') as $direction){
            $directions[] = "<li>".$direction->plaintext."</li>";
        }
        $data['directions'] = $directions;

        // Reference: https://medoo.in/api/insert
        $database->insert("tb_recipes",[
            "recipe_name"=>$data['name'],
            "recipe_img"=>$data['image'],
            "recipe_prep_time"=> "10 min",
            "recipe_cook_time"=> "20 min",
            "recipe_votes"=> $data['likes'],
            "recipe_total_time"=> trim($data['totaltime']),
            "recipe_portions"=>$data['yields'],
            "recipe_steps"=> $data['directions'],
            "recipe_ingredients"=> $data['ingredients'],
            "recipe_description"=> trim($data['description'])
        ]);  
        $recipe[] = $data;

    }
   // var_dump($recipe);
        
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data scrapping</title>
</head>
<body>
    <form action="scrapper.php" method="post">
        <label for="link">URL</label>    
        <input name="link" type="text">
        <input type="submit" value="GET DATA">
    </form>
    <a href="https://www.delish.com/cooking/recipe-ideas/g3166/cheap-easy-recipes/" target="blank">Recipes</a>
</body>
</html>