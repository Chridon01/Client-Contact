<!DOCTYPE html>
<html>
<head>
	<title>Create new Client</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <style>
.error {color: #FF0000;}
</style>
</head>
<body>
 <?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;


}
?>


     <form action="client-signup-check.php" method="post">
     	<h2>Create New Client</h2>
          


          
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Client Code(First 3 characters)</label>
          <?php if (isset($_GET['clientCode'])) { ?>
               <input type="text" 
                      name="clientCode" 
                      placeholder="Enter new Client Code here"
                      value="<?php echo $_GET['clientCode']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="clientCode" 
                      placeholder="Enter new Client Code here"><br>
          <?php }?>
          
          <label>Client Name</label>
          <?php if (isset($_GET['clientName'])) { ?>
               <input type="text" 
                      name="clientName" 
                      placeholder="Enter new Client Name here"
                      value="<?php echo $_GET['clientName']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="clientName" 
                      placeholder="Enter new Client Name here"><br>
          <?php }?>



     	<button type="submit">Sign Up</button>
          <a href="newcontact.php" class="ca">Create new Contact</a>
          <a href="contact-table.php" class="ca">View Contacts</a>
          <a href="index.php" class="ca">View Clients</a>
     </form>
</body>
</html>