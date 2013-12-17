<?php

error_reporting(E_ALL);

class Application extends \Phalcon\Mvc\Application {

    /**
     * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
     */
    protected function _registerServices() {
        
        $config = include __DIR__ . "/../app/config/config.php";
        
        $di = new \Phalcon\DI\FactoryDefault();

        $loader = new \Phalcon\Loader();

        /**
         * We're a registering a set of directories taken from the configuration file
         */
        $loader->registerDirs(
                array(
                    __DIR__ . '/../app/library/' //$config->application->libraryDir
                )
        )->register();

        /**
         * Register a user component
         */
        $di->set('elements', function() {
            return new Elements();
        });

        /**
         * The URL component is used to generate all kind of urls in the application
         */
        $di->set('url', function() use ($config){
            $url = new \Phalcon\Mvc\Url();
            $url->setBaseUri($config->application->baseUri);
            return $url;
        });

        /**
         * Registering a router
         */
        $di->set('router', function() {

            $router = new \Phalcon\Mvc\Router();

            $router->setDefaultModule("frontend");

            $router->add('/:controller/:action', array(
                'module' => 'frontend',
                'controller' => 1,
                'action' => 2,
            ));
            
            $router->add("/admin/:controller/:action", array(
                'module' => 'admin',
                'controller' => 1,
                'action' => 2,
            ));

            $router->add("/session/:action", array(
                'module' => 'admin',
                'controller' => 'session',
                'action' => 1,
            ));

            $router->add("/products/:action", array(
                'module' => 'admin',
                'controller' => 'products',
                'action' => 1,
            ));

            return $router;
        });

        /**
         * Start the session the first time some component request the session service
         */
        $di->set('session', function() {
            $session = new Phalcon\Session\Adapter\Files();
            $session->start();
            return $session;
        });

        /** 
         * Register the flash service with custom CSS classes
         */
        $di->set('flash', function() {
            return new Phalcon\Flash\Direct(array(
                'error' => 'alert alert-error',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info',
            ));
        });

        $this->setDI($di);
    }

    public function main() {

        $this->_registerServices();

        /**
         * Register the installed modules
         */
        $this->registerModules(array(
            'frontend' => array(
                'className' => 'Frontend\Module',
                'path' => '../app/frontend/Module.php'
            ),
            'admin' => array(
                'className' => 'Admin\Module',
                'path' => '../app/admin/Module.php'
            )
        ));

        echo $this->handle()->getContent();
    }

}

$application = new Application();
$application->main();
