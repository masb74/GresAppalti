<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Progetti extends CI_Controller {

	function __construct() {
		parent::__construct();
		$autenticato = $this->session->userdata('autenticato');
		if (!$autenticato) {
			redirect('login');
		}
	} 

	public function index()
	{
		$this->load->model('anagrafiche_model');
		$regioni = $this->anagrafiche_model->elenco_regioni();	
		
		if ($_POST) {
			$nr_progetto = $this->input->post('nr_progetto');
				
			$select_regione = $this->input->post('select_regione');
			if (empty($select_regione)) { $select_regione = '0'; }
		
			$select_mercato = $this->input->post('select_mercato');	
			if (empty($select_mercato)) { $select_mercato = '0'; }
		
			$select_stato_scheda = $this->input->post('select_stato_scheda');	
			if (empty($select_stato_scheda)) { $select_stato_scheda = '0'; }
		


			$this->load->model('progetti_model');	
				
			$elenco_progetti = $this->progetti_model->elenco_progetti();
		

		} else {
			global $elenco_progetti, $select_regione, $select_mercato, $select_stato_scheda, $nr_progetto;
		}
		
			$dati = array (
				'elenco_regioni' => $regioni,
				'elenco_progetti' => $elenco_progetti,
				'id_regione' => $select_regione,
				'id_mercato' => $select_mercato,
				'id_stato' => $select_stato_scheda,		
				'nr_progetto' => $nr_progetto
				);		
		$this->load->view('progetti_view.php', $dati);
	}


	public function aggiungi()
	{
		$this->load->model('progetti_model');
		
		$this->progetti_model->elimina_progetti_vuoti();
		
		$id_progetto = $this->progetti_model->inserisci_progetto_1();

		$elenco_select_dn = $this->progetti_model->select_dn();
		
		$elenco_listini = $this->progetti_model->elenco_listini();
		
			$dati_view = array (
				'id_progetto' => $id_progetto,
				'elenco_select_dn' => $elenco_select_dn,
				'id_user' => $this->session->userdata('iduser'),
				'elenco_listini' => $elenco_listini
				);			
			
		$this->load->view('progetti_add_view.php', $dati_view);
		
	}




	
	public function cambia_stato($id_progetto) {

		$this->load->model('progetti_model');
		$dati_progetto = $this->progetti_model->elenco_generico_progetti($id_progetto);
		
		$stato_progetto = $dati_progetto->stato;
		$variante_progetto = $dati_progetto->variante;
		
		$stato_attuale = $this->progetti_model->recupera_descrizione_stato($stato_progetto);
		$variante_attuale = $this->progetti_model->recupera_descrizione_variante($variante_progetto);
		
		$dati_view = array (
			'dati_progetto' => $dati_progetto,
			'variante_attuale' => $variante_attuale,
			'stato_attuale' => $stato_attuale,
			);			
			
		$this->load->view('cambia_stato_view.php', $dati_view);
	}

	public function cambia_stato_post() {

		$this->load->model('progetti_model');
		$this->progetti_model->cambia_stato_post();

		$dati = array (
			'messaggio' => 'Aggiornamento Scheda eseguito correttamente.',
			);
			
		$this->load->view('esito_ok_view.php', $dati);	
			
	}


	public function elimina($id_progetto) {

		$this->db->delete('progetti', array('id' => $id_progetto));

		$this->db->delete('progetti_note', array('id_progetto' => $id_progetto));

		$this->db->delete('progetti_righe', array('id_progetto' => $id_progetto));

		$dati = array (
			'messaggio' => 'Progetto eliminato correttamente.',
		);
			
		$this->load->view('esito_ok_view.php', $dati);	
		
		
	}
	
	public function modifica($id_progetto) {

		$this->load->model('progetti_model');

			
		if ($_POST) {
			
			
			$this->progetti_model->modifica_progetto();
			
			$dati = array (
				'messaggio' => 'Progetto modificato correttamente.',
				);
			
			$opz = $this->input->post('btn-salva');
			if ($opz=="Salva") {
				$this->load->view('esito_ok_view.php', $dati);		
			} else {
				$id_progetto = $this->input->post('id_progetto');
				redirect('/offerte/index/'.$id_progetto.'/', 'refresh');
			}
			
		} else {
			
			$this->load->model('anagrafiche_model');
		
			$dati_progetto = $this->progetti_model->elenco_generico_progetti($id_progetto);
		
			$id_anagr_ente = $dati_progetto->id_ente_appaltante;
			$dati_ente = $this->anagrafiche_model->cerca_anagrafica_generico_2($id_anagr_ente);

			$id_anagr_progettista = $dati_progetto->id_progettista;
			$dati_progettista = $this->anagrafiche_model->cerca_anagrafica_generico_2($id_anagr_progettista);

			$id_anagr_impresa = $dati_progetto->id_impresa;
			$dati_impresa = $this->anagrafiche_model->cerca_anagrafica_generico_2($id_anagr_impresa);

			$elenco_note = $this->progetti_model->elenco_note($id_progetto);

			$elenco_righe = $this->progetti_model->elenco_righe_progetto($id_progetto);

			$elenco_select_dn = $this->progetti_model->select_dn();

			$offerte_progetto = $this->progetti_model->offerte_progetto($id_progetto);	
		
			$elenco_listini = $this->progetti_model->elenco_listini();
			
			$dati = array (
				'dati_progetto' => $dati_progetto,
				'dati_ente' => $dati_ente,
				'dati_progettista' => $dati_progettista,
				'dati_impresa' => $dati_impresa,
				'elenco_note' => $elenco_note,
				'elenco_righe' => $elenco_righe,
				'elenco_select_dn' => $elenco_select_dn,
				'offerte_progetto' => $offerte_progetto,
				'elenco_listini' => $elenco_listini
				);
			
			$this->load->view('progetto_edit_view.php', $dati);	
		
		}

	}

	public function stampa() {
	
		if ($_POST) {
			
			$this->load->model('progetti_model');
			$this->load->model('utenti_model');
			$this->load->model('anagrafiche_model');
			$id_progetto = $this->input->post('progetto');
			
			$dati_progetto = $this->progetti_model->elenco_generico_progetti($id_progetto);
		
			$id_anagr_ente = $dati_progetto->id_ente_appaltante;
			$dati_ente = $this->anagrafiche_model->cerca_anagrafica_generico_2($id_anagr_ente);

			$id_anagr_progettista = $dati_progetto->id_progettista;
			$dati_progettista = $this->anagrafiche_model->cerca_anagrafica_generico_2($id_anagr_progettista);

			$id_anagr_impresa = $dati_progetto->id_impresa;
			$dati_impresa = $this->anagrafiche_model->cerca_anagrafica_generico_2($id_anagr_impresa);

			$elenco_note = $this->progetti_model->elenco_note($id_progetto);

			$elenco_righe = $this->progetti_model->elenco_righe_progetto($id_progetto);

			$stato_progetto = $this->progetti_model->recupera_descrizione_stato($dati_progetto->stato);
			$variante_progetto = $this->progetti_model->recupera_descrizione_variante($dati_progetto->variante);
			
			$inseritore = $this->utenti_model->dati_utente($dati_progetto->id_utente);
			
			$dati = array (
				'dati_progetto' => $dati_progetto,
				'dati_ente' => $dati_ente,
				'dati_progettista' => $dati_progettista,
				'dati_impresa' => $dati_impresa,
				'elenco_note' => $elenco_note,
				'elenco_righe' => $elenco_righe,
				'stato_progetto' => $stato_progetto,
				'variante_progetto' => $variante_progetto,
				'inseritore' => $inseritore,
				);
				
				$this->load->view('progetto_stampa_view.php', $dati);
			} else {
				echo 'offerta inesistente';
			}
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */