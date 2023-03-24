<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['contactName']) 
 && isset($_POST['contactSurname'])&& isset($_POST['contactEmail'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$contactName = validate($_POST['contactName']);
	$contactSurname = validate($_POST['contactSurname']);
	$contactEmail = validate($_POST['contactEmail']);

	


	$user_data = 'contactName='. $contactName. '&contactSurname='. $contactSurname;


	
	

	    $sql = "SELECT * FROM contacts_tbl WHERE contactName='$contactName' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: newcontact.php?error=The contact is taken try another&$user_data");
	        exit();
		}else {
           $sql4 = "INSERT INTO contacts_tbl(contactName, contactSurname,contactEmail) VALUES('$contactName', '$contactSurname','$contactEmail')";
           $result3 = mysqli_query($conn, $sql4);
           if ($result3) {
           	 header("Location: newcontact.php?success=Contact Added");
	         exit();
           }else {
	           	header("Location: newcontact.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	
	
}
else{
	header("Location: newcontact-check.php");
	exit();
}