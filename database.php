<?php
class DB
{
    private $hostname = 'localhost'; 
    private $username = 'rphp'; 
    private $password = 'rphp'; 
    private $dbName = 'bookstore'; 
    public $dbh = NULL; 
    public $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    public function __construct() 
    {
        try
        {
            $this->dbh = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password,$this->options);
           
        }
        catch(PDOException $e)
        {
            echo __LINE__.$e->getMessage();
        }
    }
    public function __destruct()
    {
        $this->dbh = NULL; 
    }
    public function runQuery($sql)
    {
        try
        {
            //echo $sql;
            $count = $this->dbh->exec($sql) or print_r($this->dbh->errorInfo());
        }
        catch(PDOException $e)
        {
            echo __LINE__.$e->getMessage();
        }
    }
    public function getQuery($sql)
    {
        $stmt = $this->dbh->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt; 
    }
}
?>