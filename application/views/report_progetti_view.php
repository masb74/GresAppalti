<html>

<head>
<style type="text/css"> 
body {
	color:#2c2c2c;
	}
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
}
table{
    border-collapse: collapse;
    border-spacing: 0px;
	width:100%;
	margin:0px;padding:0px;
}
td {
	border-bottom:1px solid #cccccc;
	}
th {
	border-bottom:1px solid #000000;
	text-align:center;
	}
</style>
</head>

<body>	
<div class="CSSTableGenerator" >
	<?php if (is_null($elenco_progetti)) { ?>
		<?php echo 'Nessun progetto trovato'; ?>
	<?php } else { ?>	
	<table id="sample-table-1" class="table table-hover" cellpadding="3" >
		<thead>
				<tr>
					<th>ID Scheda</th>
					<th>Tipo Progetto</th>
					<th>Importo appalto</th>					
					<th>Inserito da</th>
					<th>Data Inserimento</th>
					<th>Sede Lavori</th>
				</tr>
		</thead>
		
		<tbody>
			<?php if (!empty($elenco_progetti)) { ?>
			<?php foreach ($elenco_progetti as $progetto) { ?>
				<tr>
					<td><?php echo $progetto['id']; ?></td>
					<td>
						<?php $tipo_scheda = $progetto['stato'];
						if ($tipo_scheda==1) { echo 'Progetto'; } elseif ($tipo_scheda==2) { echo 'Gara'; } elseif ($tipo_scheda==3) { echo 'Trattativa'; } elseif ($tipo_scheda==4) { echo 'Ordine'; }
						?>
					</td>
					<td><?php echo number_format($progetto['importo_appalto'],2,',','.'); ?></td>
					<td><?php echo $progetto['nome']; ?></td>
					<td><?php echo date('d M, Y', strtotime($progetto['data_inserimento'])); ?></td>
					<td><?php echo $progetto['sede_lavori']; ?></td>
				</tr>
			<?php } ?>
			<?php } ?>		
		</tbody>
	</table>
	<?php } ?>
	
</div>
</body>
</html>