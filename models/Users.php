<?php
require "../config/connectionDB.php";

class Users{

	public function __construct(){

	}
 

	public function validateuserlogin($userlog,$passlog,$idTypeUser){


		if ($idTypeUser == 0) {
			$sql = "SELECT * FROM users where user ='$userlog' AND password = '$passlog' AND status = '1'";
		}elseif($idTypeUser == 1){
			$sql = "SELECT u.*,p.idPatient,p.firstname, p.lastname,tu.typeuser, tu.fileimg FROM users u, patient p, typeuser tu where u.idUser=p.idUser and u.user='$userlog' AND u.password = '$passlog' and u.status ='1' and  tu.idTypeUser = '$idTypeUser'";
			echo $sql;
		}elseif($idTypeUser == 2 || $idTypeUser == 3 || $idTypeUser == 4 ){
			$sql = "SELECT u.*, e.firstname,e.lastname,tu.typeuser, tu.fileimg FROM users u, employee e, typeuser tu where  u.idUser= e.idUser and u.user='$userlog' AND u.password = '$passlog' and u.status ='1' and  tu.idTypeUser = '$idTypeUser'";
		}
		 

		return executeQuery($sql);
	  

	}


	public function validateuserloginP($userlog,$passlog){
		$sql = "SELECT u.*,p.firstname, p.lastname FROM users u, patient p where u.idUser=p.idUser and u.user='$userlog' AND u.password = '$passlog' and u.status ='1'";
			executeQuery($sql);
	}

	public function validateuserloginE($userlog,$passlog){

		$sql = "SELECT u.*, e.firstname,e.lastname FROM users u,  employee e where  u.idUser= e.idUser and u.user='$userlog' AND u.password = '$passlog' and u.status ='1'";
			executeQuery($sql);

	}
}

?>