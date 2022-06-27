<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospitalisation extends CI_Controller {

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
		$this->load->view('app/diabetologie/page-liste-hospitalisation');
	}

	public function maternite()
	{
		$this->load->view('app/maternite/page-liste-hospitalisation');
	}
	
	public function patient_hospitalise($id)
	{
		$donneesAcm = array("acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/diabetologie/page-patient-hospitalise',array("h"=>$id));
	}
	
	
	public function patient_materne($id)
	{
		$donneesAcm = array("acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/maternite/page-patient-hospitalise',array("h"=>$id));
	}
	
	
	public function soin($id)
	{
		$this->load->view('app/infirmerie/page-hospitalisation-soin',array("soi_id"=>$id));
	}
	
	public function protocole()
	{
		$this->load->view('app/infirmerie/page-hospitalisation-liste-protocole');
	}
		
	public function journal()
	{
		$this->load->view('app/medecin_generaliste/page-journal-hospitalisation');
	}
				
	public function journal_maternite()
	{
		$this->load->view('app/maternite/page-journal-hospitalisation');
	}
		
	public function voir($id)
	{
		$this->load->view('app/medecin_generaliste/page-rapport-hospitalise',array("h"=>$id));
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
				$acte = $this->md_parametre->recup_act($data['act_soins'][$i]);
			}
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
			echo "ok";
			
		}
	
	}
	
	
	
	public function ajoutDocument()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
		}
		else{
			if( $_FILES["link"]["name"]!=""){
				$verifTaille = $this->md_config->sizeImage($_FILES["link"],500);
				if(!$verifTaille){
					echo "La taille du document ne doit pas dépasser les 500 Ko";
				}
				else{
					$config["upload_path"] =  './assets/documents/';
					$config["allowed_types"] = 'png|jpg|jpeg|PNG|JPG|JPEG|pdf|PDF|docx|DOCX';
					$nomImage= time()."-".$_FILES["link"]["name"];
					$config["file_name"] = $nomImage; 
					$verifImage = $this->md_config->uploadFichier($_FILES["link"]);
					
					if(!$verifImage){
						echo "Les formats de document autorisés sont .png,jpg,jpeg,PNG,JPG,JPEG,pdf,PDF,docx,DOCX";
					}
					else{
						$this->load->library('upload',$config);
					
						if($this->upload->do_upload("link")){
							$doc=$this->upload->data();
							$data["link"]="assets/documents/".$doc['file_name'];
						}
						
						
						/*$verif = $this->md_patient->verif_sejour($data["id"],date("Y-m-d"));
						if(!$verif){
							$donneesSejour = array(
								"acm_id"=>$data["id"],
								"sea_dDate"=>date("Y-m-d")
							);
							$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
						}
						else{
							$sejour = $verif;
						}*/
						
						/*if($data['indication'] == ""){
							$data['indication']=NULL;
						}*/
						
						$donnees = array(
							"doc_iSta"=>1,
							"doc_sLibelle"=>$data['lib'],
							"doc_sLink"=>$data['link'],
							"doc_dDate"=>date("Y-m-d H:i:s"),
							"acm_id"=>$data["id"],
							"pat_id"=>$data['pat'],
							"per_id"=>$this->session->epiphanie_diab
						);
						$insert = $this->md_patient->ajout_Document($donnees);
						$patient = $this->md_patient->recup_patient($data["pat"]);
						$log = array(
							"log_iSta"=>0,
							"per_id"=>$this->session->epiphanie_diab,
							"log_sTable"=>"t_document_doc",
							"log_sIcone"=>"nouveau document",
							"log_sAction"=>"a ajouter un nouveau document",
							"log_sActionDetail"=>"Le document medical du patient : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.") a été ajouter ",
							"log_dDate"=>date("Y-m-d H:i:s")
						);
						$this->md_connexion->rapport($log);
						echo "ok";
					}
				}
			}
			
		}
	
	}
	
	
	public function priseEnCharge()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/fichiers/charge/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
		$nomFichier= time()."-".$_FILES["pieces_jointes"]["name"];
		$config["file_name"] = $nomFichier; 
		$this->load->library('upload',$config);
								
		if($this->upload->do_upload("pieces_jointes")){
			$image=$this->upload->data();
			$data["pieces_jointes"]="assets/fichiers/charge/".$image['file_name'];
		}
		else{
			$data["pieces_jointes"]="assets/fichiers/charge/inconnu.jpg";
		}

		
			$donnees = array(
				"pch_iSta"=>1,
				"pat_id"=>$data["pat"],
				"hos_id"=>$data["hos"],
				"pch_sCivilite"=>$data["civilite"],
				"pch_sNom"=>ucfirst(trim($data["nom"])),
				"pch_sPrenom"=>ucfirst(trim($data["prenom"])),
				"pch_sAdresse"=>$data["adresse"],
				"pch_sFiliation"=>$data["filiation"],
				"pch_sProfession"=>$data["profession"],
				"pch_sEmployeur"=>$data["employeur"],
				"pch_sLivret"=>$data["livret"],
				"pch_dDateLivret"=>$this->md_config->recupDateTime($data["dateLivret"]),
				"pch_sCarnet"=>$data["carnet"],
				"pch_dDateCarnet"=>$this->md_config->recupDateTime($data["dateCarnet"]),
				"pch_sAutres"=>$data["autres"],
				"pch_sPiece"=>$data["pieces_jointes"],
				"pch_sPersonne"=>ucfirst(trim($data["personne"])),
				"pch_sAdressePer"=>$data['adressePers']
			);
			$insertImg = $this->md_patient->ajout_prise_en_charge($donnees);
			echo $data["hos"];
			
			// echo $this->md_config->recupDateTime($data["dateLivret"]);
	
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
									<th>Compte rendu</th>
								</tr>
							</thead>
							<tbody>';
							foreach($elmt AS $e){
							echo '<tr>
									<td>'.$e->lac_sLibelle.'</td>
									<td class="text-center">'; if(!is_null($e->aci_iPer)){echo "<img src='".base_url($e->per_sAvatar)."' width='80' height='80'/><br><b>".$e->per_sNom.'</b> '.$e->per_sPrenom." <br>(".$e->per_sMatricule.")";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="text-center">'; if(!is_null($e->aci_sImage)){echo "<a href='".base_url($e->aci_sImage)."' target='_blank'><i class='fa fa-download'></i> Voir le fchier joint</a>";}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aci_dDate)){echo $this->md_config->affDateTimeFr($e->aci_dDate);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
									<td class="">'; if(!is_null($e->aci_sCompteRendu)){echo nl2br($e->aci_sCompteRendu);}else{echo "<span style='color:red'>pas encore renseigné</span>";} echo '</td>
								</tr>';
							}
						echo' </tbody>
						</table>
					</div>';
			
		}
	}
	
	
	public function ajoutActeInfirmier2()
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
						"acm_iHosId"=>$data['hos'],
						"lac_id"=>$data['act_soins'][$i],
						"pat_id"=>$data["pat_soins"],
						"uni_id"=>$data['uni_soins'][$i],
						"acm_iFin"=>0,
						"recep_iPer"=>0,
						"acm_dDate"=>$aujourdhui,
						"acm_dDateDelai"=>$delai,
						"acm_dDateExp"=>$expiration,
						"acm_iHos"=>1,
						"acm_sStatut "=>"en attente"                                                                                  
					);
					$insert = $this->md_patient->ajout_orientation($donnees);
					if($insert){
						if(trim($data['cons'][$i])==""){
							$data['cons'][$i]=NULL;
						}
						$recupAct = $this->md_patient->recup_last_acte_medical();
						$donneeSoins = array(
							"soi_iSta"=>3,
							"acm_id"=>$recupAct->acm_id,
							"sea_id"=>$sejour->sea_id,
							"hos_id"=>$data['hos'],
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
	
	
	public function ajoutActeImagerie2()
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
					"acm_iFin"=>0,/*Ajout*/
					"recep_iPer"=>0,/*Ajout*/
					"acm_dDate"=>$aujourdhui,
					"acm_dDateDelai"=>$delai,
					"acm_dDateExp"=>$expiration,
					"acm_iHosId"=>$data['hos'],
					"acm_iHos"=>1,
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
	
	
	public function ajoutLabo2()
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
				// $expiration = date("Y-m-d H:i:s",$maDate). "\n";
				$expiration = date("Y-m-d H:i:s",$maDate);
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				// $delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$delai = date("Y-m-d H:i:s",$maDatedelai);
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['act_labo'][$i],
					"pat_id"=>$data["pat"],
					"uni_id"=>$data['uni'][$i],
					"acm_iFin"=>0,/*Ajout*/
					"recep_iPer"=>0,/*Ajout*/
					"acm_dDate"=>$aujourdhui,
					"acm_dDateDelai"=>$delai,
					"acm_dDateExp"=>$expiration,
					"acm_iHosId"=>$data['hos'],
					"acm_iHos"=>1,
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
	
	
	
	public function ajoutActeReeducation2()
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
					"acm_iFin"=>0,
					"recep_iPer"=>0,
					"acm_dDate"=>$aujourdhui,
					"acm_dDateExp"=>$expiration,
					"acm_dDateDelai"=>$delai,
					"acm_iHosId"=>$data['hos'],
					"acm_iHos"=>1,
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
	
	
	public function ajoutActeExp2()
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
					"acm_iFin"=>0,
					"recep_iPer"=>0,
					"acm_dDate"=>$aujourdhui,
					"acm_dDateDelai"=>$delai,
					"acm_dDateExp"=>$expiration,
					"acm_iHosId"=>$data['hos'],
					"acm_iHos"=>1,
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
	
	
	
	public function casDeces_2()
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
			$recupAct = $this->md_patient->acm_medical($data["id"]);
			$donneesCaisse = array(
				"acm_iSta"=>1,
				"acm_iHos"=>1,
				"acm_iHosId"=>$data['hos'],
				"acm_iCoutHos"=>$data["cout"],
				"pat_id"=>$data["pat_soins"],
				"uni_id"=>$recupAct->uni_id,
				"acm_dDate"=>date("Y-m-d H:i:s"),
				"acm_sStatut "=>"en attente"                                                                                  
			);
			
			$this->md_patient->ajout_orientation($donneesCaisse);
			
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
			$this->md_patient->maj_hospitalisation(array("hos_iSta"=>2,"hos_dDateSortie"=>date("Y-m-d"),"hos_iMotifSortie"=>"Décès"),$data['hos']);
			
			$donn = array("pat_iSta"=>0);
			$this->md_patient->maj_deces($donn, $data['pat_soins']);
			$hos = $this->md_patient->hospitalisation($data['hos']);
			$this->md_parametre->maj_lit(array("lit_iOccupe"=>0),$hos->lit_id);
			
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
			
			echo $data['hos'];
	}
		
			
	
	public function fin_hospitalisation()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
			
		$recupAct = $this->md_patient->acm_medical($data["id"]);
		$donneesCaisse = array(
			"acm_iSta"=>1,
			"acm_iHos"=>1,
			"acm_iFin"=>0,/*Ajout*/
			"recep_iPer"=>0,/*Ajout*/
			"acm_iHosId"=>$data["hos"],
			"acm_iCoutHos"=>$data["cout"],
			"pat_id"=>$data["pat"],
			"uni_id"=>$recupAct->uni_id,
			"acm_dDate"=>date("Y-m-d H:i:s"),
			"acm_sStatut "=>"en attente"                                                                                  
		);
		
		$this->md_patient->ajout_orientation($donneesCaisse);
		
		$insert = $this->md_patient->maj_hospitalisation(array("hos_iSta"=>2,"hos_dDateSortie"=>date("Y-m-d H:i:s"),"hos_iMotifSortie"=>$data["motif"]),$data['hos']);
		$hos = $this->md_patient->hospitalisation($data['hos']);
		$this->md_parametre->maj_lit(array("lit_iOccupe"=>0),$hos->lit_id);
		$patient = $this->md_patient->recup_patient($data["pat"]);
		if($insert){
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_hospitalisation_hos",
				"log_sIcone"=>"modification",
				"log_sAction"=>"a mis fin à l'hospitalisation",
				"log_sActionDetail"=>"a mis fin à l'hospitalisation pour : ".$patient->pat_sNom." ".$patient->pat_sPrenom."(".$patient->pat_sMatricule.")",
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);			
		}
		echo $data['hos'];
		// var_dump($recupAct);
	}
	
	
}
