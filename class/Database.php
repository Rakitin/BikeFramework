<?php

class Database {

	private static $_is_init = FALSE;
	private static $DB = FALSE;

	public static function init() {
		if (self::$_is_init == FALSE) {
			$option = array(PDO::ATTR_PERSISTENT => true,
							PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
							PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			self::$DB = new PDO(DB_DSN, DB_USER, DB_PASS, $option);
			self::$_is_init = TRUE;
		}
	}

	public static function getDB() {
		self::init();
		return self::$DB;
	}

}