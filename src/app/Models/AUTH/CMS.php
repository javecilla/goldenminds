<?php

declare(strict_types = 1);

namespace App\Models\AUTH;

use App\Models\CMS\Authentication;

class CMS extends Authentication 
{
	public static function logoutUserRequest($currentUser)
	{
		$result = null; 

		$auth = new Authentication();
		$result = $auth->logoutUser($currentUser);

		return $result; 
	}
}
