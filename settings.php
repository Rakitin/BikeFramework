<?php

define('SITE_NAME', 'BikeFramework');

define('PATH', '/' . 'BikeFramework');

define('URL', 'http://' . $_SERVER['HTTP_HOST'] . PATH);
define('DIR', $_SERVER['DOCUMENT_ROOT'] . PATH);

define('DB_DSN', 'mysql:host=localhost;dbname=BikeFramework');
define('DB_USER', 'root');
define('DB_PASS', '');
