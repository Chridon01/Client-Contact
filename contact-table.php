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
  border: 1px solid black;
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
			$conn= mysqli_connect("localhost","root","","login_db");
			$sql5 = "SELECT * FROM contacts ORDER BY csurname ASC";
			$result = mysqli_query($conn, $sql5);
			
			$row = mysqli_num_rows($result);
		
			if ($result ->num_rows > 0 ){

				while($row=$result-> fetch_assoc()){
						
					echo "<tr ><td>" . $row["csurname"]. "</td><td>". $row["cname"]."</td><td>".$row["cemail"]."</td></tr>";

				}
			}
			else {

				echo "No contacts(s) found ";
			}
			$conn ->close();
		
			
			?>
			
		</table>
     	
          <a href="client-signup.php" class="ca">Create new Client</a>
		  <a href="newcontact.php" class="ca">Create new Contact</a>
		  <a href="index.php" class="ca">View Client list</a>
     </form>
</body>
</html>