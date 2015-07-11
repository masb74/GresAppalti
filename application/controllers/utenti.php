<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utenti extends CI_Controller {

	function __construct() {
		parent::__construct();
		$autenticato = $this->session->userdata('autenticato');
		if (!$autenticato) {
			redirect('login');
		}
	} 

	public function index()
	{
		$this->load->model('utenti_model');
		
		if ($_POST) {
			$id_user = $this->input->post('id_user');
			$azione = $this->input->post('azione');
						
			$this->utenti_model->cambia_stato_utente($id_user,$azione);
			
		}
		
		$array_utenti = $this->utenti_model->elenco_utenti(1);
		$array_utenti_inattivi = $this->utenti_model->elenco_utenti(0);
		
		$dati = array (
			'array_utenti' => $array_utenti,
			'array_utenti_inattivi' => $array_utenti_inattivi
		);
		
		$this->load->view('utenti_view', $dati);
	}

	public function modifica($id_user)
	{
		$this->load->model('utenti_model');
		$msg = "";
		
		if ($_POST) {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('codice_utente', 'Codice utente', 'required|min_length[2]|is_unique[user_accounts.codice_user]');
			if ($this->form_validation->run() == TRUE) {			
				$this->utenti_model->modifica_utente($id_user);
				$msg = 'Salvataggio completato';
			} 
		} 
		
			
			$dati_utente = $this->utenti_model->dati_utente($id_user);
			
			$regioni_utente = $this->utenti_model->regioni_utente($id_user);
		
			$regioni_user = array();
			if (!empty($regioni_utente)) {
				foreach ($regioni_utente as $regione_utente) {
					$regioni_user[] = $regione_utente['id_regione'];
				}
			}

			$dati = array (
				'dati_utente' => $dati_utente,
				'regioni_utente' => $regioni_user,
				'msg' => $msg
			);
		
		
		$this->load->view('user_edit_view', $dati);
	}

	public function aggiungi()
	{
		
		if ($_POST) {

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('codice_utente', 'Codice utente', 'required|min_length[2]|is_unique[user_accounts.codice_user]');


			if ($this->form_validation->run() == TRUE) {
						
				$this->load->model('utenti_model');
				$this->utenti_model->aggiungi_utente();

				$dati = array (
					'messaggio' => 'Nuovo Utente aggiunto con successo'
				);
			
				$this->load->view('esito_ok_view', $dati);
			} else {
				$this->load->view('user_add_view');
			}
		} else {
			$this->load->view('user_add_view');
		}
		
		
	}

	
}
