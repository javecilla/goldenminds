<?php
declare(strict_types = 1);

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\CMS\News;
use App\Viewers\CMS\ManagementView;
use App\Controllers\CMS\Management;
use App\Functions\RFunctionImages;

if(isset($_POST['management']) && isset($_POST['action']))
{
	$management = $_POST['management'];
	$action = $_POST['action'];

	switch ($action) {
		case 'create':
			if(isset($_FILES['newsImage']) && !empty($_FILES['newsImage']['name'])) {
				$imageValidationResult = RFunctionImages::validateImage($_FILES['newsImage'], $management);
				if($imageValidationResult['success']) {
	        $newsDataForm = [
	          'newsstatus' => $_POST['newsStatus'],
	          'newsvisibility' => $_POST['newsVisibility'],
	          'newsdate' => $_POST['newsDate'],
	          'newssubj' => htmlspecialchars($_POST['newsSubj'], ENT_QUOTES | ENT_HTML5),
	          'newstitle' => htmlspecialchars($_POST['newsTitle'], ENT_QUOTES | ENT_HTML5),
	          'newsdesc' => htmlspecialchars($_POST['newsDesc'], ENT_QUOTES | ENT_HTML5),
	          'imgname' => $imageValidationResult['imgname'],
	          'imgext' => $imageValidationResult['imgext']
	        ];
	        $result = Management::requestOperation(new News(), $action, $management, $newsDataForm);
	        $response = ['success' => true, 'message' => $result];
			   } else {
			    $response = ['success' => false, 'message' => $imageValidationResult['message']];
			  }	
			} else {
				$response = ['success' => false, 'message' => 'Please select the file/image!'];
			}
			break;

		case 'read':
			if (isset($_POST['newsId'])) {
				$id = $_POST['newsId'];
				$result = ManagementView::getDataThisNews($id); 
				if($result !== null) {
				  $formattedDateUploaded = date('F j, Y', strtotime($result['news_date_uploaded']));
				  $response = [
				   	'newsDateUploaded' => $formattedDateUploaded,
				   	'newsDateModified' => $result['news_date_modified'],
				   	'newsSubj' => stripcslashes($result['news_subj']),
				   	'newsTitle' => stripcslashes($result['news_title']),
				   	'newsDesc' => stripcslashes($result['news_desc']),
				   	'newsStatus' => $result['news_status'],
				   	'newsVisibility' => $result['news_visibility'],
				   	'newsImg' => $result['news_imgname'] . '.' . $result['news_imgext']
				  ];
				}
			}
			break;

		case 'update':
			$newsModified = date('Y/m/d');
      $formattedDate = date('F j, Y', strtotime($newsModified));
			//Update the news data with an file/image
			if (!empty($_FILES['newsImage']['name'])) {
				$imageValidationResult = RFunctionImages::validateImage($_FILES['newsImage'], $management);
				if ($imageValidationResult['success']) {
          $updateDataWithImage = [
          	'newsModified' => $formattedDate,
          	'newsId' => $_POST['newsId'],
          	'newssubj' => htmlspecialchars($_POST['newsSubj'], ENT_QUOTES | ENT_HTML5),
          	'newstitle' => htmlspecialchars($_POST['newsTitle'], ENT_QUOTES | ENT_HTML5),
          	'newsdesc' => htmlspecialchars($_POST['newsDesc'], ENT_QUOTES | ENT_HTML5),
          	'newsStatus' => $_POST['newsStatus'],
          	'newsVisibility' => $_POST['newsVisibility'],
          	'imgname' => $imageValidationResult['imgname'],
          	'imgext' => $imageValidationResult['imgext']
          ];

          $resultWithImage = Management::requestOperation(new News(), $action, $management, $updateDataWithImage);
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
	      	'newsModified' => $formattedDate,
	      	'newsId' => $_POST['newsId'],
	      	'newssubj' => htmlspecialchars($_POST['newsSubj'], ENT_QUOTES | ENT_HTML5),
	      	'newstitle' => htmlspecialchars($_POST['newsTitle'], ENT_QUOTES | ENT_HTML5),
	       	'newsdesc' => htmlspecialchars($_POST['newsDesc'], ENT_QUOTES | ENT_HTML5),
	      	'newsStatus' => $_POST['newsStatus'],
	      	'newsVisibility' => $_POST['newsVisibility']
	     	];

	      $resultWithoutImage = Management::requestOperation(new News(), $action, $management, $updateDataNoImage);
	      if (isset($resultWithoutImage['withoutImage'])) {
	        $response = ['success' => true, 'message' => $resultWithoutImage['withoutImage']];
	      } else {
	        $response = ['success' => false, 'message' => 'Failed to update news data without an image'];
	      }
			}
			break;

		case 'delete':
			if(isset($_POST['newsId'])) {
				$newsDataID = $_POST['newsId'];
				$result = Management::requestOperation(new News(), $action, $management, $newsDataID);
				$response = ['success' => true, 'message' => $result];
			}
			break;
		
		default:
			break;
	}
}

header('Content-Type: application/json'); 
echo json_encode($response);