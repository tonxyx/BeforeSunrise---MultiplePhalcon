<?php

namespace Frontend\Controllers;

class AboutController extends ControllerBase {

    public function indexAction() {
        $this->view->setTemplateAfter('main');
    }

}
