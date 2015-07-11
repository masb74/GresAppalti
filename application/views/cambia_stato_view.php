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
						Aggiorna Stato Progetti
					</li>
				</ol>
				<div class="page-header">
					<h1>Aggiorna Stato Progetti <small></small></h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
		</div>
		<!-- end: PAGE HEADER -->

		
<!-- start: PAGE CONTENT -->
	
<div class="row">


		
	<div class="col-sm-6">
		
									<!-- start: NOTIFICATION PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-bell"></i>
									Variazione
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<div class="alert alert-block alert-danger fade in">
										<button data-dismiss="alert" class="close" type="button">
											&times;
										</button>
										<h4 class="alert-heading">Situazione attuale progetto</h4>
										<p>
											<a href="#" class="btn btn-bricky" disabled="disabled">
												<?php echo $stato_attuale; ?>
											</a>
											<i class="fa fa-arrow-circle-o-right"></i> 
											<a href="#" class="btn btn-light-grey" disabled="disabled">
												<?php echo $variante_attuale; ?>
											</a>
										</p>
									</div>
								</div>
							</div>
</div>

<div class="col-sm-6">
	<?php echo form_open('/progetti/cambia_stato_post'); ?>	
		<input type="hidden" name="id_scheda" id="id_scheda" value="<?php echo $dati_progetto->id; ?>">
						<!-- start: NOTIFICATION PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-bell"></i>
									Variazione
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<div id="BoxAggiornamentoStato" class="alert alert-block alert-success fade in tab-content">
										<button data-dismiss="alert" class="close" type="button">
											&times;
										</button>
										<h4 class="alert-heading">Stato a cui aggiornare il progetto</h4>


										<section id="AggiornaTipoScheda">
										<fieldset>
											<div class="row">
												<div id="aggiorna-tipi-scheda" class="col-sm-12">
													<div class="radio">
														<input type="radio" name="AggiornaTipoScheda" id="AggiornaTipoScheda1" value="1">
														<label for="AggiornaTipoScheda1">Progetto</label>
													</div>
													<div class="radio">
														<input type="radio" name="AggiornaTipoScheda" id="AggiornaTipoScheda2" value="2">
														<label for="AggiornaTipoScheda2">Gara</label>
													</div>
													<div class="radio">
														<input type="radio" name="AggiornaTipoScheda" id="AggiornaTipoScheda3" value="3">
														<label for="AggiornaTipoScheda3">Trattativa</label>
													</div>
													<div class="radio">
														<input type="radio" name="AggiornaTipoScheda" id="AggiornaTipoScheda4" value="4">
														<label for="AggiornaTipoScheda4">Ordine</label>
													</div> 
												</div>
											</div>
										</fieldset>
										</section>	

										<section id="AggiornaTipoProgetto" style="display:none;">
										<fieldset>
											<div class="row">
												<div id="aggiorna-tipi-progetto" class="col-sm-12">
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto1" value="1">
														<label for="AggiornaTipoProgetto1">Preliminare</label>
													</div>
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto2" value="2">
														<label for="AggiornaTipoProgetto2">Definitivo</label>
													</div>
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto3" value="3">
														<label for="AggiornaTipoProgetto3">Esecutivo</label>
													</div>
												</div>
											</div>
										</fieldset>
										</section>	

										<section id="AggiornaTipoGara" style="display:none;">
										<fieldset>
											<div class="row">
												<div id="aggiorna-tipi-gara" class="col-sm-12">
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto4" value="4">
														<label for="AggiornaTipoProgetto4">Standard</label>
													</div>
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto5" value="5">
														<label for="AggiornaTipoProgetto5">Economicamente piu' vantaggiosa</label>
													</div>
												</div>
											</div>
										</fieldset>
										</section>	

										<section id="AggiornaTrattativa" style="display:none;">
										<fieldset>
											<div class="row">
												<div id="aggiorna-tipi-trattativa" class="col-sm-12">
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto6" value="6">
														<label for="AggiornaTipoProgetto6">Ipotesi data appalto</label>
													</div>

													
													<div id="IpotesiData" class="form-group" style="margin-left:20px; display:none;">
														<input type="text" name="InputIpotesiData" id="InputIpotesiData" class="input-mask-date">
														
													</div>
												</div>
											</div>
										</fieldset>
										</section>	

										<section id="AggiornaTipoOrdine" style="display:none;">
										<fieldset>
											<div class="row">
												<div id="aggiorna-tipi-ordine" class="col-sm-12">
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto7" value="7">
														<label for="AggiornaTipoProgetto7">Acquisito</label>
													</div>
													
													<div class="radio">
														<input type="radio" name="AggiornaTipoProgetto" id="AggiornaTipoProgetto8" value="8">
														<label for="AggiornaTipoProgetto8">Perso</label>
													</div>
												</div>
											</div>
										</fieldset>
										</section>	
	
										<section id="AggiornaTipoOrdineAcquisito" style="display:none; margin-left:20px;">
										<fieldset>
											<div class="row">
												<div id="aggiorna-tipi-ordine-acquisto" class="col-sm-12">
													<div class="form-group">
														<label for="aggiorna_nr_ordine">nr.Ordine</label>
														<input type="text" name="aggiorna_nr_ordine" id="aggiorna_nr_ordine" >
													</div>
												</div>
											</div>
										</fieldset>
										</section>

										<section id="AggiornaTipoOrdinePerso" style="display:none;  margin-left:20px;">
										<div class="form-group">
											<label for="motivo-perso">
												Motivo
											</label>
											<select class="form-control" id="motivo-perso">
												<option value="">&nbsp;</option>
												<option value="8">Concorrenza GRES</option>
												<option value="9">PVC</option>
												<option value="10">PE COR</option>
												<option value="11">PP COR</option>
												<option value="12">PRFV</option>
												<option value="13">GHISA</option>
												<option value="14">CEMENTO</option>
											</select>
										</div>
										</section>

										<section id="AggiornaSalva" style="display:none; margin-left:20px; height:50px;">
											<button class="btn btn-danger col-sm-8" type="submit">Salva</button>
										</section>
										
									</div>
								</div>
							</div>
		<?php echo form_close(); ?>					
	</div>
	

	
</div>




<?php include 'footer.php'; ?>