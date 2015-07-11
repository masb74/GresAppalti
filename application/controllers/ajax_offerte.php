<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_offerte extends CI_Controller {

	function __construct() {
		parent::__construct();
		
	} 

	public function aggiorna_sconti_righe() {
		
		$this->load->model('offerte_model');
		
		$output = $this->offerte_model->aggiorna_sconti_righe();
		
		if ($output) {
		  print json_encode($output);
		}
		
		
	}

	public function aggiorna_prezzi_listino() {
		
		$this->load->model('offerte_model');
		
		$output = $this->offerte_model->aggiorna_prezzi_listino();
		
		if ($output) {
		  print json_encode($output);
		}
		
		
	}
	
	public function aggiorna_flag_sconto() {
		
		$this->load->model('offerte_model');
		
		$output = $this->offerte_model->aggiorna_flag_sconto();
		
		if ($output) {
		  print json_encode($output);
		}
		
		
	}
	
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */