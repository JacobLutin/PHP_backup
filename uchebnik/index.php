<?php

	$dollars = 500;
	$exchangeRate = 64.384;
	$roubles = $dollars * $exchangeRate;
	echo "$dollars долларов можно обменять на $roubles рублей<br><br>";

	echo "Бросаем кубик...<br>";
	$cubeNum = mt_rand(1, 6);
	echo "Выпавшее число = $cubeNum<br><br>";

	/* Игра с кубиком */

	$playerDice1 = mt_rand(1, 6);
	$playerDice2 = mt_rand(1, 6);
	$computerDice1 = mt_rand(1, 6);
	$computerDice2 = mt_rand(1, 6);

	$playerSum = $playerDice1 + $playerDice2;
	$computerSum = $computerDice1 + $computerDice2;

	echo "У игрока выпало $playerDice1 и $playerDice2<br>";
	echo "У компьютера выпало $computerDice1 и $computerDice2<br>";

	if (($anonDice1 == $anonDice2) && ($computerDice1 == $computerDice2)) {
		echo "Два дабла! Тебя ждет большая удача.<br>";
	}

	if ($playerSum > $computerSum) {
		echo "Игрок победил компьютера!<br><br>";
	} elseif ($playerSum < $computerSum) {
		echo "Компьютер победил игрока!<br><br>";
	} else {
		echo "Победили оба!<br><br>";
	}

?>