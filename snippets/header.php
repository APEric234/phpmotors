<div class="top">
    <div id="logo"><img src="/phpmotors/images/site/logo.png" alt="PHP motors"> </div>
    
  <?php 
if(session_status() != PHP_SESSION_ACTIVE){
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/phpmotors/session');
      session_start();
    }
  if(isset($_SESSION["first_name"])){
      
    echo " <div id=\"account\"><a href=\"/phpmotors/accounts/index.php?action=details\">Hello ".$_SESSION["first_name"]."</a>";

  }else{

    echo " <div id=\"account\"><a href=\"/phpmotors/accounts/?action=login\">My messing account</a>";
  }

  ?>
  </div>
  </div>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>