<?php
require_once "../models/Medicaldir.php";

$medicaldir = new Medicaldir();

 switch ($_GET["op"]){
	case 'getlist':
	
		$response=$medicaldir->showListMedicaldir();
		$data = Array(); //store all data collected

		while ($reg = $response->fetch_object() ) {
			$data[] = array(
				
				"0" => $reg -> clinicname,
				"1" => $reg -> telephone,
				"2" => $reg -> hospitalappointments,
				"3" => $reg -> focusedantenatal
			);
		}

		$results = array( 
		"sEcho"=>1, //datatable information 
 			"iTotalRecords"=>count($data), //total of records
 			"iTotalDisplayRecords"=>count($data), //total of records to show
 			"aaData"=>$data);
 		echo json_encode($results);		 
	break;

}