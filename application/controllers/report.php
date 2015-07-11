<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->library("Pdf");
    }

    public function index() {

		$this->load->model('anagrafiche_model');
		$regioni = $this->anagrafiche_model->elenco_regioni();

		$dati = array (
			'elenco_regioni' => $regioni,
			);
		$this->load->view('report_filtro_view.php', $dati);	

	}


    public function progetti() {
	
	$tipo_report = $this->input->post('tipo_report');
	$this->load->model('progetti_model');	
	$this->progetti_model->aggiorna_somme_progetto();
	$elenco_progetti = $this->progetti_model->elenco_progetti();
	
	if ($tipo_report==2) {
 
/*			// create new PDF document
			$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);   
 
			// set document information
			//    $pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Massimo Bovi');
			$pdf->SetTitle('Report Progetti in Corso');
			//    $pdf->SetSubject('TCPDF Tutorial');
			//    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');  
 
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,0,0), array(0,0,0));
    $pdf->setFooterData(array(0,0,0), array(0,0,0));
 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
 
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);   
 
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }  
 
    // ---------------------------------------------------------   
 
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);  
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('helvetica', '', 10, '', true);  
 
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
 
    // set text shadow effect
    //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));   
 


	$dati = array (
		'elenco_progetti' => $elenco_progetti
	);
	$html = $this->load->view('report_progetti_view.php', $dati, TRUE);
//	echo $html;
//	die();	
 
    // Print text using writeHTMLCell()
    $pdf->writeHTML($html, true, false, false, false, 'C');  
 
    // ---------------------------------------------------------   
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('ReportProgetti.pdf', 'I');   
 
	*/	}

		// SE TIPO REPORT EXCEL
		if ($tipo_report==1) {

		$dati = array (
			'elenco_progetti' => $elenco_progetti,
			);
	
		$this->load->view('report_xls_progetti_view.php', $dati);			

		}		
		
	}

	
    public function anagrafiche() {

		$this->load->model('anagrafiche_model');
		$anagrafiche = $this->anagrafiche_model->elenco_anagrafiche_generico();
		
		$ana_out = array();
		foreach ($anagrafiche as $anagrafica) {
			$id_anagrafica = $anagrafica['id'];
			$referenti = $this->anagrafiche_model->elenco_referenti_anagrafica($id_anagrafica);
			if($referenti) {
				$lista_ref="";
				foreach ($referenti as $referente) {
					$lista_ref.=$referente->referenti_nome .",";
				}
				$anagrafica['referenti'] = $lista_ref;
			}

	
			
			
			$ana_out[] = $anagrafica;
		}
		
		$dati = array (
			'anagrafiche' => $ana_out,
		);



		
		$this->load->view('report_anagrafiche_view.php', $dati);	

	}

    public function righe_progetti() {

		$this->load->model('progetti_model');
		$righe = $this->progetti_model->elenco_righe_progetto_report();

		$dati = array (
			'righe' => $righe,
			);
	
		$this->load->view('report_righe_view.php', $dati);	

	}
	
 
} 
/* End of file c_test.php */
/* Location: ./application/controllers/c_test.php */