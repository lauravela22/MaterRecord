 <?php
session_start(); 
 require_once "../models/Prescription.php";

 $prescription = new Prescription();

 $idpatient =isset($_POST["idpatient"])? cleanString($_POST["idpatient"]):"";
 $idpregnancy =isset($_POST["idpregnancy"])? cleanString($_POST["idpregnancy"]):"";
 $idpatfullname =isset($_POST["idpatfullname"])? cleanString($_POST["idpatfullname"]):"";
 $dateP =isset($_POST["dateP"])? cleanString($_POST["dateP"]):"";
 $drug =isset($_POST["drug"])? cleanString($_POST["drug"]):"";
 $dose =isset($_POST["dose"])? cleanString($_POST["dose"]):"";
 $route =isset($_POST["route"])? cleanString($_POST["route"]):"";
 $frecuency =isset($_POST["frecuency"])? cleanString($_POST["frecuency"]):"";
 $durationt =isset($_POST["durationt"])? cleanString($_POST["durationt"]):"";
 $comments =isset($_POST["comments"])? cleanString($_POST["comments"]):"";
 $bleepno =isset($_POST["bleepno"])? cleanString($_POST["bleepno"]):"";
 $regdoc =isset($_POST["regdoc"])? cleanString($_POST["regdoc"]):"";

 
 

 switch ($_GET["op"]){
	case 'saveandupdate':
	if (empty($idpregnancy)){
		$response=$prescription->insertPrescription($idpatfullname,$drug,$dose,$route,$frecuency,$durationt,$comments,$bleepno,$regdoc,$dateP);
		echo $response ? "prescription added successfully" : "prescription cannot be add, verify the written information";
	}else{
		$response=$prescription->updatePrescription($idpatfullname,$idpregnancy,$drug,$dose,$route,$frecuency,$durationt,$comments,$bleepno,$regdoc,$dateP);
		echo $response ?"prescription updated successfully" : "prescription cannot be updated, verify the written information";
	}
	break;
	/*case 'getinformation':
		$response=$prescription->showInformation($idUser, $firstname,$lastname,$user,$password,$status,$idTypeUser,$regnumber);

		echo jason_encode($response);
	break;*/

	case 'getlistpatients':
		$response=$prescription->showListPatients(); 

		$data = Array(); //store all data collected

		while ($reg = $response->fetch_object() ) {
			if($reg->statuspm == 0){
				$msj = '<span class="label bg-red">Canceled</span>';
				$btn = '';
			}elseif($reg->statuspm == 1 && $_SESSION['idTypeUser'] == 3){				 
				$msj= '<span class="label bg-green">Open</span>';
				$btn = '<button class="btn btn-warning" onclick="showData('.$reg->idPrescription.')"><i class="fa fa-pencil"></i></button>'.
					'<button class="btn btn-primary" onclick="sendPres('.$reg->idPrescription.')"><i class="fa fa-external-link-square"></i></button>';
			}else{
				$msj = '<span class="label bg-red">Sent</span>';
				$btn = '';
			} 
			
			$data[] = array(
				"0"=>$btn,
				"1" => $reg -> pregnancyno ,
				"2" => $reg -> firstname .' '. $reg -> lastname,
				"3" => $reg -> datepm,
				"4" => $reg -> gendrugname,
				"5" => $reg -> dose,
				"6" => $reg -> durationtreatment,
				"7" => $reg -> comments,
				"8" => $reg -> idUser, 
				"9" => $msj 
			);
		}

		$results = array( 
		"sEcho"=>1, //datatable information 
 			"iTotalRecords"=>count($data), //total of records
 			"iTotalDisplayRecords"=>count($data), //total of records to show
 			"aaData"=>$data);
 		echo json_encode($results);		 
	break;

	case 'sendPres':
		$response = $prescription->sendPres($idPrescription);
		echo $response ?"Prescription sent successfully" : "Prescription cannot be send";
	break;	 

	case 'selectListPat':
	require_once "../models/Patient.php";
		$patient = new Patient();

		$response = $patient->selectListPat();

		while ($reg = $response->fetch_object())
				{
					$fname = $reg->firstname .' '.$reg->lastname;					
					echo '<option value=' . $reg->idPatient . '>' . $fname . '</option>';
				}
	break;
}

?>