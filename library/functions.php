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
  function get_nav($classifications){
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
     $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
  }
?>
