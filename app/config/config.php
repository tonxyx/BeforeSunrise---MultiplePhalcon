<?php


/**
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * Development environments
 */
const ENVIRONMENT_PRODUCTION = 'production';
const ENVIRONMENT_DEVELOPMENT = 'development';
const ENVIRONMENT_MAINTENANCE = 'maintenance';

define ('ENVIRONMENT', ENVIRONMENT_DEVELOPMENT);
/**
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 */

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
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir' => __DIR__ . '/../../app/models/',
        'modelsFrontendDir' => __DIR__ . '/../../app/frontend/models/',
        'viewsDir' => __DIR__ . '/../../app/views/',
        'viewsDir_frontend' => __DIR__ . '/../../app/frontent/views/',
        'viewsDir_admin' => __DIR__ . '/../../app/admin/views/',
        'pluginsDir' => __DIR__ . '/../../app/plugins/',
        'libraryDir' => __DIR__ . '/../../app/library/',
        'cacheDir' => __DIR__ . '/../../app/cache/',
        'logDir' => __DIR__ . '/../../logs/logger/',
        'picturesDir' => __DIR__ . '/../../public/cdn/images/',
        'baseUri' => '/DitusCore/',
        'siteUrl' => 'http://localhost/DitusCore',
        'siteName' => 'DitusCore'
    )
));
