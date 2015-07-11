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
									Rimpiazza Anagrafica Errata
								</li>
							</ol>
							<div class="page-header">
								<h1>Rimpiazza Anagrafica Errata <small> </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">	
					<?php 
					$attributes = array('id' => 'rimpiazza_anagrafica');
					echo form_open('', $attributes); ?>
					
						<div class="col-sm-6">

							<!-- TABELLA UTENTI ATTIVI -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Anagrafica da Rimpiazzare
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
									<?php foreach ($anagrafiche as $anagrafica) { ?> 
									
									<div class="alert alert-block alert-danger fade in">

										<h4 class="alert-heading"><i class="fa fa-times-circle"></i> Questa Anagrafica non è corretta?</h4>
										<address>
											<p><strong><?php echo $anagrafica['ragione_sociale']; ?></strong><br />
												Inserita il: <?php echo date('d/m/Y', strtotime($anagrafica['data_inserimento']));  ?><br />
												<?php echo $anagrafica['indirizzo']; ?><br />
												<?php echo $anagrafica['cap']; ?> <?php echo $anagrafica['localita']; ?> (<?php echo $anagrafica['provincia']; ?>) <br />
												Partita iva: <?php echo $anagrafica['p_iva']; ?>
											</p>
										</address>
										<input type="hidden" name="anagrafica_tipologia" id="anagrafica_tipologia" value="<?php echo $anagrafica['tipologia']; ?>">
										<input type="hidden" name="anagrafica_errata_id" id="anagrafica_errata_id" value="<?php echo $anagrafica['id']; ?>">
										<a href="http://www.gresappalti.it/index.php/anagrafiche/edit_anagrafica/<?php echo $anagrafica['id']; ?>" class="btn btn-teal tooltips" >Modifica</a>
										<a href="http://www.gresappalti.it/index.php/anagrafiche/approva_anagrafica2/<?php echo $anagrafica['id']; ?>" class="btn btn-success tooltips" >Approva</a>
					

									</div>
									<?php } ?>
								</div>
							</div>



							
						
						</div>
						
						
						
						<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Anagrafica Corretta
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
									
									<div class="alert alert-block alert-success fade in">

										<h4 class="alert-heading"><i class="fa fa-check-circle"></i> Questa è l'anagrafica corretta!</h4>
										<div class="row">

										<div class="col-md-12">
												<div class="errorHandler alert alert-danger no-display">
													<i class="fa fa-times-sign"></i> Ci sono alcuni errori. Controlla per favore.
												</div>
												<div class="successHandler alert alert-success no-display">
													<i class="fa fa-ok"></i> Tutti i dati inseriti!
												</div>
										</div>
												
										<div class="form-group">
											<label class="col-sm-3 control-label">
												Ricerca Anagrafica <span class="symbol required"></span>
											</label>
											<div class="col-sm-8">

												<input type="text" class="form-control" id="anagrafica_input" name="anagrafica_input" placeholder="Digita alcune lettere del nome">
												<div class="risultato_ricerca_anagrafica"></div>
												<input type="hidden" id="id_anagrafica" name="id_anagrafica" value="" >
												<div id="dati_anagrafica"></div>
											</div>
									
										</div>	
										</div>
										
										<div class="row" style="margin-top:30px;">
										<div class="col-sm-12">
											<button id="btn_rimpiazza_anagrafica" class="btn btn-green" type="submit">
												Rimpiazza con questa <i class="fa fa-arrow-circle-right"></i>
											</button>

										</div>
										</div>
										
										<div class="row" style="margin-top:30px;">
										<div class="col-sm-12">Attenzione! Il sistema rimpiazzerà l'anagrafica collegata in tutti i progetti, ed eliminerà definitivamente l'anagrafica errata.</div>
							
										</div>
									</div>								
									
								</div>
							</div>



							
						
						</div>	
						<?php echo form_close(); ?>
					</div>
				</div>


				<!-- end: PAGE CONTENT-->
			</div>
		</div>
		<!-- end: PAGE -->



<?php include 'footer.php'; ?>