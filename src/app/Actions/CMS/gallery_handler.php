<?php
declare(strict_types = 1);

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\CMS\Gallery;
use App\Viewers\CMS\ManagementView;
use App\Controllers\CMS\Management;
use App\Functions\RFunctionImages;

if(isset($_POST['management']) && isset($_POST['action']))
{
	$management = $_POST['management'];
	$action = $_POST['action'];

	switch ($action) {
		case 'create':
			if(isset($_FILES['gphoto']) && !empty($_FILES['gphoto']['name'])) {
				$imageValidationResult = RFunctionImages::validateImage($_FILES['gphoto'], $management);
				if($imageValidationResult['success']) {
					$galleryDataForm = [
						'imgname' => $imageValidationResult['imgname'],
						'imgext' => $imageValidationResult['imgext'],
						'gyear' => $_POST['gyear'],
						'gmonth' => $_POST['gmonth'],
						'galbum' => htmlspecialchars($_POST['galbum'], ENT_QUOTES | ENT_HTML5)
					];
					$result = Management::requestOperation(new Gallery(), $action, $management, $galleryDataForm);
	        $response = ['success' => true, 'message' => $result];
	        
				} else {
					$response = ['success' => false, 'message' => $imageValidationResult['message']];
				}
			} else {
				$response = ['success' => false, 'message' => 'Please select the file/image!'];
			}
			break;
		
		default:
			break;
	}

}

header('Content-Type: application/json'); 
echo json_encode($response);