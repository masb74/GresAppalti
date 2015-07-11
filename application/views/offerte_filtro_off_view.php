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
						Gestione Offerte
					</li>
				</ol>
				<div class="page-header">
					<h1>Gestione Offerte <small></small></h1>
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
					<th>ID Offerta</th>
					<th>Data Offerta</th>
					<th>Tipo Offerta</th>
					<th>Impresa</th>					
					<th>Inserito da</th>
					<th>Progetto</th>
					<th></th>
				</tr>			
			</thead>
			<?php if (is_null($elenco_offerte)) { ?>
				<?php echo 'Nessuna offerta trovata'; ?>
			<?php } else { ?>	
				<tbody>
				<?php if (!empty($elenco_offerte)) { ?>
				<?php foreach ($elenco_offerte as $offerta) { ?>
				<tr>
					<td><?php echo $offerta['offerte_id']; ?></td>
					<td><?php echo date('d M, Y', strtotime($offerta['offerte_data'])); ?></td>
					<td>
						<?php $tipo_scheda = $offerta['offerte_tipologia'];
						if ($tipo_scheda==1) { echo 'Gara'; } elseif ($tipo_scheda==2) { echo 'Trattativa'; } 
						?>
					</td>
					<td><?php echo $offerta['rag_sociale_impresa']; ?></td>
					<td><?php echo $offerta['nome_utente_inseritore']; ?></td>
					<td><?php echo $offerta['offerte_progetto']; ?></td>
					
					<td>
						<a data-original-title="Modifica" data-placement="top" class="btn btn-teal tooltips" href="<?php echo site_url(); ?>/offerte/edit/<?php echo $offerta['offerte_id']; ?>"><i class="fa fa-edit"></i></a>
						<a data-original-title="Elimina" data-placement="top" class="btn btn-bricky tooltips" href="<?php echo site_url(); ?>/offerte/elimina/<?php echo $offerta['offerte_id']; ?>"><i class="fa fa-times"></i></a>	
						<a data-original-title="Stampa" data-placement="top" class="btn btn-green tooltips" href="<?php echo site_url(); ?>/offerte/stampa_offerta/<?php echo $offerta['offerte_id']; ?>"><i class="fa fa-print"></i></a>						
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
			<?php echo form_open('offerte/filtro_offerte'); ?>
			
				<div class="form-group">
					<label>Nr. Offerta</label>
						<input type="text" value="<?php echo $nr_offerta; ?>" id="nr_offerta" name="nr_offerta" class="form-control input-sm">
				</div>
				
				<div class="form-group">
					<label>Nr. Progetto</label>
						<input type="text" value="<?php echo $nr_progetto; ?>" id="nr_progetto" name="nr_progetto" class="form-control input-sm">
				</div>
				
				<div class="form-group">
					<label>Tipo Offerta</label>
					<select id="select_tipologia" name="select_tipologia" class="form-control input-sm">
						<option selected="selected" value="0">Tutti</option>
						<option <?php if ($id_tipologia=='1') : ?>selected="selected"<?php endif; ?> value="1">Gara</option>
						<option <?php if ($id_tipologia=='2') : ?>selected="selected"<?php endif; ?> value="2">Trattativa</option>
					</select>
				</div>

				<div class="form-group">
					<label for="stato_scheda">Impresa</label>
						
						
					
						<input type="text" class="form-control" id="offerta_impresa_input" name="offerta_impresa_input" placeholder="Digita alcune lettere del nome" autocomplete="off">
						<div class="risultato_ricerca_impresa"></div>
						<input type="hidden" id="id_impresa" name="id_impresa" value="">
						<div id="dati_impresa"></div>
					
					
				</div>

				
				<button type="submit" class="btn btn-primary">Cerca</button>
			<?php echo form_close(); ?>
		</div>
	</div>	
	
</div>



<?php include 'footer.php'; ?>