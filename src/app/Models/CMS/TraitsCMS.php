<?php
namespace App\Models\CMS;

trait TraitsCMS {
  public static function getDataThis($id, $object) {
    return $object->getData($id);
  }
}