<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Warning extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
    }

    public function date_appalto() {

		
		if( date('j',time())=='7' || date('j',time())=='21' ) {
		
			$this->load->model('utenti_model');
			$elenco_utenti = $this->utenti_model->elenco_utenti(1);
			
			foreach ($elenco_utenti as $utente) {
				$id_utente = $utente['id_user'];
				$this->load->model('warning_model');
				$progetti_warning = $this->warning_model->elenco_progetti_warning($id_utente);
				$user_info = $this->warning_model->get_user_info($id_utente);
			
				if ($progetti_warning) {
				
					$testo_email = "Buongiorno <strong>".$user_info->nome."!</strong><br /><br />I seguenti progetti hanno la data di appalto scaduta; clicca sul numero del progetto per aprire la pagina di modifica:<br />";
					$testo_email .="<table><thead><tr><th>Id Progetto</th><th>Sede Lavori</th><th>Ipotesi data appalto</th></tr></thead><tbody>";
					foreach ($progetti_warning as $progetto) {
						$testo_email .= '<tr>';
						$testo_email .= '<td><a href="http://www.gresappalti.it/index.php/progetti/modifica/'.$progetto['id'].'">'.$progetto['id'].'</a></td>';
						$testo_email .= '<td>'.$progetto['sede_lavori'].'</td>';
						$testo_email .= '<td>'.date('d M, Y', strtotime($progetto['ipotesi_data'])).'</td>';
						$testo_email .= '</tr>';
					}
					$testo_email .="</tbody></table>";
					$this->spedisci_email($testo_email,$id_utente);
		
				}
			}
		} else {
			echo "non e' giornata di promemoria";
		}
	}
	
	public function spedisci_email($testo_email,$id_utente) 
	{
		$this->load->library('email');
		$this->load->model('warning_model');
		$email_utente = $this->warning_model->get_user_info($id_utente);
		
		$this->email->from('info@gresappalti.it', 'Gres Appalti Server');
		$this->email->to($email_utente->email);

		$this->email->subject('Promemoria scadenza date appalti');
		$this->email->message($testo_email);

		$this->email->send();

		echo $this->email->print_debugger();	
	
	}
		


 
} 
/* End of file warning.php */
/* Location: ./application/controllers/warning.php */