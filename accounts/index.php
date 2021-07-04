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
 $passw= hash("md5",$passw);
 $passn = filter_input(INPUT_POST, 'newPassword'); 
 if ($passn == NULL){
  $passn = filter_input(INPUT_GET, 'newPassword');
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
$nav = get_nav($classifications);
session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
    session_start();
 switch ($action){
  case "Logout":
    session_destroy();
    session_commit();
  case 'login':
    include '../views/login.php';
   break;
  case "details":
    
    include '../views/admin.php';
  
    break;
    case "passUpdate":
      $sql = "SELECT id FROM users where username=lower('{$user_name}') and password='{$passw}'"; 
    
    if(check_if_exists($sql)){
      update_password($passn);
    }
      include '../views/admin.php';
      break;
    case "nameUpdate":
      update_user($user_name,$first,$last);
      include '../views/admin.php';
      break;
    
  case "updateUser":
    include '../views/client-update.php';
    break;
  case "register":
    include '../views/register.php';
    break;
  case "increaseLevel":
    elevate_user($_SESSION["email"]);
    session_commit();
    
    include '../views/admin.php';
    break;
  case "makenew":
    
    #create new user
    add_user($user_name,$first,$last,$passw);
    session_commit();
    #login new user
    $message="";
    $sql = "SELECT id FROM users where username=lower('{$user_name}') and password='{$passw}'"; 
    
    if(check_if_exists($sql)){
      session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
      session_start();
      $res=get_name($user_name);
      $_SESSION["first_name"]=$res['first_name'];
      $_SESSION["last_name"]=$res['last_name'];
      $message="";
      $_SESSION["email"]=$res['username'];
      session_commit();
      include '../views/admin.php';
      $_SESSION["first_name"]=$res['first_name'];
      $_SESSION["last_name"]=$res['last_name'];
      session_commit();
      
    }else{
      $message="the email already exists try again";
      include '../views/register.php';
    };
    
    break;
  case "checkLogin":
    
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
  #include '../viewss/500.php';
   break;
 }


  ?>