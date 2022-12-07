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
            'database' => 'become_the_chef2',
            'username' => 'admin_v2',
            'password' => 'Desarrollo22'
        ]);
    }

   
?>