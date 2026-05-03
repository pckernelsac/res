<?php

/**
 * - Fill out a form
 * - POST to PHP
 * - Sanitize
 * - Validate
 * - Return Data
 * - Write to Database
 */

require 'Form/Val.php';

class Form
{
	private ?string $_currentItem = null;

	/** @var array<string, mixed> */
	private array $_postData = [];

	private Val $_val;

	/** @var array<string, string> */
	private array $_error = [];

	public function __construct()
	{
		$this->_val = new Val();
	}

	public function post(string $field): self
	{
		$this->_postData[$field] = $_POST[$field] ?? null;
		$this->_currentItem = $field;

		return $this;
	}

	/**
	 * @return ($fieldName is false ? array<string, mixed> : mixed)
	 */
	public function fetch(string|false $fieldName = false): mixed
	{
		if ($fieldName !== false) {
			if (isset($this->_postData[$fieldName])) {
				return $this->_postData[$fieldName];
			}

			return false;
		}

		return $this->_postData;
	}

	public function val(string $typeOfValidator, mixed $arg = null): self
	{
		$item = $this->_postData[$this->_currentItem ?? ''] ?? null;
		$value = is_string($item) || is_numeric($item) ? (string) $item : '';

		if ($arg === null) {
			$error = $this->_val->{$typeOfValidator}($value);
		} else {
			$error = $this->_val->{$typeOfValidator}($value, $arg);
		}

		if ($error) {
			$this->_error[$this->_currentItem ?? ''] = $error;
		}

		return $this;
	}

	public function submit(): bool
	{
		if (empty($this->_error)) {
			return true;
		}

		$str = '';
		foreach ($this->_error as $key => $value) {
			$str .= $key . ' => ' . $value . "\n";
		}
		throw new Exception($str);
	}
}
