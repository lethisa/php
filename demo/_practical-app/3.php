<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>

	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP

	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */

if (3 > 1) {
	echo 'I Love PHP';
}	elseif (2 < 1) {
	echo 'false';
} else {
	echo 'false';
}

echo '<br />';

for ($i=0; $i <= 10; $i++) {
	echo $i;
	echo '<br />';
}

$number = 2;
switch ($number) {
	case 1:
		echo 'This 1';
		break;
	case 2:
		echo 'This 2';
		break;
	default:
		echo 'Not Include';
		break;
}
?>






</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>
