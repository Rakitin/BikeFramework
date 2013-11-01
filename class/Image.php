<?php

class Image {

	public static function resizeFile($src, $dis, $width, $height) {
		$size = getimagesize($src);
		switch ($size['mime']) {
			case 'image/gif':
				$source = imagecreatefromgif($src);
				break;
			case 'image/x-png':
			case 'image/png':
				$source = imagecreatefrompng($src);
				break;
			default:
				$source = imagecreatefromjpeg($src);
				break;
		}
		if ($width < $size[0] || $height < $size[1]) {
			$ratio_orig = $size[0] / $size[1];
			if ($width / $height > $ratio_orig) {
				$width = $height * $ratio_orig;
			} else {
				$height = $width / $ratio_orig;
			}
		} else {
			$width = $size[0];
			$height = $size[1];
		}
		$target = imagecreatetruecolor($width, $height);
		imagealphablending($target, false);
		imagesavealpha($target, true);
		imagecopyresampled($target, $source, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);

		switch ($size['mime']) {
			case 'image/gif':
				imagegif($target, $dis);
				break;
			case 'image/x-png':
			case 'image/png':
				imagepng($target, $dis);
				break;
			default:
				imagejpeg($target, $dis);
				break;
		}
	}

	public static function cutFile($src, $dis, $x, $y, $width, $height) {
		$size = getimagesize($src);
		switch ($size['mime']) {
			case 'image/gif':
				$source = imagecreatefromgif($src);
				break;
			case 'image/x-png':
			case 'image/png':
				$source = imagecreatefrompng($src);
				break;
			default:
				$source = imagecreatefromjpeg($src);
				break;
		}

		$target = imagecreatetruecolor($width, $height);
		imagecopyresampled($target, $source, 0, 0, $x, $y, $width, $height, $width, $height);

		switch ($size['mime']) {
			case 'image/gif':
				imagegif($target, $dis);
				break;
			case 'image/x-png':
			case 'image/png':
				imagepng($target, $dis);
				break;
			default:
				imagejpeg($target, $dis);
				break;
		}
	}

}