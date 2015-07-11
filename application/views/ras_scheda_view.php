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
						Dettaglio visita
					</li>
				</ol>
				<div class="page-header">
					<h1>Dettaglio visita</h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
		</div>
		<!-- end: PAGE HEADER -->

		
<!-- start: PAGE CONTENT -->
	
<div class="row">
		
	<div class="col-sm-9">
		<ul>
			<li><span class="titolo">Nome agente: </span><?php echo $dettaglio_visita->nome; ?></li>
			<li><span class="titolo">Data visita: </span><?php echo date('d M, Y', strtotime($dettaglio_visita->ras_data)); ?></li>
			<li><span class="titolo">Ragione sociale: </span><?php echo $dettaglio_visita->ragione_sociale; ?></li>
			<li><span class="titolo">Nome referente: </span><?php echo $dettaglio_visita->referenti_nome; ?></li>
			<li><span class="titolo">Motivi visita: </span><?php 
			$motivi_gruppo = $dettaglio_visita->ras_motivi; 
			$arr_motivi = explode (',',$motivi_gruppo);
		
			$ci =&get_instance();
			$ci->load->model('ras_model');
			for ($i=0; $i<count($arr_motivi); $i++) {
				if ($arr_motivi[$i]!="") {	 
					$dett_motivo = $ci->ras_model->dettaglio_motivo($arr_motivi[$i]); 
					echo $dett_motivo->motivi_descrizione.' ';
				}
			}
			?></li>
			<li><span class="titolo">Note: </span><?php echo $dettaglio_visita->ras_note; ?></li>
			
		</ul>
			
				
	</div>
	
	
</div>



<?php include 'footer.php'; ?>