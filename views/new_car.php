<?php
 require_once '../library/connections.php';
 require_once 'vehicles.php';
 require_once '../model/main-model.php';

 
 ?><!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/main.css">
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Add car</title>
</head>

<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; 

if (!empty($_POST["error"])) {
    echo  "<p>".$_POST["error"]."</p>";
  }
?>
  <form name="form" action="/phpmotors/vehicles/index.php?action=carAdded" method="post">
  <label for="make">Car make:</label>
  <input type="text" name="make" id="make" value="<?php if(isset($_POST['make'])){
    echo$_POST['make']; }?>" required>
  <br>
  <label for="model">Car model:</label>
  <input type="text" name="model" id="model" value="<?php if(isset($_POST['model'])){
    echo$_POST['model']; }?>" required>
  <br>
  <label for="desc">Car description:</label>
  <input type="text" name="desc" id="desc" value="<?php if(isset($_POST['desc'])){
    echo$_POST['desc']; }?>" required>
  <br>
  <label for="color">Car color:</label>
  <input type="text" name="color" id="color" value="<?php if(isset($_POST['color'])){
    echo$_POST['color']; }?>" required>
  <br>
  <label for="price">Price</label>
  <input type="number" name="price" id="price" value="<?php if(isset($_POST['price'])){
    echo$_POST['price'] ;}?>" required>
  
  <br>
  <label for="stock">Stock</label>
  <input type="number" name="stock" id="stock" value="<?php if(isset($_POST['stock'])){
    echo$_POST['stock'];} ?>" required>
  <select id ="classification" name="classification" required>
  <?php
  $class=getClassificationsWithId();
  $opttions="<option value=\"\" label=\"Pick a Type\"></option>";
  Foreach($class as $clas){
    $opttions.="<option value=".$clas["classificationId"];
     if(isset($_POST['classification'])){
       if($clas["classificationId"] ==$_POST['classification']){

        $opttions.=" selected>";
       }else{
        $opttions.=">";
       }
    }else{
      
      $opttions.=">";
    }
    $opttions.=$clas["classificationName"]."</option>";
  }
  echo $opttions;
  ?>
  

  </select>

  <input type="submit" value="add car">
  </form>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>