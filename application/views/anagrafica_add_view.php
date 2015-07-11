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
									Aggiungi Anagrafica
								</li>
							</ol>
							<div class="page-header">
								<h1>Aggiungi nuova Anagrafica <small> </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">	
						<div class="col-sm-12">

							<!-- TABELLA UTENTI ATTIVI -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Aggiungi Anagrafica
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
									<?php echo form_open(''); ?>

										<?php echo validation_errors(); ?>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="codice">
												Codice
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="codice" name="codice" value="<?php echo set_value('codice'); ?>" class="form-control">
											</div>
										</div>	
									
										<div class="form-group">
											<label class="col-sm-2 control-label" for="ragione_sociale">
												Ragione Sociale
											</label>
											<div class="col-sm-9">
												<input type="text" id="ragione_sociale" name="ragione_sociale" value="<?php echo set_value('ragione_sociale'); ?>" class="form-control" />
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="qualifica">
												Qualifica Referente
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Qualifica referente" id="qualifica" name="qualifica" value="<?php echo set_value('qualifica'); ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="email">
												E-mail
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Indirizzo email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
											</div>
										</div>	
										
										<div class="form-group">
											<label class="col-sm-2 control-label" for="telefono">
												Telefono
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="telefono" name="telefono" value="<?php echo set_value('telefono'); ?>" class="form-control">
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-2 control-label" for="fax">
												Fax
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="fax" name="fax" value="<?php echo set_value('fax'); ?>" class="form-control">
											</div>
										</div>	
										
										<div class="form-group">
											<label class="col-sm-2 control-label" for="indirizzo">
												Indirizzo
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="indirizzo" name="indirizzo" value="<?php echo set_value('indirizzo'); ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="cap">
												C.A.P.
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="cap" name="cap" value="<?php echo set_value('cap'); ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="localita">
												Localita'
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="localita" name="localita" value="<?php echo set_value('localita'); ?>" class="form-control">
											</div>
										</div>	

										<div class="form-group">
											<label class="col-sm-2 control-label" for="provincia">
												Provincia
											</label>
										<div class="col-sm-9">

											<select class="form-control" id="provincia" name="provincia">
												<option value="">Seleziona</option>
												<?php foreach ($provincie as $provincia) { ?> 
													<option value="<?php echo $provincia['provincia'];?>" <?php echo set_select('provincia', $provincia['provincia']); ?> ><?php echo $provincia['provincia'];?></option>
													
												<?php } ?>
											</select>
										</div>
										</div>									

										<div class="form-group">
											<label class="col-sm-2 control-label" for="p_iva">
												Parita iva
											</label>
											<div class="col-sm-9">
												<input type="text" placeholder="" id="p_iva" name="p_iva" value="<?php echo set_value('p_iva'); ?>" class="form-control">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label" for="tipologia">
												Tipologia
											</label>
										<div class="col-sm-9">

											<select class="form-control" id="tipologia" name="tipologia">
												<option value="">Seleziona Tipologia</option>
												<?php foreach ($tipologie as $tipologia) { ?> 
													<option value="<?php echo $tipologia['id'];?>" <?php echo set_select('tipologia', $tipologia['id']); ?> ><?php echo $tipologia['descrizione'];?></option>
												
												<?php } ?>
											</select>
										</div>
										</div>									

										<div class="row">
											<div class="alert alert-warning">
												<label class="col-sm-2 control-label" for="p_iva">
													Referenti<br />
													<input type="submit" class="demo btn btn-blue" name="bott_invio" value="Aggiungi">
												</label>
												<div id="box_elenco_referenti" class="col-sm-9">
												</div>
												
											</div>
										</div>


										<div class="form-group">
											<div class="col-sm-3 col-sm-offset-2">
												<input type="submit" class="btn btn-bricky btn-block" name="bott_invio" value="Salva">
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



<?php include 'footer.php'; ?>