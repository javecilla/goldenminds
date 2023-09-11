<?php
declare(strict_types = 1);

namespace App\Functions;
/**
 * 
 */
class RFunctionImages 
{
	public static function validateImage(array $image, string $management)
	{
		$imgName = $image['name'];
	  $imgSize = $image['size'];
	  $imgTMPname = $image['tmp_name'];
	  $error = $image['error'];
	  if ($error !== UPLOAD_ERR_OK) {
	    return ['success' => false, 'message' => 'Failed to upload the image.'];
	  }
	  $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
	  $imgExtLC = strtolower($imgExt);
	  $validImgExt = ['jpg', 'png', 'jpeg'];
	  if (!in_array($imgExtLC, $validImgExt)) {
	    return ['success' => false, 'message' => 'Invalid image! Please upload the image with the following format: [jpg, png, jpeg].'];
	  }
	  $newImgName = 'IMG-' . date('Y-m-d') . '-' . uniqid();

	  //check the management to identify which folder will go the path of image file
	  switch($management) {
	  	case 'news':
	  		$imgUploadPath = '../../../storage/uploads/cms/news/' . $newImgName . '.' . $imgExtLC;
	  		break;
	  		
	  	case 'announcements':
	  		$imgUploadPath = '../../../storage/uploads/cms/announcements/' . $newImgName . '.' . $imgExtLC;
	  		break;
	  	
	  	case 'events':
	  		$imgUploadPath = '../../../storage/uploads/cms/events/' . $newImgName . '.' . $imgExtLC;
	  		break;

	  	case 'gallery':
	  		$imgUploadPath = '../../../storage/uploads/cms/gallery/' . $newImgName . '.' . $imgExtLC;
	  		break;

	  	default:
	  		return ['success' => false, 'message' => 'Failed to path folder'];
	  		break;
	  }

	  if(!move_uploaded_file($imgTMPname, $imgUploadPath)) {
	    return ['success' => false, 'message' => 'Failed to move the uploaded file.'];
	  }
	  return ['success' => true, 'imgname' => $newImgName, 'imgext' => $imgExtLC];
	}
}