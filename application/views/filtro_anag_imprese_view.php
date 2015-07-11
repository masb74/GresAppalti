<?php include 'head.php'; ?>


<div class="container">

	<div class="col-sm-12">
		<h3>Gestione Anagrafiche Imprese</h3>
	</div>
	
	<div class="col-sm-3">
		<h4>Filtro</h4>
		<form role="form" class="filtro-anagrafiche">
			<div class="form-group">
				<label for="RagSociale">Ragione Sociale</label>
				<input type="text" class="form-control input-sm" id="RagSociale" placeholder="Inserisci la ragione sociale">
			</div>
			<div class="form-group">
				<label for="Localita">Località</label>
				<input type="text" class="form-control input-sm" id="Localita" placeholder="Inserisci la località">
			</div>
			<div class="form-group">
				<label for="provincie">Provincia</label>
				<select class="form-control input-sm">
					<option selected="selected" value="0">Seleziona una provincia</option>
					<?php foreach ($elenco_provincie as $provincia) : ?>
					<option value="<?php echo $provincia['provincia']; ?>"><?php echo $provincia['provincia']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="regione">Regione</label>
				<select class="form-control input-sm">
					<option selected="selected" value="0">Seleziona una regione</option>
					<?php foreach ($elenco_regioni as $regione) : ?>
					<option value="<?php echo $regione['id']; ?>"><?php echo $regione['regione']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<input type="hidden" id="tipologia" value="3">
			
			<button type="submit" class="btn btn-primary">Cerca</button>
		</form>
	</div>
	
	<div class="col-sm-9">
		
		
		<!--
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>Nome</th>
					<th>e-mail</th>
					<th>Username</th>
					<th>Profilo</th>
				</tr>			
			</thead>
			<tbody>
			<?php foreach ($array_utenti as $utente) { ?>
			<tr>
				<td><?php echo $utente['nome']; ?></td>
				<td><?php echo $utente['email']; ?></td>
				<td><?php echo $utente['username']; ?></td>
				<td><?php echo $utente['profilo']; ?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		-->
	</div>
</div>


<?php include 'footer.php'; ?>