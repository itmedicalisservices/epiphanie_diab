
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php //$patient = $this->md_patient->recup_patient($id); ?>
<?php //$ante = $this->md_patient->liste_antecedant($id); ?>
<?php //$liste = $this->md_patient->liste_contacts($id); ?>
<?php //$patDeces = $this->md_patient->patient_decede($id); ?>
<?php //$infoComp = $this->md_patient->information($id); ?>
<?php //$antFam = $this->md_patient->antecedants_familiaux($id); ?>
<?php //$antPer = $this->md_patient->antecedants_personnels($id); ?>
<?php //$allergie = $this->md_patient->allergies_connues($id); ?>
<?php //$activite = $this->md_patient->activites_professionnelles($id); ?>
<?php //$charge = $this->md_patient->renseignement_prise_en_charge($id); ?>
<?php //$listeEncours = $this->md_patient->liste_acm_encours_patient(date("Y-m-d H:i:s"),$id); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$acm = $this->md_patient->acm_patient($id);
$patient = $this->md_patient->recup_patient($id);
$patient_conventionne = $this->md_patient->patient_conventionne($patient->cpa_id); 
$ord = $this->md_patient->recup_ordonnance($id); 
$diagnostique = $this->md_patient->diagnostic($id);
$deces = $this->md_patient->cas_deces_dossier_medical($id);
$operation = $this->md_patient->operation_sejour($id);
$abdominal = $this->md_patient->examen_abdominal_dossier_medical($id);
$perineal = $this->md_patient->examen_perineal_dossier_medical($id);
$exam_vaginal = $this->md_patient->examen_vaginal_dossier_medical($id);
$listeHyd = $this->md_patient->recup_hypothese($id);
$listeRed = $this->md_patient->recup_diagnostic_retenue($id);
$actes_medicaux_patient = $this->md_patient->liste_actes_medicaux_patient($id);


/* foreach($actes_medicaux_patient AS $id_sejours)
{
	// $identifiants_sejours = $id_sejours->sea_id;
	// var_dump($id_sejours->sea_id);
	// $element = $this->md_patient->element_ordonnance_sejour($id_sejours->sea_id);
	// $gyne_obs_e = $this->md_patient->gyneco_e_dossier_medical($id_sejours->sea_id);
	// $soins = $this->md_patient->soins_infirmiers_sejour($id_sejours->sea_id);
	// $reeducation = $this->md_patient->reeducation_sejour_dossier_medical($id_sejours->sea_id);
	// $hospitalisation = $this->md_patient->hospitalisation_sejour_dossier_medical($id_sejours->sea_id);
	// $constantes = $this->md_patient->constante_sejour_dossier_medical($id_sejours->sea_id);
	// $laboratoire = $this->md_patient->laboratoire_sejour($id_sejours->sea_id);
	// $consultation = $this->md_patient->consultation_sejour_dossier_medical($id_sejours->sea_id);
	// $imagerie = $this->md_patient->acte_imagerie_sejour_dossier_medical($id_sejours->sea_id);
	// $exploration = $this->md_patient->acte_exploration_sejour_dossier_medical($id_sejours->sea_id);
	// $nouveau_ne = $this->md_patient->nouveau_sejour_dossier_medical($id_sejours->sea_id);
	// $exam_rectal = $this->md_patient->examen_rectal_dossier_medical($id_sejours->sea_id);
	// $pelvien = $this->md_patient->examen_pelvien_sejour($id_sejours->sea_id);
	// $echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
	// $chirurgie = $this->md_chirurgie->operation_planifiee_dossier_medical($id_sejours->sea_id);
	// var_dump($id_sejours->sea_id, $element, $soins, $c);
	$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
	
	foreach($senologie as $ese) {
		var_dump($ese);
	}
	
	
} 

die(); */

$antecedent = $this->md_patient->antecedent_patient($id);

$identifiant;

if(is_object($antecedent)){
	$identifiant = $antecedent->pat_id;
}else{
	$identifiant = 0;
}
$liste_1 = $this->md_patient->liste_antecedant_personnel_patient($identifiant);
$liste_2 = $this->md_patient->liste_antecedant_familial_patient($identifiant); 
$liste_3 = $this->md_patient->liste_allergie_patient($identifiant); 
$liste_4 = $this->md_patient->liste_activite_professionnelle_patient($identifiant);

// var_dump($antecedent, $liste_1, $liste_2, $liste_3, $liste_4);
// die();
$hcon = $this->md_patient->recup_historique_con($patient->pat_id); 
$hcsl = $this->md_patient->recup_historique_csl($patient->pat_id); 
$hcsh = $this->md_patient->recup_historique_csh($patient->pat_id); 
$hord = $this->md_patient->recup_historique_ord($patient->pat_id); 

?>

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DETAILS DOSSIER PATIENT : <?php echo $patient->pat_sCivilite;?> <?php echo $patient->pat_sNom;?> <?php echo $patient->pat_sPrenom;?></h2>
            <small class="text-muted">Épiphanie, votre application de gestion hospitalière</small>
        </div>  

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h1 class="text-center"><b>DOSSIER MEDICAL</b></h1>
                    </div>
                    <div class="body" style="padding:0">
						<div class="body table-responsive">
							<table id="" class="table table-bordered">
								<thead>
									<tr>
										<td colspan="9">
											<h5 style="float:left" class="mb-0 mt-3">
												<b>
													DOSSIER N° : <?php echo substr($patient->pat_sMatricule,4);?> (<a href="#<?php echo site_url("impression/dossier_medical_passage/".$patient->pat_id); ?>">imprimer le dossier complet</a>)
												</b>
											</h5>
											<h5 style="float:right" class="mb-0 mt-3"><b>DATE CREATION : <?php echo substr($this->md_config->affDateTimeFr($patient->pat_dDateEnreg),3); ?></b></h5>
										</td>
									</tr>				
									<tr>
										<td align="center" colspan="9"><h5 class="mb-0 mt-3"><b>IDENTITE DU PATIENT</b></h5></td>
									</tr>									
								</thead>
								<tbody>
									<tr>
										<td align="center" colspan="9">
											<img style="width:100px;height:80px" src="<?php echo base_url($patient->pat_sAvatar);?>" class="img-fluid" alt="">
										</td>
									</tr>									
									<tr>
										<td align="left" colspan="3"><b>IDENTIFIANT :</b> <?php echo $patient->pat_sMatricule;?></td>
										<td align="left" colspan="3"><b>NOM(S) :</b> <?php echo $patient->pat_sNom;?> </td>
										<td align="left" colspan="3"><b>PRENOM(S) :</b> <?php echo $patient->pat_sPrenom;?></td>
									</tr>									
									<tr>
										<td align="left" colspan="3"><b>SEXE : <?php if($patient->pat_sSexe=="H"){echo "M";}else{echo "F";}?></b> </td>
										<td align="left" colspan="3"><b>DATE DE NAIS. :</b> <?php echo $this->md_config->affDateFrNum($patient->pat_dDateNaiss); ?></td>
										<td align="left" colspan="3"><b>PROFESSION : <?php if(is_null($patient->pat_sProfession)){echo '<em>Non renseigné</em>';}else{echo $patient->pat_sProfession;};?></b> </td>
									</tr>									
									<tr>
										<td align="left" colspan="3"><b>SITUATION FAMILLIALE : <?php echo $patient->pat_sSituationMat;?></b></td>
										<td align="left" colspan="3"><b>TEL 1 : <?php echo $patient->pat_sTel;?></b> </td>
										<td align="left" colspan="3"><b>TEL 2 : <?php if(is_null($patient->pat_sOtherPhone)){echo '<em>Non renseigné</em>';}else{echo $patient->pat_sOtherPhone;};?></b> </td>
									</tr>									
									<tr>
										<td align="left" colspan="3"><b>NATIONALITE :</b> <?php if(is_null($patient->pat_sNatio)){echo '<em>Non renseignée</em>';}else{echo $patient->pat_sNatio;};?></td>
										<td align="left" colspan="6"><b>ADRESSE :</b> <?php if(is_null($patient->pat_sAdresse)){echo '<em>Non renseignée</em>';}else{echo $patient->pat_sAdresse;};?></td>
									</tr>

									<tr>
										<td align="center" colspan="9"><h5 class="mb-0 mt-3"><b>INFORMATIONS COMPLEMENTAIRES</b></h5></td>
									</tr>												
					
									<tr>
										<td width="35%" align="left" colspan="3"><b>ACTIVITE(S) PROFESSIONNELLE(S) :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sActP)){echo '<em>Non renseignée</em>';}else{echo $antecedent->inc_sActP;};}else{echo '<em>Non renseignée</em>';};?></td>
										<td width="35%" align="left" colspan="3"><b>ACTIVITE(S) QUOTIDINNE(S) :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sActQ)){echo '<em>Non renseignée</em>';}else{echo $antecedent->inc_sActQ;};}else{echo '<em>Non renseignée</em>';};?></td>
										<td width="35%" align="left" colspan="3"><b>ANTECEDENTS PERSONNELS :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sEntP)){echo '<em>Non renseigné</em>';}else{echo $antecedent->inc_sEntP;};}else{echo '<em>Non renseigné</em>';};?></td>
									</tr>									
									<tr>
										<td align="left" colspan="3"><b>ANTECEDENTS FAMILLIAUX :</b></br></td>
										<td align="left" colspan="3"><b>ANTECEDENTS MEDICAUX :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sEntF)){echo '<em>Non renseigné</em>';}else{echo $antecedent->inc_sEntF;};}else{echo '<em>Non renseigné</em>';};?></td>
										<td align="center" colspan="3"><b>ANTECEDENTS CHIRURGICAUX :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sEntC)){echo '<em>Non renseigné</em>';}else{echo $antecedent->inc_sEntC;};}else{echo '<em>Non renseigné</em>';};?></td>
									</tr>									
									<tr>
										<td align="left" colspan="3"><b>ANTECEDENTS GYNECO-OBSTETRICAUX :</b></br><?php if($antecedent){if(is_null($antecedent->inc_sEntG)){echo '<em>Non renseigné</em>';}else{echo $antecedent->inc_sEntG;};}else{echo '<em>Non renseigné</em>';};?></td>
										<td align="left" colspan="3"><b>ALLERGIES :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sAller)){echo '<em>Non renseigné</em>';}else{echo $antecedent->inc_sAller;};}else{echo '<em>Non renseigné</em>';};?></td>
										<td align="center" colspan="3"><b>GROUPE SANGUIN :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sSang)){echo '<em>Non renseigné</em>';}else{echo $antecedent->inc_sSang;};}else{echo '<em>Non renseigné</em>';};?></td>
									</tr>									
									<tr>
										<td align="left" colspan="9"><b>DATE DECOUVERTE DIABETE :</b></br> <?php if($antecedent){if(is_null($antecedent->inc_sAller)){echo '<em>Non renseigné</em>';}else{echo $antecedent->inc_sAller;};}else{echo '<em>Non renseigné</em>';};?></td>
									</tr>
								</tbody>
							</table>							
							
						</div>
                    </div>
					
					
					
						<div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
							<table id="" class="table table-bordered">
								<thead>
									<tr>
										<td align="center" colspan="9">
											<div class="panel panel-col-grey">
												<div class="panel-heading" role="tab" id="headingOne_17">
													<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="true" aria-controls="collapseOne_17" style="font-size:14px"><b>HISTORIQUE PRISE DE CONSTANTES</b> </a> </h4>
												</div>
												<div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_17">
													<div class="panel-body"  style="padding:0"> 
														<div class="body" style="padding:0;">
															<div class="table-responsive">
																<table id="" class="table table-bordered">
																	<thead>
																		<tr>
																			<td style="padding-bottom:0;border-bottom:1px solid white" align="center" colspan="9"><h5 style="margin-bottom:0;"><b>PRISE DES CONSTANTES</b></h5></td>
																		</tr>							
																		<tr>
																			<td style="padding:0" align="left" colspan="9">(<a href="#">impression complète des constantes</a>)</td>
																		</tr>									
																		<tr>
																			<td align="center"><b>Date</b></td>
																			<td align="center"><b>Tension(mmHg)</b></td>
																			<td align="center"><b>Poids (KG)</b></td>
																			<td align="center"><b>Taille (CM)</b></td>
																			<td align="center"><b>Glycémie (G/L)</b></td>
																			<td align="center"><b>Température (°C)</b></td>
																			<td align="center"><b>Corps Cétonique</b></td>
																			<td align="center"><b>Action</b></td>
																		</tr>												
																	</thead>
																	<tbody>
																	<?php if(empty($hcon)){echo '<tr><td colspan="8"><em>Aucune donnée trouvée !</em></td></tr>';}else{ foreach($hcon AS $h){?>
																		<tr align="center">
																			<td align="left" colspan=""><?php echo substr(substr($this->md_config->affDateTimeFr($h->con_dDate),3),0,-11); ?></td>
																			<td align="left" colspan=""><?php echo $h->con_iTensionSys.'/'.$h->con_iTensionDia;?></td>
																			<td align="left" colspan=""><?php echo $h->con_fPoids;?></td>
																			<td align="left" colspan=""><?php echo $h->con_fTaille;?></td>
																			<td align="left" colspan=""><?php echo $h->con_iGlmie;?></td>
																			<td align="left" colspan=""><?php if(is_null($h->con_iTemperature)){echo '<em>Non renseignée</em>';}else{echo $h->con_iTemperature;};?></td>
																			<td align="left" colspan=""><?php if(is_null($h->con_sCetonique)){echo '<em>Non renseignée</em>';}else{echo $h->con_sCetonique;};?></td>
																			<td style="vertical-align:middle" align="center" rowspan="2"><a href="#<?php //echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a></td>
																		</tr>	
																		<?php if(!is_null($h->con_sObs)){?>
																		<tr>
																			<td align="left" colspan="7"><b>Observations :</b></br><?php echo $h->con_sObs;?></td>
																		</tr>
																		<?php }?>
																	<?php }}?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td align="center" colspan="">
											<div class="panel panel-col-blue-grey">
												<div class="panel-heading" role="tab" id="headingTwo_17">
													<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false"
															   aria-controls="collapseTwo_17" style="font-size:14px"> <b>HISTORIQUE PRESCRIPTIONS</b></a> </h4>
												</div>
												<div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
													<div class="panel-body"  style="padding:0"> 
														<div class="body" style="padding:0;">
															<div class="table-responsive">
																	<table id="" class="table table-bordered">
																		<thead>
																			<tr>
																				<td style="padding-bottom:0;border-bottom:1px solid white" align="center" colspan="9"><h5 style="margin-bottom:0;"><b>ORDONNANCES</b></h5></td>
																			</tr>							
																			<tr>
																				<td style="padding:0" align="left" colspan="9">(<a href="#">impression complète des ordonnances</a>)</td>
																			</tr>									
																			<tr>
																				<td width="20%" align="center"><b>Date</b></td>
																				<td width="12%" align="center"><b>Numéro</b></td>
																				<td align="center"><b>Détails</b></td>
																				<td width="10%" align="center"><b>Action</b></td>
																			</tr>												
																		</thead>
																		<tbody>
																		<?php if(empty($hord)){echo '<tr><td colspan="4"><em>Aucune donnée trouvée !</em></td></tr>';}else{foreach($hord AS $ho){?>
																			<tr>
																				<td  style="vertical-align:middle" align="center" colspan=""><?php echo substr($this->md_config->affDateTimeFr($ho->ord_dDate),3);?></td>
																				<td  style="vertical-align:middle" align="center" colspan=""><?php echo 'ORD. N° '.$ho->ord_id;?></td>
																				<td align="left" colspan="" style="padding:0;margin:0">
																					<?php $elt = $this->md_patient->element_ordonnance($ho->ord_id);?>
																					<?php $verif = $this->md_patient->verif_element_ord($ho->ord_id);?>
																					<table width="100%" style="">					
																						<?php if(is_null($verif->elo_sOuvert)){?>
																						<tr>
																							<th style="padding-bottom:0;margin-top:0;border-top:none">#</th>
																							<th style="padding-bottom:0;margin-top:0;border-top:none">Produit</th>
																							<th style="padding-bottom:0;padding-top:0;border-top:none">Posologie</th>
																							<th style="padding-bottom:0;padding-top:0;border-top:none">Durée</th>
																							<th style="padding-bottom:0;padding-top:0;border-top:none">Quantité</th>
																							<th style="padding-bottom:0;padding-top:0;border-top:none">Ren.</th>
																							<th style="padding-bottom:0;padding-top:0;border-top:none">Freq.</th>
																						</tr>
																						<?php }else{?>
																							
																						<?php }?>
																						
																						<?php $cpt=1;foreach($elt AS $e){?>
																							<?php if(is_null($e->elo_sOuvert)){?>
																								<tr style="">
																									<td style="padding-bottom:0;margin-top:0;border:none"><?=$cpt;?></td>
																									<td style="padding-bottom:0;margin-top:0;border:none"><?=$e->elo_sProduit;?></td>
																									<td style="padding-bottom:0;margin-top:0;border:none"><?=$e->elo_sPosologie;?></td>
																									<td style="padding-bottom:0;margin-top:0;border:none"><?=$e->elo_iDuree;?></td>
																									<td style="padding-bottom:0;margin-top:0;border:none">X <?=$e->elo_iQuantite;?></td>
																									<td style="padding-bottom:0;margin-top:0;border:none"><?=$e->elo_sRenew;?></td>
																									<td style="padding-bottom:0;margin-top:0;border:none"><?=$e->elo_sFreq;?></td>
																								</tr>
																							<?php }else{?>
																								<tr>
																									<td style="padding-bottom:0;margin-top:0;border:none"><?=nl2br($e->elo_sOuvert);?></td>
																								</tr>
																							<?php }?>
																						<?php $cpt++;}?>
																					</table>
																				</td>
																				<td style="vertical-align:middle" align="center">
																					<a href="#<?php //echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a> &nbsp;&nbsp;
																				</td>
																			</tr>
																		<?php }}?>
																		</tbody>
																	</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>										
									<tr>
										<td align="center" colspan="">
											<div class="panel panel-col-blue">
												<div class="panel-heading" role="tab" id="headingTwo_17">
													<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTw" aria-expanded="false"
															   aria-controls="collapseTw" style="font-size:14px"> <b>HISTORIQUE CONSULTATIONS (DIABETOLOGIE)</b></a> </h4>
												</div>
												<div id="collapseTw" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
													<div class="panel-body"  style="padding:0"> 
														<div class="body" style="padding:0;">
																<div class="table-responsive">
																	<table id="" class="table table-bordered">
																		<thead>
																			<tr>
																				<td style="padding-bottom:0;border-bottom:1px solid white" align="center" colspan="10"><h5 style="margin-bottom:0;"><b>CONSULTATIONS DIABETOLOGIQUES</b></h5></td>
																			</tr>							
																			<tr>
																				<td style="padding:0" align="left" colspan="10">(<a href="#">impression complète des consultations</a>)</td>
																			</tr>									
																			<tr>
																				<td align="center" colspan="10"><b>CONSULTATIONS DIABETE</b></td>
																			</tr>	
																			<?php if(empty($hcsl)){echo '<tr><td colspan="10"><em>Aucune donnée trouvée !</em></td></tr>';}else{ foreach($hcsl AS $hl){?>
																			<tr align="left">
																				<td style="vertical-align:middle;padding:0;margin:0" align="center" rowspan="3"><b><?php echo substr($hl->csl_dDate,8,2).'/'.substr($hl->csl_dDate,5,2).'/'.substr($hl->csl_dDate,0,4);?></b></td>
																				<td colspan="2"><b>Motif de Consultation:</b></br><?=$hl->csl_sMotif;?></td>
																				<td colspan="2"><b>Examen Clinique:</b></br><?php if(is_null($hl->csl_sObservation)){echo "<em>Néant</em>";}else{echo $hl->csl_sObservation;};?></td>
																				<td colspan="2"><b>Anamnèse:</b></br><?php if(is_null($hl->csl_sAnamnese)){echo "<em>Néant</em>";}else{echo $hl->csl_sAnamnese;};?></td>
																				<td colspan=""><b>R.Syndromique:</b></br><?php if(is_null($hl->csl_sResume)){echo "<em>Néant</em>";}else{echo $hl->csl_sResume;};?></td>
																				<td><b>Diagnostic:</b></br><?php if(is_null($hl->dgq_id)){echo "<i>Néant</i>";}else{ $diagnos = $this->md_parametre->recupDiagnostique($hl->dgq_id); echo $diagnos->dgq_sLib;};?></td>
																				<td style="vertical-align:middle" align="center" rowspan="3"><a href="#<?php //echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a></td>
																			</tr>		
																			<tr align="left">
																				<td><b>Autre Diagnostic:</b></br><?php if(is_null($hl->csl_sOtherDgq)){echo "<em>Néant</em>";}else{echo $hl->csl_sOtherDgq;};?></td>
																				<td><b>Co-morbidité/FDR:</b></br><?php if(is_null($hl->com_id)){echo "<i>Néant</i>";}else{ $com = $this->md_parametre->recupComordite($hl->com_id); echo $com->com_sLib;};?></td>
																				<td><b>Complication micro-vas.:</b></br><?php if(is_null($hl->cmp_iMicro)){echo "<i>Néant</i>";}else{ $cpl = $this->md_parametre->recupComplication($hl->cmp_iMicro); echo $cpl->cmp_sLib;};?></td>
																				<td><b>Complication macro-vas.:</b></br><?php if(is_null($hl->cmp_iMacro)){echo "<i>Néant</i>";}else{ $cpl = $this->md_parametre->recupComplication($hl->cmp_iMacro); echo $cpl->cmp_sLib;};?></td>
																				<td><b>Pied diabétique:</b></br><?php if(is_null($hl->cmp_iPied)){echo "<i>Néant</i>";}else{ $cpl = $this->md_parametre->recupComplication($hl->cmp_iPied); echo $cpl->cmp_sLib;};?></td>
																				<td colspan="2"><b>Autres complications:</b></br><?php if(is_null($hl->csl_sOtherCmp)){echo "<em>Néant</em>";}else{echo $hl->csl_sOtherCmp;};?></td>
																				<td><b>Cas:</b></br><?php if($hl->csl_iRef==0){echo "Non référé";}else{echo "Référé";};?></td>
																			</tr>			
																			<tr align="left">
																				<td colspan="8"><b>Conclusion:</b></br><?php if(is_null($hl->csl_sCcl)){echo "<em>Néant</em>";}else{echo nl2br($hl->csl_sCcl);};?></td>
																			</tr>		
																			<?php }}?>
																		</thead>
												
																		<thead>									
																			<tr>
																				<td align="center" colspan="9"><b>CONSULTATIONS THYROIDE/HYPOPHYSE</b></td>
																			</tr>			
																			<?php if(empty($hcsh)){echo '<tr><td colspan="10"><em>Aucune donnée trouvée !</em></td></tr>';}else{ foreach($hcsh AS $hl){?>
																			<tr align="left">
																				<td style="vertical-align:middle;padding:0;margin:0" align="center" rowspan="3"><b><?php echo substr($hl->csh_dDate,8,2).'/'.substr($hl->csh_dDate,5,2).'/'.substr($hl->csh_dDate,0,4);?></b></td>
																				<td colspan="2"><b>Motif de Consultation:</b></br><?=$hl->csh_sMotif;?></td>
																				<td colspan="2"><b>Examen Clinique:</b></br><?php if(is_null($hl->csh_sObservation)){echo "<em>Néant</em>";}else{echo $hl->csh_sObservation;};?></td>
																				<td colspan="2"><b>Anamnèse:</b></br><?php if(is_null($hl->csh_sAnamnese)){echo "<em>Néant</em>";}else{echo $hl->csh_sAnamnese;};?></td>
																				<td colspan=""><b>R.Syndromique:</b></br><?php if(is_null($hl->csh_sResume)){echo "<em>Néant</em>";}else{echo $hl->csh_sResume;};?></td>
																				<td><b>Tyroide-Diagnostic:</b></br><?php if(is_null($hl->tyr_id)){echo "<i>Néant</i>";}else{ $tyr = $this->md_parametre->recupThyroide($hl->tyr_id); echo $tyr->tyr_sLib;};?></td>
																				<td style="vertical-align:middle" align="center" rowspan="3"><a href="#<?php //echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a></td>
																			</tr>		
																			<tr align="left">
																				<td colspan="2"><b>Autre Tyroide-Diagnostic:</b></br><?php if(is_null($hl->csh_sOtherTyr)){echo "<i>Néant</i>";}else{echo $hl->csh_sOtherTyr;};?></td>
																				<td><b>Hypophyse-Diagnostic:</b></br><?php if(is_null($hl->hyp_id)){echo "<i>Néant</i>";}else{ /*$hyp = $this->md_parametre->recupThyroide($hl->hyp_id);*/$hyp = $this->md_parametre->recupHypophyse($hl->hyp_id); echo $hyp->hyp_sLib;};?></td>
																				<td colspan="2"><b>Autre Hypophyse-Diagnostic:</b></br><?php if(is_null($hl->csh_sOtherHyp)){echo "<i>Néant</i>";}else{echo $hl->csh_sOtherHyp;};?></td>
																				<td><b>Pathologie Endocrinienne:</b></br><?php if(is_null($hl->csh_sEnd)){echo "<i>Néant</i>";}else{echo $hl->csh_sEnd;};?></td>
																				<td><b>Pathologie Metabolique:</b></br><?php if(is_null($hl->csh_sMet)){echo "<i>Néant</i>";}else{echo $hl->csh_sMet;};?></td>
																				<td><b>Pathologie Nutitionnelle:</b></br><?php if(is_null($hl->csh_sNut)){echo "<i>Néant</i>";}else{echo $hl->csh_sNut;};?></td>
																			</tr>			
																			<tr align="left">
																				<td colspan="8"><b>Conclusion:</b></br><?php if(is_null($hl->csh_sCcl)){echo "<em>Néant</em>";}else{echo nl2br($hl->csh_sCcl);};?></td>
																			</tr>		
																			<?php }}?>
																		</tbody>
																	</table>
																</div>
															</div>
													</div>
												</div>
											</div>
										</td>
									</tr>									
									<tr>
										<td align="center" colspan="">
											<div class="panel panel-col-orange">
												<div class="panel-heading" role="tab" id="headingTwo_17">
													<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseDeux" aria-expanded="false"
															   aria-controls="collapseDeux" style="font-size:14px"> <b>HISTORIQUE CONSULTATIONS (LABORATOIRE)</b></a> </h4>
												</div>
												<div id="collapseDeux" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
													<div class="panel-body"  style="padding:0"> 
														<div class="body" style="padding:0;">
															<div class="table-responsive">

															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>									
									<tr>
										<td align="center" colspan="">
											<div class="panel panel-col-red">
												<div class="panel-heading" role="tab" id="headingTwo_17">
													<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseT" aria-expanded="false"
															   aria-controls="collapseT" style="font-size:14px"> <b>HISTORIQUE CONSULTATIONS (CARDIOLOGIE)</b></a> </h4>
												</div>
												<div id="collapseT" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
													<div class="panel-body"  style="padding:0"> 
														<div class="body" style="padding:0;">
															<div class="table-responsive">

															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>									
									<tr>
										<td align="center" colspan="">
											<div class="panel panel-col-green">
												<div class="panel-heading" role="tab" id="headingTwo_17">
													<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseUn" aria-expanded="false"
															   aria-controls="collapseUn" style="font-size:14px"> <b>HISTORIQUE CONSULTATIONS (NEUROLOGIE)</b></a> </h4>
												</div>
												<div id="collapseUn" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
													<div class="panel-body"  style="padding:0"> 
														<div class="body" style="padding:0;">
															<div class="table-responsive">

															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>												
								</thead>
							</table>
						</div>
                </div>
            </div>
			
			
			
			
        </div>
		
		
            </div>
    </div>
</section>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>