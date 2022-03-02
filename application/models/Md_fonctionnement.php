<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_fonctionnement extends CI_Model {
		
	protected $tableFcp = "epiphanie_diab.t_fonctionnement_compte_fcp";
	protected $tableMde = "epiphanie_diab.t_mouvement_depenses_mde";
	protected $tableCpt = "epiphanie_diab.t_compte_cpt";
	protected $tableSfc = "epiphanie_diab.t_sous_fonct_compte_sfc";
	protected $tableBuf = "epiphanie_diab.t_budget_fonct_buf";
	
	
	public function budget_fonct_courant_periodique($id,$date1,$date2)
	{
		return $this->db
		->select("SUM(buf_iMontant) AS somme ")
		->where("sfc_id",$id)
		->where($this->tableBuf.".buf_dDate >=",$date1)
		->where($this->tableBuf.".buf_dDate <=",$date2)
		->get($this->tableBuf)->row();
	}	
	
	public function budget_fonct_courant($id)
	{
		return $this->db
		->select("SUM(buf_iMontant) AS somme ")
		->where("sfc_id",$id)
		->get($this->tableBuf)->row();
	}
	
	public function liste_budget_fonct_courant($id)
	{
		return $this->db
		->where("buf_iSta",1)
		->where("sfc_id",$id)
		->order_by($this->tableBuf.".buf_id","desc")
		->get($this->tableBuf)->result();
	}
	
	public function ajout_budget_fonct($donnees){
		$this->db->insert($this->tableBuf,$donnees);
		$recup = $this->db->order_by("buf_id","desc")->get($this->tableBuf)->row();
	}
	
	public function recup_sous_compte_1($id){
		return $this->db
		->where($this->tableSfc.".sfc_id", $id)
		->get($this->tableSfc)->row();
	}	
	
	public function recup_compte($id){
		return $this->db
		->where($this->tableFcp.".fcp_id", $id)
		->get($this->tableFcp)->row();
	}	
	
	public function recup_numero_compte($id){
		return $this->db
		->where($this->tableCpt.".cpt_id", $id)
		->get($this->tableCpt)->row();
	}
	
	public function recup_lib_sous_compte($id)
	{
		return $this->db
		->where($this->tableSfc.".fcp_id",$id)
		->where($this->tableSfc.".sfc_iSta",1)
		// ->order_by($this->tableSlc.".cpt_id","desc")
		->get($this->tableSfc)->result();
	}	
	
	public function recup_sous_compte($id)
	{
		return $this->db
		->where($this->tableFcp.".cpt_id",$id)
		->where($this->tableFcp.".fcp_iSta",1)
		->order_by($this->tableFcp.".cpt_id","desc")
		->get($this->tableFcp)->row();
	}
	
	
	public function liste_compte_fonctionnement()
	{
		return $this->db
		->where($this->tableCpt.".cpt_iSta",1)
		->where($this->tableCpt.".cpt_iType",1)
		->order_by($this->tableCpt.".cpt_id","asc")
		->get($this->tableCpt)->result();
	}
	
		
	public function montant_fonct($id,$date1,$date2){
		return $this->db
			->select("SUM(mde_iMontant) AS montant")
			->where("fcp_id",$id)
			->where("mde_iSta",1)
			->where($this->tableMde.".mde_dDate >=",$date1)
			->where($this->tableMde.".mde_dDate <=",$date2)
			->get($this->tableMde)->row();
	}
	
	
	public function liste_mvt_depense_courant($id,$date1,$date2)
	{
		return $this->db
		// ->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableMde.'.per_id','inner')
		->where("mde_iSta",1)
		->where("fcp_id",$id)
		->where($this->tableMde.".mde_dDate >=",$date1)
		->where($this->tableMde.".mde_dDate <=",$date2)
		->get($this->tableMde)->result();
	}
	
	public function montant_fonctionnement($id){
		return $this->db
					->select("SUM(mde_iMontant) AS montant")
					->where("fcp_id",$id)
					->where("mde_iSta",1)
					->get($this->tableMde)->row();
	}
	
	public function liste_mouvement_depenses($id)
	{
		return $this->db
		// ->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableMvt.'.per_id','inner')
		->limit(5,0)
		->where("mde_iSta",1)
		->where("fcp_id",$id)
		->order_by($this->tableMde.".mde_id","desc")
		->get($this->tableMde)->result();
	}
	
	
	public function ajout_depenses($donnees){
		$this->db->insert($this->tableMde,$donnees);
		$recup = $this->db->order_by("mde_id","desc")->get($this->tableMde)->row();
		return $recup->mde_iMontant;
	}

	public function recup_compte_fonct_courant($id){
		return $this->db
		->where($this->tableFcp.".fcp_id", $id)
		->get($this->tableFcp)->row();
	}	
	
	public function recup_compte_fonct($id){
		return $this->db
		->where($this->tableFcp.".cpt_id", $id)
		->get($this->tableFcp)->result();
	}
	
}
