<?php

namespace Multiple\Backend\Controllers;

use Multiple\Frontend\Views;

class IndexController extends ControllerBase {

	public function indexAction()
	{
		//return $this->_forward('/login');
                if (!$this->request->isPost()) {
                    $this->flash->notice('This is a sample application of the Phalcon PHP Framework.
                    Please don\'t provide us any personal information. Thanks');
            }
	}

}