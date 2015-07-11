<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Progetto.doc");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
<style type="text/css">
body {
	font-family: "Arial", sans-serif;
	font-size: 12px;
	line-height:140%;
}
table, td, tr {
	border:none;
	border-collapse: collapse; 
}
tr.sezione {
	border-bottom:1px solid #CCCCCC;
}
</style>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr class="sezione">
    <td width="50%" style="font-size:18px" height="31">Scheda nr.<strong><?php echo $dati_progetto->id; ?></strong> - <strong>Data di creazione <?php echo date('d/m/Y', strtotime($dati_progetto->data_inserimento));  ?></strong></td>
    <td width="50%"><img src="http://www.gresappalti.it/assets/images/Keramo-4-c-Italien.png" /></td>
  </tr>
  <tr>
    <td width="50%">Stato della Gara: <strong><?php echo $stato_progetto; ?> - <?php echo $variante_progetto; ?></strong></td>
    <td width="50%">Mercato: <strong>asd</strong></td>
  <tr>
  <tr class="sezione">
    <td width="50%">Responsabile di zona: <strong><?php echo $inseritore->nome; ?></strong></td>
    <td width="50%"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="33%">Ente Appaltante: </td>
    <td width="67%"><strong><?php if ($dati_ente) { ?>
	<?php echo $dati_ente->ragione_sociale; ?><br /><?php echo $dati_ente->indirizzo; ?><br /><?php echo $dati_ente->cap; ?> <?php echo $dati_ente->localita; ?> (<?php echo $dati_ente->provincia; ?>)
	<?php } ?></strong></td>
  </tr>
  <tr>
    <td width="33%">Oggetto Appalto: </td>
    <td width="67%"><strong><?php echo $dati_progetto->oggetto; ?></strong></td>
  </tr>
  <tr>
    <td width="33%">Sede Lavori: </td>
    <td width="67%"><strong><?php echo $dati_progetto->sede_lavori; ?></strong></td>
  </tr>
  <tr>
    <td width="33%">Importo Appalto: </td>
    <td width="67%"><strong><?php echo $dati_progetto->importo_appalto; ?></strong></td>
  </tr>
  <tr class="sezione">
    <td width="33%">Ipotesi data Appalto: </td>
    <td width="67%"><strong><?php echo $dati_progetto->ipotesi_data; ?></strong></td>
  </tr>
  <tr class="sezione">
    <td width="33%">Impresa aggiudicataria: </td>
    <td width="67%"><strong><?php if ($dati_impresa) { ?>
		<?php echo $dati_impresa->ragione_sociale; ?><br /><?php echo $dati_impresa->indirizzo; ?><br /><?php echo $dati_impresa->cap; ?> <?php echo $dati_impresa->localita; ?> (<?php echo $dati_impresa->provincia; ?>)
		<?php } ?></strong></td>
  </tr>
  <tr class="sezione">
    <td width="33%">Progettista: </td>
    <td width="67%"><strong><?php if ($dati_progettista) { ?>
		<?php echo $dati_progettista->ragione_sociale; ?><br /><?php echo $dati_progettista->indirizzo; ?><br /><?php echo $dati_progettista->cap; ?> <?php echo $dati_progettista->localita; ?> (<?php echo $dati_progettista->provincia; ?>)
		<?php } ?></strong></td>
  </tr>
  <tr class="">
    <td width="33%">Note amministrative: </td>
    <td width="67%">
		<?php 
		if ($elenco_note) {
			foreach ($elenco_note as $nota) { ?>
				<?php $nota['data_inserimento'].' '.$nota['testo_nota'].'<br />'; ?>
			<?php }
		} ?>
	</td>
  </tr>
  <tr class="sezione">
    <td width="33%">Note sede lavori: </td>
    <td width="67%"><strong><?php echo $dati_progetto->note_sedelavori; ?></strong></td>
  </tr>

</table>


<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th scope="col">CODICE</th>
    <th align="left" scope="col">DESCRIZIONE</th>
    <th align="right" scope="col">METRI</th>
    <th align="right" scope="col">PESO</th>
  </tr>
  <?php 
  if ($elenco_righe) {
  foreach ($elenco_righe as $riga) { ?>
  <tr>
    <td align="center"><?php echo $riga['id_articolo']; ?></td>
    <td align="left"><?php echo $riga['descrizione']; ?> - DN <?php echo $riga['DN']; ?> - Classe <?php echo $riga['classe']; ?> - FN <?php echo $riga['FN']; ?></td>
    <td align="right"><?php echo $riga['ml']; ?></td>
    <td align="right"><?php echo $riga['tot_kg']; ?></td>
  </tr>
  <?php } } ?>
</table>



</body>
</html>