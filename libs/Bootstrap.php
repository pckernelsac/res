<?php

class Bootstrap
{
	/** @var list<string> */
	private array $_url = [];

	private ?object $_controller = null;

	private string $_controllerPath = 'controllers/';

	private string $_modelPath = 'model/';

	private string $_errorFile = 'err.php';

	private string $_defaultFile = 'login.php';

	/**
	 * Starts the Bootstrap
	 */
	public function init(): void
	{
		$this->_getUrl();

		if (empty($this->_url[0])) {
			$this->_loadDefaultController();
			return;
		}

		$this->_loadExistingController();

		$this->_callControllerMethod();
	}

	public function setControllerPath(string $path): void
	{
		$this->_controllerPath = trim($path, '/') . '/';
	}

	public function setModelPath(string $path): void
	{
		$this->_modelPath = trim($path, '/') . '/';
	}

	public function setErrorFile(string $path): void
	{
		$this->_errorFile = trim($path, '/');
	}

	public function setDefaultFile(string $path): void
	{
		$this->_defaultFile = trim($path, '/');
	}

	/**
	 * Fetches the $_GET from 'url'
	 */
	private function _getUrl(): void
	{
		$url = isset($_GET['url']) ? (string) $_GET['url'] : '';
		$url = str_replace('-', '', $url);
		$url = preg_replace('/[^a-zA-Z0-9_\/\-]/', '', $url);
		$url = rtrim($url, '/');
		$this->_url = explode('/', $url);
	}

	private function _loadDefaultController(): void
	{
		require $this->_controllerPath . $this->_defaultFile;
		$this->_controller = new Login();
		$this->_controller->index();
	}

	/**
	 * Load an existing controller if there IS a GET parameter passed
	 */
	private function _loadExistingController(): void
	{
		$file = $this->_controllerPath . $this->_url[0] . '.php';
		if (file_exists($file)) {
			require $file;
			$className = $this->_url[0];
			$this->_controller = new $className();
			$this->_controller->loadModel($this->_url[0]);
		} else {
			$this->_error();
		}
	}

	/**
	 * If a method is passed in the GET url paremter
	 */
	private function _callControllerMethod(): void
	{
		$length = count($this->_url);

		if ($length > 1) {
			$method = $this->_url[1] ?? '';
			if ($method === '' || !method_exists($this->_controller, $method)) {
				$this->_error();
			}
		}

		switch ($length) {
			case 5:
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;

			case 4:
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;

			case 3:
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;

			case 2:
				$this->_controller->{$this->_url[1]}();
				break;

			default:
				$this->_controller->index();
				break;
		}
	}

	private function _error(): void
	{
		require $this->_controllerPath . $this->_errorFile;
		$this->_controller = new Err();
		$this->_controller->index();
		exit;
	}
}
