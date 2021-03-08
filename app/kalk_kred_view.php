<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
</head>
<body>
<?php if (!isset($oprocentowanie)) $oprocentowanie = "3%" ?>
<form action="<?php print(_APP_URL);?>/app/kalk_kred.php" method="get">
	<label for="id_x">Kwota: </label>
	<input id="id_x" type="text" name="x" value="<?php if (isset($x)) print($x); ?>"/>
	<br />
	<label for="id_y">Czas spłaty (w latach)
: </label>
	<input id="id_y" type="text" name="y" value="<?php if (isset($y)) print($y); ?>"/>
	<br />
	<label for="id_op">Oprocentowanie: </label>
	<select name="op">
		<option value="1%" <?php if ($oprocentowanie == '1%')  print('selected'); ?>>1%</option>
		<option value="4%" <?php if ($oprocentowanie == '4%')  print('selected'); ?>>4%</option>
		<option value="9%" <?php if ($oprocentowanie == '9%')  print('selected'); ?>>9%</option>
		<option value="15%" <?php if ($oprocentowanie == '15%')  print('selected'); ?>>15%</option>
	</select>
	<br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #af0; width:300px;">
<?php echo 'Miesięczna rata (w złotówkach): '.round($result); ?>
</div>
<?php } ?>

</body>
</html>