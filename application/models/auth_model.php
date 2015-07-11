<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function __construct() {}

	public function verifica_user($user, $pwd) {
	
		$q = $this
				->db
				->where ('username', $user)
				->where ('password', $pwd)
				->where ('attivo', 1)
				->limit(1)
				->get('user_accounts');
				
		if ($q->num_rows > 0) {
			return $q->row_array();
		}
		return FALSE;
	}
}

/* End of file auth_model.php */
/* Location: ./application/controllers/auth_model.php */
