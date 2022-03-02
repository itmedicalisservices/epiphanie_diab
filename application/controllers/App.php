<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

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
	
	
	public function faire($id)
	{
		$donneesAcm = array("per_id"=>$this->session->epiphanie_diab,"acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/diabetologie/page-prise-constantes',array("acm_id"=>$id));
	}
	
	public function utilisateur()
	{
		$this->load->view('app/rh/page-liste-personnel-complet');
	}
	
	public function profil()
	{
		$this->load->view('app/generique/page-profil-connect');
	
	}
	
	public function statistique()
	{
		$this->load->view('app/generique/page-statistique');
	
	}
	
	public function notifications()
	{
		$donnees = array("log_iSta"=>1);
		$this->md_rapport->updateRapport($donnees);
		$this->load->view('app/generique/page-notifications');
	
	}
	
	public function listeAppro(){
		$liste = $this->md_rapport->ListeAppro();
		echo '	
			<table id="example2" class="table table-bordered table-striped table-hover" style="font-size:12px">
			   
				<thead>
					<tr align="center">
						<td><b>Demandeur</b></td>
						<td><b>Montant Souhaité</b></td>
						<td><b>Date & Heure Demande</b></td>
						<td><b>Accordé autre Montant</b></td>
						<td style=""><b>Actions</b></td>
					
					</tr>
				</thead>
					<tbody>';
					
					if(empty($liste)){echo '<tr><td colspan="5"><em>Aucune demande en attentte</em></td></tr>';}else{ foreach($liste AS $l){ ?>
					<tr align="center">
						<td>
							<?php echo $l->per_sNom.' '.$l->per_sPrenom; ?>
						</td>
						<td>
							<?php echo number_format($l->apr_iDmd,0,",","."); ?>
						</td>													
						<td>
							<?php echo $this->md_config->affDateTimeFr($l->apr_dDate); ?>
						</td>					
						<td>
							<form  id="formappro_<?php echo $l->apr_id; ?>" method="post">
								<input type="number" min="0" name="appro" class="obligatoire<?php echo $l->apr_id; ?>" />
								<input type="hidden"  name="id" value="<?php echo $l->apr_id; ?>" />
								<a type="submit" rel="<?php echo $l->apr_id; ?>" href="javascript:;" class="text-primary accormontant" title="" >validé</a>
							</form>
						</td>	

						<td class="text-center">
							<a onClick="return confirm('Êtes-vous sûr de valider cette demande ?')" href="<?php echo site_url("caisse/valide_appro/".$l->apr_id);?>" class="text-success" >validé <i class="fa fa-check" style=""></i></a>&nbsp;&nbsp; |&nbsp;&nbsp; 
							<a onClick="return confirm('Êtes-vous sûr de vouloir rejeter cette demande ?')" href="<?php echo site_url("caisse/rejete_appro/".$l->apr_id);?>" class="text-danger" >rejeté <i class="fa fa-times" style=""></i></a>
						</td>
					</tr>
				<?php }}
					
					echo '</tbody>
				</table>

		';
	}		
	
	
		public function listePassation(){
		$liste = $this->md_parametre->validation_historique_passation($req='validation', $this->session->epiphanie_diab);
		echo '	
			<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
					<thead>
						<tr align="center">
							<td><b>Auteur</b></td>
							<td><b>Montant En Caisse</b></td>
							<td><b>Espèces</b></td>
							<td><b>Date et Heure Opération</b></td>
							<td style=""><b>Action</b></td>
						</tr>
						</tr>
					</thead>
					<tbody>';

					if(empty($liste)){echo '<tr><td colspan="5"><em>Aucune passation en attentte</em></td></tr>';}else{ foreach($liste AS $l){ ?>
					<tr align="center">
						<td>
							<?php echo $l->per_sNom.' '.$l->per_sPrenom; ?>
						</td>
						<td>
							<?php echo number_format($l->pas_iMontant,0,",","."); ?>
						</td>									
						<td>
							<?php echo number_format($l->pas_iEsp,0,",","."); ?>
						</td>													
						<td>
							<?php echo $this->md_config->affDateTimeFr($l->pas_dDateTime); ?>
						</td>					
						<td class="text-center">
							<a onClick="return confirm('Êtes-vous sûr de valider cette demande ?')" href="<?php echo site_url("caisse/valide_passation/".$l->pas_id);?>" style="font-size:16px" class="text-success" >validée <i class="fa fa-check" ></i></a>&nbsp;&nbsp; |&nbsp;&nbsp; 
							<a onClick="return confirm('Êtes-vous sûr de vouloir rejeter cette demande ?')" href="<?php echo site_url("caisse/rejete_passation/".$l->pas_id);?>" style="font-size:16px" class="text-danger" >rejetée <i class="fa fa-times" style=""></i></a>
						</td>
					</tr>
				<?php }}
					
					echo '</tbody>
				</table>

		';
	}
	
	
	public function listeCession(){
		$liste = $this->md_parametre->liste_cession(NULL);
		echo '	
			<table id="example2" class="table table-bordered table-striped table-hover" style="font-size:12px">
					<thead>
						<tr align="center">
							<td><b>Demandeur</b></td>
							<td><b>Montant En Caisse</b></td>
							<td><b>Espèces</b></td>
							<td><b>Date & Heure Demande</b></td>
							<td style=""><b>Actions</b></td>
						
						</tr>
					</thead>
					<tbody>';
					
					if(empty($liste)){echo '<tr><td colspan="5"><em>Aucune demande en attentte</em></td></tr>';}else{ foreach($liste AS $l){ ?>
					<tr align="center">
						<td>
							<?php echo $l->per_sNom.' '.$l->per_sPrenom; ?>
						</td>
						<td>
							<?php echo number_format($l->ces_iMontant,0,",","."); ?>
						</td>									
						<td>
							<?php echo number_format($l->ces_iEsp,0,",","."); ?>
						</td>													
						<td>
							<?php echo $this->md_config->affDateTimeFr($l->ces_dDate); ?>
						</td>					

						<td class="text-center">
							<a onClick="return confirm('Êtes-vous sûr de valider cette demande ?')" href="<?php echo site_url("caisse/valide_cession/".$l->ces_id);?>" style="font-size:16px" class="text-success" >validée <i class="fa fa-check" ></i></a>&nbsp;&nbsp; |&nbsp;&nbsp; 
							<a onClick="return confirm('Êtes-vous sûr de vouloir rejeter cette demande ?')" href="<?php echo site_url("caisse/rejete_cession/".$l->ces_id);?>" style="font-size:16px" class="text-danger" >rejetée <i class="fa fa-times" style=""></i></a>
						</td>
					</tr>
				<?php }}
					
					echo '</tbody>
				</table>

		';
	}	
	
	
	
	public function listNotifications(){
		$notifications = $this->md_rapport->notifications();
		foreach($notifications AS $n){
			echo '<li>'; 
				if($n->log_iSta==0){
					$style="background:rgba(0,0,0,0.1)";
				}
				else{
					$style="";
				}
				echo '<a href="javascript:void(0);" style="'.$style.'">';
					if($n->log_sIcone == "nouveau membre"){
						echo '<div class="icon-circle bg-light-green"><i class="zmdi zmdi-account-add"></i></div>';
					}
					else if($n->log_sIcone == "achat"){
						echo '<div class="icon-circle bg-cyan"><i class="zmdi zmdi-shopping-cart-plus"></i></div>';
					}
					else if($n->log_sIcone == "suppression"){
						echo '<div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>';
					}
					else if($n->log_sIcone == "modification"){
						echo '<div class="icon-circle bg-orange"><i class="zmdi zmdi-edit"></i></div>';
					}
					else if($n->log_sIcone == "commentaire post"){
						echo '<div class="icon-circle bg-blue-grey"><i class="zmdi zmdi-comment-alt-text"></i></div>';
					}
					else if($n->log_sIcone == "modification compte"){
						echo '<div class="icon-circle bg-light-green"><i class="zmdi zmdi-refresh-alt"></i></div>';
					}
					else if($n->log_sIcone == "connexion"){
						echo '<div class="icon-circle bg-light-green"><i class="fa fa-sign-in"></i></div>';
					}
					else if($n->log_sIcone == "déconnexion"){
						echo '<div class="icon-circle bg-orange"><i class="fa fa-power-off"></i></div>';
					}
					else if($n->log_sIcone == "connexion échouée"){
						echo '<div class="icon-circle bg-red"><i class="fa fa-home"></i></div>';
					}
					echo '<div class="menu-info" style="color:black">';
						echo '<h4  style="font-size:12px;"><b>'.$n->per_sNom.' '.$n->per_sPrenom.'</b> '.$n->log_sAction.'</h4>';
						echo '<p> <i class="fa fa-clock-o"></i> '.$this->md_config->affDateTimeFr($n->log_dDate).' </p>';
					echo '</div>';
				echo '</a>';
			echo '</li>';
		}
	}
	
	public function nbNotifications(){
		$nb = $this->md_rapport->nbNotifications();
		
		if(count($nb)==0){
			echo "";
		}
		else{
			echo count($nb);				
		}
	}	
	
	
	public function nbPassation(){
		$nb = $this->md_rapport->nbPassation();
		
		if(count($nb)==0){
			echo "";
		}
		else{
			echo '<span style="border-radius:50%;background:red;color:white;margin-left:3px;padding-right:12px">'.count($nb).'</span>';				
		}
	}	
	public function nbCession(){
		$nb = $this->md_rapport->nbCession();
		
		if(count($nb)==0){
			echo "";
		}
		else{
			echo '<span style="border-radius:50%;background:red;color:white;margin-left:5px;padding-right:15px" class="" id="">'.count($nb).'</span>';				
		}
	}	
	
	
	public function nbApprovisionnement(){
		$nb = $this->md_rapport->nbAppro();
		if(count($nb)==0){
			echo "";
		}
		else{
			echo '<span style="border-radius:50%;background:red;color:white;margin-left:5px;padding-right:15px" class="" id="">'.count($nb).'</span>';				
		}
	}	
	
	public function nbAnnulee(){
		$nb = $this->md_rapport->nbAnnul();
		if(count($nb)==0){
			echo "";
		}
		else{
			echo '<span style="border-radius:50%;background:red;color:white;margin-left:5px;padding-right:15px" class="" id="">'.count($nb).'</span>';				
		}
	}	
	
	public function nbSession(){
		$nb = $this->md_rapport->nbSession();
		if(count($nb) <=1){
			echo "SESSION ACTIVE "."(".count($nb).")";
		}
		else{
			echo "SESSIONS ACTIVES "."(".count($nb).")";
		}
	}
	
}
