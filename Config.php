<?php
class Config{
	protected $conn;
	function Koneksi(){
		$conn = NULL;
		try{
			$conn = new PDO("mysql:host =localhost;dbname=tes_oop;",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $error){
			echo "kesalahan : ".$error->getMessage();
		}
		return $this->conn = $conn;
	}
}
