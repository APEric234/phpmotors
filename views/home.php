<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/main.css">
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Home Page</title>
</head>

<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main>
    <h1> Welcome to PHP Motors</h1>
    <img id="delorean" src="images/delorean.jpg" alt="">
    <div id="descr">
      <h2>DMC Delorean</h2>
      <ul>
        <li>3 cup holders</li>
        <li>
          Superman Doors
        </li>
        <li>
          Fuzzy Dice!
        </li>
      </ul>
    </div>
    <button>Own Today</button>
    <div class="about">
    <div class="content" id="reviews">
    <h2>DMC Delorean Reviews</h2>
    <UL>
      <li>"So fast its almost like traveling in time." (4/5)</li>
      <li>
        "Coolest ride on the road." (4/5)
      </li>
      <li>
        "I'm feeling Marty McFly!" (5/5)
      </li>
      <li>
        "The most futuristic ride of our day." (4.5/5)
      </li>
      <li>
        "80's livin and i love it" (5/5)
      </li>
    </UL>
    </div>
    <div class="content" id="upgrades">
    <h2>Delorean Upgrades</h2>
      <div class="box"><div class="inner box"><img src="images/upgrades/flux-cap.png" alt=""></div><a href="#">Flux Capacitor</a></div>
      <div class="box"><div class="inner box"><img src="images/upgrades/flame.jpg" alt=""> </div><a href="#">Flame Decals</a></div>
      <div class="box"><div class="inner box"><img src="images/upgrades/bumper_sticker.jpg" alt=""></div><a href="#">Bumper Stickers</a></div>
      <div class="box"><div class="inner box"><img src="images/upgrades/hub-cap.jpg" alt=""></div><a href="#">Hub Caps</a></div>
    </div>
    </div>
  </main>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>