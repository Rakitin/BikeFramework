<?php

class Session {

	private static $_is_started = FALSE;

	public static function start() {
		if (self::$_is_started == FALSE) {
			session_start();
			self::$_is_started = TRUE;
		}
	}

	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		} else {
			return NULL;
		}
	}

	public static function unseted() {
		if (self::$_is_started == TRUE) {
			session_unset();
		}
	}

	public static function destroy() {
		if (self::$_is_started == TRUE) {
			session_unset();
			session_destroy();
		}
	}

}