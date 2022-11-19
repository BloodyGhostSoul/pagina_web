<?php 
    
    require 'db.php';
    
    // Reference: https://medoo.in/api/select
    $category = $database->select("tb_recipe_category","*");
    $occasion = $database->select("tb_recipe_occasion","*");
    $complex = $database->select("tb_recipe_complex","*");
   

    if(isset($_GET)){
    $data = $database->select("tb_recipes", "*", [
        "id_recipe" => $_GET["id"]
    ]);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--GOOGLE FONTS
    Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!--GOOGLE FONTS
    Noto serif-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        onerror="this.onerror=null;this.href='./css/vendors/bootstrap.min.css';">
    <link rel="stylesheet" href="./css/main.css">

    <title>Recipe Register</title>
</head>

<body>
    <div class="row d-flex justify-content-center p-0 m-0">

        <div class="container my-5 p-lg-5">
            <form action="update.php" method="post">
                <h1 class="display-3 fw-bold text-center">Registro de recetas</h1>
                <p class="text-phar text-center ">Ingrese los datos de la receta</p>              

                <div class="row d-flex justify-content-center mx-2">

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="my-4">
                            <label for="nombreReceta" class="form-label fw-bold">Nombre de la Receta</label>
                            <div class="input-group">
                                <div class="form-floating">
                                    <input id="nombreReceta" class="form-control" type="text" name="nombreReceta"
                                        placeholder="Nombre Receta" value="<?php echo $data[0]["recipe_name"]; ?>">
                                    <label for="nombreReceta">Nombre de la Receta</label>
                                </div>
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="tiempoPreparacion" class="form-label fw-bold">Tiempo de preparación</label>
                            <div class="input-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="tiempoPreparacion" name="tiempoPreparacion"
                                        placeholder="Tiempo de preparacion" value="<?php echo $data[0]["recipe_prep_time"]; ?>">
                                    <label for="tiempoPreparacion">Ingrese el tiempo de preparación</label>
                                </div>
                                <span class="input-group-text px-2">min</span>
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="tiempoCoccion" class="form-label fw-bold">Tiempo de Cocción</label>
                            <div class="input-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="tiempoCoccion" name="tiempoCoccion"
                                        placeholder="Username" value="<?php echo $data[0]["recipe_cook_time"]; ?>">
                                    <label for="tiempoCoccion">Ingrese el tiempo de Cocción</label>
                                </div>
                                <span class="input-group-text">min</span>
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="tiempoTotal" class="form-label fw-bold">Tiempo Total</label>
                            <div class="mb-2">
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control " id="tiempoTotal" name="tiempoTotal"
                                            placeholder="Tiempo Total" value="<?php echo $data[0]["recipe_total_time"]; ?>">
                                        <label for="tiempoTotal">Ingrese el tiempo Total</label>
                                    </div>
                                    <span class="input-group-text px-2">min</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="porciones" class="form-label fw-bold">Porciones</label>
                            <div class="input-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="porciones" name="porciones"
                                    placeholder="Porciones" value="<?php echo $data[0]["recipe_portions"]; ?>">
                                    <label for="porciones">Ingrese las porciones</label>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!--Segunda Columna-->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="my-4">
                            <label for="complejidad" class="form-label fw-bold">Complejidad</label>
                            <select class="form-select form-select-sm py-3" name="complejidad" id="complejidad">
                                <option selected>Elija la Complejidad</option>
                                <?php
            
                                        $len = count($complex);
                                        for($i=0; $i < $len; $i++){
                                            if($data[0]["id_recipe_complex"] === $complex[$i]['id_recipe_complex']){
                                                echo '<option value="'.$complex[$i]
                                                ['id_recipe_complex'].'" selected>'.$complex[$i] //selected, para que lo muestre en la casilla como seleccionado
                                                ['recipe_complex'].'</option>';
                                            }else{
                                                echo '<option value="'.$complex[$i]
                                                ['id_recipe_complex'].'">'.$complex[$i]
                                                ['recipe_complex'].'</option>';
                                            }
                                            
                                        }

                                    ?>
                            </select>
                        </div>

                        <div class="my-4">
                            <label for="categoria" class="form-label fw-bold">Categoría</label>
                            <div class="mb-3 ">
                                <select class="form-select form-select-sm py-3" name="categoria" id="categoria">
                                    <option selected>Elija la Categoría</option>
                                    <?php
            
                                        $len = count($category);
                                        for($i=0; $i < $len; $i++){
                                            if($data[0]["id_recipe_category"] === $category[$i]['id_recipe_category']){
                                                echo '<option value="'.$category[$i]
                                                ['id_recipe_category'].'" selected>'.$category[$i] //selected, para que lo muestre en la casilla como seleccionado
                                                ['recipe_category'].'</option>';
                                            }else{
                                                echo '<option value="'.$category[$i]
                                                ['id_recipe_category'].'">'.$category[$i]
                                                ['recipe_category'].'</option>';
                                            }
                                            
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="ocasion" class="form-label fw-bold">Ocasión</label>
                            <select class="form-select form-select-sm py-3 " name="ocasion" id="ocasion">
                                <option selected>Elija la Ocasión</option>
                                <?php
            
                                        $len = count($occasion);
                                        for($i=0; $i < $len; $i++){
                                            if($data[0]["id_recipe_occasion"] === $occasion[$i]['id_recipe_occasion']){
                                                echo '<option value="'.$occasion[$i]
                                                ['id_recipe_occasion'].'" selected>'.$occasion[$i] //selected, para que lo muestre en la casilla como seleccionado
                                                ['recipe_occasion'].'</option>';
                                            }else{
                                                echo '<option value="'.$occasion[$i]
                                                ['id_recipe_occasion'].'">'.$occasion[$i]
                                                ['recipe_occasion'].'</option>';
                                            }
                                            
                                        }

                                    ?>
                            </select>

                        </div>

                        <div class="my-4">
                            <label for="recetaDestacada" class="form-label fw-bold">¿Receta destacada?</label>
                            <div class="mb-3">
                                <select class="form-select form-select-sm py-3" name="recetaDestacada"
                                    id="recetaDestacada">
                                    <option selected>Elija una opción</option>

                                    <?php

                                        if($data[0]["is_featured"] === "S"){
                                            echo "<option value='S' selected>Sí</option>";
                                            echo "<option value='N'>No</option>";
                                        }else{
                                            echo "<option value='S'>Sí</option>";
                                            echo "<option value='N' selected>No</option>";
                                        }

                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="votos" class="form-label fw-bold">Votos de la Receta</label>
                            <div class="input-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="votos" name="votos"
                                    placeholder="Votos">
                                    <label for="votos">Ingrese los votos de la receta</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="col-lg-7 col-md-9 col-sm-12 my-4">
                            <label for="imagen" class="form-label fw-bold">Imagen</label>
                            <input id="imagen" class="form-control" type="file" name="imagen">
                        </div>

                        <div class="col-lg-7 col-md-9 col-sm-12 my-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <textarea id="descripcion" class="form-control" name="descripcion" type="text"
                            placeholder="Descripción"><?php echo $data[0]["recipe_description"]; ?></textarea>

                        <div class="col-lg-7 col-md-9 col-sm-12 my-4">
                            <label for="ingredientes" class="form-label fw-bold">Ingredientes</label>
                            <textarea id="ingredientes" class="form-control" name="ingredientes"
                            placeholder="Ingredientes" value="<?php echo $data[0]["recipe_ingredients"]; ?>"></textarea>
                        </div>

                        <div class="col-lg-7 col-md-9 col-sm-12 my-4">
                            <label for="instrucciones" class="form-label fw-bold">Instrucciones de preparacion</label>
                            <textarea id="instrucciones" class="form-control" name="instrucciones"
                            placeholder="Instrucciones" value="<?php echo $data[0]["recipe_steps"]; ?>"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start">
                        <div class="col-lg-6 col-sm-6 my-4"> 
                            <input type="hidden" name="id" value="<?php echo $data[0]["id_recipe"]; ?>">                           
                            <input class="btn-curved text-dark me-2 fw-bold" type="submit" value="Modificar Receta">                            
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!--//////////////////////////////////////////FOOTER/////////////////////////////////////////-->
        <div class="container-fluid d-flex mt-5 pt-5 pb-0 footer-bg">
            <div class="container align-self-center">

                <div class="row mb-3">
                    <div class="col-lg-3 col-sm-6 my-4">
                        <img src="./imgs/white-logo.png" alt="Logo">
                    </div>
                    <div class="col-lg-3 col-sm-6 my-4">
                        <h5 class="fw-bold mb-3"><a href="#" class="text-light footer-link">Inicio</a></h5>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a href="#" class="text-light footer-link">Recetas destacadas</a></li>
                            <li class="mb-3"><a href="#" class="text-light footer-link">Categorías</a></li>
                            <li class=""><a href="#" class="text-light footer-link">Ocasiones</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 my-4">
                        <h5 class="fw-bold mb-3">Síguenos</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a href="#" class="text-light footer-link"><i
                                        class="fab fa-facebook me-2"></i>Facebook</a></li>
                            <li class="mb-3"><a href="#" class="text-light footer-link"><i
                                        class="fab fa-instagram me-2"></i>Instagram</a></li>
                            <li class=""><a href="#" class="text-light footer-link"><i
                                        class="fab fa-twitter me-2"></i>Twitter</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 my-4">
                    <a class="btn-curved nav-link fw-bold mb-4 me-3" href="register.php">Registrarse</a>
                        <a class="btn-curved nav-link me-2 fw-bold" href="login.html">Iniciar Sesión</a>
                    </div>
                </div>
                <div class="border-top py-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <small>2022. Become the chef. Todos los derechos reservados</small>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <ul class="list-inline text-lg-end">
                                <li class="list-inline-item me-3"><a href="#"
                                        class="text-light footer-link"><small>Términos y condiciones</small></a>
                                </li>
                                <li class="list-inline-item me-3"><a href="#"
                                        class="text-light footer-link"><small>Aviso de Privacidad</small></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//////////////////////////////////////////FOOTER/////////////////////////////////////////-->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>