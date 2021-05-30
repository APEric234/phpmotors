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
 $classifications = getClassifications();

 switch ($action){
  case 'addClassification':
    addClasification($_POST["subject"]);
    include 'new_classification.php';
   break;
  case "addCar":
    include 'new_car.php';
    break;
  case "carAdded":
    addCar($_POST["color"],$_POST["desc"],$_POST["classification"],$_POST["make"],$_POST["model"],$_POST["price"],$_POST["stock"]);
    echo '<script>alert("Car succesfully aded")</script>';
  default:
  include 'new_classification.php';
 }


  ?>

