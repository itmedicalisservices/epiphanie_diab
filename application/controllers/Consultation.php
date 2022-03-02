<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation extends CI_Controller {

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
		$this->load->view('app/medecin_generaliste/page-liste-consultation');
	}
	
	
	public function demande_avis()
	{
		$this->load->view('app/generique/page-liste-avis');
	}	
	
	public function liste_recherche_dossier_patient()
	{
		$this->load->view('app/medecin_generaliste/page-liste-patient');
	}
	
	
	public function mes_patients()
	{
		$this->load->view('app/medecin_generaliste/page-mes-patients');
	}
	
	public function hostirique_de_mes_patients()
	{
		$this->load->view('app/medecin_generaliste/page-dossiers-patients');
	}
	
	public function hostorique_actes()
	{
		$this->load->view('app/diabetologie/page-hostorique-patients');
	}
	
	public function faire($id)
	{
		$donneesAcm = array("per_id"=>$this->session->epiphanie_diab,"acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/medecin_generaliste/page-consultation',array("acm_id"=>$id));
	}
	
	public function voir($id)
	{
		$this->load->view('app/medecin_generaliste/page-rapport-consultation',array("acm_id"=>$id));
	}
	
	
	
	public function ajoutInformation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			
		}
		else{
			if($data["sang"] == "" && $data["quotidien"] == "" && $data["prof"] == "" && $data["perso"] == "" && $data["fam"] == "" && $data["med"] == "" && $data["chirurgie"] == "" && $data["gyne"] == "" && $data["allergie"] == ""){
				echo "Veuillez renseigner  au moins un champ";
			}
			else{
				// var_dump($data);
				if(trim($data["quotidien"]) == ""){$quotidien=NULL;}else{$quotidien = trim($data["quotidien"]);}	
				if(trim($data["prof"]) == ""){$prof=NULL;}else{$prof = trim($data["prof"]);}	
				if(trim($data["sang"]) == ""){$sang=NULL;}else{$sang = trim($data["sang"]);}	
				if(trim($data["perso"]) == ""){$perso=NULL;}else{$perso = trim($data["perso"]);}	
				if(trim($data["fam"]) == ""){$fam=NULL;}else{$fam = trim($data["fam"]);}	
				if(trim($data["med"]) == ""){$med=NULL;}else{$med = trim($data["med"]);}	
				if(trim($data["chirurgie"]) == ""){$chirurgie=NULL;}else{$chirurgie = trim($data["chirurgie"]);}	
				if(trim($data["gyne"]) == ""){$gyne=NULL;}else{$gyne = trim($data["gyne"]);}	
				if(trim($data["allergie"]) == ""){$allergie=NULL;}else{$allergie = trim($data["allergie"]);}	
				
				$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
				
				$verifInc = $this->md_patient->antecedent_patient($data["pat"]);
				if($verifInc){
					$donnees = array(
						"inc_dDate"=>date("Y-m-d H:i:s"),
						"inc_sActQ"=>$quotidien,
						"inc_sActP"=>$prof,
						"inc_sSang"=>$sang,
						"inc_sEntP"=>$perso,
						"inc_sEntF"=>$fam,
						"inc_sEntM"=>$med,
						"inc_sEntC"=>$chirurgie,
						"inc_sEntG"=>$gyne,
						"inc_sAller"=>$allergie,
						"pat_id "=>$data["pat"]
					);
					$maj = $this->md_patient->maj_antecedent_pat($donnees,$data["pat"]);
				}else{
				
					$donnees = array(
						"inc_dDate"=>date("Y-m-d H:i:s"),
						"inc_sActQ"=>$quotidien,
						"inc_sActP"=>$prof,
						"inc_sSang"=>$sang,
						"inc_sEntP"=>$perso,
						"inc_sEntF"=>$fam,
						"inc_sEntM"=>$med,
						"inc_sEntC"=>$chirurgie,
						"inc_sEntG"=>$gyne,
						"inc_sAller"=>$allergie,
						"inc_iSta"=>1,
						"pat_id "=>$data["pat"]
					);
					$ajout = $this->md_patient->ajout_information($donnees);
				
				
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
					}
				}
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
			$antecedent = $this->md_patient->antecedent_patient($data["id"]);
			$liste_1 = $this->md_patient->liste_antecedant_personnel_patient($antecedent->pat_id);
			$liste_2 = $this->md_patient->liste_antecedant_familial_patient($antecedent->pat_id); 
			$liste_3 = $this->md_patient->liste_allergie_patient($antecedent->pat_id); 
			$liste_4 = $this->md_patient->liste_activite_professionnelle_patient($antecedent->pat_id);
			
			$c = $this->md_patient->information($data["id"]);
			echo '<div class="post-box">
					<h3>Les antécédents <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Prises le '.$this->md_config->affDateTimeFr($c->inc_dDate).'</small></h3>                                        
					<br>
				</div>';
				
			echo '
				<div class="row clearfix">
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Liste des antécédents personnels</h4>
							<p> '; 
							foreach($liste_1 AS $l){
								echo '<tr>
										<td>'.$l->lan_sLibelle.'<br></td>
									</tr>';
								}
					  echo '</p>
					</div>
				
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Liste des antécédents familiaux</h4>
							<p> '; 
							foreach($liste_2 AS $l){
								echo '<tr>
										<td>'.$l->laf_sLibelle.'<br></td>
									</tr>';
								}
					  echo '</p>
						
					</div>
					
					<div class="col-md-12">
					
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Liste des allergies</h4>
							<p> '; 
							foreach($liste_3 AS $l){
								echo '<tr>
										<td>'.$l->lia_sLibelle.'<br></td>
									</tr>';
								}
					  echo '</p>
					  
					</div>						
					
					<div class="col-md-12">
					
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Liste des activités professionnelles</h4>
							<p> '; 
							foreach($liste_4 AS $l){
								echo '<tr>
										<td>'.$l->lap_sLibelle.'<br></td>
									</tr>';
								}
					  echo '</p>
					  
					</div>					
					
					<div class="col-md-12">
					
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Groupe Sanguin</h4>
							<p> '; 
								if(is_null($antecedent->inc_sSang)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $antecedent->inc_sSang;}
					  echo '</p>
					  
					</div>
					
					<div class="col-md-12">
						
							<h4 class="media-heading col-blue-grey" style="text-decoration:underline">Activités quotidiennes</h4>
							<p> '; 
								if(is_null($antecedent->inc_sActQ)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $antecedent->inc_sActQ;} 
					 echo '</p>
						
					</div>
				</div>
			';
			
		}
	}
	
	
	public function ajoutFacteurRisque()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			if(!isset($data['hta']) && !isset($data['obes']) && !isset($data['sed']) && !isset($data['dys']) && !isset($data['hta2']) && !isset($data['diab']) && !isset($data['other']) && !isset($data['tabac']) && !isset($data['alcool']) && !isset($data['cardio']) && !isset($data['hta3']) && !isset($data['normal']) && !isset($data['echo']) && !isset($data['avc']) && !isset($data['retino']) && !isset($data['nephro']) && !isset($data['neuro'])){
				echo 'vide';
			}else{
				
				if(isset($data['hta'])){$data['hta'] = 1;}else{$data['hta'] = 0;}
				if(isset($data['obes'])){$data['obes'] = 1;}else{$data['obes'] = 0;}
				if(isset($data['sed'])){$data['sed'] = 1;}else{$data['sed'] = 0;}
				if(isset($data['dys'])){$data['dys'] = 1;}else{$data['dys'] = 0;}
				if(isset($data['hta2'])){$data['hta2'] = 1;}else{$data['hta2'] = 0;}
				if(isset($data['diab'])){$data['diab'] = 1;}else{$data['diab'] = 0;}
				if(!isset($data['other'])){$data['famOther'] = NULL;}
				if(!isset($data['tabac'])){$data['tabac'] = NULL;}
				if(!isset($data['alcool'])){$data['alcool'] = NULL;}
				if(isset($data['cardio'])){$data['cardio'] = 1;}else{$data['cardio'] = 0;}
				if(isset($data['hta3'])){$data['hta3'] = 1;}else{$data['hta3'] = 0;}
				if(!isset($data['normal'])){$data['normalOther'] = NULL;}
				if(isset($data['echo'])){$data['echo'] = 1;}else{$data['echo'] = 0;}
				if(isset($data['avc'])){$data['avc'] = 1;}else{$data['avc'] = 0;}
				if(!isset($data['retino'])){$data['typeretino'] = NULL;}
				if(isset($data['nephro'])){$data['nephro'] = 1;}else{$data['nephro'] = 0;}
				if(isset($data['neuro'])){$data['neuro'] = 1;}else{$data['neuro'] = 0;}

				// $verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
				// if(!$verif){
					// $donneesSejour = array(
						// "acm_id"=>$data["id"],
						// "sea_dDate"=>date("Y-m-d")
					// );
					// $sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
				// }
				// else{
					// $sejour = $verif;
				// }
				
				$veriffac = $this->md_patient->verif_facteur_risque(1,$data["pat"]);

				if($veriffac){
					$donnees = array("far_iSta"=>2);
					$maj = $this->md_patient->maj_facteur_risque($donnees, $veriffac->far_id);
				}
				
				$donnees = array(
					"far_iSta"=>1,
					"far_iHta"=>$data["hta"],
					"far_iObs"=>$data["obes"],
					"far_iSed"=>$data["sed"],
					"far_iDys"=>$data["dys"],
					"far_iHta_2"=>$data["hta2"],
					"far_iDiab"=>$data["diab"],
					"far_sOther"=>$data["famOther"],
					"far_iTab"=>$data["tabac"],
					"far_iAl"=>$data["alcool"],
					"far_iCardio"=>$data["cardio"],
					"far_iHta_3"=>$data['hta3'],
					"far_iChronol"=>$data['normalOther'],
					"far_iEcho"=>$data['echo'],
					"far_iAvc"=>$data['avc'],
					"far_iTyperetino"=>$data['typeretino'],
					"far_iNephro"=>$data['nephro'],
					"far_iNeuro"=>$data['neuro'],
					"pat_id"=>$data["pat"],
					"far_dDate"=>date("Y-m-d")
				);
				$ajout = $this->md_patient->ajout_facteur_risque($donnees);
				if($ajout){
					$acm = $this->md_patient->acm_patient($data["id"]);
					$patient = $this->md_patient->recup_patient($acm->pat_id);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_facteur_risque_far",
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
	
	
	
	
	
	public function ajoutInfoDiabete()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			

			if($data["dec"]=='' && $data["date"]=='' && $data["type"]=='' && $data["suivi"]=='' && $data["rythme"]=='' && $data["qualite"]=='' && $data["chol"]=='' && $data["tri"]=='' && $data["ldl"]=='' && $data["hdl"]=='' && $data["dateder"]=='' && $data["traitement"]=='' && $data["lequel"]==''){
				echo 'null';
			}else{

				if($data["dec"]==''){$data["dec"]=NULL;}
				if($data["date"]==''){$data["date"]=NULL;}
				if($data["type"]==''){$data["type"]=NULL;}
				if($data["suivi"]==''){$data["suivi"]=NULL;}
				if($data["rythme"]==''){$data["rythme"]=NULL;}
				if($data["qualite"]==''){$data["qualite"]=NULL;}
				if($data["chol"]==''){$data["chol"]=NULL;}
				if($data["tri"]==''){$data["tri"]=NULL;}
				if($data["hdl"]==''){$data["hdl"]=NULL;}
				if($data["ldl"]==''){$data["ldl"]=NULL;}
				
				if(trim($data["traitement"]) == ""){$traitement=NULL;}else{$traitement =  trim($data["traitement"]);}					
				if(trim($data["dateder"]) == ""){$dateder=NULL;}else{$dateder =  trim($data["dateder"]);}		
				if(trim($data["lequel"]) == ""){$lequel=NULL;}else{$lequel = $data['lequel'];}	
					
				
				$verifinfdiab = $this->md_patient->verif_sejour_info_diab(1,$data["pat"],date("Y-m-d"));

				if($verifinfdiab){
					$donnees = array("ind_iSta"=>2);
					$maj = $this->md_patient->maj_informationDiab($donnees, $verifinfdiab->ind_id);
				}
				
				$donnees = array(
					"ind_iSta"=>1,
					"ind_sRecente"=>$data["dec"],
					"ind_dDec"=>$data["date"],
					"dgq_id"=>$data["type"],
					"ind_sSuivi"=>$data["suivi"],
					"ind_sRythme"=>$data["rythme"],
					"ind_sQlte"=>$data["qualite"],
					"ind_iChol"=>$data["chol"],
					"ind_iTri"=>$data["tri"],
					"ind_iHdl"=>$data["hdl"],
					"ind_iLdl"=>$data["ldl"],
					"ind_dDateDern"=>$dateder,
					"ind_sTrait"=>$traitement,
					"ind_sTypeTrait"=>$lequel,
					"pat_id"=>$data["pat"],
					"ind_dDate"=>date("Y-m-d"),
					"ind_dDateTime"=>date("Y-m-d H:i:s")
				);
				$ajout = $this->md_patient->ajout_info_diabete($donnees);
				if($ajout){
					$acm = $this->md_patient->acm_patient($data["id"]);
					$patient = $this->md_patient->recup_patient($acm->pat_id);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_information_diabete_ind",
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
	
		
	public function recupInfoDiab()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->information_diab_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Information sur le diabète<small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->ind_dDateTime).'</small></h3>                                        
					<br>
				</div>';
			echo '
				<div class="row clearfix">
					<div class="col-md-4">
							<b class="media-heading col-black">Découverte Récente</b>
							<p>'; 
								if($c->ind_sRecente==0){echo 'NON';}else{echo'OUI';};
					  echo '</p>
					</div>
					<div class="col-md-4">
							<b class="media-heading col-black">Date Découverte</b>
							<p>'; 
								echo $this->md_config->affDateFrNum($c->ind_dDec);
					  echo '</p>
					</div>					
					<div class="col-md-4">
							<b class="media-heading col-black">Ancienneté</b>
							<p>'; 
							$ageAnnee= $this->md_config->ageAnnee($c->ind_dDec); 
							if($ageAnnee>1 || $ageAnnee ==1){echo " En année";}else{
								$mois = $this->md_config->ageMois($c->ind_dDec);
								if($mois == 0){
									echo " Moins d'un mois";
								}else{
									echo " En mois";
								}
							}
					  echo '</p>
					</div>
					
					<div class="col-md-4">
							<b class="media-heading col-black">Type</b>
							<p> '; 
								$diagnos = $this->md_parametre->recupDiagnostique($c->dgq_id); echo $diagnos->dgq_sLib;
					 echo '</p>
					</div>
					<div class="col-md-4">
							<b class="media-heading col-black">Suivi Régulier</b>
							<p> '; 
								if($c->ind_sSuivi==0){echo 'NON';}else{echo'OUI';};
					  echo '</p>			
					  </div>					
					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Rythme des visites</b>
							<p> '; 
								if($c->ind_sRythme==0){echo 'Une fois par trimestre';}elseif($c->ind_sRythme==1){echo 'Une fois par semestre';}else{echo 'Une fois par année';};
					  echo '</p>			
					  </div>					
					  <div class="col-md-4">
							<b class="media-heading col-black">Quantité des glycémies</b>
							<p> '; 
								if($c->ind_sQlte==0){echo 'Mauvaise';}elseif($c->ind_sQlte==1){echo 'Bonne';}else{echo 'Non précisée';};
					  echo '</p>			
					  </div>					  
					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Dernier HbA1c</b>
							<p> '; 
								if(is_null($c->ind_dDateDern)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $this->md_config->affDateFrNum($c->ind_dDateDern);}
					  echo '</p>			
					  </div>					
					  <div class="col-md-4">
							<b class="media-heading col-black">Traitement Actuel</b>
							<p> '; 
								if(is_null($c->ind_sTrait)){
									echo "<i class='text-danger'>Non renseigné</i>";
								}else{
									if($c->ind_sTrait==0){echo 'Insuline';}elseif($c->ind_sTrait==1){echo 'Sulfamide hypoglycémiant';}elseif($c->ind_sTrait==2){echo 'Biguanide';}elseif($c->ind_sTrait==3){echo 'Sulfamide + biguanide';}elseif($c->ind_sTrait==4){echo 'Insuline + biguanide';}elseif($c->ind_sTrait==5){echo 'Régime seul';}else{echo 'Aucun';};
									if($c->ind_sTrait==1){if($c->ind_sTypeTrait==0){echo ' (Glibenclamide)';}elseif($c->ind_sTypeTrait==1){echo ' (Glicazide)';}else{echo ' (Autre)';};}
								}
					  echo '</p>			
					  </div>					  					  				  					  					  				  					  
					</div>
					<a href="#'.site_url("impression/prescript_consultation/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
				</div>
			';
			
		}
	}
	
	
	
	
	
	public function ajoutConstanteDataClinique()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			
			
			if(trim($data["temperature"]) == "" AND trim($data["sys"]) == "" AND trim($data["dia"]) == "" AND trim($data["taille"])=="" AND trim($data["poids"])=="" AND trim($data["glycemie"])==""){
				echo "Vérifier les valeurs saisies";
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
				
				if(trim($data["glycemie"]) == ""){
					$glycemie=NULL;
				}
				else{
					$glycemie =  $this->md_config->formatNombreVirgule(trim($data["glycemie"]));
				}		
				if(trim($data["ctque"]) == ""){
					$ctque=NULL;
				}
				else{
					$ctque =  $data["ctque"];
				}	
				
				if(trim($data["obs"]) == ""){
					$obs = NULL;
				}
				else{
					$obs =  trim($data["obs"]);
				}				
				if(trim($data["poul"]) == ""){
					$poul = NULL;
				}
				else{
					$poul =  trim($data["poul"]);
				}					
				if(trim($data["pdbg"]) == ""){$pdbg = NULL;}else{$pdbg =  trim($data["pdbg"]);}				
				if(trim($data["pdbd"]) == ""){$pdbd = NULL;}else{$pdbd =  trim($data["pdbd"]);}				
				if(trim($data["pcbg"]) == ""){$pcbg = NULL;}else{$pcbg =  trim($data["pcbg"]);}				
				if(trim($data["pcbd"]) == ""){$pcbd = NULL;}else{$pcbd =  trim($data["pcbd"]);}				
				if(trim($data["Ttaille"]) == ""){$Ttaille = NULL;}else{$Ttaille =  trim($data["Ttaille"]);}				
				
				
				
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
									
									$donnees = array(
										"cdc_dDate"=>date("Y-m-d H:i:s"),
										"cdc_fPoids"=>$poids,
										"cdc_fTaille"=>$taille,
										"cdc_iTensionSys"=>$sys,
										"cdc_iTensionDia"=>$dia,
										"cdc_iTemperature"=>$temperature,
										"cdc_fPoulsation"=>NULL,
										"cdc_fSaturation"=>NULL,
										"cdc_fDierese"=>NULL,
										"cdc_fEvaluation"=>NULL,
										"cdc_iGlmie"=>$glycemie,
										"cdc_fTourTaille"=>$Ttaille,
										"cdc_sCetonique"=>$ctque,
										"cdc_fPoulsation"=>$poul,
										"cdc_iPdbg"=>$pdbg,
										"cdc_iPdbd"=>$pdbd,
										"cdc_iPcbg"=>$pcbg,
										"cdc_iPcbd"=>$pcbd,
										"cdc_sObs"=>$obs,
										"pat_id"=>$data["pat"]
									);
									$ajout = $this->md_patient->ajout_constanteDataClinique($donnees);
									echo "ok";
								}
							}
						}
					}
				
				}
			}
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
			
			
			if(trim($data["temperature"]) == "" AND trim($data["sys"]) == "" AND trim($data["dia"]) == "" AND trim($data["taille"])=="" AND trim($data["poids"])=="" AND trim($data["glycemie"])==""){
				echo "Vérifier les valeurs saisies";
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
				
				if(trim($data["glycemie"]) == ""){
					$glycemie=NULL;
				}
				else{
					$glycemie =  $this->md_config->formatNombreVirgule(trim($data["glycemie"]));
				}		
				if(trim($data["ctque"]) == ""){
					$ctque=NULL;
				}
				else{
					$ctque =  $data["ctque"];
				}	
				
				if(trim($data["obs"]) == ""){
					$obs = NULL;
				}
				else{
					$obs =  trim($data["obs"]);
				}				
				if(trim($data["poul"]) == ""){
					$poul = NULL;
				}
				else{
					$poul =  trim($data["poul"]);
				}					
				if(trim($data["pdbg"]) == ""){$pdbg = NULL;}else{$pdbg =  trim($data["pdbg"]);}				
				if(trim($data["pdbd"]) == ""){$pdbd = NULL;}else{$pdbd =  trim($data["pdbd"]);}				
				if(trim($data["pcbg"]) == ""){$pcbg = NULL;}else{$pcbg =  trim($data["pcbg"]);}				
				if(trim($data["pcbd"]) == ""){$pcbd = NULL;}else{$pcbd =  trim($data["pcbd"]);}				
				if(trim($data["Ttaille"]) == ""){$Ttaille = NULL;}else{$Ttaille =  trim($data["Ttaille"]);}				
				
				
				
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
										"con_fPoulsation"=>NULL,
										"con_fSaturation"=>NULL,
										"con_fDierese"=>NULL,
										"con_fEvaluation"=>NULL,
										"con_iGlmie"=>$glycemie,
										"con_fTourTaille"=>$Ttaille,
										"con_sCetonique"=>$ctque,
										"con_fPoulsation"=>$poul,
										"con_iPdbg"=>$pdbg,
										"con_iPdbd"=>$pdbd,
										"con_iPcbg"=>$pcbg,
										"con_iPcbd"=>$pcbd,
										"con_sObs"=>$obs,
										"pat_id"=>$data["pat"],
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
		if (empty($data)) {
			echo "erreur";
			// var_dump($data);
		} else {
			$c = $this->md_patient->constante_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Constantes Vitales <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait ' . $this->md_config->affDateTimeFr($c->con_dDate) . '</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-6">
								<label style="color:#000"><b>Tension arterielle: </b>';
								if (!is_null($c->con_iTensionSys) and !is_null($c->con_iTensionDia)) {
									echo $c->con_iTensionSys . '/' . $c->con_iTensionDia . ' mmHg
									';
								} else {
									echo '<i><br>Non renseignée</i>';
								}
								echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>Température: </b>';
								if (!is_null($c->con_iTemperature)) {
									echo $c->con_iTemperature . ' °C';
								} else {
									echo '<i><br>Non renseignée</i>';
								}
								echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>Corps Cétonique: </b>';
								if (!is_null($c->con_sCetonique)) {
									echo $c->con_sCetonique;
								} else {
									echo '<i><br>Non renseigné</i>';
								}
								echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><b>Poids: </b>';
							if (!is_null($c->con_fPoids)) {
								echo $c->con_fPoids . ' Kg';
							} else {
								echo '<i><br>Non renseigné</i>';
							}
							echo '</label>
							</div>
							<div class="col-sm-6">
								<label style="color:#000"><b>Taille: </b>';
									if (!is_null($c->con_fTaille)) {
										echo $c->con_fTaille . ' cm';
									} else {
										echo '<i><br>Non renseignée</i>';
									}
									echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>Tour de taille: </b>';
									if (!is_null($c->con_fTourTaille)) {
										echo $c->con_fTourTaille . ' cm';
									} else {
										echo '<i><br>Non renseignée</i>';
									}
									echo '</label>
							</div>								
							<div class="col-sm-6">
								<label style="color:#000"><b>IMC: </b>';
										echo round(((100*$c->con_fPoids)/($c->con_fTaille*$c->con_fTaille)),2) . ' kg/m2 ';
									echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>Glycémie: </b>';
									if (!is_null($c->con_iGlmie)) {
										echo $c->con_iGlmie . ' G/L';
									} else {
										echo '<i><br>Non renseignée</i>';
									}
									echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>PAS debout BG: </b>';
									if (!is_null($c->con_iPdbg)) {
										echo $c->con_iPdbg . ' mmHg';
									} else {
										echo '<i><br>Non renseigné</i>';
									}
									echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>PAS debout BD: </b>';
									if (!is_null($c->con_iPdbd)) {
										echo $c->con_iPdbd . ' mmHg';
									} else {
										echo '<i><br>Non renseigné</i>';
									}
									echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>PAS couché BG: </b>';
									if (!is_null($c->con_iPcbg)) {
										echo $c->con_iPcbg . ' mmHg';
									} else {
										echo '<i><br>Non renseigné</i>';
									}
									echo '</label>
							</div>							
							<div class="col-sm-6">
								<label style="color:#000"><b>PAS couché BD: </b>';
									if (!is_null($c->con_iPcbd)) {
										echo $c->con_iPcbd . ' mmHg';
									} else {
										echo '<i><br>Non renseigné</i>';
									}
									echo '</label>
							</div>
							<div class="col-sm-12">
								<label style="color:#000"><b>Observations: </b><br>';
									if (!is_null($c->con_sObs)) {
										echo nl2br($c->con_sObs);
									} else {
										echo '<i><br>Non renseignée</i>';
									}
						echo '</label>
							</div>
						</div>
						<a href="' . site_url("impression/constante_vitale/" . $c->sea_id) . '" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>
				</div>';
		}
	}
	
	
	public function ajoutMaternite()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		// var_dump($data);
		
		if(empty($data)){
			echo "erreur";
		}
		else{
			
			$aujourdhui = date("Y-m-d H:i:s");
			$donneeHos = array(
				"hos_iSta"=>1,
				"acm_id"=>$data["id"],
				"lit_id"=>$data["lit"],
				"hos_sType"=>$data["type"],
				"hos_sMotif"=>$data["motif"],
				"hos_dDate"=>$aujourdhui,
				"hos_iMaternite"=>1
			);
			
			$ajout = $this->md_patient->ajout_prescription_hospitalisation($donneeHos);
			$donneesLit = array("lit_iOccupe"=>1);
			$maj = $this->md_parametre->maj_lit($donneesLit,$data["lit"]);
			$donneesAcm = array("per_id"=>$this->session->epiphanie_diab,"acm_iFin"=>1);
			$this->md_patient->maj_actes_caisse($donneesAcm,$data["id"]);
			echo $ajout->hos_id;
			
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
			
			
			$recup = $this->md_parametre->recup_act_hospitalisation($data["uni"],"Hospitalisation");
			// var_dump($recup);
			if($recup){
				$duree = $recup->lac_iDure;
				$lac= $recup->lac_id;
			}
			else{
				$duree = 365;
				$lac = 2199;
			}
			
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$duree." days");
			// $expiration = date("Y-m-d H:i:s",$maDate). "\n";
			$expiration = date("Y-m-d H:i:s",$maDate);
			
			$maDatedelai = strtotime($aujourdhui."+ 2 days");
			// $delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
			$delai = date("Y-m-d H:i:s",$maDatedelai);
			$donnees = array(
				"acm_iSta "=>1,
				"lac_id"=>$lac,
				"pat_id"=>$data["pat"],
				"uni_id"=>$data['uni'],
				"acm_dDate"=>$aujourdhui,
				"acm_dDateDelai"=>$delai,
				"acm_dDateExp"=>$expiration,
				"acm_iHos"=>1,
				"acm_iFin"=>0,/*Ajout*/
				"recep_iPer"=>0,/*Ajout*/
				"acm_sStatut "=>"en attente"                                                                                  
			);
									
			$insert = $this->md_patient->ajout_orientation($donnees);
			
			if($insert){
				$recupAct = $this->md_patient->recup_last_acte_medical();
				$verif = $this->md_patient->verif_sejour($recupAct->acm_id,date("Y-m-d"));
				if(!$verif){
					$donneesSejour = array(
						"acm_id"=>$recupAct->acm_id,
						"sea_dDate"=>date("Y-m-d")
					);
					$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
				}
				else{
					$sejour = $verif;
				}
				$donneeHos = array(
					"hos_iSta"=>1,
					"acm_id"=>$recupAct->acm_id,
					"sea_id"=>$sejour->sea_id,
					"lit_id"=>$data["lit"],
					"hos_sType"=>$data["type"],
					"hos_sMotif"=>$data["motif"],
					"hos_iMaternite"=>0,/*Ajout*/
					"hos_dDate"=>$aujourdhui
				);
				
				$ajout = $this->md_patient->ajout_prescription_hospitalisation($donneeHos);
				if($ajout){
					$donneesLit = array("lit_iOccupe"=>1);
					$maj = $this->md_parametre->maj_lit($donneesLit,$data["lit"]);
				}
				
				$maDate2 = strtotime($aujourdhui."- 3600 days");
				// $expiration2 = date("Y-m-d H:i:s",$maDate2). "\n";
				$expiration2 = date("Y-m-d H:i:s",$maDate2);
				$this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration2),$recupAct->acm_id);
				echo $recupAct->acm_id;
			}
			
		}
		
		
	}


	public function recupHospitalisation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if (empty($data)) {
			echo "erreur";
			// var_dump($data);
		} else {
			$c = $this->md_patient->hospitalisation_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Prescription d\'hospitalisation  <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait ' . $this->md_config->affDateTimeFr($c->hos_dDate) . '</small></h3>                                        
					<div class="body p-l-0 p-r-0">
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-3">
								<label style="color:#000"><span>Service : </span>';
			echo '<b>' . $c->ser_sLibelle . '</b>';
			echo '</label>
							</div>
							<div class="col-sm-3">
								<label style="color:#000"><span>Unité : </span>';
			echo '<b>' . $c->uni_sLibelle . '</b>';
			echo '</label>
							</div>
							<div class="col-sm-3">
								<label style="color:#000"><span>Chambre : </span>';
			echo '<b>' . $c->cha_sLibelle . '</b>';
			echo '</label>
							</div>
							<div class="col-sm-3">
								<label style="color:#000"><span>Lit : </span>';
			echo '<b>' . $c->lit_sLibelle . '</b>';
			echo '</label>
							</div>
						</div>
						
						<div class="row clearfix" style="margin-bottom:12px">	
							<div class="col-sm-9">
								<label style="color:#000"><span>Type d\'hospitalisation: </span>';
			echo '<b>' . $c->hos_sType . '</b>';
			echo '</label>
							</div>
							<div class="col-sm-3">
								<label style="color:#000"><span>Mode d\entrée: </span>';
			echo '<b>' . $c->hos_sMotif . '</b>';
			echo '</label>
							</div>
							
						</div>
					</div>
					<a href="' . site_url("impression/prescription_hospitalisation/" . $c->sea_id) . '" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
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
			
			if(trim($data["antecedent"]) == ""){
				$ante=NULL;
			}
			else{
				$ante = trim($data["antecedent"]);
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
				"csl_sAntecedent"=>$ante,
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
	
		
	public function recupConsultationCsl()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->consultation_sejour_csl($data["id"]);
			echo '<div class="post-box">
					<h3>Consultation tyroide/hypophyse<small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->csh_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo '
				<div class="row clearfix">
					<div class="col-md-6">
							<b class="media-heading col-black">Motif de consultation</b>
							<p>'; 
								if(is_null($c->csh_sMotif)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sMotif;}
					  echo '</p>
					</div>
					<div class="col-md-6">
							<b class="media-heading col-black">Résumé syndromique</b>
							<p>'; 
								if(is_null($c->csh_sResume)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sResume;}
					  echo '</p>
					</div>
					
					<div class="col-md-6">
							<b class="media-heading col-black">Anamnèse</b>
							<p> '; 
								if(is_null($c->csh_sAnamnese)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sAnamnese;} 
					 echo '</p>
					</div>
					<div class="col-md-6">
							<b class="media-heading col-black">Examen clinique</b>
							<p> '; 
								if(is_null($c->csh_sObservation)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sObservation;}
					  echo '</p>			
					  </div>					
					  
					  <div class="col-md-6">
							<b class="media-heading col-black">Tyroide - diagnostic</b>
							<p> '; 
								if(is_null($c->tyr_id)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $tyr = $this->md_parametre->recupThyroide($c->tyr_id); echo $tyr->tyr_sLib;}
					  echo '</p>			
					  </div>					
					  
					  <div class="col-md-6">
							<b class="media-heading col-black">Autre Tyroide - diagnostic</b>
							<p> '; 
								if(is_null($c->csh_sOtherTyr)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sOtherTyr;}
					  echo '</p>			
					  </div>					  
					  
					  <div class="col-md-6">
							<b class="media-heading col-black">Hypophyse - diagnostic</b>
							<p> '; 
								//if(is_null($c->hyp_id)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $hyp = $this->md_parametre->recupThyroide($c->hyp_id); echo $hyp->hyp_sLib;}
								if(is_null($c->hyp_id)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $hyp = $this->md_parametre->recupHypophyse($c->hyp_id); echo $hyp->hyp_sLib;}
					  echo '</p>			
					  </div>					
					  
					  <div class="col-md-6">
							<b class="media-heading col-black">Autre Hypophyse - diagnostic</b>
							<p> '; 
								if(is_null($c->csh_sOtherHyp)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sOtherHyp;}
					  echo '</p>			
					  </div>					  					  				  					  					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Endocriniennes</b>
							<p> '; 
								if(is_null($c->csh_sEnd)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sEnd;}
					  echo '</p>			
					  </div>					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Métaboliques</b>
							<p> '; 
								if(is_null($c->csh_sMet)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sMet;}
					  echo '</p>			
					  </div>					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Nutritionnelle</b>
							<p> '; 
								if(is_null($c->csh_sNut)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sNut;}
					  echo '</p>			
					  </div>		
					  <div class="col-md-12">
							<b class="media-heading col-black">Conclusion</b>
							<p> '; 
								if(is_null($c->csh_sCcl)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csh_sCcl;}
					  echo '</p>			
					  </div>						  
					</div>
					<a href="#'.site_url("impression/prescript_consultation/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
				</div>
			';
			
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
			$listeHyd = $this->md_patient->recup_hypothese($c->pat_id);
			$listeRed = $this->md_patient->recup_diagnostic_retenue($c->pat_id);
			echo '<div class="post-box">
					<h3>Consultation du diabète<small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->csl_dDate).'</small></h3>                                        
					<br>
				</div>';
				
			echo '
				<div class="row clearfix">
					<div class="col-md-4">
							<b class="media-heading col-black">Motif de consultation</b>
							<p>'; 
								if(is_null($c->csl_sMotif)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sMotif;}
					  echo '</p>
					</div>
					<div class="col-md-4">
							<b class="media-heading col-black">Résumé syndromique</b>
							<p>'; 
								if(is_null($c->csl_sResume)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sResume;}
					  echo '</p>
					</div>
					
					<div class="col-md-4">
							<b class="media-heading col-black">Anamnèse</b>
							<p> '; 
								if(is_null($c->csl_sAnamnese)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sAnamnese;} 
					 echo '</p>
					</div>
					<div class="col-md-4">
							<b class="media-heading col-black">Examen clinique</b>
							<p> '; 
								if(is_null($c->csl_sObservation)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sObservation;}
					  echo '</p>			
					  </div>					
					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Diagnostique</b>
							<p> '; 
								if(is_null($c->dgq_id)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $diagnos = $this->md_parametre->recupDiagnostique($c->dgq_id); echo $diagnos->dgq_sLib;}																																																																																																																																			
					  echo '</p>			
					  </div>					
					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Autre diagnostique</b>
							<p> '; 
								if(is_null($c->csl_sOtherDgq)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sOtherDgq;}
					  echo '</p>			
					  </div>					  
					  <div class="col-md-4">																																							
							<b class="media-heading col-black">Co-morbidité/FDR</b>
							<p> '; 
								if(is_null($c->com_id)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $com = $this->md_parametre->recupComordite($c->com_id); echo $com->com_sLib;}
					  echo '</p>			
					  </div>					  				  
					  <div class="col-md-4">
							<b class="media-heading col-black">Complicat./Micro-vasculaire</b>
							<p> '; 
								if(is_null($c->cmp_iMicro)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $cmp = $this->md_parametre->recupComplication($c->cmp_iMicro); echo $cmp->cmp_sLib;}
					  echo '</p>			
					  </div>					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Complicat./Macro-vasculaire</b>
							<p> '; 
								if(is_null($c->cmp_iMacro)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $cmp = $this->md_parametre->recupComplication($c->cmp_iMacro); echo $cmp->cmp_sLib;}
					  echo '</p>			
					  </div>					  
					  <div class="col-md-4">
							<b class="media-heading col-black">Complicat./Pied diabétique</b>
							<p> '; 
								if(is_null($c->cmp_iPied)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $cmp = $this->md_parametre->recupComplication($c->cmp_iPied); echo $cmp->cmp_sLib;}
					  echo '</p>			
					  </div>					  
					  <div class="col-md-8">
							<b class="media-heading col-black">Autre complication</b>
							<p> '; 
								if(is_null($c->csl_sOtherCmp)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sOtherCmp;}
					  echo '</p>			
					  </div>						  
					  <div class="col-md-12">
							<b class="media-heading col-black">Conclusion</b>
							<p> '; 
								if(is_null($c->csl_sCcl)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sCcl;}
					  echo '</p>			
					  </div>					
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
				"pat_id"=>$data["pat"],
				"sea_id"=>$sejour->sea_id
			);
			$ajout = $this->md_patient->ajout_ordonnance($donnees);
			if(!is_null($data['ordo'])){
				$donnees = array(
				"elo_sProduit"=>'pas defini',
				"elo_sPosologie"=>0,
				"elo_iDuree"=>0,
				"elo_sRenew"=>'pas defini',
				"elo_sFreq"=>'pas definie',
				"elo_sOuvert"=>$data['ordo'],
				"ord_id"=>$ajout->ord_id,
				"elo_iQuantite"=>0
				);
				$this->md_patient->ajout_element_ordonnance($donnees);
			}else{
				for($i=0;$i<count($data['med']) AND $i< count($data['qte']) AND $i< count($data['duree']) AND $i< count($data['pos']) AND $i< count($data['renew']) AND $i< count($data['freq']);$i++){
		
					$verif = $this->md_patient->verif_element_ordonnance($ajout->ord_id,$data['med'][$i],$data['qte'][$i],$data['duree'][$i],$data['pos'][$i],$data['renew'][$i],$data['freq'][$i]);
					if(!$verif){
						$donnees = array(
						"elo_sProduit"=>$data['med'][$i],
						"elo_sPosologie"=>$data['pos'][$i],
						"elo_iDuree"=>$data['duree'][$i],
						"elo_sRenew"=>$data['renew'][$i],
						"elo_sFreq"=>$data['freq'][$i],
						"elo_sOuvert"=>NULL,
						"ord_id"=>$ajout->ord_id,
						"elo_iQuantite"=>$data['qte'][$i]
						);
						$this->md_patient->ajout_element_ordonnance($donnees);
					}
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
			$verif = $this->md_patient->verif_element_ord($c->ord_id);
			echo '<div class="post-box">
					<h3>Ordonnance <a href="'.site_url("consultation/imprime_ordonnance/".$data["id"]).'"><i class="fa fa-download"></i></a><small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateTimeFr($c->ord_dDate).'</small></h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							';
							if(is_null($verif->elo_sOuvert)){
							echo'
							<thead>
								<tr>
									<th>Produit prescript</th>
									<th>Quantité</th>
									<th>Posologie</th>
									<th>Durée</th>
									<th>Renouvelable</th>
									<th>Frequence</th>
								</tr>
							</thead>';
							}else{
							echo'
							<thead>
								<tr>
									<th>Produit(s) prescript(s)</th>
								</tr>
							</thead>';
							}
							foreach($element AS $e){
								if(!is_null($e->elo_sOuvert)){
									echo '<tr>
										<td>'.nl2br($e->elo_sOuvert).'</td>
									</tr>';
								}
								else{
									if($e->elo_iDuree >1){
										$jour="jours";
									}
									else{
										$jour="jour";
									}
									echo '
										<tbody>';
									echo '<tr>
											<td>'.$e->elo_sProduit.'</td>
											<td>X '.$e->elo_iQuantite.'</td>
											<td>'.$e->elo_sPosologie.'</td>
											<td>Pendant '.$e->elo_iDuree.' '.$jour.'</td>
											<td>'.$e->elo_sRenew.'</td>
											<td>'.$e->elo_sFreq.'</td>
										</tr>';
								}
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
				"sea_id"=>$sejour->sea_id,
				"img_iPer"=>$this->session->epiphanie_diab
			);
			$insertImg = $this->md_patient->ajout_imagerie($don);
			for($i=0;$i<count($data['act_imagerie']) AND $i< count($data['duree_imagerie']) AND $i< count($data['uni_imagerie']);$i++){
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$data["duree_imagerie"][$i]." days");
				// $expiration = date("Y-m-d H:i:s",$maDate). "\n";
				$expiration = date("Y-m-d H:i:s",$maDate);
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				// $delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$delai = date("Y-m-d H:i:s",$maDatedelai);
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_imagerie'][$i],
					"pat_id"=>$data["pat_imagerie"],
					"uni_id"=>$data['uni_imagerie'][$i],
					"acm_dDate"=>$aujourdhui,
					"acm_iHos"=>0,
					"acm_iFin"=>0,
					"recep_iPer"=>0,
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
	
	
		
	public function recupAvis()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->sejour($data["id"]);
			$element = $this->md_patient->avis_sejour($data["id"]);
			// var_dump($element);
			echo '<div class="post-box">
					<h3>Demandes d\'avis de spécialiste <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></small></h3>                                        
					
				</div>';
				if(!empty($element)){
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Avis sur </th>
									<th>Spécialiste en</th>
									<th>Médecin</th>
									<th>Avis de médecin</th>
									<th>Date de réponse</th>
									<th>Imprimer</th>
								</tr>
							</thead>
							<tbody>';
							foreach($element AS $e){
							echo '<tr>
									<td>'.$e->avs_sLibelle.'</td>
									<td>'.$e->ser_sLibelle.'</td>
									<td class="text-center">'; if(!is_null($e->avs_iPer)){echo "<b>".$e->per_sNom.' '.$e->per_sPrenom."</b>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="text-center">'; if(!is_null($e->avs_sAvis)){echo $e->avs_sAvis;}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->avs_dDateAvis)){echo $this->md_config->affDateTimeFr($e->avs_dDateAvis);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td><a href="#'.site_url("impression/prescription_imagerie/".$e->avs_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a></td>
								</tr>';
								
							}
						echo' </tbody>
						</table>
					</div>';
				}
				else{
					echo "<span class='text-danger'>Les données perdues</span>";
				}
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
			// var_dump($element);
			echo '<div class="post-box">
					<h3>Prescription en imagerie <small class="text-success pull-right" style="font-size:14px"><i class="fa fa-calendar"></i> Fait '.$this->md_config->affDateFrNum($c->sea_dDate).'</small></h3>                                        
					<br>
					<div class="col-md-6"><b style="text-decoration:underline">Indication</b>'.nl2br($element->img_sDescription).'</div>
				</div>';
				if(!empty($elmt)){
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Acte imagerie</th>
									<th>Le médecin radiologue</th>
									<th>image jointe</th>
									<th>Date réalisation</th>';
								foreach($elmt AS $e){
									if(is_null($e->img_sPiece)){
									echo '<th>Télécharger</th>';
									} else {
										echo '';
									}}
									echo '<th>Rapport externe</th>
								</tr>
							</thead>
							<tbody>';
							foreach($elmt AS $e){
								if(is_null($e->img_sPiece)){
							echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td class="text-center">'; if(!is_null($e->aci_iPer)){echo $e->per_sNom.'</b> '.$e->per_sPrenom ;}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="text-center">'; if(!is_null($e->aci_sImage)){echo "<a href='".base_url($e->aci_sImage)."' target='_blank'><i class='fa fa-download'></i> Voir le fchier joint</a>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aci_dDate)){echo $this->md_config->affDateTimeFr($e->aci_dDate);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aci_sCompteRendu)){echo "<i class='fa fa-download' style='font-size:20px'></i>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">
										<form action="'.site_url("consultation/ajout_rapport").'" method="post" enctype="multipart/form-data">
											<input name="pieces_jointes" type="file" class="form-control" />
											<input type="hidden" value="'.$e->img_id.'" name="patient">
											<input type="hidden" value="'.$data["id"].'" name="sejour">
											<button class="btn bmd-btn-fab  bg-blue-grey btn-sm" type="submit">Ok</button>
										</form>
									</td>
								</tr>';
								} else {
									echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td class="text-center">A voir dans le rapport</td>
									<td class="text-center">A voir dans le rapport</td>
									<td class="text-center">A voir dans le rapport</td>
									<td class="">
										<a href="'.base_url($e->img_sPiece).'" target="_blank"><i class="fa fa-download" style="font-size:25px"></i></a>
									</td>
								</tr>';
								}
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_imagerie/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>';
				}
				else{
					echo "<span class='text-danger'>Les données perdues</span>";
				}
		}
	}
	
	public function ajout_rapport()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/fichiers/RapportExterne/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
		$nomFichier= time()."-".$_FILES["pieces_jointes"]["name"];
		$config["file_name"] = $nomFichier; 
		$this->load->library('upload',$config);
								
		if($this->upload->do_upload("pieces_jointes")){
			$image=$this->upload->data();
			$data["pieces_jointes"]="assets/fichiers/RapportExterne/".$image['file_name'];
		}
		else{
			$data["pieces_jointes"]="assets/fichiers/RapportExterne/inconnu.jpg";
		}
			$donnees = array("img_sPiece"=>$data["pieces_jointes"]);
			$ajout = $this->md_patient->maj_rapport_externe($donnees,$data["patient"]);
			$recup = $this->md_patient->sejour($data["sejour"]);
			return redirect("consultation/faire/".$recup->acm_id);
			
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
				// $expiration = date("Y-m-d H:i:s",$maDate). "\n";
				$expiration = date("Y-m-d H:i:s",$maDate);
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				// $delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$delai = date("Y-m-d H:i:s",$maDatedelai);
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_exp'][$i],
					"pat_id"=>$data["pat"],
					"uni_id"=>$data['uni'][$i],
					"acm_iHos"=>0,
					"acm_iFin"=>0,
					"recep_iPer"=>0,
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
									<th>Rapport externe</th>
								</tr>
							</thead>
							<tbody>';
							foreach($elmt AS $e){
								if(is_null($e->aef_sPiece)){
							echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td class="text-center">'; if(!is_null($e->aef_iPer)){echo "<b>".$e->per_sNom.'</b> '.$e->per_sPrenom ;}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="text-center">'; if(!is_null($e->aef_sImage)){echo "<a href='".base_url($e->aef_sImage)."' target='_blank'><i class='fa fa-download'></i> Voir le fchier joint</a>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aef_dDate)){echo $this->md_config->affDateTimeFr($e->aef_dDate);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aef_sCompteRendu)){echo nl2br($e->aef_sCompteRendu);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">
										<form action="'.site_url("consultation/ajout_rapport_exploration").'" method="post" enctype="multipart/form-data">
											<input name="pieces_jointes" type="file" class="form-control" />
											<input type="hidden" value="'.$e->aef_id.'" name="patient">
											<input type="hidden" value="'.$data["id"].'" name="sejour">
											<button class="btn bmd-btn-fab  bg-blue-grey btn-sm" type="submit">Ok</button>
										</form>
									</td>
								</tr>';
								} else {
									echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td class="text-center">A voir dans le rapport</td>
									<td class="text-center">A voir dans le rapport</td>
									<td class="text-center">A voir dans le rapport</td>
									<td class="text-center">A voir dans le rapport</td>
									<td class="">
										<a href="'.base_url($e->aef_sPiece).'" target="_blank"><i class="fa fa-download" style="font-size:25px"></i></a>
									</td>
								</tr>';
								}
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_exploration/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>';
			
		}
	}
	
	public function ajout_rapport_exploration()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/fichiers/Exploration/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
		$nomFichier= time()."-".$_FILES["pieces_jointes"]["name"];
		$config["file_name"] = $nomFichier; 
		$this->load->library('upload',$config);
								
		if($this->upload->do_upload("pieces_jointes")){
			$image=$this->upload->data();
			$data["pieces_jointes"]="assets/fichiers/Exploration/".$image['file_name'];
		}
		else{
			$data["pieces_jointes"]="assets/fichiers/Exploration/inconnu.jpg";
		}
			$donnees = array("aef_sPiece"=>$data["pieces_jointes"]);
			$ajout = $this->md_patient->maj_rapport_externe_exploration($donnees,$data["patient"]);
			$recup = $this->md_patient->sejour($data["sejour"]);
			return redirect("consultation/faire/".$recup->acm_id);
			
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
				// $expiration = date("Y-m-d H:i:s",$maDate). "\n";
				$expiration = date("Y-m-d H:i:s",$maDate);
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				// $delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$delai = date("Y-m-d H:i:s",$maDatedelai);
				
				for($j=0; $j<$data['qte_soins'][$i]; $j++){
					$donnees = array(
						"acm_iSta "=>1,
						"lac_id"=>$data['act_soins'][$i],
						"pat_id"=>$data["pat_soins"],
						"uni_id"=>$data['uni_soins'][$i],
						"acm_iHos"=>0,
						"acm_iFin"=>0,
						"recep_iPer"=>0,
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
									<td class="text-center">'; if(!is_null($e->soi_iPersonnel)){echo "<b>".$e->per_sNom.'</b> '.$e->per_sPrenom ;}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
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
									<th>Rapport externe</th>
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
									echo'</td>';
									if(is_null($e->ree_sPiece)){
									echo '<td class="">
										<form action="'.site_url("consultation/ajout_rapport_reeducation").'" method="post" enctype="multipart/form-data">
											<input name="pieces_jointes" type="file" class="form-control" />
											<input type="hidden" value="'.$e->ree_id.'" name="patient">
											<input type="hidden" value="'.$data["id"].'" name="sejour">
											<button class="btn bmd-btn-fab  bg-blue-grey btn-sm" type="submit">Ok</button>
										</form>
									</td>';
									} else {
										echo '<td class="">
										<a href="'.base_url($e->ree_sPiece).'" target="_blank"><i class="fa fa-download" style="font-size:25px"></i></a>
										</td>
								</tr>';
								}
							}
						echo' </tbody>
						</table>
						<a href="'.site_url("impression/prescription_reeducation/".$e->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a> 
					</div>';
			
		}
	}		
	
	public function ajout_rapport_reeducation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/fichiers/Reeducation/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
		$nomFichier= time()."-".$_FILES["pieces_jointes"]["name"];
		$config["file_name"] = $nomFichier; 
		$this->load->library('upload',$config);
								
		if($this->upload->do_upload("pieces_jointes")){
			$image=$this->upload->data();
			$data["pieces_jointes"]="assets/fichiers/Reeducation/".$image['file_name'];
		}
		else{
			$data["pieces_jointes"]="assets/fichiers/Reeducation/inconnu.jpg";
		}
			$donnees = array("ree_sPiece"=>$data["pieces_jointes"]);
			$ajout = $this->md_patient->maj_rapport_externe_reeducation($donnees,$data["patient"]);
			$recup = $this->md_patient->sejour($data["sejour"]);
			return redirect("consultation/faire/".$recup->acm_id);
			
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
				// $expiration = date("Y-m-d H:i:s",$maDate). "\n";	
				$expiration = date("Y-m-d H:i:s",$maDate);	
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				// $delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$delai = date("Y-m-d H:i:s",$maDatedelai);
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_reeducation'][$i],
					"pat_id"=>$data["pat_soins"],
					"uni_id"=>$data['uni_reeducation'][$i],
					"acm_iHos"=>0,
					"acm_iFin"=>0,
					"recep_iPer"=>0,
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
					"log_sActionDetail"=>"a enregistré un nouveau né pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
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
					"log_sActionDetail"=>"a enregistré un nouveau cas de décès pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
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
				"log_sActionDetail"=>"a ajouté une nouvelle diagnostique pour le patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
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
				$expiration = date("Y-m-d H:i:s",$maDate);
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai);
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_labo'][$i],
					"pat_id"=>$data["pat"],
					"uni_id"=>$data['uni'][$i],
					"acm_dDate"=>$aujourdhui,
					"acm_iHos"=>0,
					"acm_iFin"=>0,
					"recep_iPer"=>0,
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
				$acte = $this->md_parametre->recup_act($data['act_labo'][$i]);
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
			}
			
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
									<th>Patient</th>
									<th>Acte labo</th>
									<th>Prescripteur</th>
									<th>Prélévement</th>
									<th>Impression</th>
								</tr>
							</thead>
							<tbody>';
								foreach($elt AS $le){ $imprimer=false;?>
								
									<tr>
										<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom; ?></td>
										<td><?php echo $le->lac_sLibelle ; ?></td>
										<td class="text-center" style="font-size:13px">
											<?php if(is_null($le->per_sAvatar)){ ?>
												<i>La prescription est externe de l'hôpitale</i><br><br>
												<?php echo $le->ala_sTitre." ".$le->ala_sNom." ".$le->ala_sPrenom; ?>
												<br><br>
												<?php if(!is_null($le->ala_sPrescription)){ ?><a href="<?php echo base_url($le->ala_sPrescription); ?>" target="_blank"><i class="fa fa-download"></i> Télécharger</a>
												<?php }}else{echo "<b>".$le->per_sNom.'</b> '.$le->per_sPrenom;} ?>
										</td>
										<td class="">
										<?php if($le->ala_iSta==1){echo '<em style="color:red">prélèvement pas encore fait</em>';}else{?>
											<table>
												<tr>
													<th>Elément analyse</th>
													<th>Type examen</th>
													<!--<th>Numéro</th>
													<th>Code à barre</th>-->
													<th>Valeur</th>
												</tr>
												<?php $list = $this->md_laboratoire->liste_element_exament_tube($le->ala_id); foreach($list AS $l){?>
												<?php if($l->tan_iSta==3){$imprimer=true;?>
													<tr>
														<td><?=$l->ela_sLibelle;?></td>
														<td><?=$l->tex_sLibelle;?></td>
														<!--<td><?php //echo $l->tan_sNum;?></td>
														<td><img src="<?php //echo base_url($l->tan_sImg) ;?>" style="width:50%"/></td>-->
														<td><?=$l->tan_iValeur;?></td>
													</tr>
												<?php }else{ ?>
													<tr class="text-danger">
														<td><?=$l->ela_sLibelle;?><br><strong>examen pas encore fait</strong></td>
														<td><?=$l->tex_sLibelle;?></td>
														<!--<td><?php// echo $l->tan_sNum;?></td>
														<td><img src="<?php// echo base_url($l->tan_sImg) ;?>" style="width:50%"/></td>-->
													</tr>
												<?php }}?>
											</table>
											<?php }?>
										</td>
										<?php if($imprimer==true){?>
											<td><a title="imprimer le rapport" rel="" id="" class=""  href="<?php echo site_url('impression/rapportLabo/'.$le->ala_id);?>"><i class="fa fa-print" style="font-size:30px"></i></a></td>
										<?php }?>
									</tr>
								<?php
								}
								
							
							echo '</tbody>
						</table>
						<a href="'.site_url("impression/prescription_examen_laboratoire/".$c->sea_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>
					</div>';
			
		}
	}
	
	
	
	
	public function ajoutCardio()
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
				"car_iSta"=>1,
				"car_dDate"=>date("Y-m-d H:i:s"),
				"per_id"=>$this->session->epiphanie_diab,
				"sea_id"=>$sejour->sea_id
			);
			$insertCar = $this->md_patient->ajout_cardiologie($don);
			for($i=0;$i<count($data['act_cardio']) AND $i< count($data['duree']) AND $i< count($data['uni']);$i++){
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$data["duree"][$i]." days");
				$expiration = date("Y-m-d H:i:s",$maDate). "\n";
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_cardio'][$i],
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
						"car_id"=>$insertCar->car_id,
						"aca_iSta"=>1
					);
					
					$this->md_patient->ajout_prescription_cardiologique($donneeExp);
				}
				$acte = $this->md_parametre->recup_act($data['act_cardio'][$i]);
				$patient = $this->md_patient->recup_patient($data["pat"]);
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_cardiologie_car",
					"log_sIcone"=>"nouveau membre",
					"log_sAction"=>"a fait une prescription",
					"log_sActionDetail"=>"a prescrit  un examen de cardiologie au patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") pour l'acte de soins : ".$acte->lac_sLibelle,
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
			}
			
			echo "ok";
			
		}
	
	}
	
	
	
	public function ajout_rapport_laoratoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/fichiers/Laboratoire/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
		$nomFichier= time()."-".$_FILES["pieces_jointes"]["name"];
		$config["file_name"] = $nomFichier; 
		$this->load->library('upload',$config);
								
		if($this->upload->do_upload("pieces_jointes")){
			$image=$this->upload->data();
			$data["pieces_jointes"]="assets/fichiers/Laboratoire/".$image['file_name'];
		}
		else{
			$data["pieces_jointes"]="assets/fichiers/Laboratoire/inconnu.jpg";
		}
			$donnees = array("img_sPiece"=>$data["pieces_jointes"]);
			$ajout = $this->md_patient->maj_rapport_externe_labo($donnees,$data["patient"]);
			$recup = $this->md_patient->sejour($data["sejour"]);
			return redirect("consultation/faire/".$recup->acm_id);
			
	}
	
	
	public function ajoutDentaire()
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
				"sto_iSta"=>1,
				"sto_sMotif"=>$data['motif'],
				"sto_sAntecedent"=>$data['antecedent'],
				"sto_sComplement"=>$data['complement'],
				"sto_sDescription"=>$data['desc'],
				"sto_sOuverture"=>$data['ouverture'],
				"sto_sHygiene"=>$data['hygiene'],
				"sto_dDate"=>date("Y-m-d H:i:s"),
				"sea_id"=>$sejour->sea_id
			);
			$insertLab = $this->md_patient->ajout_consultation_dentaire($don);
			
			if(isset($data['dent'])){
			
				for($i=0;$i<count($data['dent']);$i++){
				
					$dent = explode('-/-',$data['dent'][$i]);
					$recupAct = $this->md_parametre->recup_act($dent[0]);
					$aujourdhui = date("Y-m-d H:i:s");
					$maDate = strtotime($aujourdhui."+ ".$recupAct->lac_iDure." days");
					$expiration = date("Y-m-d H:i:s",$maDate). "\n";
					
					$maDatedelai = strtotime($aujourdhui."+ 30 days");
					$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
					$donnees = array(
						"acm_iSta "=>1,
						"lac_id"=>$dent[0],
						"pat_id"=>$data["pat"],
						"uni_id"=>$recupAct->uni_id,
						"acm_dDate"=>$aujourdhui,
						"acm_dDateDelai"=>$delai,
						"acm_dDateExp"=>$expiration,
						"acm_sDent"=>$dent[1].', '.$dent[2],
						"acm_sStatut"=>"en attente"                                                                                  
					);
											
					$insert = $this->md_patient->ajout_orientation($donnees);
					if($insert){
						$recupAct = $this->md_patient->recup_last_acte_medical();
						$donneeExp = array( 
							"acm_id"=>$recupAct->acm_id,
							"sea_id"=>$sejour->sea_id,
							"den_iSta"=>1
						);
						
						$this->md_patient->ajout_traitement_dent($donneeExp);
					}
				}
			}
			
			echo "ok";
			
		}
	
	}
	
	public function ajoutAvisGeneraliste()
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
			for($i=0;$i<count($data['specialite']) AND count($data['motif']);$i++){
			
				$donnees = array(
					"avs_iSta "=>1,
					"avs_sLibelle"=>$data["motif"][$i],
					"avs_dDate"=>date("Y-m-d"),
					"ser_id"=>$data["specialite"][$i],                                                              
					"per_id"=>$this->session->epiphanie_diab,                                                      
					"sea_id"=>$sejour->sea_id                                                         
				);
										
				$insert = $this->md_patient->ajout_avis($donnees);
			}
			
			echo "ok";
			
		}
	
	}
	
	public function femmeEnceinte()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
			
			$donnees = array(
							"pat_iFemme"=>$data['femme']
						);
						$maj=$this->md_patient->maj_patient($donnees,$data["pat_soins"]);
				
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_nouveau_ne_nne",
					// "log_sIcone"=>"nouveau né",
					// "log_sAction"=>"a enregistré un nouveau né",
					// "log_sActionDetail"=>"a enregistré un nouveau né pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
	}	
	
	public function EnfantMalNut()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
			
			$donnees = array(
							"pat_iEnfant"=>$data['enfant']
						);
						$maj=$this->md_patient->maj_patient($donnees,$data["pat_soins"]);
				
			// if($insert){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_nouveau_ne_nne",
					// "log_sIcone"=>"nouveau né",
					// "log_sAction"=>"a enregistré un nouveau né",
					// "log_sActionDetail"=>"a enregistré un nouveau né pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);			
			// }
	}
	
	
	public function ajoutConsultat()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			
		}
		else{
			
			if(trim($data["an"]) == ""){$an=NULL;}else{$an = trim($data["an"]);}				
			if(trim($data["obs"]) == ""){$obs=NULL;}else{$obs = trim($data["obs"]);}					
			if(trim($data["resume"]) == ""){$resume=NULL;}else{$resume = trim($data["resume"]);}
			
			if($data["diagnos"] == ""){$diagnos=NULL;}else{$diagnos = $data["diagnos"];}	
			if($data["comor"] == ""){$comor=NULL;}else{$comor = $data["comor"];}	
			if($data["micro"] == ""){$micro=NULL;}else{$micro = $data["micro"];}	
			if($data["macro"] == ""){$macro=NULL;}else{$macro = $data["macro"];}	
			if($data["pied"] == ""){$pied=NULL;}else{$pied = $data["pied"];}	
			if($data["refere"] == ""){$refere=0;}else{$refere = $data["refere"];}	
			if(trim($data["autrediagnos"]) == ""){$autrediagnos=NULL;}else{$autrediagnos = trim($data["autrediagnos"]);}
			if(trim($data["autrecmp"]) == ""){$autrecmp=NULL;}else{$autrecmp = trim($data["autrecmp"]);}
			
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
			
			$verifcsl = $this->md_patient->verif_sejour_csl(1,$sejour->sea_id,date("Y-m-d"));

			if($verifcsl){
				$donnees = array("csl_iSta"=>2);
				$maj = $this->md_patient->maj_consultation($donnees, $verifcsl->csl_id);
			}
			
			$donnees = array(
				"csl_dDate"=>date("Y-m-d H:i:s"),
				"csl_dDateNoTime"=>date("Y-m-d"),
				"csl_sAnamnese"=>$an,
				"csl_sMotif"=>trim($data["motif"]),
				"csl_sObservation"=>$obs,
				"csl_sAntecedent"=>$an,
				"csl_sResume"=>$resume,
				"dgq_id"=>$diagnos,
				"com_id"=>$comor,
				"cmp_iMicro"=>$micro,
				"cmp_iMacro"=>$macro,
				"cmp_iPied"=>$pied,
				"csl_sOtherCmp"=>$autrecmp,
				"csl_sOtherDgq"=>$autrediagnos,
				"csl_iRef"=>$refere,
				"pat_id"=>$data["pat"],
				"csl_sCcl"=>trim($data["ccl"]),
				"csl_iSta"=>1,
				"sea_id"=>$sejour->sea_id
			);
			$ajout = $this->md_patient->ajout_consultation($donnees);
			
			if($data["motifRdv2"]!="" &&  $data["heureRdv2"]!="" && $data["dateRdv2"]!=""){
				$dataDir=array(
					"dir_iSta"=>1,
					"dir_sDestinataire"=>$this->session->epiphanie_diab,
					"dir_dDateEn"=>date("Y-m-d H:i:s"),
					"dir_dDate"=>$this->md_config->recupDateTime($data["dateRdv2"]),
					"dir_tHeure"=>$data["heureRdv2"],
					"per_id"=>$this->session->epiphanie_diab,
					"pat_id"=>$data["pat"],
					"sea_id"=>$sejour->sea_id,
					"dir_sObjet"=>ucfirst(trim($data["motifRdv2"]))
				);	
				$this->md_rdv->insert_rendez_vous($dataDir);
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
	
	public function ajoutConsultatCsl()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			
		}
		else{
			if(trim($data["an"]) == ""){$an=NULL;}else{$an = trim($data["an"]);}				
			if(trim($data["obs"]) == ""){$obs=NULL;}else{$obs = trim($data["obs"]);}					
			if(trim($data["resume"]) == ""){$resume=NULL;}else{$resume = trim($data["resume"]);}
			
			if($data["thy"] == ""){$thy=NULL;}else{$thy = $data["thy"];}	
			if($data["hyp"] == ""){$hyp=NULL;}else{$hyp = $data["hyp"];}	
			if(trim($data["otherThy"]) == ""){$otherThy=NULL;}else{$otherThy = trim($data["otherThy"]);}
			if(trim($data["otherHyp"]) == ""){$otherHyp=NULL;}else{$otherHyp = trim($data["otherHyp"]);}
			if(trim($data["endo"]) == ""){$endo=NULL;}else{$endo = trim($data["endo"]);}
			if(trim($data["meta"]) == ""){$meta=NULL;}else{$meta = trim($data["meta"]);}
			if(trim($data["nutri"]) == ""){$nutri=NULL;}else{$nutri = trim($data["nutri"]);}
			
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
			
			
			$verifcsl = $this->md_patient->verif_sejour_csh(1,$sejour->sea_id,date("Y-m-d"));

			if($verifcsl){
				$donnees = array("csh_iSta"=>2);
				$maj = $this->md_patient->maj_consultationCsh($donnees, $verifcsl->csh_id);
			}
			
			
			
			$donnees = array(
				"csh_dDate"=>date("Y-m-d H:i:s"),
				"csh_dDateNoTime"=>date("Y-m-d"),
				"csh_sAnamnese"=>$an,
				"csh_sMotif"=>trim($data["motif"]),
				"csh_sObservation"=>$obs,
				"csh_sAntecedent"=>$an,
				"csh_sResume"=>$resume,
				"tyr_id"=>$thy,
				"hyp_id"=>$hyp,
				"csh_sOtherTyr"=>$otherThy,
				"csh_sOtherHyp"=>$otherHyp,
				"csh_sEnd"=>$endo,
				"csh_sMet"=>$meta,
				"csh_sNut"=>$nutri,
				"csh_sCcl"=>trim($data["ccl"]),
				"pat_id"=>$data["pat"],
				"csh_iSta"=>1,
				"sea_id"=>$sejour->sea_id
			);
			$ajout = $this->md_patient->ajout_consultationCsl($donnees);
			


			if($data["motifRdv2"]!="" &&  $data["heureRdv2"]!="" && $data["dateRdv2"]!=""){
				$dataDir=array(
					"dir_iSta"=>1,
					"dir_sDestinataire"=>$this->session->epiphanie_diab,
					"dir_dDateEn"=>date("Y-m-d H:i:s"),
					"dir_dDate"=>$this->md_config->recupDateTime($data["dateRdv2"]),
					"dir_tHeure"=>$data["heureRdv2"],
					"per_id"=>$this->session->epiphanie_diab,
					"pat_id"=>$data["pat"],
					"sea_id"=>$sejour->sea_id,
					"dir_sObjet"=>ucfirst(trim($data["motifRdv2"]))
				);	
				$this->md_rdv->insert_rendez_vous($dataDir);
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
	
}
