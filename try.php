<?php 
    include('simple_html_dom.php');

    $html = file_get_html('https://www.cocinafacil.com.mx/recetario/');

    echo $html;

?>