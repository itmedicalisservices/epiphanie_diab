<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_rapport extends CI_Model {
		
	protected $tablePer = "diabcare.t_personnel_per";
	protected $tableLog = "diabcare.t_logs_log";
	protected $tableApr = "diabcare.t_approvisionnement_apr";
	protected $tableCes = "diabcare.t_cession_ces";
	protected $tableFac = "diabcare.t_facture_fac";
	protected $tablePas = "diabcare.t_passation_pas";
	protected $tableAcm = "diabcare.t_acte_medical_acm";
	protected $tableCsl = "diabcare.t_consultation_csl";
	
	public function nbNewAutreCas($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(dgq_id) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".csl_sOtherDgq !=",NULL)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".csl_sOtherDgq !=",NULL)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldAutreCas($date)
	{
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".csl_sOtherDgq !=",NULL)
		->get($this->tableCsl)->row();
	}	
	
	public function nbNewDT4($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(dgq_id) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".dgq_id ",4)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",4)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldDT4($date)
	{
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",4)
		->get($this->tableCsl)->row();
	}
	
	public function nbNewDT3($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(dgq_id) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".dgq_id ",3)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",3)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldDT3($date)
	{
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",3)
		->get($this->tableCsl)->row();
	}	
	
	public function nbNewDT2($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(dgq_id) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".dgq_id ",2)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",2)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldDT2($date)
	{
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",2)
		->get($this->tableCsl)->row();
	}	
	
	public function nbNewDT1($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(dgq_id) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".dgq_id ",1)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",1)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldDT1($date)
	{
		return $this->db
		->select('COUNT(dgq_id) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".dgq_id ",1)
		->get($this->tableCsl)->row();
	}
		
		
	public function nbNewConsultdiab($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(acm_id) AS nb')
			->where($this->tableAcm.".acm_dDateNoTime ",$date1)
			->where($this->tableAcm.".per_id !=",NULL)
			->where($this->tableAcm.".acm_iSta ",2)
			->where($this->tableAcm.".lac_id ",164)
			->get($this->tableAcm)->row();
		}
		return $this->db
		->select('COUNT(acm_id) AS nb')
		->where($this->tableAcm.".acm_dDateNoTime >=",$date1)
		->where($this->tableAcm.".acm_dDateNoTime <=",$date2)
		->where($this->tableAcm.".per_id !=",NULL)
		->where($this->tableAcm.".acm_iSta ",2)
		->where($this->tableAcm.".lac_id ",164)
		->get($this->tableAcm)->row();
	}	
	
	public function nbOldConsultdiab($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(acm_id) AS nb')
			->where($this->tableAcm.".acm_dDateNoTime ",$date1)
			->where($this->tableAcm.".per_id !=",NULL)
			->where($this->tableAcm.".acm_iSta ",2)
			->where($this->tableAcm.".lac_id ",165)
			->get($this->tableAcm)->row();
		}
		return $this->db
		->select('COUNT(acm_id) AS nb')
		->where($this->tableAcm.".acm_dDateNoTime >=",$date1)
		->where($this->tableAcm.".acm_dDateNoTime <=",$date2)
		->where($this->tableAcm.".per_id !=",NULL)
		->where($this->tableAcm.".acm_iSta ",2)
		->where($this->tableAcm.".lac_id ",165)
		->get($this->tableAcm)->row();
	}
	
	
	
	
	public function nbSession()
	{
		return $this->db
		->where("per_iStaCnx",1)
		->get($this->tablePer)->result();
	}	
		
	public function nbAnnul()
	{

		return $this->db->select("DISTINCT(per_id)")
		->where("sta_iPer",0)
		->where("fac_sObjet","6")
		->get($this->tableFac)->result();
	}
	
		
	public function nbPassation()
	{
		return $this->db
		->where("pas_iSta",0)
		->where("pas_iRecep",$this->session->diabcare)
		->get($this->tablePas)->result();
	}	
	
	public function nbCession()
	{
		return $this->db
		->where("ces_iSta",0)
		->get($this->tableCes)->result();
		
	}
	
	public function ListeAppro()
	{
		return $this->db
		->join($this->tablePer, $this->tableApr.'.per_id='.$this->tablePer.'.per_id','inner')
		->where("apr_iSta",0)
		->where("apr_dDateValide >",date("Y-m-d"))
		->get($this->tableApr)->result();
		
	}	
	
	public function nbAppro()
	{
		return $this->db
		->where("apr_iSta",0)
		->where("apr_dDateValide >",date("Y-m-d"))
		->get($this->tableApr)->result();
		
	}
	
	public function notifications()
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.".per_id=".$this->tableLog.".per_id", "left	")
		->limit(7)
		->order_by("log_dDate","desc")
		->get($this->tableLog)->result();
	}
	
	
	public function nb_notif()
	{
		return $this->db
					->where("log_iSta",0)
					->get($this->tableLog)->result();
	}
	
	public function listNotifications($nb,$pageActuelle)
	{
		$articleParPage = $nb;
		$pageDepart = ($pageActuelle - 1)*$articleParPage;
		
		return $this->db
		->limit($articleParPage, $pageDepart)
		->join($this->tablePer, $this->tablePer.".per_id=".$this->tableLog.".per_id", "left	")
		->order_by("log_id","desc")
		->get($this->tableLog)->result();
	}
	
	// public function liste_patients($nb,$pageActuelle)
	// {
		// $articleParPage = $nb;
		// $pageDepart = ($pageActuelle - 1)*$articleParPage;
		
		// return $this->db
		// ->limit($articleParPage, $pageDepart)
		// ->order_by("pat_sNom","asc")
		// ->where("pat_iSta",1)
		// ->get($this->tablePat)->result();
	// }
	
	
	public function nbNotifications()
	{
		return $this->db
		->limit(500)
		->where("log_iSta",0)
		->get($this->tableLog)->result();
		
	}
	
	public function updateRapport($donnees){
		return $this->db->update($this->tableLog,$donnees);
	}
}
