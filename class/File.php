<?php

class File {

	public static function getExt($filename) {
		return substr(strrchr($filename, '.'), 1);
	}
	
	public static function getFileByPath($path) {
		return substr(strrchr($path, '/'), 1);
	}

}