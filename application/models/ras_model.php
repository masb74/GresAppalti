<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ras_model extends CI_Model
{
	public function __construct() {}

	public function elenco_referenti($anagrafica) {
		
		$q = $this
			->db
			->where('referenti_anagrafica',$anagrafica)
			->get('referenti');
			
		if ($q->num_rows > 0) {
			return $q->result();
		}
		
	}
	

	public function elenco_motivi() {

		$q = $this
			->db
			->where('motivi_attivo', 1)
			->get('ras_motivi');
			
		if ($q->num_rows > 0) {
			return $q->result();
		}
	}	

	public function dettaglio_motivo($id) {

		$q = $this
			->db
			->where('motivi_id', $id)
			->get('ras_motivi');
			
		if ($q->num_rows > 0) {
			return $q->row();
		}
	}	

	public function edit_motivo() {

		$id = $this->input->post('id_motivo');
		$descrizione = $this->input->post('descr_motivo');

		$dati = array (
			'motivi_descrizione' => $descrizione
		);
		
		$this->db->where('motivi_id', $id);	
		$this->db->update('ras_motivi', $dati); 
		
	}
		
	public function add_motivo() {
		

		$dati = array (
			'motivi_descrizione' => $this->input->post('motivo'),
			);
		$this->db->insert('ras_motivi', $dati); 

	}
	
	public function del_motivo($id) {
		
		$dati = array (
			'motivi_attivo' => 0
		);
		$this->db->where('motivi_id', $id);
		$this->db->update('ras_motivi', $dati); 

	}

	public function elenco_livelli() {

		$q = $this
			->db
			->get('referenti_livelli');
			
		if ($q->num_rows > 0) {
			return $q->result();
		}
	}	

	public function add_livello() {
		

		$dati = array (
			'codice_livello' => $this->input->post('codice_livello'),
			'descrizione_livello' => $this->input->post('descrizione_livello')
			);
		$this->db->insert('referenti_livelli', $dati); 

	}

	public function del_livello($id) {

		$this->db->where('id_livello', $id);
		$this->db->delete('referenti_livelli'); 

	}

	public function dettaglio_livello($id) {

		$q = $this
			->db
			->where('id_livello', $id)
			->get('referenti_livelli');
			
		if ($q->num_rows > 0) {
			return $q->row();
		}
	}	

	public function dettaglio_referente($id=NULL) {

		if (is_null($id)) {
			$id = $this->input->post('referente');
		}
		
		$q = $this
			->db
			->where('referenti_id', $id)
			->join('referenti_livelli', 'referenti_livelli.id_livello = referenti.referenti_livello')
			->get('referenti');
			
		if ($q->num_rows > 0) {
			return $q->row();
		}
		
	}	

	public function edit_livello() {

		$id = $this->input->post('id_livello');
		$descrizione = $this->input->post('descr_livello');
		$codice_livello = $this->input->post('codice_livello');

		$dati = array (
			'descrizione_livello' => $descrizione,
			'codice_livello' => $codice_livello
		);
		
		$this->db->where('id_livello', $id);	
		$this->db->update('referenti_livelli', $dati); 
		
	}

	public function edit_referente() {

		$id = $this->input->post('referenti_id');
		$nome_referente = $this->input->post('nome_referente');
		$mansione_referente = $this->input->post('mansione_referente');
		$livello_referente = $this->input->post('livello_referente');
		$email_referente = $this->input->post('email_referente');
		$telefono_referente = $this->input->post('telefono_referente');
		$econews_referente = $this->input->post('econews_referente');
		$nl_referente = $this->input->post('nl_referente');

		$dati = array (
			'referenti_nome' => $nome_referente,
			'referenti_mansione' => $mansione_referente,
			'referenti_livello' => $livello_referente,
			'referenti_email' => $email_referente,
			'referenti_telefono' => $telefono_referente,
			'referenti_econews' => $econews_referente,
			'referenti_newsletter' => $nl_referente,

		);
		
		$this->db->where('referenti_id', $id);	
		$this->db->update('referenti', $dati); 
		
		$dett_referente = $this->dettaglio_referente($id);
		return $dett_referente->referenti_anagrafica;
	}
	public function add_referente() {
		
		
		$dati = array (
			'referenti_nome' => $this->input->post('referenti_nome'),
			'referenti_mansione' => $this->input->post('referenti_mansione'),
			'referenti_livello' => $this->input->post('referenti_livello'),
			'referenti_email' => $this->input->post('referenti_email'),
			'referenti_telefono' => $this->input->post('referenti_telefono'),
			'referenti_econews' => $this->input->post('referenti_econews'),
			'referenti_newsletter' => $this->input->post('referenti_newsletter'),
			'referenti_anagrafica' => $this->input->post('referenti_anagrafica')
			);
		$this->db->insert('referenti', $dati); 

	}

	public function del_referente() {

		$id = $this->input->post('id_referente');
		$this->db->where('referenti_id', $id);
		$this->db->delete('referenti'); 

	}

	public function add_visita() {
		
		$array_motivi = $this->input->post('motivi');
		$motivi_text = "";
		
		if (!empty($array_motivi)) {
			foreach ($array_motivi as $motivo) {
				$motivi_text .= $motivo.',';
			}
		}
		
		$data_visita = $this->input->post('data_visita');
		
		$rsl = $this->convertiData($data_visita);
		
		$dati = array (
			'ras_ragionesociale' => $this->input->post('id_anagrafica'),
			'ras_utente' => $this->session->userdata('iduser'),
			'ras_referente' => $this->input->post('referente'),
			'ras_note' => $this->input->post('ras_note'),
			'ras_data' => $rsl,
			'ras_motivi' => $motivi_text
			);
		$this->db->insert('ras', $dati); 

	}

	public function aggiorna_ras($id_ras) {

		$array_motivi = $this->input->post('motivi');

		$motivi_text = "";
		
		if (!empty($array_motivi)) {
			foreach ($array_motivi as $motivo) {
				$motivi_text .= $motivo.',';
			}
		}
		
		$data_visita = $this->input->post('data_visita');
		$data_visita = str_replace('-', '/', $data_visita);
		$dateFormated = explode('/', $data_visita);
		$data_visita = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];
		
		$dati = array (
			'ras_ragionesociale' => $this->input->post('id_anagrafica'),
			'ras_referente' => $this->input->post('select_referente'),
			'ras_note' => $this->input->post('ras_note'),
			'ras_data' => $data_visita,
			'ras_motivi' => $motivi_text
			);			

		$this->db->where('ras_id', $id_ras);	
		$this->db->update('ras', $dati); 
		
		return true;

	}

	function convertiData($dataEur){
		$rsl = explode ('-',$dataEur);
		$rsl = array_reverse($rsl);
		return implode($rsl,'-');
	}
	
	public function elenco_visite() {
		
		$select_regione = $this->input->post('select_regione');
		
		$da_data_js = $this->input->post('da_data');
		$da_data = $this->convertiData($da_data_js);

		$a_data_js = $this->input->post('a_data');
		$a_data = $this->convertiData($a_data_js);

		$anagrafica = $this->input->post('id_impresa');

		$id_utente = $this->input->post('select_agente');
		
		$user_admin  = $this->session->userdata('admin');
		
		if ($select_regione==0 && $id_utente==0 && !$da_data && !$a_data && !$anagrafica) {
			return false;
		} else {

			$this->db->from('ras');
			$this->db->join('user_accounts', 'user_accounts.id_user = ras.ras_utente');
			$this->db->join('anagrafiche', 'anagrafiche.id = ras.ras_ragionesociale', 'left');
			$this->db->join('referenti', 'referenti.referenti_id = ras.ras_referente', 'left');
			if($select_regione!='0') {
				$this->db->where('anagrafiche.regione', $select_regione);
			}
			if($id_utente!='0') {
				$this->db->where('ras.ras_utente', $id_utente);
			}
			if(!empty($anagrafica)) {
				$this->db->where('ras.ras_ragionesociale', $anagrafica);
			}
			if(!empty($da_data)) {
				$this->db->where('ras.ras_data >=', $da_data);
			}
			if(!empty($a_data)) {
				$this->db->where('ras.ras_data <=', $a_data);
			}
			$q = $this->db->get();
	
			if ($q->num_rows > 0) {
				return $q->result();
			}
			return FALSE;
			
		}
		
	}	

	public function dettaglio_visita($id) {

			$this->db->from('ras');
			$this->db->join('user_accounts', 'user_accounts.id_user = ras.ras_utente');
			$this->db->join('anagrafiche', 'anagrafiche.id = ras.ras_ragionesociale', 'left');
			$this->db->join('referenti', 'referenti.referenti_id = ras.ras_referente', 'left');
			$this->db->where('ras_id', $id);
			$q = $this->db->get();
		if ($q->num_rows > 0) {
			return $q->row();
		}
		return FALSE;
		
	
	}
	
	
}

