<?php 
class database{
    private $host ="localhost";
    private $user ="ahmed";
    private $pass ="";
    private $dbname = "login";
    public $connect;

    public function __construct()
    {
        $this->connect= mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
        
        if(!$this->connect){
            die("Connection failed: ".mysqli_connect_error($this->connect));
        }
        
    }
}
?>