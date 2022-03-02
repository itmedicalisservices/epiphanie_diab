<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_recette extends CI_Model {
		
	protected $tableCpt = "epiphanie_diab.t_compte_cpt";
	protected $tableRec = "epiphanie_diab.t_recette_rec";
	protected $tableMor = "epiphanie_diab.t_mouvement_recette_mor";
	protected $tableFac = "epiphanie_diab.t_facture_fac";
	
	
	
	public function etat_caisse($date1, $date2)
	{
		return $this->db
		// ->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAco.'.pat_id ', 'inner')
		// ->join($this->tableLac, $this->tableLac.'.lac_id = '.$this->tableAco.'.lac_id ', 'inner')
		->where($this->tableFac.".fac_iSta", 1)
		->where($this->tableFac.'.per_id', $this->session->epiphanie_diab)/*io stesso*/
		->where($this->tableFac.".fac_dDatePaie >=", $date1)
		->where($this->tableFac.".fac_dDatePaie <=", $date2)
		->get($this->tableFac)->result();
	}
	
	
	public function recup_lib_compte_recette($id){
		return $this->db
		->where($this->tableCpt.".cpt_id", $id)
		->get($this->tableCpt)->row();
	}
	
	
	public function recup_mouvement_recette($id)
	{
		return $this->db
		->where("mor_iSta",1)
		->where("rec_id",$id)
		->order_by($this->tableMor.".mor_dDate","desc")
		->get($this->tableMor)->row();
	}
	
	public function liste_mouvement_recette($id)
	{
		return $this->db
		->where("mor_iSta",1)
		->where("rec_id",$id)
		->order_by($this->tableMor.".mor_id","desc")
		->get($this->tableMor)->result();
	}

	public function ajout_recette($donnees){
		$this->db->insert($this->tableMor,$donnees);
		$recup = $this->db->order_by("mor_id","desc")->get($this->tableMor)->row();
		return $recup->mor_iMontant;
	}
	
	public function recup_recette($id){
		return $this->db
		->where($this->tableRec.".cpt_id", $id)
		->where($this->tableRec.".rec_iSta",1)
		->get($this->tableRec)->result();
	}
	
	public function recup_recette_courante($id){
		return $this->db
		->where($this->tableRec.".rec_id", $id)
		->get($this->tableRec)->row();
	}
	
	public function liste_compte_recette()
	{
		return $this->db
		->where($this->tableCpt.".cpt_iSta",1)
		->where($this->tableCpt.".cpt_iType",2)
		->order_by($this->tableCpt.".cpt_id","asc")
		->get($this->tableCpt)->result();
	}
	
}
