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


?>


<!DOCTYPE html>
<html>
	<head>
		<title>Dossier médical</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0px;}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body style="font-family:verdana">
		<div style="padding:5px 30px 0px 30px" >
			<!-- En-tête du reçu -->
			<table style="width:100%; height:50px" >
				<tr>
					<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:100px; height:60px" border="0" /></td>
					<td  align="right" ><img src="<?php echo base_url($patient->pat_sAvatar);?>" style="width:40px; height:40px" border="0" /></td>
				</tr>	
			</table>
			
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">DOSSIER MEDICAL</td>
				</tr>
			</table>
			
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:20px; height:20px; font-weight:bold" align="center">
						<?php if(!is_null($patient_conventionne)): ?>
							Patient conventionné(e) par : <?= $patient_conventionne->cpa_sEnseigne ?>
						<?php else: ?>
							<? = '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</table>
		 <!-- Corps de reçu -->
			<table style="width:100%; height:50px; font-size:12px">
				<tr>
					<td style="width:30%">Dossier N° : <?= $patient->pat_sMatricule ?></td>
					<td style="width:70%" align="right">Date : <?php echo substr($this->md_config->affDateTimeFr($patient->pat_dDateEnreg),0,20); ?></td>
				</tr>
			</table>
		 
			<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
				<thead style="background-color:rgb(11, 172, 244)">
					<th colspan=2>Civilité</th>
					
				</thead>
				<tbody>
					<tr>
						<td>Nom(s): <b> <?php echo $patient->pat_sNom;?> </b></td>
						<td>Prénom : <b><?php echo $patient->pat_sPrenom;?></b></td>
					</tr>
					<tr>
						<td>sexe : <b><?php echo $patient->pat_sSexe;?></b></td>
						<td>ID : <?php echo $patient->pat_sMatricule;?></td>
					</tr>
					<tr>
						<td>Date de naissance : <b> <?php echo $this->md_config->dateEN2FR($patient->pat_dDateNaiss);?></b> </td>
						<td>Profession : <?php echo $patient->pat_sProfession;?> </td>
					</tr>
					<tr>
						<td>Situation familiale : <b><?php echo $patient->pat_sSituationMat;?></b> </td>
						<td>Téléphone : <b><?php echo $patient->pat_sTel;?></b> </td>
					</tr>
					<tr>
						<td colspan=2>Adresse : <?php echo $patient->pat_sAdresse;?></td>
					</tr>
					<tr>
						<td colspan=2>Profession : <?php echo $patient->pat_sProfession;?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<br>
				<div style="width:100%;" >
					<table style="height:15px">
						<tr><strong><br>ACTES MEDICAUX</strong></tr>
					</table>
					
					<?php
						/* foreach($actes_medicaux_patient AS $id_sejours) {
							if(!empty()) { ?>
								
							<?php }
						} */
					?>
					<?php //var_dump($actes_medicaux_patient);?>
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<th colspan="9">Constantes vitales</th>
						</thead>			
						<tbody>
							<tr>
								<td align="center"><strong>Date</strong></td>
								<td align="center"><strong>Température</strong></td>
								<td align="center"><strong>Tension arterielle</strong></td>
								<td align="center"><strong>Poids</strong></td>
								<td align="center"><strong>Taille</strong></td>
								<td align="center"><strong>Pulsations</strong></td>
								<td align="center"><strong>Saturation</strong></td>
								<td align="center"><strong>Diurèse</strong></td>
								<td align="center"><strong>Evaluation</strong></td>
							</tr>
							<?php
								foreach($actes_medicaux_patient AS $id_sejours) {
										$constantes = $this->md_patient->constante_sejour_dossier_medical($id_sejours->sea_id);
													
										foreach($constantes AS $c) {?>
											<tr>
												<td align="center"><?php echo substr($this->md_config->affDateTimeFr($c->con_dDate),0,20); ?></td>
												<td align="center"><?php echo $c->con_iTemperature . '°'; ?></td>
												<td align="center"><?php echo $c->con_iTensionSys; ?>/<?php echo $c->con_iTensionDia . ' mmHg'; ?></td>
												<td align="center"><?php echo $c->con_fPoids . ' Kg'; ?></td>
												<td align="center">
													<?php if($c->con_fTaille < 100): ?>
														<?php echo $c->con_fTaille . ' cm'; ?>
													<?php elseif(is_null($c->con_fTaille)): ?>
														<?= '' ?>
													<?php else: ?>
														<?php echo $c->con_fTaille/100 . ' m'; ?>
													<?php endif; ?>
															</td>
												<td align="center">
													<?php if(!is_null($c->con_fPoulsation)): ?>
														<?php echo $c->con_fPoulsation . ' bpm'; ?>
													<?php else: ?>
														<?= '' ?>
													<?php endif; ?>
												</td>
												<td align="center">
													<?php if(!is_null($c->con_fSaturation)): ?>
														<?php echo $c->con_fSaturation . ' %'; ?>
													<?php else: ?>
														<?= '' ?>
													<?php endif; ?>
												</td>
												<td align="center">
													<?php if(!is_null($c->con_fDierese)): ?>
														<?php echo $c->con_fDierese . ' ml'; ?>
													<?php else: ?>
														<?= '' ?>
													<?php endif; ?>
												</td>
												<td align="center">
													<?php if(!is_null($c->con_fEvaluation)): ?>
														<?php echo $c->con_fEvaluation; ?>
													<?php else: ?>
														<?= '' ?>
													<?php endif; ?>
												</td>
											</tr>
													<?php }
													
												}
							?>
						</tbody>
					</table>
					<br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<th colspan="7">Consultation</th>
						</thead>
						<tbody>
							<tr>
								<td align="center"><strong>Date</strong></td>
								<td align="center"><strong>Motifs de consultation</strong></td>
								<td align="center"><strong>Examen(s) clinique(s)</strong></td>
								<td align="center"><strong>Anamnèse</strong></td>
								<td align="center"><strong>Hypothèse de diagnostic</strong></td>
								<td align="center"><strong>Diagnostic Retenu</strong></td>
								<td align="center"><strong>Résumé syndronique</strong></td>
							</tr>
							<?php
								foreach($actes_medicaux_patient AS $id_sejours)
									{
										$consultation = $this->md_patient->consultation_sejour_dossier_medical($id_sejours->sea_id);
												
										foreach($consultation AS $cons) { ?>
											<tr>
												<td align="center"><?php echo substr($this->md_config->affDateTimeFr($cons->csl_dDate),0,20); ?></td>
												<td><?= $cons->csl_sMotif ?></td>
												<td>
													<?php if(!is_null($cons->csl_sObservation)): ?>
														<?= $cons->csl_sObservation ?>
													<?php else: ?>
														<?= '' ?>
													<?php endif; ?>
												</td>
												<td>
													<?php if(!is_null($cons->csl_sAnamnese)): ?>
														<?= $cons->csl_sAnamnese; ?>
													<?php else: ?>
														<?= '' ?>
													<?php endif; ?>
												</td>
												<td align="center">
													<ul>
														<?php foreach($listeHyd AS $hyd): ?>
															<li><?= $hyd->sma_sLibelle; ?></li>
														<?php endforeach; ?>
													</ul>
												</td>
												<td align="center">
													<ul>
														<?php foreach($listeRed AS $diagnostic): ?>
															<li><?= $diagnostic->sma_sLibelle; ?></li>
														<?php endforeach; ?>
													</ul>
												</td>
												<td>
													<?php if(!is_null($cons->csl_sResume)): ?>
														<?= $cons->csl_sResume ?>
													<?php else: ?>
														<?= '' ?>
													<?php endif; ?>
												</td>
											</tr>
												<?php }
												
											}
										?>
						</tbody>
					</table>
					<br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
							<thead align="center" style="background-color:rgb(167,206,0)">
								<th colspan="3">Antécédents</th>
							</thead>
							<tbody>
								<tr>
									<td align="center"><strong>Date</strong></td>
									<td align="center"><strong>Activité(s) quotidienne(s)</strong></td>
									<td align="center"><strong>Groupe sanguin :</strong></td>
								</tr>
								<tr>
									<td align="center"><?php echo substr($this->md_config->affDateTimeFr($antecedent->inc_dDate),0,20); ?></td>
									<td>
										<?php if (isset($antecedent)) : ?>
											<?php echo $antecedent->inc_sActQ ;?>
										<?php else: ?>
										    <?php echo ''; ?>
										<?php endif; ?>
									</td>
									<td align="center">
										<?php if (isset($antecedent)) : ?>
											<?php echo $antecedent->inc_sSang ;?>
										<?php else: ?>
										    <?php echo ''; ?>
										<?php endif; ?>
									</td>
								</tr>
								
								<?php if (!empty($liste_1)) {?>
									<tr>
										<td colspan="3">
											<strong>Liste des antécédents personnels</strong>
											<ul>
											<?php foreach($liste_1 AS $l){?>
												<li><?=$l->lan_sLibelle;?></li>
											<?php };?>
											</ul>
										</td>
									</tr>
								<?php }?>								
								
								<?php if (!empty($liste_2)) {?>
								<tr>
									<td colspan="3">
									<strong>Liste des antécédents familiaux</strong>
										<ul>
										<?php foreach($liste_2 AS $l){?>
											<li><?=$l->laf_sLibelle;?></li>
										<?php };?>
										</ul>
									</td>
								</tr>
								<?php }?>								
								
								<?php if (!empty($liste_3)) {?>
								<tr>
									<td colspan="3">
									<strong>Liste des allergies</strong>
										<ul>
										<?php foreach($liste_3 AS $l){?>
											<li><?=$l->lia_sLibelle;?></li>
										<?php };?>
										</ul>
									</td>
								</tr>
								<?php }?>								
								
								<?php if(!empty($liste_4)){?>
								<tr>
									<td colspan="3">
									<strong>Liste des activités professionnelles</strong>
										<ul>
										<?php foreach($liste_4 AS $l){?>
											<li><?=$l->lap_sLibelle;?></li>
										<?php };?>
										</ul>
									</td>
								</tr>
								<?php }?>
							</tbody>
					</table>
					<br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<th colspan="5">Ordonnance</th>
						</thead>
						<tbody>
							<tr>
								<td align="center"><strong>Date</strong></td>
								<td align="center"><strong>Produit</strong></td>
								<td align="center"><strong>Qté</strong></td>
								<td align="center"><strong>Posologie</strong></td>
								<td align="center"><strong>Durée</strong></td>
							</tr>
							<?php
								foreach($actes_medicaux_patient AS $id_sejours)
									{
										$element = $this->md_patient->element_ordonnance_sejour($id_sejours->sea_id);
													
										foreach($element AS $e) { ?>
											<tr>
												<td align="center"><?php echo substr($this->md_config->affDateTimeFr($e->ord_dDate),0,20); ?></td>
												<td align="center"><?php echo $e->elo_sProduit ;?></td>
												<td align="center"><?php echo $e->elo_iQuantite ;?></td>
												<td align="center"><?php echo $e->elo_sPosologie ;?></td>
												<td align="center"><?php echo $e->elo_iDuree ;?></td>
											</tr>
											<?php }
													
									}
							?>
						</tbody>
					</table>
					<br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<th colspan="5">Soins infirmiers</th>
						</thead>
						<tbody>
							<tr>
								<td align="center"><strong>Date</strong></td>
								<td align="center"><strong>Actes des soins</strong></td>
								<td align="center"><strong>Service/unité</strong></td>
								<td align="center"><strong>Infirmier(e) traitant(s)</strong></td>
								<td align="center"><strong>Observations</strong></td>
							</tr>
							<?php
								foreach($actes_medicaux_patient AS $id_sejours)
									{
										$soins = $this->md_patient->soins_infirmiers_sejour($id_sejours->sea_id);
													
										foreach($soins AS $s) { ?>
											<tr>
												<td align="center"><?php echo substr($this->md_config->affDateTimeFr($s->soi_dDateFait),0,20) ; ?></td>
												<td align="center"><?php echo $s->lac_sLibelle; ?></td>
												<td><?php echo $s->ser_sLibelle; ?> / <?php echo $s->uni_sLibelle; ?></td>
												<td align="center"><?php echo $s->per_sNom . ' ' . $s->per_sPrenom . '<br>'; ?></td>
												<td><?php echo $s->soi_sObservation; ?></td>
											</tr>
											<?php }
													
									}
							?>
						</tbody>
					</table>
					<br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<th colspan="7">Hospitalisation</th>
						</thead>
						<tbody>
							<tr>
								<td align="center"><strong>Date d'hospitalisation</strong></td>
								<td align="center"><strong>Service</strong></td>
								<td align="center"><strong>Unités</strong></td>
								<td align="center"><strong>Salle</strong></td>
								<td align="center"><strong>Lit</strong></td>
								<td align="center"><strong>Type d'hospitalisation</strong></td>
								<td align="center"><strong>Mode d'éntrée</strong></td>
								
							</tr>
							<?php
								foreach($actes_medicaux_patient AS $id_sejours)
									{
										$hospitalisation = $this->md_patient->hospitalisation_sejour_dossier_medical($id_sejours->sea_id);
												
										foreach($hospitalisation AS $hos) { ?>
											<tr>
												<td align="center"><?php echo $this->md_config->affDateTimeFr($hos->hos_dDate) ; ?></td>
												<td align="center"><?php echo $hos->ser_sLibelle; ?></td>
												<td align="center"><?php echo $hos->uni_sLibelle; ?></td>
												<td align="center"><?php echo $hos->cha_sLibelle; ?></td>
												<td align="center"><?php echo $hos->lit_sLibelle; ?></td>
												<td align="center"><?php echo $hos->hos_sType; ?></td>
												<td align="center"><?php echo $hos->hos_sMotif; ?></td>
											</tr>
										<?php }
												
									}
							?>
						</tbody>
					</table>
					<br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<!-- <th>Examen laboratiore</th> -->
							<th colspan="6">Laboratoire</th>
						</thead>
						<tbody>
							<!-- <tr>
									<td align="center"><strong>Examen(s) à faire</strong></td>
								</tr> -->
							<!-- <tr><td colspan="4" style="height:10px"></td></tr> -->
							<tr style="height:25px;" align="center">
								<th>Date</th>
								<th>Acte de laboratiore</th>
								<th>Eléments analysés</th>
								<th>Valeurs</th>
								<th>Normes</th>
								<th>Observations</th>
							</tr>
							<?php
								foreach($actes_medicaux_patient AS $id_sejours)
									{
										$laboratoire = $this->md_patient->laboratoire_sejour($id_sejours->sea_id);
												
										foreach($laboratoire AS $lab) {
											$resultats_examens_labo = $this->md_laboratoire->liste_element_exament_tube_dossier_medical($lab->ala_id);
													
											foreach($resultats_examens_labo AS $labo) { ?>
												<tr style="height:50px;">
													<td align="center"><?php echo ($this->md_config->dateEN2FR($labo->tan_dDateRapport)); ?></td>
													<td align="center"><?=$labo->lac_sLibelle;?></td>
													<td align="center"><?=$labo->ela_sLibelle;?></td>
													<td align="center"><?= $labo->tan_iValeur . ' ' . $labo->ela_sUnite ;?>
													<td align="center"><?=$labo->ela_iValMin;?> - <?=$labo->ela_iValMax;?></td>
													<td><?=$labo->tan_sRapport;?></td>
												</tr>
													<?php }
												}
												// var_dump($hospitalisation);
												
											}
										?>
										<?php // if(!empty($laboratiore)): ?>
											<?php // foreach($laboratoire AS $e){ ?>
												<!-- <tr style="height:30px">  
													<td><?php // echo $e->mal_sLibelle; ?></td>
												</tr> -->
											<?php // }	?>
										<?php // else: ?>
											<?php // echo ''; ?>
										<?php // endif; ?>
						</tbody>
					</table>
					<br><br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<th colspan="5">Rééducation</th>
						</thead>
							<tbody>
								<tr>
									<td align="center"><strong>Acte de rééducation</strong></td>
									<td align="center"><strong>Date de prescription</strong></td>
									<td align="center"><strong>Nombre de scéance(s)</strong></td>
									<td align="center"><strong>Date de rééducation</strong></td>
									<td align="center"><strong>Observations</strong></td>
								</tr>
								<?php
									foreach($actes_medicaux_patient AS $id_sejours)
										{
											$reeducation = $this->md_patient->reeducation_sejour_dossier_medical($id_sejours->sea_id);
												
											foreach($reeducation AS $red) { ?>
												<tr style="height:30px">  
													<td><?php echo $red->lac_sLibelle; ?></td>
													<td align="center"><?php echo $this->md_config->dateEN2FR($red->sea_dDate); ?></td>
													<?php if($red->ree_iNbPrinscrit == 1): ?>
														<td align="center"><?php echo $red->ree_iNbPrinscrit; ?></td>
													<?php else: ?>
														<td align="center"><?php echo $red->ree_iNbPrinscrit / $red->ree_iNbPrinscrit; ?></td>
													<?php endif; ?>
														<td align="center"><?php echo $this->md_config->dateEN2FR($red->sre_dJour); ?></td>
														<td><?php echo $red->sre_sObservation; ?></td>
												</tr>
											<?php	}
												
											}
										?>
							</tbody>
					</table>
					<br><br>	
					
					<!-- <table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
							<thead align="center" style="background-color:rgb(167,206,0)">
								<th colspan="3">Maladie(s) diagnostiquée(s)</th>
							</thead>
							<tbody>
								<?php // if(!empty($diagnostique)): ?>
									<?php // foreach($diagnostique AS $e){ ?>
										<tr>  
											<td><?php // echo $e->mal_sLibelle; ?></td>
										</tr>
									<?php // } ?>
								<?php // endif; ?>
							</tbody>
					</table>
					<br><br> -->
					
					<?php
						foreach($actes_medicaux_patient AS $id_sejours) {
							$exploration = $this->md_patient->acte_exploration_sejour_dossier_medical($id_sejours->sea_id);
							if(!empty($exploration)) { ?>
								<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="6">Examen exploration</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="6"><strong><u>Indications</u></strong>:</td> 
										</tr>
										<tr>
											<td align="center"><strong>Acte d'exploration</strong></td>
											<td align="center"><strong>Médecin</strong></td>
											<td align="center"><strong>Date de réalisation</strong></td>
											<td align="center"><strong>Images(s)</strong></td>
											<td align="center"><strong>Compte Rendu</strong></td>
											<td align="center"><strong>Conclusion</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$exploration = $this->md_patient->acte_exploration_sejour_dossier_medical($id_sejours->sea_id);
												
												foreach($exploration AS $exp) { ?>
													<tr>  
														<td align="center"><?php echo $exp->lac_sLibelle; ?></td>
														<td align="center">
															<?= $exp->per_sNom !== null ? $exp->per_sNom : ''?>
															<?= $exp->per_sPrenom !== null ? $exp->per_sPrenom : '' ?> (<?= $exp->per_sMatricule !== null ? $exp->per_sMatricule : '' ?>)
														</td>
														<td align="center">
															<?= $exp->aef_dDate !== null ? $this->md_config->affDateTimeFr($exp->aef_dDate) : ''?>
														</td>
														<td style="width:88px;">
															<?php if(!is_null($exp->aef_sImage)): ?>
																<img src="<?php echo base_url($exp->aef_sImage) ;?>" width="287px" height="185px"/>
															<?php else: ?>
																<?php echo ''; ?>
															<?php endif; ?>
														</td>
														<td>
															<?= $exp->aef_sCompteRendu !== null ? $exp->aef_sCompteRendu : ''?>
														</td>
														<td>
															<?= $exp->aef_sConclusion !== null ? $exp->aef_sConclusion : ''?>
														</td>
													</tr>
												<?php }
												
											}
										?>
									</tbody>
								</table>
								<br><br>
							<?php }
						}
					?>
					
					<?php
						if($patient->pat_iFemme == 1 && $patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="1">Déclaration femme enceinte</th>
									</thead>
									
									<tbody> 
										<tr>
											<td align="center"><strong>Enceinte</strong></td>
										</tr>
										<tr>
											<td align="center"><strong>Oui</strong></td>
										</tr>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					<?php
						/* foreach($actes_medicaux_patient AS $id_sejours) {
							if(!empty()) { ?>
								
							<?php }
						} */
					?>
					<?php
						foreach($actes_medicaux_patient AS $id_sejours) {
							$nouveau_ne = $this->md_patient->nouveau_sejour_dossier_medical($id_sejours->sea_id);
							if(!empty($nouveau_ne) && $patient->pat_sSexe == "F") { ?>
								<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="3">Déclaration du nouveau né</th>
									</thead>
									<tbody>
										<tr>
											<td align="center"><strong>Date de naissance</strong></td>
											<td align="center"><strong>Heure de naissance</strong></td>
											<td align="center"><strong>Sexe</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$nouveau_ne = $this->md_patient->nouveau_sejour_dossier_medical($id_sejours->sea_id);
													
												foreach($nouveau_ne AS $nouv) { ?>
													<tr>  
														<td align="center"><?php echo $this->md_config->affDateFrNum($nouv->nne_dDateNaiss); ?></td>
														<td align="center"><?php echo $nouv->nne_tHeureNaiss; ?></td>
														<td align="center"><?php echo $nouv->nne_sSexe; ?></td>
													</tr>
												<?php }
													
												}
											?>
									</tbody>
								</table>
								<br><br>
							<?php }
						}
					?>	
					
					<?php
						if($patient->pat_iEnfant == 1) { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="2">Déclaration enfant malnutri(e)</th>
									</thead>
									
									<tbody> 
										<tr>
											<td align="center"><strong>Enfant malnutri(e)</strong></td>
											<td align="center"><strong>Observations</strong></td>
										</tr>
										<tr>
											<td align="center"><strong>Oui</strong></td>
											<td>Ici, énumérez les différentes obser les observations</td>
										</tr>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					 
					<?php if($patient->pat_sSexe == "F") { ?>
						
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
						<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
								<thead align="center" style="background-color:rgb(167,206,0)">
									<th colspan="7">Examen pelvien</th>
								</thead>
								<tbody>
									<tr>
										<td colspan="7"><strong><u>Indications</u></strong>:</td> 
									</tr>
									<tr>
										<td align="center"><strong>Date</strong></td>
										<td align="center"><strong>Aspect</strong></td>
										<td align="center"><strong>Zone de jonction entre la muqueuse de l’endocol et celle de l’exocol</strong></td>
										<td align="center"><strong>Glaire cervicale</strong></td>
										<td align="center"><strong>Hystéromètrie</strong></td>
										<td align="center"><strong>Calibrage du col</strong></td>
										<td align="center"><strong>Inspection du vagin </strong></td>
									</tr>
									<?php
										foreach($actes_medicaux_patient AS $id_sejours)
										{
											$pelvien = $this->md_patient->examen_pelvien_sejour($id_sejours->sea_id);
											
											foreach($pelvien AS $pel) { ?>
												<tr>
													<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($pel->pee_dDate),0,20); ?></td>
													<td><?= $pel->pee_sAspect ?></td>
													<td><?= $pel->pee_sZone ?></td>
													<td><?= $pel->pee_sGlaire ?></td>
													<td align="center"><?= $pel->pee_sHyst . ' mm' ?></td>
													<td><?= $pel->pee_sCalibrage ?></td>
													<td><?= $pel->pee_sVagin ?></td>
												</tr>
											<?php }
											
										} 
									?>
								</tbody>
						</table>
						<br><br>
						<?php }
					?>
					 
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="6">Examen abdominal</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="6"><strong><u>Masse abdominale</u></strong>:</td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Siège</strong></td>
											<td align="center"><strong>Volume</strong></td>
											<td align="center"><strong>Mobilité</strong></td>
											<td align="center"><strong>Consistance</strong></td>
											<td align="center"><strong>Sensibilité</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$abdominal = $this->md_patient->examen_abdominal_dossier_medical($id_sejours->sea_id);
												
												foreach($abdominal AS $abd) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($abd->abe_dDate),0,20); ?></td>
														<td><?= $abd->abe_sSiege ?></td>
														<td><?= $abd->abe_sVolume ?></td>
														<td><?= $abd->abe_sMobilite ?></td>
														<td align="center"><?= $abd->abe_sConsistance . ' cm' ?></td>
														<td><?= $abd->abe_sSensibilite ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="6"><strong><u>Douleurs abdomino-pelviennes</u></strong>:</td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Localisation </strong></td>
											<td align="center"><strong>Intensité </strong></td>
											<td align="center"><strong>Irradiation </strong></td>
											<td align="center"><strong>Défense </strong></td>
											<td align="center"><strong>Contracture abdominale </strong></td>
											
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$abdominal = $this->md_patient->examen_abdominal_dossier_medical($id_sejours->sea_id);
												
												foreach($abdominal AS $abd) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($abd->abe_dDate),0,20); ?></td>
														<td><?= $abd->abe_sLocalisation ?></td>
														<td><?= $abd->abe_sIntensite ?></td>
														<td><?= $abd->abe_sIrradiation ?></td>
														<td><?= $abd->abe_sDefence ?></td>
														<td><?= $abd->abe_sContracture ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="6">Examen périnéal</th>
									</thead>
									<tbody>
										<tr>
											<td align="center"><strong>Date </strong></td>
											<td align="center"><strong>Pilosité </strong></td>
											<td align="center"><strong>Pigmentation </strong></td>
											<td align="center" colspan="2"><strong>Séquelles obstétricales</strong></td>
											<td align="center"><strong>Distance ano-vulvaire</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$perineal = $this->md_patient->examen_perineal_dossier_medical($id_sejours->sea_id);
												
												foreach($perineal AS $peri) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($peri->exp_dDate),0,20); ?></td>
														<td><?= $peri->exp_sPilo ?></td>
														<td><?= $peri->exp_sPig ?></td>
														<td colspan="2"><?= $peri->exp_sSequelle ?></td>
														<td><?= $peri->exp_sDistance ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="6" style="height:5px;"></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date </strong></td>
											<td align="center"><strong>Infections cutanéo-muqueuses</strong></td>
											<td align="center"><strong>Infection bartholinite</strong></td>
											<td align="center"><strong>Lésions traumatiques </strong></td>
											<td align="center"><strong>Infections des glandes cutanéo-muqueuses  </strong></td>
											<td align="center"><strong>Développement des grandes lèvres, petites lèvres et clitoris </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$perineal = $this->md_patient->examen_perineal_dossier_medical($id_sejours->sea_id);
												
												foreach($perineal AS $peri) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($peri->exp_dDate),0,20); ?></td>
														<td><?= $peri->exp_sInfec_1 ?></td>
														<td><?= $peri->exp_sInfec_2 ?></td>
														<td><?= $peri->exp_sLesion ?></td>
														<td><?= $peri->exp_sInfec_3 ?></td>
														<td><?= $peri->exp_sDev ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="8">Toucher vaginal</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="8"><strong><u>Vagin</u></strong>:</td>
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Cloison recto-vaginale</strong></td>
											<td align="center"><strong>Cloison vésico-vaginale</strong></td>
											<td align="center"><strong>Culs de sac vaginaux </strong></td>
											<td align="center" colspan="2"><strong>Cul de sac vaginal posterieur</strong></td>
											<td align="center" colspan="2"><strong>Nodule</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$exam_vaginal = $this->md_patient->examen_vaginal_dossier_medical($id_sejours->sea_id);
												
												foreach($exam_vaginal AS $vag) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($vag->eva_dDate),0,20); ?></td>
														<td><?= $vag->eva_sCloison_1 ?></td>
														<td><?= $vag->eva_sCloison_2 ?></td>
														<td><?= $vag->eva_sCul_1 ?></td>
														<td colspan="2"><?= $vag->eva_sCul_2 ?></td>
														<td colspan="2"><?= $vag->eva_sNodule ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="8"><strong><u>Col utérin</u></strong>:</td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Forme</strong></td>
											<td align="center"><strong>Longueur</strong></td>
											<td align="center"><strong>Volume</strong></td>
											<td align="center"><strong>Ouverture</strong></td>
											<td align="center"><strong>Consistance</strong></td>
											<td align="center"><strong>Mobilité </strong></td>
											<td align="center"><strong>Sensibilité  </strong></td>
											
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$exam_vaginal = $this->md_patient->examen_vaginal_dossier_medical($id_sejours->sea_id);
												
												foreach($exam_vaginal AS $vag) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($vag->eva_dDate),0,20); ?></td>
														<td><?= $vag->eva_sForme ?></td>
														<td align="center"><?= $vag->eva_sLongueur . ' mm' ?></td>
														<td align="center"><?= $vag->eva_sVolume_1 . ' mm³' ?></td>
														<td><?= $vag->eva_sOuver ?></td>
														<td><?= $vag->eva_sConsis_1 ?></td>
														<td><?= $vag->eva_sMob_1 ?></td>
														<td><?= $vag->eva_sSensis_1 ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="8"><strong><u>Corps utérin</u></strong>:</td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Position de l'utérus</strong></td>
											<td align="center"><strong>Volume</strong></td>
											<td align="center"><strong>Consistance </strong></td>
											<td align="center" colspan="2"><strong>Mobilité</strong></td>
											<td align="center" colspan="2"><strong>Sensibilité </strong></td>
											
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$exam_vaginal = $this->md_patient->examen_vaginal_dossier_medical($id_sejours->sea_id);
												
												foreach($exam_vaginal AS $vag) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($vag->eva_dDate),0,20); ?></td>
														<td><?= $vag->eva_sPosis ?></td>
														<td align="center"><?= $vag->eva_sVolume_2 . ' mm³' ?></td>
														<td><?= $vag->eva_sConsis_2?></td>
														<td colspan="2"><?= $vag->eva_sMob_2 ?></td>
														<td colspan="2"><?= $vag->eva_sSensis_2 ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="8"><strong><u>Annexes</u></strong>:</td> 
										</tr>
										<tr>
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Masse pelvienne</strong></td>
											<td align="center" colspan="2"><strong>Ovaires</strong></td>
											<td align="center" colspan="2"><strong>Plancher pelvien</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$exam_vaginal = $this->md_patient->examen_vaginal_dossier_medical($id_sejours->sea_id);
												
												foreach($exam_vaginal AS $vag) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($vag->eva_dDate),0,20); ?></td>
														<td colspan="2"><?= $vag->eva_sMasse ?></td>
														<td colspan="2"><?= $vag->eva_sOvaire ?></td>
														<td colspan="2"><?= $vag->eva_sPelvien ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="5">Echographie</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Echographie gynécologique<br>Renseignements généraux:</u></strong></td>
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>DDR</strong></td>
											<td align="center"><strong>Contexte gynécologique</strong></td>
											<td align="center"><strong>Conditions de réalisation  </strong></td>
											<td align="center"><strong>Voie d'examen</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td><?= $this->md_config->dateEN2FR($ech->eec_sDdr) ?></td>
														<td><?= $ech->eec_sContexte ?></td>
														<td><?= $ech->eec_sRealisation ?></td>
														<td><?= $ech->eec_sExamen ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Indications</u></strong>:</td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Utérus</strong></td>
											<td align="center"><strong>Annexes</strong></td>
											<td align="center"><strong>Autres</strong></td>
											<td align="center"><strong>Texte libre</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td><?= $ech->eec_sUterus ?></td>
														<td><?= $ech->eec_sAnnexe ?></td>
														<td><?= $ech->eec_sAutres ?></td>
														<td><?= $ech->eec_sTexte ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Utérus<br>Dimensions: </u></strong></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Longueur Utérus</strong></td>
											<td align="center"><strong>Largeur Utérus</strong></td>
											<td align="center" colspan="2"><strong>Hauteur Utérus </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center"><?= $ech->eec_iLongueur . ' mm' ?></td>
														<td align="center"><?= $ech->eec_iLargeur . ' mm' ?></td>
														<td align="center" colspan="2"><?= $ech->eec_iHauteur . ' mm'?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Anatomie: </u></strong></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Position</strong></td>
											<td align="center"><strong>Contours</strong></td>
											<td align="center" colspan="2"><strong>Structure myomètre </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center"><?= $ech->eec_sPosition ?></td>
														<td align="center"><?= $ech->eec_sContour ?></td>
														<td align="center" colspan="2"><?= $ech->eec_sMyometre ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Endomètre: </u></strong></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Endomètre</strong></td>
											<td align="center" colspan="2"><strong>Epaisseur de l'endomètre</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center" colspan="2"><?= $ech->eec_sEndometre ?></td>
														<td align="center" colspan="2"><?= $ech->eec_iEpaisseur . ' mm' ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Cavité: </u></strong></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Cavité</strong></td>
											<td align="center" colspan="2"><strong>DIU</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center" colspan="2"><?= $ech->eec_sCavite ?></td>
														<td align="center" colspan="2"><?= $ech->eec_sDiu ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Autres<br>Ovaires: </u></strong></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Ovaire droit</strong></td>
											<td align="center"><strong>Grand axe ovaire droit</strong></td>
											<td align="center"><strong>Ovaire gauche </strong></td>
											<td align="center"><strong>Grand axe ovaire gauche </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center"><?= $ech->eec_sOvaireDroit ?></td>
														<td align="center"><?= $ech->eec_sOvaireDroitGrand . ' mm' ?></td>
														<td align="center"><?= $ech->eec_sOvaireGauche ?></td>
														<td align="center"><?= $ech->eec_sOvaireGaucheGrand . ' mm'?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Culs de sac: </u></strong></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Culs de sac latéraux</strong></td>
											<td align="center" colspan="2"><strong>Douglas</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center" colspan="2"><?= $ech->eec_sCul ?></td>
														<td align="center" colspan="2"><?= $ech->eec_sDouglas ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Doppler A. utérines: </u></strong></td> 
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>AUD IR</strong></td>
											<td align="center"><strong>AUD IP</strong></td>
											<td align="center"><strong>AUG IR </strong></td>
											<td align="center"><strong>AUG IP </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center"><?= $ech->eec_sAudir ?></td>
														<td align="center"><?= $ech->eec_sAudip ?></td>
														<td align="center"><?= $ech->eec_sAugir ?></td>
														<td align="center"><?= $ech->eec_sAugip ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Trompes: </u></strong></td> 
										</tr>
										
										<tr>
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Description</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td align="center" colspan="3"><?= $ech->eec_sTrompes ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Conclusion </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$echographie = $this->md_patient->examen_echographique_dossier_medical($id_sejours->sea_id);
												
												foreach($echographie AS $ech) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($ech->eec_dDate),0,20); ?></td>
														<td colspan="3"><?= $ech->eec_sConclusion ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="5">Sénologie</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Inspection:</u></strong></td>
										</tr>
										<tr>
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>Anomalies cutannées</strong></td>
											<td align="center"><strong>Dissymétries</strong></td>
											<td align="center"><strong>Anomalies de l'aréole</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td><?= $ese->ese_sAnomalieCutanee ?></td>
														<td><?= $ese->ese_sDissymetries ?></td>
														<td><?= $ese->ese_sAnomaliesAreole ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Palpation des nodules</u></strong>:</td> 
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td><?= $ese->ese_sPalpationNodules_1 ?></td>
														<td><?= $ese->ese_sPalpationNodules_2 ?></td>
														<td><?= $ese->ese_sPalpationNodules_3 ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>Distance mamelonnaire</strong></td>
											<td align="center"><strong>Taille</strong></td>
											<td align="center"><strong>Sensibilité</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td align="center"><?= $ese->ese_iDistanceMamelonnaire ?></td>
														<td align="center"><?= $ese->ese_iTaille ?></td>
														<td align="center"><?= $ese->ese_sSensibilite ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										
										<tr>
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>Mobilité</strong></td>
											<td align="center" colspan="2"><strong>Evolution de la tumeur</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td align="center"><?= $ese->ese_sMobilite ?></td>
														<td align="center" colspan="2"><?= $ese->ese_sEvolutionTumeur ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td align="center" colspan="5"><strong>Forme</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td align="center"><?= $ese->ese_sForme_1 ?></td>
														<td align="center"><?= $ese->ese_sForme_2 ?></td>
														<td align="center"><?= $ese->ese_sForme_3 ?></td>
														<td align="center"><?= $ese->ese_sForme_4 ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td align="center" colspan="5"><strong>Consistance</strong></td>
										</tr>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Masse molle</strong></td>
											<td align="center"><strong>Ferme</strong></td>
											<td align="center"><strong>Elastique</strong></td>
											<td align="center"><strong>Douleur à la palpe</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td align="center"><?= substr($ese->ese_sConsistance_1,12, 15) ;?></td>
														<td align="center"><?= substr($ese->ese_sConsistance_2,6,9) ;?></td>
														<td align="center"><?= substr($ese->ese_sConsistance_3,10,13) ;?></td>
														<td align="center"><?= substr($ese->ese_sConsistance_4,19,22) ;?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td colspan="5"><strong><u>Ecoulement mammmaire: </u></strong></td> 
										</tr>
										<tr>
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>Expression du mamelon entre pouce et index</strong></td>
											<td align="center"><strong>Volume</strong></td>
											<td align="center"><strong>Consistance</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td align="center"><?= $ese->ese_sExpression ?></td>
														<td align="center"><?= $ese->ese_iVolume ?></td>
														<td align="center"><?= $ese->ese_sConsistance ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									
									<tbody>
										<tr>
											<td align="center" colspan="5"><strong>Ecoulement</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td align="center"><?= $ese->ese_sEcoulement_1 ?></td>
														<td align="center"><?= $ese->ese_sEcoulement_2 ?></td>
														<td align="center"><?= $ese->ese_sEcoulement_3 ?></td>
														<td align="center"><?= $ese->ese_sEcoulement_4 ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
									<tbody>
										<tr>
											<td align="center" colspan="5" style="height:10px;"></td>
										</tr>
										<tr>
											<td align="center" colspan="3"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Couleur</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$senologie = $this->md_patient->examen_senologique_dossier_medical($id_sejours->sea_id);
												
												foreach($senologie AS $ese) { ?>
													<tr>
														<td align="center" colspan="3"><?php echo substr($this->md_config->md_config->affDateTimeFr($ese->ese_dDate),0,20); ?></td>
														<td align="center" colspan="2"><?= $ese->ese_sCouleur ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
									<thead align="center" style="background-color:rgb(167,206,0)">
										<th colspan="4">Toucher rectal</th>
									</thead>
									<tbody>
										<tr>
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Cul de sac de douglas</strong></td>
											<td align="center"><strong>Noyau central du perinée</strong></td>
											<td align="center"><strong>Cloison recto-vaginal</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$exam_rectal = $this->md_patient->examen_rectal_dossier_medical($id_sejours->sea_id);
												
												foreach($exam_rectal AS $rec) { ?>
													<tr>  
														<td align="center"><?php echo substr($this->md_config->affDateTimeFr($rec->exr_dDate),0,20); ?></td>
														<td align="center"><?php echo $rec->exr_sDouglas; ?></td>
														<td align="center"><?php echo $rec->exr_sNoyau; ?></td>
														<td align="center"><?php echo $rec->exr_sCloison; ?></td>
													</tr>
												<?php }
												
											}
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
								<thead align="center" style="background-color:rgb(167,206,0)">
									<th colspan="8">Echographie < 12 SA</th>
								</thead>
								<tbody>
									<tr>
										<td align="center"><strong>Date</strong></td>
										<td align="center"><strong>Indication</strong></td>
										<td align="center"><strong>Voie d'examen</strong></td>
										<td align="center"><strong>Condition de réalisation</strong></td>
										<td align="center"><strong>Nombre d'embryons</strong></td>
										<td align="center"><strong>Type de grossesse</strong></td>
										<td align="center" colspan="2"><strong>Membrane</strong></td>
									</tr>
									<?php
										foreach($actes_medicaux_patient AS $id_sejours)
										{
											$gyne_obs_a = $this->md_patient->gyneco_a_dossier_medical($id_sejours->sea_id);
												
											foreach($gyne_obs_a as $go_a) { ?>
												<tr>  
													<td align="center"><?php echo substr($this->md_config->affDateTimeFr($go_a->goa_dEnreg),0,20); ?></td>
													<td align="center"><?php echo $go_a->goa_sIndication; ?></td>
													<td align="center"><?php echo $go_a->goa_sVoie; ?></td>
													<td align="center"><?php echo $go_a->goa_sCondition; ?></td>
													<td align="center"><?php echo $go_a->goa_iNEmbre; ?></td>
													<td align="center"><?php echo $go_a->goa_sTypeGross; ?></td>
													<td align="center" colspan="2"><?php echo $go_a->goa_sMembrane; ?></td>
												</tr>
											<?php }
												
										}
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="8"><strong><u>Embryon A<br>Embryon: </u></strong></td> 
										</tr>
										<tr>
											
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Visibilité du foetus</strong></td>
											<td align="center"><strong>Sac gest : LCC -A</strong></td>
											<td align="center"><strong>Bip - A </strong></td>
											<td align="center"><strong>Activité cardiaque </strong></td>
											<td align="center"><strong>RCF - A</strong></td>
											<td align="center"><strong>Morphologie de l'extrémité cephalique - A</strong></td>
											<td align="center"><strong>Morphologie des membres - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_a = $this->md_patient->gyneco_a_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_a as $go_a) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->affDateTimeFr($go_a->goa_dEnreg),0,20); ?></td>
														<td align="center"><?= $go_a->goa_sVisibilite ?></td>
														<td align="center"><?= $go_a->goa_iLcc . ' mm' ?></td>
														<td align="center"><?= $go_a->goa_iBip . ' mm'?></td>
														<td align="center"><?= $go_a->goa_sActCard . ' mm'?></td>
														<td align="center"><?= $go_a->goa_iRcf . ' bpm'?></td>
														<td align="center"><?= $go_a->goa_sMorphoExt ?></td>
														<td align="center"><?= $go_a->goa_sMorphoMemb ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="8"><strong><u>Sac gestationnel:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Localisation</strong></td>
											<td align="center"><strong>Tonicité</strong></td>
											<td align="center"><strong>Trophoblaste</strong></td>
											<td align="center" colspan="2"><strong>Diamètre</strong></td>
											<td align="center" colspan="2"><strong>Décollement</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_a = $this->md_patient->gyneco_a_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_a as $go_a) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->affDateTimeFr($go_a->goa_dEnreg),0,20); ?></td>
														<td align="center"><?= $go_a->goa_sLocalisation ?></td>
														<td align="center"><?= $go_a->goa_sToniocite ?></td>
														<td align="center"><?= $go_a->goa_sTrophoblaste ?></td>
														<td align="center" colspan="2"><?= $go_a->goa_iDiametre . ' mm' ?></td>
														<td align="center" colspan="2"><?= $go_a->goa_sDecollement ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="8"><strong><u>Foetus<br>Ovaire droit: </u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Taille</strong></td>
											<td align="center" colspan="3"><strong>Aspect</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_a = $this->md_patient->gyneco_a_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_a as $go_a) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_a->goa_dEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_a->goa_iOvDroit . 'mm ' ?></td>
														<td align="center" colspan="3"><?= $go_a->goa_sOvDroitAspect?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="8"><strong><u>Ovaire gauche: </u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Taille</strong></td>
											<td align="center" colspan="3"><strong>Aspect</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_a = $this->md_patient->gyneco_a_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_a as $go_a) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_a->goa_dEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_a->goa_iOvGauche . 'mm ' ?></td>
														<td align="center" colspan="3"><?= $go_a->goa_sOvGaucheAspect?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="8" style="height:10px;"><strong></strong></td>
										</tr>
										<tr>
											<td align="center" colspan="3"><strong>Date</strong></td>
											<td align="center" colspan="5"><strong>Conclusion</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_a = $this->md_patient->gyneco_a_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_a as $go_a) { ?>
													<tr>
														<td colspan="3"><?php echo substr($this->md_config->affDateTimeFr($go_a->goa_dEnreg),0,20); ?></td>
														<td colspan="5"><?= $go_a->goa_sConclusion ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
								<thead align="center" style="background-color:rgb(167,206,0)">
									<th colspan="9">Echographie 1er trimestre</th>
								</thead>
								<tbody>
									<tr>
										<td align="center" colspan="2"><strong>Date</strong></td>
										<td align="center"><strong>Indication</strong></td>
										<td align="center"><strong>Voie d'examen</strong></td>
										<td align="center"><strong>Conditions de réalisation</strong></td>
										<td align="center"><strong>Nombre de foetus</strong></td>
										<td align="center"><strong>Type de grossesse</strong></td>
										<td align="center" colspan="2"><strong>Membrane</strong></td>
									</tr>
									<?php
										foreach($actes_medicaux_patient AS $id_sejours)
										{
											$gyne_obs_b = $this->md_patient->gyneco_b_dossier_medical($id_sejours->sea_id);
												
											foreach($gyne_obs_b as $go_b) { ?>
												<tr>  
													<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_b->gob_dDateEnreg),0,20); ?></td>
													<td align="center"><?php echo $go_b->gob_sIndication; ?></td>
													<td align="center"><?php echo $go_b->gob_sVoie; ?></td>
													<td align="center"><?php echo $go_b->gob_sCondition; ?></td>
													<td align="center"><?php echo $go_b->gob_iNfoetus; ?></td>
													<td align="center"><?php echo $go_b->gob_sTypeGross; ?></td>
													<td align="center" colspan="2"><?php echo $go_b->gob_sMembrane; ?></td>
												</tr>
											<?php }
												
										}
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="9"><strong><u>Foetus</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center"><strong>Date</strong></td>
											<td align="center"><strong>Activité cardiaque - A</strong></td>
											<td align="center"><strong>RCF - A</strong></td>
											<td align="center"><strong>MAF - A </strong></td>
											<td align="center"><strong>LCC - A </strong></td>
											<td align="center"><strong>BIP - A</strong></td>
											<td align="center"><strong>PA - A</strong></td>
											<td align="center"><strong>Clarté nuque - A</strong></td>
											<td align="center"><strong>Férum - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_b = $this->md_patient->gyneco_b_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_b as $go_b) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->affDateTimeFr($go_b->gob_dDateEnreg),0,20); ?></td>
														<td align="center"><?= $go_b->gob_sActCardiaque ?></td>
														<td align="center"><?= $go_b->gob_iRcf . ' bpm' ?></td>
														<td align="center"><?= $go_b->gob_sMaf ?></td>
														<td align="center"><?= $go_b->gob_iLcc . ' mm'?></td>
														<td align="center"><?= $go_b->gob_iBip . ' mpm'?></td>
														<td align="center"><?= $go_b->gob_iPa . ' mm' ?></td>
														<td align="center"><?= $go_b->gob_iClarteNuque . ' mm' ?></td>
														<td align="center"><?= $go_b->gob_iFemur . ' mm' ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="9" style="height:10px;"><strong><u></u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" ><strong>Morpho de pôle céphalique - A</strong></td>
											<td align="center"><strong>Abdomen - A</strong></td>
											<td align="center"><strong>Aspect des membranes - A</strong></td>
											<td align="center"><strong>Liquide amniotique - A</strong></td>
											<td align="center"><strong>Tropoblaste : localisation - A </strong></td>
											<td align="center"><strong>Tropoblaste : aspect - A </strong></td>
											<td align="center"><strong>Décollement - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_b = $this->md_patient->gyneco_b_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_b as $go_b) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_b->gob_dDateEnreg),0,20); ?></td>
														<td align="center"><?= $go_b->gob_sMorphoExt ?></td>
														<td align="center"><?= $go_b->gob_sAbdomen ?></td>
														<td align="center"><?= $go_b->gob_sAspectMemb ?></td>
														<td align="center"><?= $go_b->gob_sLquide ?></td>
														<td align="center"><?= $go_b->gob_sLocalisation ?></td>
														<td align="center"><?= $go_b->gob_sAspect ?></td>
														<td align="center"><?= $go_b->gob_sDecollement ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td align="center" style="height:10px;" colspan="9"><strong></strong></td>
										</tr>
										<tr>
											<td align="center" colspan="4"><strong>Date</strong></td>
											<td align="center" colspan="5"><strong>Conclusion</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_b = $this->md_patient->gyneco_b_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_b as $go_b) { ?>
													<tr>
														<td colspan="4" align="center"><?php echo substr($this->md_config->affDateTimeFr($go_b->gob_dDateEnreg),0,20); ?></td>
														<td colspan="5" align="center"><?= $go_b->gob_sConclusion ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
								<thead align="center" style="background-color:rgb(167,206,0)">
									<th colspan="7">Echographie 2ème trimestre</th>
								</thead>
								<tbody>
									<tr>
										<td align="center"><strong>Date</strong></td>
										<td align="center"><strong>Indication</strong></td>
										<td align="center"><strong>Voie d'examen</strong></td>
										<td align="center"><strong>Conditions de réalisation</strong></td>
										<td align="center"><strong>Nombre de foetus</strong></td>
										<td align="center"><strong>Type de grossesse</strong></td>
										<td align="center"><strong>Membrane</strong></td>
									</tr>
									<?php
										foreach($actes_medicaux_patient AS $id_sejours)
										{
											$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
											foreach($gyne_obs_c as $go_c) { ?>
												<tr>  
													<td align="center"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
													<td align="center"><?php echo $go_c->goc_sIndication; ?></td>
													<td align="center"><?php echo $go_c->goc_sVoie; ?></td>
													<td align="center"><?php echo $go_c->goc_sCondition; ?></td>
													<td align="center"><?php echo $go_c->goc_iNfoetus; ?></td>
													<td align="center"><?php echo $go_c->goc_sType; ?></td>
													<td align="center"><?php echo $go_c->goc_sMembrane; ?></td>
												</tr>
											<?php }
												
										}
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Foetus<br>Présentation et vitalité: </u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>Présentation - A</strong></td>
											<td align="center"><strong>Activité cardiaque - A</strong></td>
											<td align="center"><strong>RCF - A </strong></td>
											<td align="center" colspan="2"><strong>MAF - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center"><?= $go_c->goc_sPresentation ?></td>
														<td align="center"><?= $go_c->goc_sActCardiaque ?></td>
														<td align="center"><?= $go_c->goc_iRcf . ' bpm'?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sMaf ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Biometrie:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>BIP - A</strong></td>
											<td align="center"><strong>PC - A</strong></td>
											<td align="center"><strong>PA - A</strong></td>
											<td align="center"><strong>Fémur - A </strong></td>
											<td align="center"><strong>Poids estimé </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center"><?= $go_c->goc_iBip . ' mm' ?></td>
														<td align="center"><?= $go_c->goc_iPc . ' mm' ?></td>
														<td align="center"><?= $go_c->goc_iPa . ' mm' ?></td>
														<td align="center"><?= $go_c->goc_iFemur . ' mm' ?></td>
														<td align="center"><?= $go_c->goc_iPoids . ' g' ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Morphologie:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Morphologie générale - A</strong></td>
											<td align="center" colspan="2"><strong>OGE - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_c->goc_sMorpho ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sOge ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Annexes:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Liquide et cordon</strong></td>
											<td align="center"><strong>PGC - A</strong></td>
											<td align="center" colspan="2"><strong>Placenta - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sLiquide ?></td>
														<td align="center"><?= $go_c->goc_iPgc . ' mm' ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sPlacenta ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Doppler ombilic:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop ombilic IR - A</strong></td>
											<td align="center" colspan="2"><strong>Dop ombilic Flux en Dia - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_c->goc_sDopIR ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sDopFlux ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Doppler ACM:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Dop ACM IR - A</strong></td>
											<td align="center"><strong>Dop ACM Vitesse - A</strong></td>
											<td align="center" colspan="2"><strong>Dop ACM MoM - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sAcmIR ?></td>
														<td align="center"><?= $go_c->goc_iDopAcmVitesse . ' cm/s'?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sDopAcmMOM ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Doppler Arantus:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop Arantus IR - A</strong></td>
											<td align="center" colspan="2"><strong>Dop Arantius onde A - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_c->goc_sDopArantiusIR ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sDopArantiusOnde ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Utérus<br>Doppler utérus: </u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop utérin Dt IR</strong></td>
											<td align="center" colspan="2"><strong>Dop utérin Dt Notch</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_c->goc_sDopUterinDtIR ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sDopUterinDtNotch?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7" style="height:10px;"></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop utérin G IR</strong></td>
											<td align="center" colspan="2"><strong>Dop utérin Dt Notch</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_c->goc_sDopUterinGIR ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sDopUterinGNotch ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Col:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Longueur</strong></td>
											<td align="center" colspan="2"><strong>Entonnoir</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_c->goc_iColLongueur . ' mm' ?></td>
														<td align="center" colspan="2"><?= $go_c->goc_sColEntonnoir ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								
								<tbody>
										<tr>
											<td colspan="7" style="height:10px;"></td>
										</tr>
										<tr>
											<td align="center" colspan="3"><strong>Date</strong></td>
											<td align="center" colspan="4"><strong>Conclusion</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_c = $this->md_patient->gyneco_c_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_c as $go_c) { ?>
													<tr>
														<td colspan="3" align="center"><?php echo substr($this->md_config->affDateTimeFr($go_c->goc_dDateEnreg),0,20); ?></td>
														<td colspan="4" align="center"><?= $go_c->goc_sConclusion ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
								<thead align="center" style="background-color:rgb(167,206,0)">
									<th colspan="7">Echographie 3ème trimestre</th>
								</thead>
								<tbody>
									<tr>
										<td align="center"><strong>Date</strong></td>
										<td align="center"><strong>Indication</strong></td>
										<td align="center"><strong>Voie d'examen</strong></td>
										<td align="center"><strong>Conditions de réalisation</strong></td>
										<td align="center"><strong>Nombre de foetus</strong></td>
										<td align="center"><strong>Type de grossesse</strong></td>
										<td align="center"><strong>Membrane</strong></td>
									</tr>
									<?php
										foreach($actes_medicaux_patient AS $id_sejours)
										{
											$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
											foreach($gyne_obs_d as $go_d) { ?>
												<tr>  
													<td align="center"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
													<td align="center"><?php echo $go_d->god_sIndication; ?></td>
													<td align="center"><?php echo $go_d->god_sVoie; ?></td>
													<td align="center"><?php echo $go_d->god_sCondition; ?></td>
													<td align="center"><?php echo $go_d->god_iNfoetus; ?></td>
													<td align="center"><?php echo $go_d->god_sType; ?></td>
													<td align="center"><?php echo $go_d->god_sMembrane; ?></td>
												</tr>
											<?php }
												
										}
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Foetus<br>Présentation et vitalité: </u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>Présentation - A</strong></td>
											<td align="center"><strong>Activité cardiaque - A</strong></td>
											<td align="center"><strong>RCF - A </strong></td>
											<td align="center" colspan="2"><strong>MAF - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center"><?= $go_d->god_sPresentation ?></td>
														<td align="center"><?= $go_d->god_sActCardiaque ?></td>
														<td align="center"><?= $go_d->god_iRcf . ' bpm'?></td>
														<td align="center" colspan="2"><?= $go_d->god_sMaf ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Biometrie:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center"><strong>BIP - A</strong></td>
											<td align="center"><strong>PC - A</strong></td>
											<td align="center"><strong>PA - A</strong></td>
											<td align="center"><strong>Fémur - A </strong></td>
											<td align="center"><strong>Poids estimé </strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center"><?= $go_d->god_iBip . ' mm' ?></td>
														<td align="center"><?= $go_d->god_iPc . ' mm' ?></td>
														<td align="center"><?= $go_d->god_iPa . ' mm' ?></td>
														<td align="center"><?= $go_d->god_iFemur . ' mm' ?></td>
														<td align="center"><?= $go_d->god_iPoids . ' g' ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Morphologie:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Morphologie générale - A</strong></td>
											<td align="center" colspan="2"><strong>OGE - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_d->god_sMorpho ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sOge ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Annexes:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Liquide et cordon</strong></td>
											<td align="center"><strong>PGC - A</strong></td>
											<td align="center" colspan="2"><strong>Placenta - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sLiquide ?></td>
														<td align="center"><?= $go_d->god_iPgc . ' mm' ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sPlacenta ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Doppler ombilic:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop ombilic IR - A</strong></td>
											<td align="center" colspan="2"><strong>Dop ombilic Flux en Dia - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_d->god_sDopIR ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sDopFlux ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Doppler ACM:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="2"><strong>Dop ACM IR - A</strong></td>
											<td align="center"><strong>Dop ACM Vitesse - A</strong></td>
											<td align="center" colspan="2"><strong>Dop ACM MoM - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sAcmIR ?></td>
														<td align="center"><?= $go_d->god_iDopAcmVitesse . ' cm/s'?></td>
														<td align="center" colspan="2"><?= $go_d->god_sDopAcmMOM ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Doppler Arantus:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop Arantus IR - A</strong></td>
											<td align="center" colspan="2"><strong>Dop Arantius onde A - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_d->god_sDopArantiusIR ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sDopArantiusOnde ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Utérus<br>Doppler utérus: </u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop utérin Dt IR</strong></td>
											<td align="center" colspan="2"><strong>Dop utérin Dt Notch</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_d->god_sDopUterinDtIR ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sDopUterinDtNotch?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7" style="height:10px;"></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Dop utérin G IR</strong></td>
											<td align="center" colspan="2"><strong>Dop utérin Dt Notch</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_d->god_sDopUterinGIR ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sDopUterinGNotch ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Col:</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center" colspan="2"><strong>Date</strong></td>
											<td align="center" colspan="3"><strong>Longueur</strong></td>
											<td align="center" colspan="2"><strong>Entonnoir</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td align="center" colspan="2"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td align="center" colspan="3"><?= $go_d->god_iColLongueur . ' mm' ?></td>
														<td align="center" colspan="2"><?= $go_d->god_sColEntonnoir ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
								
								
								<tbody>
										<tr>
											<td colspan="7" style="height:10px;"></td>
										</tr>
										<tr>
											<td align="center" colspan="3"><strong>Date</strong></td>
											<td align="center" colspan="4"><strong>Conclusion</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_d = $this->md_patient->gyneco_d_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_d as $go_d) { ?>
													<tr>
														<td colspan="3" align="center"><?php echo substr($this->md_config->affDateTimeFr($go_d->god_dDateEnreg),0,20); ?></td>
														<td colspan="4" align="center"><?= $go_d->god_sConclusion ?></td>
													</tr>
												<?php }
												
											} 
										?>
									</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<?php if($patient->pat_sSexe == "F") { ?>
							<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
								<thead align="center" style="background-color:rgb(167,206,0)">
									<th colspan="7">Issue de grossesse</th>
								</thead>
								<tbody>
									<tr>
										<td align="center" colspan="2"><strong>Date d'enregistrement</strong></td>
										<td align="center" colspan="2"><strong>Date d'accouchement</strong></td>
										<td align="center" colspan="2"><strong>Lieu</strong></td>
										<td align="center"><strong>Nombre de foetus</strong></td>
									</tr>
									<?php
										foreach($actes_medicaux_patient AS $id_sejours)
										{
											$gyne_obs_e = $this->md_patient->gyneco_e_dossier_medical($id_sejours->sea_id);
												
											foreach($gyne_obs_e as $go_e) { ?>
												<tr>
													<td colspan="2" align="center"><?php echo substr($this->md_config->affDateTimeFr($go_e->goe_dEnreg),0,20); ?></td>
													<td align="center" colspan="2"><?php echo ($this->md_config->dateEN2FR($go_e->goe_dDate)); ?></td>
													<td align="center" colspan="2"><?php echo $go_e->goe_sLieu; ?></td>
													<td align="center"><?php echo $go_e->goe_iNfoetus; ?></td>
												</tr>
											<?php }
												
										}
										?>
								</tbody>
								
								<tbody>
										<tr>
											<td colspan="7"><strong><u>Foetus</u></strong></td> 
										</tr>
										<tr>
											
											<td align="center"><strong>Date d'enregistrement</strong></td>
											<td align="center"><strong>Prénom - A</strong></td>
											<td align="center"><strong>sexe - A</strong></td>
											<td align="center"><strong>Poids - A  </strong></td>
											<td align="center"><strong>MAF - AMAF - A</strong></td>
											<td align="center"><strong>Etat de santé - A</strong></td>
											<td align="center"><strong>Terme - A</strong></td>
										</tr>
										<?php
											foreach($actes_medicaux_patient AS $id_sejours)
											{
												$gyne_obs_e = $this->md_patient->gyneco_e_dossier_medical($id_sejours->sea_id);
												
												foreach($gyne_obs_e as $go_e) { ?>
													<tr>
														<td align="center"><?php echo substr($this->md_config->affDateTimeFr($go_e->goe_dEnreg),0,20); ?></td>
														<td align="center"><?= $go_e->goe_sPrenom ?></td>
														<td align="center"><?= $go_e->goe_sSexe ?></td>
														<td align="center"><?= $go_e->goe_iPoids . ' g' ?></td>
														<td align="center"><?= $go_e->goe_sModalite ?></td>
														<td align="center"><?= $go_e->goe_sEtat ?></td>
														<td align="center"><?= $go_e->goe_sTerm ?></td>
													</tr>
												<?php }
												
											} 
										?>
								</tbody>
							</table>
							<br><br>
						<?php }
					?>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
						<thead align="center" style="background-color:rgb(167,206,0)">
							<th colspan="7">Opération(s) chirurgicale(s)</th>
						</thead>
						<tbody>
							<tr>
								<td align="center"><strong>Acte chirurgical</strong></td>
								<td align="center"><strong>Médecin</strong></td>
								<td align="center"><strong>Date de l'opération</strong></td>
								<td align="center"><strong>Heure de début</strong></td>
								<td align="center"><strong>Heure de fin</strong></td>
								<td align="center"><strong>Bloc/Salle</strong></td>
								<td><strong>Compte rendu de l'opération</strong></td>
							</tr>
							<?php
								foreach($actes_medicaux_patient AS $id_sejours)
								{
									$chirurgie = $this->md_chirurgie->operation_planifiee_dossier_medical($id_sejours->sea_id);
									
									foreach($chirurgie AS $ch) { ?>
										<tr>
											<td><?= $ch->lac_sLibelle ?></td>
											<td align="center"><?= $ch->per_sNom . ' ' . $ch->per_sPrenom . '<br>' . '(' . $ch->per_sMatricule . ')' ?></td>
											<td align="center"><?php echo $this->md_config->dateEN2FR($ch->pop_dDate) ?></td>
											<td align="center"><?= $ch->pop_tHeureDebutOpe ?></td>
											<td align="center"><?= $ch->pop_tHeureFinOpe ?></td> 
											<td align="center"><?= $ch->bop_sLibelle . '/' . $ch->sop_sLibelle ?></td> 
											<td><?= $ch->pop_sCompteRendu ?></td>
										</tr>
									<?php }
									
								} 
							?>
						</tbody>
					</table>
					<br><br>
					
					<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
							<thead align="center" style="background-color:rgb(167,206,0)">
								<th colspan="5">Examen d'imagérie</th>
							</thead>
							<tbody>
								<tr>
									<td colspan="5"><strong><u>Indications</u></strong>:</td> 
								</tr>
								<tr>
									<td align="center"><strong>Date de réalisation</strong></td>
									<td align="center"><strong>Acte d'imagérie</strong></td>
									<td align="center"><strong>Médecin radiologue</strong></td>
									
									<td align="center"><strong>Image(s)</strong></td>
									<td align="center"><strong>Compte Rendu</strong></td>
								</tr>
								<?php
									foreach($actes_medicaux_patient AS $id_sejours)
									{
										$imagerie = $this->md_patient->acte_imagerie_sejour_dossier_medical($id_sejours->sea_id);
										
										foreach($imagerie AS $imag) { ?>
											<tr>
												<td align="center">
													<?= $imag->aci_dDate !== null ? substr($this->md_config->affDateTimeFr($imag->aci_dDate),0,20) : ''?>
												</td>
												<td align="center"><?php echo $imag->lac_sLibelle; ?></td>
												<td align="center">
													<?= $imag->per_sNom !== null ? $imag->per_sNom : ''?>
													<?= $imag->per_sPrenom !== null ? $imag->per_sPrenom : '' ?> (<?= $imag->per_sMatricule !== null ? $imag->per_sMatricule : '' ?>)
												</td>
												<td style="width:88px;">
													<?php if(!is_null($imag->aci_sImage)): ?>
														<img src="<?php echo base_url($imag->aci_sImage) ;?>" width="287px" height="185px"/>
													<?php else: ?>
														<?php echo ''; ?>
													<?php endif; ?>
												</td>
												<td>
													<?= $imag->aci_sCompteRendu !== null ? $imag->aci_sCompteRendu : ''?>
												</td>
											</tr>
										<?php }
										
									}
								?>
							</tbody>
					</table>
					<br><br>
					
					<?php if($patient->pat_iSta == 0): ?>
						<table style="width:100%; height:50px; font-size:12px" border="1" cellspacing="0">
							<thead align="center" style="background-color:rgb(167,206,0)">
								<th colspan="4">Déclaration de décès</th>
							</thead>
							<tbody>
								<tr>
									<td align="center"><strong>Date de décès</strong></td>
									<td align="center"><strong>Heure de décès</strong></td>
									<td align="center"><strong>Unité</strong></td>
									<td align="center"><strong>Cause</strong></td>
								</tr>
								<?php if(!is_null($deces)): ?>
									<tr>
										<td align="center"><?php echo $this->md_config->affDateFrNum($deces->dec_dDateDeces); ?></td>
										<td align="center"><?php echo $deces->dec_tHeureDeces; ?></td>
										<td align="center"><?php echo $deces->uni_sLibelle; ?></td>
										<td><?php echo $deces->dec_sCause; ?></td>
									</tr>
								<?php endif; ?>
							</tbody>
					</table>
					<?php endif; ?>
					
				</div>	
				<table class="footer" style="width:100%; font-weight:bold; font-size:12px">
					<tr>
						<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u><?php echo $info->str_sEmail;?></u></i></span></span>
						</td>
					</tr>
					<tr>
						<td style="font-size:12px" align="center">tel:<?php echo $info->str_sTel;?></td>
					</tr>
				
				</table>
		</div>
	</body>
</html>