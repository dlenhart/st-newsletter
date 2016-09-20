<?php

namespace ST\Auth;
use ST\Models\User;

class Auth
{
	public function attempt($email, $password)
	{

		$user = User::where('username', '=', $email)->first();

		if (!$user) {
			return 0;
		}

		if ($password == $user->password){
			$_SESSION['admin'] = $email;
			return 1;
		}

		return false;

	}
}