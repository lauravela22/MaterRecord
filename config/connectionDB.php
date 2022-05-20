<?php 
require_once "globalvar.php";

$conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query( $conn, 'SET NAMES "'.DB_ENCODE.'"');

//Show if there is a error trying to connect the database
if (mysqli_connect_errno())
{
	printf("Something went wrong with the database: %s\n",mysqli_connect_error());
	exit();
}

if (!function_exists('executeQuery'))
{
	function executeQuery($sql)
	{
		global $conn;
   		$query = $conn->query($sql);   		
		return $query;
		
	}

	function executeQueryRow($sql)
	{
		global $conn;
		$query = $conn->query($sql);		
		$row = $query->fetch_assoc();
		return $row;
	}

	function executeQuery_returnID($sql)
	{
		global $conn;
		$query = $conn->query($sql);		
		return $conn->insert_id;			
	}

	function cleanString($str)
	{
		global $conn;
		$str = mysqli_real_escape_string($conn,trim($str));
		return htmlspecialchars($str);
	}

	function executeQueryMultipleTab($sql)
	{
		global $conn;

		$query = $conn->query($sql);		
		$row = $query->fetch_assoc();
			 
		$idUser=$row[ 'idUser'];
		 
		$nidUser=$idUser+1;
		 
		return $nidUser;
	} 

	function executeQueryLastId($sql)
	{
		global $conn;
		$query = $conn->query($sql);
		$lastId = $query->insert_id;
		return $lastId;
	}
}
?>