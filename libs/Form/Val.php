<?php

class Val
{
	public function __construct()
	{
	}

	public function minlength(mixed $data, int $arg): string|false
	{
		$data = is_string($data) ? $data : (string) ($data ?? '');
		if (strlen($data) < $arg) {
			return "Your string can only be $arg long";
		}

		return false;
	}

	public function maxlength(mixed $data, int $arg): string|false
	{
		$data = is_string($data) ? $data : (string) ($data ?? '');
		if (strlen($data) > $arg) {
			return "Your string can only be $arg long";
		}

		return false;
	}

	public function digit(mixed $data): string|false
	{
		$data = is_string($data) ? $data : (string) ($data ?? '');
		if (ctype_digit($data) === false) {
			return 'Your string must be a digit';
		}

		return false;
	}

	public function __call(string $name, array $arguments): never
	{
		throw new Exception("$name does not exist inside of: " . __CLASS__);
	}
}
