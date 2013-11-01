<?php

class Email {

	private $_to;
	private $_from;
	private $_bcc;
	private $_cc;
	private $_subject;
	private $_message;
	private $_contentType;

	public function __construct() {
		$this->_contentType = (string) 'text/plain';
	}

	public function setTo($str) {
		$this->_to = (string) $str;
		return $this;
	}

	public function setFrom($str) {
		$this->_from = (string) $str;
		return $this;
	}

	public function setSubject($str) {
		$this->_subject = (string) $str;
		return $this;
	}

	public function setMessage($str) {
		$this->_message = (string) wordwrap($str, 70);
		return $this;
	}

	public function setBcc($bcc) {
		$this->_bcc = (string) $bcc;
		return $this;
	}

	public function setCc($cc) {
		$this->_cc = (string) $cc;
		return $this;
	}

	public function setContentType($type) {
		$this->_contentType = (string) $type;
		return $this;
	}

	public function submit() {
		$this->_checkSettings();
		$headers = "From: {$this->_from}\r\n";
		$headers .= "Reply-To: {$this->_from}\r\n";
		$headers .= "cc: {$this->_cc}\r\n";
		$headers .= "Bcc: {$this->_bcc}\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: {$this->_contentType}; charset=utf-8\r\n";

		if (@!mail($this->_to, $this->_subject, $this->_message, $headers))
			throw new Exception('Problem sending email');
	}

	private function _checkSettings() {
		if (!isset($this->_to))
			throw new Exception('To must be set');

		if (!isset($this->_from))
			throw new Exception('From must be set');

		if (!isset($this->_subject))
			throw new Exception('Subject must be set');

		if (!isset($this->_message))
			throw new Exception('Message must be set');
	}

	public function messageBuild($template, $data = null) {
		ob_start();
		ob_clean();
		require_once 'views/' . $template . '.php';
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}

}