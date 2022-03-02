<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chirurgie extends CI_Controller {

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

	public function preoperatoire()
	{
		$this->load->view('app/chirurgie/page-chirurgie-preoperatoire');
	}
	
	public function postoperatoire()
	{
		$this->load->view('app/chirurgie/page-chirurgie-post-operatoire');
	}
	
	public function planning()
	{
		$this->load->view('app/chirurgie/page-planning');
	}

	public function liste_patient_anesthesiste()
	{
		$this->load->view('app/chirurgie/page-anesthesiste');
	}
	
		
	public function consulter($id)
	{
		$donneesAcm = array("per_id"=>$this->session->epiphanie_diab,"acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/chirurgie/page-consultation-chirurgie',array("acm_id"=>$id));
	}
	
	public function saisir($id)
	{
		$this->load->view('app/chirurgie/page-saisie-chirurgie',array("acm_id"=>$id));
	}
	
	public function consulter_anesthesiste($id)
	{
		$this->load->view('app/chirurgie/page-consultation-anesthesiste',array("acm_id"=>$id));
	}
	
	
	public function mes_patients()
	{
		$this->load->view('app/chirurgie/page-mes-patients-preoperatoire');
	}

	
	public function ajoutOperation()
	{
		$data=$this->input->post();
		// var_dump($data);
		$verif = $this->md_patient->verif_sejour($data["id_chi"],date("Y-m-d"));
		if(!$verif){
			$donneesSejour = array(
				"acm_id"=>$data["id_chi"],
				"sea_dDate"=>date("Y-m-d")
			);
			$sejour = $this->md_patient->ajout_sejour_acm($donneesSejour);
		}
		else{
			$sejour = $verif;
		}
		
		$verif1=$this->md_chirurgie->verif_planning_operation($data['acte'],$data['pat_chi'],$this->md_config->recupDateTime($data['date']),$data['heureDebut'],$data['heureFin'],$data['salle']);
		if(!$verif1){
			$dataPop=array(
				"pop_iSta"=>1,
				"lac_id"=>$data['acte'],
				"sop_id"=>$data['salle'],
				"acm_id"=>$data['id_chi'],
				"pat_id"=>$data['pat_chi'],
				"sea_id"=>$sejour->sea_id,
				"pop_dDate"=>$this->md_config->recupDateTime($data['date']),
				"pop_tHeureDebut"=>$data['heureDebut'],
				"pop_tHeureFin"=>$data['heureFin'],
				"pop_sDescription"=>$data['description'],
				"per_id"=>$this->session->epiphanie_diab
			);
			
			$plannification=$this->md_chirurgie->insert_operation($dataPop);
			
			
			if($plannification){
			
			
			// $donnees = array(
				// "sop_iOccupe"=>1
			// );
			// $maj = $this->md_chirurgie->maj_salle_operation($donnees,$data['salle']);
			
					
				for($i=0; $i<count($data['agent']) AND count($data['role']);$i++){
					$verifs=$this->md_chirurgie->verif_equipier($data['agent'][$i],$plannification->pop_id);
					// var_dump($verifs);
					if(!$verifs){
						$dataEte=array(
							"ete_iSta"=>1,
							"pop_id"=>$plannification->pop_id,
							"per_id"=>$data['agent'][$i],
							"ete_sRole"=>$data['role'][$i]
						);
						$this->md_chirurgie->insert_equipe($dataEte);
						
						
					}
				}
				
				$recupBloc = $this->md_parametre->recup_bloc($data['bloc']);
				
				$recupAcm = $this->md_parametre->recup_act($data['acte']);
				$aujourdhui = date("Y-m-d H:i:s");
				$maDate = strtotime($aujourdhui."+ ".$recupAcm->lac_iDure." days");
				$expiration = date("Y-m-d H:i:s",$maDate). "\n";
				
				$maDatedelai = strtotime($aujourdhui."+ 30 days");
				$delai = date("Y-m-d H:i:s",$maDatedelai). "\n";
				$donnees = array(
					"acm_iSta "=>1,
					"lac_id"=>$data['acte'],
					"pat_id"=>$data["pat_chi"],
					"uni_id"=>$recupBloc->uni_id,
					"acm_dDate"=>$aujourdhui,
					"acm_dDateDelai"=>$delai,
					"acm_dDateExp"=>$expiration,
					"acm_iHos"=>0,
					"pop_id"=>$plannification->pop_id,
					"acm_sStatut "=>"en attente"                                                                                  
				);
										
				$insert = $this->md_patient->ajout_orientation($donnees);
				
				if($insert){
					$donneesAvis = array(
					"avs_iSta "=>1,
					"avs_sLibelle"=>'Avis avant opération',
					"avs_dDate"=>date("Y-m-d"),
					"ser_id"=>2,                                                              
					"lac_id"=>$data['acte'],                                                             
					"pop_id"=>$plannification->pop_id,                                                            
					"per_id"=>$this->session->epiphanie_diab,                                                      
					"sea_id"=>$sejour->sea_id                                                       
				);
										
				$inser = $this->md_patient->ajout_avis($donneesAvis);
				echo "Inseré avec succes!";
				}
			}
			
			
		}
		else {
			echo "La salle est déjà occupée !";
		}
		
		
	}
	
	
	public function ajoutAvis()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$id=$data["id"];
		$donnees = array(
			"pop_sAvis"=>$data['avis'],
			"per_id"=>$this->session->epiphanie_diab
			);
		$modification=$this->md_chirurgie->modification_avis($data['id'],$donnees);
		echo "Enregistrée!";
	}
	
	
	public function CompteRenduOperation()
	{
		$data=$this->input->post();
		$id=$data['id'];
		for($i=0; $i<count($data['acte']); $i++){
		$verif=$this->md_chirurgie->verif_compte_rendu_operation($data['acte'][$i]);
		if(!$verif){
			$donnees = array(
				"lac_id"=>$data['acte'][$i],
				"pop_sCompteRendu"=>$data["contenu"],
				"per_id"=>$this->session->epiphanie_diab
				);
				
			$inserer = $this->md_chirurgie->compte_rendu_operation($donnees,$id);
			}
		}
			echo "Compte rendu enregistré !";
	}
	
	public function recupEquipe()
	{
		$data=$this->input->post();
		$id=$data["id"];
		$liste = $this->md_chirurgie->liste_personnel();
		$recup=$this->md_chirurgie->recup_equipe_technique($id);
		// var_dump($recup);
		
		echo ' <table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Agent</th>
								<th>Rôle</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>';
							foreach ($recup AS $r)
							{
							echo '<tr>
									<form id="form-edit-equipe'.$r->per_id.'">
										<td>
											<input type="text" name="personnel" class="form-control obligatoire" value="'.$r->per_sTitre.''.$r->per_sPrenom.' '.$r->per_sNom.'">									
										</td>
										<td>
											<input type="text" name="role" class="champs'.$r->ete_id.' form-control obligatoire" value="'.$r->ete_sRole.'">
											<span type="hidden" href="'.$r->ete_id.'"></span>
											<select name="role" class="cacher select'.$r->ete_id.'">
												<option value=""> '.$r->ete_sRole.'</option>
												<option value="Assistant(e)">Assistant(e)</option>
												<option value="Anestésiste">Anestésiste</option>
												<option value="Chirurgien(ne)">Chirurgien(ne)</option>';	
										  echo '</select>
										</td>
											<input type="hidden" value="'.$r->ete_id.'" name="id"/>
											<input type="hidden" value="'.$r->ete_id.'" name="nom"/>
									</form>
										<td>
											<a href="javascript:();" rel="'.$r->ete_id.'" class="editEquipeFinal confirm'.$r->ete_id.' cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
											<a href="javascript:();" rel="'.$r->ete_id.'" class="editEquipeAnnule annule'.$r->ete_id.' text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
											<a href="javascript:();" rel="'.$r->ete_id.'" class="editEquipe clique'.$r->ete_id.'" title="Modifier"><i class="fa fa-edit" style="font-size:20px"></i></a> &nbsp;
											<a onClick="return confirm(\'Êtes-vous sûr de supprimer cet agent ?\')" href="'.site_url("chirurgie/supprimer_equipier/".$r->ete_id).'"  class="supression" title="Supprimer"><i class="fa fa-trash text-danger" style="font-size:20px"></i></a>
										</td>
								
								</tr>';
							}
						echo '</tbody>
				</table>
				
	<script src="'.base_url('assets/js/chirurgie.js').'"></script>';
				
		
	}
	
	public function recupAvis()
	{
		$data=$this->input->post();
		$id=$data["id"];
		$recup=$this->md_chirurgie->recup_avis($id);
		// var_dump($recup);
		if($recup->pop_sAvis !=""){
			echo ' <div>
					<input type="text" name="avis" class="form-control" value="'.$recup->pop_sAvis.'">
					<input type="hidden" value="'.$recup->pop_id.'" name="id"/>											
			  </div>';
				
				echo '<script src="'.base_url('assets/js/chirurgie.js').'"></script>';
		} 
		else{
			echo '<div class="alert alert-danger">L\'anesthésiste n\'a pas encore donné son avis </div>';
		}
		
				
		
	}
	
	public function supprimer_equipier($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("chirurgie/planning");
		}
		else{
			$donnees = array(
				"ete_iSta"=>2
			);
			$supprimer = $this->md_chirurgie->maj_chirurgie($donnees,$id);
					return redirect("chirurgie/planning");
		}
	}
	
	public function valider_operation($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("chirurgie/planning");
		}
		else{
			$donnees = array(
				"pop_iSta"=>3
			);
			$valider = $this->md_chirurgie->maj_planning_valider($donnees,$id);
				return redirect("chirurgie/planning");
		}
	}
	
	public function supprimer_operation($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("chirurgie/planning");
		}
		else{
			$donnees = array(
				"pop_iSta"=>2
			);
			$supprimer_operation = $this->md_chirurgie->maj_planning_supprimer($donnees,$id);
			
			if($supprimer_operation){
			
				$donneesAvis = array(
					"avs_iSta"=>2
				);
				$supprimer_avis = $this->md_chirurgie->maj_avis_planning($donneesAvis,$id);
			}
			return redirect("chirurgie/planning");
		}
	}
	
	public function modifierEquipe()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$verif = $this->md_chirurgie->verif_modif_equipe(ucfirst(trim($data['personnel'])),$data['id']);
		if(!$verif){
			$donnees = array(
				"per_id"=>ucfirst(trim($data['personnel'])),
				"ete_sRole"=>trim($data['role'])
			);
			$modification=$this->md_courrier->modification_equipe($donnees,$data['id']);
			echo "Modification enregistrée!";
			}
	}
	
	
	public function recupPlanification()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_patient->panning_operation_sejour($data["id"]);
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Acte opération</th>
									<th>Bloc/Salle</th>
									<th>Date</th>
									<th>Heure début</th>
									<th>Heure fin</th>
									<th style="width:60px">Avis de l\'anesthésiste </th>
								</tr>
							</thead>
							<tbody>';
							foreach($c AS $l){
							
							echo '<tr>
									<td>
										'.$l->lac_sLibelle.'
									</td>
									<td>
										'.$l->bop_sLibelle.' / '.$l->sop_sLibelle.'	
									</td>
									<td>
										'.$this->md_config->affDateFrNum($l->pop_dDate).'	
									</td>
									<td>
										'.$l->pop_tHeureDebut.'	
									</td>
									<td>
										'.$l->pop_tHeureFin.'	
									</td>
									<td>
										'; if(!is_null( $l->avs_sAvis)){echo $l->avs_sAvis;}else{echo "<i class='text-danger'>En attente</i>";}
									echo '</td>
								</tr>';
							}
						echo' </tbody>
						</table>
					</div>';
			
		}
	}
	
	
	
	
	public function addRapportOperation(){
		$data = $this->input->post();
		$result = $this->md_chirurgie->recup_acm_pat_id($data["id"]);
		
		{?>
			<form id="form-compte-rend">
			
				<div class="row clearfix">
					<div class="col-sm-12 retour-gle"></div>
					<div class="col-sm-12">
						<div class="header">
							<h2 style="text-decoration:underline"><b>Compte rendu de l'Opération</b></h2>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<div class="form-line">
								<label style="color:#000"><b>Date Opération *</b></label>
								<input type="text" name="dateOp" class="form-control datepicker obligatoire">
							</div>
						</div>
					</div>					
					
					<div class="col-sm-3">
						<div class="form-group">
							<div class="form-line">
								<label style="color:#000"><b>Heure début *</b></label>
								<input type="text" name="heureDebut" class="timepicker form-control obligatoire">
							</div>
						</div>
					</div>					
					<div class="col-sm-3">
						<div class="form-group">
							<div class="form-line">
								<label style="color:#000"><b>Heure fin *</b></label>
								<input type="text" name="heureFin" class="timepicker form-control obligatoire">
							</div>
						</div>
					</div>					
					<div class="col-sm-3">
						<div class="form-group">
							<div class="form-line">
								<label style="color:#000"><b>Résultat *</b></label>
								<select name="result" class="form-control obligatoire show-tick">
									<option value="">- sélectionner -</option>
									<option value="1">résultat 1</option>
									<option value="2">résultat 2</option>
									<option value="3">résultat 3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label style="color:#000"><b>Compte rendu *</b></label>
							<textarea type="text" rows="5" id="edit" class=" obligatoire" name="contenu" style="width:100%"></textarea>
						</div>
					</div>
				</div>			
			
				<div class="row clearfix">
					<div class="col-sm-12 retour-gle"></div>
					<div class="col-sm-12">
						<div class="header">
							<h2 style="text-decoration:underline"><b>Mise en Hospitalisation</b></h2>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-line">
							<label style="color:#000"><b>Unité *</b></label>
							<div class="form-group drop-custum">
								<select name="uni" class="form-control obligatoire unitePresc  show-tick">
									<option value="">------------ Choisir l'unité --------------</option>
									<?php $unites = $this->md_parametre->liste_unite_services_actifs(31);foreach($unites AS $u){?>
										<option value="<?php echo $u->uni_id; ?>"><?php echo $u->uni_sLibelle; ?></option>
									<?php } ?>
								</select>
							</div>
							
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-line">
							<label style="color:#000"><b>Chambre *</b></label>
							<div class="form-group drop-custum">
								<select name="cha" class="form-control obligatoire chambrePresc  show-tick">
									<option value="">-- Choisir la chambre --</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-line">
							<label style="color:#000"><b>Lit *</b></label>
							<div class="form-group drop-custum">
								<select name="lit" class="form-control obligatoire litPresc  show-tick">
									<option value="">-- Choisir le lit --</option>
									
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">						
							<div class="form-line">
								<label style="color:#000"><b>Type d'hospitalisation *</b></label>
								<select name="type" class="form-control  show-tick">
									<option value="Standard">Standard</option>
									<option value="Patient en isolation">Patient en isolation</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="form-line">
								<label style="color:#000"><b>Mode d'entrée *</b></label>
								<input type="hidden" value="<?php echo $result->acm_id; ?>" name="id">
								<input type="hidden" value="<?php echo $result->pat_id; ?>" name="pat">
								<input type="hidden" value="<?php echo $data["id"]; ?>" name="idPop">
								<select name="motif" class="form-control obligatoire">
									<option value="">-- Choisir le mode --</option>
									<option value="référé">Référé</option>
									<option value="auto référé">Auto Référé</option>
									<option value="contre référé">Contre référé</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<a href="javascript:();" class="btn btn-success waves-effect" id="comptRenduOp" style="color:#fff"><i class="fa fa-check"></i> valider</a>
					</div>
				</div>
				<br>
			</form>

	<!-- Bootstrap Material Datetime Picker Plugin Js --> 
		<script src="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js');?>"></script> 
		<script src="<?php echo base_url('assets/js/pages/forms/basic-form-elements.js');?>"></script>	
		<script>(function () { new FroalaEditor("#edit");})()</script>
		<script src="<?php echo base_url('assets/js/consultation.js');?>"></script>
		<script src="<?php echo base_url('assets/js/chirurgie.js');?>"></script>
		<?php }
	}
	
	
	
	
	public function ajoutCompteRendOp()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		// var_dump($data);
		
		if(empty($data)){
			echo "erreur";
		}
		else{
		
			$donneesMaj = array(
				"pop_iSta "=>3,
				"pop_iPer"=>$this->session->epiphanie_diab,
				"pop_iResultat"=>$data['result'],
				"pop_sCompteRendu"=>$data['contenu'],
				"pop_tHeureDebutOpe	"=>$data['heureDebut'],
				"pop_tHeureFinOpe"=>$data['heureFin'],
				"pop_dDateOpe"=>$this->md_config->recupDateTime($data['dateOp']),
				"pop_dDateCompteRend"=>date("Y-m-d H:i:s")                                                                            
			);
									
			$maj = $this->md_chirurgie->maj_compte_rendu_op($donneesMaj,$data["idPop"]);			
			
			if(isset($data['uni']) AND isset($data['cha']) AND isset($data['lit']) AND isset($data['motif'])){
			
			
			
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
				// var_dump($recup);
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
						"hos_iPop"=>$data["idPop"],
						"hos_dDate"=>$aujourdhui
					);
					
					$ajout = $this->md_patient->ajout_prescription_hospitalisation($donneeHos);
					if($ajout){
						$donneesLit = array("lit_iOccupe"=>1);
						$maj = $this->md_parametre->maj_lit($donneesLit,$data["lit"]);
					}
					
					$maDate2 = strtotime($aujourdhui."- 3600 days");
					$expiration2 = date("Y-m-d H:i:s",$maDate2). "\n";
					$this->md_patient->maj_actes_caisse(array("acm_dDateExp"=>$expiration2),$data['id']);
				}
				echo $data["id"];
			}elseif(!isset($data['uni']) OR !isset($data['cha']) OR !isset($data['lit']) OR !isset($data['type']) OR !isset($data['motif'])){
				echo 'Veuillez remplir correctement le formulaire de mise en hospitalisation';
			}else{
				echo 'Veuillez remplir correctement le formulaire de mise en hospitalisation';
			}
		}
		
		
	}
	
	
}
?>






