<?php

/** Access views, controllers and models and its methods to render the page. */
class Controller {
	
	/**
	 * Load new Model.
	 * @param string $model The Name of the model.
	 * @return $model Returns an instance of that model object.
	 */
	public function model($model) {
		require_once "../app/models/" . $model . ".php";
		return new $model();
	}

	/**
	 * Load a View
	 * @param string $view The filename of the view.
	 * @param mixed $data The data the controller wants to push to the View.
	 * @return void
	 */
	public function view($view, $data = []) {
		require_once "../app/views/" . $view . ".php";
	}
}