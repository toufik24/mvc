<?php

/** Here the application stores anything about its instance. */
class App {
	
	/** @var string $controller The default controller. */
	protected $controller = "home";

	/** @var string $method The default controller's message. */
	protected $method = "index";

	/** @var array $params Since parameters are accepted in the url, they'll be here. */
	protected $params = [];

	/**
	 * Constructor for App
	 * At the moment it does not do anything but instantiating application.
	 * @return void
	 */
	public function __construct() {
		$url = $this->parseUrl();
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