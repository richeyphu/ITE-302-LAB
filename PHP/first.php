<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$num1 = 109;
	$num2 = 59;
	
	$score = 69;
	
	$txt1 = "Web Design";
?>
<body>
	$num1 + $num2 = <?php echo $num1 + $num2; ?> <br>
	$num1 - $num2 = <?php echo $num1 - $num2; ?> <br>
	$num1 * $num2 = <?php echo number_format($num1 * $num2); ?> <br>
	$num1 / $num2 = <?php echo number_format($num1 / $num2,2); ?> <br>
	$num1 / $num2 = <?php echo floor($num1 / $num2); ?> <br>
	$num1 / $num2 = <?php echo round($num1 / $num2); ?> <br>
	$num1 / $num2 = <?php echo ceil($num1 / $num2); ?> <br>
	<hr>
	$num1 + $num2 = <?php echo "$num1 + $num2"; ?> <br>
	$num1 - $num2 = <?php echo "$num1 - $num2"; ?> <br>
	$num1 * $num2 = <?php echo "$num1 * $num2"; ?> <br>
	$num1 / $num2 = <?php echo "$num1 / $num2"; ?> <br>
	<hr>
	$num1 + $num2 = <?php echo '$num1 + $num2'; ?> <br>
	$num1 - $num2 = <?php echo '$num1 - $num2'; ?> <br>
	$num1 * $num2 = <?php echo '$num1 * $num2'; ?> <br>
	$num1 / $num2 = <?php echo '$num1 / $num2'; ?> <br>
	<hr>
	ITE-302 <?php echo $txt1; ?> and Development <br>
	ITE-302 <?php echo "$txt1 and Development"; ?> <br>
	ITE-302 <?php echo '$txt1 and Development'; ?> <br>
	$num1 $txt1 = <?php echo $num1 . $txt1; ?> <br>
	$num1 $txt1 = <?php echo $num1 . " " . $txt1; ?> <br>
	$num1 $txt1 = <?php echo "$num1 $txt1"; ?> <br>
	<hr>
	<?php
	if( $num1 > 100 ){
		echo $num1. "<br>";
	} else {
		echo '$num1 < 100 <br>';
	}
	
	if( $score >= 80 ){
		echo "You got A<br>";
	} else if( $score >= 70 ) {
		echo "You got B<br>";
	} else if( $score >= 60 ) {
		echo "You got C<br>";
	} else if( $score >= 50 ) {
		echo "You got D<br>";
	} else {
		echo "You got F<br>";
	}
	?>
	<hr>
	<?php
	for($i = 1; $i <= 12; $i++) {
		echo '$i = ' . "$i <br>";
	}
	?>
	<hr>
	<?php
	$monthThai = array('0','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
	for($m = 1; $m <= 12; $m++) {
		echo $monthThai[$m] . "<br>";
	}
	?>
	<select>
		<?php for( $m = 1; $m <= 12; $m++) { ?>
		<option value="<?php echo $m; ?>">
			<?php echo $monthThai[$m]; ?>
		</option>
		<?php } ?>
	</select>
</body>
</html>