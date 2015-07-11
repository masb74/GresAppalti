<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Offerta.doc");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stampa Offerta</title>
<style type="text/css">
body {
	font-family: "Arial", sans-serif;
	font-size: 12px;
	line-height:140%;
}
table, td, tr {
	border:none;
}
</style>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" height="31">&nbsp;</td>
    <td width="50%"><img src="http://www.gresappalti.it/assets/images/Keramo-4-c-Italien.png" /></td>
  </tr>
  <tr>
    <td width="50%" height="31">&nbsp;</td>
    <td width="50%"><br /><br />Spett.le<br />
      <?php echo $rag_sociale; ?><br />
      <?php echo $indirizzo; ?><br />
      <?php echo $cap; ?> <?php echo $localita; ?> <?php echo '('.$provincia.')'; ?> 
	  <p>Sorisole, <?php echo date('d/m/Y', strtotime($data_offerta));  ?></p>
	</td>
  </tr>
  <tr>
    <td colspan="2">
        <p>Offerta nr. <strong><?php echo date('y', strtotime($data_offerta));  ?>-<?php echo $cod_utente; ?>-<?php echo $id_offerta; ?></strong></p>
        <p>&nbsp;</p>
    <p><strong>Oggetto: <?php echo $oggetto; ?></strong></p>
    <p>In riferimento alla Vostra richiesta, Vi sottoponiamo la nostra offerta per i materiali in oggetto e 
      precisamente:<br /><br />
      <strong>Tubi in Gres ceramico, con giunto a bicchiere conformi al sistema C della Norma UNI EN 295 dotati del
    marchio CE e del marchio DIN Plus nei seguenti diametri e quantit&agrave;:</strong><br /><br /></p>
	</td>
  </tr>
  <tr>
    <td colspan="2">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">	
		<?php $tot_offerta = 0;
		if ($righe) {
		foreach ($righe as $riga) { ?>
			<tr>
				<td width="50%">
					m. <?php echo number_format($riga['righeofferte_ml'], 2, ',','.'); ?> DN <?php echo $riga['righeofferte_DN']; ?> mm. <?php if ($riga['righeofferte_classe']!=0 or $riga['righeofferte_classe']!=null) { ?> classe <?php echo $riga['righeofferte_classe']; ?> <?php } ?> <?php if ($riga['righeofferte_FN']!=0 or $riga['righeofferte_FN']!=null) { ?> - FN <?php echo $riga['righeofferte_FN']; ?><?php } ?>
				</td>
				<td width="30%">
					<?php if($riga['righeofferte_mostra_sconto'] == 1) { ?>
						&euro;/m.<?php echo number_format($riga['righeofferte_euro_ml'], 2, ',','.'); ?> <?php if($riga['righeofferte_sconto']>0) { ?>- Sconto <?php echo $riga['righeofferte_sconto'];?>%<?php } ?>
					<?php } else { ?>	
						<?php $tot_netto_riga = $riga['righeofferte_euro_ml'] - ($riga['righeofferte_euro_ml']*$riga['righeofferte_sconto']/100); ?>
						&euro;/m.<?php echo number_format($tot_netto_riga, 2, ',','.'); ?> 
					<?php } ?>
				</td>
				<td width="20%" style="text-align:right;" >
					<?php 
					$tot_riga = ($riga['righeofferte_ml'] * $riga['righeofferte_euro_ml']) - ($riga['righeofferte_ml'] * $riga['righeofferte_euro_ml'] * ($riga['righeofferte_sconto']/100));
					if($stampa_totali) { ?>&euro; <?php echo number_format($tot_riga, 2, ',','.'); ?><?php } ?>
					<?php $tot_offerta = $tot_offerta + $tot_riga; ?>
				</td>
			</tr>
	<?php } } ?>
		<?php if ($stampa_totali) { ?>
		<tfoot>
			<tr>
				<td width="50%">
				</td>
				<td colspan="2" style="text-align:right;">
					<strong>Totale Offerta &euro; <?php echo number_format($tot_offerta, 2, ',','.'); ?></strong>
				</td>
			</tr>
		</tfoot>
		<?php } ?>
		
		</table>
	</td>
  </tr>
  <tr>
    <td colspan="2"><br /><br /><p>per ogni carico saranno fornite nr. <?php echo $offerte_conf_lubrificante; ?> confezioni di lubrificante da kg. 3 a &euro;/cad. 15,00</p>
      <p> <strong>Tubazioni prodotte in stabilimenti ubicati in U.E.</strong></p>
      <p> <strong>Condizioni di vendita:</strong><br />
        Prezzi: al netto di Iva di legge<br />
        Resa: <?php echo $resa; ?><br />
        Consegna: <?php echo $consegna; ?><br />
        Pagamento: <?php echo $pagamento; ?><br />
        Validit&agrave; offerta: 60 gg.<br />
      Validit&agrave; prezzi : <?php echo $validita; ?></p>
      <p><br />
    Grati per la Vostra richiesta porgiamo i nostri migliori saluti.</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $utente; ?></td>
  </tr>
</table>

</body>
</html>