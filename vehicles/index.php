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
 require_once 'vehicles.php';
 require_once '../model/main-model.php';
 
 require_once '../library/functions.php';
 $classifications = getClassifications();

 switch ($action){
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
    include 'new_classification.php';
    
   break;
  case "addCar":
    include 'new_car.php';
    break;
  case "carAdded":
    $required = array('color', 'desc', 'classification', 'make', 'model', 'price','stock');
    $error = false;
    $errorType = "";
    $error=verify_array($required);
    if ($error) {
      $_POST["error"] =$error;
      include 'new_car.php';
    } else {
      $_POST["error"] ="";

      addCar(trim($_POST["color"]),trim($_POST["desc"]),trim($_POST["classification"]),trim($_POST["make"]),trim($_POST["model"]),trim($_POST["price"]),trim($_POST["stock"]));
      echo '<script>alert("Car succesfully aded")</script>';
      include 'new_car.php';
    }
    break;
  default:
  include 'new_classification.php';
 }


  ?>

