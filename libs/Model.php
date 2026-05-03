<?php

class Model
{
	public ?Database $db = null;

	public function __construct()
	{
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_CHARSET);
	}
}
