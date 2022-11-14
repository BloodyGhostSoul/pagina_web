<?php 
    require 'db.php';

    if($_POST){
        //var_dump($_POST);
        $user = $database->select("tb_users","*", [
            "username" => $_POST["usuario"]
        ]);

        echo "USER:  ".count($user);

        if(count($user) > 0){
            if(password_verify($_POST["contraseña"], $user[0]["contraseña"])){
                //echo "valid usuario and password";

                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["usuario"] = $user[0]["usuario"];
                
                header("Location:admin_view.php");
            }else{
                echo "wrong usuario or password";
            }
        }else{
            echo "wrong usuario or password";
        }

    }
?>