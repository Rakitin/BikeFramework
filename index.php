<?php

require_once 'settings.php';

function __autoload($class_name) {
	if (file_exists(DIR . '/class/' . $class_name . '.php')) {
		require_once(DIR . '/class/' . $class_name . '.php');
	} elseif (DIR . '/app_libs/' . $class_name . '.php') {
		require_once(DIR . '/app_libs/' . $class_name . '.php');
	}
}

Session::start();
new Bootstrap();