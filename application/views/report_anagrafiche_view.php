<?php
$filename="AnagraficheGresappalti.xls";
header ("Content-Type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=$filename");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang=it><head>
<title>Titolo</title></head>
<body>
<table border="0">
	<thead>
		<tr>
			<td>ID</td>
			<td>IdUserInseritore</td>
			<td>Codice</td>
			<td>RagioneSociale</td>
			<td>Qualifica</td>
			<td>Email</td>
			<td>Indirizzo</td>
			<td>CAP</td>
			<td>Telefono</td>
			<td>Fax</td>
			<td>Localita</td>
			<td>Regione</td>
			<td>Provincia</td>
			<td>P.Iva</td>
			<td>Tipologia</td>
			<td>Approvato</td>
			<td>Referenti</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($anagrafiche as $anagrafica)
			{
				echo "<tr>";
					echo "<td>".$anagrafica['id']."</td>";
					echo "<td>".$anagrafica['id_user_inseritore']."</td>";
					echo "<td>".$anagrafica['codice']."</td>";
					echo '<td width="400">'.$anagrafica["ragione_sociale"].'</td>';
					echo "<td>".$anagrafica['qualifica']."</td>";
					echo "<td>".$anagrafica['email']."</td>";
					echo "<td>".$anagrafica['indirizzo']."</td>";
					echo "<td>".$anagrafica['cap']."</td>";
					echo "<td>".$anagrafica['telefono']."</td>";
					echo "<td>".$anagrafica['fax']."</td>";
					echo "<td>".$anagrafica['localita']."</td>";
					echo "<td>".$anagrafica['regione']."</td>";
					echo "<td>".$anagrafica['provincia']."</td>";
					echo "<td>".$anagrafica['p_iva']."</td>";
					switch ($anagrafica['tipologia']) {
						case 1:
							echo "<td>Ente Appaltante</td>";
						break;
						case 2:
							echo "<td>Progettista</td>";
						break;
						default:
							echo "<td>Impresa</td>";
					}			
					echo "<td>".$anagrafica['approvato']."</td>";
					if(isset($anagrafica['referenti'])) {
						echo "<td>".$anagrafica['referenti']."</td>";
					}
				echo "</tr>";
			}
		?>
	</tbody>
</table>
</body></html>