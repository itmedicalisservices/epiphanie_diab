<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caisse extends CI_Controller {

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
		$this->load->view('app/generique/page-dashboard');
	}
	
	

	

	public function facture_annulee_j()
	{
		$this->load->view('app/caisse/page-facture-j');
	}
	
	public function journal_encaissement()
	{
		$this->load->view('app/caisse/journal-encaissement-cprincipal');
	}	
	
	public function etat_remise()
	{
		$this->load->view('app/caisse/etat-remise-cprincipal');
	}	
		
	
	public function cession()
	{
		$this->load->view('app/caisse/page-demande-cession');
	}
	
	public function liste_cession()
	{
		$this->load->view('app/caisse/page-liste-cession');
	}	
	
	public function liste_approvisionnement()
	{
		$this->load->view('app/caisse/page-liste-approvisionnement');
	}
	
	public function approvisionnement()
	{
		$this->load->view('app/caisse/page-approvisionnement-caisse');
	}	
	public function passation()
	{
		$this->load->view('app/caisse/page-passation-caisse');
	}	
	
	public function historique_passation()
	{
		$this->load->view('app/caisse/page-historique-passation');
	}	
	
	public function recouvrementAssurance($id)
	{
		$this->load->view('app/caisse/page-recouvrement-assurance',array("ass"=>$id));
	}
	
	/*
	public function recouvrementPatient($id)
	{
		$this->load->view('app/caisse/page-recouvrement-patient',array("pat"=>$id));
	}*/
	
		
	public function ensembleFacture()
	{
		$data = $this->input->post();
		$pat = explode('-/-', $data['id'][0]);
		// var_dump($data);
		
		$cout = array();
		$patient = $this->md_patient->recup_patient($pat[1]);
		echo '
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card all-patients">
						<div class="body">
							<div class="row">
								<div class="col-md-9 col-sm-9 m-b-0">
									<h5 class="m-b-0">'.$patient->pat_sNom.' '.$patient->pat_sPrenom.'</h5> 
								</div>
								<div class="col-md-3 col-sm-3 m-b-0">
									<address class="m-b-0">
										<abbr title="Numéro matricule patient">ID: '.$patient->pat_sMatricule.'</abbr>
								   </address>               
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
		// die();
		// $nombre = count($data["id"]);
		echo '
			<table class="table table-bordered table-striped table-hover" style="margin-top:-15px">
				<thead>
					<tr>
						<th>Acte médical</th>
						<th>Coût de l\'acte</th>
						<th colspan="2">Date</th>
					</tr>
				</thead>
			   
				<tbody>';
					for($i=0;$i<count($data["id"]);$i++){
						$acmId = explode('-/-', $data['id'][$i]);
						if($acmId[1] == $pat[1]){
							
						
						
						$recupAct = $this->md_patient->acm_medical_pat($acmId[0], $pat[1]);
						// var_dump($recupAct);
						if(!is_null($recupAct->lac_id)){
							$l = $this->md_patient->liste_element_caisse_ajax($acmId[0]);
							if(is_null($recupAct->acm_sDent)){
								$dent = "";
							}
							else{
								$dent = " - ".$recupAct->acm_sDent;
							}
							$cout[] = $l->lac_iCout;
							$lib = $l->lac_sLibelle.$dent;
							$val = $l->lac_id;
							$som = $l->lac_iCout;
							$dur = $l->lac_iDure;
						}
						else{
							$cout[] = $recupAct->acm_iCoutHos;
							$lib = "Séjour occupation du lit";
							$val = 0;
							$som = $recupAct->acm_iCoutHos;
							$dur = 0;
						}
						echo '<tr>
								<td>
									'.$lib.'
									<input type="hidden" name="lac[]" value="'.$val.'"/>
									<input type="hidden" name="somme[]" value="'.$som.'"/>
									<input type="hidden" name="duree[]" value="'.$dur.'"/>
									<input type="hidden" name="acm[]" value="'.$acmId[0].'"/>
								</td>
								<td>
									'.number_format($som,0,",",".").' <small>FCFA</small>
								</td>
							
								<td>
									'.$this->md_config->affDateTimeFr($recupAct->acm_dDate).'
								</td>
								<td>
									<i class="fa fa-check text-success" style="font-size:22px"></i>
								</td>
							</tr>';
					 }}
				echo '</tbody>
					  <tfooter>
							<tr>
								<th>
									
								</th>
								<th colspan="2" class="text-right">
									<span class="pull-left">Total à payer</span>
									<span class="pull-right">'.number_format(array_sum($cout),0,",",".").' <small>FCFA<small></span>
									<input id="total" name="total" type="hidden" value="'.array_sum($cout).'"/>
								</th>
								<th></th>
							</tr>
					  </tfooter>
			</table>';
			
		echo '
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card all-patients">
						<div class="body">
						
							<div class="row" id="other2" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Autre montant ? </p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="othermont" name="choix" style="width:100%;padding:5px">
										<option value="Non">Non</option>
										<option value="Oui">Oui</option>
									</select>              
								</div>
								<br>
							</div>		

							<div class="row cacher" id="other" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Montant accordé *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
							';

								echo '<input id="othermontt" min="0" type="text" name="other" style="width:100%;"/>';
							echo '
								</div>
								<br>
							</div>
							
							
							<div class="row" id="assureur2" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Assurance ? </p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="ass" name="choix" style="width:100%;padding:5px">
										<option value="Non">Non</option>
										<option value="Oui">Oui</option>
									</select>              
								</div>
								<br>
							</div>
							
							<div class="row cacher" id="assureur" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Nom de l\'assureur *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="selectAssureur" name="ass" style="width:100%;padding:5px">
										<option value="">---- Choisissez l\'assureur * ----</option>
							';
								$assureur=$this->md_parametre->liste_assureurs_actifs();
								foreach($assureur AS $a){
									echo '<option value="'.$a->ass_id.'">'.$a->ass_sLibelle.'</option>';
								}
							echo '
									</select>              
								</div>
								<br>
							</div>
							<div class="row cacher" id="assurance"  style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Pourcentage *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="selectAssurance" name="tas" style="width:100%;padding:5px">
										<option value="">---- Choisissez le type d\'assurance * ----</option>
								';
								$type=$this->md_parametre->liste_type_couverture_assurance_actifs();
								foreach($type AS $t){
									echo '<option value="'.$t->tas_id.'">'.$t->tas_iTaux.' %</option>';
								}
							echo '
									</select>              
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 m-b-0" id="retourCharge">
									<input type="hidden" id="resteDeduc" value="'.array_sum($cout).'"/>
								</div>
							</div>
							

							
							
							<div class="row" id="reduction2" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Réduction ? </p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="red" name="red" style="width:100%;padding:5px">
										<option value="Non">Non</option>
										<option value="Oui">Oui</option>
									</select>              
								</div>
								<br>
							</div>
							
							<div class="row cacher" id="reduction" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Pourcentage *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="selectMotif" name="reduction" style="width:100%;padding:5px">
							';
								$motif=$this->md_parametre->liste_motifs_reduction();
								echo '<option value="">-- sélectionner le pourcentage --</option>';
								foreach($motif AS $m){
									
									echo '<option value="'.$m->mod_id.'-/-'.$m->mod_iTaux.'">'.$m->mod_iTaux.' %</option>';
								}
								echo '
									</select>              
								</div>
								<br>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 m-b-0" id="retourReduction">
									
								</div>								
							</div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 m-b-0">
									<hr>
								</div>
							</div>							
							<input type="hidden" name="patient" value="'.$pat[1].'"/>
							<input type="hidden" name="taux" id="taux" value="0"/>
							<input type="hidden" name="montantReduc" id="montantReduc" value="0"/>
						</div>
						<input type="hidden" name="iostesso" id="iostesso" value="0"/>
						<input type="hidden" name="iost2" id="iost2" value="0"/>
					</div>
				</div>
			</div>';
			echo '<script src="'.base_url('assets/js/caisse.js').'"></script>';
			echo '<script src="'.base_url('assets/js/select2.min.js').'"></script>';			
			{ ?>
				<script>		
					$("select#medPrst").select2({
						placeholder: "-- Sélectionner le médecin prescripteur --",
						allowClear: true
					});	
				</script>
			<?php }
	}
	
	
	
	
	/*public function chargeAssurance()
	{
		$data = $this->input->post();
			
		if(!empty($data)){
			if($data['tas']!=""){
				// var_dump($data["lac"]);
				$total_charge = array();
				for($i=0;$i<count($data["lac"]) AND count($data["somme"]);$i++){
					$recup = $this->md_parametre->recup_acte_couvert($data["lac"][$i],$data["tas"]);
					// var_dump($recup);
					if($recup){
						$total_charge[] = ($data["somme"][$i]*$recup->tas_iTaux)/100;
					}
					
				}
				$reste = $data["total"] - array_sum($total_charge);
					echo '<p>
							L\'assureur supporte <b style="font-size:16px">'.number_format(array_sum($total_charge),0,",",".").'</b> <small>FCFA</small>, 
							le client paie <b style="font-size:16px">'.number_format($reste,0,",",".").'</b> <small>FCFA</small><br><br>
							<input type="" name="charge" value="'.array_sum($total_charge).'"/>
							<input type="" id="resteDeduc" value="'.$reste.'"/>
						  </p>';
			}
		}
		
	}*/
	
	
	
	
	public function chargeAssurance()
	{
		$data = $this->input->post();
			
		if(!empty($data)){
			if($data['tas']!=""){
				// var_dump($data["lac"]);
				// $total_charge = array();
				// for($i=0;$i<count($data["lac"]) AND count($data["somme"]);$i++){
					// $recup = $this->md_parametre->recup_acte_couvert($data["lac"][$i],$data["tas"]);
					// var_dump($recup);
					// if($recup){
						// $total_charge[] = ($data["somme"][$i]*$recup->tas_iTaux)/100;
					// }
					
				// }
				$recupTaux = $this->md_parametre->recup_type_assurance($data["tas"]);
				$payAssureur = (($recupTaux->tas_iTaux*$data["total"])/100);
				$payClient = $data["total"] - $payAssureur;
					echo '<p>
							L\'assureur supporte <b style="font-size:16px">'.number_format($payAssureur,0,",",".").'</b> <small>FCFA</small>, 
							le client paie <b style="font-size:16px">'.number_format($payClient,0,",",".").'</b> <small>FCFA</small><br><br>
							<input type="hidden" name="charge" value="'.$payAssureur.'"/>
							<input type="hidden" id="resteDeduc" value="'.$payClient.'"/>
						  </p>-/-'.$data["tas"].'';
			}
		}
		
	}
	
	public function chargeReduite()
	{
		// $data = $this->input->post();
			
		// if(!empty($data)){
			// if($data['reduction']!=""){
				// var_dump($data["lac"]);
				// $total_charge = array();
				// for($i=0;$i<count($data["lac"]) AND count($data["somme"]);$i++){
					// $recup = $this->md_parametre->recup_acte_couvert($data["lac"][$i],$data["tas"]);
					// var_dump($recup);
					// if($recup){
						// $total_charge[] = ($data["somme"][$i]*$recup->tas_iTaux)/100;
					// }
					
				// }
				// $reste = $data["total"] - array_sum($total_charge);
					// echo '<p>
							// L\'assureur supporte <b style="font-size:16px">'.number_format(array_sum($total_charge),2,",",".").'</b> <small>FCFA</small>, 
							// le client paie <b style="font-size:16px">'.number_format($reste,2,",",".").'</b> <small>FCFA</small><br><br>
							// <input type="hidden" name="charge" value="'.array_sum($total_charge).'"/>
						  // </p>';
			// }
		// }
		
	}
	
	public function ajoutFactureCaisse()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		
		$lastacm = 0;
		for($i=0;$i<count($data["acm"]) AND count($data["duree"]);$i++){
			$aujourdhui = date("Y-m-d H:i:s");
			$maDate = strtotime($aujourdhui."+ ".$data["duree"][$i]." days");
			$expiration = date("Y-m-d H:i:s",$maDate);
			
			$donneesAcm = array("acm_iSta"=>2,"acm_dDateDelai"=>NULL,"acm_dDateExp"=>$expiration,"acm_sStatut"=>"en cours","acm_dDateNoTime"=>date("Y-m-d"),"acm_dDateCpt"=>date("Y-m-d"));
			$this->md_patient->maj_actes_caisse($donneesAcm,$data["acm"][$i]);
		
			$lastacm=$data["acm"][$i];
		}
		
		

		if($data["choix"]=="Non"){
			$data["ass"]=NULL;
			$data["tas"]=NULL;
		}
		
		if(!isset($data["charge"])){
			$data["charge"]=0;
		}
		
		if($data["taux"]==0){
			$data["taux"] = NULL;
		}else{
			$recupTaux = $this->md_parametre->recup_motif_reduction($data["taux"]);
		}
		
		
		
		
		if($data["montantReduc"]==0){
			if($data["taux"]==100){
				$paye = 0;
				$reduct = $data["total"];
				$reste = $data["total"];
			}else{
				$paye = $data["total"] - $data["charge"];
				$reduct = NULL; 
				$reste = $data["total"]-($data["charge"] + $paye);
			}
		}else{
			$reduct = $data["total"] - $data["charge"] - $data["montantReduc"];
			$paye = $data["montantReduc"] - $data["charge"];
		}
		
		$patient = $this->md_patient->recup_patient($data["patient"]);
		
		
		// var_dump($qrcode);
		// return;
		

		$donneeFac = array(
			"fac_iSta"=>1,
			"pat_id"=>$data["patient"],
			"per_id"=>$this->session->epiphanie_diab,
			"sta_iPer"=>0,/*Ajout pour initialisation à 0*/
			"fac_sObjet"=>"Paiement des actes médicaux",
			"fac_iMontantPaye"=>$paye,
			"fac_iMontant"=>$data["total"],
			"fac_iMontantAss"=>$data["charge"],
			"fac_iReste"=>$reste,
			"fac_dDatePaie"=>date("Y-m-d"),
			"fac_dDateValAnnul"=>date("d-m-Y", strtotime("+5 days")),
			"fac_dDatePaieTime"=>date("Y-m-d H:i:s"),
			"ass_id"=>$data["ass"],
			"fac_iSituationAss"=>0, /*Ajout pour insérer 0*/
			"mod_id"=>$data["taux"],
			"fac_iMontantReduc"=>$reduct,
			"fac_sQrcode"=>NULL,
			"tas_id"=>$data["tas"]
		);
		
		$insertFac = $this->md_patient->ajout_facture($donneeFac);
		
		if(strlen($insertFac)==1){
			$numero="FAC-00".$insertFac."/".date("m-Y");
		}
		else if(strlen($insertFac)==2){
			$numero="FAC-0".$insertFac."/".date("m-Y");
		}
		else{
			$numero="FAC-".$insertFac."/".date("m-Y");
		}
		
		$patientconcerne = $patient->pat_sNom.' '.$patient->pat_sPrenom.' ('.$patient->pat_sMatricule.')'.' Né(e) le : '.$this->md_config->affDateFrNum($patient->pat_dDateNaiss);
		
		$qrcode = $this->md_config->QRcode($numero, $patientconcerne,date("Y-m-d"),$data["total"],$paye);
		
		$donneeqrcode = array('fac_sQrcode'=>$qrcode);
		
		$majqrcode = $this->md_patient->maj_facture($donneeqrcode,$insertFac);
		

		if($paye!=0){
			$recp = $this->md_patient->recup_actes($lastacm);
			$verif = $this->md_patient->verif_compteur($recp->pat_id);
			if($verif->nb==0){
				$donneeCpt = array(
					"aco_iSta"=>1,
					"pat_id"=>$patient->pat_id,
					"per_id"=>$this->session->epiphanie_diab,
					"fac_id"=>$insertFac,
					"lac_id"=>$recp->lac_id,
					"aco_dDate"=>date("Y-m-d"),
					"aco_dDateTime"=>date("Y-m-d H:i:s")
				);
				$insertCpt = $this->md_patient->ajout_cmpteur($donneeCpt);
				}
			}
		

		
		$log = array(
			"log_iSta"=>0,
			"per_id"=>$this->session->epiphanie_diab,
			"log_sTable"=>"t_facture_fac",
			"log_sIcone"=>"nouveau membre",
			"log_sAction"=>"a fait une facture",
			"log_sActionDetail"=>"a facture au patient : <strong style='text-decoration:underline'>".$patient->pat_sNom." ".$patient->pat_sPrenom." (".$patient->pat_sMatricule.")</strong>",
			"log_dDate"=>date("Y-m-d H:i:s")
		);
		$this->md_connexion->rapport($log);
		
		for($i=0;$i<count($data["acm"]) AND count($data["somme"]) AND count($data["lac"]);$i++){
		
			if($data["iost2"] == 0){
				if($data["iostesso"] == 0){
					if($data["montantReduc"] == 0){
						if($data["taux"]==100){
							$Rremise = $data["total"];
						}else{
							$Rremise = 0;
						}
					}else{
						$Rremise = ($recupTaux->mod_iTaux*$data["somme"][$i]/100);
					}
				}else{
					$recupTaux = $this->md_parametre->recup_type_assurance($data["iostesso"]);
					$Rremise = ($recupTaux->tas_iTaux*$data["somme"][$i]/100);
				}
			}else{
				$Rremise = (($data["total"] - $data["iost2"])/(count($data["lac"])));
			}
			
			$infoActe = $this->md_parametre->recup_act($data["lac"][$i]);
			$recupQpt = $this->md_parametre->recup_typeacte($infoActe->tya_id);
			$partSer = (($recupQpt->tya_iSer*($data["somme"][$i] - $Rremise))/100);
			$partAdm = ($data["somme"][$i] - $Rremise) - $partSer;
			// var_dump($infoActe);
			
			$donneesElt = array(
				"acm_id"=>$data["acm"][$i],
				"elf_iCout"=>$data["somme"][$i],
				"elf_iSta"=>0,
				"elf_iReduc"=>$Rremise,
				"tya_id"=>$infoActe->tya_id,
				"fac_id"=>$insertFac,	
				"per_iElf"=>$this->session->epiphanie_diab,
				"pat_iElf"=>$data["patient"],
				"elf_dDate"=>date("Y-m-d"),
				"date_dElf"=>date("Y-m-d H:i:s")
				);
			$this->md_patient->ajout_elements_facture($donneesElt);	

			
			if($recupQpt->tya_id == 1){
				$Service = 0;
				$Admin = 0;
				$partSerCsl = $partSer;
				$partAdmCsl = $partAdm;
			}else{
				$Service = $partSer;
				$Admin = $partAdm;
				$partSerCsl = 0;
				$partAdmCsl = 0;
			}
			
			
			$donneesQpt = array(
				"qpt_iSta"=>1,
				"ser_id"=>$infoActe->ser_id,
				"fac_id"=>$insertFac,
				"qpt_iSer"=>$Service,
				"qpt_iAdm"=>$Admin,
				"qpt_iSerCsl"=>$partSerCsl,
				"qpt_iAdmCsl"=>$partAdmCsl,
				"qpt_dDate"=>date("Y-m-d")
				);
			$insert = $this->md_parametre->ajout_quotepart($donneesQpt);
		}
		
		
		

			 
			 
		$this->load->view('impression/recu_caisse', array("id"=>$insertFac));
	
	// return ;
	
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
		// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
		// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
		// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("reçu_de_caisse_".$insertFac.".pdf",array('attachment'=>0));
		return redirect('caisse');	

		//}
	}
	
	
	public function payeFactureAssurance($id){
		
		$recup = $this->md_patient->detail_facture($id);
		$paye = $recup->fac_iMontantPaye + $recup->fac_iMontantAss;
		$donnees = array("fac_iSituationAss"=>1,"fac_iMontantPaye"=>$paye);
		$this->md_patient->maj_facture($donnees,$id);
		return redirect("caisse/recouvrementAssurance/".$recup->ass_id);
		
	}
	
	
	public function payeFacturePat($id){
		
		$recup = $this->md_patient->detail_facture($id);
		$paye = $recup->fac_iMontantPaye + $recup->fac_iReste;
		$donnees = array("fac_iReste"=>0,"fac_iMontantPaye"=>$paye);
		$this->md_patient->maj_facture($donnees,$id);
		return redirect("caisse/recouvrementPatient/".$recup->pat_id);
		
	}
	
	
	
	public function cancelpassation()
	{
		$data = $this->input->post();
		if(empty($data)){
			return redirect();
		}
		else{
			date_default_timezone_set('Africa/Brazzaville');
			
			$pwd = trim($this->md_config->cryptPass($data["pwd"]));
			$user = $this->md_connexion->personnel_connect();
			$connectMail = $this->md_connexion->se_connecter_email($user->per_sEmail,$pwd);
			$statePass = $this->md_parametre->recup_state_last_passation($user->per_id);

			
			if(!is_null($connectMail)){
				if($statePass->pas_iSta == 1){
					echo 'deja';
				}elseif($statePass->pas_iSta == 2){
					$donnees = array(
						"per_iCnx"=>0
					);
					$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);
					echo 'rej';
				}
				else{
				
					$log = array(
						"log_iSta"=>0,
						// "log_iType"=>0,
						"per_id"=>$connectMail->per_id,
						"log_sTable"=>"t_passation_pas",
						"log_sIcone"=>"annulation de passation",
						"log_sAction"=>" a annulé la passation de caisse ",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
		
					$donneespassa = array(
						"pas_iSta"=>2
					);
					$majpassation=$this->md_parametre->annulation_passation($donneespassa,$user->per_id);	
					
					$donnees = array(
						"per_iCnx"=>0
					);
					$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);

					echo 'ok';
				}
			}else{
				echo 'error';
			}		
		}
	}	
	
	public function cancelcession()
	{
		$data = $this->input->post();
		if(empty($data)){
			return redirect();
		}
		else{
			date_default_timezone_set('Africa/Brazzaville');
			$pwd = trim($this->md_config->cryptPass($data["pwd"]));
			$user = $this->md_connexion->personnel_connect();
			$connectMail = $this->md_connexion->se_connecter_email($user->per_sEmail,$pwd);
			$stateCes = $this->md_parametre->recup_state_last_cession($user->per_id);

			if(!is_null($connectMail)){
				if($stateCes->ces_iSta == 1){
					echo 'deja';
				}elseif($stateCes->ces_iSta == 2){
					$donnees = array(
						"per_iCnx"=>0
					);
					$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);
					echo 'rej';
				}
				else{
					$log = array(
						"log_iSta"=>0,
						// "log_iType"=>0,
						"per_id"=>$connectMail->per_id,
						"log_sTable"=>"t_personnel_per",
						"log_sIcone"=>"annulation de cession",
						"log_sAction"=>" a annulé la demandé de cession de caisse ",
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					
					$donneescessio = array(
						"ces_iSta"=>2
					);
					$majcession=$this->md_parametre->annulation_cession($donneescessio,$user->per_id);	
					
					$donnees = array(
						"per_iCnx"=>0
					);
					$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);

					echo 'ok';
				}
			}else{
				echo 'error';
			}		
		}
	}		
	
	
	public function closecaisse()
	{
		$data = $this->input->post();
		if(empty($data)){
			return redirect();
		}
		else{
			date_default_timezone_set('Africa/Brazzaville');
			$pwd = trim($this->md_config->cryptPass($data["pwd"]));
			$user = $this->md_connexion->personnel_connect();
			$connectMail = $this->md_connexion->se_connecter_email($user->per_sEmail,$pwd);
			$sommecumul = $this->md_patient->total_encaissee($this->session->epiphanie_diab);

			// echo var_dump($connectMail);
			// return;
			if(!is_null($connectMail)){
				
				$donnees = array(
					"per_iCnx"=>NULL
					);
				$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);
				echo 'ok';
			}else{
				echo 'error';
			}		
		}
	}	
	
	public function opencaisse()
	{
		$data = $this->input->post();
		if(empty($data)){
			return redirect();
		}
		else{
			date_default_timezone_set('Africa/Brazzaville');
			$pwd = trim($this->md_config->cryptPass($data["pwd"]));
			$user = $this->md_connexion->personnel_connect();
			$connectMail = $this->md_connexion->se_connecter_email($user->per_sEmail,$pwd);

			// echo var_dump($connectMail);
			// return;
			if(!is_null($connectMail)){
				// $this->session->set_userdata(array("epiphanie_diab"=>$connectMail->per_id));

				$log = array(
					"log_iSta"=>0,
					// "log_iType"=>0,
					"per_id"=>$connectMail->per_id,
					"log_sTable"=>"t_personnel_per",
					"log_sIcone"=>"ouverture de caisse",
					"log_sAction"=>" a ouvert sa caisse ",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				
				$donnees = array(
					"per_iCnx"=>0
				);
				$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);
				
				
				// $donneesmaj = array(
				// "fac_iSta"=>2,
				// "fac_dDatePaie"=>date("Y-m-d"),
				// "fac_dDatePaieTime"=>date("Y-m-d H:i:s")
				// );
				// $maj = $this->md_patient->maj_facture3($donneesmaj,$user->per_id);
				
				
				// $donneeFac = array(
					// "fac_iSta"=>1,
					// "pat_id"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "sta_iPer"=>2,
					// "fac_sObjet"=>0,
					// "fac_iMontantPaye"=>0,
					// "fac_iMontant"=>0,
					// "fac_iMontantAss"=>0,
					// "fac_iReste"=>0,
					// "fac_dDatePaie"=>date("Y-m-d"),
					// "fac_dDatePaieTime"=>date("Y-m-d H:i:s"),
					// "ass_id"=>0,
					// "fac_iSituationAss"=>0, 
					// "mod_id"=>0,
					// "fac_iMontantReduc"=>0,
					// "tas_id"=>0
				// );
				
				// $insertFac = $this->md_patient->ajout_facture($donneeFac);
				
				echo 'ok';
			}else{
				echo 'error';
			}		
		}
	}
	
	
	public function persoacontact()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect();
		}
		else{

			$verif = $this->md_parametre->verif_locataire($data['nom'],$data['contact']);
			if(!$verif){
				$donnees = array(
				"loc_sLib"=>$data['nom'],
				"loc_sTel"=>$data['contact'],
				"loc_iSta"=>1
				);
				$this->md_parametre->ajout_locataire($donnees);
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_locataire_loc",
					"log_sIcone"=>"nouvelle enseigne",
					"log_sAction"=>"a ajouté une enseigne",
					"log_sActionDetail"=>"a ajouté une nouvelle enseigne : <strong style='text-decoration:underline'>".$data['nom']."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo 'ok';
			}else{
				echo 'deja';
			}
			
		}
	
	}	
	
	public function actedivers()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect();
		}
		else{

			$verif = $this->md_parametre->verif_locataire($data['nom'],$data['contact']);
			if(!$verif){
				$donnees = array(
				"loc_sLib"=>$data['nom'],
				"loc_sTel"=>$data['contact'],
				"loc_iSta"=>1
				);
				$this->md_parametre->ajout_locataire($donnees);
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_locataire_loc",
					"log_sIcone"=>"nouvelle enseigne",
					"log_sAction"=>"a ajouté une enseigne",
					"log_sActionDetail"=>"a ajouté une nouvelle enseigne : <strong style='text-decoration:underline'>".$data['nom']."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo 'ok';
			}else{
				echo 'deja';
			}
			
		}
	
	}
	
	
	public function ajoutFactureActeDivers()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();

		
		if($data["patient"]==""){
			$data["patient"] = 0;
		}	
		
		if($data["personne"]==""){
			$personne = NULL;
		}else{
			if($data["tel"]==""){
				$personne = strtoupper($data["personne"]);
			}else{
			     $personne = strtoupper($data["personne"].' ('.$data["tel"].')');
			}
			
		}
		
		if($data["contenu"]==""){
			$data["contenu"] = NULL;
		}
		
		// echo var_dump($data);
		// return;
		
		$tab = explode('-/-', $data["acte"]);

		$donnees = array(
			"acm_iSta"=>2,
			"lac_id"=>$tab[0],
			"pat_id"=>$data["patient"],
			"uni_id"=>$tab[1],
			"acm_iHos"=>0,
			"acm_iFin"=>0,
			"recep_iPer"=>0,
			"acm_iDivers"=>0,/*Pour recupérer le dernier frais divers*/
			"acm_dDate"=>date("Y-m-d H:i:s"),
			"acm_dDateDelai"=>NULL
		);
		$insert = $this->md_patient->ajout_orientation($donnees);
		


		$donneeFac = array(
			"fac_iSta"=>1,
			"pat_id"=>$data["patient"],
			"per_id"=>$this->session->epiphanie_diab,
			"sta_iPer"=>0,
			"fac_sObjet"=>5,
			"fac_iMontantPaye"=>$data["montpay"],
			"fac_iMontant"=>$data["montpay"],
			"fac_iMontantAss"=>0,
			"fac_iReste"=>0,
			"fac_dDatePaie"=>date("Y-m-d"),
			"fac_dDateValAnnul"=>date("d-m-Y", strtotime("+5 days")),
			"fac_dDatePaieTime"=>date("Y-m-d H:i:s"),
			"ass_id"=>0,
			"fac_sDesc"=>$data["contenu"],
			"fac_iSituationAss"=>0,
			"mod_id"=>0,
			"fac_sLoc"=>$personne,
			"fac_iMontantReduc"=>0,
			"tas_id"=>0
		);
		
		$insertFac = $this->md_patient->ajout_facture($donneeFac);
		$patient = $this->md_patient->recup_patient($data["patient"]);

		if(strlen($insertFac)==1){
			$numero="FAC-00".$insertFac."/".date("m-Y");
		}
		else if(strlen($insertFac)==2){
			$numero="FAC-0".$insertFac."/".date("m-Y");
		}
		else{
			$numero="FAC-".$insertFac."/".date("m-Y");
		}
		
		
		if($data["patient"]!=""){
			$patconcerne = $patient->pat_sNom.' '.$patient->pat_sPrenom.' ('.$patient->pat_sMatricule.')'.'Né(e) le : '.$this->md_config->affDateFrNum($patient->pat_dDateNaiss);
		}	
		
		if($data["personne"]!=""){
			if($data["tel"]==""){
				$personne = $data["personne"];
			}else{
			     $personne = $data["personne"].' ('.$data["tel"].')';
			}
			$patconcerne = $personne;
		}
		
		// if($data["patient"]!=""){
			// $verif = $this->md_patient->verif_compteur($data["patient"]);
			// if($verif->nb==0){
				// $donneeCpt = array(
					// "aco_iSta"=>1,
					// "pat_id"=>$data["patient"],
					// "per_id"=>$this->session->epiphanie_diab,
					// "fac_id"=>$insertFac,
					// "lac_id"=>$data["acte"],
					// "aco_dDate"=>date("Y-m-d"),
					// "aco_dDateTime"=>date("Y-m-d H:i:s")
				// );
				// $insertCpt = $this->md_patient->ajout_cmpteur($donneeCpt);
				// }
		// }
		
					
					// var_dump($insertFac);
		// return;
		$qrcode = $this->md_config->QRcode($numero, $patconcerne,date("Y-m-d"),$data["montpay"],$data["montpay"]);
		
		$donneeqrcode = array('fac_sQrcode'=>$qrcode);
		
		$majqrcode = $this->md_patient->maj_facture($donneeqrcode,$insertFac);
		

		$recuplastact = $this->md_parametre->recup_last_acte_medical();
		$infoActe = $this->md_parametre->recup_act($tab[0]);
		
		if(!is_null($infoActe->tya_id)){
			$recupQpt = $this->md_parametre->recup_typeacte($infoActe->tya_id);
			$partSer = (($recupQpt->tya_iSer*$data["montpay"])/100);
			$partAdm = $data["montpay"] - $partSer;
		}

		$donneesElt = array(
			"acm_id"=>$recuplastact->acm_id,
			"elf_iSta"=>0,
			"elf_iReduc"=>0,
			"tya_id"=>$infoActe->tya_id,
			"elf_iCout"=>$data["montpay"],
			"fac_id"=>$insertFac,
			"per_iElf"=>$this->session->epiphanie_diab,
			"pat_iElf"=>$data["patient"],
			"loc_sElf"=>$personne,
			"date_dElf"=>date("Y-m-d H:i:s"),
			"elf_dDate"=>date("Y-m-d")
				);
		$this->md_patient->ajout_elements_facture($donneesElt);
			 
		
		if(!is_null($infoActe->tya_id)){
			
			
			
			if($recupQpt->tya_id == 1){
				$Service = 0;
				$Admin = 0;
				$partSerCsl = $partSer;
				$partAdmCsl = $partAdm;
			}else{
				$Service = $partSer;
				$Admin = $partAdm;
				$partSerCsl = 0;
				$partAdmCsl = 0;
			}
			
			
			$donneesQpt = array(
				"qpt_iSta"=>1,
				"ser_id"=>$infoActe->ser_id,
				"fac_id"=>$insertFac,
				"qpt_iSer"=>$Service,
				"qpt_iAdm"=>$Admin,
				"qpt_iSerCsl"=>$partSerCsl,
				"qpt_iAdmCsl"=>$partAdmCsl,
				"qpt_dDate"=>date("Y-m-d")
				);
			$insert = $this->md_parametre->ajout_quotepart($donneesQpt);
			 
		} 
			 
			 
		$this->load->view('impression/recu_caisse', array("id"=>$insertFac));
// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
		// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
		// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
		// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("reçu_de_caisse_".$insertFac.".pdf",array('attachment'=>0));
		echo 'ok';
		return redirect('caisse');	

		//}
	}	
	
	
	
	public function ajoutCession()
	{
		$data = $this->input->post();
		if(empty($data)){
			return redirect();
		}
		else{
			date_default_timezone_set('Africa/Brazzaville');
			$user = $this->md_connexion->personnel_connect();
			$sommecumul = $this->md_patient->total_encaissee($this->session->epiphanie_diab);
			$sommecumulannulation = $this->md_patient->total_annulation_caissee($this->session->epiphanie_diab);
			// echo var_dump($data);
			// return;
			if($data['espece2'] > 0){
				
				
				$donneescession = array(
					"ces_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"ces_iMontant"=>$sommecumul->cumul + $sommecumulannulation->cumulannulation,
					"ces_iEsp"=>$data['espece2'],
					"ces_dDate"=>date("Y-m-d H:i:s"),
					"ces_dDateNoTime"=>date("Y-m-d")
				);
				$this->md_parametre->ajout_cession($donneescession);
				
				$donnees = array(
					"per_iCnx"=>1
					);
				$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);
				
				
				$log = array(
					"log_iSta"=>0,
					// "log_iType"=>0,
					"per_id"=>$user->per_id,
					"log_sTable"=>"t_cession_ces",
					"log_sIcone"=>"demande de cession",
					"log_sAction"=>" a demandé la cession de caisse ",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				echo 'ok';
			}else{
				echo 'error';
			}		
		}
	}
	
	
	public function cessionCaisse()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();

		
		if(!is_numeric(trim($data["espece2"]))){
			echo 'pasnumeric';
		}else{
			if(trim($data["espece2"]) < 0){
				echo 'neg';
			}else{
				$verif = 0;
				for($i=0;$i<strlen(trim($data["espece2"]));$i++){
					if(trim($data["espece2"])[$i] === '.' || trim($data["espece2"])[$i] === ',' || trim($data["espece2"])[$i] === ' '){
						$verif+=1;
					}
				}
				if($verif > 0){
					echo 'virguleespacepoint';
				}else{
					$sommecumul = $this->md_patient->total_encaissee($this->session->epiphanie_diab);
					$sommecumulannulation = $this->md_patient->total_annulation_caissee($this->session->epiphanie_diab);
					if($sommecumul->cumul + $sommecumulannulation->cumulannulation == 0){
						echo 'zero';
					}else{
						$Ec = $data['espece2'] - $sommecumul->cumul + $sommecumulannulation->cumulannulation;
						if($Ec > 0){
							echo 'ex';
						}elseif($Ec < 0){
							echo 'def';
						}
						else{
							echo 'ok';
						}
					}
				}
			}
		}
	}	
	
	
	public function passationCaisse()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();

		if(!is_numeric(trim($data["espece"]))){
			echo 'pasnumeric';
		}else{
			if(trim($data["espece"]) < 0){
				echo 'neg';
			}else{
				$verif = 0;
				for($i=0;$i<strlen(trim($data["espece"]));$i++){
					if(trim($data["espece"])[$i] === '.' || trim($data["espece"])[$i] === ',' || trim($data["espece"])[$i] === ''){
						$verif+=1;
					}
				}
				if($verif > 0){
					echo 'virguleespacepoint';
				}else{
					$sommecumul = $this->md_patient->total_encaissee($this->session->epiphanie_diab);
					$sommecumulannulation = $this->md_patient->total_annulation_caissee($this->session->epiphanie_diab);
					if($sommecumul->cumul + $sommecumulannulation->cumulannulation == 0){
						echo 'zero';
					}else{
						$Ec = $data['espece'] - $sommecumul->cumul + $sommecumulannulation->cumulannulation;
						if($Ec > 0){
							echo 'ex';
						}elseif($Ec < 0){
							echo 'def';
						}
						else{
							echo 'ok';
						}
					}
				}
			}
		}
	}
	
	
	
	public function ajoutPassation()
	{
		
		$data = $this->input->post();
		date_default_timezone_set('Africa/Brazzaville');
		$user = $this->md_connexion->personnel_connect();
		$sommecumul = $this->md_patient->total_encaissee($this->session->epiphanie_diab);
		$sommecumulannulation = $this->md_patient->total_annulation_caissee($this->session->epiphanie_diab);
		if($data['espece'] > 0){
			
			
		$caissier = $this->md_patient->last_mouvement_caissier_passation($this->session->epiphanie_diab);

		$donneespassation = array(
			"pas_iSta"=>0,
			"pas_iAuteur"=>$this->session->epiphanie_diab,
			"pas_iRecep"=>$data["recept"],
			"pas_iMontant"=>$data["sommecumul"],
			"pas_iEsp"=>$data['espece'],
			"pas_dDate"=>date("Y-m-d"),
			"pas_dDateTime"=>date("Y-m-d H:i:s")
		);
		$this->md_parametre->ajout_passation($donneespassation);
			
			$donnees = array(
				"per_iCnx"=>1
				);
			$modif=$this->md_personnel->modifier_personnel($donnees,$user->per_id);
			
			
			$log = array(
				"log_iSta"=>0,
				// "log_iType"=>0,
				"per_id"=>$user->per_id,
				"log_sTable"=>"t_passation_pas",
				"log_sIcone"=>"demande de passation",
				"log_sAction"=>" a effectué la passation de caisse ",
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);
			echo 'ok';
		}else{
			echo 'error';
		}
		
		
		
		
		
		
		
		
		/*
		
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
			
			$donneeFac = array(
				"fac_iSta"=>1,
				"pat_id"=>0,
				"per_id"=>$this->session->epiphanie_diab, 
				"recp_iPer"=>$data["recept"],
				"sta_iPer"=>1,
				"fac_sObjet"=>2,
				"fac_iMontantPaye"=>0,
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>date("Y-m-d"),
				"fac_dDatePaieTime"=>date("Y-m-d H:i:s"),
				"ass_id"=>0,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);

			$insertFac = $this->md_patient->ajout_facture($donneeFac);
			
			$caissier = $this->md_patient->last_mouvement_caissier_passation($this->session->epiphanie_diab);

			$donneespassation = array(
				"pas_iSta"=>0,
				"pas_iAuteur"=>$this->session->epiphanie_diab,
				"pas_iRecep"=>$data["recept"],
				"pas_iMontant"=>$data["sommecumul"],
				"pas_iTotal"=>-$data['espece'],
				"pas_sNum"=>$caissier->fac_sNumero,
				"pas_dDate"=>$caissier->fac_dDatePaie,
				"pas_dDateTime"=>$caissier->fac_dDatePaieTime
			);			


			$this->md_parametre->ajout_passation($donneespassation);
						
			$annuleCumulusercourant = array(
				"sta_iPer"=>1
			);
			$modif=$this->md_patient->maj_annulation_cumul_caisse($annuleCumulusercourant,$this->session->epiphanie_diab);	/*Met le cumul de l'user à zero*/
			/*
			$donneesdeconnectusercourant = array(
				"per_iCnx"=>NULL
			);
			$modif=$this->md_personnel->modifier_personnel($donneesdeconnectusercourant,$this->session->epiphanie_diab);	/*Ferme la caisse de user courant*/

			/*
			$donneeFac2 = array(
				"fac_iSta"=>1,
				"pat_id"=>0,
				"per_id"=>$data["recept"],
				"recp_iPer"=>$this->session->epiphanie_diab,
				"sta_iPer"=>0,/*Met à zero à l'user qui recoit pour faire le cumul par la suite*/
				/*"fac_sObjet"=>3,
				"fac_iMontantPaye"=>$data["espece"],
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>date("Y-m-d"),
				"fac_dDatePaieTime"=>date("Y-m-d H:i:s"),
				"ass_id"=>0,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);
			$insertFac2 = $this->md_patient->ajout_facture($donneeFac2);
			
						
			$donneesuserrecept = array(
				"per_iCnx"=>0
			);
			$modif=$this->md_personnel->modifier_personnel($donneesuserrecept,$data["recept"]);	/*ouvre la caisse de user recept*/
			/*
			
			echo 'ok';*/



	}	
	
	
	public function ajoutAppro()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		
		
		// echo date("Y-m-d");
		// return;
		
			if(!is_numeric(trim($data["montant"]))){
				echo 'pasnumeric';
			}else{
				if(trim($data["montant"]) < 0){
					echo 'neg';
				}else{
					if(trim($data["montant"]) == 0 || trim($data["montant"]) == ''){
						echo 'nonvalide';
					}else{
						$verif = 0;
						for($i=0;$i<strlen(trim($data["montant"]));$i++){
							if(trim($data["montant"])[$i] === '.' || trim($data["montant"])[$i] === ',' || trim($data["montant"])[$i] === ' '){
								$verif+=1;
							}
						}
						if($verif > 0){
							echo 'virguleespacepoint';
						}else{
							$verif = $this->md_parametre->verif_approvisionnement();
							if($verif){
								echo 'gia';
							}else{
								$donnee = array(
									"apr_iSta"=>0,
									"per_id"=>$this->session->epiphanie_diab,
									"apr_iDmd"=>trim($data["montant"]),
									"apr_iRep"=>NULL,
									"apr_dDateValide"=>date("d-m-Y", strtotime("+1 days")),
									"apr_dDate"=>date("Y-m-d H:i:s")
								);
								$insertAppro = $this->md_parametre->ajout_approvisionnement($donnee);
								
								echo 'ok';
							}
						}
					}
				}
			}
	}	
	
	
	
	public function supprimer_appro($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/approvisionnement");
		}
		else{
			$donnees = array(
				"apr_iSta"=>3
			);
			$supprimer = $this->md_parametre->maj_approvisionnement($donnees,$id);
			$montant = $this->md_parametre->recup_montant_appro($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_approvisionnement_apr",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un approvisionnement",
					"log_sActionDetail"=>"a supprimé l\'approvisionnement de : <strong style='text-decoration:underline'>".$montant->apr_iDmd."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("caisse/approvisionnement");
			}
		}
	}
	
	
	
	public function recupMvtCaisse()
	{

		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		if($premier == $dernier){
			$affichedate = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affichedate = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}

		$libelle = $this->md_config->typeJrnl($data["jrnal"], $data["acte"]);

		$liste  = $this->md_patient->liste_mouvement_caisse_facture($this->session->epiphanie_diab, $premier, $dernier, $data["acte"], $data["jrnal"]);
	// var_dump($liste);
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>';echo $libelle.' '.$affichedate;echo'</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer " href="'; echo site_url("impression/mouvement_caisse_facture/".$this->session->epiphanie_diab."/".$premier."/".$dernier."/".$data["acte"]."/".$data["jrnal"]); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>   mouvements (';echo count($liste);echo')</a>
										</td>
										<td colspan="5"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
									<tr align="center">
										<td><b>Ordre</b></td>
										<td><b>N°Facture(Opération)</b></td>
										<td><b>Date & Heure</b></td>
										<td><b>Type Opération</b></td>
										<td><b>Montant (<small>FCFA</small>)</b></td>
										<td><b>Actions</b></td>
									</tr>
								</thead>
								<tbody>';
								
	
								$cpt = 1;$somcumul = 0;foreach($liste AS $m){ ?>
								<tr align="center" <?php if($m->fac_sObjet=="8" || $m->fac_sObjet=="6"){echo' style="background:pink"';}?><?php if($m->fac_sObjet=='2'){echo' style="display:none"';}?>>
									<td>
										<b><?php echo $cpt; ?></b>
									</td>							
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
										<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6" || $m->fac_sObjet=="8"){echo ' ('.$m->fac_sNumero.')';};?></b> 
									</td>
									<td>
										<b>
											<?php 
												if($m->fac_sObjet=="6"){
													echo number_format($m->fac_iRemise,0,",",".");
												}elseif($m->fac_sObjet=="10"){
													echo number_format($m->fac_iEx,0,",",".");
												}elseif($m->fac_sObjet=="9"){
													echo number_format($m->fac_iDef,0,",",".");
												}
												else{ 
													echo number_format($m->fac_iMontantPaye,0,",",".");
												}
											;?>
										</b>
									</td>
									<td class="text-center">
										<?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){?>
										
											<a href="<?php echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:16px"></i></a> &nbsp;&nbsp;
											<?php if($m->fac_sObjet!="5"){?>
											<a href="<?php echo site_url("facture/detail/".$m->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:16px"></i></a>
											<?php }?>
										<?php }?>
									</td>
								</tr>
								<?php $cpt+=1; if($m->fac_iSta==1){ if($m->fac_sObjet=="6"){$somcumul +=$m->fac_iRemise;}elseif($m->fac_sObjet=="10"){$somcumul +=$m->fac_iEx;}elseif($m->fac_sObjet=="9"){$somcumul +=$m->fac_iDef;}else{$somcumul +=$m->fac_iMontantPaye;};}}
							echo '';
							{ ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="right" colspan="4"><b style="font-weight:900">TOTAL:</b></td>
									<td align="center" colspan=""><b style="font-weight:900"><?php echo number_format($somcumul,0,",","."); ?></b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
								</tr>
								
								
							<?php if($data["jrnal"]==0){?>
							
							<?php $annulation = $this->md_parametre->recup_liste_annulation_caissier($this->session->epiphanie_diab, $premier, $dernier);?>
							<?php if(!empty($annulation)){?>
								<?php foreach($annulation AS $a){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo $a->fac_sNum;?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($a->anf_dDateTime),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">ANNULATION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($a->anf_iMontant,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>					
							<?php }?>
							
							
							<?php $cession = $this->md_parametre->recup_liste_cession_caissier($this->session->epiphanie_diab, $premier, $dernier);?>
							<?php $passation = $this->md_parametre->recup_liste_passation_caissier($this->session->epiphanie_diab, $premier, $dernier);?>
							<?php if(!empty($cession) && empty($passation)){?>
								<?php  $cumulMont=0;$cumulEsp=0;$ordineCes=1;$cumulCes=0;foreach($cession AS $c){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">CESSION <?php if(count($cession) > 1){echo 'N° '.$ordineCes;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($c->ces_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>																				
						
								<?php $cumulMont+=$c->ces_iMontant;$cumulEsp+=$c->ces_iEsp;$ordineCes+=1;$cumulCes+=$c->ces_iTotal;}?>	
								<?php if(count($cession) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL CESSION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulCes,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>	
								<?php $reslt = $cumulEsp - $cumulMont;?>
								<?php if($reslt!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($reslt > 0){echo 'EXCEDENT';}elseif($reslt < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($reslt,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>																		
								<tr>
									<td align="right" colspan="4"><b style="font-weight:700">SOLDE </b></td>
									<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul + $cumulCes + $reslt,0,",","."); ?></b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
								</tr>	
							<?php }elseif(empty($cession) && !empty($passation)){?>
								<?php $cumulMont=0;$cumulEsp=0;$ordinePas=1;$cumulPas=0;foreach($passation AS $p){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($p->pas_sNum,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($p->pas_dDateTime),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">PASSATION <?php if(count($passation) > 1){echo 'N° '.$ordinePas;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($p->pas_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>						
								<?php $cumulMont+=$p->pas_iMontant;$cumulEsp+=$p->pas_iEsp;$cumulPas+=$p->pas_iTotal;$ordinePas+=1;}?>	
								<?php if(count($passation) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL PASSATION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulPas,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>	
								<?php $reslt = $cumulEsp - $cumulMont;?>
								<?php if($reslt!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($reslt > 0){echo 'EXCEDENT';}elseif($reslt < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($reslt,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>										
								<tr>
									<td align="right" colspan="4"><b style="font-weight:700">SOLDE </b></td>
									<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul + $cumulPas + $reslt,0,",","."); ?></b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
								</tr>									
							<?php }elseif(!empty($cession) && !empty($passation)){?>	

								<?php $cumulMontCes=0;$cumulEspCes=0;$ordineCes=1;$cumulCes=0; foreach($cession AS $c){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">CESSION <?php if(count($cession) > 1){echo 'N° '.$ordineCes;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($c->ces_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>																				
						
								<?php $cumulMontCes+=$c->ces_iMontant;$cumulEspCes+=$c->ces_iEsp;$ordineCes+=1;$cumulCes+=$c->ces_iTotal;}?>	
								<?php if(count($cession) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL CESSION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulCes,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>
								<?php $resltCes = $cumulEspCes - $cumulMontCes;?>
								<?php if($resltCes!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($resltCes > 0){echo 'EXCEDENT';}elseif($resltCes < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($resltCes,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>								
								
								<?php $cumulMontPas=0;$cumulEspPas=0;$ordinePas=1;$cumulPas=0;foreach($passation AS $p){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($p->pas_sNum,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($p->pas_dDateTime),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">PASSATION <?php if(count($passation) > 1){echo 'N° '.$ordinePas;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($p->pas_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>																										
								<?php $cumulMontPas+=$p->pas_iMontant;$cumulEspPas+=$p->pas_iEsp;$cumulPas+=$p->pas_iTotal;$ordinePas+=1;}?>	
								<?php if(count($passation) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL PASSATION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulPas,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>	
								<?php $resltPas = $cumulEspPas - $cumulMontPas;?>
								<?php if($resltPas!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($resltPas > 0){echo 'EXCEDENT';}elseif($resltPas < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($resltPas,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>								
									<tr>
										<td align="right" colspan="4"><b style="font-weight:700">SOLDE </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul + $cumulCes + $cumulPas + $resltPas + $resltCes,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>	
							<?php }?>
						<?php }?>
								
							</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>


		<script src="<?php echo base_url('assets/plugins/jquery-datatable/datatables.min.js');?>"></script><!-- Jquery DataTable Plugin Js -->
		<script src="<?php echo base_url('assets/js/pages/tables/data-table.js');?>"></script>
		<?php }

	}	
	
	
	
	public function recupCptActe()
	{

		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		if($premier == $dernier){
			$affiche = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affiche = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
		
		
		$liste  = $this->md_patient->liste_compteur_acte($premier,$dernier);

	// var_dump($liste);return;
		echo '	
		
		
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Mouvements de caisse ';echo $affiche;echo'</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer" href="'; echo site_url("impression/compteur_actes_medicaux/".$premier."/".$dernier); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  imprimer (';echo count($liste);echo')</a>
										</td>
										<td colspan="4"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
									<tr align="center">
										<td><b>Date & Heure</b></td>
										<td><b>Acte Médical</b></td>
										<td><b>Patient</b></td>
										<td><b>Auteur</b></td>
									</tr>
								</thead>
								<tbody>';
								
						
								foreach($liste AS $l){ ?>
								<tr align="center">
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($l->aco_dDateTime),2); ?></b>
									</td>
									<td>
										<b><?php $act = $this->md_parametre->recup_act($l->lac_id); echo $act->lac_sLibelle; ?></b> 
									</td>								
									<td>
										<b><?php $pat = $this->md_patient->recup_patient($l->pat_id);echo $pat->pat_sNom.' '.$pat->pat_sPrenom; ?></b> 
									</td>								
									<td>
										<b><?php $per = $this->md_personnel->recup_personnel($l->per_id);echo $per->per_sNom.' '.$per->per_sPrenom; ?></b>
									</td>
								</tr>
									<?php }
							echo '</tbody>
								<tfoot>
								<tr>
									<td align="center" colspan="5"><b style="font-weight:900">NOMBRE TOTAL D\'ACTES: <?php echo count($liste); ?> </b></td>
								</tr>
							</tfoot>
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
	
	
	
	
	public function recupMvtCaisseActe()
	{

		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		if($premier == $dernier){
			$affiche = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affiche = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
		
		
		$liste  = $this->md_patient->liste_facture_acte($this->session->epiphanie_diab, $premier,$dernier);

	// var_dump($liste);return;
		echo '	
		
		
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Mouvements de caisse ';echo $affiche;echo'</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer tous les mouvements" href="'; echo site_url("impression/mouvement_caisse_acte/".$this->session->epiphanie_diab."/".$premier."/".$dernier); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  mouvements (';echo count($liste);echo')</a>
										</td>
										<td colspan="4"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
									<tr align="center">
										<td><b>Date & Heure Opération</b></td>
										<td><b>Libellé actes</b></td>
										<td><b>Montant Encaissé (<small>FCFA</small>)</b></td>
										<td><b>Patient</b></td>
										<td><b>Provenance</b></td>
									</tr>
								</thead>
								<tbody>';
								
						
									$somcumul = 0;foreach($liste AS $m){ ?>
								<tr align="center" <?php if($m->elf_iSta==1){echo' style="background:pink"';}?>>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->elf_dDate),2); ?></b>
									</td>
									<td>
										<b><?php $acte = $this->md_patient->recup_acm($m->acm_id);echo $acte->lac_sLibelle; ?></b> 
									</td>								
									<td>
										<b><?php echo number_format($m->elf_iCout,0,",","."); ?></b> 
									</td>
									<td>
										<b><?php if($m->pat_iElf!=0){$pat = $this->md_patient->recup_patient($m->pat_iElf);echo $pat->pat_sNom.' '.$pat->pat_sPrenom.' ('.$pat->pat_sMatricule.')';}else{echo $m->loc_sElf;}; ?></b>
									</td>									
									<td>
										<b><?php $acte = $this->md_patient->recup_acm($m->acm_id);echo $acte->uni_sLibelle; ?></b>
									</td>
								</tr>
									<?php if($m->elf_iSta==0){$somcumul+=$m->elf_iCout;}}
							echo '</tbody>
								<tfoot>
								<tr>
									<td align="center" colspan="5"><b style="font-weight:900">TOTAL: '; echo number_format($somcumul,0,",","."); echo' FCFA</b></td>
								</tr>
							</tfoot>
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
	
	
	public function rejete_appro($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/liste_approvisionnement");
		}
		else{
			$donnees = array(
				"apr_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_approvisionnement($donnees,$id);
			// $montant = $this->md_parametre->recup_montant_appro($id);
			// if($supprimer){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_approvisionnement_apr",
					// "log_sIcone"=>"suppression",
					// "log_sAction"=>"a supprimé un approvisionnement",
					// "log_sActionDetail"=>"a supprimé l\'approvisionnement de : <strong style='text-decoration:underline'>".$montant->apr_iDmd."</strong>",
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				return redirect("caisse/liste_approvisionnement");
			// }
		}
	}	
	
	
	public function valide_appro($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/liste_approvisionnement");
		}
		else{
			$montant = $this->md_parametre->recup_montant_appro($id);
			$donnees = array(
				"apr_iSta"=>1,
				"apr_iRep"=>$montant->apr_iDmd,
				"apr_iPerVal"=>$this->session->epiphanie_diab,
				"apr_dDateVal"=>date("Y-m-d H:i:s")
			);
			$supprimer = $this->md_parametre->maj_approvisionnement($donnees,$id);
			
			
				$donnees2 = array(
					"per_iCnx"=>0
				);
				$modif=$this->md_personnel->modifier_personnel($donnees2,$montant->per_id);
				
			$donnees3 = array(
				"apr_iSta"=>1
			);
			$supprimer = $this->md_parametre->maj_approvisionnement($donnees3,$id);
				
				$donneeFac = array(
					"fac_iSta"=>1,
					"pat_id"=>0,
					"per_id"=>$montant->per_id,
					"sta_iPer"=>0,
					"fac_sObjet"=>4,
					"fac_iMontantPaye"=>$montant->apr_iDmd,
					"fac_iMontant"=>0,
					"fac_iMontantAss"=>0,
					"fac_iReste"=>0,
					"fac_dDatePaie"=>date("Y-m-d"),
					"fac_dDatePaieTime"=>date("Y-m-d H:i:s"),
					"ass_id"=>0,
					"fac_iSituationAss"=>0, 
					"mod_id"=>0,
					"fac_iMontantReduc"=>0,
					"tas_id"=>0
				);
				
				$insertFac = $this->md_patient->ajout_facture($donneeFac);
				
				
			$donnees = array(
				"apr_iFac"=>$insertFac
			);
			$majnumoperation = $this->md_parametre->maj_approvisionnement($donnees,$id);
				
			$montant = $this->md_parametre->recup_montant_appro($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_approvisionnement_apr",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un approvisionnement",
					"log_sActionDetail"=>"a supprimé l\'approvisionnement de : <strong style='text-decoration:underline'>".$montant->apr_iDmd."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				
		}
				
			return redirect("caisse/liste_approvisionnement");
	}	
	}	
	
	
	public function rejete_passation($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/historique_passation");
		}
		else{
			$donnees = array(
				"pas_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_passation($donnees,$id);
			
			$idpasper = $this->md_parametre->recup_passation($id);
			
			
			$donnees2 = array(
				"per_iCnx"=>0
			);
			$modif=$this->md_personnel->modifier_personnel($donnees2,$idpasper->pas_iAuteur);
				return redirect("caisse/historique_passation");
		}
	}	
	
	public function rejete_cession($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/liste_cession");
		}
		else{
			$donnees = array(
				"ces_iSta"=>2
			);
			$supprimer = $this->md_parametre->maj_cession($donnees,$id);
			
			$idcesper = $this->md_parametre->recup_cession($id);
			
			
			$donnees2 = array(
				"per_iCnx"=>0
			);
			$modif=$this->md_personnel->modifier_personnel($donnees2,$idcesper->per_id);
			// $montant = $this->md_parametre->recup_montant_appro($id);
			// if($supprimer){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_approvisionnement_apr",
					// "log_sIcone"=>"suppression",
					// "log_sAction"=>"a supprimé un approvisionnement",
					// "log_sActionDetail"=>"a supprimé l\'approvisionnement de : <strong style='text-decoration:underline'>".$montant->apr_iDmd."</strong>",
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				return redirect("caisse/liste_cession");
			// }
		}
	}	
	
	
	public function valide_passation($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/historique_passation");
		}
		else{
		
		$idpasper = $this->md_parametre->recup_passation($id);
			
			$donneeFac = array(
				"fac_iSta"=>1,
				"pat_id"=>0,
				"per_id"=>$idpasper->pas_iAuteur, 
				"recp_iPer"=>$idpasper->pas_iRecep,
				"sta_iPer"=>1,
				"fac_sObjet"=>2,
				"fac_iMontantPaye"=>0,
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>$idpasper->pas_dDate,
				"fac_dDatePaieTime"=>$idpasper->pas_dDateTime,
				"ass_id"=>0,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);
			$insertFac = $this->md_patient->ajout_facture($donneeFac);
			
			$donneeFac2 = array(
				"fac_iSta"=>1,
				"pat_id"=>0,
				"per_id"=>$idpasper->pas_iRecep,
				"recp_iPer"=>$idpasper->pas_iAuteur,
				"sta_iPer"=>0,/*Met à zero à l'user qui recoit pour faire le cumul par la suite*/
				"fac_sObjet"=>3,
				"fac_iMontantPaye"=>$idpasper->pas_iEsp,
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>$idpasper->pas_dDate,
				"fac_dDatePaieTime"=>$idpasper->pas_dDateTime,
				"ass_id"=>0,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);
			$insertFac2 = $this->md_patient->ajout_facture($donneeFac2);
			

			$caissier = $this->md_patient->recup_last_mvt_caissier_passation($idpasper->pas_iAuteur);
			$donnees = array(
				"pas_iSta"=>1,
				"pas_sNum"=>$caissier->fac_sNumero,
				"pas_iTotal"=>-$idpasper->pas_iEsp
			);
			$supprimer = $this->md_parametre->maj_passation($donnees,$id);
					
			$annuleCumulusercourant = array(
				"sta_iPer"=>1
			);
			$modif=$this->md_patient->maj_annulation_cumul_caisse($annuleCumulusercourant,$idpasper->pas_iAuteur);	/*Met le cumul de l'user à zero*/
			
			$donneesdeconnectusercourant = array(
				"per_iCnx"=>0
			);
			$modif=$this->md_personnel->modifier_personnel($donneesdeconnectusercourant,$idpasper->pas_iAuteur);	/*Pouvoir facturer à nouveau*/
			
				return redirect("caisse/historique_passation");
		}
	}	
	
	public function valide_cession($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/liste_cession");
		}
		else{
		
		$idcesper = $this->md_parametre->recup_cession($id);

		
			$donneeFac = array(
				"fac_iSta"=>1,
				"pat_id"=>0,
				"per_id"=>$idcesper->per_id, 
				"recp_iPer"=>0,
				"sta_iPer"=>1,
				"fac_sObjet"=>7,
				"fac_iMontantPaye"=>0,
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>$idcesper->ces_dDateNoTime,
				"fac_dDatePaieTime"=>$idcesper->ces_dDate,
				"ass_id"=>0,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);
			$insertFac = $this->md_patient->ajout_facture($donneeFac);

			$caissier = $this->md_patient->recup_last_mouvement_caissier($idcesper->per_id);
			$donnees = array(
				"ces_iSta"=>1,
				"ces_sNumOperation"=>$caissier->fac_sNumero,
				"ces_iTotal"=>-$idcesper->ces_iEsp
			);
			$supprimer = $this->md_parametre->maj_cession($donnees,$id);
					
			$annuleCumulusercourant = array(
				"sta_iPer"=>1
			);
			$modif=$this->md_patient->maj_annulation_cumul_caisse($annuleCumulusercourant,$idcesper->per_id);	/*Met le cumul de l'user à zero*/
			
			$donneesdeconnectusercourant = array(
				"per_iCnx"=>0
			);
			$modif=$this->md_personnel->modifier_personnel($donneesdeconnectusercourant,$idcesper->per_id);	/*Pouvoir facturer à nouveau*/
			
			
			// $montant = $this->md_parametre->recup_montant_appro($id);
			// if($supprimer){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_approvisionnement_apr",
					// "log_sIcone"=>"suppression",
					// "log_sAction"=>"a supprimé un approvisionnement",
					// "log_sActionDetail"=>"a supprimé l\'approvisionnement de : <strong style='text-decoration:underline'>".$montant->apr_iDmd."</strong>",
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				return redirect("caisse/liste_cession");
			// }
		}
	}	
	
	
	public function validationAppro(){
		date_default_timezone_set('Africa/Brazzaville');
		
		$data = $this->input->post();
		// var_dump($data['appro']);
		
		// echo $data['id'];return;
		
		
		$idper = $this->md_parametre->recup_approvisionnement($data['id']);
		
			$donnees = array(
				"apr_iSta"=>1,
				"apr_iRep"=>$data['appro'],
				"apr_iPerVal"=>$this->session->epiphanie_diab,
				"apr_dDateVal"=>date("Y-m-d H:i:s")
			);
			$supprimer = $this->md_parametre->maj_approvisionnement($donnees,$data['id']);
			
			
				$donnees2 = array(
					"per_iCnx"=>0
				);
				$modif=$this->md_personnel->modifier_personnel($donnees2,$idper->per_id);
				
				
				
				$donneeFac = array(
					"fac_iSta"=>1,
					"pat_id"=>0,
					"per_id"=>$idper->per_id,
					"sta_iPer"=>0,
					"fac_sObjet"=>4,
					"fac_iMontantPaye"=>$data['appro'],
					"fac_iMontant"=>0,
					"fac_iMontantAss"=>0,
					"fac_iReste"=>0,
					"fac_dDatePaie"=>date("Y-m-d"),
					"fac_dDatePaieTime"=>date("Y-m-d H:i:s"),
					"ass_id"=>0,
					"fac_iSituationAss"=>0, 
					"mod_id"=>0,
					"fac_iMontantReduc"=>0,
					"tas_id"=>0
				);
				
				$insertFac = $this->md_patient->ajout_facture($donneeFac);
				
				$donnees = array(
				"apr_iFac"=>$insertFac
			);
			$majnumoperation = $this->md_parametre->maj_approvisionnement($donnees,$data['id']);
				
	}
	
	
		
	
	
	public function recupMvtCaisseCp()
	{

		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$cumulanencaispas = $this->md_patient->annule_cumul_encaisse_passation($premier, $dernier);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		$listeper = $this->md_personnel->recup_personnel_caisse3($premier, $dernier);
		if($premier == $dernier){
			$affichedate = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affichedate = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}

		$libelle = $this->md_config->typeJrnl($data["jrnal"], $data["acte"]);
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>';echo $libelle.' '.$affichedate;echo'</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
						<a title="Imprimer le journal" href="'; echo site_url("impression/mouvement_caisse_facture_cp/".$premier."/".$dernier."/".$data["acte"]."/".$data["jrnal"]); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i> Imprimer le Journal </a>
						<br>
					';
					$somtotale =0;foreach($listeper AS $lp){?>
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px;">
							<thead>	
								<tr align="center">
									<td  colspan="6"><b><?php echo $libelle;?> PAR USAGER</b></td>
								</tr>											
								<tr>
									<td align="left" colspan="6"><b style="font-weight:700"><span style="text-decoration:underline"><?php $per = $this->md_personnel->recup_personnel($lp->per_id); echo $per->per_sNom.' '.$per->per_sPrenom;?></span></b></td>
								</tr>					
								<tr align="center">
									<td><b>Ordre</b></td>
									<td><b>N°Facture(Opération)</b></td>
									<td><b>Date & Heure</b></td>
									<td><b>Type Opération</b></td>
									<td><b>Montant (<small>FCFA</small>)</b></td>
									<td><b>Actions</b></td>
								</tr>
							</thead>
							
							<?php 
								$liste = $this->md_patient->liste_mouvement_caisse_facture_cp($lp->per_id, $premier, $dernier, $data["acte"], $data["jrnal"]);
							;?>
									
							<tbody>
							<?php $somcumul=0;$cpt=1; foreach($liste AS $m){?>

								<tr align="center"  <?php if($m->fac_sObjet=="8" || $m->fac_sObjet=="6"){echo' style="background:pink"';}?><?php if($m->fac_sObjet=='2'){echo' style="display:none"';}?>>
									<td>
										<b><?php echo $cpt; ?></b>
									</td>									
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}elseif($m->fac_sObjet=="6"){echo $m->fac_id.substr($m->fac_sNumero,-8);}elseif($m->fac_sObjet=="8"){echo $m->fac_id;}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
									<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6" || $m->fac_sObjet=="8"){echo ' ('.$m->fac_sNumero.')';};?></b> 
									</td>
									<td>
										<b>
											<?php 
												if($m->fac_sObjet=="6"){
													echo number_format($m->fac_iRemise,0,",",".");
												}elseif($m->fac_sObjet=="10"){
													echo number_format($m->fac_iEx,0,",",".");
												}elseif($m->fac_sObjet=="9"){
													echo number_format($m->fac_iDef,0,",",".");
												}else{ 
													echo number_format($m->fac_iMontantPaye,0,",",".");
												} 
											;?>
										</b>
									</td>
									<td class="text-center">
										<?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){?>
											<a href="<?php echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:16px"></i></a> &nbsp;&nbsp;
											<?php if($m->fac_sObjet!="5"){?>
											<a href="<?php echo site_url("facture/detail/".$m->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:16px"></i></a>
											<?php }?>
										<?php }?>
									</td>
								</tr>
							<?php $cpt+=1; if($m->fac_iSta==1 ){if($m->fac_sObjet=="6"){$somcumul +=$m->fac_iRemise;}elseif($m->fac_sObjet=="10"){$somcumul +=$m->fac_iEx;}elseif($m->fac_sObjet=="9"){$somcumul +=$m->fac_iDef;}else{$somcumul +=$m->fac_iMontantPaye;};}}  ?>								
							<tr>
								<td align="right" colspan="4"><b style="font-weight:700">TOTAL</b></td>
								<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul,0,",","."); ?></b></td>
								<td align="right" colspan=""><b style="font-weight:700"></b></td>
							</tr>		
							
							<?php if($data["jrnal"]==0){?>
							
							<?php $annulation = $this->md_parametre->recup_liste_annulation_caissier($lp->per_id, $premier, $dernier);?>
							<?php if(!empty($annulation)){?>
								<?php foreach($annulation AS $a){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo $a->fac_sNum;?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($a->anf_dDateTime),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">ANNULATION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($a->anf_iMontant,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>					
							<?php }?>
							
							
							
							<?php $cession = $this->md_parametre->recup_liste_cession_caissier($lp->per_id, $premier, $dernier);?>
							<?php $passation = $this->md_parametre->recup_liste_passation_caissier($lp->per_id,$premier, $dernier);?>
							<?php //var_dump($cession)?>
							<?php //var_dump($passation)?>
							
							<?php if(!empty($cession) && empty($passation)){?>
								<?php  $cumulMont=0;$cumulEsp=0;$ordineCes=1;$cumulCes=0;foreach($cession AS $c){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">CESSION <?php if(count($cession) > 1){echo 'N° '.$ordineCes;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($c->ces_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>																				
						
								<?php $cumulMont+=$c->ces_iMontant;$cumulEsp+=$c->ces_iEsp;$ordineCes+=1;$cumulCes+=$c->ces_iTotal;}?>	
								<?php if(count($cession) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL CESSION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulCes,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>	
								<?php $reslt = $cumulEsp - $cumulMont;?>
								<?php if($reslt!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($reslt > 0){echo 'EXCEDENT';}elseif($reslt < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($reslt,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>																		
								<tr>
									<td align="right" colspan="4"><b style="font-weight:700">SOLDE </b></td>
									<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul + $cumulCes + $reslt,0,",","."); ?></b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
								</tr>	
							<?php }elseif(empty($cession) && !empty($passation)){?>
								<?php $cumulMont=0;$cumulEsp=0;$ordinePas=1;$cumulPas=0;foreach($passation AS $p){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($p->pas_sNum,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($p->pas_dDateTime),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">PASSATION <?php if(count($passation) > 1){echo 'N° '.$ordinePas;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($p->pas_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>						
								<?php $cumulMont+=$p->pas_iMontant;$cumulEsp+=$p->pas_iEsp;$cumulPas+=$p->pas_iTotal;$ordinePas+=1;}?>	
								<?php if(count($passation) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL PASSATION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulPas,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>	
								<?php $reslt = $cumulEsp - $cumulMont;?>
								<?php if($reslt!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($reslt > 0){echo 'EXCEDENT';}elseif($reslt < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($reslt,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>										
								<tr>
									<td align="right" colspan="4"><b style="font-weight:700">SOLDE </b></td>
									<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul + $cumulPas + $reslt,0,",","."); ?></b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
								</tr>									
							<?php }elseif(!empty($cession) && !empty($passation)){?>	

								<?php $cumulMontCes=0;$cumulEspCes=0;$ordineCes=1;$cumulCes=0; foreach($cession AS $c){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">CESSION <?php if(count($cession) > 1){echo 'N° '.$ordineCes;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($c->ces_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>																				
						
								<?php $cumulMontCes+=$c->ces_iMontant;$cumulEspCes+=$c->ces_iEsp;$ordineCes+=1;$cumulCes+=$c->ces_iTotal;}?>	
								<?php if(count($cession) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL CESSION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulCes,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>
								<?php $resltCes = $cumulEspCes - $cumulMontCes;?>
								<?php if($resltCes!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($resltCes > 0){echo 'EXCEDENT';}elseif($resltCes < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($resltCes,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>								
								
								<?php $cumulMontPas=0;$cumulEspPas=0;$ordinePas=1;$cumulPas=0;foreach($passation AS $p){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($p->pas_sNum,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo substr($this->md_config->affDateTimeFr($p->pas_dDateTime),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700">PASSATION <?php if(count($passation) > 1){echo 'N° '.$ordinePas;}?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($p->pas_iTotal,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>																										
								<?php $cumulMontPas+=$p->pas_iMontant;$cumulEspPas+=$p->pas_iEsp;$cumulPas+=$p->pas_iTotal;$ordinePas+=1;}?>	
								<?php if(count($passation) > 1){?>
									<tr>
										<td align="center" colspan="3"><b style="font-weight:700"></b></td>
										<td align="right" colspan=""><b style="font-weight:700">TOTAL PASSATION </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($cumulPas,0,",","."); ?></b></td>
										<td align="center" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>	
								<?php $resltPas = $cumulEspPas - $cumulMontPas;?>
								<?php if($resltPas!=0){?>
									<tr>
										<td align="right" colspan=""><b style="font-weight:700"> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($c->ces_sNumOperation,4);?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?> </b></td>
										<td align="right" colspan=""><b style="font-weight:700"><?php if($resltPas > 0){echo 'EXCEDENT';}elseif($resltPas < 0){echo 'DEFICIT';}?> </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($resltPas,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>
								<?php }?>								
									<tr>
										<td align="right" colspan="4"><b style="font-weight:700">SOLDE </b></td>
										<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul + $cumulCes + $cumulPas + $resltPas + $resltCes,0,",","."); ?></b></td>
										<td align="right" colspan=""><b style="font-weight:700"></b></td>
									</tr>	
							<?php }?>				
	
							<?php }?>
							
						
						<?php $somtotale +=$somcumul;}
						$recupRslt = $this->md_config->cumulPassCess($premier, $dernier);
						$tab = explode('-/-', $recupRslt);
						$montant = $this->md_patient->montant_cprincipal($premier, $dernier);

							echo '</tbody>
								<tfoot>
								<tr>
									<td align="right" colspan="4"><b style="font-weight:900">'; if($somtotale==0){echo '<em>AUCUNE DONNÉE TROUVÉE !</em>';}else{ echo 'TOTAL GENERAL:'; }  echo'</b></td>
									<td align="center" colspan=""><b style="font-weight:900">'; if($somtotale==0){echo '';}else{if($data["jrnal"]==0){$result = $somtotale - $cumulanencaispas->cumulannencaisspas;}else{$result = $somtotale;}echo number_format($result,0,",",".");} echo'</b></td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
									<td align="right" colspan=""></td>
								</tr>
								<tr>
									<td align="right" colspan="4"><b style="font-weight:900">'; echo 'TOTAL REMISE'; echo'</b></td>
									<td align="center" colspan=""><b style="font-weight:900">'; echo number_format($montant->perte + $montant->assurance,0,",","."); echo'</b></td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
									<td align="right" colspan=""></td>
								</tr>									
								';	
							if($data["jrnal"]!=0){echo '								
							
								<tr>
									<td align="right" colspan="4"><b style="font-weight:900">'; echo 'TOTAL EXCEDENT'; echo'</b></td>
									<td align="center" colspan=""><b style="font-weight:900">'; echo number_format($tab[0],0,",","."); echo'</b></td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
									<td align="right" colspan=""></td>
								</tr>								
								<td align="right" colspan="4"><b style="font-weight:900">'; echo 'TOTAL DEFICIT'; echo'</b></td>
									<td align="center" colspan=""><b style="font-weight:900">'; echo number_format($tab[1],0,",",".");  echo'</b></td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
									<td align="right" colspan=""></td>
							</tr>';};
								echo '
							</tfoot>
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


	
	
	public function recupTicket()
	{ 

		$data = $this->input->post();
		$user = $this->md_connexion->personnel_connect();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		
		if($premier == $dernier){
			$affichedate = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affichedate = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
		
		
		if($data["mvt"]==0 ){
			$liste  = $this->md_patient->liste_facture_assure_ticket($data["mvt"], $premier,$dernier);
			$lib = 'État Tickets modérateurs';
		}
		else{
			$liste  = $this->md_patient->liste_facture_assure_ticket($data["mvt"], $premier,$dernier);
			$lib = 'État Tickets modérateurs par assureur';
		}
	
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>';echo $lib.' '.$affichedate;echo' </h2>
					</div>';
					
					if($data["mvt"]==0){?>
					
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer " href="<?php echo site_url("impression/rapport_ticket/".$premier."/".$dernier."/".$data["mvt"]); ?>" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  Imprimer l'etat</a>
										</td>
										<td colspan="8"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
								<tr>
									<th>Patient</th>
									<th>Assureur</th>
									<th>Total</th>
									<th>Payé par l'assurance</th>
									<th>Payé par le patient</th>
									<th>Date Opération</th>
									<th>N° Facture</th>
									<?php if($user->flt_sLib == 'Administration' || $user->flt_sLib == 'Comptabilite'){?>
									<th class="text-center">Auteur</th>
									<?php }?>
									<th style="width:10px">Action</th>
								</tr>
								</thead>
								<tbody>
								
	
								<?php $total=0; $ass=0; $pat=0; foreach($liste AS $l){ ?>
								<tr align="center">
									<td>
										<?php echo $l->pat_sNom; ?> <?php echo $l->pat_sPrenom; ?>
									</td>
									<td>
										<?php echo $l->ass_sLibelle; ?>
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontant,0,",","."); ?></b>
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontantAss,0,",","."); ?></b>
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontantPaye,0,",","."); ?></b>
									</td>
									<td>
										<?php echo $this->md_config->affDateFrNum($l->fac_dDatePaie); ?>
									</td>									
									<td>
										<?php echo $l->fac_sNumero; ?>
									</td>	
									<?php if($user->flt_sLib == 'Administration' || $user->flt_sLib == 'Comptabilite'){?>									
									<td>
										<b><?php $pers = $this->md_personnel->recup_personnel($l->per_id); echo $pers->per_sNom.' '.$pers->per_sPrenom; ?></b>
									</td>
									<?php }?>
									<td class="text-center">
										<?php if($user->flt_sLib != 'Administration'){?>
											<a href="<?php echo site_url("impression/recu_caisse/".$l->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a> &nbsp;&nbsp;
											<a href="<?php echo site_url("facture/detail/".$l->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:20px"></i></a>
										<?php }else{?>
											<?php if((date("H:i") > '17:30') && (date("H:i") <= '23:59')){?>
												<em>Reportée</em>
											<?php }else{?>
												<?php if(is_null($l->fac_iStAnnul)){?>
													<?php if($l->fac_iSta == 1){?>
														<a onClick="return confirm('Êtes-vous sûr de vouloir annuler cette facture ?')" href="<?php echo site_url("facture/annuler_facture_assuree/".$l->fac_id);?>" class="text-danger" title="Annuler cette facture ?" ><i class="fa fa-times" style="font-size:20px"></i></a>
													<?php }else{?>	
														<a onClick="return confirm('Êtes-vous sûr de vouloir restaurer cette facture ?')" href="<?php echo site_url("facture/restaure_facture_assuree/".$l->fac_id);?>" class="text-success" title="Restaurer cette facture ?" ><i class="fa fa-history" style="font-size:20px"></i></a>
													<?php }?>
												<?php }else{?>
													<em>Aucune possible !</em>
												<?php }?>
											<?php }?>
										<?php }?>
									</td>
								</tr>
								<?php $total+=$l->fac_iMontant; $ass+=$l->fac_iMontantAss; $pat+=$l->fac_iMontantPaye;} ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="right" colspan="2"><b style="font-weight:900">CUMUL: </b></td>
									<td align="center" colspan=""><b style="font-weight:900"><?php echo number_format($total,0,",","."); ?></b></td>
									<td align="center" colspan=""><b style="font-weight:900"><?php echo number_format($ass,0,",","."); ?></b></td>
									<td align="center" colspan=""><b style="font-weight:900"><?php echo number_format($pat,0,",","."); ?></b></td>
									<td align="right" colspan="4"><b style="font-weight:700"></b></td>
								</tr>
							</tfoot>
							</table>
						</div>
					</div>
					
					<?php }else{?>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
								<tr align="">
									<td>
										<a title="Imprimer " href="<?php echo site_url("impression/rapport_ticket/".$premier."/".$dernier."/".$data["mvt"]); ?>" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  Imprimer l'etat</a>
									</td>
									<td colspan=""><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
								</tr>
								<tr align="center">
									<td>Assureur</td>
									<td>Total</td>
								</tr>
								</thead>
								<tbody>
								
								<?php $total=0; foreach($liste AS $l){ ?>
								<tr align="center">
									<td>
										<?php $ass = $this->md_parametre->recup_assureur($l->ass_id); echo $ass->ass_sLibelle; ?>
									</td>
									<td>
										<?php echo number_format($l->cumul,0,",","."); ?>
									</td>
								</tr>
								<?php $total+=$l->cumul;} ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="right" colspan=""><b style="font-weight:900">CUMUL: </b></td>
									<td align="center" colspan=""><b style="font-weight:900"><?php echo number_format($total,0,",","."); ?></b></td>
								</tr>
							</tfoot>
							</table>
						</div>
					</div>
					<?php }?>
					

				</div>
			</div>

		<script src="<?php echo base_url('assets/plugins/jquery-datatable/datatables.min.js');?>"></script><!-- Jquery DataTable Plugin Js -->
		<script src="<?php echo base_url('assets/js/pages/tables/data-table.js');?>"></script>
		<?php 

	}




	public function statCaisseServiceCp(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		$montant = $this->md_patient->montant_cprincipal($premier,$dernier);
		
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		if($premier == $dernier){
			$affiche = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affiche = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}

		$montant_service = $this->md_patient->montant_service_cprincipal($premier,$dernier);
		$depose =$montant->paye;
		
		
		$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($premier,$dernier);
		if(!is_null($diminueencaisse->diminueencaisse)){
			$resultat = number_format($depose,0,",",".").' - '.number_format(abs($diminueencaisse->diminueencaisse),0,",",".").' = '.number_format($depose + $diminueencaisse->diminueencaisse,0,",",".");
		}else{
			$resultat = number_format($depose,0,",",".");
		}
		echo '
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL GÉNÉRAL</div>
                        <div class="number">'.number_format($montant->montant,0,",",".").' <small>FCFA</small></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL ENCAISSÉ</div>
                        <div class="number">'.$resultat.' <small>FCFA</small></div>
                    </div>
                </div>
            </div>

			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL REMISE</div>
                        <div class="number">
							 '.number_format($montant->perte + $montant->assurance,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			';

			echo '
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par service ';echo $affiche;echo'</h2>
						<a title="Situation de caisse par service" href="'; echo site_url("impression/situation_caisse_parservice/".$premier."/".$dernier); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  mouvements (';echo count($montant_service);echo')</a>
					</div>
					<div class="body">
						<div class="table-responsive">
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
							<thead>
								<tr>
									<td align="left"><b>LIB. SERVICE</b></td>
									<td align="center"><b>T. GÉNÉRAL</b></td>
									<td align="center"><b>T. REMISE</b></td>
									<td align="center" align=""><b>T. ENCAISSÉ</b></td>
								</tr>
							</thead>
								<tbody>';
									$total=0;$rem=0;$encaisse=0;foreach($montant_service AS $l){ 
								echo '<tr>
										<td>'.$l->ser_sLibelle.'</td>
										<td align="center">'.number_format($l->montant,0,",",".").'</td>
										<td align="center">'.number_format($l->reduc,0,",",".").'</td>
										<td align="center">'.number_format(abs($l->montant - $l->reduc),0,",",".").'</td>
									</tr>';
									$total+=$l->montant;$rem+=$l->reduc;$encaisse+=$l->montant - $l->reduc;} 
							echo '</tbody>
							<tfoot>
								<tr>
									<td align="right" style="" colspan=""><b style="font-weight:700;text-decoration:underline"></b></td>
									<td align="center" colspan=""><b style="font-weight:700;text-decoration:underline"> '.number_format($total,0,",",".").'</b></td>
									<td align="center" colspan=""><b style="font-weight:700;text-decoration:underline"> '.number_format($rem,0,",",".").'</b></td>
									<td align="center" colspan=""><b style="font-weight:700;text-decoration:underline"> '.$resultat.'</b></td>
								</tr>								
							</tfoot>
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
	
	
	public function statCaisseParActeCp(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		if($premier == $dernier){
			$affiche = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affiche = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
		
		$montant = $this->md_patient->montant_cprincipal($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$mtAssurance = 0;
		foreach($montant_assurance AS $as){
			$mtAssurance += $as->mtAssurance;
		}
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$depose =$montant->paye;
		$acte = $this->md_patient->montant_par_acte_cprincipal($premier,$dernier); 
		
		$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($premier,$dernier);
		if(!is_null($diminueencaisse->diminueencaisse)){
			$resultat = number_format($depose,0,",",".").' - '.number_format(abs($diminueencaisse->diminueencaisse),0,",",".").' = '.number_format($depose + $diminueencaisse->diminueencaisse,0,",",".");
		}else{
			$resultat = number_format($depose,0,",",".");
		}
		echo '
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL GÉNÉRAL</div>
                        <div class="number">'.number_format($montant->montant,0,",",".").' <small>FCFA</small></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL ENCAISSÉ</div>
                        <div class="number">'.$resultat.' <small>FCFA</small></div>
                    </div>
                </div>
            </div>

			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL REMISE</div>
                        <div class="number">
							 '.number_format($montant->perte + $montant->assurance,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			';
			
			
			echo '
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par acte ';echo $affiche;echo'</h2>
						<a title="Situation de caisse par acte" href="'; echo site_url("impression/situation_caisse_paracte/".$premier."/".$dernier); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  mouvements (';echo count($acte);echo')</a>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
							<thead>
								<tr>
									<td align="left"><b>ACTE</b></td>
									<td width="20%" align="right"><b>MONTANT</b></td>
								</tr>
							</thead>
								<tbody>';
									foreach($acte AS $a){ 
								echo '<tr>
										<td>'.$a->lac_sLibelle.'</td>
										<td align="right">'.number_format($a->montant,0,",",".").'</td>
									</tr>';
									} 
							echo '</tbody>
								<tfoot>
								<tr>
									<td align="right" style="" colspan=""><b style="font-weight:700;text-decoration:underline">TOTAL GÉNÉRAL</b>:</td>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline"> '.number_format($montant->montant,0,",",".").'</b></td>
								</tr>								
								<tr>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline">TOTAL REMISE</b>:</td>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline"> '.number_format($montant->perte + $montant->assurance,0,",",".").'</b></td>
								</tr>								
								<tr>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline">TOTAL ENCAISSEMENT</b>:</td>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline"> '.$resultat.'</b></td>
								</tr>
							</tfoot>
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
	
	
	
		
	
	public function recupRapportAnnul()
	{

		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		
		if($premier == $dernier){
			$affichedate = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affichedate = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
		
		
		if($data["acte"]=="" ){
			$liste  = $this->md_patient->liste_rapport_annulation($premier,$dernier);
		}
		else{
			$liste  = $this->md_patient->liste_rapport_annulation($premier,$dernier,$data["acte"]);
		}
	
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>rapport des annulations ';echo $affichedate;echo' </h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer le rapport" href="'; echo site_url("impression/rapport_facture_annulee/".$premier."/".$dernier."/".$data["acte"]); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  rapport annulations (';echo count($liste);echo')</a>
										</td>
										<td colspan="4"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
									<tr align="center">
										<td><b>N°Facture(Opération)</b></td>
										<td><b>Date & Heure</b></td>
										<td><b>Type Opération</b></td>
										<td><b>Montant (<small>FCFA</small>)</b></td>
										<td><b>Effectuée par:</b></td>
									</tr>
								</thead>
								<tbody>';
								
	
								$somcumul = 0;foreach($liste AS $m){ ?>
								<tr align="center">
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}elseif($m->fac_sObjet=="6"){echo $m->fac_id.substr($m->fac_sNumero,-8);}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
										<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6"){echo ' ('.$m->fac_sNumero.')';};?></b> 
									</td>
									<td>
										<b><?php if($m->fac_sObjet=="6"){echo number_format(abs($m->fac_iRemise),0,",",".");}else{ echo number_format($m->fac_iMontantPaye,0,",",".");}; ?></b>
									</td>									
									<td>
										<b><?php $pers = $this->md_personnel->recup_personnel($m->per_id); echo $pers->per_sNom.' '.$pers->per_sPrenom; ?></b>
									</td>
								</tr>
									<?php if($m->fac_sObjet=="6"){$somcumul +=abs($m->fac_iRemise);}else{$somcumul +=$m->fac_iMontantPaye;};}
							echo '</tbody>
								<tfoot>
								<tr>
									<td align="right" colspan="3"><b style="font-weight:900">TOTAL: </b></td>
									<td align="center" colspan=""><b style="font-weight:900">'; echo number_format($somcumul,0,",","."); echo'</b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
								</tr>
							</tfoot>
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
	
	
	
	
	public function statRemiseCaisseCp()
	{

		$data = $this->input->post();
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		$montant = $this->md_patient->montant_cprincipal($premier,$dernier);
		$montant_service = $this->md_patient->montant_service_cprincipal($premier,$dernier);
		$depose =$montant->paye;
		
		$remises = $this->md_patient->liste_remise($premier,$dernier);
		
		
		if($premier == $dernier){
			$affichedate = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affichedate = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
		
		echo '	
		
		    <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL GÉNÉRAL</div>
                        <div class="number">
							';echo number_format($montant->montant,0,",",".");echo' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>	

			
		    <div class="col-lg-4 col-md-4 col-sm-6">
				<div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL ENCAISSÉ</div>
                        <div class="number">
							';echo number_format($depose,0,",",".");echo' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL REMISE</div>
                        <div class="number">
							';echo number_format($montant->perte + $montant->assurance,0,",",".");echo' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Etat des remises ';echo $affichedate;echo'</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer l\'état des rémises" href="'; echo site_url("impression/etat_remise_cp/".$premier."/".$dernier); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i> Imprimer </a>
										</td>
										<td colspan="7"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
									<tr align="center">
										<td><b>Libellé Service</b></td>
										<td width="" align=""><b>N°Facture</b></td>
										<td width="" align=""><b>Date Opération</b></td>
										<td width="" align=""><b>Patient</b></td>
										<td width="" align=""><b>Montant</b></td>
										<td width="" align=""><b>Remise</b></td>
										<td width="" align=""><b>Encaissé</b></td>
										<td width="" align=""><b>Auteur</b></td>
									</tr>
								</thead>
								<tbody>';
								
								// var_dump($liste);
								
								// return;
								$total=0;$encaisse=0;$rem=0;foreach($remises AS $r){ ?>
								<tr>
									<td align="center">
										<b><?php echo $r->ser_sLibelle; ?></b> 
									</td>									
									<td align="center">
										<b><?php echo $r->fac_sNumero; ?></b> 
									</td>									
									<td align="center">
										<b><?php echo substr($this->md_config->affDateTimeFr($r->fac_dDatePaieTime),2); ?></b> 
									</td>
									<td  align="center">
										<b><?php $pat = $this->md_patient->recup_patient($r->pat_id); echo $pat->pat_sNom.' '.$pat->pat_sPrenom; ?></b>
									</td>	
									<td  align="center">
										<b><?php echo number_format($r->fac_iMontant,0,",","."); ?></b>
									</td>										
									<td  align="center">
										<b><?php echo number_format($r->fac_iMontant - $r->fac_iMontantPaye,0,",","."); ?></b>
									</td>								
									<td  align="center">
										<b><?php echo number_format($r->fac_iMontantPaye,0,",","."); ?></b>
									</td>									
									<td  align="center">
										<b><?php $fac = $this->md_patient->recup_facture($r->fac_id); $per = $this->md_personnel->recup_personnel($fac->per_id); echo $per->per_sNom.' '.$per->per_sPrenom; ?></b>
									</td>
								</tr>
									<?php $total+=$r->fac_iMontant;$encaisse+=$r->fac_iMontantPaye;$rem+=$r->fac_iMontant - $r->fac_iMontantPaye;}
							echo '</tbody>
								<tfoot>
								<tr>
									<td align="center">
										 
									</td>									
									<td align="center">
										 
									</td>									
									<td align="center">
										 
									</td>									
									<td align="center">
										 <b>Total Général</b>
									</td>										
									<td align="center">
										 <b>'; echo number_format($total,0,",","."); echo'</b>
									</td>										
									<td align="center">
										 <b>'; echo number_format($rem,0,",","."); echo'</b>
									</td>										
									<td align="center">
										 <b>'; echo number_format($encaisse,0,",","."); echo'</b>
									</td>										
									<td align="center">
										 
									</td>									
								</tr>
							</tfoot>
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
	
	
	
	
	
	public function statCaisseParTypeCp()
	{

		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);

		if($premier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$premier = date('Y-m-d');
		}
		
		if($dernier > date('Y-m-d')){/*limitation de la plage de recherche à la date du jour*/
			$dernier = date('Y-m-d');
		}
		
		if($premier > $dernier){
			$aux = '';
			$aux = $dernier;
			$dernier = $premier;
			$premier = $aux;
		}
		
		if($premier == $dernier){
			$affichedate = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affichedate = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
		
		$montant = $this->md_patient->montant_cprincipal($premier,$dernier);
		$montant_assurance = $this->md_patient->montant_assurance($premier,$dernier,0);
		$mtAssurance = 0;
		foreach($montant_assurance AS $as){
			$mtAssurance += $as->mtAssurance;
		}
		$montant_patient = $this->md_patient->montant_patient($premier,$dernier);
		$depose =$montant->paye;
		
		$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($premier,$dernier);
		if(!is_null($diminueencaisse->diminueencaisse)){
			$resultat = number_format($depose,0,",",".").' - '.number_format(abs($diminueencaisse->diminueencaisse),0,",",".").' = '.number_format($depose + $diminueencaisse->diminueencaisse,0,",",".");
		}else{
			$resultat = number_format($depose,0,",",".");
		}
		
		$qpt = $this->md_patient->quotes_parts($premier, $dernier);
	
			echo '
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL GÉNÉRAL</div>
                        <div class="number">'.number_format($montant->montant,0,",",".").' <small>FCFA</small></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL ENCAISSÉ</div>
                        <div class="number">'.$resultat.' <small>FCFA</small></div>
                    </div>
                </div>
            </div>

			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL REMISE</div>
                        <div class="number">
							 '.number_format($montant->perte + $montant->assurance,0,",",".").' <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			';
	
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>finances de quotes-parts ';echo $affichedate;echo'</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer" href="'; echo site_url("impression/situation_caisse_partype/".$premier."/".$dernier); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i> imprimer l\' etat</a>
										</td>
										<td colspan="8"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
									<tr align="center">
									  <td  style="vertical-align:middle" rowspan="2"><b>LIB. SERVICE</b></td>
									  <td  style="vertical-align:middle" rowspan="2"><b>T. GÉNÉRAL</b></td>
									  <td colspan="3"><b>PART SER.</b></td>
									  <td colspan="3"><b>PART ADM.</b></td>
									</tr>					 
									
									<tr>
									  <td><b>CONSULTATIONS</b></td>
									  <td><b>AUTRES ACTES</b></td>
									  <td><b>TOTAL</b></td>						  
									  
									  <td><b>CONSULTATIONS</b></td>
									  <td><b>AUTRES ACTES</b></td>
									  <td><b>TOTAL</b></td>	
									</tr>
								</thead>
								<tbody>';
								
								// var_dump($liste);
								
								// return;
								 $adm=0;$ser=0; $admCsl=0;$serCsl=0; foreach($qpt AS $q){ ?>
								<?php $rcupSer = $this->md_parametre->recup_service($q->ser_id);?>
								 <tr align="center">
									  <td align="center"><b><?php echo $rcupSer->ser_sLibelle; ?></b></td>
									  <td><b><?php echo number_format($q->admin + $q->service + $q->adminCsl + $q->serviceCsl,0,",","."); ?></b></td>
									  
									  <td><b><?php echo number_format($q->serviceCsl,0,",","."); ?></b></td>
									  <td><b><?php echo number_format($q->service,0,",","."); ?></b></td>
									  <td><b><?php echo number_format($q->service + $q->serviceCsl,0,",","."); ?></b></td>						 

									  <td><b><?php echo number_format($q->adminCsl,0,",","."); ?></b></td>
									  <td><b><?php echo number_format($q->admin,0,",","."); ?></b></td>
									  <td><b><?php echo number_format($q->admin + $q->adminCsl,0,",","."); ?></b></td>
								 </tr>
								<?php $adm+=$q->admin;$ser+=$q->service;$admCsl+=$q->adminCsl;$serCsl+=$q->serviceCsl;} ?>
						
						
						<?php 
							echo '</tbody>
							<tfoot>								
								<tr>
									<td width="25%" align="center">
										<b></b>
									</td>										
									<td width="25%" align="center">
										<b>';echo number_format($adm + $ser + $admCsl + $serCsl,0,",",".");  echo'</b>
									</td>			
									<td width="25%" align="center">
										<b>'; echo number_format($serCsl,0,",","."); echo'</b>
									</td>											
									<td width="25%" align="center">
										<b>'; echo number_format($ser,0,",",".");  echo'</b>
									</td>										
									
									<td width="25%" align="center">
										<b>'; echo number_format($serCsl + $ser,0,",",".");  echo'</b>
									</td>										
									<td width="25%" align="center">
										<b>'; echo number_format($admCsl,0,",",".");  echo'</b>
									</td>										
									<td width="25%" align="center">
										<b>'; echo number_format($adm,0,",",".");  echo'</b>
									</td>										
									<td width="25%" align="center">
										<b>'; echo number_format($admCsl + $adm,0,",",".");  echo'</b>
									</td>																							
								</tr>
								</tr>												
							</tfoot>
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
	
	
	public function recupJrnal()
	{

		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		$listeper = $this->md_personnel->recup_personnel_caisse3($premier, $dernier);
		if($premier == $dernier){
			$affichedate = 'DU '.$this->md_config->affDateFrNum($dernier);
		}else{
			$affichedate = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);
		}
	
		echo '	
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>releve encaissement ';echo $affichedate;echo'</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
								<thead>
									<tr align="center">
										<td>
											<a title="Imprimer le relevé encaissement" href="'; echo site_url("impression/journal_encaissement_facture_cp/".$premier."/".$dernier."/".$data["acte"]); echo'" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i> releve encaissement</a>
										</td>
										<td colspan="4"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
									</tr>
									<tr align="center">
										<td><b>N°Facture(Opération)</b></td>
										<td><b>Date & Heure</b></td>
										<td><b>Type Opération</b></td>
										<td><b>Montant (<small>FCFA</small>)</b></td>
										<td><b>Actions</b></td>
									</tr>
								</thead>
								<tbody>';
								
								// var_dump($liste);
								
								// return;
						$somtotale =0;foreach($listeper AS $lp){?>
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px;height:300px">
							<thead>	
								<tr align="center">
									<td  colspan="5"><b>JOURNAL D'ENCAISSEMENT PAR USAGER</b></td>
								</tr>											
								<tr>
									<td align="left" colspan="5"><b style="font-weight:700"><span style="text-decoration:underline"><?php $per = $this->md_personnel->recup_personnel($lp->per_id); echo $per->per_sNom.' '.$per->per_sPrenom;?></span></b></td>
								</tr>					
								<tr align="center">
									<td><b>N°Facture(Opération)</b></td>
									<td><b>Date & Heure</b></td>
									<td><b>Type Opération</b></td>
									<td><b>Montant(<small>FCFA</small>)</b></td>
									<td><b>Actions</b></td>
								</tr>
							</thead>
							
							<?php 
							if($data["acte"]==NULL){
								$liste = $this->md_patient->journal_encaissement($lp->per_id, $premier, $dernier,$data["acte"]=false);
							}else{
								$liste = $this->md_patient->journal_encaissement($lp->per_id, $premier, $dernier,$data["acte"]);
							}
							;?>
									
							
							<tbody>
							<?php $somcumul=0; foreach($liste AS $m){?>

								<tr align="center" <?php if($m->fac_iSta==2){echo' style="background:pink"';}?>>
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
							<b><?php if($m->fac_iSta==2){echo'ANNULATION';}else{echo $this->md_config->objetFacture($m->fac_sObjet);}; ?></b> 
									</td>
									<td>
										<b><?php echo number_format($m->fac_iMontantPaye,0,",","."); ?></b>
									</td>
									<?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){?>
									<td class="text-center">
										<a href="<?php echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:16px"></i></a> &nbsp;&nbsp;
										<?php if($m->fac_sObjet!="5"){?>
										<a href="<?php echo site_url("facture/detail/".$m->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:16px"></i></a>
										<?php }?>
									</td>
									<?php }?>
								</tr>
							<?php if($m->fac_iSta==1){$somcumul = $somcumul +$m->fac_iMontantPaye ;}}  ?>								
							<tr>
								<td align="right" colspan="5"><b style="font-weight:700">TOTAL: <?php echo number_format($somcumul,0,",","."); ?></b></td>
							</tr>	
							
						
						<?php $somtotale +=$somcumul;}
							echo '</tbody>
								<tfoot>
								<tr>
									<td align="right" colspan="5"><b style="font-weight:700">TOTAL GENERAL: '; echo number_format($somtotale,0,",","."); echo'</b></td>
								</tr>
							</tfoot>
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
	
	
	
	public function recupResultSearch()
	{

		$data = $this->input->post();
		//var_dump($data);
// echo $data["facRsq"];
// return;
		
			if($data["type"]==""){$data["type"]=NULL;}
			if($data["dec"]==""){$data["dec"]=NULL;}
			if($data["alcool"]==""){$data["alcool"]=NULL;}
			if($data["tabac"]==""){$data["tabac"]=NULL;}
			if($data["obs"]==""){$data["obs"]=0;}
			if($data["dys"]==""){$data["dys"]=0;}
			if($data["cardi"]==""){$data["cardi"]=0;}
			if($data["hta"]==""){$data["hta"]=0;}
			if($data["echo"]==""){$data["echo"]=0;}
			if($data["avc"]==""){$data["avc"]=0;}
			if($data["reti"]==""){$data["reti"]=NULL;}
			if($data["nephro"]==""){$data["nephro"]=0;}
			if($data["neuro"]==""){$data["neuro"]=0;}
			$liste = $this->md_patient->searchPatientDiab($data["dec"], $data["type"],$data["alcool"],
			$data["tabac"],$data["obs"],$data["dys"],$data["cardi"],$data["hta"],$data["echo"],$data["avc"]
			,$data["reti"],$data["nephro"],$data["neuro"]);
		
		{?>

			<?php //var_dump($liste);?>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Resultat de la recherche (<?php echo count($liste);?>)</h2>
						<?php if(count($liste)!=0){?>
						<br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
						<?php }?>
					</div>
					<div class="body table-responsive" style="overflow:auto;height:500px"> 
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th style="width:15%">N° Matricule</th>
									<th>Photo</th>
									<th style="width:20%">Nom complet</th>
									<!--<th style="width:90px">Age</th>-->
									<th>Tél. 1</th>
									<th>Tél. 2</th>
									<th>Adresse</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
							<tbody id="patient_table">
							<?php if(empty($liste)){echo '<tr><td colspan="7"><em>Aucun résultat trouvé !</em></td></tr>';}else{ foreach($liste AS $pat){?>
							<?php $l = $this->md_patient->recup_patient($pat->pat_id);?>
								<tr>
									<td><?php echo $l->pat_sMatricule; ?></td>
									<td><a href="#" class="p-profile-pix"><img src="<?php echo base_url($l->pat_sAvatar); ?>" width="40" height="40" alt="user" class="img-thumbnail img-fluid"></a></td>
									<td><a href="<?php echo site_url("patient/voir/".$l->pat_id); ?>"><?php echo $l->pat_sNom.' '.$l->pat_sPrenom; ?> </a> </td>
									<!--<td><?php //$ageAnnee= $this->md_config->ageAnnee($l->pat_dDateNaiss); if($ageAnnee>1){echo $ageAnnee." ans";}else if($ageAnnee ==1){echo $ageAnnee." an";}else{echo $this->md_config->ageMois($l->pat_dDateNaiss)." mois";} ?></td>-->
									<td><?php if(!is_null($l->pat_sTel)){echo $l->pat_sTel;}else{echo "<i>Non renseigné</i>";} ?></td>
									<td><?php if(!is_null($l->pat_sOtherPhone)){echo $l->pat_sOtherPhone;}else{echo "<i>Non renseigné</i>";} ?></td>
									<td><?php if(!is_null($l->pat_sAdresse)){echo $l->pat_sAdresse;}else{echo "<i>Non renseignée</i>";} ?></td>
									<td>
										<a href="<?php echo site_url("diabetologie/donnee_clinique/".$l->pat_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Effectuer</a>
									</td>
								</tr>
							<?php }} ?>
							</tbody>
						</table>
					</div>
				</div>
            </div>

		<?php }

	}
	
}
