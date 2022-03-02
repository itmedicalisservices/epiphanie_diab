<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gynecologie_obstetrique extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('app/gynecologie_obstetrique/page-liste-consultation');
	}
	
	public function consultation_avis($id, $avs)
	{
		$donneesAcm = array("acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/gynecologie_obstetrique/page-consultation',array("acm_id"=>$id,"avs"=>$avs));
	}
	
	public function demande_avis()
	{
		$this->load->view('app/gynecologie_obstetrique/page-liste-avis');
	}
	
	public function mes_patients()
	{
		$this->load->view('app/gynecologie_obstetrique/page-mes-patients');
	}
	
	public function hostirique_de_mes_patients()
	{
		$this->load->view('app/gynecologie_obstetrique/page-dossiers-patients');
	}
	
	public function hostorique_actes()
	{
		$this->load->view('app/gynecologie_obstetrique/page-hostorique-patients');
	}
	
	public function faire($id)
	{
		$donneesAcm = array("per_id"=>$this->session->epiphanie_diab,"acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/gynecologie_obstetrique/page-consultation',array("acm_id"=>$id));
	}
	
	public function voir($id)
	{
		$this->load->view('app/gynecologie_obstetrique/page-rapport-consultation',array("acm_id"=>$id));
	}
	
	public function echograohieA()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/fichiers/termeEcho11Semaines/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
		$nomFichier= time()."-".$_FILES["terme"]["name"];
		$config["file_name"] = $nomFichier; 
		$this->load->library('upload',$config);
								
		if($this->upload->do_upload("terme")){
			$image=$this->upload->data();
			$data["terme"]="assets/fichiers/termeEcho11Semaines/".$image['file_name'];
		}
		else{
			$data["terme"]="assets/fichiers/termeEcho11Semaines/inconnu.jpg";
		}
	
		$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
		if(!$verif){
			$donneesSejour = array(
				"acm_id"=>$data["id"],
				"sea_dDate"=>date("Y-m-d")
			);
			$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
		}
		else{
			$sejour = $verif;
		}
		
			$duree = 365;
			
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$duree." days");
			$expiration = date("Y-m-d H:i:s",$maDate). "\n";
			
			$maDatedelai = strtotime($aujourdhui."+ 2 days");
			$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
			$donnees = array(
				"acm_iSta "=>1,
				"pat_id"=>$data["pat"],
				"acm_dDate"=>$aujourdhui,
				"acm_dDateDelai"=>$delai,
				"acm_dDateExp"=>$expiration,
				"acm_sStatut "=>"en attente"                                                                                  
			);
			$insert = $this->md_patient->ajout_orientation($donnees);
			if($insert){

		
				$echoa = array(
					"goa_iSta"=>1,
					"sea_id"=>$sejour->sea_id,
					"pat_id"=>$data["pat"],
					"goa_sIndication"=>$data["indication"],
					"goa_sVoie"=>$data["voie"],
					"goa_sCondition"=>$data["condition"],
					"goa_iNEmbre"=>$data["nbre_embryon"],
					"goa_sTypeGross"=>$data["type_grossesse"],
					"goa_sMembrane"=>$data["membrane"],
					"goa_sVisibilite"=>$data["visibilite"],
					"goa_iLcc"=>$data["lcc"],
					"goa_sTerm"=>$data["terme"],
					"goa_iBip"=>$data["bip"],
					"goa_sActCard"=>$data["act_cardiaque"],
					"goa_iRcf"=>$data["rcf"],
					"goa_sMorphoExt"=>$data["morpho_ext"],
					"goa_sMorphoMemb"=>$data["morpho_memb"],
					"goa_sLocalisation"=>$data["localisation"],
					"goa_sToniocite"=>$data["tonicite"],
					"goa_sTrophoblaste"=>$data["trophoblaste"],
					"goa_iDiametre"=>$data["diametre"],
					"goa_sDecollement"=>$data["decollement"],
					"goa_iOvDroit"=>$data["taille_ov_droit"],
					"goa_sOvDroitAspect"=>ucfirst(trim($data["aspect_ov_droit"])),
					"goa_iOvGauche"=>$data["taille_ov_gauche"],
					"goa_sOvGaucheAspect"=>ucfirst(trim($data["aspect_ov_gauche"])),
					"goa_sOvGaucheAspect"=>$data["conclusion"],
					"goa_dEnreg"=>date("Y-m-d H:i:s"),
					"per_id"=>$this->session->epiphanie_diab
			);
			$insertEchoa = $this->md_patient->ajout_echoa($echoa);
			echo $data["pat"];
	        }
			
	
	}
	
	public function echograohieB()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/fichiers/termeEcho1erTrim/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
		$nomFichier= time()."-".$_FILES["terme"]["name"];
		$config["file_name"] = $nomFichier; 
		$this->load->library('upload',$config);
								
		if($this->upload->do_upload("terme")){
			$image=$this->upload->data();
			$data["terme"]="assets/fichiers/termeEcho1erTrim/".$image['file_name'];
		}
		else{
			$data["terme"]="assets/fichiers/termeEcho1erTrim/inconnu.jpg";
		}
		
		$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
		if(!$verif){
			$donneesSejour = array(
				"acm_id"=>$data["id"],
				"sea_dDate"=>date("Y-m-d")
			);
			$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
		}
		else{
			$sejour = $verif;
		}
		
			$duree = 365;
			
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$duree." days");
			$expiration = date("Y-m-d H:i:s",$maDate). "\n";
			
			$maDatedelai = strtotime($aujourdhui."+ 2 days");
			$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
			$donnees = array(
				"acm_iSta "=>1,
				"pat_id"=>$data["pat"],
				"acm_dDate"=>$aujourdhui,
				"acm_dDateDelai"=>$delai,
				"acm_dDateExp"=>$expiration,
				"acm_sStatut "=>"en attente"                                                                                  
			);
			$insert = $this->md_patient->ajout_orientation($donnees);
			if($insert){
		
				$echob = array(
					"gob_iSta"=>1,
					"sea_id"=>$sejour->sea_id,
					"pat_id"=>$data["pat"],
					"gob_sIndication"=>$data["indication"],
					"gob_sVoie"=>$data["voie"],
					"gob_sCondition"=>$data["condition"],
					"gob_iNfoetus"=>$data["nbre_foetus"],
					"gob_sTypeGross"=>$data["type_grossesse"],
					"gob_sMembrane"=>$data["membrane"],
					"gob_sActCardiaque"=>$data["activite"],
					"gob_iRcf"=>$data["rcf"],
					"gob_sMaf"=>$data["maf"],
					"gob_iLcc"=>$data["lcc"],
					"gob_iBip"=>$data["bip"],
					"gob_iPa"=>$data["pa"],
					"gob_iClarteNuque"=>$data["clarte"],
					"gob_iFemur"=>$data["femur"],
					"gob_sTerm"=>$data["terme"],
					"gob_sMorphoExt"=>$data["morpho"],
					"gob_sAbdomen"=>$data["abdomen"],
					"gob_sAspectMemb"=>$data["aspect_membres"],
					"gob_sLquide"=>$data["liquide"],
					"gob_sLocalisation"=>$data["localisation"],
					"gob_sAspect"=>$data["aspect_Tropo"],
					"gob_sDecollement"=>$data["decollement"],
					"gob_sConclusion"=>$data["conclusion"],
					"gob_dDateEnreg"=>date("Y-m-d H:i:s"),
					"per_id"=>$this->session->epiphanie_diab
				);
			$insertEchoa = $this->md_patient->ajout_echob($echob);
			echo $data["pat"];
			}
			
	
	}
	
	public function echograohieC()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
		if(!$verif){
			$donneesSejour = array(
				"acm_id"=>$data["id"],
				"sea_dDate"=>date("Y-m-d")
			);
			$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
		}
		else{
			$sejour = $verif;
		}
		
			$duree = 365;
			
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$duree." days");
			$expiration = date("Y-m-d H:i:s",$maDate). "\n";
			
			$maDatedelai = strtotime($aujourdhui."+ 2 days");
			$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
			$donnees = array(
				"acm_iSta "=>1,
				"pat_id"=>$data["pat"],
				"acm_dDate"=>$aujourdhui,
				"acm_dDateDelai"=>$delai,
				"acm_dDateExp"=>$expiration,
				"acm_sStatut "=>"en attente"                                                                                  
			);
			$insert = $this->md_patient->ajout_orientation($donnees);
			if($insert){
			
				$echoc = array(
					"goc_iSta"=>1,
					"sea_id"=>$sejour->sea_id,
					"pat_id"=>$data["pat"],
					"goc_sIndication"=>$data["indication"],
					"goc_sVoie"=>$data["voie"],
					"goc_sCondition"=>$data["condition"],
					"goc_iNfoetus"=>$data["nbre_foetus"],
					"goc_sType"=>$data["type_grossesse"],
					"goc_sMembrane"=>$data["membrane"],
					"goc_sPresentation"=>$data["presentation"],
					"goc_sActCardiaque"=>$data["activite"],
					"goc_iRcf"=>$data["rcf"],
					"goc_sMaf"=>$data["maf"],
					"goc_iBip"=>$data["bip"],
					"goc_iPc"=>$data["pc"],
					"goc_iPa"=>$data["pa"],
					"goc_iFemur"=>$data["femur"],
					"goc_iPoids"=>$data["poids"],
					"goc_sMorpho"=>$data["morpho"],
					"goc_sOge"=>$data["oge"],
					"goc_sLiquide"=>$data["liquide"],
					"goc_iPgc"=>$data["pgc"],
					"goc_sPlacenta"=>$data["placenta"],
					"goc_sDopIR"=>$data["dopIR"],
					"goc_sDopFlux"=>$data["dopFlux"],
					"goc_sAcmIR"=>$data["dopAcmIR"],
					"goc_iDopAcmVitesse"=>$data["dopAcmVitesse"],
					"goc_sDopAcmMOM"=>$data["dopAcmMom"],
					"goc_sDopArantiusIR"=>$data["dopAraIR"],
					"goc_sDopArantiusOnde"=>$data["dopAraOnde"],
					"goc_sDopUterinDtIR"=>$data["dopUterinDtIR"],
					"goc_sDopUterinDtNotch"=>$data["dopUterinDtNucth"],
					"goc_sDopUterinGIR"=>$data["dopUterinGIR"],
					"goc_sDopUterinGNotch"=>$data["dopUterinDtNotch"],
					"goc_iColLongueur"=>$data["longueur"],
					"goc_sColEntonnoir"=>$data["entonnoir"],
					"goc_sConclusion"=>$data["conclusion"],
					"goc_dDateEnreg"=>date("Y-m-d H:i:s"),
					"per_id"=>$this->session->epiphanie_diab
				);
			$insertEchoc = $this->md_patient->ajout_echoc($echoc);
			echo $data["pat"];
			}
			
	
	}
	
	public function echograohieD()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
		if(!$verif){
			$donneesSejour = array(
				"acm_id"=>$data["id"],
				"sea_dDate"=>date("Y-m-d")
			);
			$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
		}
		else{
			$sejour = $verif;
		}
		
			$duree = 365;
			
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$duree." days");
			$expiration = date("Y-m-d H:i:s",$maDate). "\n";
			
			$maDatedelai = strtotime($aujourdhui."+ 2 days");
			$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
			$donnees = array(
				"acm_iSta "=>1,
				"pat_id"=>$data["pat"],
				"acm_dDate"=>$aujourdhui,
				"acm_dDateDelai"=>$delai,
				"acm_dDateExp"=>$expiration,
				"acm_sStatut "=>"en attente"                                                                                  
			);
			$insert = $this->md_patient->ajout_orientation($donnees);
			if($insert){
		
				$echod = array(
					"god_iSta"=>1,
					"sea_id"=>$sejour->sea_id,
					"pat_id"=>$data["pat"],
					"god_sIndication"=>$data["indication"],
					"god_sVoie"=>$data["voie"],
					"god_sCondition"=>$data["condition"],
					"god_iNfoetus"=>$data["nbre_foetus"],
					"god_sType"=>$data["type_grossesse"],
					"god_sMembrane"=>$data["membrane"],
					"god_sPresentation"=>$data["presentation"],
					"god_sActCardiaque"=>$data["activite"],
					"god_iRcf"=>$data["rcf"],
					"god_sMaf"=>$data["maf"],
					"god_iBip"=>$data["bip"],
					"god_iPc"=>$data["pc"],
					"god_iPa"=>$data["pa"],
					"god_iFemur"=>$data["femur"],
					"god_iPoids"=>$data["poids"],
					"god_sMorpho"=>$data["morpho"],
					"god_sOge"=>$data["oge"],
					"god_sLiquide"=>$data["liquide"],
					"god_iPgc"=>$data["pgc"],
					"god_sPlacenta"=>$data["placenta"],
					"god_sDopIR"=>$data["dopIR"],
					"god_sDopFlux"=>$data["dopFlux"],
					"god_sAcmIR"=>$data["dopAcmIR"],
					"god_iDopAcmVitesse"=>$data["dopAcmVitesse"],
					"god_sDopAcmMOM"=>$data["dopAcmMom"],
					"god_sDopArantiusIR"=>$data["dopAraIR"],
					"god_sDopArantiusOnde"=>$data["dopAraOnde"],
					"god_sDopUterinDtIR"=>$data["dopUterinDtIR"],
					"god_sDopUterinDtNotch"=>$data["dopUterinDtNucth"],
					"god_sDopUterinGIR"=>$data["dopUterinGIR"],
					"god_sDopUterinGNotch"=>$data["dopUterinDtNotch"],
					"god_iColLongueur"=>$data["longueur"],
					"god_sColEntonnoir"=>$data["entonnoir"],
					"god_sConclusion"=>$data["conclusion"],
					"god_dDateEnreg"=>date("Y-m-d H:i:s"),
					"per_id"=>$this->session->epiphanie_diab
				);
			$insertEchod = $this->md_patient->ajout_echod($echod);
			echo $data["pat"];
			}
			
	
	}
	
	public function echograohieE()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$date_acc=$this->md_config->recupDateTime($data["date"]);
		
		$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
		if(!$verif){
			$donneesSejour = array(
				"acm_id"=>$data["id"],
				"sea_dDate"=>date("Y-m-d")
			);
			$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
		}
		else{
			$sejour = $verif;
		}
		
			$duree = 365;
			
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$duree." days");
			$expiration = date("Y-m-d H:i:s",$maDate). "\n";
			
			$maDatedelai = strtotime($aujourdhui."+ 2 days");
			$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
			$donnees = array(
				"acm_iSta "=>1,
				"pat_id"=>$data["pat"],
				"acm_dDate"=>$aujourdhui,
				"acm_dDateDelai"=>$delai,
				"acm_dDateExp"=>$expiration,
				"acm_sStatut "=>"en attente"                                                                                  
			);
			$insert = $this->md_patient->ajout_orientation($donnees);
			if($insert){
				$echoe = array(
					"goe_iSta"=>1,
					"sea_id"=>$sejour->sea_id,
					"pat_id"=>$data["pat"],
					"goe_dDate"=>$date_acc,
					"goe_sLieu"=>ucfirst($data["lieu"]),
					"goe_iNfoetus"=>$data["nbre_foetus"],
					"goe_sPrenom"=>ucfirst($data["prenom"]),
					"goe_sSexe"=>$data["sexe"],
					"goe_iPoids"=>$data["poids"],
					"goe_sModalite"=>$data["modalite"],
					"goe_sEtat"=>$data["etat"],
					"goe_sTerm"=>$data["term"],
					"goe_dEnreg"=>date("Y-m-d H:i:s"),
					"per_id"=>$this->session->epiphanie_diab
				);
				$insertEchoa = $this->md_patient->ajout_echoe($echoe);
			// echo $data["pat"];
			}
	
	}

	public function recupEchoa()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$e = $this->md_patient->gyneco_a($data["id"]);
			// echo var_dump($e);
			// echo var_dump($c);
			echo '<div class="post-box">
					<h3><u>Echographie < 12 SA </u><small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<div class="">
						<div>	
							<ul style= "list-style-type:none">
								<li><b>Indication</b> : ' ;if(!is_null($e->goa_sIndication)){echo $e->goa_sIndication;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Voie d\'examen</b> : ' ;if(!is_null($e->goa_sVoie)){echo $e->goa_sVoie;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Condition de réalisation</b> : ' ;if(!is_null($e->goa_sCondition)){echo $e->goa_sCondition;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Nombre d\'embryons</b> : ' ;if(!is_null($e->goa_iNEmbre)){echo $e->goa_iNEmbre;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Type de grossesse</b> : ' ;if(!is_null($e->goa_sTypeGross)){echo $e->goa_sTypeGross;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Membrane</b> : ' ;if(!is_null($e->goa_sMembrane)){echo $e->goa_sMembrane;}else{echo '<i>Non renseignée</i>';} echo '</li>
							</ul>
							<h4>Embryon A</h4>
							<ul>
								<li><b>Embryon</b></li>
								<ul>
								<li><b>Visibilité du foetus</b> : ' ;if(!is_null($e->goa_sVisibilite)){echo $e->goa_sVisibilite;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Sac gest : LCC -A </b> : ' ;if(!is_null($e->goa_iLcc)){echo $e->goa_iLcc.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Terme & DDG / LCC - A</b> : ' ;if(!is_null($e->goa_sTerm)){echo '<a href="'.base_url($e->goa_sTerm).'" target="_blank"><i class="fa fa-download" style="font-size:25px"></i></a>';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Bip - A</b> : ' ;if(!is_null($e->goa_iBip)){echo $e->goa_iBip.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Activité cardiaque</b> : ' ;if(!is_null($e->goa_sActCard)){echo $e->goa_sActCard;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>RCF - A</b> : ' ;if(!is_null($e->goa_iRcf)){echo $e->goa_iRcf.' bpm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Morphologie de l\'extrémité cephalique - A</b> : ' ;if(!is_null($e->goa_sMorphoExt)){echo $e->goa_sMorphoExt;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Morphologie des membres - A</b> : ' ;if(!is_null($e->goa_sMorphoMemb)){echo $e->goa_sMorphoMemb;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<br>
								<li><b>Sac gestationnel</b></li>
								<ul>
								<li><b>Sac gest : localisation - A</b> : ' ;if(!is_null($e->goa_sLocalisation)){echo $e->goa_sLocalisation;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Sac gest : tonicité - A</b> : ' ;if(!is_null($e->goa_sToniocite)){echo $e->goa_sToniocite;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Sac gest : trophoblaste - A</b> : ' ;if(!is_null($e->goa_sTrophoblaste)){echo $e->goa_sTrophoblaste;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Sac gest : diamètre - A (mm)</b> : ' ;if(!is_null($e->goa_iDiametre)){echo $e->goa_iDiametre;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Sac gest : décollement - A</b> : ' ;if(!is_null($e->goa_sDecollement)){echo $e->goa_sDecollement;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
							</ul>
							<h4>Foetus</h4>
							<ul>
								<li><b>Ovaire droit</b></li>
								<ul>
								<li><b>Taille</b>: ' ;if(!is_null($e->goa_iOvDroit)){echo $e->goa_iOvDroit.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Aspect</b> : ' ;if(!is_null($e->goa_sOvDroitAspect)){echo $e->goa_sOvDroitAspect;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<br>
								<li><b>Ovaire gauche</b></li>
								<ul>
								<li><b>Taille</b> : ' ;if(!is_null($e->goa_iOvGauche)){echo $e->goa_iOvGauche.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Aspect</b> : ' ;if(!is_null($e->goa_sOvGaucheAspect)){echo $e->goa_sOvGaucheAspect;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
							</ul>
							<h4>Conclusion</h4>
							<p>'; if(!is_null($e->goa_sConclusion)){echo $e->goa_sConclusion ;}else{echo '<i>Non renseignée</i>';} echo '</p>
							';

			echo '</div>
						<a href="'.site_url("impression/resultat_echoa/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>
				</div>';

		}
	}

	public function recupEchob()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$e = $this->md_patient->gyneco_b($data["id"]);
			// echo var_dump($e);
			// echo var_dump($c);
			echo '<div class="post-box">
					<h3><u>Echographie 1er Trimestre</u><small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<div class="">
						<div>	
							<ul style= "list-style-type:none">
								<li><b>Indication</b> : ' ;if(!is_null($e->gob_sIndication)){echo $e->gob_sIndication;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Voie d\'examen</b> : ' ;if(!is_null($e->gob_sVoie)){echo $e->gob_sVoie;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Condition de réalisation</b> : ' ;if(!is_null($e->gob_sCondition)){echo $e->gob_sCondition;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Nombre de foetus</b> : ' ;if(!is_null($e->gob_iNfoetus)){echo $e->gob_iNfoetus;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Type de grossesse</b> : ' ;if(!is_null($e->gob_sTypeGross)){echo $e->gob_sTypeGross;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Membrane</b> : ' ;if(!is_null($e->gob_sMembrane)){echo $e->gob_sMembrane;}else{echo '<i>Non renseignée</i>';} echo '</li>
							</ul>
							<h4>Foetus</h4>
							<ul>
								<li><b>Activité cardiaque - A</b>: ' ;if(!is_null($e->gob_sActCardiaque)){echo $e->gob_sActCardiaque;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>RCF - A</b>: ' ;if(!is_null($e->gob_iRcf)){echo $e->gob_iRcf.' bpm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>MAF - A</b> : ' ;if(!is_null($e->gob_sMaf)){echo $e->gob_sMaf;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>LCC - A</b>: ' ;if(!is_null($e->	gob_iLcc)){echo $e->gob_iLcc.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>BIP - A</b>: ' ;if(!is_null($e->gob_iBip)){echo $e->gob_iBip.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>PA - A</b>: ' ;if(!is_null($e->gob_iPa)){echo $e->gob_iPa.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Clarté nuque - A</b>: ' ;if(!is_null($e->gob_iClarteNuque)){echo $e->gob_iClarteNuque.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Férum - A</b>: ' ;if(!is_null($e->gob_iFemur)){echo $e->gob_iFemur.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Terme & DDG / LCC - A</b> : ' ;if(!is_null($e->gob_sTerm)){echo '<a href="'.base_url($e->gob_sTerm).'" target="_blank"><i class="fa fa-download" style="font-size:25px"></i></a>';}else{echo '<i>Non renseignée</i>';} echo '</li>
							</ul>
							<ul>
								<li><b>Morpho de pôle céphalique - A</b> : ' ;if(!is_null($e->gob_sMorphoExt)){echo $e->gob_sMorphoExt;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Abdomen - A</b> : ' ;if(!is_null($e->gob_sAbdomen)){echo $e->gob_sAbdomen;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Aspect des membranes - A</b> : ' ;if(!is_null($e->gob_sAspectMemb)){echo $e->gob_sAspectMemb;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Liquide amniotique - A</b> : ' ;if(!is_null($e->gob_sLquide)){echo $e->gob_sLquide;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Tropoblaste : localisation - A</b> : ' ;if(!is_null($e->gob_sLocalisation)){echo $e->gob_sLocalisation;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Tropoblaste : aspect - A</b> : ' ;if(!is_null($e->gob_sAspect)){echo $e->gob_sAspect;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Décollement - A</b> : ' ;if(!is_null($e->gob_sDecollement)){echo $e->gob_sDecollement;}else{echo '<i>Non renseignée</i>';} echo '</li>
							</ul>
							<h4>Conclusion</h4>
							<p>'; if(!is_null($e->gob_sConclusion)){echo $e->gob_sConclusion ;}else{echo '<i>Non renseignée</i>';} echo '</p>
							';

			echo '</div>
						<a href="'.site_url("impression/resultat_echob/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>
				</div>';

		}
	}

	public function recupEchoc()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$e = $this->md_patient->gyneco_c($data["id"]);
			// echo var_dump($e);
			// echo var_dump($c);
			echo '<div class="post-box">
					<h3><u>Echographie 2ième Trimestre </u><small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<div class="">
						<div>	
							<ul style= "list-style-type:none">
								<li><b>Indication</b> : ' ;if(!is_null($e->goc_sIndication)){echo $e->goc_sIndication;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Voie d\'examen</b> : ' ;if(!is_null($e->goc_sVoie)){echo $e->goc_sVoie;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Condition de réalisation</b> : ' ;if(!is_null($e->goc_sCondition)){echo $e->goc_sCondition;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Nombre de foetus</b> : ' ;if(!is_null($e->goc_iNfoetus)){echo $e->goc_iNfoetus;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Type de grossesse</b> : ' ;if(!is_null($e->goc_sType)){echo $e->goc_sType;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Membrane</b> : ' ;if(!is_null($e->goc_sMembrane)){echo $e->goc_sMembrane;}else{echo '<i>Non renseignée</i>';} echo '</li>
							</ul>
							<h4>Foetus</h4>
							<ul>
								<li>Présentation et vitalité</li>
								<ul>
								<li><b>Présentation - A</b>: ' ;if(!is_null($e->goc_sPresentation)){echo $e->goc_sPresentation;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Activité cardiaque - A</b>: ' ;if(!is_null($e->goc_sActCardiaque)){echo $e->goc_sActCardiaque ;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>RCF - A</b> : ' ;if(!is_null($e->goc_iRcf)){echo $e->goc_iRcf.' bpm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>MAF - A</b>: ' ;if(!is_null($e->goc_sMaf)){echo $e->goc_sMaf;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Biometrie</li>
								<ul>
								<li><b>BIP - A</b>: ' ;if(!is_null($e->goc_iBip)){echo $e->goc_iBip.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>PC - A</b>: ' ;if(!is_null($e->goc_iPc)){echo $e->goc_iPc.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>PA - A</b> : ' ;if(!is_null($e->goc_iPa)){echo $e->goc_iPa.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Fémur - A </b>: ' ;if(!is_null($e->goc_iFemur)){echo $e->goc_iFemur.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Poids estimé </b>: ' ;if(!is_null($e->goc_iPoids)){echo $e->goc_iPoids.' g';}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Morphologie</li>
								<ul>
								<li><b>Morphologie générale - A</b>: ' ;if(!is_null($e->goc_sMorpho)){echo $e->goc_sMorpho;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>OGE - A</b>: ' ;if(!is_null($e->goc_sOge)){echo $e->	goc_sOge;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Annexes</li>
								<ul>
								<li><b>Liquide et cordon - A</b>: ' ;if(!is_null($e->goc_sLiquide)){echo $e->goc_sLiquide;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>PGC - A</b>: ' ;if(!is_null($e->goc_iPgc)){echo $e->goc_iPgc.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Placenta - A</b> : ' ;if(!is_null($e->goc_sPlacenta)){echo $e->goc_sPlacenta;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Doppler ombilic</li>
								<ul>
								<li><b>Dop ombilic IR - A</b>: ' ;if(!is_null($e->goc_sDopIR)){echo $e->goc_sDopIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop ombilic Flux en Dia - A</b>: ' ;if(!is_null($e->goc_sDopFlux)){echo $e->goc_sDopFlux;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Doppler ACM</li>
								<ul>
								<li><b>Dop ACM IR - A</b>: ' ;if(!is_null($e->goc_sAcmIR)){echo $e->goc_sAcmIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop ACM Vitesse - A</b>: ' ;if(!is_null($e->goc_iDopAcmVitesse)){echo $e->goc_iDopAcmVitesse.' cm/s';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop ACM MoM - A</b>: ' ;if(!is_null($e->goc_sDopAcmMOM)){echo $e->goc_sDopAcmMOM;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Doppler Arantus</li>
								<ul>
								<li><b>Dop Arantus IR - A</b>: ' ;if(!is_null($e->goc_sDopArantiusIR)){echo $e->goc_sDopArantiusIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop Arantius onde A - A</b>: ' ;if(!is_null($e->goc_sDopArantiusOnde)){echo $e->goc_sDopArantiusOnde;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
							</ul>
							<h4>Utérus</h4>
							<ul>
								<li>Doppler utérus</li>
								<ul>
								<li><b>Dop utérin Dt IR</b>: ' ;if(!is_null($e->goc_sDopUterinDtIR)){echo $e->goc_sDopUterinDtIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop utérin Dt Notch</b>: ' ;if(!is_null($e->goc_sDopUterinDtNotch)){echo $e->goc_sDopUterinDtNotch ;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li></li>
								<ul>
								<li><b>Dop utérin G IR</b>: ' ;if(!is_null($e->goc_sDopUterinGIR)){echo $e->goc_sDopUterinGIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop utérin Dt Notch</b>: ' ;if(!is_null($e->goc_sDopUterinGNotch)){echo $e->goc_sDopUterinGNotch.' bpm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Col</li>
								<ul>
								<li><b>Col : longueur</b>: ' ;if(!is_null($e->goc_iColLongueur)){echo $e->goc_iColLongueur.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Col : entonnoir</b>: ' ;if(!is_null($e->goc_sColEntonnoir)){echo $e->goc_sColEntonnoir;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
							</ul>
							<h4>Conclusion</h4>
							<p>'; if(!is_null($e->goc_sConclusion)){echo $e->goc_sConclusion;}else{echo '<i>Non renseignée</i>';} echo '</p>
							';

			echo '</div>
						<a href="'.site_url("impression/resultat_echoc/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>
				</div>';

		}
	}

	public function recupEchod()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$e = $this->md_patient->gyneco_d($data["id"]);
			// echo var_dump($e);
			// echo var_dump($c);
			echo '<div class="post-box">
					<h3><u>Echographie 3ième Trimestre </u><small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<div class="">
						<div>	
							<ul style= "list-style-type:none">
								<li><b>Indication</b> : ' ;if(!is_null($e->god_sIndication)){echo $e->god_sIndication;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Voie d\'examen</b> : ' ;if(!is_null($e->god_sVoie)){echo $e->god_sVoie;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Condition de réalisation</b> : ' ;if(!is_null($e->god_sCondition)){echo $e->god_sCondition;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Nombre de foetus</b> : ' ;if(!is_null($e->god_iNfoetus)){echo $e->god_iNfoetus;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Type de grossesse</b> : ' ;if(!is_null($e->god_sType)){echo $e->god_sType;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Membrane</b> : ' ;if(!is_null($e->god_sMembrane)){echo $e->god_sMembrane;}else{echo '<i>Non renseignée</i>';} echo '</li>
							</ul>
							<h4>Foetus</h4>
							<ul>
								<li>Présentation et vitalité</li>
								<ul>
								<li><b>Présentation - A</b>: ' ;if(!is_null($e->god_sPresentation)){echo $e->god_sPresentation;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Activité cardiaque - A</b>: ' ;if(!is_null($e->god_sActCardiaque)){echo $e->god_sActCardiaque ;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>RCF - A</b> : ' ;if(!is_null($e->god_iRcf)){echo $e->god_iRcf.' bpm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>MAF - A</b>: ' ;if(!is_null($e->god_sMaf)){echo $e->god_sMaf;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Biometrie</li>
								<ul>
								<li><b>BIP - A</b>: ' ;if(!is_null($e->god_iBip)){echo $e->god_iBip.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>PC - A</b>: ' ;if(!is_null($e->god_iPc)){echo $e->god_iPc.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>PA - A</b> : ' ;if(!is_null($e->god_iPa)){echo $e->god_iPa.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Fémur - A </b>: ' ;if(!is_null($e->god_iFemur)){echo $e->god_iFemur.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Poids estimé </b>: ' ;if(!is_null($e->god_iPoids)){echo $e->god_iPoids.' g';}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Morphologie</li>
								<ul>
								<li><b>Morphologie générale - A</b>: ' ;if(!is_null($e->god_sMorpho)){echo $e->god_sMorpho;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>OGE - A</b>: ' ;if(!is_null($e->god_sOge)){echo $e->	god_sOge;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Annexes</li>
								<ul>
								<li><b>Liquide et cordon - A</b>: ' ;if(!is_null($e->god_sLiquide)){echo $e->god_sLiquide;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>PGC - A</b>: ' ;if(!is_null($e->god_iPgc)){echo $e->god_iPgc.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Placenta - A</b> : ' ;if(!is_null($e->god_sPlacenta)){echo $e->god_sPlacenta;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Doppler ombilic</li>
								<ul>
								<li><b>Dop ombilic IR - A</b>: ' ;if(!is_null($e->god_sDopIR)){echo $e->god_sDopIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop ombilic Flux en Dia - A</b>: ' ;if(!is_null($e->god_sDopFlux)){echo $e->god_sDopFlux;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Doppler ACM</li>
								<ul>
								<li><b>Dop ACM IR - A</b>: ' ;if(!is_null($e->god_sAcmIR)){echo $e->god_sAcmIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop ACM Vitesse - A</b>: ' ;if(!is_null($e->god_iDopAcmVitesse)){echo $e->god_iDopAcmVitesse.' cm/s';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop ACM MoM - A</b>: ' ;if(!is_null($e->god_sDopAcmMOM)){echo $e->god_sDopAcmMOM;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Doppler Arantus</li>
								<ul>
								<li><b>Dop Arantus IR - A</b>: ' ;if(!is_null($e->god_sDopArantiusIR)){echo $e->god_sDopArantiusIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop Arantius onde A - A</b>: ' ;if(!is_null($e->god_sDopArantiusOnde)){echo $e->god_sDopArantiusOnde;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
							</ul>
							<h4>Utérus</h4>
							<ul>
								<li>Doppler utérus</li>
								<ul>
								<li><b>Dop utérin Dt IR</b>: ' ;if(!is_null($e->god_sDopUterinDtIR)){echo $e->god_sDopUterinDtIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop utérin Dt Notch</b>: ' ;if(!is_null($e->god_sDopUterinDtNotch)){echo $e->god_sDopUterinDtNotch ;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li></li>
								<ul>
								<li><b>Dop utérin G IR</b>: ' ;if(!is_null($e->god_sDopUterinGIR)){echo $e->god_sDopUterinGIR;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Dop utérin Dt Notch</b>: ' ;if(!is_null($e->god_sDopUterinGNotch)){echo $e->god_sDopUterinGNotch ;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
								<li>Col</li>
								<ul>
								<li><b>Col : longueur</b>: ' ;if(!is_null($e->god_iColLongueur)){echo $e->god_iColLongueur.' mm';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Col : entonnoir</b>: ' ;if(!is_null($e->god_sColEntonnoir)){echo $e->god_sColEntonnoir;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
							</ul>
							<h4>Conclusion</h4>
							<p>'; if(!is_null($e->god_sConclusion)){echo $e->god_sConclusion;}else{echo '<i>Non renseignée</i>';} echo '</p>
							';

			echo '</div>
						<a href="'.site_url("impression/resultat_echod/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>
				</div>';

		}
	}

	public function recupEchoe()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$e = $this->md_patient->gyneco_e($data["id"]);
			// echo var_dump($e);
			// echo var_dump($c);
			echo '<div class="post-box">
					<h3><u>Issue de grossesse</u> <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<div class="">
						<div>	
							<ul style= "list-style-type:none">
								<li><b>Date d\'accouchement</b> : ' ;if(!is_null($e->goe_dDate)){echo $this->md_config->affDateFrNum($e->goe_dDate);}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Lieu</b> : ' ;if(!is_null($e->goe_sLieu)){echo $e->goe_sLieu;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Nombre de foetus</b> : ' ;if(!is_null($e->goe_iNfoetus)){echo $e->goe_iNfoetus;}else{echo '<i>Non renseignée</i>';} echo '</li>
								</ul>
							<h4>Foetus</h4>
							<ul>
								<li><b>Prénom - A</b>: ' ;if(!is_null($e->goe_sPrenom)){echo $e->goe_sPrenom;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Sexe - A</b>: ' ;if(!is_null($e->goe_sSexe)){echo $e->goe_sSexe;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Poids - A</b> : ' ;if(!is_null($e->goe_iPoids)){echo $e->goe_iPoids.' g';}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>MAF - AMAF - A</b>: ' ;if(!is_null($e->goe_sModalite)){echo $e->goe_sModalite;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Etat de santé - A</b>: ' ;if(!is_null($e->goe_sEtat)){echo $e->goe_sEtat;}else{echo '<i>Non renseignée</i>';} echo '</li>
								<li><b>Terme - A</b>: ' ;if(!is_null($e->goe_sTerm)){echo $e->goe_sTerm;}else{echo '<i>Non renseignée</i>';} echo '</li>
							</ul>';

			echo '</div>
						<a href="'.site_url("impression/resultat_echoe/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>
				</div>';

		}
	}
	
	
	public function ajoutInformation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
				
			if(trim($data["quotidien"]) == ""){
				$quotidien=NULL;
			}
			else{
				$quotidien = trim($data["quotidien"]);
			}	
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			$donnees = array(
				"inc_dDate"=>date("Y-m-d H:i:s"),
				"inc_sActQ"=>$quotidien,
				"inc_sSang"=>$data["sang"],
				"inc_iSta"=>1,
				"pat_id "=>$data["pat"]
			);
			$ajout = $this->md_patient->ajout_information($donnees);
			
			if(isset($data["lan"])){
				for($i=0;$i<count($data["lan"]);$i++){
					$verifLan = $this->md_patient->verif_lan($data["lan"][$i],$data["pat"]);
					if(!$verifLan){
						$donneesLan = array(
							"ppe_iSta"=>1,
							"pat_id"=>$data["pat"],
							"lan_id"=>$data["lan"][$i],
						);
						$this->md_patient->ajout_lan($donneesLan);
					}
				}
			}
			
			if(isset($data["laf"])){
				for($i=0;$i<count($data["laf"]);$i++){
					$verifLaf = $this->md_patient->verif_laf($data["laf"][$i],$data["pat"]);
					if(!$verifLaf){
						$donneesLaf = array(
							"paf_iSta"=>1,
							"pat_id"=>$data["pat"],
							"laf_id"=>$data["laf"][$i],
						);
						$this->md_patient->ajout_laf($donneesLaf);
					}
				}
			}
			echo count($data["lia"]);
			if(isset($data["lia"])){
				for($i=0;$i<count($data["lia"]);$i++){
					$verifLia = $this->md_patient->verif_lia($data["lia"][$i],$data["pat"]);
					if(!$verifLia){
						$donneesLia = array(
							"pal_iSta"=>1,
							"pat_id"=>$data["pat"],
							"lia_id"=>$data["lia"][$i],
						);
						$this->md_patient->ajout_lia($donneesLia);
					}
				}
			}
			
			if(isset($data["lap"])){
				for($i=0;$i<count($data["lap"]);$i++){
					$verifLap = $this->md_patient->verif_lap($data["lap"][$i],$data["pat"]);
					if(!$verifLap){
						$donneesLap = array(
							"pac_iSta"=>1,
							"pat_id"=>$data["pat"],
							"lap_id"=>$data["lap"][$i],
						);
						$this->md_patient->ajout_lap($donneesLap);
					}
				}
			}
			
			if($ajout){
				$acm = $this->md_patient->acm_patient($data["id"]);
				$patient = $this->md_patient->recup_patient($acm->pat_id);
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_information_complementaire_inc",
					"log_sIcone"=>"nouveau membre",
					"log_sAction"=>"les informations complémentaires du patient ont été mise à jour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo "ok";

			}
			
		}
	}
	
	
		
	public function recupInformation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->information($data["id"]);
			echo '<div class="post-box">
					<h3>Infirmation complémentaires <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Prises le '.$this->md_config->affDateTimeFr($c->inc_dDate).'</small></h3>                                        
					<br>
				</div>';
				
			echo '
				<div class="row clearfix">
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Antécédents personnels et familiaux</h4>
							<p>'; 
								if(is_null($c->inc_sAnt )){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->inc_sAnt ;}
					  echo '</p>
					</div>
				
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Allergies connues</h4>
							<p> '; 
								if(is_null($c->inc_sAll)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->inc_sAll;} 
					 echo '</p>
						
					</div>
					
					<div class="col-md-12">
					
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Activités professionnelles</h4>
							<p> '; 
								if(is_null($c->inc_sActPro)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->inc_sActPro;}
					  echo '</p>
					  
					</div>
					
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Activités quotidiennes</h4>
							<p> '; 
								if(is_null($c->inc_sActQ)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->inc_sActQ;} 
					 echo '</p>
						
					</div>
				</div>
			';
			
		}
	}
	
	
	
	
	public function ajoutConstante()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			
			
			if(trim($data["temperature"]) == "" AND trim($data["sys"]) == "" AND trim($data["dia"]) == "" AND trim($data["taille"])=="" AND trim($data["poids"])==""){
				echo "Vérifiez vos valeurs";
			}else{
				
				if(trim($data["temperature"]) == ""){
					$temperature=NULL;
				}
				else{
					$temperature = $this->md_config->formatNombreVirgule(trim($data["temperature"]));
				}
				
				if(trim($data["taille"]) == ""){
					$taille=NULL;
				}
				else{
					$taille = $this->md_config->formatNombreVirgule(trim($data["taille"]));
				}
				
				if(trim($data["poids"]) == ""){
					$poids=NULL;
				}
				else{
					$poids =  $this->md_config->formatNombreVirgule(trim($data["poids"]));
				}
				
				if(trim($data["sys"]) == ""){
					$sys=NULL;
				}
				else{
					$sys =  $this->md_config->formatNombreVirgule(trim($data["sys"]));
				}
				
				if(trim($data["dia"]) == ""){
					$dia=NULL;
				}
				else{
					$dia =  $this->md_config->formatNombreVirgule(trim($data["dia"]));
				}
				
				
				
				if($temperature=="erreur"){
					echo "temperature";
				}
				else{
		
					if($taille=="erreur"){
						echo "taille";
					}
					else{
						if($poids=="erreur"){
							echo "poids";
						}
						else{
							if($sys=="erreur"){
								echo "sys";
							}
							else{
								if($dia=="erreur"){
									echo "dia";
								}
								else{
									$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
									if(!$verif){
										$donneesSejour = array(
											"acm_id"=>$data["id"],
											"sea_dDate"=>date("Y-m-d")
										);
										$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
									}
									else{
										$sejour = $verif;
									}
									
									$donnees = array(
										"con_dDate"=>date("Y-m-d H:i:s"),
										"con_fPoids"=>$poids,
										"con_fTaille"=>$taille,
										"con_iTensionSys"=>$sys,
										"con_iTensionDia"=>$dia,
										"con_iTemperature"=>$temperature,
										"sea_id"=>$sejour->sea_id
									);
									$ajout = $this->md_patient->ajout_constante($donnees);
									if($ajout){
										$acm = $this->md_patient->acm_patient($data["id"]);
										$patient = $this->md_patient->recup_patient($acm->pat_id);
										$log = array(
											"log_iSta"=>0,
											"per_id"=>$this->session->epiphanie_diab,
											"log_sTable"=>"t_constante_con",
											"log_sIcone"=>"nouveau membre",
											"log_sAction"=>"les constantes du patient ont été mise à jour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
											"log_dDate"=>date("Y-m-d H:i:s")
										);
										$this->md_connexion->rapport($log);
										echo "ok";
									}

								}
							}
						}
					}
				
				}
			}
		}
	}
	
	
	public function recupConstante()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->constante_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Constante vitale <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->con_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-6">
								<label style="color:#000"><span>Température - </span>'; 
									if(!is_null($c->con_iTemperature)){echo '<b>'.$c->con_iTemperature.' °C</b>';}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><span>Tension arterielle - </span>';
									if(!is_null($c->con_iTensionSys) AND !is_null($c->con_iTensionDia)){echo '<b>'.$c->con_iTensionSys.'/'.$c->con_iTensionDia.' mmHg</b>';}else{echo '<i><br>Non renseignée</i>';}
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><span>Poids - </span>';
									if(!is_null($c->con_fPoids)){echo '<b>'.$c->con_fPoids.' Kg</b>';}else{echo '<i><br>Non renseigné</i>';}
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><span>Taille - </span>';
									if(!is_null($c->con_fTaille)){echo '<b>'.$c->con_fTaille.' cm</b>';}else{echo '<i><br>Non renseigné</i>';}
							echo '</label>
							</div>
						</div>
						<a href="'.site_url("impression/constante_vitale/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
			
		}
	}
	
	
	public function ajoutHospitalisation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		// var_dump($data);
		
		if(empty($data)){
			echo "erreur";
			
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			$recup = $this->md_parametre->recup_act_hospitalisation($data["uni"],"Hospitalisation");
			if($recup){
				$duree = $recup->lac_iDure;
				$lac= $recup->lac_id;
			}
			else{
				$duree = 365;
				$lac = 64;
			}
			
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$duree." days");
			$expiration = date("Y-m-d H:i:s",$maDate). "\n";
			
			$maDatedelai = strtotime($aujourdhui."+ 2 days");
			$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
			$donnees = array(
				"acm_iSta "=>1,
				"lac_id"=>$lac,
				"pat_id"=>$data["pat"],
				"uni_id"=>$data['uni'],
				"acm_dDate"=>$aujourdhui,
				"acm_dDateDelai"=>$delai,
				"acm_dDateExp"=>$expiration,
				"acm_sStatut "=>"en attente"                                                                                  
			);
									
			$insert = $this->md_patient->ajout_orientation($donnees);
			if($insert){
				$recupAct = $this->md_patient->recup_last_acte_medical();
				$donneeHos = array(
					"hos_iSta"=>1,
					"acm_id"=>$recupAct->acm_id,
					"sea_id"=>$sejour->sea_id,
					"lit_id"=>$data["lit"],
					"hos_sType"=>$data["type"],
					"hos_sMotif"=>$data["motif"],
					"hos_dDate"=>$aujourdhui
				);
				
				$ajout = $this->md_patient->ajout_prescription_hospitalisation($donneeHos);
				if($ajout){
					$donneesLit = array("lit_iOccupe"=>1);
					$maj = $this->md_parametre->maj_lit($donneesLit,$data["lit"]);
				}
				
				$maDate2 = strtotime($aujourdhui."- 3600 days");
				$expiration2 = date("Y-m-d H:i:s",$maDate). "\n";
				$this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration2),$data['id']);
			}
		
		}
		
		echo $data["id"];
	}
	
	
	public function recupHospitalisation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->hospitalisation_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Prescription d\'hospitalisation  <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->hos_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-3">
								<label style="color:#000"><span>Service : </span>'; 
									echo '<b>'.$c->ser_sLibelle.'</b>';
							echo '</label>
							</div>
							<div class="col-sm-3">
								<label style="color:#000"><span>Unité : </span>';
									echo '<b>'.$c->uni_sLibelle.'</b>';
							echo '</label>
							</div>
							<div class="col-sm-3">
								<label style="color:#000"><span>Chambre : </span>';
									echo '<b>'.$c->cha_sLibelle.'</b>';
							echo '</label>
							</div>
							<div class="col-sm-3">
								<label style="color:#000"><span>Lit : </span>';
									echo '<b>'.$c->lit_sLibelle.'</b>';
							echo '</label>
							</div>
						</div>
						
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-3">
								<label style="color:#000"><span>Disposition : </span>'; 
									echo '<b>'.$c->hos_sType.'</b>';
							echo '</label>
							</div>
							<div class="col-sm-9">
								<label style="color:#000"><span>Motif : </span>';
									echo '<b>'.$c->hos_sMotif.'</b>';
							echo '</label>
							</div>
							
						</div>
					</div>
					<a href="'.site_url("impression/prescription_hospitalisation/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
				</div>';
			
		}
	}
	
	
	
	
	public function ajoutConsultation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			
			if(trim($data["obs"]) == ""){
				$obs=NULL;
			}
			else{
				$obs = trim($data["obs"]);
			}	
			
			if(trim($data["an"]) == ""){
				$an=NULL;
			}
			else{
				$an=trim($data["an"]);
			}
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			$donnees = array(
				"csl_dDate"=>date("Y-m-d H:i:s"),
				"csl_sAnamnese"=>$an,
				"csl_sMotif"=>trim($data["motif"]),
				"csl_sObservation"=>$obs,
				"csl_iSta"=>1,
				"sea_id"=>$sejour->sea_id
			);
			$ajout = $this->md_patient->ajout_consultation($donnees);
			if($ajout){
				$acm = $this->md_patient->acm_patient($data["id"]);
				$patient = $this->md_patient->recup_patient($acm->pat_id);
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_consultation_csl",
					"log_sIcone"=>"nouveau membre",
					"log_sAction"=>"la médecin a établi une consultation pour le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo "ok";
			}	
		
		}
	}
	
		
	public function recupConsultation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->consultation_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Consultation <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->csl_dDate).'</small></h3>                                        
					<br>
				</div>';
				
			echo '
				<div class="row clearfix">
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey">Motif de consultation</h4>
							<p>'; 
								if(is_null($c->csl_sMotif)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sMotif;}
					  echo '</p>
					</div>
					<div class="col-md-12">
					
							<h4 class="media-heading col-blue-grey">Examen clinique</h4>
							<p> '; 
								if(is_null($c->csl_sObservation)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sObservation;}
					  echo '</p>
					  
					</div>
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey">Anamnèse</h4>
							<p> '; 
								if(is_null($c->csl_sAnamnese)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sAnamnese;} 
					 echo '</p>
						
					</div>
					<a href="'.site_url("impression/prescript_consultation/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
				</div>
			';
			
		}
	}
	
	
	
	public function ajoutOrdonnance()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			$donnees = array(
				"ord_dDate"=>date("Y-m-d H:i:s"),
				"sea_id"=>$sejour->sea_id
			);
			$ajout = $this->md_patient->ajout_ordonnance($donnees);
			
			for($i=0;$i<count($data['med']) AND $i< count($data['qte']) AND $i< count($data['duree']) AND $i< count($data['pos']);$i++){
				$verif = $this->md_patient->verif_element_ordonnance($ajout->ord_id,$data['med'][$i],$data['qte'][$i],$data['duree'][$i],$data['pos'][$i]);
				if(!$verif){
					$donnees = array(
					"elo_sProduit"=>$data['med'][$i],
					"elo_sPosologie"=>$data['pos'][$i],
					"elo_iDuree"=>$data['duree'][$i],
					"ord_id"=>$ajout->ord_id,
					"elo_iQuantite"=>$data['qte'][$i]
					);
					$this->md_patient->ajout_element_ordonnance($donnees);
				}
			}
			$acm = $this->md_patient->acm_patient($data["id"]);
			$patient = $this->md_patient->recup_patient($acm->pat_id);
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_ordonnance_ord",
				"log_sIcone"=>"nouveau membre",
				"log_sAction"=>"a ajouté une ordonnance",
				"log_sActionDetail"=>"a prescrit une ordonnance pour le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);				
			
			$this->load->view('impression/ordonnance', array("id"=>$ajout->ord_id));
		
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			// $this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			$this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("ordonnance_".$ajout->ord_id.".pdf",array('attachment'=>0));
			
			return redirect("consultation/faire/".$data["id"]);
			
		}
	
	}
	
		
	public function imprime_ordonnance($id)
	{
		$c = $this->md_patient->ordonnance_sejour($id);
		$this->load->view('impression/ordonnance', array("id"=>$c->ord_id));
		
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			// $this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			$this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("ordonnance_".$c->ord_id.".pdf",array('attachment'=>0));
			return redirect("consultation/faire/".$c->acm_id);
	}
	
		
	public function recupOrdonnance()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->ordonnance_sejour($data["id"]);
			$element = $this->md_patient->element_ordonnance($c->ord_id);
			echo '<div class="post-box">
					<h3>Ordonnance <a href="'.site_url("consultation/imprime_ordonnance/".$data["id"]).'"><i class="fa fa-download"></i></a><small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->ord_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Produit prescript</th>
									<th>Quantité</th>
									<th>Posologie</th>
									<th>Durée</th>
								</tr>
							</thead>
							<tbody>';
							foreach($element AS $e){
							if($e->elo_iDuree >1){
								$jour="jours";
							}
							else{
								$jour="jour";
							}
							echo '<tr>
									<td>'.$e->elo_sProduit.'</td>
									<td>X '.$e->elo_iQuantite.'</td>
									<td>'.$e->elo_sPosologie.'</td>
									<td>Pendant '.$e->elo_iDuree.' '.$jour.'</td>
								</tr>';
							}
						echo' </tbody>
						</table>
					</div>';
			
		}
	}
	
	
	public function ajoutActeImagerie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			if($data['indication'] == ""){
				$data['indication']=NULL;
			}
			
			$don = array(
				"img_iSta"=>1,
				"img_sDescription"=>$data['indication'],
				"img_dDate"=>date("Y-m-d H:i:s"),
				"sea_id"=>$sejour->sea_id
			);
			$insertImg = $this->md_patient->ajout_imagerie($don);
			for($i=0;$i<count($data['act_imagerie']) AND $i< count($data['duree_imagerie']) AND $i< count($data['uni_imagerie']);$i++){
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$data["duree_imagerie"][$i]." days");
				$expiration = date("Y-m-d H:i:s",$maDate). "\n";
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_imagerie'][$i],
					"pat_id"=>$data["pat_imagerie"],
					"uni_id"=>$data['uni_imagerie'][$i],
					"acm_dDate"=>$aujourdhui,
					"acm_dDateDelai"=>$delai,
					"acm_dDateExp"=>$expiration,
					"acm_sStatut "=>"en attente"                                                                                  
				);
										
				$insert = $this->md_patient->ajout_orientation($donnees);
				if($insert){
					$recupAct = $this->md_patient->recup_last_acte_medical();
					$donneeImagerie = array(
						"acm_id"=>$recupAct->acm_id,
						"img_id"=>$insertImg->img_id,
						"aci_iSta"=>1
					);
					
					$this->md_patient->ajout_prescription_imagerie($donneeImagerie);
				}
				$acte = $this->md_parametre->recup_act($data['act_imagerie'][$i]);
			}
			$patient = $this->md_patient->recup_patient($data["pat_imagerie"]);
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_soins_infirmiers_soi",
				"log_sIcone"=>"nouveau membre",
				"log_sAction"=>"a fait une prescription",
				"log_sActionDetail"=>"a prescrit  en exament imagerie le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);
			echo "ok";
			
		}
	
	}
	
	
		
	public function recupActeImagerie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$element = $this->md_patient->imagerie_sejour($data["id"]);
			$elmt = $this->md_patient->acte_imagerie_sejour($element->img_id);
			// var_dump($elmt);
			echo '<div class="post-box">
					<h3>Prescription en imagerie <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
					<div class="col-md-6"><b style="text-decoration:underline">Indication</b>'.nl2br($element->img_sDescription).'</div>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Acte imagerie</th>
									<th>Le médecin radiologue</th>
									<th>image jointe</th>
									<th>Date réalisation</th>
									<th>Télécharger</th>
								</tr>
							</thead>
							<tbody>';
							foreach($elmt AS $e){
							echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td class="text-center">'; if(!is_null($e->aci_iPer)){echo "<img src='".base_url($e->per_sAvatar)."' width='80' height='80'/><br><b>".$e->per_sNom.'</b> '.$e->per_sPrenom." <br>(".$e->per_sMatricule.")";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="text-center">'; if(!is_null($e->aci_sImage)){echo "<a href='".base_url($e->aci_sImage)."' target='_blank'><i class='fa fa-download'></i> Voir le fchier joint</a>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aci_dDate)){echo $this->md_config->affDateTimeFr($e->aci_dDate);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aci_sCompteRendu)){echo "<i class='fa fa-download' style='font-size:20px'></i>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
								</tr>';
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_imagerie/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>';
			
		}
	}
		
	
	public function ajoutActeExp()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			if($data['indication'] == ""){
				$data['indication']=NULL;
			}
			
			$don = array(
				"efc_iSta"=>1,
				"efc_sDescription"=>$data['indication'],
				"efc_dDate"=>date("Y-m-d H:i:s"),
				"sea_id"=>$sejour->sea_id
			);
			$insertEfc = $this->md_patient->ajout_exploration($don);
			for($i=0;$i<count($data['act_exp']) AND $i< count($data['duree']) AND $i< count($data['uni']);$i++){
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$data["duree"][$i]." days");
				$expiration = date("Y-m-d H:i:s",$maDate). "\n";
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_exp'][$i],
					"pat_id"=>$data["pat"],
					"uni_id"=>$data['uni'][$i],
					"acm_dDate"=>$aujourdhui,
					"acm_dDateDelai"=>$delai,
					"acm_dDateExp"=>$expiration,
					"acm_sStatut "=>"en attente"                                                                                  
				);
										
				$insert = $this->md_patient->ajout_orientation($donnees);
				if($insert){
					$recupAct = $this->md_patient->recup_last_acte_medical();
					$donneeExp = array(
						"acm_id"=>$recupAct->acm_id,
						"efc_id"=>$insertEfc->efc_id,
						"aef_iSta"=>1
					);
					
					// var_dump($donneeExp);
					
					$this->md_patient->ajout_prescription_exploration($donneeExp);
				}
				$acte = $this->md_parametre->recup_act($data['act'][$i]);
			}
			$patient = $this->md_patient->recup_patient($data["pat"]);
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_exploration_fonctionnelle",
				"log_sIcone"=>"nouveau membre",
				"log_sAction"=>"a fait une prescription",
				"log_sActionDetail"=>"a prescrit  en examen d'exploration fonctionnelle le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);
			echo "ok";
			
		}
	
	}
	
	
		
	public function recupActeExp()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$element = $this->md_patient->exploration_sejour($data["id"]);
			$elmt = $this->md_patient->acte_exploration_sejour($element->efc_id);
			// var_dump($elmt);
			echo '<div class="post-box">
					<h3>Prescription en exploration fonctionnelle <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
					<div class="col-md-6"><b style="text-decoration:underline">Indication</b>'.nl2br($element->efc_sDescription).'</div>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Acte exploration fonctionnelle</th>
									<th>Le médecin exameminateur</th>
									<th>image jointe</th>
									<th>Date réalisation</th>
									<th>Compte rendu</th>
								</tr>
							</thead>
							<tbody>';
							foreach($elmt AS $e){
							echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td class="text-center">'; if(!is_null($e->aef_iPer)){echo "<img src='".base_url($e->per_sAvatar)."' width='80' height='80'/><br><b>".$e->per_sNom.'</b> '.$e->per_sPrenom." <br>(".$e->per_sMatricule.")";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="text-center">'; if(!is_null($e->aef_sImage)){echo "<a href='".base_url($e->aef_sImage)."' target='_blank'><i class='fa fa-download'></i> Voir le fchier joint</a>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aef_dDate)){echo $this->md_config->affDateTimeFr($e->aef_dDate);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aef_sCompteRendu)){echo nl2br($e->aef_sCompteRendu);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
								</tr>';
							}
						echo' </tbody>
						</table>
					</div>';
			
		}
	}
		
	
	public function ajoutActeInfirmier()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			for($i=0;$i<count($data['act_soins']) AND $i< count($data['cons']) AND  $i< count($data['qte_soins']) AND $i< count($data['heure_soins']) AND $i< count($data['duree_soins']) AND $i< count($data['uni_soins']);$i++){
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$data["duree_soins"][$i]." days");
				$expiration = date("Y-m-d H:i:s",$maDate). "\n";
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				
				for($j=0; $j<$data['qte_soins'][$i]; $j++){
					$donnees = array(
						"acm_iSta "=>1,
						"lac_id"=>$data['act_soins'][$i],
						"pat_id"=>$data["pat_soins"],
						"uni_id"=>$data['uni_soins'][$i],
						"acm_dDate"=>$aujourdhui,
						"acm_dDateDelai"=>$delai,
						"acm_dDateExp"=>$expiration,
						"acm_sStatut "=>"en attente"                                                                                  
					);
					$insert = $this->md_patient->ajout_orientation($donnees);
					if($insert){
						if(trim($data['cons'][$i])==""){
							$data['cons'][$i]=NULL;
						}
						$recupAct = $this->md_patient->recup_last_acte_medical();
						$donneeSoins = array(
							"soi_iSta"=>1,
							"acm_id"=>$recupAct->acm_id,
							"sea_id"=>$sejour->sea_id,
							"soi_tHeureDem"=>$data['heure_soins'][$i],
							"soi_sConsigne"=>$data['cons'][$i],
							"soi_dDtatePres"=>$aujourdhui
						);
						
						$this->md_patient->ajout_prescription_soins($donneeSoins);
					}
					
				}
				$acte = $this->md_parametre->recup_act($data['act_soins'][$i]);
				$patient = $this->md_patient->recup_patient($data["pat_soins"]);
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_soins_infirmiers_soi",
					"log_sIcone"=>"nouveau membre",
					"log_sAction"=>"a fait une prescription",
					"log_sActionDetail"=>"a prescrit  en soins infirmier le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
			}
			
			echo "ok";
			
		}
	
	}
	
	
		
	public function recupSoinsInfim()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$element = $this->md_patient->soins_infirmiers_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Prescription des soins infirmiers <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Acte des soins</th>
									<th>Service/unité</th>
									<th>Heure</th>
									<th>Consigne</th>
									<th style="width:60px">Situation</th>
									<th style="width:18%" class="text-center">Infirmier(ère) traitant</th>
									<th>Observation</th>
								</tr>
							</thead>
							<tbody>';
							foreach($element AS $e){
							echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td>'.$e->ser_sLibelle.' / '.$e->uni_sLibelle.'</td>
									<td class="text-center">à <br>'.$e->soi_tHeureDem.'</td>
									<td>'.nl2br($e->soi_sConsigne).'</td>
									<td>'; if(!is_null($e->soi_dDateFait)){echo "fait ".$this->md_config->affDateTimeFr($e->soi_dDateFait);}else{echo "<span style='color:red'>Soins en attente de confirmation</span>";} echo '</td>
									<td class="text-center">'; if(!is_null($e->soi_iPersonnel)){echo "<img src='".base_url($e->per_sAvatar)."' width='100' height='100'/><br><b>".$e->per_sNom.'</b> '.$e->per_sPrenom." <br>(".$e->per_sMatricule.")";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td>'.nl2br($e->soi_sObservation).'</td>
								</tr>';
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_soins_infirmiers/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>';
			
		}
	}
	
	
	
		public function recupReeducat()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$element = $this->md_patient->reeducation_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Prescription en rééducation <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Acte de rééducation</th>
									<th>Nombre de seance</th>
									<th>Statut</th>
								</tr>
							</thead>
							<tbody>';
							foreach($element AS $e){
							echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td>'.$e->ree_iNbPrinscrit.'</td>
									<td>';
									if($e->ree_iNombre==0){
										echo '<span style="color:green"><strong>Seance(s) terminée(s)</strong></span>';
									}elseif($e->ree_iNombre==$e->ree_iNbPrinscrit){
										echo '<span style="color:green"><strong>Seance(s) en attente(s)</strong></span>';
										}elseif($e->ree_iNombre!=$e->ree_iNbPrinscrit){
											echo '<span style="color:green"><strong>Seance(s) en cours</strong></span>';
										}
									echo'</td>
								</tr>';
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_reeducation/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>';
			
		}
	}		
	
	
	public function recupNouveau()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$elt = $this->md_patient->nouveau_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Nouvelle naissance <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Date naissance</th>
									<th>heure naissance</th>
									<th>Sexe</th>
								</tr>
							</thead>
							<tbody>';
							foreach($elt AS $e){
							echo '<tr>
									<td>'.$this->md_config->affDateFrNum($e->nne_dDateNaiss).'</td>
									<td>'.$e->nne_tHeureNaiss.'</td>
									<td>'.$e->nne_sSexe.'</td>
									<td>';
					
									echo'</td>
								</tr>';
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/declaration_nouveau_ne/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>';
			
		}
	}	
	
	
	
	
	public function ajoutActeReeducation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			for($i=0;$i<count($data['nombre']) AND $i<count($data['duree_reeducation']) AND $i< count($data['uni_reeducation']) AND $i<count($data['act_reeducation']);$i++){
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$data["duree_reeducation"][$i]." days");
				$expiration = date("Y-m-d H:i:s",$maDate). "\n";	
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_reeducation'][$i],
					"pat_id"=>$data["pat_soins"],
					"uni_id"=>$data['uni_reeducation'][$i],
					"acm_dDate"=>$aujourdhui,
					"acm_dDateExp"=>$expiration,
					"acm_dDateDelai"=>$delai,
					"acm_sStatut "=>"en attente"
				);
				$insert = $this->md_patient->ajout_orientation($donnees);
				if($insert){
					$recupAct = $this->md_patient->recup_last_acte_medical();
					$donneeReeducation = array(
						"ree_iSta"=>1,
						"per_id"=>$this->session->epiphanie_diab,
						"acm_id"=>$recupAct->acm_id,
						"sea_id"=>$sejour->sea_id,
						"ree_iNombre"=>$data['nombre'][$i],
						"ree_iNbPrinscrit"=>$data['nombre'][$i],
						"ree_dDate"=>$aujourdhui
					);
					
					$this->md_patient->ajout_prescription_reeducation($donneeReeducation);
				}
				$acte = $this->md_parametre->recup_act($data['act_reeducation'][$i]);
			}
			$patient = $this->md_patient->recup_patient($data["pat_soins"]);
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_reeducation_ree",
				"log_sIcone"=>"nouveau membre",
				"log_sAction"=>"a fait une prescription",
				"log_sActionDetail"=>"a prescrit  en réeducation le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);
			echo "ok";
			
		}
	
	}
	
	
	
	public function nouveauNe()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}

			$donnees = array(
					"nne_iSta "=>1,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"nne_sSexe"=>$data['sexe'],
					"nne_dDateNaiss"=>$this->md_config->recupDateTime($data['datenaiss']),
					"nne_tHeureNaiss"=>$data['heureDate']
				);
				$insert = $this->md_patient->ajout_nouveau_ne($donnees);
				
				
			$patient = $this->md_patient->recup_patient($data["pat_soins"]);
			if($insert){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_nouveau_ne_nne",
					"log_sIcone"=>"nouveau né",
					"log_sAction"=>"a enregistré un nouveau né",
					"log_sActionDetail"=>"a enregistré un nouveau né pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);			
			}
		}	
		
		
	
	public function casDeces()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."- 3600 days");
			$expiration = date("Y-m-d H:i:s",$maDate). "\n";
			$this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration),$data['id']);

			$donnees = array(
					"dec_iSta "=>0,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"uni_id"=>$data['unite'],
					"dec_sCause"=>$data['cause'],
					"dec_dDateDeces"=>$this->md_config->recupDateTime($data['datedeces']),
					"dec_tHeureDeces"=>$data['heuredeces']
				);
				$insert = $this->md_patient->nouveau_cas_deces($donnees);
				
				$donn = array("pat_iSta"=>0);
				$this->md_patient->maj_deces($donn, $data['pat_soins']);
				
			$patient = $this->md_patient->recup_patient($data["pat_soins"]);
			if($insert){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_deces_dec",
					"log_sIcone"=>"nouveau membre",
					"log_sAction"=>"a déclaré un décès",
					"log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);			
			}
			
			echo $data["id"];
	}
		
		
		
	public function recupDeces()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$e = $this->md_patient->cas_deces($data["id"]);
			echo '<div class="post-box">
					<h3>Cas de décès <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Déclaré le '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Date décès</th>
									<th>heure décès</th>
									<th>Unité</th>
								</tr>
							</thead>
							<tbody>';
							echo '<tr>
									<td>'.$this->md_config->affDateFrNum($e->dec_dDateDeces).'</td>
									<td>'.$e->dec_tHeureDeces.'</td>
									<td>'.$e->uni_sLibelle.'</td>
								
								</tr>';
						
						echo' </tbody>
								<thead>
								<tr>
									<th colspan="3">Cause</th>
								</tr>
							</thead>
							<tbody>';
							echo '<tr>
									<td colspan="4">'.$e->dec_sCause.'</td>
		
								</tr>';
						
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/declaration_deces/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>';
			
		}
	}	
	
	
	
	public function ajoutMaladie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			for($i=0;$i<count($data['nom']);$i++){

				
					$donnees = array(
						"dia_iSta"=>1,
						"sea_id"=>$sejour->sea_id,
						"mal_id"=>$data['nom'][$i]
					);
					
					$this->md_patient->ajout_diagnostic($donnees);

			}
			$patient = $this->md_patient->recup_patient($data["pat_soins"]);
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_diagnostic_dia",
				"log_sIcone"=>"nouvelle diagnostique",
				"log_sAction"=>"a ajouté une nouvelle diagnostique",
				"log_sActionDetail"=>"a ajouté une nouvelle diagnostique pour le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);
			
		}
	
	}
	
	
	public function recupDiagnostic()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$elt = $this->md_patient->diagnostic($data["id"]);
			echo '<div class="post-box">
					<h3>Diagnostic <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Maladie</th>
								</tr>
							</thead>
							<tbody>';
							foreach($elt AS $e){
							echo '<tr>
									<td>'.$e->mal_sLibelle.'</td>
									<td>';
					
									echo'</td>
								</tr>';
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_maladie_diagnostiquee/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>';
			
		}
	}
	
	
	public function ajoutLabo()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
			if(!$verif){
				$donneesSejour = array(
					"acm_id"=>$data["id"],
					"sea_dDate"=>date("Y-m-d")
				);
				$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
			}
			else{
				$sejour = $verif;
			}
			
			$don = array(
				"lab_iSta"=>1,
				"lab_dDate"=>date("Y-m-d H:i:s"),
				"per_id"=>$this->session->epiphanie_diab,
				"sea_id"=>$sejour->sea_id
			);
			$insertLab = $this->md_patient->ajout_laboratoire($don);
			for($i=0;$i<count($data['act_labo']) AND $i< count($data['duree']) AND $i< count($data['uni']);$i++){
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$data["duree"][$i]." days");
				$expiration = date("Y-m-d H:i:s",$maDate). "\n";
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_labo'][$i],
					"pat_id"=>$data["pat"],
					"uni_id"=>$data['uni'][$i],
					"acm_dDate"=>$aujourdhui,
					"acm_dDateDelai"=>$delai,
					"acm_dDateExp"=>$expiration,
					"acm_sStatut "=>"en attente"                                                                                  
				);
										
				$insert = $this->md_patient->ajout_orientation($donnees);
				if($insert){
					$recupAct = $this->md_patient->recup_last_acte_medical();
					$donneeExp = array(
						"acm_id"=>$recupAct->acm_id,
						"lab_id"=>$insertLab->lab_id,
						"ala_iSta"=>1
					);
					
					$this->md_patient->ajout_prescription_laboratoire($donneeExp);
				}
				$acte = $this->md_parametre->recup_act($data['act'][$i]);
			}
			$patient = $this->md_patient->recup_patient($data["pat"]);
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_laboratoire_lab",
				"log_sIcone"=>"nouveau membre",
				"log_sAction"=>"a fait une prescription",
				"log_sActionDetail"=>"a prescrit  en laboratoire le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);
			echo "ok";
			
		}
	
	}
	
	
	public function recupLaboratoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$elt = $this->md_patient->laboratoire_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Examen laboratoire <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Prescrit le '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Maladie</th>
								</tr>
							</thead>
							<tbody>';
							// foreach($elt AS $e){
							// echo '<tr>
									// <td>'.$e->mal_sLibelle.'</td>
									// <td>';
					
									// echo'</td>
								// </tr>';
							// }
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_examen_laboratoire/".$elt->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>';
			
		}
	}
	
	
	public function reponse_avis(){
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(!isset($data)){
			return redirect("gynecologie_obstetrique/consultation_avis");
		}
		else{
			$donnees = array(
				"avs_iSta"=>2,
				"avs_sAvis"=>$data['repavis'],
				"avs_iPer"=>$this->session->epiphanie_diab,
				"avs_dDateAvis"=>date("Y-m-d H:i:s")
			);
			$maj = $this->md_patient->maj_avis($donnees,$data['id']);
			return redirect("gynecologie_obstetrique/demande_avis");
		}
	}
	
	
	
}
