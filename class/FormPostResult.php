<?php
	class FormPostResult {
		public $err_validation;
		public $data;

		public function __construct($err_validation, $data) {
			$this->err_validation = $err_validation;
			$this->data = $data;
		}
	}
