<?php 

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
  // stores it as an array in the $classifications variable 
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
 }
 ?>