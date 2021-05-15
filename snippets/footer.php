<footer>
<p>&#160; PHP Motors, All rights reserved.</p>
<p>All images used are believed to be in "Fair Use". Please notify author if any are not and they will be removed</p>
<p>
  Last updated:  <?php
  $timestampe=filemtime(__FILE__);
  $date=date('d M , Y', $timestampe);
  echo $date;
  ?>
</p>
</footer>
