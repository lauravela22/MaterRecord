<?php
session_start();
require_once "../models/Employee.php";

$employee = new Employee();

$idUser=isset($_POST["idUser"])? cleanString($_POST["idUser"]):"";
$idTypeUser=isset($_POST["idTypeUser"])? cleanString($_POST["idTypeUser"]):"";
$firstname=isset($_POST["firstname"])? cleanString($_POST["firstname"]):"";
$lastname=isset($_POST["lastname"])? cleanString($_POST["lastname"]):"";
$user=isset($_POST["user"])? cleanString($_POST["user"]):"";
$password=isset($_POST["password"])? cleanString($_POST["password"]):"";
$status=isset($_POST["status"])? cleanString($_POST["status"]):"";
$regnumber=isset($_POST["regnumber"])? cleanString($_POST["regnumber"]):"";

 
switch ($_GET["op"]){
	case 'saveandupdate':

	//use of HASH SHA256 to encrypte users passwords
	 	$passlogH = hash("SHA256",$password);

	if (empty($idUser)){

		
		/*echo $idTypeUser.','.$user.','.$password.','.$firstname.','.$lastname.','.$regnumber;*/
		$response=$employee->insertEmployee($idTypeUser,$user,$passlogH,$firstname,$lastname,$regnumber);

		
		echo $response ? "Employee saved successfully" : "Employee cannot be add, verify the written information";
	}
	else {
		$response=$employee->updateEmployee($idUser,$firstname,$lastname,$user,$passlogH,$idTypeUser,$regnumber,$status);
		echo $response ?"Employee updated successfully" : "Employee cannot be updated, verify the written information";
	}
	break;
	case 'showData':
		$response=$employee->showData($idUser);
		echo json_encode($response);
	break;

	case 'getlistinformation':
		$response=$employee->showListEmployee();
		

		$data = Array(); //store all data collected

		while ($reg = $response->fetch_object() ) {
			$data[] = array(
				"0"=>($reg->status)?'<button class="btn btn-warning" onclick="showData('.$reg->idUser.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="disableemp('.$reg->idUser.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="showData('.$reg->idUser.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="enabledemp('.$reg->idUser.')"><i class="fa fa-check"></i></button>',
				"1" => $reg -> idUser,
				"2" => $reg -> firstname,
				"3" => $reg -> lastname,
				"4" => $reg -> user,
				"5" => $reg -> password,
				"6" => $reg -> typeuser,
				"7" => $reg -> registernumber,
				"8" =>($reg->status)?'<span class="label bg-green">Active</span>':
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

	case 'disableemp':
		$response = $employee->disableenableUser($idUser,0);

		echo $response ?"Employee disabled successfully" : "Employee cannot be disabled";;
	break;

	case 'enabledemp':
		$response = $employee->disableenableUser($idUser,1);

		echo $response ?"Employee enabled successfully" : "Employee cannot be enabled";;
	break;

	case "selectTypUser":
		
		$response = $employee->showtypeuser();

		while ($reg = $response->fetch_object())
				{
					echo '<option value=' . $reg->idTypeUser . '>' . strtoupper($reg->typeuser) . '</option>';
				}
	break;
}
?>