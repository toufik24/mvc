<?php

/** The default controller. */
class Home extends Controller {

	/**
	 * The default method to call.
	 * Right now it just welcomes the user by echoing the first parameter.
	 * @param string $name The users name.
	 * @return void
	 */
	public function index($name = "") {
		echo "Hej ", $name;
	}
}