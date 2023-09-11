<?php
declare(strict_types=1);

namespace App\Models\CMS;

class Events extends DBCMS implements InterfacesCMS 
{
	public function createData($data) 
	{
		try {
			$stmt = $this->DB()->prepare("INSERT INTO cms_events(events_date_uploaded, events_title, events_desc, events_status, events_visibility, events_imgname, events_imgext)
				VALUES (:edu, :etitle, :edesc, :estatus, :ev, :eimgname, :eimgext)");
			$payload = [
				':edu' => $data['eventsdate'],
				':etitle' => $data['eventstitle'],
				':edesc' => $data['eventsdesc'],
				':estatus' => $data['eventsstatus'],
				':ev' => $data['eventsvisibility'],
				':eimgname' => $data['imgname'],
				':eimgext' => $data['imgext']
			];
			foreach($payload as $key => $value){
				$stmt->bindParam($key, $payload[$key], \PDO::PARAM_STR);
			}
			if(!$stmt->execute()) {
				throw new Exception($stmt->errorInfo()[2]);
			}

			$result = "Uploaded successfully!";
		} catch (\PDOException $e) {
			$result = "Failed: " . $e->getMessage();
		}

		return $result;
	}

	public function readData($data)
	{
		try {
	    // Get the total count of records
      $stmt = $this->DB()->prepare("SELECT COUNT(*) AS total_records FROM cms_events");
      $stmt->execute();
      $countTotalRecords = $stmt->fetchColumn();

      // Fetch All the announcement data with pagination
      $stmt = $this->DB()->prepare("SELECT * FROM cms_events ORDER BY events_id DESC LIMIT :offset, :perpage");
      $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
      $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
      $stmt->execute();
      $allDataPagination = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch data with filter [for landing page view]
      $stmt = $this->DB()->prepare("SELECT * FROM cms_events WHERE events_visibility = 1 ORDER BY events_id DESC LIMIT :offset, :perpage");
      $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
      $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
      $stmt->execute();
      $eventsDataPaginationFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch announcement data filtered by status->pin announcements
	    $stmt = $this->DB()->prepare("SELECT * FROM cms_events WHERE events_status = 1 ORDER BY events_id DESC LIMIT 4");
	    $stmt->execute();
	    $pinAnnouncementData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

	   	// Fetch announcement data depends on the search input
      $searchValue = htmlspecialchars($data['search'], ENT_QUOTES | ENT_HTML5);
      $stmt = $this->DB()->prepare("SELECT * FROM cms_events WHERE CONCAT(events_title, ' ', events_desc) LIKE '%$searchValue%'");
      $stmt->execute();
      $dataBySearch = $stmt->fetchAll(\PDO::FETCH_ASSOC);

	    // Return thea data
	    return [
	    	'totalRecords' => $countTotalRecords,
	    	'allDataPagination' => $allDataPagination,
	    	'eventsDataPaginationFilter' => $eventsDataPaginationFilter,
	      'pinData' => $pinAnnouncementData,
	      'dataBySearch' => $dataBySearch
	    ];

		} catch (\PDOException $e) {
			throw new Exception("Failed: " . $e->getMessage());
		}
	}

	public function getData($thisID)
  {
    try {
      $stmt = $this->DB()->prepare("SELECT * FROM cms_events WHERE events_id = :id");
      $stmt->bindParam(":id", $thisID, \PDO::PARAM_STR);
      $stmt->execute();
      $row = $stmt->fetch(\PDO::FETCH_ASSOC); // Fetch a single row

      return $row !== false ? $row : null;
    } catch (\PDOException $e) {
      throw new Exception("Failed: " . $e->getMessage());
    }
  }

  public function fetchAllData($condition)
  {
 		$stmt = $this->DB()->prepare("SELECT * FROM cms_events WHERE events_status = :status ORDER BY events_id DESC LIMIT 5");
 		$stmt->bindParam(':status', $condition, \PDO::PARAM_INT);
	 	$stmt->execute();
	 	$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

	 	return $result;
  }

	public function updateData($data)
	{
    try {
      $result = [];
      $imgUpdate = !empty($data['imgname']) && !empty($data['imgext']);

      $sql = "UPDATE cms_events SET 
        events_title = :etitle, 
        events_desc = :edesc, 
        events_status = :estatus, 
        events_visibility = :evisibility, 
        events_date_modified = :edmodified";

      $sql .= $imgUpdate ? ", events_imgname = :eimgname, events_imgext = :eimgext" : "";
     	$sql .= " WHERE events_id = :id";

     	$stmt = $this->DB()->prepare($sql);

     	$stmt->bindParam(':etitle', $data['eventstitle'], \PDO::PARAM_STR);
     	$stmt->bindParam(':edesc', $data['eventsdesc'], \PDO::PARAM_STR);
     	$stmt->bindParam(':estatus', $data['eventsstatus'], \PDO::PARAM_INT);
     	$stmt->bindParam(':evisibility', $data['eventsvisibility'], \PDO::PARAM_INT);
     	$stmt->bindParam(':edmodified', $data['announcemodified'], \PDO::PARAM_STR);
     	$stmt->bindParam(':id', $data['eventsid'], \PDO::PARAM_INT);

      // Bind the image parameters if may laman or not empty
      if ($imgUpdate) {
        $stmt->bindParam(':eimgname', $data['imgname'], \PDO::PARAM_STR);
        $stmt->bindParam(':eimgext', $data['imgext'], \PDO::PARAM_STR);
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
      $stmt = $this->DB()->prepare("DELETE FROM cms_events WHERE events_id = :id LIMIT 1");
      $stmt->bindParam(":id", $data, \PDO::PARAM_STR);
      $stmt->execute();
      $result = "Deleted Successfully";
    } catch (\PDOException $e) {
      $result = "Failed: " . $e->getMessage();
    }

    return $result;
	}
}