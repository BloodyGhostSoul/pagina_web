<?php 
    require 'db.php';
    if(isset($_POST)){
        //var_dump($_POST);


        $ingredients = "";
        foreach ($_POST["ingredients"] as $key => $ingredient) {
            if($key == array_key_last($_POST["ingredients"])){
                $ingredients.= $ingredient;
            }else{
                $ingredients.= $ingredient.",";
            }
        }
        // Reference: https://medoo.in/api/insert
        $database->insert("tb_recipes",[
            "recipe_name"=>$_POST["nombreReceta"],
            "recipe_img"=>"recipe-placeholder.png",
            "recipe_prep_time"=>$_POST["tiempoPreparacion"],
            "recipe_cook_time"=>$_POST["tiempoCoccion"],
            "recipe_portions"=>$_POST["porciones"],
            "recipe_steps"=>$_POST["instrucciones"],
            "recipe_description"=>$_POST["descripcion"],
            "recipe_ingredients" => $ingredients,
            "is_featured"=>$_POST["recetaDestacada"],
            "id_recipe_category"=>$_POST["categoria"],
            "id_recipe_complex"=>$_POST["complejidad"],
            "id_recipe_occasion"=>$_POST["ocasion"],
        ]);

    }
?>