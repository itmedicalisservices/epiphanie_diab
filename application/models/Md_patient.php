<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_patient extends CI_Model {
		
	protected $tablePat = "epiphanie_diab.t_patients_pat";
	protected $tablePer = "epiphanie_diab.t_personnel_per";
	protected $tableAnt = "epiphanie_diab.t_antecedants_ant";
	protected $tablePec = "epiphanie_diab.t_personnes_contacts_pec";
	protected $tableAcm = "epiphanie_diab.t_acte_medical_acm";
	protected $tableLac = "epiphanie_diab.t_liste_act_lac";
	protected $tableAss = "epiphanie_diab.t_assureurs_ass";
	protected $tableCas = "epiphanie_diab.t_couverture_assurance_cas";
	protected $tableTas = "epiphanie_diab.t_type_assurance_tas";
	protected $tableDep = "epiphanie_diab.t_departement_dep";
	protected $tableSer = "epiphanie_diab.t_services_ser";
	protected $tableUni = "epiphanie_diab.t_unite_uni";
	protected $tableFac = "epiphanie_diab.t_facture_fac";
	protected $tableElf = "epiphanie_diab.t_elements_facture_elf";
	protected $tableCon = "epiphanie_diab.t_constante_con";
	protected $tableCsl = "epiphanie_diab.t_consultation_csl";
	protected $tableSea = "epiphanie_diab.t_sejour_acte_sea";
	protected $tableElo = "epiphanie_diab.t_element_ordonnance_elo";
	protected $tableOrd = "epiphanie_diab.t_ordonnance_ord";
	protected $tableSoi = "epiphanie_diab.t_soins_infirmiers_soi";
	protected $tableFor = "epiphanie_diab.t_forme_for";
	protected $tableFam = "epiphanie_diab.t_famille_fam";
	protected $tableCat = "epiphanie_diab.t_categories_cat";
	protected $tableMed = "epiphanie_diab.t_medicament_med";
	protected $tableImg = "epiphanie_diab.t_imagerie_img";
	protected $tableAci = "epiphanie_diab.t_acte_imagerie_aci";
	protected $tableIai = "epiphanie_diab.t_image_acte_imagerie_iai";
	protected $tableHos = "epiphanie_diab.t_hospitalisation_hos";
	protected $tableCha = "epiphanie_diab.t_chambre_cha";
	protected $tableLit = "epiphanie_diab.t_lit_lit";
	protected $tableEfc = "epiphanie_diab.t_exploration_fonctionnelle_efc";
	protected $tableAef = "epiphanie_diab.t_acte_exploration_fonctionnelle_aef";
	protected $tableRee = "epiphanie_diab.t_reeducation_ree";
	protected $tableSre = "epiphanie_diab.t_seance_reeducation_sre";
	protected $tableNne = "epiphanie_diab.t_nouveau_ne_nne";
	protected $tableDec = "epiphanie_diab.t_deces_dec";
	protected $tableMal = "epiphanie_diab.t_maladie_mal";
	protected $tableDia = "epiphanie_diab.t_diagnostic_dia";
	protected $tableLab = "epiphanie_diab.t_laboratoire_lab";
	protected $tableAla = "epiphanie_diab.t_acte_laboratoire_ala";
	protected $tableInc = "epiphanie_diab.t_information_complementaire_inc";
	protected $tableLan = "epiphanie_diab.t_liste_antecedants_lan";
	protected $tableLaf = "epiphanie_diab.t_liste_antecedents_familiaux_laf";
	protected $tableLia = "epiphanie_diab.t_liste_allergies_lia";
	protected $tableLap = "epiphanie_diab.t_liste_activite_professionnelle_lap";
	protected $tablePpe = "epiphanie_diab.t_patient_antecedent_personnel_ppe";
	protected $tablePaf = "epiphanie_diab.t_patient_antecedent_familial_paf";
	protected $tablePal = "epiphanie_diab.t_patient_allergie_pal";
	protected $tablePac = "epiphanie_diab.t_patient_activite_professionnelle_pac";
	protected $tableBph = "epiphanie_diab.t_bon_pharmacie_bph";
	protected $tableAch = "epiphanie_diab.t_achats_ach";
	protected $tablePro = "epiphanie_diab.t_produits_pro";
	protected $tablePop = "epiphanie_diab.t_planning_operation_pop";
	protected $tableBop = "epiphanie_diab.t_bloc_operatoire_bop";
	protected $tableSop = "epiphanie_diab.t_salle_operation_sop";
	protected $tablePch = "epiphanie_diab.t_prise_en_charge_pch";
	protected $tableEnp = "epiphanie_diab.t_engagement_payer_enp";
	protected $tableCer = "epiphanie_diab.t_certificat_repos_cer";
	protected $tableDeo = "epiphanie_diab.t_depot_objet_deo";
	protected $tableCem = "epiphanie_diab.t_certificat_medical_cem";
	protected $tableAup = "epiphanie_diab.t_autorisation_operer_aup";
	protected $tableAus = "epiphanie_diab.t_autorisation_sortir_aus";
	
	protected $tableCar = "epiphanie_diab.t_cardiologie_car";
	protected $tableAca = "epiphanie_diab.t_acte_cardiologique_aca";
	protected $tableGoa = "epiphanie_diab.t_gynecologie_obs_a_goa";
	protected $tableGob = "epiphanie_diab.t_gynecologie_obs_b_gob";
	protected $tableGoc = "epiphanie_diab.t_gynecologie_obs_c_goc";
	protected $tableGod = "epiphanie_diab.t_gynecologie_obs_d_god";
	protected $tableGoe = "epiphanie_diab.t_gynecologie_obs_e_goe";
	
	protected $tableExr = "epiphanie_diab.t_examen_rectal_exr";
	protected $tableExp = "epiphanie_diab.t_examen_perineal_exp";
	protected $tablePee = "epiphanie_diab.t_pelvien_examen_pee";
	protected $tableAbe = "epiphanie_diab.t_abdominal_examen_abe";
	protected $tableEva = "epiphanie_diab.t_examen_vaginal_eva";
	protected $tableEec = "epiphanie_diab.t_examen_echographique_eec";
	protected $tableEse = "epiphanie_diab.t_examen_senologique_ese";
	protected $tableSto = "epiphanie_diab.t_stomatologie_sto";
	protected $tableDen = "epiphanie_diab.t_dentition_den";
	protected $tableAvs = "epiphanie_diab.t_avis_specialiste_avs";
	
	protected $tableRed = "epiphanie_diab.t_retenue_diagnostique_red";
	protected $tableHyd = "epiphanie_diab.t_hypothese_diagnostique_hyd";
	protected $tableSma = "epiphanie_diab.t_specification_maladie_sma";
	
	protected $tableAft = "epiphanie_diab.t_affectation_aft";
	protected $tableAco = "epiphanie_diab.t_actes_compteur_aco";
	protected $tableMat = "epiphanie_diab.t_materiel_mat";
	
	protected $tableCpa = "epiphanie_diab.t_convention_patient_cpa";
	
	
	protected $tableFdi = "epiphanie_diab.t_frais_divers_fdi";
	protected $tableLoc = "epiphanie_diab.t_locataire_loc";
	protected $tableTya = "epiphanie_diab.t_type_acte_tya";
	
	protected $tableAnf = "epiphanie_diab.t_annulation_facture_anf";
	protected $tablePas = "epiphanie_diab.t_passation_pas";
	
	protected $tableRub = "epiphanie_diab.t_rubrique_rub";
	protected $tableQpt = "epiphanie_diab.t_quotepart_qpt";
	
	protected $tableCsh = "epiphanie_diab.t_consultation_hypo_csh";
	protected $tableInd = "epiphanie_diab.t_information_diabete_ind";
	protected $tableFar = "epiphanie_diab.t_facteur_risque_far";
	
	protected $tableCdc = "epiphanie_diab.t_constante_donnee_clinique_cdc";
	protected $tableFlt = "epiphanie_diab.t_fonctionalite_flt";
	
	
	
	//RABY
		public function searchPatientDiab($dec, $type,$alcool,$tabac,$obs,$dys,$cardio,$hta,$echo,$avc,$reti,$nephro,$neuro)
		{
			$tab=array();
			$res=array();
			
				$res= $this->db
				->select("DISTINCT(pat_id)")
				->where($this->tableInd.".ind_iSta",1)
				->where($this->tableInd.".ind_sRecente",$dec)
				->where($this->tableInd.".dgq_id",$type)
				->get($this->tableInd)->result();
				$tab = array_merge($tab, $res);
				
				$res= $this->db
				->select("DISTINCT(pat_id)")
				->where($this->tableFar.".far_iSta",1)
				->where($this->tableFar.".far_iAl",$alcool)
				->where($this->tableFar.".far_iTab",$tabac)
				->where($this->tableFar.".far_iObs",$obs)
				->where($this->tableFar.".far_iDys",$dys)
				->where($this->tableFar.".far_iCardio",$cardio)
				->where($this->tableFar.".far_iHta",$hta)
				->where($this->tableFar.".far_iEcho",$echo)
				->where($this->tableFar.".far_iAvc",$avc)
				->where($this->tableFar.".far_iTyperetino",$reti)
				->where($this->tableFar.".far_iNephro",$nephro)
				->where($this->tableFar.".far_iNeuro",$neuro)
				->get($this->tableFar)->result();
				$tab = array_merge($tab, $res);
				
				return array_unique($tab,SORT_REGULAR);
			
		}
	//RABY
	
	/*public function searchPatientDiab2($facteur)
	{
		if($facteur==0){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iAl",1)
			->get($this->tableFar)->result();
		}elseif($facteur==1){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iTab",1)
			->get($this->tableFar)->result();
		}elseif($facteur==2){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iCardio",1)
			->get($this->tableFar)->result();
		}elseif($facteur==3){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iHta_3",1)
			->get($this->tableFar)->result();
		}elseif($facteur==4){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iEcho",1)
			->get($this->tableFar)->result();
		}elseif($facteur==5){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iAvc",1)
			->get($this->tableFar)->result();
		}elseif($facteur==6){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iTyperetino",0)
			->get($this->tableFar)->result();
		}elseif($facteur==7){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iNephro",1)
			->get($this->tableFar)->result();
		}elseif($facteur==8){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableFar.".far_iSta",1)
			->where($this->tableFar.".far_iNeuro",1)
			->get($this->tableFar)->result();
		}
	}	
	
	public function searchPatientDiab($dec, $type)
	{
		if(!is_null($dec) && is_null($type)){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableInd.".ind_iSta",1)
			->where($this->tableInd.".ind_sRecente",$dec)
			->get($this->tableInd)->result();
		}elseif(is_null($dec) && !is_null($type)){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableInd.".ind_iSta",1)
			->where($this->tableInd.".dgq_id",$type)
			->get($this->tableInd)->result();
		}elseif(!is_null($dec) && !is_null($type)){
			return $this->db
			->select("DISTINCT(pat_id)")
			->where($this->tableInd.".ind_iSta",1)
			->where($this->tableInd.".ind_sRecente",$dec)
			->where($this->tableInd.".dgq_id",$type)
			->get($this->tableInd)->result();
		}
	}*/
	
	
	
	public function ajout_constanteDataClinique($data){
		return $this->db->insert($this->tableCdc,$data);
	}
	
	
	public function liste_compteur_acte($date1,$date2){
		if($date2 === NULL){
			return $this->db
			->where($this->tableAco.'.aco_iSta', 1)
			->where($this->tableAco.".aco_dDate ",$date1)
			->order_by($this->tableAco.".aco_id","desc")
			->get($this->tableAco)->result();
		}
		
		return $this->db
			->where($this->tableAco.'.aco_iSta', 1)
			->where($this->tableAco.".aco_dDate >=",$date1)
			->where($this->tableAco.".aco_dDate <=",$date2)
			->order_by($this->tableAco.".aco_id","desc")
			->get($this->tableAco)->result();
	}	
	
	public function maj_acte_compteur($data,$id){
		return $this->db->where("fac_id",$id)->update($this->tableAco,$data);
	}	
	
	public function recupConstante($id)
	{
		return $this->db
		->where($this->tableCon.".pat_id",$id)
		->order_by($this->tableCon.".con_id","desc")
		->get($this->tableCon)->row();
	}	
	public function recupInfoDiabete($id)
	{
		return $this->db
		->where($this->tableInd.".pat_id",$id)
		->where($this->tableInd.".ind_iSta",1)
		->order_by($this->tableInd.".ind_id","desc")
		->get($this->tableInd)->row();
	}
	
	public function constanteDonneeClinique($pat)
	{
		return $this->db
		->where($this->tableCdc.".pat_id",$pat)
		->order_by($this->tableCdc.".cdc_id","desc")
		->get($this->tableCdc)->row();
	}
	
	public function facteurRisque($pat)
	{
		return $this->db
		->where($this->tableFar.".pat_id",$pat)
		->where($this->tableFar.".far_iSta",1)
		->order_by($this->tableFar.".far_id","desc")
		->get($this->tableFar)->row();
	}
	
	public function ajout_facteur_risque($data){
		return $this->db->insert($this->tableFar,$data);
	}
		
	public function maj_facteur_risque($donnees,$id){
		return $this->db->where("far_id",$id)->update($this->tableFar,$donnees);
	}
	
	public function verif_facteur_risque($sta,$pat)
	{
		return $this->db
		->where("far_iSta",$sta)
		->where("pat_id",$pat)
		->order_by($this->tableFar.".far_id","desc")
		->get($this->tableFar)->row();
	}
	
	public function information_diab_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableInd.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableInd.".sea_id",$id)
		->order_by($this->tableInd.".ind_id","desc")
		->get($this->tableInd)->row();
	}
	
	public function maj_informationDiab($donnees,$id){
		return $this->db->where("ind_id",$id)->update($this->tableInd,$donnees);
	}
	
	public function verif_sejour_info_diab($sta,$pat, $date)
	{
		return $this->db
		->where("ind_iSta",$sta)
		->where("pat_id",$sea)
		->where("ind_dDate",$date)
		->order_by($this->tableInd.".ind_id","desc")
		->get($this->tableInd)->row();
	}
	
	public function ajout_info_diabete($data){
		return $this->db->insert($this->tableInd,$data);
	}

	public function InfoDiabete($id)
	{
		return $this->db
		// ->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableInd.'.sea_id ','inner')
		->where($this->tableInd.".pat_id",$id)
		->where($this->tableInd.".ind_dDate",date("Y-m-d"))
		->order_by($this->tableInd.".ind_id","desc")
		->get($this->tableInd)->row();
	}


	public function verif_element_ord($id)
	{
		return $this->db
		->where($this->tableElo.".ord_id",$id)
		->get($this->tableElo)->row();
	}
	
	
	public function recupFonctionnalite($id){
		return $this->db
		->join($this->tableSer, $this->tableSer.'.flt_id ='.$this->tableFlt.'.flt_id ','inner')
		->where($this->tableSer.".ser_id",$id)
		->get($this->tableFlt)->row();
	}
	
	

	public function recup_historique_ord($pat)
	{
		return $this->db
		->where($this->tableOrd.".pat_id",$pat)
		->order_by($this->tableOrd.".ord_id","desc")
		->get($this->tableOrd)->result();
	}	
	public function recup_historique_csh($pat)
	{
		return $this->db
		->where($this->tableCsh.".pat_id",$pat)
		->order_by($this->tableCsh.".csh_id","desc")
		->get($this->tableCsh)->result();
	}	
	public function recup_historique_csl($pat)
	{
		return $this->db
		->where($this->tableCsl.".pat_id",$pat)
		->order_by($this->tableCsl.".csl_id","desc")
		->get($this->tableCsl)->result();
	}	
	
	public function recup_historique_con($pat)
	{
		return $this->db
		->where($this->tableCon.".pat_id",$pat)
		->order_by($this->tableCon.".con_id","desc")
		->get($this->tableCon)->result();
	}
	
	public function maj_antecedent_pat($donnees,$id){
		return $this->db->where("pat_id",$id)->update($this->tableInc,$donnees);
	}
	
	public function maj_consultationCsh($donnees,$id){
		return $this->db->where("csh_id",$id)->update($this->tableCsh,$donnees);
	}
	
	public function verif_sejour_csh($sta,$sea, $date)
	{
		return $this->db
		->where("csh_iSta",$sta)
		->where("sea_id",$sea)
		->where("csh_dDateNoTime",$date)
		->order_by($this->tableCsh.".csh_id","desc")
		->get($this->tableCsh)->row();
	}	
	
	
	public function maj_consultation($donnees,$id){
		return $this->db->where("csl_id",$id)->update($this->tableCsl,$donnees);
	}
	
	public function verif_sejour_csl($sta,$sea, $date)
	{
		return $this->db
		->where("csl_iSta",$sta)
		->where("sea_id",$sea)
		->where("csl_dDateNoTime",$date)
		->order_by($this->tableCsl.".csl_id","desc")
		->get($this->tableCsl)->row();
	}
	
	
	public function consultation_sejour_csl($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCsh.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableCsh.".sea_id",$id)
		->order_by($this->tableCsh.".csh_id","desc")
		->get($this->tableCsh)->row();
	}
	
	public function ajout_consultationCsl($data){
		return $this->db->insert($this->tableCsh,$data);
	}
	
	public function consultationcsl($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCsh.'.sea_id ','inner')
		->where($this->tableSea.".acm_id",$id)
		->where($this->tableCsh.".csh_dDateNoTime",date("Y-m-d"))
		->order_by($this->tableCsh.".csh_id","desc")
		->get($this->tableCsh)->row();
	}
	
	
	public function maj_quotes_parts($donnees,$id){
		return $this->db->where("fac_id",$id)->update($this->tableQpt,$donnees);
	}
	
	public function quotes_parts($debut, $fin){
		$date = array(date("Y-m-d"));
		if($debut === NULL){
			return $this->db
				->select("qpt.ser_id, SUM(qpt_iSer) AS service, SUM(qpt_iAdm) AS admin, SUM(qpt_iSerCsl) AS serviceCsl, SUM(qpt_iAdmCsl) AS adminCsl")
				->where_in("qpt.qpt_dDate",$date)
				->where("qpt_iSta",1)
				->group_by("qpt.ser_id")
				->order_by("service","desc")
				->order_by("admin","desc")
				->get($this->tableQpt." qpt")->result();
		}
		
		
		return $this->db
		
			->select("qpt.ser_id, SUM(qpt_iSer) AS service, SUM(qpt_iAdm) AS admin, SUM(qpt_iSerCsl) AS serviceCsl, SUM(qpt_iAdmCsl) AS adminCsl")
			->where("qpt.qpt_dDate >=",$debut)
			->where("qpt.qpt_dDate <=",$fin)
			->where("qpt_iSta",1)
			->group_by("qpt.ser_id")
			->order_by("service","desc")
			->order_by("admin","desc")
			->get($this->tableQpt." qpt")->result();
	}
	
		
	public function liste_ensemble_facture()
	{
		$statut = array(1);
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->where_in($this->tableFac.".fac_iSta",$statut)
		->get($this->tableFac)->result();
	}
	
		
	public function maj_facture_annule($data,$id){
		return $this->db
		->where("fac_iAnnul",$id)
		->where("fac_sObjet",8)
		// ->where("fac_iAnnul",0)
		->update($this->tableFac,$data);
	}
	
	
	// public function maj_facture_annule($data,$id){
		// return $this->db->where("fac_sNumero",$id)->update($this->tableFac,$data);
	// }
		
	public function ajout_facture_annule($data){
		$this->db->insert($this->tableFac,$data);
	}
	
	
	
	public function diminue_encaisse_total_parubrique_dujour(){
		return $this->db
		->select("SUM(fac_iRemise) AS diminueencaissedujour")
		->where("fac_dDatePaie",date('Y-m-d'))
		->where("fac_sObjet","6")
		->where("fac_iSta",1)
		->get($this->tableFac)->row();
	}	
	
	
	public function diminue_encaisse_total_parubrique($date1, $date2){
	
		if($date1 == NULL){
			return $this->db
			->select("SUM(fac_iRemise) AS diminueencaisse")
			->where("fac_dDatePaie <=",$date2)
			->where("fac_sObjet","6")
			->where("fac_iSta",1)
			->get($this->tableFac)->row();
		}
		
		return $this->db
		->select("SUM(fac_iRemise) AS diminueencaisse")
		->where("fac_dDatePaie >=",$date1)
		->where("fac_dDatePaie <=",$date2)
		->where("fac_sObjet","6")
		->where("fac_iSta",1)
		->get($this->tableFac)->row();
	}		
	
	// public function liste_encaisse_total_parubrique($date1, $date2){
	
		// return $this->db
		// ->where("fac_dDatePaie >=",$date1)
		// ->where("fac_dDatePaie <=",$date2)
		// ->where("fac_sObjet","6")
		// ->where("fac_iSta",1)
		// ->get($this->tableFac)->result();
	// }
	
	
	
	
	public function annule_cumul_encaisse_passation($date1,$date2){
	
		return $this->db
		->select("SUM(fac_iMontantPaye) AS cumulannencaisspas")
		->where("fac_dDatePaie >=",$date1)
		->where("fac_dDatePaie <=",$date2)
		->where("fac_sObjet","3")
		->where("fac_iSta",1)
		->get($this->tableFac)->row();
	}	
	
	public function maj_annulation_facture($donnees,$id){
		return $this->db->where("fac_id",$id)->update($this->tableAnf,$donnees);
	}
	
	public function ajout_annulation_facture($donnees){
		return $this->db->insert($this->tableAnf,$donnees);
	}
	
	public function last_mouvement_caissier_passation($per)
	{
		return $this->db
		->where("per_id",$per)
		->where("fac_sObjet","2")
		->order_by("fac_id","desc")
		->get($this->tableFac)->row();
	}	
	
	public function recup_last_mvt_caissier_passation($per)
	{
		return $this->db
		->where("per_id",$per)
		->where("fac_sObjet","2")
		->order_by("fac_id","desc")
		->get($this->tableFac)->row();
	}	
	public function recup_last_mouvement_caissier($per)
	{
		return $this->db
		->where("per_id",$per)
		->where("fac_sObjet","7")
		->order_by("fac_id","desc")
		->get($this->tableFac)->row();
	}
	
	
	public function liste_rapport_annulation($date1, $date2, $acte=false)
	{
		if($acte == NULL) {
			return $this->db
			->where($this->tableFac.".fac_iSta",2)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->or_where("fac_iRemise !=",0)
			->order_by($this->tableFac.".fac_id","asc")
			->get($this->tableFac)->result();
		}elseif($acte == 0){
			return $this->db
			->where($this->tableFac.".fac_iSta",2)
			->where($this->tableFac.".fac_sObjet ","Paiement des actes médicaux")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			// ->or_where("fac_iStAnnul",1)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		
		}elseif($acte == 1){
			return $this->db
			->where($this->tableFac.".fac_iSta",2)
			->where($this->tableFac.".fac_sObjet ","5")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			// ->or_where("fac_iStAnnul",1)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		
		}

	}
	
	
		
	public function recup_facture_annulee()
	{
		$tab = array(date('Y-m-d'));
		return $this->db
		->where("fac_iSta",2)
		->or_where("fac_iRemise !=",0)
		->where_in($this->tableFac.".fac_dDatePaie ",$tab)
		->get($this->tableFac)->result();
	}
	
		
	public function detail_facture_appro($id)
	{
		return $this->db
		->where($this->tableFac.".fac_sObjet",4)
		->where($this->tableFac.".fac_id",$id)
		->get($this->tableFac)->row();
	}
	
	
	public function maj_element_fac($donnees,$id){
		return $this->db->where("fac_id",$id)->update($this->tableElf,$donnees);
	}	
	
	public function recup_facture($id)
	{
		return $this->db
		->where("fac_id",$id)
		->where("fac_iSta",1)
		->get($this->tableFac)->row();
	}
	
			
	public function liste_remise($debut,$fin)
	{
	
		if($debut === NULL){
			return $this->db
			// ->limit(1)
			->join($this->tableElf, $this->tableElf.'.fac_id='.$this->tableFac.'.fac_id','inner')
			->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableElf.'.acm_id','inner')
			->join($this->tableUni, $this->tableUni.'.uni_id='.$this->tableAcm.'.uni_id','inner')
			->join($this->tableSer, $this->tableSer.'.ser_id='.$this->tableUni.'.ser_id','inner')
			->where("fac_dDatePaie <=",$fin)
			->where($this->tableFac.".fac_iSta",1)
			->where($this->tableFac.".fac_iReste !=",0)
			->or_where($this->tableFac.".fac_iMontantAss !=",0)
			->order_by($this->tableFac.".fac_id","asc")
			->get($this->tableFac)->result();
		}
		
		return $this->db
		// ->limit(1)
		->join($this->tableElf, $this->tableElf.'.fac_id='.$this->tableFac.'.fac_id','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableElf.'.acm_id','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id='.$this->tableAcm.'.uni_id','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id='.$this->tableUni.'.ser_id','inner')
		->where("fac_dDatePaie >=",$debut)
		->where("fac_dDatePaie <=",$fin)
		->where($this->tableFac.".fac_iSta",1)
		->where($this->tableFac.".fac_iReste !=",0)
		->or_where($this->tableFac.".fac_iMontantAss !=",0)
		->order_by($this->tableFac.".fac_id","asc")
		->get($this->tableFac)->result();
	}
	
	public function liste_remise_service()
	{
		
		$recupser = $this->md_patient->liste_remise();
		
		$tab = array();
		
		for($i=0;$i<=count($recupser);$i++){
			$tab[] = $recupser->ser_id;
		}
		
		return $recupser->ser_id;
		// return $this->db
		// ->where_in($this->tableSer.".ser_id",$ser)
		// ->where($this->tableSer.".ser_iSta",1)
		// ->order_by($this->tableSer.".ser_id","desc")
		// ->get($this->tableSer)->result();

	}		

	
	
	public function montant_service_cprincipal($debut,$fin){
		$facObjets = array("Paiement des actes médicaux", "5", "6");
		if($debut === NULL){
			return $this->db
					->select("SUM(elf.elf_iCout) AS montant, SUM(elf.elf_iReduc) AS reduc, ser.ser_sLibelle, ser.ser_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableSer." ser","ser.ser_id=uni.ser_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where_in("fac.fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->group_by("ser.ser_sLibelle")/*Ajout*/
					->group_by("ser.ser_id")
					->order_by("montant","desc")
					->order_by("reduc","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(elf.elf_iCout) AS montant, SUM(elf.elf_iReduc) AS reduc, ser.ser_sLibelle, ser.ser_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableSer." ser","ser.ser_id=uni.ser_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where_in("fac.fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->group_by("ser.ser_sLibelle")/*Ajout*/
					->group_by("ser.ser_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}
	
	
	
	// public function liste_rubrique_active($debut,$fin){
		// $date = array(date("Y-m-d"));
		// if($debut === NULL){
			// return $this->db
					// ->select("DISTINCT(elf.rub_id), rub.rub_sLib")
					// ->join($this->tableRub." rub","rub.rub_id=elf.rub_id")
					// ->where_in("elf.date_dElf",$date)
					// ->where("elf_iSta",0)
					// ->order_by("rub_id","desc")
					// ->get($this->tableElf." elf")->result();
		// }
		
		
		// return $this->db
		
					// ->select("DISTINCT(elf.rub_id), rub.rub_sLib")
					// ->join($this->tableRub." rub","rub.rub_id=elf.rub_id")
					// ->where("elf.date_dElf >=",$debut)
					// ->where("elf.date_dElf <=",$fin)
					// ->where("elf_iSta",0)
					// ->order_by("rub_id","desc")
					// ->get($this->tableElf." elf")->result();
	// }
	
	
	// public function remise_parubrique($rub, $debut, $fin){
		// $date = array(date("Y-m-d"));
		// if($debut === NULL){
			// return $this->db
					// ->select("elf.tya_id, tya_sLib, SUM(elf_iReduc) AS remise, SUM(elf_iCout) AS total")
					// ->join($this->tableTya." tya","tya.tya_id=elf.tya_id")
					// ->where_in("elf.date_dElf",$date)
					// ->where("elf.rub_id",$rub)
					// ->where("elf_iSta",0)
					// ->group_by("elf.tya_id")
					// ->group_by("tya_sLib")
					// ->order_by("total","desc")
					// ->order_by("remise","desc")
					// ->get($this->tableElf." elf")->result();
		// }
		
		
		// return $this->db
		
					// ->select("elf.tya_id, tya_sLib, SUM(elf_iReduc) AS remise, SUM(elf_iCout) AS total")
					// ->join($this->tableTya." tya","tya.tya_id=elf.tya_id")
					// ->where("elf.date_dElf >=",$debut)
					// ->where("elf.date_dElf <=",$fin)
					// ->where("elf.rub_id",$rub)
					// ->where("elf_iSta",0)
					// ->group_by("elf.tya_id")
					// ->group_by("tya_sLib")
					// ->order_by("total","desc")
					// ->order_by("remise","desc")
					// ->get($this->tableElf." elf")->result();
	// }		
	
	
	
	public function montant_par_type_cprincipal($debut,$fin){
		$facObjets = array("Paiement des actes médicaux", "5", "6");
		if($debut === NULL){
			return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.tya_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where_in("fac.fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->group_by("lac.tya_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.tya_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where_in("fac.fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->group_by("lac.tya_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}	
	
	
	public function montant_par_acte_cprincipal($debut,$fin){
		$facObjets = array("Paiement des actes médicaux", "5", "6");
		if($debut === NULL){
			return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.lac_sLibelle, lac.lac_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where_in("fac.fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->group_by("lac.lac_sLibelle")/*Ajout*/
					->group_by("lac.lac_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.lac_sLibelle, lac.lac_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where_in("fac.fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->group_by("lac.lac_sLibelle")/*Ajout*/
					->group_by("lac.lac_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}
	
		
	
	public function montant_cprincipal($debut,$fin){
		$facObjets = array("Paiement des actes médicaux", "5", "6");
		if($debut === NULL){
			return $this->db
					->select("SUM(fac_iMontant) AS montant, SUM(fac_iMontantPaye) AS paye, SUM(fac_iMontantAss) AS assurance, SUM(fac_iReste) AS reste, SUM(fac_iMontantReduc) AS perte")
					->where("fac_dDatePaie <=",$fin)
					->where_in("fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->get($this->tableFac)->row();
		}
		return $this->db
					->select("SUM(fac_iMontant) AS montant, SUM(fac_iMontantPaye) AS paye, SUM(fac_iMontantAss) AS assurance, SUM(fac_iReste) AS reste, SUM(fac_iMontantReduc) AS perte")
					->where("fac_dDatePaie >=",$debut)
					->where("fac_dDatePaie <=",$fin)
					->where_in("fac_sObjet",$facObjets)
					->where("fac_iSta",1)
					->get($this->tableFac)->row();
	}
	
	
	
	
	public function liste_tout_mouvement_caisse_reduite2($id=false)
	{
	
		if($id != false) {
			$facObjets = array("Paiement des actes médicaux", "5");
			$statut = array(1, 2);
			return $this->db
			->limit(20)
			->where_in($this->tableFac.".fac_sObjet",$facObjets)
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.".sta_iPer",0)
			->where($this->tableFac.'.per_id', $id)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		}
	
		return $this->db
		->where_in($this->tableFac.".fac_iSta",$statut)
		->get($this->tableFac)->result();
	}	
	
	
	public function liste_tout_mouvement_caisse_reduite($id=false)
	{
		$statut = array(1, 2);
		if($id != false){
			return $this->db
			->limit(20)
			->where_in("fac_iSta",$statut)
			->where($this->tableFac.".sta_iPer",0)
			->where($this->tableFac.'.per_id', $id)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		}
	
		return $this->db
		->where_in($this->tableFac.".fac_iSta",$statut)
		->get($this->tableFac)->result();
	}
	
	
	public function recup_acm($id)
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id='.$this->tableAcm.'.uni_id','inner')
		->where($this->tableAcm.".acm_id",$id)
		->get($this->tableAcm)->row();
	}
	
	
	public function liste_facture_acte($per=false, $date1,$date2){
		$statut = array(0, 1);
		if($per !== NULL){
			return $this->db
			->where_in($this->tableElf.'.elf_iSta', $statut)
			->where($this->tableElf.'.per_iElf', $per)
			->where($this->tableElf.".date_dElf >=",$date1)
			->where($this->tableElf.".date_dElf <=",$date2)
			->order_by($this->tableElf.".elf_id","desc")
			->get($this->tableElf)->result();
		}
		
		return $this->db
			->where_in($this->tableElf.'.elf_iSta', $statut)
			->where($this->tableElf.".date_dElf >=",$date1)
			->where($this->tableElf.".date_dElf <=",$date2)
			->order_by($this->tableElf.".elf_id","desc")
			->get($this->tableElf)->result();
	}	

	
				
	public function journal_encaissement($id, $date1, $date2, $acte=false)
	{
		$facObjets = array("Paiement des actes médicaux", "5");
		$statut = array(1, 2);
		if($acte == NULL) {
			return $this->db
			->where_in($this->tableFac.".fac_sObjet",$facObjets)
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","asc")
			->get($this->tableFac)->result();
		}elseif($acte == 0){
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet ","Paiement des actes médicaux")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		
		}elseif($acte == 1){
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet ","5")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		
		}
	
		// return $this->db
		// ->where($this->tableFac.".fac_iSta",1)
		// ->get($this->tableFac)->result();
		
		
		// ->where("dec_dDateDeces >=",$a)
		// ->where("dec_dDateDeces <=",$b)

	}
	
				
	public function liste_mouvement_caisse_facture_cp($id, $date1, $date2, $acte, $typemvt)
	{
		$statut = array(1, 2);
		if($typemvt == 0 && $acte == 2){
			
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet !=","7")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","asc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 0 && $acte == 0){
			
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet ","Paiement des actes médicaux")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 0 && $acte == 1){
			
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet ","5")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 1 && $acte == 2){
			
			$objet = array("Paiement des actes médicaux", "5", "6", "8");
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where_in($this->tableFac.".fac_sObjet ",$objet)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","asc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 1 && $acte == 0){
		
			$objet = array("Paiement des actes médicaux", "6", "8");
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where_in($this->tableFac.".fac_sObjet ",$objet)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 1 && $acte == 1){
			
			$objet = array("5", "6", "8");
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where_in($this->tableFac.".fac_sObjet ",$objet)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}
		

	}
	
				
	public function liste_mouvement_caisse_facture($id, $date1, $date2, $acte, $typemvt)
	{
		$statut = array(1, 2);
		if($typemvt == 0 && $acte == 2){
			
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet !=","7")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","asc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 0 && $acte == 0){
			
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet ","Paiement des actes médicaux")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 0 && $acte == 1){
			
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where($this->tableFac.".fac_sObjet ","5")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 1 && $acte == 2){
			
			$objet = array("Paiement des actes médicaux", "5", "6", "8");
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where_in($this->tableFac.".fac_sObjet ",$objet)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","asc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 1 && $acte == 0){
		
			$objet = array("Paiement des actes médicaux", "6", "8");
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where_in($this->tableFac.".fac_sObjet ",$objet)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}elseif($typemvt == 1 && $acte == 1){
			
			$objet = array("5", "6", "8");
			return $this->db
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->where_in($this->tableFac.".fac_sObjet ",$objet)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
			
		}

	}
		
	
				
	public function liste_mouvement_caisse($date1, $date2, $acte=false)
	{
	
		if($acte == NULL) {
			return $this->db
			->where($this->tableFac.".fac_iSta",1)
			->where($this->tableFac.'.per_id', $this->session->epiphanie_diab)
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		}elseif($acte == 0){
			return $this->db
			->where($this->tableFac.".fac_iSta",1)
			->where($this->tableFac.'.per_id', $this->session->epiphanie_diab)
			->where($this->tableFac.".fac_sObjet ","Paiement des actes médicaux")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		
		}elseif($acte == 1){
			return $this->db
			->where($this->tableFac.".fac_iSta",1)
			->where($this->tableFac.'.per_id', $this->session->epiphanie_diab)
			->where($this->tableFac.".fac_sObjet ","5")
			->where($this->tableFac.".fac_dDatePaie >=",$date1)
			->where($this->tableFac.".fac_dDatePaie <=",$date2)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		
		}
	
		// return $this->db
		// ->where($this->tableFac.".fac_iSta",1)
		// ->get($this->tableFac)->result();
		
		
		// ->where("dec_dDateDeces >=",$a)
		// ->where("dec_dDateDeces <=",$b)

	}
	
				
	public function liste_tout_mouvement_caisse_datefin($id)
	{
	
		return $this->db->select("fac_dDatePaie AS madate")
		->where($this->tableFac.".fac_iSta",1)
		->where($this->tableFac.".sta_iPer",0)
		->where($this->tableFac.'.per_id', $id)
		->order_by($this->tableFac.".fac_id","desc")
		->get($this->tableFac)->row();
	}		
	
	public function liste_tout_mouvement_caisse_datedebut($id)
	{
	
		return $this->db->select("fac_dDatePaie AS madate")
		->where($this->tableFac.".fac_iSta",1)
		->where($this->tableFac.".sta_iPer",0)
		->where($this->tableFac.'.per_id', $id)
		->order_by($this->tableFac.".fac_id","asc")
		->get($this->tableFac)->row();
	}				

	
				
	public function liste_tout_mouvement_caisse($id=false)
	{
		$statut = array(1, 2);
		if($id != false) {
			return $this->db
			->where($this->tableFac.".fac_dDatePaie",date('Y-m-d'))
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.".sta_iPer",0)
			->where($this->tableFac.'.per_id', $id)
			->order_by($this->tableFac.".fac_id","desc")
			->get($this->tableFac)->result();
		}
	
		return $this->db
		->where($this->tableFac.".fac_dDatePaie",date('Y-m-d'))
		->where_in($this->tableFac.".fac_iSta",$statut)
		->get($this->tableFac)->result();
	}	
				
	public function liste_facture_frais_divers($id=false)
	{
		$statut = array(1, 2);
		if($id != false) {
			return $this->db
			->join($this->tableElf, $this->tableElf.'.fac_id='.$this->tableFac.'.fac_id','inner')
			->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableElf.'.acm_id','inner')
			->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
			->where($this->tableFac.".fac_sObjet",'5')
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)
			->get($this->tableFac)->result();
		}
	
		return $this->db
		->join($this->tableElf, $this->tableElf.'.fac_id='.$this->tableFac.'.fac_id','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableElf.'.acm_id','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		->where($this->tableFac.".fac_sObjet",'5')
		->where_in($this->tableFac.".fac_iSta",$statut)
		->get($this->tableFac)->result();
	}	

	
	public function liste_facture_frais_divers_annulee($id=false)
	{
	
		if($id != false) {
			return $this->db
			// ->join($this->tableLoc, $this->tableLoc.'.loc_id='.$this->tableFac.'.loc_id','left')
			->join($this->tableElf, $this->tableElf.'.fac_id='.$this->tableFac.'.fac_id','inner')
			->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableElf.'.acm_id','inner')
			->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
			->where($this->tableFac.".fac_sObjet",'5')
			->where($this->tableFac.".fac_iSta",2)
			// ->where($this->tableFac.".fac_iStAnnul",0)
			->where($this->tableFac.'.per_id', $id)/*io stesso*/
			->get($this->tableFac)->result();
		}
	
		return $this->db
		// ->join($this->tableLoc, $this->tableLoc.'.loc_id='.$this->tableFac.'.loc_id','left')
		->join($this->tableElf, $this->tableElf.'.fac_id='.$this->tableFac.'.fac_id','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableElf.'.acm_id','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		->where($this->tableFac.".fac_sObjet",'5')
		->where($this->tableFac.".fac_iSta",2)
		// ->where($this->tableFac.".fac_iStAnnul",0)
		->get($this->tableFac)->result();
	}	

	
	
	public function detail_facture_divers($id)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id='.$this->tableFac.'.pat_id','left')
		->join($this->tableElf, $this->tableElf.'.fac_id='.$this->tableFac.'.fac_id','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableElf.'.acm_id','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		->where($this->tableFac.".fac_id",$id)
		->get($this->tableFac)->row();
	}
	
	
	public function maj_annulation_cumul_caisse($data,$id){
		return $this->db
		->where("per_id",$id)
		->where("sta_iPer",0)
		->update($this->tableFac,$data);
	}
	
	
	public function ajout_equipement($donnees){
		return $this->db->insert($this->tableMat,$donnees);
	}
	
	public function liste_materiel_par_type($type,$dateDepart="",$dateFinal="")
	{
		return $this->db
		->where($this->tableMat.".mat_iSta",1)
		->where($this->tableMat.".mat_sType",$type)
		->where("mat_dDateEnreg >=", $dateDepart)
		->where("mat_dDateEnreg <=", $dateFinal)
		->order_by($this->tableMat.".mat_sLib","asc")
		->get($this->tableMat)->result();
	}
	
	public function nbEquipement($lib,$qlt)
	{
		return $this->db
		->select("COUNT($this->tableMat.mat_id) AS nb")
		->where($this->tableMat.".mat_iSta",1)
		->where($this->tableMat.".mat_sLib",$lib)
		->where($this->tableMat.".mat_sQualite",$qlt)
		->get($this->tableMat)->row();
	}

	public function maj_equipement($donnees,$id){
		return $this->db->where("mat_id",$id)->update($this->tableMat,$donnees);
	}

	public function modifier_equipement($data,$id){
		
		return $this->db->where("mat_id",$id)->update($this->tableMat,$data);
		
	}
	
	public function recup_equipement($id)
	{
		return $this->db
		->where($this->tableMat.".mat_id",$id)
		->get($this->tableMat)->row();
	}
	
	public function liste_materiel()
	{
		return $this->db
		->where($this->tableMat.".mat_iSta",1)
		->order_by($this->tableMat.".mat_sLib","asc")
		->get($this->tableMat)->result();
	}
	
	public function compteur_liste($date1, $date2)
	{
		return $this->db->select("pat.pat_sNom, pat.pat_sPrenom, pat.pat_sMatricule,per.per_sNom, per.per_sPrenom, per.per_sMatricule, fac.fac_dDatePaie, lac.lac_sLibelle, acm.pat_id")
		->join($this->tableFac." fac", 'fac.fac_id = elf.fac_id ', 'inner')
		->join($this->tablePer." per", 'per.per_id = fac.per_id ', 'inner')
		->join($this->tableAcm." acm", 'acm.acm_id = elf.acm_id ', 'inner')
		->join($this->tablePat." pat", 'pat.pat_id = acm.pat_id ', 'inner')
		->join($this->tableLac." lac", 'lac.lac_id = acm.lac_id ', 'inner')
		->where("fac.fac_dDatePaie >=", $date1)
		->where("fac.fac_dDatePaie <=", $date2)
		->group_by("acm.pat_id")
		->order_by("fac.fac_dDatePaie","asc")
		->get($this->tableElf." elf")->result();
	}

	
	/*Verification session cédée*/
	// public function verif_session($per)
	// {
		// return $this->db
		// ->select('COUNT(fac_id) AS nb')
		// ->where("per_id",$per)
		// ->where("sta_iSess",1)
		// ->where("fac_iSta",1)
		// ->get($this->tableFac)->row();
	// }
	
	
	public function recup_caissiers_concernes()
	{
		return $this->db->select("DISTINCT(per_id)")
		->where("sta_iPer",0)
		->where("fac_sObjet","6")
		->get($this->tableFac)->result();
	}	
	
	/*Somme annulation caisse*/
	public function total_annulation_caissee($per)
	{
		return $this->db->select('SUM(fac_iRemise) AS cumulannulation')
		->where("per_id",$per)
		->where("sta_iPer",0)
		// ->where("fac_dDatePaie",0)
		->where("fac_sObjet","6")
		->get($this->tableFac)->row();
	}

	
	/*Somme caisse ouverte*/
	public function total_encaissee($per)
	{
		return $this->db->select('SUM(fac_iMontantPaye) AS cumul')
		->where("per_id",$per)
		->where("sta_iPer",0)
		->where("fac_iSta",1)
		->where($this->tableFac.".fac_dDatePaie",date('Y-m-d'))
		->get($this->tableFac)->row();
	}
	
	
	public function compteur_caisse($id, $date=false)
	{
		if($date === false) {
			return $this->db
			->join($this->tablePer." per", 'per.per_id = fac.per_id ', 'inner')
			->where("fac.per_id", $id)
			->where("fac.fac_iSta", 1)
			->get($this->tableFac." fac")->result();
		}
		return $this->db
		->join($this->tablePer." per", 'per.per_id = fac.per_id ', 'inner')
		->where("fac.fac_dDatePaie", $date)
		->where("fac.per_id", $id)
		->where("fac.fac_iSta", 1)
		->get($this->tableFac." fac")->result();
	}
	
	
	public function verif_compteur($pat)
	{
		return $this->db
		->select('COUNT(aco_id) AS nb')
		->where("pat_id",$pat)
		->where("aco_iSta",1)
		->where("aco_dDate", date("Y-m-d"))
		->get($this->tableAco)->row();
	}
	
	public function ajout_cmpteur($data){
		return $this->db->insert($this->tableAco,$data);
	}
	
	public function recup_actes($acm){
		return $this->db
		->where($this->tableAcm.".acm_id", $acm)
		->where($this->tableAcm.".acm_iSta", 2)
		->where($this->tableAcm.".acm_dDateCpt", date("Y-m-d"))
		->get($this->tableAcm)->row();
	}
	
	
	// Récupérer le patient lors d'une prescription d'ordonnance dans hospitalisation
	public function recup_ordonnance_hospitalisation($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableOrd.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		// ->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.per_id ','inner')
		->where($this->tableOrd.".ord_id",$id)
		->get($this->tableOrd)->row();
	}
	
	
	public function maj_avis($donnees,$id){
		return $this->db->where("avs_id",$id)->update($this->tableAvs,$donnees);
	}
	
	
	public function compte_avis_encours($date,$ser)
	{
		return $this->db
		->join($this->tableSea, $this->tableAvs.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAvs.'.per_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->select('COUNT(avs_id) AS nb')
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAvs.".avs_iSta",1)
		->where($this->tableAvs.".ser_id",$ser)
		->get($this->tableAvs)->row();
	}

	
	public function avis($avs)
	{
		return $this->db
		->join($this->tableSea, $this->tableAvs.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAvs.'.per_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableAvs.".avs_id",$avs)
		->get($this->tableAvs)->row();
	}	
	
	public function liste_avis_encours($date,$ser)
	{
		return $this->db
		->join($this->tableSea, $this->tableAvs.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAvs.'.per_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePop, $this->tablePop.'.pop_id ='.$this->tableAvs.'.pop_id ','left')
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAvs.".avs_iSta",1)
		->where($this->tableAvs.".ser_id",$ser)
		->get($this->tableAvs)->result();
	}
	
	
	public function maj_fac_annulee($donnees,$id){
		return $this->db->where("fac_id",$id)->update($this->tableFac,$donnees);
	}	
	
	public function recup_fac_annulee($id)
	{
		return $this->db
		->where("fac_id",$id)
		->get($this->tableFac)->row();
	}	
	
	public function verif_stomatologie($acm)
	{
		return $this->db
		->where("acm_id",$acm)
		->get($this->tableDen)->row();
	}	
	
	public function ajout_dentition($data){
		return $this->db->insert($this->tableDen,$data);
	}
	
	public function recup_hypothese($id)
	{
		return $this->db
		->join($this->tableSma, $this->tableSma.'.sma_id='.$this->tableHyd.'.sma_id','inner')
		->where($this->tableHyd.".pat_id",$id)
		->get($this->tableHyd)->result();
	}	
	
	public function recup_diagnostic_retenue($id)
	{
		return $this->db
		->join($this->tableSma, $this->tableSma.'.sma_id='.$this->tableRed.'.sma_id','inner')
		->where($this->tableRed.".pat_id",$id)
		->get($this->tableRed)->result();
	}
	
	public function ajout_hypothese($data){
		return $this->db->insert($this->tableHyd,$data);
	}
	
	public function verif_hypothese($sma, $pat)
	{
		return $this->db
		->where("sma_id",$sma)
		->where("pat_id",$pat)
		->get($this->tableHyd)->row();
	}	
	
	public function ajout_diagnostic_retenue($data){
		return $this->db->insert($this->tableRed,$data);
	}
	
	public function verif_diagnostic_retenue($sma, $pat)
	{
		return $this->db
		->where("sma_id",$sma)
		->where("pat_id",$pat)
		->get($this->tableRed)->row();
	}	
	
	
	
	
	public function ajout_avis($data){
		return $this->db->insert($this->tableAvs,$data);
	}
	
	public function ajout_traitement_dent($data){
		$this->db->insert($this->tableDen,$data);
		return $this->db->order_by("den_id","desc")->get($this->tableDen)->row();
	}	
	
	public function ajout_consultation_dentaire($data){
		$this->db->insert($this->tableSto,$data);
		return $this->db->order_by("sto_id","desc")->get($this->tableSto)->row();
	}
	
	public function new_examen_rectal($data){
		return $this->db->insert($this->tableExr,$data);
	}	
	
	public function examen_rectal($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableExr.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableExr.".sea_id",$id)
		->order_by($this->tableExr.".exr_id","desc")
		->get($this->tableExr)->row();
	}
	
	// Récupérer l'examen rectal dans le dossier médical
	public function examen_rectal_dossier_medical($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableExr.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableExr.".sea_id",$id)
		// ->order_by($this->tableExr.".exr_id","desc")
		->get($this->tableExr)->result();
	}
	
	public function new_examen_perineal($data){
		return $this->db->insert($this->tableExp,$data);
	}
	
	public function examen_perineal($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableExp.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableExp.".sea_id",$id)
		->order_by($this->tableExp.".exp_id","desc")
		->get($this->tableExp)->row();
	}

	// Récupérer l'examen périnéal dans le dossier médical
	public function examen_perineal_dossier_medical($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableExp.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableExp.".sea_id",$id)
		// ->order_by($this->tableExp.".exp_id","desc")
		->get($this->tableExp)->result();
	}
	
	public function new_examen_pelvien($data){
		return $this->db->insert($this->tablePee,$data);
	}
	
	public function examen_pelvien($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tablePee.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tablePee.".sea_id",$id)
		->order_by($this->tablePee.".pee_id","desc")
		->get($this->tablePee)->row();
	}

	// Récupérer l'examen pelvien sous spéculum dans le dossier médical
	public function examen_pelvien_sejour($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tablePee . '.sea_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableSea . '.acm_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->where($this->tablePee . ".sea_id", $id)
			// ->order_by($this->tablePee . ".pee_id", "desc")
			->get($this->tablePee)->result();
	}
	
	public function new_examen_abdominal($data){
		return $this->db->insert($this->tableAbe,$data);
	}
	
	public function examen_abdominal($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableAbe.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableAbe.".sea_id",$id)
		->order_by($this->tableAbe.".abe_id","desc")
		->get($this->tableAbe)->row();
	}
	
	// Récupérer tous les examens abdominaux dans le dossier médical
	public function examen_abdominal_dossier_medical($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableAbe.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableAbe.".sea_id",$id)
		->get($this->tableAbe)->result();
	}
	
	public function new_examen_vaginal($data){
		return $this->db->insert($this->tableEva,$data);
	}
	
	public function examen_vaginal($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEva.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableEva.".sea_id",$id)
		->order_by($this->tableEva.".eva_id","desc")
		->get($this->tableEva)->row();
	}

	// Récupérer l'examen vaginal dans le dossier médical
	public function examen_vaginal_dossier_medical($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEva.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableEva.".sea_id",$id)
		// ->order_by($this->tableEva.".eva_id","desc")
		->get($this->tableEva)->result();
	}
	
	public function new_examen_echographique($data){
		return $this->db->insert($this->tableEec,$data);
	}
	
	public function examen_echographique($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEec.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableEec.".sea_id",$id)
		->order_by($this->tableEec.".eec_id","desc")
		->get($this->tableEec)->row();
	}

	// Récupérer tous les échographies dans le dossier médical
	public function examen_echographique_dossier_medical($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEec.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableEec.".sea_id",$id)
		// ->order_by($this->tableEec.".eec_id","desc")
		->get($this->tableEec)->result();
	}

	public function new_examen_senologique($data)
	{
		return $this->db->insert($this->tableEse, $data);
	}

	public function examen_senologique($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableEse . '.sea_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableSea . '.acm_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->where($this->tableEse . ".sea_id", $id)
			->order_by($this->tableEse . ".ese_id", "desc")
			->get($this->tableEse)->row();
	}

	// Récupérer les examens sénologiques dans le dossier médical
	public function examen_senologique_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableEse . '.sea_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableSea . '.acm_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->where($this->tableEse . ".sea_id", $id)
			->order_by($this->tableEse . ".ese_id", "desc")
			->get($this->tableEse)->result();
	}
	
	public function ajout_lan($data){
		return $this->db->insert($this->tablePpe,$data);
	}
	
	public function verif_lan($lan, $pat)
	{
		return $this->db
		->where("lan_id",$lan)
		->where("pat_id",$pat)
		->get($this->tablePpe)->row();
	}	
	
	
	public function ajout_laf($data){
		return $this->db->insert($this->tablePaf,$data);
	}
	
	public function verif_laf($laf,$pat)
	{
		return $this->db
		->where("laf_id",$laf)
		->where("pat_id",$pat)
		->get($this->tablePaf)->row();
	}	
	
	
	
	public function ajout_lia($data){
		return $this->db->insert($this->tablePal,$data);
	}
	
	public function verif_lia($lia, $pat)
	{
		return $this->db
		->where("lia_id",$lia)
		->where("pat_id",$pat)
		->get($this->tablePal)->row();
	}	
	
	
	
	public function ajout_lap($data){
		return $this->db->insert($this->tablePac,$data);
	}
	
	public function verif_lap($lap, $pat)
	{
		return $this->db
		->where("lap_id",$lap)
		->where("pat_id",$pat)
		->get($this->tablePac)->row();
	}	
	
	public function maj_rapport_externe($data,$id){
		return $this->db->where("img_id",$id)->update($this->tableImg,$data);
	}
	
	public function maj_rapport_externe_reeducation($data,$id){
		return $this->db->where("ree_id",$id)->update($this->tableRee,$data);
	}
	
	public function maj_rapport_externe_labo($data,$id){
		return $this->db->where("mal_id",$id)->update($this->tableMal,$data);
	}
	
	public function maj_rapport_externe_exploration($data,$id){
		return $this->db->where("aef_id",$id)->update($this->tableAef,$data);
	}
	
	
	
	public function ajout_diagnostic($data){
		return $this->db->insert($this->tableDia,$data);
	}
	
	public function maj_deces($data,$id){
		return $this->db->where("pat_id",$id)->update($this->tablePat,$data);
	}
	
	public function liste_maladie_actifs()
	{
		return $this->db
		->where("mal_iSta",1)
		->order_by("mal_sLibelle","asc")
		->get($this->tableMal)->result();
	}
	
	
	
	// public function liste_stats_patient($a, $b)
	// {
		// return $this->db
		// ->join($this->tableAcm, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		// ->select('COUNT(acm_id) AS nb, DATE_FORMAT(acm_dDate,"%Y") AS annee')
		// ->where("acm_dDate >=",$a)
		// ->where("acm_dDate <=",$b)
		// ->where("annee >=",$c)
		// ->where("annee <=",$d)
		// ->where("pat_sSexe",$e)
		// ->get($this->tableAcm)->row();
	// }
	
	public function liste_stats_patient_encours($delai=false, $datedujour)
	{
	
		if($delai===false){
			return $this->db
			->select('COUNT(acm_id) AS nb, DATE_FORMAT(acm_dDate,"%Y-%m-%d") AS annee')
			->having("annee <=",$datedujour)
			->get($this->tableAcm)->row();
		}
	
		return $this->db
		->select('DATE_FORMAT(acm_dDate,"%Y-%m-%d") AS annee')
		->having("annee >=",$delai)
		->having("annee <=",$datedujour)
		->get($this->tableAcm)->result();

	}
	
	
	
	public function liste_stats_patient_inter_genre($a, $b,$c, $d, $e)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableAcm.'.acm_id) AS nb, DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableAcm.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->where("acm_dDate >=",$a)
		->where("acm_dDate <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where("pat_sSexe",$e)
		->get($this->tableAcm)->row();
	}
	
	public function stats_nombre_deces_inter_genre($a, $b, $c, $d, $e)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableDec.'.dec_id) AS nb,DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableDec.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	public function liste_stats_patient_max_genre($a, $b, $d, $e)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableAcm.'.acm_id) AS nb, DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableAcm.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->where("acm_dDate >=",$a)
		->where("acm_dDate <=",$b)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where("pat_sSexe",$e)
		->get($this->tableAcm)->row();
	}
	
	public function stats_nombre_deces_max_genre($a, $b, $d, $e)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableDec.'.dec_id) AS nb,DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableDec.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	public function liste_stats_patient_min_genre($a, $b, $c, $e)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableAcm.'.acm_id) AS nb, DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableAcm.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->where("acm_dDate >=",$a)
		->where("acm_dDate <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where("pat_sSexe",$e)
		->get($this->tableAcm)->row();
	}
	
	public function stats_nombre_deces_min_genre($a, $b, $c, $e)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableDec.'.dec_id) AS nb,DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableDec.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	public function stats_diagnostiques($a,$b)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		// ->where($this->tableSea.".sea_dDate >=",$a)
		// ->where($this->tableSea.".sea_dDate <=",$b)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	public function stats_diagnostiques_genre($a,$b, $e)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		// ->where($this->tableSea.".sea_dDate >=",$a)
		// ->where($this->tableSea.".sea_dDate <=",$b)
		->where("pat_sSexe",$e)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	public function stats_diagnostiques_min_genre($a,$b,$c, $e)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where("pat_sSexe",$e)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	
	public function stats_diagnostiques_max_genre($a,$b,$d, $e)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where("pat_sSexe",$e)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	public function stats_diagnostiques_ageMaximal($a,$b,$d)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	public function stats_diagnostiques_ageMinimal($a,$b,$c)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	public function stats_diagnostiques_inter_genre($a,$b,$c, $d, $e)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where("pat_sSexe",$e)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	public function stats_diagnostiques_intervale($a,$b,$c, $d)
	{
		return $this->db
		->select($this->tableMal.'.mal_sLibelle, COUNT('.$this->tableDia.'.dia_id) AS nb,'.$this->tableDia.'.mal_id')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->group_by($this->tableDia.'.mal_id')
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}
	
	public function stats_nombre_deces_encours($a, $b)
	{
		return $this->db
		// ->join($this->tableAcm, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->select('COUNT(dec_id) AS nb, DATE_FORMAT(dec_dDateDeces,"%Y") AS annee')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		// ->where("annee >=",$c)
		// ->where("annee <=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	public function stats_nombre_naissance_encours($a, $b)
	{
		return $this->db
		// ->join($this->tableAcm, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->select('COUNT(nne_id) AS nb, DATE_FORMAT(nne_dDateNaiss,"%Y") AS annee')
		->where("nne_dDateNaiss >=",$a)
		->where("nne_dDateNaiss <=",$b)
		// ->where("annee >=",$c)
		// ->where("annee <=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableNne)->row();
	}
	
	
	public function stats_nombre_deces($a, $b)
	{
		return $this->db
		->select('COUNT(dec_id) AS nb, DATE_FORMAT(pat_dDateNaiss,"%Y") AS annee')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		->get($this->tableDec)->row();
	}
	
	
	public function liste_stats_patient_ageMinimal($a, $b,$c)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableAcm.'.acm_id) AS nb, DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableAcm.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tableAcm.".acm_dDate <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		// ->where("annee <=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableAcm)->row();
	}
	
	
	public function stats_nombre_deces_ageMinimal($a, $b, $c)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableDec.'.dec_id) AS nb,DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableDec.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		// ->where("annee <=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	
	
	public function liste_stats_patient_ageMaximal($a, $b,$d)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableAcm.'.acm_id) AS nb, DATE_FORMAT('.$this->tablePat.'.pat_dDateNaiss,"%Y") AS annee, '.$this->tableAcm.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tableAcm.".acm_dDate <=",$b)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableAcm)->row();
	}
	
	public function stats_nombre_deces_ageMaximal($a, $b, $d)
	{
		return $this->db
		->select('COUNT(dec_id) AS nb, DATE_FORMAT(pat_dDateNaiss,"%Y") AS annee')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	public function liste_stats_patient_intervale($a, $b,$c, $d)
	{
		return $this->db
		->select($this->tablePat.'.pat_dDateNaiss, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableAcm.'.pat_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->where("acm_dDate >=",$a)
		->where("acm_dDate <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableAcm)->row();
	}
	
	public function stats_nombre_deces_intervale($a, $b, $c, $d)
	{
		return $this->db
		->select('COUNT(dec_id) AS nb,')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		// ->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	public function stats_services_genre($a, $b, $e)
	{
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tablePat.".pat_sSexe",$e)
		->group_by($this->tableSer.'.ser_id')
		->order_by($this->tableSer.".ser_sLibelle","desc")
		->get($this->tableAcm)->result();
	}
	
	public function stats_services_min_genre($a, $b, $c, $e)
	{
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_sSexe",$e)
		->group_by($this->tableSer.'.ser_id')
		->order_by($this->tableSer.".ser_sLibelle","desc")
		->get($this->tableAcm)->result();
	}
	
	public function stats_services_inter_genre($a, $b, $c, $d, $e)
	{
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where($this->tablePat.".pat_sSexe",$e)
		->group_by($this->tableSer.'.ser_id')
		->order_by($this->tableSer.".ser_sLibelle","desc")
		->get($this->tableAcm)->result();
	}
	
	
	public function stats_services_intervale($a, $b, $c, $d)
	{
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->group_by($this->tableSer.'.ser_id')
		->order_by($this->tableSer.".ser_sLibelle","desc")
		->get($this->tableAcm)->result();
	}
	
	
	public function stats_services_max_genre($a, $b, $d, $e)
	{
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->where($this->tablePat.".pat_sSexe",$e)
		->group_by($this->tableSer.'.ser_id')
		->order_by($this->tableSer.".ser_sLibelle","desc")
		->get($this->tableAcm)->result();
	}
	
	public function stats_services_ageMaximal($a, $b, $d)
	{
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tablePat.".pat_dDateNaiss >=",$d)
		->group_by($this->tableSer.'.ser_id')
		->order_by($this->tableSer.".ser_sLibelle","desc")
		->get($this->tableAcm)->result();
	}
	
	public function stats_services_ageMinimal($a, $b, $c)
	{
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDate >=",$a)
		->where($this->tablePat.".pat_dDateNaiss <=",$c)
		->group_by($this->tableSer.'.ser_id')
		->order_by($this->tableSer.".ser_sLibelle","desc")
		->get($this->tableAcm)->result();
	}
	
	
	public function liste_stats_patient_genre($a, $b,$e)
	{
		return $this->db
		->select('COUNT(acm_id) AS nb')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->where("acm_dDate >=",$a)
		->where("acm_dDate <=",$b)
		// ->where("annee",$c)
		// ->where("annee =",$d)
		->where("pat_sSexe",$e)
		->get($this->tableAcm)->row();
	}
	
	
	
	public function stats_nombre_deces_genre($a, $b, $e)
	{
		return $this->db
		->select('COUNT(dec_id) AS nb,')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableDec.'.pat_id ','inner')
		->where("dec_dDateDeces >=",$a)
		->where("dec_dDateDeces <=",$b)
		// ->where("annee",$c)
		// ->where("annee =",$d)
		->where("pat_sSexe",$e)
		->get($this->tableDec)->row();
	}
	
	
	public function stats_diagnostiques_encours($a, $b)
	{
		return $this->db
		->select('COUNT(dia_id) AS nb, DATE_FORMAT(sea_dDate,"%Y") AS annee')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where("sea_dDate >=",$a)
		->where("sea_dDate <=",$b)
		->get($this->tableDia)->row();
	}
	
	
	public function stats_services($delai=false, $datedujour)
	{
	
		if($delai===false){
			return $this->db
			->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id, DATE_FORMAT('.$this->tableAcm.'.acm_dDate,"%Y-%m-%d") AS annee')
			->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
			->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
			->having("annee <=",$datedujour)
			->group_by($this->tableSer.'.ser_id')
			->order_by("nb","desc")
			->get($this->tableAcm)->result();
		}
	
		return $this->db
		->select($this->tableSer.'.ser_sLibelle, COUNT('.$this->tableAcm.'.acm_id) AS nb,'.$this->tableSer.'.ser_id, DATE_FORMAT('.$this->tableAcm.'.acm_dDate,"%Y-%m-%d") AS annee')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->having(array('annee >='=>$delai, 'annee <='=>$datedujour))
		->group_by($this->tableSer.'.ser_id')
		->get($this->tableAcm)->result();
	}
	
	public function nouveau_cas_deces($data){
		return $this->db->insert($this->tableDec,$data);
	}	
	
	public function ajout_nouveau_ne($data){
		return $this->db->insert($this->tableNne,$data);
	}
	
	public function maj_statut_seance($data, $id){
		return $this->db->where("ree_id",$id)->update($this->tableRee,$data);
	}	
	
	public function maj_seance($data, $id){
		return $this->db->where("ree_id",$id)->update($this->tableRee,$data);
	}
	
	
	public function recup_seance($id){
		return $this->db
		// ->join($this->tableRee, $this->tableRee.'.ree_id ='.$this->tableSre.'.ree_id ','inner')
		// ->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableRee.'.acm_id ','inner')
		// ->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		// ->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		// ->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableRee.".ree_id",$id)
		->get($this->tableRee)->row();
	}
	
	public function liste_seance_reeducation($id)
	{
		return $this->db
		->join($this->tableRee, $this->tableRee.'.ree_id ='.$this->tableSre.'.ree_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableRee.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableRee.".ree_id",$id)
		->get($this->tableSre)->result();
	}
	
	
	public function detail_patient_reeducation($id)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableRee.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableRee.".ree_id",$id)
		->get($this->tableRee)->row();
	}	
	
	
	public function medecin_prescripteur_reeducation($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableRee.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.per_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableRee.".sea_id",$id)
		->get($this->tableRee)->row();
	}
	
	
	public function liste_acm_reeducation($date,$inf)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableRee.'.per_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableRee.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableRee.".ree_iSta",1)
		->get($this->tableRee)->result();
	}	
	
	
	public function rapport_reeducation($id,$inf)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableRee.'.per_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableRee.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableSre, $this->tableSre.'.ree_id ='.$this->tableRee.'.ree_id ','inner')
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableRee.".ree_iSta",2)
		->where($this->tableRee.".ree_id",$id)
		->get($this->tableRee)->row();
	}		
	
	
	public function antecedent_patient($id)
	{
		return $this->db
		->where($this->tableInc.".pat_id",$id)
		->get($this->tableInc)->row();
	}
	
	
	public function liste_antecedant_personnel_patient($id){
		return $this->db
			->join($this->tableLan, $this->tableLan.'.lan_id ='.$this->tablePpe.'.lan_id ','inner')
			->where("pat_id",$id)
			->get($this->tablePpe)->result();
	}		
	
	public function liste_antecedant_familial_patient($id){
		return $this->db
			->join($this->tableLaf, $this->tableLaf.'.laf_id ='.$this->tablePaf.'.laf_id ','inner')
			->where("pat_id",$id)
			->get($this->tablePaf)->result();
	}		
	
	public function liste_allergie_patient($id){
		return $this->db
			->join($this->tableLia, $this->tableLia.'.lia_id ='.$this->tablePal.'.lia_id ','inner')
			->where("pat_id",$id)
			->get($this->tablePal)->result();
	}		
	
	public function liste_activite_professionnelle_patient($id){
		return $this->db
			->join($this->tableLap, $this->tableLap.'.lap_id ='.$this->tablePac.'.lap_id ','inner')
			->where("pat_id",$id)
			->get($this->tablePac)->result();
	}	
	
	
	public function montant_par_medecin($debut,$fin){
		if($debut === NULL){
			return $this->db
					->select("SUM(elf.elf_iCout) AS montant, per.per_sNom,per.per_sPrenom,per.per_sTitre, per.per_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tablePer." per","per.per_id=acm.per_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->where("per.per_sTitre !=",NULL)/*Condition à revoir*/
					->group_by("per.per_sNom")/*Ajout*/
					->group_by("per.per_sPrenom")/*Ajout*/
					->group_by("per.per_sTitre")/*Ajout*/
					->group_by("per.per_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(elf.elf_iCout) AS montant, per.per_sNom,per.per_sPrenom,per.per_sTitre, per.per_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tablePer." per","per.per_id=acm.per_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->where("per.per_sTitre !=",NULL)/*Condition à revoir*/
					->group_by("per.per_sNom")/*Ajout*/
					->group_by("per.per_sPrenom")/*Ajout*/
					->group_by("per.per_sTitre")/*Ajout*/
					->group_by("per.per_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}
	
	public function montant_par_acte_recette_sous($cpt, $debut, $fin){
		if($debut === NULL){
			return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.lac_sLibelle, lac.lac_id, lac.cpt_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->where("lac.cpt_id",$cpt)
					->group_by("lac.lac_id")
					// ->group_by("lac.cpt_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.lac_sLibelle, lac.lac_id, lac.cpt_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->where("lac.cpt_id",$cpt)
					->group_by("lac.lac_id")
					// ->group_by("lac.cpt_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}	
	
	public function montant_par_acte_recette($debut,$fin){
		if($debut === NULL){
			return $this->db
					->select("SUM(fac.fac_iMontantPaye) AS montant, lac.lac_sLibelle, lac.lac_id, lac.cpt_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					// ->group_by("lac.lac_id")
					->group_by("lac.cpt_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(fac.fac_iMontantPaye) AS montant, lac.lac_sLibelle, lac.lac_id, lac.cpt_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					// ->group_by("lac.lac_id")
					->group_by("lac.cpt_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}		
	
	
	public function montant_par_acte($debut,$fin){
		if($debut === NULL){
			return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.lac_sLibelle, lac.lac_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->group_by("lac.lac_sLibelle")/*Ajout*/
					->group_by("lac.lac_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(elf.elf_iCout) AS montant, lac.lac_sLibelle, lac.lac_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					// ->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableLac." lac","lac.lac_id=acm.lac_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->group_by("lac.lac_sLibelle")/*Ajout*/
					->group_by("lac.lac_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}	
	
	public function element_rapport_reeducation($id)
	{
		return $this->db
		->where($this->tableSre.".ree_id",$id)
		->get($this->tableSre)->result();
	}
	
	
	public function liste_acm_reeducation_fait($date,$inf)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableRee.'.per_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableRee.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableSre, $this->tableSre.'.ree_id ='.$this->tableRee.'.ree_id ','inner')
		->group_by($this->tableSre.".ree_id","asc")
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableRee.".ree_iSta",2)
		->get($this->tableRee)->result();
	}	
	
	
	
	public function liste_acm_cardiologie($date,$inf)
	{
		return $this->db
		->join($this->tableCar, $this->tableCar.'.car_id ='.$this->tableAca.'.car_id ','left')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableCar.'.per_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAca.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableAca.".aca_iSta",1)
		->get($this->tableAca)->result();
	}	
	
	public function liste_acm_cardiologie_fait($inf)
	{
		return $this->db
		->join($this->tableCar, $this->tableCar.'.car_id ='.$this->tableAca.'.car_id ','left')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableCar.'.per_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAca.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableAca.".aca_iSta",2)
		->get($this->tableAca)->result();
	}	
	
	
			
	public function diagnostic($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDia.'.sea_id ','inner')
		->join($this->tableMal, $this->tableMal.'.mal_id ='.$this->tableDia.'.mal_id ','inner')
		->where($this->tableDia.".sea_id",$id)
		->order_by($this->tableDia.".dia_id","desc")
		->get($this->tableDia)->result();
	}			
	
	public function cas_deces($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDec.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableDec.".sea_id",$id)
		->order_by($this->tableDec.".dec_id","desc")
		->get($this->tableDec)->row();
	}			
	
	
	public function nouveau_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableNne.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableNne.".sea_id",$id)
		->order_by($this->tableNne.".nne_id","desc")
		->get($this->tableNne)->result();
	}

	// Récupérer tous les nouveaux né dans le dossier médical
	public function nouveau_sejour_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableNne . '.sea_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableSea . '.acm_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->where($this->tableNne . ".sea_id", $id)
			// ->order_by($this->tableNne.".nne_id","desc")
			->get($this->tableNne)->result();
	}
			
	public function reeducation_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableRee.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableRee.'.acm_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableRee.".sea_id",$id)
		->order_by($this->tableRee.".ree_id","desc")
		->get($this->tableRee)->result();
	}

	// Récupérer la prescription en rééducation et le rapport du kiné dans le dossier médical du patient 
	public function reeducation_sejour_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSre, $this->tableSre . '.ree_id =' . $this->tableRee . '.ree_id ', 'inner')
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableRee . '.sea_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableRee . '.acm_id ', 'inner')
			->join($this->tableUni, $this->tableUni . '.uni_id =' . $this->tableAcm . '.uni_id ', 'inner')
			->join($this->tableSer, $this->tableUni . '.ser_id =' . $this->tableSer . '.ser_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			// ->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
			->where($this->tableRee . ".sea_id", $id)
			->order_by($this->tableRee . ".ree_id", "desc")
			->get($this->tableRee)->result();
	}	
		
	public function ajout_reeducation($data){
		return $this->db->insert($this->tableSre,$data);
	}
		
	public function ajout_prescription_reeducation($data){
		return $this->db->insert($this->tableRee,$data);
	}
		
	public function ajout_prescription_cardiologique($data){
		return $this->db->insert($this->tableAca,$data);
	}
	
	
	public function maj_assignation($data,$id){
		return $this->db->where("soi_id",$id)->update($this->tableSoi,$data);
	}
	
	
	public function maj_reeducation($data,$id){
		return $this->db->where("ree_id",$id)->update($this->tableRee,$data);
	}
	
	
	public function detail_patient_assigne($id)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSoi.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSoi.".soi_id",$id)
		->get($this->tableSoi)->row();
	}
	
	public function medecin_prescripteur($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSoi.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.per_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSoi.".sea_id",$id)
		->get($this->tableSoi)->row();
	}
	
	public function medecin_prescripteur_exploration($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableEfc.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.per_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableEfc.".sea_id",$id)
		->get($this->tableEfc)->row();
	}
	
	public function medecin_prescripteur_imagerie($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableImg.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableImg.'.img_iPer ','left')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableImg.".img_id",$id)
		->get($this->tableImg)->row();
	}
	
	
	public function medecin_prescripteur_cardiologie($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableCar.'.sea_id ='.$this->tableSea.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.per_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableCar.".car_id",$id)
		->get($this->tableCar)->row();
	}
	
	
	/****** ************/
	public function liste_acm_encours_patient($date,$id)
	{
		return $this->db
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".acm_iHos",0)
		->where($this->tableAcm.".lac_id !=",64)
		// ->where($this->tableAcm.".per_id IS NULL")
		// ->where($this->tableUni.".ser_id ",$ser2)
		->where($this->tablePat.".pat_id ",$id)
		->get($this->tableAcm)->result();
	}	
	
	public function liste_acm_encours2($date)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.recep_iPer ','left')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".acm_iHos",0)
		->order_by($this->tableAcm.".acm_id","desc")
		->get($this->tableAcm)->result();
	}		
	
	
	
	
	public function liste_acm_encours($date,$ser2)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.recep_iPer ','left')
		// ->join($this->tableAla, $this->tableAla.'.acm_id ='.$this->tableAcm.'.acm_id ','left')
		// ->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','left')
		// ->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		// ->join($this->tableAla, $this->tableAla.'.ala_id ='.$this->tableLab.'.ala_id ','left')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".per_id IS NULL")
		->where($this->tableUni.".ser_id ",$ser2)
		->get($this->tableAcm)->result();
	}	
	
	public function liste_acm_dossier_patient($pat,$date)
	{
		return $this->db
		->join($this->tableHos, $this->tableHos.'.acm_id ='.$this->tableAcm.'.acm_id ','left')
		->join($this->tablePer, $this->tablePer .'.per_id ='.$this->tableAcm.'.per_id','left')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','left')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','left')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp < ",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".acm_iFin",1)
		->where($this->tableAcm.".pat_id",$pat)
		->get($this->tableAcm)->result();
	}
	
	
	public function liste_acm_dossier($date,$ser2)
	{
		return $this->db
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp < ",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".acm_iHos",0)
		->where($this->tableAcm.".lac_id !=",64)
		->where($this->tableUni.".ser_id ",$ser2)
		// ->where($this->tableUni.".ser_id = ".$ser1." OR ".$this->tableUni.".ser_id = ".$ser2)
		->get($this->tableAcm)->result();
	}	
	
	
	public function liste_acm_mes_dossier($date,$ser2,$per)
	{
		return $this->db
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp < ",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".per_id",$per)
		->where($this->tableAcm.".acm_iHos",0)
		->where($this->tableAcm.".lac_id !=",64)
		->where($this->tableUni.".ser_id ",$ser2)
		// ->where($this->tableUni.".ser_id = ".$ser1." OR ".$this->tableUni.".ser_id = ".$ser2)
		->get($this->tableAcm)->result();
	}	
	
	public function liste_mes_acm_encours($date,$per)
	{
		return $this->db
		// ->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >=",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".per_id",$per)
		->get($this->tableAcm)->result();
	}	
	
	public function liste_acm_expire($date,$per)
	{
		return $this->db
		// ->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->where($this->tableAcm.".acm_dDateExp <",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableAcm.".per_id",$per)
		->get($this->tableAcm)->result();
	}	
	
	
	public function liste_acm_infirmerie($date,$inf)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSoi.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableSoi.".soi_iSta",1)
		->get($this->tableSoi)->result();
	}	
		
	public function liste_acm_laboratoire($date,$lab)
	{
		return $this->db
		->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableLab.'.per_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAla.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$lab)
		->where($this->tableAla.".ala_iSta",1)
		->get($this->tableAla)->result();
	}	
	
	
	
	public function liste_tube_laboratoire($lab)
	{
		return $this->db
		->limit(50)
		->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableLab.'.per_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAla.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSer.".ser_id",$lab)
		->order_by($this->tableAla.".ala_id","desc")
		->where($this->tableAla.".ala_iSta !=",1)
		->get($this->tableAla)->result();
	}	

	public function rapport_imagerie($id,$inf)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAci.'.aci_iPer ','inner')
		->join($this->tableImg, $this->tableImg.'.img_id ='.$this->tableAci.'.img_id ','inner')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableImg.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAci.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableAci.".aci_id",$id)
		->where($this->tableAci.".aci_iSta",2)
		->get($this->tableAci)->row();
	}
	
	public function liste_recouvrement_assurance($ass)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','inner')
		->join($this->tableTas, $this->tableTas.'.tas_id ='.$this->tableFac.'.tas_id ','inner')
		->where($this->tableFac.".ass_id",$ass)
		->get($this->tableFac)->result();
	
	}
	
	
	public function liste_recouvrement_patient($pat)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->where($this->tableFac.".fac_iReste >",0)
		->where($this->tableFac.".pat_id",$pat)
		->get($this->tableFac)->result();
	
	}
	
	
	public function liste_tube_laboratoire_faire($lab)
	{
		return $this->db
		->limit(50)
		->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableLab.'.per_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAla.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSer.".ser_id",$lab)
		->where($this->tableAla.".ala_iSta ",2)
		->order_by($this->tableAla.".ala_id","desc")
		->get($this->tableAla)->result();
	}	
	
	
	public function laboratoire_sejour($sej)
	{
		return $this->db
		->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableLab.'.per_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAla.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSea.".sea_id",$sej)
		// ->where($this->tableAla.".ala_iSta",3)
		->get($this->tableAla)->result();
	}	
	
	public function liste_rapport_laboratoire($lab)
	{
		return $this->db
		->limit(100)
		->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableLab.'.per_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAla.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSer.".ser_id",$lab)
		->order_by($this->tableAla.".ala_id","desc")
		->where($this->tableAla.".ala_iSta",3)
		->get($this->tableAla)->result();
	}
	
	
	
	public function rapport_laboratoire($id, $lab)
	{
		return $this->db
		->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableLab.'.per_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAla.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSer.".ser_id",$lab)
		->where($this->tableAla.".ala_id",$id)
		->where($this->tableAla.".ala_iSta",3)
		->get($this->tableAla)->row();
	}
	
		
	public function acm_laboratoire_unique($id)
	{
		return $this->db
		->join($this->tableLab, $this->tableLab.'.lab_id ='.$this->tableAla.'.lab_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableLab.'.per_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAla.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAla.".ala_id",$id)
		->get($this->tableAla)->row();
	}	
	

	public function liste_acm_infirmerie_hospitalisation($inf)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSoi.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableHos, $this->tableHos.'.hos_id ='.$this->tableSoi.'.hos_id ','inner')
		// ->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableSoi.".soi_iSta",3)
		->get($this->tableSoi)->result();
	}	
	
	public function liste_acm_imagerie($date,$inf)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAci.'.acm_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableAci.".aci_iSta",1)
		->get($this->tableAci)->result();
	}	
		
	public function liste_acm_exploration($date,$inf)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAef.'.acm_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableAcm.".acm_iSta",2)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableAef.".aef_iSta",1)
		->get($this->tableAef)->result();
	}	
		
	public function liste_acm_imagerie_fait($inf)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAci.'.aci_iPer ','inner')
		->join($this->tableImg, $this->tableImg.'.img_id ='.$this->tableAci.'.img_id ','inner')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableImg.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAci.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableAci.".aci_iSta",2)
		->get($this->tableAci)->result();
	}	
	
	public function liste_acm_exploration_fait($inf)
	{
		return $this->db
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAef.'.aef_iPer ','inner')
		->join($this->tableEfc, $this->tableEfc.'.efc_id ='.$this->tableAef.'.efc_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEfc.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAef.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableAef.".aef_iSta",2)
		->get($this->tableAef)->result();
	}
		
	public function patient_imagerie($aci)
	{
		return $this->db
		->join($this->tableImg, $this->tableImg.'.img_id ='.$this->tableAci.'.img_id ','inner')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableImg.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAci.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAci.".aci_id",$aci)
		->get($this->tableAci)->row();
	}	
			
	public function patient_cardiologie($aca)
	{
		return $this->db
		->join($this->tableCar, $this->tableCar.'.car_id ='.$this->tableAca.'.car_id ','inner')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCar.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAca.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAca.".aca_id",$aca)
		->get($this->tableAca)->row();
	}	
		
	public function patient_stomatologie($acm)
	{
		return $this->db
		->join($this->tableDen, $this->tableDen.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableEfc, $this->tableEfc.'.efc_id ='.$this->tableDen.'.efc_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEfc.'.sea_id ','left')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_id",$acm)
		->get($this->tableAcm)->row();
	}	
	
	public function patient_exploration($acm)
	{
		return $this->db
		->join($this->tableAef, $this->tableAef.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableEfc, $this->tableEfc.'.efc_id ='.$this->tableAef.'.efc_id ','left')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEfc.'.sea_id ','left')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_id",$acm)
		->get($this->tableAcm)->row();
	}	
	
	public function detail_patient_imagerie($date,$inf)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAci.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->where($this->tableAcm.".acm_dDateExp >",$date)
		->where($this->tableSer.".ser_id",$inf)
		// ->where($this->tableAci.".img_iSta",1)
		->get($this->tableAci)->result();
	}	
	
	public function liste_acm_infirmerie_fait($inf)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSoi.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableSoi.'.soi_iPersonnel ','inner')
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableSoi.".soi_iSta",2)
		->where($this->tableSoi.".hos_id IS NULL")
		->get($this->tableSoi)->result();
	}	
	public function liste_acm_infirmerie_fait_hosp($inf)
	{
		return $this->db
		->join($this->tableHos, $this->tableHos.'.hos_id ='.$this->tableSoi.'.hos_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSoi.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableSoi.'.soi_iPersonnel ','inner')
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableSoi.".soi_iSta",2)
		->get($this->tableSoi)->result();
	}	
	
	public function liste_acm_infirmerie_fait_patient($pat,$inf)
	{
		return $this->db
		->join($this->tableHos, $this->tableHos.'.hos_id ='.$this->tableSoi.'.hos_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSoi.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePat, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableSoi.'.soi_iPersonnel ','inner')
		->where($this->tablePat.".pat_id",$pat)
		->where($this->tableSer.".ser_id",$inf)
		->where($this->tableSoi.".soi_iSta",2)
		->get($this->tableSoi)->result();
	}	
	
	
	public function acm_patient($id)
	{
		return $this->db
		// ->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableFac, $this->tableFac.'.fac_id ='.$this->tableElf.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','left')
		// ->where($this->tableAcm.".acm_sStatut","en cours")
		->where($this->tableAcm.".acm_id",$id)
		->get($this->tableAcm)->row();
	}
	
	
	public function acm_medical($id)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','left')
		->where($this->tableAcm.".acm_id",$id)
		->get($this->tableAcm)->row();
	}

	public function acm_medical_pat($id, $pat)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','left')
		->where($this->tableAcm.".acm_id",$id)
		->where($this->tableAcm.".pat_id",$pat)
		->get($this->tableAcm)->row();
	}
	
	/** Consultation */	
	public function verif_sejour($acm, $date)
	{
		return $this->db
		->where("acm_id",$acm)
		->where("sea_dDate",$date)
		->get($this->tableSea)->row();
	}
	
	
	public function verif_exploration($acm)
	{
		return $this->db
		->where("acm_id",$acm)
		->get($this->tableAef)->row();
	}	
	
				
	public function sejour_acm($id)
	{
		return $this->db
		->where("acm_id",$id)
		->order_by("sea_id","desc")
		->get($this->tableSea)->result();
	}	
	
		
				
	public function sejour($id)
	{
		return $this->db
		->where("sea_id",$id)
		->get($this->tableSea)->row();
	}	
	
			
	public function constante($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCon.'.sea_id ','inner')
		->where($this->tableSea.".acm_id",$id)
		->order_by($this->tableCon.".con_id","desc")
		->get($this->tableCon)->row();
	}	
				
	public function liste_constante_vitale($acm)
	{
		return $this->db
		->limit(8)
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCon.'.sea_id ','inner')
		->where($this->tableSea.".acm_id",$acm)
		->order_by($this->tableCon.".con_dDate","asc")
		->get($this->tableCon)->result();
	}	
					
	public function information($id)
	{
		return $this->db
		->where("pat_id",$id)
		->order_by("inc_id","desc")
		->get($this->tableInc)->row();
	}
	
	public function antecedants_familiaux($id)
	{
		return $this->db
		->join($this->tableLaf, $this->tableLaf.'.laf_id ='.$this->tablePaf.'.laf_id ','inner')
		->where($this->tablePaf.".pat_id",$id)
		->order_by($this->tablePaf.".paf_id","desc")
		->get($this->tablePaf)->result();
	}	
	
	public function antecedants_personnels($id)
	{
		return $this->db
		->join($this->tableLan, $this->tableLan.'.lan_id ='.$this->tablePpe.'.lan_id ','inner')
		->where($this->tablePpe.".pat_id",$id)
		->order_by($this->tablePpe.".ppe_id","desc")
		->get($this->tablePpe)->result();
	}	
	
	public function allergies_connues($id)
	{
		return $this->db
		->join($this->tableLia, $this->tableLia.'.lia_id ='.$this->tablePal.'.lia_id ','inner')
		->where($this->tablePal.".pat_id",$id)
		->order_by($this->tablePal.".pal_id","desc")
		->get($this->tablePal)->result();
	}	
	
	public function activites_professionnelles($id)
	{
		return $this->db
		->join($this->tableLap, $this->tableLap.'.lap_id ='.$this->tablePac.'.lap_id ','inner')
		->where($this->tablePac.".pat_id",$id)
		->order_by($this->tablePac.".pac_id","desc")
		->get($this->tablePac)->result();
	}	
	
	
	public function constante_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCon.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableCon.".sea_id",$id)
		->order_by($this->tableCon.".con_id","desc")
		->get($this->tableCon)->row();
	}

	// Récupérer les constantes vitales d'un ou plusieurs séjours dans le dossier médical
	public function constante_sejour_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableCon . '.sea_id ', 'inner')
			// ->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
			// ->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
			->where($this->tableCon . ".sea_id", $id)
			// ->order_by($this->tableCon.".con_id","desc")
			->get($this->tableCon)->result();
	}

	public function constante_sejour_hospitalise($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCon.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableCon.".sea_id",$id)
		->order_by($this->tableCon.".con_id","desc")
		->get($this->tableCon)->result();
	}	
			
	public function hospitalisation_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableHos.'.sea_id ','inner')
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".sea_id",$id)
		->order_by($this->tableHos.".hos_id","desc")
		->get($this->tableHos)->row();
	}

	// Récupérer toutes les hospitalisations du patient dans le dossier médical
	public function hospitalisation_sejour_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableHos . '.sea_id ', 'inner')
			->join($this->tableLit, $this->tableLit . '.lit_id =' . $this->tableHos . '.lit_id ', 'inner')
			->join($this->tableCha, $this->tableCha . '.cha_id =' . $this->tableLit . '.cha_id ', 'inner')
			->join($this->tableUni, $this->tableUni . '.uni_id =' . $this->tableCha . '.uni_id ', 'inner')
			->join($this->tableSer, $this->tableSer . '.ser_id =' . $this->tableUni . '.ser_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableSea . '.acm_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->where($this->tableHos . ".sea_id", $id)
			// ->order_by($this->tableHos.".hos_id","desc")
			->get($this->tableHos)->result();
	}

	public function liste_patient_materne()
	{
		return $this->db
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		// ->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".hos_iSta",1)
		->where($this->tableHos.".hos_iMaternite",1)
		->order_by($this->tableHos.".hos_dDate","desc")
		->get($this->tableHos)->result();
	}	
	
	public function liste_hospitalisation()
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableHos.'.sea_id ','inner')
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		// ->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".hos_iSta",1)
		->order_by($this->tableHos.".hos_dDate","desc")
		->get($this->tableHos)->result();
	}	
			
	public function liste_maternite_cloture()
	{
		return $this->db
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".hos_iSta",2)
		->order_by($this->tableHos.".hos_dDate","desc")
		->get($this->tableHos)->result();
	}	
				
	public function liste_hospitalisation_cloture()
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableHos.'.sea_id ','inner')
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".hos_iSta",2)
		->order_by($this->tableHos.".hos_dDate","desc")
		->get($this->tableHos)->result();
	}	
			
	public function liste_mes_hospitalisations($pat)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableHos.'.sea_id ','inner')
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tablePat.".pat_id",$pat)
		->where($this->tableHos.".hos_iSta",2)
		->where($this->tableAcm.".acm_iSta",2)
		->order_by($this->tableHos.".hos_dDate","desc")
		->get($this->tableHos)->result();
	}	
	
				
	public function hospitalisation($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableHos.'.sea_id ','left')
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		// ->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".hos_id",$id)
		->get($this->tableHos)->row();
	}	
					
	public function rappel_hospitalisation($id,$date)
	{
		return $this->db
		->where("hos_id",$id)
		->where("hos_dDate < ",$date)
		->get($this->tableHos)->row();
	}	
	
			
	public function liste_constante($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCon.'.sea_id ','inner')
		->where($this->tableSea.".acm_id",$id)
		->order_by($this->tableCon.".con_id","desc")
		->get($this->tableCon)->result();
	}	
					
	public function liste_information($id)
	{
		return $this->db
		->where("pat_id",$id)
		->order_by("inc_id","desc")
		->get($this->tableInc)->result();
	}	
			
	public function consultation($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCsl.'.sea_id ','inner')
		->where($this->tableSea.".acm_id",$id)
		->where($this->tableCsl.".csl_dDateNoTime",date("Y-m-d"))
		->order_by($this->tableCsl.".csl_id","desc")
		->get($this->tableCsl)->row();
	}	
	
			
	public function consultation_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCsl.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableCsl.".sea_id",$id)
		->order_by($this->tableCsl.".csl_id","desc")
		->get($this->tableCsl)->row();
	}

	// Récupérer dans le dossier médical toutes les consultations que peut faire un patient
	public function consultation_sejour_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableCsl . '.sea_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableSea . '.acm_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->where($this->tableCsl . ".sea_id", $id)
			// ->order_by($this->tableCsl.".csl_id","desc")
			->get($this->tableCsl)->result();
	}
			
	public function liste_consultation($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCsl.'.sea_id ','inner')
		->where($this->tableSea.".acm_id",$id)
		->order_by($this->tableCsl.".csl_id","desc")
		->get($this->tableCsl)->result();
	}	
	
				
	public function recup_ordonnance($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableOrd.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableSea.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAcm.'.per_id ','inner')
		->where($this->tableOrd.".ord_id",$id)
		->get($this->tableOrd)->row();
	}
	
	public function ordonnance_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableOrd.'.sea_id ','inner')
		->where($this->tableOrd.".sea_id",$id)
		->order_by($this->tableOrd.".ord_id","desc")
		->get($this->tableOrd)->row();
	}
	
	public function panning_operation_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tablePop.'.sea_id ','inner')
		->join($this->tableSop, $this->tableSop.'.sop_id ='.$this->tablePop.'.sop_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tablePop.'.lac_id ','inner')
		->join($this->tableBop, $this->tableBop.'.bop_id ='.$this->tableSop.'.bop_id ','inner')
		->join($this->tableAvs, $this->tableAvs.'.pop_id='.$this->tablePop.'.pop_id', 'inner')
		->where($this->tablePop.".sea_id",$id)
		->get($this->tablePop)->result();
	}

	// Récupérer l'acte médical chirurgie dans le dossier médical du patient
	public function operation_sejour($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tablePop . '.sea_id ', 'inner')
			->join($this->tablePer, $this->tablePer . '.per_id =' . $this->tablePop . '.per_id ', 'inner')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableSea . '.acm_id ', 'inner')
			->join($this->tablePat, $this->tablePat . '.pat_id =' . $this->tableAcm . '.pat_id ', 'inner')
			->join($this->tableSop, $this->tableSop . '.sop_id =' . $this->tablePop . '.sop_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tablePop . '.lac_id ', 'inner')
			->join($this->tableBop, $this->tableBop . '.bop_id =' . $this->tableSop . '.bop_id ', 'inner')
			->where($this->tablePop . ".pat_id", $id)
			->get($this->tablePop)->result();
	}

	public function panning_operation()
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tablePop.'.sea_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tablePop.'.per_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableSop, $this->tableSop.'.sop_id ='.$this->tablePop.'.sop_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tablePop.'.lac_id ','inner')
		->join($this->tableBop, $this->tableBop.'.bop_id ='.$this->tableSop.'.bop_id ','inner')
		->where($this->tablePop.".pop_iSta",1)
		->get($this->tablePop)->result();
	}
				
	public function element_ordonnance($id)
	{
		return $this->db
		// ->join($this->tableMed, $this->tableMed.'.med_id ='.$this->tableElo.'.med_id ','inner')
		// ->join($this->tableCat, $this->tableMed.'.cat_id='.$this->tableCat.'.cat_id','inner')
		// ->join($this->tableFam, $this->tableMed.'.fam_id='.$this->tableFam.'.fam_id','inner')
		// ->join($this->tableFor, $this->tableMed.'.for_id='.$this->tableFor.'.for_id','inner')
		->where($this->tableElo.".ord_id",$id)
		->get($this->tableElo)->result();
	}

	// Récupérer l'ordonnance en fonction du séjour dans le dossier médical du patient
	public function element_ordonnance_sejour($id)
	{
		return $this->db
			->join($this->tableElo, $this->tableElo . '.ord_id =' . $this->tableOrd . '.ord_id', 'inner')
			// ->join($this->tableMed, $this->tableMed.'.med_id ='.$this->tableElo.'.med_id ','inner')
			// ->join($this->tableCat, $this->tableMed.'.cat_id='.$this->tableCat.'.cat_id','inner')
			// ->join($this->tableFam, $this->tableMed.'.fam_id='.$this->tableFam.'.fam_id','inner')
			// ->join($this->tableFor, $this->tableMed.'.for_id='.$this->tableFor.'.for_id','inner')
			->where($this->tableOrd . ".sea_id", $id)
			->get($this->tableOrd)->result();
	}
			
	public function soins_infirmiers_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableSoi.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSoi.'.acm_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableSoi.'.soi_iPersonnel ','LEFT')
		->where($this->tableSoi.".sea_id",$id)
		->order_by($this->tableSoi.".soi_id","desc")
		->get($this->tableSoi)->result();
	}
				
	public function imagerie_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableImg.'.sea_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		// ->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		// ->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableImg.".sea_id",$id)
		->order_by($this->tableImg.".img_id","desc")
		->get($this->tableImg)->row();
	}
				
	public function exploration_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEfc.'.sea_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		// ->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		// ->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableEfc.".sea_id",$id)
		->order_by($this->tableEfc.".efc_id","desc")
		->get($this->tableEfc)->row();
	}	
	
	public function avis_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableAvs.'.sea_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableAvs.'.ser_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAvs.'.avs_iPer ','left')
		->where($this->tableAvs.".sea_id",$id)
		->order_by($this->tableAvs.".avs_id","desc")
		->get($this->tableAvs)->result();
	}
				
	public function cardiologie_sejour($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableCar.'.sea_id ','inner')
		->join($this->tableAca, $this->tableAca.'.car_id ='.$this->tableCar.'.car_id ','inner')
		// ->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		// ->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableCar.".sea_id",$id)
		->order_by($this->tableCar.".car_id","desc")
		->get($this->tableCar)->row();
	}
				
	// public function laboratoire_sejour($id)
	// {
		// return $this->db
		// ->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableLab.'.sea_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		// ->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		// ->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		// ->where($this->tableLab.".sea_id",$id)
		// ->order_by($this->tableLab.".lab_id","desc")
		// ->get($this->tableLab)->row();
	// }
	
				
	public function acte_exploration_sejour($id)
	{
		return $this->db
		->join($this->tableEfc, $this->tableAef.'.efc_id ='.$this->tableEfc.'.efc_id ','inner')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableEfc.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAef.'.acm_id ','left')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAef.'.aef_iPer ','left')
		->where($this->tableAef.".efc_id",$id)
		->order_by($this->tableAef.".aef_dDate","asc")
		->get($this->tableAef)->result();
	}

	// Récupérer les actes d'exploration faites par le patient dans le dossier médical
	public function acte_exploration_sejour_dossier_medical($id)
	{
		return $this->db
			->join($this->tableEfc, $this->tableAef . '.efc_id =' . $this->tableEfc . '.efc_id ', 'inner')
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableEfc . '.sea_id ', 'left')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableAef . '.acm_id ', 'left')
			->join($this->tableUni, $this->tableUni . '.uni_id =' . $this->tableAcm . '.uni_id ', 'inner')
			->join($this->tableSer, $this->tableUni . '.ser_id =' . $this->tableSer . '.ser_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->join($this->tablePer, $this->tablePer . '.per_id =' . $this->tableAef . '.aef_iPer ', 'left')
			->where($this->tableSea . ".sea_id", $id)
			// ->order_by($this->tableAef.".aef_dDate","asc")
			->get($this->tableAef)->result();
	}

	public function acte_imagerie_sejour($id)
	{
		return $this->db
		->join($this->tableImg, $this->tableAci.'.img_id ='.$this->tableImg.'.img_id ','inner')
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableImg.'.sea_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableAci.'.acm_id ','left')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableSer, $this->tableUni.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->join($this->tablePer, $this->tablePer.'.per_id ='.$this->tableAci.'.aci_iPer ','left')
		->where($this->tableAci.".img_id",$id)
		->order_by($this->tableAci.".aci_dDate","asc")
		->get($this->tableAci)->result();
	}

	// Récupérer tous les actes d'imagerie dans le dossier médical
	public function acte_imagerie_sejour_dossier_medical($id)
	{
		return $this->db
			->join($this->tableImg, $this->tableAci . '.img_id =' . $this->tableImg . '.img_id ', 'inner')
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableImg . '.sea_id ', 'left')
			->join($this->tableAcm, $this->tableAcm . '.acm_id =' . $this->tableAci . '.acm_id ', 'left')
			->join($this->tableUni, $this->tableUni . '.uni_id =' . $this->tableAcm . '.uni_id ', 'inner')
			->join($this->tableSer, $this->tableUni . '.ser_id =' . $this->tableSer . '.ser_id ', 'inner')
			->join($this->tableLac, $this->tableLac . '.lac_id =' . $this->tableAcm . '.lac_id ', 'inner')
			->join($this->tablePer, $this->tablePer . '.per_id =' . $this->tableAci . '.aci_iPer ', 'left')
			->where($this->tableSea . ".sea_id", $id)
			// ->order_by($this->tableAci.".aci_dDate","asc")
			->get($this->tableAci)->result();
	}
	
	/****** ************/
	public function liste_allergie_actifs($id)
	{
		return $this->db
		->join($this->tableTal, $this->tableTal.'.tal_id ='.$this->tableAll.'.tal_id ','inner')
		->where($this->tableAll.".pat_id",$id)
		->get($this->tableAll)->result();
	}	
	
	public function element_facture($id)
	{
		return $this->db
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableElf.'.acm_id ','left')
		->join($this->tableHos, $this->tableHos.'.hos_id ='.$this->tableAcm.'.acm_iHosId','left')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','left')
		->join($this->tableAch, $this->tableAch.'.ach_id ='.$this->tableElf.'.ach_id ','left')
		->join($this->tableMed, $this->tableMed.'.med_id ='.$this->tableAch.'.med_id ','left')
		->join($this->tableCat, $this->tableMed.'.cat_id ='.$this->tableCat.'.cat_id ','left')
		->join($this->tableFam, $this->tableMed.'.fam_id ='.$this->tableFam.'.fam_id ','left')
		->join($this->tableFor, $this->tableMed.'.for_id ='.$this->tableFor.'.for_id ','left')
		->where($this->tableElf.".fac_id",$id)
		->get($this->tableElf)->result();
	}	
	
	
	public function detail_facture($id)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','left')
		->join($this->tableAcm, $this->tableAcm.'.pat_id ='.$this->tablePat.'.pat_id ','left')
		->join($this->tableTas, $this->tableTas.'.tas_id='.$this->tableFac.'.tas_id','left')
		->join($this->tableAss, $this->tableAss.'.ass_id='.$this->tableFac.'.ass_id','left')
		->join($this->tableBph, $this->tableBph.'.bph_id='.$this->tableFac.'.bph_id','left')
		->where($this->tableFac.".fac_id",$id)
		->get($this->tableFac)->row();
	}	
	
	
	// public function liste_element_caisse()
	// {
		// return $this->db
		// ->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		// ->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id='.$this->tableLac.'.uni_id','inner')
		// ->join($this->tableSer, $this->tableSer.'.ser_id='.$this->tableUni.'.ser_id','inner')
		// ->join($this->tableDep, $this->tableDep.'.dep_id='.$this->tableSer.'.dep_id','inner')
		// ->where($this->tableAcm.".acm_iSta",1)
		// ->where($this->tableAcm.".acm_iHos ",0)
		// ->get($this->tableAcm)->result();
	// }
	
	
	public function nb_element_caisse()
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id='.$this->tableLac.'.uni_id','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id='.$this->tableUni.'.ser_id','inner')
		->join($this->tableDep, $this->tableDep.'.dep_id='.$this->tableSer.'.dep_id','inner')
		->where($this->tableAcm.".acm_iSta",1)
		->where($this->tableAcm.".acm_iHos ",0)
		->get($this->tableAcm)->result();
	}
	
	
	public function liste_element_caisse($nb,$pageActuelle)
	{
		$articleParPage = $nb;
		$pageDepart = ($pageActuelle - 1)*$articleParPage;
		
		return $this->db
		->limit($articleParPage, $pageDepart)
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id='.$this->tableLac.'.uni_id','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id='.$this->tableUni.'.ser_id','inner')
		->join($this->tableDep, $this->tableDep.'.dep_id='.$this->tableSer.'.dep_id','inner')
		->where($this->tableAcm.".acm_iSta",1)
		->where($this->tableAcm.".acm_iHos ",0)
		->order_by($this->tableAcm.".acm_id", "desc")
		->get($this->tableAcm)->result();
	}
	
	
	
	
	public function liste_element_caisse_hos()
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','left')
		->join($this->tableUni, $this->tableUni.'.uni_id='.$this->tableLac.'.uni_id','left')
		->join($this->tableSer, $this->tableSer.'.ser_id='.$this->tableUni.'.ser_id','left')
		->join($this->tableDep, $this->tableDep.'.dep_id='.$this->tableSer.'.dep_id','left')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		// ->where($this->tableAcm.".lac_id !=",64)
		->where($this->tableAcm.".lac_id !=",64)/*pour ne pas comptabiliser le libellé Hospitalisation*/
		->where($this->tableAcm.".acm_iSta",1)
		->where($this->tableAcm.".acm_iHos ",1)
		->get($this->tableAcm)->result();
	}
	
	public function liste_facture_annulee2($id)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','left')
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where($this->tableFac.".per_id",$id)
		->where($this->tableFac.".fac_iSta",2)
		// ->where($this->tableFac.".fac_iStAnnul",0)
		->get($this->tableFac)->result();
	}	
	
	public function liste_facture_annulee3()
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','left')
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where($this->tableFac.".fac_iSta",2)
		// ->where($this->tableFac.".fac_iStAnnul",0)
		->get($this->tableFac)->result();
	}		
	
	public function liste_facture_annulee()
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','left')
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where($this->tableFac.".fac_iSta",2)
		->get($this->tableFac)->result();
	}	
	
	public function liste_facture()
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','left')
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->get($this->tableFac)->result();
	}
		
	public function liste_personnel_medic($id)
	{
		return $this->db
		// ->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableSer.'.ser_id ','inner')
		// ->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAft.'.uni_id ','inner')
		// ->join($this->tableAft, $this->tableAft.'.uni_id ='.$this->tableUni.'.uni_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableLac.'.uni_id ','inner')
		->where($this->tableLac.".lac_id",$id)
		->where($this->tableLac.".lac_iSta",1)
		->get($this->tableLac)->result();
	}	
	
	public function liste_facture_impaye()
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','left')
		->where($this->tableFac.".fac_iReste !=",0)
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where($this->tableFac.".fac_iSta",1)
		->get($this->tableFac)->result();
	}
		
	public function liste_facture_assure2($id)
	{		$statut = array(1, 2);
			return $this->db
			->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
			->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','inner')
			->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
			->where_in($this->tableFac.".fac_iSta",$statut)
			->where($this->tableFac.'.per_id', $id)/*io stesso*/
			// ->where($this->tableFac.".fac_iStAnnul",NULL)
			->get($this->tableFac)->result();
	}		
	
	public function liste_facture_assure_ticket($mvt, $debut, $fin)
	{		
			// $statut = array(1, 2);
			
			if($mvt == 0){
				return $this->db
				->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
				->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','inner')
				->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
				->where($this->tableFac.".fac_dDatePaie >=",$debut)
				->where($this->tableFac.".fac_dDatePaie <=",$fin)
				->where($this->tableFac.".fac_iSta",1)
				->get($this->tableFac)->result();		
			}else{
				return $this->db
				->select("ass_id, SUM(fac_iMontantAss) AS cumul")
				->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
				->where($this->tableFac.".fac_dDatePaie >=",$debut)
				->where($this->tableFac.".fac_dDatePaie <=",$fin)
				->where($this->tableFac.".ass_id !=",NULL)
				->where($this->tableFac.".fac_iSta",1)					
				->group_by("ass_id")
				->order_by("cumul","desc")
				->get($this->tableFac)->result();
			}
	}		
	
	
	public function liste_facture_assure3()
	{		$statut = array(1, 2);
			return $this->db
			->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
			->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','inner')
			->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
			->where_in($this->tableFac.".fac_iSta",$statut)
			// ->where($this->tableFac.".fac_iStAnnul",NULL)
			->get($this->tableFac)->result();
	}		
	
	
	public function liste_facture_assure($id=false)
	{
		if($id != false) {
			return $this->db
			->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
			->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','inner')
			->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
			->where($this->tableFac.".fac_iSta",1)
			->where($this->tableFac.'.per_id', $this->session->epiphanie_diab)/*io stesso*/
			->get($this->tableFac)->result();
		}
		
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->join($this->tableAss, $this->tableAss.'.ass_id ='.$this->tableFac.'.ass_id ','inner')
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where($this->tableFac.".fac_iSta",1)
		->get($this->tableFac)->result();
	}
			
	public function liste_facture_non_assure2($id)
	{
		$statut = array(1, 2);
		return $this->db
		->limit(100)
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->where($this->tableFac.".ass_id IS NULL")
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where_in($this->tableFac.".fac_iSta",$statut)
		// ->where($this->tableFac.".fac_iStAnnul",NULL)
		->where($this->tableFac.'.per_id', $id)/*io stesso*/
		->order_by($this->tableFac.".fac_id","desc")
		->get($this->tableFac)->result();
	}			
	
	public function liste_facture_non_assure3()
	{
		$statut = array(1, 2);
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->where($this->tableFac.".ass_id IS NULL")
		// ->where($this->tableFac.".fac_iStAnnul IS NULL")
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where_in($this->tableFac.".fac_iSta",$statut)
		// ->where($this->tableFac.".fac_iStAnnul",NULL)
		->get($this->tableFac)->result();
	}	

	
	public function liste_facture_non_assure($id=false)
	{
		if($id != false) {
			return $this->db
			->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
			->where($this->tableFac.".ass_id IS NULL")
			->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
			->where($this->tableFac.".fac_iSta",1)
			->where($this->tableFac.'.per_id', $this->session->epiphanie_diab)/*io stesso*/
			->get($this->tableFac)->result();
		}
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableFac.'.pat_id ','inner')
		->where($this->tableFac.".ass_id IS NULL")
		->where($this->tableFac.".fac_sObjet","Paiement des actes médicaux")
		->where($this->tableFac.".fac_iSta",1)
		->get($this->tableFac)->result();
	}
		
	public function recup_last_acte_medical()
	{
		return $this->db
		->order_by("acm_id","desc")
		->get($this->tableAcm)->row();
	}
	
	public function liste_element_caisse_ajax($id)
	{
		return $this->db
		->join($this->tableLac, $this->tableLac.'.lac_id='.$this->tableAcm.'.lac_id','inner')
		->where($this->tableAcm.'.acm_id',$id)
		->get($this->tableAcm)->row();
	}
	
	
	public function nb_patients()
	{
		return $this->db
					->where("pat_iSta",1)
					->get($this->tablePat)->result();
	}
	
	
	public function liste_patients($nb,$pageActuelle)
	{
		$articleParPage = $nb;
		$pageDepart = ($pageActuelle - 1)*$articleParPage;
		
		return $this->db
		->limit($articleParPage, $pageDepart)
		->order_by("pat_sNom","asc")
		->where("pat_iSta",1)
		->get($this->tablePat)->result();
	}

	// Récupérer tous les actes médicaux du patient dans le dossier médical
	public function liste_actes_medicaux_patient($id)
	{
		return $this->db

			->join($this->tableAcm . " acm", "acm.pat_id = pat.pat_id")
			->join($this->tableSea . " sea", "sea.acm_id = acm.acm_id")
			->join($this->tableLac . " lac", "lac.lac_id = acm.lac_id")
			->where("pat.pat_id", $id)
			->get($this->tablePat . " pat")->result();
	}
	
	public function liste_patient()
	{
		
		return $this->db
		->where("pat_iSta",1)
		->get($this->tablePat)->result();
	}
	
	public function liste_patients_decedes()
	{
		
		return $this->db
		->join($this->tableDec." dec", "dec.pat_id = pat.pat_id")
		->join($this->tableSea." sea", "sea.sea_id = dec.sea_id")
		->join($this->tableAcm." acm", "acm.acm_id = sea.acm_id")
		->join($this->tableLac." lac", "lac.lac_id = acm.lac_id")
		->join($this->tableUni." uni", "uni.uni_id = acm.uni_id")
		->join($this->tableSer." ser", "ser.ser_id = uni.ser_id")
		->where("pat.pat_iSta",0)
		->get($this->tablePat." pat")->result();
	}
	
	public function patient_decede($pat)
	{
		
		return $this->db
		->join($this->tableDec." dec", "dec.pat_id = pat.pat_id")
		->join($this->tableSea." sea", "sea.sea_id = dec.sea_id")
		->join($this->tableAcm." acm", "acm.acm_id = sea.acm_id")
		->join($this->tableLac." lac", "lac.lac_id = acm.lac_id")
		->join($this->tableUni." uni", "uni.uni_id = acm.uni_id")
		->join($this->tableSer." ser", "ser.ser_id = uni.ser_id")
		->where("pat.pat_id",$pat)
		->where("pat.pat_iSta",0)
		->get($this->tablePat." pat")->row();
	}
	
	public function patient_hospitalise($pat)
	{
		
		return $this->db
		->join($this->tableSea." sea", "sea.sea_id = hos.sea_id")
		->join($this->tableAcm." acm", "acm.acm_id = sea.acm_id")
		->join($this->tablePat." pat", "pat.pat_id = acm.pat_id")
		->where("pat.pat_id",$pat)
		->get($this->tableHos." hos")->row();
	}
	
	
	public function liste_patients_supprimes()
	{
		return $this->db
		->where("pat_iSta",2)
		->get($this->tablePat)->result();
	}
	
	
	// public function recup_patient($patId)
	// {
		// return $this->db
		// ->select("pat_id, pat_sNom, pat_sPrenom,pat_sSexe, pat_iSta, pat_sCivilite, pat_dDateNaiss, DATE_FORMAT(pat_dDateNaiss,'%W %d %M %Y') AS dateNaiss, pat_sAdresse, pat_sTel, pat_sSituationMat,pat_sNatio,pat_iFemme,pat_iEnfant, pat_sProfession, pat_dDateEnreg, pat_sAvatar,cpa_id, pat_sMatricule")
		// ->where("pat_id",$patId)
		// ->get($this->tablePat)->row();/*Ancienne fonction avec DATE_FORMAT*/
	// }	
	public function recup_patient($patId)
	{
		return $this->db
		->select("pat_id, pat_sNom, pat_sPrenom,pat_sSexe, pat_iSta, pat_sCivilite, pat_dDateNaiss, pat_sAdresse, pat_sTel, pat_sSituationMat,pat_sNatio,pat_iFemme,pat_iEnfant, pat_sProfession, pat_dDateEnreg, pat_sAvatar,cpa_id, pat_sMatricule, pat_sOtherPhone, pat_sAct")
		->where("pat_id",$patId)
		->get($this->tablePat)->row();/*Nouvelle fonction sans DATE_FORMAT*/
	}

	public function liste_antecedant($patId)
	{
		return $this->db
		->where("pat_id",$patId)
		->where("ant_iSta",1)
		->get($this->tableAnt)->result();
	}
	
	public function verif_antecedents($lib,$type,$patId)
	{
		return $this->db
		->where("ant_sLibelle",$lib)
		->where("ant_sType",$type)
		->where("pat_id",$patId)
		->where("ant_iSta",1)
		->get($this->tableAnt)->result();
	}
	
	public function verif_allergies($lib,$type,$patId)
	{
		return $this->db
		->where("all_sLibelle",$lib)
		->where("tal_id",$type)
		->where("pat_id",$patId)
		->where("all_iSta",1)
		->get($this->tableAll)->result();
	}
	
	public function liste_un_antecedant($patId)
	{
		return $this->db
		->limit(1)
		->where("pat_id",$patId)
		->where("ant_iSta",1)
		->get($this->tableAnt)->row();
	}

	public function liste_contacts($patId)
	{
		return $this->db
		->where("pat_id",$patId)
		->where("pec_iSta",1)
		->get($this->tablePec)->result();
	}

	
	public function verif_tel($tel)
	{
		return $this->db
		->where("pat_sTel",$tel)
		->get($this->tablePat)->row();
	}
	
	
	public function verif_tel_edit($tel,$id)
	{
		return $this->db
		->where("pat_sTel",$tel)
		->where("pat_id !=",$id)
		->get($this->tablePat)->row();
	}
	
	
	public function ajout_engagement_a_payer($data){
		$this->db->insert($this->tableEnp,$data);
		return $this->db->order_by("enp_id","desc")->get($this->tableEnp)->row();
	}
	
	
	public function engagement_a_payer(){
		return $this->db->get($this->tableEnp)->result();
	}
	
	public function recup_engagement_a_payer($id){
		return $this->db->where("enp_id",$id)->get($this->tableEnp)->row();
	}
	
	public function ajout_certificat_repos($data){
		$this->db->insert($this->tableCer,$data);
		return $this->db->order_by("cer_id","desc")->get($this->tableCer)->row();
	}
	
	
	public function certificat_repos(){
		return $this->db->get($this->tableCer)->result();
	}
	
	public function recup_certificat_repos($id){
		return $this->db->where("cer_id",$id)->get($this->tableCer)->row();
	}
	
	public function ajout_depot_objet($data){
		$this->db->insert($this->tableDeo,$data);
		return $this->db->order_by("deo_id","desc")->get($this->tableDeo)->row();
	}
	
	
	public function depot_objet(){
		return $this->db->get($this->tableDeo)->result();
	}
	
	public function recup_depot_objet($id){
		return $this->db->where("deo_id",$id)->get($this->tableDeo)->row();
	}
	
	
	public function ajout_certificat_medical($data){
		$this->db->insert($this->tableCem,$data);
		return $this->db->order_by("cem_id","desc")->get($this->tableCem)->row();
	}
	
	
	public function certificat_medical(){
		return $this->db->get($this->tableCem)->result();
	}
	
	public function recup_certificat_medical($id){
		return $this->db->where("cem_id",$id)->get($this->tableCem)->row();
	}
	
	public function ajout_autorisation_operer($data){
		$this->db->insert($this->tableAup,$data);
		return $this->db->order_by("aup_id","desc")->get($this->tableAup)->row();
	}
	
	public function autorisation_operer(){
		return $this->db->get($this->tableAup)->result();
	}
	
	public function recup_autorisation_operer($id){
		return $this->db->where("aup_id",$id)->get($this->tableAup)->row();
	}
	
	
	public function ajout_autorisation_sortir($data){
		$this->db->insert($this->tableAus,$data);
		return $this->db->order_by("aus_id","desc")->get($this->tableAus)->row();
	}
	
	public function autorisation_sortir(){
		return $this->db->get($this->tableAus)->result();
	}
	
	public function recup_autorisation_sortir($id){
		return $this->db->where("aus_id",$id)->get($this->tableAus)->row();
	}
	
	
	public function ajout_patient($data){
		date_default_timezone_set('Africa/Brazzaville');
		$this->db->insert($this->tablePat,$data);
		$pat = $this->db->order_by("pat_id","desc")->get($this->tablePat)->row();
		if(strlen($pat->pat_id)==1){
			$matricule="PAT-00".$pat->pat_id."/".date("m-Y");
		}
		else if(strlen($pat->pat_id)==2){
			$matricule="PAT-0".$pat->pat_id."/".date("m-Y");
		}
		else{
			$matricule="PAT-".$pat->pat_id."/".date("m-Y");
		}
		
		$this->db->where("pat_id",$pat->pat_id)->update($this->tablePat,array("pat_sMatricule"=>$matricule));
		return $pat->pat_id;
	}
	
	public function ajout_antecedents($data){
		return $this->db->insert($this->tableAnt,$data);
	}
	
	public function ajout_prise_en_charge($data){
		return $this->db->insert($this->tablePch,$data);
	}
		
	public function renseignement_prise_en_charge($id)
	{
		return $this->db
		->join($this->tableHos, $this->tableHos.'.hos_id ='.$this->tablePch.'.hos_id ','inner')
		->join($this->tableAcm, $this->tableHos.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableLac, $this->tableAcm.'.lac_id ='.$this->tableLac.'.lac_id ','inner')
		->where($this->tablePch.".pat_id",$id)
		->order_by($this->tablePch.".pch_id","desc")
		->get($this->tablePch)->result();
	}	
	
	public function ajout_allergies($data){
		return $this->db->insert($this->tableAll,$data);
	}
		
	public function ajout_personnes_contact($data){
		return $this->db->insert($this->tablePec,$data);
	}
	
	public function maj_facture($data,$id){
		return $this->db->where("fac_id",$id)->update($this->tableFac,$data);
	}	
	
	public function maj_facture2($data,$numfac){
		return $this->db
		->where("fac_iSta",1)
		->where("fac_sObjet",'6')
		->where("fac_sNumero",$numfac)
		->update($this->tableFac,$data);
	}
	
	public function maj_facture3($data){
		return $this->db
		->where("fac_iSta",3)
		->where("fac_sObjet",'6')
		->update($this->tableFac,$data);
	}
	
		
	public function maj_facture4($data,$id){
		return $this->db
		->where("fac_iSta",1)
		->where("fac_sObjet",'6')
		->where("per_id",$id)
		->update($this->tableFac,$data);
	}
	
	
	public function maj_hospitalisation($data,$id){
		return $this->db->where("hos_id",$id)->update($this->tableHos,$data);
	}
	
	public function maj_facture_assurance($data,$id){
		return $this->db->where("ass_id",$id)->update($this->tableFac,$data);
	}
		
	public function maj_actes_caisse($data,$id){
		return $this->db->where("acm_id",$id)->update($this->tableAcm,$data);
	}
		
	public function maj_patient($data,$id){
		return $this->db->where("pat_id",$id)->update($this->tablePat,$data);
	}
	
		
	public function maj_acte_medical_imagerie($data,$id){
		return $this->db->where("aci_id",$id)->update($this->tableAci,$data);
	}
	
		
	public function maj_acte_medical_cardiologie($data,$id){
		return $this->db->where("aca_id",$id)->update($this->tableAca,$data);
	}
	
	
		
	public function maj_acte_medical_exploration($data,$id){
		return $this->db->where("aef_id",$id)->update($this->tableAef,$data);
	}
	
	
	public function insert_image_imagerie($data){
		return $this->db->insert($this->tableIai,$data);
	}
		
	public function ajout_prescription_hospitalisation($data){
		$this->db->insert($this->tableHos,$data);
		$recup = $this->db->order_by("hos_id","desc")->get($this->tableHos)->row();
		return $recup;
	}
	
	public function ajout_orientation($data){
		return $this->db->insert($this->tableAcm,$data);
	}
	
	public function ajout_elements_facture($data){
		return $this->db->insert($this->tableElf,$data);
	}
		
	public function ajout_constante($data){
		return $this->db->insert($this->tableCon,$data);
	}
		
	public function ajout_information($data){
		return $this->db->insert($this->tableInc,$data);
	}
		
	public function ajout_consultation($data){
		return $this->db->insert($this->tableCsl,$data);
	}
		
	public function ajout_sejour_acm($data){
		$this->db->insert($this->tableSea,$data);
		$recup = $this->db->order_by("sea_id","desc")->get($this->tableSea)->row();
		return $recup;
	}
			
	public function ajout_imagerie($data){
		$this->db->insert($this->tableImg,$data);
		$recup = $this->db->order_by("img_id","desc")->get($this->tableImg)->row();
		return $recup;
	}
				
	public function ajout_exploration($data){
		$this->db->insert($this->tableEfc,$data);
		$recup = $this->db->order_by("efc_id","desc")->get($this->tableEfc)->row();
		return $recup;
	}
				
	public function ajout_laboratoire($data){
		$this->db->insert($this->tableLab,$data);
		$recup = $this->db->order_by("lab_id","desc")->get($this->tableLab)->row();
		return $recup;
	}
				
	public function ajout_cardiologie($data){
		$this->db->insert($this->tableCar,$data);
		$recup = $this->db->order_by("car_id","desc")->get($this->tableCar)->row();
		return $recup;
	}
		
	public function ajout_ordonnance($data){
		$this->db->insert($this->tableOrd,$data);
		$recup = $this->db->order_by("ord_id","desc")->get($this->tableOrd)->row();
		return $recup;
	}
	
	public function ajout_facture($data){
		$this->db->insert($this->tableFac,$data);
		$fac = $this->db->order_by("fac_id","desc")->get($this->tableFac)->row();
		if($fac->fac_sObjet!="6"){
				if(strlen($fac->fac_id)==1){
					$numero="FAC-00".$fac->fac_id."/".date("m-Y");
				}
				else if(strlen($fac->fac_id)==2){
					$numero="FAC-0".$fac->fac_id."/".date("m-Y");
				}
				else{
					$numero="FAC-".$fac->fac_id."/".date("m-Y");
				}
				$this->db->where("fac_id",$fac->fac_id)->update($this->tableFac,array("fac_sNumero "=>$numero));
				return $fac->fac_id;
			}
	}
	
	
	
		
	public function verif_element_ordonnance($ord,$med,$qte,$duree,$pos,$renew,$freq)
	{
		return $this->db
		->where("ord_id",$ord)
		->where("elo_sProduit",$med)
		->where("elo_iQuantite",$qte)
		->where("elo_iDuree",$duree)
		->where("elo_sPosologie",$pos)
		->where("elo_sRenew",$renew)
		->where("elo_sFreq",$freq)
		->get($this->tableElo)->row();
	}
	
	public function ajout_element_ordonnance($data){
		return $this->db->insert($this->tableElo,$data);
	}
	
	public function ajout_prescription_soins($data){
		return $this->db->insert($this->tableSoi,$data);
	}
	
	public function ajout_prescription_imagerie($data){
		return $this->db->insert($this->tableAci,$data);
	}
		
	public function ajout_prescription_exploration($data){
		return $this->db->insert($this->tableAef,$data);
	}
		
	public function ajout_prescription_laboratoire($data){
		return $this->db->insert($this->tableAla,$data);
	}
		
	public function ajout_prescription_cardiologie($data){
		return $this->db->insert($this->tableAca,$data);
	}
	
	
	public function montant($debut,$fin){
		if($debut === NULL){
			return $this->db
					->select("SUM(fac_iMontant) AS montant, SUM(fac_iMontantPaye) AS paye, SUM(fac_iMontantAss) AS assurance, SUM(fac_iReste) AS reste, SUM(fac_iMontantReduc) AS perte")
					->where("fac_dDatePaie <=",$fin)
					->where("fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->get($this->tableFac)->row();
		}
		return $this->db
					->select("SUM(fac_iMontant) AS montant, SUM(fac_iMontantPaye) AS paye, SUM(fac_iMontantAss) AS assurance, SUM(fac_iReste) AS reste, SUM(fac_iMontantReduc) AS perte")
					->where("fac_dDatePaie >=",$debut)
					->where("fac_dDatePaie <=",$fin)
					->where("fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->get($this->tableFac)->row();
	}
	

	public function montant_assurance($debut,$fin,$situation){
		if($debut!==null){
			return $this->db
					->select("SUM(fac.fac_iMontantAss) AS mtAssurance, ass.ass_sLibelle, ass.ass_id")
					->join($this->tableAss." ass","ass.ass_id=fac.ass_id")
					->where("fac.fac_iMontantAss !=",0)
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->group_by("ass.ass_sLibelle")/*Ajout*/
					->group_by("ass.ass_id")/*Ajout*/
					->group_by("fac.ass_id")
					->order_by("ass.ass_sLibelle","asc")
					->get($this->tableFac." fac")->result();
		}		
		return $this->db
					->select("SUM(fac.fac_iMontantAss) AS mtAssurance, ass.ass_sLibelle, ass.ass_id")
					->join($this->tableAss." ass","ass.ass_id=fac.ass_id")
					->where("fac.fac_iMontantAss !=",0)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->group_by("ass.ass_sLibelle")/*Ajout*/
					->group_by("ass.ass_id")/*Ajout*/
					->group_by("fac.ass_id")
					->order_by("ass.ass_sLibelle","asc")
					->get($this->tableFac." fac")->result();
	}


	public function montant_patient($debut,$fin){
		if($debut === NULL) {
			return $this->db
					->select("SUM(fac.fac_iReste) AS dette, pat.pat_sNom, pat.pat_sPrenom, pat.pat_sMatricule, pat.pat_id")
					->join($this->tablePat." pat","pat.pat_id=fac.pat_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac.fac_iReste >",0)
					->where("fac_iSta",1)
					->group_by("pat.pat_sNom")/*Ajout*/
					->group_by("pat.pat_sPrenom")/*Ajout*/
					->group_by("pat.pat_sMatricule")/*Ajout*/
					->group_by("pat.pat_id")/*Ajout*/
					->group_by("fac.pat_id")
					->order_by("pat.pat_sNom","asc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(fac.fac_iReste) AS dette, pat.pat_sNom, pat.pat_sPrenom, pat.pat_sMatricule, pat.pat_id")
					->join($this->tablePat." pat","pat.pat_id=fac.pat_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac.fac_iReste >",0)
					->where("fac_iSta",1)
					->group_by("pat.pat_sNom")/*Ajout*/
					->group_by("pat.pat_sPrenom")/*Ajout*/
					->group_by("pat.pat_sMatricule")/*Ajout*/
					->group_by("pat.pat_id")/*Ajout*/
					->group_by("fac.pat_id")
					->order_by("pat.pat_sNom","asc")
					->get($this->tableFac." fac")->result();
	}

	
	public function montant_service($debut,$fin){
		if($debut === NULL){
			return $this->db
					->select("SUM(elf.elf_iCout) AS montant, ser.ser_sLibelle, ser.ser_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableSer." ser","ser.ser_id=uni.ser_id")
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->group_by("ser.ser_sLibelle")/*Ajout*/
					->group_by("ser.ser_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
		}
		return $this->db
					->select("SUM(elf.elf_iCout) AS montant, ser.ser_sLibelle, ser.ser_id")
					->join($this->tableElf." elf","elf.fac_id=fac.fac_id")
					->join($this->tableAcm." acm","acm.acm_id=elf.acm_id")
					->join($this->tableUni." uni","uni.uni_id=acm.uni_id")
					->join($this->tableSer." ser","ser.ser_id=uni.ser_id")
					->where("fac.fac_dDatePaie >=",$debut)
					->where("fac.fac_dDatePaie <=",$fin)
					->where("fac.fac_sObjet","Paiement des actes médicaux")
					->where("fac_iSta",1)
					->group_by("ser.ser_sLibelle")/*Ajout*/
					->group_by("ser.ser_id")
					->order_by("montant","desc")
					->get($this->tableFac." fac")->result();
	}
	
	
	public function ajout_echoa($data){
		return $this->db->insert($this->tableGoa,$data);
	}
	
	public function ajout_echob($data){
		return $this->db->insert($this->tableGob,$data);
	}
	
	public function ajout_echoc($data){
		return $this->db->insert($this->tableGoc,$data);
	}
	
	public function ajout_echod($data){
		return $this->db->insert($this->tableGod,$data);
	}
	
	
	public function ajout_echoe($data){
		return $this->db->insert($this->tableGoe,$data);
	}
	
	public function gyneco_a($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableGoa.'.sea_id ','inner')
		->where($this->tableGoa.".sea_id",$id)
		->order_by($this->tableGoa.".goa_id","desc")
		->get($this->tableGoa)->row();
	}			
	
	public function gyneco_b($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableGob.'.sea_id ','inner')
		->where($this->tableGob.".sea_id",$id)
		->order_by($this->tableGob.".gob_id","desc")
		->get($this->tableGob)->row();
	}			
	
	public function gyneco_c($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableGoc.'.sea_id ','inner')
		->where($this->tableGoc.".sea_id",$id)
		->order_by($this->tableGoc.".goc_id","desc")
		->get($this->tableGoc)->row();
	}			
	
	public function gyneco_d($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableGod.'.sea_id ','inner')
		->where($this->tableGod.".sea_id",$id)
		->order_by($this->tableGod.".god_id","desc")
		->get($this->tableGod)->row();
	}			
	
	public function gyneco_e($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableGoe.'.sea_id ','inner')
		->where($this->tableGoe.".sea_id",$id)
		->order_by($this->tableGoe.".goe_id","desc")
		->get($this->tableGoe)->row();
	}

	// Récupérer échographie < 12SA dans le dossier médical
	public function gyneco_a_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableGoa . '.sea_id ', 'inner')
			->where($this->tableGoa . ".sea_id", $id)
			->order_by($this->tableGoa . ".goa_id", "desc")
			->get($this->tableGoa)->result();
	}

	// Récupérer échographie 1er trimestre dans le dossier médical
	public function gyneco_b_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableGob . '.sea_id ', 'inner')
			->where($this->tableGob . ".sea_id", $id)
			->order_by($this->tableGob . ".gob_id", "desc")
			->get($this->tableGob)->result();
	}

	// Récupérer échographie 2ème trimestre dans le dossier médical
	public function gyneco_c_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableGoc . '.sea_id ', 'inner')
			->where($this->tableGoc . ".sea_id", $id)
			->order_by($this->tableGoc . ".goc_id", "desc")
			->get($this->tableGoc)->result();
	}

	// Récupérer échographie 3ème trimestre dans le dossier médical
	public function gyneco_d_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableGod . '.sea_id ', 'inner')
			->where($this->tableGod . ".sea_id", $id)
			->order_by($this->tableGod . ".god_id", "desc")
			->get($this->tableGod)->result();
	}

	// Récupérer issue de grossesse dans le dossier médical
	public function gyneco_e_dossier_medical($id)
	{
		return $this->db
			->join($this->tableSea, $this->tableSea . '.sea_id =' . $this->tableGoe . '.sea_id ', 'inner')
			->where($this->tableGoe . ".sea_id", $id)
			// ->order_by($this->tableGoe.".goe_id","desc")
			->get($this->tableGoe)->result();
	}
	
	/**
	 * @param $id: identifiant de la specification maladie
	 * @return int 
	 */
	 
	public function rapport_maladie_1_a_49_cas_femme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		// ->where($this->tableRed.".red_dDate >=", $date1)
		// ->where($this->tableRed.".red_dDate <=", $date2)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_1_a_49($id,$datedepart,$depart,$sexe)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", $sexe)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}
	
	public function rapport_maladie_1_a_49_cas_homme($id,$datedepart,$depart)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		// ->where($this->tableRed.".red_dDate >=", $date1)
		// ->where($this->tableRed.".red_dDate <=", $date2)
		->get($this->tableRed)->row();
	}	
	
	public function rapport_maladie_1_a_49_deces_femme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta ",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		// ->where($this->tableRed.".red_dDate >=", $date1)
		// ->where($this->tableRed.".red_dDate <=", $date2)
		->get($this->tableRed)->row();
	}	
	
	public function rapport_maladie_1_a_49_deces_homme($id,$datedepart,$depart)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta ",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		// ->where($this->tableRed.".red_dDate >=", $date1)
		// ->where($this->tableRed.".red_dDate <=", $date2)
		->get($this->tableRed)->row();
	}
	 
	public function liste_maladie_retenue($dateDepart,$dateFinal)
	{
		return $this->db
		// ->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.sma_id ', 'inner')
		->where("red_dDate >=", $dateDepart)
		->where("red_dDate <=", $dateFinal)
		->where("sma_iSta",1)
		//->where("redDate <=", $dateFinal)
		->group_by($this->tableSma.".sma_sLibelle","asc")
		->get($this->tableRed)->result();
	}
	
	
	 
	public function rapport_maladie_moin_1_cas_femme($id,$datedepart)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_moin_1($id,$datedepart,$sexe)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", $sexe)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_moin_1_cas_homme($id, $datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_moin_1_deces_femme($id,$datedepart)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta", 0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_moin_1_deces_homme($id,$datedepart)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta", 0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_1_a_4_cas_femme($id,$datedepart,$depart)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_1_a_4_cas_homme($id, $datedepart,$depart)
	{

		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_1_a_4_deces_femme($id, $datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta ",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_1_a_4_deces_homme($id, $datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta ",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_5_a_14_cas_femme($id, $datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_5_a_14_cas_homme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_5_a_14_deces_femme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta ",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_5_a_14_deces_homme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta ",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_15_a_49_cas_femme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_15_a_49_cas_homme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_15_a_49_deces_femme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta ",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_15_a_49_deces_homme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta ",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_nouveau($id,$dateDebut,$dateFin)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tableRed.".red_dDate >=", $dateDebut)
		->where($this->tableRed.".red_dDate <=", $dateFin)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_ancien($id,$dateDebut)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tableRed.".red_dDate <", $dateDebut)
		->get($this->tableRed)->row();
	}
	
	public function rapport_maladie_50_et_plus($id,$datedepart,$sexe)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", $sexe)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_50_et_plus_cas_femme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_50_et_plus_cas_homme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		// ->where($this->$this->tableRed.".red_dDate >=", $date1)
		// ->where($this->$this->tableRed.".red_dDate <=", $date2)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_50_et_plus_deces_femme($id)
	{
		return $this->db
		->select("COUNT(".$this->tableRed.".red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta", "2")
		->where($this->md_config->ageAnnee($this->tablePat.".pat_dDateNaiss")." >=", "50")
		->get($this->tableRed)->row();
	}

	public function rapport_maladie_50_et_plus_deces_homme($id)
	{
		return $this->db
		->select("COUNT(".$this->tableRed.".red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta", "2")
		->where($this->md_config->ageAnnee($this->tablePat.".pat_dDateNaiss")." >=", "50")
		->get($this->tableRed)->row();
	}

	/*----------- Rapport Hospitalisation ---------------------*/

	public function repartition_malades_hospitalise_moins_1_cas_homme($id,$datedepart)
	{

		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_moins_1_cas_femme($id,$datedepart)
	{

		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_moins_1_deces_homme($id,$datedepart)
	{

		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_moins_1_deces_femme($id,$datedepart)
	{

		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableHos)->row();
	}

	
	public function repartition_malades_hospitalise_1_a_49_cas_homme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_1_a_49_cas_femme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_1_a_49_deces_homme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_1_a_49_deces_femme($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_50_et_plus_cas_homme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_50_et_plus_cas_femme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_50_et_plus_deces_homme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "H")
		->where($this->tablePat.".pat_iSta",0)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableHos)->row();
	}

	public function repartition_malades_hospitalise_50_et_plus_deces_femme($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->where($this->tableHos.".hos_sMotif", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iSta",0)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableHos)->row();
	}
	
	/*----------- CSI à PMAE ET HOPITAUX DE BASE -------------*/
	public function nombre_lit_medecine()
	{

		return $this->db
		->select("COUNT($this->tableLit.lit_id) AS nb")
		->join($this->tableCha, $this->tableCha.'.cha_id = '.$this->tableLit.'.cha_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableCha.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 31)
		//->where($this->tablePat.".pat_sSexe", "H")
		->get($this->tableLit)->row();
	}

	public function nombre_lit_pediatrie()
	{

		return $this->db
		->select("COUNT($this->tableLit.lit_id) AS nb")
		->join($this->tableCha, $this->tableCha.'.cha_id = '.$this->tableLit.'.cha_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableCha.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 33)
		//->where($this->tablePat.".pat_sSexe", "H")
		->get($this->tableLit)->row();
	}

	public function nombre_lit_chirurgie()
	{

		return $this->db
		->select("COUNT($this->tableLit.lit_id) AS nb")
		->join($this->tableCha, $this->tableCha.'.cha_id = '.$this->tableLit.'.cha_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableCha.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 22)
		//->where($this->tablePat.".pat_sSexe", "H")
		->get($this->tableLit)->row();
	}

	public function nombre_lit_maternite()
	{

		return $this->db
		->select("COUNT($this->tableLit.lit_id) AS nb")
		->join($this->tableCha, $this->tableCha.'.cha_id = '.$this->tableLit.'.cha_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableCha.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 36)
		//->where($this->tablePat.".pat_sSexe", "H")
		->get($this->tableLit)->row();
	}

	public function nombre_nouveau_malade_medecine($date)
	{

		return $this->db
		->select("COUNT($this->tablePat.pat_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 31)
		->where($this->tablePat.".pat_dDateEnreg", $date)
		//->group_by($this->tablePat.".pat_id")
		->get($this->tableAcm)->row();
	}

	public function nombre_cas_medecine($motif)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 31)
		->where($this->tableHos.".hos_sMotif", $motif)
		->get($this->tableHos)->row();
	}

	public function nombre_cas_pediatrie($motif)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 33)
		->where($this->tableHos.".hos_sMotif", $motif)
		->get($this->tableHos)->row();
	}

	public function nombre_cas_chirurgie($motif)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 22)
		->where($this->tableHos.".hos_sMotif", $motif)
		->get($this->tableHos)->row();
	}

	public function nombre_cas_maternite($motif)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 36)
		->where($this->tableHos.".hos_sMotif", $motif)
		->get($this->tableHos)->row();
	}

	public function nombre_nouveau_malade_pediatrie($date)
	{

		return $this->db
		->select("COUNT($this->tablePat.pat_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 33)
		->where($this->tablePat.".pat_dDateEnreg", $date)
		//->group_by($this->tablePat.".pat_id")
		->get($this->tableAcm)->row();
	}

	public function nombre_nouveau_malade_chirurgie($date)
	{

		return $this->db
		->select("COUNT($this->tablePat.pat_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 22)
		->where($this->tablePat.".pat_dDateEnreg", $date)
		//->group_by($this->tablePat.".pat_id")
		->get($this->tableAcm)->row();
	}
	
	public function nombre_nouveau_malade_maternite($date)
	{
		return $this->db
		->select("COUNT($this->tablePat.pat_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableAcm.'.pat_id ', 'inner')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableSer.".ser_id", 36)
		->where($this->tablePat.".pat_dDateEnreg", $date)
		//->group_by($this->tablePat.".pat_id")
		->get($this->tableAcm)->row();
	}

	public function nb_malade_opore($id,$dateDepart,$dateFinal)
	{
		return $this->db
		->select("COUNT($this->tablePop.pop_id) AS nb ")
		->where($this->tablePop.".lac_id",$id)
		->where($this->tablePop.".pop_dDate >=",$dateDepart)
		->where($this->tablePop.".pop_dDate <=",$dateFinal)
		->get($this->tablePop)->row();
	}

	public function nb_deces_chirurgie($id,$dateDepart,$dateFinal)
	{
		return $this->db
		->select("COUNT($this->tableDec.dec_id) AS nb ")
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableDec.'.uni_id ', 'inner')
		->join($this->tableSea, $this->tableSea.'.sea_id = '.$this->tableDec.'.sea_id ', 'inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableSea.'.acm_id ', 'inner')
		->join($this->tableLac, $this->tableLac.'.lac_id = '.$this->tableAcm.'.lac_id ', 'inner')
		->where($this->tableLac.".lac_id",$id)
		->where($this->tableDec.".dec_dDateDeces >=",$dateDepart)
		->where($this->tableDec.".dec_dDateDeces <=",$dateFinal)
		->get($this->tableDec)->row();
	}

	public function nb_examen_laboratoire($id,$dateDepart,$dateFinal)
	{
		return $this->db
		->select("COUNT($this->tableLab.lab_id) AS nb ")
		->join($this->tableSea, $this->tableSea.'.sea_id='.$this->tableLab.'.sea_id','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id='.$this->tableSea.'.acm_id','inner')
		->where($this->tableAcm.".lac_id",$id)
		->where($this->tableLab.".lab_dDate >=",$dateDepart)
		->where($this->tableLab.".lab_dDate <=",$dateFinal)
		//->where($this->tableSer.".ser_id",25)
		//->order_by($this->tableLac.".lac_sLibelle","asc")
		->get($this->tableLab)->row();
	}

	public function nombre_malade_sortie($id,$motif)
	{
		return $this->db
		->select("COUNT($this->tableHos.hos_id) AS nb")
		->join($this->tableAcm, $this->tableAcm.'.acm_id = '.$this->tableHos.'.acm_id ', 'left')
		->join($this->tableUni, $this->tableUni.'.uni_id = '.$this->tableAcm.'.uni_id ', 'inner')
		->join($this->tableSer, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tableHos.".hos_iSta", 2)
		->where($this->tableSer.".ser_id", $id)
		->where($this->tableHos.".hos_sMotif", $motif)
		->get($this->tableHos)->row();
	}

	/*============ 2.6 Consultation femmes enceintes malades =============*/

	public function rapport_femme_enceinte_malade_moins_15($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iFemme", 1)
		//->where($this->tablePat.".pat_iMois <", $nbMois)
		->where($this->tablePat.".pat_iSta !=",0)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", date('Y-m-d'))
		->get($this->tableRed)->row();
	}

	public function rapport_femme_enceinte_malade_15_35($id,$datedepart,$depart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iFemme", 1)
		->where($this->tablePat.".pat_iSta !=",0)
		//->where($this->tablePat.".pat_iMois <", $nbMois)
		->where($this->tablePat.".pat_dDateNaiss >=", $datedepart)
		->where($this->tablePat.".pat_dDateNaiss <", $depart)
		->get($this->tableRed)->row();
	}

	public function rapport_femme_enceinte_malade_63_et_plus($id,$datedepart)
	{
		return $this->db
		->select("COUNT($this->tableRed.red_id) AS nb")
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableRed.'.pat_id ', 'inner')
		//->join($this->tableSma, $this->tableSma.'.sma_id = '.$this->tableRed.'.pat_id ', 'inner')
		->where($this->tableRed.".sma_id", $id)
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iFemme", 1)
		->where($this->tablePat.".pat_iSta !=",0)
		//->where($this->tablePat.".pat_iMois <", $nbMois)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableRed)->row();
	}

	/*======= MORTALITE MATERNELLE ========*/
	public function liste_cause_deces_maternelle($id,$datedepart)
	{
		return $this->db
		->join($this->tablePat, $this->tablePat.'.pat_id = '.$this->tableDec.'.pat_id ', 'inner')
		->join($this->tableSma, $this->tableUni.'.uni_id = '.$this->tableDec.'.uni_id ', 'inner')
		->join($this->tableSma, $this->tableSer.'.ser_id = '.$this->tableUni.'.ser_id ', 'inner')
		->where($this->tablePat.".pat_sSexe", "F")
		->where($this->tablePat.".pat_iFemme", 1)
		->where($this->tablePat.".pat_iSta =",0)
		//->where($this->tablePat.".pat_iMois <", $nbMois)
		->where($this->tablePat.".pat_dDateNaiss <=", $datedepart)
		->get($this->tableDec)->row();
	}
	
	
	public function liste_hospitalisation1($dateDepart,$dateFinal)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableHos.'.sea_id ','left')
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','left')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		// ->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		// ->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".hos_dDate >=", $dateDepart)
		->where($this->tableHos.".hos_dDate <=", $dateFinal)
		->group_by("hos_sMotif")
		->order_by($this->tableHos.".hos_dDate","desc")
		->get($this->tableHos)->result();
	}
	
	
	/*
		Fabrice
	*/
	
		// Récupérer la déclaration de décès dans le dossier médical
	public function cas_deces_dossier_medical($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableDec.'.sea_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableSea.'.acm_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableAcm.'.uni_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableDec.".pat_id",$id)
		// ->order_by($this->tableDec.".dec_id","desc")
		->get($this->tableDec)->row();
	}
	
	public function patient_conventionne($id)
	{
		return $this->db
		->where($this->tableCpa.".cpa_id", $id)
		->get($this->tableCpa)->row();
	}
	
	// Récupérer le journal du patient après hospitalisation
	public function journal_hospitalisation($id)
	{
		return $this->db
		->join($this->tableSea, $this->tableSea.'.sea_id ='.$this->tableHos.'.sea_id ','inner')
		->join($this->tableLit, $this->tableLit.'.lit_id ='.$this->tableHos.'.lit_id ','inner')
		->join($this->tableCha, $this->tableCha.'.cha_id ='.$this->tableLit.'.cha_id ','inner')
		->join($this->tableUni, $this->tableUni.'.uni_id ='.$this->tableCha.'.uni_id ','inner')
		->join($this->tableSer, $this->tableSer.'.ser_id ='.$this->tableUni.'.ser_id ','inner')
		->join($this->tableAcm, $this->tableAcm.'.acm_id ='.$this->tableHos.'.acm_id ','inner')
		->join($this->tableElf, $this->tableElf.'.acm_id ='.$this->tableAcm.'.acm_id ','inner')
		->join($this->tableFac, $this->tableElf.'.fac_id ='.$this->tableFac.'.fac_id ','inner')
		->join($this->tablePat, $this->tablePat.'.pat_id ='.$this->tableAcm.'.pat_id ','inner')
		->join($this->tableLac, $this->tableLac.'.lac_id ='.$this->tableAcm.'.lac_id ','inner')
		->where($this->tableHos.".hos_id", $id)
		->order_by($this->tableHos.".hos_dDate","desc")
		->get($this->tableHos)->row();
	}


}
