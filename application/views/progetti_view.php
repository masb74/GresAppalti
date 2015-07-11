<?php include 'head.php'; ?>


<!-- start: PAGE -->
<div class="main-content">
	<div class="container">
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-12">
				<!-- start: PAGE TITLE & BREADCRUMB -->
				<ol class="breadcrumb">
					<li>
						<i class="clip-home-3"></i>
						<a href="#">
							Home
						</a>
					</li>
					<li class="active">
						Gestione Progetti
					</li>
				</ol>
				<div class="page-header">
					<h1>Gestione Progetti <small></small></h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
		</div>
		<!-- end: PAGE HEADER -->

		
<!-- start: PAGE CONTENT -->
	
<div class="row">
		
	<div class="col-sm-9">
		
		<table class='table table-striped'>
			<thead>
				<tr>
					<th width="10%">ID Scheda</th>
					<th width="10%">Tipo Progetto</th>
					<th width="10%">Importo appalto</th>					
					<th width="40%">Oggetto appalto</th>
					<th width="10%">Sede Lavori</th>
					<th width="20%"></th>
				</tr>			
			</thead>
			<?php if (is_null($elenco_progetti)) { ?>
				<?php echo 'Nessun progetto trovato'; ?>
			<?php } else { ?>	
				<tbody>
				<?php if (!empty($elenco_progetti)) { ?>
				<?php foreach ($elenco_progetti as $progetto) { ?>
				<tr>
					<td><?php echo $progetto['id']; ?></td>
					<td>
						<?php $tipo_scheda = $progetto['stato'];
						if ($tipo_scheda==1) { echo 'Progetto'; } elseif ($tipo_scheda==2) { echo 'Gara'; } elseif ($tipo_scheda==3) { echo 'Trattativa'; } elseif ($tipo_scheda==4) { echo 'Ordine'; }
						if ($progetto['nr_ordine']) { echo '<br />nr. <strong>'.$progetto['nr_ordine'].'</strong>'; }
						?>
					</td>
					<td><?php echo number_format($progetto['importo_appalto'],2,',','.'); ?></td>
					<td><?php echo $progetto['oggetto']; ?></td>
					<td><?php echo $progetto['sede_lavori']; ?><br /><?php echo $progetto['note_sedelavori']; ?></td>
					<td>
						<a data-original-title="Modifica" data-placement="top" class="btn btn-teal tooltips" href="<?php echo site_url(); ?>/progetti/modifica/<?php echo $progetto['id']; ?>"><i class="fa fa-edit"></i></a>
						<a data-original-title="Cambia Stato" data-placement="top" class="btn btn-yellow tooltips" href="<?php echo site_url(); ?>/progetti/cambia_stato/<?php echo $progetto['id']; ?>"><i class="fa clip-spinner-4"></i></a>	
						<a data-original-title="Elimina" data-placement="top" class="btn btn-bricky tooltips" href="<?php echo site_url(); ?>/progetti/elimina/<?php echo $progetto['id']; ?>"><i class="fa fa-times"></i></a>	
						<a data-original-title="Stampa" data-placement="top" class="btn btn-green tooltips link-post" href="<?php echo site_url(); ?>/progetti/stampa?progetto=<?php echo $progetto['id']; ?>"><i class="fa fa-print"></i></a>						
					</td>
					
				</tr>
				<?php } ?>
				<?php } ?>
				</tbody>
			
				
			<?php } ?>
		</table>
	</div>
	
	<div class="col-sm-2">
	
		<div class="row"><h4>Filtri</h4></div>
		
		<div class="row">
			<?php echo form_open('progetti'); ?>
			
				<div class="form-group">
					<label>Nr. Progetto</label>
						<input type="text" value="<?php echo $nr_progetto; ?>" id="nr_progetto" name="nr_progetto" class="form-control input-sm">
				</div>
				
				<div class="form-group">
					<label for="regione">Regione</label>
					<select id="select_regione" name="select_regione" class="form-control input-sm">
						<option <?php if ($id_regione == 0) : ?>selected="selected"<?php endif; ?> value="0">Tutte</option>
						<?php foreach ($elenco_regioni as $regione) : ?>
							<option <?php if ($regione['regioni_id'] == $id_regione) : ?>selected="selected"<?php endif; ?> value="<?php echo $regione['regioni_id']; ?>"><?php echo $regione['regione']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label>Sede Lavori</label>
						<input type="text" value="" id="sede_lavori_input" name="sede_lavori_input" class="form-control input-sm">
						<div class="col-sm-12">
							<div class="risultato_ricerca_citta"></div>
							<input type="hidden" id="id_sede_lavori" name="id_sede_lavori">						
							<input type="hidden" id="id_regione" name="id_regione">					
						</div>
				</div>
				
				<div class="form-group">
					<label>Tipo Mercato</label>
					<select id="select_mercato" name="select_mercato" class="form-control input-sm">
						<option selected="selected" value="0">Tutti</option>
						<option <?php if ($id_mercato=='1') : ?>selected="selected"<?php endif; ?> value="1">Pubblico</option>
						<option <?php if ($id_mercato=='2') : ?>selected="selected"<?php endif; ?> value="2">Privato</option>
					</select>
				</div>

				<div class="form-group">
					<label for="stato_scheda">Stato Scheda</label>
					<select id="select_stato_scheda" name="select_stato_scheda" class="form-control input-sm">
						<option selected="selected" value="0">Tutti</option>
						<option <?php if ($id_stato=='1') : ?>selected="selected"<?php endif; ?> value="1">Progetto</option>
						<option <?php if ($id_stato=='2') : ?>selected="selected"<?php endif; ?> value="2">Gara</option>
						<option <?php if ($id_stato=='3') : ?>selected="selected"<?php endif; ?> value="3">Trattativa</option>
						<option <?php if ($id_stato=='4') : ?>selected="selected"<?php endif; ?> value="4">Ordine</option>
					</select>
				</div>

				
				<button type="submit" class="btn btn-primary">Cerca</button>
			<?php echo form_close(); ?>
		</div>
	</div>	
	
</div>



<?php include 'footer.php'; ?>