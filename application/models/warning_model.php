<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Warning_model extends CI_Model
{
	public function __construct() {}

	public function elenco_progetti_warning($id_utente) {
		
		 
		$data_odierna = time();
	
	
			$sql = "SELECT * ";
			$sql .= "FROM progetti ";
			$sql .= "WHERE UNIX_TIMESTAMP(ipotesi_data) < $data_odierna "; 
			$sql .= "AND stato < 3 "; 
			$sql .= "AND id_utente = $id_utente"; 
			
			$q = $this->db->query($sql);

			

		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
		
	}

	public function get_user_info($id_utente) {
		
		$q = $this
				->db
				->where('id_user', $id_utente)
				->where('attivo', 1)
				->get('user_accounts');
		
		if ($q->num_rows > 0) {
			return $q->row();
		}
		return FALSE;
	
	}


	
}

