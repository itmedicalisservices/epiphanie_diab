<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_banque extends CI_Model {
		
	protected $tableBnq = "epiphanie_diab.t_banque_bnq";
	protected $tableMvt = "epiphanie_diab.t_mouvement_mvt";
	protected $tablePer = "epiphanie_diab.t_personnel_per";


	public function solde_banque_courant($id){
		return $this->db
					->select("bnq_iMontant AS solde")
					// ->join($this->tableBnq, $this->tableBnq.'.bnq_id='.$this->tableMvt.'.bnq_id','inner')
					->where("bnq_iSta",1)
					->where("bnq_id",$id)
					->get($this->tableBnq)->row();
	}
	
	public function solde_banque($id){
		return $this->db
					->select("SUM(mvt_iMontant) AS solde")
					// ->join($this->tableBnq, $this->tableBnq.'.bnq_id='.$this->tableMvt.'.bnq_id','inner')
					->where("mvt_iSta",1)
					->where("bnq_id",$id)
					->get($this->tableMvt)->row();
	}
	
	public function maj_mouvement($donnees,$id){
		return $this->db->where("mvt_id",$id)->update($this->tableMvt,$donnees);
	}
	
	public function recup_mouvement($id)
	{
		return $this->db
		->where($this->tableMvt.".mvt_id",$id)
		->get($this->tableMvt)->row();
	}
	
	public function recup_banque_courant($id){
		return $this->db
			->where("bnq_id",$id)
			->get($this->tableBnq)
			->row();
	} 
	
	public function ajout_depot($donnees){
		$this->db->insert($this->tableMvt,$donnees);
		$recup = $this->db->order_by("mvt_id","desc")->get($this->tableMvt)->row();
		return $recup->mvt_iMontant;
	}	
	
	public function liste_mouvement_actifs($id)
	{
		return $this->db
		// ->join($this->tableMvt, $this->tableMvt.'.bnq_id='.$this->tableBnq.'.bnq_id','inner')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableMvt.'.per_id','inner')
		->limit(10,0)
		->where("mvt_iSta",1)
		->where("bnq_id",$id)
		->order_by($this->tableMvt.".mvt_id","desc")
		->get($this->tableMvt)->result();
	}	
	
	public function liste_tout_mouvement($id,$date1,$date2)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableMvt.'.per_id','inner')
		->where("mvt_iSta",1)
		->where("bnq_id",$id)
		->where($this->tableMvt.".mvt_dDateOper >=",$date1)
		->where($this->tableMvt.".mvt_dDateOper <=",$date2)
		// ->order_by($this->tableMvt.".mvt_dDateOper","desc")
		->get($this->tableMvt)->result();
	}	
	
	public function liste_mouvement($id,$date1,$date2,$mouvement)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableMvt.'.per_id','inner')
		->where("mvt_iSta",1)
		->where("bnq_id",$id)
		->where($this->tableMvt.".mvt_dDateOper >=",$date1)
		->where($this->tableMvt.".mvt_dDateOper <=",$date2)
		->where($this->tableMvt.".mvt_iType ",$mouvement)
		// ->order_by($this->tableMvt.".mvt_dDateOper","desc")
		->get($this->tableMvt)->result();
	}	
	
}
