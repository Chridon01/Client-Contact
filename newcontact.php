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
          <?php if (isset($_GET['cname'])) { ?>
               <input type="text" 
                      name="cname" 
                      placeholder="Name"
                      value="<?php echo $_GET['cname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="cname" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Surname</label>
          <?php if (isset($_GET['csurname'])) { ?>
               <input type="text" 
                      name="csurname" 
                      placeholder="Surname"
                      value="<?php echo $_GET['csurname']; ?>"><br>
                      
          <?php }else{ ?>
               <input type="text" 
                      name="csurname" 
                      placeholder="Surname"><br>

               
                      
          <?php }?>
          
          <label>Email Address</label>
          <?php if (isset($_GET['cemail'])) { ?>
               <input type="text" 
                      name="cemail" 
                      placeholder="Email Address"
                      value="<?php echo $_GET['cemail']; ?>"><br>
                      
          <?php }else{ ?>
               <input type="text" 
                      name="cemail" 
                      placeholder="Email Address"><br>

               
                      
          <?php }?>


     	<button type="submit">Sign Up</button>
          <a href="contact-table.php" class="ca">View Contacts</a>
          <a href="index.php" class="ca">View Clients</a>
          <a href="client-signup.php" class="ca">Create new Client</a>
     </form>
</body>
</html>