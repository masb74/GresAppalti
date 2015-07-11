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
						Elenco RAS
					</li>
				</ol>
				<div class="page-header">
					<h1>Elenco RAS <small></small></h1>
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
					<th>Utente</th>
					<th>Data visita</th>
					<th>Anagrafica</th>
					<th>Referente</th>					
					<th>Motivi</th>
					<th></th>
				</tr>			
			</thead>
			<?php if ($_POST && empty($elenco_ras)) { ?>
				<div class="alert alert-danger" role="alert">
					Nessun RAS trovato	
				</div>
			<?php } else { ?>	

				<tbody>
				<?php if (!empty($elenco_ras)) { ?>
				<?php foreach ($elenco_ras as $ras) { ?>
				<tr>
					<td><?php echo $ras->nome; ?></td>
					<td><?php echo date('d M, Y', strtotime($ras->ras_data)); ?></td>
					<td><?php echo $ras->ragione_sociale; ?></td>
					<td><?php echo $ras->referenti_nome; ?></td>
					<td><?php 
					$motivi_gruppo = $ras->ras_motivi; 
					$arr_motivi = explode (',',$motivi_gruppo);
					
					$ci =&get_instance();
					$ci->load->model('ras_model');
					for ($i=0; $i<count($arr_motivi); $i++) {
						if ($arr_motivi[$i]!="") {	 
							$dett_motivo = $ci->ras_model->dettaglio_motivo($arr_motivi[$i]); 
							echo $dett_motivo->motivi_descrizione.'<br />';
						}
					}
					?></td>
					<td>
						<a href="<?php echo site_url(); ?>/ras/edit/<?php echo $ras->ras_id; ?>" class="btn btn-yellow tooltips" data-placement="top" data-original-title="Modifica"><i class="fa fa-edit"></i></a>
						<a data-original-title="Vedi scheda" data-placement="top" class="btn btn-teal tooltips" href="<?php echo site_url(); ?>/ras/scheda/<?php echo $ras->ras_id; ?>"><i class="fa fa-search-plus"></i></a>
						<!--<a data-original-title="Elimina" data-placement="top" class="btn btn-bricky tooltips" href="<?php echo site_url(); ?>/ras"><i class="fa fa-times"></i></a>-->	
						<a data-original-title="Stampa" data-placement="top" class="btn btn-green tooltips" href="<?php echo site_url(); ?>/ras/stampaScheda/<?php echo $ras->ras_id; ?>"><i class="fa fa-print"></i></a>						
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
			<?php echo form_open(''); ?>
			
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
					<label for="regione">Agente</label>
					<select id="select_agente" name="select_agente" class="form-control input-sm">
						<option <?php if ($id_utente == 0) : ?>selected="selected"<?php endif; ?> value="0">Tutti</option>
						<?php foreach ($elenco_utenti as $utente) : ?>
							<option <?php if ($utente['id_user']==$id_utente) : ?>selected="selected"<?php endif; ?> value="<?php echo $utente['id_user']; ?>"><?php echo $utente['nome']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="form-group">
					<label for="stato_scheda">Anagrafica</label>
						<input type="text" class="form-control" id="ras_filtro_input" name="ras_filtro_input" placeholder="Digita alcune lettere del nome" autocomplete="off">
						<div class="risultato_ricerca_impresa"></div>
						<input type="hidden" id="id_impresa" name="id_impresa" value="">
						<div id="dati_impresa"></div>
				</div>

				<div class="form-group">
					<label>Da Data</label>
					<div class="input-group">
						<input name="da_data" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
						<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
					</div>
				</div>
				
				<div class="form-group">
					<label>A Data</label>
					<div class="input-group">
						<input name="a_data" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
						<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
					</div>
				</div>

				<div class="form-group">
					<label>Output</label>
					<div class="input-group">
  <label>
    <input type="radio" name="optionOutput" id="optionOutput1" value="1" checked>
    Stampa a video
  </label>
   <label>
    <input type="radio" name="optionOutput" id="optionOutput2" value="2">
    Esporta XLS
  </label> 
					</div>
				</div>
								
				<button type="submit" class="btn btn-primary" name="btn_cerca">Cerca</button>
			<?php echo form_close(); ?>
		</div>
	</div>	
	
</div>



<?php include 'footer.php'; ?>