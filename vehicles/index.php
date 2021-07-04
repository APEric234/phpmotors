<?php

$action = filter_input(INPUT_POST, 'action');

 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 $id = filter_input(INPUT_POST, 'id');
 if ($id == NULL){
  $id = filter_input(INPUT_GET, 'id');
 }
 $name = filter_input(INPUT_POST, 'name');
 if ($name == NULL){
  $name = filter_input(INPUT_GET, 'name');
 }
 require_once '../library/connections.php';
 require_once '../views/vehicles.php';
 require_once '../model/main-model.php';
 require_once '../model/uploads-model.php';
 require_once '../library/functions.php';
 $classifications = getClassifications();
 $nav = get_nav($classifications);

 switch ($action){
   case 'class':
    $classification_name = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    if ($classification_name == NULL){
     $classification_name = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
    }
    $vehicles=get_vehicles_by_name($classification_name);
    $vehicleDisplayShort="<div id=inv-display><table>";
    $vehicleDisplayShort=$vehicleDisplayShort."<TR>";

      $vehicleDisplayShort=$vehicleDisplayShort."<td>make </td>";
      
      $vehicleDisplayShort=$vehicleDisplayShort."<td>"."model".'</td>';
      
      $vehicleDisplayShort=$vehicleDisplayShort."<td>image</td>";
      
      $vehicleDisplayShort=$vehicleDisplayShort."<td></td>";
      $vehicleDisplayShort=$vehicleDisplayShort."</TR>";
    foreach($vehicles as $vehicle){
      $vehicleDisplayShort=$vehicleDisplayShort."<TR>";

      $vehicleDisplayShort=$vehicleDisplayShort."<td>".$vehicle['invMake'].'</td>';
      
      $vehicleDisplayShort=$vehicleDisplayShort."<td>".$vehicle['invModel'].'</td>';
      
      $vehicleDisplayShort=$vehicleDisplayShort."<td><img  src=\"".get_main_picture($vehicle['invId'])."\" alt=\"".$vehicle['invMake']." ".$vehicle['invModel']."\" width=\"50\" height=\"50\"></td>";
      $vehicleDisplayShort=$vehicleDisplayShort."<td><a href=\"/phpmotors/vehicles/index.php?action=viewCar&id=".$vehicle['invId']."\">More Details </a></td>";

      $vehicleDisplayShort=$vehicleDisplayShort."</TR>";
    }
    
    $vehicleDisplayShort=$vehicleDisplayShort."</table></div>";
    include '../views/classification.php';
    break;
  case 'viewCar':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id == NULL){
     $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    }
    $vehicle=get_vehicle($id);
    $vehcileTitle=$vehicle['invModel']." ".$vehicle['invMake'];
    $vehicleDisplay="<table>";
    $vehicleDisplay=$vehicleDisplay."<TR>";

    $vehicleDisplay=$vehicleDisplay."<td>Price </td>";
    $vehicleDisplay=$vehicleDisplay."<td>make </td>";
    
    $vehicleDisplay=$vehicleDisplay."<td>"."model".'</td>';
    
    $vehicleDisplay=$vehicleDisplay."<td>"."description".'</td>';
    
    $vehicleDisplay=$vehicleDisplay."</TR>";
    $vehicleDisplay=$vehicleDisplay."<TR>";
    
    $vehicleDisplay=$vehicleDisplay."<td>$".number_format($vehicle['invPrice']).'</td>';
    $vehicleDisplay=$vehicleDisplay."<td>".$vehicle['invMake'].'</td>';
    
    $vehicleDisplay=$vehicleDisplay."<td>".$vehicle['invModel'].'</td>';
    
    $vehicleDisplay=$vehicleDisplay."<td>".$vehicle['invDescription'].'</td>';
    
   
    $vehicleDisplay=$vehicleDisplay."</TR>"; 
    $vehicleDisplay=$vehicleDisplay."</table><div id=\"inv-display\"><img src=".get_main_picture($vehicle['invId'])." alt=\"".$vehicle['invMake']." ".$vehicle['invModel']."\"></div>";
    $alts=get_alt_pictures($vehicle['invId']);
    $vehicleDisplay=$vehicleDisplay."<div id=\"inv-display-alt\">";
    foreach($alts as $alt){
      $vehicleDisplay=$vehicleDisplay."<img src=".$alt["imgPath"]." alt=\"".$vehicle['invMake']." ".$vehicle['invModel']."\">";


    }
    $vehicleDisplay=$vehicleDisplay."</div>";
    
      include '../views/vehicle-details.php';
    
    break;
  case 'addClassification':
    $required = array('color', 'desc', 'classification', 'make', 'model', 'price','stock');
    $error = false;
    $errorType = "";
    $error=verify_array($required);

    if ($error) {
      $_POST["error"] =$error;

    } else {
      $_POST["error"] ="";
        
      addClasification($_POST["subject"]);

    }
    include '../views/new_classification.php';
    
   break;
  case "addCar":
    include '../views/new_car.php';
    break;
  case "carAdded":
    $required = array('color', 'desc', 'classification', 'make', 'model', 'price','stock');
    $error = false;
    $errorType = "";
    $error=verify_array($required);
    if ($error) {
      $_POST["error"] =$error;
      include '../views/new_car.php';
    } else {
      $_POST["error"] ="";

      addCar(trim($_POST["color"]),trim($_POST["desc"]),trim($_POST["classification"]),trim($_POST["make"]),trim($_POST["model"]),trim($_POST["price"]),trim($_POST["stock"]));
      echo '<script>alert("Car succesfully aded")</script>';
      include '../views/new_car.php';
    }
    break;
  default:
  include '../views/new_classification.php';
 }


  ?>

