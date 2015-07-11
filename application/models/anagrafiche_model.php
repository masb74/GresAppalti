<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anagrafiche_model extends CI_Model
{
	public function __construct() {}

	public function elenco_regioni() {
	
		$iduser = $this->session->userdata('iduser');
		$amministratore = $this->session->userdata('admin');

		$q = $this
			->db
			->get('regioni');

				
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}
	
	public function elenco_provincie() {
	
		$q = $this
				->db
				->select('provincia')
				->group_by('provincia')
				->get('comuni');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	public function cerca_anagrafica($tipologia,$stringa) {

		$this->db->select('ragione_sociale,id,tipologia');
		if ($tipologia != 99) { $this->db->where('tipologia',$tipologia); }
		$this->db->like('ragione_sociale',$stringa );
		$this->db->limit(20);
		$this->db->order_by('ragione_sociale');
		$q = $this->db->get('anagrafiche');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}
	public function cerca_anagrafica2($tipologia) {

		$stringa = $this->input->post('stringa');
		$anagrafica_errata_id = $this->input->post('anagrafica_errata_id');
		
		$this->db->select('ragione_sociale,id,tipologia');
		$this->db->where('tipologia',$tipologia); 
		$this->db->where_not_in('id', $anagrafica_errata_id);
		$this->db->like('ragione_sociale',$stringa );
		$this->db->limit(20);
		$q = $this->db->get('anagrafiche');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	public function cerca_anagrafica_generico($id_anagrafica) {
		$q = $this
				->db
				->where('id',$id_anagrafica)
				->limit(1)
				->get('anagrafiche');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

    public function dettaglio_anagrafica($id_anagrafica) {
        $q = $this
                ->db
                ->where('id',$id_anagrafica)
                ->get('anagrafiche');
        
        if ($q->num_rows > 0) {
            return $q->row();
        }
        return FALSE;
    }

	public function elenco_referenti_anagrafica($id_anagrafica=NULL) {
		
		if(!$id_anagrafica) {
			$id_anagrafica = $this->input->post('id_anagrafica');
		}
		$q = $this
				->db
				->where('referenti_anagrafica',$id_anagrafica)
				->join('referenti_livelli', 'referenti_livelli.id_livello = referenti.referenti_livello')
				->get('referenti');
		
		if ($q->num_rows > 0) {
			return $q->result();
		}
		return FALSE;
	}

	public function cerca_anagrafica_generico_2($id_anagrafica) {
		$q = $this
				->db
				->where('id',$id_anagrafica)
				->get('anagrafiche');
		
		if ($q->num_rows > 0) {
			return $q->row();
		}
		return FALSE;
	}

	public function elenco_anagrafiche_generico() {
		$q = $this
				->db
				->get('anagrafiche');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}
	
	public function assegna_anagrafica($id_anagrafica) {
		
		$q = $this
				->db
				->where('id',$id_anagrafica)
				->limit(1)
				->get('anagrafiche');
		
		if ($q->num_rows > 0) {
			return $q->row();
		}
		return FALSE;

	}

	public function dettaglio_citta($id_anagrafica) {
		
		$q = $this
				->db
				->where('id',$id_anagrafica)
				->limit(1)
				->get('comuni');
		
		if ($q->num_rows > 0) {
			return $q->row();
		}
		return FALSE;

	}
	
	public function cerca_citta($stringa) {
		$q = $this
				->db
				->select('id,comune,provincia,regione')
				->like('comune',$stringa )
				//->limit(20)
				->get('comuni');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	public function add_new_anagrafica($tipologia) {
		$dati = array (
			'tipologia' => $tipologia,
			'ragione_sociale' => $this->input->post('rag_sociale'),
			'email' => $this->input->post('email'),
			'indirizzo' => $this->input->post('indirizzo'),
			'cap' => $this->input->post('cap'),
			'localita' => $this->input->post('localita'),
			'provincia' => $this->input->post('provincia'),
			'p_iva' => $this->input->post('p_iva'),		
			'telefono' => $this->input->post('telefono'),
			'fax' => $this->input->post('fax'),
			'id_user_inseritore' => $this->input->post('id_user_inseritore')
			
			);
			
		$this->db->insert('anagrafiche', $dati); 
		$lastid = mysql_insert_id();
		return $lastid;
	}	

	public function aggiorna_anagrafica() {

		$provincia = $this->input->post('provincia');
		
		if(!empty($provincia)) {
			$this->db->select_min('regione');
			$this->db->from('comuni');
			$this->db->where('provincia',$provincia);
			$query_p = $this->db->get();
		}
		if ($query_p->num_rows > 0) {
			$row = $query_p->row();
			$regione = $row->regione;
		}
	
			
		$id_anagrafica = $this->input->post('id_anagrafica');
		$dati = array (
			'ragione_sociale' => $ragione_sociale = $this->input->post('ragione_sociale'),
			'indirizzo' => $this->input->post('indirizzo'),
			'cap' => $this->input->post('cap'),
			'telefono' => $this->input->post('telefono'),
			'fax' => $this->input->post('fax'),
			'localita' => $this->input->post('localita'),
			'provincia' => $this->input->post('provincia'),
			'p_iva' => $this->input->post('p_iva'),		
			'tipologia' => $this->input->post('tipologia'),		
			'codice' => $this->input->post('codice'),
			'email' => $this->input->post('email'),
			'qualifica' => $this->input->post('qualifica'),
			'regione' => $regione
			);
		$this->db->where('id', $id_anagrafica);	
		$this->db->update('anagrafiche', $dati); 

	}	

	public function add_anagrafica() {
		

		$user_admin = $this->session->userdata('admin');
		if ($user_admin == 1) {
			$approvato = 1;
		} else {
			$approvato = 0;			
		}
		
		$provincia = $this->input->post('provincia');
		
		if(!empty($provincia)) {
			$this->db->select_min('regione');
			$this->db->from('comuni');
			$this->db->where('provincia',$provincia);
			$query_p = $this->db->get();
		}
		if ($query_p->num_rows > 0) {
			$row = $query_p->row();
			$regione = $row->regione;
		}
	
		$dati = array (
			'ragione_sociale' => $ragione_sociale = $this->input->post('ragione_sociale'),
			'indirizzo' => $this->input->post('indirizzo'),
			'cap' => $this->input->post('cap'),
			'telefono' => $this->input->post('telefono'),
			'fax' => $this->input->post('fax'),
			'localita' => $this->input->post('localita'),
			'provincia' => $this->input->post('provincia'),
			'p_iva' => $this->input->post('p_iva'),		
			'tipologia' => $this->input->post('tipologia'),		
			'codice' => $this->input->post('codice'),
			'qualifica' => $this->input->post('qualifica'),
			'email' => $this->input->post('email'),
			'id_user_inseritore' => $this->session->userdata('iduser'),
			'approvato' => $approvato,
			'regione' => $regione
			);
		$this->db->insert('anagrafiche', $dati); 
		
		$lastid = mysql_insert_id();
		return $lastid;

	}	
	
	public function elimina_anagrafica($id_anagrafica) {
		
		
		$this->db->where('id', $id_anagrafica);
		$this->db->delete('anagrafiche'); 


	}	
	
	public function elenco_anagrafiche($approvato) {
		$q = $this
				->db
				->where('approvato', $approvato)
				//->where('tipologia', $tipologia)
				->join('user_accounts', 'user_accounts.id_user = anagrafiche.id_user_inseritore')
				->get('anagrafiche');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}
	
	public function elenco_tipologie() {
		$q = $this
				->db
				->get('anagrafiche_tipologie');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}
	
	public function check_anagrafica_usata_progetti($id_anagrafica) 
	{
		$q = $this
				->db
				->select('id')
				->where('id_ente_appaltante', $id_anagrafica)
				->or_where('id_progettista', $id_anagrafica)
				->or_where('id_impresa', $id_anagrafica)
				->get('progetti');
					
		if ($q->num_rows > 0) {
			return $q->result();
		}
		return FALSE;		

	}	

	public function check_anagrafica_usata_offerte($id_anagrafica) 
	{
		$q = $this
				->db
				->select('offerte_id')
				->where('offerte_impresa', $id_anagrafica)
				->get('offerte');	
					
		if ($q->num_rows > 0) {
			return $q->result();
		}
		return FALSE;		

	}	
	
}

