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
$nameErr = $codeErr =  "";
$clientName = $clientCode =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["clientName"])) {
    $nameErr = "Name is required";
  } else {
    $clientName = test_input($_POST["clientName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$clientName)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["clientCode"])) {
    $codeErr = "Code is required";
  } else {
    $clientCode = test_input($_POST["clientCode"]);
    // check if code only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$clientCode)) {
      $codeErr = "Only 3 letters allowed";
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


     <form action="client-signup-check.php" method="post">
     	<h2>Create New Client</h2>
          <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <p><span class="error">* required field</span></p>
          Client Code(chars only): <input type="text"  name="clientCode" maxlength="3" minlength="3" value="<?php echo $clientCode;?>">
          <span class="error">* <?php echo $codeErr;?></span>
          <br><br>
          Client Name: <input type="text" name="clientName" value="<?php echo $clientName;?>">
          <span class="error">* <?php echo $nameErr;?></span>
  <br>
  

     	



     	<button type="submit">Sign Up</button>
          <a href="newcontact.php" class="ca">Create new Contact</a><br>
          <a href="contact-table.php" class="ca">View Contacts</a><br>
          <a href="index.php" class="ca">View Clients</a>
     </form>
</body>
</html>