<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="screen" href="../css/main.css">
  <meta name="viewport" content="width=device-width,inital-scale=1.0">

  <title><?php echo $vehcileTitle ?>  | PHP Motors, Inc.</title>
</head>

<body>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main><h1><?php  echo $vehcileTitle ; ?> </h1>
  </main>
  <?php if(isset($message)){
 echo $message; }
 ?>
 <?php if(isset($vehicleDisplay)){
 echo $vehicleDisplay;
} ?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>