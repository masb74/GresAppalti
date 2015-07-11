<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct() {
		parent::__construct();
		
	} 

	public function aggiorna_ajax($campo, $id_progetto) {
		
		$valore = $this->input->post('testo');
		
		$data = array(
               $campo => $valore
            );

		$this->db->where('id', $id_progetto);
		$this->db->update('progetti', $data); 
	}

	public function cerca_ajax($tipologia/*, $stringa*/)
	{
		$this->load->model('anagrafiche_model');
		$stringa = $this->input->post('stringa');
		$anagrafiche = $this->anagrafiche_model->cerca_anagrafica($tipologia,$stringa);
		
		if ($anagrafiche) {
			print json_encode($anagrafiche);
		} else {
			echo 'Nessun nominativo trovato.';
		}
	}	

	public function cerca_ajax_2($tipologia)
	{
		$this->load->model('anagrafiche_model');

		$anagrafiche = $this->anagrafiche_model->cerca_anagrafica2($tipologia);
		
		if ($anagrafiche) {
			print json_encode($anagrafiche);
		} else {
			echo 'Nessun nominativo trovato.';
		}
	}


	public function cerca_citta($stringa)
	{
		$this->load->model('anagrafiche_model');

		$citta = $this->anagrafiche_model->cerca_citta($stringa);
		
		if ($citta) {
			$output = '<table class="table table-bordered table-hover table-full-width" id="tabella_ricerca_citta"><tbody>';
			foreach ($citta as $localita) {
				$output = $output . '<tr onclick="assegna_id_sede_appalto('.$localita['id'].')"><td>' . $localita['comune'] .' ('. $localita['provincia'].')</td></tr>';  
			}
			$output = $output . '</tbody></table>';
			echo $output;
		} else {
			echo 'Nessun Comune trovato.';
		}
	}

	
	public function select_classe($select_dn) {
		$this->load->model('progetti_model');
		$classe = $this->progetti_model->select_classe($select_dn);
		
		if ($classe) {
			$output = '<option value="0">Scegli Classe</option>';
			foreach ($classe as $classi) {
				$output = $output . '<option value="'.$classi['id'].'">'.$classi['descrizione_articolo'].' - classe '.$classi['classe'].'</option>';  
			}
			
			echo $output;
		} else {
			echo 'Nessuna classe trovata.';
		}		
	}


	public function aggiungi_riga_offerte() {
		
		$this->load->model('offerte_model');
		$output = $this->offerte_model->inserisci_riga_offerta();	
	
		if ($output) {
		  print json_encode($output);
		}
	}

	
	
	public function aggiungi_riga_progetti() {
		
		$this->load->model('progetti_model');
		$output = $this->progetti_model->inserisci_riga_progetto();	
	
		if ($output) {
		  print json_encode($output);
		}
	}	



	public function aggiorna_data_ajax($campo, $id_progetto) {
		
		$data_input = $this->input->post('testo');
		$valore = date("Y-m-d",strtotime($data_input));
		$data = array(
               $campo => $valore
            );

		$this->db->where('id', $id_progetto);
		$this->db->update('progetti', $data); 
	}


	public function add_new_anagrafica($tipologia)
	{
		$this->load->model('anagrafiche_model');	
			
		$id_inserito = $this->anagrafiche_model->add_new_anagrafica($tipologia);
		
		echo $id_inserito;

	}

	public function spedisci_email() 
	{
		$this->load->library('email');

		$this->email->from('info@gresappalti.it', 'Gres Appalti Server');
		$this->email->to($this->config->item('admin_email'));

		$this->email->subject('Nuova anagrafica inserita');
		$this->email->message('E\' stata inserita una nuova anagrafica in attesa di approvazione. <a href="http://www.gresappalti.it/index.php/anagrafiche/anagrafiche_temp">CLICK QUI</a> per vedere le anagrafiche da approvare.');

		$this->email->send();

		//echo $this->email->print_debugger();	
	
	}

	
	public function add_new_nota() {
		
		$this->load->model('progetti_model');
		$this->progetti_model->add_new_nota();	
	
	}



	public function elenco_note() {
		
		$this->load->model('progetti_model');
		$output = $this->progetti_model->elenco_note(NULL);	
	
		if ($output) {
		  print json_encode($output);
		}
	}

	public function approva_anagrafica($id_anagrafica)
	{
		
		$data = array(
               'approvato' => 1
            );

		$this->db->where('id', $id_anagrafica);
		$this->db->update('anagrafiche', $data); 

	}

	public function aggiorna_ajax_offerte($campo, $id_offerta) {
		
		$valore = $this->input->post('testo');
		
		$data = array(
               $campo => $valore
            );

		$this->db->where('offerte_id', $id_offerta);
		$this->db->update('offerte', $data); 
	}	

	public function dettaglio_citta($id_anagrafica)
	{
		
		$this->load->model('anagrafiche_model');

		$anagrafica = $this->anagrafiche_model->dettaglio_citta($id_anagrafica);
		
		if ($anagrafica) {
		  print json_encode($anagrafica);
		}


	}
	
	
	public function assegna_anagrafica($id_anagrafica)
	{
		
		$this->load->model('anagrafiche_model');

		$anagrafica = $this->anagrafiche_model->assegna_anagrafica($id_anagrafica);
		
		if ($anagrafica) {
			$output = '"id":"'.$anagrafica->id.'","rag_soc":"'.$anagrafica->ragione_sociale.'"';
						
		}
		  print json_encode($anagrafica);
	}

	public function elimina_riga_offerta($id_riga) {
	
		$this->db->where('righeofferte_id', $id_riga);
		$this->db->delete('offerte_righe'); 
		print json_encode($id_riga);
	
	}

	
	public function elimina_righe_progetti($id_riga) {

		$this->load->model('progetti_model');
		$this->progetti_model->elimina_righe_progetti($id_riga);

		print json_encode($id_riga);
		
	}



	public function somme_righe_progetto() {

		$this->load->model('progetti_model');
		$output = $this->progetti_model->somme_righe_progetto();	
		if ($output) {
		  print json_encode($output);
		}

	}

	
	public function elenco_righe()
	{
		$this->load->model('offerte_model');

		$righe_offerta = $this->offerte_model->elenco_righe_offerta();
		
		if ($righe_offerta) {
		  print json_encode($righe_offerta);
		}
	}


	public function elenco_referenti()
	{
		$this->load->model('anagrafiche_model');

		$elenco_referenti_anagrafica = $this->anagrafiche_model->elenco_referenti_anagrafica();
		
		if ($elenco_referenti_anagrafica) {
		  print json_encode($elenco_referenti_anagrafica);
		}
	}

	
	public function aggiorna_riga() {
		
		$id_riga = $this->input->post('id_riga');
		$riga_off_ml = $this->input->post('riga_off_ml');
		$riga_off_euroml = $this->input->post('riga_off_euroml');
		$riga_off_sconto = $this->input->post('riga_off_sconto');
		$riga_off_kgml = $this->input->post('riga_off_kgml');
		$tot_kg = $riga_off_ml * $riga_off_kgml;
		$tot_euro = ($riga_off_ml*$riga_off_euroml) - ($riga_off_ml*$riga_off_euroml*($riga_off_sconto/100));
		
		$data = array(
               'righeofferte_ml' => $riga_off_ml,
               'righeofferte_euro_ml' => $riga_off_euroml,
               'righeofferte_sconto' => $riga_off_sconto,
               'righeofferte_tot_kg' => $tot_kg,
               'righeofferte_tot_euro' => $tot_euro,
            );

		$this->db->where('righeofferte_id', $id_riga);
		$this->db->update('offerte_righe', $data); 
		
		return true;
	}

	public function popola_select_referenti($anagrafica) {
		
		$this->load->model('ras_model');

		$referenti = $this->ras_model->elenco_referenti($anagrafica);
		
		if ($referenti) {
		  print json_encode($referenti);
		}
		

	}

	public function dettaglio_referente() {
		
		$this->load->model('ras_model');

		$referente = $this->ras_model->dettaglio_referente();
		
		if ($referente) {
		  print json_encode($referente);
		}
		

	}

	public function add_ras() {
		
		$this->load->model('ras_model');

		$this->ras_model->add_visita();
		
	}


	public function referente_add()
	{
		$this->load->model('ras_model');

		$referenti = $this->ras_model->add_referente();

	}	

	public function referente_del()
	{
		$this->load->model('ras_model');

		$referenti = $this->ras_model->del_referente();
		return true;
	}	


}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */