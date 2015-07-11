<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offerte extends CI_Controller {

	function __construct() {
		parent::__construct();
		$autenticato = $this->session->userdata('autenticato');
		if (!$autenticato) {
			redirect('login');
		}
	} 

	public function index($id_progetto = NULL)
	{
		$this->load->model('progetti_model');
		
			$dati = array (
				'id_user' => $this->session->userdata('iduser'),
				'id_progetto' => $id_progetto
				);		
		$this->load->view('offerte_add_view.php', $dati);
		
		
	}

    public function aggiorna()
    {
        $this->load->model('offerte_model');
        $this->offerte_model->aggiorna_temp();        
        
    }

	public function crea()
	{
		$this->load->model('offerte_model');

		$lastid = $this->offerte_model->crea_offerta();
		$this->offerte_model->crea_righe_offerta($lastid);

		
		
		//$datii = $this->edit($lastid)->dati;
		//$this->load->view('offerte_edit_view.php', $datii);

		$dettagli_offerta = $this->offerte_model->crea_stampa_offerta($lastid);
		
		$testo_email = "Buongiorno, <br /> e' stata inserita una nuova offerta nel gestionale Gresappalti. Di seguito i dettagli dell'offerta inserita:<br /><br />";
		$testo_email .= "Nr. Offerta: ".$lastid."<br />";
		$testo_email .= "Intestatario: ".$dettagli_offerta->ragione_sociale."<br />";
		$testo_email .= "Nr. Progetto collegato: ".$dettagli_offerta->offerte_progetto."<br />";
		$testo_email .= "Oggetto offerta: ".$dettagli_offerta->offerte_oggetto."<br />";
		 
		$this->load->library('email');
		$this->email->from('info@gresappalti.it', 'Gres Appalti Server');
		$this->email->to('f.andreetti@gres.it');
		$this->email->subject('Notifica inserimento nuova offerta');
		$this->email->message($testo_email);

		$this->email->send();

		//echo $this->email->print_debugger();	
		redirect('/offerte/edit/'.$lastid.'/step3', 'refresh'); 
		
	}

	public function edit($id_offerta=NULL, $step=NULL) 
	{
		
		$this->load->model('offerte_model');
		
		if($_POST) {
			
			$aggiorna_offerta = $this->offerte_model->aggiorna_offerta();
			
			if ($aggiorna_offerta) {
				$val_submit = $this->input->post('salva_offerta');
				if ($val_submit=='stampa') {
					$id_offerta = $this->input->post('id_offerta');
					$stampa_totali = $this->input->post('offerta_stampa_totali');
					redirect('/offerte/stampa_offerta/'.$id_offerta.'/'.$stampa_totali, 'location');
				} else {
					$dati = array (
						'messaggio' => 'Offerta aggiornata con successo'
					);
					$this->load->view('esito_ok_view.php', $dati);
				}
				
			} else { 
				echo 'errore'; 
			}
			
		}
		else 
		{
		
			$output = $this->offerte_model->crea_stampa_offerta($id_offerta);	
		
			$this->load->model('progetti_model');
			$elenco_select_dn = $this->progetti_model->select_dn();
			$elenco_listini = $this->progetti_model->elenco_listini();
			
			if ($output) {
				$dati = array (
				'tipologia' => $output->offerte_tipologia,
				'lubrificante' => $output->offerte_conf_lubrificante,
				'id_impresa' => $output->offerte_impresa,
				'rag_sociale' => $output->ragione_sociale,
				'indirizzo' => $output->indirizzo,
				'cap' => $output->cap,
				'localita' => $output->localita,
				'provincia' => $output->provincia,
				'id_offerta' => $output->offerte_id,
				'data_offerta' => $output->offerte_data,
				'oggetto' => $output->offerte_oggetto,
				'resa' => $output->offerte_resa,
				'consegna' => $output->offerte_consegna,
				'pagamento' => $output->offerte_pagamento,
				'validita' => $output->offerte_validita,
				'id_progetto' => $output->offerte_progetto,
				'id_user' => $this->session->userdata('iduser'),
				'step' => $step,
				'elenco_select_dn' => $elenco_select_dn,
				'elenco_listini' => $elenco_listini
				);		
				$this->load->view('offerte_edit_view.php', $dati);
			}
		}
	}
	


	
	
	public function filtro_progetti()
	{
		$this->load->model('anagrafiche_model');
		$regioni = $this->anagrafiche_model->elenco_regioni();	
		
		if ($_POST) {
			$nr_progetto = $this->input->post('nr_progetto');
				
			$select_regione = $this->input->post('select_regione');
			if (empty($select_regione)) { $select_regione = '0'; }
		
			$select_mercato = $this->input->post('select_mercato');	
			if (empty($select_mercato)) { $select_mercato = '0'; }
		
			$select_stato_scheda = $this->input->post('select_stato_scheda');	
			if (empty($select_stato_scheda)) { $select_stato_scheda = '0'; }
		


			$this->load->model('progetti_model');	
				
			$elenco_progetti = $this->progetti_model->elenco_progetti();
		

		} else {
			global $elenco_progetti, $select_regione, $select_mercato, $select_stato_scheda, $nr_progetto;
		}
		
			$dati = array (
				'elenco_regioni' => $regioni,
				'elenco_progetti' => $elenco_progetti,
				'id_regione' => $select_regione,
				'id_mercato' => $select_mercato,
				'id_stato' => $select_stato_scheda,		
				'nr_progetto' => $nr_progetto
				);		
		$this->load->view('offerte_filtro_view.php', $dati);
	}

	public function filtro_offerte()
	{
			$this->load->model('anagrafiche_model');

		if ($_POST) {

			$nr_offerta = $this->input->post('nr_offerta');
			$nr_progetto = $this->input->post('nr_progetto');
			$id_tipologia = $this->input->post('select_tipologia');	
			$impresa = $this->input->post('id_impresa');
		
			$this->load->model('offerte_model');	
				
			$elenco_offerte = $this->offerte_model->elenco_offerte();
		

		} else {
			global $elenco_offerte;
			global $nr_offerta;
			global $nr_progetto;
			global $id_tipologia;
			global $impresa;
		}
		
			$dati = array (
				'elenco_offerte' => $elenco_offerte,
				'nr_offerta' => $nr_offerta,
				'nr_progetto' => $nr_progetto,
				'id_tipologia' => $id_tipologia,
				'impresa' => $impresa
				);		
		$this->load->view('offerte_filtro_off_view.php', $dati);

	}

	public function stampa_offerta($id, $stampa_totali=NULL) {


            $this->load->model('offerte_model');
            $this->load->model('utenti_model');
            $output = $this->offerte_model->crea_stampa_offerta($id);   
            $id_offerta = $output->offerte_id;
            $id_utente = $output->offerte_user;
            $dati_user = $this->utenti_model->dati_utente($id_utente);
            
            
            $righe = $this->offerte_model->elenco_righe_offerta($id_offerta);
  /*          if ($output) {
                $dati = array (
                    'rag_sociale' => ,
                    'indirizzo' => ,
                    'cap' => ,
                    'localita' => ,
                    'provincia' => ,
                    'id_offerta' => ,
                    'data_offerta' => ,
                    'oggetto' => ,
                    'resa' => ,
                    'consegna' => ,
                    'pagamento' => ,
                    'validita' => ,
                    'righe' => $righe,
                    'utente' => ,
                    'cod_utente' => ,
                    'offerte_conf_lubrificante' => ,
                    'stampa_totali' => $stampa_totali
                    );      
                
                
            } */
            
            
            
		$this->load->library('Word');
        
        $sectionStyle = array('orientation' => null,
                'marginLeft' => 850,
                'marginRight' => 850,
                'marginTop' => 850,
                'marginBottom' => 850);
        
        $this->word->addFontStyle( 'grassetto', array('bold'=>true));
        $this->word->addFontStyle( 'sizefooter', array('size'=>6));
        
        
		$section = $this->word->createSection($sectionStyle);

        // TESTATA
		$header = $section->createHeader();
		$table = $header->addTable();
		$table->addRow();
        $table->addCell(5100);
		$table->addCell(5100)->addImage('application/docs/logo.jpg', array('align'=>'left'));
		$table->addRow();
        $table->addCell(5100);
		$cella_indirizzo = $table->addCell(5100);
            $cella_indirizzo->addTextBreak(2);
            $cella_indirizzo->addText('Spett.le');
            $textrun = $cella_indirizzo->createTextRun();
            $textrun->addText($output->ragione_sociale);
            $textrun->addTextBreak();
            $textrun->addText($output->indirizzo);
            $textrun->addTextBreak();
            $textrun->addText($output->cap.' '.$output->localita.' ('.$output->provincia.')');
            $cella_indirizzo->addText('Sorisole '.date('d/m/Y', strtotime($output->offerte_data)));
        // FINE TESTATA

        // FOOTER
        $footer = $section->createFooter();
        $tableFooter = $footer->addTable();
        $tableFooter->addRow();
        $tableFooter->addCell(10200)->addImage('application/docs/Loghi-offerte.jpg');
        $tableFooter2 = $footer->addTable();
        $tableFooter2->addRow(20);
        $tableFooter2->addCell(1700)->addText('Società del Gres S.p.a.       Con socio unico','sizefooter');
        $tableFooter2->addCell(1700)->addText('Via G.Marconi, 1              24010 Sorisole (BG) Italia','sizefooter');
        $tableFooter2->addCell(1700)->addText('Tel +39 035 579.348              Fax +39 035 575.455','sizefooter');
        $tableFooter2->addCell(1000)->addText('info@gres.it     www.gres.it','sizefooter');
        $tableFooter2->addCell(2400)->addText('Cap. Soc. i.v. Euro 2.000.000,00     C.C.I.A.A. Bergamo n. 392255','sizefooter');
        $tableFooter2->addCell(1700)->addText('Reg. Imprese Bergamo         C.F. e P.IVA 03597170160','sizefooter');
      

        // FINE FOOTER
        
        // NR OFFERTA
        $textrun = $section->createTextRun();
        $textrun->addText("Offerta nr. ");
        $textrun->addText(date('y', strtotime($output->offerte_data)) . "-" . $dati_user->codice_user . "-" . $output->offerte_id, 'grassetto');

        // OGGETTO
        $section->addTextBreak();
        $section->addText("Oggetto: ".$output->offerte_oggetto, 'grassetto');
        $section->addText("In riferimento alla Vostra richiesta, Vi sottoponiamo la nostra offerta per i materiali in oggetto e precisamente:");       
         $section->addText("Tubi in Gres ceramico, con giunto a bicchiere conformi al sistema C della Norma UNI EN 295 dotati del
    marchio CE e del marchio DIN Plus nei seguenti diametri e quantità", 'grassetto');        
        
        
        //RIGHE OFFERTA
        $tot_offerta = 0;
        if ($righe) {
            $tabella_righe = $section->addTable();
            foreach ($righe as $riga) {
                $tabella_righe->addRow();
                    //COLONNA 1
                    $cella_righe_1 = $tabella_righe->addCell(5100);
                    $testo_1 = $riga['righeofferte_um']. " " . number_format($riga['righeofferte_ml'], 2, ',','.') ." ".$riga['righeofferte_descrizione']." DN " . $riga['righeofferte_DN'] ." mm. ";
                    if ($riga['righeofferte_classe']!=0 or $riga['righeofferte_classe']!=null) {
                        $testo_1 .= " classe ". $riga['righeofferte_classe']. " ";
                    } 
                    if ($riga['righeofferte_FN']!=0 or $riga['righeofferte_FN']!=null) {
                        $testo_1 .= " - FN ". $riga['righeofferte_FN'];
                    }
                    $cella_righe_1->addText($testo_1);
                    //COLONNA 2
                    $cella_righe_2 = $tabella_righe->addCell(3100);
                    $testo_2 = "";
                    if($riga['righeofferte_mostra_sconto'] == 1) { 
                        $testo_2 .= "€/".$riga['righeofferte_um']." ".number_format($riga['righeofferte_euro_ml'], 2, ',','.') ." ";
                        if($riga['righeofferte_sconto']>0) {
                            $testo_2 .= " - Sconto ". $riga['righeofferte_sconto'] ."%";
                        } 
                    } else {    
                        $tot_netto_riga = $riga['righeofferte_euro_ml'] - ($riga['righeofferte_euro_ml']*$riga['righeofferte_sconto']/100); 
                        $testo_2 .= "€/".$riga['righeofferte_um']." ".number_format($tot_netto_riga, 2, ',','.');  
                    } 
                    $cella_righe_2->addText($testo_2);
                    //COLONNA 3
                    $cella_righe_3 = $tabella_righe->addCell(2000);
                    $testo_3 = "";
                    $tot_riga = ($riga['righeofferte_ml'] * $riga['righeofferte_euro_ml']) - ($riga['righeofferte_ml'] * $riga['righeofferte_euro_ml'] * ($riga['righeofferte_sconto']/100));
                    if($stampa_totali) {
                        $testo_3 .= "€ ". number_format($tot_riga, 2, ',','.'); 
                    }
                    $tot_offerta = $tot_offerta + $tot_riga;
                    $cella_righe_3->addText($testo_3);

            }         
        }
        
        // TOTALI OFFERTA
        if ($stampa_totali) {
            $section->addText("Totale Offerta € ". number_format($tot_offerta, 2, ',','.'), 'grassetto');            
        }

            $section->addTextBreak();
            $section->addText("per ogni carico saranno fornite nr. ". $output->offerte_conf_lubrificante ." confezioni di lubrificante da kg. 3 a €/cad. 15,00"); 
            $section->addText("Tubazioni prodotte in stabilimenti ubicati in U.E.", 'grassetto'); 
            
        $textrun = $section->createTextRun();
        $textrun->addText("Condizioni di vendita:", 'grassetto');
        $textrun->addTextBreak();
        $textrun->addText("Prezzi: al netto di Iva di legge");
        $textrun->addTextBreak();
        $textrun->addText("Resa: " . $output->offerte_resa);
        $textrun->addTextBreak();
        $textrun->addText("Consegna: " . $output->offerte_consegna);
        $textrun->addTextBreak();
        $textrun->addText("Pagamento: " . $output->offerte_pagamento);
        $textrun->addTextBreak();
        $textrun->addText("Validità offerta: 60 gg.");
        $textrun->addTextBreak();
        $textrun->addText("Validità prezzi : " . $output->offerte_validita);
        $textrun->addTextBreak();
 
        $section->addText("Grati per la Vostra richiesta porgiamo i nostri migliori saluti.");   
         
        if (file_exists(FCPATH."application/docs/".$dati_user->id_user.".jpg")) {         
            $section->addImage('application/docs/'.$dati_user->id_user.'.jpg', array('align'=>'left'));
        } 
        $section->addText($dati_user->nome);  
                
                                
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->word, 'Word2007');
		$filename = date('y', strtotime($output->offerte_data)) . "-" . $dati_user->codice_user . "-" . $output->offerte_id . '.docx';
		$objWriter->save($filename);


		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filename));
		flush();
		readfile($filename);
		unlink($filename); // deletes the temporary file
		exit;

	}


	public function stampa_offerta_old($id, $stampa_totali=NULL) {
	

			$this->load->model('offerte_model');
			$this->load->model('utenti_model');
			$output = $this->offerte_model->crea_stampa_offerta($id);	
			$id_offerta = $output->offerte_id;
			$id_utente = $output->offerte_user;
			$dati_user = $this->utenti_model->dati_utente($id_utente);
			
			
			$righe = $this->offerte_model->elenco_righe_offerta($id_offerta);
			if ($output) {
				$dati = array (
					'rag_sociale' => $output->ragione_sociale,
					'indirizzo' => $output->indirizzo,
					'cap' => $output->cap,
					'localita' => $output->localita,
					'provincia' => $output->provincia,
					'id_offerta' => $output->offerte_id,
					'data_offerta' => $output->offerte_data,
					'oggetto' => $output->offerte_oggetto,
					'resa' => $output->offerte_resa,
					'consegna' => $output->offerte_consegna,
					'pagamento' => $output->offerte_pagamento,
					'validita' => $output->offerte_validita,
					'righe' => $righe,
					'utente' => $dati_user->nome,
					'cod_utente' => $dati_user->codice_user,
					'offerte_conf_lubrificante' => $output->offerte_conf_lubrificante,
					'stampa_totali' => $stampa_totali
					);		
				$this->load->view('offerte_stampa_view.php', $dati);
				
			} else {
				echo 'offerta inesistente';
			}
		
	}




	public function elimina($id_offerta) {

		$this->db->delete('offerte', array('offerte_id' => $id_offerta));
		$this->db->delete('offerte_righe', array('righeofferte_idofferta' => $id_offerta));

		$dati = array (
			'messaggio' => 'Offerta '.$id_offerta.' eliminata correttamente.',
		);
			
		$this->load->view('esito_ok_view.php', $dati);	
		
		
	}	
}

/* End of file offerte.php */
/* Location: ./application/controllers/offerte.php */