<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="screen" href="../css/input.css">
  
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Register</title>
</head>

<body>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main>
  <h1> Register</h1>
  <form action="/phpmotors/accounts/index.php?action=makenew" method="post">
  <label for="clientEmail">Email: </label>
  
  <input type="text" id="clientEmail" name="clientEmail"><br>
  <label for="clientPassword">Password: </label>
  <input type='password' id='clientPassword' name='clientPassword' min-length="8"  oninvalid="this.setCustomValidity('must have 1 number one uppper case character and be at least 8 digits')" oninput="this.setCustomValidity('')" pattern="^(?=.*?[A-Z])(?=.*?\d).*" required><br>
  <label for="firstName">First Name: </label>
  <input type="text" id="firstName" name="firstName"><br>
  <label for="lastName">Last Name: </label>
  <input type="text" id="lastName" name="lastName"><br>
  <input type="int" id="level" value=1 hidden>
  <input type="submit">
  </form>
  </main>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>