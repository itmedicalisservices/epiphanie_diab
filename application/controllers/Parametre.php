<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametre extends CI_Controller {

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
		$this->load->view('app/parametre/page-parametre');
	}
	
	
		
	public function rubrique()
	{
		$this->load->view('app/parametre/page-rubrique');
	}	
		
	public function typeacte()
	{
		$this->load->view('app/parametre/page-typeacte');
	}	
		
	public function fonctionnalite()
	{
		$this->load->view('app/parametre/page-fonctionnalite');
	}
	
	
	
	public function locataire()
	{
		$this->load->view('app/parametre/page-liste-locataire');
	}	
	
	public function actes_divers()
	{
		$this->load->view('app/parametre/page-act-divers');
	}
	
		
	public function nombre_complet_personnel()
	{
		$this->load->view('app/parametre/page-liste-personnel-complet');
	}
	
	
	public function editer($id)
	{
		$this->load->view('app/parametre/page-editer-personnel',array("id"=>$id));
	}
	
	
	public function new_recette()
	{
		$this->load->view('app/parametre/page-new-recette.php');
	}	
	
	public function new_sous_compte_fonctionnement()
	{
		$this->load->view('app/parametre/page-sous-compte-fonctionnement');
	}
	
	public function sous_libelle_compte()
	{
		$this->load->view('app/parametre/page-liste-libelle-sous-compte');
	}	
	
	public function new_compte_fonctionnement()
	{
		$this->load->view('app/parametre/page-compte-fonctionnement');
	}		
	public function new_sous_compte()
	{
		$this->load->view('app/parametre/page-liste-sous-compte');
	}	
	
	public function new_compte()
	{
		$this->load->view('app/parametre/page-liste-compte');
	}	
	
	public function new_banque()
	{
		$this->load->view('app/parametre/page-liste-banque');
	}	
	
	public function convention_patient()
	{
		$this->load->view('app/parametre/page-convention-entreprise');
	}
	
	
	public function specification_maladie()
	{
		$this->load->view('app/parametre/page-specification-maladie');
	}	
	
	public function famille_maladie()
	{
		$this->load->view('app/parametre/page-famille-maladie');
	}	
	
	public function maladie()
	{
		$this->load->view('app/parametre/page-maladie');
	}
	
	
	public function appareil()
	{
		$this->load->view('app/parametre/page-appareil');
	}	
	
	public function nouveau_reactif()
	{
		$this->load->view('app/parametre/page-nouveau-reactif');
	}
	
	
	
	public function type_courrier()
	{
		$this->load->view('app/parametre/page-type-courrier');
	}	
	

	public function accessoire()
	{
		$this->load->view('app/parametre/page-accessoire');
	}	
	
	public function categorie_produit()
	{
		$this->load->view('app/parametre/page-categorie-produit');
	}		
	
	public function element_analyse()
	{
		$this->load->view('app/parametre/page-element-analyse');
	}		
	
	public function type_examen()
	{
		$this->load->view('app/parametre/page-type-examen');
	}	
	
	public function rapport()
	{
		$this->load->view('app/parametre/page-rapport');
	}	
	
	public function famille_produit()
	{
		$this->load->view('app/parametre/page-famille-produit');
	}	
	
	public function forme_produit()
	{
		$this->load->view('app/parametre/page-forme-produit');
	}	
	
	public function type_fournisseur()
	{
		$this->load->view('app/parametre/page-type-fournisseur');
	}	
	
	public function salle()
	{
		$this->load->view('app/parametre/page-salle');
	}	
	
	public function armoire()
	{
		$this->load->view('app/parametre/page-armoire');
	}		
	
	public function nouvelle_chambre()
	{
		$this->load->view('app/parametre/page-chambre');
	}	
	
	
	public function structure()
	{
		$this->load->view('app/parametre/page-structure');
	}	
	
	public function coordonnees()
	{
		$this->load->view('app/parametre/page-banque');
	}	
	
	public function direction()
	{
		$this->load->view('app/parametre/page-departement');
	}
	
	
	public function service()
	{
		$this->load->view('app/parametre/page-service');
	}
	
	
	public function unite()
	{
		$this->load->view('app/parametre/page-unite');
	}
	
	
	public function domaine()
	{
		$this->load->view('app/parametre/page-domaine');
	}
	
	
	public function specialite()
	{
		$this->load->view('app/parametre/page-specialite');
	}
	
	
	public function poste()
	{
		$this->load->view('app/parametre/page-poste');
	}
	
	
	public function acte_medical()
	{
		$this->load->view('app/parametre/page-act-medical');
	}
	
	
	
	public function activite_professionnelle()
	{
		$this->load->view('app/parametre/page-activite-professionnelle');
	}
	
	public function motifs_reduction()
	{
		$this->load->view('app/parametre/page-motifs-reduction');
	}
	
	
	public function allergie()
	{
		$this->load->view('app/parametre/page-allergie');
	}
	
	public function antecedent_personnel()
	{
		$this->load->view('app/parametre/page-antecedent-personnel');
	}
	
	
	public function antecedent_familial()
	{
		$this->load->view('app/parametre/page-antecedent-familial');
	}
	
	
	public function assureur()
	{
		$this->load->view('app/parametre/page-assureurs');
	}
	
	
	public function type_couverture()
	{
		$this->load->view('app/parametre/page-type-couverture-assurance');
	}
		
	public function bloc_operatoire()
	{
		$this->load->view('app/parametre/page-bloc-operatoire');
	}
		
	
	public function listeChambreUniteDispo()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>-- Choisir la chambre --</option>";	
		}
		else{
			if($data['id']==""){
				echo "<option value=''>-- Choisir la chambre --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_chambre_unite_dispo($data['id']);
				if(empty($res)){
					echo "<option value=''>Cette unité n'a pas de chambre enregistré</option>";	
				}
				else{
					echo "<option value=''>-- Choisir la chambre --</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->cha_id."'>".$resultat->cha_sLibelle."</option>";
					}
				}
			}
		}
		
	}
		
	public function listeLitChambreDispo()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>-- Choisir le lit --</option>";	
		}
		else{
			if($data['id']==""){
				echo "<option value=''>-- Choisir le lit --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_lit_chambre_dispo($data['id']);
				if(empty($res)){
					echo "<option value=''>Pas de lit disponible</option>";	
				}
				else{
					echo "<option value=''>-- Choisir le lit --</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->lit_id."'>".$resultat->lit_sLibelle."</option>";
					}
				}
			}
		}
		
	}
		
	public function recupSalleOperation()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>-- Choisissez la salle --</option>";	
		}
		else{
			if($data['id']==""){
				echo "<option value=''>-- Choisissez la salle --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_salle_dispo($data['id']);
				if(empty($res)){
					echo "<option value=''>Pas de salle disponible</option>";	
				}
				else{
					echo "<option value=''>-- Choisissez la salle --</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->sop_id."'>".$resultat->sop_sLibelle."</option>";
					}
				}
			}
		}
		
	}
		
	
	public function listeServiceDirection()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>----- Choisissez le service * -----</option>";	
		}
		else{
			if($data['idDir']==""){
				echo "<option value=''>----- Choisissez le service * -----</option>";	
			}
			else{
				$tab = explode('-/-', $data['idDir']);

				$res = $this->md_parametre->liste_services_direction_actifs($tab[0]);
				if(empty($res)){
					echo "<option value=''>Cette direction n'a pas de services</option>";	
				}
				else{
					echo "<option value=''>----- Choisissez le service * -----</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->ser_id."-/-".$resultat->ser_sLibelle."'>".$resultat->ser_sLibelle."</option>";
					}
				}
			}
		}
		
	}
	
	
	public function listeServiceDirection2()
	{
		$data = $this->input->post();
			
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>----- Choisissez le service * -----</option>";	
		}
		else{
			
			if($data['dir']==""){
				echo "<option value=''>----- Choisissez le service * -----</option>";	
			}
			else{
				$dir = explode("-/-",$data["dir"]);
				// echo "<option value=''>".$data["dir"]."</option>";
				$res = $this->md_parametre->liste_services_direction_actifs($dir[0]);
				if(empty($res)){
					echo "<option value=''>Cette direction n'a pas de services</option>";	
				}
				else{
					echo "<option value=''>----- Choisissez le service * -----</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->ser_id."-/-".$resultat->ser_sLibelle."'>".$resultat->ser_sLibelle."</option>";
					}
				}
			}
		}
		
	}
	
	
	public function listePosteType()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>----- Choisissez le domaine * -----</option>";	
		}
		else{
			if($data['tpe']==""){
				echo "<option value=''>----- Choisissez le domaine * -----</option>";	
			}
			else{
				$tpe = explode("-/-",$data["tpe"]);
				$res = $this->md_parametre->liste_domaine_type_actifs($tpe[0]);
				if(empty($res)){
					echo "<option value=''>Ce type de personnel n'a pas de domaine</option>";	
				}
				else{
					echo "<option value=''>----- Choisissez le domaine * -----</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->pst_id."-/-".$resultat->pst_sLibelle."'>".$resultat->pst_sLibelle."</option>";
					}
				}
			}
		}
		
	}
	
	
	public function listePosteType2()
	{
		$data = $this->input->post();
			
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>----- Choisissez le domaine * -----</option>";	
		}
		else{
			
			if($data['tpe']==""){
				echo "<option value=''>----- Choisissez le domaine * -----</option>";	
			}
			else{
				$tpe = explode("-/-",$data["tpe"]);
				// echo "<option value=''>".$data["tpe"]."</option>";
				$res = $this->md_parametre->liste_domaine_type_actifs($tpe[0]);
				if(empty($res)){
					echo "<option value=''>Cette direction n'a pas de services</option>";	
				}
				else{
					echo "<option value=''>----- Choisissez le domaine * -----</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->pst_id."-/-".$resultat->pst_sLibelle."'>".$resultat->pst_sLibelle."</option>";
					}
				}
			}
		}
		
	}
	
	
	public function listeCelluleArmoire()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>-- Cellule * --</option>";	
		}
		else{
			if($data['idArmoire']==""){
				echo "<option value=''>-- Choisissez une armoire * --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_cellule_armoire_actifs($data['idArmoire']);
				if(empty($res)){
					echo "<option value=''>Cette armoire n'a pas de cellule </option>";	
				}
				else{
					echo "<option value=''>-- Cellule * --</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->cel_id."'>".$resultat->cel_sLibelle."</option>";
					}
				}
			}
		}
		
	}	
	
	
	public function listeMedecinSer()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=\"0-/-Aucun\">-- Sélectionner le médecin --</option>";	
		}
		else{
			if($data['idlac']==""){
				echo "<option value=\"0-/-Aucun\">-- Sélectionner le médecin --</option>";	
			}
			else{
			
			$tab = explode('-/-', $data['idlac']);
			
				$ser = $this->md_parametre->service_dun_acte($tab[0]);
				$res = $this->md_personnel->medecin_dun_service($ser->ser_id);
				if(empty($res)){
					echo "<option value='0-/-Aucun'>Ce service n'a pas de médecin </option>";	
				}
				else{
					echo "<option value='0-/-Aucun'>-- Sélectionner le médecin --</option>";
					foreach($res as $l){
						echo "<option value='".$l->per_id ."-/-". $l->per_sNom." ".$l->per_sPrenom."'>".$l->per_sNom." ".$l->per_sPrenom."</option>";
						
					}
				}
			}
		}
		
	}	
	
	public function listeArmoireSalle()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>-- Armoire * --</option>";	
		}
		else{
			if($data['idSalle']==""){
				echo "<option value=''>-- Choisissez une salle * --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_armoire_salle_actifs($data['idSalle']);
				if(empty($res)){
					echo "<option value=''>Cette salle n'a pas d'armoire </option>";	
				}
				else{
					echo "<option value=''>-- Armoire * --</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->arm_id."'>".$resultat->arm_sLibelle."</option>";
					}
				}
			}
		}
		
	}
	
	
	
	public function listeVillePays()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>-- ville * --</option>";	
		}
		else{
			if($data['idPays']==""){
				echo "<option value=''>-- Choisissez un pays * --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_ville_pays_actifs($data['idPays']);
				if(empty($res)){
					echo "<option value=''>Ce pays n\'a pas de ville </option>";	
				}
				else{
					echo "<option value=''>-- Ville * --</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->vil_id."'>".$resultat->vil_sLib."</option>";
					}
				}
			}
		}
		
	}
	
	
	public function listeUniteService()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>----- Choisissez l'unité * -----</option>";	
		}
		else{
			if($data['ser']==""){
				echo "<option value=''>----- Choisissez l'unité * -----</option>";	
			}
			else{
				$tab = explode('-/-', $data['ser']);
				$res = $this->md_parametre->liste_unite_services_actifs($tab[0]);
				if(empty($res)){
					echo "<option value=''>Ce service n'a pas d'unité</option>";	
				}
				else{
					echo "<option value=''>----- Choisissez l'unité * -----</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->uni_id."-/-".$resultat->uni_sLibelle."'>".$resultat->uni_sLibelle."</option>";
					}
				}
			}
		}
		
	}
	
	
	public function listeUniteService2()
	{
		$data = $this->input->post();
			
		if(empty($data)){
			echo "<option value=''>----- Choisissez l'unité * -----</option>";	
		}
		else{
			if($data['ser']==""){
				echo "<option value=''>----- Choisissez l'unité * -----</option>";	
			}
			else{
				$ser = explode("-/-",$data["ser"]);
				$res = $this->md_parametre->liste_unite_services_actifs($ser[0]);
				if(empty($res)){
					echo "<option value=''>Ce service n'a pas d'unité</option>";	
				}
				else{
					echo "<option value=''>----- Choisissez l'unité * -----</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->uni_id."-/-".$resultat->uni_sLibelle."'>".$resultat->uni_sLibelle."</option>";
					}
				}
			}
		}	
		
	}
	
	
	public function listeSpecialitePoste()
	{
		$data = $this->input->post();
		// var_dump($data);
		if(empty($data)){
			echo "<option value=''>-- Spécialité * --</option>";	
		}
		else{
			if($data['idPst']==""){
				echo "<option value=''>-- Spécialité * --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_specialites_poste_actifs($data['idPst']);
				if(empty($res)){
					echo "<option value=''>Choisissiez la spécialité du personnel</option>";	
				}
				else{
					echo "<option value=''>-- Spécialité * --</option>";
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->spt_id."'>".$resultat->spt_sLibelle."</option>";
					}
				}
			}
		}
		
	}
	
	
	
	public function listeFonctionPoste()
	{
		$data = $this->input->post();
		if(empty($data)){
			echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";	
		}
		else{
			if($data['idPst']==""){
				echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";	
			}
			else{
				$res = $this->md_parametre->liste_fonction_poste_actifs($data['idPst']);
				if(empty($res)){
					echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";		
				}
				else{
					echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";	
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->fct_id."'>".$resultat->fct_sLibelle."</option>";
					}
				}
			}
		}
		
	}
		
	public function listeFonctionPoste2()
	{
		$data = $this->input->post();
		if(empty($data)){
			echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";	
		}
		else{
			if($data['idPst']==""){
				echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";	
			}
			else{
				$pst = explode("-/-",$data["idPst"]);
				$res = $this->md_parametre->liste_fonction_poste_actifs($pst[2]);
				if(empty($res)){
					echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";		
				}
				else{
					echo "<option value=''>-- Poste occupé au sein de l'hopital * --</option>";	
					foreach($res as $key=>$resultat){
						echo "<option value='".$resultat->fct_id."-/-".$resultat->fct_sLibelle."'>".$resultat->fct_sLibelle."</option>";
					}
				}
			}
		}
		
	}
		
	public function listeUniteActe()
	{
		$data = $this->input->post();

		$tab = explode('-/-', $data['acte']);
		$res = $this->md_parametre->liste_unite_acte($tab[0]);
		$liste = $this->md_personnel->liste_affectation_personnel_unite($res->uni_id); 
		echo $res->ser_sLibelle.'-/-'.$res->uni_sLibelle.'-/-'.$res->uni_id.'-/-'.$res->lac_iCout.'-/-'.$res->ser_id; 
		
	}
	
	
	public function recupmodId()
	{
		$data = $this->input->post();
		if(empty($data)){
			echo "";	
		}
		else{
			$res = $this->md_parametre->recup_motif_reduction_taux($data['reduction']);
			echo $res->mod_iTaux;
		}
		
	}	
	
	public function listedetail()
	{
		$data = $this->input->post();
		if(empty($data)){
			echo "";	
		}
		else{
			if($data['acte']==""){
				echo "";	
			}
			else{
				$tab = explode('-/-', $data['acte']);
				$res = $this->md_parametre->liste_unite_acte($tab[0]);
				if(empty($res)){
					echo "";		
				}
				else{
					if($res->lac_iDure > 1){
						$jour = "jours";
					}
					else{
						$jour = "jour";
					}
					echo '<div class="form-group">';
						echo '<label> </label>';
						echo '<div class="form-line">';
							echo "<div class='header'><h2>Coût : <b><span>".number_format($res->lac_iCout,2,",",".")."</span> <span style='font-size:12px'>FCFA</span></b> pour une durée de ".$res->lac_iDure." ".$jour."</h2></div>";
						echo '</div>';
					echo '</div>';
					
				}
			}
		}
		
	}
	
	

	
	
	public function modifStructure()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("patient/nouveau");
			// var_dump($data);
		}
		else{
			if(trim($data["tel2"])==""){
				$data["tel2"] = NULL;
			}
			else{
				$formatTel2 = $this->md_config->formatPhoneCongo(trim($data["tel2"]));
				if($formatTel2){
					$data["tel2"] = $formatTel2;
				}
				else{
					$data["tel2"] = NULL;
				}
			}
			
			if(trim($data["tel3"])==""){
				$data["tel3"] = NULL;
			}
			else{
				$formatTel3 = $this->md_config->formatPhoneCongo(trim($data["tel3"]));
				if($formatTel3){
					$data["tel3"] = $formatTel3;
				}
				else{
					$data["tel3"] = NULL;
				}
			}
			
			if(trim($data["tel4"])==""){
				$data["tel4"] = NULL;
			}
			else{
				$formatTel4 = $this->md_config->formatPhoneCongo(trim($data["tel4"]));
				if($formatTel4){
					$data["tel4"] = $formatTel4;
				}
				else{
					$data["tel4"] = NULL;
				}
			}
			
			
			
			if($_FILES["photo"]["name"]!=""){
				if(!is_numeric($data["tel"])){
					echo "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone";
				}
				else{
					$formatTel = $this->md_config->formatPhoneCongo(trim($data["tel"]));
					if($formatTel == false){
						echo "Ce numéro de téléphone n'est pas valable en république du Congo";
					}
					else{
							$verifTaille = $this->md_config->sizeImage($_FILES["photo"],150);
							if(!$verifTaille){
								echo "La taille de l'image ne doit pas dépasser les 150 Ko";
							}
							else{
								$verifEmail = $this->md_config->verifMail(trim($data['email']));
								if($verifEmail == false){
									echo 'Format email incorrect';
								}
								else{
									$config["upload_path"] =  './assets/images/';
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
											$data["photo"]="assets/images/".$image['file_name'];
										}
										else{
											$data["photo"]=$data["photo1"];
										}

										$donnees = array(
											"str_sEnseigne"=>strtoupper(trim($data["structure"])),
											"str_sAdresse"=>$data["adresse"],
											"str_iBp"=>$data["bp"],
											"str_sTel"=>"+242".$formatTel,
											"str_sEmail"=>$data["email"],
											"str_sVille"=>$data["ville"],
											"str_sTel_2"=>$data["tel2"],
											"str_sTel_3"=>$data["tel3"],
											"str_sTel_4"=>$data["tel4"],
											"str_sLogo"=>$data["photo"]
										);
										$modif=$this->md_parametre->modif_structure($donnees, 1);
										if($modif){
											$log = array(
												"log_iSta"=>0,
												"per_id"=>$this->session->epiphanie_diab,
												"log_sTable"=>"t_structure_str",
												"log_sIcone"=>"modification",
												"log_sAction"=>"a modifié une structure",
												"log_sActionDetail"=>"a modifié les informations de la structure",
												"log_dDate"=>date("Y-m-d H:i:s")
											);
											echo 'ok';
										}
									}
								}
							}
						
						
					}
				}
	
			}
			else{
				if(!is_numeric($data["tel"])){
					echo "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone";
				}
				else{
					$formatTel = $this->md_config->formatPhoneCongo(trim($data["tel"]));
					if($formatTel == false){
						echo "Ce numéro de téléphone n'est pas valable en république du Congo";
					}
					else{
							$verifTaille = $this->md_config->sizeImage($_FILES["photo"],150);
							if(!$verifTaille){
								echo "La taille de l'image ne doit pas dépasser les 150 Ko";
							}
							else{
								$verifEmail = $this->md_config->verifMail(trim($data['email']));
								if($verifEmail == false){
									echo 'Format email incorrect';
								}
								else{

										$donnees = array(
											"str_sEnseigne"=>strtoupper(trim($data["structure"])),
											"str_sAdresse"=>$data["adresse"],
											"str_iBp"=>$data["bp"],
											"str_sTel"=>"+242".$formatTel,
											"str_sEmail"=>$data["email"],
											"str_sTel_2"=>$data["tel2"],
											"str_sTel_3"=>$data["tel3"],
											"str_sTel_4"=>$data["tel4"],
											"str_sVille"=>$data["ville"]
										);
										$modif=$this->md_parametre->modif_structure($donnees, 1);
										if($modif){
											$log = array(
												"log_iSta"=>0,
												"per_id"=>$this->session->epiphanie_diab,
												"log_sTable"=>"t_structure_str",
												"log_sIcone"=>"modification",
												"log_sAction"=>"a modifié une structure",
												"log_sActionDetail"=>"a modifié les informations de la structure",
												"log_dDate"=>date("Y-m-d H:i:s")
											);
											echo 'ok';
										}
								}
							}
						
						
					}
				}
	
			}
			
		}
	}
	
	
	
	public function editBanque()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		
		$donnees = array(
			"str_sIban"=>trim($data['iban']),
			"str_iCodeBanque"=>trim($data['code_banque']),
			"str_iCle"=>trim($data['cle']),
			"str_sGuichet"=>trim($data['guichet']),
			"str_sBanque"=>trim($data['banque']),
			"str_iNumeroCompte"=>trim($data['numero'])
		);
		$modif = $this->md_parametre->modif_structure($donnees,1);
		if($modif){
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_structure_str",
				"log_sIcone"=>"modification",
				"log_sAction"=>"a modifié les coordonnées",
				"log_sActionDetail"=>"a modifié les coordonnées bancaires de l'hôpital",
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			echo 'ok';
		}
	}
		
	
	/*********** Type assurance  ***************************/
	public function ajoutTypeAssurance()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/type_couverture");
		}
		else{
			if(!is_numeric(trim($data['taux']))){
				echo "Saisissez un nombre dans le champs Taux";
			}
			else{
				$verif = $this->md_parametre->verif_type_assurance(ucfirst(trim($data['lib'])),trim($data['taux']));
				if(!$verif){
					$donnees = array(
					"tas_sLibelle"=>ucfirst(trim($data['lib'])),
					"tas_iTaux"=>trim($data['taux']),
					"tas_iSta"=>1
					);
					$tas = $this->md_parametre->ajout_type_assurance($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_type_assurance_tas",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un type d'assurance",
						"log_sActionDetail"=>"a ajouté un nouveau type d'assurance : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				
					if(isset($_POST["lac"])){
						for($i=0;$i<count($data['lac']);$i++){
							$verifCouv = $this->md_parametre->verif_couverture_assurance($tas->tas_id,trim($data['lac'][$i]));
							if(!$verifCouv){
								$donneesCouv = array(
								"tas_id"=>$tas->tas_id,
								"lac_id"=>trim($data['lac'][$i])
								);
								$this->md_parametre->ajout_couverture_assurance($donneesCouv);
							}
						}
					}
					echo "ok";
				}
				else{
					echo "Ce type d'assurance est déjà enregistré. <br>Essayez un autre";
				}
				
			}
		}
	
	}
	
	public function supprimer_type_assurance($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/type_couverture");
		}
		else{
			$donnees = array(
				"tas_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_type_assurance($donnees,$id);
			$type = $this->md_parametre->recup_type_assurance($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_assurance_tas",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un type d'assurance",
					"log_sActionDetail"=>"a supprimé le type d'assurance : <strong style='text-decoration:underline'>".$type->tas_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/type_couverture");
			}
		}
	}
	
	
	public function modifierTypeAssurance()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_type_assurance_modif(ucfirst(trim($data['lib'])),trim($data['taux']),$data['id']);
		if(!$verif){
			$donnees = array(
				"tas_sLibelle"=>ucfirst(trim($data['lib'])),
				"tas_iTaux"=>trim($data['taux'])
			);
			$supprimer = $this->md_parametre->maj_type_assurance($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_assureurs_ass",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un type d'assurance",
					"log_sActionDetail"=>"a modifié le type d'assurance :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".trim($data['taux']);
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Assureurs  ***************************/
	public function ajoutAssureur()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/assureur");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_assureur(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"ass_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"ass_iSta"=>1
					);
					$this->md_parametre->ajout_assureur($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_assureurs_ass",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un assureur",
						"log_sActionDetail"=>"a ajouté une agence d'assurance : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_assureur($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/assureur");
		}
		else{
			$donnees = array(
				"ass_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_assureur($donnees,$id);
			$assureur = $this->md_parametre->recup_assureur($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_assureurs_ass",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un assureur",
					"log_sActionDetail"=>"a supprimé l'assureur : <strong style='text-decoration:underline'>".$assureur->ass_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/assureur");
			}
		}
	}
	
	
	public function modifierAssureur()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_assureur_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"ass_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_assureur($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_assureurs_ass",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un assureur",
					"log_sActionDetail"=>"a modifié le nom de l'assureur :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Direction  ***************************/
	public function ajoutDepartement()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/departement");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_departement(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"dep_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"dep_iSta"=>1
					);
					$this->md_parametre->ajout_departement($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_departement_dep",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une direction",
						"log_sActionDetail"=>"a ajouté la direction : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_direction($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/departement");
		}
		else{
			$donnees = array(
				"dep_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_direction($donnees,$id);
			$direction = $this->md_parametre->recup_direction($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_departement_dep",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une direction",
					"log_sActionDetail"=>"a supprimé la direction : <strong style='text-decoration:underline'>".$direction->dep_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/direction");
			}
		}
	}
	
	
	public function modifierDirection()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_departement_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"dep_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_direction($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_departement_dep",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une direction",
					"log_sActionDetail"=>"a modifié le nom de la direction :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Service  ***************************/
	public function ajoutService()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/service");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['dep']) AND count($data['flt']);$i++){
				$verif = $this->md_parametre->verif_service(ucfirst(trim($data['lib'][$i])),$data['dep'][$i]);
				if(!$verif){
					if(!$data['flt'][$i]){$data['flt'][$i] =NULL;}
					$donnees = array(
					"ser_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"dep_id"=>$data['dep'][$i],
					"flt_id"=>$data['flt'][$i],
					"ser_iSta"=>1
					);
					$this->md_parametre->ajout_service($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_services_ser",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un service",
						"log_sActionDetail"=>"a ajouté un nouveau service : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
		
	
	
	public function supprimer_service($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/service");
		}
		else{
			$donnees = array(
				"ser_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_service($donnees,$id);
			$service = $this->md_parametre->recup_service($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_services_ser",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un service",
					"log_sActionDetail"=>"a supprimé le service : <strong style='text-decoration:underline'>".$service->ser_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/service");
			}
		}
	}
	
	
	public function modifierService()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$dep = explode("-/-",$data["dep"]);
		$flt = explode("-/-",$data["flt"]);
		$verif = $this->md_parametre->verif_service_modif(ucfirst(trim($data['lib'])),$dep[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"ser_sLibelle"=>ucfirst(trim($data['lib'])),
				"flt_id"      =>$flt[0],
				"dep_id"      =>$dep[0]
			);
			$supprimer = $this->md_parametre->maj_service($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_services_ser",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un service",
					"log_sActionDetail"=>"a modifié le service :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$dep[1]."-/-".$flt[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** antécédent personnel  ***************************/
	public function ajoutAntecedentPersonnel()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/antecedent_personnel");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_antecedent_personnel(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"lan_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"lan_iSta"=>1
					);
					$this->md_parametre->ajout_antecedent_personnel($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_liste_antecedants_lan",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un nouveau antécédent",
						"log_sActionDetail"=>"a ajouté un nouveau antécédent : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
		
	
	
	public function supprimer_antecedent_personnel($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/antecedent_personnel");
		}
		else{
			$donnees = array(
				"lan_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_antecedent_personnel($donnees,$id);
			$antededent = $this->md_parametre->recup_antecedent_personnel($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_antecedants_lan",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un antécédent personnel",
					"log_sActionDetail"=>"a supprimé l'antécédent : <strong style='text-decoration:underline'>".$antecedent->lan_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/antecedent_personnel");
			}
		}
	}
	
	
	public function modifierAntecedentPersonnel()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_antecedent_personnel_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"lan_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_antecedent_personnel($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_antecedants_lan",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un antécédent personnel",
					"log_sActionDetail"=>"a modifié l'antécédent personnel :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	/*********** antécédent familial  ***************************/
	public function ajoutAntecedentFamilial()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/antecedent_familial");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_antecedent_familial(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"laf_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"laf_iSta"=>1
					);
					$this->md_parametre->ajout_antecedent_familial($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_liste_antecedents_familiaux_laf",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un nouveau antécédent",
						"log_sActionDetail"=>"a ajouté un nouveau antécédent : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
		
	
	
	public function supprimer_antecedent_familial($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/antecedent_familial");
		}
		else{
			$donnees = array(
				"laf_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_antecedent_familial($donnees,$id);
			$antededent = $this->md_parametre->recup_antecedent_familial($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_antecedents_familiaux_laf",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un antécédent personnel",
					"log_sActionDetail"=>"a supprimé l'antécédent : <strong style='text-decoration:underline'>".$antecedent->lan_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/antecedent_familial");
			}
		}
	}
	
	
	public function modifierAntecedentFamilial()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_antecedent_familial_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"laf_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_antecedent_familial($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_antecedents_familiaux_laf",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un antécédent personnel",
					"log_sActionDetail"=>"a modifié l'antécédent personnel :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	/*********** allergies connues  ***************************/
	public function ajoutAllergie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/allergie");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_allergie(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"lia_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"lia_iSta"=>1
					);
					$this->md_parametre->ajout_allergie($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_liste_allergies_lia",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une nouvelle allergie",
						"log_sActionDetail"=>"a ajouté une nouvelle allergie : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
		
	
	
	public function supprimer_allergie($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/allergie");
		}
		else{
			$donnees = array(
				"lia_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_allergie($donnees,$id);
			$antededent = $this->md_parametre->recup_allergie($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_allergies_lia",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une allergie",
					"log_sActionDetail"=>"a supprimé l'allergie : <strong style='text-decoration:underline'>".$antecedent->lan_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/allergie");
			}
		}
	}
	
	
	public function modifierAllergie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_allergie_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"lia_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_allergie($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_allergies_lia",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une allergie",
					"log_sActionDetail"=>"a modifié l'allergie :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
		
	
	/*********** activités professionnelles  ***************************/
	public function ajoutActiviteProfessionnelle()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/activite_professionnelle");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_activite_professionnelle(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"lap_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"lap_iSta"=>1
					);
					$this->md_parametre->ajout_activite_professionnelle($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_liste_activite_professionnelle_lap",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une nouvelle activité",
						"log_sActionDetail"=>"a ajouté une nouvelle activité : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
		
	
	
	public function supprimer_activite_professionnelle($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/activite_professionnelle");
		}
		else{
			$donnees = array(
				"lap_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_activite_professionnelle($donnees,$id);
			$antededent = $this->md_parametre->recup_activite_professionnelle($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_activite_professionnelle_lap",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une activité",
					"log_sActionDetail"=>"a supprimé l'activité : <strong style='text-decoration:underline'>".$antecedent->lan_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/activite_professionnelle");
			}
		}
	}
	
	
	public function modifierActiviteProfessionnelle()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_activite_professionnelle_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"lap_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_activite_professionnelle($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_activite_professionnelle_lap",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une activité",
					"log_sActionDetail"=>"a modifié l'activité :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
/*********** Motifs de réduction  ***************************/
	public function ajoutMotifReduction()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/motifs_reduction");
		}
		else{

			for($i=0;$i<count($data['lib']) AND $i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_motif_reduction(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"mod_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"mod_iTaux"=>$data['taux'][$i],
					"mod_iSta"=>1
					);
					$this->md_parametre->ajout_motif_reduction($donnees);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_motif_reduction($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/motifs_reduction");
		}
		else{
			$donnees = array(
				"mod_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_motif_reduction($donnees,$id);
			return redirect("parametre/motifs_reduction");
			}
	}	
	
	
		public function modifierMotifReduction()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_motif_reduction_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"mod_sLibelle"=>ucfirst(trim($data['lib'])),
				"mod_iTaux"=>trim($data['taux'])
			);
			$supprimer = $this->md_parametre->maj_motif_reduction_modif($donnees,$data['id']);
			echo ucfirst(trim($data['lib']));
			echo "-/-";
			echo trim($data['taux']);
			
		}
		else{
			echo "echec";
		}
	}
	
	/*********** Unités  ***************************/
	public function ajoutUnite()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/unite");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['ser']);$i++){
				$verif = $this->md_parametre->verif_unite(ucfirst(trim($data['lib'][$i])),$data['ser'][$i]);
				if(!$verif){
					$donnees = array(
					"uni_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"ser_id"=>$data['ser'][$i],
					"uni_iSta"=>1
					);
					$this->md_parametre->ajout_unite($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_unite_uni",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une unité",
						"log_sActionDetail"=>"a ajouté une nouvelle unité : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_unite($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/unite");
		}
		else{
			$donnees = array(
				"uni_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_unite($donnees,$id);
			$unite = $this->md_parametre->recup_unite($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_unite_uni",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une unite",
					"log_sActionDetail"=>"a supprimé l'unite : <strong style='text-decoration:underline'>".$unite->uni_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/unite");
			}
		}
	}
	
	
	public function modifierUnite()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$ser = explode("-/-",$data["ser"]);
		$dep = explode("-/-",$data["dep"]);
		$verif = $this->md_parametre->verif_unite_modif(ucfirst(trim($data['lib'])),$ser[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"uni_sLibelle"=>ucfirst(trim($data['lib'])),
				"ser_id"      =>$ser[0]
			);
			$supprimer = $this->md_parametre->maj_unite($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_unite_uni",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une unité",
					"log_sActionDetail"=>"a modifié l'unité :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$ser[1]."-/-".$dep[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** domaine  ***************************/
	public function ajoutDomaine()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/domaine");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['tpe']);$i++){
				$verif = $this->md_parametre->verif_poste(ucfirst(trim($data['lib'][$i])),$data['tpe'][$i]);
				if(!$verif){
					$donnees = array(
					"pst_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"tpe_id"=>$data['tpe'][$i],
					"pst_iSta"=>1
					);
					$this->md_parametre->ajout_poste($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_postes_pst",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un domaine",
						"log_sActionDetail"=>"a ajouté un nouveau domaine : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_domaine($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/domaine");
		}
		else{
			$donnees = array(
				"pst_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_poste($donnees,$id);
			$poste = $this->md_parametre->recup_poste($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_postes_pst",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un domaine",
					"log_sActionDetail"=>"a supprimé le domaine : <strong style='text-decoration:underline'>".$poste->pst_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/domaine");
			}
		}
	}
	
	
	public function modifierDomaine()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$tpe = explode("-/-",$data["tpe"]);
		$verif = $this->md_parametre->verif_poste_modif(ucfirst(trim($data['lib'])),$tpe[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"pst_sLibelle"=>ucfirst(trim($data['lib'])),
				"tpe_id"      =>$tpe[0]
			);
			$supprimer = $this->md_parametre->maj_poste($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_postes_pst",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un domaine",
					"log_sActionDetail"=>"a modifié le domaine :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$tpe[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Spécialité  ***************************/
	public function ajoutSpecialite()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/specialite");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['pst']);$i++){
				$verif = $this->md_parametre->verif_specialite(ucfirst(trim($data['lib'][$i])),$data['pst'][$i]);
				if(!$verif){
					$donnees = array(
					"spt_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"pst_id"=>$data['pst'][$i],
					"spt_iSta"=>1
					);
					$this->md_parametre->ajout_specialite($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_specialites_spt",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une spécialité",
						"log_sActionDetail"=>"a ajouté une nouvelle spécialité : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_specialite($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/specialite");
		}
		else{
			$donnees = array(
				"spt_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_specialite($donnees,$id);
			$specialite = $this->md_parametre->recup_specialite($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_specialites_spt",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une spécialité",
					"log_sActionDetail"=>"a supprimé la spécialité : <strong style='text-decoration:underline'>".$specialite->spt_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/specialite");
			}
		}
	}
	
	
	public function modifierSpecialite()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$pst = explode("-/-",$data["pst"]);
		$tpe = explode("-/-",$data["tpe"]);
		$verif = $this->md_parametre->verif_specialite_modif(ucfirst(trim($data['lib'])),$pst[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"spt_sLibelle"=>ucfirst(trim($data['lib'])),
				"pst_id"      =>$pst[0]
			);
			$supprimer = $this->md_parametre->maj_specialite($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_specialites_spt",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une spécialité",
					"log_sActionDetail"=>"a modifié la spécialité :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$pst[1]."-/-".$tpe[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
		
	/*********** fonction/poste  ***************************/
	public function ajoutFonction()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/poste");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['pst']);$i++){
				$verif = $this->md_parametre->verif_fonction(ucfirst(trim($data['lib'][$i])),$data['pst'][$i]);
				if(!$verif){
					$donnees = array(
					"fct_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"pst_id"=>$data['pst'][$i],
					"fct_iSta"=>1
					);
					$this->md_parametre->ajout_fonction($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_fonctions_fct",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un poste",
						"log_sActionDetail"=>"a ajouté un nouveau poste : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_fonction($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/poste");
		}
		else{
			$donnees = array(
				"fct_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_fonction($donnees,$id);
			$fonction = $this->md_parametre->recup_fonction($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_fonctions_fct",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un poste",
					"log_sActionDetail"=>"a supprimé le poste : <strong style='text-decoration:underline'>".$fonction->fct_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/poste");
			}
		}
	}
	
	
	public function modifierFonction()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$pst = explode("-/-",$data["pst"]);
		$tpe = explode("-/-",$data["tpe"]);
		$verif = $this->md_parametre->verif_fonction_modif(ucfirst(trim($data['lib'])),$pst[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"fct_sLibelle"=>ucfirst(trim($data['lib'])),
				"pst_id"      =>$pst[0]
			);
			$supprimer = $this->md_parametre->maj_fonction($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_fonctions_fct",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un poste",
					"log_sActionDetail"=>"a modifié le poste :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$pst[1]."-/-".$tpe[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	
			
	/*********** acte médical  ***************************/
	public function ajoutAct()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/acte_medical");
		}
		else{
			
			// var_dump($data);

			for($i=0;$i<count($data['lib']) AND count($data['uni']) AND count($data['cout']) AND count($data['duree']) AND count($data['tya']);$i++){
				$verif = $this->md_parametre->verif_act(ucfirst(trim($data['lib'][$i])),$data['uni'][$i]);
				if(!$verif){
					$donnees = array(
					"lac_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"uni_id"=>$data['uni'][$i],
					"cpt_id"=>$data['cpt'][$i],
					"tya_id"=>$data['tya'][$i],
					"lac_iCout"=>trim($data['cout'][$i]),
					"lac_iDure"=>trim($data['duree'][$i]),
					"lac_iSta"=>1
					);
					$this->md_parametre->ajout_act($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_liste_act_lac",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un acte médical",
						"log_sActionDetail"=>"a ajouté un nouveau acte médical : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_act($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/acte_medical");
		}
		else{
			$donnees = array(
				"lac_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_act($donnees,$id);
			$act = $this->md_parametre->recup_act($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_act_lac",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un acte médical",
					"log_sActionDetail"=>"a supprimé l'acte médical : <strong style='text-decoration:underline'>".$act->lac_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/acte_medical");
			}
		}
	}
	
	
	public function modifierAct()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$uni = explode("-/-",$data["uni"]);
		$ser = explode("-/-",$data["ser"]);
		$tya = explode("-/-",$data["tya"]);

		$verif = $this->md_parametre->verif_act_modif(ucfirst(trim($data['lib'])),$uni[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"lac_sLibelle"=>ucfirst(trim($data['lib'])),
				"lac_iCout"=>trim($data['cout']),
				"lac_iDure"=>trim($data['duree']),
				"uni_id"      =>$uni[0],
				"tya_id"      =>$tya[0]
			);
			
			$supprimer = $this->md_parametre->maj_act($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_act_lac",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un acte médical",
					"log_sActionDetail"=>"a modifié l'acte médical :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$uni[1]."-/-".$ser[1]."-/-".number_format($data['cout'],2,",",".")."-/-".$data['duree']."-/-".$tya[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	/*********** Catégorie produit  ***************************/
	public function ajoutCategorieProduit()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/categorie_produit");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_categorie_produit(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"cat_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"cat_iSta"=>1
					);
					$this->md_parametre->ajout_categorie_produit($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_categories_cat",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une catégorie",
						"log_sActionDetail"=>"a ajouté une nouvelle catégorie de produit : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_categorie_produit($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/categorie_produit");
		}
		else{
			$donnees = array(
				"cat_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_categorie_produit($donnees,$id);
			$categorie = $this->md_parametre->recup_categorie_produit($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_categories_cat",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une catégorie",
					"log_sActionDetail"=>"a supprimé une catégorie : <strong style='text-decoration:underline'>".$categorie->cat_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/categorie_produit");
			}
		}
	}
	
	
	public function modifierCategorieProduit()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_categorie_produit_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"cat_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_categorie_produit($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_categories_cat",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une catégorie",
					"log_sActionDetail"=>"a modifié le nom de la catégorie :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Famille produit  ***************************/
	public function ajoutFamilleProduit()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/famille_produit");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_famille_produit(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"fam_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"fam_iSta"=>1
					);
					$this->md_parametre->ajout_famille_produit($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_famille_fam",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une famille",
						"log_sActionDetail"=>"a ajouté une nouvelle famille de produit : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_famille_produit($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/famille_produit");
		}
		else{
			$donnees = array(
				"fam_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_famille_produit($donnees,$id);
			$famille = $this->md_parametre->recup_famille_produit($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_famille_fam",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une famille",
					"log_sActionDetail"=>"a supprimé une famille : <strong style='text-decoration:underline'>".$famille->fam_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/famille_produit");
			}
		}
	}
	
	
	public function modifierFamilleProduit()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_famille_produit_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"fam_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_famille_produit($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_famille_fam",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une famille",
					"log_sActionDetail"=>"a modifié le nom de la famille :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Forme produit  ***************************/
		
	public function ajoutFormeProduit()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/forme_produit");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_forme_produit(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"for_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"for_iSta"=>1
					);
					$this->md_parametre->ajout_forme_produit($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_forme_for",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une forme",
						"log_sActionDetail"=>"a ajouté une nouvelle forme de produit : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_forme_produit($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/forme_produit");
		}
		else{
			$donnees = array(
				"for_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_forme_produit($donnees,$id);
			$famille = $this->md_parametre->recup_forme_produit($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_forme_for",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une forme",
					"log_sActionDetail"=>"a supprimé une forme : <strong style='text-decoration:underline'>".$famille->for_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/forme_produit");
			}
		}
	}
	
	
	public function modifierFormeProduit()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_forme_produit_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"for_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_forme_produit($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_forme_for",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une forme",
					"log_sActionDetail"=>"a modifié le nom de la forme :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Type fournisseur  ***************************/
		
	public function ajoutTypeFournisseur()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/type_fournisseur");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_type_fournisseur(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"tfr_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"tfr_iSta"=>1
					);
					$this->md_parametre->ajout_type_fournisseur($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_type_fournisseur_tfr",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un type fournisseur",
						"log_sActionDetail"=>"a ajouté un type fournisseur : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_type_fournisseur($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/type_fournisseur");
		}
		else{
			$donnees = array(
				"tfr_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_type_fournisseur($donnees,$id);
			$type = $this->md_parametre->recup_type_fournisseur($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_fournisseur_tfr",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un type de fournisseur",
					"log_sActionDetail"=>"a supprimé un type de fournisseur : <strong style='text-decoration:underline'>".$type->tfr_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/type_fournisseur");
			}
		}
	}
	
	
	public function modifierTypeFournisseur()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_type_fournisseur_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"tfr_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_type_fournisseur($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_fournisseur_tfr",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un type de fournisseur",
					"log_sActionDetail"=>"a modifié le nom du type de fournisseur :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Salle  ***************************/
		
	public function ajoutSalle()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/salle");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_salle(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"sal_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"sal_iSta"=>1
					);
					$this->md_parametre->ajout_salle($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_salles_sal",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une salle",
						"log_sActionDetail"=>"a ajouté une nouvelle salle : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_salle($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/salle");
		}
		else{
			$donnees = array(
				"sal_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_salle($donnees,$id);
			$type = $this->md_parametre->recup_salle($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_salles_sal",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une salle",
					"log_sActionDetail"=>"a supprimé un : <strong style='text-decoration:underline'>".$type->sal_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/salle");
			}
		}
	}
	
	
	public function modifierSalle()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_salle_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"sal_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_salle($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_salles_sal",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une salle",
					"log_sActionDetail"=>"a modifié le nom de la salle :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Armoire  ***************************/
		
	public function ajoutArmoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/armoire");
		}
		else{

			for($i=0;$i<count($data['lib']) AND $i<count($data['sal']) AND $i<count($data['colonne']) AND $i<count($data['ligne']);$i++){
				$verif = $this->md_parametre->verif_armoire(ucfirst(trim($data['lib'][$i])),$data['sal'][$i]);
				if(!$verif){
					$donnees = array(
					"arm_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"sal_id"=>$data['sal'][$i],
					"arm_iSta"=>1
					);
					$ajout = $this->md_parametre->ajout_armoire($donnees);
					if($ajout){
						$ligne = array();
						for($j=0;$j<$data['ligne'][$i];$j++){
							$dataLigne = array(
								'lig_sLibelle'=>$j+1,
								'arm_id'=>$ajout->arm_id
							);
							$ligne[] = $this->md_parametre->ajout_ligne($dataLigne);
						}						
						
						$valCol = 'A';
						$colonne = array();
						for($k=0;$k<$data['colonne'][$i];$k++){
							$dataColonne = array(
								'col_sLibelle'=>$valCol++ . PHP_EOL,
								'arm_id'=>$ajout->arm_id
							);
							$colonne[] = $this->md_parametre->ajout_colonne($dataColonne);
						}
						
						
						for($l=0;$l<count($ligne);$l++){
							for($m=0;$m<count($colonne);$m++){
								$cellule = $colonne[$m].$ligne[$l];
									$dataCellule = array(
									'cel_sLibelle'=>$cellule,
									'arm_id'=>$ajout->arm_id
								);
							 $this->md_parametre->ajout_cellule($dataCellule);
							}
						}
						
						if($data['ligne'][$i]>1){
							$ligne = $data['ligne'][$i]." lignes";
						}
						else{
							$ligne = $data['ligne'][$i]." ligne";
						}
						
						if($data['colonne'][$i]>1){
							$colonne = $data['colonne'][$i]." colonnes";
						}
						else{
							$colonne = $data['colonne'][$i]." colonne";
						}
						$log = array(
							"log_iSta"=>0,
							"per_id"=>$this->session->epiphanie_diab,
							"log_sTable"=>"t_armoires_arm",
							"log_sIcone"=>"nouveau membre",
							"log_sAction"=>"a ajouté une armoire",
							"log_sActionDetail"=>"a ajouté une nouvelle armoire : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong> avec ".$ligne." et ".$colonne,
							"log_dDate"=>date("Y-m-d H:i:s")
						);
						$this->md_connexion->rapport($log);
					}
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_armoire($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/armoire");
		}
		else{
			$donnees = array(
				"arm_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_armoire($donnees,$id);
			$type = $this->md_parametre->recup_armoire($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_armoires_arm",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une armoire",
					"log_sActionDetail"=>"a supprimé un : <strong style='text-decoration:underline'>".$type->arm_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/armoire");
			}
		}
	}
	
	
	public function modifierArmoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$sal = explode("-/-",$data["sal"]);
		$verif = $this->md_parametre->verif_armoire_modif(ucfirst(trim($data['lib'])),$sal[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"arm_sLibelle"=>ucfirst(trim($data['lib'])),
				"sal_id"=>$sal[0]
			);
			$supprimer = $this->md_parametre->maj_armoire($donnees,$data['id']);
			if($supprimer){
				$this->md_parametre->delete_ligne($data['id']);
				$this->md_parametre->delete_colonne($data['id']);
				$this->md_parametre->delete_cellule($data['id']);
				$ligne = array();
				for($j=0;$j<$data['ligne'];$j++){
					$dataLigne = array(
						'lig_sLibelle'=>$j+1,
						'arm_id'=>$data['id']
					);
					$ligne[] = $this->md_parametre->ajout_ligne($dataLigne);
				}						
				
				$valCol = 'A';
				$colonne = array();
				for($k=0;$k<$data['colonne'];$k++){
					$dataColonne = array(
						'col_sLibelle'=>$valCol++ . PHP_EOL,
						'arm_id'=>$data['id']
					);
					$colonne[] = $this->md_parametre->ajout_colonne($dataColonne);
				}
				
				
				for($l=0;$l<count($ligne);$l++){
					for($m=0;$m<count($colonne);$m++){
						$cellule = $colonne[$m].$ligne[$l];
							$dataCellule = array(
							'cel_sLibelle'=>$cellule,
							'arm_id'=>$data['id']
						);
					 $this->md_parametre->ajout_cellule($dataCellule);
					}
				}
				
				$celluleListe = $this->md_parametre->liste_cellule_armoire($data['id']); 
				
				if($data['ligne']>1){
					$ligne = $data['ligne']." lignes";
				}
				else{
					$ligne = $data['ligne']." ligne";
				}
				
				if($data['colonne']>1){
					$colonne = $data['colonne']." colonnes";
				}
				else{
					$colonne = $data['colonne']." colonne";
				}
				
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_armoires_arm",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une armoire",
					"log_sActionDetail"=>"a modifié le nom de l\'armoire :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>) avec ".$ligne." et ".$colonne,
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$sal[1]."-/-".$data['ligne']."-/-".$data['colonne']."-/-";
				foreach($celluleListe AS $c){
					echo $c->cel_sLibelle."; ";
				}
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	/*********** Chambre  ***************************/
		
	public function ajoutChambre()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/chambre");
		}
		else{
			for($i=0;$i<count($data['lib']) AND $i< count($data['nb']) AND $i<count($data['uni']) AND $i<count($data['prix']);$i++){
				$verif = $this->md_parametre->verif_chambre($data['lib'][$i],$data['uni'][$i]);
				if(!$verif){	
					$donnees = array(
						'uni_id'=>$data['uni'][$i],
						'cha_iPrixLit'=>$data['prix'][$i],
						'cha_iSta'=>1,
						'cha_sLibelle '=>$data['lib'][$i]
					);
					$recup = $this->md_parametre->ajout_chambre($donnees);
					
					$nb = $data['nb'][$i];
					
					for($j=0;$j<$nb;$j++){
						$num = $j+1;
						$lit= "Lit ".$num;
						$donn = array(
							"lit_iOccupe"=>0,
							"lit_sLibelle"=>$lit,
							"cha_id"=>$recup
						);
						$this->md_parametre->ajout_lit($donn);
						$log = array(
							"log_iSta"=>0,
							"per_id"=>$this->session->epiphanie_diab,
							"log_sTable"=>"t_salles_sal",
							"log_sIcone"=>"nouveau membre",
							"log_sAction"=>"a ajouté une salle",
							"log_sActionDetail"=>"a ajouté une nouvelle salle : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
							"log_dDate"=>date("Y-m-d H:i:s")
						);
						$this->md_connexion->rapport($log);
					}
					echo "ok";
					
				}
			}
			
		}
	
	}
	
	
	/*********** Bloc opératoire  ***************************/
		
	public function ajoutBloc()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/bloc_operatoire");
		}
		else{
			for($i=0;$i<count($data['lib']) AND $i< count($data['nb']) AND $i<count($data['uni']);$i++){
				$verif = $this->md_parametre->verif_bloc($data['lib'][$i]);
				if(!$verif){	
					$donnees = array(
						'uni_id'=>$data['uni'][$i],
						'bop_iSta'=>1,
						'bop_sLibelle '=>$data['lib'][$i]
					);
					$recup = $this->md_parametre->ajout_bloc($donnees);
					
					$nb = $data['nb'][$i];
					
					for($j=0;$j<$nb;$j++){
						$num = $j+1;
						$salle= "Salle ".$num;
						$donn = array(
							"sop_iOccupe"=>0,
							"sop_sLibelle"=>$salle,
							"bop_id"=>$recup
						);
						$this->md_parametre->ajout_salle_operation($donn);
						// $log = array(
							// "log_iSta"=>0,
							// "per_id"=>$this->session->epiphanie_diab,
							// "log_sTable"=>"t_salles_sal",
							// "log_sIcone"=>"nouveau membre",
							// "log_sAction"=>"a ajouté une salle",
							// "log_sActionDetail"=>"a ajouté une nouvelle salle : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
							// "log_dDate"=>date("Y-m-d H:i:s")
						// );
						// $this->md_connexion->rapport($log);
					}
					echo "ok";
					
				}
			}
			
		}
	
	}
	
	
	/*********** type examen  ***************************/
	public function ajoutTypeExamen()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/type_examen");
		}
		else{


					$donnees = array(
					"tex_sLibelle"=>ucfirst(trim($data['lib'])),
					"tex_iSta"=>1
					);
					$this->md_parametre->ajout_type_examen($donnees);
					// $log = array(
						// "log_iSta"=>0,
						// "per_id"=>$this->session->epiphanie_diab,
						// "log_sTable"=>"t_type_examen_tex",
						// "log_sIcone"=>"nouveau type examen",
						// "log_sAction"=>"a ajouté un type d'examen",
						// "log_sActionDetail"=>"a ajouté un nouveau type d'examen : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						// "log_dDate"=>date("Y-m-d H:i:s")
					// );
					// $this->md_connexion->rapport($log);
			
			
		}
	
	}
	
	/*********** element analyse  ***************************/
	public function ajoutElementAnalyse()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/element_analyse");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['tex']) AND count($data['lac']) AND count($data['v1']) AND count($data['v2']) AND count($data['unite']);$i++){
				$donnees = array(
				"tex_id"=>trim($data['tex'][$i]),
				"lac_id"=>trim($data['lac'][$i]),
				"ela_sLibelle"=>ucfirst(trim($data['lib'][$i])),
				"ela_iValMax"=>$data['v2'][$i],
				"ela_iValMin"=>$data['v1'][$i],
				"ela_sUnite"=>$data['unite'][$i],
				"ela_iSta"=>1
				);
				$this->md_parametre->ajout_element_analyse($donnees);
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_element_analyse_ela",
					"log_sIcone"=>"nouvel element",
					"log_sAction"=>"a ajouté un element d'analyse",
					"log_sActionDetail"=>"a ajouté un nouvel element d'analyse : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
			}			
		}
	
	}
	
	
	
	public function supprimer_type_examen($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/type_examen");
		}
		else{
			$donnees = array(
				"tex_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_type_examen($donnees,$id);
			$service = $this->md_parametre->recup_type_examen($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_examen_tex",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un type d'examen",
					"log_sActionDetail"=>"a supprimé le type d'examen : <strong style='text-decoration:underline'>".$service->tex_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/type_examen");
			}
		}
	}
	
	public function modifierTypeExamen()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		//$dep = explode("-/-",$data["dep"]);
		$verif = $this->md_parametre->verif_typeExamen_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"tex_sLibelle"=>ucfirst(trim($data['lib'])),
			);
			$supprimer = $this->md_parametre->maj_type_exam($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_services_ser",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un type d'examen",
					"log_sActionDetail"=>"a modifié le type d'examen :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	public function supprimer_element_analyse($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/element_analyse");
		}
		else{
			$donnees = array(
				"ela_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_element_analyse($donnees,$id);
			$service = $this->md_parametre->recup_element_analyse($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_examen_tex",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un element",
					"log_sActionDetail"=>"a supprimé un element : <strong style='text-decoration:underline'>".$service->tex_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/element_analyse");
			}
		}
	}
	
	
	
	public function ajoutAccessoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/accessoire");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_salle(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"acc_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"acc_iSta"=>1
					);
					$this->md_parametre->ajout_accessoire($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_accessoire_acc",
						"log_sIcone"=>"nouvel accessoire",
						"log_sAction"=>"a ajouté un accessoire",
						"log_sActionDetail"=>"a ajouté un nouvel accessoire : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	
	public function supprimer_accessoire($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/accessoire");
		}
		else{
			$donnees = array(
				"acc_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_accessoire($donnees,$id);
			$type = $this->md_parametre->recup_accessoire($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_accessoire_acc",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un acce3",
					"log_sActionDetail"=>"a supprimé un : <strong style='text-decoration:underline'>".$type->acc_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/accessoire");
			}
		}
	}
	
	
	public function modifierAccessoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_salle_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"acc_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_accessoire($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_accessoire_acc",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un accessoire",
					"log_sActionDetail"=>"a modifié l'accessoire :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	/*********** Création réactif  ***************************/
	public function ajoutReactif()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/nouveau_reactif");
		}
		else{
				$verif = $this->md_parametre->verif_reactif(ucfirst(trim($data['lib'])));
				if(!$verif){
					$donnees = array(
					"rea_sLibelle"=>ucfirst(trim($data['lib'])),
					"rea_iSta"=>1
					);
					$rea = $this->md_parametre->ajout_reactif($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_reactif_rea",
						"log_sIcone"=>"nouveau reactif",
						"log_sAction"=>"a ajouté un réactif",
						"log_sActionDetail"=>"a ajouté un nouveau réactif : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				
					if(isset($_POST["lac"])){
						$nbExamen = count($data['lac']);
						for($i=0;$i<count($data['lac']);$i++){
							$verifRea = $this->md_parametre->verif_existe_reactif($rea->rea_id,trim($data['lac'][$i]));
							if(!$verifRea){
								$donneesRea = array(
								"rea_id"=>$rea->rea_id,
								"lac_id"=>trim($data['lac'][$i])
								);
								$this->md_parametre->ajout_reactif_examen($donneesRea);
							}
						}
						
						$don = array('rea_iNb'=>$nbExamen);
						$update = $this->md_parametre->maj_reactif($don, $rea->rea_id);
					}
					echo "ok";
				}
				else{
					echo "Ce réactif est déjà enregistré. <br>Essayez un autre";
				}
		}
	
	}
	
	
	public function supprimer_reactif($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/nouveau_reactif");
		}
		else{
			$donnees = array(
				"rea_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_reactif($donnees,$id);
			$rea = $this->md_parametre->recup_reactif($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_reactif_rea",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un réactif",
					"log_sActionDetail"=>"a supprimé le réactif : <strong style='text-decoration:underline'>".$rea->rea_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/nouveau_reactif");
			}
		}
	}
	
	/*********** appareil  ***************************/
	public function ajoutAppareil()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/appareil");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_appareil(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"app_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"app_iSta"=>1
					);
					$this->md_parametre->ajout_appareil($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_appareil_app",
						"log_sIcone"=>"nouvel appareil",
						"log_sAction"=>"a ajouté un nouvel appareil",
						"log_sActionDetail"=>"a ajouté un nouvel appareil : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	
	public function supprimer_appareil($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/appareil");
		}
		else{
			$donnees = array(
				"app_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_appareil($donnees,$id);
			$service = $this->md_parametre->recup_appareil($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_appareil_app",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un appareil",
					"log_sActionDetail"=>"a supprimé l\'appareil : <strong style='text-decoration:underline'>".$service->app_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/appareil");
			}
		}
	}
	
	public function modifierAppareil()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_appareil_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"app_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_appareil($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_appareil_app",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un appareil",
					"log_sActionDetail"=>"a modifié l\'appareil :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	/*********** Famille maladie  ***************************/
		
	public function ajoutFamilleMaladie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/famille_maladie");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_famille_maladie(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"fma_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"fma_iSta"=>1
					);
					$this->md_parametre->ajout_famille_maladie($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_famille_maladie_fma",
						"log_sIcone"=>"nouvelle famille de maladie",
						"log_sAction"=>"a ajouté une famille de maladie",
						"log_sActionDetail"=>"a ajouté une nouvelle famille : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	
	public function supprimer_famille_maladie($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/famille_maladie");
		}
		else{
			$donnees = array(
				"fma_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_famille_maladie($donnees,$id);
			$service = $this->md_parametre->recup_famille_maladie($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_famille_maladie_fma",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une famille de maladies",
					"log_sActionDetail"=>"a supprimé la famille : <strong style='text-decoration:underline'>".$service->fma_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/famille_maladie");
			}
		}
	}
	
	public function modifierFma()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_famille_maladie_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"fma_sLibelle"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_famille_maladie($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_famille_maladie_fma",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une famille de maladie",
					"log_sActionDetail"=>"a modifié le nom de la maladie :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
		/*********** Maladie  ***************************/
	
	public function ajoutMaladie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/maladie");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['dep']);$i++){
				$verif = $this->md_parametre->verif_maladie(ucfirst(trim($data['lib'][$i])),$data['dep'][$i]);
				if(!$verif){
					$donnees = array(
					"mal_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"fma_id"=>$data['dep'][$i],
					"mal_iSta"=>1
					);
					$this->md_parametre->ajout_maladie($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_maladie_mal",
						"log_sIcone"=>"nouvelle maladie",
						"log_sAction"=>"a ajouté une maladie",
						"log_sActionDetail"=>"a ajouté une nouvelle maladie : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}	

	public function supprimer_maladie($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/maladie");
		}
		else{
			$donnees = array(
				"mal_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_maladie($donnees,$id);
			$service = $this->md_parametre->recup_maladie($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_maladie_mal",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une maladie",
					"log_sActionDetail"=>"a supprimé la maladie : <strong style='text-decoration:underline'>".$service->mal_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/maladie");
			}
		}
	}
	
	
	public function modifierMaladie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$dep = explode("-/-",$data["dep"]);
		$verif = $this->md_parametre->verif_maladie_modif(ucfirst(trim($data['lib'])),$dep[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"mal_sLibelle"=>ucfirst(trim($data['lib'])),
				"fma_id"      =>$dep[0]
			);
			$supprimer = $this->md_parametre->maj_maladie($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_maladie_mal",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une maladie",
					"log_sActionDetail"=>"a modifié la maladie :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$dep[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	/*********** Spécification Maladie  ***************************/
	
	public function ajoutSpecificationMaladie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/specification_maladie");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['dep']);$i++){
				$verif = $this->md_parametre->verif_specification_maladie(ucfirst(trim($data['lib'][$i])),$data['dep'][$i]);
				if(!$verif){
					$donnees = array(
					"sma_sLibelle"=>ucfirst(trim($data['lib'][$i])),
					"mal_id"=>$data['dep'][$i],
					"sma_iSta"=>1,
					"sma_sCode"=>NULL
					);
					$this->md_parametre->ajout_specification_maladie($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_specification_maladie_sma",
						"log_sIcone"=>"nouvelle spécification maladie",
						"log_sAction"=>"a ajouté une spécification maladie",
						"log_sActionDetail"=>"a ajouté une nouvelle spécification maladie : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_specification_maladie($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/specification_maladie");
		}
		else{
			$donnees = array(
				"sma_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_specification_maladie($donnees,$id);
			$service = $this->md_parametre->recup_specification_maladie($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_maladie_mal",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une spécification maladie",
					"log_sActionDetail"=>"a supprimé la spécification de la maladie : <strong style='text-decoration:underline'>".$service->sma_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/specification_maladie");
			}
		}
	}
	
	public function modifierSpecificationMaladie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$dep = explode("-/-",$data["dep"]);
		$verif = $this->md_parametre->verif_specification_maladie_modif(ucfirst(trim($data['lib'])),$dep[0],$data['id']);
		if(!$verif){
			$donnees = array(
				"sma_sLibelle"=>ucfirst(trim($data['lib'])),
				"mal_id"      =>$dep[0]
			);
			$supprimer = $this->md_parametre->maj_specification_maladie($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_specification_maladie_sma",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une spécification",
					"log_sActionDetail"=>"a modifié la spécification :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$dep[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	
		/*********** Convention Entreprise  ***************************/
	public function ajoutConventionEntreprise()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/convention_patient");
		}
		else{


			$donnees = array(
			"cpa_sEnseigne"=>ucfirst(trim($data['lib'])),
			"cpa_dDate"=>date("Y-m-d H:i:s"),
			"cpa_iSta"=>1
			);
			$this->md_parametre->ajout_convention_entreprise($donnees);
			// $log = array(
				// "log_iSta"=>0,
				// "per_id"=>$this->session->epiphanie_diab,
				// "log_sTable"=>"t_type_examen_tex",
				// "log_sIcone"=>"nouveau type examen",
				// "log_sAction"=>"a ajouté un type d'examen",
				// "log_sActionDetail"=>"a ajouté un nouveau type d'examen : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
				// "log_dDate"=>date("Y-m-d H:i:s")
			// );
			// $this->md_connexion->rapport($log);			
		}
	}
	
	
	public function supprimer_convention_entreprise($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/convention_patient");
		}
		else{
			$donnees = array(
				"cpa_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_convention_entreprise($donnees,$id);
			$service = $this->md_parametre->recup_convention_entreprise($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_convention_patient_cpa",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une entreprise",
					"log_sActionDetail"=>"a supprimé l'entreprise : <strong style='text-decoration:underline'>".$service->cpa_sEnseigne."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/convention_patient");
			}
		}
	}
	
	
	public function ajoutBanque()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/new_banque");
		}
		else{
			$verif = $this->md_parametre->compte_nb_banque($data['banque']);
			if($verif->nb!=0){
				echo'Cette banque est déjà enregistrée';
			}else{
				if($_FILES["logo"]["name"]==""){
					$donnees = array(
						"bnq_iSta"=>1,
						"bnq_sEnseigne"=>strtoupper(trim($data["banque"])),
						"bnq_sLogo"=>"assets/images/logo/logo.jpg"
					);
					$ajout=$this->md_parametre->ajout_banque($donnees);
				}
				else{

					$verifTaille = $this->md_config->sizeImage($_FILES["logo"],150);
					if(!$verifTaille){
						echo "La taille de l'image ne doit pas dépasser les 150 Ko";
					}
					else{
						$config["upload_path"] =  './assets/images/logo/';
						$config["allowed_types"] = 'jpg|png|jpeg';
						$nomImage= time()."-".$_FILES["logo"]["name"];
						$config["file_name"] = $nomImage; 
						$verifImage = $this->md_config->uploadImage($_FILES["logo"]);
						if(!$verifImage){
							echo "Les formats de l'image autorisés sont .jpg, .jpeg, .png";
						}
						else{
							$this->load->library('upload',$config);
						
							if($this->upload->do_upload("logo")){
								$image=$this->upload->data();
					
								$data["logo"]="assets/images/logo/".$image['file_name'];
							}
							else{
								$data["logo"]="assets/images/logo/logo.jpg";
							}
							
							$donnees = array(
							"bnq_iSta"=>1,
							"bnq_sEnseigne"=>strtoupper(trim($data["banque"])),
							"bnq_sLogo"=>$data["logo"],
							"bnq_dDate"=>date("Y-m-d")
							);
							$ajout=$this->md_parametre->ajout_banque($donnees);
						}
					}
							
				}
				
				if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_banque_bnq",
						"log_sIcone"=>"nouveau",
						"log_sAction"=>"a ajouté une nouvelle banque : ".$ajout,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					echo $ajout;
				}
			}
		}
	}
	
	
	public function supprimer_banque($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/new_banque");
		}
		else{
			$donnees = array(
				"bnq_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_banque($donnees,$id);
			$type = $this->md_parametre->recup_banque($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_banque_bnq",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une banque",
					"log_sActionDetail"=>"a supprimé un : <strong style='text-decoration:underline'>".$type->bnq_sEnseigne."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/new_banque");
			}
		}
	}
	
	
	public function ajoutCompte()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/new_compte");
		}
		else{
			$verif = $this->md_parametre->compte_nb_compte($data['numero']);
			if($verif->nb!=0){
				echo'Ce numéro de compte est déjà enregistré';
			}else{
					if($data['numero']<0){
						echo'Numéro de compte invalide';
					}else{	
						$donnees = array(
						"cpt_iSta"=>1,
						"cpt_iNumero"=>$data['numero'],
						"cpt_iType"=>$data['type'],
						"cpt_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_parametre->ajout_compte($donnees);
						
					if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_compte_cpt",
						"log_sIcone"=>"nouveau",
						"log_sAction"=>"a ajouté un nouveau compte dont le numéro est : ".$ajout,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
				}
			}		
			}
		}
	
	
	public function supprimer_compte($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/new_compte");
		}
		else{
			$donnees = array(
				"cpt_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_compte($donnees,$id);
			$type = $this->md_parametre->recup_compte($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_compte_cpt",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un compte",
					"log_sActionDetail"=>"a supprimé le compte : <strong style='text-decoration:underline'>".$type->cpt_iNumero."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/new_compte");
			}
		}
	}
	
	
	public function ajoutSousCompte()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/new_sous_compte");
		}
		else{
			$verif = $this->md_parametre->compte_nb_sous_compte($data['numero']);
			if($verif->nb!=0){
				echo'Libellé de sous compte déjà enregistré';
			}else{
					$donnees = array(
						"scp_iSta"=>1,
						"cpt_id"=>$data['compte'],
						"scp_sLibelle"=>$data["libelle"],
						"scp_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_parametre->ajout_sous_compte($donnees);
						
					if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_sous_compte_scp",
						"log_sIcone"=>"nouveau",
						"log_sAction"=>"a ajouté un nouveau sous compte dont le libellé est : ".$ajout,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					}
				}		
			}
	}
	
	
	public function supprimer_sous_compte($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/new_sous_compte");
		}
		else{
			$donnees = array(
				"scp_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_sous_compte($donnees,$id);
			$type = $this->md_parametre->recup_sous_compte($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_sous_compte_scp",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un sous compte",
					"log_sActionDetail"=>"a supprimé le sous compte : <strong style='text-decoration:underline'>".$type->scp_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/new_sous_compte");
			}
		}
	}	
	
	public function ajoutSousLibCompte()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/sous_libelle_compte");
		}
		else{
			$verif = $this->md_parametre->nb_sous_compte($data['libelle']);
			if($verif->nb!=0){
				echo'Libellé de sous compte déjà enregistré';
			}else{
					$donnees = array(
						"slc_iSta"=>1,
						"scp_id"=>$data['compte'],
						"slc_sLibelle"=>$data["libelle"],
						"slc_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_parametre->ajout_lib_sous_compte($donnees);
						
					if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_sous_libelle_compte_slc",
						"log_sIcone"=>"nouveau",
						"log_sAction"=>"a ajouté un nouveau sous compte dont le libellé est : ".$ajout,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					}
				}		
			}
	}
	
	
	public function supprimer_lib_sous_compte($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/new_sous_compte");
		}
		else{
			$donnees = array(
				"scp_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_sous_compte($donnees,$id);
			$type = $this->md_parametre->recup_sous_compte($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_sous_compte_scp",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un sous compte",
					"log_sActionDetail"=>"a supprimé le sous compte : <strong style='text-decoration:underline'>".$type->scp_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/new_sous_compte");
			}
		}
	}
	
	
	public function ajoutFoncCompte()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/new_compte_fonctionnement");
		}
		else{
			$verif = $this->md_parametre->compte_nb_compte_fonctionnement($data['libelle']);
			if($verif->nb!=0){
				echo'Libellé de sous compte déjà enregistré';
			}else{
					$donnees = array(
						"fcp_iSta"=>1,
						"cpt_id"=>$data['compte'],
						"fcp_sLibelle"=>$data["libelle"],
						"fcp_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_parametre->ajout_compte_fonctionnement($donnees);
						
					if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_fonctionnement_compte_fcp",
						"log_sIcone"=>"nouveau",
						"log_sAction"=>"a ajouté un nouveau compte de fonctionnement dont le libellé est : ".$ajout,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					}
				}		
			}
	}
	
	public function supprimer_compte_sous_fonct($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/new_sous_compte_fonctionnement");
		}
		else{
			$donnees = array(
				"fcp_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_compte_fonct($donnees,$id);
			$type = $this->md_parametre->recup_compte_fonct($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_fonctionnement_compte_fcp",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un compte de fonctionnement",
					"log_sActionDetail"=>"a supprimé le compte : <strong style='text-decoration:underline'>".$type->fcp_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/new_compte_fonctionnement");
			}
		}
	}	
	
	public function supprimer_compte_fonctionnement($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/new_compte_fonctionnement");
		}
		else{
			$donnees = array(
				"fcp_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_compte_fonct($donnees,$id);
			$type = $this->md_parametre->recup_compte_fonct($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_fonctionnement_compte_fcp",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un compte de fonctionnement",
					"log_sActionDetail"=>"a supprimé le compte : <strong style='text-decoration:underline'>".$type->fcp_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/new_compte_fonctionnement");
			}
		}
	}
	
	
	
	public function ajoutSousLibCompteFonct()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/new_sous_compte_fonctionnement");
		}
		else{
			$verif = $this->md_parametre->nb_sous_compte_fonct($data['lib']);
			if($verif->nb!=0){
				echo'Libellé de sous compte déjà enregistré';
			}else{
					$donnees = array(
						"sfc_iSta"=>1,
						"fcp_id"=>$data['cpt'],
						"sfc_sLibelle"=>strtoupper($data["lib"]),
						"sfc_iMontant"=>NULL,
						"sfc_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_parametre->ajout_lib_sous_compte_fonct($donnees);
						
					if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_sous_libelle_compte_slc",
						"log_sIcone"=>"nouveau",
						"log_sAction"=>"a ajouté un nouveau sous compte dont le libellé est : ".$ajout,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					}
				}		
			}
	}
	
	
	public function ajoutRecet()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/new_recette");
		}
		else{
			$verif = $this->md_parametre->compte_nb_compte_recette($data['libelle']);
			if($verif->nb!=0){
				echo'Libellé de compte déjà enregistré';
			}else{
					$donnees = array(
						"rec_iSta"=>1,
						"cpt_id"=>$data['compte'],
						"rec_sLibelle"=>$data["libelle"],
						"rec_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_parametre->ajout_compte_recette($donnees);
						
					if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_recette_rec",
						"log_sIcone"=>"nouveau",
						"log_sAction"=>"a ajouté un nouveau compte de recette dont le libellé est : ".$ajout,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					}
				}		
			}
	}
	
	
	public function supprimer_compte_recette($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/new_recette");
		}
		else{
			$donnees = array(
				"rec_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_compte_recet($donnees,$id);
			$type = $this->md_parametre->recup_compte_recet($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_recette_rec",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un compte de recette",
					"log_sActionDetail"=>"a supprimé le compte : <strong style='text-decoration:underline'>".$type->rec_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/new_recette");
			}
		}
	}
	
	
	
		
	public function editPass()
	{
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/nouveau");
			// var_dump($data);
		}
		else{

			if(trim($data["npass"]) == trim($data["cpass"])){

				date_default_timezone_set('Africa/Brazzaville');
				
				$donnees = array(
					"per_sPwd"=>$this->md_config->cryptPass($data["npass"])
				);
				
				$ajout=$this->md_personnel->modifier_personnel($donnees,$data["id"]);
				// var_dump($ajout);
				
				if($ajout){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_personnel_per",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a crée un nouveau membre du personnel : ".strtoupper(trim($data["nom"]))." ".$prenom,
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					echo "Employé ajouté avec succès";
				}

							
					
			}
			else{
				echo "Les mots de passe ne sont pas identiques !";
			}
			
			
		}
	}
	
	
		
	/*********** Actes Divers  ***************************/
	
		public function ajoutFraisDivers()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/actes_divers");
		}
		else{

			

				$verif = $this->md_parametre->verif_act(ucfirst(trim($data['lib'])),$data['uni']);
				if(!$verif){
				
					// $tab = explode('-/-', $data['uni']);
					
					if($data['tya']=='NON'){$data['tya'] = NULL;}
				
					$donnees = array(
					"lac_sLibelle"=>ucfirst(trim($data['lib'])),
					"uni_id"=>$data['uni'],
					"cpt_id"=>NULL,
					"lac_iCout"=>0,
					"lac_iDure"=>0,
					"lac_iSta"=>1,
					"tya_id"=>$data['tya'],
					"lac_sSta"=>$data['check']
					);
					$this->md_parametre->ajout_act($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_liste_act_lac",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un acte médical",
						"log_sActionDetail"=>"a ajouté un nouveau acte médical : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					echo "ok";
				}else{
					echo "deja";
				}
			
			
		}
	
	}

	
	
		public function supprimer_acte_divers($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/actes_divers");
		}
		else{
			$donnees = array(
				"lac_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_act($donnees,$id);
			$act = $this->md_parametre->recup_act($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_act_lac",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un acte médical",
					"log_sActionDetail"=>"a supprimé l'acte médical : <strong style='text-decoration:underline'>".$act->lac_sLibelle."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/actes_divers");
			}
		}
	}
	
	
	
	
		
	
	public function modifierActedivers()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$uni = explode("-/-",$data["uni"]);
		$tya = explode("-/-",$data["tya"]);
		// $ser = explode("-/-",$data["ser"]);
		$verif = $this->md_parametre->verif_act_modif(ucfirst(trim($data['lib'])),$uni[0],$data['id']);
		if(!$verif){
			
			if($tya[0]=='NON'){$tya[0] = NULL;}
			
			$donnees = array(
				"lac_sLibelle"=>ucfirst(trim($data['lib'])),
				"lac_iCout"=>0,
				"lac_iDure"=>0,
				"lac_sSta"=>trim($data['duree']),
				"tya_id"      =>$tya[0],
				"uni_id"      =>$uni[0]
			);
			$supprimer = $this->md_parametre->maj_act($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_liste_act_lac",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un acte médical",
					"log_sActionDetail"=>"a modifié l'acte médical :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$data['duree']."-/-".$uni[1]."-/-".$tya[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
		
	
	/*********** Locataire  ***************************/
	public function ajoutLocataire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/locataire");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['dep']);$i++){
				$verif = $this->md_parametre->verif_locataire(ucfirst(trim($data['lib'][$i])),$data['dep'][$i]);
				if(!$verif){
					$donnees = array(
					"loc_sLib"=>ucfirst(trim($data['lib'][$i])),
					"loc_sTel"=>$data['dep'][$i],
					"loc_iSta"=>1
					);
					$this->md_parametre->ajout_locataire($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_locataire_loc",
						"log_sIcone"=>"nouvelle enseigne",
						"log_sAction"=>"a ajouté une enseigne",
						"log_sActionDetail"=>"a ajouté une nouvelle enseigne : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
		
	public function supprimer_locataire($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/locataire");
		}
		else{
			$donnees = array(
				"loc_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_locataire($donnees,$id);
			$locataire = $this->md_parametre->recup_locataire($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_locataire_loc",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une enseigne",
					"log_sActionDetail"=>"a supprimé enseigne : <strong style='text-decoration:underline'>".$locataire->loc_sLib."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/locataire");
			}
		}
	}
	
	
	
	public function modifierLocataire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		// $dep = explode("-/-",$data["dep"]);
		$verif = $this->md_parametre->verif_service_modif(ucfirst(trim($data['lib'])),ucfirst(trim($data['dep'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"loc_sLib"=>ucfirst(trim($data['lib'])),
				"loc_sTel"=>ucfirst(trim($data['dep']))
			);
			$supprimer = $this->md_parametre->maj_service($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_services_ser",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié un service",
					"log_sActionDetail"=>"a modifié le service :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".$dep[1];
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	
	public function recuppatient()
	{
		$data = $this->input->post();
		$patient = $this->md_patient->recup_patient($data['idpat']);
		echo "<option value='".$patient->pat_id."'>".$patient->pat_sNom." ".$patient->pat_sPrenom." (".$patient->pat_sMatricule.")</option>";	
	}	
	
	
	public function recuppersonnel()
	{
		$data = $this->input->post();
		$personnel = $this->md_personnel->recup_personnel($data['idper']);
		echo $personnel->per_sNom." ".$personnel->per_sPrenom." (".$personnel->per_sTel.")";	
	}
	
	
	
	/*********** Fonctionnalité  ***************************/
	public function ajoutFonctionnalite()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/fonctionnalite");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_fonctionnalite(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"flt_sLib"=>ucfirst(trim($data['lib'][$i])),
					"flt_iSta"=>1
					);
					$this->md_parametre->ajout_fonctionnalite($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_fonctionalite_flt",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté une direction",
						"log_sActionDetail"=>"a ajouté la direction : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_fonctionnalite($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/fonctionnalite");
		}
		else{
			$donnees = array(
				"flt_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_fonctionnalite($donnees,$id);
			$direction = $this->md_parametre->recup_fonctionnalite($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_fonctionalite_flt",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une direction",
					"log_sActionDetail"=>"a supprimé la direction : <strong style='text-decoration:underline'>".$direction->flt_sLib."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/fonctionnalite");
			}
		}
	}
	
	
	public function modifierFonctionnalite()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_fonctionnalite_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"flt_sLib"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_fonctionnalite($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_fonctionalite_flt",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une direction",
					"log_sActionDetail"=>"a modifié le nom de la direction :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}	
	
	
	
	
	/*********** Type actes  correspond aux actes groupés***************************/
	public function ajoutTypeacte()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/typeacte");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_typeacte(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"tya_sLib"=>ucfirst(trim($data['lib'][$i])),
					"tya_iSta"=>1
					);
					$this->md_parametre->ajout_typeacte($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_type_acte_tya",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a ajouté un type acte",
						"log_sActionDetail"=>"a ajouté la direction : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_typeacte($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/typeacte");
		}
		else{
			$donnees = array(
				"tya_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_typeacte($donnees,$id);
			$direction = $this->md_parametre->recup_typeacte($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_acte_tya",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une direction",
					"log_sActionDetail"=>"a supprimé la direction : <strong style='text-decoration:underline'>".$direction->tya_sLib."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/typeacte");
			}
		}
	}
	
	
	public function modifierTypeacte()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_typeacte_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"tya_sLib"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_typeacte($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_acte_tya",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une direction",
					"log_sActionDetail"=>"a modifié le nom de la direction :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	
	/*********** rubriques  **************/
	public function ajoutRubrique()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/rubrique");
		}
		else{

			for($i=0;$i<count($data['lib']);$i++){
				$verif = $this->md_parametre->verif_rubrique(strtoupper(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"rub_sLib"=>strtoupper(trim($data['lib'][$i])),
					"rub_iSta"=>1
					);
					$this->md_parametre->ajout_rubrique($donnees);
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_rubrique_rub",
						"log_sIcone"=>"rubrique",
						"log_sAction"=>"a ajouté une nouvelle rubrique",
						"log_sActionDetail"=>"a ajouté la rubrique : <strong style='text-decoration:underline'>".strtoupper(trim($data['lib'][$i]))."</strong>",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
	
	public function supprimer_rubrique($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/rubrique");
		}
		else{
			$donnees = array(
				"rub_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_rubrique($donnees,$id);
			$rub = $this->md_parametre->recup_rubrique($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_rubrique_rub",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé une rubrique",
					"log_sActionDetail"=>"a supprimé la rubrique : <strong style='text-decoration:underline'>".$rub->rub_sLib."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/rubrique");
			}
		}
	}
	
	
	public function modifierRubrique()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_rubrique_modif(ucfirst(trim($data['lib'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"rub_sLib"=>ucfirst(trim($data['lib']))
			);
			$supprimer = $this->md_parametre->maj_rubrique($donnees,$data['id']);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_rubrique_rub",
					"log_sIcone"=>"modification",
					"log_sAction"=>"a modifié une rubrique",
					"log_sActionDetail"=>"a modifié le nom de la rubrique :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']));
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	
	
	/*********** actes groupés **************/
	public function ajoutActesgroupe()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/typeacte");
		}
		else{

			for($i=0;$i<count($data['lib']) AND count($data['PourSer']) AND count($data['PourAdm']);$i++){
				$verif = $this->md_parametre->verif_acte_groupe(ucfirst(trim($data['lib'][$i])));
				if(!$verif){
					$donnees = array(
					"tya_sLib"=>ucfirst(trim($data['lib'][$i])),
					"tya_iSer"=>$data['PourSer'][$i],
					"tya_iAdm"=>$data['PourAdm'][$i],
					"tya_iSta"=>1
					);
					$this->md_parametre->ajout_acte_groupe($donnees);
					// $log = array(
						// "log_iSta"=>0,
						// "per_id"=>$this->session->epiphanie_diab,
						// "log_sTable"=>"t_type_acte_tya",
						// "log_sIcone"=>"new quote-part",
						// "log_sAction"=>"a ajouté un groupe des actes",
						// "log_sActionDetail"=>"a ajouté un nouveau groupe des actes : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib'][$i]))."</strong>",
						// "log_dDate"=>date("Y-m-d H:i:s")
					// );
					// $this->md_connexion->rapport($log);
				}
			}
			echo "ok";
			
		}
	
	}
		
	
	
	public function supprimer_acte_groupe($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("parametre/typeacte");
		}
		else{
			$donnees = array(
				"tya_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_acte_groupe($donnees,$id);
			$service = $this->md_parametre->recup_acte_groupe($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_type_acte_tya",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un groupe des actes",
					"log_sActionDetail"=>"a supprimé le groupe : <strong style='text-decoration:underline'>".$service->tya_sLib."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("parametre/typeacte");
			}
		}
	}
	
	
	public function modifActesgroupe()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_parametre->verif_acte_groupe_modif(ucfirst(trim($data['lib'])),trim($data['service']),trim($data['admin']),$data['id']);
		if(!$verif){
			$donnees = array(
				"tya_sLib"=>ucfirst(trim($data['lib'])),
				"tya_iSer"=>ucfirst(trim($data['service'])),
				"tya_iAdm"=>ucfirst(trim($data['admin']))
			);
			$supprimer = $this->md_parametre->maj_acte_groupe($donnees,$data['id']);
			if($supprimer){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_type_acte_tya",
					// "log_sIcone"=>"modification",
					// "log_sAction"=>"a modifié un groupe des actes",
					// "log_sActionDetail"=>"a modifié le groupe :(<strong style='text-decoration:underline'>".$data['nom']."</strong>) Par (<strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>)",
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				echo ucfirst(trim($data['lib']))."-/-".trim($data['service'])."-/-".trim($data['admin']);
			}
		}
		else{
			echo "echec";
		}
	}
	
	
	
	// public function ajoutActesAja()
	// {
	
		// for($i=1;$i<=27;$i++){
			// $select = $this->md_parametre->liste_ajaou_actes_aja($i);
			
			 // if($select->UNITES == "NEUROLOGIE"){$uni=166;}elseif($select->UNITES == "CANCEROLOGIE"){$uni=149;}elseif($select->UNITES == "NEONATOLOGIE"){$uni=164;}else{$uni=199;}
			
			
			
			// if($select->UNITES == "O.R.L"){
				 // $uni=197;
			// }elseif($select->UNITES == "OPHTALMOLOGIE"){
				 // $uni=146;
			// }elseif($select->UNITES == "UROLOGIE"){
				 // $uni=148;
			// }elseif($select->UNITES == "NEUROCHIRURGIE"){
				 // $uni=165;
			// }elseif($select->UNITES == "STOMATOLOGIE"){
				 // $uni=170;
			// }
			// else{
				// $uni=198;
			// }
			
			// if($select->SERVICEST == 'Neurochirurgie'){
				// $uni = 165;
			// }else{
				// $uni = 202;
			// }
			
			
			
			// $donnees = array(
				// "lac_sLibelle"=>'Chambre à 2 lits (Adulte)',
				// "uni_id"=>$select->SERVICES,
				// "cpt_id"=>NULL,
				// "tya_id"=>2,
				// "lac_iCout"=>0000,
				// "lac_iDure"=>1,
				// "lac_iSta"=>1
				// );
				// $this->md_parametre->ajout_act($donnees);
		
		// }
		// return redirect("parametre/acte_medical");
	// }
	
	
		public function gesUsers($id, $action){

		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("app/utilisateur");
		}
		else{
			
			if($action == 'forcer'){
				$donnees = array(
					"per_iCnx"=>NULL,
					"per_iStaCnx"=>NULL
				);
				$maj = $this->md_personnel->maj_personnel($donnees,$id);
			}elseif($action == 'lock'){
				$donnees = array(
					"per_iSta"=>0,
					"per_iCnx"=>NULL,
					"per_iStaCnx"=>NULL
				);
				$maj = $this->md_personnel->maj_personnel($donnees,$id);
			}else{
				$donnees = array(
					"per_iSta"=>1
				);
				$maj = $this->md_personnel->maj_personnel($donnees,$id);
			}

				return redirect("app/utilisateur");
			}
		}
	

}
