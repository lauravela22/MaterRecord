<?php
require "../config/connectionDB.php";

class Medicaldir{

	public function __construct(){

	}

	public function showListMedicaldir(){
		
		$sql = "SELECT * FROM telephonedir";
		return executeQuery($sql);
	}

}

?>