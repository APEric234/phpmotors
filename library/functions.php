<?php
function verify_array($required){
  $error = false;
  $errorType = "";
  foreach($required as $field) {
    if (empty($_POST[$field])) {
      
      $error = true;
      $errorType=$field;
    }
    else{
      if(trim($_POST[$field])==""){
        $error = true;
        $errorType=$field;
      }
    }
  }

  if ($error) {
    return "At least one field is wrong. First example is ".$errorType;
  } else {
    return "";
  }
  
}
#function to run sql statement and see if there is a result
function check_if_exists($sql){
  $db=phpMotorsConnect();
  $stmt = $db->prepare($sql);
  $stmt->execute(); 
  $result = $stmt->fetch();
  #return true on exists false if not
  if($result){
    return True;
  }
  return false;
}
function add_user($email,$first,$last,$password){
  $db=phpMotorsConnect();
  $sql = "SELECT id from users where username='{$email}' limit 1";
  if(!check_if_exists($sql)){
    $sql = "INSERT INTO users (first_name,last_name,username,password,privlege) values ('{$first}','{$last}','{$email}','{$password}',1)";
    $stmt = $db->prepare($sql);
    $stmt->execute(); 

  }
}

function update_password($password){
  if(session_status() != PHP_SESSION_ACTIVE){
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
      session_start();
    }
  $original_pass=$password;
  $db=phpMotorsConnect();
  if(preg_match("^(?=.*?[A-Z])(?=.*?\d).*",$password) && strlen($password)>=8){
    $password=hash('md5',$password);

    $sql = "UPDATE `users` set passw='{$password}' where `username`='{$_SESSION["email"]}'";
    $stmt = $db->prepare($sql);
    $stmt->execute(); 
    $_SESSION["message"] ="<p> message succesfully updated{$original_pass} to {$password}</p>";
    
    session_commit();
    
  }else
  {
    
    $_SESSION["message"] ="<p> invalid password try again</p>";
    
    session_commit();
  }
  
}
function update_user($email,$first,$last){
  if(session_status() != PHP_SESSION_ACTIVE){
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
      session_start();
    }
  $db=phpMotorsConnect();
  
  $sql = "SELECT id from users where username='{$email}' limit 1";
  if(!check_if_exists($sql) || $_SESSION["email"]==$email){
    $sql = "UPDATE `users` set username='{$email}',
     first_name='{$first}',
     last_name='{$last}' where `username`='{$_SESSION["email"]}'";
    $stmt = $db->prepare($sql);
    $stmt->execute(); 
    
    $_SESSION["email"] ="$email";
    $_SESSION["first_name"] =$first;
    $_SESSION["last_name"] =$last;
    $_SESSION["message"] ="<p> succesfully updated</p>";
  }else{
    $_SESSION["message"] ="<p> email already exists unable to update</p>";
  }
  session_commit();
}
function elevate_user($user_name){
  $sql = "update users set privlege=2 where username='{$user_name}'";
  $db=phpMotorsConnect();
  $stmt = $db->prepare($sql);
  $stmt->execute(); 
  $result = $stmt->fetch();
  return $result;
}
function get_name($user_name){
  $sql = "SELECT first_name,last_name,username from users where username='{$user_name}' limit 1";
  $db=phpMotorsConnect();
  $stmt = $db->prepare($sql);
  $stmt->execute(); 
  $result = $stmt->fetch();
  return $result;
}
  function get_nav($classifications){
    $navList = '<ul>';
    $navList .= "<li><a href='../index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
     $navList .= "<li><a href='index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
  }
?>
