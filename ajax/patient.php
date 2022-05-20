 <?php
 session_start();
 require_once "../models/Patient.php";

 $patient = new Patient();

 $idUser=isset($_POST["idUser"])? cleanString($_POST["idUser"]):"";
 $idpatient=isset($_POST["idpatient"])? cleanString($_POST["idpatient"]):"";
 $firstname=isset($_POST["firstnamepa"])? cleanString($_POST["firstnamepa"]):"";
 $lastname=isset($_POST["lastname"])? cleanString($_POST["lastname"]):"";
 $birthdate=isset($_POST["birthdate"])? cleanString($_POST["birthdate"]):"";
 $birthplace=isset($_POST["birthplace"])? cleanString($_POST["birthplace"]):"";
 $race=isset($_POST["race"])? cleanString($_POST["race"]):"";
 $language=isset($_POST["language"])? cleanString($_POST["language"]):"";
 $mstatus=isset($_POST["mstatus"])? cleanString($_POST["mstatus"]):"";
 $religion=isset($_POST["religion"])? cleanString($_POST["religion"]):"";
 $lastgrade=isset($_POST["lastgrade"])? cleanString($_POST["lastgrade"]):"";
 $educationyears=isset($_POST["educationyears"])? cleanString($_POST["educationyears"]):"";
 $occupation=isset($_POST["occupation"])? cleanString($_POST["occupation"]):"";
 $employer=isset($_POST["employer"])? cleanString($_POST["employer"]):"";
 $ssnumber=isset($_POST["ssnumber"])? cleanString($_POST["ssnumber"]):"";
 $insuranceholder=isset($_POST["insuranceholder"])? cleanString($_POST["insuranceholder"]):"";
 $insurancenumber=isset($_POST["insurancenumber"])? cleanString($_POST["insurancenumber"]):"";
 $user=isset($_POST["userpa"])? cleanString($_POST["userpa"]):"";
 $password=isset($_POST["passwordpa"])? cleanString($_POST["passwordpa"]):"";
 $status=isset($_POST["status"])? cleanString($_POST["status"]):"";

 $street=isset($_POST["street"])? cleanString($_POST["street"]):"";
 $city=isset($_POST["city"])? cleanString($_POST["city"]):"";
 $state=isset($_POST["state"])? cleanString($_POST["state"]):"";
 $zip=isset($_POST["zip"])? cleanString($_POST["zip"]):"";
 $phone=isset($_POST["phone"])? cleanString($_POST["phone"]):"";
 $homephone=isset($_POST["homephone"])? cleanString($_POST["homephone"]):"";
 $phonealternate=isset($_POST["phonealternate"])? cleanString($_POST["phonealternate"]):"";
 $lastnamepart=isset($_POST["lastnamepart"])? cleanString($_POST["lastnamepart"]):"";
 $firstnamepart=isset($_POST["firstnamepart"])? cleanString($_POST["firstnamepart"]):"";
 $middlenamepart=isset($_POST["middlenamepart"])? cleanString($_POST["middlenamepart"]):"";
 $relationpart=isset($_POST["relationpart"])? cleanString($_POST["relationpart"]):"";
 $phonepart=isset($_POST["phonepart"])? cleanString($_POST["phonepart"]):"";
 $employerpart=isset($_POST["employerpart"])? cleanString($_POST["employerpart"]):"";
 $childfa=isset($_POST["childfa"])? cleanString($_POST["childfa"]):"";
 $eclastname=isset($_POST["eclastname"])? cleanString($_POST["eclastname"]):"";
 $ecfirstname=isset($_POST["ecfirstname"])? cleanString($_POST["ecfirstname"]):""; 
 $ecmiddlename=isset($_POST["ecmiddlename"])? cleanString($_POST["ecmiddlename"]):"";
 $ecphone=isset($_POST["ecphone"])? cleanString($_POST["ecphone"]):"";


 $lmpdate=isset($_POST["lmpdate"])? cleanString($_POST["lmpdate"]):"";
 $lpmnormal=isset($_POST["lpmnormal"])? cleanString($_POST["lpmnormal"]):"";
 $regular=isset($_POST["regular"])? cleanString($_POST["regular"]):"";
 $interval=isset($_POST["interval"])? cleanString($_POST["interval"]):"";
 $duration=isset($_POST["duration"])? cleanString($_POST["duration"]):"";
 $menarche=isset($_POST["menarche"])? cleanString($_POST["menarche"]):"";
 $pregnancyno=isset($_POST["pregnancyno"])? cleanString($_POST["pregnancyno"]):"";
 $totalpreg=isset($_POST["totalpreg"])? cleanString($_POST["totalpreg"]):"";
 $ectopicpr=isset($_POST["ectopicpr"])? cleanString($_POST["ectopicpr"]):"";
 $abortions=isset($_POST["abortions"])? cleanString($_POST["abortions"]):"";
 $bornalive=isset($_POST["bornalive"])? cleanString($_POST["bornalive"]):"";
 $multiplebirth=isset($_POST["multiplebirth"])? cleanString($_POST["multiplebirth"]):"";
 $atterm=isset($_POST["atterm"])? cleanString($_POST["atterm"]):"";
 $preterm=isset($_POST["preterm"])? cleanString($_POST["preterm"]):"";
 $parity=isset($_POST["parity"])? cleanString($_POST["parity"]):"";
 $contraceptivet=isset($_POST["contraceptivet"])? cleanString($_POST["contraceptivet"]):"";
 $contraceptived=isset($_POST["contraceptived"])? cleanString($_POST["contraceptived"]):"";
 $pregnancyplan=isset($_POST["pregnancyplan"])? cleanString($_POST["pregnancyplan"]):"";
 $lpmdat=isset($_POST["lpmdat"])? cleanString($_POST["lpmdat"]):"";
 $lmpedd=isset($_POST["lmpedd"])? cleanString($_POST["lmpedd"]):"";
 $lpmga=isset($_POST["lpmga"])? cleanString($_POST["lpmga"]):"";
 $lpmbon=isset($_POST["lpmbon"])? cleanString($_POST["lpmbon"]):"";
 $usdate=isset($_POST["usdate"])? cleanString($_POST["usdate"]):"";
 $usedd=isset($_POST["usedd"])? cleanString($_POST["usedd"]):"";
 $usga=isset($_POST["usga"])? cleanString($_POST["usga"]):"";
 $usbon=isset($_POST["usbon"])? cleanString($_POST["usbon"]):"";
 $trdate=isset($_POST["trdate"])? cleanString($_POST["trdate"]):"";
 $tredd=isset($_POST["tredd"])? cleanString($_POST["tredd"]):"";
 $trga=isset($_POST["trga"])? cleanString($_POST["trga"]):"";
 $trbon=isset($_POST["trbon"])? cleanString($_POST["trbon"]):"";
 $prcomments=isset($_POST["prcomments"])? cleanString($_POST["prcomments"]):"";






 
 
 

 switch ($_GET["op"]){
	case 'saveandupdate':

    //use of HASH SHA256 to encrypte users passwords
        $passlogH = hash("SHA256",$password);
	if (empty($idUser)){
		$response=$patient->insertPatient($firstname,$lastname,$birthdate,$birthplace,$race,$language,$mstatus,$religion,$lastgrade,$educationyears,$occupation,$employer,$ssnumber,$insuranceholder,$insurancenumber,$user,$passlogH,$street, $city, $state, $zip, $phone, $homephone, $phonealternate, $lastnamepart, $firstnamepart,$middlenamepart, $relationpart, $phonepart, $employerpart, $childfa, $eclastname, $ecfirstname, $ecmiddlename, $ecphone, $lmpdate, $lpmnormal, $regular, $interval, $duration, $menarche, $pregnancyno, $totalpreg, $ectopicpr, $abortions, $bornalive, $multiplebirth, $atterm, $preterm, $parity, $contraceptivet, $contraceptived, $pregnancyplan, $lpmdat, $lmpedd, $lpmga, $lpmbon, $usdate, $usedd, $usga, $usbon, $trdate, $tredd, $trga, $trbon, $prcomments);
		echo $response ? "Patient added successfully" : "Patient cannot be add, verify the written information";
	}else{
		$response=$patient->updatePatient($firstname,$lastname,$birthdate,$birthplace,$race,$language,$mstatus,$religion,$lastgrade,$educationyears,$occupation,$employer,$ssnumber,$insuranceholder,$insurancenumber,$user,$passlogH,$status);
		echo $response ?"Patient updated successfully" : "Patient cannot be updated, verify the written information";


	}
	break;
	

	case 'getlistpatients':
		$response=$patient->showListPatients(); 

		$data = Array(); //store all data collected


		while ($reg = $response->fetch_object() ) {

            if ($reg->status == 1 && $_SESSION['idTypeUser'] != 1) {
                $btn = '<button class="btn btn-warning" onclick="showData('.$reg->idPatient.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="disablepat('.$reg->idUser.')"><i class="fa fa-close"></i></button>';
            }elseif($reg->status == 0 && $_SESSION['idTypeUser'] != 1){
                $btn = '<button class="btn btn-warning" onclick="showData('.$reg->idPatient.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="enabledpat('.$reg->idUser.')"><i class="fa fa-check"></i></button>';
            }else{
                $btn = '';
            }

			$data[] = array(
				"0" => $btn,
				"1" => $reg -> idPatient,
				"2" => $reg -> firstname,
				"3" => $reg -> lastname,
				"4" => $reg -> birthdate,
				"5" => $reg -> user,
				"6" => $reg -> password,
				"7" =>($reg->status)?'<span class="label bg-green">Active</span>':
 				'<span class="label bg-red">Inactive</span>'
			);
		}

		$results = array( 
		"sEcho"=>1, //datatable information 
 			"iTotalRecords"=>count($data), //total of records
 			"iTotalDisplayRecords"=>count($data), //total of records to show
 			"aaData"=>$data);
 		echo json_encode($results);		 
	break;

	case 'showData':
		$response=$patient->showData($idPatient);
		echo json_encode($response);
	break;

	case 'disablepat':
		$response = $patient->disableenablePat($idUser,0);

		echo $response ?"Patient disabled successfully" : "Patient cannot be disabled";;
	break;

	case 'enabledpat':
		$response = $patient->disableenablePat($idUser,1);

		echo $response ?"Patient enabled successfully" : "Patient cannot be enabled";;
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