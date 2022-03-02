
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impression extends CI_Controller {


	public function file_active($patient)
	{
		$this->load->view('impression/file_active', array("patient"=>$patient));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A7', 'portrait');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("file_active".$patient.".pdf",array('attachment'=>0));
	}



	public function pass_caisse($id){
		date_default_timezone_set('Africa/Brazzaville');
				

	$this->load->view('impression/pass_caisse', array("id"=>$id));
	
	// return ;
	
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
		// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
		// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
		// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("pass_caisse".$id.".pdf",array('attachment'=>0));
	}

	

	public function cession_caisse($id){
		date_default_timezone_set('Africa/Brazzaville');
				

	$this->load->view('impression/cession_caisse', array("id"=>$id));
	
	// return ;
	
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
		// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
		// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
		// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("cession_caisse".$id.".pdf",array('attachment'=>0));
	}

	
	public function rapport_ticket($date1, $date2, $mvt)
	{

		$this->load->view('impression/rapport_ticket', array("date1"=>$date1, "date2"=>$date2, "mvt"=>$mvt));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		if($mvt == 0){
		$this->dompdf->setPaper('A4', 'landscape');
		}else{
		$this->dompdf->setPaper('A4', 'portrait');
		 }
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("rapport_ticket".$date1.".pdf",array('attachment'=>0));
	}

	public function journal_encaissement_facture_cp($date1, $date2, $acte=false)
	{

		$this->load->view('impression/liste_journal_facture_cp', array("date1"=>$date1, "date2"=>$date2, "acte"=>$acte));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'portrait');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("liste_journal_facture_cp".$date1.".pdf",array('attachment'=>0));
	}

	
	public function situation_caisse_partype($date1, $date2)
	{
	
		$this->load->view('impression/liste_situation_caisse_partype', array("date1"=>$date1, "date2"=>$date2));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("liste_situation_caisse_partype".$date1.".pdf",array('attachment'=>0));
	}



	public function etat_remise_cp($date1, $date2)
	{

		$this->load->view('impression/liste_remise_cp', array("date1"=>$date1, "date2"=>$date2));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("liste_remise_cp".$date1.".pdf",array('attachment'=>0));
	}

	
	
	public function rapport_facture_annulee($date1, $date2, $acte=false)
	{

		$this->load->view('impression/rapport_annulee_fac', array("date1"=>$date1, "date2"=>$date2, "acte"=>$acte));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'portrait');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("rapport_annulee_fac".$date1.".pdf",array('attachment'=>0));
	}



	public function appro_caisse($id){
		date_default_timezone_set('Africa/Brazzaville');
				

	$this->load->view('impression/appro_caisse', array("id"=>$id));
	
	// return ;
	
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
		// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
		// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
		// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("appro_caisse".$id.".pdf",array('attachment'=>0));
	}


	public function mouvement_caisse_facture_cp($date1, $date2, $acte, $typemvt)
	{
		$this->load->view('impression/liste_mouvement_facture_cp', array("date1"=>$date1, "date2"=>$date2, "acte"=>$acte, "typemvt"=>$typemvt));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'portrait');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("liste_mouvement_facture_cp".$date1.".pdf",array('attachment'=>0));
	}

	
	
	public function situation_caisse_parservice($date1, $date2)
	{
	
		$this->load->view('impression/liste_situation_caisse_parservice', array("date1"=>$date1, "date2"=>$date2));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'portrait');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("liste_situation_caisse_parservice".$date1.".pdf",array('attachment'=>0));
	}	
	
	public function situation_caisse_paracte($date1, $date2)
	{
	
		$this->load->view('impression/liste_situation_caisse_paracte', array("date1"=>$date1, "date2"=>$date2));
		
		
		// return;
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'portrait');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("liste_situation_caisse_paracte".$date1.".pdf",array('attachment'=>0));
	}


	
	public function mouvement_caisse_acte($id, $date1, $date2)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/liste_mouvement_acte', array("id"=>$id, "date1"=>$date1, "date2"=>$date2));
			
			
			// return;
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("liste_mouvement_acte".$id.".pdf",array('attachment'=>0));
		}
	}
	
	
	public function mouvement_caisse_facture($id, $date1, $date2, $acte, $typemvt)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$donnees = array("id"=>$id, "date1"=>$date1, "date2"=>$date2, "acte"=>$acte, "typemvt"=>$typemvt);
			$this->load->view('impression/liste_mouvement_facture', $donnees);
			
			
			// return;
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("liste_mouvement_facture".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function mouvement_caisse($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/liste_mouvement_personnel', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("liste_mouvement_personnel".$id.".pdf",array('attachment'=>0));
		}
	}



	public function etat_caisse()
	{			
			$data = $this->input->post();
	
			$premier = $data['premierJour'];
			$dernier = $data['dernierJour'];
		
			$this->load->view('impression/etat_caisse', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("etat_caisse".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}


	
	public function recu_caisse($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/recu_caisse', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			// $this->dompdf->setPaper('A4', 'portrait');//courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("reçu_de_caisse_".$id.".pdf",array('attachment'=>0));
		
		}
	}
	
	public function rapport_epidemiologique($id)
	{
		
		$data = $this->input->post();
		
		$dernierJour = $data['dernierJour'];
		$premierJour = $data['premierJour'];
		
		
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/rapport_epidemiliogique', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("dossier_medical".$id.".pdf",array('attachment'=>0));
		}
	}	
		
	
	public function dossier_medical_passage($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/dossier_medical', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("dossier_medical".$id.".pdf",array('attachment'=>0));
		}
	}

	public function constante_vitale($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/constante_vitale', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("constante_vitale".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function prise_en_charge($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prise_en_charge', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prise_en_charge".$id.".pdf",array('attachment'=>0));
		}
	}

	public function prescript_consultation($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescript_consultation', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("consultation_patient".$id.".pdf",array('attachment'=>0));
		}
	}

	public function prescription_soins_infirmiers($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescription_soins_infirmiers', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prescription_soins_infirmiers".$id.".pdf",array('attachment'=>0));
		}
	}

	public function prescription_hospitalisation($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescription_hospitalisation', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prescription_hospitalisation".$id.".pdf",array('attachment'=>0));
		}
	}

	public function prescription_imagerie($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescription_imagerie', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A5', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prescription_imagerie".$id.".pdf",array('attachment'=>0));
		}
	}

	public function prescription_examen_laboratoire($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescription_examen_laboratoire', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prescription_examen_laboratoire".$id.".pdf",array('attachment'=>0));
		}
	}

	
	public function prescription_reeducation($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescription_reeducation', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A5', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prescription_reeducation".$id.".pdf",array('attachment'=>0));
			
		}
	}

	public function prescription_maladie_diagnostiquee($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescription_maladie_diagnostiquee', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prescription_maladie_diagnostiquee".$id.".pdf",array('attachment'=>0));
		}
	}

	public function declaration_nouveau_ne($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/declaration_nouveau_ne', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("declaration_nouveau_ne".$id.".pdf",array('attachment'=>0));
		}
	}

	public function declaration_deces($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/declaration_deces', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("declaration_deces".$id.".pdf",array('attachment'=>0));
		}
	}

	public function prescription_exploration($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/prescription_exploration', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A5', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("prescription_exploration".$id.".pdf",array('attachment'=>0));
			
		}
	}

	
	
	
	public function engagement($id)
	{
		if(!isset($id)){
			return redirect("document/engagement");
		}
		else{
			$this->load->view('impression/engagement_a_payer', array("id"=>$id));
		
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			// $this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			$this->dompdf->setPaper('A4', 'portrait'); //courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("engagement_a_payer".$id.".pdf",array('attachment'=>0));
			
			return redirect("document/engagement");
		}
	}

	
		
	public function depot_objet($id)
	{
		if(!isset($id)){
			return redirect("document/depot");
		}
		else{
			$this->load->view('impression/depot_objet', array("id"=>$id));
		
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			// $this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			$this->dompdf->setPaper('A4', 'portrait'); //courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("depot_objet".$id.".pdf",array('attachment'=>0));
			
			return redirect("document/depot");
		}
	}
		
	public function rapportLabo($id)
	{
		if(!isset($id)){
			return redirect("laboratoire/examens_faits");
		}
		else{
			$this->load->view('impression/laboratoire', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			// $this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			$this->dompdf->setPaper('A4', 'portrait'); //courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("resultat_laboratoire".$id.".pdf",array('attachment'=>0));
			
			return redirect("laboratoire/examens_faits");
			
		}
	}
	
	

	public function rapportImagerie($id)
	{
		if(!isset($id)){
			return redirect("imagerie/clotures");
		}
		else{
			$this->load->view('impression/imagerie', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			// $this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			$this->dompdf->setPaper('A4', 'portrait'); //courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("resultat_imagerie".$id.".pdf",array('attachment'=>0));
			
			return redirect("imagerie/clotures");
			
		}
	}
	
	public function rapport_reeduction($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/rapport_reeduction', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A5', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("compte_rendu_reeducation_".$id.".pdf",array('attachment'=>0));
		}
	}
	
	
	
	public function surveillance_epidemiologique($premier,$dernier)
	{
		
		$this->load->view('impression/surveillance_epidemiologique', array("premier"=>$premier,"dernier"=>$dernier));
		
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("surveillance_epidemiologique_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		
	}

	public function rapport_epidemiologie($premier,$dernier)
	{
		
			$this->load->view('impression/rapport_epidemiliogique', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("rapport_epidemiologie_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}

	public function repartition_malade_hospitalises($premier,$dernier)
	{

		$this->load->view('impression/repartition_malade_hospitalises', array("premier"=>$premier,"dernier"=>$dernier));
		
		/*
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("repartition_malade_hospitalise_du_".$premier.' au '.$dernier.".pdf",array('attachment'=>0));
		// }
		*/
	}

	public function indicateur_hospitalier($premier,$dernier)
	{
		
		
			$this->load->view('impression/indicateur_hospitalier', array("$premier"=>$premier,"$dernier"=>$dernier));
			
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("indicateur_hospitalier_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}
	
	public function csi_pmae_hopitaus_de_base($premier,$dernier)
	{
		
		$this->load->view('impression/indicateur_hospitalie_csi_pmae_hopitaus_de_base', array("premier"=>$premier,"dernier"=>$dernier));
		
		
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("csi_pmae_hopitaus_de_base_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
	
	}

	public function consultation_externe($premier,$dernier)
	{
		
		$this->load->view('impression/indicateur_hospitalie_consultations_externes', array("premier"=>$premier,"dernier"=>$dernier));
			
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("consultation_externe_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
	// }
		
	}

	public function activite_chirurgie($premier,$dernier)
	{

		$this->load->view('impression/activites_de_chirurgie', array("premier"=>$premier,"dernier"=>$dernier));
		
		//chargement de HTML
		$html=$this->output->get_output();
		
		//chargement de la librairie pdf
		$this->load->library('pdf');
		
		//chargement du contenu HTML
		$this->dompdf->loadHTML($html);
		
		//setup paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		//render HTML as PDF
		$this->dompdf->render();
		
		//output PDF
		$this->dompdf->stream("activite_de_chirurgie_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		
	}

	public function activite_radiologie($premier,$dernier)
	{
		
			$this->load->view('impression/activites_de_radiologie', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("activites_de_radiologie".$premier.' au '.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}

	public function activite_laboratoire($premier,$dernier)
	{
			$this->load->view('impression/activites_de_laboratoire', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("activites_de_laboratoire".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}
	
	public function consultation_femme_enceintes($premier,$dernier)
	{
		
			$this->load->view('impression/consultation_femme_enceintes_malades_selon_leur_age_et_age_grossesse', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("consultation_femme_enceintes_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}

	public function mortalite_maternelle()
	{
		$data = $this->input->post();
		
		$premier = $data['premierJour'];
		$dernier = $data['dernierJour'];
		// $premier = "2019-02-02";
		// $dernier = "2019-02-02";
		
		// var_dump($premier);
		// if(!isset($id)){
			// return redirect();
		// }
		// else{
			$this->load->view('impression/mortalite_maternelle_par_age_et_cause_de_deces', array("$premier"=>$premier,"$dernier"=>$dernier));
			/*
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("repartition_malade_hospitalise_du_".$premier.' au '.$dernier.".pdf",array('attachment'=>0));
		// }
		*/
	}

	public function rapport_entree_medicaments($premier,$dernier)
	{
		
			$this->load->view('impression/rapport_entree_medicaments', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("rapport_entree_medicaments_du".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}

	public function consultation_femme_post_natal($premier,$dernier)
	{
		
			$this->load->view('impression/consultation_femme_post_natal_selon_age', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("consultation_femme_post_natal_selon_age_du".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}

	public function gestion_des_medicaments($premier,$dernier)
	{
		
			$this->load->view('impression/gestion_des_medicaments', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("repartition_malade_hospitalise_du_".$premier.' au '.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}

	public function gestion_du_personnel($premier,$dernier)
	{
		
			$this->load->view('impression/gestion_du_personnel', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("repartition_malade_hospitalise_du_".$premier.' au '.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}
	
	public function examen_abdominal($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_abdominal', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_abdominal".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function examen_pelvien($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_pelvien', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_pelvien".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function examen_perineal($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_perineal', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_perineal".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function examen_vaginal($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_vaginal', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_vaginal".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function examen_rectal($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_rectal', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_rectal".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function examen_echographique($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_echographique', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_echographique".$id.".pdf",array('attachment'=>0));
		}
	}

	public function examen_senologique($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_senologique', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_senologique".$id.".pdf",array('attachment'=>0));
		}
	}
	
	
	public function compteur_actes_medicaux($premier, $dernier)
	{			
			$data = $this->input->post();
	
			// $premier = $data['premierJour'];
			// $dernier = $data['dernierJour'];
		
			$this->load->view('impression/compteur_actes', array("premier"=>$premier,"dernier"=>$dernier));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("compteur_du_".$premier.'_au_'.$dernier.".pdf",array('attachment'=>0));
		// }
		
	}
	
	
	
	/*
		Fabrice
	*/
	
		public function examen_echographique_1($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_echographique_1', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_echographique_1".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function examen_echographique_2($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_echographique_2', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_echographique_2".$id.".pdf",array('attachment'=>0));
		}
	}
	
	public function examen_echographique_3($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/examen_echographique_3', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("examen_echographique_3".$id.".pdf",array('attachment'=>0));
		}
	}
	
	
	public function passage_hospitalisation($id)
	{
		if(!isset($id)){
			return redirect();
		}
		else{
			$this->load->view('impression/passage_hospitalisation', array("id"=>$id));
			
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			$this->dompdf->setPaper('A4', 'portrait');
			
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("passage_hospitalisation".$id.".pdf",array('attachment'=>0));
		}
	}

	public function resultat_echoa($id)
	{
		if (!isset($id)) {
			return redirect();
		} else {
			$this->load->view('impression/resultat_echoa', array("id" => $id));

			//chargement de HTML
			$html = $this->output->get_output();

			//chargement de la librairie pdf
			$this->load->library('pdf');

			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);

			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');

			//render HTML as PDF
			$this->dompdf->render();

			//output PDF
			$this->dompdf->stream("resultat_echoa" . $id . ".pdf", array('attachment' => 0));
		}
	}

	public function resultat_echob($id)
	{
		if (!isset($id)) {
			return redirect();
		} else {
			$this->load->view('impression/resultat_echob', array("id" => $id));

			//chargement de HTML
			$html = $this->output->get_output();

			//chargement de la librairie pdf
			$this->load->library('pdf');

			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);

			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');

			//render HTML as PDF
			$this->dompdf->render();

			//output PDF
			$this->dompdf->stream("resultat_echob" . $id . ".pdf", array('attachment' => 0));
		}
	}

	public function resultat_echoc($id)
	{
		if (!isset($id)) {
			return redirect();
		} else {
			$this->load->view('impression/resultat_echoc', array("id" => $id));

			//chargement de HTML
			$html = $this->output->get_output();

			//chargement de la librairie pdf
			$this->load->library('pdf');

			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);

			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');

			//render HTML as PDF
			$this->dompdf->render();

			//output PDF
			$this->dompdf->stream("resultat_echoc" . $id . ".pdf", array('attachment' => 0));
		}
	}

	public function resultat_echod($id)
	{
		if (!isset($id)) {
			return redirect();
		} else {
			$this->load->view('impression/resultat_echod', array("id" => $id));

			//chargement de HTML
			$html = $this->output->get_output();

			//chargement de la librairie pdf
			$this->load->library('pdf');

			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);

			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');

			//render HTML as PDF
			$this->dompdf->render();

			//output PDF
			$this->dompdf->stream("resultat_echod" . $id . ".pdf", array('attachment' => 0));
		}
	}

	public function resultat_echoe($id)
	{
		if (!isset($id)) {
			return redirect();
		} else {
			$this->load->view('impression/resultat_echoe', array("id" => $id));

			//chargement de HTML
			$html = $this->output->get_output();

			//chargement de la librairie pdf
			$this->load->library('pdf');

			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);

			//setup paper size and orientation

			$this->dompdf->setPaper('A4', 'portrait');

			//render HTML as PDF
			$this->dompdf->render();

			//output PDF
			$this->dompdf->stream("resultat_echoe" . $id . ".pdf", array('attachment' => 0));
		}
	}
	
	
	
	
	
	
	
	//RABY
	public function enssembleExam()
	{
		
		

		$data = $this->input->post();
		//var_dump($data);
		 $this->rapportLaboEnsemble($data);
		/*$pat = explode('-/-', $data['id'][0]);
		
		
		$cout = array();
		$patient = $this->md_patient->recup_patient($pat[1]);
		echo '
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card all-patients">
						<div class="body">
							<div class="row">
								<div class="col-md-9 col-sm-9 m-b-0">
									<h5 class="m-b-0">'.$patient->pat_sNom.' '.$patient->pat_sPrenom.'</h5> 
								</div>
								<div class="col-md-3 col-sm-3 m-b-0">
									<address class="m-b-0">
										<abbr title="Numéro matricule patient">ID: '.$patient->pat_sMatricule.'</abbr>
								   </address>               
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
		// die();
		// $nombre = count($data["id"]);
		echo '
			<table class="table table-bordered table-striped table-hover" style="margin-top:-15px">
				<thead>
					<tr>
						<th>Acte médical</th>
						<th>Coût de l\'acte</th>
						<th colspan="2">Date</th>
					</tr>
				</thead>
			   
				<tbody>';
					for($i=0;$i<count($data["id"]);$i++){
						$acmId = explode('-/-', $data['id'][$i]);
						if($acmId[1] == $pat[1]){
							
						
						
						$recupAct = $this->md_patient->acm_medical_pat($acmId[0], $pat[1]);
						// var_dump($recupAct);
						if(!is_null($recupAct->lac_id)){
							$l = $this->md_patient->liste_element_caisse_ajax($acmId[0]);
							if(is_null($recupAct->acm_sDent)){
								$dent = "";
							}
							else{
								$dent = " - ".$recupAct->acm_sDent;
							}
							$cout[] = $l->lac_iCout;
							$lib = $l->lac_sLibelle.$dent;
							$val = $l->lac_id;
							$som = $l->lac_iCout;
							$dur = $l->lac_iDure;
						}
						else{
							$cout[] = $recupAct->acm_iCoutHos;
							$lib = "Séjour occupation du lit";
							$val = 0;
							$som = $recupAct->acm_iCoutHos;
							$dur = 0;
						}
						echo '<tr>
								<td>
									'.$lib.'
									<input type="hidden" name="lac[]" value="'.$val.'"/>
									<input type="hidden" name="somme[]" value="'.$som.'"/>
									<input type="hidden" name="duree[]" value="'.$dur.'"/>
									<input type="hidden" name="acm[]" value="'.$acmId[0].'"/>
								</td>
								<td>
									'.number_format($som,0,",",".").' <small>FCFA</small>
								</td>
							
								<td>
									'.$this->md_config->affDateTimeFr($recupAct->acm_dDate).'
								</td>
								<td>
									<i class="fa fa-check text-success" style="font-size:22px"></i>
								</td>
							</tr>';
					 }}
				echo '</tbody>
					  <tfooter>
							<tr>
								<th>
									
								</th>
								<th colspan="2" class="text-right">
									<span class="pull-left">Total à payer</span>
									<span class="pull-right">'.number_format(array_sum($cout),0,",",".").' <small>FCFA<small></span>
									<input id="total" name="total" type="hidden" value="'.array_sum($cout).'"/>
								</th>
								<th></th>
							</tr>
					  </tfooter>
			</table>';
			
		echo '
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card all-patients">
						<div class="body">
						
							<div class="row" id="other2" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Autre montant ? </p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="othermont" name="choix" style="width:100%;padding:5px">
										<option value="Non">Non</option>
										<option value="Oui">Oui</option>
									</select>              
								</div>
								<br>
							</div>		

							<div class="row cacher" id="other" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Montant accordé *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
							';

								echo '<input id="othermontt" min="0" type="text" name="other" style="width:100%;"/>';
							echo '
								</div>
								<br>
							</div>
							
							
							<div class="row" id="assureur2" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Assurance ? </p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="ass" name="choix" style="width:100%;padding:5px">
										<option value="Non">Non</option>
										<option value="Oui">Oui</option>
									</select>              
								</div>
								<br>
							</div>
							
							<div class="row cacher" id="assureur" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Nom de l\'assureur *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="selectAssureur" name="ass" style="width:100%;padding:5px">
										<option value="">---- Choisissez l\'assureur * ----</option>
							';
								$assureur=$this->md_parametre->liste_assureurs_actifs();
								foreach($assureur AS $a){
									echo '<option value="'.$a->ass_id.'">'.$a->ass_sLibelle.'</option>';
								}
							echo '
									</select>              
								</div>
								<br>
							</div>
							<div class="row cacher" id="assurance"  style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Pourcentage *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="selectAssurance" name="tas" style="width:100%;padding:5px">
										<option value="">---- Choisissez le type d\'assurance * ----</option>
								';
								$type=$this->md_parametre->liste_type_couverture_assurance_actifs();
								foreach($type AS $t){
									echo '<option value="'.$t->tas_id.'">'.$t->tas_iTaux.' %</option>';
								}
							echo '
									</select>              
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 m-b-0" id="retourCharge">
									<input type="hidden" id="resteDeduc" value="'.array_sum($cout).'"/>
								</div>
							</div>
							

							
							
							<div class="row" id="reduction2" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Réduction ? </p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="red" name="red" style="width:100%;padding:5px">
										<option value="Non">Non</option>
										<option value="Oui">Oui</option>
									</select>              
								</div>
								<br>
							</div>
							
							<div class="row cacher" id="reduction" style="margin-bottom:10px">
								<div class="col-md-3 col-sm-3 m-b-0">
									<p>Pourcentage *</p> 
								</div>
								<div class="col-md-7 col-sm-7 m-b-0">
									<select id="selectMotif" name="reduction" style="width:100%;padding:5px">
							';
								$motif=$this->md_parametre->liste_motifs_reduction();
								echo '<option value="">-- sélectionner le pourcentage --</option>';
								foreach($motif AS $m){
									
									echo '<option value="'.$m->mod_id.'-/-'.$m->mod_iTaux.'">'.$m->mod_iTaux.' %</option>';
								}
								echo '
									</select>              
								</div>
								<br>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 m-b-0" id="retourReduction">
									
								</div>								
							</div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 m-b-0">
									<hr>
								</div>
							</div>							
							<input type="hidden" name="patient" value="'.$pat[1].'"/>
							<input type="hidden" name="taux" id="taux" value="0"/>
							<input type="hidden" name="montantReduc" id="montantReduc" value="0"/>
						</div>
						<input type="hidden" name="iostesso" id="iostesso" value="0"/>
						<input type="hidden" name="iost2" id="iost2" value="0"/>
					</div>
				</div>
			</div>';
			echo '<script src="'.base_url('assets/js/caisse.js').'"></script>';
			echo '<script src="'.base_url('assets/js/select2.min.js').'"></script>';			
			{ ?>
				<script>		
					$("select#medPrst").select2({
						placeholder: "-- Sélectionner le médecin prescripteur --",
						allowClear: true
					});	
				</script>
			<?php }*/
	}
	
	public function rapportLaboEnsemble($data)
	{
		if(!isset($data)){
			return redirect("laboratoire/examens_faits");
		}
		else{
			$this->load->view('impression/laboratoire_plus', array("data"=>$data));
			//var_dump($_GET["param"]);
			//$pat = explode('-/-', $data['id'][0]);
			//chargement de HTML
			$html=$this->output->get_output();
			
			//chargement de la librairie pdf
			$this->load->library('pdf');
			$this->dompdf->loadHTML('<h1>je suis raby</h1>');
			//chargement du contenu HTML
			$this->dompdf->loadHTML($html);
			
			//setup paper size and orientation
			// $this->dompdf->setPaper('A7', 'portrait');//recu_pharmacie
			$this->dompdf->setPaper('A4', 'portrait'); //courrier;dossier_medical;fiche_personnel;laboratoire;liste-inventaire-stock;hospitalisation
			// $this->dompdf->setPaper('A5', 'portrait');//ordonnance;acte_de_deces;acte_de_naissance;consultation;imagerie
			// $this->dompdf->setPaper('A5', 'portrait');//acte_de_naissance
			$options = $this->dompdf ->getOptions();
			$options->setIsHtml5ParserEnabled(true);
			$this->dompdf->setOptions($options);
			//render HTML as PDF
			$this->dompdf->render();
			
			//output PDF
			$this->dompdf->stream("resultat_laboratoire.pdf",array('attachment'=>0));
			
			return redirect("laboratoire/examens_faits");
			
		}
	}
	//RABY
	
}

