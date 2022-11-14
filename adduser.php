<?php 
    require 'db.php';

    $pass = password_hash($_POST["contraseña"], PASSWORD_DEFAULT, ['cost'=> 12]);

    // Reference: https://medoo.in/api/insert
    $database->insert("tb_users",[
        "username"=>$_POST["usuario"],
        "nombre"=>$_POST["nombre"],        
        "primer_apellido"=>$_POST["primerApellido"],
        "segundo_apellido"=>$_POST["segundoApellido"],
        "correo"=>$_POST["correo"],
        "password"=> $pass
    ]);
?>