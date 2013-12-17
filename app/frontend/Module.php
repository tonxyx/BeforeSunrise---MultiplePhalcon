<?php

namespace Frontend;

class Module {

    public function registerAutoloaders() {
        
        $loader = new \Phalcon\Loader();

        $loader->registerNamespaces(array(
            'Frontend\Controllers' => '../app/frontend/controllers/',
            'Frontend\Models' => '../app/frontend/models/',
        ));

        $loader->register();
    }

    /**
     * Register the services here to make them module-specific
     */
    public function registerServices($di) {

        //Registering a dispatcher
        $di->set('dispatcher', function () {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();

            $dispatcher->setDefaultNamespace("Frontend\Controllers");
            return $dispatcher;
        });

        //Registering the view component
        $di->set('view', function () {
            $view = new \Phalcon\Mvc\View();
            $view->setViewsDir('../app/frontend/views/');
            $view->registerEngines(array(
                ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
            ));

            return $view;
        });

        $di->set('db', function () {
            return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
                "host" => "localhost",
                "username" => "root",
                "password" => "",
                "dbname" => "invo"
            ));
        });
    }

}
