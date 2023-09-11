<?php
declare(strict_types=1);

namespace App\Models\CMS;

interface InterfacesCMS {
  public function createData($data);
  public function readData($data);
  public function updateData($data);
  public function deleteData($data);
}