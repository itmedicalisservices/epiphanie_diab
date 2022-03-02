
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $patient = $this->md_patient->recup_patient($id); ?>
<?php $ante = $this->md_patient->liste_antecedant($id); ?>
<?php $liste = $this->md_patient->liste_contacts($id); ?>
<?php $patDeces = $this->md_patient->patient_decede($id); ?>
<?php $infoComp = $this->md_patient->information($id); ?>
<?php $antFam = $this->md_patient->antecedants_familiaux($id); ?>
<?php $antPer = $this->md_patient->antecedants_personnels($id); ?>
<?php $allergie = $this->md_patient->allergies_connues($id); ?>
<?php $activite = $this->md_patient->activites_professionnelles($id); ?>
<?php $charge = $this->md_patient->renseignement_prise_en_charge($id); ?>
<?php $listeEncours = $this->md_patient->liste_acm_encours_patient(date("Y-m-d H:i:s"),$id); ?>

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Informations sur le patient</h2>
            <small class="text-muted">Épiphanie, votre application de gestion hospitalière</small>
        </div>        
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class=" card patient-profile">
                    <img src="<?php echo base_url($patient->pat_sAvatar);?>" class="img-fluid" alt="">                              
                </div>
                <div class="card">
                    <div class="header">
                        <h2>À PROPOS DU PATIENT</h2>
                    </div>
                    <div class="body">
						<?php if($patDeces){ ?>
                        <strong class="text-danger">PATIENT DÉCÈDÉ</strong>
                        <p>le <?php echo $this->md_config->affDateFrNum($patDeces->dec_dDateDeces)." à ".$patDeces->dec_tHeureDeces; ?></p>
						
						<strong class="text-danger">CAUSE DE LA MORT</strong>
                        <p><?php echo $patDeces->dec_sCause; ?> en <?php echo $patDeces->lac_sLibelle; ?></p>
						<?php } ?>
					
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
                        <p><?php echo $this->md_config->affDateTimeFr($patient->pat_dDateEnreg);?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab"  href="#report">Détail et activité sur le patient</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"  href="#charge">Prise en charge</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"  href="#acte_valide">Acte en cours de validité</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
							<?php if($patDeces){ ?>
								<img src="<?php echo base_url("assets/images/deces.jpg");?>" class="img-fluid"/>
							<?php } ?>
                            <div role="tabpanel" class="tab-pane in active" id="report">                               
                            <div class="wrap-reset">
                                <div class="mypost-list">
                                    
                                    <div class="post-box">
                                        <h4>Personnes à contacter en cas d'urgence</h4>                                        
                                        <div class="body p-l-0 p-r-0">
											<?php if(empty($liste)){echo "Non renseigné";}else{ ?>
                                            <div class="table-responsive"> 
												<table class="table table-bordered table-striped table-hover">
												   
													<thead>
														<tr>
															<th>Nom(s) et prénom(s)</th>
															<th>Lien de parenté</th>
															<th>Numéro de téléphone</th>
															<th>Adresse</th>
														</tr>
													</thead>
												   
													<tbody>
													<?php foreach($liste AS $l){ ?>
														<tr>
															<td>
																<?php echo $l->pec_sNom; ?> <?php echo $l->pec_sPrenom; ?>
															</td>
															<td>
																<?php echo $l->pec_sLien; ?>
															</td>
															<td>
																<?php echo $l->pec_sTelephone; ?>
															</td>
															<td>
																<?php echo $l->pec_sAdresse; ?>
															</td>
															
														</tr>
													<?php } ?>
													</tbody>
												</table>
											</div>
											<?php } ?>
                                        </div>
                                    </div>
									<hr>
									<div class="post-box">
										<h4>Groupe sanguin</h4>
										<ul class="dis">
										<?php if($infoComp){if(is_null($infoComp->inc_sSang)){ echo "Non renseigné";} else {echo $infoComp->inc_sSang; }} else { echo "Non renseigné";} ?>
										</ul>
                                    </div>
                                    <hr>
									<div class="post-box">
										<h4>Activité quotidienne</h4> 
										<ul class="dis">
										<?php if($infoComp){if(is_null($infoComp->inc_sActQ)){ echo "Non renseigné";} else {echo $infoComp->inc_sActQ; }} else { echo "Non renseigné";} ?>
										</h4>
                                    </div>
                                    <hr>
                                    <h4>Antécédents personels</h4>
                                    <ul class="dis">
                                       <?php if(empty($antPer)){ echo "Non renseigné";} else{foreach($antPer AS $ant){ ?>
                                        <li><?php echo $ant->lan_sLibelle; ?></li>
                                        <?php } } ?>
                                    </ul>
									<hr>
                                    <h4>Antécédents familiaux</h4>
                                    <ul class="dis">
										<?php if(empty($antFam)){ echo "Non renseigné";} else{foreach($antFam AS $ant){ ?>
                                        <li><?php echo $ant->laf_sLibelle; ?></li>
                                        <?php } } ?>
                                    </ul>
                                    <hr>
									<h4>Allergies connues</h4>
                                    <ul class="dis">
                                        <?php if(empty($allergie)){ echo "Non renseigné";} else{foreach($allergie AS $al){ ?>
                                        <li><?php echo $al->lia_sLibelle; ?></li>
                                        <?php } } ?>
                                    </ul>
                                    <hr>
									<h4>Activités professionnelles</h4>
                                    <ul class="dis">
                                       <?php if(empty($activite)){ echo "Non renseigné";} else{foreach($activite AS $ac){ ?>
                                        <li><?php echo $ac->lap_sLibelle; ?></li>
                                        <?php } } ?>
                                    </ul>
                                   
                                </div>
                            </div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="charge">                               
								<div class="wrap-reset">
									<div class="mypost-list">
									<?php if(empty($charge)) { echo "Non renseigné"; } else {foreach ($charge AS $c) { ?>
										<div class="row clearfix">
											<div class="col-sm-12">
												<h4><u>Prise en charge pour <?php echo $c->lac_sLibelle; ?></u></h4>
												<?php echo '<a href="'.site_url("impression/prise_en_charge/".$c->pch_id).'" class="text-success" title="Imprimer" ><i class="fa fa-print pull-right" style="font-size:25px"></i></a>'; ?>
											</div>

											<div class="col-sm-6"> 
												<p><strong>Nom(s) : </strong><?php echo $c->pch_sCivilite; ?>. <?php echo $c->pch_sNom; ?></p>
											</div>
											<div class="col-sm-6">
												<p><strong>Prénom(s) : </strong><?php echo $c->pch_sPrenom; ?></p>
											</div>
											<div class="col-sm-12">
												<p><strong>Adresse : </strong><?php echo $c->pch_sAdresse; ?></p>
											</div>
											<div class="col-sm-12">
												<p><strong>Filiation : </strong><?php echo $c->pch_sFiliation; ?></p>
											</div>
											<div class="col-sm-12">
												<p><strong>Profession : </strong><?php echo $c->pch_sProfession; ?></p>
											</div>
											<div class="col-sm-12">
												<p><strong>Employeur : </strong><?php echo $c->pch_sEmployeur; ?></p>
											</div>

											<br><br>
											<div class="col-sm-12">
												<h5>Pièce justificative </h5>
											</div>
											<div class="col-sm-6">
												<p><strong>Livret de famille :  </strong><?php echo $c->pch_sLivret; ?></p>
											</div>
											<div class="col-sm-6">
												<p><strong>Délivré le </strong><?php echo $this->md_config->affDateFrNum($c->pch_dDateLivret);?></p>
											</div>
											
											<div class="col-sm-6">
												<p><strong>Carte d'identité N° : </strong><?php echo $c->pch_sCarnet; ?></p>
											</div>
											<div class="col-sm-6">
												<p><strong>Délivré le </strong><?php echo $this->md_config->affDateFrNum($c->pch_dDateCarnet);?></p>
											</div>
											
											<br><br>
											<div class="col-sm-12">
												<p><strong>Autre(s) : </strong><?php echo $c->pch_sAutres; ?> </p>
											</div>
											<div class="col-sm-12">
												<p><strong>Pièce jointe : </strong><?php if(empty($c->pch_sPiece)){ echo "Aucune";} else { echo '<a href="'.base_url($c->pch_sPiece).'" target="_blank">Voir</a>'; } ?></p>
											</div>
											<div class="col-sm-12">
												<p><strong>Personne à prévenir : </strong><?php echo $c->pch_sPersonne; ?></p>
											</div>
											<div class="col-sm-12">
												<p><strong>Adresse : </strong><?php echo $c->pch_sAdressePer; ?></p>
											</div>
									   </div>
									   <hr>
									   <?php } } ?>
									</div>
								</div>
                            </div>							
							
							<div role="tabpanel" class="tab-pane" id="acte_valide">                               
								<div class="wrap-reset">
									<div class="body table-responsive">
										<table id="example1" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Acte médical</th>
													<th>jours de consultation</th>
												</tr>
											</thead>
										   
											<tbody>
											<?php if($listeEncours==null){echo '<tr><td colspan="2"><em>Aucun acte en cours de validité pour ce patient !</em></td></tr>';}else{ foreach($listeEncours AS $le){ ?>
												<tr>
													<td><?php echo $le->lac_sLibelle; ?></td>
													<td><?php $reste = $this->md_config->joursRestantDateTime($le->acm_dDateExp); echo $reste;?></td>
												</tr>
											<?php } }?>
											</tbody>
										</table>
									</div>
								</div>
                            </div>
							
                        </div>
						
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>