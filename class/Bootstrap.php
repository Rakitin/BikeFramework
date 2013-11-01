<?php

class Bootstrap {

	function __construct() {
		$url = isset($_GET['url']) ? $_GET['url'] : NULL;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		if (isset($url[1]) && isset($url[2])) {
			View::renderAction($url[0], $url[1], $url[2]);
		} elseif (isset($url[1])) {
			View::renderAction($url[0], $url[1]);
		} else {
			View::renderAction($url[0]);
		}
	}

}