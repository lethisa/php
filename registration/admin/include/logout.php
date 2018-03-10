
<?php
// destroy session
 session_start();
$_SESSION['username'] = null;
?>

<?php header("Location: ../../index.php"); ?>
