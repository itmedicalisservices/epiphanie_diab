<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

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
	 
	 
	public function liste_dossier_patient()
	{
		$this->load->view('app/medecin_generaliste/page-liste-patient');
	}	
	
	public function dossier_patient($id)
	{
		$this->load->view('app/medecin_generaliste/page-details-dossiers-patients',array("id"=>$id));
	}
	 
	 
	public function nouveau_search()
	{
		$this->load->view('app/accueil/page-nouveau-patient-search');
	}	
	
	public function nouveau()
	{
		$this->load->view('app/accueil/page-nouveau-patient');
	}	
	
	public function liste_modifier_patient()
	{
		$this->load->view('app/accueil/page-liste-modifier-patient');
	}
	
	
	public function liste()
	{
		$this->load->view('app/accueil/page-liste-patient');
	}
	
	
	public function deces()
	{
		$this->load->view('app/accueil/page-liste-patient-deces');
	}
	
	
	public function complement($id)
	{
		$this->load->view('app/accueil/page-complement-patient',array("id"=>$id));
	}
	
	public function accueil($id)
	{
		$this->load->view('app/accueil/page-accueil-patient',array("id"=>$id));
	}
	
	public function voir($id)
	{
		$this->load->view('app/accueil/page-detail-patient',array("id"=>$id));
	}
	
	public function modifier($id)
	{
		$this->load->view('app/accueil/page-modifier-patient',array("id"=>$id));
	}
	
	
	public function ajoutPatient()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("patient/nouveau");
			// var_dump($data);
		}
		else{
			if(trim($data["prenom"]) == ""){
				$prenom=NULL;
			}
			else{
				$prenom=ucwords(trim($data["prenom"]));
			}
			
			if(trim($data["adresse"]) == ""){
				$adresse=NULL;
			}
			else{
				$adresse=trim($data["adresse"]);
			}			
			
			if(trim($data["natio"]) == ""){
				$natio=NULL;
			}
			else{
				$natio=trim($data["natio"]);
			}
			
			if(trim($data["date_naiss"]) == ""){
				$date_naiss=NULL;
			}
			else{
				$date_naiss = $this->md_config->recupDateTime($data["date_naiss"]);
			}			
			
			// if(trim($data["dateEnr"]) == ""){
				// $dateEnr=NULL;
			// }
			// else{
				// $dateEnr1 = $this->md_config->recupDateTime($data["dateEnr"]);
				// $dateEnr = $dateEnr1.date("H:i:s");
			// }
			
			if(trim($data["profession"]) == ""){
				$data["profession"]=NULL;
			}	
			
			if(trim($data["activite"]) == ""){
				$data["activite"]=NULL;
			}			
			
			// if(trim($data["cpa"]) == ""){
				// $data["cpa"]=0;
			// }
			
			if($data["genre"]=="H"){
				$avatar = "assets/images/patients/avatar-homme.png";
				$civilite = 'M.';
			}else{
				$avatar = "assets/images/patients/avatar-femme.png";
				$civilite = 'Mme';
			}	
			
			if($data["otherPhone"]==""){
				$data["otherPhone"] == NULL;
			}elseif(!is_numeric($data["otherPhone"])){
				echo "Ceci n'est pas un numéro de téléphone valide";
				return;
			}else{
				$formatTel = $this->md_config->formatPhoneCongo(trim($data["otherPhone"]));
				if($formatTel == false){
					echo "Ce numéro de téléphone n'est pas valide en république du Congo";
					return;
				}else{
					$data["otherPhone"] = "+242".$formatTel;
				}
			}
			
			if(trim($data["tel"]) !="" AND $_FILES["photo"]["name"]==""){
				if(!is_numeric($data["tel"])){
					echo "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone";
				}
				else{
					$formatTel = $this->md_config->formatPhoneCongo(trim($data["tel"]));
					if($formatTel == false){
						echo "Ce numéro de téléphone n'est pas valable en république du Congo";
					}
					else{

						$verifPhone = $this->md_patient->verif_tel("+242".$formatTel);
						if(!$verifPhone){
								
							$donnees = array(
								"pat_iSta"=>1,
								"pat_sNom"=>strtoupper(trim($data["nom"])),
								"pat_sPrenom"=>$prenom,
								"pat_sAdresse"=>$adresse,
								"pat_sSexe"=>$data["genre"],
								"pat_sTel"=>"+242".$formatTel,
								"pat_sOtherPhone"=>$data["otherPhone"],
								"pat_sCivilite"=>$civilite,
								"pat_sNatio"=>$data["natio"],
								"pat_sSituationMat"=>$data["situation"],
								"pat_sProfession"=>ucfirst(trim($data["profession"])),
								"pat_dDateNaiss"=>$date_naiss,
								"cpa_id"=>0,
								"pat_iFemme"=>0,
								"pat_iEnfant"=>0,
								"pat_sAct"=>$data["activite"],
								"pat_sAvatar"=>$avatar,
								"pat_dDateEnreg"=>date("Y-m-d H:i:s")
							);
							$ajout=$this->md_patient->ajout_patient($donnees);
							
							if($ajout){
								$log = array(
									"log_iSta"=>0,
									"per_id"=>$this->session->diabcare,
									"log_sTable"=>"t_patients_pat",
									"log_sIcone"=>"nouveau patient",
									"log_sAction"=>"a ajouté un nouveau patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
									"log_dDate"=>date("Y-m-d H:i:s")
								);
								$this->md_connexion->rapport($log);
								echo $ajout;
							}
						}
						else{
							echo "Ce numéro de téléphone est déja enregistré pour un autre patient";
						}
						
					}
				}
			}
			else if(trim($data["tel"]) !="" AND $_FILES["photo"]["name"]!=""){
				if(!is_numeric($data["tel"])){
					echo "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone";
				}
				else{
					$formatTel = $this->md_config->formatPhoneCongo(trim($data["tel"]));
					if($formatTel == false){
						echo "Ce numéro de téléphone n'est pas valable en république du Congo";
					}
					else{

						$verifPhone = $this->md_patient->verif_tel("+242".$formatTel);
						if(!$verifPhone){
							$verifTaille = $this->md_config->sizeImage($_FILES["photo"],150);
							if(!$verifTaille){
								echo "La taille de l'image ne doit pas dépasser les 150 Ko";
							}
							else{
								$config["upload_path"] =  './assets/images/patients/';
								$config["allowed_types"] = 'jpg|png|jpeg';
								$nomImage= time()."-".$_FILES["photo"]["name"];
								$config["file_name"] = $nomImage; 
								$verifImage = $this->md_config->uploadImage($_FILES["photo"]);
								
								if(!$verifImage){
									echo "Les formats de l'image autorisés sont .jpg, .jpeg, .png";
								}
								else{
									$this->load->library('upload',$config);
								
									if($this->upload->do_upload("photo")){
										$image=$this->upload->data();
										$data["photo"]="assets/images/patients/".$image['file_name'];
									}
									else{
										$data["photo"]=$avatar;
									}

									$donnees = array(
										"pat_iSta"=>1,
										"pat_sNom"=>strtoupper(trim($data["nom"])),
										"pat_sPrenom"=>$prenom,
										"pat_sAdresse"=>$adresse,
										"pat_sSexe"=>$data["genre"],
										"pat_sAvatar"=>$data["photo"],
										"pat_sTel"=>"+242".$formatTel,
										"pat_sOtherPhone"=>$data["otherPhone"],
										"pat_sCivilite"=>$civilite,
										"pat_sSituationMat"=>$data["situation"],
										"pat_sProfession"=>ucfirst(trim($data["profession"])),
										"pat_dDateNaiss"=>$date_naiss,
										"cpa_id"=>0,
										"pat_iFemme"=>0,
										"pat_iEnfant"=>0,
										"pat_sAct"=>$data["activite"],
										"pat_sAvatar"=>$data["photo"],
										"pat_dDateEnreg"=>date("Y-m-d H:i:s")
									);
									$ajout=$this->md_patient->ajout_patient($donnees);
									
									if($ajout){
										$log = array(
											"log_iSta"=>0,
											"per_id"=>$this->session->diabcare,
											"log_sTable"=>"t_patients_pat",
											"log_sIcone"=>"nouveau patient",
											"log_sAction"=>"a ajouté un nouveau patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
											"log_dDate"=>date("Y-m-d H:i:s")
										);
										$this->md_connexion->rapport($log);
										echo $ajout;
									}
								}
							}
						}
						else{
							echo "Ce numéro de téléphone est déja enregistré pour un autre patient";
						}
						
					}
				}
	
			}
			else if(trim($data["tel"]) =="" AND $_FILES["photo"]["name"]!=""){

				$verifTaille = $this->md_config->sizeImage($_FILES["photo"],150);
				if(!$verifTaille){
					echo "La taille de l'image ne doit pas dépasser les 150 Ko";
				}
				else{
					$config["upload_path"] =  './assets/images/patients/';
					$config["allowed_types"] = 'jpg|png|jpeg';
					$nomImage= time()."-".$_FILES["photo"]["name"];
					$config["file_name"] = $nomImage; 
					$verifImage = $this->md_config->uploadImage($_FILES["photo"]);
					
					if(!$verifImage){
						echo "Les formats de l'image autorisés sont .jpg, .jpeg, .png";
					}
					else{
						$this->load->library('upload',$config);
					
						if($this->upload->do_upload("photo")){
							$image=$this->upload->data();
							$data["photo"]="assets/images/patients/".$image['file_name'];
						}
						else{
							$data["photo"]="assets/images/patients/inconnu.jpg";
						}

						$donnees = array(
							"pat_iSta"=>1,
							"pat_sNom"=>strtoupper(trim($data["nom"])),
							"pat_sPrenom"=>$prenom,
							"pat_sAdresse"=>$adresse,
							"pat_sSexe"=>$data["genre"],
							"pat_sAvatar"=>$data["photo"],
							"pat_sOtherPhone"=>$data["otherPhone"],
							"pat_sCivilite"=>$civilite,
							"pat_sSituationMat"=>$data["situation"],
							"pat_sProfession"=>ucfirst(trim($data["profession"])),
							"pat_dDateNaiss"=>$date_naiss,
							"cpa_id"=>0,
							"pat_iFemme"=>0,
							"pat_iEnfant"=>0,
							"pat_sAct"=>$data["activite"],
							"pat_sAvatar"=>$data["photo"],
							"pat_dDateEnreg"=>date("Y-m-d H:i:s")
						);
						$ajout=$this->md_patient->ajout_patient($donnees);
						
						if($ajout){
							$log = array(
								"log_iSta"=>0,
								"per_id"=>$this->session->diabcare,
								"log_sTable"=>"t_patients_pat",
								"log_sIcone"=>"nouveau patient",
								"log_sAction"=>"a ajouté un nouveau patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
								"log_dDate"=>date("Y-m-d H:i:s")
							);
							$this->md_connexion->rapport($log);
							echo $ajout;
						}
					}
				}
						
			}
			else{
				$donnees = array(
					"pat_iSta"=>1,
					"pat_sNom"=>strtoupper(trim($data["nom"])),
					"pat_sPrenom"=>$prenom,
					"pat_sAdresse"=>$adresse,
					"pat_sSexe"=>$data["genre"],
					"pat_sCivilite"=>$civilite,
					"pat_sOtherPhone"=>$data["otherPhone"],
					"pat_sSituationMat"=>$data["situation"],
					"pat_sProfession"=>ucfirst(trim($data["profession"])),
					"pat_dDateNaiss"=>$date_naiss,
					"cpa_id"=>0,
					"pat_iFemme"=>0,
					"pat_iEnfant"=>0,
					"pat_sAct"=>$data["activite"],
					"pat_sAvatar"=>$avatar,
					"pat_dDateEnreg"=>date("Y-m-d H:i:s")
				);
				$ajout=$this->md_patient->ajout_patient($donnees);	
				
				
				if($ajout){
						$log = array(
							"log_iSta"=>0,
							"per_id"=>$this->session->diabcare,
							"log_sTable"=>"t_patients_pat",
							"log_sIcone"=>"nouveau patient",
							"log_sAction"=>"a ajouté un nouveau patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
							"log_dDate"=>date("Y-m-d H:i:s")
						);
						$this->md_connexion->rapport($log);
						echo $ajout;
					}
			}
			
			// if($ajout){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_patients_pat",
					// "log_sIcone"=>"nouveau patient",
					// "log_sAction"=>"a ajouté un nouveau patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				// echo $ajout;
			// }
			
		}
	}
	
	
	public function modifierPatient()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("patient/liste");
			// var_dump($data);
		}
		else{
			if(trim($data["prenom"]) == ""){
				$prenom=NULL;
			}
			else{
				$prenom=ucwords(trim($data["prenom"]));
			}
			
			if(trim($data["adresse"]) == ""){
				$adresse=NULL;
			}
			else{
				$adresse=trim($data["adresse"]);
			}			
			
			if(trim($data["natio"]) == ""){
				$natio=NULL;
			}
			else{
				$natio=trim($data["natio"]);
			}
			
			// if(trim($data["cpa"]) == ""){
				// $data["cpa"]=0;
			// }
			
			if(trim($data["date_naiss"]) == ""){
				$date_naiss=NULL;
			}
			else{
				// $date_naiss = $this->md_config->recupDateTime($data["date_naiss"]);/*Avant*/
				$date_naiss = $data["date_naiss"]; /*après*/
			}
			
			if($data["genre"]=="H"){
				$civilite = 'M.';
			}else{
				$civilite = 'Mme';
			}
			
			if(trim($data["activite"]) == ""){
				$data["activite"]=NULL;
			}
			
			if($data["otherPhone"]==""){
				$data["otherPhone"] == NULL;
			}elseif(!is_numeric($data["otherPhone"])){
				echo "Ceci n'est pas un numéro de téléphone valide";
				return;
			}else{
				$formatTel = $this->md_config->formatPhoneCongo(trim($data["otherPhone"]));
				if($formatTel == false){
					echo "Ce numéro de téléphone n'est pas valide en république du Congo";
					return;
				}else{
					$data["otherPhone"] = "+242".$formatTel;
				}
			}
			
			
			if(trim($data["tel"]) !="" AND $_FILES["photo"]["name"]==""){
				if(!is_numeric($data["tel"])){
					echo "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone";
				}
				else{
					$formatTel = $this->md_config->formatPhoneCongo(trim($data["tel"]));
					if($formatTel == false){
						echo "Ce numéro de téléphone n'est pas valable en république du Congo";
					}
					else{

						$verifPhone = $this->md_patient->verif_tel_edit("+242".$formatTel,$data["id"]);
						if(!$verifPhone){
								
							$donnees = array(
								"pat_sNom"=>strtoupper(trim($data["nom"])),
								"pat_sPrenom"=>$prenom,
								"pat_sAdresse"=>$adresse,
								"pat_sSexe"=>$data["genre"],
								"pat_sTel"=>"+242".$formatTel,
								"pat_sCivilite"=>$civilite,
								"pat_sNatio"=>$natio,
								"cpa_id"=>0,
								"pat_sAct"=>$data["activite"],
								"pat_sOtherPhone"=>$data["otherPhone"],
								"pat_sSituationMat"=>$data["situation"],
								"pat_sProfession"=>ucfirst(trim($data["profession"])),
								"pat_dDateNaiss"=>$date_naiss
							);
							$modifier=$this->md_patient->maj_patient($donnees,$data["id"]);
						}
						else{
							echo "Ce numéro de téléphone est déja enregistré pour un autre patient";
						}
						
					}
				}
					
				
			}
			else if(trim($data["tel"]) !="" AND $_FILES["photo"]["name"]!=""){
				if(!is_numeric($data["tel"])){
					echo "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone";
				}
				else{
					$formatTel = $this->md_config->formatPhoneCongo(trim($data["tel"]));
					if($formatTel == false){
						echo "Ce numéro de téléphone n'est pas valable en république du Congo";
					}
					else{

						$verifPhone = $this->md_patient->verif_tel_edit("+242".$formatTel,$data["id"]);
						if(!$verifPhone){
							$verifTaille = $this->md_config->sizeImage($_FILES["photo"],150);
							if(!$verifTaille){
								echo "La taille de l'image ne doit pas dépasser les 150 Ko";
							}
							else{
								$config["upload_path"] =  './assets/images/patients/';
								$config["allowed_types"] = 'jpg|png|jpeg';
								$nomImage= time()."-".$_FILES["photo"]["name"];
								$config["file_name"] = $nomImage; 
								$verifImage = $this->md_config->uploadImage($_FILES["photo"]);
								
								if(!$verifImage){
									echo "Les formats de l'image autorisés sont .jpg, .jpeg, .png";
								}
								else{
									$this->load->library('upload',$config);
								
									if($this->upload->do_upload("photo")){
										$image=$this->upload->data();
										$data["photo"]="assets/images/patients/".$image['file_name'];
									}
									else{
										$data["photo"]=$data["photo2"];
									}

									$donnees = array(
										"pat_sNom"=>strtoupper(trim($data["nom"])),
										"pat_sPrenom"=>$prenom,
										"pat_sAdresse"=>$adresse,
										"pat_sSexe"=>$data["genre"],
										"pat_sAvatar"=>$data["photo"],
										"pat_sTel"=>"+242".$formatTel,
										"pat_sCivilite"=>$civilite,
										"pat_sNatio"=>$natio,
										"cpa_id"=>0,
										"pat_sAct"=>$data["activite"],
										"pat_sOtherPhone"=>$data["otherPhone"],
										"pat_sSituationMat"=>$data["situation"],
										"pat_sProfession"=>ucfirst(trim($data["profession"])),
										"pat_dDateNaiss"=>$date_naiss,
										"pat_sAvatar"=>$data["photo"]
									);
									$modifier=$this->md_patient->maj_patient($donnees,$data["id"]);
									
									if($modifier){	
										$log = array(
											"log_iSta"=>0,
											"per_id"=>$this->session->diabcare,
											"log_sTable"=>"t_patients_pat",
											"log_sIcone"=>"modification",
											"log_sAction"=>"a modifié le patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
											"log_dDate"=>date("Y-m-d H:i:s")
										);
										$this->md_connexion->rapport($log);
										echo "ok";
									}
								}
							}
						}
						else{
							echo "Ce numéro de téléphone est déja enregistré pour un autre patient";
						}
						
					}
				}
	
			}
			else if(trim($data["tel"]) =="" AND $_FILES["photo"]["name"]!=""){

				$verifTaille = $this->md_config->sizeImage($_FILES["photo"],150);
				if(!$verifTaille){
					echo "La taille de l'image ne doit pas dépasser les 150 Ko";
				}
				else{
					$config["upload_path"] =  './assets/images/patients/';
					$config["allowed_types"] = 'jpg|png|jpeg';
					$nomImage= time()."-".$_FILES["photo"]["name"];
					$config["file_name"] = $nomImage; 
					$verifImage = $this->md_config->uploadImage($_FILES["photo"]);
					
					if(!$verifImage){
						echo "Les formats de l'image autorisés sont .jpg, .jpeg, .png";
					}
					else{
						$this->load->library('upload',$config);
					
						if($this->upload->do_upload("photo")){
							$image=$this->upload->data();
							$data["photo"]="assets/images/patients/".$image['file_name'];
						}
						else{
							$data["photo"]=$data["photo2"];
						}

						$donnees = array(
							"pat_sNom"=>strtoupper(trim($data["nom"])),
							"pat_sPrenom"=>$prenom,
							"pat_sAdresse"=>$adresse,
							"pat_sSexe"=>$data["genre"],
							"pat_sAvatar"=>$data["photo"],
							"pat_sCivilite"=>$civilite,
							"pat_sNatio"=>$natio,
							"cpa_id"=>0,
							"pat_sAct"=>$data["activite"],
							"pat_sOtherPhone"=>$data["otherPhone"],
							"pat_sSituationMat"=>$data["situation"],
							"pat_sProfession"=>ucfirst(trim($data["profession"])),
							"pat_dDateNaiss"=>$date_naiss,
							"pat_sAvatar"=>$data["photo"]
						);
						$modifier=$this->md_patient->maj_patient($donnees,$data["id"]);
						
						if($modifier){	
							$log = array(
								"log_iSta"=>0,
								"per_id"=>$this->session->diabcare,
								"log_sTable"=>"t_patients_pat",
								"log_sIcone"=>"modification",
								"log_sAction"=>"a modifié le patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
								"log_dDate"=>date("Y-m-d H:i:s")
							);
							$this->md_connexion->rapport($log);
							echo "ok";
						}
					}
				}
						
			}
			else{
				$donnees = array(
					"pat_sNom"=>strtoupper(trim($data["nom"])),
					"pat_sPrenom"=>$prenom,
					"pat_sAdresse"=>$adresse,
					"pat_sSexe"=>$data["genre"],
					"pat_sCivilite"=>$civilite,
					"pat_sSituationMat"=>$data["situation"],
					"pat_sNatio"=>$natio,
					"cpa_id"=>0,
					"pat_sAct"=>$data["activite"],
					"pat_sOtherPhone"=>$data["otherPhone"],
					"pat_sProfession"=>ucfirst(trim($data["profession"])),
					"pat_dDateNaiss"=>$date_naiss
				);
				$modifier=$this->md_patient->maj_patient($donnees,$data["id"]);	
				
				if($modifier){	
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->diabcare,
						"log_sTable"=>"t_patients_pat",
						"log_sIcone"=>"modification",
						"log_sAction"=>"a modifié le patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					echo "ok";
				}
			}
			
			// if($modifier){	
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->diabcare,
					// "log_sTable"=>"t_patients_pat",
					// "log_sIcone"=>"modification",
					// "log_sAction"=>"a modifié le patient : ".strtoupper(trim($data["nom"]))." ".$prenom,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				// echo "ok";
			// }
			
		}
	}
	
	
	
	public function ajoutOrientation(){
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("patient/liste");
		}
		else{
			for($i=0;$i<count($data["acte"]) AND $i<count($data["uni"]) AND $i<count($data["ser"]) AND $i<count($data["perIdMed"]);$i++){
				$fait = date("Y-m-d H:i:s");
				$maDate = strtotime($fait."+ 30 days");
				// $delai = date("Y-m-d H:i:s",$maDate). "\n";/*Ancien*/
				$delai = date("Y-m-d H:i:s",$maDate);/*Nouveau*/
				$donnees = array(
					"acm_iSta"=>1,
					"lac_id"=>$data["acte"][$i],
					"pat_id"=>$data["id"],
					"uni_id"=>$data["uni"][$i],
					"acm_iHos"=>0,/*Ajout avec initialisation 0*/
					"acm_iFin"=>0,/*Ajout avec initialisation 0*/
					"recep_iPer"=>$data["perIdMed"][$i],
					"acm_dDate"=>$fait,
					"acm_dDateDelai"=>$delai
				);
				$insert = $this->md_patient->ajout_orientation($donnees);
				// var_dump($insert);
				$patient = $this->md_patient->recup_patient($data["id"]);
				$acte = $this->md_parametre->recup_act($data["acte"][$i]);
				if($insert){
					$recupAct = $this->md_patient->recup_last_acte_medical();
					$flt = $this->md_patient->recupFonctionnalite($data["ser"][$i]);
					if($flt->flt_sLib=='Imagerie'){
						$don = array(
							"img_iSta"=>1,
							"img_dDate"=>$fait
						);
						$insertImg = $this->md_patient->ajout_imagerie($don);
						$donneeImagerie = array(
							"acm_id"=>$recupAct->acm_id,
							"img_id"=>$insertImg->img_id,
							"aci_iSta"=>1
						);
						
						$this->md_patient->ajout_prescription_imagerie($donneeImagerie);
					}
					elseif($flt->flt_sLib=='Laboratoire'){
						$don = array(
							"lab_iSta"=>1,
							"lab_dDate"=>$fait
						);
						$insertLab = $this->md_patient->ajout_laboratoire($don);
						$donneeExp = array(
							"acm_id"=>$recupAct->acm_id,
							"lab_id"=>$insertLab->lab_id,
							"ala_iSta"=>1
						);
						
						$this->md_patient->ajout_prescription_laboratoire($donneeExp);
					}
					elseif($flt->flt_sLib=='Reeducation'){
						$donneeReeducation = array(
							"ree_iSta"=>1,
							"acm_id"=>$recupAct->acm_id,
							"ree_iNombre"=>1,
							"ree_iNbPrinscrit"=>1,
							"ree_dDate"=>$fait
						);
						
						$this->md_patient->ajout_prescription_reeducation($donneeReeducation);
					}
					
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->diabcare,
						"log_sTable"=>"t_acte_medical_acm",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a fait une orientation",
						"log_sActionDetail"=>"a orienté le patient vers un acte médical payant : <strong style='text-decoration:underline'>".$patient->pat_sNom." ".$patient->pat_sPrenom." (".$patient->pat_sMatricule.") - ".$acte->lac_sLibelle."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			} 
		}
	}
	
	
	
	public function supprimer_patient($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("patient/liste_modifier_patient");
		}
		else{
			$donnees = array(
				"pat_iSta"=>2
			);
			$supprimer = $this->md_patient->maj_patient($donnees,$id);
			$patient = $this->md_patient->recup_patient($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->diabcare,
					"log_sTable"=>"t_patients_pat",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un patient",
					"log_sActionDetail"=>"a supprimé le patient : <strong style='text-decoration:underline'>".$patient->pat_sNom." ".$patient->pat_sPrenom." (".$patient->pat_sMatricule.")</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("patient/liste_modifier_patient");
			}
		}
	}
	
	
	public function ajoutComplement()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("patient/complement");
		}
		else{
			$patient = $this->md_patient->recup_patient($data["id"]);
			if($data["confirmAnt"]=="Oui"){
				for($i=0;$i<count($data['libAnt']) AND $i<count($data['typeAnt']);$i++){
					$verif = $this->md_patient->verif_antecedents(ucfirst(trim($data['libAnt'][$i])),$data['typeAnt'][$i],$data["id"]);
					if(!$verif){
						$donnees = array(
						"ant_sType"=>$data['typeAnt'][$i],
						"ant_sLibelle"=>ucfirst(trim($data['libAnt'][$i])),
						"pat_id"=>$data["id"],
						"ant_iSta"=>1
						);
						$this->md_patient->ajout_antecedents($donnees);
						$log = array(
							"log_iSta"=>0,
							"per_id"=>$this->session->diabcare,
							"log_sTable"=>"t_antecedants_ant",
							"log_sIcone"=>"nouveau membre",
							"log_sAction"=>"a ajouté un antécédent médical",
							"log_sActionDetail"=>"a ajouté un antécédent médical : <strong style='text-decoration:underline'>".ucfirst(trim($data['libAnt'][$i])).", de type : ".$data['typeAnt'][$i]." au patient ".$patient->pat_sNom." ".$patient->pat_sPrenom." (".$patient->pat_sMatricule.")</strong>",
							"log_dDate"=>date("Y-m-d H:i:s")
						);
						$this->md_connexion->rapport($log);
					}
				}
			}
			
			if($data["confirmAll"]=="Oui"){
				for($i=0;$i<count($data['libAll']) AND $i<count($data['typeAll']);$i++){
					$verif = $this->md_patient->verif_allergies(ucfirst(trim($data['libAll'][$i])),$data['typeAll'][$i],$data["id"]);
					if(!$verif){
						$donnees = array(
						"tal_id"=>$data['typeAll'][$i],
						"all_sLibelle"=>ucfirst(trim($data['libAll'][$i])),
						"pat_id"=>$data["id"],
						"all_iSta"=>1
						);
						$this->md_patient->ajout_allergies($donnees);
						$log = array(
							"log_iSta"=>0,
							"per_id"=>$this->session->diabcare,
							"log_sTable"=>"t_allergies_all",
							"log_sIcone"=>"nouveau membre",
							"log_sAction"=>"a ajouté une allergie",
							"log_sActionDetail"=>"a ajouté une allergie : <strong style='text-decoration:underline'>".ucfirst(trim($data['libAll'][$i])).", de type : ".$data['typeAll'][$i]." au patient ".$patient->pat_sNom." ".$patient->pat_sPrenom." (".$patient->pat_sMatricule.")</strong>",
							"log_dDate"=>date("Y-m-d H:i:s")
						);
						$this->md_connexion->rapport($log);
					}
				}
			}
			
			if($data["confirmPer"]=="Oui"){
				for($i=0;$i<count($data['nom']) AND $i<count($data['lien']) AND count($data['adresse']) AND $i<count($data['prenom'])  AND $i<count($data['tel']);$i++){
					// à  revoir
					$donnees = array(
					"pec_sAdresse"=>trim($data['adresse'][$i]),
					"pec_sTelephone"=>$data["tel"][$i],
					"pec_sLien"=>ucfirst(trim($data['lien'][$i])),
					"pec_sPrenom"=>ucfirst(trim($data['prenom'][$i])),
					"pec_sNom"=>strtoupper(trim($data['nom'][$i])),
					"pat_id"=>$data["id"],
					"pec_iSta "=>1
					);
					$this->md_patient->ajout_personnes_contact($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->diabcare,
						"log_sTable"=>"t_personnes_contacts_pec",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un contact pour le patient",
						"log_sActionDetail"=>"a ajouté une personne à  contacter en cas de problème : <strong style='text-decoration:underline'>".strtoupper(trim($data['nom'][$i]))." ".ucfirst(trim($data['prenom'][$i]))." - : ".$data['tel'][$i]." pour le patient ".$patient->pat_sNom." ".$patient->pat_sPrenom." (".$patient->pat_sMatricule.")</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}

			echo "ok";
			
		}
	
	}
	
	
	public function statCaisseParMedecinDansDir(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$montant = $this->md_patient->montant($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$depose =$montant->paye;
		$acte = $this->md_patient->montant_par_medecin($premier,$dernier); 
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par médecin</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th>Médecin</th>
										<th>Montant généré</th>
									</tr>
								</thead>
								<tbody>';
									foreach($acte AS $a){ 
								echo '<tr>
										<td>'.$a->per_sTitre.''.$a->per_sNom.' '.$a->per_sPrenom.'</td>
										<th>'.number_format($a->montant,0,",",".").'<small>fcfa</small></th>
									</tr>';
									} 
							echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		';
		
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';
		echo '<script src="'.base_url('assets/js/pages/tables/data-table.js').'"></script>';
		
	}	
	
	
	public function statCaisseParActeDansDir(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$montant = $this->md_patient->montant($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$depose =$montant->paye;
		$acte = $this->md_patient->montant_par_acte($premier,$dernier); 
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par acte</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th>Acte médical</th>
										<th>Montant généré</th>
									</tr>
								</thead>
								<tbody>';
									foreach($acte AS $a){ 
								echo '<tr>
										<td>'.$a->lac_sLibelle.'</td>
										<th>'.number_format($a->montant,0,",",".").'<small>fcfa</small></th>
									</tr>';
									} 
							echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		';
		
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';
		echo '<script src="'.base_url('assets/js/pages/tables/data-table.js').'"></script>';
		
	}	
	
	
	public function statCaisseDansDir(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$montant = $this->md_patient->montant($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$montant_service = $this->md_patient->montant_service($premier,$dernier);
		$depose =$montant->paye;
		echo '
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par service</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th>Service</th>
										<th>Montant généré (fcfa)</th>
									</tr>
								</thead>
								<tbody>';
									foreach($montant_service AS $l){ 
								echo '<tr>
										<td>'.$l->ser_sLibelle.'</td>
										<th>'.number_format($l->montant,0,",",".").'</th>
									</tr>';
									} 
							echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>			

		';
		
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';
		echo '<script src="'.base_url('assets/js/pages/tables/data-table.js').'"></script>';
	}	
	
	
	public function statCaisseParMedecin(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$montant = $this->md_patient->montant($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$mtAssurance = 0;
		foreach($montant_assurance AS $as){
			$mtAssurance += $as->mtAssurance;
		}
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$depose =$montant->paye;
		$acte = $this->md_patient->montant_par_medecin($premier,$dernier); 
		echo '
			<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Montant encaissé</div>
                        <div class="number">'.number_format($depose,0,",",".").' <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-assurance"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant pour les assurances</div>
                        <div class="number">
							'.number_format($mtAssurance,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Pertes (Réduction)</div>
                        <div class="number">
							 '.number_format($montant->perte ,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			
			';
			
			/*<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"><a href="'.site_url("facture/impaye").'"> <i class="fa fa-arrow-right"></i></a> </div>
                    <div class="content">
                        <div class="text">Nombre de factures impayés</div>
                        <div class="number">'.count($this->md_patient->liste_facture_impaye()).'</div>
                    </div>
                </div>
            </div>
			
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-patient"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant à recouvrir chez les patients</div>
                        <div class="number">
							'.number_format($montant->reste,2,",",".").'<small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>*/		
			
			echo '
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par médecin</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th>Médecin</th>
										<th>Montant généré</th>
									</tr>
								</thead>
								<tbody>';
									foreach($acte AS $a){ 
								echo '<tr>
										<td>'.$a->per_sTitre.''.$a->per_sNom.' '.$a->per_sPrenom.'</td>
										<th>'.number_format($a->montant,0,",",".").'<small>fcfa</small></th>
									</tr>';
									} 
							echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		';
		
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';
		echo '<script src="'.base_url('assets/js/pages/tables/data-table.js').'"></script>';
		
		
		
	}
	
	
	
	public function statCaisseParActeNumCpt(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$montant = $this->md_patient->montant($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$depose =$montant->paye;
		$acte = $this->md_patient->montant_par_acte_recette($premier,$dernier); 
	
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par acte & par Numéro de compte</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th style="width:130px">Numéro de compte</th>
										<th>Acte médical</th>
										<th>Montant généré</th>
									</tr>
								</thead>
								<tbody>';
									foreach($acte AS $a){ ?>
									<tr>
										<td><strong><?php if($a->cpt_id==NULL){echo '<em>Pas renseigné</em>';}else{$actesous = $this->md_patient->montant_par_acte_recette_sous($a->cpt_id,$premier,$dernier); $rep = $this->md_recette->recup_lib_compte_recette($a->cpt_id); echo $rep->cpt_iNumero;}; ?></strong></td>
										<td><?php if(isset($rep)){ if($rep->cpt_iNumero==70619){echo '<strong>Actes Chirurgicaux : <a title="voir les détails des actes chirurgicaux" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine"> voir détails </a></strong>';
										
										echo '<div class="" id="accordion_1" role="tablist" aria-multiselectable="true">

												<div id="collapseNine" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
													<div class="panel-body"> 
														<div class="row">';	
												foreach($actesous AS $as){ 
										echo '
												<li style="width:100%;margin-left:4%;margin-right:4%;"><span style="color:#4f7ca0">'.$as->lac_sLibelle.' : '.'</span><span style="float:right;color:#4f7ca0;color:#4f7ca0">'.number_format($as->montant,0,",",".").' Fcfa'.'</span></li>
											';
											};
										echo '			</div>		
													</div>
												</div>
										</div>';
											}elseif($rep->cpt_iNumero==70618){echo '<strong>Actes Stomatologiques : <a role="button" data-toggle="collapse" data-parent="#accordion_1" title="voir les détails des actes stomatologiques" href="#collapseNine_1" aria-expanded="true" aria-controls="collapseNine_1"> voir détails </a></strong>';
											
											echo '<div class="" id="accordion_1" role="tablist" aria-multiselectable="true">

												<div id="collapseNine_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
													<div class="panel-body"> 
														<div class="row">';
											
											foreach($actesous AS $as){ 
										echo '
												<li style="width:100%;margin-left:4%;margin-right:4%;"><span style="color:#4f7ca0">'.$as->lac_sLibelle.' : '.'</span><span style="float:right;color:#4f7ca0">'.number_format($as->montant,0,",",".").' Fcfa'.'</span></li> 
											';
											};
										echo '				</div>		
													</div>
												</div>
										
										</div>';
											}
										
										else{ echo '<strong>'.$a->lac_sLibelle.'<strong>';};}else{echo '<strong>'.$a->lac_sLibelle.'<strong>';}; ?></td>
										<th><?php echo number_format($a->montant,0,",","."); ?> <small> Fcfa</small></th>
									</tr>
									<?php }
							echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		';
		
		{ ?>

		<script src="<?php echo base_url('assets/plugins/jquery-datatable/datatables.min.js');?>"></script><!-- Jquery DataTable Plugin Js -->
		<script src="<?php echo base_url('assets/js/pages/tables/data-table.js');?>"></script>
		<?php }
	}	
	
	
	
	public function statCaisseParActe(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$montant = $this->md_patient->montant($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$mtAssurance = 0;
		foreach($montant_assurance AS $as){
			$mtAssurance += $as->mtAssurance;
		}
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$depose =$montant->paye;
		$acte = $this->md_patient->montant_par_acte($premier,$dernier); 
		echo '
			<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Montant encaissé</div>
                        <div class="number">'.number_format($depose,0,",",".").' <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-assurance"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant pour les assurances</div>
                        <div class="number">
							'.number_format($mtAssurance,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Pertes (Réduction)</div>
                        <div class="number">
							 '.number_format($montant->perte ,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			';
				
			
			echo '
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par acte</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th>Acte médical</th>
										<th>Montant généré</th>
									</tr>
								</thead>
								<tbody>';
									foreach($acte AS $a){ 
								echo '<tr>
										<td>'.$a->lac_sLibelle.'</td>
										<th>'.number_format($a->montant,0,",",".").'<small>fcfa</small></th>
									</tr>';
									} 
							echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		';
		
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';
		echo '<script src="'.base_url('assets/js/pages/tables/data-table.js').'"></script>';
		
	}		
	
	
	public function statCaisse(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		$montant = $this->md_patient->montant($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		
		$mtAssurance = 0;
		foreach($montant_assurance AS $as){
			$mtAssurance += $as->mtAssurance;
		}
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$montant_service = $this->md_patient->montant_service($premier,$dernier);
		$depose =$montant->paye;
		echo '
			<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Montant encaissé</div>
                        <div class="number">'.number_format($depose,0,",",".").' <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-assurance"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant pour les assurances</div>
                        <div class="number">
							'.number_format($mtAssurance,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Pertes (Réduction)</div>
                        <div class="number">
							 '.number_format($montant->perte ,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			';
			
			/*<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"><a href="'.site_url("facture/impaye").'"> <i class="fa fa-arrow-right"></i></a> </div>
                    <div class="content">
                        <div class="text">Nombre de factures impayés</div>
                        <div class="number">'.count($this->md_patient->liste_facture_impaye()).'</div>
                    </div>
                </div>
            </div>
			
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-patient"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant à recouvrir chez les patients</div>
                        <div class="number">
							'.number_format($montant->reste,2,",",".").'<small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>*/
			echo '
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par service</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th>Service</th>
										<th>Montant généré (fcfa)</th>
									</tr>
								</thead>
								<tbody>';
									foreach($montant_service AS $l){ 
								echo '<tr>
										<td>'.$l->ser_sLibelle.'</td>
										<th>'.number_format($l->montant,0,",",".").'</th>
									</tr>';
									} 
							echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>			

		';
		
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';
		echo '<script src="'.base_url('assets/js/pages/tables/data-table.js').'"></script>';
	}
	
	public function statCaissePatient(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		
		echo '
				<div class="row">';
					foreach($montant_patient AS $m){ 
					echo '<div class="col-md-5">'.$m->pat_sNom." ".$m->pat_sPrenom.'</div>';
					echo '<div class="col-md-6">('.$m->pat_sMatricule.')<span class="pull-right">'.number_format($m->dette,2,",",".").' <small>FCFA</small></span></div>';
					echo '<div class="col-md-1"><a href="'.site_url("caisse/recouvrementPatient/".$m->pat_id).'"><i class="fa fa-arrow-right"></i></a></div>';
					echo '<hr>';
					} 
			echo '</div>
					
		';
		
	}
	
	
	public function statCaisseAssurance(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		
		echo '
				<div class="row">';
					foreach($montant_assurance AS $m){ 
					echo '<div class="col-md-10">'.$m->ass_sLibelle.'<span class="pull-right">'.number_format($m->mtAssurance,2,",",".").' <small>FCFA</small></span></div>';
					echo '<div class="col-md-2"><a href="'.site_url("caisse/recouvrementAssurance/".$m->ass_id).'"><i class="fa fa-arrow-right"></i></a></div>';
					} 
			echo '</div>
					
		';
		
	}
	
	
	
	public function recupStats()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$premierJour = $this->md_config->recupDateTime($data["premierJour"]);
		$dernierJour = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($data["ageMinimal"]!=""){
			$ageMinimal= $this->md_config->date_de_naissance($data["ageMinimal"]);
		}		
		
		if($data["ageMaximal"]!=""){
			$ageMaximal=$this->md_config->date_de_naissance($data["ageMaximal"]);
		}
		
		
		$genre=trim($data["genre"]);
		
		if($data["ageMinimal"]=="" && $data["ageMaximal"]=="" && $genre=="" ){
		//$text = 'pour tester';
		
			$NbrePatPer  = $this->md_patient->liste_stats_patient_encours($premierJour,$dernierJour);
			// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_encours($premierJour,$dernierJour);
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques($premierJour,$dernierJour);
			$statService = $this->md_patient->stats_services($premierJour,$dernierJour);
		}
		else if($data["ageMinimal"]!="" && $data["ageMaximal"]=="" && $genre=="" ){
			$NbrePatPer  = $this->md_patient->liste_stats_patient_ageMinimal($premierJour,$dernierJour,$ageMinimal);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_ageMinimal($premierJour,$dernierJour,$ageMinimal);
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques_ageMinimal($premierJour,$dernierJour,$ageMinimal);
			$statService = $this->md_patient->stats_services_ageMinimal($premierJour,$dernierJour,$ageMinimal);
			
		}else if($data["ageMinimal"]!="" && $data["ageMaximal"]!="" && $genre=="" ){
			$NbrePatPer  = $this->md_patient->liste_stats_patient_intervale($premierJour,$dernierJour,$ageMinimal,$ageMaximal);
			// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_intervale($premierJour,$dernierJour,$ageMinimal,$ageMaximal);
			// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
			
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques_intervale($premierJour,$dernierJour,$ageMinimal,$ageMaximal);
			$statService = $this->md_patient->stats_services_intervale($premierJour,$dernierJour,$ageMinimal,$ageMaximal);
			
		}else if($data["ageMinimal"]!="" && $data["ageMaximal"]!="" && $genre!="" ){
			$NbrePatPer  = $this->md_patient->liste_stats_patient_inter_genre($premierJour,$dernierJour,$ageMinimal,$ageMaximal,$genre);
			// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_inter_genre($premierJour,$dernierJour,$ageMinimal,$ageMaximal,$genre);
			// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
			
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques_inter_genre($premierJour,$dernierJour,$ageMinimal,$ageMaximal,$genre);
			$statService = $this->md_patient->stats_services_inter_genre($premierJour,$dernierJour,$ageMinimal,$ageMaximal,$genre);
			
		}else if($data["ageMinimal"]=="" && $data["ageMaximal"]!="" && $genre=="" ){
			$NbrePatPer  = $this->md_patient->liste_stats_patient_ageMaximal($premierJour,$dernierJour,$ageMaximal);
			// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_ageMaximal($premierJour,$dernierJour, $ageMaximal);
			// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
			
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques_ageMaximal($premierJour,$dernierJour, $ageMaximal);
			$statService = $this->md_patient->stats_services_ageMaximal($premierJour,$dernierJour,$ageMaximal);
			
		}else if($data["ageMinimal"]=="" && $data["ageMaximal"]!="" && $genre!="" ){
			$NbrePatPer  = $this->md_patient->liste_stats_patient_max_genre($premierJour,$dernierJour,$ageMaximal,$genre);
			// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_max_genre($premierJour,$dernierJour,$ageMaximal,$genre);
			// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
			
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques_max_genre($premierJour,$dernierJour,$ageMaximal,$genre);
			$statService = $this->md_patient->stats_services_max_genre($premierJour,$dernierJour,$ageMaximal,$genre);
			
		}else if($data["ageMinimal"]!="" && $data["ageMaximal"]=="" && $genre!="" ){
			$NbrePatPer  = $this->md_patient->liste_stats_patient_min_genre($premierJour,$dernierJour,$ageMinimal,$genre);
			// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_min_genre($premierJour,$dernierJour,$ageMinimal,$genre);
			// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
			
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques_min_genre($premierJour,$dernierJour,$ageMinimal,$genre);
			$statService = $this->md_patient->stats_services_min_genre($premierJour,$dernierJour,$ageMinimal,$genre);
			
		}else if($data["ageMinimal"]=="" && $data["ageMaximal"]=="" && $genre!="" ){
			$NbrePatPer  = $this->md_patient->liste_stats_patient_genre($premierJour,$dernierJour,$genre);
			$NbrePatDec  = $this->md_patient->stats_nombre_deces_genre($premierJour,$dernierJour,$genre);
			
			$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($premierJour,$dernierJour);
			$diagnostique = $this->md_patient->stats_diagnostiques_genre($premierJour,$dernierJour,$genre);
			$statService = $this->md_patient->stats_services_genre($premierJour,$dernierJour,$genre);
			
		}
		echo '
			 <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">

                    <div class="content">
                        <div class="text">Nombre de patients reçu</div>
                        <div class="number">'.count($NbrePatPer).'</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="content">
                        <div class="text">nombre de cas de décès</div>
                        <div class="number">'.$NbrePatDec->nb.'</div>
                    </div>
                </div>
            </div>
			<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="content">
                        <div class="text">nombre de naissance déclarée</div>
                        <div class="number">'.$NbrePatNais->nb.'</div>
                    </div>
                </div>
            </div>
			<div class="col-lg-6 col-md-6 col-sm-6" style="height:auto">
                <div class="info-box-4 hover-zoom-effect" style="height:auto">
                    <div class="content">
                        <div class="text">Nombre d\'actes enregistrés à la caisse</div>';
						 foreach ($statService AS $s) {
							echo '<div class="text">'.$s->ser_sLibelle.'<span class="pull-right">'.$s->nb.'</span></div>';
						 } 
                    echo '</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" style="height:auto">
                <div class="info-box-4 hover-zoom-effect" style="height:auto; width:100%">
                    <div class="content">
                        <div class="text">statistique des diagnostiques</div>';
						foreach ($diagnostique AS $d) {
						echo '	<div class="text">'.$d->mal_sLibelle.' <span class="pull-right">'. $d->nb.'</span></div>';
						 } 
                   echo ' </div>
                </div>
            </div> 
			';
			
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';
		echo '<script src="'.base_url('assets/js/pages/tables/data-table.js').'"></script>';

	}
	
	
}
