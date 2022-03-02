<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratoire extends CI_Controller {

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
	 
	 
	 
	public function sortie_reactif()
	{
		$this->load->view('app/laboratoire/page-sortie-reactif');
	}
	
	public function destock_reactif()
	{
		$this->load->view('app/laboratoire/page-destock-reactif');
	}	
	
	public function stock_reactif()
	{
		$this->load->view('app/laboratoire/page-stock-reactif');
	}		
	
	public function historique_reactif()
	{
		$this->load->view('app/laboratoire/page-historique-reactif');
	}	
	
	public function entree_reactif()
	{
		$this->load->view('app/laboratoire/page-entree-reactif');
	}		
	
	
	
	public function liste_sortie_accessoire()
	{
		$this->load->view('app/laboratoire/liste-sortie-accessoire');
	}	
	
	public function sortir_accessoire($id)
	{
		$this->load->view('app/laboratoire/page-sortir-accessoire',array("sac_id"=>$id));
	}
	 
	public function stock_accessoires()
	{
		$this->load->view('app/laboratoire/page-accessoire-enstock');
	}		
	
	public function entree_accessoire()
	{
		$this->load->view('app/laboratoire/page-entree-accessoire');
	}		
	
	public function stock_accessoire()
	{
		$this->load->view('app/laboratoire/page-stock-accessoire');
	}	
	
	
	public function prevelements()
	{
		$this->load->view('app/laboratoire/page-laboratoire-prevelements');
	}		
	
	public function examens()
	{
		$this->load->view('app/laboratoire/page-laboratoire-examens');
	}	
		
	public function examens_faits()
	{
		$this->load->view('app/laboratoire/page-laboratoire-examens-faits');
	}	
	
	
	public function prelevement_tube($id)
	{
		// echo $id;
		$donnees = array('ala_iSta'=>2);
		$update = $this->md_laboratoire->maj_ala($donnees,$id);
		$recup = $this->md_patient->acm_laboratoire_unique($id);
		$element = $this->md_parametre->element_analyse_examen_actifs($recup->lac_id);
		//var_dump(count($element));
		//var_dump($element);
		foreach($element AS $e){
			$code = $this->md_config->genereCodeBarre("L","laboratoire","examen-".$e->ela_sLibelle);
			$valeurBarre = explode("--//--",$code);
			$dataTube = array(
				"tan_iSta"=>1,
				"ala_id"=>$id,
				"tan_sNum"=>$valeurBarre[0],
				"tan_sImg"=>$valeurBarre[1],
				"tan_iPerNumero"=>$this->session->epiphanie_diab,
				"ela_id"=>$e->ela_id
			);
			$insert = $this->md_laboratoire->numero_tube($dataTube);
		}
		return redirect("laboratoire/prevelements");
	}
	
	
	
	public function remettre_reactif($id)
	{
		$recup = $this->md_parametre->recup_sorties_reactif($id);
		$donnees = array(
			"res_dDateRetour"=>date("Y-m-d"),
			"sor_iSta"=>2
		);
		$this->md_parametre->maj_sortie($donnees,$recup->res_id);
		
		
		
		if($recup->res_iNb >1){
			
			$donneesD = array(
				"res_iSta"=>1
			);
		
		}else{
			$donneesD = array(
				"res_iSta"=>2
			);

		}
		
		$update = $this->md_parametre->destock_reactif($donneesD,$recup->res_id);
		return redirect("laboratoire/sortie_reactif");
	}
	
	public function ajoutCompteRendu(){
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/images/exploration/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx|gif';
		$nomImage= time()."-".$_FILES["image"]["name"];
		$config["file_name"] = $nomImage; 
		$this->load->library('upload',$config);
		if($this->upload->do_upload("image")){
			$image=$this->upload->data();
			$photo="assets/images/exploration/".$image['file_name'];
		}
		else{
			$photo=NULL;
		}
	
		$donnees = array(
			"aef_sCompteRendu"=>trim($data["compte"]),
			"aef_dDate"=>date("Y-m-d H:i:s"),
			"aef_iPer"=>$data["idPer"],
			"aef_sImage"=>$photo,
			"aef_iSta"=>2
		);
		
		$update = $this->md_patient->maj_acte_medical_exploration($donnees,$data["id"]);
		echo "ok";
	}
	
	
	public function majPrescription(){
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/images/laboratoire/prescription/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx|gif';
		$nomImage= time()."-".$_FILES["prescrip"]["name"];
		$config["file_name"] = $nomImage; 
		$this->load->library('upload',$config);
		if($this->upload->do_upload("prescrip")){
			$image=$this->upload->data();
			$photo="assets/images/laboratoire/prescription/".$image['file_name'];
		}
		else{
			$photo=NULL;
		}
		
		if(trim($data["prenom"])==""){
			$data["prenom"]=NULL;
		}
		else{
			$data["prenom"]=ucwords($data["prenom"]);
		}
		if($data["titre"]==""){
			$data["titre"]=NULL;
		}
	
		$donnees = array(
			'ala_sPrescription'=>$photo,
			"ala_sNom"=>strtoupper($data["nom"]),
			"ala_sPrenom"=>$data["prenom"],
			"ala_sTitre"=>$data["titre"]
		);
		$update = $this->md_laboratoire->maj_ala($donnees,$data['id']);
		echo "ok";
	}
	
		/*********** accessoire  ***************************/
			
			
	public function entreeAccessoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("pharmacie/entree_stock");
		}
		else{
		for($i=0;$i<count($data['dep']) AND $i<count($data['lib']) AND $i<count($data['seuil']);$i++){
			$verif = $this->md_laboratoire->verif_entree_accessoire(trim($data['dep'][$i]));
			$donnees = array(
				"eac_iQte"=>ucfirst(trim($data['lib'][$i])),
				"acc_id"=>$data['dep'][$i],
				"eac_dDateEntree"=>date("Y-m-d H:i:s"),
				"eac_iSta"=>1
			);
			$insert = $this->md_laboratoire->entree_accessoire($donnees);
			if(!$verif){
				$donneesDetails = array(
					"acc_id"=>$data['dep'][$i],
					"sac_iSta"=>1,
					"sac_iQte"=>trim($data['lib'][$i]),
					"sac_iSeuil"=>trim($data['seuil'][$i])
				);
				$insertDetail = $this->md_laboratoire->entree_stock_accessoire($donneesDetails);				
			}
			else{
				$donnees = array(
					"sac_iQte"=>$data['lib'][$i]+$verif->sac_iQte,
					"sac_iSta"=>1,
					"sac_iSeuil"=>trim($data['seuil'][$i])
				);
				$update = $this->md_laboratoire->maj_entree_accessoire($donnees,$verif->sac_id);
			}
		}
	
	}		
	}		
			
	public function sortirAccessoire()
	{
		date_default_timezone_set('Africa/Brazzaville');
		
		$data = $this->input->post();
		
			$recup = $this->md_laboratoire->recup_accessoire($data['id']);
			$qte = $recup->sac_iQte - $data['qte'];
		
			if($qte < 0){
			echo 'La quantité saisie est supérieure à la quantité en stock';}else{
			$donnees = array(
				"acs_iSta"=>1,
				"per_iAutorisant"=>$this->session->epiphanie_diab,
				"per_iBenef"=>$data['benef'],
				"acs_iQte"=>$data['qte'],
				"sac_id"=>$data['id'],
				"acs_dDateSorti"=>$this->md_config->recupDateTime($data['date'])
			);
			$insert = $this->md_laboratoire->sortir_accessoire($donnees);
			
			if($insert){
				$recup = $this->md_laboratoire->recup_accessoire($data['id']);
				$qte = $recup->sac_iQte - $data['qte'];
				
				$donn = array(
					"sac_iQte"=>$qte
					);
				
				$updat = $this->md_laboratoire->maj_sortir_accessoire($donn, $recup->sac_id);
			}
			}
	}
	
	public function entreeReac()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("pharmacie/entree_stock");
		}
		else{
			for($j=0; $j<count($data['dep']) AND $j<count($data['qte']) AND $j<count($data['seuil']);$j++){
				$verif = $this->md_parametre->verif_entree_reactif($data['dep'][$j]);
				if(!$verif){
					$donnees = array(
					"ere_iSta"=>1,
					"rea_id"=>$data['dep'][$j],
					"ere_iQte"=>trim($data['qte'][$j]),
					"ere_iSeuil"=>trim($data['seuil'][$j]),
					"ere_dDate"=>date("Y-m-d")
					);
					$insert = $this->md_parametre->entree_stock_reactif($donnees);
					
					if($insert){
						$donneesDetails = array(
							"ere_id"=>$insert->ere_id,
							"hre_iQte"=>trim($data['qte'][$j]),
							"hre_dDateEntree"=>date("Y-m-d")
						);
						$insertDetail = $this->md_parametre->entree_detail_stock($donneesDetails);
						
						if($insertDetail){
							$recup = $this->md_parametre->recup_reactif_actifs($data['dep'][$j]);
							for($i=0;$i<$data['qte'][$j];$i++){
								$code = $this->md_config->genereCodeBarre("REA","reactif",$insert->rea_sLibelle);
								$valeurBarre = explode("--//--",$code);
								$donneesProd = array(
									"ere_id"=>$insert->ere_id,
									"res_iSta "=>1,
									"res_sCode"=>$valeurBarre[0],
									"res_iNb"=>$recup->rea_iNb,
									"res_sImg"=>$valeurBarre[1]
								);
								
								$this->md_parametre->ajout_entree_reactif($donneesProd);
							}
							
							// $log = array(
								// "log_iSta"=>0,
								// "per_id"=>$this->session->epiphanie_diab,
								// "log_sTable"=>"t_achats_ach",
								// "log_sIcone"=>"nouveau membre",
								// "log_sAction"=>"a effectué une nouvelle entrée",
								// "log_sActionDetail"=>"quantité entrée : <strong style='text-decoration:underline'>".ucfirst(trim($data['qte']))."</strong>",
								// "log_dDate"=>date("Y-m-d H:i:s")
							// );
							// $this->md_connexion->rapport($log);		
						}
					}				
						
				}
				else{
					$donnees = array(
						"ere_iQte"=>trim($data['qte'][$j])+$verif->ere_iQte,
						"ere_iSeuil"=>trim($data['seuil'][$j])
					);
					$update = $this->md_parametre->maj_entree_stock_reactif($donnees,$verif->ere_id);
					
					if($update){
						$donneesDetails = array(
							"ere_id"=>$verif->ere_id,
							"hre_iQte"=>trim($data['qte'][$j]),
							"hre_dDateEntree"=>date("Y-m-d")
						);
						$insertDetail = $this->md_parametre->entree_detail_stock($donneesDetails);
						
						if($insertDetail){
							$recup = $this->md_parametre->recup_reactif_actifs($data['dep'][$j]);
							for($i=0;$i<$data['qte'][$j];$i++){
								$code = $this->md_config->genereCodeBarre("REA","reactif",$verif->rea_sLibelle);
								$valeurBarre = explode("--//--",$code);
								$donneesProd = array(
									"ere_id"=>$verif->ere_id,
									"res_iSta "=>1,
									"res_sCode"=>$valeurBarre[0],
									"res_iNb"=>$recup->rea_iNb,
									"res_sImg"=>$valeurBarre[1]
									
								);
								
								$this->md_parametre->ajout_entree_reactif($donneesProd);
							}
							
							// $log = array(
								// "log_iSta"=>0,
								// "per_id"=>$this->session->epiphanie_diab,
								// "log_sTable"=>"t_achats_ach",
								// "log_sIcone"=>"nouveau membre",
								// "log_sAction"=>"a effectué une nouvelle entrée",
								// "log_sActionDetail"=>"quantité entrée : <strong style='text-decoration:underline'>".ucfirst(trim($data['qte']))."</strong>",
								// "log_dDate"=>date("Y-m-d H:i:s")
							// );
							// $this->md_connexion->rapport($log);		
						}
					}
				}
			}		
		}		
	}

	
	
	public function destockageReactif()
	{
		date_default_timezone_set('Africa/Brazzaville');
		
		$data = $this->input->post();
		for($i=0;$i<count($data['ere']) AND $i<count($data['id']);$i++){
			$donnees = array(
				"res_sMotif"=>$data['motif'],
				"res_iSta"=>2,
				"res_dDateDestockage"=>date("Y-m-d")
			);
			$update = $this->md_parametre->destock_reactif($donnees,$data['id'][$i]);
			
			if($update){
				$recup = $this->md_parametre->reactif_en_stock($data['ere'][$i]);
				$qte = $recup->ere_iQte - 1;
				
				$donn = array(
					"ere_iQte"=>$qte
				);
				
				$updat = $this->md_parametre->maj_entree_stock_reactif($donn, $recup->ere_id);
			}
		}
	}
	
	public function ensembleSortie()
	{
		date_default_timezone_set('Africa/Brazzaville');
		
		$data = $this->input->post();
		echo '
					<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					   
						<thead>
							<tr>
								<th>Réactif</th>
								<th>Code à barre</th>
								<th>Bénéficiaire</th>
								<th>Appareil</th>
							</tr>
						</thead>
					   
						<tbody>';
				$l = $this->md_parametre->liste_stock_reactif_selection($data['id']);
				$per = $this->md_personnel->nb_complete_personnel_servive(7);
				$appareil = $this->md_parametre->liste_appareils_actifs();
				echo '<tr>	
						
						<td>
							'.$l->rea_sLibelle.'
						</td>
						<td>
							<input type="hidden" name="idRes" value="'.$l->res_id.'"/>
							'.$l->res_sCode.'
						</td>									
															
						<td>
							<select class="obligatoire" name="per" ><option value="">--- Choisissiez la personne qui rétire ---</option>';
							
							foreach($per AS $p){
								echo '<option value="'.$p->per_id.'">'.$p->per_sNom.' '.$p->per_sPrenom.' ('.$p->per_sMatricule.')</option>';
							}
					  echo '</select>
						</td>						
						<td>
							<select class="obligatoire" name="app" ><option value="">--- Sélectionnez ---</option>';
							
							foreach($appareil AS $app){
								echo '<option value="'.$app->app_id.'">'.$app->app_sLibelle.'</option>';
							}
					  echo '</select>
						</td>
					</tr>';
		echo '</tbody>
			</table>';
	}
	
	
	
	public function sortieReactif()
	{
		date_default_timezone_set('Africa/Brazzaville');
		
		$data = $this->input->post();
		$res = $this->md_parametre->liste_stock_reactif_selection($data['idRes']);
		$sta=2;
		$motif="a atteint la limite d'utilisation";
		$date=date("Y-m-d");
		$recup = $this->md_parametre->reactif_en_stock($res->ere_id);
		$qte = $recup->ere_iQte - 1;
		$donn = array(
			"ere_iQte"=>$qte
		);
		
		$updat = $this->md_parametre->maj_entree_stock_reactif($donn, $recup->ere_id);
		
		$donneesD = array(
			"res_sMotif"=>$motif,
			"res_iSta"=>$sta,
			"res_dDateDestockage"=>$date
		);
		$update = $this->md_parametre->destock_reactif($donneesD,$data['idRes']);
		
		if($update){
			$donnees = array(
				"sor_iSta"=>1,
				"res_id"=>$data['idRes'],
				"res_iDon"=>$this->session->epiphanie_diab,
				"res_iDest"=>$data['per'],
				"app_id"=>$data['app'],
				"res_dDateSortie"=>date("Y-m-d")
			);
			$insert = $this->md_parametre->sortie_reactif($donnees);
		}
		
	}
	
	
	public function ajoutRapport()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$recup = $this->md_laboratoire->recup_type_analyse($data["id"]);
			// var_dump($recup);
			$recupNombreSta = $this->md_laboratoire->recup_nombre_statut($recup->ala_id);
			// echo $recupNombreSta->nb;
			if($recupNombreSta->nb <= 1){
			
				$donnees = array('ala_iSta'=>3);
				$update = $this->md_laboratoire->maj_ala($donnees,$recup->ala_id);
			}
			$donneesRapport = array(
				"tan_iSta"=>3,
				"tan_iValeur "=>$data["valeur"],
				"tan_sRapport"=>trim($data["contenu"]),
				"tan_iPerRapport"=>$this->session->epiphanie_diab,
				"tan_dDateRapport"=>date("Y-m-d")
			);
			
			$insert_rapport = $this->md_laboratoire->ajout_laboratoire_rapport($donneesRapport,$data["id"]);
			// if($insert_rapport){
				// $client = $this->md_pharmacie->recup_client($data["client"]);
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_bon_pharmacie_bph",
					// "log_sIcone"=>"nouveau membre",
					// "log_sAction"=>"a ajouté un bon de pharmacie pour le client : ".$client->clt_sNom." ".$client->clt_sPrenom." pour le bon de pharmacie ".$insert_bon->bph_iMontant,
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				
				// echo "ok";
			// }
							
		}
	}
	
	public function recupRapportLaboratoire(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$listeActeLabo = $this->md_parametre->liste_acts_laboratoires_actifs();
		
		echo '
			<<div class="col-lg-6 col-md-6 col-sm-6" style="height:auto">
                <div class="info-box-4 hover-zoom-effect" style="height:auto; width:100%">
                    <div class="content">
                        <div class="text">Nombre d\'examens réalisés </div>';
						foreach($listeActeLabo AS $r){
							$nb=$this->md_laboratoire->recup_rapport_laboratoire($r->lac_id,$premier,$dernier);
							echo '<div class="text">'.$r->lac_sLibelle.'  -> <span class="pull-right">'.$nb->nb.'</span></div>';
						}
                   echo '</div>
                </div>
            </div>';			
			
			// <div class="col-lg-6 col-md-6 col-sm-6">
                // <div class="info-box-4 hover-zoom-effect">
                    // <div class="icon"> </div>
                    // <div class="content">
                        // <div class="text">Nombre d\'élements distribués par réactif</div>';
						// foreach($listeActeLabo AS $r){
							// $nbEx = $this->md_laboratoire->recup_nombre_element($r->lac_id,$premier,$dernier);
							// echo '<div class="number"><small>'.$r->lac_sLibelle.' '.$nbEx->nb.'</small></div>';
						// }
                   // echo '</div>
                // </div>
            // </div>
		// ';
		
		echo '<script src="'.base_url('assets/js/pages/ui/modals.js').'"></script>';
	}	
	
	
	
	public function recupStatPharmacie(){
		$data = $this->input->post();
		
		$premier = $this->md_config->recupDateTime($data["premierJour"]);
		$dernier = $this->md_config->recupDateTime($data["dernierJour"]);
		
		$vfvs = $this->md_pharmacie->valeur_financiere_vente($premier, $dernier);
		$vfas = $this->md_pharmacie->valuer_financiere_achat_stock_1($premier, $dernier);
		$sqs = $this->md_pharmacie->somme_quantite_stock_1($premier, $dernier);
		if($vfvs->total==null){$vv = 0;}else{$vv = number_format($vfvs->total,2,",",".");};
		if($vfas->total==null){$va = 0;}else{$va = number_format($vfas->total,2,",",".");};
		if($sqs->total==null){$total = 0;}else{$total = $sqs->total;};
		$diff = number_format($vfvs->total - $vfas->total,2,",",".");
		
		
			echo'<div class="col-lg-2 col-md-2 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Total produit en stock</div>
                        <div class="number"> '.$total.'</div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Valeur financière du stock (coût d\'achat)</div>
                        <div class="number">'.$va.' <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Valeur financière du stock (vente)</div>
                        <div class="number">'.$vv.' <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Bénéfice en stock</div>
                        <div class="number">'.$diff.' <small>FCFA</small></div>
                    </div>
                </div>
            </div>';
	}
	
	
	public function addRapportLaboratoire(){
		$data = $this->input->post();
		$lit = $this->md_laboratoire->liste_valeur_element_analyse($data["id"]);
			echo '<form id="form-rapport">';
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<b>Elément analysé : '.$lit->ela_sLibelle.'</b><br>';
				echo '<b>Norme : '.$lit->ela_iValMin.' - '.$lit->ela_iValMax.'</b><br>';
				echo '<b>Unité : '.$lit->ela_sUnite.'</b>';
				echo '</div>';
				echo '<div class="col-md-6">';
					echo '<div class="form-group">';
						echo '<label>Valeur *</label><br>';
						// var_dump($lit);
						
						if($lit->ela_sLibelle == "Recueil"){
							echo '<select style="border:1px solid black;width:100%" class=" obligatoire" name="valeur">';
								echo '<option value="">--Selectionnez le recueil--</option>';
								echo '<option value="Emission naturelle">Emission naturelle</option>';
								echo '<option value="Sondage vesical">Sondage vesical</option>';
								echo '<option value="Ponction à travers la sonde">Ponction a travers la sonde</option>';
								echo '<option value="Ponction subpubienne">Ponction subpubienne</option>';
								echo '<option value="Poche adhesive sterile">Poche adhesive sterile</option>';
							echo '</select>';
						}else if($lit->ela_sLibelle == "Couleur"){
							echo '<select style="border:1px solid black;width:100%" class=" obligatoire" name="valeur">';
								echo '<option value="">--Selectionnez la couleur--</option>';
								echo '<option value="Jaune paille">Jaune paille</option>';
								echo '<option value="Blanchatre">Blanchatre</option>';
								echo '<option value="Ambre">Ambre</option>';
								echo '<option value="Ambre fonce">Ambre fonce</option>';
								echo '<option value="Rouge brique">Rouge brique</option>';
								echo '<option value="Jaune clair">Jaune clair</option>';
								echo '<option value="Icterique">Icterique</option>';
								echo '<option value="Hematique ">Hematique</option>';
							echo '</select>';
						}else if($lit->ela_sLibelle == "Depot"){
							echo '<select style="border:1px solid black;width:100%" class=" obligatoire" name="valeur">';
								echo '<option value="">--Selectionnez--</option>';
								echo '<option value="Minime">Minime</option>';
								echo '<option value="Assez important">Assez important</option>';
								echo '<option value="Important">Important</option>';
								echo '<option value="Tres important">Tres important</option>';
							echo '</select>';
						}else if($lit->ela_sLibelle == "Aspect"){
							echo '<select style="border:1px solid black;width:100%" class=" obligatoire" name="valeur">';
								echo '<option value="">--Selectionnez l\'aspect--</option>';
								echo '<option value="Limpide">Limpide</option>';
								echo '<option value="Louche">Louche</option>';
								echo '<option value="Floconneux">Floconneux</option>';
								echo '<option value="Purulent">Purulent</option>';
								echo '<option value="Trouble">Trouble</option>';
								echo '<option value="Cristallin">Cristallin</option>';
							echo '</select>';
						}else{
							echo '<input style="border:1px solid black;width:100%" type="text" class=" obligatoire" name="valeur" value=""/>';
						}
						echo '<input type="hidden" name="id" value=" '. $data["id"].'"/>';
					echo '</div>';
				echo '</div>';									
				echo '<div class="col-md-12">';
					echo '<label>Observation</label>';
					echo '<textarea type="text" rows="5" id="" class="" name="contenu" style="width:100%"></textarea>';
				echo '</div>';
			echo '</div>';
		echo '</form>
		 <script>
			(function () {
			   new FroalaEditor("#edit");
			})()
		  </script>';
	}
	
	
	
	
	
	
}
