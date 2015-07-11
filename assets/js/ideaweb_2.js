jQuery(document).ready( function() { 

	
	$(".link-post").restfulizer({
        parse: true,
        method: "POST"
	});

	$("input[name='Offerta']:radio").change(function() {
		var MercatoOffertaVal = $(this).val();
		$("#btn-continua-off-step-2").fadeIn();
		$("input#TipoOfferta").val(MercatoOffertaVal);
	});
	
	/*$("#btn-continua-off-step-2").click(function() {
	
		var OffertaRadioVal = $("input#TipoOfferta").val();
		var idProgetto = $("#cerca_progetto_input").val();
		
			$.ajax({
			type: "POST",
			url: "/index.php/offerte/crea/",
			dataType: "json",
			cache:false,
			data: {
				opz: OffertaRadioVal,
				progetto: idProgetto
			},						
			success: 
				function(dati){
					$("input#id_offerta").val(dati);
				}
        
			});		
	
	});*/	
	
	$('#aggiorna_prezzi_listino').click(function() {
		var id_listino = $('#select_listino').val();
		var id_offerta = $('#id_offerta').val();
		
		if(id_listino==0) { 
			alert('Seleziona prima un listino!');
		} else {
			$.ajax({
			type: "POST",
			url: "/index.php/ajax_offerte/aggiorna_prezzi_listino",
			dataType: "json",
			cache:false,
			async: false,
			data: {
				id_listino: id_listino,
				id_offerta: id_offerta
			},
			success: 
				function(){
					alert('Ho aggiornato i prezzi aggiornati al nuovo listino.');
					elenco_righe_offerta();
				}
			
			});					
		}	
		return false;
	});
	
	$('#select_referente').change(function() {
		var referente = $(this).val();

			$.ajax({
			type: "POST",
			url: "/index.php/ajax/dettaglio_referente",
			dataType: "json",
			cache:false,
			async: false,
			data: {
				referente: referente,
			},
			success: 
				function(data){
					
					output = data.referenti_nome+'<br />'+data.referenti_mansione+'<br />'+data.codice_livello+'-'+data.descrizione_livello;
					$('#dettagli_ref').html(output);
				}
			
			});	
		
	});
	
	$('#data_visita').change(function() {
		$('#bottone_fine_wizard').removeAttr('disabled');
	});
	
	
	$("input[name='Mercato']:radio").change(function() {
		
		var MercatoRadioVal = $(this).val();
		var id_progetto = $("input#id_progetto").val();
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/aggiorna_ajax/mercato/"+id_progetto,
			dataType: "html",
			cache:false,
			async: false,
			data: {
				testo: MercatoRadioVal
			},						
			success: 
				function(){
					$("#SezioneTipoScheda fieldset").removeAttr('disabled'); 
				}
        
			});		
		
	});

	$("input[name='TipoScheda']:radio").change(function() {
	
		var TipoSchedaRadioVal = $(this).val();
		var id_progetto = $("input#id_progetto").val();
		
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/aggiorna_ajax/stato/"+id_progetto,
			dataType: "html",
			cache:false,
			async: false,
			data: {
				testo: TipoSchedaRadioVal
			},								
			success: 
				function(){
		
					if (TipoSchedaRadioVal==1) {
						$('#SezioneSchedaGara').css('display','none');
						$('#SezioneSchedaTrattativa').css('display','none');
						$('#SezioneSchedaProgetto').css('display','block');
					} else if (TipoSchedaRadioVal==2) {
						$('#SezioneSchedaTrattativa').css('display','none');
						$('#SezioneSchedaProgetto').css('display','none');
						$('#SezioneSchedaGara').css('display','block');
					} else if (TipoSchedaRadioVal==3) {
						$('#SezioneSchedaProgetto').css('display','none');
						$('#SezioneSchedaGara').css('display','none');
						$('#SezioneSchedaTrattativa').css('display','block');
					} else {
						$('#SezioneSchedaProgetto').css('display','none');
						$('#SezioneSchedaGara').css('display','none');
						$('#SezioneSchedaTrattativa').css('display','none');
						$('#SezioneSchedaOrdine').css('display','block');
					}		
		
				}
        
			});
			return false;

	});
	
	$("input[name='TipoProgetto']:radio").change(function() {
	
		var TipoProgettoRadioVal = $(this).val();		
		var id_progetto = $("input#id_progetto").val();
		
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/aggiorna_ajax/variante/"+id_progetto,
			dataType: "html",
			cache:false,
			async: false,
			data: {
				testo: TipoProgettoRadioVal
			},
			success: 
				function(){
					$('#step-1').fadeOut(400, function() {
						$('#step-2').fadeIn();
					});					
				}
        
			});
			return false;

	});



	$("input[name='AggiornaTipoScheda']:radio").change(function() {
	
		var TipoSchedaRadioVal = $(this).val();
				
				$('#AggiornaTipoOrdineAcquisito').css('display','none');
				$('#AggiornaTipoOrdinePerso').css('display','none');
				$('#AggiornaSalva').css('display','none');
				
					if (TipoSchedaRadioVal==1) {
						$('#AggiornaTipoGara').css('display','none');
						$('#AggiornaTrattativa').css('display','none');
						$('#AggiornaTipoProgetto').css('display','block');
						$('#AggiornaTipoOrdine').css('display','none');
					} else if (TipoSchedaRadioVal==2) {
						$('#AggiornaTrattativa').css('display','none');
						$('#AggiornaTipoProgetto').css('display','none');
						$('#AggiornaTipoGara').css('display','block');
						$('#AggiornaTipoOrdine').css('display','none');
					} else if (TipoSchedaRadioVal==3) {
						$('#AggiornaTipoProgetto').css('display','none');
						$('#AggiornaTipoGara').css('display','none');
						$('#AggiornaTrattativa').css('display','block');
						$('#AggiornaTipoOrdine').css('display','none');
					} else if (TipoSchedaRadioVal==4) {
						$('#AggiornaTipoProgetto').css('display','none');
						$('#AggiornaTipoGara').css('display','none');
						$('#AggiornaTrattativa').css('display','none');
						$('#AggiornaTipoOrdine').css('display','block');
					}		
		
			return false;


	});


	$("input[name='AggiornaTipoProgetto']:radio").change(function() {
	
		var TipoSchedaRadioVal = $(this).val();
			
			$('input#IpotesiData').css('display','none');			
			$('#AggiornaSalva').css('display','none');
		
			if (TipoSchedaRadioVal<6) {
				$('#AggiornaSalva').css('display','block');
			}
			if (TipoSchedaRadioVal==6) {
				$('#IpotesiData').css('display','block');
			} 		
			if (TipoSchedaRadioVal==7) {
				$('#AggiornaTipoOrdineAcquisito').css('display','block');
				$('#AggiornaTipoOrdinePerso').css('display','none');
				$("#AggiornaTipoProgetto8").val(8);
				$("select#motivo-perso").val('');
			} else if (TipoSchedaRadioVal==8) {
				$('#AggiornaTipoOrdineAcquisito').css('display','none');
				$('#AggiornaTipoOrdinePerso').css('display','block');
				$("#aggiorna_nr_ordine").val("");
			} 
					
			return false;

	});
	


	$("input#InputIpotesiData").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere>0) {
			$('#AggiornaSalva').css('display','block');
		} else {
			$('#AggiornaSalva').css('display','none');
		}
		
		
	});


	$("#aggiorna_nr_ordine").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere>0) {
			$('#AggiornaSalva').css('display','block');
		} else {
			$('#AggiornaSalva').css('display','none');
		}
		
		
	});

	
	$("select#motivo-perso").change(function() {
		var valore = $(this).val();
		$("#AggiornaTipoProgetto8").val(valore);
		
		if (valore!='') {
			$('#AggiornaSalva').css('display','block');
		} else {
			$('#AggiornaSalva').css('display','none');
		}
	});
	
	
	$("#btn-continua-step-2").click(function() {
		$('#step-2').fadeOut(400, function() {
			$('#step-3').fadeIn();
		});
		return false;
	});
	$("#btn-continua-off-step-2").click(function() {
		$('#step-1').fadeOut(400, function() {
			$('#step-2').fadeIn();
		});
		return false;
	});
	$("#btn-continua-off-step-3").click(function() {
		$('#step-2').fadeOut(400, function() {
			elenco_righe_offerta();			
		});
		return false;
	});
	$("#btn-continua-off-step-4").click(function() {
		$('#step-3').fadeOut(400, function() {
			$('#step-4').fadeIn();
		});
		return false;
	});	

	
	
	
	$("#btn-continua-step-3").click(function() {
	
		if (controlla_campi_obbl()) {
			$('#step-3').fadeOut(400, function() {
				$('#step-4').fadeIn();
			});
		}
		return false;
	});	
	
	$(".box-passi .done.link-step-1").click(function() {
		$('.box-passi').fadeOut(400, function() {
			$('#step-1').fadeIn();
		});
		return false;
	});	
	$(".box-passi .done.link-step-2").click(function() {
		$('.box-passi').fadeOut(400, function() {
			$('#step-2').fadeIn();
		});
		return false;
	});	
	$(".box-passi .done.link-step-3").click(function() {
		$('.box-passi').fadeOut(400, function() {
			$('#step-3').fadeIn();
		});
		return false;
	});	
	$(".box-passi .done.link-step-4").click(function() {
		$('.box-passi').fadeOut(400, function() {
			$('#step-4').fadeIn();
		});
		return false;
	});		

	
	$("#cerca_anagrafica_input").keyup(function() { 
		
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			
			
			//setTimeout(function (){
			var stringa = $(this).val();
			
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax/99/",
			data: {
				stringa: stringa
				},				
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$.blockUI();
					var output = "<table id='tabella_ricerca'>";
					for (var i = 0; i < data.length; i++) {
						if (data[i].tipologia==1) { var tipo = 'Ente Appaltante'}
						if (data[i].tipologia==2) { var tipo = 'Progettista'}
						if (data[i].tipologia==3) { var tipo = 'Impresa'}
						output = output + '<tr onclick="ricerca_input('+data[i].id+',99)"><td>' + data[i].ragione_sociale + '</td><td style="color:red;">' + tipo + '</td></tr>';
					
					}
					output = output +'</table>';

					$(".risultato_ricerca_anagrafica").html(output);
					$.unblockUI();

				}
        
			});

			return false;
			//},100);
		} else {
			$("#id_ente_appaltante").val('');
		}
    });
	
	
	
	$("#cerca_anagrafica_ras_input").keyup(function() { 
		
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			
			
			//setTimeout(function (){
			var stringa = $(this).val();
			
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax/99/",
			data: {
				stringa: stringa
				},				
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$.blockUI();
					var output = "<table id='tabella_ricerca'>";
					for (var i = 0; i < data.length; i++) {
						if (data[i].tipologia==1) { var tipo = 'Ente Appaltante'}
						if (data[i].tipologia==2) { var tipo = 'Progettista'}
						if (data[i].tipologia==3) { var tipo = 'Impresa'}
						output = output + '<tr onclick="ricerca_input_ras('+data[i].id+',99)"><td>' + data[i].ragione_sociale + '</td><td style="color:red;">' + tipo + '</td></tr>';
					
					}
					output = output +'</table>';

					$(".risultato_ricerca_anagrafica").html(output);
					$.unblockUI();

				}
        
			});

			return false;
			//},100);
		} else {
			$("#id_ente_appaltante").val('');
		}
    });

	
	
	
	$("#ente_appaltante_input").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			var stringa = $(this).val();

			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax/1/",
			data: {
				stringa: stringa
				},				
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var output = "<table id='tabella_ricerca'>";
					for (var i = 0; i < data.length; i++) {
						output = output + '<tr onclick="ricerca_input('+data[i].id+','+data[i].tipologia+')"><td>'+data[i].ragione_sociale+'</td></tr>';
					}
					output = output +"</table>";

					$(".risultato_ricerca_ente").html(output);
				}
        
			});

			return false;
		} else {
			$("#id_ente_appaltante").val('');
		}
    });

	$("#progettista_input").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			var stringa = $(this).val();
	  
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax/2/",
			data: {
				stringa: stringa
				},				
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var output = "<table id='tabella_ricerca'>";
					for (var i = 0; i < data.length; i++) {
						output = output + '<tr onclick="ricerca_input('+data[i].id+','+data[i].tipologia+')"><td>'+data[i].ragione_sociale+'</td></tr>';
					}
					output = output +"</table>";

					$(".risultato_ricerca_prog").html(output);
				}
        
			});

			return false;
		} else {
			$("#id_progettista").val('');
		}
});
	
	$("#impresa_input").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			var stringa = $(this).val();

			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax/3/",
			data: {
				stringa: stringa
				},				
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var output = "<table id='tabella_ricerca'>";
					for (var i = 0; i < data.length; i++) {
						output = output + '<tr onclick="ricerca_input('+data[i].id+','+data[i].tipologia+')"><td>'+data[i].ragione_sociale+'</td></tr>';
					}
					output = output +"</table>";

					$(".risultato_ricerca_impresa").html(output);
				}
        
			});


			return false;
		} else {
			$("#id_impresa").val('');
		}		
		
    });	
	
	$("#ras_filtro_input").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			var stringa = $(this).val();

			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax/99/",
			data: {
				stringa: stringa
				},				
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var output = "<table id='tabella_ricerca'>";
					for (var i = 0; i < data.length; i++) {
						output = output + '<tr onclick="offerta_ricerca_input('+data[i].id+','+data[i].tipologia+')"><td>'+data[i].ragione_sociale+'</td></tr>';
					}
					output = output +"</table>";

					$(".risultato_ricerca_impresa").html(output);
				}
        
			});


			return false;
		} else {
			$("#id_impresa").val('');
		}		
		
    });	

	
	$("#offerta_impresa_input").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			var stringa = $(this).val();

			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax/99/",
			data: {
				stringa: stringa
				},				
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var output = "<table id='tabella_ricerca'>";
					for (var i = 0; i < data.length; i++) {
						if (data[i].tipologia==1) { var tipo = 'Ente Appaltante'}
						if (data[i].tipologia==2) { var tipo = 'Progettista'}
						if (data[i].tipologia==3) { var tipo = 'Impresa'}
						output = output + '<tr onclick="offerta_ricerca_input('+data[i].id+','+data[i].tipologia+')"><td>'+data[i].ragione_sociale+'</td><td style="color:red;">'+tipo+'</td></tr>';
					}
					output = output +"</table>";

					$(".risultato_ricerca_impresa").html(output);
				}
        
			});


			return false;
		} else {
			$("#id_impresa").val('');
		}		
		
    });	



    
    	
	$("#anagrafica_input").keyup(function() { 
		
		var anagrafica_tipologia = $('input#anagrafica_tipologia').val();
		var nr_lettere = $(this).val().length;
		var anagrafica_errata_id = $('input#anagrafica_errata_id').val();
		if (nr_lettere > 2) {
			var stringa = $(this).val();
	  
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_ajax_2/"+anagrafica_tipologia,
			dataType: "json",
			data: {
				stringa: stringa,
				anagrafica_errata_id: anagrafica_errata_id
				},				
			cache:false,
			async: false,
			success: 
				function(data){
					var output = "<table id='tabella_ricerca' class='table table-bordered table-hover table-full-width'>";
					for (var i = 0; i < data.length; i++) {
						output = output + '<tr onclick="ricerca_input_generico('+data[i].id+','+anagrafica_tipologia+')"><td>' + data[i].ragione_sociale + '</td></tr>';
					}
					output = output +'</table>';

					jQuery(".risultato_ricerca_anagrafica").html(output);				
				
				
				}
        
			});

			return false;
		} else {
			$("#id_anagrafica").val('');
		}
    });	
	
	$("#sede_lavori_input").keyup(function() { 
		
		var nr_lettere = $(this).val().length;
		if (nr_lettere > 2) {
			var stringa = $(this).val();
	  
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/cerca_citta/"+stringa,
			dataType: "html",
			cache:false,
			async: false,
			success: 
				function(data){
					$(".risultato_ricerca_citta").html(data); 
				}
        
			});

			return false;
		} else {
			$("#id_ente_appaltante").val('');
		}
    });

	
	$("#select_dn").change(function() {
		var valore_classe = $(this).val();

		if (valore_classe != 0) {
			
			
			
			$.ajax({
				type: "POST",
				url: "/index.php/ajax/select_classe/"+valore_classe,
				dataType: "html",
				cache:false,
				async: false,
				success: 
					function(data){
						$('#select_classe').html(data);
						$("#select_classe").removeAttr('disabled');
					}
			});
		}
		
	});
	
	$("#select_classe").change(function() {
		$('input#metri_lineari').removeAttr('disabled');
		$( "input#metri_lineari" ).focus();
	});
	
	$( "input#metri_lineari" ).keyup(function() {
		var stringa = $(this).val().length;
		if (stringa>0) {
			$("#btn_inserisci_riga").removeAttr('disabled');
			$("#btn_inserisci_riga_offerta").removeAttr('disabled');
		} else {
			$("#btn_inserisci_riga").attr('disabled','disabled');
			$("#btn_inserisci_riga_offerta").attr('disabled','disabled');
		} 
	});


	$("#btn_inserisci_riga_offerta").click(function() {
		
		$.blockUI();
		//controlla se il listino è selezionato
		var listino = $('#select_listino').val();
		if (listino==0) { 
			alert ('Seleziona il listino da utilizzare');
			return false;
			}
			
		var id_art = $('#select_classe').val();
		var dn = $('#select_dn').val();
		var ml = $('#metri_lineari').val();
		var id_offerta = $('input#id_offerta').val();
		
			
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/aggiungi_riga_offerte",
			data: {
				id_art: id_art,
				ml: ml,
				id_offerta: id_offerta,
				listino: listino
				},			
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(){
					elenco_righe_offerta();					
				}
        
		});		
				

		return false;
		
		
	});

	
	$("#btn_inserisci_riga").click(function() {
		
		//controlla se il listino è selezionato
		var listino = $('#select_listino').val();
		if (listino==0) { 
			alert ('Seleziona il listino da utilizzare');
			return false;
			}
		
		$.blockUI();
		
		var id_art = $('#select_classe').val();
		var dn = $('#select_dn').val();
		var ml = $('#metri_lineari').val();
		var id_progetto = $('input#id_progetto').val();
		
			
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/aggiungi_riga_progetti",
			data: {
				id_art: id_art,
				ml: ml,
				id_progetto: id_progetto,
				listino: listino
				},			
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(dati){
					
					$('#corpo_tab_righe_progetto').empty();
					
					for (i = 0 ; i < dati.length; i++) {
						var output = '<tr id="riga_progetto_'+ dati[i].id +'"><td>'+ dati[i].descrizione +'</td><td>';
						output += dati[i].classe + '</td><td>' + dati[i].DN + '</td><td>';
						output += dati[i].ml + '</td><td>' + number_format(dati[i].kg_ml, 2, ',', '.') + '</td><td>';
						output += number_format(dati[i].euro_ml, 2, ',', '.') + '</td><td>' + number_format(dati[i].tot_kg, 2, ',', '.') + '</td><td>' + number_format(dati[i].tot_euro, 2, ',', '.');
						output += '</td>',
						output += '<td><a data-original-title="Modifica" data-placement="top" class="btn btn-teal tooltips" href="#" style="margin-right:5px;"><i class="fa fa-edit"></i></a><a data-original-title="Elimina" data-placement="top" class="btn btn-yellow tooltips" href="#" onclick="elimina_riga_scheda('+ dati[i].id +');"><i class="fa fa-times fa fa-white"></i></a></td></tr>';
						$('#box_righe_progetto > table > tbody').append(output);
					}
					
					$('#select_classe').val(0);
					$('#select_dn').val(0);
					$('#select_classe').attr('disabled','disabled');
					$('#metri_lineari').val('');
					$('#metri_lineari').attr('disabled','disabled');
					$("#btn_inserisci_riga").attr('disabled','disabled');
					
					somma_righe_progetto();

				}
        
		});		
				

		return false;
		
		
	});

	$("#aggiorna_sc_righe").click(function() {
		
		
		
		
		var id_offerta = $('input#id_offerta').val();
		var sconto = $('input#offerta_sc_testata').val();
		
			
		$.ajax({
			type: "POST",
			url: "/index.php/ajax_offerte/aggiorna_sconti_righe",
			data: {
				id_offerta: id_offerta,
				sconto: sconto
				},			
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(dati){
					
					$('input#offerta_sc_testata').val(0);
					
					elenco_righe_offerta();

				}
        
		});		
				

		return false;
		
		
	});

	$("#oggetto_appalto").focusout(function() {
	var id_progetto = $("input#id_progetto").val();
	var testo = $("#oggetto_appalto").val();
		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_ajax/oggetto/"+id_progetto,
		dataType: "html",
		data: {
			testo: testo
		},			
		cache:false,
		async: false
		});	
	});
	$("#importo_appalto").focusout(function() {
	var id_progetto = $("input#id_progetto").val();
	var t = $(this).val();
	var testo = t.replace(/\./g, '');

		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_ajax/importo_appalto/"+id_progetto,
		dataType: "html",
		cache:false,
		async: false,
		data: {
			testo: testo
		}			

		});	
	});

	$("#note_sede_lavori").focusout(function() {
	var id_progetto = $("input#id_progetto").val();
	var testo = $(this).val();

		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_ajax/note_sedelavori/"+id_progetto,
		dataType: "html",
		cache:false,
		async: false,
		data: {
			testo: testo
		}			

		});	
	});
	
	$("#ipotesi_data_appalto").focusout(function() {
	var id_progetto = $("input#id_progetto").val();
	var testo = $(this).val();
		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_data_ajax/ipotesi_data/"+id_progetto,
		dataType: "html",
		cache:false,
		async: false,
		data: {
			testo: testo
		}			

		});	
	});

	
	$("button#add_new_ente").click(function() {

	var newente_rag_sociale = $('#newente_rag_sociale').val();
	var newente_email = $('#newente_email').val();
	var newente_indirizzo = $('#newente_indirizzo').val();
	var newente_cap = $('#newente_cap').val();
	var newente_localita = $('#newente_localita').val();
	var newente_provincia = $('#newente_provincia').val();
	var newente_piva = $('#newente_piva').val();
	var newente_telefono = $('#newente_telefono').val();
	var newente_fax = $('#newente_fax').val();
	var id_inseritore = $('#id_user_attuale').val();
	
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/add_new_anagrafica/1",
			dataType: "html",
			data: {
				rag_sociale: newente_rag_sociale,
				indirizzo: newente_indirizzo,
				cap: newente_cap,
				localita: newente_localita,
				provincia: newente_provincia,
				p_iva: newente_piva,
				telefono: newente_telefono,
				fax: newente_fax,
				id_user_inseritore: id_inseritore,
				email: newente_email
				},
			cache:false,
			async: false,
			success: 
				function(data){
					ricerca_input(data,1);					

					$.ajax({
						type: "POST",
						url: "/index.php/ajax/spedisci_email",
						dataType: "html",
						cache:false,
						async: false
						});

				}
			});	
		
		$('#modal_nuovo_ente').modal('hide')
		$('#modal_nuovo_ente').on('hidden.bs.modal', function () {
			$(this).find('input').val('');
		})

		return false;
	
	});

	$("button#add_new_nota").click(function() {

	var newnota_testo = $('#testo-nuova-nota').val();
	var id_progetto = $('input#id_progetto').val();
	if (newnota_testo!= "") {
	
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/add_new_nota",
			dataType: "html",
			data: {
				newnota_testo: newnota_testo,
				id_progetto: id_progetto
				},
			cache:false,
			success: 
				function(){
					$.ajax({
						type: "POST",
						url: "/index.php/ajax/elenco_note",
						dataType: "json",
						data: {
							id_progetto: id_progetto
						},
						cache:false,
						async: false,
						success: 
							function(data){
							
							$('#tabella_note > tbody').empty();
							
							for (i = 0 ; i < data.length; i++) {
							
							var data_mysql = data[i].data_inserimento;
							var data2 = data_mysql.substr(0,10);
							var t = data2.split("-");
							
//							var data_js = new Date(t[0], t[1], t[2],0,0,0);
//							var data_formattata = data_js.getDate() + '-' + data_js.getMonth() + '-' + data_js.getFullYear();

							var data_formattata = t[2] + '-' + t[1] + '-' + t[0];

								var output = '<tr><td width="30%">';
								output += data_formattata + '</td><td width="70%">' + data[i].testo_nota + '</td>';
								output += '</tr>';
								$('#tabella_note > tbody').append(output);
							}

						}
					});
			
				}
			});	
		$('#modal_nuova_nota').modal('hide')
		$('#modal_nuova_nota').on('hidden.bs.modal', function () {
			$(this).find('textarea').val('');
		})

		
	}

		return false;
	
	});
	
	
	$("button#add_new_progettista").click(function() {

	var newente_rag_sociale = $('#newprogettista_rag_sociale').val();
	var newente_email = $('#newprogettista_email').val();
	var newente_indirizzo = $('#newprogettista_indirizzo').val();
	var newente_cap = $('#newprogettista_cap').val();
	var newente_localita = $('#newprogettista_localita').val();
	var newente_provincia = $('#newprogettista_provincia').val();
	var newente_piva = $('#newprogettista_piva').val();
	var newente_telefono = $('#newprogettista_telefono').val();
	var newente_fax = $('#newprogettista_fax').val();
	var id_inseritore = $('#id_user_attuale').val();
	
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/add_new_anagrafica/2",
			dataType: "html",
			data: {
				rag_sociale: newente_rag_sociale,
				indirizzo: newente_indirizzo,
				cap: newente_cap,
				localita: newente_localita,
				provincia: newente_provincia,
				p_iva: newente_piva,
				telefono: newente_telefono,
				fax: newente_fax,
				id_user_inseritore: id_inseritore,				
				email: newente_email				
				},
			cache:false,
			async: false,
			success: 
				function(data){
					ricerca_input(data,2);					

					$.ajax({
						type: "POST",
						url: "/index.php/ajax/spedisci_email",
						dataType: "html",
						cache:false,
						async: false
						});

				}
			});	
		
		$('#modal_nuovo_progettista').modal('hide')
		$('#modal_nuovo_progettista').on('hidden.bs.modal', function () {
			$(this).find('input').val('');
		})
		return false;
	});	


	$("button#add_new_impresa").click(function() {

	var newente_rag_sociale = $('#newimpresa_rag_sociale').val();
	var newente_email = $('#newimpresa_email').val();
	var newente_indirizzo = $('#newimpresa_indirizzo').val();
	var newente_cap = $('#newimpresa_cap').val();
	var newente_localita = $('#newimpresa_localita').val();
	var newente_provincia = $('#newimpresa_provincia').val();
	var newente_piva = $('#newimpresa_piva').val();
	var newente_telefono = $('#newimpresa_telefono').val();
	var newente_fax = $('#newimpresa_fax').val();
	var id_inseritore = $('#id_user_attuale').val();
	
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/add_new_anagrafica/3",
			dataType: "html",
			data: {
				rag_sociale: newente_rag_sociale,
				indirizzo: newente_indirizzo,
				cap: newente_cap,
				localita: newente_localita,
				provincia: newente_provincia,
				p_iva: newente_piva,
				telefono: newente_telefono,
				fax: newente_fax,
				id_user_inseritore: id_inseritore,
				email: newente_email				
				},
			cache:false,
			async: false,
			success: 
				function(data){
					ricerca_input(data,3);

					$.ajax({
						type: "POST",
						url: "/index.php/ajax/spedisci_email",
						dataType: "html",
						async: false,
						cache:false,
						});
			
				}
			});	
		
		$('#modal_nuova_impresa').modal('hide');
		$('#modal_nuova_impresa').on('hidden.bs.modal', function () {
			$(this).find('input').val('');
		})
		return false;
	});	


	
	$("button#salva_nuovo_referente").click(function() {

	var nome_referente = $('#nome_referente').val();
	var mansione_referente = $('#mansione_referente').val();
	var livello_referente = $('#livello_referente').val();
	var email_referente = $('#email_referente').val();
	var telefono_referente = $('#telefono_referente').val();
	var econews_referente = $('#econews_referente:checked').val();
	var nl_referente = $('#nl_referente:checked').val();
	var id_anagrafica = $('#id_anagrafica').val();
	
	if (!nome_referente || !livello_referente) { alert ('Nome referente e livello OBBLIGATORI!'); return false;}	
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/referente_add",
			dataType: "html",
			data: {
				referenti_nome: nome_referente,
				referenti_mansione: mansione_referente,
				referenti_livello: livello_referente,
				referenti_email: email_referente,
				referenti_telefono: telefono_referente,
				referenti_econews: econews_referente,
				referenti_newsletter: nl_referente,
				referenti_anagrafica: id_anagrafica
				},
			cache:false,
			async: false,
			success: function(data){
				elenco_referenti();
				
			}
			});	
		
		
		
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/popola_select_referenti/"+id_anagrafica,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$("#select_referente").empty();
					var output = '<option value="">&nbsp;</option>';
					for (var i = 0; i < data.length; i++) {
						output = output + '<option value="'+data[i].referenti_id+'">'+data[i].referenti_nome+'</option>'; 
					}
					$("#select_referente").append(output);
				}
        
		});
		
		
		
		
		$('#modal-referenti').modal('hide');
		$('#modal-referenti').on('hidden.bs.modal', function () {
			$(this).find('input[type="text"]').val('');
		})
		return false;		
	});	
	
	$('.btn-approva-anagrafica').click(function() {
	
		var id_anagrafica = $(this).attr('id-anagrafica');
		
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/approva_anagrafica/"+id_anagrafica,
			dataType: "html",
			cache:false,
			async: false
			});
		$(this).parents('tr').fadeOut();

	});

	$('#check_admin').change(function() {
		
		var valore = $(this).prop('checked');
		
		if (valore) {
			$('#box-check-regioni').fadeOut();
		} else {
			$('#box-check-regioni').fadeIn();		
		}
		
	});


	
});


function aggiorna_campo_offerta(campo,valore) {

	var id_offerta = $("input#id_offerta").val();
	
	
		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_ajax_offerte/"+campo+"/"+id_offerta,
		dataType: "json",
		cache:false,
		async: false,
		data: {
			testo: valore
		}
		});

		return false;
			
}


function assegna_id_sede_appalto(id_anagrafica) {
	
		$(".risultato_ricerca_citta").empty();
		
		var id_progetto = $("input#id_progetto").val();

		
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/dettaglio_citta/"+id_anagrafica,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var comune = data.comune + ' (' + data.provincia + ')';
					//$("#sede_lavori_input").val(comune);
					$("#sede_lavori_input").val(data.comune);
					$("#id_sede_lavori").val(data.comune);
					$("#id_regione").val(data.regione);
					var id_sede_lavori = $("#id_sede_lavori").val();
					var id_regione = $("#id_regione").val();
					$.ajax({
						type: "POST",
						url: "/index.php/ajax/aggiorna_ajax/sede_lavori/"+id_progetto,
						dataType: "html",
						data: {
							testo: id_sede_lavori
						},
						cache:false
					});
					$.ajax({
						type: "POST",
						url: "/index.php/ajax/aggiorna_ajax/regione_lavori/"+id_progetto,
						dataType: "html",
						data: {
							testo: id_regione
						},
						cache:false
					});



				}
        
		});
		return false;
}

function offerta_ricerca_input(id_anagrafica) {

	var id_offerta = $("input#id_offerta").val();
	
	
		$(".risultato_ricerca_impresa").empty();

		/*$.ajax({
		type: "POST",
		url: "/index.php/offerte/aggiorna_ajax/offerte_impresa/"+id_offerta,
		dataType: "html",
		cache:false,
		data: {
			testo: id_anagrafica
		}
		});*/

		$.ajax({
			type: "POST",
			url: "/index.php/ajax/assegna_anagrafica/"+id_anagrafica,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$("#offerta_impresa_input").val(data.ragione_sociale);
					$("#ras_filtro_input").val(data.ragione_sociale);
					$("#id_impresa").val(data.id);
					$("#dati_impresa").html(data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
					$('#btn-continua-off-step-3b').fadeIn();
				}
        
		});
		
		
		
		return false;
			
}


function ricerca_input(id_anagrafica,tipologia) {

	var id_progetto = $("input#id_progetto").val();
	
	if (tipologia == 1) {
	
		$(".risultato_ricerca_ente").empty();

		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_ajax/id_ente_appaltante/"+id_progetto,
		dataType: "html",
		cache:false,
		async: false,
		data: {
			testo: id_anagrafica
		}
		});

		$.ajax({
			type: "POST",
			url: "/index.php/ajax/assegna_anagrafica/"+id_anagrafica,
			dataType: "json",
			cache:false,
			success: 
				function(data){
					$("#ente_appaltante_input").val(data.ragione_sociale);
					$("#id_ente_appaltante").val(data.id);
					$("#dati_ente").html(data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
				}
        
		});
		
		return false;
	}
	if (tipologia == 2) {
		$(".risultato_ricerca_prog").empty();

		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_ajax/id_progettista/"+id_progetto,
		dataType: "html",
		cache:false,
		async: false,
		data: {
			testo: id_anagrafica
		}
		});

		$.ajax({
			type: "POST",
			url: "/index.php/ajax/assegna_anagrafica/"+id_anagrafica,
			dataType: "json",
			cache:false,
			success: 
				function(data){
					$("#progettista_input").val(data.ragione_sociale);
					$("#id_progettista").val(data.id);
					$("#dati_progettista").html(data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
				}
        
		});
		return false;
	}
	if (tipologia == 3) {
		$(".risultato_ricerca_impresa").empty();

		$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_ajax/id_impresa/"+id_progetto,
		dataType: "html",
		cache:false,
		async: false,
		data: {
			testo: id_anagrafica
		}
		});
		
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/assegna_anagrafica/"+id_anagrafica,
			dataType: "json",
			cache:false,
			success: 
				function(data){
					$("#impresa_input").val(data.ragione_sociale);
					$("#offerta_impresa_input").val(data.ragione_sociale);
					$("#id_impresa").val(data.id);
					$("#dati_impresa").html(data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
				}
        
		});
		return false;
	}
	if (tipologia == 99) {
		$(".risultato_ricerca_anagrafica").empty();

		$.ajax({
			type: "POST",
			url: "/index.php/ajax/assegna_anagrafica/"+id_anagrafica,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$("#cerca_anagrafica_input").val(data.ragione_sociale);
					$("#id_anagrafica").val(data.id);
					$("#dati_anagrafica").html(data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
					$("#btn_cerca_anagrafica_input").fadeIn();
					
				}
        
		});
		return false;
	}
			
}

function ricerca_input_ras(id_anagrafica) {

		$(".risultato_ricerca_anagrafica").empty();

		$.ajax({
			type: "POST",
			url: "/index.php/ajax/assegna_anagrafica/"+id_anagrafica,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$("#cerca_anagrafica_ras_input").val(data.ragione_sociale);
					$("#ras_anagrafica_modal").html('<strong>'+data.ragione_sociale+'</strong><br />'+data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
					$("#id_anagrafica").val(data.id);
					$("#dati_anagrafica").html(data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
					$("#btn_cerca_anagrafica_input").fadeIn();
				}
        
		});

		popola_select_referenti(id_anagrafica);
			
}

function popola_select_referenti(id_anagrafica,referente) {

		$.ajax({
			type: "POST",
			url: "/index.php/ajax/popola_select_referenti/"+id_anagrafica,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$("#select_referente").empty();
					var output = '<option value="">&nbsp;</option>';
					for (var i = 0; i < data.length; i++) {
						output = output + '<option ';
						if(data[i].referenti_id==referente) {
							output = output + 'selected ';
						}
						output = output + 'value="'+data[i].referenti_id+'">'+data[i].referenti_nome+'</option>';
					}
					$("#select_referente").append(output);
				}
        
		});
		return false;
}

function ricerca_input_generico(id_anagrafica, tipologia) {

	
		$(".risultato_ricerca_anagrafica").empty();

		$.ajax({
			type: "POST",
			url: "/index.php/ajax/assegna_anagrafica/"+id_anagrafica,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					$("#anagrafica_input").val(data.ragione_sociale);
					$("#id_anagrafica").val(data.id);
					$("#dati_anagrafica").html(data.indirizzo+'<br />'+data.cap+' '+data.localita+' ('+data.provincia+')');
				}
        
		});
		
		return false;
}

function elimina_riga_offerta(id_riga) {
	
	
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/elimina_riga_offerta/"+id_riga,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var riga_progetto = "#riga_offerta_" + data;
					$(riga_progetto).fadeOut();
				}
        
		});
		
		somma_righe_progetto();
	
				
	return false;

}

function elimina_riga_scheda(id_riga) {
	
	
		$.ajax({
			type: "POST",
			url: "/index.php/ajax/elimina_righe_progetti/"+id_riga,
			dataType: "json",
			cache:false,
			async: false,
			success: 
				function(data){
					var riga_progetto = "#riga_progetto_" + data;
					$(riga_progetto).fadeOut();
				}
        
		});
		
		somma_righe_progetto();
	
				
	return false;

}


function somma_righe_progetto() {

		var id_progetto = $('input#id_progetto').val();
					$.ajax({
						type: "POST",
						url: "/index.php/ajax/somme_righe_progetto",
						data: {
							id_progetto: id_progetto
						},			
						dataType: "json",
						cache:false,
						async: false,
						success: 
							function(dati){

								var sum_euro = parseFloat(dati.somma_euro).toFixed(2);
								var sum_kg = parseFloat(dati.somma_kg).toFixed(2);

								$('td#somma_kg').html('<strong>Tot Tons '+number_format(sum_kg, 2, ',', '.')+'</strong>');
								$('td#somma_euro').html('<strong>Tot Euro '+number_format(sum_euro, 2, ',', '.')+'</strong>');
								$.unblockUI();
							}
        
					});		
					
	return false;


}

function elenco_righe_offerta()
{
	var id_offerta = $('input#id_offerta').val();
			
	$.ajax({
		type: "POST",
		url: "/index.php/ajax/elenco_righe",
		data: {
			id_offerta: id_offerta
			},				
		dataType: "json",
		cache:false,
		async: false,
		success: 
			function(data){
				var output;
				
				for (var i = 0; i < data.length; i++) {
					output = output + '<tr class="riga_offerta" id="riga_offerta_'+data[i].righeofferte_id+'">';
					output = output + '<td>' + data[i].righeofferte_descrizione + '</td>';
					output = output + '<td>' + data[i].righeofferte_classe + '</td>';
					output = output + '<td>' + data[i].righeofferte_DN + '</td>';
					output = output + '<td><input type="text" class="form-control riga_off_ml" value="' + data[i].righeofferte_ml + '" disabled></td>';
					output = output + '<td><input type="text" class="form-control riga_off_kgml" value="' + number_format(data[i].righeofferte_kg_ml, 2, ',', '.') + '" disabled></td><td><input type="text" class="form-control riga_off_euroml" value="' + number_format(data[i].righeofferte_euro_ml, 2, ',', '.') + '" disabled></td><td class="riga_off_sconto"><input type="text" class="form-control riga_off_sconto" value="' + data[i].righeofferte_sconto + '" disabled></td>';
					output = output + '<td style="text-align:center;"><input onChange="aggiorna_flag_sconto('+data[i].righeofferte_id+')" value="1" type="checkbox" ';
					if (data[i].righeofferte_mostra_sconto==1) {
						output = output + 'checked'; } 
					output = output + '></td>';
					output = output + '<td>' + number_format(data[i].righeofferte_tot_kg, 2, ',', '.') + '</td><td>' + number_format(data[i].righeofferte_tot_euro, 2, ',', '.') + '</td><td><a onclick="modifica_riga_offerta('+data[i].righeofferte_id+');return false;" style="margin-right:5px;" href="#" class="btn-modifica-riga-off btn btn-teal tooltips" data-placement="top" data-original-title="Modifica"><i class="fa fa-edit"></i></a><a style="display:none;margin-right:5px;" onclick="salva_riga_offerta('+data[i].righeofferte_id+');return false;" href="#" class="btn-salva-riga-off btn btn-red tooltips" data-placement="top" data-original-title="Salva"><i class="fa fa-floppy-o fa fa-white"></i></a><a style="margin-right:5px;" onclick="elimina_riga_offerta('+data[i].righeofferte_id+');return false;" href="#" class="btn btn-yellow tooltips" data-placement="top" data-original-title="Elimina"><i class="fa fa-times fa fa-white"></i></a></td></tr>';
					
				
				}
				$('#corpo_tab_righe_progetto').html(output);
	
			}
		});
		
						$('#step-3').fadeIn();
				
					$('#select_classe').val(0);
					$('#select_dn').val(0);
					$('#select_classe').attr('disabled','disabled');
					$('#metri_lineari').val('');
					$('#metri_lineari').attr('disabled','disabled');
					$("#btn_inserisci_riga").attr('disabled','disabled');
				$.unblockUI();
}

function aggiorna_flag_sconto (id_riga){
	
	$.blockUI();
	$.ajax({
		type: "POST",
		url: "/index.php/ajax_offerte/aggiorna_flag_sconto",
		data: {
			id_riga: id_riga
			},				
		dataType: "json",
		cache:false,
		async: false,
		success: 
			function(){
				$('#corpo_tab_righe_progetto').empty();
				elenco_righe_offerta();
			}
		});
		
}
function modifica_riga_offerta(idriga)
{
	$('tr#riga_offerta_'+idriga+' > td > input.riga_off_ml').prop('disabled', false);
	$('tr#riga_offerta_'+idriga+' > td > input.riga_off_euroml').prop('disabled', false);
	$('tr#riga_offerta_'+idriga+' > td > input.riga_off_sconto').prop('disabled', false);
	$('tr#riga_offerta_'+idriga+' > td > a.btn-modifica-riga-off').hide();
	$('tr#riga_offerta_'+idriga+' > td > a.btn-salva-riga-off').show();
	
	
	return false;

}

function converti_formato_decimali($numero)
{
	$numero_convertito = $numero.replace(",", ".");
	return $numero_convertito;	
}

function salva_riga_offerta(idriga)
{
	
	$.blockUI();
	
	var riga_off_ml = converti_formato_decimali($('tr#riga_offerta_'+idriga+' > td > input.riga_off_ml').val());
	var riga_off_euroml = converti_formato_decimali($('tr#riga_offerta_'+idriga+' > td > input.riga_off_euroml').val());
	var riga_off_sconto = converti_formato_decimali($('tr#riga_offerta_'+idriga+' > td > input.riga_off_sconto').val());
	var riga_off_kgml = converti_formato_decimali($('tr#riga_offerta_'+idriga+' > td > input.riga_off_kgml').val());

	$.ajax({
		type: "POST",
		url: "/index.php/ajax/aggiorna_riga",
		data: {
			id_riga: idriga,
			riga_off_ml: riga_off_ml,
			riga_off_euroml: riga_off_euroml,
			riga_off_sconto: riga_off_sconto,
			riga_off_kgml: riga_off_kgml
			},				
		dataType: "html",
		cache:false,
		async: false,
		success: function(data) {
			$('tr#riga_offerta_'+idriga+' > td > input').prop('disabled', true);
			$('tr#riga_offerta_'+idriga+' > td > a.btn-modifica-riga-off').show();
			$('tr#riga_offerta_'+idriga+' > td > a.btn-salva-riga-off').hide();
			elenco_righe_offerta();	
			$.unblockUI();
		}
			
		});


		

	
	return false;

}
function controlla_campi_obbl() {

		var sede_lavori = $("input#sede_lavori_input").val();
		var data_appalto = $("input#ipotesi_data_appalto").val();
		
		if (sede_lavori=="" || data_appalto=="") {
			alert('Inserire i campi obbligatori');
			return false;
		} else {
			return true;
		}

}

function number_format(number, decimals, dec_point, thousands_sep) {
  // discuss at: http://phpjs.org/functions/number_format/
  // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: davook
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Theriault
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // bugfixed by: Michael White (http://getsprink.com)
  // bugfixed by: Benjamin Lupton
  // bugfixed by: Allan Jensen (http://www.winternet.no)
  // bugfixed by: Howard Yeend
  // bugfixed by: Diogo Resende
  // bugfixed by: Rival
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  // revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // revised by: Luke Smith (http://lucassmith.name)
  // input by: Kheang Hok Chin (http://www.distantia.ca/)
  // input by: Jay Klehr
  // input by: Amir Habibi (http://www.residence-mixte.com/)
  // input by: Amirouche
  // example 1: number_format(1234.56);
  // returns 1: '1,235'
  // example 2: number_format(1234.56, 2, ',', ' ');
  // returns 2: '1 234,56'
  // example 3: number_format(1234.5678, 2, '.', '');
  // returns 3: '1234.57'
  // example 4: number_format(67, 2, ',', '.');
  // returns 4: '67,00'
  // example 5: number_format(1000);
  // returns 5: '1,000'
  // example 6: number_format(67.311, 2);
  // returns 6: '67.31'
  // example 7: number_format(1000.55, 1);
  // returns 7: '1,000.6'
  // example 8: number_format(67000, 5, ',', '.');
  // returns 8: '67.000,00000'
  // example 9: number_format(0.9, 0);
  // returns 9: '1'
  // example 10: number_format('1.20', 2);
  // returns 10: '1.20'
  // example 11: number_format('1.20', 4);
  // returns 11: '1.2000'
  // example 12: number_format('1.2000', 3);
  // returns 12: '1.200'
  // example 13: number_format('1 000,50', 2, '.', ' ');
  // returns 13: '100 050.00'
  // example 14: number_format(1e-8, 8, '.', '');
  // returns 14: '0.00000001'

  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}

function elenco_referenti()
{
	$('#box_elenco_referenti').empty();
	var id_anagrafica = $('input#id_anagrafica').val();
	$.ajax({
		type: "POST",
		url: "/index.php/ajax/elenco_referenti",
		data: {
			id_anagrafica: id_anagrafica
			},				
		dataType: "json",
		cache:false,
		async: false,
		success: 
			function(data){
				output = '<div class="tabbable tabs-left"><ul id="myTab3" class="nav nav-tabs tab-blue">';
				for (var i = 0; i < data.length; i++) {
					if (i==0) {
						output = output + '<li class="active">';
					} else {
						output = output + '<li class="">';
					}
					
					output = output + '<a href="#panel_tab_'+data[i].referenti_id+'" data-toggle="tab">'+data[i].referenti_nome+'</a></li>';
				}
				output = output + '</ul><div class="tab-content">';
				for (var i = 0; i < data.length; i++) {
					if (i==0) {
						output = output + '<div class="tab-pane active" id="panel_tab_'+data[i].referenti_id+'">';
					} else {
						output = output + '<div class="tab-pane" id="panel_tab_'+data[i].referenti_id+'">';
					}
					output = output + '<p>'+data[i].referenti_nome+'</p>';
					if(data[i].referenti_mansione) { output = output + '<p>Mansione: '+data[i].referenti_mansione+'</p>'; }
					if(data[i].referenti_email) { output = output + '<p>e-mail: '+data[i].referenti_email+'</p>'; }
					if(data[i].referenti_telefono) { output = output + '<p>Telefono: '+data[i].referenti_telefono+'</p>'; }
					output = output + '<p>Invio econews: ';
						if(data[i].referenti_econews==1) {output = output +'SI'} else {output = output +'NO'};
					output = output + '</p>';
					output = output + '<p>Invio newsletter: ';
						if(data[i].referenti_newsletter==1) {output = output +'SI'} else {output = output +'NO'};
					output = output + '</p>';
					output = output + '<p>Livello contatto: <strong>'+data[i].codice_livello+'</strong> - '+data[i].descrizione_livello+'</p>';
					output = output + '<a style="margin-right:15px;" href="/index.php/ras/modifica_referente/'+data[i].referenti_id+'" class="demo btn btn-blue">Modifica</a>';
					output = output + '<a onclick="elimina_ref('+data[i].referenti_id+')" class="demo btn btn-red">Elimina</a></div>';
				}
				output = output + '</div></div>'
				$('#box_elenco_referenti').html(output);
	
			}
		});
		
}

function elimina_ref(id_referente) {
	
	$.ajax({
		type: "POST",
		url: "/index.php/ajax/referente_del",
		data: {
			id_referente: id_referente
			},				
		dataType: "json",
		cache:false,
		async: false
	});
	
	elenco_referenti();
}

function salva_ras() {
		
		var id_anagrafica = $("input#id_anagrafica").val();
		var referente = $("#select_referente").val();
		var motivi = $('#s2id_form-field-select-4').select2("val");
		var ras_note = $("#ras_note").val();
		var data_visita = $("#data_visita").val();
		
			$.ajax({
			type: "POST",
			url: "/index.php/ajax/add_ras",
			dataType: "json",
			cache:false,
			async: false,
			data: {
				id_anagrafica: id_anagrafica,
				referente: referente,
				motivi: motivi,
				ras_note: ras_note,
				data_visita: data_visita		
			}
			});	
			window.location.replace("/index.php/ras/");

		
	}