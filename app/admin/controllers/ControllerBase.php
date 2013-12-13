<?php

namespace Admin\Controllers;

class ControllerBase extends \Phalcon\Mvc\Controller {

    public function initialize() {
        $this->view->setTemplateAfter('main');
      }

    protected function forward($uri){
    	$uriParts = explode('/', $uri);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0], 
    			'action' => $uriParts[1]
    		)
    	);
    }
}