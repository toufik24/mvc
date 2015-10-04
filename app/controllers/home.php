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

		$this->view("home/index", ["user" => $user]);
	}

	/**
	 * Create a new user.
	 * @params string $username The username.
	 * @params string $email The email address.
	 */
	public function create($username = "", $email = "") {
		$Query = json_decode(User::create([
			"username" => $username,
			"email" => $email
		]));
		$this->view("home/create", ["username" => $username, "email" => $email, "id" => $Query->id]);
	}
}