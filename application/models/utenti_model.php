<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utenti_model extends CI_Model {
	
	public function elenco_utenti($opz_attivo) {
	
			$q = $this
				->db
				//->join('user_regioni', 'user_regioni.id_regione = regioni.id', 'left')
				->where('attivo = '.$opz_attivo)
				->get('user_accounts');	
			
			if ($q->num_rows > 0) {
				return $q->result_array();
			}
			return FALSE;

	}

	public function modifica_utente($id_utente) {

		$input_email = $this->input->post('email');
		$input_codice = $this->input->post('codice_utente');
		$input_nome = $this->input->post('nome');
		$input_username = $this->input->post('username');
		$input_password = $this->input->post('password');
		$input_check_admin = $this->input->post('check_admin');
		$input_check_attivo = $this->input->post('check_attivo');

		$data1 = array(
               'email' => $input_email,
               'nome' => $input_nome,
               'username' => $input_username,
               'password' => $input_password,
               'admin' => $input_check_admin,
			   'attivo' => $input_check_attivo,
			   'codice_user' => $input_codice,
            );
			
		$this->db->update('user_accounts', $data1, "id_user = ".$id_utente);
	
		if (!$input_check_admin) {
			$input_regioni_associate = $this->input->post('check_regioni');
			$this->db->delete('user_regioni', array('id_user' => $id_utente)); 
		
			for($i=0; $i < count($input_regioni_associate); $i++) {
				$data = array(
					'id_user' => $id_utente,
					'id_regione' => $input_regioni_associate[$i]
				);

				$this->db->insert('user_regioni', $data); 
			}
		} else {
			$this->db->delete('user_regioni', array('id_user' => $id_utente)); 
		}
		
	}

	public function aggiungi_utente() {

		$input_email = $this->input->post('email');
		$input_nome = $this->input->post('nome');
		$input_username = $this->input->post('username');
		$input_password = $this->input->post('password');
		$input_check_admin = $this->input->post('check_admin');
		$input_check_attivo = $this->input->post('check_attivo');
		$input_codice = $this->input->post('codice_utente');

		$data1 = array(
               'email' => $input_email,
               'nome' => $input_nome,
               'username' => $input_username,
               'password' => $input_password,
               'admin' => $input_check_admin,
			   'attivo' => $input_check_attivo,
			   'codice_user' => $input_codice,
            );
			
		$this->db->insert('user_accounts', $data1);
		$id_utente = mysql_insert_id();

		if ($input_check_admin == 0) {
			$input_regioni_associate = $this->input->post('check_regioni');
		
			if($input_regioni_associate) {
				for($i=0; $i < count($input_regioni_associate); $i++) {
					$data = array(
						'id_user' => $id_utente,
						'id_regione' => $input_regioni_associate[$i]
					);

				$this->db->insert('user_regioni', $data); 
				}
			}
		}
		
	}

	
	public function regioni_utente($id_utente) {
			
			$q = $this
				->db
				->where('id_user = '.$id_utente)
				->get('user_regioni');	
			
			if ($q->num_rows > 0) {
				return $q->result_array();
			}
			return FALSE;

	}
	
	public function cambia_stato_utente($id_user,$azione) {
	
			$data = array("attivo"=>$azione);
			$this->db->update('user_accounts', $data, "id_user = ".$id_user);
			
	}

	public function dati_utente($id_utente) {
	
			$q = $this
				->db
				->where('id_user = '.$id_utente)
				->get('user_accounts');	
			
			if ($q->num_rows > 0) {
				return $q->row();
			}
			return FALSE;

	}

	
}