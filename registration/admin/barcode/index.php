<!DOCTYPE html>
<html>
<body>

<form action="" method="post">
INPUT ID : <input type="text" name="barcode"><br>
<input type="submit" value="Submit">
</form>

<?php
$barcode = $_POST['barcode'];
// echo $barcode;
?>
<br>
<h1>RESULT BARCODE FOR <?php echo $barcode; ?> </h1>

<img alt="testing"  src="barcode.php?text=<?php echo $barcode; ?>" />

</body>
</html>
