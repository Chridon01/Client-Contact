<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html>
<head>

	<title>All clients</title>
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
     	<h2>Client Table</h2>
		
		 
     		<table >
				<tr>
				<th>Client Code</th>
				<th>Client Name</th>
				</tr>
				<?php
				$conn= mysqli_connect("localhost","root","","bcity_db");
				$sql5 = "SELECT * FROM clients_tbl ORDER BY clientName ASC";
				$result = mysqli_query($conn, $sql5);
			
				$row = mysqli_num_rows($result);
		
				if ($result ->num_rows > 0 ){

				while($row=$result-> fetch_assoc()){
						
					echo "<tr ><td>" . $row["clientCode"],$row["clientID"]. "</td><td>". $row["clientName"]."</td></tr>";

				}
				}
				else {

				echo "No client(s) found ";
				}
				$conn ->close();
		
		?>
			
		</table>

     	<a href="client-signup.php" class="ca">Create new Client</a>
		  	<a href="newcontact.php" class="ca">Create new Contact</a>
		  	<a href="contact-table.php" class="ca">View contacts</a>
			
     </form>
</body>
</html>