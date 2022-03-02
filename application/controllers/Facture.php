<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture extends CI_Controller {

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
		$this->load->view('app/caisse/page-facture');
	}
	
	
		
	public function ensemble_facture()
	{
		$this->load->view('app/caisse/page-ensemble-facture');
	}
	
	public function rapport_facture_annulee()
	{
		$this->load->view('app/caisse/page-rapport-facture-annulee');
	}	
	
	public function liste()
	{
		$this->load->view('app/caisse/page-liste-facture-annulee');
	}	
	
	public function frais_divers()
	{
		$this->load->view('app/caisse/page-frais-divers');
	}	
	
	public function non_assures()
	{
		$this->load->view('app/caisse/page-non-assures');
	}
	
	public function assures()
	{
		$this->load->view('app/caisse/page-assures');
	}
	
	/*public function impaye()
	{
		$this->load->view('app/caisse/page-facture-impaye');
	}
	*/
	
	public function detail($id)
	{
		$this->load->view('app/caisse/page-detail-facture',array("id"=>$id));
	}
	
	
	public function annuler_facture_assuree($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("facture/assures");
		}
		else{
			
		$facture = $this->md_patient->recup_facture($id);
		$personnel = $this->md_personnel->recup_personnel($facture->per_id);
		
		
		$jour =  date('N');
		$heure = date("H:i");
		if(($heure >= '07:30') && ($heure <= '17:30')  && ($facture->fac_dDatePaie==date("Y-m-d")) && ($jour == 1 || $jour == 2 || $jour == 3 || $jour == 4 || $jour == 5)){
			
		
			$donnees = array(
				"fac_iSta"=>2
			);
			$maj = $this->md_patient->maj_facture($donnees,$id);
			
			$donneeself = array(
				"elf_iSta"=>1
			);
			$annulation = $this->md_patient->maj_element_fac($donneeself,$id);			
			
			$donneesqpt = array(
				"qpt_iSta"=>2
			);
			$annulationqpt = $this->md_patient->maj_quotes_parts($donneesqpt,$id);
			
			// $type = $this->md_patient->recup_fac_annulee($id);
			
			$donneeFac = array(
			"fac_iSta"=>2,
			"pat_id"=>0,
			"per_id"=>$facture->per_id,
			"sta_iPer"=>0,
			"fac_sObjet"=>8,
			"fac_iMontantPaye"=>-$facture->fac_iMontantPaye,
			"fac_iMontant"=>0,
			"fac_iMontantAss"=>0,
			"fac_iReste"=>0,
			"fac_dDatePaie"=>$facture->fac_dDatePaie,
			"fac_dDateValAnnul"=>date("d-m-Y"),
			"fac_dDatePaieTime"=>$facture->fac_dDatePaieTime,
			"fac_sNumero"=>$facture->fac_sNumero,
			"ass_id"=>0,
			"fac_iSituationAss"=>0,
			"mod_id"=>0,
			"fac_sLoc"=>NULL,
			"fac_iMontantReduc"=>0,
			"fac_iAnnul"=>$facture->fac_id,
			"tas_id"=>0
		);
		
		$insertFac = $this->md_patient->ajout_facture_annule($donneeFac);
			
			
			if($annulation){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_facture_fac",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a annulé",
					"log_sActionDetail"=>"a annulé la facture : <strong style='text-decoration:underline'>".$facture->fac_sNumero."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("facture/assures");
			}
			
		}else{
			
			
		$donnees = array(
			"fac_iStAnnul"=>1
		);
		$maj = $this->md_patient->maj_facture($donnees,$id);
			
			if(($heure > '17:30') && ($heure <= '23:59')){
				// $dateajout = date("d-m-Y", strtotime("+1 days"));
				// $heureajout = date("Y-m-d H:i:s");
				// $statut = 1;
				// $objet = 6;
				// $statutper = 0;
				return;
			}else{
				$dateajout = date("Y-m-d");
				$heureajout = date("Y-m-d H:i:s");
				$statut = 1;
				$objet = 6;
				$statutper = 0;
			}
			$donneeFac = array(
				"fac_iSta"=>$statut,
				"pat_id"=>0,
				"per_id"=>$facture->per_id,
				"sta_iPer"=>$statutper,
				"fac_sObjet"=>$objet,
				"fac_iMontantPaye"=>0,
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>$dateajout,
				"fac_dDatePaieTime"=>$heureajout,
				"ass_id"=>0,
				"fac_iRemise"=>-$facture->fac_iMontantPaye,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_sNumero"=>$facture->fac_sNumero,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);
			
			$insertFac = $this->md_patient->ajout_facture($donneeFac);
			return redirect("facture/assures");
			
		}
		
		}
	}	
	
	
	
	public function annuler_facture_frais_divers($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("facture/frais_divers");
		}
		else{
		
		
		$facture = $this->md_patient->recup_facture($id);
		$personnel = $this->md_personnel->recup_personnel($facture->per_id);
		
		$jour =  date('N');
		$heure = date("H:i");
		if(($heure >= '07:30') && ($heure <= '17:30')  && ($facture->fac_dDatePaie==date("Y-m-d")) && ($jour == 1 || $jour == 2 || $jour == 3 || $jour == 4 || $jour == 5)){
		
			$donnees = array(
				"fac_iSta"=>2
			);
			$maj = $this->md_patient->maj_facture($donnees,$id);
			
			$donneeself = array(
				"elf_iSta"=>1
			);
			$annulation = $this->md_patient->maj_element_fac($donneeself,$id);
			
			
			$donneesqpt = array(
				"qpt_iSta"=>2
			);
			$annulationqpt = $this->md_patient->maj_quotes_parts($donneesqpt,$id);
			
			$donneeFac = array(
			"fac_iSta"=>2,
			"pat_id"=>0,
			"per_id"=>$facture->per_id,
			"sta_iPer"=>0,
			"fac_sObjet"=>8,
			"fac_iMontantPaye"=>-$facture->fac_iMontantPaye,
			"fac_iMontant"=>0,
			"fac_iMontantAss"=>0,
			"fac_iReste"=>0,
			"fac_dDatePaie"=>$facture->fac_dDatePaie,
			"fac_dDateValAnnul"=>date("d-m-Y"),
			"fac_dDatePaieTime"=>$facture->fac_dDatePaieTime,
			"fac_sNumero"=>$facture->fac_sNumero,
			"ass_id"=>0,
			"fac_iSituationAss"=>0,
			"mod_id"=>0,
			"fac_sLoc"=>NULL,
			"fac_iMontantReduc"=>0,
			"fac_iAnnul"=>$facture->fac_id,
			"tas_id"=>0
		);
		
		$insertFac = $this->md_patient->ajout_facture_annule($donneeFac);
			
			
			// $type = $this->md_patient->recup_fac_annulee($id);
			if($annulation){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_facture_fac",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a annulé",
					"log_sActionDetail"=>"a annulé la facture : <strong style='text-decoration:underline'>".$facture->fac_sNumero."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("facture/frais_divers");
			}
		
		}else{
		
		$donnees = array(
			"fac_iStAnnul"=>1
		);
		$maj = $this->md_patient->maj_facture($donnees,$id);
			
			if(($heure > '17:30') && ($heure <= '23:59')){
				// $dateajout = date("d-m-Y", strtotime("+1 days"));
				// $heureajout = date("Y-m-d H:i:s");
				// $statut = 1;
				// $objet = 6;
				// $statutper = 0;
				return;
			}else{
				$dateajout = date("Y-m-d");
				$heureajout = date("Y-m-d H:i:s");
				$statut = 1;
				$objet = 6;
				$statutper = 0;
			}
			$donneeFac = array(
				"fac_iSta"=>$statut,
				"pat_id"=>0,
				"per_id"=>$facture->per_id,
				"sta_iPer"=>$statutper,
				"fac_sObjet"=>$objet,
				"fac_iMontantPaye"=>0,
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>$dateajout,
				"fac_dDatePaieTime"=>$heureajout,
				"ass_id"=>0,
				"fac_iRemise"=>-$facture->fac_iMontantPaye,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_sNumero"=>$facture->fac_sNumero,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);
			
			$insertFac = $this->md_patient->ajout_facture($donneeFac);
			return redirect("facture/frais_divers");
		}
		}
	}	

	
	public function annuler_facture($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("facture/non_assures");
		}
		else{
		
		
		$facture = $this->md_patient->recup_facture($id);
		$personnel = $this->md_personnel->recup_personnel($facture->per_id);/*recup per_iCnx*/
		
		$jour =  date('N');
		$heure = date("H:i");		
		
		if(($heure >= '07:30') && ($heure <= '17:30')  && ($facture->fac_dDatePaie==date("Y-m-d")) && ($jour == 1 || $jour == 2 || $jour == 3 || $jour == 4 || $jour == 5)){

			$donnees = array(
				"fac_iSta"=>2
			);
			$maj = $this->md_patient->maj_facture($donnees,$id);
			
			
			$donneeself = array(
				"elf_iSta"=>1
			);
			$annulation = $this->md_patient->maj_element_fac($donneeself,$id);
			
			
			$donneesqpt = array(
				"qpt_iSta"=>2
			);
			$annulationqpt = $this->md_patient->maj_quotes_parts($donneesqpt,$id);
			
			$acmCpt = array(
				"aco_iSta"=>2
			);
			$Cpt = $this->md_patient->maj_acte_compteur($acmCpt,$id);
			
		$donneeFac = array(
			"fac_iSta"=>2,
			"pat_id"=>0,
			"per_id"=>$facture->per_id,
			"sta_iPer"=>0,
			"fac_sObjet"=>8,
			"fac_iMontantPaye"=>-$facture->fac_iMontantPaye,
			"fac_iMontant"=>0,
			"fac_iMontantAss"=>0,
			"fac_iReste"=>0,
			"fac_dDatePaie"=>$facture->fac_dDatePaie,
			"fac_dDateValAnnul"=>date("d-m-Y"),
			"fac_dDatePaieTime"=>$facture->fac_dDatePaieTime,
			"fac_sNumero"=>$facture->fac_sNumero,
			"ass_id"=>0,
			"fac_iSituationAss"=>0,
			"mod_id"=>0,
			"fac_sLoc"=>NULL,
			"fac_iMontantReduc"=>0,
			"fac_iAnnul"=>$facture->fac_id,
			"tas_id"=>0
		);
		
		$insertFac = $this->md_patient->ajout_facture_annule($donneeFac);
			
			
			
			
			// $donneesanf = array(
				// "anf_iSta"=>0,
				// "per_id"=>$facture->per_id,
				// "fac_id"=>$facture->fac_id,
				// "anf_iMontant"=>$facture->fac_iMontantPaye,
				// "fac_sNum"=>$facture->fac_sNumero,
				// "anf_dDate"=>$facture->fac_dDatePaie,
				// "anf_dDateTime"=>$facture->fac_dDatePaieTime
			// );
			// $this->md_patient->ajout_annulation_facture($donneesanf);
			
			// $type = $this->md_patient->recup_fac_annulee($id);
			if($annulation){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_facture_fac",
					"log_sIcone"=>"suppression",
					"log_sAction"=>"a annulé",
					"log_sActionDetail"=>"a annulé la facture : <strong style='text-decoration:underline'>".$facture->fac_sNumero."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("facture/non_assures");
			}
			
		
		}else{
	
		$donnees = array(
			"fac_iStAnnul"=>1
		);
		$maj = $this->md_patient->maj_facture($donnees,$id);
			
			if(($heure > '17:30') && ($heure <= '23:59')){
				
				$reportee= 'reportée';
				// redirect("facture/non_assures", array('reportee'=>$reportee));
				$this->load->view('app/caisse/page-non-assures', array('reportee'=>$reportee));
				return;
			}else{
				$dateajout = date("Y-m-d");
				$heureajout = date("Y-m-d H:i:s");
				$statut = 1;
				$objet = 6;
				$statutper = 0;
			}

			$donneeFac = array(
				"fac_iSta"=>$statut,
				"pat_id"=>0,
				"per_id"=>$facture->per_id,
				"sta_iPer"=>$statutper,
				"fac_sObjet"=>$objet,
				"fac_iMontantPaye"=>0,
				"fac_iMontant"=>0,
				"fac_iMontantAss"=>0,
				"fac_iReste"=>0,
				"fac_dDatePaie"=>$dateajout,
				"fac_dDatePaieTime"=>$heureajout,
				"ass_id"=>0,
				"fac_iRemise"=>-$facture->fac_iMontantPaye,
				"fac_iSituationAss"=>0,
				"mod_id"=>0,
				"fac_sNumero"=>$facture->fac_sNumero,
				"fac_iMontantReduc"=>0,
				"tas_id"=>0
			);
			
			$insertFac = $this->md_patient->ajout_facture($donneeFac);
			
			return redirect("facture/non_assures");
		
			}
		
		}
	}	
	
	public function restaure_facture($id){

		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("facture/non_assures");
		}
		else{
		
			$idfac = $this->md_patient->recup_facture($id);
				
			$donnees = array(
				"fac_iSta"=>1
			);
			$maj = $this->md_patient->maj_facture($donnees,$id);
		

			$donnees2 = array(
				"elf_iSta"=>0
			);
			$annulation = $this->md_patient->maj_element_fac($donnees2,$id);
			
			
			$donneesannul = array(
				"fac_iSta"=>3
			);
			$maj = $this->md_patient->maj_facture_annule($donneesannul,$id);
			
			$donneesqpt = array(
				"qpt_iSta"=>1
			);
			$annulationqpt = $this->md_patient->maj_quotes_parts($donneesqpt,$id);
			
			
			$acmCpt = array(
				"aco_iSta"=>1
			);
			$Cpt = $this->md_patient->maj_acte_compteur($acmCpt,$id);
			
			// $donneesanf = array(
				// "anf_iSta"=>1
			// );
			// $majanf = $this->md_patient->maj_annulation_facture($donneesanf,$id);
			
			
			// $donnees3 = array(
				// "fac_iSta"=>2
			// );
			// $annulation2 = $this->md_patient->maj_facture2($donnees3, $idfac->fac_sNumero);
			
			// $type = $this->md_patient->recup_fac_annulee($id);
			if($annulation){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_facture_fac",
					"log_sIcone"=>"Restauration",
					"log_sAction"=>"a restauré",
					"log_sActionDetail"=>"a restauré la facture : <strong style='text-decoration:underline'>".$idfac->fac_sNumero."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("facture/non_assures");
			}
		}
	}	
	
	
	public function restaure_facture_assuree($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("facture/assures");
		}
		else{
		
			$idfac = $this->md_patient->recup_facture($id);
				
			$donnees = array(
				"fac_iSta"=>1
			);
			$maj = $this->md_patient->maj_facture($donnees,$id);
		

			$donnees2 = array(
				"elf_iSta"=>0
			);
			$annulation = $this->md_patient->maj_element_fac($donnees2,$id);
			
			
			$donneesannul = array(
				"fac_iSta"=>3
			);
			$maj = $this->md_patient->maj_facture_annule($donneesannul,$id);
			
			
			$donneesqpt = array(
				"qpt_iSta"=>2
			);
			$annulationqpt = $this->md_patient->maj_quotes_parts($donneesqpt,$id);
			// $donnees3 = array(
				// "fac_iSta"=>2
			// );
			// $annulation2 = $this->md_patient->maj_facture2($donnees3, $idfac->fac_sNumero);
			
			// $type = $this->md_patient->recup_fac_annulee($id);
			if($annulation){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_facture_fac",
					"log_sIcone"=>"Restauration",
					"log_sAction"=>"a restauré",
					"log_sActionDetail"=>"a restauré la facture : <strong style='text-decoration:underline'>".$idfac->fac_sNumero."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("facture/assures");
			}
		}
	}	
	
	
	public function restaure_facture_frais_divers($id){
		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("facture/frais_divers");
		}
		else{
		
			$idfac = $this->md_patient->recup_facture($id);
				
			$donnees = array(
				"fac_iSta"=>1
			);
			$maj = $this->md_patient->maj_facture($donnees,$id);
		

			$donnees2 = array(
				"elf_iSta"=>0
			);
			$annulation = $this->md_patient->maj_element_fac($donnees2,$id);
			
			$donneesannul = array(
				"fac_iSta"=>3
			);
			$maj = $this->md_patient->maj_facture_annule($donneesannul,$id);
			
			
			$donneesqpt = array(
				"qpt_iSta"=>2
			);
			$annulationqpt = $this->md_patient->maj_quotes_parts($donneesqpt,$id);
			
			// $type = $this->md_patient->recup_fac_annulee($id);
			if($annulation){
				$log = array(
					"log_iSta"=>0,
					"per_id"=>$this->session->epiphanie_diab,
					"log_sTable"=>"t_facture_fac",
					"log_sIcone"=>"Restauration",
					"log_sAction"=>"a restauré",
					"log_sActionDetail"=>"a restauré la facture : <strong style='text-decoration:underline'>".$idfac->fac_sNumero."</strong>",
					"log_dDate"=>date("Y-m-d H:i:s")
				);
				$this->md_connexion->rapport($log);
				return redirect("facture/frais_divers");
			}
		}
	}
	
	
	
	
	public function annuler_facture_j($id){

		date_default_timezone_set('Africa/Brazzaville');
		if(!isset($id)){
			return redirect("caisse/facture_annulee_j");
		}
		else{
						
			$donnees = array(
				"sta_iPer"=>1
			);
			$maj = $this->md_patient->maj_facture4($donnees,$id);


			// $type = $this->md_patient->recup_fac_annulee($id);
			// if($annulation){
				// $log = array(
					// "log_iSta"=>0,
					// "per_id"=>$this->session->epiphanie_diab,
					// "log_sTable"=>"t_facture_fac",
					// "log_sIcone"=>"Restauration",
					// "log_sAction"=>"a restauré",
					// "log_sActionDetail"=>"a restauré la facture : <strong style='text-decoration:underline'>".$idfac->fac_sNumero."</strong>",
					// "log_dDate"=>date("Y-m-d H:i:s")
				// );
				// $this->md_connexion->rapport($log);
				return redirect("caisse/facture_annulee_j");
			// }
		}
	}
	
	
}
