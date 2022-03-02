<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_rapport extends CI_Model {
		
	protected $tablePer = "epiphanie_diab.t_personnel_per";
	protected $tableLog = "epiphanie_diab.t_logs_log";
	protected $tableApr = "epiphanie_diab.t_approvisionnement_apr";
	protected $tableCes = "epiphanie_diab.t_cession_ces";
	protected $tableFac = "epiphanie_diab.t_facture_fac";
	protected $tablePas = "epiphanie_diab.t_passation_pas";
	protected $tableAcm = "epiphanie_diab.t_acte_medical_acm";
	protected $tableCsl = "epiphanie_diab.t_consultation_csl";
	protected $tableHypo = "epiphanie_diab.t_consultation_hypo_csh";
	
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
	//debut raby
	public function nbNewCOMP1($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iMicro) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iMicro ",1)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iMicro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMicro ",1)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP1($date)
	{
		return $this->db
		->select('COUNT(cmp_iMicro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMicro ",1)
		->get($this->tableCsl)->row();
	}
	
	public function nbNewCOMP2($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iMicro) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iMicro ",2)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iMicro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMicro ",2)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP2($date)
	{
		return $this->db
		->select('COUNT(cmp_iMicro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMicro ",2)
		->get($this->tableCsl)->row();
	}
	
	public function nbNewCOMP3($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iMicro) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iMicro ",3)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iMicro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMicro ",3)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP3($date)
	{
		return $this->db
		->select('COUNT(cmp_iMicro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMicro ",3)
		->get($this->tableCsl)->row();
	}
	public function nbNewCOMP4($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iMacro) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iMacro ",4)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",4)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP4($date)
	{
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",4)
		->get($this->tableCsl)->row();
	}
	
	public function nbNewCOMP5($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iMacro) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iMacro ",5)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",5)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP5($date)
	{
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",5)
		->get($this->tableCsl)->row();
	}
	public function nbNewCOMP6($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iMacro) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iMacro ",6)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",6)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP6($date)
	{
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",6)
		->get($this->tableCsl)->row();
	}
	public function nbNewCOMP7($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iMacro) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iMacro ",7)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",7)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP7($date)
	{
		return $this->db
		->select('COUNT(cmp_iMacro) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iMacro ",7)
		->get($this->tableCsl)->row();
	}
	public function nbNewCOMP8($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iPied) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iPied ",8)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",8)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP8($date)
	{
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",8)
		->get($this->tableCsl)->row();
	}
	public function nbNewCOMP9($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iPied) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iPied ",9)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",9)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP9($date)
	{
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",9)
		->get($this->tableCsl)->row();
	}
	public function nbNewCOMP10($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iPied) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iPied ",10)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",10)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP10($date)
	{
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",10)
		->get($this->tableCsl)->row();
	}
	public function nbNewCOMP11($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(cmp_iPied) AS nb')
			->where($this->tableCsl.".csl_dDateNoTime ",$date1)
			->where($this->tableCsl.".csl_iSta ",1)
			->where($this->tableCsl.".cmp_iPied ",11)
			->get($this->tableCsl)->row();
		}
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime >=",$date1)
		->where($this->tableCsl.".csl_dDateNoTime <=",$date2)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",11)
		->get($this->tableCsl)->row();
	}	
	
	public function nbOldCOMP11($date)
	{
		return $this->db
		->select('COUNT(cmp_iPied) AS nb')
		->where($this->tableCsl.".csl_dDateNoTime < ",$date)
		->where($this->tableCsl.".csl_iSta ",1)
		->where($this->tableCsl.".cmp_iPied ",11)
		->get($this->tableCsl)->row();
	}
	
	
	public function nbNewTYR1($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".tyr_id ",1)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",1)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldTYR1($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",1)
		->get($this->tableHypo)->row();
	}
	public function nbNewTYR2($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".tyr_id ",2)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",2)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldTYR2($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",2)
		->get($this->tableHypo)->row();
	}
	public function nbNewTYR3($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".tyr_id ",3)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",3)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldTYR3($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",3)
		->get($this->tableHypo)->row();
	}
	public function nbNewTYR4($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".tyr_id ",4)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",4)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldTYR4($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",4)
		->get($this->tableHypo)->row();
	}
	public function nbNewTYR5($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".tyr_id ",5)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",5)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldTYR5($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".tyr_id ",5)
		->get($this->tableHypo)->row();
	}
	public function nbNewTYRAutre($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(csh_sOtherTyr) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".csh_sOtherTyr !=",NULL)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(csh_sOtherTyr) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sOtherTyr !=",NULL)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldTYRAutre($date)
	{
		return $this->db
		->select('COUNT(csh_sOtherTyr) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sOtherTyr !=",NULL)
		->get($this->tableHypo)->row();
	}
	public function nbNewHYP($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(hyp_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".hyp_id ",1)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(hyp_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".hyp_id ",1)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldHYP($date)
	{
		return $this->db
		->select('COUNT(hyp_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".hyp_id ",1)
		->get($this->tableHypo)->row();
	}
	public function nbNewHYPAutre($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(csh_sOtherhyp) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".csh_sOtherhyp !=",NULL)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(csh_sOtherhyp) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sOtherhyp !=",NULL)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldHYPAutre($date)
	{
		return $this->db
		->select('COUNT(csh_sOtherhyp) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sOtherhyp !=",NULL)
		->get($this->tableHypo)->row();
	}
	
	public function nbNewHYPEnd($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".csh_sEnd !=",NULL)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sEnd !=",NULL)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldHYPEnd($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sEnd !=",NULL)
		->get($this->tableHypo)->row();
	}
	public function nbNewHYPMet($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".csh_sMet !=",NULL)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sMet !=",NULL)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldHYPMet($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sMet !=",NULL)
		->get($this->tableHypo)->row();
	}
	public function nbNewHYPNut($date1, $date2)
	{
		if($date2 == NULL){
			return $this->db
			->select('COUNT(tyr_id) AS nb')
			->where($this->tableHypo.".csh_dDateNoTime ",$date1)
			->where($this->tableHypo.".csh_iSta ",1)
			->where($this->tableHypo.".csh_sNut !=",NULL)
			->get($this->tableHypo)->row();
		}
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime >=",$date1)
		->where($this->tableHypo.".csh_dDateNoTime <=",$date2)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sNut !=",NULL)
		->get($this->tableHypo)->row();
	}	
	
	public function nbOldHYPNut($date)
	{
		return $this->db
		->select('COUNT(tyr_id) AS nb')
		->where($this->tableHypo.".csh_dDateNoTime < ",$date)
		->where($this->tableHypo.".csh_iSta ",1)
		->where($this->tableHypo.".csh_sNut !=",NULL)
		->get($this->tableHypo)->row();
	}
	// fin raby	
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
		->where("pas_iRecep",$this->session->epiphanie_diab)
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
