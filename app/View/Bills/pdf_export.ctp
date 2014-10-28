<?php

function roundTo($a) {
	$tmp = (100 * round($a, 2)) % 5;
	if ($tmp == 0) {
		$chf = $a;
	} else if ($tmp <= 2) {
		$chf = ($a - $tmp / 100);
	} else {
		$chf = ($a + (5 - $tmp) / 100);
	}
	return number_format((round(20 * $chf)) / 20, 2);
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<style type="text/css">
			th {
			    border-bottom: 1px solid #000;
			}
			
			.rechnungsTabelle{
				border-collapse:separate;
    			border-spacing:0 5px;
			}
			
			.secondLast{
				border-bottom: 1px dashed black;
			}
			
			.totalSumme{
				border-bottom: 2px dashed black;
			}
			
			.rightText{
				text-align: right;
			}
			
		</style>
	</head>
	<body>
	<div class="pdf" style="height: 100%;">
	<div class="header" style="width: 100%; height: 200px;">
		<table>
			<tr>
				<td colspan="2">
					<?php echo $this -> Html -> image('wdlogo.png', array('width' => '200px', 'height' => '100px', 'fullBase' => true)); ?>
				</td>
				<td colspan="2">
					<h3>Verkaufs-Servicecenter auf 3 Etagen<br />
					<b>WD Oensingen AG</b></h3>
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
				<td>
					&nbsp;
				</td>
				<td>
					&nbsp;
				</td>
				<td>
					<?php echo $bill['Customer']['title'] ?>
					<br />
					<?php echo $bill['Customer']['firstname'] ?>
					<?php echo $bill['Customer']['lastname'] ?>
					<br />
					<?php echo $bill['Customer']['street'] ?>
					<br />
					<?php echo $bill['Customer']['zip'] ?>
					<?php echo $bill['Customer']['city'] ?>
				</td>
			</tr>
		</table>
	</div>
	<div style="width: 100%; height: 30px; text-align: right; margin-top: 50px;" class="date">
		<font>Oensingen, <?php echo date("d.m.Y") ?></font>
	</div>


<?php
if($bill['Bill']['bill_type_id'] == 6){
	echo '<h3>Rechnung Nr. '.$bill['Bill']['bill_number'].'</h3>';
	echo $bill['Bill']['offerte_text'];
}elseif($bill['Bill']['bill_type_id'] == 1){
	echo '<div style="margin-bottom: 10px;">Neulieferung</div>';
}
?>
<div>
	<table style="width: 430px;" class="rechnungsTabelle">
		<tr class="tableheader">
			<th style="width: 15%;">Anzahl</th>
			<th style="width: 15%;">Art. Nr.</th>
			<th style="width: 60%;">Beschreibung</th>
			<th colspan="2">Preis</th>
		</tr>
		<?php
		$tot = 0;
		$mwSt = 0;

		foreach ($bill['BillPosition'] as $position) {

			// get the vat, if given
			if ($position['vat'] == 1) {
				$mwSt += ($position['amount'] * $position['price']) * 0.08;
			}
			$tot += $position['amount'] * $position['price'];
			echo '<tr>
					<td>' . $position['amount'] . '</td>
					<td>' . $position['id'] . '</td>
					<td>' . $position['description'] . '</td>
					<td style="width: 25px;">Fr.</td>
					<td class="rightText">' . roundTo($position['amount'] * $position['price']) . '</td>
				</tr>';
		}
		echo '<tr>
			<td colspan="2">&nbsp;</td>
			<td  style="text-align: left;">8% MwST</td>
			<td class="secondLast" style="width: 25px;">Fr.</td>
			<td class="secondLast rightText">' . roundTo($mwSt) . '</td>
			</tr>
			<tr>
				<td colspan="3"><b>Total inkl. 8% MwST.</b></td>
				<td class="totalSumme" style="width: 25px;">Fr.</td>
				<td class="totalSumme rightText">' . roundTo($mwSt + $tot) . '</td>
			</tr>
			';
		?>
	</table>
	<?php
	if($bill['Bill']['bill_type_id'] != 6){
			echo '<div class="zahlungsinfo" style="position: relative; top: 60px;">Zahlung innert 30 Tagen rein Netto</div>';
		}else{
			
			$ret = '<div class="zahlungsinfo" style="position: relative; top: 60px;">
		Unser Installationsaufwand basiert auf Erfahrungswerten. Abweichungen aufgrund von unvorhergesehenen Aufwendungen sind jedoch möglich.
		</div>';
		
		if($bill['Bill']['text_bauseits']){
			$ret .= '<div class="bauseits"><h4>Bauseits</h4>'.$bill['Bill']['text_bauseits'].'</div>';
		}
		
		if($bill['Bill']['text_konditionen']){
			$ret .= '<div class="konditionen"><h4>Konditionen</h4>'.$bill['Bill']['text_konditionen'].'</div>';
		}
		
		if($bill['Bill']['text_lieferfrist']){
		$ret .= '<div class="lieferfrist"><h4>Lieferfrist</h4>'.$bill['Bill']['text_lieferfrist'].'</div>';
		}
		
		$ret .= '<br /><br />Für weitere Informationen stehen wir gerne zur Verfügung und sichern eine einwandfreie Auftragsausführung zu.';
		
		echo $ret;
		}
	?>
</div>

<div class="footer" style="text-align: center; font-size: 10px; border-top: 1px solid #ccc; padding-top: 5px; position: fixed; bottom: 0;"> 
			WD Oensingen AG &bull; 
			Inhaber Ernst Baschung &bull; 
			Solothurnstrasse 74 &bull;
			 4702 Oensingen &bull; 
			 062 396 22 88 &bull; 
			 wdoensingen.ch 
			 PC Konto 46-322-3 &bull; 
			 MWST Nr. CHE-103.313.269
			</div>
</div>	
	</body>
</html>
