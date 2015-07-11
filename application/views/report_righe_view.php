<?php
	$filename="DettaglioProgettiGresappalti.xls";
	header ("Content-Type: application/vnd.ms-excel");
	header ("Content-Disposition: inline; filename=$filename");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang=it><head>
<title>Titolo</title></head>
<body>


<table border="0">
	<thead>
		<tr>
			<td>ID Progetto</td>
			<td>DN</td>
			<td>Classe</td>
			<td>Ml</td>
			<td>Kg/ml</td>
			<td>Euro/ml</td>
			<td>Totale Kg</td>
			<td>Totale Euro</td>
			<td>Anno inserimento scheda</td>
			<td>Stato progetto</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($righe as $riga)
			{
				$stato_progetto = $riga['stato'];
				switch ($stato_progetto) {
    				case 1:
        				$stato_txt = 'Progetto';
        				break;
    				case 2:
        				$stato_txt = 'Gara';
        				break;
    				case 3:
        				$stato_txt = 'Trattativa';
        				break;
    				case 4:
        				$stato_txt = 'Ordine';
        				break;
				}
				echo "<tr>";
					echo "<td>".$riga['id_progetto']."</td>";
					echo "<td>".$riga['DN']."</td>";
					echo "<td>".$riga['classe']."</td>";
					echo "<td>".$riga['ml']."</td>";
					echo "<td>".$riga['kg_ml']."</td>";
					echo "<td>".$riga['euro_ml']."</td>";
					echo "<td>".$riga['tot_kg']."</td>";
					echo "<td>".$riga['tot_euro']."</td>";
					echo "<td>".date('Y', strtotime($riga['data_inserimento']))."</td>";
					echo "<td>".$stato_txt."</td>";
					
				echo "</tr>";
			}
		?>
	</tbody>
</table>
</body></html>