<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP NEW CONTACT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="newcontact-check.php" method="post">
     	<h2>Create New Contact</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['contactName'])) { ?>
               <input type="text" 
                      name="contactName" 
                      placeholder="Name"
                      value="<?php echo $_GET['contactName']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="contactName" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Surname</label>
          <?php if (isset($_GET['contactSurname'])) { ?>
               <input type="text" 
                      name="contactSurname" 
                      placeholder="Surname"
                      value="<?php echo $_GET['contactSurname']; ?>"><br>
                      
          <?php }else{ ?>
               <input type="text" 
                      name="contactSurname" 
                      placeholder="Surname"><br>

               
                      
          <?php }?>
          
          <label>Email Address</label>
          <?php if (isset($_GET['contactEmail'])) { ?>
               <input type="text" 
                      name="contactEmail" 
                      placeholder="Email Address"
                      value="<?php echo $_GET['contactEmail']; ?>"><br>
                      
          <?php }else{ ?>
               <input type="text" 
                      name="contactEmail" 
                      placeholder="Email Address"><br>

               
                      
          <?php }?>


     	<button type="submit">Sign Up</button>
          <a href="contact-table.php" class="ca">View Contacts</a>
          <a href="index.php" class="ca">View Clients</a>
          <a href="client-signup.php" class="ca">Create new Client</a>
     </form>
</body>
</html>