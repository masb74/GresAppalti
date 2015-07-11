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
									Modifica Anagrafica
								</li>
							</ol>
							<div class="page-header">
								<h1>Modifica Anagrafica <small> </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">	
						<div class="col-sm-12">

							<?php echo validation_errors(); ?>
							
							<!-- TABELLA UTENTI ATTIVI -->
							<div class="panel panel-default">
								
								
								
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Modifica Anagrafica
									<div class="panel-tools">
										<a href="#" class="btn btn-xs btn-link panel-collapse collapses">
										</a>
										<a data-toggle="modal" href="#panel-config" class="btn btn-xs btn-link panel-config">
											<i class="fa fa-wrench"></i>
										</a>
										<a href="#" class="btn btn-xs btn-link panel-refresh">
											<i class="fa fa-refresh"></i>
										</a>
										<a href="#" class="btn btn-xs btn-link panel-expand">
											<i class="fa fa-resize-full"></i>
										</a>
										<a href="#" class="btn btn-xs btn-link panel-close">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								
								<div class="panel-body">
									<?php echo form_open('anagrafiche/salva_anagrafica'); ?>
									<?php foreach ($anagrafiche as $anagrafica) { ?> 

										<div class="form-group">
											<label class="col-sm-2 control-label" for="codice">
												Codice
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="codice" name="codice" value="<?php echo $anagrafica['codice']; ?>" class="form-control">
											</div>
										</div>	
									
										<div class="form-group">
											<label class="col-sm-2 control-label" for="ragione_sociale">
												Ragione Sociale
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Ragione Sociale" id="ragione_sociale" name="ragione_sociale" value="<?php echo $anagrafica['ragione_sociale']; ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="qualifica">
												Qualifica Referente
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Qualifica referente" id="qualifica" name="qualifica" value="<?php echo $anagrafica['qualifica']; ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="email">
												E-mail
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Indirizzo email" id="email" name="email" value="<?php echo $anagrafica['email']; ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="telefono">
												Telefono
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="telefono" name="telefono" value="<?php echo $anagrafica['telefono']; ?>" class="form-control">
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-2 control-label" for="fax">
												Fax
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="fax" name="fax" value="<?php echo $anagrafica['fax']; ?>" class="form-control">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-2 control-label" for="indirizzo">
												Indirizzo
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="indirizzo" name="indirizzo" value="<?php echo $anagrafica['indirizzo']; ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="cap">
												C.A.P.
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="cap" name="cap" value="<?php echo $anagrafica['cap']; ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="localita">
												Localita'
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="localita" name="localita" value="<?php echo $anagrafica['localita']; ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="provincia">
												Provincia
											</label>
										<div class="col-sm-9">

											<select class="form-control" id="provincia" name="provincia">
												<option value="<?php echo $anagrafica['provincia']; ?>"><?php echo $anagrafica['provincia']; ?></option>
												<?php foreach ($provincie as $provincia) {
													$prov = $provincia['provincia'];
													$prov_registrata = $anagrafica['provincia'];
													?> 
													<option value="<?php echo $provincia['provincia'];?>" <?php if ($prov == $prov_registrata) :?> selected <?php endif; ?>><?php echo $provincia['provincia'];?></option>
												
												<?php } ?>
											</select>
										</div>
										</div>									

										<div class="form-group">
											<label class="col-sm-2 control-label" for="p_iva">
												Partita iva
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Partita iva" id="p_iva" name="p_iva" value="<?php echo $anagrafica['p_iva']; ?>" class="form-control">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label" for="tipologia">
												Tipologia
											</label>
										<div class="col-sm-9">

											<select class="form-control" id="tipologia" name="tipologia">
												<option value="">Seleziona Tipologia</option>
												<?php foreach ($tipologie as $tipologia) {
													$tipo = $tipologia['id'];
													$tipologia_registrata = $anagrafica['tipologia'];
													?> 
													<option value="<?php echo $tipologia['id'];?>" <?php if ($tipo == $tipologia_registrata) :?> selected <?php endif; ?>><?php echo $tipologia['descrizione'];?></option>
												
												<?php } ?>
											</select>
										</div>
										</div>
										<div class="row">
											<div class="alert alert-warning">
												<label class="col-sm-2 control-label" for="p_iva">
													Referenti<br />
													<a href="#modal-referenti" data-toggle="modal" class="demo btn btn-blue">Aggiungi</a>
												</label>
												<div id="box_elenco_referenti" class="col-sm-9">
												</div>
												
											</div>
										</div>
									

										
										
											
										</div>									

										
									<?php } ?>
									<input type="hidden" value="<?php echo $anagrafica['id']; ?>" name="id_anagrafica" id="id_anagrafica" >
									<input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])) { echo $_SERVER['HTTP_REFERER'];} ?>" name="url_referer" >

										<div class="form-group" style="height:100px;">
											<div class="col-sm-3 col-sm-offset-2">
												<input type="submit" class="btn btn-success btn-block" value="Salva">
											</div>
											<div class="col-sm-3">
												<a class="btn btn-bricky btn-block" href="<?php echo base_url(); ?>index.php/anagrafiche/rimpiazza/<?php echo $anagrafica['id']; ?>">Elimina</a>
											</div>
										</div>											
									
									
									<?php echo form_close(''); ?>
									
								</div>
							</div>



							
						
						</div>
					</div>
				</div>


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

<script>
	jQuery(document).ready( function() { 
		elenco_referenti();	
	});
	
</script>
<?php include 'footer.php'; ?>