<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>
			<?php if (isset($this->title)) : ?>
				<?= $this->title ?> |
			<?php endif; ?>
			<?= SITE_NAME ?>
		</title>
		<meta charset="utf-8">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href='<?= URL ?>/css/style.css' />

		<script type="text/javascript" src='<?= URL ?>/js/jquery-2.0.3.min.js' ></script>
		<script type="text/javascript" src='<?= URL ?>/js/jquery.form.js' ></script>

	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1><?= SITE_NAME ?></h1>
				<ul id="menu">
					<li>
						<a href="<?= URL ?>">Home</a>
					</li>
					<?php if (Session::get('id_user')) : ?>
						<li>
							<a href="<?= URL ?>/account/logout">Login</a>
						</li>
					<?php else : ?>
						<li>
							<a href="<?= URL ?>/account/login">Logout</a>
						</li>
						<li>
							<a href="<?= URL ?>/account/registration">Registration</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
			<div id="content">
				<?php require 'views/' . $name . '.php'; ?>
			</div> 
			<div id="footer">
				<?= SITE_NAME ?>
			</div>
		</div> 
	</body>
</html>