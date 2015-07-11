<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
	} 

	public function index() {
		$autenticato = $this->session->userdata('autenticato');
		if ($autenticato) {
			redirect('dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Nome Utente', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_view');
		}
		else {
			$this->load->model('auth_model');
			$res = $this
						->auth_model
						->verifica_user($this->input->post('username'), $this->input->post('password'));

			if ($res) {
				// Account Verificato
				$id_user = $res['id_user'];
				$sessione = array(
                   'iduser'  => $id_user,
                   'autenticato' => TRUE,
				   'nome' => $res['nome'],
				   'admin' => $res['admin']
				);
				$this->session->set_userdata($sessione);
				redirect('dashboard');
			} else {
				// Account Inesistente
				show_error('Nome utente o Password errati');
				$this->load->view('login_view');
			}

		}
		

	} 
	
	public function logout() {
		$this->session->sess_destroy();
		$this->load->view('login_view');
	}

	
}