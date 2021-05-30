<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/main.css">
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Home Page</title>
</head>

<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <form name="form" action="/phpmotors/vehicles/index.php?action=addClassification" method="post">
  <input type="text" name="subject" id="subject" value="classification">
  <label for="subject">classification</label>
  <input type="submit" value="add classification">
  </form>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>
  <a href="/phpmotors/vehicles/index.php?action=addCar">Want to add a car?</a>
</html>