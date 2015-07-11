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
						Inserimento Nuova Offerta
					</li>
				</ol>
				<div class="page-header">
					<h1>Inserimento Nuova Offerta - Filtro Progetti <small></small></h1>
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
					<th>ID Scheda</th>
					<th>Tipo Progetto</th>
					<th>Importo appalto</th>					
					<th>Inserito da</th>
					<th>Data Inserimento</th>
					<th>Sede Lavori</th>
					<th></th>
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
						?>
					</td>
					<td><?php echo number_format($progetto['importo_appalto'],2,',','.'); ?></td>
					<td><?php echo $progetto['nome_utente_inseritore']; ?></td>
					<td><?php echo date('d M, Y', strtotime($progetto['data_inserimento'])); ?></td>
					<td><?php echo $progetto['sede_lavori']; ?><br /><?php echo $progetto['note_sedelavori']; ?></td>
					<td>
						<a data-original-title="CreaOfferta" data-placement="top" class="btn btn-teal tooltips" href="<?php echo site_url(); ?>/offerte/index/<?php echo $progetto['id']; ?>"><i class="fa fa-plus"></i></a>
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
			<?php echo form_open('offerte/filtro_progetti'); ?>
			
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