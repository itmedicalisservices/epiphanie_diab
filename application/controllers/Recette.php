<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recette extends CI_Controller {

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
		$this->load->view('app/direction_generale/page-liste-recette');
	}	
	
	public function compteur_actes_medicaux()
	{
		$this->load->view('app/rapport/page-compteur-acte');
	}
	
	
	public function mvt_facture()
	{
		$this->load->view('app/recette/mvt-facture-cprincipal');
	}	
	
	public function mvt_acte()
	{
		$this->load->view('app/recette/mvt-acte-cprincipal');
	}		
		
	
	public function mouvement_acte()
	{
		$this->load->view('app/recette/page-mvt-acte');
	}		
	
	public function mouvement_facture()
	{
		$this->load->view('app/recette/page-recherche');
	}	
	
	public function non_assures()
	{
		$this->load->view('app/recette/page-non-assures');
	}
	
	public function assures()
	{
		$this->load->view('app/recette/page-assures');
	}

	public function aujourdhui()
	{
		$this->load->view('app/recette/page-aujourdhui');
	}
	
	public function toutes()
	{
		$this->load->view('app/recette/page-toutes');
	}
	
	
	
	public function recette_acte()
	{
		$this->load->view('app/direction_generale/page-recette-acte');
	}	
	
	public function recette_non_acte()
	{
		$this->load->view('app/direction_generale/page-liste-recette');
	}

	public function recette_courante($id)
	{
		$this->load->view('app/direction_generale/page-recette-courante',array('id'=>$id));
	}
	
	
	public function ajoutRecette()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("recette");
		}
		else{
			if($data['montant'] < 0 || $data['montant'] ==0 || !is_numeric($data['montant'])){
					echo 'Veuillez saisir un montant valide !';
				}else{
						$donnees = array(
						"mor_iSta"=>1,
						"rec_id"=>$data['id'],
						"per_id"=>$this->session->epiphanie_diab,
						"mor_iMontant"=>$data["montant"],
						"mor_dDate"=>date("Y-").$data["mois"].'-01'
						);
						$ajout=$this->md_recette->ajout_recette($donnees);
						
						if($ajout){
							$log = array(
								"log_iSta"=>0,
								"per_id"=>$this->session->epiphanie_diab,
								"log_sTable"=>"t_mouvement_recette_mor",
								"log_sIcone"=>"nouveau",
								"log_sAction"=>"a ajouté lavrecette de : ".$ajout,
								"log_dDate"=>date("Y-m-d H:i:s")
							);
							$this->md_connexion->rapport($log);
							// echo $ajout;
						}
					}
				}
	}
	
	
}
