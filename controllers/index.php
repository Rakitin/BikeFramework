<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index($id = NULL) {

		$this->view->render("index/index", "template_view");
	}

}