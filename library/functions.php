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
  
?>
