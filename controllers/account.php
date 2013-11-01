<?php

class Account extends Controller {

	function __construct() {
		parent::__construct();
	}

	function login() {
		$this->view->render("account/login", "template_view");
	}

	function login_post() {
		$err_validation = array();
		if (strlen($_POST['Email']) == 0)
			$err_validation[] = new ValidationElementError('Email', "Enter e-mail");
		if (strlen($_POST['Password']) == 0)
			$err_validation[] = new ValidationElementError('Password', "Enter password");
		if (count($err_validation) == 0) {
			$stm = Database::getDB()->prepare("SELECT id_user,
												email,
												name
											FROM user 
											WHERE email=:email AND
											password=MD5(:password)");
			$stm->execute(array(
				':email' => $_POST['Email'],
				':password' => $_POST['Password']
			));

			if ($stm->rowCount() == 1) {
				$user = $stm->fetch();
				Session::set("id_user", $user['id_user']);
				Session::set("user_name", $user['name']);
			} else {
				$err_validation[] = new ValidationElementError('Password', "Incorrect e-mail or password");
			}
		}
		$result = new FormPostResult($err_validation, "");
		echo json_encode($result);
	}

	function logout() {
		Session::unseted();
		header('location:' . URL);
	}

	function registration() {
		$this->view->render("account/registration", "template_view");
	}

	function registration_post() {

		$err_validation = array();
		if (strlen($_POST['Name']) == 0)
			$err_validation[] = new ValidationElementError('Name', 'Enter name');
		if (strlen($_POST['Email']) == 0)
			$err_validation[] = new ValidationElementError('Email', 'Enter e-mail');
		if (strlen($_POST['Password']) == 0)
			$err_validation[] = new ValidationElementError('Password', 'Enter password');
		if (strlen($_POST['ConfirmPassword']) == 0)
			$err_validation[] = new ValidationElementError('ConfirmPassword', 'Enter confirm password');
		if (strlen($_POST['Password']) && strlen($_POST['ConfirmPassword']) && strcmp($_POST['Password'], $_POST['ConfirmPassword']))
			$err_validation[] = new ValidationElementError('Password', 'Password and confirm password is different');

		if (strlen($_POST['Email']) != 0) {
			$stm = Database::getDB()->prepare("SELECT COUNT(*) 
											FROM user 
											WHERE email=:email");
			$stm->execute(array(
				':email' => $_POST['Email']
			));
			$user_exist = $stm->fetch()['COUNT(*)'];
			if ($user_exist > 0)
				$err_validation[] = new ValidationElementError('Email', 'Пользователь с таким E-mail уже существует');
		}

		if (count($err_validation) == 0) {
			$stm = Database::getDB()->prepare("INSERT INTO user 
												SET name=:name,
													email=:email,
													password=MD5(:password)");
			$stm->execute(array(
				':name' => $_POST['Name'],
				':email' => $_POST['Email'],
				':password' => $_POST['Password']
			));
			Session::set('id_user', Database::getDB()->lastInsertId());
			Session::set('user_name', $_POST['Name']);
		}
		$result = new FormPostResult($err_validation, "");
		echo json_encode($result);
	}

}