<?php
function get_alt_pictures($id){
  $db = phpmotorsConnect();
  $sql = 'select imgPath from images join inventory using(invId) WHERE invId = :imgId and imgPrimary!=1';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':imgId', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetchAll();
  $stmt->closeCursor();
  return $result;
}
function get_main_picture($id){
  $db = phpmotorsConnect();
  $sql = 'select imgPath from images join inventory using(invId) WHERE invId = :imgId and imgPrimary=1';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':imgId', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch();
  $stmt->closeCursor();
  return $result["imgPath"];
}
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

function addClasification($s){
  // Create a connection object from the phpmotors connection function
  $db = phpmotorsConnect(); 
  // The SQL statement to be used with the database 
  $sql = 'INSERT INTO carclassification (classificationName) values(\''.$s.'\');'; 
  // The next line creates the prepared statement using the phpmotors connection      
  $stmt = $db->prepare($sql);
  // The next line runs the prepared statement 
  $stmt->execute(); 
  // The next line gets the data from the database and 
  // stores it as an array in the $classifications variable 
  // The next line closes the interaction with the database 
  $stmt->closeCursor(); 
  // The next line sends the array of data back to where the function 
  // was called (this should be the controller) 
 }

 function addCar($color,$description,$classId,$invMake,$invModel,$invPrice,$invStock){
  // Create a connection object from the phpmotors connection function
  $db = phpmotorsConnect(); 
  // The SQL statement to be used with the database 
  $sql = 'INSERT INTO inventory (invColor,invDescription,classificationId,invMake,invModel,invPrice,invStock) values(\''.$color.'\',\''.$description.'\','.$classId.',\''.$invMake.'\',\''.$invModel.'\','.$invPrice.','.$invStock.');'; 
  // The next line creates the prepared statement using the phpmotors connection      
  $stmt = $db->prepare($sql);
  // The next line runs the prepared statement 
  $stmt->execute(); 
  // The next line gets the data from the database and 
  // stores it as an array in the $classiffications variable 
  // The next line closes the interaction with the database 
  $stmt->closeCursor(); 
  // The next line sends the array of data back to where the function 
  // was called (this should be the controller) 
 }

function getClassificationsWithId(){
  // Create a connection object from the phpmotors connection function
  $db = phpmotorsConnect(); 
  // The SQL statement to be used with the database 
  $sql = 'SELECT classificationId,classificationName FROM carclassification ORDER BY classificationName ASC'; 
  // The next line creates the prepared statement using the phpmotors connection      
  $stmt = $db->prepare($sql);
  // The next line runs the prepared statement 
  $stmt->execute(); 
  // The next line gets the data from the database and 
  // stores it as an array in the $classifications variable 
  $classifications = $stmt->fetchAll(); 
  // The next line closes the interaction with the database 
  $stmt->closeCursor(); 
  // The next line sends the array of data back to where the function 
  // was called (this should be the controller) 
  return $classifications;
 }// Adds "-tn" designation to file name
 function buildVehiclesSelect($vehicles) {
  $prodList = '<select name="invId" id="invId">';
  $prodList .= "<option>Choose a Vehicle</option>";
  foreach ($vehicles as $vehicle) {
   $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
  }
  $prodList .= '</select>';
  return $prodList;
 }
 function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {
     
  // Get image type
  $image_info = getimagesize($old_image_path);
  $image_type = $image_info[2];
 
  // Set up the function names
  switch ($image_type) {
  case IMAGETYPE_JPEG:
   $image_from_file = 'imagecreatefromjpeg';
   $image_to_file = 'imagejpeg';
  break;
  case IMAGETYPE_GIF:
   $image_from_file = 'imagecreatefromgif';
   $image_to_file = 'imagegif';
  break;
  case IMAGETYPE_PNG:
   $image_from_file = 'imagecreatefrompng';
   $image_to_file = 'imagepng';
  break;
  default:
   return;
 } // ends the swith
 
  // Get the old image and its height and width
  $old_image = $image_from_file($old_image_path);
  $old_width = imagesx($old_image);
  $old_height = imagesy($old_image);
 
  // Calculate height and width ratios
  $width_ratio = $old_width / $max_width;
  $height_ratio = $old_height / $max_height;
 
  // If image is larger than specified ratio, create the new image
  if ($width_ratio > 1 || $height_ratio > 1) {
 
   // Calculate height and width for the new image
   $ratio = max($width_ratio, $height_ratio);
   $new_height = round($old_height / $ratio);
   $new_width = round($old_width / $ratio);
 
   // Create the new image
   $new_image = imagecreatetruecolor($new_width, $new_height);
 
   // Set transparency according to image type
   if ($image_type == IMAGETYPE_GIF) {
    $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
    imagecolortransparent($new_image, $alpha);
   }
 
   if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
    imagealphablending($new_image, false);
    imagesavealpha($new_image, true);
   }
 
   // Copy old image to new image - this resizes the image
   $new_x = 0;
   $new_y = 0;
   $old_x = 0;
   $old_y = 0;
   imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
 
   // Write the new image to a new file
   $image_to_file($new_image, $new_image_path);
   // Free any memory associated with the new image
   imagedestroy($new_image);
   } else {
   // Write the old image to a new file
   $image_to_file($old_image, $new_image_path);
   }
   // Free any memory associated with the old image
   imagedestroy($old_image);
 } // ends resizeImage function
 // Processes images by getting paths and 
// creating smaller versions of the image
function processImage($dir, $filename) {
  // Set up the variables
  $dir = $dir . '/';
 
  // Set up the image path
  $image_path = $dir . $filename;
 
  // Set up the thumbnail image path
  $image_path_tn = $dir.makeThumbnailName($filename);
 
  // Create a thumbnail image that's a maximum of 200 pixels square
  resizeImage($image_path, $image_path_tn, 200, 200);
 
  // Resize original to a maximum of 500 pixels square
  resizeImage($image_path, $image_path, 500, 500);
 }
 // Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
  // Gets the paths, full and local directory
  global $image_dir, $image_dir_path;
  if (isset($_FILES[$name])) {
   // Gets the actual file name
   $filename = $_FILES[$name]['name'];
   if (empty($filename)) {
    return;
   }
  // Get the file from the temp folder on the server
  $source = $_FILES[$name]['tmp_name'];
  // Sets the new path - images folder in this directory
  $target = $image_dir_path . '/' . $filename;
  // Moves the file to the target folder
  move_uploaded_file($source, $target);
  // Send file for further processing
  processImage($image_dir_path, $filename);
  // Sets the path for the image for Database storage
  $filepath = $image_dir . '/' . $filename;
  // Returns the path where the file is stored
  return $filepath;
  }
 }
 function buildImageDisplay($imageArray) {
  $id = '<ul id="image-display">';
  foreach ($imageArray as $image) {
   $id .= '<li>';
   $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
   $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
   $id .= '</li>';
 }
  $id .= '</ul>';
  return $id;
 }
function makeThumbnailName($image) {
  $i = strrpos($image, '.');
  $image_name = substr($image, 0, $i);
  $ext = substr($image, $i);
  $image = $image_name . '-tn' . $ext;
  return $image;
 }
function get_vehicle($id){
  if(session_status() != PHP_SESSION_ACTIVE){
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
      session_start();
    }
    $db=phpMotorsConnect();

    $sql = "select * from inventory where invId=:id"; 
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id,PDO::PARAM_STR);
    #echo $sql;
    $stmt->execute();

    return $stmt->fetch();

  }
  function getVehicles(){
    $db = phpmotorsConnect();
    $sql = 'SELECT invId, invMake, invModel FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
  }
  function get_vehicles($classification){
  if(session_status() != PHP_SESSION_ACTIVE){
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
      session_start();
    }
    $db=phpMotorsConnect();

    $sql = "select * from inventory join carclassification using(classificationId) where classificationId=?"; 
    #echo $sql;
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $classification,PDO::PARAM_INT,12);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(); 
    return $vehicles;

  }
  function get_vehicles_by_name($classification){
    if(session_status() != PHP_SESSION_ACTIVE){
      session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
        session_start();
      }
      $db=phpMotorsConnect();
  
      $sql = "select * from inventory join carclassification using(classificationId) where classificationName=?"; 
      #echo $sql;
      $stmt = $db->prepare($sql);
      $stmt->bindParam(1, $classification,PDO::PARAM_STR,12);
      $stmt->execute();
      $vehicles = $stmt->fetchAll(); 
      return $vehicles;
  
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
     $navList .= "<li><a href='/phpmotors/vehicles/index.php?action=class&type=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
  }
?>
