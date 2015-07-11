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
									Anagrafiche da Approvare
								</li>
							</ol>
							<div class="page-header">
								<h1>Anagrafiche da Approvare <small> </small></h1>
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
									Anagrafiche da Approvare
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
									<?php if (!empty($anagrafiche_1_temp)) : ?>
									<table id="sample-table-1" class="table table-hover">
										<thead>
											<tr>
												<th style="width:14%">Ragione Sociale</th>
												<th style="width:14%">Tipologia</th>
												<th style="width:14%">Indirizzo</th>
												<th style="width:14%">Data inserimento</th>
												<th style="width:14%">Località</th>
												<th style="width:14%">Inserito da</th>
												<th style="width:12%"></th>
											</tr>
										</thead>
										<tbody>
											
											<?php foreach ($anagrafiche_1_temp as $anagrafica_temp) { ?>
												<tr>
													<?php 
													switch ($anagrafica_temp['tipologia']) {
														case 1:
															$tipologia = 'Ente Appaltante';
															break;
														case 2:
															$tipologia = 'Progettista';
															break;
														case 3:
															$tipologia = 'Impresa';
															break;
													} ?>
													<td><?php echo $anagrafica_temp['ragione_sociale']; ?></td>
													<td><?php echo $tipologia; ?></td>
													<td><?php echo $anagrafica_temp['indirizzo']; ?></td>
													<td><?php echo date('d/m/Y', strtotime($anagrafica_temp['data_inserimento']));  ?></td>
													<td><?php echo $anagrafica_temp['localita']; ?></td>
													<td><?php echo $anagrafica_temp['nome']; ?></td>
													<td class="center">
														<div class="col-sm-4">
															<button type="submit" data-original-title="Approva" data-placement="top" id-anagrafica="<?php echo $anagrafica_temp['id']; ?>" class="btn btn-success tooltips btn-approva-anagrafica"><i class="fa clip-checkmark-circle-2"></i></button>
														</div>													
														<div class="col-sm-4">
															<a href="<?php echo site_url(); ?>/anagrafiche/rimpiazza/<?php echo $anagrafica_temp['id']; ?>"><button type="submit" data-original-title="Verifica" data-placement="top" class="btn btn-teal tooltips"><i class="fa clip-spinner-4"></i></button></a>
														</div>
														<div class="col-sm-4">
															<a href="<?php echo site_url(); ?>/anagrafiche/elimina/<?php echo $anagrafica_temp['id']; ?>"><button type="submit" data-original-title="Elimina" data-placement="top" class="btn btn-bricky tooltips"><i class="fa fa-times"></i></button></a>
														</div>														
													</td>						
												</tr>
											<?php } ?>	

										</tbody>
									</table>
									<?php else : ?>
										<p>Non ci sono Anagrafiche Enti appaltanti di Approvare</p>	
									<?php endif; ?>									
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