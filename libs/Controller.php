<?php

class Controller
{
	public View $view;

	public ?Model $model = null;

	public function __construct()
	{
		$this->view = new View();
	}

	public function loadModel(string $name): void
	{
		$path = 'models/' . $name . '_model.php';

		if (file_exists($path)) {
			require 'models/' . $name . '_model.php';

			$modelName = $name . '_Model';
			$this->model = new $modelName();
		}
	}
}
