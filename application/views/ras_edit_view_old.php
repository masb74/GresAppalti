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
									Visualizza/Modifica Visita
								</li>
							</ol>
							<div class="page-header">
								<h1>Visualizza/Modifica Visita</h1>
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
									Visualizza/Modifica Visita
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
												Descrizione motivo
											</label>
											<input type="text" placeholder="" id="descr_motivo" name="descr_motivo" value="<?php echo $dati_visita->motivi_descrizione; ?>" class="form-control">
											<input type="hidden" name="id_motivo" value="<?php echo $dati_visita->motivi_id; ?>">
										</div>
										
										<div class="form-group">
											<input type="submit" class="btn btn-bricky col-sm-4" value="Salva">
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