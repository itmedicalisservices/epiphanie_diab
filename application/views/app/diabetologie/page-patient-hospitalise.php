
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $hos = $this->md_patient->hospitalisation($h); ?>
<?php $rappel = $this->md_patient->rappel_hospitalisation($h,date("Y-m-d H:i:s")); ?>
<?php $acm_id = $hos->acm_id ; $acm = $this->md_patient->acm_patient($acm_id); ?>
<?php $patient = $this->md_patient->recup_patient($acm->pat_id); ?>
<?php $constante = $this->md_patient->constante($acm_id); ?>
<?php $information = $this->md_patient->information($acm->pat_id); ?>
<?php $ListeConst = $this->md_patient->liste_constante($acm_id); ?>
<?php $consultation = $this->md_patient->consultation($acm_id); ?>


<?php $infodiabete = $this->md_patient->InfoDiabete($acm_id); ?>
<?php $facrisque = $this->md_patient->facteurRisque($acm->pat_id); ?>
<?php $consultationcsl = $this->md_patient->consultationcsl($acm_id); ?>


<?php $liste = $this->md_patient-> sejour_acm($acm_id); ?>
<?php $listeMed = $this->md_pharmacie->liste_medicament2(); ?>
<?php //$listeExamenCardio = $this->md_parametre->liste_cardiologiques_actifs(); ?>
<?php //$listeExamenRhum = $this->md_parametre->liste_rhumatologies_actifs(); ?>
<?php //$listeExamenGyne = $this->md_parametre->liste_gynecologies_actifs(); ?>
<?php //$listeExamenGyneObs = $this->md_parametre->liste_rgynecologies_obs_actifs(); ?>
<?php //$listeExamenGyneNeuro = $this->md_parametre->liste_neurologies_actifs(); ?>
<?php //$listeExamenGynePneu = $this->md_parametre->liste_pneumonies_actifs(); ?>
<?php $listeUnite = $this->md_parametre->liste_unites_actifs(); ?>
<?php $listeMaladie = $this->md_patient->liste_maladie_actifs(); ?>
<?php $perso = $this->md_parametre->liste_antecedent_personnel_actifs(); ?>
<?php $fam = $this->md_parametre->liste_antecedent_familial_actifs(); ?>
<?php $aller = $this->md_parametre->liste_allergie_actifs(); ?>
<?php $prof = $this->md_parametre->liste_activite_professionnelle_actifs(); ?>
<?php $listeActeLabo = $this->md_parametre->liste_acts_laboratoires_actifs(); ?>
<?php $listeConstante = $this->md_patient->liste_constante_vitale($acm_id); ?>
<?php $listeEncours = $this->md_patient->liste_acm_dossier_patient($acm->pat_id,date("Y-m-d H:i:s")); ?>
<?php $listeDocument = $this->md_patient->liste_document_patient($acm_id); ?>

<?php $cptRendu = $this->md_chirurgie->recup_compte_rendu_hos($hos->hos_iPop); ?>


<?php $listedgq = $this->md_parametre->liste_diagnostique_actifs(); ?>
<?php $listecom = $this->md_parametre->liste_comorbidite_actifs(); ?>
<?php $listecmp = $this->md_parametre->liste_complication_actifs(); ?>

<?php $listeThy = $this->md_parametre->liste_thyroide_actifs(); ?>
<?php $listeHyp = $this->md_parametre->liste_hypophyse_actifs(); ?>


<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2><?php echo $acm->lac_sLibelle; ?></h2>
            <small class="text-muted" style="text-transform:uppercas"><i class="fa fa-calendar"></i> <?php echo $this->md_config->affDateTimeFr($hos->hos_dDate);?></small><br>
            <small class="text-muted" style="text-transform:uppercas">
				<div class="row clearfix">
					<div class="col-lg-3 col-md-12 col-sm-12">
						<i class="fa fa-bed"></i> Service: <b><?php echo $hos->ser_sLibelle;?></b>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12">
						Unité: <b><?php echo $hos->uni_sLibelle;?></b>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12">
						Salle : <b><?php echo $hos->cha_sLibelle;?></b>, Lit : <b><?php echo $hos->lit_sLibelle;?></b>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12">
						Disposition : <b><?php if($hos->hos_sType != "Standard"){echo $hos->hos_sType;}else{echo "Rien à signaler";}?></b></b>
					</div>
				</div>
			</small>
        </div>        
        <div class="row clearfix">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class=" card patient-profile">
                    <img src="<?php echo base_url($patient->pat_sAvatar);?>" class="img-fluid" alt="">                              
                </div>
                <div class="card">
                    <div class="header">
                        <h2>À PROPOS DU PATIENT</h2>
                    </div>
                    <div class="body">
                        <strong>Code patient</strong>
                        <p><?php echo $patient->pat_sMatricule;?></p>
						<strong>Nom(s) et prénom(s)</strong>
                        <p><?php echo $patient->pat_sCivilite;?> <?php echo $patient->pat_sNom;?> <?php echo $patient->pat_sPrenom;?></p>
                        <strong>Âge</strong>
                        <p><?php $ageAnnee= $this->md_config->ageAnnee($patient->pat_dDateNaiss); if($ageAnnee>1){echo $ageAnnee." ans";}else if($ageAnnee ==1){echo $ageAnnee." an";}else{echo $this->md_config->ageMois($patient->pat_dDateNaiss)." mois";} ?></p>
						<strong>Genre</strong>
                        <p><?php if($patient->pat_sSexe=="H"){echo "Homme";}else{echo "Femme";}?></p>
						<strong>Profession</strong>
                        <p><?php echo $patient->pat_sProfession;?></p>
                        <strong>Situation familiale</strong>
                        <p><?php echo $patient->pat_sSituationMat	;?></p>
						<?php if(!is_null($patient->pat_sTel)){?>
                        <strong>Téléphone</strong>
                        <p><?php echo $patient->pat_sTel;?></p>
						<?php } ?>
						<?php if(!is_null($patient->pat_sAdresse)){?>
                        <strong>Adresse</strong>
                        <address><?php echo $patient->pat_sAdresse;?></address>
						<?php } ?>
						 <hr>
						<strong>Date d'enregistrement</strong>
                        <p><?php echo substr($this->md_config->affDateTimeFr($patient->pat_dDateEnreg),0,19); ?></p>
                    </div>
                </div>
            </div>
             <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs
                        <ul class="nav nav-tabs" role="tablist" style="font-size:14px">
                            <li class="nav-item"><a class="nav-link active"data-toggle="tab" href="#rapport"><b>Dossier patient</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#constante"><b>Constante vitale</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#complement"><b>Antécédents</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" id="or" href="#ordonnance"><b> Ordonnance</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#soins" id="so"><b>Soins Infirmiers</b></a></li>
                        </ul>
						 <ul class="nav nav-tabs" role="tablist" style="font-size:14px">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imagerie" id="in"><b>Examen imagerie</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#labo"><b> Examen laboratoire</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reeducation"><b>Rééducation</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#exploration"><b>Exploration fonctionnelle</b></a></li>
                        </ul>	 
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#diagnostic"><b>Maladie(s) diagnostiquée(s)</b></a></li>
							<?php if($patient->pat_sSexe!="H"){?>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#femme"><b <?php if($patient->pat_iFemme==1){echo 'style="color:red"';}else{echo '';} ;?>><?php if($patient->pat_iFemme==1){echo 'Femme enceinte';}else{echo 'Déclaration femme enceinte';} ;?></b></a></li>
							<?php }?>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#enfant"><b <?php if($patient->pat_iEnfant==1){echo 'style="color:red"';}else{echo '';} ;?>><?php if($patient->pat_iEnfant==1){echo 'Enfant malnutri(e)';}else{echo 'Déclaration enfant malnutri(e)';} ;?></b></a></li>
                            
                            
                        </ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ne"><b>Déclaration Nouveau né</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#deces"><b>Déclaration de Décès</b></a></li>
							<?php if($cptRendu){?>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cptRendu"><b>Voir le compte rendu</b></a></li>
							<?php }?>
                        </ul> -->
						 <ul class="nav nav-tabs" role="tablist" style="font-size:14px">
                            <li class="nav-item"><a class="nav-link active"data-toggle="tab" href="#rapport"><b>RAPPORT </b></a></li><br><br>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" id="cc" href="#consultation"><b>DIABETE</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" id="hp" href="#hypophyse"><b>THYROÏDE/HYPOPHYSE</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" id="or" href="#ordonnance"><b>ORDONNANCE</b></a></li>
							
							
							<!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#complement"><b> FILE ACTIVE</b></a></li>-->
                        </ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:14px">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#labo"><b>LABORATOIRE</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#soins" id="so"><b>Soins Infirmiers</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#document"><b>DOCUMENT</b></a></li>
							<!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#complement"><b> FILE ACTIVE</b></a></li>-->
                        </ul> 
                        <!-- Tab panes -->
                        <div class="tab-content">
							<?php 
								$date_hos = explode(" ",$hos->hos_dDate);
								$nbJour = $this->md_config->NbJours($date_hos[0],date("Y-m-d"));
							?>
							<form id="fin-hos">
								<input type="hidden" name="cout" value="<?php echo $nbJour*$hos->cha_iPrixLit;?>"/>
								<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
								<input type="hidden" value="<?php echo $acm->pat_id; ?>" name="pat">
								<input type="hidden" value="<?php echo $hos->hos_id; ?>" name="hos">
							</form>
							<a href="#dossier" class="btn btn-raised bg-blue-grey" style="color:white; font-size:11px"><i class="fa fa-folder-open"></i> Voir ses hospitalisation</a>
                            <?php if(!empty($liste)){?>
							<a href="javascript:;<?php echo site_url("impression/dossier_medical_passage/".$patient->pat_id); ?>" class="btn btn-raised bg-blue-grey" style="color:white; font-size:11px"><i class="fa fa-print"></i> Imprimer le dossier médical</a>
							<?php } ?>	
							
							
							<a href="javascript:()" data-toggle="modal" data-target="#fin_hos" class="btn btn-danger" style="color:white; font-size:11px"><i class="fa fa-remove"></i> Fin de l'hospitalisation</a>
                            <div role="tabpanel" class="tab-pane in active" id="rapport">                              
							
								<div class="wrap-reset" style="margin-top:45px">
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="header">
													<h2>Évolution des constantes vitales</h2>
													<?php foreach($listeConstante AS $lc){ ?>
														<input type="hidden" class="tension" value="<?php echo $lc->con_iTensionDia; ?>"/>
														<input type="hidden" class="temperature" value="<?php echo $lc->con_iTemperature;?>"/>
														<input type="hidden" class="prise" value="<?php echo $this->md_config->affDateTimeFr($lc->con_dDate);?>"/>
													<?php } ?>
												</div>
												<div class="body">
													<canvas id="contante" height="100"></canvas>
												</div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										
										<?php if(empty($liste)){echo "<span class='text-danger'>Aucune action n'a été faite sur les séjours de ce patient</span>";}else{?>
										
										<table class="table table-bordered table-striped table-hover">
										   
											<thead>
												<tr>
													<th>Date de séjour</th>
													<th>Opérations faites</th>
													<th style="width:75px">Résultat</th>
												</tr>
											</thead>
												<?php 
													foreach($liste AS $l){
													$constante_sejour = $this->md_patient->constante_sejour($l->sea_id);
													$consultation_sejour = $this->md_patient->consultation_sejour($l->sea_id);
													$consultation_sejour_csl = $this->md_patient->consultation_sejour_csl($l->sea_id);
													$ordonnance_sejour = $this->md_patient->ordonnance_sejour($l->sea_id);
													$laboratoire_sejour = $this->md_patient->laboratoire_sejour($l->sea_id);
                                                    $rdv_sej = $this->md_rdv->rdv_sejour($l->sea_id);												?>
												<tr>
													<td>Le <?php echo $this->md_config->affDateFrNum($l->sea_dDate); ?></td>
													<td colspan="2">
														<table style="width:100%;padding:0">
															
															<?php if($constante_sejour){ ?>
															<tr>
																<td>Constantes </td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info const_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>
															
															<?php if($consultation_sejour_csl){ ?>
															<tr>
																<td>Consultation tyroide/hypophyse</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info consu_hyp" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>	
															
															<?php if($consultation_sejour){ ?>
															<tr>
																<td>Consultation du diabète</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info consu_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>
															
															<?php if($ordonnance_sejour){ ?>
															<tr>
																<td>Ordonnance</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info ordo_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>
															
                                                            <?php if($rdv_sej){ ?>
                                                                <tr>
                                                                    <td>Rendez-vous programmé</td>
                                                                    <td style="width:17.6%">
                                                                        <a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info rdv_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
															
															<?php if($laboratoire_sejour){ ?>
															<tr>
																<td>Examen laboratoire</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info laboratoire_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>

														</table>
													</td>
												</tr>
												<?php } ?>
											<tbody>
											
											</tbody>
										</table>
										<?php } ?>
									</div>
								</div>
                            </div>

							<div role="tabpanel" class="tab-pane" id="complement">
								<div class="header" style="margin-top:px">
									<h2>file active <?php if($facrisque || $constante){?>(<a href="<?php echo site_url("impression/file_active/".$acm->pat_id);?>">imprimer</a>)<?php }?></h2>
								</div>
								<div class="row clearfix">
								<?php if(!$facrisque && !$infodiabete && !$constante){?>
									<div class="col-sm-12">
										<p><em>Aucune données trouvées !</em></p>
									</div>	
								<?php }else{?>
									<?php if($infodiabete){?>
										<div class="col-sm-12">
											<b style="color:#000;text-decoration:underline">DIABETE</b>
											<br>
											<br>
										</div>											
										<div class="col-sm-4">
											<b>Découverte Récente:</b> 
											<?php if($infodiabete->ind_sRecente==1){echo 'OUI';}else{echo 'NON';} ;?>	
										</div>											
										<div class="col-sm-4">
											<b>Date découverte:</b>
											<?php echo $this->md_config->affDateFrNum($infodiabete->ind_dDec);?>
										</div>											
										<div class="col-sm-4">
											<b>Ancienneté:</b>
											<?php 
												$ageAnnee= $this->md_config->ageAnnee($infodiabete->ind_dDec); 
												if($ageAnnee>1 || $ageAnnee ==1){echo " En année";}else{
													$mois = $this->md_config->ageMois($infodiabete->ind_dDec);
													if($mois == 0){echo " Moins d'un mois";}else{echo " En mois";}
												}
											?>
										</div>	
										<div class="col-sm-4">
											<b>Type de diabète:</b>
											<?php $diagnos = $this->md_parametre->recupDiagnostique($infodiabete->dgq_id); echo $diagnos->dgq_sLib;?>
										</div>											
										<div class="col-sm-4">
											<b>Suivi Régulier:</b>
											<?php if($infodiabete->ind_sSuivi==1){echo 'OUI';}else{echo 'NON';} ;?>
										</div>											
										<div class="col-sm-4">
											<b>Rythme Visites:</b>
											<?php if($infodiabete->ind_sRythme==0){echo 'Une fois/trimestre';}elseif($infodiabete->ind_sRythme==1){echo 'Une fois/semestre';}else{echo 'Une fois/année';} ;?>
										</div>											
										<div class="col-sm-4">
											<b>Qualité Glycémies:</b>
											<?php if($infodiabete->ind_sQlte==0){echo 'Mauvaise';}elseif($infodiabete->ind_sQlte==1){echo 'Bonne';}else{echo 'Non précisée';} ;?>
										</div>										
										<div class="col-sm-4">
											<b>Dernier HbA1c:</b>
											<?php if(!is_null($infodiabete->ind_dDateDern)){echo $this->md_config->affDateFrNum($infodiabete->ind_dDateDern);}else{echo '<em>Non renseigné</em>';}?>
										</div>										
										<div class="col-sm-4">
											<b>Traitement actuel:</b>
											<?php 
												if($infodiabete->ind_sTrait==0){echo 'Insuline';}elseif($infodiabete->ind_sTrait==1){echo 'Sulfamide hypoglycémiant';}elseif($infodiabete->ind_sTrait==2){echo 'Biguanide';}elseif($infodiabete->ind_sTrait==3){echo 'Sulfamide + biguanide';}elseif($infodiabete->ind_sTrait==4){echo 'Insuline + biguanide';}elseif($infodiabete->ind_sTrait==5){echo 'Régime seul';}else{echo 'Aucun';};
												if($infodiabete->ind_sTrait==1){if($infodiabete->ind_sTypeTrait==0){echo ' (Glibenclamide)';}elseif($infodiabete->ind_sTypeTrait==1){echo ' (Glicazide)';}else{echo ' (Autre)';};}
												?>
										</div>											
									<?php }?>
									<?php if($facrisque || $constante){?>
									<div class="col-sm-12">
										<b style="color:#000;text-decoration:underline">FACTEURS DE RISQUE</b>
										<br>
										<br>
									</div>	
									<div class="col-sm-12">
										<b style="color:#000;">Co-morbidité/FDR</b>
									</div>	
									<div class="col-sm-3">
										<b>HTA:</b>
										<?php if($facrisque){if($facrisque->far_iHta==1){echo'OUI';}else{echo 'NON';};}?>
									</div>								
									<div class="col-sm-3">
										<b>Obésité:</b>
										<?php if($facrisque){if($facrisque->far_iObs==1){echo'OUI';}else{echo 'NON';};}?>
									</div>								
									<div class="col-sm-3">
										<b>Sédentarité:</b>
										<?php if($facrisque){if($facrisque->far_iSed==1){echo'OUI';}else{echo 'NON';};}?>
									</div>								
									<div class="col-sm-3">
										<b>Dyslipidémie:</b>
										<?php if($facrisque){if($facrisque->far_iDys==1){echo'OUI';}else{echo 'NON';};}?>
									</div>	
									<div class="col-sm-12 mt-3">
										<b style="color:#000;">Habitue de vie</b>
									</div>	
									<div class="col-sm-3">
										<b>Tabac:</b>
										<?php if($facrisque){if($facrisque->far_iTab==1){echo'OUI';}elseif($facrisque->far_iTab==2){echo'ARRET';}else{echo 'NON';};}?>
									</div>									
									<div class="col-sm-3">
										<b>Alcool:</b>
										<?php if($facrisque){if($facrisque->far_iAl==1){echo'OUI';}elseif($facrisque->far_iAl==2){echo'ARRET';}else{echo 'NON';};}?>
									</div>	
									<div class="col-sm-12 mt-3">
										<b style="color:#000;">Antécédent familiaux</b>
									</div>	
									<div class="col-sm-3">
										<b>HTA:</b>
										<?php if($facrisque){if($facrisque->far_iHta_2==1){echo'OUI';}else{echo 'NON';};}?>
									</div>									
									<div class="col-sm-3">
										<b>Diabète:</b>
										<?php if($facrisque){if($facrisque->far_iDiab==1){echo'OUI';}else{echo 'NON';};}?>
									</div>										
									<div class="col-sm-3">
										<b>Autre:</b>
										<?php if($facrisque){if(!is_null($facrisque->far_sOther)){echo 'OUI';}else{echo 'NON';};}?>
										<?php if($facrisque){if(!is_null($facrisque->far_sOther)){echo ' ('.$facrisque->far_sOther.')';};}?>
									</div>										
									<?php }?>
									<?php if($constante){?>
									<div class="col-sm-12 mt-3">
										<b style="color:#000;">Données clinique</b>
									</div>	
									<div class="col-sm-3">
										<b>Tension Art.:</b>
										<?php echo $constante->con_iTensionSys.'/'.$constante->con_iTensionDia.'mmHg';?>
									</div>									
									<div class="col-sm-3">              
										<b>Poids:</b>
										<?php echo $constante->con_fPoids.'Kg';?>
									</div>									
									<div class="col-sm-3">
										<b>Taille:</b>
										<?php echo $constante->con_fTaille.'Cm';?>
									</div>									
									<div class="col-sm-3">
										<b>IMC:</b>
										<?php echo round(((100*$constante->con_fPoids)/($constante->con_fTaille*$constante->con_fTaille)),2) . 'kg/m2 ';?>
									</div>									
									<div class="col-sm-3">
										<b>Glycémie:</b>
										<?php echo $constante->con_iGlmie. 'G/L ';?>
									</div>									
									<div class="col-sm-3">
										<b>Température:</b>
										<?php if(is_null($constante->con_iTemperature)){echo '<em>Néant</em>';}else{echo $constante->con_iTemperature.'°C';};?>
									</div>									
									<div class="col-sm-3">
										<b>Pouls:</b>
										<?php if(is_null($constante->con_fPoulsation)){echo '<em>Néant</em>';}else{echo $constante->con_fPoulsation.'pulsations/mn';};?>
									</div>									
									<div class="col-sm-3">
										<b>Tour Taille:</b>
										<?php if(is_null($constante->con_fTourTaille)){echo '<em>Néant</em>';}else{echo $constante->con_fTourTaille.'Cm';};?>
									</div>									
									<div class="col-sm-3">
										<b>Corps Cétonique:</b>
										<?php if(is_null($constante->con_sCetonique)){echo '<em>Néant</em>';}else{echo $constante->con_sCetonique.'Cm';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS debout BG:</b>
										<?php if(is_null($constante->con_iPdbg)){echo '<em>Néant</em>';}else{echo $constante->con_iPdbg.'mmHg';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS debout BD:</b>
										<?php if(is_null($constante->con_iPdbd)){echo '<em>Néant</em>';}else{echo $constante->con_iPdbd.'mmHg';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS couché BG:</b>
										<?php if(is_null($constante->con_iPcbg)){echo '<em>Néant</em>';}else{echo $constante->con_iPcbg.'mmHg';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS couché BD:</b>
										<?php if(is_null($constante->con_iPcbd)){echo '<em>Néant</em>';}else{echo $constante->con_iPcbd.'mmHg';};?>
									</div>									
									<div class="col-sm-12">
										<b>Observations:</b>
										<?php if(is_null($constante->con_sObs)){echo '<em>Néant</em>';}else{echo nl2br($constante->con_sObs);};?>
									</div>
									<?php }?>
									<?php if($facrisque){?>
									<div class="col-sm-12 mt-3">
										<b style="color:#000;text-decoration:underline">COMPLICATIONS</b>
										<br>
									</div>																				
									<div class="col-sm-12 mt-2">
										<b style="color:#000;">Macroangiopathie </br>Cœur et vaisseaux</b>
									</div>									
									<div class="col-sm-12">
										<b style="color:#000;">1.	Coeur</b>
									</div>						
									<div class="col-sm-3">
										<b>Cardiopathie:</b>
										<?php if($facrisque){if($facrisque->far_iCardio==1){echo'OUI';}else{echo 'NON';};}?>
									</div>	
									<div class="col-sm-3">
										<b>HTA:</b>
										<?php if($facrisque){if($facrisque->far_iHta_3==1){echo'OUI';}else{echo 'NON';};}?>
									</div>									
									<div class="col-sm-6">
										<b>Normal:</b>
										<?php if($facrisque){if(!is_null($facrisque->far_iChronol)){echo'OUI';}else{echo 'NON';};}?>
										<?php if($facrisque){if(!is_null($facrisque->far_iChronol)){if($facrisque->far_iChronol==0){echo ' (avant le diabète)';}elseif($facrisque->far_iChronol==1){echo' (après le diabète)';}else{echo' (simultanément)';};}}?>
									</div>	
									<div class="col-sm-12">
										<b style="color:#000;">2.	Vaisseaux</b>
									</div>	
									<div class="col-sm-3">
										<b>Echo Doppler:</b>
										<?php if($facrisque){if($facrisque->far_iEcho==1){echo'OUI';}else{echo 'NON';};}?>
									</div>									
									<div class="col-sm-3">
										<b>AVC:</b>
										<?php if($facrisque){if($facrisque->far_iAvc==1){echo'OUI';}else{echo 'NON';};}?>
									</div>
									<div class="col-sm-12 mt-2">
										<b style="color:#000;">Microangiopathie</b>
									</div>																
									<div class="col-sm-3">
										<b style="color:#000;">Néphro. diab.  </b>
										<?php if($facrisque){if($facrisque->far_iNephro==1){echo'OUI';}else{echo 'NON';};}?>
									</div>								
									<div class="col-sm-3">
										<b style="color:#000;">Neuro.diab.  </b>
										<?php if($facrisque){if($facrisque->far_iNeuro==1){echo'OUI';}else{echo 'NON';};}?>
									</div>										
									<div class="col-sm-6">
										<b style="color:#000;">Rétino. diab. </b>
										<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){echo'OUI';}else{echo 'NON';};}?>
										<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){if($facrisque->far_iTyperetino==0){echo ' (Rétinopathie non proliférante)';}elseif($facrisque->far_iTyperetino==1){echo' (Rétinopathie proliférante)';}else{echo' (Maculopathie diabétique)';};}}?>
									</div>	
									<?php }?>
								<?php }?>
								</div>
                            </div>
							
							
							<div role="tabpanel" class="tab-pane" id="document">
								
                                <div class="header" style="margin-top:45px">
									<h2>Ajout de document medicaux <small>renseignez tous les champs marqués par des (*)</small> </h2>
									
								</div>
								
								<div class="body">
									
									<form id="form-document">
										<div class="row clearfix">
											<div class="col-sm-12 retour-document"></div>
											<div class="col-sm-12 retour-documentFinal"></div>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id"/>
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat"/>
											<div class="col-sm-6">
												<div class="form-group">
													
													<div class="form-line">
														<label style="color:#000">Libelle du document</label>
														<input type="text"  name="lib" class="form-control obligatoire lib" />
														
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="fallback" style="margin-top:25px;">
														<label style="color:#000">Selectionnez le document</label>
														<input type="file" value="<?php if(!is_null($constante)){echo $constante->con_iTensionSys;}?>" name="link" class="form-control obligatoire" >
												</div>
											</div>
											
										</div>
										
										<div class="row clearfix">
											
											<div class="col-sm-12">
												<button type="button" class="btn btn-raised bg-blue-grey" id="addDocument">Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
								
								<div class="header" style="margin-top:45px">
									<h5>Liste des documents medicaux </h5>
								</div>
								<div class="body table-responsive" id="dossier">
									<table id="" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>Libélle</th>
												<th style="width:10px;">Action</th>
											</tr>
										</thead>
									   
										<tbody>
										<?php foreach($listeDocument AS $d){ ?>
											<tr>
												<td><?php echo $d->doc_sLibelle; ?></td>
												<td class="text-center">
													<a target="blank" href="<?php echo base_url($d->doc_sLink); ?>"><b>Voir</b></a>
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="consultation">
                                <div class="header" style="margin-top:45px">
									<h2>Faire une consultation du diabète<small>renseignez tous les champs marqués par des (*)</small> </h2>
								</div>
								<div class="body">
									<form id="form-c">
										<div class="col-sm-12 retour-c"></div>
										<div class="row clearfix">
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Motif de consultation *</label>
														<textarea class="form-control obligatoire" rows="10" name="motif"><?php if($consultation){echo $consultation->csl_sMotif ;}?></textarea>
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Examen clinique</label>
														<textarea class="form-control " rows="10" name="obs"><?php if($consultation){echo $consultation->csl_sObservation ;}?></textarea>
													<input type="hidden" value="<?php echo $acm->pat_id; ?>" name="pat">
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Anamnèse</label>
														<textarea class="form-control " rows="10" name="an"><?php if($consultation){echo $consultation->csl_sAnamnese ;}?></textarea>
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Résumé syndromique</label>
														<textarea class="form-control " rows="10" name="resume"><?php if($consultation){echo $consultation->csl_sResume ;}?></textarea>
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
													</div>
												</div>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Diagnostique</label>
														<select name="diagnos" class="form-control" id="" style="padding-left:5px">
															<option value=""> --- Sélectionner --- </option>
															<?php foreach($listedgq AS $ld){?>
																<?php if(!is_null($consultation->dgq_id)){?>
																	<option value="<?php echo $ld->dgq_id; ?>" <?php if($ld->dgq_id==$consultation->dgq_id){echo 'selected="selected"';} ;?>> <?php echo $ld->dgq_sLib; ?> </option>
																<?php }else{?>
																	<option value="<?php echo $ld->dgq_id; ?>" > <?php echo $ld->dgq_sLib; ?> </option>
																<?php } ?>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>				
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Autre diagnostique</label>
														<textarea class="form-control " rows="10" name="autrediagnos"><?php if($consultation){echo $consultation->csl_sOtherDgq ;}?></textarea>
													</div>
												</div>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Co-morbidité/FDR</label>
													<select name="comor" class="form-control" style="padding-left:5px">
														<option value=""> --- Sélectionner --- </option>
														<?php foreach($listecom AS $lc){?>
															<?php if(!is_null($consultation->com_id)){?>
																<option value="<?php echo $lc->com_id; ?>" <?php if($lc->com_id==$consultation->com_id){echo 'selected="selected"';} ;?>> <?php echo $lc->com_sLib; ?> </option>
															<?php }else{?>
																<option value="<?php echo $lc->com_id; ?>" > <?php echo $lc->com_sLib; ?> </option>
															<?php } ?>
														<?php } ?>
													</select>
													</div>
												</div>
											</div>											
											<div class="col-sm-12">
												<b style="color:#000">Complications</b>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">1. Micro-vasculaires </label>
													<select name="micro" class="form-control" style="padding-left:5px">
														<option value=""> --- Sélectionner --- </option>
														<?php foreach($listecmp AS $mi){?>
															<?php if($mi->cmp_iType==1){?>
																<?php if(!is_null($consultation->cmp_iMicro)){?>
																	<option value="<?php echo $mi->cmp_id; ?>" <?php if($mi->cmp_id==$consultation->cmp_iMicro){echo 'selected="selected"';} ;?>> <?php echo $mi->cmp_sLib; ?> </option>
																<?php }else{?>
																<option value="<?php echo $mi->cmp_id; ?>"> <?php echo $mi->cmp_sLib; ?> </option>
															<?php } ?>
															<?php } ?>
														<?php } ?>
													</select>
													</div>
												</div>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">2. Macro-vasculaires</label>
													<select name="macro" class="form-control" style="padding-left:5px">
														<option value=""> --- Sélectionner --- </option>
														<?php foreach($listecmp AS $mi){?>
															<?php if($mi->cmp_iType==2){?>
																<?php if(!is_null($consultation->cmp_iMacro)){?>
																	<option value="<?php echo $mi->cmp_id; ?>" <?php if($mi->cmp_id==$consultation->cmp_iMacro){echo 'selected="selected"';} ;?>> <?php echo $mi->cmp_sLib; ?> </option>
																<?php }else{?>
																	<option value="<?php echo $mi->cmp_id; ?>" > <?php echo $mi->cmp_sLib; ?> </option>
																<?php } ?>
															<?php } ?>
														<?php } ?>
													</select>
													</div>
												</div>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">3. Pied diabétique</label>
													<select name="pied" class="form-control" style="padding-left:5px">
														<option value=""> --- Sélectionner --- </option>
														<?php foreach($listecmp AS $mi){?>
															<?php if($mi->cmp_iType==3){?>
															<?php if(!is_null($consultation->cmp_iPied)){?>
																	<option value="<?php echo $mi->cmp_id; ?>" <?php if($mi->cmp_id==$consultation->cmp_iPied){echo 'selected="selected"';} ;?>> <?php echo $mi->cmp_sLib; ?> </option>
																<?php }else{?>
																	<option value="<?php echo $mi->cmp_id; ?>"> <?php echo $mi->cmp_sLib; ?> </option>
																<?php } ?>
															<?php } ?>
														<?php } ?>
													</select>
													</div>
												</div>
											</div>																		
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">4. Autres complications</label>
														<textarea id="" class="form-control " rows="10" name="autrecmp"><?php if($consultation){echo $consultation->csl_sOtherCmp ;}?></textarea>
													</div>
												</div>
											</div>	
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Etat du cas traité</label>
													<select name="refere" class="form-control" style="padding-left:5px">
														<?php if(!is_null($consultation->csl_iRef)){?>
															<option value="0" <?php if($consultation->csl_iRef==0){echo 'selected="selected"';} ;?>> Non référé </option>
															<option value="1" <?php if($consultation->csl_iRef==1){echo 'selected="selected"';} ;?>> Référé </option>
														<?php }else{?>
															<option value=""> --- Sélectionner --- </option>
															<option value="0"> Non référé</option>
															<option value="1"> Référé</option>
														<?php }?>
													</select>
													</div>
												</div>
											</div>	
											<div class="col-sm-8">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Conclusion *</label>
														<textarea class="form-control obligatoire" rows="10" name="ccl"><?php if($consultation){echo $consultation->csl_sCcl ;}?></textarea>
													</div>
												</div>
											</div>												
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Programmer un rendez-vous ?</label>
														<select id="progmRdv" class="form-control" style="padding-left:5px">
															<option value="0"> NON</option>
															<option value="1"> OUI</option>
														</select>
													</div>
												</div>
											</div>		
											<div id="hidden1" class="col-sm-12 cacher">
												<div class="form-group">
													<div class="form-line">
														<b style="color:#000">Programmer un rendez-vous</b>
													</div>
												</div>
											</div>												
											<div id="hidden2" class="col-sm-6 cacher">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Date *</label>
													<input type="text" id="dateRdv2" name="dateRdv2" class="form-control datepicker" width="100%">
													</div>
												</div>
											</div>												
											<div id="hidden3" class="col-sm-6 cacher">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Heure *</label>
														<input id="heureRdv2" type="timepicker" name="heureRdv2" class="timepicker form-control date_rdv " placeholder="">
													</div>
												</div>
											</div>	
											<div id="hidden4" class="col-sm-12 cacher">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Objet du rendez-vous *</label>
														<textarea class="form-control " rows="10" id="motifRdv2" name="motifRdv2"></textarea>
													</div>
												</div>
											</div>	
										</div>
										<div class="col-sm-12 retour-c"></div>
										<div class="row clearfix">
											
											<div class="col-sm-12">
												<button type="button" class="btn btn-raised bg-blue-grey" id="consult">Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
                            </div>	

							
							<div role="tabpanel" class="tab-pane" id="hypophyse">
                                <div class="header" style="margin-top:45px">
									<h2>Faire une consultation du THYROÏDE/HYPOPHYSE<small>renseignez tous les champs marqués par des (*)</small> </h2>
								</div>
								<div class="body">
									<form id="form-csl">
										<div class="col-sm-12 retour-csl"></div>
										<div class="row clearfix">
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Motif de consultation *</label>
														<textarea class="form-control obligatoire" rows="10" name="motif"><?php if($consultationcsl){echo $consultationcsl->csh_sMotif ;}?></textarea>
														<input type="hidden" value="<?php echo $acm->pat_id; ?>" name="pat">
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Examen clinique</label>
														<textarea class="form-control " rows="10" name="obs"><?php if($consultationcsl){echo $consultationcsl->csh_sObservation ;}?></textarea>
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Anamnèse</label>
														<textarea class="form-control " rows="10" name="an"><?php if($consultationcsl){echo $consultationcsl->csh_sAnamnese ;}?></textarea>
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Résumé syndromique</label>
														<textarea class="form-control " rows="10" name="resume"><?php if($consultationcsl){echo $consultationcsl->csh_sResume ;}?></textarea>
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Thyroïde – Diagnostic</label>
													<select class="form-control " name="thy" style="padding-left:5px">
														<option value=""> --- Sélectionner --- </option>
														<?php foreach($listeThy AS $lt){?>
															<?php if(!is_null($consultationcsl->tyr_id)){?>
																<option value="<?php echo $lt->tyr_id; ?>" <?php if($lt->tyr_id==$consultationcsl->tyr_id){echo 'selected="selected"';} ;?>> <?php echo $lt->tyr_sLib; ?> </option>
															<?php }else{?>
																<option value="<?php echo $lt->tyr_id; ?>" > <?php echo $lt->tyr_sLib; ?> </option>
															<?php } ?>
														<?php } ?>
													</select>
													</div>
												</div>
											</div>												
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Autre Thyroïde – Diagnostic</label>
														<textarea class="form-control " rows="10" name="otherThy"><?php if($consultationcsl){echo $consultationcsl->csh_sOtherTyr ;}?></textarea>
													</div>
												</div>
											</div>										
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Hypophyse – Diagnostic</label>
													<select class="form-control" name="hyp" style="padding-left:5px">
														<option value=""> --- Sélectionner --- </option>
														<?php foreach($listeHyp AS $lh){?>
															<?php if(!is_null($consultationcsl->hyp_id)){?>
																	<option value="<?php echo $lh->hyp_id; ?>" <?php if($lh->hyp_id==$consultationcsl->hyp_id){echo 'selected="selected"';} ;?>> <?php echo $lh->hyp_sLib; ?> </option>
																<?php }else{?>
																<option value="<?php echo $lh->hyp_id; ?>" > <?php echo $lh->hyp_sLib; ?> </option>
															<?php } ?>
														<?php } ?>
													</select>
													</div>
												</div>
											</div>	
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Autre Hypophyse – Diagnostic</label>
														<textarea class="form-control " rows="10" name="otherHyp"><?php if($consultationcsl){echo $consultationcsl->csh_sOtherHyp ;}?></textarea>
													</div>
												</div>
											</div>												
											<div class="col-sm-12">
												<b style="color:#000">Autres pathologies</b>
											</div>																					
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">1. Endocriniennes </label>
														<textarea class="form-control " rows="10" name="endo"><?php if($consultationcsl){echo $consultationcsl->csh_sEnd ;}?></textarea>
													</div>
												</div>
											</div>											
											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">2. Métaboliques </label>
														<textarea class="form-control " rows="10" name="meta"><?php if($consultationcsl){echo $consultationcsl->csh_sMet ;}?></textarea>
													</div>
												</div>
											</div>											
											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">3. Nutritionnelle </label>
														<textarea class="form-control " rows="10" name="nutri"><?php if($consultationcsl){echo $consultationcsl->csh_sNut ;}?></textarea>
													</div>
												</div>
											</div>										
											<div class="col-sm-8">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000">Conclusion *</label>
													<textarea class="form-control obligatoire" rows="10" name="ccl"><?php if($consultationcsl){echo $consultationcsl->csh_sCcl ;}?></textarea>
												</div>
											</div>
										</div>	
										<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Programmer un rendez-vous ?</label>
														<select id="progmRdv2" class="form-control" style="padding-left:5px">
															<option value="0"> NON</option>
															<option value="1"> OUI</option>
														</select>
													</div>
												</div>
											</div>		
											<div id="hidd1" class="col-sm-12 cacher">
												<div class="form-group">
													<div class="form-line">
														<b style="color:#000">Programmer un rendez-vous</b>
													</div>
												</div>
											</div>												
											<div id="hidd2" class="col-sm-6 cacher">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Date *</label>
													<input type="text" id="dateRdv3" name="dateRdv2" class="form-control datepicker" width="100%">
													</div>
												</div>
											</div>												
											<div id="hidd3" class="col-sm-6 cacher">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Heure *</label>
														<input id="heureRdv3" type="timepicker" name="heureRdv2" class="timepicker form-control date_rdv " placeholder="">
													</div>
												</div>
											</div>	
											<div id="hidd4" class="col-sm-12 cacher">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Objet du rendez-vous *</label>
														<textarea class="form-control " rows="10" id="motifRdv3" name="motifRdv2"></textarea>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 retour-csl"></div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<button type="button" class="btn btn-raised bg-blue-grey" id="consultCsl">Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="avis">
                                <div class="header" style="margin-top:45px">
                                    <h2>Soliciter un avis de spécialiste <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
                                </div>

                                <div class="body">
                                    <div class="table-responsive">
                                        <form id="form-avis">
                                            <div class="retour-avis"></div>
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:55%">Avis d'un spécialiste en</th>
                                                    <th style="width:40%">Motif d'avis</th>
                                                    <th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select id="specialite" style="width:100%;padding-bottom:5px;padding-top:5px">
                                                            <option value=""> Liste des spécialités * </option>
                                                            <option value="4-/-Cardiologie"> Cardiologie </option>
                                                            <option value="42-/-Rumatologie"> Rumatologie </option>
                                                            <option value="32-/-Gynécologie"> Gynécologie </option>
                                                            <option value="47-/-Gynécologie obstétrique"> Gynécologie obstétrique </option>
                                                            <option value="43-/-Neurologie"> Neurologie </option>
                                                            <option value="46-/-Pneumonie"> Pneumonie </option>
                                                            <option value="2-/-Anestésie"> Anestésie </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select id="motifs" style="width:100%;padding-bottom:5px;padding-top:5px">
                                                            <option value=""> Motif * </option>
                                                            <option value="Hospitalisation"> Hospitalisation </option>
                                                            <option value="Opération"> Opération </option>
                                                        </select>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addAvis"><i class="fa fa-plus"></i></a>
                                                    </td>
                                                </tr>
                                                </thead>

                                                <tbody id="tbodyAvis"></tbody>
                                            </table>
                                            <input type="hidden" value="<?php echo $acm_id; ?>" name="id">
                                            <input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
                                        </form>
                                        <a href="javascript:();" class="btn btn-success waves-effect pull-right addAvis" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
                                        <a href="#in" class="cacher cliqueImagerie">clique</a>
                                    </div>
                                </div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="ordonnance">
								<div class="header" style="">
									<h2>Établir une ordonnance <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="row clearfix">
										<div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
											<div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
												<div class="panel panel-col-grey">
													<div class="panel-heading" role="tab" id="headingOne_17">
														<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="true" aria-controls="collapseOne_17" style="font-size:14px"><b>OPTION 1</b> </a> </h4>
													</div>
													<div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_17">
														<div class="panel-body"> 
															<div class="body">
																<div class="table-responsive">
																	<form id="form-ord">
																		<div class="retour-ord"></div>
																		<table class="table table-bordered table-striped table-hover" style="font-size:12px">
																			<thead>
																				<tr>
																					<th style="width:30%">Produit</th>
																					<th style="width:40px">Qte</th>
																					<th style="width:40px">Posologie</th>
																					<th style="width:30px">Durée</th>
																					<th style="width:30px">Renouvelable</th>
																					<th style="width:30px">Frequence</th>
																					<th style="width:50px"  class="text-center"><i class="fa fa-wrench"></i></th>
																				</tr>
																				<tr>
																					<td style="padding:0">
																						<select id="med" class="selectProduit" onChange="groupe();" style="width:100%;padding-bottom:5px;padding-top:5px;margin-bottom:10px">
																							<option value="">----- Prescription * -----</option>
																							 <?php foreach($listeMed AS $l){ ?>
																							<option value="<?php echo $l->med_sNc;?>"><?php echo  $l->med_sNc;?></option>
																							 <?php } ?>
																							<!-- <option value="autre">Autre</option>-->
																						</select>
																						<div id="bloc" class="cacher">
																							<input type="text" id="medi" style="width:58%" placeholder="nom du produit"/>
																							<input type="text" id="forme" style="width:25%" placeholder="forme"/>
																							<input type="text" id="dosage" style="width:15%" placeholder="dosage"/>
																						</div>
																					</td>
																					<td style="padding:0">
																						<input type="number" min="1" id="qte" style="width:100%;height:36px;border:1px solid #ccc;border-radius:5px"/>
																					</td>
																					<td style="padding:0">
																						<input type="number" min="1" id="pos" style="width:55%;height:36px;border:1px solid #ccc;border-radius:5px"/>
																						<select id="typePos" style="width:40%;height:36px;border:1px solid #ccc;border-radius:5px">
																							<option value="Cp">Cp</option>
																							<option value="Inj">Inj</option>
																							<option value="Amp">Amp</option>
																							<option value="Clt">Clt</option>
																							<option value="UI">UI</option>
																						</select>
																					</td>
																					<td style="padding:0">
																						<input type="number" min="1" id="duree" style="width:100%;height:36px;border:1px solid #ccc;border-radius:5px"/>
																					</td>														
																					<td style="padding:0">
																						<select id="typeRenew" style="width:100%;height:36px;border:1px solid #ccc;border-radius:5px">
																							<option value="NON">NON</option>
																							<option value="OUI">OUI</option>
																						</select>
																					</td>														
																					<td style="padding:0">
																						<select id="typeFreq" style="width:100%;height:36px;border:1px solid #ccc;border-radius:5px">
																							<option value="Matin-Midi-Soir">M-M-S</option>
																							<option value="Matin-Midi">Matin-Midi</option>
																							<option value="Matin-Soir">Matin-Soir</option>
																							<option value="Midi-Soir">Midi-Soir</option>
																						</select>
																					</td>
																					<td class="text-center" style="padding:0">
																						<a href="javascript:();" class="btn btn-xs waves-effect bg-blue-grey" id="addOrd"><i class="fa fa-plus"></i></a>
																					</td>
																				</tr>
																			</thead>
																			<tbody id="tbodyOrd"></tbody>
																		</table>
																		<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
																		<input type="hidden" value="<?php echo $acm->pat_id; ?>" name="pat">
																	
																	<button type="submit" class="btn btn-success waves-effect pull-right addOrd" style="color:#fff"><i class="fa fa-check"></i>Valider l'ordonnance</button>
																	</form>
																	<a href="#or" class="cacher cliqueOrd">clique</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="panel panel-col-blue-grey">
													<div class="panel-heading" role="tab" id="headingTwo_17">
														<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false"
																   aria-controls="collapseTwo_17" style="font-size:14px"> <b> OPTION 2</b></a> </h4>
													</div>
													<div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
														<div class="panel-body"> 
															<div class="body">
																<div class="table-responsive">
																	<form id="form-ord2">
																		<div class="retour-ord"></div>
																		<table class="table table-bordered table-striped table-hover" style="font-size:12px">
																			<thead>
																				<tr>
																					<th style="">Définir les produits à prescrire</th>
																				</tr>
																					<td style="padding:0">
																						<textarea id="ordo" name="ordo" rows="20" style="height:155px;width:100%;border:1px solid #ccc;border-radius:5px" placeholder="Saisissez ici..."></textarea>
																					</td>
																				</tr>
																			</thead>
																		</table>
																		<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
																		<input type="hidden" value="<?php echo $acm->pat_id; ?>" name="pat">
																	<button type="button" class="btn btn-success waves-effect pull-right addOrd2" style="color:#fff"><i class="fa fa-check"></i>Valider l'ordonnance</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>						
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="soins">
                                <div class="header" style="margin-top:45px">
									<h2>Prescription des soins infirmiers <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								
								<div class="body">
									<div class="table-responsive">
										<form id="form-soins">
											<div class="retour-soins"></div>
											<table class="table table-bordered table-striped table-hover" style="font-size:12px">
												<thead>
													<tr>
														<th style="width:50%">Actes soins</th>
														<th style="width:45px">Qte</th>
														<th style="width:50px">Heure</th>
														<th style="width:35%">Consigne</th>
														<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_soins" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<?php $listeActSoins = $this->md_parametre->liste_prescription(21); foreach($listeActSoins AS $li){?>
																<option value="<?php echo $li->lac_id; ?>-/-<?php echo $li->lac_sLibelle; ?>-/-<?php echo $li->uni_id; ?>-/-<?php echo $li->lac_iDure; ?>"> <?php echo $li->lac_sLibelle; ?> </option>
																<?php } ?>
															</select>
														</td>
														<td>
															<input type="number" id="qte_soins" style="width:45px"/>
															
														</td>
														<td>
															<input type="text" class="timepicker" id="heure_soins" style="width:50px"/>
														</td>
														<td>
															<textarea id="cons" style="width:100%"></textarea>
															
														</td>
														
														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addSoins"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>
											   
												<tbody id="tbodySoins"></tbody>
											</table>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addSoins" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
										<a href="#so" class="cacher cliqueSoins">clique</a>
									</div>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="hospitalisation">
                                <div class="header" style="margin-top:45px">
									<h2>prescription d'Hospitalisation <small>renseignez tous les champs marqués par des (*)</small> </h2>
									
								</div>
								
								<div class="body">
									
									<form id="form-hos">
										<div class="row clearfix">
											<div class="col-sm-12 retour-hos"></div>
											<div class="col-sm-12 retour-hostFinal"></div>
											<div class="col-sm-6">
												<div class="form-line">
													<label style="color:#000"><b>Unité *</b></label>
													<div class="form-group drop-custum">
														<select name="uni" class="form-control unitePresc obligatoire show-tick">
															<option value="">------------ Choisir l'unité --------------</option>
															<?php $unites = $this->md_parametre->liste_unite_services_actifs(31);foreach($unites AS $u){?>
																<option value="<?php echo $u->uni_id; ?>"><?php echo $u->uni_sLibelle; ?></option>
															<?php } ?>
														</select>
													</div>
													
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-line">
													<label style="color:#000"><b>Chambre *</b></label>
													<div class="form-group drop-custum">
														<select name="cha" class="form-control chambrePresc obligatoire show-tick">
															<option value="">-- Choisir la chambre --</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-line">
													<label style="color:#000"><b>Lit *</b></label>
													<div class="form-group drop-custum">
														<select name="lit" class="form-control litPresc obligatoire show-tick">
															<option value="">-- Choisir le lit --</option>
															
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"><b>Type d'hospitalisation *</b></label>
														<select name="type" class="form-control obligatoire show-tick">
															<option value="Standard">Standard</option>
															<option value="Patient en isolation">Patient en isolation</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"><b>Mode d'entrée *</b></label>
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
                                                        <select name="motif" class="form-control obligatoire">
                                                            <option value="">-- Choisir le mode --</option>
                                                            <option value="référé">Référé</option>
                                                            <option value="auto référé">Auto Référé</option>
                                                            <option value="contre référé">Contre référé</option>
                                                        </select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="row clearfix">
											
											<div class="col-sm-12">
												<button type="submit" class="btn btn-raised bg-blue-grey" id="enregistrerHospi">DEMANDE D'HOSPITALISATION</button>
											</div>
										</div>
									</form>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="imagerie">
                                <div class="header" style="margin-top:45px">
									<h2>Prescription imagerie <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								
								<div class="body">
									<div class="table-responsive">
										<form id="form-imagerie">
											<div class="retour-imagerie"></div>
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th style="width:95%">Actes imagerie</th>
														<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_imagerie" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<?php $listeActSoins = $this->md_parametre->liste_prescription(25); foreach($listeActSoins AS $li){?>
																<option value="<?php echo $li->lac_id; ?>-/-<?php echo $li->lac_sLibelle; ?>-/-<?php echo $li->uni_id; ?>-/-<?php echo $li->lac_iDure; ?>"> <?php echo $li->lac_sLibelle; ?> </option>
																<?php } ?>
															</select>
														</td>
											
														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addImagerie"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>
											   
												<tbody id="tbodyImagerie"></tbody>
											</table>
											<br><label style="color:#000;margin-left:10px"><b>Indication</b></label>
											<textarea id="indication" name="indication" style="width:100%"></textarea>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_imagerie">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addImagerie" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
										<a href="#in" class="cacher cliqueImagerie">clique</a>
									</div>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="labo">
                                <div class="header" style="margin-top:45px">
									<h2>Prescription examen laboratoire <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								
								<div class="body">
									<div class="table-responsive">
										<form id="form-labo">
											<div class="retour-labo"></div>
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th style="width:95%">Examen(s) à faire</th>
														<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_labo" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Sélectionner * </option>
																<?php foreach($listeActeLabo AS $lm){?>
																<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																<?php } ?>
															</select>
															
														</td>														
														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addLabo"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>
											   
												<tbody id="tbodyLabo"></tbody>
											</table>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addLabo_2" style="color:#fff"><i class="fa fa-check"></i>Valider</a>
										<a href="#in" class="cacher cliqueLabo">clique</a>
									</div>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="reeducation">
                                 <div class="header" style="margin-top:45px">
									<h2>Prescription en réeducation <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								
								<div class="body">
									<div class="table-responsive">
										<form id="form-reeducation">
											<div class="retour-reeducation"></div>
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th style="width:95%">Actes réeducation</th>
														<th style="width:95%">Nombre de seances</th>
														<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_reeducation" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<?php $listeActSoins = $this->md_parametre->liste_prescription(30); foreach($listeActSoins AS $li){?>
																<option value="<?php echo $li->lac_id; ?>-/-<?php echo $li->lac_sLibelle; ?>-/-<?php echo $li->uni_id; ?>-/-<?php echo $li->lac_iDure; ?>"> <?php echo $li->lac_sLibelle; ?> </option>
																<?php } ?>
															</select>
														</td>														
														
														<td>
															<input type="number" id="nombre" name="nombre" />
														</td>
											
														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addReeducation"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>
											   
												<tbody id="tbodyReeducation"></tbody>
											</table>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addReeducation" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
										<a href="#in" class="cacher cliqueReeducation">clique</a>
									</div>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="exploration">
                                <div class="header" style="margin-top:45px">
									<h2>Exploration fonctionnelle <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								
								<div class="body">
									<div class="table-responsive">
										<form id="form-exp">
											<div class="retour-exp"></div>
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th style="width:95%">Actes exploration</th>
														<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_exp" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<optgroup label="Cardiologie">
																	<?php foreach($listeExamenCardio AS $lm){?>
																	<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Rhumatologie">
																	<?php foreach($listeExamenRhum AS $lm){?>
																	<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Gynécologie">
																	<?php foreach($listeExamenGyne AS $lm){?>
																	<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Gynécologie obstétricienne">
																	<?php foreach($listeExamenGyneObs AS $lm){?>
																	<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Neurologie">
																	<?php foreach($listeExamenGyneNeuro AS $lm){?>
																	<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Pneumonie">
																	<?php foreach($listeExamenGynePneu AS $lm){?>
																	<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
															</select>
														</td>
											
														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addExp"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>
											   
												<tbody id="tbodyExp"></tbody>
											</table>
											<br><label style="color:#000;margin-left:10px"><b>Indication</b></label>
											<textarea id="indication" name="indication" style="width:100%"></textarea>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addexp" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
										<a href="#in" class="cacher cliqueExp">clique</a>
									</div>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="diagnostic">
								<div class="header" style="margin-top:45px">
									<h2>Examen cardiologique <small>renseignez tous les champs marqués par des (*)</small> </h2>
								</div>
								<div class="table-responsive">
									<form id="form-cardio">
										<table class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th style="width:95%">Prescription examen</th>
													<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
												</tr>
												<tr>
													<td>
														<select id="act_cardio" style="width:100%;padding-bottom:5px;padding-top:5px">
															<option value=""> Sélectionner * </option>
															<?php foreach($listeExamen AS $lm){?>
															<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
															<?php } ?>
														</select>
														<div class="retour-cardio"></div>
													</td>														
													<td class="text-center">
														<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addCardio"><i class="fa fa-plus"></i></a>
													</td>
												</tr>
											</thead>
											<tbody id="tbodyCardio"></tbody>
										</table>
										<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
										<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
										<input type="hidden" value="<?php echo $hos->hos_id; ?>" name="hos">
									</form>
									<a href="javascript:();" class="btn btn-success waves-effect pull-right addCardio" style="color:#fff"><i class="fa fa-check"></i>Valider</a>
									<a href="#in" class="cacher cliqueReeducation">clique</a>
								</div>
						    </div>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Liste des passages du patient</h2>
						<?php // var_dump($listeEncours); ?>
					</div>
					<div class="body table-responsive" id="dossier">
						<table id="example" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>N° Matricule</th>
									<th>Noms</th>
									<th>Prénoms</th>
									<th style="width:175px">Actes médicaux</th>
									<th>Médecins traitants</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($listeEncours AS $le){ ?>
								<tr>
									<td><?php echo $le->pat_sMatricule; ?></td>
									<td><?php echo $le->pat_sNom; ?></td>
									<td><?php echo $le->pat_sPrenom; ?></td>
									<td><?php echo $le->lac_sLibelle; ?></td>
									<td align="center"><?php echo $le->per_sNom . ' ' . $le->per_sPrenom ; ?></td>
									<td><?php if(is_null($le->fac_dDatePaie)){echo '<em>non renseigné</em>';}else{ echo 'Le '.$this->md_config->affDateFrNum($le->fac_dDatePaie);};?></td>
									<td class="text-center">
										<?php if(is_null($le->hos_id)){ ?>
										<a href="<?php echo site_url("consultation/voir/".$le->acm_id); ?>"><b>Voir</b></a> 
										<?php }else{ ?>
										<a href="<?php echo site_url("hospitalisation/voir/".$le->hos_id); ?>"><b>Voir</b></a>
										<?php } ?>
										 <!--|									
										<a href="<?php echo site_url("impression/dossier_medical_passage/".$le->acm_id); ?>"><b>Imprimer</b></a> -->
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalConsulte" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						
						<div class="body table-responsive">
							<div class="col-md-12" id="recepConsultation"></div>
						</div>
					</div>
				</div>
			
			</div>
          
        </div>
    </div>
</div>

<div class="modal fade" id="fin_hos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="" id="defaultModalLabel">HOSPITALISATION</h4>
            </div>
            <div class="modal-body">
				<form id="motif-fin">
					<div class="form-group">
						<label class="text-left">Motif de fin d'hospitalisation</label>
						<select name="motif" class="form-control obligatoire" style="border:1px solid black">
							<option value="">------- Choisir -------</option>
							<option value="normal">Normal</option>
							<option value="contre avis du medicale">Contre avis du medicale</option>
							<option value="a la demande">Transferer à la sortie</option>
                            <option value="Fugue">Fugue</option>
                            <option value="deces">Décès</option>
						</select>
					</div>
				</form>
			</div>
            <div class="modal-footer">
				<button type="button" class="btn btn-success waves-effect fin_hos" style="color:#fff" onClick="var finHos = confirm('Voulez-vous mettre fin à l\'hospitalisation du patient ?'); if(finHos){finHospitalisation();}" > Fin d'hospitalisation</button>
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Annuler</button>
			</div>
        </div>
    </div>
</div>


 <script type="text/javascript">
        'use strict';
		
		
		function groupe(){
			 var med = document.getElementById('med').value;
			 if(med == "autre"){
				 document.getElementById('bloc').classList.remove("cacher");
			 }
			 else{
				 document.getElementById('bloc').classList.add("cacher");
			 }
		}
		
        var listeOrd = document.querySelector('#tbodyOrd');
        var addOrd = document.querySelector('#addOrd');
        var annuaire;
        annuaire = new Array();

        function removeOrdMed(index) {
            annuaire.splice(index,1);
            showListeOrdMed();	
        }
		
		function removeOrdAutre(index) {
            annuaire.splice(index,1);
            showListeOrdAutre();	
        }

        function addDetailOrd() 
        {
            var med 	            = document.getElementById('med').value;
            var qte 	            = document.getElementById('qte').value;
            var duree 	            = document.getElementById('duree').value;
            var pos 	            = document.getElementById('pos').value;
            var typePos 	        = document.getElementById('typePos').value;
            var medi 	            = document.getElementById('medi').value;
            var forme 	            = document.getElementById('forme').value;
            var dosage 	            = document.getElementById('dosage').value;
            var typeRenew 	        = document.getElementById('typeRenew').value;
            var typeFreq 	        = document.getElementById('typeFreq').value;
			// alert(qte);
			if(med !="autre"){
				if(med == '' || qte == ''|| duree == ''|| pos == ''|| typeRenew == ''|| typeFreq == '') {
					alert('Veuillez renseigner le champs.');	
				}
				else {
					var contact = new Object();
					contact.med	       	    = med;
					contact.qte	    		= qte;
					contact.duree	        = duree;
					contact.pos	        	= pos;
					contact.typePos	        = typePos;
					contact.typeRenew	    = typeRenew;
					contact.typeFreq	    = typeFreq;
					annuaire.push(contact);
					showListeOrdMed();	
					document.getElementById('qte').value="";
					document.getElementById('duree').value="";
					document.getElementById('pos').value="";
				}
			}
			else{
				if(medi == '' || forme == '' || dosage == '' || qte == ''|| duree == ''|| pos == '' || typeRenew == ''|| typeFreq == ''){
					alert('Veuillez renseigner le champs.');	
				}
				else {
					var contact = new Object();
					contact.medi	       	= medi;
					contact.forme	       	= forme;
					contact.dosage	        = dosage;
					contact.qte	    		= qte;
					contact.duree	        = duree;
					contact.pos	        	= pos;
					contact.typePos	        = typePos;
					contact.typeRenew	    = typeRenew;
					contact.typeFreq	    = typeFreq;
					annuaire.push(contact);
					showListeOrdAutre();	
					document.getElementById('medi').value="";
					document.getElementById('forme').value="";
					document.getElementById('dosage').value="";
					document.getElementById('qte').value="";
					document.getElementById('duree').value="";
					document.getElementById('pos').value="";
				}
			}
        }

        addOrd.addEventListener('click', addDetailOrd);

        function showListeOrdMed() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
				
                contenu += '<tr>';
                contenu += '<td><input type="hidden" name="med[]" value="'+ annuaire[i].med+'"/>' +annuaire[i].med + '</td>';
				contenu += '<td><input type="hidden" name="qte[]" value="'+ annuaire[i].qte+'"/>' + annuaire[i].qte + '</td>';
				contenu += '<td><input type="hidden" name="pos[]" value="'+ annuaire[i].pos+ ' ' + annuaire[i].typePos+' /jour"/>' + annuaire[i].pos + ' ' + annuaire[i].typePos + ' /jour</td>';
				contenu += '<td><input type="hidden" name="duree[]" value="'+ annuaire[i].duree+'"/>' + annuaire[i].duree + '</td>';
				contenu += '<td><input type="hidden" name="renew[]" value="'+ annuaire[i].typeRenew+'"/>'+ annuaire[i].typeRenew + '</td>';
				contenu += '<td><input type="hidden" name="freq[]" value="'+ annuaire[i].typeFreq+'"/>'+ annuaire[i].typeFreq + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeOrdMed(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeOrd.innerHTML = contenu;
			// alert(contenu);
        }
    
        function showListeOrdAutre() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
				var jour="";
				if(annuaire[i].duree >1){
					jour ="jours";
				}
				else{
					jour ="jour";
				}
                contenu += '<tr>';
                contenu += '<td><input type="hidden" name="med[]" value="'+annuaire[i].medi + ' '+annuaire[i].forme + ' '+annuaire[i].dosage +'"/>' +annuaire[i].medi + ' '+annuaire[i].forme + ' '+annuaire[i].dosage + '</td>';
				contenu += '<td><input type="hidden" name="qte[]" value="'+ annuaire[i].qte+'"/>' + annuaire[i].qte + '</td>';
				contenu += '<td><input type="hidden" name="pos[]" value="'+ annuaire[i].pos+ ' ' + annuaire[i].typePos+' /jour"/>' + annuaire[i].pos + ' ' + annuaire[i].typePos + ' /jour</td>';
				contenu += '<td><input type="hidden" name="duree[]" value="'+ annuaire[i].duree+'"/>' + annuaire[i].duree + ' '+jour+'</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeOrdAutre(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeOrd.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>

 <script type="text/javascript">
        'use strict';
		
        var listeSoins = document.querySelector('#tbodySoins');
        var addSoins = document.querySelector('#addSoins');
        var annuaireSoins;
        annuaireSoins = new Array();

        function removeSoins(index) {
            annuaireSoins.splice(index,1);
            showListeSoins();	
        }

        function addDetailSoins() 
        {
            var act_soins 	            = document.getElementById('act_soins').value;
            var qte_soins 	            = document.getElementById('qte_soins').value;
            var heure_soins 	            = document.getElementById('heure_soins').value;
            var cons 	            = document.getElementById('cons').value;
			
            if(act_soins == '' || qte_soins == ''|| heure_soins == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contactSoins = new Object();
                contactSoins.act_soins	       	    = act_soins;
                contactSoins.qte_soins	    		= qte_soins;
                contactSoins.heure_soins	        = heure_soins;
                contactSoins.cons	        	= cons;
                annuaireSoins.push(contactSoins);
                showListeSoins();	
				document.getElementById('heure_soins').value="";
				document.getElementById('qte_soins').value="";
				document.getElementById('cons').value="";
            }
        }

        addSoins.addEventListener('click', addDetailSoins);

        function showListeSoins() 
        {
            var contenuSoins="";
            var tailleTableauSoins = annuaireSoins.length;            
                
            for(var i = 0; i < tailleTableauSoins; i++) {
				
				var tabSoins = annuaireSoins[i].act_soins.split("-/-");
				
                contenuSoins += '<tr>';
                contenuSoins += '<td><input type="hidden" name="act_soins[]" value="'+ tabSoins[0]+'"/><input type="hidden" name="uni_soins[]" value="'+ tabSoins[2]+'"/>' + tabSoins[1] + '<input type="hidden" name="duree_soins[]" value="'+ tabSoins[3]+'"/> </td>';
				 contenuSoins += '<td><input type="hidden" name="qte_soins[]" value="'+ annuaireSoins[i].qte_soins+'"/>X ' + annuaireSoins[i].qte_soins + '</td>';
				 contenuSoins += '<td><input type="hidden" name="heure_soins[]" value="'+ annuaireSoins[i].heure_soins+'"/> à ' + annuaireSoins[i].heure_soins +'</td>';
				 contenuSoins += '<td><input type="hidden" name="cons[]" value="'+ annuaireSoins[i].cons+'"/>' + annuaireSoins[i].cons + '</td>';
                contenuSoins += '<td class="text-center"><a href="javascript:();" onClick="removeSoins(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuSoins += '</tr>';
            }

            listeSoins.innerHTML = contenuSoins;
			// alert(contenu);
        }
    
</script>
		
		
		
 <script type="text/javascript">
        'use strict';
		
        var listeImagerie = document.querySelector('#tbodyImagerie');
        var addImagerie = document.querySelector('#addImagerie');
        var annuaireImagerie;
        annuaireImagerie = new Array();

        function removeImagerie(index) {
            annuaireImagerie.splice(index,1);
            showListeImagerie();	
        }

        function addDetailImagerie() 
        {
            var act_imagerie	            = document.getElementById('act_imagerie').value;
			
            if(act_imagerie == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contactImagerie = new Object();
                contactImagerie.act_imagerie	       	    = act_imagerie;
                annuaireImagerie.push(contactImagerie);
                showListeImagerie();	
            }
        }

        addImagerie.addEventListener('click', addDetailImagerie);

        function showListeImagerie() 
        {
            var contenuImagerie="";
            var tailleTableauImagerie = annuaireImagerie.length;            
                
            for(var i = 0; i < tailleTableauImagerie; i++) {
				
				var tabImagerie = annuaireImagerie[i].act_imagerie.split("-/-");
				
                contenuImagerie += '<tr>';
                contenuImagerie += '<td><input type="hidden" name="act_imagerie[]" value="'+ tabImagerie[0]+'"/><input type="hidden" name="uni_imagerie[]" value="'+ tabImagerie[2]+'"/><input type="hidden" name="duree_imagerie[]" value="'+ tabImagerie[3]+'"/>' + tabImagerie[1] + '</td>';
                contenuImagerie += '<td class="text-center"><a href="javascript:();" onClick="removeImagerie(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuImagerie += '</tr>';
            }

            listeImagerie.innerHTML = contenuImagerie;
			// alert(contenu);
        }
    
        </script>

		
 <script type="text/javascript">
        'use strict';
		
        var listeExp = document.querySelector('#tbodyExp');
        var addExp = document.querySelector('#addExp');
        var annuaireExp;
        annuaireExp = new Array();

        function removeExp(index) {
            annuaireExp.splice(index,1);
            showListeExp();	
        }

        function addDetailExp() 
        {
            var act_exp	            = document.getElementById('act_exp').value;
			
            if(act_exp == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contactExp = new Object();
                contactExp.act_exp	       	    = act_exp;
                annuaireExp.push(contactExp);
                showListeExp();	
            }
        }

        addExp.addEventListener('click', addDetailExp);

        function showListeExp() 
        {
            var contenuExp="";
            var tailleTableauExp = annuaireExp.length;            
                
            for(var i = 0; i < tailleTableauExp; i++) {
				
				var tabExp = annuaireExp[i].act_exp.split("-/-");
				
                contenuExp += '<tr>';
                contenuExp += '<td><input type="hidden" name="act_exp[]" value="'+ tabExp[0]+'"/><input type="hidden" name="uni[]" value="'+ tabExp[2]+'"/><input type="hidden" name="duree[]" value="'+ tabExp[3]+'"/>' + tabExp[1] + '</td>';
                contenuExp += '<td class="text-center"><a href="javascript:();" onClick="removeExp(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuExp += '</tr>';
            }

            listeExp.innerHTML = contenuExp;
			// alert(contenu);
        }
    
        </script>

			
		 <script type="text/javascript">
        'use strict';
		
        var listeReeducation = document.querySelector('#tbodyReeducation');
        var addReeducation = document.querySelector('#addReeducation');
        var annuaireReeducation;
        annuaireReeducation = new Array();

        function removeReeducation(index) {
            annuaireReeducation.splice(index,1);
            showListeReeducation();	
        }

        function addDetailReeducation() 
        {
            var act_reeducation	            = document.getElementById('act_reeducation').value;
            var nombre	            = document.getElementById('nombre').value;
			
            if(act_reeducation == '' || nombre == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-reeducation")[0].innerHTML='<span style="color:red">Veuillez renseigner tous les champs</span>';
            }
            else {
                var contactReeducation = new Object();
                contactReeducation.act_reeducation	       	    = act_reeducation;
                contactReeducation.nombre	       	    = nombre;
                annuaireReeducation.push(contactReeducation);
                showListeReeducation();	
				document.getElementById('nombre').value="";
            }
        }

        addReeducation.addEventListener('click', addDetailReeducation);

        function showListeReeducation() 
        {
            var contenuReeducation="";
            var tailleTableauReeducation = annuaireReeducation.length;            
                
            for(var i = 0; i < tailleTableauReeducation; i++) {
				
				var tabReeducation = annuaireReeducation[i].act_reeducation.split("-/-");
				
                contenuReeducation += '<tr>';
                contenuReeducation += '<td><input type="hidden" name="act_reeducation[]" value="'+ tabReeducation[0]+'"/><input type="hidden" name="uni_reeducation[]" value="'+ tabReeducation[2]+'"/><input type="hidden" name="duree_reeducation[]" value="'+ tabReeducation[3]+'"/>' + tabReeducation[1] + '</td>';
                contenuReeducation += '<td><input type="hidden" name="nombre[]" value="'+ annuaireReeducation[i].nombre+'"/>' + annuaireReeducation[i].nombre + '</td>';
				contenuReeducation += '<td class="text-center"><a href="javascript:();" onClick="removeReeducation(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuReeducation += '</tr>';
            }

            listeReeducation.innerHTML = contenuReeducation;
			 // alert(contenuReeducation);
        }
    
        </script>

		
		
		<script type="text/javascript">
        'use strict';
		
        var listeMaladie = document.querySelector('#tbodyMaladie');
        var addMaladie = document.querySelector('#addMaladie');
        var annuaireMaladie;
        annuaireMaladie = new Array();

        function removeMaladie(index) {
            annuaireMaladie.splice(index,1);
            showListeMaladie();	
        }

        function addDetailMaladie() 
        {
            var act_maladie	            = document.getElementById('act_maladie').value;
			
            if(act_maladie == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-maladie")[0].innerHTML='<span style="color:red">Veuillez sélectionner une maladie</span>';
            }
            else {
				document.getElementsByClassName("retour-maladie")[0].innerHTML='';
                var contactMaladie = new Object();
                contactMaladie.act_maladie	       	    = act_maladie;
                annuaireMaladie.push(contactMaladie);
                showListeMaladie();	
            }
        }

        addMaladie.addEventListener('click', addDetailMaladie);

        function showListeMaladie() 
        {
            var contenuMaladie="";
            var tailleTableauMaladie = annuaireMaladie.length;            
                
            for(var i = 0; i < tailleTableauMaladie; i++) {
				
				var tabMaladie = annuaireMaladie[i].act_maladie.split("-/-");
				
                contenuMaladie += '<tr>';
                contenuMaladie += '<td><input type="hidden" name="nom[]" value="'+ tabMaladie[0]+'"/>' + tabMaladie[1] + '</td>';
				contenuMaladie += '<td class="text-center"><a href="javascript:();" onClick="removeMaladie(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuMaladie += '</tr>';
            }

            listeMaladie.innerHTML = contenuMaladie;
			 // alert(contenuMaladie);
        }
    
        </script>		
		<script type="text/javascript">
        'use strict';
		
        var listeLabo = document.querySelector('#tbodyLabo');
        var addLabo = document.querySelector('#addLabo');
        var annuaireLabo;
        annuaireLabo = new Array();

        function removeLabo(index) {
            annuaireLabo.splice(index,1);
            showListeLabo();	
        }

        function addDetailLabo() 
        {
            var act_labo	            = document.getElementById('act_labo').value;
			
            if(act_labo == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-labo")[0].innerHTML='<span style="color:red">Veuillez sélectionner un acte</span>';
            }
            else {
				document.getElementsByClassName("retour-labo")[0].innerHTML='';
                var contactLabo = new Object();
                contactLabo.act_labo       	    = act_labo;
                annuaireLabo.push(contactLabo);
                showListeLabo();	
            }
        }

        addLabo.addEventListener('click', addDetailLabo);

        function showListeLabo() 
        {
            var contenuLabo="";
            var tailleTableauLabo = annuaireLabo.length;            
                
            for(var i = 0; i < tailleTableauLabo; i++) {
				
				var tabLabo = annuaireLabo[i].act_labo.split("-/-");
				
                contenuLabo += '<tr>';
                contenuLabo += '<td><input type="hidden" name="act_labo[]" value="'+ tabLabo[0]+'"/><input type="hidden" name="uni[]" value="'+ tabLabo[2]+'"/><input type="hidden" name="duree[]" value="'+ tabLabo[3]+'"/>' + tabLabo[1] + '</td>';
				contenuLabo += '<td class="text-center"><a href="javascript:();" onClick="removeLabo(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuLabo += '</tr>';
            }

            listeLabo.innerHTML = contenuLabo;
			 // alert(contenuMaladie);
        }
    
        </script>
		
				
				<script type="text/javascript">
        'use strict';
		
        var listeLan = document.querySelector('#tbodyLan');
        var addLan = document.querySelector('#addLan');
        var annuaireLan;
        annuaireLan = new Array();

        function removeLan(index) {
            annuaireLan.splice(index,1);
            showListeLan();	
        }

        function addDetailLan() 
        {
            var lan	            = document.getElementById('lan').value;
			
            if(lan == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-lan")[0].innerHTML='<span style="color:red">Veuillez sélectionner</span>';
            }
            else {
				document.getElementsByClassName("retour-lan")[0].innerHTML='';
                var contactLan = new Object();
                contactLan.lan      	    = lan;
                annuaireLan.push(contactLan);
                showListeLan();	
            }
        }

        addLan.addEventListener('click', addDetailLan);

        function showListeLan() 
        {
            var contenuLan="";
            var tailleTableauLan = annuaireLan.length;            
                
            for(var i = 0; i < tailleTableauLan; i++) {
				
				var tabLan = annuaireLan[i].lan.split("-/-");
				
                contenuLan += '<tr>';
                contenuLan += '<td><input type="hidden" name="lan[]" value="'+ tabLan[0]+'"/>' + tabLan[1] + '</td>';
				contenuLan += '<td class="text-center"><a href="javascript:();" onClick="removeLan(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuLan += '</tr>';
            }

            listeLan.innerHTML = contenuLan;
			 // alert(contenuMaladie);
        }
    
        </script>
		
		
	<script type="text/javascript">
        'use strict';
		
        var listeLaf = document.querySelector('#tbodyLaf');
        var addLaf = document.querySelector('#addLaf');
        var annuaireLaf;
        annuaireLaf = new Array();

        function removeLaf(index) {
            annuaireLaf.splice(index,1);
            showListeLaf();	
        }

        function addDetailLaf() 
        {
            var laf	            = document.getElementById('laf').value;
			
            if(laf == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-laf")[0].innerHTML='<span style="color:red">Veuillez sélectionner</span>';
            }
            else {
				document.getElementsByClassName("retour-laf")[0].innerHTML='';
                var contactLaf = new Object();
                contactLaf.laf      	    = laf;
                annuaireLaf.push(contactLaf);
                showListeLaf();	
            }
        }

        addLaf.addEventListener('click', addDetailLaf);

        function showListeLaf() 
        {
            var contenuLaf="";
            var tailleTableauLaf = annuaireLaf.length;            
                
            for(var i = 0; i < tailleTableauLaf; i++) {
				
				var tabLaf = annuaireLaf[i].laf.split("-/-");
				
                contenuLaf += '<tr>';
                contenuLaf += '<td><input type="hidden" name="laf[]" value="'+ tabLaf[0]+'"/>' + tabLaf[1] + '</td>';
				contenuLaf += '<td class="text-center"><a href="javascript:();" onClick="removeLaf(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuLaf += '</tr>';
            }

            listeLaf.innerHTML = contenuLaf;
			 // alert(contenuMaladie);
        }
    
        </script>
		
	<script type="text/javascript">
        'use strict';
		
        var listeLia = document.querySelector('#tbodyLia');
        var addLia = document.querySelector('#addLia');
        var annuaireLia;
        annuaireLia = new Array();

        function removeLia(index) {
            annuaireLia.splice(index,1);
            showListeLia();	
        }

        function addDetailLia() 
        {
            var lia	            = document.getElementById('lia').value;
			
            if(lia == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-lia")[0].innerHTML='<span style="color:red">Veuillez sélectionner</span>';
            }
            else {
				document.getElementsByClassName("retour-lia")[0].innerHTML='';
                var contactLia = new Object();
                contactLia.lia      	    = lia;
                annuaireLia.push(contactLia);
                showListeLia();	
            }
        }

        addLia.addEventListener('click', addDetailLia);

        function showListeLia() 
        {
            var contenuLia="";
            var tailleTableauLia = annuaireLia.length;            
                
            for(var i = 0; i < tailleTableauLia; i++) {
				
				var tabLia = annuaireLia[i].lia.split("-/-");
				
                contenuLia += '<tr>';
                contenuLia += '<td><input type="hidden" name="lia[]" value="'+ tabLia[0]+'"/>' + tabLia[1] + '</td>';
				contenuLia += '<td class="text-center"><a href="javascript:();" onClick="removeLia(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuLia += '</tr>';
            }

            listeLia.innerHTML = contenuLia;
        }
    
        </script>

		
	<script type="text/javascript">
        'use strict';
		
        var listeLap = document.querySelector('#tbodyLap');
        var addLap = document.querySelector('#addLap');
        var annuaireLap;
        annuaireLap = new Array();

        function removeLap(index) {
            annuaireLap.splice(index,1);
            showListeLap();	
        }

        function addDetailLap() 
        {
            var lap	            = document.getElementById('lap').value;
			
            if(lap == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-lap")[0].innerHTML='<span style="color:red">Veuillez sélectionner</span>';
            }
            else {
				document.getElementsByClassName("retour-lap")[0].innerHTML='';
                var contactLap = new Object();
                contactLap.lap      	    = lap;
                annuaireLap.push(contactLap);
                showListeLap();	
            }
        }

        addLap.addEventListener('click', addDetailLap);

        function showListeLap() 
        {
            var contenuLap="";
            var tailleTableauLap = annuaireLap.length;            
                
            for(var i = 0; i < tailleTableauLap; i++) {
				
				var tabLap = annuaireLap[i].lap.split("-/-");
				
                contenuLap += '<tr>';
                contenuLap += '<td><input type="hidden" name="lap[]" value="'+ tabLap[0]+'"/>' + tabLap[1] + '</td>';
				contenuLap += '<td class="text-center"><a href="javascript:();" onClick="removeLia(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuLap += '</tr>';
            }

            listeLap.innerHTML = contenuLap;
        }
    
        </script>
		
				
			<script type="text/javascript">
        'use strict';
		
        var listeCardio = document.querySelector('#tbodyCardio');
        var addCardio = document.querySelector('#addCardio');
        var annuaireCardio;
        annuaireCardio = new Array();

        function removeCardio(index) {
            annuaireCardio.splice(index,1);
            showListeCardio();	
        }

        function addDetailCardio() 
        {
            var act_cardio	            = document.getElementById('act_cardio').value;
			
            if(act_cardio == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-cardio")[0].innerHTML='<span style="color:red">Veuillez sélectionner l\'examen cardiologique</span>';
            }
            else {
				document.getElementsByClassName("retour-cardio")[0].innerHTML='';
                var contactCardio = new Object();
                contactCardio.act_cardio	       	    = act_cardio;
                annuaireCardio.push(contactCardio);
                showListeCardio();	
            }
        }

        addCardio.addEventListener('click', addDetailCardio);

        function showListeCardio() 
        {
            var contenuCardio="";
            var tailleTableauCardio = annuaireCardio.length;            
                
            for(var i = 0; i < tailleTableauCardio; i++) {
				
				var tabCardio = annuaireCardio[i].act_cardio.split("-/-");
				
                contenuCardio += '<tr>';
                contenuCardio += '<td><input type="hidden" name="act_cardio[]" value="'+ tabCardio[0]+'"/><input type="hidden" name="uni[]" value="'+ tabCardio[2]+'"/><input type="hidden" name="duree[]" value="'+ tabCardio[3]+'"/>' + tabCardio[1] + '</td>';
				contenuCardio += '<td class="text-center"><a href="javascript:();" onClick="removeCardio(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuCardio += '</tr>';
            }

            listeCardio.innerHTML = contenuCardio;
			 // alert(contenuMaladie);
        }
    
    </script>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>