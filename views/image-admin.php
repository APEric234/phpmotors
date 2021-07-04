<!DOCTYPE html>
<?php
?>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/main.css">
  <meta name="viewport" content="width=device-width,inital-scale=1.0">
  <title>PHP Motors | Image Management </title>
</head>
<body>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  <!--above line is import for nav-->
  <main><h1> Image Management</h1></main>
  <h2>Add New Vehicle Image</h2>
<?php
 if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
 } ?>

<form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
 <label for="invId">Vehicle</label>
	<?php echo $prodSelect; ?>
	<fieldset>
		<label>Is this the main image for the vehicle?</label>
		<label for="priYes" class="pImage">Yes</label>
		<input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
		<label for="priNo" class="pImage">No</label>
		<input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
	</fieldset>
 <label for="file1">Upload Image:</label>
 <input type="file" id="file1" name="file1">
 
 <label for="upload"> Upload:</label>
 <input type="submit" id="upload" class="regbtn" value="Now">
 <input type="hidden" name="action" value="upload">
</form>
<h2>Existing Images</h2>
<p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
<?php
 if (isset($imageDisplay)) {
  echo $imageDisplay;
 } ?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>
<?php unset($_SESSION['message']); ?>