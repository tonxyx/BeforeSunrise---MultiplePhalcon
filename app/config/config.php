<?php

$aModules = array('frontend', 'admin');

return new \Phalcon\Config(array(
    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'invo',
    ),
    'application' => array(
        'pluginsDir' => __DIR__ . '/../../app/plugins/',
        'libraryDir' => __DIR__ . '/../../app/library/',
        'cacheDir' => __DIR__ . '/../../app/cache/',
        'logDir' => __DIR__ . '/../../logs/logger/',
        'picturesDir' => __DIR__ . '/../../public/cdn/images/',
        'baseUri' => '/BeforeSunrise/',
        'siteUrl' => 'http://localhost/BeforeSunrise/',
        'siteName' => 'BeforeSunrise'
    )
));
