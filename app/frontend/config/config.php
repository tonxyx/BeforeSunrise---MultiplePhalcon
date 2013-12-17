<?php
 
return new \Phalcon\Config(array(
    'database' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'invo',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' =>  __DIR__ . '/../models/',
        'viewsDir' =>  __DIR__ . '/../views/',
        'baseUri' => '/BeforeSunrise/'
    )
));