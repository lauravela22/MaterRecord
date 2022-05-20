<?php
session_start(); 
require_once "../models/Correspondence.php";

$correspondence = new Correspondence();

$idpatient=isset($_POST["idpatient"])? cleanString($_POST["idpatient"]):"";
$idCorrespondence=isset($_POST["idCorrespondence"])? cleanString($_POST["idCorrespondence"]):"";
$idpatfullname=isset($_POST["idpatfullname"])? cleanString($_POST["idpatfullname"]):"";
$dateCC=isset($_POST["dateCC"])? cleanString($_POST["dateCC"]):"";
$typeCC=isset($_POST["typeCC"])? cleanString($_POST["typeCC"]):"";
$fileCC=isset($_POST["fileCC"])? cleanString($_POST["fileCC"]):"";

switch ($_GET["op"]){
	case 'saveandupdate':
	/*if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']))
		{
			$file=$_POST["actualfile"];
		}
		else 
		{*/
			$file_ext = explode('.',$_FILES['fileCC']['name']);
			if ($file_ext[1] == "PDF" || $file_ext[1] == "pdf")
			{
				$fileCC = round(microtime(true)) . '.' . end($file_ext);
				move_uploaded_file($_FILES['fileCC']['tmp_name'], "../files/correspondence/" . $fileCC);

				  
			}
		//}
	if (empty($idCorrespondence)){

		$response=$correspondence->insertcorrespondence($idpatfullname,$dateCC,$typeCC,$fileCC);
		
		echo $response ? "Correspondence saved successfully" : "Correspondence cannot be add, verify the written information";
	}
	else {
		$response=$correspondence->updatecorrespondence($idCorrespondence,$idpatient,$dateCC,$typeCC,$fileCC);
		echo $response ?"Correspondence updated successfully" : "Correspondence cannot be updated, verify the written information";
	}
	break;
	case 'showData':
		$response=$correspondence->showData($idCorrespondence);
		echo json_encode($response);
	break;
	case 'getlist':
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

			if ($_SESSION['idTypeUser'] != 1) {
				$btn = '<button class="btn btn-warning" onclick="showData('.$reg->idCorrespondence.')"><i class="fa fa-pencil"></i></button>';
			}else{
				$btn= '';
			}


			$data[] = array(
				"0" => $btn,
				"1" => $reg ->firstname .' '. $reg->lastname,
				"2" => $reg ->dateletter,
				"3" => $lettertype,
				"4" => $reg ->file
 
											
				/*"5" =>($reg->status)?'<span class="label bg-green">Active</span>':
 				'<span class="label bg-red">Inactive</span>'*/
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