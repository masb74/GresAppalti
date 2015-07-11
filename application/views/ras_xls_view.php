<?php
	$filename="Ras.xls";
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
			<td>Nome agente</td>
			<td>Data visita</td>
			<td>Ragione sociale</td>
			<td>Referente</td>
			<td>Motivi</td>
			<td>Note</td>

		</tr>
	</thead>
	<tbody>
		<?php
			if($elenco_ras) {
			foreach ($elenco_ras as $ras)  
			{
				echo "<tr>";
					echo "<td>".$ras->nome."</td>";
					echo "<td>".date('d M, Y', strtotime($ras->ras_data))."</td>";
					echo "<td>".$ras->ragione_sociale."</td>";
					echo "<td>".$ras->referenti_nome."</td>";
					echo "<td>"; 
					$motivi_gruppo = $ras->ras_motivi; 
					$arr_motivi = explode (',',$motivi_gruppo);
					
					$ci =&get_instance();
					$ci->load->model('ras_model');
					for ($i=0; $i<count($arr_motivi); $i++) {
						if ($arr_motivi[$i]!="") {	 
							$dett_motivo = $ci->ras_model->dettaglio_motivo($arr_motivi[$i]); 
							echo $dett_motivo->motivi_descrizione.' ';
						}
					}
					echo "</td>";
					echo "<td>".$ras->ras_note."</td>";
				echo "</tr>";
			}
			}
		?>
	</tbody>
</table>
</body></html>