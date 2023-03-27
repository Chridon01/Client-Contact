
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP NEW CONTACT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <?php
$conNameErr = $surnameErr= $emailErr =  "";
$contactName = $contactSurname = $contactEmail =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["contactName"])) {
       $conNameErr = "Name is required";
     } else {
       $contactName = test_input($_POST["contactName"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z-' ]*$/",$contactName)) {
         $conNameErr = "Only letters and white space allowed";
       }
     }
     if (empty($_POST["contactSurname"])) {
          $surnameErr = "Surname is required";
        } else {
          $contactSurname = test_input($_POST["contactSurname"]);
          // check if surname only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$contactSurname)) {
            $surnameErr = "Only letters and white space allowed";
          }
        }
     
     if (empty($_POST["contactEmail"])) {
       $emailErr = "Email is required";
     } else {
       $contactEmail = test_input($_POST["contactEmail"]);
       // check if e-mail address is well-formed
       if (!filter_var($contactEmail,FILTER_VALIDATE_EMAIL)) {
         $emailErr = "Invalid email format";
       }
     }
       
     
   }
   
   function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
?>
     <form action="newcontact-check.php" method="post">
     	<h2>Create New Contact</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

           Name: <input type="text" name="contactName" value="<?php echo $contactName;?>">
          <span class="error">* <?php echo $conNameErr;?></span>
          <br><br>
          Surname: <input type="text" name="contactSurname" value="<?php echo $contactSurname;?>">
          <span class="error">* <?php echo $surnameErr;?></span>
          <br><br>
           E-mail: <input type="text" name="contactEmail" value="<?php echo $contactEmail;?>">
          <span class="error">* <?php echo $emailErr;?></span>
          <br><br>

     	<button type="submit">Sign Up</button>
          <a href="contact-table.php" class="ca">View Contacts</a><br>
          <a href="index.php" class="ca">View Clients</a><br>
          <a href="client-signup.php" class="ca">Create Client</a>
     </form>
</body>
</html>