<?php
require "../config/connectionDB.php";

class Fetalassessment{

	public function __construct(){	}
   
	public function showListCC()
	{
			
		$sql = "SELECT p.firstname, p.lastname, pr.status FROM patient p , pregnancy pr, users u WHERE pr.idPatient = p.idPatient AND p.idUser = u.idUser AND u.status='1' and pr.status='1';"; 

	 
		return executeQuery($sql);
	}
 
	
}

?>