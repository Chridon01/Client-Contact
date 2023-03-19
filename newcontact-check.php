<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['cname']) 
 && isset($_POST['csurname'])&& isset($_POST['cemail'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$cname = validate($_POST['cname']);
	$csurname = validate($_POST['csurname']);
	$cemail = validate($_POST['cemail']);

	


	$user_data = 'cname='. $cname. '&csurname='. $csurname;


	
	

	    $sql = "SELECT * FROM contacts WHERE cname='$cname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: newcontact.php?error=The contact is taken try another&$user_data");
	        exit();
		}else {
           $sql4 = "INSERT INTO contacts(cname, csurname,cemail) VALUES('$cname', '$csurname','$cemail')";
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