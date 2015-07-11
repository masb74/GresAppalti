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
						Creazione Report
					</li>
				</ol>
				<div class="page-header">
					<h1>Creazione Report Progetti</h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
		</div>
		<!-- end: PAGE HEADER -->

		
<!-- start: PAGE CONTENT -->
	
<div class="row">
		
	<div class="col-sm-3">
	
		<h4>Filtri</h4>
		<p>Imposta i flitri e poi clicca sul bottone "Crea Report"</p>
			<?php echo form_open('report/progetti'); ?>
				<div class="form-group">
					<label for="regione">Regione</label>
					<select id="select_regione" name="select_regione" class="form-control input-sm">
						<option value="0">Tutte</option>
						<?php foreach ($elenco_regioni as $regione) : ?>
							<option value="<?php echo $regione['regioni_id']; ?>"><?php echo $regione['regione']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label>Tipo Mercato</label>
					<select id="select_mercato" name="select_mercato" class="form-control input-sm">
						<option selected="selected" value="0">Tutti</option>
						<option value="1">Pubblico</option>
						<option value="2">Privato</option>
					</select>
				</div>

				<div class="form-group">
					<label for="stato_scheda">Stato Scheda</label>
					<select id="select_stato_scheda" name="select_stato_scheda" class="form-control input-sm">
						<option selected="selected" value="0">Tutti</option>
						<option value="1">Progetto</option>
						<option value="2">Gara</option>
						<option value="3">Trattativa</option>
						<option value="4">Ordine</option>
					</select>
				</div>
				<div class="form-group" style="display:none;">
					<label for="opzione">Tipo report</label>
					<select id="tipo_report" name="tipo_report" class="form-control input-sm">
						<option value="1">File Excel</option>
						<option value="2">File PDF</option>
					</select>
				</div>
				
				<button type="submit" class="btn btn-primary">Crea Report</button>
			<?php echo form_close(); ?>

	</div>	
	
</div>



<?php include 'footer.php'; ?>