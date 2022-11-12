<?php 
    namespace Medoo;
    require 'Medoo.php';
    
    /* 
    - For Laragon: username='root' / password=''
    - For MAMP: username='root' / password='root'
      */
    if(!isset($database)){
        $database = new Medoo([
            'type'=>'mysql',
            'host' => 'localhost',
            'database' => 'become_the_chef',
            'username' => 'root',
            'password' => ''
        ]);
    }

   
?>