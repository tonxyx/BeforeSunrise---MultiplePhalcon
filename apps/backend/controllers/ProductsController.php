<?php

namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Products as Products;

class ProductsController extends ControllerBase {

	public function indexAction()
	{
		$this->view->setVar('product', Products::findFirst());
	}

}