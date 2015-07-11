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
									Gestione Utenti
								</li>
							</ol>
							<div class="page-header">
								<h1>Gestione Utenti <small> </small></h1>
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
									Tabella Utenti Attivi
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
								<?php if (!empty($array_utenti)) { ?>
									<table id="sample-table-1" class="table table-hover">
										<thead>
											<tr>
												<th style="width:10%">Cod.Utente</th>
												<th style="width:20%">Nome</th>
												<th style="width:20%">e-mail</th>
												<th style="width:20%">Username</th>
												<th style="width:20%">Password</th>
												<th style="width:10%"></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($array_utenti as $utente) { ?>
												<tr>
													<td><?php echo $utente['codice_user']; ?></td>
													<td><?php echo $utente['nome']; ?></td>
													<td><?php echo $utente['email']; ?></td>
													<td><?php echo $utente['username']; ?></td>
													<td><?php echo $utente['password']; ?></td>
													<td class="center">
														<div class="col-sm-6">
															<a href="<?php echo site_url(); ?>/utenti/modifica/<?php echo $utente['id_user']; ?>">
																<button data-original-title="Modifica" data-placement="top" class="btn btn-teal tooltips"><i class="fa fa-edit"></i></button>
															</a>
														</div>	
														<div class="col-sm-6">
															<?php echo form_open(); ?>
															<input type="hidden" name="id_user" name="id_user" value="<?php echo $utente['id_user']; ?>" />
															<input type="hidden" name="azione" name="azione" value="0" />
															<button type="submit" data-original-title="Blocca" data-placement="top" class="btn btn-bricky tooltips"><i class="fa fa-times fa fa-white"></i></button>
															<?php echo form_close(); ?>
														</div>
														
													</td>						
												</tr>
											<?php } ?>				
											
										</tbody>
									</table>
								<?php } else { ?>
								<p>Nessun utente attivo</p>
								<?php } ?>
								</div>
							</div>


							<!-- TABELLA UTENTI INATTIVI -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Tabella Utenti Disattivati
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
									<?php if (!empty($array_utenti_inattivi)) { ?>
									<table id="sample-table-1" class="table table-hover">
										<thead>
											<tr>
												<th style="width:23%">Nome</th>
												<th style="width:23%">e-mail</th>
												<th style="width:23%">Username</th>
												<th style="width:23%">Password</th>
												<th style="width:8%"></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($array_utenti_inattivi as $utente) { ?>
												<tr>
													<td><?php echo $utente['nome']; ?></td>
													<td><?php echo $utente['email']; ?></td>
													<td><?php echo $utente['username']; ?></td>
													<td><?php echo $utente['password']; ?></td>
													<td class="center">
														<div class="col-sm-6">
															<a data-original-title="Modifica" data-placement="top" class="btn btn-teal tooltips" href="#"><i class="fa fa-edit"></i></a>
														</div>
														<div class="col-sm-6">
															<?php echo form_open(); ?>
															<input type="hidden" name="id_user" name="id_user" value="<?php echo $utente['id_user']; ?>" />
															<input type="hidden" name="azione" name="azione" value="1" />
															<button type="submit" data-original-title="Riattiva" data-placement="top" class="btn btn-green tooltips"><i class="fa fa-share"></i></button>
															<?php echo form_close(); ?>
														</div>
													</td>						
												</tr>
											<?php } ?>				
										</tbody>
									</table>
								<?php } else { ?>
								<p>Nessun utente inattivo</p>
								<?php } ?>
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