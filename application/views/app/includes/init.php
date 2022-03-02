<?php $acm = $this->md_patient->acm_patient($acm_id); ?>
<?php $patient = $this->md_patient->recup_patient($acm->pat_id); ?>
<?php $constante = $this->md_patient->constante($acm_id); ?>
<?php $information = $this->md_patient->information($acm->pat_id); ?>
<?php $ListeConst = $this->md_patient->liste_constante($acm_id); ?>
<?php $consultation = $this->md_patient->consultation($acm_id); ?>
<?php $liste = $this->md_patient-> sejour_acm($acm_id); ?>
<?php $listeMed = $this->md_pharmacie->liste_medicament(); ?>
<?php $listeExamen = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>
<?php $listeUnite = $this->md_parametre->liste_unites_actifs(); ?>
<?php $listeMaladie = $this->md_patient->liste_maladie_actifs(); ?>
<?php $listeActeLabo = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>
<?php $perso = $this->md_parametre->liste_antecedent_personnel_actifs(); ?>
<?php $fam = $this->md_parametre->liste_antecedent_familial_actifs(); ?>
<?php $aller = $this->md_parametre->liste_allergie_actifs(); ?>
<?php $prof = $this->md_parametre->liste_activite_professionnelle_actifs(); ?>
<?php $listeEncours = $this->md_patient->liste_acm_dossier_patient($acm->pat_id,date("Y-m-d H:i:s")); ?>

<?php if(isset($avs)){$avis = $this->md_patient->avis($avs);$recupAvis = $this->md_patient->avis($avs);};?>
<?php $rdv = $this->md_rdv->liste_de_mes_rdv();$odij = date("Y-m-d"); $heure = date("H:i:s") ;?>

<?php $listeExamenCardio = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>
<?php $listeExamenRhum = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>
<?php $listeExamenGyne = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>
<?php $listeExamenGyneObs = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>
<?php $listeExamenGyneNeuro = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>
<?php $listeExamenGynePneu = $this->md_parametre->liste_acts_services_actifs($user->ser_id); ?>

<?php $listeAvisEncours = $this->md_patient->liste_avis_encours(date("Y-m-d H:i:s"),$user->ser_id);?>




<?php $patDeces = $this->md_patient->patient_decede($acm->pat_id); ?>
<?php $listespecificationmal = $this->md_parametre->liste_specification_maladie_actifs(); ?>
<?php $planing = $this->md_patient->panning_operation(); ?>
<?php $acte = $this->md_parametre->liste_acts_actifs(); ?>


