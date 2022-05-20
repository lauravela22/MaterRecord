<?php

require "../config/connectionDB.php";

class Patient{

	public function __construct(){

	}

	 public function insertPatient($firstname,$lastname,$birthdate,$birthplace,$race,$language,$mstatus,$religion,$lastgrade,$educationyears,$occupation,$employer,$ssnumber,$insuranceholder,$insurancenumber,$user,$password,$street, $city, $state, $zip, $phone, $homephone, $phonealternate, $lastnamepart, $firstnamepart,$middlenamepart, $relationpart, $phonepart, $employerpart, $childfa, $eclastname, $ecfirstname, $ecmiddlename, $ecphone,$lmpdate, $lpmnormal, $regular, $interval, $duration, $menarche, $pregnancyno, $totalpreg, $ectopicpr, $abortions, $bornalive, $multiplebirth, $atterm, $preterm, $parity, $contraceptivet, $contraceptived, $pregnancyplan, $lpmdat, $lmpedd, $lpmga, $lpmbon, $usdate, $usedd, $usga, $usbon, $trdate, $tredd, $trga, $trbon, $prcomments){

		 

		$sql = "INSERT INTO users (idTypeUser,user,password) values ('1','$user','$password')";
		executeQuery($sql);

		//echo "***** 1". $sql;

		$sql2 = "SELECT MAX(idUser) AS idUser FROM users";
		$query = executeQuery($sql2) ;

		  foreach ($query as $value) {
  				 $id = $value['idUser'];
			}

		$sql = "INSERT INTO  patient (idUser, firstname, lastname, birthdate,  birthplace, race, language, maritalstatus, religion, educationlastgrade,  educationyears, occupation, employer, socialsecuritynumber,  insuranceholder, insuranceaccountnumber) VALUES ($id,'$firstname','$lastname','$birthdate','$birthplace','$race','$language','$mstatus','$religion','$lastgrade','$educationyears','$occupation','$employer','$ssnumber','$insuranceholder','$insurancenumber')";

		executeQuery($sql);

		$sql3 = "SELECT MAX(idPatient) AS idPatient FROM patient";
		$queryp = executeQuery($sql3) ;

		  foreach ($queryp as $valuep) {
  				 $idP = $valuep['idPatient'];
			}

		$sql = "INSERT INTO  demographics (idPatient,street, city, state, zip, phone, home, alternate) VALUES ($idP,'$street', '$city', '$state', '$zip', '$phone', '$homephone', '$phonealternate')";
		 executeQuery($sql);

		 $sql =  "INSERT INTO  additionalinformation (idPatient,lastnamepart,firstnamepart,middlenamepart,relationpart,phonepart,childfa,employerpart,eclastname,ecfirstname,ecmiddlename,ecphone) VALUES ($idP, '$lastnamepart', '$firstnamepart','$middlenamepart', '$relationpart', '$phonepart',  '$childfa', '$employerpart', '$eclastname', '$ecfirstname','$ecmiddlename', '$ecphone')";
		 executeQuery($sql);

		 //,idUserfill,status
		 $sql = "INSERT INTO pregnancy (idPatient,pregnancyno,lmpdate,lmpnormal,regular,intervalpreg,duration,menarche,totalpreg,ectopicpreg,abortions,bornalive,multiplebirth,atterm,preterm,parity,contraceptivetype,contraceptivediscontinued,pregnancyplaned,lmpdat,lmpedd,lmpgestationage,lmpbasedon,usexamdate,usexamedd,usexamgestationage,usexambasedon,trasferdate,transferedd,transfergestionage,transferbasedon,pregnancycomments) VALUES($idP,'$pregnancyno','$lmpdate', '$lpmnormal', '$regular', '$interval', '$duration', '$menarche',  '$totalpreg', '$ectopicpr', '$abortions', '$bornalive', '$multiplebirth', '$atterm', '$preterm,' '$parity, $contraceptivet', '$contraceptived', '$pregnancyplan', '$lpmdat', '$lmpedd', '$lpmga', '$lpmbon, $usdate', '$usedd', '$usga', '$usbon', '$trdate', '$tredd', '$trga', '$trbon', '$prcomments')";
 

		return executeQuery($sql);

	}
 
	  

	public function showData($idPatient){

		 
		$sql = "SELECT p.*, u.idUser,u.user,u.password FROM patient p, users u WHERE p.idUser=u.idUser AND p.idPatient = $idPatient";

		echo $sql;

		return executeQueryRow($sql);

	}

	public function showListPatients(){
		
		$sql = "SELECT u.idUser,p.idPatient, p.firstname, p.lastname,p.birthdate,u.user,u.password,u.status FROM patient p INNER JOIN users u ON u.idUser = p.idUser"; 

		/*"SELECT * FROM patient p INNER JOIN user u ON p.idUser = u.idUser";*/ 	 

		return executeQuery($sql);
	}

	// Function to enable or disable patient
	public function disableenablePat($idUser,$opt){
		if ($opt == 0) {
			$sql = "UPDATE users SET status='0' WHERE idUser = '$idUser'";
		}else{
			$sql = "UPDATE users SET status='1' WHERE idUser = '$idUser'";
		}			
		return executeQuery($sql);
	}

	// select all the patients
	public function selectListPat(){
		
		$sql = "SELECT p.idPatient,p.firstname,p.lastname,p.idUser,u.idUser,u.status  FROM patient p, users u  WHERE  p.idUser = u.idUser and u.status='1'";
							
		return executeQuery($sql);
	}


}
?>