<?php

class Controller {

	function __construct() {
		Session::start();
		$this->view = new View();
		//$this->db = new Database();
		//Database2::init();
	}

	protected function isAjaxRequest() {
		return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
				!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
				strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}

	protected function getIPClient() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

}