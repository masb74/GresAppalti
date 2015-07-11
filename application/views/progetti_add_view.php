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
								<h1>Inserimento Nuovo Progetto <small></small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->

			<?php 
			$attributes = array('class' => 'smart-wizard form-horizontal', 'id' => 'form-nuovo-progetto-1');
			echo form_open('', $attributes);
			?>
			
			<input type="hidden" id="id_user_attuale" value="<?php echo $id_user; ?>">
			<div id="wizard" class="swMain">					
			
			<div class="alert alert-success">
				<i class="fa fa-check-circle"></i>
				<strong>Creazione Progetto in Corso! </strong> Stai inserendo il progetto nr.<strong><?php echo $id_progetto;?></strong> . I campi si salvano automaticamente durante l'inserimento.
			</div>
			
			<div id="step-1" class="tab-content box-passi">
						<ul>
							<li>
								<a class="selected link-step-1" href="#">
									<div class="stepNumber">1</div>
									<span class="stepDesc"> Step 1<br />
									<small>STATO SCHEDA</small> </span>
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
									<small>CARATTERISTICHE APPALTO</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-4" href="#">
									<div class="stepNumber">4</div>
									<span class="stepDesc"> Step 4<br />
									<small>MATERIALI</small> </span>
								</a>
							</li>
						</ul>	

				<section id="SezioneMercato">
				<div class="row">
				<fieldset>
					<div class="col-sm-12">
						<h5>Mercato</h5>
					</div>
				
					<div class="col-sm-12">
						<div class="radio">
							<input type="radio" name="Mercato" id="Mercato1" value="1">
							<label for="Mercato1">Pubblico</label>
						</div>
						<div class="radio">
							<input type="radio" name="Mercato" id="Mercato2" value="2">
							<label for="Mercato2">Privato</label>
						</div>	
					</div>
				</fieldset>
		
				</div>
				</section>


				<section id="SezioneTipoScheda">
					<fieldset disabled>
					<div class="row">
					<div class="col-sm-12">
						<h5>Tipo di Scheda</h5>
					</div>
						<div id="tipi-scheda" class="col-sm-12">
							<div class="radio">
							<input type="radio" name="TipoScheda" id="TipoScheda1" value="1">
							<label for="TipoScheda1">Progetto</label>
							</div>
							<div class="radio">
							<input type="radio" name="TipoScheda" id="TipoScheda2" value="2">
							<label for="TipoScheda2">Gara</label>
							</div>
							<div class="radio">
							<input type="radio" name="TipoScheda" id="TipoScheda3" value="3">
							<label for="TipoScheda3">Trattativa</label>
							</div>

						</div>
					</div>
					</fieldset>
				</section>	

				<section id="SezioneSchedaProgetto">
				
					<div class="row">
					<div class="col-sm-12">
						<h5>Tipo di Progetto</h5>
					</div>

						<div class="col-sm-12">
							<div class="radio">
								
								<input type="radio" name="TipoProgetto" id="TipoProgetto1" value="1">
								<label for="TipoProgetto1">Preliminare</label>
							</div>
							<div class="radio">
								<input type="radio" name="TipoProgetto" id="TipoProgetto2" value="2">
								<label for="TipoProgetto2">Definitivo</label>
							</div>	
							<div class="radio">
								<input type="radio" name="TipoProgetto" id="TipoProgetto3" value="3">
								<label for="TipoProgetto3">Esecutivo</label>
							</div>							</div>
					</div>
				</section>

				<section id="SezioneSchedaGara">
				
					<div class="row">
					<div class="col-sm-12">
						<h5>Tipo di Gara</h5>
					</div>
				
						<div class="col-sm-12">
							<div class="radio">
								<input type="radio" name="TipoProgetto" id="TipoProgetto4" value="4">
								<label for="TipoProgetto4">Standard</label>
							</div>
							<div class="radio">
								<input type="radio" name="TipoProgetto" id="TipoProgetto5" value="5">
								<label for="TipoProgetto5">Offerta economicamente più vantaggiosa</label>
							</div>	
						</div>
					</div>
				</section>
				
				
				<section id="SezioneSchedaTrattativa">
				
					<div class="row">
					<div class="col-sm-12">
						<h5>Trattativa</h5>
					</div>
				
						<div class="col-sm-12">
							<div class="radio">
								<input type="radio" name="TipoProgetto" id="TipoProgetto6" value="6">
								<label for="TipoProgetto6">Ipotesi data</label>
							</div>	
						</div>
					
					</div>
				</section>
				
			</div>
			
			<div id="step-2" class="box-passi" style="display:none;">
						<ul>
							<li>
								<a class="done link-step-1" href="#">
									<div class="stepNumber">1</div>
									<span class="stepDesc"> Step 1<br />
									<small>STATO SCHEDA</small> </span>
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
									<small>CARATTERISTICHE APPALTO</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-4" href="#">
									<div class="stepNumber">4</div>
									<span class="stepDesc"> Step 4<br />
									<small>MATERIALI</small> </span>
								</a>
							</li>
						</ul>	
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Ente Appaltante <span class="symbol required"></span>
					</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="ente_appaltante_input" name="ente_appaltante_input" placeholder="Digita alcune lettere del nome" autocomplete="off">
						<div class="risultato_ricerca_ente"></div>
						<input type="hidden" id="id_ente_appaltante" name="id_ente_appaltante">
						<div id="dati_ente"></div>
					</div>
					<a href="#modal_nuovo_ente" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Aggiungi nuovo </a>
				</div>	


				<div class="form-group">
					<label class="col-sm-3 control-label">
					Progettista
					</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="progettista_input" name="progettista_input" placeholder="Digita alcune lettere del nome" autocomplete="off">
						<div class="risultato_ricerca_prog"></div>
						<input type="hidden" id="id_progettista" name="id_progettista">
						<div id="dati_progettista"></div>
					</div>
					<a href="#modal_nuovo_progettista" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Aggiungi nuovo </a>
				</div>	


				<div class="form-group">
					<label class="col-sm-3 control-label">
					Impresa Aggiudicataria 
					</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="impresa_input" name="impresa_input" placeholder="Digita alcune lettere del nome" autocomplete="off">
						<div class="risultato_ricerca_impresa"></div>
						<input type="hidden" id="id_impresa" name="id_impresa">
						<div id="dati_impresa"></div>
					</div>
					<a href="#modal_nuova_impresa" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Aggiungi nuovo </a>
				</div>	

				<div class="col-sm-4 col-sm-offset-4">
					<button id="btn-continua-step-2" class="btn btn-green btn-lg btn-block">
						Continua <i class="fa fa-arrow-circle-right"></i>
					</button>
				</div>

		
		
			</div> 
			
			<div id="step-3" class="box-passi" style="display:none;">
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
								<a class="selected link-step-3" href="#">
									<div class="stepNumber">3</div>
									<span class="stepDesc"> Step 3<br />
									<small>CARATTERISTICHE APPALTO</small> </span>
								</a>
							</li>
							<li>
								<a class="link-step-4" href="#">
									<div class="stepNumber">4</div>
									<span class="stepDesc"> Step 4<br />
									<small>MATERIALI</small> </span>
								</a>
							</li>
						</ul>	

				<div class="form-group">
					<label class="col-sm-3 control-label">
					Oggetto dell'appalto 
					</label>
					<div class="col-sm-6">
						<textarea class="form-control" id="oggetto_appalto" name="oggetto_appalto" placeholder="Digita un testo descrittivo"></textarea>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Importo dell'appalto 
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" class="form-control" id="importo_appalto" name="importo_appalto" placeholder="Valore in Euro" autocomplete="off">
						<span class="input-group-addon add-on"><i class="fa fa-euro"></i></span>
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Sede Lavori * 
					</label>
					<div class="col-sm-6">
						<div class="input-group">
							<input type="text" class="form-control" id="sede_lavori_input" name="sede_lavori_input" placeholder="Digita alcune lettere per cercare" autocomplete="off">
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
						<input type="text" id="note_sede_lavori" name="note_sede_lavori" class="form-control">
					</div>
				</div>					
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Ipotesi Data Appalto *
					</label>
					<div class="col-sm-6 input-group">
						<input type="text" id="ipotesi_data_appalto" name="ipotesi_data_appalto" class="form-control input-mask-date">
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
					</div>
				</div>					
				<div class="form-group">
					<label class="col-sm-3 control-label">
					Note <a data-toggle="modal" href="#modal_nuova_nota" class="btn btn-primary"><i class="fa fa-plus"></i>Aggiungi nota</a>
					</label>
					<div id="box-note" class="col-sm-6">
						<table id="tabella_note" class="table table-striped table-bordered table-hover">
							<tbody>
							</tbody>
						</table>
					</div>
				</div>	
									
				<div class="col-sm-4 col-sm-offset-4">
					<button id="btn-continua-step-3" class="btn btn-green btn-lg btn-block">
						Continua <i class="fa fa-arrow-circle-right"></i>
					</button>
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
			<input type="hidden" id="id_progetto" name="id_progetto" value="<?php echo $id_progetto;?>">	
			
		
		
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
						<td id="somma_kg"></td>
						<td id="somma_euro"></td>
						<td></td>
				</tfoot>
			</table>
		</div>
	
	
		<div class="col-sm-8 col-sm-offset-2">
			<a data-toggle="modal" class="btn btn-primary col-sm-6 col-sm-offset-3" role="button" href="#modal_salva_progetto">CONFERMA PROGETTO</a>
		</div>

</div>
		
			
			
			
		<?php echo form_close(); ?>			
			
		</div>

					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->

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
									E-mail 
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newente_email" name="newente_email">
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
									Località <span class="symbol required"></span>
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
									E-mail
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newprogettista_email" name="newprogettista_email">
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
									Località <span class="symbol required"></span>
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
									E-mail
								</label>
								<input type="text" placeholder="Inserisci" class="form-control" id="newimpresa_email" name="newimpresa_email">
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
									Località <span class="symbol required"></span>
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
							Torna al menù principale
						</button></a>
						<a href="<?php echo site_url(); ?>/progetti/aggiungi/"><button class="btn btn-danger">
							Inserisci un nuovo progetto
						</button></a>
					</div>
			
		</div>	


		

									

		
<?php include 'footer.php'; ?>

