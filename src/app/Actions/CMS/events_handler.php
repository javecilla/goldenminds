<?php
declare(strict_types = 1);

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\CMS\Events;
use App\Viewers\CMS\ManagementView;
use App\Controllers\CMS\Management;
use App\Functions\RFunctionImages;

if(isset($_POST['management']) && isset($_POST['action']))
{
	$management = $_POST['management'];
	$action = $_POST['action'];

	switch ($action) {
		case 'create':
			if(isset($_FILES['eventsImage']) && !empty($_FILES['eventsImage']['name'])) {
				$imageValidationResult = RFunctionImages::validateImage($_FILES['eventsImage'], $management);
				if ($imageValidationResult['success']) {
					$announcementDataForm = [
	          'eventsstatus' => $_POST['eventsStatus'],
	          'eventsvisibility' => $_POST['eventsVisibility'],
	          'eventsdate' => $_POST['eventsDate'],
	          'eventstitle' => htmlspecialchars($_POST['eventsTitle'], ENT_QUOTES | ENT_HTML5),
	          'eventsdesc' => htmlspecialchars($_POST['eventsDesc'], ENT_QUOTES | ENT_HTML5),
	          'imgname' => $imageValidationResult['imgname'],
	          'imgext' => $imageValidationResult['imgext']
	        ];
	        $result = Management::requestOperation(new Events(), $action, $management, $announcementDataForm);
	        $response = ['success' => true, 'message' => $result];
				} else {
					$response = ['success' => false, 'message' => $imageValidationResult['message']];
				}
			} else {
				$response = ['success' => false, 'message' => 'Please select the file/image!'];
			}
			break;
		
		case 'read':
			if (isset($_POST['eventsId'])) {
				$id = $_POST['eventsId'];
				$result = ManagementView::getDataThisEvents($id); 
				if ($result !== null) {
				  $formattedDateUploaded = date('F j, Y', strtotime($result['events_date_uploaded']));
				  $response = [
				   	'eventsDateUploaded' => $formattedDateUploaded,
				   	'eventsDateModified' => $result['events_date_modified'],
				   	'eventsTitle' => stripcslashes($result['events_title']),
				   	'eventsDesc' => stripcslashes($result['events_desc']),
				   	'eventsStatus' => $result['events_status'],
				   	'eventsVisibility' => $result['events_visibility'],
				   	'eventsImg' => $result['events_imgname'] . '.' . $result['events_imgext']
				  ];
				}
			}
			break;
		
		case 'update':
			$eventsModified = date('Y/m/d');
      $formattedDate = date('F j, Y', strtotime($eventsModified));
			//Update the news data with an file/image
			if (!empty($_FILES['eventsImage']['name'])) {
				$imageValidationResult = RFunctionImages::validateImage($_FILES['eventsImage'], $management);
				if ($imageValidationResult['success']) {
          $updateDataWithImage = [
          	'eventsid' => $_POST['eventsId'],
          	'announcemodified' => $formattedDate,
          	'eventstitle' => htmlspecialchars($_POST['eventsTitle'], ENT_QUOTES | ENT_HTML5),
          	'eventsdesc' => htmlspecialchars($_POST['eventsDesc'], ENT_QUOTES | ENT_HTML5),
          	'eventsstatus' => $_POST['eventsStatus'],
          	'eventsvisibility' => $_POST['eventsVisibility'],
          	'imgname' => $imageValidationResult['imgname'],
          	'imgext' => $imageValidationResult['imgext']
          ];

          $resultWithImage = Management::requestOperation(new Events(), $action, $management, $updateDataWithImage);
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
        	'eventsid' => $_POST['eventsId'],
        	'announcemodified' => $formattedDate,
        	'eventstitle' => htmlspecialchars($_POST['eventsTitle'], ENT_QUOTES | ENT_HTML5),
        	'eventsdesc' => htmlspecialchars($_POST['eventsDesc'], ENT_QUOTES | ENT_HTML5),
        	'eventsstatus' => $_POST['eventsStatus'],
        	'eventsvisibility' => $_POST['eventsVisibility']
	     	];

	      $resultWithoutImage = Management::requestOperation(new Events(), $action, $management, $updateDataNoImage);
	      if (isset($resultWithoutImage['withoutImage'])) {
	        $response = ['success' => true, 'message' => $resultWithoutImage['withoutImage']];
	      } else {
	        $response = ['success' => false, 'message' => 'Failed to update news data without an image'];
	      }
			}
			break;

		case 'delete':
			if(isset($_POST['eventsId'])) {
				$eventsID = $_POST['eventsId'];
				$result = Management::requestOperation(new Events(), $action, $management, $eventsID);
				$response = ['success' => true, 'message' => $result];
			}
			break;
			// code...
			break;
		default:
			// code...
			break;
	}
}

header('Content-Type: application/json'); 
echo json_encode($response);