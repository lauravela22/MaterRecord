<?php
session_start(); 
require_once "../models/Users.php";

$users = new Users();

$userlog=isset($_POST["userlog"])? cleanString($_POST["userlog"]):"";
$passlog=isset($_POST["passlog"])? cleanString($_POST["passlog"]):"";

switch ($_GET["op"]){
	case 'validateuserlogin':

	$userlog = $_POST['user'];
	$passlog = $_POST['pass'];

	 	//use of HASH SHA256 to encrypte users passwords
	$passlogH = hash("SHA256",$passlog);

	$idTypeUser = 0;
	$response=$users->validateuserlogin($userlog,$passlogH,$idTypeUser);	 		
	$fetch = $response -> fetch_object();

		if (isset($fetch)) {
		 
				$idTypeUser = $fetch -> idTypeUser;
				$response=$users->validateuserlogin($userlog,$passlogH,$idTypeUser);	 		
				$fetch = $response -> fetch_object();

				if (isset($fetch)) {
					$_SESSION['idUser']= $fetch -> idUser;
					$_SESSION['idPatient']= $fetch -> idPatient;
					$_SESSION['fullname']= $fetch -> firstname .' '.$fetch -> lastname;
					$_SESSION['idTypeUser']= $fetch -> idTypeUser;
					$_SESSION['user']= $fetch -> user;  
					$_SESSION['typeuser']= $fetch -> typeuser;  
					$_SESSION['fileimg']= $fetch -> fileimg;  
				}



		}
	  
	
	echo json_encode($fetch); 
	break;

	case 'endSession':
		//Clean session var  
        session_unset();
        //Destroy ssession
        session_destroy();
        //redirect to index
        header("Location: ../index.php");

	break;
}
?>