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
									Elimina Anagrafica Errata
								</li>
							</ol>
							<div class="page-header">
								<h1>Elimina Anagrafica Errata <small> </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">	
					<?php 
					$attributes = array('id' => 'elimina_anagrafica');
					echo form_open('', $attributes); ?>
					
						<div class="col-sm-6">

							<div class="alert alert-danger">
								<h4>Attenzione! Questa anagrafica è utilizzata nei seguenti documenti</h4>
						
								<?php 
								if ($utilizzata_progetti) {
									foreach ($utilizzata_progetti as $progetti) { 
										echo '<h6>Progetto nr. '.$progetti->id.'</h6><br />';								
									} 
								}
								?>
								<?php 
								if($utilizzata_offerte) {
									foreach ($utilizzata_offerte as $offerte) { 
										echo '<h6>Offerta nr. '.$offerte->offerte_id.'</h6><br />';								
									} 
								}
								?>
							
								<p>Come intendi proseguire?
								
									<button class="btn btn-bricky tooltips" type="submit">Elimina comunque</button> 	
									<a class="btn btn-teal tooltips" href="<?php echo site_url(); ?>/anagrafiche/rimpiazza/<?php echo $id_anagrafica; ?>">Rimpiazza</a>
									<input type="hidden" name="id_anagrafica" value="<?php echo $id_anagrafica; ?>" />
								</p>
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