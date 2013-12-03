<?php

namespace Multiple\Frontend\Controllers;

class IndexController extends ControllerBase {

    public function indexAction() {
        if (!$this->request->isPost()) {
            $this->flash->notice('This is a sample application of the Phalcon PHP Framework.
                Please don\'t provide us any personal information. Thanks');
        }
    }

}
