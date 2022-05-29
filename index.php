
<?php

session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');

session_start();
$action = filter_input(INPUT_POST, 'action');

 if ($action == NULL){
  
  $action = filter_input(INPUT_GET, 'action');
 }
 
 require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/functions.php';
 require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
 require_once $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/model/main-model.php";
 
 $classifications = getClassifications();
 $nav = get_nav($classifications);
 switch ($action){
  case 'template':
    include 'views/template.php';
   break;
  case 'image':
    $count=1;
    $temp_message="";
    $class = getClassificationsWithId();
    $prodSelect="<select name=\"invItem\" id=\"invItem\">";
    foreach($class as $classy){
     
      $vehic=get_vehicles($classy["classificationId"]); 

      

     
      foreach($vehic as $vehicle){
        $count++;
        
            $html="<option value=\"".$vehicle["invId"]."\">".$vehicle["invMake"]."</option>";
    
            $prodSelect=$prodSelect.$html;

        }
     
     
        
      }
    
    
    $prodSelect=$prodSelect."hugabuga";
    
    $prodSelect=$prodSelect."</select>";
    include 'views/image-admin.php';
    break;
  default:
   include 'views/home.php';
 }

  ?>