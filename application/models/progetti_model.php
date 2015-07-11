<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Progetti_model extends CI_Model
{
	public function __construct() {}

	public function elenco_progetti() {
		
		$nr_progetto = $this->input->post('nr_progetto');

		$select_regione = $this->input->post('select_regione');
		if (empty($select_regione)) { $select_regione = '0'; }
		
		$select_mercato = $this->input->post('select_mercato');	
		if (empty($select_mercato)) { $select_mercato = '0'; }
		
		$select_stato_scheda = $this->input->post('select_stato_scheda');	
		if (empty($select_stato_scheda)) { $select_stato_scheda = '0'; }
		
		$sede_lavori = $this->input->post('sede_lavori_input');
		
		$id_utente = $this->session->userdata('iduser');
		$user_admin  = $this->session->userdata('admin');

		if ($user_admin == 0) {
			$q = $this
				->db
				->select('id_regione')
				->join('user_regioni', 'user_regioni.id_regione = regioni.regioni_id', 'left')
				->where('user_regioni.id_user = '.$id_utente)
				->get('regioni');
			
			$regioni_utente = $q->result_array();
			
			$regioni_user = "";
			foreach ($regioni_utente as $regione_utente) {
				if ($regione_utente === end($regioni_utente)) {
					$regioni_user .= "'".$regione_utente['id_regione']."'";
				} else {
					$regioni_user .= "'".$regione_utente['id_regione']."',";
				}
			}
		}

			/*$sql = "SELECT * FROM progetti "; 
			$sql .= "LEFT JOIN user_accounts ON progetti.id_utente = user_accounts.id_user "; 
			$sql .= "WHERE id IS NOT NULL "; 
*/
	
			$sql = "SELECT progetti.*, progetti.id as id_progetto, ";
			$sql .= "anagrafiche_1.ragione_sociale as rag_sociale_ente, ";
			$sql .= "anagrafiche_2.ragione_sociale as rag_sociale_progettista, ";
			$sql .= "anagrafiche_3.ragione_sociale as rag_sociale_impresa, ";
			$sql .= "user_accounts.nome as nome_utente_inseritore, ";
			$sql .= "stati_varianti.descrizione as variante_progetto, ";
			$sql .= "stati_progetti.descrizione_stato as stato_progetto ";
			$sql .= "FROM progetti ";
			$sql .= "LEFT JOIN anagrafiche_1 ON progetti.id_ente_appaltante = anagrafiche_1.id ";
			$sql .= "LEFT JOIN anagrafiche_2 ON progetti.id_progettista = anagrafiche_2.id ";
			$sql .= "LEFT JOIN anagrafiche_3 ON progetti.id_impresa = anagrafiche_3.id ";
			$sql .= "LEFT JOIN user_accounts ON progetti.id_utente = user_accounts.id_user "; 
			$sql .= "LEFT JOIN stati_varianti ON progetti.variante = stati_varianti.id_variante "; 
			$sql .= "LEFT JOIN stati_progetti ON progetti.stato = stati_progetti.id_stato "; 
			$sql .= "WHERE progetti.id IS NOT NULL "; 

			if ($select_regione!='0') {
				$sql .= "AND progetti.regione_lavori = '".$select_regione."' ";			
			}

			if ($select_stato_scheda!='0') {
				$sql .= "AND progetti.stato = '".$select_stato_scheda."' ";
			}
			if ($select_mercato!='0') {				
				$sql .= "AND progetti.mercato = '".$select_mercato."' ";
			}
			if ($nr_progetto!='') {				
				$sql .= "AND progetti.id = '".$nr_progetto."' ";
			}

			if ($sede_lavori!='') {				
				$sql .= "AND progetti.sede_lavori LIKE '".$sede_lavori."%' ";
			}
			
			$q = $this->db->query($sql);
				

			if ($q->num_rows > 0) {
				return $q->result_array();
			}
			return FALSE;
		
	}


	public function select_dn() {
		
		$q = $this
				->db
				->select('DN')
				->group_by('DN')
				->order_by('id')
				->get('articoli');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	public function select_classe($select_dn) {
		
		$q = $this
				->db
				->select('id,classe,descrizione_articolo')
				->where('DN', $select_dn)
				->order_by('id')
				->get('articoli');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	} 	

	public function inserisci_progetto_1() {
		
		$dati = array (
			'id_utente' => $this->session->userdata('iduser')
			);
			
		$this->db->insert('progetti', $dati); 
		$lastid = mysql_insert_id();

		return $lastid;
	}

	public function elimina_progetti_vuoti() {
	
		$this->db->where('stato', NULL);
		$this->db->where('variante', NULL);
		$this->db->where('mercato', NULL);
		$this->db->delete('progetti'); 
	
	}
	
	public function inserisci_progetto_2() {
		
		$dati = array (
			'mercato' => $this->input->post('Mercato'),
			'id_utente' => $this->session->userdata('iduser'),
			'stato' => $this->input->post('TipoScheda'),
			'variante' => $this->input->post('TipoProgetto'),			
			'id_ente_appaltante' => $this->input->post('id_ente_appaltante'),
			'id_progettista' => $this->input->post('id_progettista'),
			'id_impresa' => $this->input->post('id_impresa'),
			'oggetto' => $this->input->post('oggetto_appalto'),
			'importo_appalto' => $this->input->post('importo_appalto'),
			'sede_lavori' => $this->input->post('id_sede_lavori'),
			'regione_lavori' => $this->input->post('id_regione'),
			'ipotesi_data' => $this->input->post('ipotesi_data_appalto'),
			'note' => $this->input->post('note_appalto'),
			);
			
		$this->db->insert('progetti', $dati); 
		$lastid = mysql_insert_id();

		$dati2 = array(
			'id_progetto' => $lastid,
			'id_utente' => $this->session->userdata('iduser'),
			'stato' => $this->input->post('TipoScheda'),
			'variante' => $this->input->post('TipoProgetto'),			
			); 
		$this->db->insert('aggiornamenti_stato_progetti', $dati2); 

		return $lastid;
	}


	
	
	public function inserisci_riga_progetto() {

		$id_listino = $this->input->post('listino');
		$q = $this
				->db
				->join('articoli_listino', 'articoli_listino.id_articolo = articoli.id', 'left')
				->where('articoli_listino.id_articolo', $this->input->post('id_art'))
				->where('articoli_listino.id_listino', $id_listino)
				->get('articoli');
		
		if ($q->num_rows > 0) {
			$row = $q->row(); 
			$kg_ml = $row->kg_m;
			$euro_ml = $row->prezzo;
			$descrizione = $row->descrizione_articolo;
			$fn = $row->FN;
			$dn = $row->DN;
			$classe = $row->classe;
            $um = $row->um;
		}		
		
		$ml = $this->input->post('ml');
		
		$tot_kg = $ml * $kg_ml;
		$tot_euro = $ml * $euro_ml;
		
		$dati = array (
		    'id_articolo' => $this->input->post('id_art'),
			'id_progetto' => $this->input->post('id_progetto'),
			'DN' => $dn,
			'classe' => $classe,			
			'ml' => $ml,
			'kg_ml' => $kg_ml,
			'euro_ml' => $euro_ml,
			'tot_kg' => $tot_kg,
			'tot_euro' => $tot_euro,
			'descrizione' => $descrizione,
			'FN' => $fn,
            'um' => $um,
			'id_listino' => $id_listino
			);
			
		$this->db->insert('progetti_righe', $dati); 
			
		$q = $this
				->db
				->where('id_progetto', $this->input->post('id_progetto'))
				->get('progetti_righe');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
		
	}	

	public function elenco_righe_progetto($id_progetto) {
	
		$q = $this
				->db
				->where('id_progetto', $id_progetto)
				->get('progetti_righe');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	public function elenco_righe_progetto_report() {
	
		$q = $this
				->db
				->join('progetti', 'progetti.id = progetti_righe.id_progetto', 'left')
				->select('progetti_righe.*,progetti.data_inserimento, progetti.stato')
				->from('progetti_righe')
				->where('progetti.stato !=', 4)
				->get();
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}
	
	public function elimina_righe_progetti($id_riga) {
	
		$this->db->where('id', $id_riga);
		$this->db->delete('progetti_righe'); 
	
	}	

	public function aggiorna_somme_progetto() {
		
		$sql= "UPDATE progetti INNER JOIN somme_righe_progetti
				ON progetti.id = somme_righe_progetti.id_progetto
				SET progetti.somma_kg = somme_righe_progetti.tot_kg,
				progetti.somma_euro = somme_righe_progetti.tot_euro";

		$this->db->query($sql);

	}
	
	public function somme_righe_progetto() {

			$id_progetto = $this->input->post('id_progetto');
			
			$q_somma_kg = $this
				->db
				->select_sum('tot_kg')
				->where('id_progetto', $id_progetto)
				->get('progetti_righe');
				
			$q_somma_euro = $this
				->db
				->select_sum('tot_euro')
				->where('id_progetto', $id_progetto)
				->get('progetti_righe');

			if ($q_somma_kg->num_rows() > 0)
			{
				$row = $q_somma_kg->row();
				$somma_kg = $row->tot_kg;
			}
			if ($q_somma_euro->num_rows() > 0)
			{
				$row = $q_somma_euro->row();
				$somma_euro = $row->tot_euro;
			}
			
			$somme = array ( 
				'somma_kg' => $somma_kg,
				'somma_euro' => $somma_euro
				);
			return $somme;
			
	} 

	
	
	
	public function aggiorna_anagrafiche() {

		$id_anagrafica_nuova = $this->input->post('id_anagrafica');
		$id_anagrafica_errata = $this->input->post('anagrafica_errata_id');

		if ($id_anagrafica_nuova != NULL) :
			$dati1 = array (
				'id_ente_appaltante' => $id_anagrafica_nuova,
				);
			$this->db->where('id_ente_appaltante', $id_anagrafica_errata);	
			$this->db->update('progetti', $dati1); 

			$dati2 = array (
				'id_progettista' => $id_anagrafica_nuova,
				);
			$this->db->where('id_progettista', $id_anagrafica_errata);	
			$this->db->update('progetti', $dati2); 

			$dati3 = array (
				'id_impresa' => $id_anagrafica_nuova,
				);
			$this->db->where('id_impresa', $id_anagrafica_errata);	
			$this->db->update('progetti', $dati3); 
			
		else :
			
			return false;
			
		endif;
		
	}
	
	
	
	public function add_new_nota() {
		
		$dati = array (
			'testo_nota' => $this->input->post('newnota_testo'),
			'id_progetto' => $this->input->post('id_progetto')
		);
			
		$this->db->insert('progetti_note', $dati); 
		
	}	

	public function elenco_note($id) {
		
		$id_progetto = $this->input->post('id_progetto');
		
		if (empty($id_progetto)) {
			$id_progetto = $id;
		}
		$q = $this
				->db
				->where('id_progetto', $id_progetto)
				->order_by('data_inserimento', 'desc') 
				->get('progetti_note');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
		
	}	

	public function elenco_generico_progetti($id_progetto) {

		$q = $this
			->db
			->where('id', $id_progetto)
			->get('progetti');
		
		if ($q->num_rows > 0) {
			return $q->row();
		}
		return FALSE;
		
	
	}

	public function recupera_descrizione_stato($stato) {

		$q = $this
			->db
			->select('descrizione_stato')
			->where('id_stato', $stato)
			->get('stati_progetti');
		
		if ($q->num_rows > 0) {
			return $q->row()->descrizione_stato;
		}
		return FALSE;
	
	}

	public function recupera_descrizione_variante($variante) {

		$q = $this
			->db
			->select('descrizione')
			->where('id_variante', $variante)
			->get('stati_varianti');
		
		if ($q->num_rows > 0) {
			return $q->row()->descrizione;
		}
		return FALSE;
	
	}
	
	public function cambia_stato_post() {
		
		$stato = $this->input->post('AggiornaTipoScheda');
		$variante = $this->input->post('AggiornaTipoProgetto');
		$id_scheda = $this->input->post('id_scheda');
		$id_user = $this->session->userdata('iduser');

		$dati = array (
			'id_progetto' => $id_scheda,
			'id_utente' => $id_user,
			'stato' => $stato,
			'variante' => $variante
		);
			
		$this->db->insert('aggiornamenti_stato_progetti', $dati); 		
	
		$dati2 = array (
			'stato' => $stato,
			'variante' => $variante
		);	
		$this->db->where('id', $id_scheda);
		$this->db->update('progetti', $dati2); 
		
		if ($variante==6) {
			
			$data_appalto = $this->input->post('InputIpotesiData');

			$valore = date("Y-m-d",strtotime($data_appalto));
			
			$dati3 = array (
				'ipotesi_data' => $valore
			);	
			$this->db->where('id', $id_scheda);
			$this->db->update('progetti', $dati3); 			
			
		}

		if ($variante==7) {
			
			$nr_ordine = $this->input->post('aggiorna_nr_ordine');

			$dati4 = array (
				'nr_ordine' => $nr_ordine
			);	
			$this->db->where('id', $id_scheda);
			$this->db->update('progetti', $dati4); 			
			
		}
		
	}
	
	public function modifica_progetto() {

			$tipo_mercato = $this->input->post('Mercato');
			$oggetto_appalto = $this->input->post('oggetto_appalto'); 	
			$importo_appalto = $this->input->post('importo_appalto'); 	
			$importo_appalto_trim=str_replace('.', '', $importo_appalto); 
			$ipotesi_data_appalto = $this->input->post('ipotesi_data_appalto'); 	
			$id_progetto = $this->input->post('id_progetto');
			$nr_ordine = $this->input->post('nr_ordine');
	
		$dati = array (
			'mercato' => $tipo_mercato,
			'oggetto' => $oggetto_appalto,
			'ipotesi_data' => date("Y-m-d",strtotime($ipotesi_data_appalto)),
			'nr_ordine' => $nr_ordine
			);
			

		$this->db->where('id', $id_progetto);	
		$this->db->update('progetti', $dati); 


	}

	public function offerte_progetto($id_progetto) {
	
		$q = $this
			->db
			->join('anagrafiche', 'anagrafiche.id = offerte.offerte_impresa', 'left')
			->where('offerte_progetto',$id_progetto)
			->get('offerte');
			
		if ($q->num_rows > 0) {
			return $q->result();
		}
			
	}	

	public function elenco_listini() {
	
		$q = $this
			->db
			->where('attivo', 1)
			->get('listini');
			
		if ($q->num_rows > 0) {
			return $q->result();
		}
			
	}
	
	public function crea_stampa() {
	
		$id_progetto = $this->input->post('progetto');

		/*$q = $this
			->db
			->join('anagrafiche', 'anagrafiche.id = offerte.offerte_impresa', 'left')
			->where('offerte_id',$id_offerta)
			->get('offerte');
			
		if ($q->num_rows > 0) {
			return $q->row();
		}*/
			
	}
	
}

