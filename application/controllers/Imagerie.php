<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagerie extends CI_Controller {

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
	 
	 public function liste_recherche_dossier_patient()
	{
		$this->load->view('app/imagerie/page-liste-patient');
	}
	
	public function acte_recu()
	{
		$this->load->view('app/generique/page-dashboard');
	}		
	
	public function clotures()
	{
		$this->load->view('app/imagerie/page-imagerie-cloture');
	}	
	
	public function patient_en_examen($id)
	{
		$this->load->view('app/imagerie/page-imagerie-patient',array("aci_id"=>$id));
	}
	
	public function ajoutCompteRendu(){
		
		date_default_timezone_set('Africa/Brazzaville');
		$data = $this->input->post();
		$config["upload_path"] =  './assets/images/imagerie/';
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|docx|gif';
		$nomImage= time()."-".$_FILES["image"]["name"];
		$config["file_name"] = $nomImage; 
		$this->load->library('upload',$config);
		if($this->upload->do_upload("image")){
			$image=$this->upload->data();
			$photo="assets/images/imagerie/".$image['file_name'];
		}
		else{
			$photo=NULL;
		}
		
		if(isset($_FILES["join"]["name"]) AND $_FILES["join"]["name"]!=""){
			$config2["upload_path"] =  './assets/images/imagerie/prescription/';
			$config2["allowed_types"] = 'jpg|png|jpeg|pdf|docx|gif';
			$nomImage2= time()."-".$_FILES["join"]["name"];
			$config2["file_name"] = $nomImage2; 
			$this->load->library('upload',$config2);
			if($this->upload->do_upload("join")){
				$image2=$this->upload->data();
				$prescri="assets/images/imagerie/prescription/".$image2['file_name'];
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
			"aci_sCompteRendu"=>trim($data["compte"]),
			"aci_sLien"=>trim($data["lien"]),
			"aci_dDate"=>date("Y-m-d H:i:s"),
			"aci_iPer"=>$data["idPer"],
			"aci_sTitre"=>$data["titre"],
			"aci_sNom"=>$data["nom"],
			"aci_sPrenom"=>$data["prenom"],
			"aci_sImage"=>$photo,
			"aci_sPrescription"=>$prescri,
			"aci_iSta"=>2
		);
		
		$update = $this->md_patient->maj_acte_medical_imagerie($donnees,$data["id"]);
		echo "ok";
	}
	
	
}
