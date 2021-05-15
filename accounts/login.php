<!DOCTYPE html>
<html lang="en">
<head>
  
  <link rel="stylesheet" media="screen" href="../css/input.css">
  
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Template</title>
</head>

<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main>
  <h1> Login</h1>
  <form>
  <label for="clientEmail">Email: </label>
  
  <input type="text" id="clientEmail" name="clientEmail"><br>
  <label for="clientPassword">Password: </label>
  <input type="password" id="clientPassword" name="clientPassword"><br>
  <input type="submit" value="Login">
  
  <a id="register" href="register.php">New? Register Here</a>
  </form>
  </main>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>