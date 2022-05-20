<?php
session_start();
require_once "../models/Radiology.php";

$radiology = new Radiology();

 
switch ($_GET["op"]){
	 
	case 'getlist':
		$response=$radiology->showListCC();		

		$data = Array(); //store all data collected

		while ($reg = $response->fetch_object() ) {
 
			$data[] = array(
				"0"=>$reg ->firstname .' '. $reg->lastname,
				"1" => '',
				"2" => ''
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
?>