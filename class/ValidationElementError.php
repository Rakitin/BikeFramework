<?php

	class ValidationElementError {
		public $element;
		public $message;

		public function __construct($element, $message) {
			$this->element = $element;
			$this->message = $message;
		}
	}
