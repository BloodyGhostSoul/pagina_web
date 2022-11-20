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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./css/main.css">

    <!--Flickity-->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <title>Receta</title>
</head>

<body>
    <!--//////////////////////////////////////////Header///////////////////////////////////////////-->
    <header>
        <!--//////////////////////////////////////////Header///////////////////////////////////////////-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container gap-3">
                <a class="navbar-brand" href="#"> <img class="img-fluid w-50" src="./imgs/black-logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="d-flex mx-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn-curved" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-nav-scroll gap-2">
                        <li class="nav-item d-flex me-2">
                            <a class="nav-link align-self-center fw-bold" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item d-flex me-2">
                            <a class="nav-link align-self-center fw-bold" href="#">Acerca de</a>
                        </li>
                        <li class="nav-item d-flex me-2">
                            <a class="nav-link align-self-center fw-bold" href="#">Contact</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn-curved nav-link me-2 fw-bold" href="#">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn-curved nav-link fw-bold" href="#">Registrarse</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <div class="container my-4">
        <div class="row d-flex">
            <div class="col-lg-6 mx-auto flex-grow-1 px-4 my-4">
                <img class="img-fluid" src="./imgs/dish1.png" alt="Pancakes">
            </div>
            <div class="col-lg-6 d-flex mx-auto px-4 my-4">
                <div class="align-self-center">
                    <h2 class="display-6 fw-bold mb-3"><?php echo $data[0]["recipe_name"]; ?></h2>
                    
                    <?php 
                        if($data[0]["is_featured"]=== S){
                            echo '<h4 class="fw-bold text-yellow fst-italic mb-3">Receta Destacada</h4>'
                        }
                    ?>

                    
                    <p class="content">Morbi id mi eget arcu ullamcorper luctus. In in tellus porttitor erat sagittis
                        tincidunt vel
                        vitae felis. Aenean rhoncus diam eget lacus imperdiet, a luctus libero varius. Nunc eget erat
                        vitae neque finibus consequat euismod quis turpis. Cras eu metus convallis, placerat mi nec,
                        fringilla arcu. In porttitor gravida est quis vestibulum. Ut diam neque, volutpat quis risus eu,
                        maximus ultricies dolor. Aenean mattis, ex et venenatis egestas, tortor libero scelerisque sem,
                        sed iaculis enim quam nec enim. In elit mauris, maximus sed ante ut, porta dignissim ex. Vivamus
                        dapibus tortor et diam laoreet tincidunt sed et felis.
                    </p>
                </div>
            </div>
        </div>

        <div class="row px-4">
            <div class="col-1"><a class="text-dark text-decoration-none" href="#"><i
                        class="icon-link fa-solid fa-thumbs-up me-3"></i>0</a></div>
            <div class="col-1"> <a class="text-dark text-decoration-none" href="#"><i
                        class="icon-link fa-solid fa-bookmark"></i></a></div>
            <div class="col-1"> <a class="text-dark text-decoration-none" href="#"><i 
                        class="icon-link fa-solid fa-share"></i></a>
            </div>
        </div>
    </div>
    <hr>

    <!--///////////////////////////Detalles///////////////////////////////////-->

    <div class="container my-4">
        <h4 class="fw-bold">Detalles de la Receta</h4>
        <div>
            <ul class="list-group list-group-flush content">
                <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Tiempo de preparación: <span
                        class="fst-italic text-grey">10 min</span> </li>
                <li class="list-group-item"><i class="fa-solid fa-clock-rotate-left me-3"></i>Tiempo de cocción: <span
                        class="fst-italic text-grey">10 min</span> </li>
                <li class="list-group-item"><i class="fa-solid fa-hourglass-half me-3"></i>Tiempo de total: <span
                        class="fst-italic text-grey">10 min</span> </li>
                <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones: <span
                        class="fst-italic text-grey">10 porciones</span> </li>
                <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad: <span
                        class="fst-italic text-grey">Fácil</span> </li>
            </ul>
        </div>
    </div>
    <hr>

    <!--///////////////////////////Categorías///////////////////////////////////-->
    <div class="container my-4">
        <h4 class="fw-bold mb-3">Categorías</h4>
        <div class="gap-3">
            <a href="#" class="card m-1 p-3 text-center">
                <div class="circle mx-auto d-flex mb-4 justify-content-center">
                    <i class="fa-solid fa-egg align-self-center"></i>
                </div>
                <p class="fw-bold">Desayunos</p>
            </a>
            <a href="#" class="card m-1 p-3 text-center">
                <div class="circle mx-auto d-flex mb-4 justify-content-center">
                    <i class="fa-solid fa-glass-water align-self-center"></i>
                </div>
                <p class="fw-bold">Bebidas</p>
            </a>
            <a href="#" class="card m-1 p-3 text-center">
                <div class="circle mx-auto d-flex mb-4 justify-content-center">
                    <i class="fa-solid fa-bell-concierge align-self-center"></i>
                </div>
                <p class="fw-bold">Entradas</p>
            </a>
            <a href="#" class="card m-1 p-3 text-center">
                <div class="circle mx-auto d-flex mb-4 justify-content-center">
                    <i class="fa-solid fa-utensils align-self-center"></i>
                </div>
                <p class="fw-bold">Almuerzos</p>
            </a>
            <a href="#" class="card m-1 p-3 text-center">
                <div class="circle mx-auto d-flex mb-4 justify-content-center">
                    <i class="fa-solid fa-ice-cream align-self-center"></i>
                </div>
                <p class="fw-bold">Postres</p>
            </a>
            <a href="#" class="card m-1 p-3 text-center">
                <div class="circle mx-auto d-flex mb-4 justify-content-center">
                    <i class="fa-solid fa-bowl-food align-self-center"></i>
                </div>
                <p class="fw-bold">Sopas</p>
            </a>
        </div>
    </div>
    <hr>

    <!--///////////////////////////Ocasiones///////////////////////////////////-->
    <div class="container my-4">
        <h4 class="fw-bold mb-3">Ocasiones</h4>
        <div class="gap-3">
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Todas</p>
            </a>
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Cumpleaños</p>
            </a>
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Día del Padre</p>
            </a>
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Día de la Madre</p>
            </a>
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Día del niño</p>
            </a>
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Navidad</p>
            </a>
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Semana Santa</p>
            </a>
            <a href="#" class="card-variant m-1 p-3 text-center">
                <div class="circle-variant mx-auto d-flex justify-content-center">
                    <i class="fa-solid fa-calendar-check align-self-center"></i>
                </div>
                <p class="fw-bold ms-3 m-0">Verano</p>
            </a>
        </div>
    </div>
    <hr>


    <!--///////////////////////////Ingredientes///////////////////////////////////-->

    <div class="container my-4">
        <h4 class="fw-bold mb-4">Ingredientes</h4>
        <div>
            <p class="content">
                4 torta de Hamburguesa de punta de Solomo (puedes conseguirla en GICO) <br>
                2 cebolla pequeña <br>
                4 cucharadas de aceite <br>
                2 cucharadas de mostaza Dijon <br>
                4 huevos <br>
                2 cucharada de pepinillos <br>
                Sal y pimienta <br>
                4 pan de hamburguesa <br>
                4 cucharadas de Mayonesa <br>
                Hojas de lechuga <br>
                1 mozzarella fresco <br>
                4 higos caramelizados</p>
        </div>
    </div>
    <hr>

    <!--///////////////////////////Instrucciones de Preparación///////////////////////////////////-->

    <div class="container my-4 mb-5">
        <h4 class="fw-bold mb-4">Instrucciones de Preparación</h4>
        <div>
            <p class="content">
                Coloque la torta en la parrilla o plancha, pele las cebollas y córtelos en aros y cocine. Cocine los
                huevos con 1 cucharada de aceite. Escurra los pepinillos

                Abra los panes y caliéntelos, agregue la mayonesa, coloque una hoja de lechuga en la parte inferior,
                corte el queso mozzarella en rodajas y coloque sobre la lechuga, corte los higos en trozos pequeños y
                colóquelos sobre el queso, después colocar la cebolla cocida, coloque la torta de hamburguesa cocida por
                ambos lados y coloque la mostaza, el huevo frito y los pepinillos. Cierre con la parte superior del pan,
                sirva y disfrute.
        </div>
    </div>
    <hr>

    <!--////////////////////////////Me gusta/////////////////////////////////-->
    <div class="container my-5 text-center">
        <h2 class="mx-auto mb-5 fw-bold fst-italic">Recetas Relacionadas</h2>
        <div class="main-carousel mb-3" data-flickity='{ "cellAlign": "left", "contain": true }'>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="card-recipe text-start">
                    <img src="./imgs/card.png" class="card-img-top" alt="Pancakes">
                    <div class="card-body d-flex">
                        <h5 class="align-self-center flex-grow-1 card-title mb-0 p-3 fw-bold fst-italic">
                            Nombre de la receta</h5>
                        <a class="align-self-center me-2 arrow-link" href="#">
                            <i class="icon-link fa-solid fa-circle-chevron-right me-1"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa-solid fa-clock me-3"></i>Prep. time</li>
                        <li class="list-group-item"><i class="fa-solid fa-utensils me-3"></i>Porciones</li>
                        <li class="list-group-item"><i class="fa-solid fa-square-check me-3"></i>Dificultad
                        </li>
                    </ul>
                </div>
            </div>
        </div>

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
                            <li class="list-inline-item me-3"><a href="#" class="text-light footer-link"><small>Términos
                                        y condiciones</small></a>
                            </li>
                            <li class="list-inline-item me-3"><a href="#" class="text-light footer-link"><small>Aviso de
                                        Privacidad</small></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//////////////////////////////////////////FOOTER/////////////////////////////////////////-->


    <!--//////////////////////////Bootstrap Script /////////////////////////////////////-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!--Flickity-->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>

</html>