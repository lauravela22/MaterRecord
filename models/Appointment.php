<?php
require "../config/connectionDB.php";

class Appointment{

	public function __construct(){}

	
	public function insertappointment($idpatfullname,$datepp,$timeapp,$typeapp)
	{
		//,idUserbooked,
		$sql="INSERT INTO appointments (idPatient,dateapp,timeapp,typeappointment)VALUES ('$idpatfullname','$datepp','$timeapp','$typeapp')";

		echo $sql;
 
		return executeQuery($sql);
	}


	public function updateappointment($idAppointment,$idpatfullname,$datepp,$timeapp,$typeapp)
	{
		$sql="UPDATE appointments SET idPatient='$idpatfullname', dateapp = '$datepp',timeapp='$timeapp',typeappointment = '$typeapp' WHERE idAppointment = '$idAppointment'";
 		
		return executeQuery($sql);
	}

	/*public function showListCC()
	{
		$sql="SELECT p.idPatient,c.idCorrespondence ,p.firstname, p.lastname, c.dateletter,c.lettertype,c.file FROM patient p, correspondence c WHERE c.idPatient = p.idPatient";

	 
		return executeQuery($sql);
	}*/

	public function showData($idAppointment)
	{
		$sql="SELECT p.idPatient,p.firstname,p.lastname,a.* 
		FROM patient p, appointments a WHERE p.idPatient = a.idPatient and a.idAppointment ='$idAppointment'";

		return executeQueryRow($sql);
	}
	


	  




	
}

?>