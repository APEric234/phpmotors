<!DOCTYPE html>
<html lang='en'>
<head>
  
  <link rel='stylesheet' media='screen' href='../css/input.css'>
  
  <meta name='viewport' content='width=device-width,inital-scale=1.0'>
  <title>PHP Motors | Login</title>
</head>

<body>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main>
  <h1> update name</h1>
  <form action='/phpmotors/accounts/index.php?action=nameUpdate' method='post'>
  
  <label for='firstName'>New First Name: </label>
  <label for='lastName'>New Last Name: </label>
  
  <label for='clientEmail'>New email: </label>
<?php 

  
  echo "<input type='text' id='firstName' name='firstName' value='{$_SESSION["first_name"]}' required><br>";
 
  echo "<input type='text' id='lastName' name='lastName' value='{$_SESSION["last_name"]}'><br>";
  
  echo "<input type='text' id='clientEmail' name='clientEmail' value='{$_SESSION["email"]}'><br>";
  
  ?>
  <input type='submit' value="update user information">
    </form>
  <h1> update password</h1>
  <form action='/phpmotors/accounts/index.php?action=passUpdate' method='post'>
  <label for='clientPassword'>Original Password: </label>
  
  <input type='password' id='clientPassword' name='clientPassword' required><br>
  <label for='newPassword'>New Password (): </label>
  <input type='password' id='newPassword' name='newPassword' min-length="8" oninvalid="this.setCustomValidity('must have 1 number one uppper case character and be at least 8 digits')" oninput="this.setCustomValidity('')" pattern="^(?=.*?[A-Z])(?=.*?\d).*\"  required><br>
  <input type='submit' value="update password">
  </form>
  </main>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>