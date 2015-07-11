<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {
	
	public function elenco_progetti() {
	
			$q = $this
				->db
				->get('progetti');	
			
			if ($q->num_rows > 0) {
				return $q->result_array();
			}
			return FALSE;

	}


	
}