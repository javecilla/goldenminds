<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\AUTH\CMS;

if(isset($_POST['logout']) && isset($_POST['cuser'])) {
	$result = CMS::logoutUserRequest($_POST['cuser']);
	if($result['success']) {
		$response = ['success' => true];
	} else {
		$response = ['success' => false, 'message' => $result['message']];
	}
}

header('Content-Type: application/json');
echo json_encode($response);
exit();