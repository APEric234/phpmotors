<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="screen" href="../css/input.css">
  
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Register</title>
</head>

<body>

<?php
session_start();
if (!isset($_SESSION["first_name"])){
  header("location: index.php");
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/headeSr.php'; ?>
  <!--above line is import for nav-->
  <main>
  <h1> Hello <?php
  echo $_SESSION["first_name"]?>
  </h1>
  <h2>Account Details</h2>
  <ul>
  
  </ul>
  <p>Email: <?php
  echo $_SESSION["email"]?></p>
  <p>First Name:  <?php
  echo $_SESSION["first_name"]?></p>
  <p>Last Name:  <?php
  echo $_SESSION["last_name"]?></p>

  </main>

  
<?php
  $sql = "SELECT id FROM users where username='{$_SESSION["email"]}' and privlege>1";
  if(check_if_exists($sql)){
    echo "<a href='../vehicles/'>manage vehicles</a>";
    
    echo "<p>Welcom admin user</p>";
  }else{
echo "<a href='index.php?action=increaseLevel'>Elevate to admin</a>";
  }

?>
  <a href='index.php?action=Logout'>Logout</a>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body

</html>