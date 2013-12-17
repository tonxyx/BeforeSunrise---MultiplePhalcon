<?php

namespace Frontend;

use Phalcon\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;

class Module implements ModuleDefinitionInterface{

    /** @var string */
    protected $sReflectionPath = '';
    /** @var null */
    protected $mConfig = null;

    public function registerAutoloaders()
    {
    }

    /**
     * Register the services here to make them module-specific
     */
    public function registerServices($di) {
        
        
        /** @var Dispatcher $dispatcher */
        $dispatcher = $di->get('dispatcher');
        $sModuleNameArray = explode(DIRECTORY_SEPARATOR, trim($this->getReflectionPath(), '\\'));
        
//DORADITI UNIVERZALNO ---> Riješeno (greška je u \\ u prijašnjem trimu)
        $sModuleName = array_pop($sModuleNameArray);
        
        $dispatcher->setDefaultNamespace(ucfirst($sModuleName)."\Controllers\\");
        $di->set('dispatcher', $dispatcher);

        //Registering the view component
        /** @var View $view */
        $view = $di->get('view');
        $path = $this->getReflectionPath();
        $view->setViewsDir($path . 'views/');
        $view->setLayoutsDir('../../views/layouts/');
        $view->setPartialsDir('../../views/shared/');
        $view->setVar('moduleName', $sModuleName);
        $view->setVar('bLoadModuleMenu', true);
        $di->set('view', $view);
    }

    /**
     * @param null $sPath
     * @return mixed
     */
    public function getConfig($sPath = null)
    {
        if (!$this->mConfig) {
            if (!$sPath) {
                $sPath = $this->getReflectionPath() . '/config/config.php';
            }
            if (is_readable($sPath)) {
                $this->mConfig = include_once $sPath;
            }
        }
        return $this->mConfig;
    }

    /**
     * @return mixed|string
     */
    protected function getReflectionPath()
    {
        if (empty($this->sReflectionPath)) {
            $oReflectionClass = new \ReflectionClass($this);
            $this->sReflectionPath = str_replace('Module.php', '', $oReflectionClass->getFileName());
        }
        return $this->sReflectionPath;
    }
}
