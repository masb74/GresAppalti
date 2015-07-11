<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$autenticato = $this->session->userdata('autenticato');
		if (!$autenticato) {
			redirect('login');
		}
	} 

	public function index()
	{
		$nome = $this->session->userdata('nome');
		
		$dati = array (
			'nome' => $nome,
			'titolo' => 'Titolo',
			'admin' => $this->session->userdata('admin'),
		);
		$this->load->view('max_view', $dati);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */