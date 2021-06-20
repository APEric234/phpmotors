<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="screen" href="../css/input.css">
  
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Register</title>
</head>

<body>

<?php
if (!array_key_exists("first_name",$_SESSION)){
  header("location: index.php");
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main>
  <h1> Hello <?php
  $sql = "SELECT id FROM users where username='{$_SESSION["email"]}' and privlege>1";
  if(check_if_exists($sql)){
    echo "Admin ";
  }
  echo "User ".$_SESSION["first_name"]?>
  </h1>
  <h2>Account Details</h2>
  <ul>
  <?php
  if (array_key_exists("message",$_SESSION)){
    echo $_SESSION["message"];
  }?>
  </ul>
  <p>You are logged in</p>
  <?php
  $sql = "SELECT id FROM users where username='{$_SESSION["email"]}' and privlege>1";
  if(check_if_exists($sql)){
    echo "Admin ";
  }
  echo "User ".$_SESSION["first_name"]?>
  <p>Email: <?php
  echo $_SESSION["email"]?></p>
  <p>First Name:  <?php
  echo $_SESSION["first_name"]?></p>
  <p>Last Name:  <?php
  echo $_SESSION["last_name"]?></p>

  </main>
  <?php
  $sql = "SELECT id FROM users where username='{$_SESSION["email"]}' and privlege>1";

    echo "<h2>account Management</h2>";
    echo "<p>use the below link to manage your account</p>";
  
    echo "<a href='index.php?action=updateUser'>account management </a></p>";

?>
  
<?php
  $sql = "SELECT id FROM users where username='{$_SESSION["email"]}' and privlege>1";
  if(check_if_exists($sql)){
    echo "<h2>inventory Management</h2>";
    
    echo "<a href='../vehicles/'>vehicle management </a></p>";
  }

?>
  <a href='index.php?action=Logout'>Logout</a>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>