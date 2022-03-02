<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_chirurgie extends CI_Model {
		
	protected $tablePop = "epiphanie_diab.t_planning_operation_pop";
	protected $tableEte = "epiphanie_diab.t_equipe_technique_ete";
	protected $tableAcm = "epiphanie_diab.t_acte_medical_acm";
	protected $tablePat = "epiphanie_diab.t_patients_pat";
	protected $tableCha = "epiphanie_diab.t_chambre_cha";
	protected $tableLac = "epiphanie_diab.t_liste_act_lac";
	protected $tablePer = "epiphanie_diab.t_personnel_per";
	protected $tableBop = "epiphanie_diab.t_bloc_operatoire_bop";
	protected $tableSop = "epiphanie_diab.t_salle_operation_sop";
	protected $tableFac = "epiphanie_diab.t_facture_fac";
	protected $tableElf = "epiphanie_diab.t_elements_facture_elf";
	
	protected $tableAvs = "epiphanie_diab.t_avis_specialiste_avs";
	
	
	public function recup_acte_chirurgical($id)
	{
		return $this->db
		->where("avs_iSta",1)
		->where("avs_id",$id)
		->get($this->tableAvs)
		->row();
	}
	
	public function recup_compte_rendu_hos($id)
	{
		return $this->db
		->where("pop_iSta",3)
		->where("pop_id",$id)
		->get($this->tablePop)
		->row();
	}
	
	public function maj_avis_planning($donnees,$id){
		return $this->db->where("pop_id",$id)->update($this->tableAvs,$donnees);
	}
	
	public function maj_compte_rendu_op($donnees,$id){
		return $this->db->where("pop_id",$id)->update($this->tablePop,$donnees);
	}
	
	public function recup_acm_pat_id($id)
	{
		return $this->db
		->where("pop_iSta",1)
		->where("pop_id",$id)
		->get($this->tablePop)
		->row();
	}
	
	// public function maj_salle_operation($donnees,$id){
		// return $this->db->where("sop_id",$id)->update($this->tableSop,$donnees);
	// }
	
	public function verif_planning_operation($a,$b,$c,$d, $e, $f)
	{
		return $this->db
		->where("lac_id",$a)
		->where("pat_id",$b)
		->where("pop_dDate",$c)
		->where("pop_tHeureDebut",$d)
		->where("sop_id",$f)
		->get($this->tablePop)
		->row();
	}
	
	public function insert_operation($data)
	{
		$this->db->insert($this->tablePop,$data);
		return $this->db->order_by("pop_id", "desc")->get($this->tablePop)->row();
	}
	
	public function insert_equipe($data)
	{
		$this->db->insert($this->tableEte,$data);
	}
	
	public function compte_rendu_operation($id,$data)
	{
		return $this->db->where("pop_id",$id)->update($this->tablePop,$data);
	}
	
	public function verif_avis($avis,$id){
		return $this->db
			->where("pop_sAvis",$avis)
			->where("pop_id !=",$id)
			->get($this->tablePop)
			->row();
	} 
	
	public function modification_avis($id,$donnees){
		return $this->db->where("pop_id",$id)->update($this->tablePop,$donnees);
	}
	public function verif_compte_rendu_operation($lac){
		return $this->db
			->where("lac_id",$lac)
			->get($this->tablePop)
			->row();
	} 
	
	public function verif_equipier($per,$pop){
		return $this->db
			->where("per_id",$per)
			->where("pop_id",$pop)
			->get($this->tableEte)
			->row();
	} 
	
	public function verif_modif_equipe($ete,$id){
		return $this->db
			->where("ete_sRole",$ete)
			->where("ete_id !=",$id)
			->get($this->tableEte)
			->row();
	} 
	
	public function modification_equipe($data,$a){
		return $this->db->where("ete_id",$a)->update($this->tableEte,$data);
	}
	
	public function operation_planifiee($pop)
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tablePop.'.lac_id', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id='.$this->tablePop.'.pat_id', 'left')
		->join($this->tableSop, $this->tableSop.'.sop_id='.$this->tablePop.'.sop_id', 'left')
		->join($this->tableBop, $this->tableBop.'.bop_id='.$this->tableSop.'.bop_id', 'left')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tablePop.'.per_id', 'left')
		->join($this->tableAvs, $this->tableAvs.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
		->where($this->tablePop.".pop_id",$pop)
		->get($this->tablePop)->row();
	}

	// Récupérer tous les actes chirurgicaux dans le dossier médical
	public function operation_planifiee_dossier_medical($id)
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tablePop.'.lac_id', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id='.$this->tablePop.'.pat_id', 'left')
		->join($this->tableSop, $this->tableSop.'.sop_id='.$this->tablePop.'.sop_id', 'left')
		->join($this->tableBop, $this->tableBop.'.bop_id='.$this->tableSop.'.bop_id', 'left')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tablePop.'.per_id', 'left')
		->join($this->tableAvs, $this->tableAvs.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
		->where($this->tablePop.".sea_id",$id)
		->get($this->tablePop)->result();
	}
	
	
	public function tableau_panning_operation()
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tablePop.'.lac_id', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id='.$this->tablePop.'.pat_id', 'left')
		->join($this->tableSop, $this->tableSop.'.sop_id='.$this->tablePop.'.sop_id', 'left')
		->join($this->tableBop, $this->tableBop.'.bop_id='.$this->tableSop.'.bop_id', 'left')
		// ->join($this->tableEte, $this->tableEte.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tablePop.'.per_id', 'left')
		->join($this->tableAvs, $this->tableAvs.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
		->where($this->tablePop.".pop_iSta",1)
		->order_by($this->tablePop.".pop_dDate","asc")
		->get($this->tablePop)->result();
	}
	
	
	public function liste_acm_anesth_encours($date)
	{
		return $this->db
		->join($this->tablePop, $this->tablePop.'.pop_id ='.$this->tableAcm.'.pop_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tablePop.'.lac_id', 'inner')
		->join($this->tableSop, $this->tableSop.'.sop_id='.$this->tablePop.'.sop_id', 'inner')
		->join($this->tableBop, $this->tableBop.'.bop_id='.$this->tableSop.'.bop_id', 'inner')
		// ->join($this->tableEte, $this->tableEte.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tablePop.'.per_id', 'inner')
		->where($this->tablePop.".pop_iSta",1)
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".acm_iHos",0)
		->where($this->tableAcm.".per_id IS NULL")
		->order_by($this->tablePop.".pop_dDate","asc")
		->get($this->tableAcm)->result();
	}
	
	public function liste_acm_mes_anesth_encours($date,$per)
	{
		return $this->db
		->join($this->tablePop, $this->tablePop.'.pop_id ='.$this->tableAcm.'.pop_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tablePop.'.lac_id', 'inner')
		->join($this->tableSop, $this->tableSop.'.sop_id='.$this->tablePop.'.sop_id', 'inner')
		->join($this->tableBop, $this->tableBop.'.bop_id='.$this->tableSop.'.bop_id', 'inner')
		// ->join($this->tableEte, $this->tableEte.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tablePop.'.per_id', 'inner')
		->where($this->tablePop.".pop_iSta",1)
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".acm_iHos",0)
		->where($this->tableAcm.".per_id",$per)
		->order_by($this->tablePop.".pop_dDate","asc")
		->get($this->tableAcm)->result();
	}
	
	
	
	public function tableau_patients_operes()
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tablePop.'.lac_id', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id='.$this->tablePop.'.pat_id', 'left')
		// ->join($this->tableCha, $this->tableCha.'.cha_id='.$this->tablePop.'.cha_id', 'left')
		->join($this->tableEte, $this->tableEte.'.pop_id='.$this->tablePop.'.pop_id', 'left')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tablePop.'.per_id', 'left')
		->where($this->tablePop.".pop_iSta",3)
		->order_by($this->tablePop.".pop_dDate","asc")
		->group_by($this->tablePop.".pop_id","asc")
		->get($this->tablePop)->result();
	}
	
	public function recup_equipe_technique($ete)
	{
		return $this->db
			// ->join($this->tableEte, $this->tableEte.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
			// ->join($this->tablePer, $this->tablePer.'.per_id='.$this->tablePop.'.per_id', 'inner')
			->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableEte.'.per_id', 'inner')
			->where($this->tableEte.".pop_id",$ete)
			->where($this->tableEte.".ete_iSta",1)
			->order_by($this->tableEte.".ete_id","desc")
			->get($this->tableEte)
			->result();
	}
	
	public function recup_avis($avis)
	{
		return $this->db
			->where("pop_id",$avis)->get($this->tablePop)->row();
	}
	
	 
	
	public function liste_personnel()
	{
		return $this->db
			->where("per_iSta",1)
			->get($this->tablePer)
			->row();
	}
	
	
	public function maj_chirurgie($donnees,$id){
		return $this->db->where("ete_id",$id)->update($this->tableEte,$donnees);
	}
	
	public function maj_planning_valider($donnees,$id){
		return $this->db->where("pop_id",$id)->update($this->tablePop,$donnees);
	}
	
	public function maj_planning_supprimer($donnees,$id){
		return $this->db->where("pop_id",$id)->update($this->tablePop,$donnees);
	}
	
}
?>