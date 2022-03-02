<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ophtalmologie extends CI_Controller {

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
		$this->load->view('app/ophtalmologie/page-liste-consultation');
	}
	
	public function mes_patients()
	{
		$this->load->view('app/ophtalmologie/page-mes-patients');
	}
	
	public function hostirique_de_mes_patients()
	{
		$this->load->view('app/ophtalmologie/page-dossiers-patients');
	}
	
	public function hostorique_actes()
	{
		$this->load->view('app/ophtalmologie/page-hostorique-patients');
	}
	
	public function faire($id)
	{
		$donneesAcm = array("per_id"=>$this->session->diabcare,"acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/ophtalmologie/page-consultation',array("acm_id"=>$id));
	}
	
	public function voir($id)
	{
		$this->load->view('app/ophtalmologie/page-rapport-consultation',array("acm_id"=>$id));
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
					"per_id"=>$this->session->diabcare,
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
				
				if(trim($data["poul"]) == ""){
					$poul=NULL;
				}
				else{
					$poul =  trim($data["poul"]);
				}				
				
				if(trim($data["saturation"]) == ""){
					$saturation=NULL;
				}
				else{
					$saturation =  $this->md_config->formatNombreVirgule(trim($data["saturation"]));
				}				
				
				if(trim($data["dierese"]) == ""){
					$dierese=NULL;
				}
				else{
					$dierese =  trim($data["dierese"]);
				}			
				
				if(trim($data["evaluation"]) == ""){
					$evaluation=NULL;
				}
				else{
					$evaluation =  trim($data["evaluation"]);
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
										"con_fPoulsation"=>$poul,
										"con_fSaturation"=>$saturation,
										"con_fDierese"=>$dierese,
										"con_fEvaluation"=>$evaluation,
										"sea_id"=>$sejour->sea_id
									);
									$ajout = $this->md_patient->ajout_constante($donnees);
									if($ajout){
										$acm = $this->md_patient->acm_patient($data["id"]);
										$patient = $this->md_patient->recup_patient($acm->pat_id);
										$log = array(
											"log_iSta"=>0,
											"per_id"=>$this->session->diabcare,
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
				"acm_iHos"=>1,
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
					"per_id"=>$this->session->diabcare,
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
				"per_id"=>$this->session->diabcare,
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
				"per_id"=>$this->session->diabcare,
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
				"per_id"=>$this->session->diabcare,
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
					"per_id"=>$this->session->diabcare,
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
						"per_id"=>$this->session->diabcare,
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
				"per_id"=>$this->session->diabcare,
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
					"per_id"=>$this->session->diabcare,
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
					"per_id"=>$this->session->diabcare,
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
				"per_id"=>$this->session->diabcare,
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
				"per_id"=>$this->session->diabcare,
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
				"per_id"=>$this->session->diabcare,
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
	
	
	public function addExamRectal()
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
			// $this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration),$data['id']);

			$donnees = array(
					"exr_iSta "=>1,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"exr_sDouglas"=>$data['douglas'],
					"exr_sNoyau"=>$data['noyau'],
					"exr_sCloison"=>$data['cloison'],
					"exr_dDate"=>$aujourdhui
				);
				$insert = $this->md_patient->new_examen_rectal($donnees);
				
				
			// $patient = $this->md_patient->recup_patient($data["pat_soins"]);
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_deces_dec",
					// "log_sIcone"=>"nouveau membre",
					// "log_sAction"=>"a déclaré un décès",
					// "log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
			
			echo $data["id"];
	}
	
	public function recupExamrectal()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->examen_rectal($data["id"]);
			echo '<div class="post-box">
					<h3>Examen rectal <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->exr_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-4">
								<label style="color:#000"><b>Cul de sac de douglas</b><br>'; 
									if(!is_null($c->exr_sDouglas)){echo $c->exr_sDouglas;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-4">
								<label style="color:#000"><b>Noyau central du perinée</b><br>';
									if(!is_null($c->exr_sNoyau)){echo $c->exr_sNoyau;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-4">
								<label style="color:#000"><b>Cloison recto-vaginal</b><br>';
								if(!is_null($c->exr_sCloison)){echo $c->exr_sCloison;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><span></span>';
							echo '</label>
							</div>
						</div>
						<a href="'.site_url("impression/examen_rectal/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
			
		}
	}
	
	
	public function addExamPerineal()
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
			// $this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration),$data['id']);

			$donnees = array(
					"exp_iSta "=>1,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"exp_sPilo"=>$data['pilosite'],
					"exp_sPig"=>$data['pigmentation'],
					"exp_sSequelle"=>$data['sequelle'],
					"exp_sDistance"=>$data['distance'],
					"exp_sInfec_1"=>$data['infec_1'],
					"exp_sInfec_2"=>$data['infec_2'],
					"exp_sInfec_3"=>$data['infec_3'],
					"exp_sLesion"=>$data['lesion'],
					"exp_smoukondingouaka"=>$data['clitoris'],
					"exp_dDate"=>$aujourdhui
				);
				$insert = $this->md_patient->new_examen_perineal($donnees);
				
				
			// $patient = $this->md_patient->recup_patient($data["pat_soins"]);
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_deces_dec",
					// "log_sIcone"=>"nouveau membre",
					// "log_sAction"=>"a déclaré un décès",
					// "log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
			
			echo $data["id"];
	}
	
	
	
	public function recupExamperineal()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->examen_perineal($data["id"]);
			echo '<div class="post-box">
					<h3>Examen périneal <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->exp_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-12">
								<label style="color:#000"><b>Pilosité : - </b>'; 
									if(!is_null($c->exp_sPilo)){echo $c->exp_sPilo;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-12">
								<label style="color:#000"><b>Pigmentation : - </b>';
								if(!is_null($c->exp_sPig)){echo $c->exp_sPig;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-12">
								<label style="color:#000"><b>Séquelles obstétricales : - </b>';
								if(!is_null($c->exp_sSequelle)){echo $c->exp_sSequelle ;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>				
							<div class="col-sm-12">
								<label style="color:#000"><b>Infection cutanéo-muqueuse : - </b>';
								if(!is_null($c->exp_sInfec_1)){echo $c->exp_sInfec_1 ;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>		
							<div class="col-sm-12">
								<label style="color:#000"><b>Infection bartholinite : - </b>';
								if(!is_null($c->exp_sInfec_2)){echo $c->exp_sInfec_2 ;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>		
							<div class="col-sm-12">
								<label style="color:#000"><b>Infection des glandes cutanéo-muqueuse : - </b>';
								if(!is_null($c->exp_sInfec_3)){echo $c->exp_sInfec_3 ;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>			
							<div class="col-sm-12">
								<label style="color:#000"><b>Lésion traumatique : - </b>';
								if(!is_null($c->exp_sLesion)){echo $c->exp_sLesion ;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>							
							<div class="col-sm-12">
								<label style="color:#000"><b>Distance ano-vulvaire : - </b>';
								if(!is_null($c->exp_sDistance)){echo $c->exp_sDistance ;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-12">
								<label style="color:#000"><b>Développement des grandes lèvres, petites lèvres et clitoris : - </b>';
								if(!is_null($c->exp_smoukondingouaka)){echo $c->exp_smoukondingouaka ;}else{echo '<i><br>Non renseignée</i>';}
							echo '</label>
							</div>
						</div>
						<a href="'.site_url("impression/examen_perineal/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
			
		}
	}
	
	
	public function addExamPelvien()
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
			// $this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration),$data['id']);

			$donnees = array(
					"pee_iSta "=>1,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"pee_sAspect"=>$data['aspect'],
					"pee_sZone"=>$data['zone'],
					"pee_sGlaire"=>$data['glaire'],
					"pee_sHyst"=>$data['hyst'],
					"pee_sCalibrage"=>$data['calibrage'],
					"pee_sVagin"=>$data['vagin'],
					"pee_dDate"=>$aujourdhui
				);
				$insert = $this->md_patient->new_examen_pelvien($donnees);
				
				
			// $patient = $this->md_patient->recup_patient($data["pat_soins"]);
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_deces_dec",
					// "log_sIcone"=>"nouveau membre",
					// "log_sAction"=>"a déclaré un décès",
					// "log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
			
			echo $data["id"];
	}
	
	
	public function recupExampelvien()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->examen_pelvien($data["id"]);
			echo '<div class="post-box">
					<h3>Examen pelvien <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->pee_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-6">
								<label style="color:#000"><b>Aspect : - </b>'; 
									if(!is_null($c->pee_sAspect)){echo $c->pee_sAspect;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>		
							<div class="col-sm-6">
								<label style="color:#000"><b>Zone de jonction endocol exocol : - </b>'; 
									if(!is_null($c->pee_sZone)){echo $c->pee_sZone;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><b>Glaire Cervicale : - </b>';
									if(!is_null($c->pee_sGlaire)){echo $c->pee_sGlaire;}else{echo '<i><br>Non renseignée</i>';}
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><b>Hysterométrie  : - </b>';
									if(!is_null($c->pee_sHyst)){echo $c->pee_sHyst;}else{echo '<i><br>Non renseigné</i>';}
							echo '</label>
							</div>				
							<div class="col-sm-6">
								<label style="color:#000"><b>Inspection du vagin  : - </b>';
									if(!is_null($c->pee_sVagin)){echo $c->pee_sVagin;}else{echo '<i><br>Non renseigné</i>';}
							echo '</label>
							</div>				
							<div class="col-sm-6">
								<label style="color:#000"><b>Calibrage du col : - </b>';
									if(!is_null($c->pee_sCalibrage)){echo $c->pee_sCalibrage;}else{echo '<i><br>Non renseigné</i>';}
							echo '</label>
							</div>
						</div>
						<a href="'.site_url("impression/examen_pelvien/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
			
		}
	}
	
	
	public function addExamAbdominal()
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
			// $this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration),$data['id']);

			$donnees = array(
					"abe_iSta "=>1,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"abe_sSiege"=>$data['siege'],
					"abe_sVolume"=>$data['volume'],
					"abe_sMobilite"=>$data['mobilite'],
					"abe_sConsistance"=>$data['consistance'],
					"abe_sSensibilite"=>$data['sensibilite'],
					"abe_sLocalisation"=>$data['localisation'],
					"abe_sIntensite"=>$data['intensite'],
					"abe_sIrradiation"=>$data['irradiation'],
					"abe_sDefence"=>$data['defense'],
					"abe_sContracture"=>$data['contracture'],
					"abe_dDate"=>$aujourdhui
				);
				$insert = $this->md_patient->new_examen_abdominal($donnees);
				
				
			// $patient = $this->md_patient->recup_patient($data["pat_soins"]);
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_deces_dec",
					// "log_sIcone"=>"nouveau membre",
					// "log_sAction"=>"a déclaré un décès",
					// "log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
			
			echo $data["id"];
	}
	
	
	public function recupExamabdominal()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->examen_abdominal($data["id"]);
			echo '<div class="post-box">
					<h3>Examen abdominal <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->abe_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-4">
								<label style="color:#000"><b>Siège : - </b>'; 
									if(!is_null($c->abe_sSiege)){echo $c->abe_sSiege;}else{echo '<i><br>Non renseignée</i>';} 
							echo '</label>
							</div>
							<div class="col-sm-4">
								<label style="color:#000"><b>Volume : - </b>';
									if(!is_null($c->abe_sVolume)){echo $c->abe_sVolume;}else{echo '<i><br>Non renseignée</i>';}
							echo '</label>
							</div>
							<div class="col-sm-4">
								<label style="color:#000"><b>Mobilité : - </b>';
									if(!is_null($c->abe_sMobilite)){echo $c->abe_sMobilite;}else{echo '<i><br>Non renseigné</i>';}
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><span>Consistance : - </span>';
									if(!is_null($c->abe_sConsistance)){echo '<b>'.$c->abe_sConsistance.' cm</b>';}else{echo '<i><br>Non renseigné</i>';}
							echo '</label>
							</div>
						</div>
						<a href="'.site_url("impression/examen_abdominal/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
			
		}
	}
	
	
	public function addExamVaginal()
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
			// $this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration),$data['id']);

			$donnees = array(
					"eva_iSta "=>1,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"eva_sCloison_1"=>$data['cloison_1'],
					"eva_sCloison_2"=>$data['cloison_2'],
					"eva_sCul_1"=>$data['cul_1'],
					"eva_sCul_2"=>$data['cul_2'],
					"eva_sNodule"=>$data['nodule'],
					"eva_sForme"=>$data['forme'],
					"eva_sLongueur"=>$data['longueur'],
					"eva_sVolume_1"=>$data['volume_1'],
					"eva_sOuver"=>$data['ouverture'],
					"eva_sConsis_1"=>$data['consistance_1'],
					"eva_sMob_1"=>$data['mobilite_1'],
					"eva_sSensis_1"=>$data['sensibilite_1'],
					"eva_sPosis"=>$data['position'],
					"eva_sVolume_2"=>$data['volume_2'],
					"eva_sConsis_2"=>$data['consistance_2'],
					"eva_sMob_2"=>$data['mobilite_2'],
					"eva_sSensis_2"=>$data['sensibilite_2'],
					"eva_sMasse"=>$data['masse'],
					"eva_sOvaire"=>$data['ovaire'],
					"eva_sPelvien"=>$data['pelvien'],
					"eva_dDate"=>$aujourdhui
				);
				$insert = $this->md_patient->new_examen_vaginal($donnees);
				
				
			// $patient = $this->md_patient->recup_patient($data["pat_soins"]);
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_deces_dec",
					// "log_sIcone"=>"nouveau membre",
					// "log_sAction"=>"a déclaré un décès",
					// "log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
			
			echo $data["id"];
	}
	
	
	public function recupExamVaginal()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->examen_vaginal($data["id"]);
			echo '<div class="post-box">
					<h3>Examen Vaginal <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->eva_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	

						</div>
						<a href="'.site_url("impression/examen_vaginal/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
			
		}
	}
	
	
	public function addExamEchographique()
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
			// $this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration),$data['id']);

			$donnees = array(
					"eec_iSta "=>1,
					"pat_id"=>$data['pat_soins'],
					"sea_id"=>$sejour->sea_id,
					"eec_sDdr"=>$this->md_config->recupDateTime($data['champs_1']),
					"eec_sContexte"=>$data['champs_2'],
					"eec_sPrescripteur"=>$this->session->diabcare,
					"eec_sRealisation"=>$data['champs_4'],
					"eec_sExamen"=>$data['champs_5'],
					"eec_sUterus"=>$data['champs_6'],
					"eec_sAnnexe"=>$data['champs_7'],
					"eec_sAutres"=>$data['champs_8'],
					"eec_sTexte"=>$data['champs_9'],
					"eec_iLongueur"=>$data['champs_10'],
					"eec_iLargeur"=>$data['champs_11'],
					"eec_iHauteur"=>$data['champs_12'],
					"eec_sPosition"=>$data['champs_13'],
					"eec_sContour"=>$data['champs_14'],
					"eec_sMyometre"=>$data['champs_15'],
					"eec_sEndometre"=>$data['champs_16'],
					"eec_iEpaisseur"=>$data['champs_17'],
					"eec_sCavite"=>$data['champs_18'],
					"eec_sDiu"=>$data['champs_19'],
					"eec_sOvaireDroit"=>$data['champs_20'],
					"eec_sOvaireDroitGrand"=>$data['champs_21'],
					"eec_sOvaireGauche"=>$data['champs_22'],
					"eec_sOvaireGaucheGrand"=>$data['champs_23'],
					"eec_sCul"=>$data['champs_24'],
					"eec_sDouglas"=>$data['champs_25'],
					"eec_sAudir"=>$data['champs_26'],
					"eec_sAudip"=>$data['champs_27'],
					"eec_sAugir"=>$data['champs_28'],
					"eec_sAugip"=>$data['champs_29'],
					"eec_sTrompes"=>$data['champs_30'],
					"eec_sConclusion"=>$data['champs_31'],
					"eec_dDate"=>$aujourdhui
				);
				$insert = $this->md_patient->new_examen_echographique($donnees);
				
				
			// $patient = $this->md_patient->recup_patient($data["pat_soins"]);
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_deces_dec",
					// "log_sIcone"=>"nouveau membre",
					// "log_sAction"=>"a déclaré un décès",
					// "log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
			
			echo $data["id"];
	}
	
	
	public function recupExamEcho()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->examen_echographique($data["id"]);
			echo '<div class="post-box">
					<h3>Examen Echographique <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->eec_dDate).'</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	

						</div>
						<a href="'.site_url("impression/examen_vaginal/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
			
		}
	}
	
}
