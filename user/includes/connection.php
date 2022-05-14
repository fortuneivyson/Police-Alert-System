<?php

Class Database{

//	private $server = "mysql:host=localhost;dbname=police_alert_db";
//	private $username = "root";
//	private $password = "";
	private $server = "mysql:host=localhost;dbname=id16954140_police_alert_db";
	private $username = "id16954140_root";
	private $password = "12345678@Abc";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}

$con = new Database();
 
?>
