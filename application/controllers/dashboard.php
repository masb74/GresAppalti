<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$autenticato = $this->session->userdata('autenticato');
		if (!$autenticato) {
			redirect('login');
		}
	} 

	public function index()
	{
		$dati = array (
			'nome' => $this->session->userdata('nome'),
			'admin' => $this->session->userdata('admin'),
			);

		$this->load->view('dashboard_view.php', $dati);
	}

}
