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
									Livelli referenti
								</li>
							</ol>
							<div class="page-header">
								<h1>Livelli referenti</h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">	
						<?php if (isset($messaggio)) { ?>
						<div class="col-sm-12">
						<div class="alert alert-block alert-success fade in">
							<button type="button" class="close" data-dismiss="alert">
								×
							</button>
							<h4 class="alert-heading"><i class="fa fa-check-circle"></i> Successo!</h4>
							<p><?php echo $messaggio; ?></p>
						</div>
						</div>
						<div class="clearfix"></div>
						<?php } ?>
						<div class="col-sm-12">
							<a href="<?php echo site_url(); ?>/ras/levref_add" class="btn btn-green ladda-button" data-style="expand-right">
											<span class="ladda-label"> Aggiungi Nuovo Livello </span>
											<i class="fa fa-plus"></i>
										</a>
						</div>
						<div class="col-sm-12">

							<!-- TABELLA UTENTI ATTIVI -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Livelli referenti
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
									<?php if (!empty($elenco_livelli)) : ?>
									<table id="sample-table-1" class="table table-hover">
										<thead>
											<tr>
												<th>Id</th>
												<th>Livello</th>
												<th>-</th>
											</tr>
										</thead>
										<tbody>
											
											<?php foreach ($elenco_livelli as $livello) { ?>
												<tr>
													<td><?php echo $livello->codice_livello; ?></td>
													<td><?php echo $livello->descrizione_livello; ?></td>
													<td class="center">
															<a href="<?php echo site_url(); ?>/ras/levref_edit/<?php echo $livello->id_livello; ?>"><button type="submit" data-original-title="Modifica" data-placement="top" class="btn btn-teal tooltips"><i class="fa fa-edit"></i></button></a>
															<a href="<?php echo site_url(); ?>/ras/levref_del/<?php echo $livello->id_livello; ?>"><button type="submit" data-original-title="Elimina" data-placement="top" class="btn btn-bricky tooltips"><i class="fa fa-times"></i></button></a>
													</td>						
												</tr>
											<?php } ?>	

										</tbody>
									</table>
									<?php else : ?>
										<p>Non ci sono livelli da modificare</p>	
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