
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $hos = $this->md_patient->hospitalisation($h); ?>
<?php $rappel = $this->md_patient->rappel_hospitalisation($h,date("Y-m-d H:i:s")); ?>
<?php $acm_id = $hos->acm_id ; $acm = $this->md_patient->acm_patient($acm_id); ?>
<?php $patient = $this->md_patient->recup_patient($acm->pat_id); ?>
<?php $constante = $this->md_patient->constante($acm_id); ?>
<?php $information = $this->md_patient->information($acm->pat_id); ?>
<?php $ListeConst = $this->md_patient->liste_constante($acm_id); ?>
<?php $consultation = $this->md_patient->consultation($acm_id); ?>
<?php $liste = $this->md_patient-> sejour_acm($acm_id); ?>
<?php $listeMed = $this->md_pharmacie->liste_medicament(); ?>
<?php $listeExamenCardio = $this->md_parametre->liste_cardiologiques_actifs(); ?>
<?php $listeExamenRhum = $this->md_parametre->liste_rhumatologies_actifs(); ?>
<?php $listeExamenGyne = $this->md_parametre->liste_gynecologies_actifs(); ?>
<?php $listeExamenGyneObs = $this->md_parametre->liste_rgynecologies_obs_actifs(); ?>
<?php $listeExamenGyneNeuro = $this->md_parametre->liste_neurologies_actifs(); ?>
<?php $listeExamenGynePneu = $this->md_parametre->liste_pneumonies_actifs(); ?>
<?php $listeUnite = $this->md_parametre->liste_unites_actifs(); ?>
<?php $listeMaladie = $this->md_patient->liste_maladie_actifs(); ?>
<?php $perso = $this->md_parametre->liste_antecedent_personnel_actifs(); ?>
<?php $fam = $this->md_parametre->liste_antecedent_familial_actifs(); ?>
<?php $aller = $this->md_parametre->liste_allergie_actifs(); ?>
<?php $prof = $this->md_parametre->liste_activite_professionnelle_actifs(); ?>
<?php $listeActeLabo = $this->md_parametre->liste_acts_laboratoires_actifs(); ?>
<?php $listeConstante = $this->md_patient->liste_constante_vitale($acm_id); ?>
<?php $listeEncours = $this->md_patient->liste_acm_dossier_patient($acm->pat_id,date("Y-m-d H:i:s")); ?>

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2><?php echo $acm->lac_sLibelle; ?></h2>
            <small class="text-muted" style="text-transform:uppercas"><i class="fa fa-calendar"></i> <?php echo $this->md_config->affDateTimeFr($hos->hos_dDate);?></small><br>
            <small class="text-muted" style="text-transform:uppercas">
				<div class="row clearfix">
					<div class="col-lg-3 col-md-12 col-sm-12">
						<i class="fa fa-bed"></i> au service <b><?php echo $hos->ser_sLibelle;?></b>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12">
						Dans l'unité <b><?php echo $hos->uni_sLibelle;?></b>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12">
						Chambre : <b><?php echo $hos->cha_sLibelle;?></b>, Lit : <b><?php echo $hos->lit_sLibelle;?></b>
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
                        <p><?php echo $this->md_config->affDateTimeFr($patient->pat_dDateEnreg);?></p>
                    </div>
                </div>
            </div>
             <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" style="font-size:14px">
                            <li class="nav-item"><a class="nav-link active"data-toggle="tab" href="#rapport"><b>Dossier médical</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#constante"><b>Constante vitale</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#complement"><b>Informations complémentaires</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" id="or" href="#ordonnance"><b> Ordonnance</b></a></li>
                            
                        </ul>
						 <ul class="nav nav-tabs" role="tablist" style="font-size:14px">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#soins" id="so"><b>Protocoles de soins</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imagerie" id="in"><b>Examen imagerie</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#labo"><b> Examen laboratoire</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reeducation"><b>Rééducation</b></a></li>
                        </ul>	 
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#exploration"><b>Exploration fonctionnelle</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#diagnostic"><b>Maladie(s) dignostiquée(s)</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ne"><b>Déclaration Nouveau né</b></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#deces"><b>Déclaration de Decès</b></a></li>
                        </ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px">
							 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#charge"><b>Reseignement sur la prise en charge</b></a></li>
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
							<a href="<?php echo site_url("impression/dossier_medical_hospitalisation/".$hos->hos_id); ?>" class="btn btn-raised bg-blue-grey" style="color:white; font-size:11px"><i class="fa fa-print"></i> Imprimer le dossier médical</a>
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
													$ordonnance_sejour = $this->md_patient->ordonnance_sejour($l->sea_id);
													$laboratoire_sejour = $this->md_patient->laboratoire_sejour($l->sea_id);
													$soins_infirmiers_sejour = $this->md_patient->soins_infirmiers_sejour($l->sea_id);
													$imagerie = $this->md_patient->imagerie_sejour($l->sea_id);
													$exploration = $this->md_patient->exploration_sejour($l->sea_id);
													$reeducation = $this->md_patient->reeducation_sejour($l->sea_id);
													$nouveau = $this->md_patient->nouveau_sejour($l->sea_id);
													$deces = $this->md_patient->cas_deces($l->sea_id);
													$diagnostic = $this->md_patient->diagnostic($l->sea_id);
													$cardiologie = $this->md_patient->cardiologie_sejour($l->sea_id);
													// var_dump($listeConstante);
												?>
												<tr>
													<td>Le <?php echo $this->md_config->affDateFrNum($l->sea_dDate); ?></td>
													<td colspan="2">
														<table style="width:100%;padding:0">
															
															<?php if($constante_sejour){ ?>
															<tr>
																<td>Constante vitale</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info const_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
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
															
															<?php if($cardiologie){ ?>
															<tr>
																<td>Examen cardiologique</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info cardio_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>
															
															<?php if($soins_infirmiers_sejour){ ?>
															<tr>
																<td>Protocole des soins</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info soins_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>
															
															<?php if($imagerie){ ?>
															<tr>
																<td>Imagerie médicale</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info imagerie_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
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
															
															<?php if($exploration){ ?>
															<tr>
																<td>Exploration fonctionnelle</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info exp_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>
															
															<?php if($reeducation){ ?>
															<tr>
																<td>Rééducation</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info reeducation_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>
															
															<?php if($nouveau){ ?>
															<tr>
																<td>Nouveau né</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info nouveau_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>															
															<?php if($deces){ ?>
															<tr>
																<td>Cas de décès</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info deces_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															<?php } ?>															
															
															<?php if($diagnostic){ ?>
															<tr>
																<td>Maladie(s) diagnostiquée(s)</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info diagnostic_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
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
							
                            <div role="tabpanel" class="tab-pane" id="constante">
								
                                <div class="header" style="margin-top:45px">
									<h2>prise des constantes <small>renseignez tous les champs marqués par des (*)</small> </h2>
									
								</div>
								
								<div class="body">
									
									<form id="form-constante">
										<div class="row clearfix">
											<div class="col-sm-12 retour-const"></div>
											<div class="col-sm-12 retour-constFinal"></div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Température (° C)</label>
														<input type="number" value="<?php if(!is_null($constante)){echo $constante->con_iTemperature;}?>" name="temperature" class="form-control temperature">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label style="color:#000">Tension arterielle (mmHg)</label>
													<div class="row clearfix">
														<div class="col-sm-6">
															<div class="form-line">
															<input type="text" value="<?php if(!is_null($constante)){echo $constante->con_iTensionSys;}?>" name="sys" class="form-control sys" placeholder="Systole">
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-line">
															<input type="text" value="<?php if(!is_null($constante)){echo $constante->con_iTensionDia;}?>" name="dia" class="form-control dia" placeholder="Diastole">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Poids (Kg)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->con_fPoids;}?>" name="poids" class="form-control poids">
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Taille (cm)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->con_fTaille;}?>" name="taille" class="form-control taille">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Pouls (pulsation/mn)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->con_fPoulsation;}?>" name="poul" class="form-control poul">
													</div>
												</div>
											</div>							
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Saturation (%)</label>
														<input type="text" value="<?php if(!is_null($constante)){echo $constante->con_fSaturation;}?>" name="saturation" class="form-control saturation">
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Duérèse</label>
														<textarea style="height:100px" name="dierese"  class="form-control dierese"><?php if(!is_null($constante)){echo $constante->con_fDierese;}?></textarea>
													</div>
												</div>
											</div>									
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Evaluation</label>
														<textarea style="height:100px" name="evaluation" class="form-control evaluation"><?php if(!is_null($constante)){echo $constante->con_fEvaluation;}?></textarea>
													</div>
												</div>
											</div>
										</div>
										
										<div class="row clearfix">
											
											<div class="col-sm-12">
												<button type="submit" class="btn btn-raised bg-blue-grey" id="enregistrerConstante">Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="complement">
                                <form id="form-complement">
									<div class="col-sm-12 retour-complement"></div>
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000">Activités quotidiennes</label>
													<textarea class='edit' name="quotidien" style="margin-top: 30px;" placeholder="Saissez les ici"><?php if($information){echo $information->inc_sActQ ;}?></textarea>
													<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
													<input type="hidden" value="<?php echo $acm->pat_id; ?>" name="pat">
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000">Groupe Sanguin</label>
													<select name="sang" class="form-control obligatoire">
														<option value="">Choisir</option>
														<option value="O +">O +</option>
														<option value="A +">A +</option>
														<option value="B +">B +</option>
														<option value="O -">O -</option>
														<option value="A -">A -</option>
														<option value="AB +">AB +</option>
														<option value="B -">B -</option>
														<option value="AB -">AB -</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000">Antécédents personnels</label>
													<table class="table table-bordered table-striped table-hover">
														<thead>
															<tr>
																<th style="width:95%">Liste des antécédeents personnels</th>
																<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-lan"></span>
																	<select id="lan" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach($perso AS $p){?>
																		<option value="<?php echo $p->lan_id; ?>-/-<?php echo $p->lan_sLibelle; ?>"> <?php echo $p->lan_sLibelle; ?> </option>
																		<?php } ?>
																	</select>
																</td>
													
																<td class="text-center">
																	<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addLan"><i class="fa fa-plus"></i></a>
																</td>
															</tr>
														</thead>
													   
														<tbody id="tbodyLan"></tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000">Antécédents familiaux</label>
													<table class="table table-bordered table-striped table-hover">
														<thead>
															<tr>
																<th style="width:95%">Liste des antécédeents familiaux</th>
																<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-laf"></span>
																	<select id="laf" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach($fam AS $f){?>
																		<option value="<?php echo $f->laf_id; ?>-/-<?php echo $f->laf_sLibelle; ?>"> <?php echo $f->laf_sLibelle; ?> </option>
																		<?php } ?>
																	</select>
																</td>
													
																<td class="text-center">
																	<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addLaf"><i class="fa fa-plus"></i></a>
																</td>
															</tr>
														</thead>
													   
														<tbody id="tbodyLaf"></tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000">Allergies connues</label>
													<table class="table table-bordered table-striped table-hover">
														<thead>
															<tr>
																<th style="width:95%">Liste des allergies</th>
																<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-lia"></span>
																	<select id="lia" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach($aller AS $a){?>
																		<option value="<?php echo $a->lia_id; ?>-/-<?php echo $a->lia_sLibelle; ?>"> <?php echo $a->lia_sLibelle; ?> </option>
																		<?php } ?>
																	</select>
																</td>
													
																<td class="text-center">
																	<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addLia"><i class="fa fa-plus"></i></a>
																</td>
															</tr>
														</thead>
													   
														<tbody id="tbodyLia"></tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="form-line">
													<label style="color:#000">Activités professionnelles</label>
													<table class="table table-bordered table-striped table-hover">
														<thead>
															<tr>
																<th style="width:95%">Liste des activité professionnelles</th>
																<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-lap"></span>
																	<select id="lap" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach($prof AS $pr){?>
																		<option value="<?php echo $pr->lap_id; ?>-/-<?php echo $pr->lap_sLibelle; ?>"> <?php echo $pr->lap_sLibelle; ?> </option>
																		<?php } ?>
																	</select>
																</td>
													
																<td class="text-center">
																	<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addLap"><i class="fa fa-plus"></i></a>
																</td>
															</tr>
														</thead>
													   
														<tbody id="tbodyLap"></tbody>
													</table>
												</div>
											</div>
										</div>
										
									</div>
									
									<div class="row clearfix">
										
										<div class="col-sm-12">
											<button type="submit" class="btn btn-raised bg-blue-grey" id="enregistrerInformation">Enregistrer</button>
										</div>
									</div>
								</form>
                            </div>
							
							
							<div role="tabpanel" class="tab-pane" id="ordonnance">
								<div class="header" style="margin-top:45px">
									<h2>Établir une ordonnance <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								
								<div class="body">
									<div class="table-responsive">
										<form method="post" action="<?php echo site_url('consultation/ajoutOrdonnance') ;?>" id="form-ord">
											<div class="retour-ord"></div>
											<table class="table table-bordered table-striped table-hover" style="font-size:12px">
												<thead>
													<tr>
														<th style="width:50%">Produit</th>
														<th style="width:30px">Qte</th>
														<th style="width:180px">Posologie</th>
														<th style="width:30px">Durée</th>
														<th style="width:50px"  class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="med" onChange="groupe();" style="width:100%;padding-bottom:5px;padding-top:5px;margin-bottom:10px">
																<option value="">----- Prescription * -----</option>
																 <?php foreach($listeMed AS $l){ ?>
																<option value="<?php echo  $l->med_sNc.' '.$l->for_sLibelle.' '.$l->med_iDosage.''.$l->med_sUnite;?>"><?php echo  $l->med_sNc.' '.$l->for_sLibelle.' '.$l->med_iDosage.''.$l->med_sUnite;?></option>
																 <?php } ?>
																 <option value="autre">Autre</option>
															</select>
															<div id="bloc" class="cacher">
																<input type="text" id="medi" style="width:58%" placeholder="nom du produit"/>
																<input type="text" id="forme" style="width:25%" placeholder="forme"/>
																<input type="text" id="dosage" style="width:15%" placeholder="dosage"/>
															</div>
														</td>
														<td>
															<input type="number" id="qte" style="width:100%"/>
															
														</td>
														<td>
															<input type="number" id="pos" style="width:40%"/>
															<select id="typePos" style="width:55%;padding-bottom:5px;padding-top:5px">
																<option value="Cp">Cp</option>
																<option value="Inj">Inj</option>
																<option value="Amp">Amp</option>
																<option value="Clt">Clt</option>
																
															</select>
															
														</td>
														<td>
															<input type="number" id="duree" style="width:100%"/>
															
														</td>
														
														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addOrd"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>
											   
												<tbody id="tbodyOrd"></tbody>
											</table>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
										
										<button type="submit" class="btn btn-success waves-effect pull-right addOrd" style="color:#fff"><i class="fa fa-check"></i>Valider l'ordonnance</button>
										</form>
										<a href="#or" class="cacher cliqueOrd">clique</a>
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
															<input type="time" id="heure_soins" style="width:50px"/>
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
											<input type="hidden" value="<?php echo $hos->hos_id; ?>" name="hos">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addSoins_2" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
										<a href="#so" class="cacher cliqueSoins">clique</a>
									</div>
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
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addImagerie_2" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
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
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addReeducation_2" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
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
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addexp_2" style="color:#fff"><i class="fa fa-check"></i>Valider la prescription</a>
										<a href="#in" class="cacher cliqueExp">clique</a>
									</div>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="diagnostic">
                                <div class="header" style="margin-top:45px">
									<h2>Ajouter les maladies diagnostiquées <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>
								
								<div class="body">
									<div class="table-responsive">
										<form id="form-maladie">
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th style="width:95%">Maladie diagnostiquée</th>
														<th style="width:20px"  class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_maladie" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Sélectionner * </option>
																<?php foreach($listeMaladie AS $lm){?>
																<option value="<?php echo $lm->mal_id; ?>-/-<?php echo $lm->mal_sLibelle; ?>"> <?php echo $lm->mal_sLibelle; ?> </option>
																<?php } ?>
															</select>
															<div class="retour-maladie"></div>
														</td>														
														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addMaladie"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>
											   
												<tbody id="tbodyMaladie"></tbody>
											</table>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addMaladie" style="color:#fff"><i class="fa fa-check"></i>Valider</a>
										<a href="#in" class="cacher cliqueReeducation">clique</a>
									</div>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="ne">
                                <div class="header" style="margin-top:45px">
									<h2>Déclaration nouveau né <small>renseignez tous les champs marqués par des (*)</small> </h2>
								</div>
								
								<div class="body">
									
									<form id="form-nouveau-ne">
									<div class="col-sm-12 retour-new-ne"></div>
										<div class="row clearfix">
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Date naissance *</label>
														<input type="text" name="datenaiss" class="form-control datepicker obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Heure naissance *</label>
														<input type="time" name="heureDate" class="form-control obligatoire">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
													</div>
												</div>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Sexe du nouveau né *</label>
														<select name="sexe" class="form-control obligatoire">
															<option value="">------ Selectionner -------</option>
															<option value="M">Masculin</option>
															<option value="F">Féminin</option>
														</select>
													</div>
												</div>
											</div>
											<div style="color:red" class="col-sm-12 retour-nouveau-ne"></div>
										</div>
										
										<div class="row clearfix">
											
											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddNouveauNe">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
                            </div>
							
							<div role="tabpanel" class="tab-pane" id="deces">
                                <div class="header" style="margin-top:45px">
									<h2>Déclaration de décès <small>renseignez tous les champs marqués par des (*)</small> </h2>
								</div>
								
								<div class="body">
									
									<form id="form-deces">
									<div class="col-sm-12 retour-new-deces"></div>
										<div class="row clearfix">
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Date décès *</label>
														<input type="text" name="datedeces" class="form-control datepicker obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Heure décès *</label>
														<input type="time" name="heuredeces" class="form-control obligatoire">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
														<input type="hidden" value="<?php echo $hos->hos_id; ?>" name="hos">
														<input type="hidden" name="cout" value="<?php echo $nbJour*$hos->cha_iPrixLit;?>"/>
													</div>
												</div>
											</div>											
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Unité *</label>
														<select name="unite" class="form-control obligatoire">
															<option value="">--------- Selectionner ----------</option>
															<?php foreach($listeUnite AS $lu){ ?>
																<option value="<?=$lu->uni_id?>"><?=$lu->uni_sLibelle?></option>
															<?php }; ?>
														</select>
													</div>
												</div>
											</div>											
											<div class="col-sm-12">
												<div class="form-group">
													<div class="form-line">
													<label style="color:#000">Cause *</label>
														<textarea class="form-control obligatoire" rows="10" name="cause"></textarea>
													</div>
												</div>
											</div>
											<div style="color:red" class="col-sm-12 retour-deces"></div>
										</div>
										
										<div class="row clearfix">
											
											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddDeces_2">Enregistrer</a>
											</div>
										</div>
									</form>
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
					</div>
					<div class="body table-responsive" id="dossier">
						<table id="example" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>N° Matricule</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Acte médical</th>
									<th>jours</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($listeEncours AS $le){ ?>
								<tr>
									<td><?php echo $le->pat_sMatricule; ?></td>
									<td><?php echo $le->pat_sNom; ?></td>
									<td><?php echo $le->pat_sPrenom; ?></td>
									<td><?php echo $le->lac_sLibelle; ?></td>
									<td>Le <?php echo $this->md_config->affDateFrNum($le->fac_dDatePaie);?></td>
									<td class="text-center">
										<?php if(is_null($le->hos_id)){ ?>
										<a href="<?php echo site_url("consultation/voir/".$le->acm_id); ?>"><b>Voir</b></a> 
										<?php }else{ ?>
										<a href="<?php echo site_url("hospitalisation/voir/".$le->hos_id); ?>"><b>Voir</b></a>
										<?php } ?>
										 |									
										<a href="<?php echo site_url("impression/dossier_medical_passage/".$le->acm_id); ?>"><b>Imprimer</b></a>
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
							<option value="Rémission">Rémission</option>
							<option value="Transfert">Transfert</option>
							<option value="Insuffisance financière">Insuffisance financière</option>
						</select>
					</div>
				</form>
			</div>
            <div class="modal-footer">
				<button type="button" class="btn btn-success waves-effect fin_hos" style="color:#fff" onClick="return confirm('Voulez-vous mettre fin à l\'hospitalisation du patient ?')" > Fin d'hospitalisation</button>
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