<?php
require "../config/connectionDB.php";

class Correspondence{

	public function __construct(){

	}

	
	public function insertcorrespondence($idPatient,$dateletter,$lettertype,$file)
	{
		$sql="INSERT INTO correspondence (idPatient,dateletter,lettertype,file)
		VALUES ('$idPatient','$dateletter','$lettertype','$file')";
 
		return executeQuery($sql);
	}


	public function updatecorrespondence($idCorrespondence,$idpatient,$dateletter,$lettertype,$file)
	{
		$sql="UPDATE correspondence SET dateletter = '$dateletter',lettertype='$lettertype',file = '$file' WHERE idCorrespondence = '$idCorrespondence' and idPatient = '$idpatient'  ";
 		
		return executeQuery($sql);
	}

	public function showListCC()
	{
		$sql="SELECT p.idPatient,c.idCorrespondence ,p.firstname, p.lastname, c.dateletter,c.lettertype,c.file FROM patient p, correspondence c WHERE c.idPatient = p.idPatient";

	 
		return executeQuery($sql);
	}

	public function showData($idCorrespondence)
	{
		$sql="SELECT p.idPatient,c.idCorrespondence,p.firstname, p.lastname, c.dateletter,c.lettertype,c.file 
		FROM patient p, correspondence c WHERE c.idPatient = p.idPatient and c.idCorrespondence ='$idCorrespondence'";

		return executeQueryRow($sql);
	}
	


	  




	
}

?>