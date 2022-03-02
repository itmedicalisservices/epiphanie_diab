
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php //$acm = $this->md_patient->acm_patient($acm_id); ?>
<?php $patient = $this->md_patient->recup_patient($pat_id); ?>
<?php $constante = $this->md_patient->constanteDonneeClinique($pat_id);?>
<?php $infodiabete = $this->md_patient->InfoDiabete($pat_id); ?>
<?php //$information = $this->md_patient->information($acm->pat_id); ?>
<?php $facrisque = $this->md_patient->facteurRisque($pat_id);?>
<?php //$ListeConst = $this->md_patient->liste_constante($acm_id); ?>
<?php //$consultation = $this->md_patient->consultation($acm_id); ?>
<?php //$liste = $this->md_patient-> sejour_acm($acm_id); ?>
<?php $listeUnite = $this->md_parametre->liste_unites_actifs(); ?>
<?php $listeMaladie = $this->md_patient->liste_maladie_actifs(); ?>
<?php $perso = $this->md_parametre->liste_antecedent_personnel_actifs(); ?>
<?php $fam = $this->md_parametre->liste_antecedent_familial_actifs(); ?>
<?php $aller = $this->md_parametre->liste_allergie_actifs(); ?>
<?php $prof = $this->md_parametre->liste_activite_professionnelle_actifs(); ?>
<?php $listespecificationmal = $this->md_parametre->liste_specification_maladie_actifs(); ?>
<?php //$listeEncours = $this->md_patient->liste_acm_dossier_patient($acm->pat_id,date("Y-m-d H:i:s"));
$rdv = $this->md_rdv->liste_de_mes_rdv();
$odij = date("Y-m-d"); $heure = date("H:i:s");

?>
<?php $listedgq = $this->md_parametre->liste_diagnostique_actifs(); ?>

<section class="content profile-page"><?php //var_dump($email);?>
    <div class="container-fluid">
        <div class="block-header">
            
            <small class="text-muted" style="text-transform:uppercase"><?php //$reste = $this->md_config->joursRestantDateTime($acm->acm_dDateExp); echo $reste;?></small>
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
						<?php if(!is_null($patient->pat_sAct)){?>
                        <strong>Activité professionnelle</strong>
                        <address><?php echo $patient->pat_sAct;?></address>
						<?php } ?>
						 <hr>
						<strong>Date d'enregistrement</strong>
                        <p><?php echo $this->md_config->affDateTimeFr($patient->pat_dDateEnreg);?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" style="font-size:14px">
                            <!--<li class="nav-item"><a class="nav-link active"data-toggle="tab" href="#rapport"><b>RAPPORT</b></a></li>-->
                            <li class="nav-item"><a class="nav-link active"data-toggle="tab"  href="#constante"><b>PRISE DE CONSTANTES</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#diabete"><b>DIABETE</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#complement"><b>FACTEURS DE RISQUE</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#details"><b>FILE ACTIVE</b></a></li>
                        </ul>						
                        <!-- Tab panes -->
                        <div class="tab-content">	
							<div role="tabpanel" class="tab-pane" id="rapport">                              
							
								<div class="wrap-reset" style="margin-top:45px">
									
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
													$information_diab_sejour = $this->md_patient->information_diab_sejour($l->sea_id);											
													?>
												<tr>
													<td>Le <?php echo $this->md_config->affDateFrNum($l->sea_dDate); ?></td>
													<td colspan="2">
														<table style="width:100%;padding:0">
															
															<?php if($constante_sejour){ ?>
															<tr>
																<td>Constantes</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info const_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>															
															<?php if($information_diab_sejour){ ?>
															<tr>
																<td>Détails diabète</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info info_diab" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
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
								 <div class="header" style="">
									<h2> Facteurs de risque<small>renseignez tous les champs marqués par des (*)</small></h2>
								</div><br>
                                <form id="form-fac-risque">
									<div class="col-sm-12 retour-fac"></div>
									<div class="row clearfix">
										<div class="col-sm-12">
											<b style="color:#000">I. CO-MORBIDITE/FDR</b>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>HTA</b>
															<input type="checkbox" class="" name="hta" value=" " <?php if($facrisque){if($facrisque->far_iHta==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>																				
												</div>
											</div>
										</div>											
										<div class="col-sm-3">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>Obésité</b>
															<input type="checkbox" class="" name="obes" value=" "<?php if($facrisque){if($facrisque->far_iObs==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>	
													
													<input type="hidden" value="<?php echo $pat_id; ?>" name="pat">													
												</div>
											</div>
										</div>										
										<div class="col-sm-3">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>Sédentarité</b>
															<input type="checkbox" class="checkPatient" name="sed" value=" "<?php if($facrisque){if($facrisque->far_iSed==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>										
										<div class="col-sm-3">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>Dyslip. connue</b>
															<input type="checkbox" class="checkPatient" name="dys" value=" "<?php if($facrisque){if($facrisque->far_iDys==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>																			
										<div class="col-sm-12">
											<b style="color:#000">II. ANTECEDENTS FAMILIAUX</b>
										</div>	
										<div id="antecedent1" class="<?php if($facrisque){if(!is_null($facrisque->far_sOther)){echo'col-sm-3';}else{echo 'col-sm-4';};}else{echo 'col-sm-4';}?>" style="">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>HTA</b>
															<input type="checkbox" class="checkPatient" name="hta2" value=""<?php if($facrisque){if($facrisque->far_iHta_2==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>																				
												</div>
											</div>
										</div>											
										<div id="antecedent2" class="<?php if($facrisque){if(!is_null($facrisque->far_sOther)){echo'col-sm-3';}else{echo 'col-sm-4';};}else{echo 'col-sm-4';}?>" style="">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>diabète</b>
															<input type="checkbox" class="" name="diab" value=" "<?php if($facrisque){if($facrisque->far_iDiab==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>										
										<div id="antecedent3" class="<?php if($facrisque){if(!is_null($facrisque->far_sOther)){echo'col-sm-3';}else{echo 'col-sm-4';};}else{echo 'col-sm-4';}?>" style="">
											<div class="form-group" style="">
												<div class="form-line">
													<div class="switch">
														<label><b>Autre</b>
															<input type="checkbox" id="otherFam" class="checkPatient" name="other" value=""<?php if($facrisque){if(!is_null($facrisque->far_sOther)){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>																				
										<div id="blocOtherFam" class="col-sm-3 <?php if($facrisque){if(is_null($facrisque->far_sOther)){echo'cacher';};}?>" style="height:75px">
											<div class="form-group">
												<input style="border-bottom:1px solid #e0e0e0" type="text" name="famOther" value="<?php if($facrisque){echo $facrisque->far_sOther;}?>" class="form-control" id="famOther" placeholder="* Saisissez autre ici" />
											</div>
										</div>		
										<div class="col-sm-12">
											<b style="color:#000">III. HABITUDE DE VIE</b>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="form-line">
													  <label style="color:#000"><b>TABAC: </b></label>
													  <?php if(!$facrisque){?>
														  <input type="radio" id="oui" name="tabac" value="1">
														  <label for="oui">OUI</label>
														  <input type="radio" id="non" name="tabac" value="0">
														  <label for="non">NON</label>
														  <input type="radio" id="stop" name="tabac" value="2">
														  <label for="stop">ARRET</label>												
													  <?php }else{?>
														  <?php if(is_null($facrisque->far_iTab)){?>
															  <input type="radio" id="oui" name="tabac" value="1">
															  <label for="oui">OUI</label>
															  <input type="radio" id="non" name="tabac" value="0">
															  <label for="non">NON</label>
															  <input type="radio" id="stop" name="tabac" value="2">
															  <label for="stop">ARRET</label>
														  <?php }else{?>
														  	  <input type="radio" id="oui" name="tabac" value="1"<?php if($facrisque){if($facrisque->far_iTab==1){echo'checked';};}?>>
															  <label for="oui">OUI</label>
															  <input type="radio" id="non" name="tabac" value="0"<?php if($facrisque){if($facrisque->far_iTab==0){echo'checked';};}?>>
															  <label for="non">NON</label>
															  <input type="radio" id="stop" name="tabac" value="2"<?php if($facrisque){if($facrisque->far_iTab==2){echo'checked';};}?>>
															  <label for="stop">ARRET</label>
														  <?php }?>
													  <?php }?>
												</div>
											</div>
										</div>											
										<div class="col-sm-6">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000"><b>ALCOOL: </b></label>
													<?php if(!$facrisque){?>
													  <input type="radio" id="yes" name="alcool" value="1">
													  <label for="yes">OUI</label>
													  <input type="radio" id="no" name="alcool" value="0">
													  <label for="no">NON</label>
													  <input type="radio" id="arret" name="alcool" value="2">
													  <label for="arret">ARRET</label>	
													<?php }else{?>
														<?php if(!is_null($facrisque->far_iAl)){?>
														  <input type="radio" id="yes" name="alcool" value="1"<?php if($facrisque){if($facrisque->far_iAl==1){echo'checked';};}?>>
														  <label for="yes">OUI</label>
														  <input type="radio" id="no" name="alcool" value="0"<?php if($facrisque){if($facrisque->far_iAl==0){echo'checked';};}?>>
														  <label for="no">NON</label>
														  <input type="radio" id="arret" name="alcool" value="2"<?php if($facrisque){if($facrisque->far_iAl==2){echo'checked';};}?>>
														  <label for="arret">ARRET</label>
														<?php }else{?>
														  <input type="radio" id="yes" name="alcool" value="1">
														  <label for="yes">OUI</label>
														  <input type="radio" id="no" name="alcool" value="0">
														  <label for="no">NON</label>
														  <input type="radio" id="arret" name="alcool" value="2">
														  <label for="arret">ARRET</label>
														<?php }?>
													<?php }?>
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<b style="color:#000">IV. COMPLICATIONS</b>
										</div>
										<div class="col-sm-12">
											<label style="color:#000">IV.1. Macroangiopathie </label>
										</div>	
										<div class="col-sm-3" style="">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>Cardiopathie </b>
															<input type="checkbox" class="" name="cardio" value=""<?php if($facrisque){if($facrisque->far_iCardio==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>																				
												</div>
											</div>
										</div>											
										<div class="col-sm-3" style="">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>HTA</b>
															<input type="checkbox" class="" name="hta3" value=""<?php if($facrisque){if($facrisque->far_iHta_3==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>										
										<div class="col-sm-3" style="">
											<div class="form-group" style="">
												<div class="form-line">
													<div class="switch">
														<label><b>Normal</b>
															<input type="checkbox" id="otherNormal" class="" name="normal" value=""<?php if($facrisque){if(!is_null($facrisque->far_iChronol)){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>																				
										<div id="blocOtherNormal" class="col-sm-3 <?php if($facrisque){if(is_null($facrisque->far_iChronol)){echo'cacher';};}else{echo 'cacher';}?>" style="height:75px">
											<div class="form-group" style="">
												<select class="form-control" name="normalOther" id="normalOther" style="border-bottom:1px solid #e0e0e0">
												<?php if(is_null($facrisque->far_iChronol)){?>
													<option value=""> -- * sélection chronologie --</option>
													<option value="0">avant le diabète</option>
													<option value="1">après le diabète</option>
													<option value="2">simultanément</option>													
												<?php }else{?>
													<option value="0" <?php if($facrisque->far_iChronol==0){echo'selected';};?>>avant le diabète</option>
													<option value="1" <?php if($facrisque->far_iChronol==1){echo'selected';};?>>après le diabète</option>
													<option value="2" <?php if($facrisque->far_iChronol==2){echo'selected';};?>>simultanément</option>
												<?php }?>
												</select>
											</div>
										</div>	
										<div class="col-sm-6" style="">
											<div class="form-group" style="">
												<div class="form-line">
													<div class="switch">
														<label><b>Echo Doppler </b>
															<input type="checkbox" id="" class="" name="echo" value=""<?php if($facrisque){if($facrisque->far_iEcho==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>											
										<div class="col-sm-6" style="">
											<div class="form-group" style="">
												<div class="form-line">
													<div class="switch">
														<label><b>AVC </b>
															<input type="checkbox" id="" class="" name="avc" value=""<?php if($facrisque){if($facrisque->far_iAvc==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>		
										<div class="col-sm-12">
											<label style="color:#000">IV.2. Microangiopathie </label>
										</div>	
										<div id="micro1" class="<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){echo'col-sm-3';}else{echo 'col-sm-4';};}else{echo 'col-sm-4';}?>" style="">
											<div class="form-group">
												<div class="form-line">
													<div class="switch">
														<label><b>Rétino. diab.</b>
															<input type="checkbox" class="" id="retinopathie" name="retino" value=""<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>	
										<div id="blocRetino" class="col-sm-3 <?php if($facrisque){if(is_null($facrisque->far_iTyperetino)){echo'cacher';};}else{echo 'cacher';}?>" style="height:75px">
											<div class="form-group" style="">
												<select class="form-control" name="typeretino" id="typeretino" style="border-bottom:1px solid #e0e0e0">
												<?php if(is_null($facrisque->far_iTyperetino)){?>
													<option value=""> -- * Type rétinopathie --</option>
													<option value="0">Rétinopathie non proliférante</option>
													<option value="1">Rétinopathie proliférante</option>
													<option value="2">Maculopathie diabétique</option>													
												<?php }else{?>	
													<option value="0" <?php if($facrisque->far_iTyperetino==0){echo'selected';};?>>Rétinopathie non proliférante</option>
													<option value="1" <?php if($facrisque->far_iTyperetino==1){echo'selected';};?>>Rétinopathie proliférante</option>
													<option value="2" <?php if($facrisque->far_iTyperetino==2){echo'selected';};?>>Maculopathie diabétique</option>
												<?php }?>
												</select>
											</div>
										</div>											
										<div id="micro2" class="<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){echo'col-sm-3';}else{echo 'col-sm-4';};}else{echo 'col-sm-4';}?>" style="">
											<div class="form-group" style="">
												<div class="form-line">
													<div class="switch">
														<label><b>Néphro. diab. </b>
															<input type="checkbox" id="" class="" name="nephro" value=""<?php if($facrisque){if($facrisque->far_iNephro==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>										
										<div id="micro3" class="<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){echo'col-sm-3';}else{echo 'col-sm-4';};}else{echo 'col-sm-4';}?>" style="">
											<div class="form-group" style="">
												<div class="form-line">
													<div class="switch">
														<label><b>Neuro. diab.</b>
															<input type="checkbox" id="" class="" name="neuro" value=""<?php if($facrisque){if($facrisque->far_iNeuro==1){echo'checked';};}?>>
															<span class="lever"></span>
														</label>
													</div>						
												</div>
											</div>
										</div>																														
									</div>
									<div class="col-sm-12 retour-fac"></div>
									<div class="row clearfix">
										
										<div class="col-sm-12">
											<button type="submit" class="btn btn-raised bg-blue-grey" id="saveRisque">Enregistrer</button>
										</div>
									</div>
								</form>
                            </div>	
							
							<div role="tabpanel" class="tab-pane" id="details">
							     <div class="header" style="margin-top:px">
									<h2>file active <?php if($facrisque || $constante){?>(<a href="<?php echo site_url("impression/file_active/".$pat_id);?>">imprimer</a>)<?php }?></h2>
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
											<?php if(is_null($infodiabete->ind_sRecente)){echo '<em>néant</em>';}else{ if($infodiabete->ind_sRecente==1){echo 'OUI';}else{echo 'NON';}; };?>	
										</div>											
										<div class="col-sm-4">
											<b>Date découverte:</b>
											<?php if(is_null($infodiabete->ind_dDec)){echo '<em>néant</em>';}else{echo $this->md_config->affDateFrNum($infodiabete->ind_dDec);};?>
										</div>											
										<div class="col-sm-4">
											<b>Ancienneté:</b>
											<?php 
												if(is_null($infodiabete->ind_dDec)){echo '<em>néant</em>';}else{
												$ageAnnee= $this->md_config->ageAnnee($infodiabete->ind_dDec); 
												if($ageAnnee>1 || $ageAnnee ==1){echo " En année";}else{
													$mois = $this->md_config->ageMois($infodiabete->ind_dDec);
													if($mois == 0){echo " Moins d'un mois";}else{echo " En mois";}
												}
												}
											?>
										</div>	
										<div class="col-sm-4">
											<b>Type de diabète:</b>
											<?php if(is_null($infodiabete->dgq_id)){echo '<em>néant</em>';}else{ $diagnos = $this->md_parametre->recupDiagnostique($infodiabete->dgq_id); echo $diagnos->dgq_sLib;};?>
										</div>											
										<div class="col-sm-4">
											<b>Suivi Régulier:</b>
											<?php if(is_null($infodiabete->ind_sSuivi)){echo '<em>néant</em>';}else{ if($infodiabete->ind_sSuivi==1){echo 'OUI';}else{echo 'NON';} ;};?>
										</div>											
										<div class="col-sm-4">
											<b>Rythme Visites:</b>
											<?php if(is_null($infodiabete->ind_sRythme)){echo '<em>néant</em>';}else{ if($infodiabete->ind_sRythme==0){echo 'Une fois/trimestre';}elseif($infodiabete->ind_sRythme==1){echo 'Une fois/semestre';}else{echo 'Une fois/année';};} ;?>
										</div>	
										<div class="col-sm-4">
											<b>Qualité Glycémies:</b>
											<?php if(is_null($infodiabete->ind_sQlte)){echo '<em>néant</em>';}else{ if($infodiabete->ind_sQlte==0){echo 'Mauvaise';}elseif($infodiabete->ind_sQlte==1){echo 'Bonne';}else{echo 'Non précisée';};};?>
										</div>											
										<div class="col-sm-4">
											<b>Dernier HbA1c:</b>
											<?php if(!is_null($infodiabete->ind_dDateDern)){echo $this->md_config->affDateFrNum($infodiabete->ind_dDateDern);}else{echo '<em>Non renseigné</em>';}?>
										</div>										
										<div class="col-sm-4">
											<b>Traitement actuel:</b>
											<?php 
												if(is_null($infodiabete->ind_sTrait)){echo '<em>néant</em>';}else{ 
												if($infodiabete->ind_sTrait==0){echo 'Insuline';}elseif($infodiabete->ind_sTrait==1){echo 'Sulfamide hypoglycémiant';}elseif($infodiabete->ind_sTrait==2){echo 'Biguanide';}elseif($infodiabete->ind_sTrait==3){echo 'Sulfamide + biguanide';}elseif($infodiabete->ind_sTrait==4){echo 'Insuline + biguanide';}elseif($infodiabete->ind_sTrait==5){echo 'Régime seul';}else{echo 'Aucun';};
												if($infodiabete->ind_sTrait==1){if($infodiabete->ind_sTypeTrait==0){echo ' (Glibenclamide)';}elseif($infodiabete->ind_sTypeTrait==1){echo ' (Glicazide)';}else{echo ' (Autre)';};}
												};
												?>
										</div>		
										<div class="col-sm-4">
											<b>Cholestérol Total (CT):</b>
											<?php if(is_null($infodiabete->ind_iChol)){echo '<em>néant</em>';}else{ echo $infodiabete->ind_iChol;} ;?>
										</div>											
										<div class="col-sm-4">
											<b>Triglucérides (TRG):</b>
											<?php if(is_null($infodiabete->ind_iTri)){echo '<em>néant</em>';}else{ echo $infodiabete->ind_iTri;} ;?>
										</div>										
										<div class="col-sm-4">
											<b>HDL-C:</b>
											<?php if(is_null($infodiabete->ind_iHdl)){echo '<em>néant</em>';}else{ echo $infodiabete->ind_iHdl;} ;?>
										</div>											
										<div class="col-sm-4">
											<b>LDL-C:</b>
											<?php if(is_null($infodiabete->ind_iLdl)){echo '<em>néant</em>';}else{ echo $infodiabete->ind_iLdl;} ;?>
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
										<b style="color:#000;">Habitude de vie</b>
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
										<?php echo $constante->cdc_iTensionSys.'/'.$constante->cdc_iTensionDia.'mmHg';?>
									</div>									
									<div class="col-sm-3">
										<b>Poids:</b>
										<?php echo $constante->cdc_fPoids.'Kg';?>
									</div>									
									<div class="col-sm-3">
										<b>Taille:</b>
										<?php echo $constante->cdc_fTaille.'Cm';?>
									</div>									
									<div class="col-sm-3">
										<b>IMC:</b>
										<?php echo $result = round((($constante->cdc_fPoids)/(($constante->cdc_fTaille*$constante->cdc_fTaille)/10000)),2) . 'kg/m2 ';?> <?php if($result > 30){echo '(Obèse)';} ;?>
									</div>									
									<div class="col-sm-3">
										<b>Glycémie:</b>
										<?php echo $constante->cdc_iGlmie. 'G/L ';?>
									</div>									
									<div class="col-sm-3">
										<b>Température:</b>
										<?php if(is_null($constante->cdc_iTemperature)){echo '<em>Néant</em>';}else{echo $constante->cdc_iTemperature.'°C';};?>
									</div>									
									<div class="col-sm-3">
										<b>Pouls:</b>
										<?php if(is_null($constante->cdc_fPoulsation)){echo '<em>Néant</em>';}else{echo $constante->cdc_fPoulsation.'pulsations/mn';};?>
									</div>									
									<div class="col-sm-3">
										<b>Tour Taille:</b>
										<?php if(is_null($constante->cdc_fTourTaille)){echo '<em>Néant</em>';}else{echo $constante->cdc_fTourTaille.'Cm';};?> <?php if($patient->pat_sSexe=='H'){if($constante->cdc_fTourTaille > 102){echo '(Obésité Abdominale)';}}else{if($constante->cdc_fTourTaille > 88){echo '(Obésité Abdominale)';}};?>
									</div>									
									<div class="col-sm-3">
										<b>Corps Cétonique:</b>
										<?php if(is_null($constante->cdc_sCetonique)){echo '<em>Néant</em>';}else{echo $constante->cdc_sCetonique.'Cm';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS debout BG:</b>
										<?php if(is_null($constante->cdc_iPdbg)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPdbg.'mmHg';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS debout BD:</b>
										<?php if(is_null($constante->cdc_iPdbd)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPdbd.'mmHg';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS couché BG:</b>
										<?php if(is_null($constante->cdc_iPcbg)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPcbg.'mmHg';};?>
									</div>									
									<div class="col-sm-3">
										<b>PAS couché BD:</b>
										<?php if(is_null($constante->cdc_iPcbd)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPcbd.'mmHg';};?>
									</div>									
									<div class="col-sm-12">
										<b>Observations:</b>
										<?php if(is_null($constante->cdc_sObs)){echo '<em>Néant</em>';}else{echo nl2br($constante->cdc_sObs);};?>
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
							 
							
							
                            <div role="tabpanel" class="tab-pane in active" id="constante">
								
                                <div class="header" style="margin-top:px">
									<h2>données clinique<small>renseignez tous les champs marqués par des (*)</small> </h2>
								</div>
								
								<div class="body">
									
									<form id="form-constante">
										<div class="row clearfix">
											<div class="col-sm-12 retour-const"></div>
											<div class="col-sm-12 retour-constFinal"></div>
											<div class="col-sm-4">
												<div class="form-group">
													<label style="color:#000">* Tension arterielle (mmHg)</label>
													<div class="row clearfix">
														<div class="col-sm-6">
															<div class="form-line">
															<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_iTensionSys;}?>" name="sys" class="form-control sys" placeholder="Systole">
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-line">
															<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_iTensionDia;}?>" name="dia" class="form-control dia" placeholder="Diastole">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">* Poids (Kg)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_fPoids;}?>" name="poids" class="form-control poids">
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">* Taille (cm)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_fTaille;}?>" name="taille" class="form-control taille">
														<input type="hidden" value="<?php echo $pat_id; ?>" name="pat">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">* Glycémie (G/L)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_iGlmie;}?>" name="glycemie" class="form-control glycemie">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Température (° C)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_iTemperature;}?>" name="temperature" class="form-control">
													</div>
												</div>
											</div>												
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Pouls (pulsations/mn)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_fPoulsation;}?>" name="poul" class="form-control">
													</div>
												</div>
											</div>											
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Tour de taille (cm)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->cdc_fTourTaille;}?>" name="Ttaille" class="form-control">
													</div>
												</div>
											</div>		
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Corps Cétonique</label>
														<select class="form-control " name="ctque">
														<?php if(is_null($constante->cdc_sCetonique)){?>
														<option value="" > -- sélectionner --</option>
														<option value="Négatif" >Négatif</option>
														<option value="Plus ou moins" >Plus ou moins</option>
														<option value="+" >+</option>
														<option value="++" >++</option>
														<option value="+++" >+++</option>
														<option value="++++" >++++</option>
														<?php }else{?>
															<option value="Négatif" <?php if($constante->cdc_sCetonique == 'Négatif'){echo 'selected="selected"';} ;?>>Négatif</option>
															<option value="Plus ou moins"  <?php if($constante->cdc_sCetonique == 'Plus ou moins'){echo 'selected="selected"';} ;?>>Plus ou moins</option>
															<option value="+"  <?php if($constante->cdc_sCetonique == '+'){echo 'selected="selected"';} ;?>>+</option>
															<option value="++"  <?php if($constante->cdc_sCetonique == '++'){echo 'selected="selected"';} ;?>>++</option>
															<option value="+++"  <?php if($constante->cdc_sCetonique == '+++'){echo 'selected="selected"';} ;?>>+++</option>
															<option value="++++"  <?php if($constante->cdc_sCetonique == '++++'){echo 'selected="selected"';} ;?>>++++</option>
														<?php }?>
														</select>
													</div>
												</div>
											</div>											
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">PAS debout BG(mmHg)</label>
														<input type="number" min="0" value="<?php if(!is_null($constante)){echo $constante->cdc_iPdbg;}?>" name="pdbg" class="form-control">
													</div>
												</div>
											</div>												
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">PAS debout BD(mmHg)</label>
														<input type="number" min="0" value="<?php if(!is_null($constante)){echo $constante->cdc_iPdbd;}?>" name="pdbd" class="form-control">
													</div>
												</div>
											</div>												
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">PAS couché BG(mmHg)</label>
														<input type="number" min="0" value="<?php if(!is_null($constante)){echo $constante->cdc_iPcbg;}?>" name="pcbg" class="form-control">
													</div>
												</div>
											</div>											
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">PAS couché BD(mmHg)</label>
														<input type="number" min="0" value="<?php if(!is_null($constante)){echo $constante->cdc_iPcbd;}?>" name="pcbd" class="form-control">
													</div>
												</div>
											</div>																							
											<div class="col-sm-12">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Observations</label>
														<textarea style="height:100px" name="obs"  class="form-control "><?php if(!is_null($constante)){echo $constante->cdc_sObs;}?></textarea>
													</div>
												</div>
											</div>											
										</div>
										
										<div class="row clearfix">
											<div class="col-sm-12">
												<button type="submit" class="btn btn-raised bg-blue-grey" id="ConstanteDataClinique">Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
                            </div>		

                            <div role="tabpanel" class="tab-pane" id="diabete">
								
                                <div class="header" style="margin-top:px">
									<h2>Information sur le diabète<small>renseignez tous les champs marqués par des (*) </small> </h2>
								</div>
								
								<div class="body">
									
									<form id="form-infodiabete">
										<div class="row clearfix">
											<div class="col-sm-12 retour-infodiab"></div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"> Découverte récente</label>
														<select class="form-control " name="dec">
															<?php if(!is_null($infodiabete->ind_sRecente)){?>
																<option value="1" <?php if($infodiabete->ind_sRecente==1){echo 'selected="selected"';} ;?>> OUI </option>
																<option value="0" <?php if($infodiabete->ind_sRecente==0){echo 'selected="selected"';} ;?>> NON </option>
															<?php }else{?>
																<option value=""> --- Sélectionner --- </option>
																<option value="1" >OUI</option>
																<option value="0" >NON</option>
															<?php }?>
														</select>
													</div>
												</div>
											</div>	
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"> Date découverte</label>
														<input type="date" value="<?php if(!is_null($infodiabete)){echo $infodiabete->ind_dDec;}?>" name="date" id="" class=" form-control " placeholder="Sélectionner la date">
														
														<input type="hidden" value="<?php echo $pat_id; ?>" name="pat">
													</div>
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"> Type</label>
														<select class="form-control " name="type">
															<option value="" > -- sélectionner -- </option>
															<?php foreach($listedgq AS $ld){?>
																<?php if(!is_null($infodiabete->dgq_id)){?>
																	<option value="<?php echo $ld->dgq_id; ?>" <?php if($ld->dgq_id==$infodiabete->dgq_id){echo 'selected="selected"';} ;?>> <?php echo $ld->dgq_sLib; ?> </option>
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
														<label style="color:#000"> Suivi Régulier</label>
														<select class="form-control " name="suivi">
															<?php if(!is_null($infodiabete->ind_sSuivi)){?>
																<option value="1" <?php if($infodiabete->ind_sSuivi==1){echo 'selected="selected"';} ;?>> OUI </option>
																<option value="0" <?php if($infodiabete->ind_sSuivi==0){echo 'selected="selected"';} ;?>> NON </option>
															<?php }else{?>
																<option value=""> --- Sélectionner --- </option>
																<option value="1" >OUI</option>
																<option value="0" >NON</option>
															<?php }?>
														</select>
													</div>
												</div>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"> Rythme des visites</label>
														<select class="form-control " name="rythme">
															<?php if(!is_null($infodiabete->ind_sRythme)){?>
																<option value="0" <?php if($infodiabete->ind_sRythme==0){echo 'selected="selected"';} ;?>> Une fois par trimestre </option>
																<option value="1" <?php if($infodiabete->ind_sRythme==1){echo 'selected="selected"';} ;?>> Une fois par semestre </option>
																<option value="2" <?php if($infodiabete->ind_sRythme==2){echo 'selected="selected"';} ;?>> Une fois par année </option>
															<?php }else{?>
																<option value="" > -- sélectionner --</option>
																<option value="0">Une fois par trimestre</option>
																<option value="1">Une fois par semestre</option>
																<option value="2">Une fois par année</option>
															<?php }?>
														</select>
													</div>
												</div>
											</div>												
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"> Qualité des glycémies</label>
														<select class="form-control " name="qualite">
															<?php if(!is_null($infodiabete->ind_sQlte)){?>
																<option value="0" <?php if($infodiabete->ind_sQlte==0){echo 'selected="selected"';} ;?>> Mauvaise </option>
																<option value="1" <?php if($infodiabete->ind_sQlte==1){echo 'selected="selected"';} ;?>> Bonne </option>
																<option value="2" <?php if($infodiabete->ind_sQlte==2){echo 'selected="selected"';} ;?>> Non précisée </option>
															<?php }else{?>
																<option value="" > -- sélectionner --</option>
																<option value="0">Mauvaise</option>
																<option value="1">Bonne</option>
																<option value="2">Non précisée</option>
															<?php }?>
														</select>
													</div>
												</div>
											</div>	
											
											
											
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Cholestérol Total (CT) </label>
														<input type="text" value="<?php if(!is_null($infodiabete)){echo $infodiabete->ind_iChol;}?>" name="chol" id="" class=" form-control" placeholder="">
													</div>
												</div>
											</div>											
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Triglucérides (TRG) </label>
														<input type="text" value="<?php if(!is_null($infodiabete)){echo $infodiabete->ind_iTri;}?>" name="tri" id="" class=" form-control" placeholder="">
													</div>
												</div>
											</div>										
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">HDL-C </label>
														<input type="text" value="<?php if(!is_null($infodiabete)){echo $infodiabete->ind_iHdl;}?>" name="hdl" id="" class=" form-control" placeholder="">
													</div>
												</div>
											</div>										
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">LDL-C </label>
														<input type="text" value="<?php if(!is_null($infodiabete)){echo $infodiabete->ind_iLdl;}?>" name="ldl" id="" class=" form-control" placeholder="">
													</div>
												</div>
											</div>		

											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Dernier HbA1c </label>
														<input type="date" value="<?php if(!is_null($infodiabete)){echo $infodiabete->ind_dDateDern;}?>" name="dateder" id="" class=" form-control" placeholder="Sélectionner la date">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Traitement actuel</label>
														<select class="form-control " name="traitement" id="traitement">
															<?php if(!is_null($infodiabete->ind_sTrait)){?>
																<option value="0" <?php if($infodiabete->ind_sTrait==0){echo 'selected="selected"';} ;?>> Insuline </option>
																<option value="1" <?php if($infodiabete->ind_sTrait==1){echo 'selected="selected"';} ;?>> Sulfamide hypoglycémiant </option>
																<option value="2" <?php if($infodiabete->ind_sTrait==2){echo 'selected="selected"';} ;?>> Biguanide </option>
																<option value="3" <?php if($infodiabete->ind_sTrait==3){echo 'selected="selected"';} ;?>> Sulfamide + biguanide </option>
																<option value="4" <?php if($infodiabete->ind_sTrait==4){echo 'selected="selected"';} ;?>> Insuline + biguanide </option>
																<option value="5" <?php if($infodiabete->ind_sTrait==5){echo 'selected="selected"';} ;?>> Régime seul </option>
																<option value="6" <?php if($infodiabete->ind_sTrait==6){echo 'selected="selected"';} ;?>> Aucun </option>
															<?php }else{?>
																<option value="" > -- sélectionner --</option>
																<option value="0">Insuline</option>
																<option value="1">Sulfamide hypoglycémiant</option>
																<option value="2">Biguanide</option>
																<option value="3">Sulfamide + biguanide</option>
																<option value="4">Insuline + biguanide</option>
																<option value="5">Régime seul</option>
																<option value="6">Aucun</option>
															<?php }?>
														</select>														
													</div>
												</div>
											</div>											
											<div class="col-sm-4 <?php if(empty($infodiabete)){echo 'cacher';}else{if(is_null($infodiabete->ind_sTypeTrait)){echo 'cacher';}};?>" id="lequel">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">* Lequel ? </label>
														<select class="form-control " name="lequel" id="lequel2">
															<?php if(!is_null($infodiabete->ind_sTypeTrait)){?>
																<option value="0" <?php if($infodiabete->ind_sTypeTrait==0){echo 'selected="selected"';} ;?>> Glibenclamide </option>
																<option value="1" <?php if($infodiabete->ind_sTypeTrait==1){echo 'selected="selected"';} ;?>> Glicazide </option>
																<option value="2" <?php if($infodiabete->ind_sTypeTrait==2){echo 'selected="selected"';} ;?>> Autre </option>
															<?php }else{?>
																<option value=""> -- sélectionner --</option>
																<option value="0">Glibenclamide</option>
																<option value="1">Glicazide</option>
																<option value="2">Autre</option>
															<?php }?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<button type="submit" class="btn btn-raised bg-blue-grey" id="enregistrerInfoDiab">Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
                            </div>								
							
                        </div>
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
			alert(qte);
			if(med !="autre"){
				if(med == '' || qte == ''|| duree == ''|| pos == '') {
					alert('Veuillez renseigner le champs.');	
				}
				else {
					var contact = new Object();
					contact.med	       	    = med;
					contact.qte	    		= qte;
					contact.duree	        = duree;
					contact.pos	        	= pos;
					contact.typePos	        = typePos;
					annuaire.push(contact);
					showListeOrdMed();	
					document.getElementById('qte').value="";
					document.getElementById('duree').value="";
					document.getElementById('pos').value="";
				}
			}
			else{
				if(medi == '' || forme == '' || dosage == '' || qte == ''|| duree == ''|| pos == '') {
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
				document.getElementById('lan').value="";
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
				document.getElementById('laf').value="";
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
				document.getElementById('lia').value="";
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
				document.getElementById('lap').value="";
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
	
	
	
	    <script type="text/javascript">
        'use strict';

        var listeAvis = document.querySelector('#tbodyAvis');
        var addAvis = document.querySelector('#addAvis');
        var annuaireAvis;
        annuaireAvis = new Array();

        function removeAvis(index) {
            annuaireAvis.splice(index,1);
            showListeAvis();
        }

        function addDetailAvis()
        {
            var specialite	            = document.getElementById('specialite').value;
            var motifs	            = document.getElementById('motifs').value;

            if(specialite == '' || motifs=='') {
                alert('Veuillez renseigner les tous les champs.');
                // document.getElementsByClassName("retour-cardio")[0].innerHTML='<span style="color:red">Veuillez sélectionner l\'examen cardiologique</span>';
            }
            else {
                // document.getElementsByClassName("retour-cardio")[0].innerHTML='';
                var contactAvis = new Object();
                contactAvis.specialite	       	    = specialite;
                contactAvis.motifs	       	    	= motifs;
                annuaireAvis.push(contactAvis);
                showListeAvis();
            }
        }

        addAvis.addEventListener('click', addDetailAvis);

        function showListeAvis()
        {
            var contenuAvis="";
            var tailleTableauAvis = annuaireAvis.length;

            for(var i = 0; i < tailleTableauAvis; i++) {

                var tabAvis = annuaireAvis[i].specialite.split("-/-");

                contenuAvis += '<tr>';
                contenuAvis += '<td><input type="hidden" name="specialite[]" value="'+ tabAvis[0]+'"/>' + tabAvis[1] + '</td>';
                contenuAvis += '<td><input type="hidden" name="motif[]" value="'+ annuaireAvis[i].motifs+'"/>' + annuaireAvis[i].motifs + '</td>';
                contenuAvis += '<td class="text-center"><a href="javascript:();" onClick="removeAvis(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuAvis += '</tr>';
            }

            listeAvis.innerHTML = contenuAvis;
            // alert(contenuMaladie);
        }

    </script>

    <script type="text/javascript">
        'use strict';

        var listeRdv = document.querySelector('#tbodyRdv');
        var addRdv = document.querySelector('#addRdv');
        var annuaireRdv;
        annuaireRdv = new Array();

        function removeRdv(index) {
            annuaireRdv.splice(index,1);
            showListeRdv();
        }

        function addDetailRdv()
        {
            var motifRdv	            = document.getElementById('motifRdv').value;
            var heureRdv	            = document.getElementById('heureRdv').value;
            var dateRdv	            = document.getElementById('dateRdv').value;

            if(motifRdv == '' || heureRdv == '' || dateRdv == '') {
                alert('Veuillez renseigner le champs.');
            }
            else {
                var contactRdv = new Object();
                contactRdv.motifRdv	       	    = motifRdv;
                contactRdv.heureRdv	       	    = heureRdv;
                contactRdv.dateRdv	       	    = dateRdv;
                annuaireRdv.push(contactRdv);
                showListeRdv();
            }
        }

        addRdv.addEventListener('click', addDetailRdv);

        function showListeRdv()
        {
            var contenuRdv="";
            var tailleTableauRdv = annuaireRdv.length;

            for(var i = 0; i < tailleTableauRdv; i++) {


                contenuRdv += '<tr>';
                contenuRdv += '<td><input type="hidden" name="dateRdv[]" value="'+ annuaireRdv[i].dateRdv+'"/>' + annuaireRdv[i].dateRdv + '</td>';
                contenuRdv += '<td><input type="hidden" name="heureRdv[]" value="'+ annuaireRdv[i].heureRdv+'"/>' + annuaireRdv[i].heureRdv + '</td>';
                contenuRdv += '<td><input type="hidden" name="motifRdv[]" value="'+ annuaireRdv[i].motifRdv+'"/>' + annuaireRdv[i].motifRdv + '</td>';
                contenuRdv += '<td class="text-center"><a href="javascript:();" onClick="removeRdv(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuRdv += '</tr>';
            }

            listeRdv.innerHTML = contenuRdv;
            // alert(contenu);
        }

    </script>
	

		
	<script type="text/javascript">
        'use strict';
		
        var listeHyp = document.querySelector('#tbodyHyp');
        var addHyp = document.querySelector('#addHyp');
        var annuaireHyp;
        annuaireHyp = new Array();

        function removeHyp(index) {
            annuaireHyp.splice(index,1);
            showListeHyp();	
        }

        function addDetailHyp() 
        {
            var hyp	            = document.getElementById('hyp').value;
			
            if(hyp == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-hyp")[0].innerHTML='<span style="color:red">Veuillez sélectionner</span>';
            }
            else {
				document.getElementsByClassName("retour-hyp")[0].innerHTML='';
                var contactHyp = new Object();
                contactHyp.hyp	       	    = hyp;
                annuaireHyp.push(contactHyp);
                showListeHyp();	
				document.getElementById('hyp').value="";
            }
        }

        addHyp.addEventListener('click', addDetailHyp);

        function showListeHyp() 
        {
            var contenuHyp="";
            var tailleTableauHyp = annuaireHyp.length;            
                
            for(var i = 0; i < tailleTableauHyp; i++) {
				
				var tabHyp = annuaireHyp[i].hyp.split("-/-");
				
                contenuHyp += '<tr>';
				contenuHyp += '<td><input type="hidden" name="hyp[]" value="'+ tabHyp[0]+'"/>' + tabHyp[1] + '</td>';
				contenuHyp += '<td class="text-center"><a href="javascript:();" onClick="removeHyp(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuHyp += '</tr>';
            }

            listeHyp.innerHTML = contenuHyp;
			 // alert(contenuMaladie);
        }
    
    </script>
		
		
	<script type="text/javascript">
        'use strict';
		
        var listeRet = document.querySelector('#tbodyRet');
        var addRet = document.querySelector('#addRet');
        var annuaireRet;
        annuaireRet = new Array();

        function removeRet(index) {
            annuaireRet.splice(index,1);
            showListeRet();	
        }

        function addDetailRet() 
        {
            var ret	            = document.getElementById('ret').value;
			
            if(ret == '') {
                // alert('Veuillez renseigner les tous les champs.');	
				document.getElementsByClassName("retour-ret")[0].innerHTML='<span style="color:red">Veuillez sélectionner</span>';
            }
            else {
				document.getElementsByClassName("retour-ret")[0].innerHTML='';
                var contactRet = new Object();
                contactRet.ret      	    = ret;
                annuaireRet.push(contactRet);
                showListeRet();	
				document.getElementById('ret').value="";
            }
        }

        addRet.addEventListener('click', addDetailRet);

        function showListeRet() 
        {
            var contenuRet="";
            var tailleTableauRet = annuaireRet.length;            
                
            for(var i = 0; i < tailleTableauRet; i++) {
				
				var tabRet = annuaireRet[i].ret.split("-/-");
				
                contenuRet += '<tr>';
                contenuRet += '<td><input type="hidden" name="ret[]" value="'+ tabRet[0]+'"/>' + tabRet[1] + '</td>';
				contenuRet += '<td class="text-center"><a href="javascript:();" onClick="removeRet(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenuRet += '</tr>';
            }

            listeRet.innerHTML = contenuRet;
			 // alert(contenuMaladie);
        }
    
    </script>
	
	
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>