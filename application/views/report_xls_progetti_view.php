<?php
	$filename="ProgettiGresappalti.xls";
	header ("Content-Type: application/vnd.ms-excel");
	header ("Content-Disposition: inline; filename=$filename");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang=it><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Titolo</title></head>
<body>
<table border="0">
	<thead>
		<tr>
			<td>ID Progetto</td>
			<td>Inserito da</td>
			<td>nr ordine</td>
			<td>Stato</td>
			<td>Variante</td>
			<td>Mercato</td>
			<td>Data inserimento</td>
			<td>Oggetto</td>
			<td>Importo appalto</td>
			<td>Sede lavori</td>
			<td>Note Sede lavori</td>
			<td>Regione lavori</td>
			<td>Ipotesi data appalto</td>
			<td>Tot Kg</td>
			<td>Tot Euro</td>
			<td>Ente appaltante</td>
			<td>Progettista</td>
			<td>Impresa</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($elenco_progetti as $progetto)
			{
				echo "<tr>";
					echo "<td>".$progetto['id']."</td>";
					echo "<td>".$progetto['nome_utente_inseritore']."</td>";
					echo "<td>".$progetto['nr_ordine']."</td>";
					echo "<td>".$progetto['stato_progetto']."</td>";
					echo "<td>".$progetto['variante_progetto']."</td>";
					if ($progetto['mercato']==1) {
						echo "<td>Pubblico</td>";
					} else {
						echo "<td>Privato</td>";	
					}
					echo "<td>".date('d/m/Y', strtotime($progetto['data_inserimento']))."</td>";
					echo "<td>".$progetto['oggetto']."</td>";
					echo "<td>".$progetto['importo_appalto']."</td>";
					echo "<td>".$progetto['sede_lavori']."</td>";
					echo "<td>".$progetto['note_sedelavori']."</td>";
					echo "<td>".$progetto['regione_lavori']."</td>";
					echo "<td>".date('d/m/Y', strtotime($progetto['ipotesi_data']))."</td>";
					echo "<td>".$progetto['somma_kg']."</td>";
					echo "<td>".$progetto['somma_euro']."</td>";
					echo "<td>".$progetto['rag_sociale_ente']."</td>";
					echo "<td>".$progetto['rag_sociale_progettista']."</td>";
					echo "<td>".$progetto['rag_sociale_impresa']."</td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>
</body></html>