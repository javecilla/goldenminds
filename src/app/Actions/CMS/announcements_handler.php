<?php
declare(strict_types = 1);

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\CMS\Announcements;
use App\Viewers\CMS\ManagementView;
use App\Controllers\CMS\Management;
use App\Functions\RFunctionImages;

if(isset($_POST['management']) && isset($_POST['action']))
{
	$management = $_POST['management'];
	$action = $_POST['action'];

	switch ($action)
	{
		case 'create':
			if(isset($_FILES['announceImage']) && !empty($_FILES['announceImage']['name'])){
				$imageValidationResult = RFunctionImages::validateImage($_FILES['announceImage'], $management);
				if ($imageValidationResult['success']) {
					$announcementDataForm = [
	          'announcestatus' => $_POST['announceStatus'],
	          'announcevisibility' => $_POST['announceVisibility'],
	          'announcedate' => $_POST['announceDate'],
	          'announcetitle' => htmlspecialchars($_POST['announceTitle'], ENT_QUOTES | ENT_HTML5),
	          'announcedesc' => htmlspecialchars($_POST['announceDesc'], ENT_QUOTES | ENT_HTML5),
	          'imgname' => $imageValidationResult['imgname'],
	          'imgext' => $imageValidationResult['imgext']
	        ];
	        $result = Management::requestOperation(new Announcements(), $action, $management, $announcementDataForm);
	        $response = ['success' => true, 'message' => $result];
	        
				} else {
					$response = ['success' => false, 'message' => $imageValidationResult['message']];
				}
			} else {
				$response = ['success' => false, 'message' => 'Please select the file/image!'];
			}
			break;

		case 'read':
			if (isset($_POST['announceId'])) {
				$id = $_POST['announceId'];
				$result = ManagementView::getDataThisAnnouncement($id); 
				if ($result !== null) {
				  $formattedDateUploaded = date('F j, Y', strtotime($result['announce_date_uploaded']));
				  $response = [
				   	'announceDateUploaded' => $formattedDateUploaded,
				   	'announceDateModified' => $result['announce_date_modified'],
				   	'announceTitle' => stripcslashes($result['announce_title']),
				   	'announceDesc' => stripcslashes($result['announce_desc']),
				   	'announceStatus' => $result['announce_status'],
				   	'announceVisibility' => $result['announce_visibility'],
				   	'announceImg' => $result['announce_imgname'] . '.' . $result['announce_imgext']
				  ];
				}
			}
			break;

		case 'update':
			$newsModified = date('Y/m/d');
      $formattedDate = date('F j, Y', strtotime($newsModified));
			//Update the news data with an file/image
			if (!empty($_FILES['announceImg']['name'])) {
				$imageValidationResult = RFunctionImages::validateImage($_FILES['announceImg'], $management);
				if ($imageValidationResult['success']) {
          $updateDataWithImage = [
          	'announceModified' => $formattedDate,
          	'announceId' => $_POST['announceId'],
          	'announcetitle' => htmlspecialchars($_POST['announceTitle'], ENT_QUOTES | ENT_HTML5),
          	'announcedesc' => htmlspecialchars($_POST['announceDesc'], ENT_QUOTES | ENT_HTML5),
          	'announceStatus' => $_POST['announceStatus'],
          	'announceVisibility' => $_POST['announceVisibility'],
          	'imgname' => $imageValidationResult['imgname'],
          	'imgext' => $imageValidationResult['imgext']
          ];

          $resultWithImage = Management::requestOperation(new Announcements(), $action, $management, $updateDataWithImage);
          if (isset($resultWithImage['withImage'])) {
            $response = ['success' => true, 'message' => $resultWithImage['withImage']];
          } else {
            $response = ['success' => false, 'message' => 'Failed to update news data with an image'];
          }
       	} else {
          $response = ['success' => false, 'message' => $imageValidationResult['message']];
        }
			} 
			else {  //Update the news data without an file/image
				$updateDataNoImage = [
						'announceModified' => $formattedDate,
          	'announceId' => $_POST['announceId'],
          	'announcetitle' => htmlspecialchars($_POST['announceTitle'], ENT_QUOTES | ENT_HTML5),
          	'announcedesc' => htmlspecialchars($_POST['announceDesc'], ENT_QUOTES | ENT_HTML5),
          	'announceStatus' => $_POST['announceStatus'],
          	'announceVisibility' => $_POST['announceVisibility']
	     	];

	      $resultWithoutImage = Management::requestOperation(new Announcements(), $action, $management, $updateDataNoImage);
	      if (isset($resultWithoutImage['withoutImage'])) {
	        $response = ['success' => true, 'message' => $resultWithoutImage['withoutImage']];
	      } else {
	        $response = ['success' => false, 'message' => 'Failed to update news data without an image'];
	      }
			}
			break;

		case 'delete':
			if(isset($_POST['announceId'])) {
				$announcementID = $_POST['announceId'];
				$result = Management::requestOperation(new Announcements(), $action, $management, $announcementID);
				$response = ['success' => true, 'message' => $result];
			}
			break;

		default:
			break;
	}
}

header('Content-Type: application/json'); 
echo json_encode($response);