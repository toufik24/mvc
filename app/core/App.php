<?php

/** Here the application stores anything about its instance. */
class App {
	
	/** @var string|Controller $controller The default controller as a string and later the Controller itself as an object. */
	protected $controller = "home";

	/** @var string $method The default controller's message. */
	protected $method = "index";

	/** @var array $params Since parameters are accepted in the url, they'll be here. */
	protected $params = [];

	/**
	 * Constructor for App
	 * It'll parse the URL, initiate the Controller class that was given and run the method with the given parameters.
	 * @return void
	 */
	public function __construct() {
		$url = $this->parseUrl();

		/**
		 * Change the controller from default if the Controller Class does exist.
		 * Then load the controller which is named at the property $controller.
		 * Finally, set $this->controller as the new Controller.
		 */
		if (file_exists("../app/controllers/" . $url[0] . ".php")) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once "../app/controllers/" . $this->controller . ".php";
		$this->controller = new $this->controller;


		/** If the method exists in the Controller object, change the property $method. Else, just leave it "index". */
		if(isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		/** Rebase the indexes and throw it into $params. */
		$this->params = $url ? array_values($url) : [];

		/** Call the method */
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	/**
	 * Explode and trim the URL so the router can work with that.
	 * @return array The trimmed, sanitized and hacked URL
	 */
	public function parseUrl() {
		if(isset($_GET["url"])) {
			return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
		}
	}
}