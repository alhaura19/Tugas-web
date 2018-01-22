<?php
class Koneksi{
	var $host;
	var $user;
	var $password;
	var $database;
	
	public function __construct(){
		$this->host="localhost";
		$this->user="root";
		$this->password="";
		$this->database="university";
	}

	public function Sambungkan(){
		if(!mysql_connect($this->host, $this->user, $this->password, $this->database)){
			die("gagal sambung ke server database");
		}
		else{
			if(!mysql_select_db($this->database)){
				die("gagal sambung ke database");
			}
		}
	}

	public function Putuskan(){
		@mysql_close();
	}
}
?>