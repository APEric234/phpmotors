<?php
 require_once '../library/connections.php';
 require_once 'vehicles.php';
 require_once '../model/main-model.php';

 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/main.css">
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Home Page</title>
</head>

<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <form name="form" action="/phpmotors/vehicles/index.php?action=carAdded" method="post">
  <label for="make">Car make:</label>
  <input type="text" name="make" id="make" value="Car make">
  <br>
  <label for="model">Car model:</label>
  <input type="text" name="model" id="model" value="Car model">
  <br>
  <label for="desc">Car description:</label>
  <input type="text" name="desc" id="desc" value="Car description">
  <br>
  <label for="color">Car color:</label>
  <input type="text" name="color" id="color" value="Car Color">
  <br>
  <label for="price">Price</label>
  <input type="number" name="price" id="price" value=0>
  
  <br>
  <label for="stock">Stock</label>
  <input type="number" name="stock" id="stock" value=0>
  <select id ="classification" name="classification">
  <?php
  $class=getClassificationsWithId();
  $opttions="";
  Foreach($class as $clas){
  $opttions.="<option value=".$clas["classificationId"].">".$clas["classificationName"]."</option>";
  }
  $opttions.="</select>";
  echo $opttions;
  ?>
  

  </select>

  <input type="submit" value="add car">
  </form>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>