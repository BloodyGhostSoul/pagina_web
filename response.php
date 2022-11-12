<?php 
    require 'db.php';
    if(isset($_POST)){
        var_dump($_POST);
        
        // Reference: https://medoo.in/api/insert
        $database->insert("tb_recipes",[
            "recipe_name"=>$_POST["nombreReceta"],
            "recipe_img"=>"recipe-placeholder.png",
            "recipe_prep_time"=>$_POST["tiempoPreparacion"],
            "recipe_cook_time"=>$_POST["tiempoCoccion"],
            "recipe_portions"=>$_POST["porciones"],
            "recipe_steps"=>$_POST["instrucciones"],
            "recipe_description"=>$_POST["descripcion"],
            "recipe_ingredients"=>$_POST["ingredientes"],
            "is_featured"=>$_POST["recetaDestacada"],
            "id_recipe_category"=>$_POST["categoria"],
            "id_recipe_complex"=>$_POST["complejidad"],
            "id_recipe_occasion"=>$_POST["ocasion"],
        ]);

    }
?>