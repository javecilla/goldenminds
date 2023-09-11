<?php
declare(strict_types=1);

namespace App\Models\CMS;

class DBCMS 
{   
  private $dbhost = 'localhost';
  private $dbuname = 'root'; //gmcbulac_derek03 //root
  private $dbpword = ''; //derek030872 //pword
  private $dbname = 'cms'; //gmcbulac_db_cms //cms
  
  protected function DB()
  {
    try {
      $dsn = "mysql:host={$this->dbhost};dbname={$this->dbname}";
      $pdo = new \PDO($dsn, $this->dbuname, $this->dbpword);
      $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Set error mode
      return $pdo;
    } catch (\PDOException $e) {
      echo "Connection error: " . $e->getMessage();
      return null;
    }
  }
}
