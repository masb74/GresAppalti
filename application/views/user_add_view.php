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
									Aggiungi Utente
								</li>
							</ol>
							<div class="page-header">
								<h1>Aggiungi Utente <small> </small></h1>
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
									Aggiungi Anagrafica Utente
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
									<div class="col-sm-6">
										<div class="form-group">
											<label for="codice">
												Indirizzo e-mail
											</label>
											<input type="text" placeholder="" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
										</div>	
										<div class="form-group">
											<label for="nome">
												Nome e Cognome
											</label>
											<input type="text" placeholder="" id="nome" name="nome" value="<?php echo set_value('nome'); ?>" class="form-control">
										</div>	
										<div class="form-group">
											<label for="nome">
												Codice utente univoco
											</label>
											<input type="text" placeholder="" id="codice_utente" name="codice_utente" value="<?php echo set_value('codice_utente'); ?>" maxlength="2" class="form-control">
										</div>	
										<div class="form-group">
											<label for="username">
												Username
											</label>
											<input type="text" placeholder="" id="username" name="username" value="<?php echo set_value('username'); ?>" class="form-control">
										</div>	
										<div class="form-group">
											<label for="password">
												Password
											</label>
											<input type="text" placeholder="" id="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control">
										</div>	
										<div class="form-group">
											<label for="check_admin" class="block">
												Utente Amministratore
											</label>
											<div class="make-switch" data-on="warning" data-off="danger">
												<input id="check_admin" name="check_admin" value="1" type="checkbox">
											</div>
										</div>
										<div class="form-group">
											<label for="check_attivo" class="block">
												Utente Attivo
											</label>
											<div class="make-switch" data-on="warning" data-off="danger">
												<input name="check_attivo" value="1" type="checkbox" checked>
											</div>
										</div>

										<div class="form-group">
											<input type="submit" class="btn btn-bricky col-sm-4" value="Salva">
										</div>											
									</div>
									
									<div id="box-check-regioni" class="col-sm-5 col-sm-offset-1">

									
									<p>Regioni associate</p>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="ABR" >
											Abruzzo
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="BAS" >
											Basilicata
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="CAL" >
											Calabria
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="CAM" >
											Campania
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="EMR" >
											Emilia-Romagna
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="FVG" >
											Friuli-Venezia-Giulia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="LAZ" >
											Lazio
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="LIG" >
											Liguria
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="LOM" >
											Lombardia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="MAR" >
											Marche
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="MOL" >
											Molise
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="PIE" >
											Piemonte
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="PUG" >
											Puglia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="SAR" >
											Sardegna
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="SIC" >
											Sicilia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="TAA" >
											Trentino Alto Adige
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="TOS" >
											Toscana
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="UMB" >
											Umbria
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="VDA" >
											Valle d'Aosta
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="VEN" >
											Veneto
										</label>

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