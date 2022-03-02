<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapport extends CI_Controller {

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
	 
	 public function rapport_epidemiologique()
	{
		$this->load->view('app/rapport/page-rapport-epidemiologique.php');
	}
	 
	public function surveillance_epidemiologique()
	{
		$this->load->view('app/rapport/page-surveillance-epidemiologique.php');
	}	
	
	public function malade_hospitalise()
	{
		$this->load->view('app/rapport/page-malade-hospitalise.php');
	}

	public function indicateur_hospitaliers()
	{
		$this->load->view('app/rapport/page-indicateur-hospitaliers.php');
	}

	public function csi_pmae_hospitaux_de_base()
	{
		$this->load->view('app/rapport/page-csi-pmae-hospitaux_de_base.php');
	}

	public function consultation_externe()
	{
		$this->load->view('app/rapport/page-consultation-externe.php');
	}

	public function activite_chirurgie()
	{
		$this->load->view('app/rapport/page-activite-chirurgie.php');
	}

	public function activite_radiologie()
	{
		$this->load->view('app/rapport/page-activite-radiologie.php');
	}

	public function activite_laboratoire()
	{
		$this->load->view('app/rapport/page-activite-laboratoire.php');
	}

	public function consultation_des_femme_enceintes()
	{
		$this->load->view('app/rapport/page-consultation-femme-enceintes.php');
	}

	public function consultation_des_femme_en_post_natal()
	{
		$this->load->view('app/rapport/page-consultation-femme-post-natal.php');
	}

	public function accouchement_et_naissance()
	{
		$this->load->view('app/rapport/page-activite-laboratoire.php');
	}
	
	public function mortalite_maternelle()
	{
		$this->load->view('app/rapport/page-mortalite-maternelle.php');
	}

	public function Prise_en_charge_des_enfants_malnutris()
	{
		$this->load->view('app/rapport/page-Prise-charge-enfants-malnutris.php');
	}

	public function rapport_entree_de_medicaments()
	{
		$this->load->view('app/rapport/page-rapport-entree-medicaments.php');
	}

	public function gestion_des_medicaments()
	{
		$this->load->view('app/rapport/page-gestion-medicaments.php');
	}

	public function gestion_du_materiel()
	{
		$this->load->view('app/rapport/page-gestion-materiel.php');
	}

	public function gestion_du_personnel()
	{
		$this->load->view('app/rapport/page-gestion-personnel.php');
	}

	public function credits_alloues()
	{
		$this->load->view('app/rapport/page-credits-alloues.php');
	}


}
