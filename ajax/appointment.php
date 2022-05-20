<?php
session_start();
require_once "../models/Appointment.php";

$appointment = new Appointment();
 
$idpatient=isset($_POST["idpatient"])? cleanString($_POST["idpatient"]):"";
$idAppointment=isset($_POST["idAppointment"])? cleanString($_POST["idAppointment"]):"";
$idpatfullname=isset($_POST["idpatfullname"])? cleanString($_POST["idpatfullname"]):"";
$datepp=isset($_POST["datepp"])? cleanString($_POST["datepp"]):"";
$timeapp=isset($_POST["timeapp"])? cleanString($_POST["timeapp"]):"";
$typeapp=isset($_POST["typeapp"])? cleanString($_POST["typeapp"]):"";

switch ($_GET["op"]){
	case 'saveandupdate':
	 
	if (empty($idAppointment)){

		$response=$appointment->insertappointment($idpatfullname,$datepp,$timeapp,$typeapp);
		
		echo $response ? "Appointment saved successfully" : "Appointment cannot be add, verify the written information";
	}
	else {
		$response=$appointment->updateappointment($idAppointment,$idpatfullname,$datepp,$timeapp,$typeapp);
		echo $response ?"Appointment updated successfully" : "Appointment cannot be updated, verify the written information";
	}
	break;
	case 'showData':
		$response=$appointment->showData($idAppointment);
		echo json_encode($response);
	break;
/*	case 'getlist':
		$response=$correspondence->showListCC();
		

		$data = Array(); //store all data collected

		while ($reg = $response->fetch_object() ) {

			if($reg ->lettertype == 1){
				$lettertype = 'Referral Letter';
			}elseif($reg ->lettertype == 2){
				$lettertype ='Discharge Communication';
			}elseif($reg ->lettertype == 3){
				$lettertype = 'Ambulance Transer Sheet';
			}elseif($reg ->lettertype == 4){
				$lettertype ='Other';
			}


			$data[] = array(
				"0"=>'<button class="btn btn-warning" onclick="showData('.$reg->idCorrespondence.')"><i class="fa fa-pencil"></i></button>',
				"1" => $reg ->firstname .' '. $reg->lastname,
				"2" => $reg ->dateletter,
				"3" => $lettertype,
				"4" => $reg ->file
  
			);
		}

		$results = array( 
		"sEcho"=>1, //datatable information 
 			"iTotalRecords"=>count($data), //total of records
 			"iTotalDisplayRecords"=>count($data), //total of records to show
 			"aaData"=>$data);
 		echo json_encode($results);		 
	break;*/
	

	 
}
?>