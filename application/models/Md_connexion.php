<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_connexion extends CI_Model {
		
	protected $tablePer = "epiphanie_diab.t_personnel_per";
	protected $tableLog = "epiphanie_diab.t_logs_log";
	protected $tableDep = "epiphanie_diab.t_departement_dep";
	protected $tableFct = "epiphanie_diab.t_fonctions_fct";
	protected $tablePst = "epiphanie_diab.t_postes_pst";
	protected $tableSpt = "epiphanie_diab.t_specialites_spt";
	
	protected $tableSer = "epiphanie_diab.t_services_ser";
	protected $tableUni = "epiphanie_diab.t_unite_uni";
	protected $tableAft = "epiphanie_diab.t_affectation_aft";
	
	protected $tableFlt = "epiphanie_diab.t_fonctionalite_flt";
	
	public function se_connecter_email($login,$pwd)
	{
		return $this->db->where("per_sEmail",$login)->where("per_sPwd",$pwd)->where("per_iSta",1)->get($this->tablePer)->row();
	}
	
	public function se_connecter_tel($tel,$pwd)
	{
		return $this->db->where("per_sTel",$tel)->where("per_sPwd",$pwd)->where("per_iSta",1)->get($this->tablePer)->row();
	}
	
	
	public function mdp_oublie($email)
	{
		return $this->db->where("usr_sEmail",$email)->get($this->tableUser)->row();
	}
	
	public function verif_session_personnel_connect($id)
	{
		return $this->db
		->join($this->tableDep, $this->tableDep.".dep_id=".$this->tablePer.".dep_id", "inner")
		->join($this->tablePst, $this->tablePst.".pst_id=".$this->tablePer.".pst_id", "inner")
		->join($this->tableSpt, $this->tableSpt.".spt_id=".$this->tablePer.".spt_id", "inner")
		->join($this->tableAft, $this->tableAft.".per_id=".$this->tablePer.".per_id", "left")
		->join($this->tableUni, $this->tableUni.".uni_id=".$this->tableAft.".uni_id", "left")
		->join($this->tableSer, $this->tableSer.".ser_id=".$this->tableUni.".ser_id", "left")
		->join($this->tableFlt, $this->tableFlt.'.flt_id='.$this->tableSer.'.flt_id','left')
		->where($this->tablePer.".per_id",$id)
		->get($this->tablePer)->row();
	}	
	
	public function personnel_connect()
	{
		return $this->db
		->join($this->tableDep, $this->tableDep.".dep_id=".$this->tablePer.".dep_id", "inner")
		->join($this->tablePst, $this->tablePst.".pst_id=".$this->tablePer.".pst_id", "inner")
		->join($this->tableSpt, $this->tableSpt.".spt_id=".$this->tablePer.".spt_id", "inner")
		->join($this->tableAft, $this->tableAft.".per_id=".$this->tablePer.".per_id", "left")
		->join($this->tableUni, $this->tableUni.".uni_id=".$this->tableAft.".uni_id", "left")
		->join($this->tableSer, $this->tableSer.".ser_id=".$this->tableUni.".ser_id", "left")
		->join($this->tableFlt, $this->tableFlt.'.flt_id='.$this->tableSer.'.flt_id','left')
		->where($this->tablePer.".per_id",$this->session->epiphanie_diab)
		->where($this->tableAft.".aft_iSta",1)
		->get($this->tablePer)->row();
	}
	
		
	public function rapport($log)
	{
		return $this->db->insert($this->tableLog,$log);
	}

}
