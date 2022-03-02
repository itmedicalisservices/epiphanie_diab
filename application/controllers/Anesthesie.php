<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anesthesie extends CI_Controller {

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

	public function liste()
	{
		$this->load->view('app/anesthesie/page-liste-consultation');
	}
	
	public function consultation_avis($id, $avs)
	{
		$donneesAcm = array("acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/chirurgie/page-consultation-anesthesiste',array("acm_id"=>$id,"avs"=>$avs));
	}
	
	public function demande_avis()
	{
		$this->load->view('app/anesthesie/page-liste-avis');
	}
		
	public function consulter($id)
	{
		$donneesAcm = array("per_id"=>$this->session->epiphanie_diab,"acm_iFin"=>1);
		$this->md_patient->maj_actes_caisse($donneesAcm,$id);
		$this->load->view('app/anesthesie/page-consultation-anesthesiste',array("acm_id"=>$id));
	}
	
	
	public function mes_patients()
	{
		$this->load->view('app/anesthesie/page-mes-patients-anesthesie');
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
	
	
	public function reponse_avis(){
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		if(!isset($data)){
			return redirect("anesthesie/consultation_avis");
		}
		else{
			$donnees = array(
				"avs_iSta"=>2,
				"avs_sAvis"=>$data['repavis'],
				"avs_iPer"=>$this->session->epiphanie_diab,
				"avs_dDateAvis"=>date("Y-m-d H:i:s")
			);
			$maj = $this->md_patient->maj_avis($donnees,$data['id']);
			return redirect("anesthesie/demande_avis");
		}
	}
	
	
}
?>






