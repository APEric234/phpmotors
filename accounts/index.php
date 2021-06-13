<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/library/functions.php";

$action = filter_input(INPUT_POST, 'action');

 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 $user_name = filter_input(INPUT_POST, 'clientEmail');

 if ($user_name == NULL){
  $user_name = filter_input(INPUT_GET, 'clientEmail');
 }

 $passw = filter_input(INPUT_POST, 'clientPassword');

 if ($passw == NULL){
  $passw = filter_input(INPUT_GET, 'clientPassword');
 }
 $first = filter_input(INPUT_POST, 'firstName');

 if ( $first  == NULL){
  $first  = filter_input(INPUT_GET, 'firstName');
 }
 $last  = filter_input(INPUT_POST, 'lastName');

 if ( $last == NULL){
  $last  = filter_input(INPUT_GET, 'lastName');
 }
 require_once '../library/connections.php';

 require_once '../model/main-model.php';
 $classifications = getClassifications();
 $navList = '<ul>';
 $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
 foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
 }
 $navList .= '</ul>';
 switch ($action){
  case "Logout":
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
    session_start();
    session_destroy();
    session_commit();
  case 'login':
    include 'login.php';
   break;
  case "details":
    include 'admin.php';
  
    break;
    
  case "register":
    include 'register.php';
    break;
  case "increaseLevel":
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
    session_start();
    elevate_user($_SESSION["email"]);
    session_commit();
    
    include 'admin.php';
    break;
  case "makenew":
    #create new user
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
    session_start();
    add_user($user_name,$first,$last,$passw);
    session_commit();
    #login new user
    
    $sql = "SELECT id FROM users where username=lower('{$user_name}') and password='{$passw}'"; 
    
    if(check_if_exists($sql)){
      session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
      session_start();
      $res=get_name($user_name);
      $_SESSION["first_name"]=$res['first_name'];
      $_SESSION["last_name"]=$res['last_name'];
      
      $_SESSION["email"]=$res['username'];
      session_commit();
    };
    include 'admin.php';
      break;
  case "checkLogin":
    
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
    session_start();
    $sql = "SELECT id FROM users where username=lower('{$user_name}') and password='{$passw}'"; 
    
    if(check_if_exists($sql)){
      $res=get_name($user_name);
      $_SESSION["first_name"]=$res['first_name'];
      $_SESSION["last_name"]=$res['last_name'];
      
      $_SESSION["email"]=$res['username'];
      session_commit();
    };
    include 'admin.php';
    $_SESSION["first_name"]=$res['first_name'];
      $_SESSION["last_name"]=$res['last_name'];
    break;
  default:
  include '../views/500.php';
   break;
 }


  ?>