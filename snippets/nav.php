<nav id="page_nav">
  <?php 
 require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
 require_once $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/model/main-model.php";
 require_once $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/library/functions.php";
 $classifications = getClassifications();
  $nav = get_nav($classifications);
  echo $nav;
  ?>
</nav>