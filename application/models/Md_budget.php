<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_budget extends CI_Model {
		
	protected $tableLib = "epiphanie_diab.t_lignes_budgetaires_lib";
	protected $tableBun = "epiphanie_diab.t_budget_unite_bun";
	protected $tableHib = "epiphanie_diab.t_historique_budgetaire_hib";
	protected $tableUni = "epiphanie_diab.t_unite_uni";
	
	protected $tableSlc = "epiphanie_diab.t_sous_libelle_compte_slc";
	protected $tableScp = "epiphanie_diab.t_sous_compte_scp";
	protected $tableCpt = "epiphanie_diab.t_compte_cpt";
	protected $tableOpb = "epiphanie_diab.t_operation_budget_opb";
	protected $tableBul = "epiphanie_diab.t_budget_alloue_bul";
	
	
	public function budget_alloue_cournat($id)
	{
		return $this->db
		// ->select("SUM(bul.bul_iMontant) AS somme, slc.slc_id")
		->join($this->tableBul." bul", 'slc.scl_id='.'bul.slc_id','inner')
		->where("slc.slc_id",$id)
		->get($this->tableSlc." slc")->row();
	}
	
	// public function budget_alloue_cournat($id){
		// return $this->db
					// ->select("SUM(bul_iMontant) AS total")
					// ->where("bul_iSta",1)
					// ->where("slc_id",$id)
					// ->get($this->tableBul)->row();
	// }
	
	
	public function ajout_budget_alloue($donnees){
		$this->db->insert($this->tableBul,$donnees);
		$recup = $this->db->order_by("bul_id","desc")->get($this->tableBul)->row();
		return $recup->bul_iMontant;
	}
	
	
	
	public function liste_compte_fonctionnement()
	{
		return $this->db
		->where($this->tableCpt.".cpt_iSta",1)
		->where($this->tableCpt.".cpt_iType",1)
		->order_by($this->tableCpt.".cpt_id","asc")
		->get($this->tableCpt)->result();
	}	
	
	public function liste_compte_investissements()
	{
		return $this->db
		->where($this->tableCpt.".cpt_iSta",1)
		->where($this->tableCpt.".cpt_iType",0)
		->order_by($this->tableCpt.".cpt_id","asc")
		->get($this->tableCpt)->result();
	}
	
	
	public function liste_libelle_sous_compte($id)
	{
		return $this->db

		->where($this->tableSlc.".slc_id",$id)
		->where($this->tableSlc.".slc_iSta",1)
		->order_by($this->tableSlc.".slc_id","desc")
		->get($this->tableSlc)->row();
	}

	public function liste_mouvement_suivi_budget_courant($id)
	{
		return $this->db
		// ->join($this->tableOpb, $this->tableOpb.'.slc_id='.$this->tableSlc.'.slc_id','inner')
		->where("opb_iSta",1)
		->where("scp_id",$id)
		->order_by($this->tableOpb.".opb_id","desc")
		->get($this->tableOpb)->result();
	}

	
	public function recup_detail_compte($id){
		return $this->db
		->where($this->tableScp.".scp_id", $id)
		->get($this->tableScp)->row();
	}
	
	public function montant_lib_compte($id){
		return $this->db
					->select("SUM(slc_iMontant) AS instable, SUM(slc_iMontStable) AS stable")
					->where("slc_iSta",1)
					->where("scp_id",$id)
					->get($this->tableSlc)->row();
	}
	
	public function liste_mouvement_budget_courant($id)
	{
		return $this->db
		// ->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableOpb.'.per_id','inner')
		->where("opb_iSta",1)
		->where("slc_id",$id)
		->order_by($this->tableOpb.".opb_id","desc")
		->get($this->tableOpb)->result();
	}
	
	
	public function ajout_depense_budget($donnees){
		$this->db->insert($this->tableOpb,$donnees);
		$recup = $this->db->order_by("opb_id","desc")->get($this->tableOpb)->row();
		return $recup->opb_iMontant;
	}
	
	public function montant_lib_sous_compte(){
		return $this->db
					->select("SUM(slc_iMontant) AS instable, SUM(slc_iMontStable) AS stable")
					->where("slc_iSta",1)
					->get($this->tableSlc)->row();
	}
	
	public function maj_budget($donnees,$id){
		return $this->db->where("slc_id",$id)->update($this->tableSlc,$donnees);
	}
	
	public function solde_budget_courant($id){
		return $this->db
					->select("slc_iMontant AS solde")
					->where("slc_iSta",1)
					->where("slc_id",$id)
					->get($this->tableSlc)->row();
	}
	
	public function recup_numero_compte($id){
		return $this->db
		->where($this->tableCpt.".cpt_id", $id)
		->get($this->tableCpt)->row();
	}	
	
	public function recup_sous_compte_1($id){
		return $this->db
		->where($this->tableScp.".scp_id", $id)
		->get($this->tableScp)->row();
	}
	
	public function recup_lib_sous_courant($id){
		return $this->db
			->where("slc_id",$id)
			->get($this->tableSlc)
			->row();
	}
	
	public function recup_lib_sous_compte_1($id,$date1,$date2)
	{
		return $this->db
		->where($this->tableSlc.".scp_id",$id)
		->where($this->tableSlc.".slc_iSta",1)
		->where($this->tableSlc.".slc_dDate >=",$date1)
		->where($this->tableSlc.".slc_dDate <=",$date2)
		->get($this->tableSlc)->result();
	}	
	
	public function recup_lib_sous_compte($id)
	{
		return $this->db
		->where($this->tableSlc.".scp_id",$id)
		->where($this->tableSlc.".slc_iSta",1)
		// ->order_by($this->tableSlc.".cpt_id","desc")
		->get($this->tableSlc)->result();
	}	
	
	public function recup_sous_compte($id)
	{
		return $this->db
		->where($this->tableScp.".cpt_id",$id)
		->where($this->tableScp.".scp_iSta",1)
		->order_by($this->tableScp.".cpt_id","desc")
		->get($this->tableScp)->row();
	}
	
	
	
	
	/*Ancien si bas*/
	public function insert_lignes_budget($data){
		$this->db->insert($this->tableLib,$data);
		return $this->db->order_by("lib_id","desc")->get($this->tableLib)->row();
	} 
		
	public function lignes_budget_actives(){
		return $this->db->where("lib_iSta",1)->get($this->tableLib)->result();
	} 
		
	public function lignes_budget_unite($lib){
		return $this->db->join($this->tableUni, $this->tableUni.".uni_id=".$this->tableBun.".uni_id","inner")
		->where($this->tableBun.".lib_id",$lib)->get($this->tableBun)->result();
	} 
	
	public function verif_budget_unite($uni,$lib){
		return $this->db
			->where("lib_id",$lib)
			->where("uni_id",$uni)
			->get($this->tableBun)
			->row();
	} 

	public function verif_ligne_budget($lib){
		return $this->db
			->where("lib_sLibelle",$lib)
			->get($this->tableLib)
			->row();
	} 

	public function insert_historique($data){
		return $this->db->insert($this->tableHib,$data);
	}
	
	public function insert_unite_budgetaire($data){
		return $this->db->insert($this->tableBun,$data);
	}
}
