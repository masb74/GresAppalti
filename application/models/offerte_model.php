<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offerte_model extends CI_Model
{
	public function __construct() {}

    // Loop aggiornamento um e idarticoli mancanti
    public function aggiorna_temp() {

        $q = $this
                ->db
                ->get('progetti_righe');
        $righe = $q->result();
                
        foreach ($righe as $riga) {
            $dn = $riga->DN;
            $fn = $riga->FN;
            $descr = $riga->descrizione;
            $classe = $riga->classe;
                $q2 = $this
                    ->db
                    ->where('DN', $dn)    
                    ->where('FN', $fn)    
                    ->where('classe', $classe)    
                    ->where('descrizione_articolo', $descr)    
                    ->get('articoli');
                $articolo = $q2->row();

        
        $dati = array (
            'um' => $articolo->um,
            'id_articolo' => $articolo->id
        );
        $this->db->where('id', $riga->id);    
        $this->db->update('progetti_righe', $dati); 
                                
        }   
                 
        
        return true;

    }

	public function crea_offerta() {

		$dati = array (
			'offerte_tipologia' => $this->input->post('TipoOfferta'),
			'offerte_progetto' => $this->input->post('id_progetto'),
			'offerte_user' => $this->session->userdata('iduser'),
			'offerte_impresa' => $this->input->post('id_impresa'),
			'offerte_resa' => $this->input->post('offerta_resa'),
			'offerte_consegna' => $this->input->post('offerta_consegna'),
			'offerte_pagamento' => $this->input->post('offerta_pagamento'),
			'offerte_validita' => $this->input->post('offerta_validita')

			);
		$this->db->insert('offerte', $dati); 
		$lastid = mysql_insert_id();

		$id_progetto = $this->input->post('id_progetto');
		
		$query = "UPDATE offerte INNER JOIN progetti
				ON offerte.offerte_progetto = progetti.id
				SET offerte.offerte_oggetto = progetti.oggetto
				WHERE offerte.offerte_progetto = $id_progetto 
				AND offerte.offerte_oggetto IS NULL";
		$q2 = $this->db->query($query);	

		return $lastid;
		
		
	}

	public function crea_righe_offerta($id_offerta) {

	
		$id_progetto = $this->input->post('id_progetto');
		$query = "INSERT into offerte_righe (righeofferte_idofferta, righeofferte_idarticolo, righeofferte_DN, righeofferte_classe, righeofferte_ml, righeofferte_kg_ml, righeofferte_euro_ml, righeofferte_tot_kg, righeofferte_tot_euro, righeofferte_descrizione, righeofferte_FN, righeofferte_listino, righeofferte_um)
		SELECT $id_offerta, id_articolo, DN, classe, ml, kg_ml, euro_ml, tot_kg, tot_euro, descrizione, FN, id_listino, um 
		FROM progetti_righe
		WHERE id_progetto = $id_progetto";
			
		$q = $this->db->query($query);	
		
	}

	public function elenco_righe_offerta($rif=NULL) {
		
		if (!$rif) {
			$id_offerta = $this->input->post('id_offerta');
		} else {
			$id_offerta = $rif;
		}
		$q = $this
				->db
				->where('righeofferte_idofferta', $id_offerta)
				->get('offerte_righe');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
	}


	public function inserisci_riga_offerta() {

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
			
		}			
		
		$ml = $this->input->post('ml');
		
		$tot_kg = $ml * $kg_ml;
		$tot_euro = $ml * $euro_ml;
		
		$dati = array (
            'righeofferte_idarticolo' => $this->input->post('id_art'),
			'righeofferte_idofferta' => $this->input->post('id_offerta'),
			'righeofferte_DN' => $dn,
			'righeofferte_classe' => $classe,			
			'righeofferte_ml' => $ml,
			'righeofferte_kg_ml' => $kg_ml,
			'righeofferte_euro_ml' => $euro_ml,
			'righeofferte_tot_kg' => $tot_kg,
			'righeofferte_tot_euro' => $tot_euro,
			'righeofferte_descrizione' => $descrizione,
			'righeofferte_FN' => $fn,
			'righeofferte_listino' => $id_listino
			);
			
		$this->db->insert('offerte_righe', $dati); 
			
		$q = $this
				->db
				->where('righeofferte_idofferta', $this->input->post('id_offerta'))
				->get('offerte_righe');
		
		if ($q->num_rows > 0) {
			return $q->result_array();
		}
		return FALSE;
		
	}	

	public function crea_stampa_offerta($id_offerta=NULL) {
	
		if (!$id_offerta) {
			$id_offerta = $this->input->post('id_offerta');
		} 
		
		$q = $this
			->db
			->join('anagrafiche', 'anagrafiche.id = offerte.offerte_impresa', 'left')
			->where('offerte_id',$id_offerta)
			->get('offerte');
			
		if ($q->num_rows > 0) {
			return $q->row();
		}
			
	}

	public function aggiorna_offerta() {

			$id_offerta = $this->input->post('id_offerta');
			$tipologia = $this->input->post('TipoOfferta');
			$id_impresa = $this->input->post('id_impresa');
			$offerta_resa = $this->input->post('offerta_resa');
			$offerta_consegna = $this->input->post('offerta_consegna');
			$offerta_pagamento = $this->input->post('offerta_pagamento');
			$offerta_validita = $this->input->post('offerta_validita');
			$offerta_oggetto = $this->input->post('offerta_oggetto');
			$offerta_lubrificante = $this->input->post('offerta_lubrificante');
	
		$dati = array (
			'offerte_tipologia' => $tipologia,
			'offerte_impresa' => $id_impresa,
			'offerte_oggetto' => $offerta_oggetto,
			'offerte_resa' => $offerta_resa,
			'offerte_consegna' => $offerta_consegna,
			'offerte_pagamento' => $offerta_pagamento,
			'offerte_validita' => $offerta_validita,
			'offerte_conf_lubrificante' => $offerta_lubrificante,
			);
			

		$this->db->where('offerte_id', $id_offerta);	
		$this->db->update('offerte', $dati); 
		
		return true;

	}


	public function elenco_offerte() {
		
		$nr_offerta = $this->input->post('nr_offerta');
		$nr_progetto = $this->input->post('nr_progetto');
		$id_tipologia = $this->input->post('select_tipologia');	
		$impresa = $this->input->post('id_impresa');

		$id_utente = $this->session->userdata('iduser');
		$user_admin  = $this->session->userdata('admin');

			$sql = "SELECT offerte.*, offerte.offerte_id as id_offerta, ";
			$sql .= "anagrafiche_3.ragione_sociale as rag_sociale_impresa, ";
			$sql .= "user_accounts.nome as nome_utente_inseritore ";
			$sql .= "FROM offerte ";
			$sql .= "LEFT JOIN anagrafiche_3 ON offerte.offerte_impresa = anagrafiche_3.id ";
			$sql .= "LEFT JOIN user_accounts ON offerte.offerte_user = user_accounts.id_user "; 
			$sql .= "WHERE offerte.offerte_id IS NOT NULL "; 

			if ($nr_offerta!='') {
				$sql .= "AND offerte.offerte_id = '".$nr_offerta."' ";			
			}

			if ($nr_progetto!='') {
				$sql .= "AND offerte.offerte_progetto = '".$nr_progetto."' ";
			}
			if ($id_tipologia!='0') {				
				$sql .= "AND offerte.offerte_tipologia = '".$id_tipologia."' ";
			}
			if ($impresa!='') {				
				$sql .= "AND offerte.offerte_impresa = '".$impresa."' ";
			}

			
			$q = $this->db->query($sql);
				

			if ($q->num_rows > 0) {
				return $q->result_array();
			}
			return FALSE;
		
	}	

	public function aggiorna_sconti_righe() {
		
		$nr_offerta = $this->input->post('id_offerta');
		$sconto = $this->input->post('sconto');

		$righe_offerta = $this->elenco_righe_offerta($nr_offerta);
		
		foreach ($righe_offerta as $riga) {
				
			$id_riga = $riga['righeofferte_id'];	
			$metri = $riga['righeofferte_ml'];
			$euro_ml = $riga['righeofferte_euro_ml'];
			
			$tot_riga = ($metri * $euro_ml) - ($metri * $euro_ml * $sconto/100);

			$dati = array (
				'righeofferte_sconto' => $sconto,
				'righeofferte_tot_euro' => $tot_riga
			);
						
			$this->db->where('righeofferte_id', $id_riga);	
			$this->db->update('offerte_righe', $dati); 
						  
		}
			

		return true;
	}	

	public function prezzo_articolo($articolo, $listino) {

		$q = $this
			->db
			->where('id_listino',$listino)
			->where('id_articolo',$articolo)
			->get('articoli_listino');
			
		if ($q->num_rows > 0) {
			return $q->row();
		}
				
	}
	
			
		

	public function aggiorna_prezzi_listino() {
		
		$nr_offerta = $this->input->post('id_offerta');
		$id_listino = $this->input->post('id_listino');

		$righe_offerta = $this->elenco_righe_offerta($nr_offerta);
		
		foreach ($righe_offerta as $riga) {
				
			$id_riga = $riga['righeofferte_id'];	
			$metri = $riga['righeofferte_ml'];
			$sconto = $riga['righeofferte_sconto'];
			$euro_ml = $this->prezzo_articolo($riga['righeofferte_idarticolo'], $id_listino);
			//echo $id_listino.' '.$riga['righeofferte_idarticolo'].' '.$euro_ml->prezzo.'<br />';
			
			$tot_riga = ($metri * $euro_ml->prezzo) - ($metri * $euro_ml->prezzo * $sconto/100);

			$dati = array (
				'righeofferte_euro_ml' => $euro_ml->prezzo,
				'righeofferte_listino' => $id_listino,
				'righeofferte_tot_euro' => $tot_riga
			);
						
			$this->db->where('righeofferte_id', $id_riga);	
			$this->db->update('offerte_righe', $dati); 
					  
		}
			

		return true;
	}	
	
	public function aggiorna_flag_sconto() {
		
		$nr_riga = $this->input->post('id_riga');

		$q = $this
			->db
			->select('righeofferte_mostra_sconto')
			->where('righeofferte_id',$nr_riga)
			->get('offerte_righe');
			
		if ($q->num_rows > 0) {
			$result = $q->row();
		}		
		
		$stato_attuale = $result->righeofferte_mostra_sconto;
		
		if ($stato_attuale==0) {
			$nuovo_stato = 1;
		} else {
			$nuovo_stato = 0;
		}
		
			$dati = array (
				'righeofferte_mostra_sconto' => $nuovo_stato
			);
						
			$this->db->where('righeofferte_id', $nr_riga);	
			$this->db->update('offerte_righe', $dati); 
						  
			

		return true;
	}	

}

