<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exploration extends CI_Controller {

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
	public function acte_recu()
	{
		$this->load->view('app/exploration/page-exploration-acte');
	}		
	
	public function clotures()
	{
		$this->load->view('app/exploration/page-exploration-cloture');
	}	
	
	public function examen_stomatologique($id)
	{
		$verif = $this->md_patient->verif_stomatologie($id);
		if(!$verif){
			$donneeDen = array(
				"acm_id"=>$id,
				"den_iSta"=>1
			);
			$this->md_patient->ajout_dentition($donneeDen);
		}
		$this->load->view('app/stomatologie/page-dentition-patient',array("acm_id"=>$id));
	}	
	
	public function patient_en_examen($id)
	{
		$verif = $this->md_patient->verif_exploration($id);
		if(!$verif){
			$donneeExp = array(
				"acm_id"=>$id,
				"aef_iSta"=>1
			);
			$this->md_patient->ajout_prescription_exploration($donneeExp);
		}
		$this->load->view('app/exploration/page-exploration-patient',array("acm_id"=>$id));
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
		
		if(isset($_FILES["join"]["name"]) AND $_FILES["join"]["name"]!=""){
			$config2["upload_path"] =  './assets/images/exploration/prescription/';
			$config2["allowed_types"] = 'jpg|png|jpeg|pdf|docx|gif';
			$nomImage2= time()."-".$_FILES["join"]["name"];
			$config2["file_name"] = $nomImage2; 
			$this->load->library('upload',$config2);
			if($this->upload->do_upload("join")){
				$image2=$this->upload->data();
				$prescri="assets/images/exploration/prescription/".$image2['file_name'];
			}
			else{
				$prescri=NULL;
			}
		}
		else{
			$prescri=NULL;
		}
		
		if(isset($data["prenom"])){
			if(trim($data["prenom"])==""){
				$data["prenom"]=NULL;
			}
			else{
				$data["prenom"]=ucwords($data["prenom"]);
			}
		}
		else{
			$data["prenom"] = NULL;
		}
		
		if(isset($data["nom"])){
			if(trim($data["nom"])==""){
				$data["nom"]=NULL;
			}
			else{
				$data["nom"]=strtoupper($data["nom"]);
			}
		}
		else{
			$data["nom"] = NULL;
		}
		
		if(isset($data["titre"])){
			if($data["titre"]==""){
				$data["titre"]=NULL;
			}
		}
		else{
			$data["titre"]=NULL;
		}

		$donnees = array(
			"aef_sTitre"=>$data["titre"],
			"aef_sNom"=>$data["nom"],
			"aef_sPrenom"=>$data["prenom"],
			"aef_sPrescription"=>$prescri,
			"aef_sCompteRendu"=>trim($data["compte"]),
			"aef_sConclusion"=>trim($data["conclusion"]),
			"aef_dDate"=>date("Y-m-d H:i:s"),
			"aef_iPer"=>$data["idPer"],
			"aef_sImage"=>$photo,
			"aef_iSta"=>2
		);
		
		$update = $this->md_patient->maj_acte_medical_exploration($donnees,$data["id"]);
		
		$donneesAcm = array(
			"acm_iSta"=>3,
			"acm_sStatut"=>'Terminé'
		);
		$this->md_patient->maj_actes_caisse($donneesAcm,$data["acmId"]);
		echo "ok";
	}
	
	
}
