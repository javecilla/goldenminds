<?php
declare(strict_types=1);

namespace App\Models\CMS;
/**
 * 
 */
class Gallery extends DBCMS implements InterfacesCMS 
{
	public function createData($data) 
	{
		try {
			$stmt = $this->DB()->prepare("INSERT INTO cms_gallery(gallery_date_uploaded, gallery_year, gallery_month, gallery_album_name, imgname, imgext) VALUES(NOW(), :gy, :gm, :gan, :gimgname, :gimgext)");
			//extract the data submitted and store in array
			$payload = [
				':gy' => $data['gyear'],
				':gm' => $data['gmonth'],
				':gan' => $data['galbum'],
				':gimgname' => $data['imgname'],
				':gimgext' => $data['imgext']
			];

			foreach($payload as $key => $value) {
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
      $stmt = $this->DB()->prepare("SELECT COUNT(*) AS total_records FROM cms_gallery");
      $stmt->execute();
      $countTotalRecords = $stmt->fetchColumn();

  		// Fetch All the announcement data with pagination
      $stmt = $this->DB()->prepare("SELECT * FROM cms_gallery ORDER BY gallery_id DESC LIMIT :offset, :perpage");
      $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
      $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
      $stmt->execute();
      $allDataPagination = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      return [
      	'totalRecords' => $countTotalRecords,
	    	'allDataPagination' => $allDataPagination
	    ];

  	} catch (\PDOException $e) {
  		throw new Exception("Failed: " . $e->getMessage());
  	}
  }

  public function updateData($data) {}
  public function deleteData($data) {}
}