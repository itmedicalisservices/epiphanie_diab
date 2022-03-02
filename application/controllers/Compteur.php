<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compteur extends CI_Controller {

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
		$this->load->view('app/rapport/page-compteur-acte');
	}
	
	public function liste_equipement()
	{
		$this->load->view('app/rapport/page-liste-equipement');
	}
	
	public function modifier_equipement($id)
	{
		$this->load->view('app/rapport/page-modifier-equipement',array("mat_id"=>$id));
	}
	
	
	/**
	 * Gestion du materiel / equipement
	 */
	public function ajoutMateriel()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("pharmacie/liste_equipement");
		}
		else{
			
			$donnees = array(
			"mat_sLib"=>ucfirst(trim($data['lib'])),
			"mat_sType"=>trim($data['cat']),
			"mat_sQualite"=>trim($data['qlt']),
			"mat_dDateEnreg"=>date("Y-m-d H:i:s"),
			"mat_iSta"=>1
			);
			$this->md_pharmacie->ajout_equipement($donnees);
			$log = array(
				"log_iSta"=>0,
				"per_id"=>$this->session->epiphanie_diab,
				"log_sTable"=>"t_materiel_mat",
				"log_sIcone"=>"nouveau membre",
				"log_sAction"=>"a ajouté un equipement",
				"log_sActionDetail"=>"a ajouté un nouveau equipement : <strong style='text-decoration:underline'>".ucfirst(trim($data['lib']))."</strong>",
				"log_dDate"=>date("Y-m-d H:i:s")
			);
			$this->md_connexion->rapport($log);
			
			
		}
	
	}

	
	public function modifEquipement()
	{
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(empty($data)){
			return redirect("compteur/modifier_equipement");
			// var_dump($data);
		}
		else{
			
			// if(!$verif){
				$donnees = array(
					"mat_sLib"=>ucfirst(trim($data['lib'])),
					"mat_sType"=>trim($data['cat']),
					"mat_sQualite"=>trim($data['qlt']),
					"mat_iSta"=>1
				);
				$modif=$this->md_patient->modifier_equipement($donnees,$data['id']);
				if($modif){
					$log = array(
						"log_iSta"=>0,
						"per_id"=>$this->session->epiphanie_diab,
						"log_sTable"=>"t_materiel_mat",
						"log_sIcone"=>"nouveau membre",
						"log_sAction"=>"a modifié un equipement : ".strtoupper(trim($data["lib"])),
						"log_dDate"=>date("Y-m-d H:i:s")
					);
					$this->md_connexion->rapport($log);
					echo $modif;
				}
				
			// }
			// else{
				// return "erreur";
			// }
		}
	}

	public function supprimer_equipement($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("compteur/liste_equipement");
		}
		else{
			$donnees = array(
				"mat_iSta"=>2
			);
			$supprimer = $this->md_patient->maj_equipement($donnees,$id);
			$equipement = $this->md_patient->recup_equipement($id);
			if($supprimer){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_materiel_mat",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a supprimé un equipement",
					"log_sActionDetail"=>"a supprimé l'equipement' : <strong style='text-decoration:underline'>".$equipement->mat_sLib."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("compteur/liste_equipement");
			}
		}
	}
	
	
}
