<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ras extends CI_Controller {

	function __construct() {
		parent::__construct();
		$autenticato = $this->session->userdata('autenticato');
		if (!$autenticato) {
			redirect('login');
		}
	} 

	public function index()
	{
		$this->load->model('ras_model');
		

			$motivi_visita = $this->ras_model->elenco_motivi();
			$elenco_livelli = $this->ras_model->elenco_livelli();
		
			$dati = array (
				'motivi_visita' => $motivi_visita,
				'elenco_livelli' => $elenco_livelli
			);		
			$this->load->view('ras_add_view.php', $dati);

	}

    public function edit($id_ras)
    {
    
        $this->load->model('ras_model');
        $this->load->model('anagrafiche_model');
				
		if($_POST) {
			
			$aggiorna_ras = $this->ras_model->aggiorna_ras($id_ras);
			
			if ($aggiorna_ras) {
				$dati = array (
					'messaggio' => 'RAS aggiornato con successo'
				);
				$this->load->view('esito_ok_view.php', $dati);
			
			} else { 
				echo 'errore'; 
			}
			
		}
		else 
		{		

        
            $dettaglio_ras = $this->ras_model->dettaglio_visita($id_ras);
            $id_anagrafica = $dettaglio_ras->ras_ragionesociale;
            $dettaglio_anagrafica = $this->anagrafiche_model->dettaglio_anagrafica($id_anagrafica);
            $motivi_visita = $this->ras_model->elenco_motivi();
            $elenco_livelli = $this->ras_model->elenco_livelli();
            $dettaglio_referente = $this->ras_model->dettaglio_referente($dettaglio_ras->referenti_id);
			
            $motivi_visita_ras = $dettaglio_ras->ras_motivi;
            $motivi_visita_ras_array = explode(",", $motivi_visita_ras);
            
            $dati = array (
                'motivi_visita' => $motivi_visita,
                'elenco_livelli' => $elenco_livelli,
                'dettaglio_ras' => $dettaglio_ras,
                'dettaglio_anagrafica' => $dettaglio_anagrafica,
                'dettaglio_referente' => $dettaglio_referente,
                'motivi_visita_ras_array' => $motivi_visita_ras_array
             );      
            $this->load->view('ras_edit_view.php', $dati);
         }

    }

	public function cerca()
	{
		$this->load->model('anagrafiche_model');
		$this->load->model('utenti_model');
		$regioni = $this->anagrafiche_model->elenco_regioni();	
		$elenco_utenti = $this->utenti_model->elenco_utenti(1);	
		
		global $elenco_ras, $select_data_da, $select_data_a, $select_regione, $select_utenti;
		
		if ($_POST) {

			$opzione = $this->input->post('optionOutput');	

			$select_regione = $this->input->post('select_regione');
			$select_utenti = $this->input->post('select_agente');
			$this->load->model('ras_model');	
			$elenco_ras = $this->ras_model->elenco_visite();
			$dati = array (
				'elenco_regioni' => $regioni,
				'elenco_ras' => $elenco_ras,
				'id_regione' => $select_regione,
				'id_utente' => $select_utenti,
				'elenco_utenti' => $elenco_utenti,
				);	
			

				if($opzione==1 || empty($elenco_ras)) {		
					$this->load->view('ras_filtro_view.php', $dati);
				} else {
					$this->load->view('ras_xls_view.php', $dati);
				} 	
			

		} else {
			$dati = array (
				'elenco_regioni' => $regioni,
				'elenco_ras' => $elenco_ras,
				'id_regione' => $select_regione,
				'elenco_utenti' => $elenco_utenti,
				'id_utente' => $id_utente = $this->session->userdata('iduser'),
				);		
			$this->load->view('ras_filtro_view.php', $dati);
		} 

	}


	public function motivi()
	{
		$this->load->model('ras_model');
		
		$elenco_motivi = $this->ras_model->elenco_motivi();
		
		$dati = array (
			'elenco_motivi' => $elenco_motivi
		);		

		$this->load->view('ras_motivi_view.php', $dati);
	}

	public function motivi_edit($id)
	{
		$this->load->model('ras_model');

		if ($_POST) {	
			$this->ras_model->edit_motivo();
			$elenco_motivi = $this->ras_model->elenco_motivi();
		
			$dati = array (
				'messaggio' => 'Motivo modificato correttamente',
				'elenco_motivi' => $elenco_motivi
			);		


			$this->load->view('ras_motivi_view.php', $dati);
			
		} else {
			$dettaglio_motivo = $this->ras_model->dettaglio_motivo($id);
		
			$dati = array (
				'dettaglio_motivo' => $dettaglio_motivo
			);		
			$this->load->view('ras_motivi_edit_view.php', $dati);
			
		}		
	}

	public function motivi_add()
	{
		if ($_POST) {	

			$this->load->model('ras_model');
		
			$this->ras_model->add_motivo();

			$elenco_motivi = $this->ras_model->elenco_motivi();
		
			$dati = array (
				'messaggio' => 'Nuovo motivo visita inserito correttamente',
				'elenco_motivi' => $elenco_motivi
			);		


			$this->load->view('ras_motivi_view.php', $dati);
		} else {

			$this->load->view('ras_motivi_add_view.php');
			
		}
	}

	public function motivi_del($id)
	{

			$this->load->model('ras_model');
		
			$this->ras_model->del_motivo($id);

			$elenco_motivi = $this->ras_model->elenco_motivi();
		
			$dati = array (
				'messaggio' => 'Motivo eliminato correttamente',
				'elenco_motivi' => $elenco_motivi
			);		


			$this->load->view('ras_motivi_view.php', $dati);

	}



	public function levref()
	{
		$this->load->model('ras_model');
		
		$elenco_livelli = $this->ras_model->elenco_livelli();
		
		$dati = array (
			'elenco_livelli' => $elenco_livelli
		);		

		$this->load->view('levref_view.php', $dati);
	}

	public function scheda($id)
	{
		$this->load->model('ras_model');
		
		$dettaglio_visita = $this->ras_model->dettaglio_visita($id);
		
		$dati = array (
			'dettaglio_visita' => $dettaglio_visita
		);		

		$this->load->view('ras_scheda_view.php', $dati);
	}

	public function levref_edit($id)
	{
		$this->load->model('ras_model');

		if ($_POST) {	
			$this->ras_model->edit_livello();
			$elenco_livelli = $this->ras_model->elenco_livelli();
		
			$dati = array (
				'messaggio' => 'Livello referente modificato correttamente',
				'elenco_livelli' => $elenco_livelli
			);		


			$this->load->view('levref_view.php', $dati);
			
		} else {
			$dettaglio_livello = $this->ras_model->dettaglio_livello($id);
		
			$dati = array (
				'dettaglio_livello' => $dettaglio_livello
			);		
			$this->load->view('levref_edit_view.php', $dati);
			
		}		
	}

	public function levref_add()
	{
		if ($_POST) {	

			$this->load->model('ras_model');
		
			$this->ras_model->add_livello();

			$elenco_livelli = $this->ras_model->elenco_livelli();
		
			$dati = array (
				'messaggio' => 'Nuovo livello referente inserito correttamente',
				'elenco_livelli' => $elenco_livelli
			);	
		
			$this->load->view('levref_view.php', $dati);
		} else {

			$this->load->view('levref_add_view.php');
			
		}
	}

	public function levref_del($id)
	{

			$this->load->model('ras_model');
		
			$this->ras_model->del_livello($id);

			$elenco_livelli = $this->ras_model->elenco_livelli();
		
			$dati = array (
				'messaggio' => 'Livello referente eliminato correttamente',
				'elenco_livelli' => $elenco_livelli
			);	
		
			$this->load->view('levref_view.php', $dati);

	}


	public function modifica_referente($id)
	{
		$this->load->model('ras_model');

		$elenco_livelli = $this->ras_model->elenco_livelli();
		
		if ($_POST) {	
			$id_anagrafica = $this->ras_model->edit_referente();

			redirect('/anagrafiche/edit_anagrafica/'.$id_anagrafica, 'refresh');
			
		} else {
			$dettaglio_referente = $this->ras_model->dettaglio_referente($id);
		
			$dati = array (
				'dettaglio_referente' => $dettaglio_referente,
				'elenco_livelli' => $elenco_livelli
			);		
			$this->load->view('referente_edit_view.php', $dati);
			
		}		
	}
	public function modifica($id) {

		$this->load->model('ras_model');

			
		if ($_POST) {
			
			
			$this->progetti_model->modifica_progetto();
			
			$dati = array (
				'messaggio' => 'Progetto modificato correttamente.',
				);
			
			$opz = $this->input->post('btn-salva');
			if ($opz=="Salva") {
				$this->load->view('esito_ok_view.php', $dati);		
			} else {
				$id_progetto = $this->input->post('id_progetto');
				redirect('/offerte/index/'.$id_progetto.'/', 'refresh');
			}
			
		} else {
			
			$this->load->model('anagrafiche_model');
		
			$dati_visita = $this->ras_model->dettaglio_visita($id);
		
echo '<pre>';
print_r($dati_visita);
echo '</pre>';
	die();		
			$dati = array (
				'dati_visita' => $dati_visita,
				);
			
			$this->load->view('ras_edit_view.php', $dati);	
		
		}

	}

	public function stampaScheda($id) {

		$this->load->model('ras_model');
		
		$dettaglio_visita = $this->ras_model->dettaglio_visita($id);
		
		$this->load->library('Pdf');
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// Add a page
		$pdf->AddPage();
	
		$html = "
		<style type=\"text/css\">
		.titolo {
			font-weight: bold;
			display:block;
		}
		li {
			display:block;
			padding-bottom:35px;
		}
		</style>
		<h1>Scheda RAS</h1>
		<hr />
		<ul>
			<li><span class=\"titolo\">Nome agente: </span><br />".$dettaglio_visita->nome."</li>
			<li><span class=\"titolo\">Data visita: </span><br />".date('d M, Y', strtotime($dettaglio_visita->ras_data))."</li>
			<li><span class=\"titolo\">Ragione sociale: </span><br />".$dettaglio_visita->ragione_sociale."</li>
			<li><span class=\"titolo\">Nome referente: </span><br />".$dettaglio_visita->referenti_nome."</li>
			<li><span class=\"titolo\">Motivi visita: </span><br />";
			 
			$motivi_gruppo = $dettaglio_visita->ras_motivi; 
			$arr_motivi = explode (',',$motivi_gruppo);
		
			$ci =&get_instance();
			$ci->load->model('ras_model');
			for ($i=0; $i<count($arr_motivi); $i++) {
				if ($arr_motivi[$i]!="") {	 
					$dett_motivo = $ci->ras_model->dettaglio_motivo($arr_motivi[$i]); 
					$html .= $dett_motivo->motivi_descrizione.' ';
				}
			}
			
			$html .= "</li><li><span class=\"titolo\">Note: </span><br />".$dettaglio_visita->ras_note."</li>
		</ul>";
	
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output('schedaRAS.pdf', 'I');
	
	}
	
}

/* End of file ras.php */
/* Location: ./application/controllers/ras.php */