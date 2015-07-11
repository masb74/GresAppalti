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
								<h1>Inserimento Nuova Attività <small></small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->

			
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Inserimento dati
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								

								<div class="panel-body">
									<?php $attributes = array('role' => 'form', 'id' => 'form', 'class' => 'smart-wizard form-horizontal' );
									echo form_open('',$attributes); 
									?><div id="wizard" class="swMain">
											<ul>
												<li>
													<a href="#step-1">
														<div class="stepNumber">
															1
														</div>
														<span class="stepDesc"> Step 1
															<br />
															<small>Ricerca Anagrafica</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-2">
														<div class="stepNumber">
															2
														</div>
														<span class="stepDesc"> Step 2
															<br />
															<small>Inserimento referente</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-3">
														<div class="stepNumber">
															3
														</div>
														<span class="stepDesc"> Step 3
															<br />
															<small>Motivo contatto</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-4">
														<div class="stepNumber">
															4
														</div>
														<span class="stepDesc"> Step 4
															<br />
															<small>Salva</small> </span>
													</a>
												</li>
											</ul>
											<div class="progress progress-striped active progress-sm">
												<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-success step-bar">
													<span class="sr-only"> 0% Complete (success)</span>
												</div>
											</div>
											<div id="step-1">
												<h2 class="StepTitle">Ricerca Anagrafica</h2>
												
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Ragione sociale <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">

														<input type="text" autocomplete="off" placeholder="Digita alcune lettere del nome" name="cerca_anagrafica_input" id="cerca_anagrafica_ras_input" class="form-control" value="<?php echo $dettaglio_anagrafica->ragione_sociale; ?>">
														<div class="risultato_ricerca_anagrafica"></div>
														<input type="hidden" name="id_anagrafica" id="id_anagrafica" value="<?php echo $dettaglio_anagrafica->id; ?>">
														<div id="dati_anagrafica"><?php echo $dettaglio_anagrafica->indirizzo; ?><br /><?php echo $dettaglio_anagrafica->cap; ?> <?php echo $dettaglio_anagrafica->localita; ?> (<?php echo $dettaglio_anagrafica->provincia; ?>)</div>

													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-8">
														<button class="btn btn-blue next-step btn-block">
															Continua <i class="fa fa-arrow-circle-right"></i>
														</button>
													</div>
												</div>
											</div>
											<div id="step-2">
												<h2 class="StepTitle">Inserimento Referente</h2>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Seleziona <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<select class="form-control" id="select_referente" name="select_referente">

														</select>
														<div id="dettagli_ref">
														    <?php echo $dettaglio_referente->referenti_nome; ?><br />
                                                            <?php echo $dettaglio_referente->referenti_mansione; ?><br />
                                                            <?php echo $dettaglio_referente->codice_livello; ?>-<?php echo $dettaglio_referente->descrizione_livello; ?>
														</div>
														<a href="#modal-referenti" data-toggle="modal" class="demo btn btn-blue">Aggiungi</a>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-light-grey back-step btn-block">
															<i class="fa fa-circle-arrow-left"></i> Indietro
														</button>
													</div>
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-blue next-step btn-block">
															Continua <i class="fa fa-arrow-circle-right"></i>
														</button>
													</div>
												</div>
											</div>
											<div id="step-3">
												<h2 class="StepTitle">Motivo e Tipologia del contatto</h2>

												<div class="form-group">
													<label class="col-sm-3 control-label">
														Motivo contatto
													</label>
													<div class="col-sm-7">
													<select multiple="multiple" id="form-field-select-4" class="form-control search-select" name="motivi[]">
														<?php foreach($motivi_visita as $motivo_visita) { ?>
															<option <?php 
															 if (in_array($motivo_visita->motivi_id, $motivi_visita_ras_array)) { echo 'selected'; }
															?> value="<?php echo $motivo_visita->motivi_id; ?>"><?php echo $motivo_visita->motivi_descrizione; ?></option>
														<?php } ?>
													</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-3 control-label">
														Data <span class="symbol required"></span>
													</label>
													<div class="col-sm-7 input-group">
														<input name="data_visita" id="data_visita" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" value="<?php echo date('d/m/Y', strtotime($dettaglio_ras->ras_data));  ?>" class="form-control date-picker">
														
														<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
													</div>
												</div>
									
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Note 
													</label>
													<div class="col-sm-7">
														<textarea name="ras_note" id="ras_note" class="form-control"><?php echo $dettaglio_ras->ras_note;  ?></textarea>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-light-grey back-step btn-block">
															<i class="fa fa-circle-arrow-left"></i> Indietro
														</button>
													</div>
													<div class="col-sm-2 col-sm-offset-3">

														<button type="submit" value="Submit" id="bottone_fine_wizard_edit" class="btn btn-success" >
															Salva <i class="fa fa-arrow-circle-right"></i>
														</button>
													</div>
												</div>
											</div>
											

										</div>
									<?php echo form_close(''); ?>
								</div>
							</div>
							<!-- end: FORM WIZARD PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->			

					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->

	

		



		
		<div id="modal-referenti" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Inserimento Nuovo Referente</h4>
			</div>
			
			<div id="ras_anagrafica_modal" style="padding: 10px 20px"></div>
			<div class="modal-body">
				<div class="row">
					
					<?php echo form_open(''); ?>
					
									



					
					
					
					
					<div class="col-md-6">
										<div class="form-group">
											<label for="codice">
												Nome e cognome
											</label>
											<input type="text" placeholder="" id="nome_referente" name="nome_referente" value="" class="form-control">
										</div>
										<div class="form-group">
											<label for="codice">
												Mansione
											</label>
											<input type="text" placeholder="" name="mansione_referente" id="mansione_referente" value="" class="form-control">
										</div>
									<div class="form-group">
										<label for="form-field-select-1">
											Livello
										</label>
										<select class="form-control" name="livello_referente" id="livello_referente">
											<option value="">&nbsp;</option>
											<?php foreach ($elenco_livelli as $livello) { ?>
											<option value="<?php echo $livello->id_livello; ?>"><?php echo $livello->codice_livello.'-'.$livello->descrizione_livello; ?></option>
											<?php } ?>
										</select>
									</div>
					</div>
					<div class="col-md-6">
										<div class="form-group">
											<label for="codice">
												E-mail
											</label>
											<input type="text" placeholder="" name="email_referente" id="email_referente" value="" class="form-control">
										</div>
										<div class="form-group">
											<label for="codice">
												Telefono
											</label>
											<input type="text" placeholder="" name="telefono_referente" id="telefono_referente" value="" class="form-control">
										</div>
										<label class="checkbox-inline">
											<input type="checkbox" value="1" name="econews_referente" id="econews_referente">
												Invia Econews
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" value="1" name="nl_referente" id="nl_referente">
												Invia Newsletter
										</label>
										
						
									<?php echo form_close(''); ?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-light-grey">
					Close
				</button>
				<button id="salva_nuovo_referente" type="button" class="btn btn-blue">
					Salva
				</button>
			</div>
		</div>
		
		
		
									
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/form-wizard.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				//Main.init();
				FormWizard.init();
				popola_select_referenti(<?php echo $dettaglio_anagrafica->id; ?>, <?php echo $dettaglio_ras->ras_referente;?>);
			});
		</script>
		
<?php include 'footer.php'; ?>

