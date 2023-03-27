<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html>
<head>

	<title>Contacts Table</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 6px;
}


	</style>
</head>
<body> 
	
     <form action="client-table.php" method="post">
     	<h2>Contacts Table</h2>
		
     	<table>
			<tr>
				
				<th>Surname</th>
        		<th>Name</th>
        		<th>Email Address</th>
			</tr>
			<?php
			$conn= mysqli_connect("localhost","root","","bcity_db");
			$sql5 = "SELECT * FROM contacts_tbl ORDER BY contactSurname ASC";
			$result = mysqli_query($conn, $sql5);
			
			$row = mysqli_num_rows($result);
		
			if ($result ->num_rows > 0 ){

				while($row=$result-> fetch_assoc()){
						
					echo "<tr ><td>" . $row["contactSurname"]. "</td><td>". $row["contactName"]."</td><td>".$row["contactEmail"]."</td></tr>";

				}
			}
			else {
				
				echo "No contacts(s) found ";
				
			}
			$conn ->close();
		
			
			?>
			
		</table>
     	
          <a href="client-signup.php" class="ca">Create new Client</a><br>
		  <a href="newcontact.php" class="ca">Create new Contact</a><br>
		  <a href="index.php" class="ca">View Clients </a>
     </form>
</body>
</html>