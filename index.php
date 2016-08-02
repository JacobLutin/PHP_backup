<?php
$x = 10;
$array = array(array(1, 0, 1), array(0, 1, 0), array(0, 1, 1));
?>

<h1>
	<?php
	$x = "lol";
	echo "X equal $x<br>";
	?>
	<?php 
	foreach ($array as $arr1) {
		foreach ($arr1 as $arr2) {
			echo "$arr2 ";
		}
		echo "<br>";
	}
	for ($i = 1; $i <= 10; $i++) {
		echo "$i ";
	}
	?>
</h1>

