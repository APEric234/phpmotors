<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="screen" href="../css/input.css">
  
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Register</title>
</head>

<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main>
  <h1> Register</h1>
  <form>
  <label for="clientEmail">Email: </label>
  
  <input type="text" id="clientEmail" name="clientEmail"><br>
  <label for="clientPassword">Password: </label>
  <input type="password" id="clientPassword" name="clientPassword"><br>
  <label for="firstName">First Name: </label>
  <input type="text" id="firstName" name="firstName"><br>
  <label for="lastName">Last Name: </label>
  <input type="text" id="lastName" name="lastName"><br>
  
  <input type="submit" value="register">
  </form>
  </main>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>