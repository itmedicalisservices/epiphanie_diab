<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_laboratoire extends CI_Model {
		
	protected $tableEac = "epiphanie_diab.t_entree_accessoire_eac";
	protected $tableAcc = "epiphanie_diab.t_accessoire_acc";
	protected $tableSac = "epiphanie_diab.t_stock_accessoire_sac";
	protected $tableAcs = "epiphanie_diab.t_accessoire_acs";
	protected $tablePer = "epiphanie_diab.t_personnel_per";
	
	protected $tableAla = "epiphanie_diab.t_acte_laboratoire_ala";
	protected $tableTan = "epiphanie_diab.t_tube_analyse_tan";
	protected $tableTex = "epiphanie_diab.t_type_examen_tex";
	protected $tableEla = "epiphanie_diab.t_element_analyse_ela";
	protected $tableAcm = "epiphanie_diab.t_acte_medical_acm";
	protected $tableLac = "epiphanie_diab.t_liste_act_lac";
	protected $tableSor = "epiphanie_diab.t_sortie_reactif_sor";

	protected $tableLab = "epiphanie_diab.t_laboratoire_lab";
	protected $tableSea = "epiphanie_diab.t_sejour_acte_sea";
	
	
	
	public function recup_nombre_element($lac,$debut,$fin){
		return $this->db
					->select("COUNT(sor.sor_id) AS nb")
					->join($this->tableEla." ela", 'ela.ela_id=sor.ela_id','inner')
					->join($this->tableLac." lac", 'lac.lac_id=ela.lac_id','inner')
					->where("sor.res_dDateSortie >=",$debut)
					->where("sor.res_dDateSortie <=",$fin)
					->where("lac.lac_id",$lac)
					->get($this->tableSor." sor")->row();
	}	
	
	
	public function recup_rapport_laboratoire($lac,$debut,$fin){
		return $this->db
					->select("COUNT(ala.ala_id) AS nb")
					->join($this->tableAla." ala", 'ala.ala_id=tan.ala_id','inner')
					->join($this->tableAcm." acm", 'acm.acm_id=ala.acm_id','inner')
					->join($this->tableLac." lac", 'lac.lac_id=acm.lac_id','inner')
					->where("tan.tan_dDateRapport >=",$debut)
					->where("tan.tan_dDateRapport <=",$fin)
					->where("lac.lac_id",$lac)
					->where("ala.ala_iSta",3)
					// ->group_by("tan.ala_id")
					->get($this->tableTan." tan")->row();
	}
		
		
	public function liste_valeur_element_analyse($id)
	{
		return $this->db
		->join($this->tableEla, $this->tableTan.'.ela_id='.$this->tableEla.'.ela_id','inner')
		->where($this->tableTan.".tan_id",$id)
		->get($this->tableTan)->row();
	}
		
	public function numero_tube($donnees){
		//mb_internal_encoding( 'UTF-8' );
		$this->db->insert($this->tableTan,$donnees);
	}
	
	public function entree_accessoire($donnees){
		$this->db->insert($this->tableEac,$donnees);
	}	
	
	public function liste_entree_accessoire(){
		return $this->db
		->join($this->tableAcc, $this->tableAcc.'.acc_id='.$this->tableEac.'.acc_id','inner')
		->where($this->tableEac.".eac_iSta",1)
		->where($this->tableAcc.".acc_iSta",1)
		->get($this->tableEac)->result();
	}	
	
	
	public function liste_accessoire_enstock(){
		return $this->db
		->join($this->tableAcc, $this->tableAcc.'.acc_id='.$this->tableSac.'.acc_id','inner')
		->where($this->tableSac.".sac_iSta",1)
		->where($this->tableAcc.".acc_iSta",1)
		->get($this->tableSac)->result();
	}
	
	public function entree_stock_accessoire($donnees){
		return $this->db->insert($this->tableSac,$donnees);
	}	
	
	public function maj_entree_accessoire($donnees,$id){
		return $this->db->where("sac_id",$id)->update($this->tableSac,$donnees);
	}			
	
	public function verif_entree_accessoire($id)
	{
		return $this->db
		->where("acc_id",$id)
		->get($this->tableSac)->row();
	}
	
	public function recup_accessoire($id)
	{
		return $this->db
		->join($this->tableAcc, $this->tableAcc.'.acc_id='.$this->tableSac.'.acc_id','inner')
		// ->where($this->tableSac.".sac_iSta",1)
		// ->where($this->tableAcc.".acc_iSta",1)
		->where($this->tableSac.".sac_id",$id)
		->get($this->tableSac)->row();
	}	
	
	public function sortir_accessoire($donnees){
		return $this->db->insert($this->tableAcs,$donnees);
	}	
	
	public function maj_sortir_accessoire($donnees,$id){
		return $this->db->where("sac_id",$id)->update($this->tableSac,$donnees);
	}	
	
	
	public function liste_sortie_accessoire()
	{
		return $this->db
		->join($this->tableSac, $this->tableSac.'.sac_id='.$this->tableAcs.'.sac_id','inner')
		->join($this->tableAcc, $this->tableSac.'.acc_id='.$this->tableAcc.'.acc_id','inner')
		->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableAcs.'.per_iBenef','inner')
		// ->join($this->tablePer, $this->tablePer.'.per_id='.$this->tableAcs.'.per_iAutorisant','inner')
		->get($this->tableAcs)->result();
	}
	
	
	public function recup_magasinier($id)
	{
		return $this->db
		->where("per_id",$id)
		->get($this->tablePer)->row();
	}
	
	public function maj_ala($donnees,$id){
		return $this->db->where("ala_id",$id)->update($this->tableAla,$donnees);
	}
	
	
	public function liste_element_exa($id)
	{
		return $this->db
		->join($this->tableAla, $this->tableTan.'.ala_id='.$this->tableAla.'.ala_id','inner')
		->join($this->tableEla, $this->tableTan.'.ela_id='.$this->tableEla.'.ela_id','inner')
		->join($this->tableTex, $this->tableEla.'.tex_id='.$this->tableTex.'.tex_id','inner')
		->where($this->tableTan.".ala_id",$id)
		->get($this->tableTan)->row();
	}	
	
	
	public function liste_element_exament_tube($id)
	{
		return $this->db
		->join($this->tableAla, $this->tableTan.'.ala_id='.$this->tableAla.'.ala_id','inner')
		->join($this->tableEla, $this->tableTan.'.ela_id='.$this->tableEla.'.ela_id','inner')
		->join($this->tableTex, $this->tableEla.'.tex_id='.$this->tableTex.'.tex_id','inner')
		->where($this->tableTan.".ala_id",$id)
		->get($this->tableTan)->result();
	}

	// Récupérer tous les éléments du labo dans le dossier médical
	public function liste_element_exament_tube_dossier_medical($id)
	{
		return $this->db

			->join($this->tableAla, $this->tableTan . '.ala_id=' . $this->tableAla . '.ala_id', 'inner')
			->join($this->tableEla, $this->tableTan . '.ela_id=' . $this->tableEla . '.ela_id', 'inner')
			->join($this->tableTex, $this->tableEla . '.tex_id=' . $this->tableTex . '.tex_id', 'inner')

			->join($this->tableLac, $this->tableEla . '.lac_id=' . $this->tableLac . '.lac_id', 'inner')
			->join($this->tableAcm, $this->tableAla . '.acm_id=' . $this->tableAcm . '.acm_id', 'inner')
			->where($this->tableTan . ".ala_id", $id)
			->get($this->tableTan)->result();
	}
	
	public function ajout_laboratoire_rapport($donnees,$id){
		return $this->db->where("tan_id",$id)->update($this->tableTan,$donnees);
	}
	
	
	public function recup_type_analyse($id)
	{
		return $this->db
		->where($this->tableTan.".tan_id",$id)
		->get($this->tableTan)->row();
	}	
	
	public function recup_nombre_statut($id)
	{
		return $this->db
		->select('COUNT(tan_id) AS nb')
		->where($this->tableTan.".ala_id",$id)
		->where($this->tableTan.".tan_iSta",1)
		->get($this->tableTan)->row();
	}
}
