<?php

class View {

	function __construct() {
		
	}

	public function render($name, $template_name = null, $data = null) {
		if (isset($template_name)) {
			require 'views/' . $template_name . '.php';
		} else {
			require 'views/' . $name . '.php';
		}
	}

	public static function renderAction($controller_name, $action_name = null, $data = null) {
		if (empty($controller_name)) {
			require_once 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return FALSE;
		}

		$file = 'controllers/' . $controller_name . '.php';
		if (file_exists($file)) {
			require_once $file;
		} else {

			require_once 'controllers/error.php';
			$controller = new Error();
			return FALSE;
		}

		$controller = new $controller_name;

		if (isset($data)) {
			if (method_exists($controller, $action_name)) {
				$controller->{$action_name}($data);
			} else {
				require_once 'controllers/error.php';
				$controller = new Error();
			}
		} elseif (isset($action_name)) {
			if (method_exists($controller, $action_name)) {
				$controller->{$action_name}();
			} else {
				require_once 'controllers/error.php';
				$controller = new Error();
			}
		} else {
			$controller->index();
		}
	}

}