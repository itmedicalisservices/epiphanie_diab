<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdv extends CI_Controller {

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
	public function prendre()
	{
		$this->load->view('app/rdv/page-rdv');
	}
	
	public function listeRdv()
	{
		
		$this->load->view('app/rdv/page-Liste-rdv');
		
	}
	
	public function listeRdvAnnule()
	{
		
		$this->load->view('app/rdv/page-Liste-rdv-annuler');
		
	}
	
	public function listeRdvValide()
	{
		
		$this->load->view('app/rdv/page-Liste-rdv-valider');
		
	}
	
	public function mesRdv()
	{
		
		$this->load->view('app/rdv/page-gestion-rdv');
		
	}
	
	
	public function partage()
	{
		
		$this->load->view('app/rdv/page-calendrier-partage');
		
	}
	
	
	public function prendreRendezVous()
	{
		
		$data=$this->input->post();
		
		$dataDir=array(
			"dir_iSta"=>1,
			"dir_sNom "=>strtoupper(trim($data["nom"])),
			"dir_sPrenom"=>ucfirst(trim($data["prenom"])),
			"dir_sDestinataire"=>$data["vous_etes"],
			"dir_dDateEn"=>date("Y-m-d H:i:s"),
			"dir_dDate"=>$this->md_config->recupDateTime($data["date_rdv"]),
			"dir_tHeure"=>$data["heure_rdv"],
			"per_id"=>$this->session->epiphanie_diab,
			"dir_sObjet"=>strtoupper(trim($data["objet"]))
		);	
		$this->md_rdv->insert_rendez_vous($dataDir);
		echo "Rendez-vous enregistré!";
		
			
	}
	
	public function prendreRendezVousConsultation()
	{
		
		$data=$this->input->post();
		// var_dump($data);
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
			
		for($i=0; $i<count($data["dateRdv"]) AND count($data["motifRdv"]) AND count($data["heureRdv"]); $i++){
			$dataDir=array(
				"dir_iSta"=>1,
				"dir_sDestinataire"=>$this->session->epiphanie_diab,
				"dir_dDateEn"=>date("Y-m-d H:i:s"),
				"dir_dDate"=>$this->md_config->recupDateTime($data["dateRdv"][$i]),
				"dir_tHeure"=>$data["heureRdv"][$i],
				"per_id"=>$this->session->epiphanie_diab,
				"pat_id"=>$data["pat"],
				"sea_id"=>$sejour->sea_id,
				"dir_sObjet"=>ucfirst(trim($data["motifRdv"][$i]))
			);	
			$this->md_rdv->insert_rendez_vous($dataDir);
			
		}
		echo "Ok";
			
	}
	
	
	public function annulerRdv($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("rdv/listeRdv");
		}
		else{
			$donnees = array(
				"dir_iSta"=>2
			);
			$supprimer = $this->md_rdv->maj_rdv($donnees,$id);
				return redirect("rdv/listeRdv");
		}
	}
		
	public function recupRdv()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			echo "erreur";
			// var_dump($data);
		}
		else{
			$c = $this->md_rdv->rdv_sejour($data["id"]);
			echo '<div class="post-box">
					<h3>Rendez-vous avec le patient</h3>                                        
					<br>
				</div>';
			echo ' <div class="table-responsive">
						<table id="mainTable" class="table table-striped" style="cursor: pointer;">
							<thead>
								<tr>
									<th>Date</th>
									<th>heure</th>
									<th>Objet du Rendez-vous</th>
								</tr>
							</thead>
							<tbody>';
							foreach($c AS $e){
							echo '<tr>
									<td>'.$this->md_config->affDateFrNum($e->dir_dDate).'</td>
									<td>'.substr($e->dir_tHeure,0,8).'</td>
									<td>'.$e->dir_sObjet.'</td>
								</tr>';
							}
						echo' </tbody>
						</table>
					</div>';
			
		}
			
	}
	
	
		
	public function validerRdv($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("rdv/listeRdv");
		}
		else{
			$donnees = array(
				"dir_iSta"=>0,
				"dir_tHeure_arrive"=>date("H:i:s")
			);
			$supprimer = $this->md_rdv->maj_rdv($donnees,$id);
				return redirect("rdv/listeRdv");
		}
	}
		
	public function alertRdv(){
		date_default_timezone_set('Africa/Brazzaville');
		$fait = date("Y-m-d");
		$maDate = strtotime($fait."- 2 days");
		$date = date("Y-m-d",$maDate). "\n";
		$recup = $this->md_rdv->nb_de_mes_rdv_programme($date,$fait);
		$nb = count($recup);
		if($nb >0){
			echo '<span style="background:red;color:white;border-radius:6px;margin-left:12px;padding-right:10px">'.$nb.'</span>';
		}
	}
	
}
?>