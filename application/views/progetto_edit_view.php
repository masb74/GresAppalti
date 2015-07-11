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
		<?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'form-edit-progetto');
				echo form_open('', $attributes); ?>
				
	
		<input type="hidden" id="id_progetto" name="id_progetto" value="<?php echo $dati_progetto->id;?>">
		
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-success">
					<i class="fa fa-check-circle"></i>
					<strong>Modifica Progetto in Corso! </strong> Stai modificando il progetto nr.<strong><?php echo $dati_progetto->id;?></strong> . Non dimenticare di premere SALVA dopo aver effettuato le modifiche.
				</div>
			<div class="tabbable tabs-left">
		
			<ul id="myTab3" class="nav nav-tabs tab-blue">
				<li class="active">
					<a href="#panel_tab1" data-toggle="tab">
						<i class="blue fa fa-user"></i> Anagrafiche
					</a>
				</li>
				<li class="">
					<a href="#panel_tab2" data-toggle="tab">
						<i class="pink fa fa-dashboard"></i> Caratteristiche
					</a>
				</li>
				<li class="">
					<a href="#panel_tab3" data-toggle="tab">
						<i class="fa fa-gears"></i> Materiali
					</a>
				</li>
				<li class="">
					<a href="#panel_tab4" data-toggle="tab">
						<i class="fa fa-eur"></i> Offerte
					</a>
				</li>	
				<li class="">
					<a href="<?php echo site_url(); ?>/progetti/cambia_stato/<?php echo $dati_progetto->id; ?>" data-toggle="">
						<i class="fa clip-spinner-4"></i> Cambia Stato
					</a>
				</li>	



				</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="panel_tab1">
					<div class="form-group">
						<label class="col-sm-3 control-label">
						Ente Appaltante <span class="symbol required"></span>
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="ente_appaltante_input" name="ente_appaltante_input" placeholder="Digita alcune lettere del nome" autocomplete="off" value="<?php if(!empty($dati_ente)) { echo $dati_ente->ragione_sociale; } ?>">
							<div class="risultato_ricerca_ente"></div>
							<input type="hidden" id="id_ente_appaltante" name="id_ente_appaltante" value="<?php if(!empty($dati_ente)) { echo $dati_ente->id; } ?>">
							<div id="dati_ente">
								<?php 
								if(!empty($dati_ente)) { 
								echo $dati_ente->indirizzo; ?><br /><?php echo $dati_ente->cap; ?> <?php echo $dati_ente->localita; ?> (<?php echo $dati_ente->provincia; ?>)
								<?php } ?>
							</div>
						</div>
						<a href="#modal_nuovo_ente" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Aggiungi nuovo </a>
					</div>	

					<div class="form-group">
						<label class="col-sm-3 control-label">
						Progettista
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="progettista_input" name="progettista_input" placeholder="Digita alcune lettere del nome" autocomplete="off" value="<?php if(!empty($dati_progettista)) { echo $dati_progettista->ragione_sociale; } ?>">
							<div class="risultato_ricerca_prog"></div>
							<input type="hidden" id="id_progettista" name="id_progettista" value="<?php if(!empty($dati_progettista)) { echo $dati_progettista->id; } ?>">
							<div id="dati_progettista">
								<?php 
								if(!empty($dati_progettista)) { 
								echo $dati_progettista->indirizzo; ?><br /><?php echo $dati_progettista->cap; ?> <?php echo $dati_progettista->localita; ?> (<?php echo $dati_progettista->provincia; ?>)					
								<?php } ?>
							</div>
						</div>
						<a href="#modal_nuovo_progettista" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Aggiungi nuovo </a>
					</div>	

					<div class="form-group">
						<label class="col-sm-3 control-label">
						Impresa Aggiudicataria 
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="impresa_input" name="impresa_input" placeholder="Digita alcune lettere del nome" autocomplete="off" value="<?php if(!empty($dati_impresa)) { echo $dati_impresa->ragione_sociale;} ?>">
							<div class="risultato_ricerca_impresa"></div>
							<input type="hidden" id="id_impresa" name="id_impresa" value="<?php if(!empty($dati_impresa)) { echo $dati_impresa->id; } ?>">
							<div id="dati_impresa">
								<?php 
								if(!empty($dati_impresa)) {
								echo $dati_impresa->indirizzo; ?><br /><?php echo $dati_impresa->cap; ?> <?php echo $dati_impresa->localita; ?> (<?php echo $dati_impresa->provincia; ?>)<?php } ?>									
							</div>
						</div>
						<a href="#modal_nuova_impresa" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Aggiungi nuovo </a>
					</div>	

					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-3">
							<input name="btn-salva" type="submit" class="btn btn-bricky btn-block" value="Salva">
						</div>
					</div>
					
				</div>
				
				
				<!-- TAB 2 -->
				<div class="tab-pane" id="panel_tab2">
					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label">
							Tipo Mercato
						</label>
						<div class="col-sm-6 mercato-check">
							<div class="radio">
								<input type="radio" name="Mercato" id="Mercato1" value="1" <?php if($dati_progetto->mercato==1) { echo 'checked'; } ?>>
								<label for="Mercato1">Pubblico</label>
							</div>
							<div class="radio">
								<input type="radio" name="Mercato" id="Mercato2" value="2" <?php if($dati_progetto->mercato==2) { echo 'checked'; } ?>>
								<label for="Mercato2">Privato</label>
							</div>	

						</div>
					</div>
					
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Oggetto dell'appalto 
					</label>
					<div class="col-sm-6">
						<textarea class="form-control" id="oggetto_appalto" name="oggetto_appalto" placeholder="Digita un testo descrittivo"><?php echo $dati_progetto->oggetto; ?></textarea>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Importo dell'appalto 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="importo_appalto" name="importo_appalto" placeholder="Valore in Euro" autocomplete="off" value="<?php echo $dati_progetto->importo_appalto; ?>">
						<span class="input-group-addon add-on"><i class="fa fa-euro"></i></span>
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Sede Lavori 
					</label>
					<div class="col-sm-6">
						<div class="input-group">
							<input type="text" value="<?php echo $dati_progetto->sede_lavori; ?>" class="form-control" id="sede_lavori_input" name="sede_lavori_input" placeholder="Digita alcune lettere per cercare" autocomplete="off">
							<span class="input-group-addon add-on"><i class="fa clip-earth-2"></i></span>
						</div>
						<div class="col-sm-12">
							<div class="risultato_ricerca_citta"></div>
							<input type="hidden" id="id_sede_lavori" name="id_sede_lavori">						
							<input type="hidden" id="id_regione" name="id_regione">					
						</div>
					</div>
				</div>	

				<div class="form-group">
					<label class="col-sm-3 control-label">
					Note Sede Lavori 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="note_sede_lavori" name="importo_appalto" placeholder="" autocomplete="off" value="<?php echo $dati_progetto->note_sedelavori; ?>">
					</div>
				</div>				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Ipotesi Data Appalto 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" value="<?php 
						$data_db = $dati_progetto->ipotesi_data;
						echo date('d-m-Y', strtotime($data_db)); ?>" id="ipotesi_data_appalto" name="ipotesi_data_appalto" class="form-control input-mask-date">
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
					</div>
				</div>					
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Nr.Ordine 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" value="<?php echo $dati_progetto->nr_ordine;?>" id="nr_ordine" name="nr_ordine" class="form-control">
					</div>
				</div>	
								<div class="form-group">
					<label class="col-sm-3 control-label">
					Note <a data-toggle="modal" href="#modal_nuova_nota" class="btn btn-primary"><i class="fa fa-plus"></i>Aggiungi nota</a>
					</label>
					<div id="box-note" class="col-sm-6">
						<table id="tabella_note" class="table table-striped table-bordered table-hover">
							<tbody>
								<?php 
								if (!empty($elenco_note)) {
								foreach ($elenco_note as $nota) { ?>
								<tr>
									<td width="30%"><?php echo date('d-m-Y', strtotime($nota['data_inserimento'])); ?></td>
									<td width="70%"><?php echo $nota['testo_nota']; ?></td>
								</tr>							
								<?php } } ?>
							</tbody>
						</table>
					</div>
				</div>	

					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-3">
							<input name="btn-salva" type="submit" class="btn btn-bricky btn-block" value="Salva">
						</div>
					</div>				
				

				</div>




				<!-- TAB 3 -->

				<div class="tab-pane" id="panel_tab3">

			<div class="row panel panel-success col-sm-12" style="margin-left:15px;">
				<div id="panel_inserisci_riga">

					<div class="form-group col-sm-9">
						<label for="select_listino">Seleziona Listino</label>
						<select id="select_listino" name="select_listino" class="form-control">
							<option value="0">Seleziona</option>
							<?php foreach ($elenco_listini as $listino) { ?>
								<option value="<?php echo $listino->id_listino; ?>"><?php echo $listino->nome_listino; ?></option>
							<?php } ?>						
						</select>
					</div>
					
					<div class="clearfix"></div>
					
					<div id="selettore_classe" class="form-group col-sm-3">
						<label for="select_dn">Seleziona DN</label>
						<select id="select_dn" name="select_dn" class="form-control">
							<option value="0">Seleziona</option>
							<?php foreach ($elenco_select_dn as $select_dn) { ?>
								<option value="<?php echo $select_dn['DN']; ?>"><?php echo $select_dn['DN']; ?></option>
							<?php } ?>						
						</select>
					</div>
				
					<div class="form-group col-sm-3">
						<label for="select_classe">Seleziona Classe</label>
						<select id="select_classe" name="select_classe" class="form-control" disabled>
	
						</select>
					</div>
					
					<input type="hidden" name="id_articolo" id="id_articolo">
					
					<div class="form-group col-sm-3">
						<label style="margin-left:15px;" for="select_classe">Metri Lineari / Pezzi</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="metri_lineari" name="metri_lineari" placeholder="Ml." disabled autocomplete="off">
						</div>						
					</div>
						
					<div class="form-group col-sm-3">
						<button id="btn_inserisci_riga" class="btn btn-default" disabled="disabled">Inserisci</button>
					</div>
				</div>
			</div>
			
		
		
		<div id="box_righe_progetto" class="col-sm-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Descrizione</th>
						<th>Classe</th>
						<th>DN</th>
						<th>Ml./P.zzi</th>
						<th>Tons/Um.</th>
						<th>Euro/Um.</th>
						<th>Tot. Tons</th>
						<th>Tot. Euro</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="corpo_tab_righe_progetto">
				<?php if (!empty($elenco_righe)) {
				foreach ($elenco_righe as $riga) { ?>
					<tr id="riga_progetto_<?php echo $riga['id'];?>">
						<td><?php echo $riga['descrizione']; ?></td>
						<td><?php echo $riga['classe']; ?></td>
						<td><?php echo $riga['DN']; ?></td>
						<td><?php echo $riga['ml']; ?></td>
						<td><?php echo number_format($riga['kg_ml'], 2, ',', '.'); ?></td>
						<td><?php echo number_format($riga['euro_ml'], 2, ',', '.'); ?></td>
						<td><?php echo number_format($riga['tot_kg'], 2, ',', '.'); ?></td>
						<td><?php echo number_format($riga['tot_euro'], 2, ',', '.'); ?></td>
						<td><a data-original-title="Modifica" data-placement="top" class="btn btn-teal tooltips" href="#" style="margin-right:5px;"><i class="fa fa-edit"></i></a><a data-original-title="Elimina" data-placement="top" class="btn btn-yellow tooltips" href="#" onclick="elimina_riga_scheda(<?php echo $riga['id'];?>);"><i class="fa fa-times fa fa-white"></i></a></td>						
						
						
					</tr>
				<?php } } ?>
				</tbody>
				<tfoot>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td id="somma_kg"></td>
						<td id="somma_euro"></td>
						<td></td>
				</tfoot>
			</table>
		</div>		
<script>		
jQuery(document).ready( function() {
somma_righe_progetto();
});				

</script>

					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-3">
							<input name="btn-salva" type="submit" class="btn btn-bricky btn-block" value="Salva">
						</div>
					</div>	
				</div>

				
				<!-- TAB 4 -->
				<div class="tab-pane" id="panel_tab4">
				<?php if (!empty($offerte_progetto)) { ?>
				<table class="table table-hover">
				<thead>
					<tr>
						<th>Nr.</th>
						<th>Tipologia</th>
						<th>Data</th>
						<th>Impresa</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="corpo_tab_righe_progetto">			
					<?php foreach ($offerte_progetto as $offerta) { ?>
					<tr> 
						<td><?php echo $offerta->offerte_id; ?></td>
						<td><?php if ($offerta->offerte_tipologia == 1) { echo 'Gara'; } else { echo 'Trattativa'; } ?></td>
						<td><?php echo date('d/m/Y', strtotime($offerta->offerte_data));  ?></td>
						<td><?php echo $offerta->ragione_sociale; ?></td>
						<td>
							<a data-original-title="Modifica" data-placement="top" class="btn btn-green tooltips" href="<?php echo site_url(); ?>/offerte/edit/<?php echo $offerta->offerte_id; ?>" style="margin-right:5px;"><i class="fa fa-edit"></i></a>
							<a data-original-title="Elimina" data-placement="top" class="btn btn-red tooltips" href="<?php echo site_url(); ?>/offerte/elimina/<?php echo $offerta->offerte_id; ?>" style="margin-right:5px;"><i class="fa fa-times"></i></a>
							<a data-original-title="Stampa" data-placement="top" class="btn btn-teal tooltips link-post" href="<?php echo site_url(); ?>/offerte/stampa_offerta?id_offerta=<?php echo $offerta->offerte_id; ?>" style="margin-right:5px;"><i class="fa fa-print"></i></a>

						
						</td>						
					</tr>						
					<?php } ?>
				</tbody>
				</table>
				
				<?php } ?>
					<div class="col-sm-2">
						<input name="btn-salva" type="submit" class="btn btn-bricky btn-block" value="Inserisci Offerta">
					</div>
				</div>
				
				
				
			</div>

		</div>

	</div>


</div>

</div>


		<div id="modal_nuovo_ente" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Nuovo Ente Appaltante</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
						</div>
						<div class="successHandler alert alert-success no-display">
							<i class="fa fa-ok"></i> Your form validation is successful!
						</div>
					</div>
					<div class="col-md-12">
						
							<div class="form-group">
								<label class="control-label">
									Ragione Sociale <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_rag_sociale" name="newente_rag_sociale">
							</div>
							<div class="form-group">
								<label class="control-label">
									Indirizzo <span class="symbol"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_indirizzo" name="newente_indirizzo">
							</div>
							<div class="form-group">
								<label class="control-label">
									CAP <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_cap" name="newente_cap">
							</div>
							<div class="form-group">
								<label class="control-label">
									Localit� <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_localita" name="newente_localita">
							</div>
							<div class="form-group">
								<label class="control-label">
									Provincia <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_provincia" name="newente_provincia">
							</div>
							<div class="form-group">
								<label class="control-label">
									Telefono <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_telefono" name="newente_telefono">
							</div>
							<div class="form-group">
								<label class="control-label">
									Fax <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_fax" name="newente_fax">
							</div>							
							<div class="form-group">
								<label class="control-label">
									P.Iva <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_piva" name="newente_piva">
							</div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-light-grey col-sm-5 col-sm-offset-1">
					Annulla
				</button>
				<button id="add_new_ente" class="btn btn-yellow col-sm-5" type="submit">
					Registra <i class="fa fa-arrow-circle-right"></i>
				</button>

			</div>
			
		</div>



		<div id="modal_nuovo_progettista" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Nuovo Progettista</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
						</div>
						<div class="successHandler alert alert-success no-display">
							<i class="fa fa-ok"></i> Your form validation is successful!
						</div>
					</div>
					<div class="col-md-12">
						
							<div class="form-group">
								<label class="control-label">
									Ragione Sociale <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_rag_sociale" name="newprogettista_rag_sociale">
							</div>
							<div class="form-group">
								<label class="control-label">
									Indirizzo <span class="symbol"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_indirizzo" name="newprogettista_indirizzo">
							</div>
							<div class="form-group">
								<label class="control-label">
									CAP <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_cap" name="newprogettista_cap">
							</div>
							<div class="form-group">
								<label class="control-label">
									Localit� <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_localita" name="newprogettista_localita">
							</div>
							<div class="form-group">
								<label class="control-label">
									Provincia <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_provincia" name="newprogettista_provincia">
							</div>
							<div class="form-group">
								<label class="control-label">
									Telefono <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_telefono" name="newprogettista_telefono">
							</div>
							<div class="form-group">
								<label class="control-label">
									Fax <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_fax" name="newprogettista_fax">
							</div>							
							<div class="form-group">
								<label class="control-label">
									P.Iva <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_piva" name="newprogettista_piva">
							</div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-light-grey col-sm-5 col-sm-offset-1">
					Annulla
				</button>
				<button id="add_new_progettista" class="btn btn-yellow col-sm-5" type="submit">
					Registra <i class="fa fa-arrow-circle-right"></i>
				</button>

			</div>
			
		</div>


		<div id="modal_nuova_impresa" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Nuova Impresa Aggiudicataria</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
						</div>
						<div class="successHandler alert alert-success no-display">
							<i class="fa fa-ok"></i> Your form validation is successful!
						</div>
					</div>
					<div class="col-md-12">
						
							<div class="form-group">
								<label class="control-label">
									Ragione Sociale <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_rag_sociale" name="newimpresa_rag_sociale">
							</div>
							<div class="form-group">
								<label class="control-label">
									Indirizzo <span class="symbol"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_indirizzo" name="newimpresa_indirizzo">
							</div>
							<div class="form-group">
								<label class="control-label">
									CAP <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_cap" name="newimpresa_cap">
							</div>
							<div class="form-group">
								<label class="control-label">
									Localita' <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_localita" name="newimpresa_localita">
							</div>
							<div class="form-group">
								<label class="control-label">
									Provincia <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_provincia" name="newimpresa_provincia">
							</div>
							<div class="form-group">
								<label class="control-label">
									Telefono <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_telefono" name="newimpresa_telefono">
							</div>
							<div class="form-group">
								<label class="control-label">
									Fax <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_fax" name="newimpresa_fax">
							</div>								
							<div class="form-group">
								<label class="control-label">
									P.Iva <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_piva" name="newimpresa_piva">
							</div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-light-grey col-sm-5 col-sm-offset-1">
					Annulla
				</button>
				<button id="add_new_impresa" class="btn btn-yellow col-sm-5" type="submit">
					Registra <i class="fa fa-arrow-circle-right"></i>
				</button>

			</div>
			
		</div>

		<div id="modal_nuova_nota" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Nuova Nota Progetto</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						
						<div class="form-group">
							<label for="form-field-22">
							</label>
							<textarea class="form-control" id="testo-nuova-nota" name="testo-nuova-nota" placeholder="Testo nota"></textarea>
						</div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-light-grey col-sm-5 col-sm-offset-1">
					Annulla
				</button>
				<button id="add_new_nota" class="btn btn-yellow col-sm-5" type="submit">
					Registra <i class="fa fa-arrow-circle-right"></i>
				</button>

			</div>
			
		</div>		


<?php include 'footer.php'; ?>