<?php
require "../config/connectionDB.php";

class Employee{

	public function __construct(){

	}

	public function showTypeUsers(){
		
		$sql = "SELECT * FROM typeuser where status ='1'";
		return executeQuery($sql);
	}

	 public function insertEmployee($idTypeUser,$user,$password,$firstname,$lastname,$regnumber){
		
	 	$sql = "INSERT INTO users (idTypeUser,user,password) VALUES('$idTypeUser','$user', '$password')";

	 	executeQuery($sql);
	 	

		$sql2 = "SELECT MAX(idUser) AS idUser FROM users";
		$query = executeQuery($sql2) ;

		  foreach ($query as $value) {
  				 $id = $value['idUser'];
			}

	 	$sql = "INSERT INTO employee (idUser, firstname, lastname,registernumber) 
	 	VALUES($id,'$firstname', '$lastname','$regnumber')";

 
		return executeQuery($sql);
	}  

	public function updateEmployee($idUser,$firstname,$lastname,$user,$password,$idtypeuser,$registernumber,$status){
 
		$sql = "UPDATE employee e INNER JOIN users u ON (e.idUser = u.idUser) SET  e.firstname = '$firstname', e.lastname ='$lastname', e.registernumber = '$registernumber', u.idTypeUser = '$idtypeuser', u.user = '$user' , u.password = '$password' , u.status = '$status' WHERE u.idUser = '$idUser'";

		return executeQuery($sql);
	} 

	public function showData($idUser){

		 
		$sql = "SELECT e.idUser, e.firstname, e.lastname, u.user,u.password,tu.idTypeUser  ,e.registernumber, u.status, tu.typeuser FROM users u,employee e, typeuser tu WHERE e.idUser = u.idUser and u.idTypeUser = tu.idTypeUser and e.idUser='$idUser'";

		return executeQueryRow($sql);

	}

	public function showListEmployee(){
		
		$sql = "SELECT e.idUser, e.firstname, e.lastname,e.registernumber,  u.user,u.password,u.status,tu.typeuser FROM users u,employee e, typeuser tu WHERE e.idUser = u.idUser and u.idTypeUser = tu.idTypeUser ORDER BY u.idUser ASC";
		//  and u.status='1'

		return executeQuery($sql);
	}

	public function disableenableUser($idUser,$opt){

		if ($opt == 0) {
			$sql = "UPDATE users SET status='0' WHERE idUser = '$idUser'";
		}else{
			$sql = "UPDATE users SET status='1' WHERE idUser = '$idUser'";
		}		
		
		return executeQuery($sql);

	}

	public function showtypeuser(){

		$sql = "SELECT * FROM typeuser WHERE status='1'";
		
		return executeQuery($sql);

	}





	
}

?>