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
            'host' => 'db4free.net:3306', //db4free.net:3306
            'database' => 'recipes22',
            'username' => 'admin22',
            'password' => 'Desarrollo2022'
        ]);
    }

   
?>