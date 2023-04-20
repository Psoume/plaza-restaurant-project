<?php 

class PDOBD
{
	private static $instance;
	private $pdo;

	private function __construct() {

        try 
        {
            $host='localhost';
            $dbname='plaza';
            $user='root';
            $pass='root';
            
            $this->pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port=3306', $user, $pass);
        }
        catch (PDOException $error) 
        {
            echo $error->getMessage();
        }
    }

    public static function getInstance() {
      if(!(self::$instance instanceof self)) {
         self::$instance = new self();
     }
     return self::$instance;
 }

    public function getPdo()
    {
        return $this->pdo;
    }
    

}

?>
