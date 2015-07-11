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
									Dashboard
								</li>
							</ol>
							<div class="page-header">
								<h1>Modifica Offerta <small></small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->

			<?php 
			$attributes = array('class' => 'smart-wizard form-horizontal', 'id' => 'form-nuova-offerta');
			echo form_open('offerte/edit', $attributes);
			?>
			<input type="hidden" id="id_offerta" name="id_offerta" value="<?php echo $id_offerta; ?>">
			<input type="hidden" id="id_user_attuale" value="<?php echo $id_user; ?>">
			<div id="wizard" class="swMain">					
			
			<div class="alert alert-success">
				<i class="fa fa-check-circle"></i>
				<strong>Modifica Offerta in Corso! </strong> 
			</div>
			
			<div id="step-1" class="tab-content box-passi">
						<ul>
							<li>
								<a class="selected link-step-1" href="#">
									<div class="stepNumber">1</div>
									<span class="stepDesc"> Step 1<br />
									<small>RICERCA PROGETTO</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-2" href="#">
									<div class="stepNumber">2</div>
									<span class="stepDesc"> Step 2<br />
									<small>ANAGRAFICHE</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-3" href="#">
									<div class="stepNumber">3</div>
									<span class="stepDesc"> Step 3<br />
									<small>RIGHE MATERIALE</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-4" href="#">
									<div class="stepNumber">4</div>
									<span class="stepDesc"> Step 4<br />
									<small>CONFERMA</small> </span>
								</a>
							</li>
						</ul>	
				
				<section id="SezioneCercaProgetto">
				<div class="form-group">
					<div class="col-sm-3 control-label">
					Questa offerta e' collegata al Progetto Nr. 
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="cerca_progetto_input" name="cerca_progetto_input" placeholder="" autocomplete="off" value="<?php echo $id_progetto; ?>" disabled>
						<div class="risultato_ricerca_progetto"></div>
						<input type="hidden" id="id_progetto" name="id_progetto">
					</div>
				</div>
				</section>
				
				<section id="SezioneTipoOfferta">
				<div class="row">
				<fieldset>
					<div class="col-sm-12">
						<h5>Tipologia Offerta</h5>
					</div>
				
					<div class="col-sm-12">
						<div class="radio">
							<input type="radio" name="Offerta" id="Offerta1" value="1" <?php if ($tipologia==1) {echo 'checked';}?>>
							<label for="Offerta1">Offerta per Gara</label>
						</div>
						<div class="radio">
							<input type="radio" name="Offerta" id="Offerta2" value="2" <?php if ($tipologia==2) {echo 'checked';}?>>
							<label for="Offerta2">Offerta per Trattativa</label>
						</div>	
					</div>
					<input type="hidden" name="TipoOfferta" id="TipoOfferta" value="<?php echo $tipologia;?>">
				</fieldset>
				</div>
				</section>


				
				<div class="row col-sm-8 block-center">
					<div class="col-sm-6">
						<button type="submit" name="salva_offerta" value="salva" class="btn btn-red btn-lg btn-block">Salva e chiudi <i class="fa fa-floppy-o"></i></button>
					</div>
					<div class="col-sm-6">
						<button id="btn-continua-off-step-2" class="btn btn-green btn-lg btn-block">Vai al passo 2 <i class="fa fa-arrow-circle-right"></i></button>
					</div>
				</div>


				
			</div>
			
			<div id="step-2" class="box-passi" style="display:none;">
						<ul>
							<li>
								<a class="done link-step-1" href="#">
									<div class="stepNumber">1</div>
									<span class="stepDesc"> Step 1<br />
									<small>RICERCA PROGETTO</small> </span>
								</a>
							</li>
							<li>
								<a class="selected link-step-2" href="#">
									<div class="stepNumber">2</div>
									<span class="stepDesc"> Step 2<br />
									<small>ANAGRAFICHE</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-3" href="#">
									<div class="stepNumber">3</div>
									<span class="stepDesc"> Step 3<br />
									<small>RIGHE MATERIALE</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-4" href="#">
									<div class="stepNumber">4</div>
									<span class="stepDesc"> Step 4<br />
									<small>CONFERMA</small> </span>
								</a>
							</li>
						</ul>	
				



				<div class="form-group">
					<label class="col-sm-3 control-label">
					Impresa 
					</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="offerta_impresa_input" name="offerta_impresa_input" placeholder="Digita alcune lettere del nome" autocomplete="off" value="<?php echo $rag_sociale;?>">
						<div class="risultato_ricerca_impresa"></div>
						<input type="hidden" id="id_impresa" name="id_impresa" value="<?php echo $id_impresa;?>">
						<div id="dati_impresa"><?php echo $indirizzo;?><br /><?php echo $cap;?> <?php echo $localita;?> (<?php echo $provincia;?>)</div>
					</div>
					<a href="#modal_nuova_impresa" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Aggiungi nuovo </a>
				</div>	

				<div class="form-group">
					<label class="col-sm-3 control-label">
					Oggetto 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="offerta_oggetto" name="offerta_oggetto" autocomplete="off" value="<?php echo $oggetto;?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Resa Franco 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="offerta_resa" name="offerta_resa" autocomplete="off" value="<?php echo $resa;?>">
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Consegna 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="offerta_consegna" name="offerta_consegna" autocomplete="off" value="<?php echo $consegna;?>">
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Pagamento 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="offerta_pagamento" name="offerta_pagamento" autocomplete="off" value="<?php echo $pagamento;?>">
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Validita' Prezzi
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="offerta_validita" name="offerta_validita" autocomplete="off" value="<?php echo $validita;?>">
					</div>
				</div>	
				

				<div class="row col-sm-8 block-center">
					<div class="col-sm-6">
						<button type="submit" name="salva_offerta" value="salva" class="btn btn-red btn-lg btn-block">Salva e chiudi <i class="fa fa-floppy-o"></i></button>
					</div>
					<div class="col-sm-6">
						<button id="btn-continua-off-step-3" class="btn btn-green btn-lg btn-block">Vai al passo 3 <i class="fa fa-arrow-circle-right"></i></button>
					</div>
				</div>				
		
		
			</div> 
			
			<div id="step-3" class="box-passi" style="display:none;">
						<ul>
							<li>
								<a class="done link-step-1" href="#">
									<div class="stepNumber">1</div>
									<span class="stepDesc"> Step 1<br />
									<small>RICERCA PROGETTO</small> </span>
								</a>
							</li>
							<li>
								<a class="done link-step-2" href="#">
									<div class="stepNumber">2</div>
									<span class="stepDesc"> Step 2<br />
									<small>ANAGRAFICHE</small> </span>
								</a>
							</li>
							<li>
								<a class="selected link-step-3" href="#">
									<div class="stepNumber">3</div>
									<span class="stepDesc"> Step 3<br />
									<small>RIGHE MATERIALE</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-4" href="#">
									<div class="stepNumber">4</div>
									<span class="stepDesc"> Step 4<br />
									<small>CONFERMA</small> </span>
								</a>
							</li>
						</ul>	

			<div class="row panel panel-success col-sm-12" style="margin-left:15px;">
				<div id="panel_inserisci_riga">

					<div class="form-group col-sm-4">
						<label for="select_listino">Seleziona Listino</label>
						<select id="select_listino" name="select_listino" class="form-control">
							<option value="0">Seleziona</option>
							<?php foreach ($elenco_listini as $listino) { ?>
								<option value="<?php echo $listino->id_listino; ?>"><?php echo $listino->nome_listino; ?></option>
							<?php } ?>						
						</select>
					</div>

					<div class="form-group col-sm-2">
						<label for="select_agg_listino">Aggiorna prezzi Listino</label>
						<button id="aggiorna_prezzi_listino" class="btn btn-green">Aggiorna articoli al listino selezionato</button>				
					</div>
										
					<div class="clearfix"></div>
					
					<div id="selettore_classe" class="form-group col-sm-3">
						<label for="select_dn">Seleziona DN</label>
						<select id="select_dn" name="select_dn" class="form-control" >
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
						<button id="btn_inserisci_riga_offerta" class="btn btn-default" disabled="disabled">Inserisci</button>
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
						<th>Ml.</th>
						<th>Tons/Ml.</th>
						<th>Euro/Ml.</th>
						<th>Sconto</th>
						<th style="width: 76px;">Stampa Sconto</th>
						<th>Tot. Tons</th>
						<th>Tot. Euro</th>
					</tr>
				</thead>
				<tbody id="corpo_tab_righe_progetto">

				</tbody>
				<tfoot>
						<td></td>
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

		<div id="box_sconti_testata" class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-5 control-label">
					Aggiorna sconto righe
					</label>
					<div class="col-sm-1 input-group">
						<input type="text" class="form-control" id="offerta_sc_testata" name="offerta_sc_testata" autocomplete="off" value="">
					</div>
					<div class="col-sm-2">
						<button class="btn btn-green btn-lg btn-block" id="aggiorna_sc_righe" style="padding: 6px 10px; font-size:15px;" >Aggiorna <i class="fa fa-arrow-circle-right"></i></button>
					</div>
				</div>		
		</div>


				<div class="row col-sm-8 block-center">
					<div class="col-sm-6">
						<button type="submit" name="salva_offerta" value="salva" class="btn btn-red btn-lg btn-block">Salva e chiudi <i class="fa fa-floppy-o"></i></button>
					</div>
					<div class="col-sm-6">
						<button id="btn-continua-off-step-4" class="btn btn-green btn-lg btn-block">Vai al passo 4 <i class="fa fa-arrow-circle-right"></i></button>
					</div>
				</div>				
				
			</div>
			



			<div id="step-4" class="box-passi" style="display:none;">
						<ul>
							<li>
								<a class="done link-step-1" href="#">
									<div class="stepNumber">1</div>
									<span class="stepDesc"> Step 1<br />
									<small>STATO SCHEDA</small> </span>
								</a>
							</li>
							<li>
								<a class="done link-step-2" href="#">
									<div class="stepNumber">2</div>
									<span class="stepDesc"> Step 2<br />
									<small>ANAGRAFICHE</small> </span>
								</a>
							</li>
							<li>
								<a class="done link-step-3" href="#">
									<div class="stepNumber">3</div>
									<span class="stepDesc"> Step 3<br />
									<small>CARATTERISTICHE APPALTO</small> </span>
								</a>
							</li>
							<li>
								<a class="selected link-step-4" href="#">
									<div class="stepNumber">4</div>
									<span class="stepDesc"> Step 4<br />
									<small>MATERIALI</small> </span>
								</a>
							</li>
						</ul>	

	
		<div class="row">
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-3 control-label">
					Quantita' Confezioni Lubrificante 
					</label>
					<div class="col-sm-2 input-group">
						<input type="text" class="form-control" id="offerta_lubrificante" name="offerta_lubrificante" autocomplete="off" value="<?php echo $lubrificante;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-3 control-label">
					Stampa Importi Totali 
					</label>
					<div class="col-sm-2 checkbox">
						<label>
							<input type="checkbox" id="offerta_stampa_totali" name="offerta_stampa_totali">
						</label>
					</div>
					
				</div>

		</div>
		
		<div class="col-sm-8 col-sm-offset-2">
			<button type="submit" name="salva_offerta" value="stampa" class="btn btn-primary col-sm-6 col-sm-offset-3">SALVA OFFERTA E CREA DOCUMENTO</a>
		</div>

</div>
		
			
			
			
		<?php echo form_close(); ?>			
			
		</div>

					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->

	

		
		<div id="modal_salva_progetto" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Progetto Salvato</h4>
			</div>
					<div class="modal-body">
						<p>
							Hai inserito il progetto nr. <strong><?php echo $id_progetto;?></strong><br />Cosa vuoi fare adesso?
						</p>
					</div>
					<div class="modal-footer">
						<a href="<?php echo site_url(); ?>/dashboard/"><button class="btn btn-success" aria-hidden="true">
							Torna al men� principale
						</button></a>
						<a href="<?php echo site_url(); ?>/progetti/aggiungi/"><button class="btn btn-danger">
							Inserisci un nuovo progetto
						</button></a>
					</div>
			
		</div>	


<?php 
if ($step=='step3') { ?>
<script>
	
		$('#step-1').hide();
		$('#step-3').fadeIn();
		elenco_righe_offerta();

</script>
<?php } ?>		

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

		
<?php include 'footer.php'; ?>

