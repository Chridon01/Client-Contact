<?php
session_start(); 
include "bcity_db.php";

if (isset($_POST['clientCode']) 
 && isset($_POST['clientName'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$clientCode = strtoupper($_POST['clientCode']);
	$clientName = validate($_POST['clientName']);

	


	$user_data = 'clientName='. $clientName. '&clientCode='. $clientCode;



	    $sql = "SELECT * FROM clients_tbl WHERE clientName='$clientName' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: client-signup.php?error=The client is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO clients_tbl(clientCode, clientName) VALUES('$clientCode', '$clientName')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: client-signup.php?success=Client Added");
	         exit();
           }else {
	           	header("Location: client-signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	
	
}
else{
	header("Location: client-signup-check.php");
	exit();
}
?>