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
									Aggiungi Nuovo Referente
								</li>
							</ol>
							<div class="page-header">
								<h1>Aggiungi Nuovo Referente <small> </small></h1>
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
									Aggiungi Nuovo Referente
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
												Nome e cognome
											</label>
											<input type="text" placeholder="" name="nome_referente" value="" class="form-control">
										</div>
										<div class="form-group">
											<label for="codice">
												Mansione
											</label>
											<input type="text" placeholder="" name="mansione_referente" value="" class="form-control">
										</div>
									<div class="form-group">
										<label for="form-field-select-1">
											Livello
										</label>
										<select id="form-field-select-1" class="form-control" name="livello_referente">
											<option value="">&nbsp;</option>
											<?php foreach ($elenco_livelli as $livello) { ?>
											<option value="<?php echo $livello->id_livello; ?>"><?php echo $livello->codice_livello.'-'.$livello->descrizione_livello; ?></option>
											<?php } ?>
										</select>
									</div>
										<div class="form-group">
											<label for="codice">
												E-mail
											</label>
											<input type="text" placeholder="" name="email_referente" value="" class="form-control">
										</div>
										<div class="form-group">
											<label for="codice">
												Telefono
											</label>
											<input type="text" placeholder="" name="telefono_referente" value="" class="form-control">
										</div>
										<label class="checkbox-inline">
											<input type="checkbox" value="1" class="grey" name="econews_referente">
												Invia Econews
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" value="1" class="grey" name="nl_referente">
												Invia Newsletter
										</label>
										
										<div class="form-group">
											<input type="submit" class="btn btn-bricky col-sm-4" value="Salva">
										</div>	
									</div>	
									<input type="hidden" name="id_anagrafica" value="<?php echo $id_anagrafica; ?>">								
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