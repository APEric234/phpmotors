<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="screen" href="../css/main.css">
  <meta name="viewport" content="width=device-width,inital-scale=1.0">

  <title><?php echo $classification_name ?> vehicles | PHP Motors, Inc.</title>
</head>

<body>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main><h1><?php  echo $classification_name ; ?> vehicles</h1>
  </main>
  <?php if(isset($message)){
 echo $message; }
 ?>
 <?php if(isset($vehicleDisplayShort)){
 echo $vehicleDisplayShort;
} ?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>