<?php
declare(strict_types = 1);

namespace App\Viewers\CMS;

use App\Models\CMS\{News, Announcements, Events};
use App\Models\CMS\TraitsCMS;
use App\Models\CMS\InterfacesCMS;


class ManagementView {
  use TraitsCMS;

  public static function getDataThisNews($newsId) {
    return self::getDataThis($newsId, new News());
  }

  public static function getDataThisAnnouncement($announcementId) {
    return self::getDataThis($announcementId, new Announcements());
  }

  public static function getDataThisEvents($eventid) {
    return self::getDataThis($eventid, new Events());
  }

  public static function getAllData($object, $data)
  {
    return $object->fetchAllData($data);
  }

}

