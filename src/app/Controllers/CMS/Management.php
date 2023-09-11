<?php

declare(strict_types = 1);

namespace App\Controllers\CMS;

use App\Models\CMS\InterfacesCMS;

class Management 
{
  public static function requestOperation(InterfacesCMS $task, $action, $management, $data)
  {
    $result = null; // Initialize the $result variable

    switch ($management) {
      case 'news':
        if($action === 'create') {
          $result = $task->createData($data); 
        }
        else if($action === 'read') {
          $result = $task->readData($data); 
        }
        else if($action === 'update') {
          $result = $task->updateData($data); 
        }
        else if($action === 'delete') {
          $result = $task->deleteData($data); 
        }
        break;
        
      case 'announcements':
        if($action === 'create') {
          $result = $task->createData($data); 
        }
        else if($action === 'read') {
          $result = $task->readData($data); 
        }
        else if($action === 'update') {
          $result = $task->updateData($data); 
        }
        else if($action === 'delete') {
          $result = $task->deleteData($data); 
        }
        break;

      case 'events':
        if($action === 'create') {
          $result = $task->createData($data); 
        }
        else if($action === 'read') {
          $result = $task->readData($data); 
        }
        else if($action === 'update') {
          $result = $task->updateData($data); 
        }
        else if($action === 'delete') {
          $result = $task->deleteData($data); 
        }
        break;

      case 'gallery':
        if($action === 'create') {
          $result = $task->createData($data);
        } else if($action === "read") {
          $result = $task->readData($data);
        }
        break;

      default:
        break;
    }

    return $result; // Return the $result value
  }
}
