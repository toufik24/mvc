<?php

/** The default controller. */
class Home extends Controller {

	/**
	 * The default method to call.
	 * It creates an Model\User, sets its User::name to the param and dumps the object.
	 * @param string $name The users name.
	 * @return void
	 */
	public function index($name = "") {
		$user = $this->model("User");
		$user->name = $name;

		var_dump($user);
	}
}