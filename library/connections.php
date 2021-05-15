<?php
function createConnection(){
 $server='localhost';
 $dbname='phpmotors';
 $username='iClient';
 $password='proxyPass1!';
 $dsn='mysql:host='.$server;
 $dsn=$dsn.';dbname='.$dbname;
 // Create the actual connection object and assign it to a variable
 try{
  $link = new PDO($dsn, $username, $password);
  return $link;
 }
 catch(Exception $e){

  echo $e->getMessage();
  header( "/phpmotors/views/500.php");
  
  exit;
 }
}
createConnection();
?>