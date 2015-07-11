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
									Cerca Anagrafiche
								</li>
							</ol>
							<div class="page-header">
								<h1>Cerca Anagrafiche <small> </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					
<div class="col-md-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bell"></i>
			Cerca Anagrafiche
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
			<div class="form-group">
				<label class="col-sm-3 control-label">
					Ragione sociale <span class="symbol required"></span>
				</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="cerca_anagrafica_input" name="cerca_anagrafica_input" placeholder="Digita alcune lettere del nome" autocomplete="off">
					<div class="risultato_ricerca_anagrafica"></div>
					<input type="hidden" id="id_anagrafica" name="id_anagrafica">
					<div id="dati_anagrafica"></div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" id="btn_cerca_anagrafica_input" class="btn btn-bricky col-sm-4 pull-right" >Modifica</button>
			
			</div>
		<?php echo form_close(); ?>
	</div>
</div>

</div>
</div>

<?php include 'footer.php'; ?>