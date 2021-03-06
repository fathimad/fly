<?php

class RegistrationsController extends ApplicationController {

	public function _new() {
		if (current_user()) {
			redirect_to(root_path);
		} else {
			render ( array( 'view' => 'new', 'locals' => array( 'title' => 'Fly - Sign Up' ) ) );
		}
	}

	public function create() {
		$user = $_POST['User'];
		
		// creating user with above fields
		if ($user['password'] == $user['confirm_password']) {
			unset($user['confirm_password']);

			// one way md5 hash encription on password.
			$user['password'] = md5($user['password']);
			$user_exists = User::find_by_email($user['email']);
			if (!$user_exists) {
				User::create($user);
				redirect_to(user_sign_in_path.'?success=1');
			} else {
				redirect_to(new_user_path.'?email=exists');
			}
		}
	}

}

?>