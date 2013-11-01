<?php

class Paging {

	static function Html($total_item, $count_item_on_page, $cur_page, $get_param) {
		$uri = strtok($_SERVER['REQUEST_URI'], "?") . "?";
		if (count($_GET)) {
			foreach ($_GET as $k => $v) {
				if ($k != $get_param && $k != 'url' && $k != '_')
					$uri.=urlencode($k) . "=" . urlencode($v) . "&";
			}
		}
		$num_pages = ceil($total_item / $count_item_on_page);
		if ($num_pages < 2)
			return;

		for ($i = 1; $i <= $num_pages; $i++) {
			$PAGES[$i] = $uri . $get_param . '=' . $i;
		}

		$count_page_lr = 10;

		if ($cur_page > $count_page_lr + 1)
			echo '<a href="' . $PAGES[1] . '">1</a> ... ';

		for ($i = $cur_page - $count_page_lr; $i < $cur_page + $count_page_lr + 1; $i++) {
			if ($i > 0 && $i <= $num_pages && $i != $cur_page)
				echo ' <a href="' . $PAGES[$i] . '">' . $i . '</a> ';
			if ($i == $cur_page)
				echo '<b>' . $cur_page . '</b>';
		}

		if ($cur_page < ($num_pages - $count_page_lr))
			echo " ... <a href='#!{$PAGES[$num_pages]}'>{$num_pages}</a> ";
	}

}