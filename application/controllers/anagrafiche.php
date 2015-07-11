<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anagrafiche extends CI_Controller {

	function __construct() {
		parent::__construct();
		$autenticato = $this->session->userdata('autenticato');
		if (!$autenticato) {
			redirect('login');
		} 
		
	} 

	public function index()
	{
		// recupero elenchi provincie e regioni per filtro
		$this->load->model('anagrafiche_model');
		$provincie = $this->anagrafiche_model->elenco_provincie();
		$regioni = $this->anagrafiche_model->elenco_regioni();

		$RagSociale = $this->input->post('RagSociale');
		
					
		
		$dati = array (
			'elenco_regioni' => $regioni,
			'elenco_provincie' => $provincie
			);
		$this->load->view('filtro_anag_imprese_view.php', $dati);
	}








	public function anagrafiche_temp()
	{
		
		$this->load->model('anagrafiche_model');

		$anagrafiche_1_temp = $this->anagrafiche_model->elenco_anagrafiche(0);

		
		/*foreach ($anagrafiche_1_temp as $anagrafiche => $valore ) {

			$id = intval($valore['id']); 
			$utilizzata = $this->anagrafiche_model->check_anagrafica_usata($id);
			//$utilizzata = $this->anagrafiche_model->check_anagrafica_usata(5904);
			
			$anagrafiche_1_temp[$anagrafiche]['utilizzata'] = $utilizzata;
		}*/



		$dati = array (
			'anagrafiche_1_temp' => $anagrafiche_1_temp,

		);
		
		$this->load->view('anagrafiche_temp_view.php', $dati);

	}



	public function approva_anagrafica2($id_anagrafica)
	{
		
		$data = array(
               'approvato' => 1
            );

		$this->db->where('id', $id_anagrafica);
		$this->db->update('anagrafiche', $data);

		redirect('/anagrafiche/anagrafiche_temp/', 'refresh');		

	}
	

	
	public function edit_anagrafica($id_anagrafica) 
	{

		$this->load->model('anagrafiche_model');
		$this->load->model('ras_model');

		$anagrafica = $this->anagrafiche_model->cerca_anagrafica_generico($id_anagrafica);	
		$tipologie = $this->anagrafiche_model->elenco_tipologie();
		$provincie = $this->anagrafiche_model->elenco_provincie();
		$elenco_livelli = $this->ras_model->elenco_livelli();
		
		$dati = array (
			'anagrafiche' => $anagrafica,
			'provincie' => $provincie,
			'tipologie' => $tipologie,
			'elenco_livelli' => $elenco_livelli
			);
		
		
		$this->load->view('anagrafica_edit_view.php', $dati);
		
		
	
	}

	public function salva_anagrafica() 
	{

		$id_anagrafica = $this->input->post('id_anagrafica');
		$this->load->model('anagrafiche_model');
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
		$this->form_validation->set_rules('tipologia', 'Tipologia', 'required');
		$this->form_validation->set_rules('ragione_sociale', 'Ragione Sociale', 'required');
		$this->form_validation->set_rules('codice');
		$this->form_validation->set_rules('qualifica');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('telefono');
		$this->form_validation->set_rules('fax');
		$this->form_validation->set_rules('indirizzo');
		$this->form_validation->set_rules('cap');
		$this->form_validation->set_rules('localita');
		$this->form_validation->set_rules('provincia', 'Provincia', 'required');
		$this->form_validation->set_rules('p_iva');

		if ($this->form_validation->run() == TRUE) {
						
			$this->anagrafiche_model->aggiorna_anagrafica();
			$referer = $this->input->post('url_referer');
			redirect($referer);
		} else {
			$this->load->model('ras_model');

			$anagrafica = $this->anagrafiche_model->cerca_anagrafica_generico($id_anagrafica);	
			$tipologie = $this->anagrafiche_model->elenco_tipologie();
			$provincie = $this->anagrafiche_model->elenco_provincie();
			$elenco_livelli = $this->ras_model->elenco_livelli();
		
			$dati = array (
				'anagrafiche' => $anagrafica,
				'provincie' => $provincie,
				'tipologie' => $tipologie,
				'elenco_livelli' => $elenco_livelli
				);
		
		
			$this->load->view('anagrafica_edit_view.php', $dati);
		}

	}

	public function add_anagrafica() 
	{
		$this->load->model('anagrafiche_model');



		if ($_POST) {

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
			$this->form_validation->set_rules('tipologia', 'Tipologia', 'required');
			$this->form_validation->set_rules('ragione_sociale', 'Ragione Sociale', 'required');
			$this->form_validation->set_rules('codice');
			$this->form_validation->set_rules('qualifica');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('telefono');
			$this->form_validation->set_rules('fax');
			$this->form_validation->set_rules('indirizzo');
			$this->form_validation->set_rules('cap');
			$this->form_validation->set_rules('localita');
			$this->form_validation->set_rules('provincia', 'Provincia', 'required');
			$this->form_validation->set_rules('p_iva');
			
			if ($this->form_validation->run() == FALSE) {
				$tipologie = $this->anagrafiche_model->elenco_tipologie();
				$provincie = $this->anagrafiche_model->elenco_provincie();
		
				$dati = array (
					'provincie' => $provincie,
					'tipologie' => $tipologie,				
					);
		
				$this->load->view('anagrafica_add_view.php', $dati);
			} else {
				$lastid = $this->anagrafiche_model->add_anagrafica();
				$user_admin = $this->session->userdata('admin');
				if ($user_admin == 0) {
					$this->spedisci_email();
				} 			

				$tipo_submit = $this->input->post('bott_invio');

				if ($tipo_submit=='Salva') {
					$dati = array (
						'messaggio' => 'Anagrafica inserita correttamente.',
					);
					$this->load->view('esito_ok_view.php', $dati);	
				}		

				if ($tipo_submit=='Aggiungi') {
					redirect('anagrafiche/edit_anagrafica/'.$lastid);
				}
				
			}	
		} else {

			$tipologie = $this->anagrafiche_model->elenco_tipologie();
			$provincie = $this->anagrafiche_model->elenco_provincie();
		
			$dati = array (
				'provincie' => $provincie,
				'tipologie' => $tipologie,				
				);
		
			$this->load->view('anagrafica_add_view.php', $dati);			
			
		
		}
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

	public function cerca() 
	{
		
			if ($_POST) {
				
				$id_anagrafica = $this->input->post('id_anagrafica');
				redirect('/anagrafiche/edit_anagrafica/'.$id_anagrafica);
			}
		
			$this->load->view('anagrafica_cerca_view.php');			

	}
	
	public function rimpiazza($id_anagrafica) 
	{
		$this->load->model('anagrafiche_model');
		
		if ($_POST) :
			
			$this->load->model('progetti_model');
			$this->progetti_model->aggiorna_anagrafiche();
		
			$id_anagrafica = $this->input->post('anagrafica_errata_id');
			$this->anagrafiche_model->elimina_anagrafica($id_anagrafica);

			$dati = array (
				'messaggio' => 'Aggiornamento anagrafiche eseguito correttamente.',
				);
			
			$this->load->view('esito_ok_view.php', $dati);			
			
		
		else :
		
			$anagrafica = $this->anagrafiche_model->cerca_anagrafica_generico($id_anagrafica);	
			$dati = array (
				'anagrafiche' => $anagrafica,
				);
			
			$this->load->view('rimpiazza_anagrafica_view.php', $dati);
		
		endif;
	}	
	
	public function elimina($id_anagrafica=NULL) {
	
		$this->load->model('anagrafiche_model');
		
		if ($_POST) {
			$id_anagrafica = $this->input->post('id_anagrafica');
			$this->anagrafiche_model->elimina_anagrafica($id_anagrafica);
			$dati = array (
				'messaggio' => 'Anagrafica eliminata correttamente.',
				);
			
			$this->load->view('esito_ok_view.php', $dati);				
		} else {
			$utilizzata_progetti = $this->anagrafiche_model->check_anagrafica_usata_progetti($id_anagrafica); 
			$utilizzata_offerte = $this->anagrafiche_model->check_anagrafica_usata_offerte($id_anagrafica); 
		
			if ($utilizzata_progetti || $utilizzata_offerte) {
				$dati = array (
					'utilizzata_progetti' => $utilizzata_progetti,
					'utilizzata_offerte' => $utilizzata_offerte,
					'id_anagrafica' => $id_anagrafica,
					);			
				$this->load->view('elimina_anagrafica_view.php', $dati);				
			
			} else {
				$this->anagrafiche_model->elimina_anagrafica($id_anagrafica);
				$dati = array (
					'messaggio' => 'Anagrafica eliminata correttamente.',
					);
			
				$this->load->view('esito_ok_view.php', $dati);				
			}	
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */