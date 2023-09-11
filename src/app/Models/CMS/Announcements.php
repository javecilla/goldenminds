<?php
declare(strict_types=1);

namespace App\Models\CMS;

class Announcements extends DBCMS implements InterfacesCMS 
{
	public function createData($data) 
	{
    try {
      $stmt = $this->DB()->prepare("INSERT INTO cms_announcements (announce_date_uploaded,
      	announce_title, announce_desc, announce_status, announce_visibility, announce_imgname, announce_imgext)
      	VALUES (:aduploaded, :atitle, :adesc, :astatus, :avisibility, :aimgname, :aimgext)");
      $payload = [
        ':aduploaded' => $data['announcedate'],
        ':atitle' => $data['announcetitle'],
        ':adesc' => $data['announcedesc'],
        ':astatus' => $data['announcestatus'],
        ':avisibility' => $data['announcevisibility'],
        ':aimgname' => $data['imgname'],
        ':aimgext' => $data['imgext']
      ];
      foreach ($payload as $key => $value) {
       	$stmt->bindParam($key, $payload[$key], \PDO::PARAM_STR);
      }
      if(!$stmt->execute()) {
        throw new Exception($stmt->errorInfo()[2]);
      }

      $result = "Uploaded Successfully";
    } catch (\PDOException $e) {
      $result = "Failed: " . $e->getMessage();
    }

    return $result;
	}

	public function readData($data)
	{
		try {
	    // Get the total count of records
      $stmt = $this->DB()->prepare("SELECT COUNT(*) AS total_records FROM cms_announcements");
      $stmt->execute();
      $countTotalRecords = $stmt->fetchColumn();

      // Fetch All the announcement data with pagination
      $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements ORDER BY announce_id DESC LIMIT :offset, :perpage");
      $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
      $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
      $stmt->execute();
      $allDataPagination = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch data with filter [for landing page view]
      $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE announce_visibility = 1 ORDER BY announce_id DESC LIMIT :offset, :perpage");
      $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
      $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
      $stmt->execute();
      $dataPaginationFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch announcement data filtered by status->pin announcements
	    $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE announce_status = 1 ORDER BY announce_id DESC LIMIT 4");
	    $stmt->execute();
	    $pinAnnouncementData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch data with filter [for landing page view]
      $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE announce_status = 1 AND announce_visibility = 1 ORDER BY announce_id DESC LIMIT 4");
      $stmt->execute();
      $pinDataFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);

	   	// Fetch announcement data depends on the search input
      $searchValue = htmlspecialchars($data['search'], ENT_QUOTES | ENT_HTML5);
      $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE CONCAT(announce_title, ' ', announce_desc, ' ', announce_date_uploaded) LIKE '%$searchValue%'");
      $stmt->execute();
      $dataBySearch = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch data with filter [for landing page view]
      $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE announce_visibility = 1 AND CONCAT(announce_title, ' ', announce_desc, ' ', announce_date_uploaded) LIKE '%$searchValue%'");
      $stmt->execute();
      $dataBySearchWithFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);

	    // Return the data
	    return [
	    	'totalRecords' => $countTotalRecords,
	    	'allDataPagination' => $allDataPagination,
        'dataPaginationFilter' => $dataPaginationFilter,
	      'pinData' => $pinAnnouncementData,
        'pinDataFilter' => $pinDataFilter,
	      'dataBySearch' => $dataBySearch,
        'dataBySearchWithFilter' => $dataBySearchWithFilter
	    ];

		} catch (\PDOException $e) {
			throw new Exception("Failed: " . $e->getMessage());
		}
	}


  // private function getRecordsPagination($data)
  // {
  //   $sql = 'SELECT * FROM cms_announcements ORDER BY announce_id DESC LIMIT :offset, :perpage';
  //   if($data[''])

  //         $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements ORDER BY announce_id DESC LIMIT :offset, :perpage");
  //     $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
  //     $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
  //     $stmt->execute();
  //     $allDataPagination = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  // }

  // private function getRecordsPaginationFilter($data)
  // {
  //   $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE announce_visibility = 1 ORDER BY announce_id DESC LIMIT :offset, :perpage");
  //   $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
  //   $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
  //   $stmt->execute();
  //   $dataPaginationFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  // }

  // private function getTotalCount() 
  // {
  //   $stmt = $this->DB()->prepare("SELECT COUNT(*) AS total_records FROM cms_announcements");
  //   $stmt->execute();
  //   $totalRecords = $stmt->fetchColumn();
  //   return $totalRecords;
  // }

	public function fetchAllData($condition)
	{
		$stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE announce_status = :status AND announce_visibility = :visibility ORDER BY announce_date_uploaded DESC LIMIT 6");
		$stmt->bindParam(':status', $condition['status'], \PDO::PARAM_INT);
    $stmt->bindParam(':visibility', $condition['visibility'], \PDO::PARAM_INT);
	  $stmt->execute();
	  $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		
		return $result;
	}

	public function getData($thisID)
  {
    try {
      $stmt = $this->DB()->prepare("SELECT * FROM cms_announcements WHERE announce_id = :id");
      $stmt->bindParam(":id", $thisID, \PDO::PARAM_STR);
      $stmt->execute();
      $row = $stmt->fetch(\PDO::FETCH_ASSOC); // Fetch a single row

      return $row !== false ? $row : null;
    } catch (\PDOException $e) {
      throw new Exception("Failed: " . $e->getMessage());
    }
  }

	public function updateData($data)
	{
    try {
      $result = [];
      $imgUpdate = !empty($data['imgname']) && !empty($data['imgext']);

      $sql = "UPDATE cms_announcements SET 
        announce_title = :atitle, 
        announce_desc = :adesc, 
        announce_status = :astatus, 
        announce_visibility = :avisibility, 
        announce_date_modified = :admodified";

      $sql .= $imgUpdate ? ", announce_imgname = :aimgname, announce_imgext = :aimgext" : "";
     	$sql .= " WHERE announce_id = :id";

     	$stmt = $this->DB()->prepare($sql);

     	$stmt->bindParam(':atitle', $data['announcetitle'], \PDO::PARAM_STR);
     	$stmt->bindParam(':adesc', $data['announcedesc'], \PDO::PARAM_STR);
     	$stmt->bindParam(':astatus', $data['announceStatus'], \PDO::PARAM_INT);
     	$stmt->bindParam(':avisibility', $data['announceVisibility'], \PDO::PARAM_INT);
     	$stmt->bindParam(':admodified', $data['announceModified'], \PDO::PARAM_STR);
     	$stmt->bindParam(':id', $data['announceId'], \PDO::PARAM_INT);

      // Bind the image parameters if may laman or not empty
      if ($imgUpdate) {
        $stmt->bindParam(':aimgname', $data['imgname'], \PDO::PARAM_STR);
        $stmt->bindParam(':aimgext', $data['imgext'], \PDO::PARAM_STR);
      } else {
        $result = ['failed' => 'failed update the image'];
      }

    	if (!$stmt->execute()) {
      	throw new Exception("Failed to update data" . ($imgUpdate ? " With_Image" : " Without_Image") . $stmt->errorInfo()[2]);
    	}

      if ($stmt->rowCount() > 0) {
        $result[$imgUpdate ? 'withImage' : 'withoutImage'] = "Updated Successfully";
      }

      return $result;
    } catch (\PDOException $e) {
      throw new Exception("Failed: " . $e->getMessage());
    }
	}

	public function deleteData($data) 
	{
		try {
      $stmt = $this->DB()->prepare("DELETE FROM cms_announcements WHERE announce_id = :id LIMIT 1");
      $stmt->bindParam(":id", $data, \PDO::PARAM_STR);
      $stmt->execute();
      $result = "Deleted Successfully";
    } catch (\PDOException $e) {
      $result = "Failed: " . $e->getMessage();
    }

    return $result;
	}
}