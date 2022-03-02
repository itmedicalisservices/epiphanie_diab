<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fonctionnement extends CI_Controller {

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
		$this->load->view('app/direction_generale/page-liste-fonctionnement-compte');
	}		
	
	public function lib_sous_fonct_courant($id)
	{
		$this->load->view('app/direction_generale/page-fonct-encours_courant',array('id'=>$id));
	}
	
	public function compte_fonct_courant($id)
	{
		$this->load->view('app/direction_generale/page-compte-fonc-courant',array('id'=>$id));
	}

	
	public function ajoutDepenses()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("fonctionnement/compte_fonct_courant");
		}
		else{
			if($data['montant'] < 0 || $data['montant'] ==0 || !is_numeric($data['montant'])){
					echo 'Veuillez saisir un montant valide !';
				}else{
						$donnees = array(
						"mde_iSta"=>1,
						"fcp_id"=>$data['id'],
						"per_id"=>$this->session->epiphanie_diab,
						"mde_iMontant"=>$data["montant"],
						"mde_sMotif"=>$data["motif"],
						"mde_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_fonctionnement->ajout_depenses($donnees);
						
						if($ajout){
							$log = array(
								"log_iSta"=>0,
								"per_id"=>$this->session->epiphanie_diab,
								"log_sTable"=>"t_mouvement_depenses_mde",
								"log_sIcone"=>"nouveau",
								"log_sAction"=>"a effectué la dépense de : ".$ajout,
								"log_dDate"=>date("Y-m-d H:i:s")
							);
							$this->md_connexion->rapport($log);
							// echo $ajout;
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
	
	
	public function retrait()
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
							$solde = $this->md_banque->solde_banque_courant($data['id']);
							if($solde->solde-$data["montant"] < 0){
								echo 'Le montant demandé est supérieur au montant du compte';
							}else{
							
								$this->load->library('upload',$config);
							
								if($this->upload->do_upload("justificatif")){
									$image=$this->upload->data();
						
									$data["justificatif"]="assets/images/fichier/".$image['file_name'];
								}
								else{
									$data["justificatif"]="assets/images/fichier/fichier.jpg";
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
	
	
	public function recupMouvDepenses()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$premierJour = $this->md_config->recupDateTime($data["premierJour"]);
		$dernierJour = $this->md_config->recupDateTime($data["dernierJour"]);
		$id=trim($data["id"]);
		
		$liste  = $this->md_fonctionnement->liste_mvt_depense_courant($id,$premierJour,$dernierJour);	
			
		echo '	

			<table class="table table-bordered table-striped table-hover " id="example">
				<thead>
					<tr>
						<th>Date Opération</th>
						<th>Montant</th>
						<th>Motif</th>
					</tr>
				</thead>
				<tbody>';
					foreach($liste AS $l){ 
				echo '<tr>
						<td>'.$this->md_config->affDateFrNum($l->mde_dDate).'</td>
						<td>'.number_format($l->mde_iMontant,0,",",".").'</td>
						<td>'.nl2br($l->mde_sMotif).'</td>
					</tr>';
					} 
			echo '</tbody>
			</table>

		';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';

	}
		
		
	public function recupMouvFonc()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$premierJour = $this->md_config->recupDateTime($data["premierJour"]);
		$dernierJour = $this->md_config->recupDateTime($data["dernierJour"]);
		// $id=trim($data["id"]);
		
		// $liste  = $this->md_fonctionnement->liste_mvt_depense_courant($id,$premierJour,$dernierJour);
		
		$liste = $this->md_budget->liste_compte_fonctionnement(); 		
		// $montant  = $this->md_fonctionnement->montant_fonct($id,$premierJour,$dernierJour);	
			
		echo '	

			<table class="table table-bordered table-striped table-hover " id="example">
				<thead>
					<tr>
						<th>N° DE COMPTE</th>
						<th>DESIGNATION</th>
					</tr>
				</thead>
				<tbody>';
					foreach($liste AS $l){ 
				echo '<tr>
						<td>'.$l->cpt_iNumero.'</td>
						<td>
						'.$rep = $this->md_fonctionnement->recup_compte_fonct($l->cpt_id).';
						'.var_dump($rep).'
						
						</td>
					</tr>';
					} 
			echo '</tbody>
			</table>

		';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';

	}
	
	
	public function ajoutBuf()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("parametre/lib_sous_fonct_courant");
		}
		else{
			if($data["montant"] < 0){
				echo'Saisissez un montant valide';
			}else{
					if($data["motif"]==""){
						$data["motif"]=NULL;
					}
					$donnees = array(
						"buf_iSta"=>1,
						"sfc_id"=>$data['id'],
						"buf_iMontant"=>$data["montant"],
						"buf_sMotif"=>$data["motif"],
						"buf_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_fonctionnement->ajout_budget_fonct($donnees);
						
					// if($ajout){
					// $log = array(
						// "log_iSta"=>0,
						// "per_id"=>$this->session->epiphanie_diab,
						// "log_sTable"=>"t_fonctionnement_compte_fcp",
						// "log_sIcone"=>"nouveau",
						// "log_sAction"=>"a ajouté un nouveau compte de fonctionnement dont le libellé est : ".$ajout,
						// "log_dDate"=>date("Y-m-d H:i:s")
					// );
					// $this->md_connexion->rapport($log);
					// }
				}		
			}
	}
	
	
	public function recupBudgetFonc()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$premierJour = $this->md_config->recupDateTime($data["premierJour"]);
		$dernierJour = $this->md_config->recupDateTime($data["dernierJour"]);
		
			$liste = $this->md_fonctionnement->liste_compte_fonctionnement(); 
			// $li  = $this->md_banque->liste_tout_mouvement($id,$premierJour,$dernierJour);
		
		echo '	
			<table class="table table-bordered table-striped table-hover " id="example">
				<thead>
					<tr>
						<th>N° DE COMPTE</th>
						<th>LIBELLES DE COMPTES</th>
					</tr>
				</thead>
				<tbody>';
						$somGle=0;foreach($liste AS $l){ ?>
								<tr>
									<td>
										<strong><?=$l->cpt_iNumero;?></strong>
									</td>
									<td>
										<strong><?php 
													$rep = $this->md_fonctionnement->recup_sous_compte($l->cpt_id); echo $rep->fcp_sLibelle;
												?>
										</strong>
										<?php $re = $this->md_fonctionnement->recup_lib_sous_compte($rep->fcp_id); ?>
										<table style="width:100%" class=" " id="">
											<thead>
												<tr>
													<th style="color:#4f7ca0;text-decoration:underline">Libellés de sous comptes</th>
													<th style="color:#4f7ca0;text-decoration:underline">Cumul</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
										<?php if($re==NULL){echo'<tr><td colspan="2"><em>Aucun sous libellé renseigné</em></td></tr>';}else{$som=0; foreach($re AS $r){?>
											<tr>
												<td><?=$r->sfc_sLibelle;?></td>
												<td><?php $montant = $this->md_fonctionnement->budget_fonct_courant_periodique($r->sfc_id,$premierJour, $dernierJour);$som=$som + $montant->somme; echo number_format($montant->somme,0,",","."); ?> Fcfa</td>
												<td class="text-center">
													<a href="<?php echo site_url("fonctionnement/lib_sous_fonct_courant/".$r->sfc_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Opération</a>
												</td>
											</tr>
										<?php }?>
											<tr>
												<td><strong>Total (<?=$rep->fcp_sLibelle;?>)</strong></td>
												<td><strong><?php echo number_format($som,0,",",".");$somGle=$somGle+$som ?> Fcfa </strong></td>
											</tr>
										<?php }?>
										</tbody>
										</table>
									</td>									
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan=""><strong>TOTAL GLOBAL</strong></td>
									<td align="center" colspan=""><strong><?php echo number_format($somGle,0,",","."); ?>  Fcfa </strong></td>
								</tr>
							</tfoot>
					<?php 
							
			echo '</tbody>
			</table>

		';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';

	}
	
	
}
