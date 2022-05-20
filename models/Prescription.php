<?php

require "../config/connectionDB.php";

class Prescription{

	public function __construct(){

	}

	public function insertPrescription($idpatient,$drug,$dose,$route,$frecuency,$durationt,$comments,$bleepno,$regdoc,$dateP){



		$sql1 = "SELECT pr.idPregnancy FROM patient p, pregnancy pr WHERE p.idPatient=pr.idPatient AND pr.idPatient = '$idpatient'";

		 
		
		$query = executeQuery($sql1);
		 
		foreach ($query as $value) {
  			$id = $value["idPregnancy"];
		} 

		/*if ($id  == 'null') {
			echo "There is not pregnancy "
		}*/
		 
 
		$sql = "INSERT INTO  prescribedmedicine (idPregnancy, gendrugname, dose, route, frequency,durationtreatment, comments, idUser,bleepno, datepm) VALUES ($id,'$drug','$dose','$route','$frecuency','$durationt','$comments','$regdoc','$bleepno','$dateP')";

	 

		return executeQuery($sql);
		 

	}

	  
/*
	public function showInformation($iduser,$firstname,$lastname,$registernumber,$idtypeuser,$user,$pass,$status){

		 
		$sql = "SELECT e.idUser, e.firstname, e.lastname,e.registernumber,  u.user,u.password,u.status,tu.typeuser FROM users u,employee e, typeuser tu WHERE e.idUser = u.idUser and u.idTypeUser = tu.idTypeUser";

		return executeQuery($sql);

	}*/

	public function showListPatients(){
		
		$sql = "SELECT  p.firstname, p.lastname, pr.idPatient,pr.idPregnancy,pr.pregnancyno, pr.status, pm.datepm, pm.idUser,pm.gendrugname,pm.idPrescription,pm.dose,pm.durationtreatment, pm.comments,pm.statuspm FROM patient p ,prescribedmedicine pm, pregnancy pr, users u  WHERE pm.idPregnancy = pr.idPregnancy AND pr.idPatient = p.idPatient AND p.idUser = u.idUser  AND u.status='1' "; 

		//AND pr.status='1'
 	 

		return executeQuery($sql);
	}

	// Function to enable or disable patient
	public function sendPres($idPrescription){
		 
		$sql = "UPDATE prescribedmedicine SET statuspm='2' WHERE idPrescription = '$idPrescription'";
		 		
		return executeQuery($sql);
	}

	// select all the patients
	public function selectListPat(){
		
		$sql = "SELECT p.idPatient,p.firstname,p.lastname,p.idUser,u.idUser,u.status  FROM patient p, users u  WHERE  p.idUser = u.idUser and u.status='1'";
							
		return executeQuery($sql);
	}


}
?>