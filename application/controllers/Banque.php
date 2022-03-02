<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banque extends CI_Controller {

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
		$this->load->view('app/direction_generale/page-liste-banque');
	}		
	
	public function banque_courant($id)
	{
		$this->load->view('app/direction_generale/page-banque-courant',array('id'=>$id));
	}

	
	public function ajoutDepot()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("banque/banque_courant/".$data['id']);
		}
		else{
			if($data['montant'] < 0 || $data['montant'] ==0 || !is_numeric($data['montant'])){
					echo 'Veuillez saisir un montant valide !';
				}else{

					if($_FILES["justificatif"]["name"]==""){
								if($data["motif"]==""){
									$data["motif"]=NULL;
								}
								
								$data["justificatif"]=NULL;
								
									$donnees = array(
									"mvt_iSta"=>1,
									"bnq_id"=>$data['id'],
									"per_id"=>$this->session->epiphanie_diab,
									"mvt_iMontant"=>$data["montant"],
									"mvt_iType"=>1,
									"mvt_sFichier"=>$data["justificatif"],
									"mvt_sMotif"=>$data["motif"],
									"mvt_dDateOper"=>date("Y-m-d")
									);
									$ajout=$this->md_banque->ajout_depot($donnees);
									
									if($ajout){
										$log = array(
											"log_iSta"=>0,
											"per_id"=>$this->session->epiphanie_diab,
											"log_sTable"=>"t_mouvement_mvt",
											"log_sIcone"=>"nouveau",
											"log_sAction"=>"a effectué un dépôt de : ".$ajout,
											"log_dDate"=>date("Y-m-d H:i:s")
										);
										$this->md_connexion->rapport($log);
										// echo $ajout;
										
										$solde = $this->md_banque->solde_banque_courant($data['id']);
										
										$majMontant = array(
											"bnq_iMontant"=>$solde->solde+$data["montant"]
										);
										$maj = $this->md_parametre->maj_banque($majMontant,$data['id']);
									}
					}else{
						$verifTaille = $this->md_config->sizeImage($_FILES["justificatif"],1150);
						if(!$verifTaille){
							echo "Fichier trop lourd, taille requise 1150 Ko !";
						}else{
							$config["upload_path"] =  './assets/images/fichier/';
							$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
							$nomImage= time()."-".$_FILES["justificatif"]["name"];
							$config["file_name"] = $nomImage; 
							$verifImage = $this->md_config->uploadFichier($_FILES["justificatif"]);
							if(!$verifImage){
								echo "Les formats autorisés sont: .jpg, .jpeg, .png, .pdf, .docx";
							}else{
								$this->load->library('upload',$config);
							
								if($this->upload->do_upload("justificatif")){
									$image=$this->upload->data();
						
									$data["justificatif"]="assets/images/fichier/".$image['file_name'];
								}
								else{
									$data["justificatif"]="assets/images/fichier/fichier.jpg";
								}						
								
								if($data["motif"]==""){
									$data["motif"]=NULL;
								}
								
									$donnees = array(
									"mvt_iSta"=>1,
									"bnq_id"=>$data['id'],
									"per_id"=>$this->session->epiphanie_diab,
									"mvt_iMontant"=>$data["montant"],
									"mvt_iType"=>1,
									"mvt_sFichier"=>$data["justificatif"],
									"mvt_sMotif"=>$data["motif"],
									"mvt_dDateOper"=>date("Y-m-d")
									);
									$ajout=$this->md_banque->ajout_depot($donnees);
									
									if($ajout){
										$log = array(
											"log_iSta"=>0,
											"per_id"=>$this->session->epiphanie_diab,
											"log_sTable"=>"t_mouvement_mvt",
											"log_sIcone"=>"nouveau",
											"log_sAction"=>"a effectué un dépôt de : ".$ajout,
											"log_dDate"=>date("Y-m-d H:i:s")
										);
										$this->md_connexion->rapport($log);
										// echo $ajout;
										
										$solde = $this->md_banque->solde_banque_courant($data['id']);
										
										$majMontant = array(
											"bnq_iMontant"=>$solde->solde+$data["montant"]
										);
										$maj = $this->md_parametre->maj_banque($majMontant,$data['id']);
									}
							}
						}
					}
				}
			}
	}
	
	public function supprimer_depot($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("banque/banque_courant");
		}
		else{
			$donnees = array(
				"mvt_iSta"=>2
			);
			$supprimer = $this->md_banque->maj_mouvement($donnees,$id);
			$type = $this->md_banque->recup_mouvement($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_banque_bnq",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un enregistrement",
					"log_sActionDetail"=>"a supprimé un enregistrement dont le montant est : <strong style='text-decoration:underline'>".$type->mvt_iMontant."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("banque/banque_courant");
			}
		}
	}
	
	
	public function ajoutRtrait()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("banque/banque_courant/".$data['id']);
		}
		else{
			if($data['montant'] < 0 || $data['montant'] ==0 || !is_numeric($data['montant'])){
					echo 'Veuillez saisir un montant valide !';
				}else{
					$solde = $this->md_banque->solde_banque_courant($data['id']);
					if($solde->solde-$data["montant"] < 0){
						echo 'Le montant demandé est supérieur au montant du compte';
					}else{
						if($_FILES["justificatif"]["name"]==""){
							if($data["motif"]==""){
								$data["motif"]=NULL;
							}
							
							$data["justificatif"]=NULL;
							
							$donnees = array(
							"mvt_iSta"=>1,
							"bnq_id"=>$data['id'],
							"per_id"=>$this->session->epiphanie_diab,
							"mvt_iMontant"=>$data["montant"],
							"mvt_iType"=>0,
							"mvt_sFichier"=>$data["justificatif"],
							"mvt_sMotif"=>$data["motif"],
							"mvt_dDateOper"=>date("Y-m-d")
							);
							$ajout=$this->md_banque->ajout_depot($donnees);
							
							if($ajout){
								$log = array(
									"log_iSta"=>0,
									"per_id"=>$this->session->epiphanie_diab,
									"log_sTable"=>"t_mouvement_mvt",
									"log_sIcone"=>"nouveau",
									"log_sAction"=>"a effectué un retrait de : ".$ajout,
									"log_dDate"=>date("Y-m-d H:i:s")
								);
								$this->md_connexion->rapport($log);
								// echo $ajout;
																		
								$majMontant = array(
									"bnq_iMontant"=>$solde->solde-$data["montant"]
								);
								$maj = $this->md_parametre->maj_banque($majMontant,$data['id']);
							}
						
						}else{
						$verifTaille = $this->md_config->sizeImage($_FILES["justificatif"],1150);
						if(!$verifTaille){
							echo "Fichier trop lourd, taille requise 1150 Ko !";
						}else{
							$config["upload_path"] =  './assets/images/fichier/';
							$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx';
							$nomImage= time()."-".$_FILES["justificatif"]["name"];
							$config["file_name"] = $nomImage; 
							$verifImage = $this->md_config->uploadFichier($_FILES["justificatif"]);
							if(!$verifImage){
								echo "Les formats autorisés sont: .jpg, .jpeg, .png, .pdf, .docx";
							}else{
								
									$this->load->library('upload',$config);
								
									if($this->upload->do_upload("justificatif")){
										$image=$this->upload->data();
							
										$data["justificatif"]="assets/images/fichier/".$image['file_name'];
									}
									else{
										$data["justificatif"]="assets/images/fichier/fichier.jpg";
									}
									
									if($data["motif"]==""){
										$data["motif"]=NULL;
									}
										$donnees = array(
										"mvt_iSta"=>1,
										"bnq_id"=>$data['id'],
										"per_id"=>$this->session->epiphanie_diab,
										"mvt_iMontant"=>$data["montant"],
										"mvt_iType"=>0,
										"mvt_sFichier"=>$data["justificatif"],
										"mvt_sMotif"=>$data["motif"],
										"mvt_dDateOper"=>date("Y-m-d")
										);
										$ajout=$this->md_banque->ajout_depot($donnees);
										
										if($ajout){
											$log = array(
												"log_iSta"=>0,
												"per_id"=>$this->session->epiphanie_diab,
												"log_sTable"=>"t_mouvement_mvt",
												"log_sIcone"=>"nouveau",
												"log_sAction"=>"a effectué un retrait de : ".$ajout,
												"log_dDate"=>date("Y-m-d H:i:s")
											);
											$this->md_connexion->rapport($log);
											// echo $ajout;
																					
											$majMontant = array(
												"bnq_iMontant"=>$solde->solde-$data["montant"]
											);
											$maj = $this->md_parametre->maj_banque($majMontant,$data['id']);
										}
									}
							}
					}
				}
				}
			}
	}
	
	
	public function recupMouvement()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$premierJour = $this->md_config->recupDateTime($data["premierJour"]);
		$dernierJour = $this->md_config->recupDateTime($data["dernierJour"]);
		$mouvement=trim($data["mouvement"]);
		$id=trim($data["idBnq"]);
		
		if($data["mouvement"]=="" || $data["mouvement"]==2){
			$liste  = $this->md_banque->liste_tout_mouvement($id,$premierJour,$dernierJour);
		}
		else if($data["mouvement"]==1 ){
			$liste  = $this->md_banque->liste_mouvement($id,$premierJour,$dernierJour,$mouvement);
		}else if($data["mouvement"]==0){
			$liste  = $this->md_banque->liste_mouvement($id,$premierJour,$dernierJour,$mouvement);
		}		
		echo '	

			<table class="table table-bordered table-striped table-hover " id="example">
				<thead>
					<tr>
						<th>Date Opération</th>
						<th>Solde</th>
						<th>Justificatif</th>
						<th>Motif</th>
						<th>Mouvement</th>
						<th>Effectuée par </th>
					</tr>
				</thead>
				<tbody>';
					foreach($liste AS $l){ 
				echo '<tr>
						<td>'.$this->md_config->affDateFrNum($l->mvt_dDateOper).'</td>
						<td>'.number_format($l->mvt_iMontant,0,",",".").' Fcfa</td>
						<td>'; if($l->mvt_sFichier==NULL){echo 'Non renseigné';}else{echo "<a title='Voir le fchier joint' href='".base_url($l->mvt_sFichier)."' target='blank'><strong><i class='fa fa-download'></i> Télécharger</strong></a>";} echo'</td>
						<td>'.nl2br($l->mvt_sMotif).'</td>
						<td>';if($l->mvt_iType==1){echo '<span style="color:green">dépôt <i class="fa fa-arrow-left"></i></span>';}else{echo '<span style="color:red">retrait <i class="fa fa-arrow-right"></i></span>';}echo '</td>
						<td><strong>'.$l->per_sNom.' '.$l->per_sPrenom.'</strong></td>
					</tr>';
					} 
			echo '</tbody>
			</table>

		';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';

	}
	
	
}
