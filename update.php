<?php
    require 'db.php';

    $ingredients = "";
    foreach ($_POST["ingredients"] as $key => $ingredient) {
        if($key == array_key_last($_POST["ingredients"])){
            $ingredients.= $ingredient;
        }else{
            $ingredients.= $ingredient.",";
        }
    }
    
    $database-> update ("tb_recipes",[
    "recipe_name"=>$_POST["nombreReceta"],
    "recipe_prep_time"=>$_POST["tiempoPreparacion"],
    "recipe_cook_time"=>$_POST["tiempoCoccion"],
    "recipe_total_time"=>$_POST["tiempoTotal"],
    "recipe_portions"=>$_POST["porciones"],
    "recipe_steps"=>$_POST["instrucciones"],
    "recipe_description"=>$_POST["descripcion"],
    "recipe_ingredients"=> $ingredients,
    "is_featured"=>$_POST["recetaDestacada"],    
    "id_recipe_category"=>$_POST["categoria"], 
    "id_recipe_occasion"=>$_POST["ocasion"],
    "id_recipe_complex"=>$_POST["complejidad"],
    ],[
    "id_recipe"=>$_POST["id"]
    ]);
    header("location: admin_view.php")

?>