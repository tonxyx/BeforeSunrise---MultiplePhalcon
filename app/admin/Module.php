<?php

namespace Admin;

class Module {

    public function registerAutoloaders() {

        $loader = new \Phalcon\Loader();

        $loader->registerNamespaces(array(
            'Admin\Controllers' => '../app/admin/controllers/',
            'Admin\Models' => '../app/admin/models/',
            'Admin\Plugins' => '../app/admin/plugins/'
        ));

        $loader->register();
    }

    /**
     * Register the services here to make them module-specific
     */
    public function registerServices($di) {

        //Registering a dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace("Admin\Controllers\\");
            return $dispatcher;
        });

        //Registering the view component
        $di->set('view', function() {
            $view = new \Phalcon\Mvc\View();
            $view->setViewsDir('../app/admin/views/');
            $view->registerEngines(array(
                ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
            ));
            return $view;
        });

        //Set a different connection in each module
        $di->set('db', function() {
            return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
                "host" => "localhost",
                "username" => "root",
                "password" => "",
                "dbname" => "invo"
            ));
        });
    }

}
