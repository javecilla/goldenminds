<?php
declare(strict_types = 1);

namespace App;

class Service 
{
  public static function render($filename, $title, $desc, $rpurpose)
  {
    $viewContent = self::renderContent($filename);
    $layoutContent = ($rpurpose === 'CS') ? 'layout.php': 'cms_layout.php';


   // $file = file_get_contents(__DIR__ . '/../../build/main/' . $layoutContent);
    $file = file_get_contents(__DIR__ . '/../../build/main/layout.php');
    $file = str_replace('{{title}}', $title, $file); 
    $file = str_replace('{{description}}', $desc, $file); 
    $file = str_replace('{{content}}', $viewContent, $file);
    return $file;
  }

  public static function renderContent($filename) 
  {
    ob_start();
    require_once $filename;
    return ob_get_clean();
  }

  public static function error() 
  {
    $errorPath = require_once __DIR__ . '/Exceptions/_404.php';
    return $errorPath;
  }
}

