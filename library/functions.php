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
  $result = $stmt->fetchAll();
  #return true on exists false if not
  if(count($result)>0){
    return True;
  }
  return false;
}
function add_user($email,$first,$last,$password){
  $db=phpMotorsConnect();
  $sql = "SELECT id from users where username='{$email}' limit 1";
  if(!check_if_exists($sql)){
    $sql = "INSERT INTO users (first_name,last_name,username,password) values ('{$first}','{$last}','{$email}','{$password}')";
    $stmt = $db->prepare($sql);
    $stmt->execute(); 

  }
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
    $navList .= "<li><a href='index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
     $navList .= "<li><a href='index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
  }
?>
