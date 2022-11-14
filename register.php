<?php 
    require 'db.php';

    
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

    <title>Register</title>
</head>

<body>
    <div class="container-fluid container-img p-0 m-0">
        <div class="row d-flex justify-content-center p-0 m-0">
            <div class="container-grey my-5 py-5">
                <form action="adduser.php" method="post">
                    <h1 class="fw-bold text-center mt-4">Registrarse</h1>
                    <p class="text-center content">Te damos la bienvenida</p>
                    <div class="row d-flex justify-content-center gap-3 mx-2">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="row col-lg-9 col-md-9 col-sm-12 p-0">
                            <div class="col">
                                <label for="primerApellido" class="form-label fw-bold">Primer Apellido</label>
                                <input id="primerApellido" class="form-control" name="primerApellido" type="text"
                                    placeholder="Primer Apellido">
                            </div>
                            <div class=" col">
                                <label for="segundoApellido" class="form-label fw-bold">Segundo Apellido</label>
                                <input id="segundoApellido" class="form-control" name="segundoApellido" type="text"
                                    placeholder="Segundo Apellido">
                            </div>
                        </div>

                        <div class=" col-lg-9 col-md-9 col-sm-12">
                            <label for="correo" class="form-label fw-bold">Correo</label>
                            <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo">
                        </div>

                        <div class=" col-lg-9 col-md-9 col-sm-12">
                            <label for="usuario" class="form-label fw-bold">Usuario</label>
                            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                        </div>

                        <div class=" col-lg-9 col-md-9 col-sm-12">
                            <label for="contraseña" class="form-label fw-bold">Contraseña </label>
                            <input id="contraseña" class="form-control" type="password" name="contraseña" placeholder="Contraseña">
                        </div>

                    </div>
                    <input class="btn-curved text-dark mx-auto fw-bold d-flex justify-content-center mt-4 mb-3" type="submit" value="Registrarse">

                     <!--<button                    
                        class="btn-curved fw-bold mx-auto d-flex justify-content-center mt-4 mb-3" >Registrarse</button>-->
                    <p class="text-center content">Al unirte, aceptas los <ins>Términos y Condiciones</ins></p>
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
                            <a class="btn-curved nav-link fw-bold mb-4 me-3" href="#">Registrarse</a>
                            <a class="btn-curved nav-link me-2 fw-bold" href="#">Iniciar Sesión</a>
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

    </div>
</body>

</html>