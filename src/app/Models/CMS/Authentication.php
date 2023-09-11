<?php

declare(strict_types=1);

namespace App\Models\CMS;

session_start();

class Authentication extends DBCMS
{
  final public function logoutUser($data) 
  {
    $stmt = $this->DB()->prepare("UPDATE login SET login_status = 0 WHERE username = :uname LIMIT 1");
    $stmt->bindParam(":uname", $data);
    if(!$stmt->execute()) {
      $result = ['success' => false, 'message' => 'logout failed'];
    } 

    session_unset();
    session_destroy();
    session_reset();
    $result = ['success' => true];
  
    return $result;
  }
}
