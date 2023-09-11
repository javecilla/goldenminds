<?php
declare(strict_types=1);

namespace App\Models\CMS;

class News extends DBCMS implements	InterfacesCMS
{
  public function createData($data)
  {
    try {
      $stmt = $this->DB()->prepare("INSERT INTO cms_news (news_date_uploaded, news_subj, news_title, news_desc, news_status, news_visibility, news_imgname, news_imgext) 
        VALUES (:ndu, :nsubj, :ntitle, :ndesc, :nstatus, :nv, :nimgname, :nimgext)");
      $payload = [
        ':ndu' => $data['newsdate'],
        ':nsubj' => $data['newssubj'],
        ':ntitle' => $data['newstitle'],
        ':ndesc' => $data['newsdesc'],
        ':nstatus' => $data['newsstatus'],
        ':nv' => $data['newsvisibility'],
        ':nimgname' => $data['imgname'],
        ':nimgext' => $data['imgext']    
      ];
      foreach($payload as $key => $value) {
        $stmt->bindParam($key, $payload[$key], \PDO::PARAM_STR);
      }
      $stmt->execute();

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
      $stmt = $this->DB()->prepare("SELECT COUNT(*) AS total_records FROM cms_news");
      $stmt->execute();
      $countTotalRecords = $stmt->fetchColumn();

      // Fetch the news data with pagination
      $stmt = $this->DB()->prepare("SELECT * FROM cms_news ORDER BY news_id DESC LIMIT :offset, :perpage");
      $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
      $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
      $stmt->execute();
      $allNewsData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch data with filter [for landing page view]
      $stmt = $this->DB()->prepare("SELECT * FROM cms_news WHERE news_visibility = 1 ORDER BY news_id DESC LIMIT :offset, :perpage");
      $stmt->bindValue(':offset', $data['offset'], \PDO::PARAM_INT);
      $stmt->bindValue(':perpage', $data['perpage'], \PDO::PARAM_INT);
      $stmt->execute();
      $dataNewsPaginationFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch news data filtered by status->pin news
      $stmt = $this->DB()->prepare("SELECT * FROM cms_news WHERE news_status = 1 ORDER BY news_id DESC LIMIT 5");
      $stmt->execute();
      $newsDataByStatus = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch data with filter [for landing page view]
      $stmt = $this->DB()->prepare("SELECT * FROM cms_news WHERE news_status = 1 AND  news_visibility = 1 ORDER BY news_id DESC LIMIT 5");
      $stmt->execute();
      $newPinDataFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch news data depends on the search input
      $searchValue = htmlspecialchars($data['search'], ENT_QUOTES | ENT_HTML5);
      $stmt = $this->DB()->prepare("SELECT * FROM cms_news WHERE CONCAT(news_subj, ' ', news_title, ' ', news_desc) LIKE '%$searchValue%'");
      $stmt->execute();
      $newsDataBySearch = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Fetch data with filter [for landing page view]
      $stmt = $this->DB()->prepare("SELECT * FROM cms_news WHERE news_visibility = 1 AND CONCAT(news_subj, ' ', news_title, ' ', news_desc) LIKE '%$searchValue%'");
      $stmt->execute();
      $newsDataBySearchFilter = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Return the data
      return [
        'total_records' => $countTotalRecords,
        'data' => $allNewsData,
        'dataNewsPaginationFilter' => $dataNewsPaginationFilter,
        'filteredData' => $newsDataByStatus,
        'newPinDataFilter' => $newPinDataFilter,
        'searchData' => $newsDataBySearch,
        'newsDataBySearchFilter' => $newsDataBySearchFilter
      ];
      
    } catch (\PDOException $e) {
      throw new Exception("Failed: " . $e->getMessage());
    }
  }

  public function fetchAllData($data)
  {
    $stmt = $this->DB()->prepare("SELECT * FROM cms_news 
      WHERE news_status = :status && news_visibility = :visibility 
      ORDER BY news_date_uploaded DESC LIMIT 2");
    $stmt->bindParam(':status', $data['status'], \PDO::PARAM_INT);
    $stmt->bindParam(':visibility', $data['visibility'], \PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }

  public function getData($thisID)
  {
    try {
      $stmt = $this->DB()->prepare("SELECT * FROM cms_news WHERE news_id = :id");
      $stmt->bindParam(':id', $thisID, \PDO::PARAM_INT);
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

      $sql = "UPDATE cms_news SET 
        news_subj = :nsubj,
        news_title = :ntitle, 
        news_desc = :ndesc, 
        news_status = :nstatus, 
        news_visibility = :nvisibility, 
        news_date_modified = :ndmodified";

      $sql .= $imgUpdate ? ", news_imgname = :nimgname, news_imgext = :nimgext" : "";
      $sql .= " WHERE news_id = :id";

      $stmt = $this->DB()->prepare($sql);

      $stmt->bindParam(':nsubj', $data['newssubj'], \PDO::PARAM_STR);
      $stmt->bindParam(':ntitle', $data['newstitle'], \PDO::PARAM_STR);
      $stmt->bindParam(':ndesc', $data['newsdesc'], \PDO::PARAM_STR);
      $stmt->bindParam(':nstatus', $data['newsStatus'], \PDO::PARAM_INT);
      $stmt->bindParam(':nvisibility', $data['newsVisibility'], \PDO::PARAM_INT);
      $stmt->bindParam(':ndmodified', $data['newsModified'], \PDO::PARAM_STR);
      $stmt->bindParam(':id', $data['newsId'], \PDO::PARAM_INT);

      // Bind the image parameters if may laman or not empty
      if ($imgUpdate) {
        $stmt->bindParam(':nimgname', $data['imgname'], \PDO::PARAM_STR);
        $stmt->bindParam(':nimgext', $data['imgext'], \PDO::PARAM_STR);
      }

      if (!$stmt->execute()) {
        throw new Exception("Failed to update data" . ($imgUpdate ? " With_Image" : " Without_Image") . $stmt->errorInfo()[2]);
      }

      if ($stmt->rowCount() > 0) {
        $result[$imgUpdate ? 'withImage' : 'withoutImage'] = "Updated Successfully";
      }

      return $result;
    } catch (\PDOException $e) {
      //throw new Exception("Failed: "   . $e->getMessage());
      //$result = "Failed: " . $e->getMessage();
      echo "Failed: " . $e->getMessage();
    }

    
  }

  public function deleteData($data)
  {
    try {
      $stmt = $this->DB()->prepare("DELETE FROM cms_news WHERE news_id = ? LIMIT 1");
      $stmt->execute([$data]);
      $result = "Deleted Successfully";
    } catch (\PDOException $e) {
      $result = "Failed: " . $e->getMessage();
    }

    return $result;
  }

}