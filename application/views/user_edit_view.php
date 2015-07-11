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
									Modifica Utente
								</li>
							</ol>
							<div class="page-header">
								<h1>Modifica Utente <small> </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">	
						<div class="col-sm-12">

							<?php echo validation_errors(); ?>
							
							<?php if (!empty($msg)) { ?>
							<div class="panel-body">
								<div class="alert alert-block alert-success fade in">
									<h4 class="alert-heading"><i class="fa fa-check-circle"></i> Successo!</h4>
									<p><?php echo $msg; ?></p>
								</div>
							</div>
							<?php } ?>
		
							<!-- TABELLA UTENTI ATTIVI -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Modifica Anagrafica Utente
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
											<input type="text" placeholder="" id="email" name="email" value="<?php echo $dati_utente->email; ?>" class="form-control">
										</div>	
										<div class="form-group">
											<label for="nome">
												Nome e Cognome
											</label>
											<input type="text" placeholder="" id="nome" name="nome" value="<?php echo $dati_utente->nome; ?>" class="form-control">
										</div>
										<div class="form-group">
											<label for="nome">
												Codice utente univoco
											</label>
											<input type="text" placeholder="" id="codice_utente" name="codice_utente" value="<?php echo $dati_utente->codice_user; ?>" maxlength="2" class="form-control">
										</div>												
										<div class="form-group">
											<label for="username">
												Username
											</label>
											<input type="text" placeholder="" id="username" name="username" value="<?php echo $dati_utente->username; ?>" class="form-control">
										</div>	
										<div class="form-group">
											<label for="password">
												Password
											</label>
											<input type="text" placeholder="" id="password" name="password" value="<?php echo $dati_utente->password; ?>" class="form-control">
										</div>	
										<div class="form-group">
											<label for="check_admin" class="block">
												Utente Amministratore
											</label>
											<div class="make-switch" data-on="warning" data-off="danger">
												<input name="check_admin" value="1" type="checkbox" <?php if ($dati_utente->admin ==1) { echo 'checked'; } ?>>
											</div>
										</div>
										<div class="form-group">
											<label for="check_attivo" class="block">
												Utente Attivo
											</label>
											<div class="make-switch" data-on="warning" data-off="danger">
												<input name="check_attivo" value="1" type="checkbox" <?php if ($dati_utente->attivo ==1) { echo 'checked'; } ?>>
											</div>
										</div>

										<div class="form-group">
											<input type="submit" class="btn btn-bricky col-sm-4" value="Salva">
										</div>											
									</div>
									
									<?php if ($dati_utente->admin ==0) { ?>
									<div class="col-sm-5 col-sm-offset-1">
								
									<p>Regioni associate</p>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="ABR" <?php if (in_array('ABR', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Abruzzo
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="BAS" <?php if (in_array('BAS', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Basilicata
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="CAL" <?php if (in_array('CAL', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Calabria
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="CAM" <?php if (in_array('CAM', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Campania
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="EMR" <?php if (in_array('EMR', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Emilia-Romagna
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="FVG" <?php if (in_array('FVG', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Friuli-Venezia-Giulia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="LAZ" <?php if (in_array('LAZ', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Lazio
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="LIG" <?php if (in_array('LIG', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Liguria
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="LOM" <?php if (in_array('LOM', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Lombardia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="MAR" <?php if (in_array('MAR', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Marche
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="MOL" <?php if (in_array('MOL', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Molise
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="PIE" <?php if (in_array('PIE', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Piemonte
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="PUG" <?php if (in_array('PUG', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Puglia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="SAR" <?php if (in_array('SAR', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Sardegna
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="SIC" <?php if (in_array('SIC', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Sicilia
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="TAA" <?php if (in_array('TAA', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Trentino Alto Adige
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="TOS" <?php if (in_array('TOS', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Toscana
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="UMB" <?php if (in_array('UMB', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Umbria
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="VDA" <?php if (in_array('VDA', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Valle d'Aosta
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" class="flat-green" name="check_regioni[]" value="VEN" <?php if (in_array('VEN', $regioni_utente)) { ?> checked="checked" <?php } ?>>
											Veneto
										</label>

										</div>
										<?php } ?>
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