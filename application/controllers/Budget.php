<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Budget extends CI_Controller {

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
	public function lib_sous_compte_courant($id)
	{
		$this->load->view('app/direction_generale/page-budget-encours_courant',array('id'=>$id));
	}	
	
	public function suivi_budget_courant($id)
	{
		$this->load->view('app/direction_generale/page-suivi-budget-courant',array('id'=>$id));
	}	
	
	public function suivi_budget()
	{
		$this->load->view('app/direction_generale/page-suivi-budget');
	}		
	
	public function budget_encours()
	{
		$this->load->view('app/direction_generale/page-budget-encours');
	}	
	
	
	public function alloue()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("budget/lib_sous_compte_courant");
		}
		else{
			if($data['montant'] < 0 || $data['montant'] ==0 || !is_numeric($data['montant'])){
					echo 'Veuillez saisir un montant valide !';
				}else{
				
					$solde = $this->md_budget->solde_budget_courant($data['id']);
					
					$majMontant = array(
						"slc_iMontant"=>$solde->solde+$data["montant"],
						"slc_iMontStable"=>$solde->solde+$data["montant"]
					);
					$ajout1 = $this->md_budget->maj_budget($majMontant,$data['id']);
					
					$budgetAlloue = array(
						"bul_iSta"=>1,
						"slc_id"=>$data["id"],
						"bul_iMontant"=>$data["montant"],
						"bul_dDate"=>date("Y-m-d")
					);
					$ajout = $this->md_budget->ajout_budget_alloue($budgetAlloue);
					
					if($ajout){
						$log = array(
							"log_iSta"=>0,
							"per_id"=>$this->session->epiphanie_diab,
							"log_sTable"=>"t_sous_libelle_compte_slc",
							"log_sIcone"=>"nouveau",
							"log_sAction"=>"a alloué un montant : ",
							"log_dDate"=>date("Y-m-d H:i:s")
						);
						$this->md_connexion->rapport($log);
						// echo $ajout;
					}
				}
			}
	}
	
	
	
	public function operationBudget()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("budget/lib_sous_compte_courant");
		}
		else{
			if($data['montant'] < 0 || $data['montant'] ==0 || !is_numeric($data['montant'])){
					echo 'Veuillez saisir un montant valide !';
				}else{
				$solde = $this->md_budget->solde_budget_courant($data['id']);
				if($solde->solde-$data["montant"] < 0){
					echo 'Le montant demandé est supérieur au montant du compte';
				}else{
						$donnees = array(
						"opb_iSta"=>1,
						"slc_id"=>$data['id'],
						"per_id"=>$this->session->epiphanie_diab,
						"opb_iMontant"=>$data["montant"],
						"scp_id"=>$data["scpId"],
						"opb_sMotif"=>$data["motif"],
						"opb_dDate"=>date("Y-m-d")
						);
						$ajout=$this->md_budget->ajout_depense_budget($donnees);
						
						if($ajout){
							$log = array(
								"log_iSta"=>0,
								"per_id"=>$this->session->epiphanie_diab,
								"log_sTable"=>"t_operation_budget_opb",
								"log_sIcone"=>"nouveau",
								"log_sAction"=>"a effectué une dépense de : ".$ajout,
								"log_dDate"=>date("Y-m-d H:i:s")
							);
							$this->md_connexion->rapport($log);
							// echo $ajout;
																	
							$majMontant = array(
								"slc_iMontant"=>$solde->solde-$data["montant"]
							);
							$maj = $this->md_budget->maj_budget($majMontant,$data['id']);
						}
					}
				}
		}
	}
	
	
	public function recupBudgetCourant()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$premierJour = $this->md_config->recupDateTime($data["premierJour"]);
		$dernierJour = $this->md_config->recupDateTime($data["dernierJour"]);
		
			$liste = $this->md_budget->liste_compte_investissements(); 
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
					foreach($liste AS $l){ 
					$rep = $this->md_budget->recup_sous_compte($l->cpt_id);
					$re = $this->md_budget->recup_lib_sous_compte_1($rep->scp_id,$premierJour,$dernierJour);
				echo '<tr>
						<td>'.$l->cpt_iNumero.'</td>
						<td>
							'.$rep->scp_sLibelle.'
							<table style="width:100%" class=" " id="">
								<thead>
									<tr>
										<th>Libellés de sous comptes</th>
										<th>Montant alloué</th>
										<th>Reste</th>
									</tr>
								</thead>
								<tbody>';
								foreach($re AS $r){
									echo '<tr>
										<td>'.$r->slc_sLibelle.'</td>
										<td>'.number_format($r->slc_iMontStable,0,",",".").'</td>
										<td>'.number_format($r->slc_iMontant,0,",",".").'</td>
									</tr>';
									}
								echo '</tbody>
							</table>
						</td>
					</tr>';
					} 
			echo '</tbody>
			</table>

		';
		echo '<script src="'.base_url('assets/plugins/jquery-datatable/datatables.min.js').'"></script>';

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*Ancien */	
	public function creation()
	{
		$this->load->view('app/page-Lignes-budgetaires');
	}
	public function liste()
	{
		$this->load->view('app/page-Liste-budget');
	}
	public function ajoutLigneBudget()
	{
		$data=$this->input->post();
		$verif1=$this->md_budget->verif_ligne_budget(ucfirst(trim($data['lib'])));
		if(!$verif1){
			$dataLib=array(
				"lib_iSta"=>1,
				"lib_sLibelle"=>ucfirst(trim($data['lib'])),
				"lib_sObjectifs"=>ucfirst(trim($data['objectif'])),
				"lib_dDate_crea "=>date("Y-m-d"),
				"lib_dDate_exe"=>$this->md_config->recupDateTime($data['date']),
				"lib_iMontant"=>trim($data['montant']),
				"lib_iSeuil"=>trim($data['seuil']),
				"lib_iEtat"=>trim($data['etat'])
				
			);
			
			$lignes_budgetaires=$this->md_budget->insert_lignes_budget($dataLib);
			if($lignes_budgetaires){
				$dataHib=array(
					"lib_id"=>$lignes_budgetaires->lib_id,
					"hib_iMontant"=>trim($data['montant'])
				);
				
				$historique_budgetaire=$this->md_budget->insert_historique($dataHib);
				if($historique_budgetaire){
					for($i=0; $i<count($data['uni']);$i++){
						$verif=$this->md_budget->verif_budget_unite($data['uni'][$i],$lignes_budgetaires->lib_id);
						if(!$verif){
							$dataBun=array(
								"bun_iSta"=>1,
								"lib_id"=>$lignes_budgetaires->lib_id,
								"uni_id"=>$data['uni'][$i]
							);
							$this->md_budget->insert_unite_budgetaire($dataBun);
						}
					}
					echo "Ligne budgetaire enregistrée!";
				}
				
				
			}
		}
		
		
	}
	
	
	
	
	
}
