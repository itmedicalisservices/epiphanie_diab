<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php include(dirname(__FILE__) . '/../includes/init.php'); ?>

<section class="content profile-page">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Consultation sur l'acte médical : <?php echo $acm->lac_sLibelle; ?></h2>
			<small class="text-muted" style="text-transform:uppercase"><?php $reste = $this->md_config->joursRestantDateTime($acm->acm_dDateExp);
																		echo $reste; ?></small>
		</div>
		<div class="row clearfix">
			<div class="col-lg-3 col-md-12 col-sm-12">
				<div class=" card patient-profile">
					<img src="<?php echo base_url($patient->pat_sAvatar); ?>" class="img-fluid" alt="">
				</div>
				<div class="card">
					<div class="header">
						<h2>À PROPOS DU PATIENT</h2>
					</div>
					<div class="body">
						<strong>Code patient</strong>
						<p><?php echo $patient->pat_sMatricule; ?></p>
						<strong>Nom(s) et prénom(s)</strong>
						<p><?php echo $patient->pat_sCivilite; ?> <?php echo $patient->pat_sNom; ?> <?php echo $patient->pat_sPrenom; ?></p>
						<strong>Âge</strong>
						<p><?php $ageAnnee = $this->md_config->ageAnnee($patient->pat_dDateNaiss);
							if ($ageAnnee > 1) {
								echo $ageAnnee . " ans";
							} else if ($ageAnnee == 1) {
								echo $ageAnnee . " an";
							} else {
								echo $this->md_config->ageMois($patient->pat_dDateNaiss) . " mois";
							} ?></p>
						<strong>Genre</strong>
						<p><?php if ($patient->pat_sSexe == "H") {
								echo "Homme";
							} else {
								echo "Femme";
							} ?></p>
						<strong>Profession</strong>
						<p><?php echo $patient->pat_sProfession; ?></p>
						<strong>Situation familiale</strong>
						<p><?php echo $patient->pat_sSituationMat; ?></p>
						<?php if (!is_null($patient->pat_sTel)) { ?>
							<strong>Téléphone</strong>
							<p><?php echo $patient->pat_sTel; ?></p>
						<?php } ?>
						<?php if (!is_null($patient->pat_sAdresse)) { ?>
							<strong>Adresse</strong>
							<address><?php echo $patient->pat_sAdresse; ?></address>
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
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist" style="font-size:14px">
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#rapport"><b>Dossier patient</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#constante"><b>Constante vitale</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#complement"><b>Antécédents</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" id="cc" href="#consultation"><b>Consultation</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" id="or" href="#ordonnance"><b> Ordonnance</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#soins" id="so"><b>Soins infirmiers</b></a></li>
						</ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:14px">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#hospitalisation"><b>Hospitalisation</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imagerie" id="in"><b>Examen imagerie</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#labo"><b> Examen laboratoire</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reeducation"><b>Rééducation</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#exploration"><b>Exploration fonctionnelle</b></a></li>
						</ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px;border-bottom:none">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#avis"><b>Avis de spécialiste</b></a></li>

							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rdv"><b>Programmer le prochain Rendez-vous</b></a></li>
							<?php if ($patient->pat_sSexe != "H") { ?>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#femme"><b <?php if ($patient->pat_iFemme == 1) {
																												echo 'style="color:red"';
																											} else {
																												echo '';
																											}; ?>><?php if ($patient->pat_iFemme == 1) {
																														echo 'Femme enceinte';
																													} else {
																														echo 'Déclaration femme enceinte';
																													}; ?></b></a></li>
							<?php } ?>

						</ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ne"><b>Déclaration Nouveau né</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#enfant"><b <?php if ($patient->pat_iEnfant == 1) {
																												echo 'style="color:red"';
																											} else {
																												echo '';
																											}; ?>><?php if ($patient->pat_iEnfant == 1) {
																														echo 'Enfant malnutri(e)';
																													} else {
																														echo 'Déclaration enfant malnutri(e)';
																													}; ?></b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#deces"><b>Déclaration de Decès</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pelvien"><b>Pelvien sous speculum</b></a></li>
						</ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#abdominal"><b>Examen abdominal</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#perineal"><b>Examen perinéal</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#vaginal"><b>Toucher vaginal</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rectal"><b>Toucher rectal</b></a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#senologie"><b>Examen sénologique</b></a></li>
						</ul>
						<ul class="nav nav-tabs" role="tablist" style="font-size:13.5px">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#echographie"><b>Echographie</b></a></li>
						</ul>



						<!-- Tab panes -->
						<div class="tab-content">

							<a href="#dossier" class="btn btn-raised bg-blue-grey" style="color:white; font-size:13px"><i class="fa fa-folder-open"></i> Voir les consultations du patient</a>
							<?php if (!empty($liste)) { ?>
								<a href="<?php echo site_url("impression/dossier_medical_passage/" . $acm_id); ?>" class="btn btn-raised bg-blue-grey" style="color:white; font-size:13px"><i class="fa fa-print"></i> Imprimer le dossier médical</a>
							<?php } ?>


							<?php if (isset($avs)) { ?>
								<div class="body table-responsive">
									<table id="" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>Motif </th>
												<th>Médecin demandeur</th>
												<th>Service </th>
												<th>Acte médical</th>
												<th>Date de l'avis </th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td><?php echo $recupAvis->avs_sLibelle; ?></td>
												<td><?php echo $recupAvis->per_sNom . ' ' . $recupAvis->per_sPrenom; ?></td>
												<td><?php echo $recupAvis->ser_sLibelle ?></td>
												<td><?php echo $recupAvis->lac_sLibelle; ?></td>
												<td><?php echo $this->md_config->affDateFrNum($recupAvis->avs_dDate); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="body">
									<form id="form-reponse-avis">
										<div class="row">
											<div class="col-sm-12 pull-left retour"></div>
											<div class="col-sm-12">
												<div class="body table-responsive">
													<div class="col-sm-12">
														<div class="form-group">
															<div class="form-line">
																<label style="color:#000">Donner votre avis * </label>
																<textarea id='edit_3' name="repavis" class="form-control obligatoire" style="margin-top: 30px;" placeholder="Saisissez votre avis ici"></textarea>
																<input type="hidden" value="<?php echo ($avs); ?>" name="id">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-12">
												<button type="button" class="btn btn-success waves-effect" id="repAvis" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
							<?php } ?>

							<div role="tabpanel" class="tab-pane in active" id="rapport">

								<div class="wrap-reset" style="margin-top:45px">

									<div class="table-responsive">

										<?php if (empty($liste)) {
											echo "<span class='text-danger'>Aucune action n'a été faite sur les séjours de ce patient</span>";
										} else { ?>

											<table class="table table-bordered table-striped table-hover">

												<thead>
													<tr>
														<th>Date de séjour</th>
														<th>Opérations faites</th>
														<th style="width:75px">Résultat</th>
													</tr>
												</thead>
												<?php
												foreach ($liste as $l) {
													$constante_sejour = $this->md_patient->constante_sejour($l->sea_id);
													$consultation_sejour = $this->md_patient->consultation_sejour($l->sea_id);
													$ordonnance_sejour = $this->md_patient->ordonnance_sejour($l->sea_id);
													$laboratoire_sejour = $this->md_patient->laboratoire_sejour($l->sea_id);
													$soins_infirmiers_sejour = $this->md_patient->soins_infirmiers_sejour($l->sea_id);
													$imagerie = $this->md_patient->imagerie_sejour($l->sea_id);
													$exploration = $this->md_patient->exploration_sejour($l->sea_id);
													$hospitalisation_sejour = $this->md_patient->hospitalisation_sejour($l->sea_id);
													$reeducation = $this->md_patient->reeducation_sejour($l->sea_id);
													$nouveau = $this->md_patient->nouveau_sejour($l->sea_id);
													$deces = $this->md_patient->cas_deces($l->sea_id);
													$diagnostic = $this->md_patient->diagnostic($l->sea_id);
													$exarectal = $this->md_patient->examen_rectal($l->sea_id);
													$exaperineal = $this->md_patient->examen_perineal($l->sea_id);
													$exapelvien = $this->md_patient->examen_pelvien($l->sea_id);
													$exabdominal = $this->md_patient->examen_abdominal($l->sea_id);
													$examvaginal = $this->md_patient->examen_vaginal($l->sea_id);
													$examecho = $this->md_patient->examen_echographique($l->sea_id);
													$exameseno = $this->md_patient->examen_senologique($l->sea_id);
													//$cardiologie = $this->md_patient->cardiologie_sejour($l->sea_id);
													$avis = $this->md_patient->avis_sejour($l->sea_id);
													$rdv_sej = $this->md_rdv->rdv_sejour($l->sea_id);
												?>
													<tr>
														<td>Le <?php echo $this->md_config->affDateFrNum($l->sea_dDate); ?></td>
														<td colspan="2">
															<table style="width:100%;padding:0">

																<?php if ($constante_sejour) { ?>
																	<tr>
																		<td>Constante vitale</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info const_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($consultation_sejour) { ?>
																	<tr>
																		<td>Consultation</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info consu_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($ordonnance_sejour) { ?>
																	<tr>
																		<td>Ordonnance</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info ordo_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php /*if($cardiologie){ */ ?>
																<!--
															<tr>
																<td>Examen cardiologique</td>
																<td style="width:17.6%">
																	<a href="javascript:();" rel="<?php /*echo $l->sea_id;  */ ?>" class="text-info cardio_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																</td>
															</tr>
															--><?php /*} */ ?>

																<?php if ($soins_infirmiers_sejour) { ?>
																	<tr>
																		<td>Protocole des soins</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info soins_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($imagerie) { ?>
																	<tr>
																		<td>Imagerie médicale</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info imagerie_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($laboratoire_sejour) { ?>
																	<tr>
																		<td>Examen laboratoire</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info laboratoire_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($exploration) { ?>
																	<tr>
																		<td>Exploration fonctionnelle</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info exp_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($avis) { ?>
																	<tr>
																		<td>Avis de spécialiste</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info avis_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($hospitalisation_sejour) { ?>
																	<tr>
																		<td>hospitalisation</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info hospitalisation_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($reeducation) { ?>
																	<tr>
																		<td>Rééducation</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info reeducation_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($rdv_sej) { ?>
																	<tr>
																		<td>Rendez-vous programmé</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info rdv_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($nouveau) { ?>
																	<tr>
																		<td>Nouveau né</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info nouveau_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>
																<?php if ($deces) { ?>
																	<tr>
																		<td>Cas de décès</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info deces_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($diagnostic) { ?>
																	<tr>
																		<td>Maladie(s) diagnostiquée(s)</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info diagnostic_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($exarectal) { ?>
																	<tr>
																		<td>Examen rectal</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info examrectal_sej" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($exaperineal) { ?>
																	<tr>
																		<td>Examen Périneal</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info examperineal" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($exapelvien) { ?>
																	<tr>
																		<td>Examen Pelvien</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info examPelvien" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($exabdominal) { ?>
																	<tr>
																		<td>Examen Abdominal</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info examAbdominal" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($examvaginal) { ?>
																	<tr>
																		<td>Examen Vaginal</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info exaVaginal" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>
																<?php if ($examecho) { ?>
																	<tr>
																		<td>Examen Echographique</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id;  ?>" class="text-info exaEcho" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
																		</td>
																	</tr>
																<?php } ?>

																<?php if ($exameseno) { ?>
																	<tr>
																		<td>Examen Sénologique</td>
																		<td style="width:17.6%">
																			<a href="javascript:();" rel="<?php echo $l->sea_id; ?>" class="text-info examSeno" style="color:#fff"><i class="fa fa-arrow-right pull-right" style="font-size:25px"></i></a>
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
														<input type="number" value="<?php if (!is_null($constante)) {
																						echo $constante->con_iTemperature;
																					} ?>" name="temperature" class="form-control temperature">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label style="color:#000">Tension arterielle (mmHg)</label>
													<div class="row clearfix">
														<div class="col-sm-6">
															<div class="form-line">
																<input type="text" value="<?php if (!is_null($constante)) {
																								echo $constante->con_iTensionSys;
																							} ?>" name="sys" class="form-control sys" placeholder="Systole">
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-line">
																<input type="text" value="<?php if (!is_null($constante)) {
																								echo $constante->con_iTensionDia;
																							} ?>" name="dia" class="form-control dia" placeholder="Diastole">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Poids (Kg)</label>
														<input type="text" value="<?php if (!is_null($constante)) {
																						echo $constante->con_fPoids;
																					} ?>" name="poids" class="form-control poids">
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Taille (cm)</label>
														<input type="text" value="<?php if (!is_null($constante)) {
																						echo $constante->con_fTaille;
																					} ?>" name="taille" class="form-control taille">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Pouls (pulsation/mn)</label>
														<input type="text" value="<?php if (!is_null($constante)) {
																						echo $constante->con_fPoulsation;
																					} ?>" name="poul" class="form-control poul">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Saturation (%)</label>
														<input type="text" value="<?php if (!is_null($constante)) {
																						echo $constante->con_fSaturation;
																					} ?>" name="saturation" class="form-control saturation">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Duérèse</label>
														<textarea style="height:100px" name="dierese" class="form-control dierese"><?php if (!is_null($constante)) {
																																		echo $constante->con_fDierese;
																																	} ?></textarea>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Evaluation</label>
														<textarea style="height:100px" name="evaluation" class="form-control evaluation"><?php if (!is_null($constante)) {
																																				echo $constante->con_fEvaluation;
																																			} ?></textarea>
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
													<textarea class='edit' name="quotidien" style="margin-top: 30px;" placeholder="Saissez les ici"><?php if ($information) {
																																						echo $information->inc_sActQ;
																																					} ?></textarea>
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
																<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-lan"></span>
																	<select id="lan" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach ($perso as $p) { ?>
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
																<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-laf"></span>
																	<select id="laf" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach ($fam as $f) { ?>
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
																<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-lia"></span>
																	<select id="lia" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach ($aller as $a) { ?>
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
																<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
															</tr>
															<tr>
																<td>
																	<span class="retour-lap"></span>
																	<select id="lap" style="width:100%;padding-bottom:5px;padding-top:5px">
																		<option value=""> Choisir * </option>
																		<?php foreach ($prof as $pr) { ?>
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

							<div role="tabpanel" class="tab-pane" id="consultation">
								<div class="header" style="margin-top:45px">
									<h2>Faire une consultation <small>renseignez tous les champs marqués par des (*)</small> </h2>
								</div>
								<div class="body">
									<form id="form-gynecologie">
										<div class="col-sm-12 retour-gynecologie"></div>
										<div class="row clearfix">
											<div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
												<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingOne_1">
															<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseNine_1" aria-expanded="true" aria-controls="collapseNine_1"> <strong>Puberté</strong> </a> </h4>
														</div>
														<div id="collapseNine_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Age de survenue *</label>
																				<input type="text" name="age" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Troubles éventuels *</label>
																				<input type="text" name="troubles" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Traitements reçus *</label>
																				<input type="text" name="traitements_1" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingTwo_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTen_1" aria-expanded="false" aria-controls="collapseTen_1"> <strong>Histoire des cycles menstruels</strong> </a> </h4>
														</div>
														<div id="collapseTen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Régularité *</label>
																				<input type="text" name="regularite" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Abondance des règles</label>
																				<input type="text" name="abondance" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Durée *</label>
																				<input type="text" name="duree" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Syndrome prémenstruel</label>
																				<input type="text" name="syndrome_premenstruel" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Date des dernières règles</label>
																				<input type="text" name="date_dernieres_regles" class="form-control  obligatoire datepicker">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseEleven_1" aria-expanded="false" aria-controls="collapseEleven_1"><strong> Contraception</strong> </a> </h4>
														</div>
														<div id="collapseEleven_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Type *</label>
																				<select name="type_1" class="form-control obligatoire">
																					<option value="">Choisir</option>
																					<option value="La pilule contraceptive">La pilule contraceptive</option>
																					<option value="Le stérilet hormonal">Le stérilet hormonal</option>
																					<option value="L'implant contraceptif">L'implant contraceptif</option>
																					<option value="Le patch contraceptif">Le patch contraceptif</option>
																					<option value="L'anneau vaginal">L'anneau vaginal</option>
																					<option value="L’injection contraceptive">L’injection contraceptive</option>
																					<option value="La pilule du lendemain">La pilule du lendemain</option>
																					<option value="Le préservatif féminin">Le préservatif féminin</option>
																					<option value="Le stérilet au cuivre">Le stérilet au cuivre</option>
																					<option value="Le diaphragme">Le diaphragme</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-2">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Durée *</label>
																				<input type="text" name="duree_contraception" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Tolérance *</label>
																				<input type="text" name="tolerance" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Complications *</label>
																				<input type="text" name="complication" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Existence de malformations utérines *</label>
																				<select name="existence" class="form-control obligatoire">
																					<option value="Non">Non</option>
																					<option value="Oui">Oui</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Infections génitale évolutives *</label>
																				<select name="infections_1" class="form-control obligatoire">
																					<option value="Non">Non</option>
																					<option value="Oui">Oui</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Infections génitale récentes *</label>
																				<select name="infections_2" class="form-control obligatoire">
																					<option value="Non">Non</option>
																					<option value="Oui">Oui</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Infections génitales isolées *</label>
																				<select name="infections_3" class="form-control obligatoire">
																					<option value="Non">Non</option>
																					<option value="Oui">Oui</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Traitements au laser *</label>
																				<select name="traitements_2" class="form-control obligatoire">
																					<option value="Oui">Oui</option>
																					<option value="Non">Non</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Traitements par inducteur de l'ovulation *</label>
																				<select name="traitement_3" class="form-control obligatoire">

																					<option value="Non">Non</option>
																					<option value="Oui">Oui</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwelve_1" aria-expanded="false" aria-controls="collapseTwelve_1"><strong>Pré-menopause</strong> </a> </h4>
														</div>
														<div id="collapseTwelve_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group" style="margin:0;padding:0">
																			<div class="form-line">
																				<label style="color:#000">Date *</label>
																				<input type="text" name="date_pre_menopause" class="form-control  obligatoire datepicker">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Modalité</label>
																				<input type="text" name="modalite_pre_menopause" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Traitements *</label>
																				<input type="text" name="traitements_pre_menopause" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThreeteen_1" aria-expanded="false" aria-controls="collapseThreeteen_1"><strong> Ménopause</strong> </a> </h4>
														</div>
														<div id="collapseThreeteen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group" style="margin:0;padding:0">
																			<div class="form-line">
																				<label style="color:#000">Date *</label>
																				<input type="text" name="date_menopause" class="form-control  obligatoire datepicker">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Modalité</label>
																				<input type="text" name="modalite_menopause" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Traitements *</label>
																				<input type="text" name="traitements_4" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseFourteen_1" aria-expanded="false" aria-controls="collapseFourteen_1"><strong> Antécédents obstétricaux</strong> </a> </h4>
														</div>
														<div id="collapseFourteen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-8">
																		<div class="form-group">
																			<div class="form-line">
																				<input type="checkbox" id="checkbox_01" name="antecedent[]" value="IVG">
																				<label for="checkbox_01"> IVG</label>
																				<input type="checkbox" id="checkbox_02" name="antecedent[]" value="IMG">
																				<label for="checkbox_02"> IMG</label>
																				<input type="checkbox" id="checkbox_03" name="antecedent[]" value="FCS">
																				<label for="checkbox_03"> FCS</label>
																				<input type="checkbox" id="checkbox_04" name="antecedent[]" value="GEU">
																				<label for="checkbox_04"> GEU</label>
																				<input type="checkbox" id="checkbox_05" name="antecedent[]" value="Gestité">
																				<label for="checkbox_05"> Gestité</label>
																				<input type="checkbox" id="checkbox_06" name="antecedent[]" value="Parité">
																				<label for="checkbox_06"> Parité</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group" style="margin:0;padding:0">
																			<div class="form-line">
																				<label style="color:#000">Dates des accouchements *</label>
																				<input type="text" name="dates_accouchements" class="form-control  obligatoire datepicker">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Déroulement des grossesses *</label>
																				<input type="text" name="deroulement" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Modalité des accouchements *</label>
																				<select name="modalite_accouchements" class="form-control obligatoire">
																					<option value="Oui">Oui</option>
																					<option value="Non">Non</option>
																				</select>
																			</div>
																		</div>
																	</div>

																	<div class="col-sm-12">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Pathologies des grosses, des accouchements et des suites de couche *</label>
																				<select name="pathologies_1" class="form-control obligatoire">
																					<option value="Oui">Oui</option>
																					<option value="Non">Non</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseFirteen_1" aria-expanded="false" aria-controls="collapseFirteen_1"><strong>Motif Consultation/ <span style="color:#607d8b">Algies pelviennes</span></strong> </a> </h4>
														</div>
														<div id="collapseFirteen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-3">
																		<div class="form-group" style="">
																			<div class="form-line">
																				<label style="color:#000">Date apparition*</label>
																				<input type="text" name="date_apparition" class="form-control  obligatoire datepicker">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Intensité *</label>
																				<input type="text" name="intensite" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Type *</label>
																				<select name="type_2" class="form-control obligatoire">
																					<option value="Pésanteur">Pésanteur</option>
																					<option value="Tiraillement">Tiraillement</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Douleurs *</label>
																				<select name="douleurs" class="form-control obligatoire">
																					<option value="aiguës">aiguës</option>
																					<option value="chroniques">chroniques</option>
																				</select>
																			</div>
																		</div>
																	</div>

																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">siège *</label>
																				<select name="siege" class="form-control obligatoire">
																					<option value="median">Médian</option>
																					<option value="latéral">Latéral</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-9">
																		<div class="form-group">
																			<div class="form-line">
																				<input type="checkbox" id="checkbox_07" name="douleur[]" value="Lombaire">
																				<label for="checkbox_07"> Lombaire</label>
																				<input type="checkbox" id="checkbox_08" name="douleur[]" value="Périnéal">
																				<label for="checkbox_08"> Périnéal</label>
																				<input type="checkbox" id="checkbox_09" name="douleur[]" value="Anale">
																				<label for="checkbox_09"> Anale</label>
																				<input type="checkbox" id="checkbox_10" name="douleur[]" value="Crurale">
																				<label for="checkbox_10"> Crurale</label>
																				<input type="checkbox" id="checkbox_11" name="douleur[]" value="Lombo-Sacrée">
																				<label for="checkbox_11"> Lombo-Sacrée</label>
																				<input type="checkbox" id="checkbox_12" name="douleur[]" value="Parité">
																				<label for="checkbox_12"> Parité</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Pathologies des grosses, des accouchements et des suites de couches *</label>
																				<select name="pathologies_2" class="form-control obligatoire">
																					<option value="Oui">Oui</option>
																					<option value="Non">Non</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseSixteen_1" aria-expanded="false" aria-controls="collapseSixteen_1"><strong>Motif Consultation/ <span style="color:#607d8b">Saignements anormaux</span></strong> </a> </h4>
														</div>
														<div id="collapseSixteen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-12">
																		<div class="form-group">
																			<div class="form-line">
																				<input type="checkbox" id="checkbox_13" name="saignement" value="Hypoménorrhées">
																				<label for="checkbox_13"> Hypoménorrhées</label>
																				<input type="checkbox" id="checkbox_14" name="saignement" value="Oligoménorrhées">
																				<label for="checkbox_14"> Oligoménorrhées</label>
																				<input type="checkbox" id="checkbox_15" name="saignement" value="Polyménorrhées">
																				<label for="checkbox_15"> Polyménorrhées</label>
																				<input type="checkbox" id="checkbox_16" name="saignement" value="Hyperpolyménorrhées">
																				<label for="checkbox_16"> Hyperpolyménorrhées</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<div class="form-line">
																				<input type="checkbox" id="checkbox_17" name="saignement" value="Pollakiménorrhées">
																				<label for="checkbox_17"> Pollakiménorrhées</label>
																				<input type="checkbox" id="checkbox_18" name="saignement" value="Spanioménorrhées">
																				<label for="checkbox_18"> Spanioménorrhées</label>
																				<input type="checkbox" id="checkbox_19" name="saignement" value="Métrorragies">
																				<label for="checkbox_19"> Métrorragies</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseSeventeen_1" aria-expanded="false" aria-controls="collapseSeventeen_1"><strong>Motif Consultation/ <span style="color:#607d8b">Aménorrhées</span></strong> </a> </h4>
														</div>
														<div id="collapseSeventeen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">

																				<select name="amenorrhees" class="form-control obligatoire">
																					<option value="">Sélectionner</option>
																					<option value="aménorrhée primaire">Aménorrhée primaire</option>
																					<option value="aménorrhée secondaire">Aménorrhée secondaire</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseHeihteen_1" aria-expanded="false" aria-controls="collapseHeihteen_1"><strong>Motif Consultation/ <span style="color:#607d8b">Leucorrhées</span></strong> </a> </h4>
														</div>
														<div id="collapseHeihteen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">

																				<select name="leucorrhees" class="form-control obligatoire">
																					<option value="">Sélectionner</option>
																					<option value="leucorrhées physiologiques">Leucorrhées physiologiques</option>
																					<option value="leucorrhées pathologiques.">Leucorrhées pathologiques.</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseNineteen_1" aria-expanded="false" aria-controls="collapseNineteen_1"><strong>Motif Consultation/ <span style="color:#607d8b">Mastodynies</span></strong> </a> </h4>
														</div>
														<div id="collapseNineteen_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="col-sm-6">
																	<div class="form-group">
																		<div class="form-line">
																			<select name="mastodynies" class="form-control obligatoire">
																				<option value="">Sélectionner</option>
																				<option value="Unilatéral">Unilatérales</option>
																				<option value="Bilatéral">Bilatérales</option>
																				<option value="Cycles">Cycles</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwenty_1" aria-expanded="false" aria-controls="collapseTwenty_1"><strong> Consultation/ <span style="color:#607d8b">Troubles associées</span></strong> </a> </h4>
														</div>
														<div id="collapseTwenty_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="col-sm-9">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="checkbox" id="checkbox_20" name="trouble[]" value="Infection urinaire">
																			<label for="checkbox_20"> Infection urinaire</label>
																			<input type="checkbox" id="checkbox_21" name="trouble[]" value="Incontinence urinaire">
																			<label for="checkbox_21"> Incontinence urinaire</label>
																			<input type="checkbox" id="checkbox_22" name="trouble[]" value="Constipation">
																			<label for="checkbox_22"> Constipation</label>
																			<input type="checkbox" id="checkbox_23" name="trouble[]" value="Diarrhée, Tenesme">
																			<label for="checkbox_23"> Diarrhée, Tenesme</label>
																			<input type="checkbox" id="checkbox_24" name="trouble[]" value="Lombo-Sacrée">
																			<label for="checkbox_24"> Lombo-Sacrée</label>
																			<input type="checkbox" id="checkbox_25" name="trouble[]" value="Parité">
																			<label for="checkbox_25"> Parité</label>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-12 retour-gynecologie"></div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="consult_gyn">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="ordonnance">
								<div class="header" style="margin-top:45px">
									<h2>Établir une ordonnance <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>

								<div class="body">
									<div class="table-responsive">
										<form method="post" action="<?php echo site_url('consultation/ajoutOrdonnance'); ?>" id="form-ord">
											<div class="retour-ord"></div>
											<table class="table table-bordered table-striped table-hover" style="font-size:12px">
												<thead>
													<tr>
														<th style="width:50%">Produit</th>
														<th style="width:30px">Qte</th>
														<th style="width:180px">Posologie</th>
														<th style="width:30px">Durée</th>
														<th style="width:50px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="med" onChange="groupe();" style="width:100%;padding-bottom:5px;padding-top:5px;margin-bottom:10px">
																<option value="">----- Prescription * -----</option>
																<?php foreach ($listeMed as $l) { ?>
																	<option value="<?php echo  $l->med_sNc . ' ' . $l->for_sLibelle . ' ' . $l->med_iDosage . '' . $l->med_sUnite; ?>"><?php echo  $l->med_sNc . ' ' . $l->for_sLibelle . ' ' . $l->med_iDosage . '' . $l->med_sUnite; ?></option>
																<?php } ?>
																<option value="autre">Autre</option>
															</select>
															<div id="bloc" class="cacher">
																<input type="text" id="medi" style="width:58%" placeholder="nom du produit" />
																<input type="text" id="forme" style="width:25%" placeholder="forme" />
																<input type="text" id="dosage" style="width:15%" placeholder="dosage" />
															</div>
														</td>
														<td>
															<input type="number" id="qte" style="width:100%" />

														</td>
														<td>
															<input type="number" id="pos" style="width:40%" />
															<select id="typePos" style="width:55%;padding-bottom:5px;padding-top:5px">
																<option value="Cp">Cp</option>
																<option value="Inj">Inj</option>
																<option value="Amp">Amp</option>
																<option value="Clt">Clt</option>

															</select>

														</td>
														<td>
															<input type="number" id="duree" style="width:100%" />

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
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_soins" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<?php $listeActSoins = $this->md_parametre->liste_prescription(21);
																foreach ($listeActSoins as $li) { ?>
																	<option value="<?php echo $li->lac_id; ?>-/-<?php echo $li->lac_sLibelle; ?>-/-<?php echo $li->uni_id; ?>-/-<?php echo $li->lac_iDure; ?>"> <?php echo $li->lac_sLibelle; ?> </option>
																<?php } ?>
															</select>
														</td>
														<td>
															<input type="number" id="qte_soins" style="width:45px" />

														</td>
														<td>
															<input type="time" id="heure_soins" style="width:50px" />
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
															<?php $unites = $this->md_parametre->liste_unite_services_actifs(31);
															foreach ($unites as $u) { ?>
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
											<div class="col-sm-9">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000"><b>Mode d'entrée *</b></label>
														<!--<textarea name="motif" class="form-control obligatoire"></textarea>-->
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
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_imagerie" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<?php $listeActSoins = $this->md_parametre->liste_prescription(25);
																foreach ($listeActSoins as $li) { ?>
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
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_labo" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Sélectionner * </option>
																<?php foreach ($listeActeLabo as $lm) { ?>
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
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addLabo" style="color:#fff"><i class="fa fa-check"></i>Valider</a>
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
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_reeducation" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<?php $listeActSoins = $this->md_parametre->liste_prescription(30);
																foreach ($listeActSoins as $li) { ?>
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
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_exp" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Prescription * </option>
																<optgroup label="Cardiologie">
																	<?php foreach ($listeExamenCardio as $lm) { ?>
																		<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Rhumatologie">
																	<?php foreach ($listeExamenRhum as $lm) { ?>
																		<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Gynécologie">
																	<?php foreach ($listeExamenGyne as $lm) { ?>
																		<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Gynécologie obstétricienne">
																	<?php foreach ($listeExamenGyneObs as $lm) { ?>
																		<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Neurologie">
																	<?php foreach ($listeExamenGyneNeuro as $lm) { ?>
																		<option value="<?php echo $lm->lac_id; ?>-/-<?php echo $lm->lac_sLibelle; ?>-/-<?php echo $lm->uni_id; ?>-/-<?php echo $lm->lac_iDure; ?>"> <?php echo $lm->lac_sLibelle; ?> </option>
																	<?php } ?>
																</optgroup>
																<optgroup label="Pneumonie">
																	<?php foreach ($listeExamenGynePneu as $lm) { ?>
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
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
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
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<select id="act_maladie" style="width:100%;padding-bottom:5px;padding-top:5px">
																<option value=""> Sélectionner * </option>
																<?php foreach ($listeMaladie as $lm) { ?>
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

							<div role="tabpanel" class="tab-pane" id="rdv">
								<div class="header" style="margin-top:45px">
									<h2>Programmer un futur Rendez-vous au patient <small>Ajoutez les éléments dans la liste et puis validez</small> </h2>
								</div>

								<div class="body">
									<div class="col-md-12 col-lg-12 col-xl-12">
										<div class="card m-t-20">
											<form id="cal">
												<?php foreach ($rdv as $r) { ?>
													<input type="hidden" name="couleurRdv" class="couleurRdv" value="<?php if ($r->dir_dDate == $odij and $r->dir_tHeure_arrive <= $heure) {
																															echo "b-l b-2x b-success";
																														} elseif ($r->dir_dDate == $odij and $r->dir_tHeure_arrive > $heure) {
																															echo "b-l b-2x b-success bg-warning";
																														} elseif ($r->dir_dDate < $odij and $r->dir_tHeure_arrive <= $heure) {
																															echo "b-l b-2x b-lightred";
																														} elseif ($r->dir_dDate < $odij and $r->dir_tHeure_arrive > $heure) {
																															echo "b-l b-2x b-lightred bg-warning";
																														} elseif ($r->dir_dDate > $odij) {
																															echo "bg-cyan";
																														} ?>" />
													<input type="hidden" name="dateHeureRdv" class="dateHeureRdv" value="<?php echo $r->dir_dDate; ?>T<?php echo $r->dir_tHeure; ?>" />
													<input type="hidden" name="objetRdv" class="objetRdv" value="<?php echo $r->per_sTitre . " " . $r->per_sNom . " " . $r->per_sPrenom; ?> / Rendez-vous avec <?php echo $r->dir_sNom . " " . $r->dir_sPrenom; ?> <?php if ($r->dir_sObjet) {
																																																																		echo " pour " . $r->dir_sObjet;
																																																																	} ?>" />
												<?php } ?>
											</form>
											<div class="body">
												<button class="btn btn-raised btn-success btn-sm m-r-0 m-t-0" id="change-view-today">Aujourd'hui</button>
												<button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-day">Jour</button>
												<button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-week">Semaine</button>
												<button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-month">Mois</button>
												<div id="calendar"></div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<form id="form-rdv">
											<div class="retour-rdv"></div>
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th style="width:20%">Date</th>
														<th style="width:15%">Heure</th>
														<th style="width:60%">Objet du Rendez-vous</th>
														<th style="width:20px" class="text-center"><i class="fa fa-wrench"></i></th>
													</tr>
													<tr>
														<td>
															<input type="text" id="dateRdv" class="datepicker" width="100%">
														</td>
														<td>
															<input type="time" id="heureRdv" class="" width="100%">
														</td>
														<td>
															<textarea id="motifRdv" cols="32" width="100%"></textarea>
														</td>

														<td class="text-center">
															<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addRdv"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
												</thead>

												<tbody id="tbodyRdv"></tbody>
											</table>
											<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
											<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat">
										</form>
										<a href="javascript:();" class="btn btn-success waves-effect pull-right addRdv" style="color:#fff"><i class="fa fa-check"></i>Valider le Rendez-vous</a>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="femme">
								<div class="header" style="margin-top:45px">
									<h2>Déclaration femme enceinte <small></small> </h2>
								</div>

								<div class="body">

									<form id="form-femme">
										<div class="col-sm-12 retour-femme"></div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Selectionner l'état de la femme *</label>
														<select name="femme" class="form-control obligatoire">
															<option value="">------ Selectionner -------</option>
															<option value="1">Enceinte</option>
															<option value="0">Pas enceinte</option>
														</select>
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
													</div>
												</div>
											</div>
										</div>

										<div class="row clearfix">

											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddFemme">Enregistrer</a>
											</div>
										</div>
									</form>
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
							<div role="tabpanel" class="tab-pane" id="enfant">
								<div class="header" style="margin-top:45px">
									<h2>Déclaration enfant malnutri(e) <small></small> </h2>
								</div>

								<div class="body">

									<form id="form-enfant">
										<div class="col-sm-12 retour-enfant"></div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">selectionner l'état de l'enfant *</label>
														<select name="enfant" class="form-control obligatoire">
															<option value="">------ Selectionner -------</option>
															<option value="1">Malnutri(e)</option>
															<option value="0">Pas malnutri(e)</option>
														</select>
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
													</div>
												</div>
											</div>
										</div>

										<div class="row clearfix">

											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddEnfant">Enregistrer</a>
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
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Unité *</label>
														<select name="unite" class="form-control obligatoire">
															<option value="">--------- Selectionner ----------</option>
															<?php foreach ($listeUnite as $lu) { ?>
																<option value="<?= $lu->uni_id ?>"><?= $lu->uni_sLibelle ?></option>
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
												<a class="btn btn-raised bg-blue-grey" id="AddDeces">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="abdominal">
								<div class="header" style="margin-top:45px">
									<h2>Examen abdominal</h2>
								</div>
								<div class="body">
									<form id="form-examen-abdominal">
										<div class="col-sm-12 retour-abdominal"></div>
										<div class="row clearfix">
											<div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
												<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingOne_1">
															<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1"> <strong>Masse abdominale </strong></a> </h4>
														</div>
														<div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Siege *</label>
																				<input type="text" name="siege" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Volume *</label>
																				<input type="text" name="volume" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Mobilité *</label>
																				<input type="text" name="mobilite" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Consistance *</label>
																				<input type="text" name="consistance" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Sensibilité *</label>
																				<input type="text" name="sensibilite" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingTwo_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false" aria-controls="collapseTwo_1"><strong> Douleur abdomino-pelvienne </strong></a> </h4>
														</div>
														<div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Localisation *</label>
																				<input type="text" name="localisation" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Intensité *</label>
																				<input type="text" name="intensite" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Irradiation *</label>
																				<input type="text" name="irradiation" class="form-control  obligatoire">
																				<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
																				<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Défense *</label>
																				<select name="defense" class="form-control obligatoire">
																					<option value="">--------- Selectionner ----------</option>
																					<option value="Défense">Défense</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Contracture abdominale *</label>
																				<select name="contracture" class="form-control obligatoire">
																					<option value="">--------- Selectionner ----------</option>
																					<option value="Contracture abdominale">Contracture abdominale</option>
																				</select>
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
										<div class="col-sm-12 retour-abdominal"></div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddAbdominal">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="perineal">
								<div class="header" style="margin-top:45px">
									<h2>Examen périneal</h2>
								</div>
								<div class="body">
									<form id="form-examen-perineal">
										<div class="col-sm-12 retour-perineal"></div>
										<div class="row clearfix">
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Pilosité *</label>
														<input type="text" name="pilosite" class="form-control obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Pigmentation *</label>
														<input type="text" name="pigmentation" class="form-control obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Séquelles obstétricales *</label>
														<input type="text" name="sequelle" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Distance ano-vulvaire *</label>
														<input type="text" name="distance" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Infection cutanéo-muqueuse *</label>
														<input type="text" name="infec_1" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Infection bartholinite *</label>
														<input type="text" name="infec_2" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Lésion traumatique *</label>
														<input type="text" name="lesion" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Infection des glandes cutanéo-muqueuse *</label>
														<input type="text" name="infec_3" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Développement des grandes lèvres, petites lèvres et clitoris *</label>
														<input type="text" name="clitoris" class="form-control  obligatoire">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-12 retour-perineal"></div>
										<div class="row clearfix">

											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddPerineal">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="pelvien">
								<div class="header" style="margin-top:45px">
									<h2>Examen pelvien sous spéculum</h2>
								</div>
								<div class="body">
									<form id="form-examen-pelvien">
										<div class="col-sm-12 retour-pelvien"></div>
										<div class="row clearfix">
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Aspect *</label>
														<input type="text" name="aspect" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Zone de jonction endocol exocol *</label>
														<input type="text" name="zone" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Glaire Cervicale *</label>
														<input type="text" name="glaire" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Hysterométrie *</label>
														<input type="text" name="hyst" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Calibrage du col *</label>
														<input type="text" name="calibrage" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Inspection du vagin *</label>
														<input type="text" name="vagin" class="form-control  obligatoire">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-12 retour-pelvien"></div>
										<div class="row clearfix">

											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddPelvien">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="vaginal">
								<div class="header" style="margin-top:45px">
									<h2>Toucher vaginal</h2>
								</div>
								<div class="body">
									<form id="form-examen-vaginal">
										<div class="col-sm-12 retour-vaginal"></div>
										<div class="row clearfix">
											<div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
												<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingOne_1">
															<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseUn_1" aria-expanded="true" aria-controls="collapseUn_1"> <strong>Vagin</strong> </a> </h4>
														</div>
														<div id="collapseUn_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Cloison recto-vaginale *</label>
																				<input type="text" name="cloison_1" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Cloison vésico-vaginale *</label>
																				<input type="text" name="cloison_2" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Culs de sac vaginaux *</label>
																				<input type="text" name="cul_1" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Cul de sac vaginal posterieur *</label>
																				<input type="text" name="cul_2" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Nodule *</label>
																				<input type="text" name="nodule" class="form-control obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingTwo_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseDeux_1" aria-expanded="false" aria-controls="collapseDeux_1"> <strong>Col utérin </strong></a> </h4>
														</div>
														<div id="collapseDeux_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Forme *</label>
																				<input type="text" name="forme" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Longueur (mm) *</label>
																				<input type="number" name="longueur" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Volume (mm)*</label>
																				<input type="number" name="volume_1" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Ouverture *</label>
																				<input type="text" name="ouverture" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Consistance *</label>
																				<input type="text" name="consistance_1" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Mobilité *</label>
																				<input type="text" name="mobilite_1" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Sensibilité *</label>
																				<input type="text" name="sensibilite_1" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTrois_1" aria-expanded="false" aria-controls="collapseTrois_1"><strong> Corps utérin </strong></a> </h4>
														</div>
														<div id="collapseTrois_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Position de l'utérus *</label>
																				<input type="text" name="position" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Volume (mm) *</label>
																				<input type="number" name="volume_2" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Consistance *</label>
																				<input type="text" name="consistance_2" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Mobilité *</label>
																				<input type="text" name="mobilite_2" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Sensibilité *</label>
																				<input type="text" name="sensibilite_2" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseQuatre_1" aria-expanded="false" aria-controls="collapseQuatre_1"><strong> Annexes </strong></a> </h4>
														</div>
														<div id="collapseQuatre_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Masse pelvienne *</label>
																				<input type="text" name="masse" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Ovaires *</label>
																				<input type="text" name="ovaire" class="form-control  obligatoire">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<div class="form-line">
																				<label style="color:#000">Plancher pelvien *</label>
																				<input type="text" name="pelvien" class="form-control  obligatoire">
																				<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
																				<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
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
										<div class="col-sm-12 retour-vaginal"></div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddVaginal">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>


							<div role="tabpanel" class="tab-pane" id="rectal">
								<div class="header" style="margin-top:45px">
									<h2>Examen du toucher rectal</h2>
								</div>
								<div class="body">
									<form id="form-examen-rectal">
										<div class="col-sm-12 retour-rectal"></div>
										<div class="row clearfix">
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Cul de sac de douglas *</label>
														<input type="text" name="douglas" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Noyau central du perinée *</label>
														<input type="text" name="noyau" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Cloison recto-vaginal *</label>
														<input type="text" name="cloison" class="form-control  obligatoire">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
													</div>
												</div>
											</div>
										</div>

										<div class="row clearfix">

											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddRectal">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="echographie">
								<div class="header" style="margin-top:45px">
									<h2>Examen Echographique</h2>
								</div>
								<div class="body">
									<form id="form-echographie">
										<div class="col-sm-12 retour-echographie"></div>
										<div class="row clearfix">
											<div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
												<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingOne_1">
															<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseFive_1" aria-expanded="true" aria-controls="collapseFive_1"> <strong>Echographie gynécologique</strong> </a> </h4>
														</div>
														<div id="collapseFive_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-6">
																		<strong style="color:#607d8b">Renseignements généraux</strong>
																	</div>
																	<div class="col-sm-6">
																		<strong style="color:#607d8b">Indications</strong>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">DDR *</label>
																			<input style="border:1px solid #ccc;height:30px" type="text" name="champs_1" class="form-control has-danger  obligatoire datepicker">
																		</div>
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">Contexte gynécologique *</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_2" class="form-control obligatoire">
																				<option value=""></option>
																				<option value="Contexte gynécologique">Contexte gynécologique</option>
																			</select>
																		</div>
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">Prescripteur *</label>
																			<input style="border:1px solid #ccc;height:30px" value="<?php echo ' ' . $user->per_sTitre; ?> <?php echo $user->per_sPrenom . ' ' . $user->per_sNom; ?>" type="text" name="champs_3" class="form-control  obligatoire">
																		</div>
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">Conditions de réalisation *</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_4" class="form-control obligatoire">
																				<option value="bonnes">bonnes</option>
																			</select>
																		</div>
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">Voie d'examen *</label>
																			<select style="border:1px solid #ccc;height:30px"" name=" champs_5" class="form-control obligatoire">
																				<option value="vaginale">vaginale</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-sm-8">
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">Indication - Utérus *</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_6" class="form-control obligatoire">
																				<option value=""></option>
																				<option value="Indication - Utérus">Indication - Utérus</option>
																			</select>
																		</div>
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">indication - Annexes *</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_7" class="form-control obligatoire">
																				<option value=""></option>
																				<option value="indication - Annexes">indication - Annexes</option>
																			</select>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">indication - Autres *</label>
																			<select style="border:1px solid #ccc;height:30px;" name="champs_8" class="form-control obligatoire">
																				<option value=""></option>
																				<option value="indication - Autres">indication - Autres</option>
																			</select>
																		</div>
																		<div class="form-group" style="padding:0;margin:0">
																			<label style="color:#000">indication - texte libre *</label><br>
																			<textarea style="border:1px solid #ccc;width:100%;height:95px" name="champs_9" rows="6" class="obligatoire"></textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingTwo_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseSix_1" aria-expanded="false" aria-controls="collapseSix_1"> <strong>Utérus</strong> </a> </h4>
														</div>
														<div id="collapseSix_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-2">
																		<strong style="color:#607d8b">Dimensions</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000;font-size:12px">Utérus: longueur</label>
																			<input style="border:1px solid #ccc;height:30px" type="text" name="champs_10" placeholder=" en mm" class="form-control  obligatoire">
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000;font-size:13px">Utérus:largeur</label>
																			<input style="border:1px solid #ccc;height:30px" type="text" name="champs_11" placeholder=" en mm" class="form-control  obligatoire">
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000;font-size:13px">Utérus:hauteur</label>
																			<input style="border:1px solid #ccc;height:30px" type="text" name="champs_12" placeholder=" en mm" class="form-control  obligatoire">
																		</div>
																	</div>
																	<div class="col-sm-2">
																		<strong style="color:#607d8b">Anatomie</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000;font-size:13px">Utérus:position</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_13" class="form-control obligatoire">
																				<option value="antéversée">antéversée</option>
																			</select>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000;font-size:13px">Utérus:contours</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_14" class="form-control obligatoire">
																				<option value="réguliers">réguliers</option>
																			</select>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000;font-size:10px">Structure myomètre</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_15" class="form-control obligatoire">
																				<option value="homogène">homogène</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<strong style="color:#607d8b">Endomètre</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Endomètre</label><br>
																			<textarea style="border:1px solid #ccc;width:100%" name="champs_16" rows="2" class="obligatoire"></textarea>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Endomètre:épaisseur</label><br>
																			<input style="border:1px solid #ccc;height:30px" type="text" name="champs_17" placeholder=" en mm" class="form-control  obligatoire">
																		</div>
																	</div>
																	<div class="col-sm-4">
																		<strong style="color:#607d8b">Cavité</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Cavité</label><br>
																			<textarea style="border:1px solid #ccc;width:100%" name="champs_18" rows="2" class="obligatoire"></textarea>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Cavité:DIU</label>
																			<select style="border:1px solid #ccc;height:30px" name="champs_19" class="form-control obligatoire">
																				<option value=""></option>
																				<option value="Cavité:DIU">Cavité:DIU</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseSeven_1" aria-expanded="false" aria-controls="collapseSeven_1"> <strong>Autres</strong> </a> </h4>
														</div>
														<div id="collapseSeven_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-3">
																		<strong style="color:#607d8b">Ovaires</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Ovaire droit</label>
																			<textarea style="border:1px solid #ccc;width:100%" name="champs_20" rows="2" class="obligatoire"></textarea>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Ovaire droit:grand axe</label>
																			<input style="border:1px solid #ccc;height:25px" type="text" name="champs_21" placeholder=" en mm" class="form-control  obligatoire">
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Ovaire gauche</label>
																			<textarea style="border:1px solid #ccc;width:100%" rows="2" name="champs_22" class="obligatoire"></textarea>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Ovaire gche:grand axe</label>
																			<input style="border:1px solid #ccc;height:25px" type="text" name="champs_23" placeholder=" en mm" class="form-control  obligatoire">
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<strong style="color:#607d8b">Culs de sac</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Culs de sac latéraux</label>
																			<textarea style="border:1px solid #ccc" rows="2" name="champs_24" style="width:100%" class="obligatoire"></textarea>
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Douglas</label>
																			<textarea style="border:1px solid #ccc" rows="2" name="champs_25" class="obligatoire"></textarea>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<strong style="color:#607d8b">Doppler A. utérines</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">AUD IR</label>
																			<input style="border:1px solid #ccc;height:25px" type="text" name="champs_26" class="form-control  obligatoire">
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">AUD IP</label>
																			<input style="border:1px solid #ccc;height:25px" type="text" name="champs_27" placeholder="" class="form-control  obligatoire">
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">AUG IR</label>
																			<input style="border:1px solid #ccc;height:25px" type="text" name="champs_28" class="form-control  obligatoire">
																		</div>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">AUG IP</label>
																			<input style="border:1px solid #ccc;height:25px" type="text" name="champs_29" placeholder="" class="form-control  obligatoire">
																			<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
																			<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<strong style="color:#607d8b">Trompes</strong>
																		<div class="form-group" style="padding:0;margin:0;">
																			<label style="color:#000">Description trompes</label>
																			<textarea style="border:1px solid #ccc;width:100%" rows="2" name="champs_30" class="obligatoire"></textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="panel panel-primary">
														<div class="panel-heading" role="tab" id="headingThree_1">
															<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseHeight_1" aria-expanded="false" aria-controls="collapseHeight_1"> <strong>Conclusion</strong> </a> </h4>
														</div>
														<div id="collapseHeight_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-12">

																		<div class="form-group" style="padding:0;margin:0;">
																			<strong style="color:#607d8b">Conclusion *</strong>
																			<textarea style="border:1px solid #ccc;width:100%" rows="3" name="champs_31" class="obligatoire"></textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-12 retour-echographie"></div>
										<div class="row clearfix">

											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddEcho">Enregistrer</a>
											</div>
										</div>
									</form>
								</div>
							</div>


							<div role="tabpanel" class="tab-pane" id="senologie">
								<div class="header" style="margin-top:45px">
									<h2>Examen Sénologique</h2>
								</div>
								<div class="body">
									<form id="form-senologie">
										<div class="col-sm-12 retour-senologie"></div>
										<div class="row clearfix">
											<div class="col-sm-12"><strong>Inspection</strong></div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Anomalies Cutanées *</label>
														<input type="text" name="champs_1" class="form-control obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Dissymétries *</label>
														<input type="text" name="champs_2" class="form-control obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Anomalies de l'aréole *</label>
														<input type="text" name="champs_3" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-12"><strong>Palpation des nodules</strong></div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">

														<select style="border:1px solid #ccc;height:30px;" name="champs_4" class="form-control obligatoire">
															<option value="">Sélectionner *</option>
															<option value="Siège">Siège</option>
															<option value="Quadrant">Quadrant</option>
															<option value="Horaire">Horaire</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">

														<select style="border:1px solid #ccc;height:30px;" name="champs_5" class="form-control obligatoire">
															<option value="">Sélectionner *</option>
															<option value="Unilatéral">Unilatéral</option>
															<option value="Bilatéral">Bilatéral</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">

														<select style="border:1px solid #ccc;height:30px;" name="champs_6" class="form-control obligatoire">
															<option value="">Sélectionner *</option>
															<option value="Nodule unique">Nodule unique</option>
															<option value="Nodule multiple">Nodule multiple</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Distance mamelonnaire (cm) *</label>
														<input type="text" name="champs_7" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Taille (cm)*</label>
														<input type="text" name="champs_8" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Sensibilité *</label>
														<input type="text" name="champs_9" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Mobilité *</label>
														<input type="text" name="champs_10" class="form-control  obligatoire">
														<input type="hidden" value="<?php echo $acm_id; ?>" name="id">
														<input type="hidden" value="<?php echo $patient->pat_id; ?>" name="pat_soins">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Evolution de la tumeur *</label>
														<input type="text" name="champs_11" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label style="color:#000">Forme *</label>
													<select style="border:1px solid #ccc;height:30px;" name="champs_12" class="form-control obligatoire">
														<option value="Rond">Rond</option>
														<option value="Discorde">Discorde</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_13" class="form-control obligatoire">
														<option value="Contours réguliers">Contours réguliers</option>
														<option value="Contours irréguliers">Contours irréguliers</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_14" class="form-control obligatoire">
														<option value="Bien limitée">Bien limitée</option>
														<option value="Mal limitée">Mal limitée</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_15" class="form-control obligatoire">
														<option value="Unilobé">Unilobée</option>
														<option value="Polylobé">Polylobée</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label style="color:#000">Consistance *</label>
													<select style="border:1px solid #ccc;height:30px;" name="champs_16" class="form-control obligatoire">
														<option value="Masse molle: Non">Masse molle: Non</option>
														<option value="Masse molle: Oui">Masse molle: Oui</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_17" class="form-control obligatoire">
														<option value="Ferme: Non">Ferme: Non</option>
														<option value="Ferme: Oui">Ferme: Oui</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_18" class="form-control obligatoire">
														<option value="Elastique: Non">Elastique: Non</option>
														<option value="Elastique: Oui">Elastique: Oui</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_19" class="form-control obligatoire">
														<option value="Douleur à la palpe: Non">Douleur à la palpe: Non</option>
														<option value="Douleur à la palpe: Oui">Douleur à la palpe: Oui</option>
													</select>
												</div>
											</div>
											<div class="col-sm-12"><strong>Ecoulement mamaire</strong></div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Expression du mamelon entre pouce et index *</label>
														<input type="text" name="champs_20" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Volume *</label>
														<input type="text" name="champs_21" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="form-line">
														<label style="color:#000">Consistance *</label>
														<input type="text" name="champs_22" class="form-control  obligatoire">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label style="color:#000">Ecoulement *</label>
													<select style="border:1px solid #ccc;height:30px;" name="champs_23" class="form-control obligatoire">
														<option value="Unilatéral">Unilatéral</option>
														<option value="Bilatéral">Bilatéral</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_24" class="form-control obligatoire">
														<option value="Unigal">Unigal</option>
														<option value="Plurigalaclophorigue">Plurigalaclophorigue</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_25" class="form-control obligatoire">
														<option value="Spontanée: Non">Spontanée: Non</option>
														<option value="Spontanée: Oui">Spontanée: Oui</option>
													</select>
													<select style="border:1px solid #ccc;height:30px;" name="champs_26" class="form-control obligatoire">
														<option value="Provoqué par pression: Non">Provoqué par pression: Non</option>
														<option value="Provoqué par pression: Oui">Provoqué par pression: Oui</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label style="color:#000">Liquide *</label>
													<select style="border:1px solid #ccc;height:30px;" name="champs_27" class="form-control obligatoire">
														<option value="Incolor">Incolor</option>
														<option value="Brun">Brun</option>
														<option value="Séreux">Séreux</option>
														<option value="Vert">Vert</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-12 retour-senologie"></div>
										<div class="row clearfix">

											<div class="col-sm-12">
												<a class="btn btn-raised bg-blue-grey" id="AddSeno">Enregistrer</a>
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
								<?php foreach ($listeEncours as $le) { ?>
									<tr>
										<td><?php echo $le->pat_sMatricule; ?></td>
										<td><?php echo $le->pat_sNom; ?></td>
										<td><?php echo $le->pat_sPrenom; ?></td>
										<td><?php echo $le->lac_sLibelle; ?></td>
										<td>Le <?php echo $this->md_config->affDateFrNum($le->fac_dDatePaie); ?></td>
										<td class="text-center">
											<?php if (is_null($le->hos_id)) { ?>
												<a href="<?php echo site_url("gynecologie/voir/" . $le->acm_id); ?>"><b>Voir</b></a>
											<?php } else { ?>
												<a href="<?php echo site_url("hospitalisation/voir/" . $le->hos_id); ?>"><b>Voir</b></a>
											<?php } ?>
											|
											<a href="<?php echo site_url("impression/dossier_medical_passage/" . $le->acm_id); ?>"><b>Imprimer</b></a>
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


<script type="text/javascript">
	'use strict';


	function groupe() {
		var med = document.getElementById('med').value;
		if (med == "autre") {
			document.getElementById('bloc').classList.remove("cacher");
		} else {
			document.getElementById('bloc').classList.add("cacher");
		}
	}

	var listeOrd = document.querySelector('#tbodyOrd');
	var addOrd = document.querySelector('#addOrd');
	var annuaire;
	annuaire = new Array();

	function removeOrdMed(index) {
		annuaire.splice(index, 1);
		showListeOrdMed();
	}

	function removeOrdAutre(index) {
		annuaire.splice(index, 1);
		showListeOrdAutre();
	}

	function addDetailOrd() {
		var med = document.getElementById('med').value;
		var qte = document.getElementById('qte').value;
		var duree = document.getElementById('duree').value;
		var pos = document.getElementById('pos').value;
		var typePos = document.getElementById('typePos').value;
		var medi = document.getElementById('medi').value;
		var forme = document.getElementById('forme').value;
		var dosage = document.getElementById('dosage').value;

		if (med != "autre") {
			if (med == '' || qte == '' || duree == '' || pos == '') {
				alert('Veuillez renseigner le champs.');
			} else {
				var contact = new Object();
				contact.med = med;
				contact.qte = qte;
				contact.duree = duree;
				contact.pos = pos;
				contact.typePos = typePos;
				annuaire.push(contact);
				showListeOrdMed();
				document.getElementById('qte').value = "";
				document.getElementById('duree').value = "";
				document.getElementById('pos').value = "";
			}
		} else {
			if (medi == '' || forme == '' || dosage == '' || qte == '' || duree == '' || pos == '') {
				alert('Veuillez renseigner le champs.');
			} else {
				var contact = new Object();
				contact.medi = medi;
				contact.forme = forme;
				contact.dosage = dosage;
				contact.qte = qte;
				contact.duree = duree;
				contact.pos = pos;
				contact.typePos = typePos;
				annuaire.push(contact);
				showListeOrdAutre();
				document.getElementById('medi').value = "";
				document.getElementById('forme').value = "";
				document.getElementById('dosage').value = "";
				document.getElementById('qte').value = "";
				document.getElementById('duree').value = "";
				document.getElementById('pos').value = "";
			}
		}
	}

	addOrd.addEventListener('click', addDetailOrd);

	function showListeOrdMed() {
		var contenu = "";
		var tailleTableau = annuaire.length;

		for (var i = 0; i < tailleTableau; i++) {

			contenu += '<tr>';
			contenu += '<td><input type="hidden" name="med[]" value="' + annuaire[i].med + '"/>' + annuaire[i].med + '</td>';
			contenu += '<td><input type="hidden" name="qte[]" value="' + annuaire[i].qte + '"/>' + annuaire[i].qte + '</td>';
			contenu += '<td><input type="hidden" name="pos[]" value="' + annuaire[i].pos + ' ' + annuaire[i].typePos + ' /jour"/>' + annuaire[i].pos + ' ' + annuaire[i].typePos + ' /jour</td>';
			contenu += '<td><input type="hidden" name="duree[]" value="' + annuaire[i].duree + '"/>' + annuaire[i].duree + '</td>';
			contenu += '<td class="text-center"><a href="javascript:();" onClick="removeOrdMed(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
			contenu += '</tr>';
		}

		listeOrd.innerHTML = contenu;
		// alert(contenu);
	}

	function showListeOrdAutre() {
		var contenu = "";
		var tailleTableau = annuaire.length;

		for (var i = 0; i < tailleTableau; i++) {
			var jour = "";
			if (annuaire[i].duree > 1) {
				jour = "jours";
			} else {
				jour = "jour";
			}
			contenu += '<tr>';
			contenu += '<td><input type="hidden" name="med[]" value="' + annuaire[i].medi + ' ' + annuaire[i].forme + ' ' + annuaire[i].dosage + '"/>' + annuaire[i].medi + ' ' + annuaire[i].forme + ' ' + annuaire[i].dosage + '</td>';
			contenu += '<td><input type="hidden" name="qte[]" value="' + annuaire[i].qte + '"/>' + annuaire[i].qte + '</td>';
			contenu += '<td><input type="hidden" name="pos[]" value="' + annuaire[i].pos + ' ' + annuaire[i].typePos + ' /jour"/>' + annuaire[i].pos + ' ' + annuaire[i].typePos + ' /jour</td>';
			contenu += '<td><input type="hidden" name="duree[]" value="' + annuaire[i].duree + '"/>' + annuaire[i].duree + ' ' + jour + '</td>';
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
		annuaireSoins.splice(index, 1);
		showListeSoins();
	}

	function addDetailSoins() {
		var act_soins = document.getElementById('act_soins').value;
		var qte_soins = document.getElementById('qte_soins').value;
		var heure_soins = document.getElementById('heure_soins').value;
		var cons = document.getElementById('cons').value;

		if (act_soins == '' || qte_soins == '' || heure_soins == '') {
			alert('Veuillez renseigner le champs.');
		} else {
			var contactSoins = new Object();
			contactSoins.act_soins = act_soins;
			contactSoins.qte_soins = qte_soins;
			contactSoins.heure_soins = heure_soins;
			contactSoins.cons = cons;
			annuaireSoins.push(contactSoins);
			showListeSoins();
			document.getElementById('heure_soins').value = "";
			document.getElementById('qte_soins').value = "";
			document.getElementById('cons').value = "";
		}
	}

	addSoins.addEventListener('click', addDetailSoins);

	function showListeSoins() {
		var contenuSoins = "";
		var tailleTableauSoins = annuaireSoins.length;

		for (var i = 0; i < tailleTableauSoins; i++) {

			var tabSoins = annuaireSoins[i].act_soins.split("-/-");

			contenuSoins += '<tr>';
			contenuSoins += '<td><input type="hidden" name="act_soins[]" value="' + tabSoins[0] + '"/><input type="hidden" name="uni_soins[]" value="' + tabSoins[2] + '"/>' + tabSoins[1] + '<input type="hidden" name="duree_soins[]" value="' + tabSoins[3] + '"/> </td>';
			contenuSoins += '<td><input type="hidden" name="qte_soins[]" value="' + annuaireSoins[i].qte_soins + '"/>X ' + annuaireSoins[i].qte_soins + '</td>';
			contenuSoins += '<td><input type="hidden" name="heure_soins[]" value="' + annuaireSoins[i].heure_soins + '"/> à ' + annuaireSoins[i].heure_soins + '</td>';
			contenuSoins += '<td><input type="hidden" name="cons[]" value="' + annuaireSoins[i].cons + '"/>' + annuaireSoins[i].cons + '</td>';
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
		annuaireImagerie.splice(index, 1);
		showListeImagerie();
	}

	function addDetailImagerie() {
		var act_imagerie = document.getElementById('act_imagerie').value;

		if (act_imagerie == '') {
			alert('Veuillez renseigner le champs.');
		} else {
			var contactImagerie = new Object();
			contactImagerie.act_imagerie = act_imagerie;
			annuaireImagerie.push(contactImagerie);
			showListeImagerie();
		}
	}

	addImagerie.addEventListener('click', addDetailImagerie);

	function showListeImagerie() {
		var contenuImagerie = "";
		var tailleTableauImagerie = annuaireImagerie.length;

		for (var i = 0; i < tailleTableauImagerie; i++) {

			var tabImagerie = annuaireImagerie[i].act_imagerie.split("-/-");

			contenuImagerie += '<tr>';
			contenuImagerie += '<td><input type="hidden" name="act_imagerie[]" value="' + tabImagerie[0] + '"/><input type="hidden" name="uni_imagerie[]" value="' + tabImagerie[2] + '"/><input type="hidden" name="duree_imagerie[]" value="' + tabImagerie[3] + '"/>' + tabImagerie[1] + '</td>';
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
		annuaireExp.splice(index, 1);
		showListeExp();
	}

	function addDetailExp() {
		var act_exp = document.getElementById('act_exp').value;

		if (act_exp == '') {
			alert('Veuillez renseigner le champs.');
		} else {
			var contactExp = new Object();
			contactExp.act_exp = act_exp;
			annuaireExp.push(contactExp);
			showListeExp();
		}
	}

	addExp.addEventListener('click', addDetailExp);

	function showListeExp() {
		var contenuExp = "";
		var tailleTableauExp = annuaireExp.length;

		for (var i = 0; i < tailleTableauExp; i++) {

			var tabExp = annuaireExp[i].act_exp.split("-/-");

			contenuExp += '<tr>';
			contenuExp += '<td><input type="hidden" name="act_exp[]" value="' + tabExp[0] + '"/><input type="hidden" name="uni[]" value="' + tabExp[2] + '"/><input type="hidden" name="duree[]" value="' + tabExp[3] + '"/>' + tabExp[1] + '</td>';
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
		annuaireReeducation.splice(index, 1);
		showListeReeducation();
	}

	function addDetailReeducation() {
		var act_reeducation = document.getElementById('act_reeducation').value;
		var nombre = document.getElementById('nombre').value;

		if (act_reeducation == '' || nombre == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-reeducation")[0].innerHTML = '<span style="color:red">Veuillez renseigner tous les champs</span>';
		} else {
			var contactReeducation = new Object();
			contactReeducation.act_reeducation = act_reeducation;
			contactReeducation.nombre = nombre;
			annuaireReeducation.push(contactReeducation);
			showListeReeducation();
			document.getElementById('nombre').value = "";
		}
	}

	addReeducation.addEventListener('click', addDetailReeducation);

	function showListeReeducation() {
		var contenuReeducation = "";
		var tailleTableauReeducation = annuaireReeducation.length;

		for (var i = 0; i < tailleTableauReeducation; i++) {

			var tabReeducation = annuaireReeducation[i].act_reeducation.split("-/-");

			contenuReeducation += '<tr>';
			contenuReeducation += '<td><input type="hidden" name="act_reeducation[]" value="' + tabReeducation[0] + '"/><input type="hidden" name="uni_reeducation[]" value="' + tabReeducation[2] + '"/><input type="hidden" name="duree_reeducation[]" value="' + tabReeducation[3] + '"/>' + tabReeducation[1] + '</td>';
			contenuReeducation += '<td><input type="hidden" name="nombre[]" value="' + annuaireReeducation[i].nombre + '"/>' + annuaireReeducation[i].nombre + '</td>';
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
		annuaireMaladie.splice(index, 1);
		showListeMaladie();
	}

	function addDetailMaladie() {
		var act_maladie = document.getElementById('act_maladie').value;

		if (act_maladie == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-maladie")[0].innerHTML = '<span style="color:red">Veuillez sélectionner une maladie</span>';
		} else {
			document.getElementsByClassName("retour-maladie")[0].innerHTML = '';
			var contactMaladie = new Object();
			contactMaladie.act_maladie = act_maladie;
			annuaireMaladie.push(contactMaladie);
			showListeMaladie();
		}
	}

	addMaladie.addEventListener('click', addDetailMaladie);

	function showListeMaladie() {
		var contenuMaladie = "";
		var tailleTableauMaladie = annuaireMaladie.length;

		for (var i = 0; i < tailleTableauMaladie; i++) {

			var tabMaladie = annuaireMaladie[i].act_maladie.split("-/-");

			contenuMaladie += '<tr>';
			contenuMaladie += '<td><input type="hidden" name="nom[]" value="' + tabMaladie[0] + '"/>' + tabMaladie[1] + '</td>';
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
		annuaireLabo.splice(index, 1);
		showListeLabo();
	}

	function addDetailLabo() {
		var act_labo = document.getElementById('act_labo').value;

		if (act_labo == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-labo")[0].innerHTML = '<span style="color:red">Veuillez sélectionner un acte</span>';
		} else {
			document.getElementsByClassName("retour-labo")[0].innerHTML = '';
			var contactLabo = new Object();
			contactLabo.act_labo = act_labo;
			annuaireLabo.push(contactLabo);
			showListeLabo();
		}
	}

	addLabo.addEventListener('click', addDetailLabo);

	function showListeLabo() {
		var contenuLabo = "";
		var tailleTableauLabo = annuaireLabo.length;

		for (var i = 0; i < tailleTableauLabo; i++) {

			var tabLabo = annuaireLabo[i].act_labo.split("-/-");

			contenuLabo += '<tr>';
			contenuLabo += '<td><input type="hidden" name="act_labo[]" value="' + tabLabo[0] + '"/><input type="hidden" name="uni[]" value="' + tabLabo[2] + '"/><input type="hidden" name="duree[]" value="' + tabLabo[3] + '"/>' + tabLabo[1] + '</td>';
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
		annuaireLan.splice(index, 1);
		showListeLan();
	}

	function addDetailLan() {
		var lan = document.getElementById('lan').value;

		if (lan == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-lan")[0].innerHTML = '<span style="color:red">Veuillez sélectionner</span>';
		} else {
			document.getElementsByClassName("retour-lan")[0].innerHTML = '';
			var contactLan = new Object();
			contactLan.lan = lan;
			annuaireLan.push(contactLan);
			showListeLan();
		}
	}

	addLan.addEventListener('click', addDetailLan);

	function showListeLan() {
		var contenuLan = "";
		var tailleTableauLan = annuaireLan.length;

		for (var i = 0; i < tailleTableauLan; i++) {

			var tabLan = annuaireLan[i].lan.split("-/-");

			contenuLan += '<tr>';
			contenuLan += '<td><input type="hidden" name="lan[]" value="' + tabLan[0] + '"/>' + tabLan[1] + '</td>';
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
		annuaireLaf.splice(index, 1);
		showListeLaf();
	}

	function addDetailLaf() {
		var laf = document.getElementById('laf').value;

		if (laf == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-laf")[0].innerHTML = '<span style="color:red">Veuillez sélectionner</span>';
		} else {
			document.getElementsByClassName("retour-laf")[0].innerHTML = '';
			var contactLaf = new Object();
			contactLaf.laf = laf;
			annuaireLaf.push(contactLaf);
			showListeLaf();
		}
	}

	addLaf.addEventListener('click', addDetailLaf);

	function showListeLaf() {
		var contenuLaf = "";
		var tailleTableauLaf = annuaireLaf.length;

		for (var i = 0; i < tailleTableauLaf; i++) {

			var tabLaf = annuaireLaf[i].laf.split("-/-");

			contenuLaf += '<tr>';
			contenuLaf += '<td><input type="hidden" name="laf[]" value="' + tabLaf[0] + '"/>' + tabLaf[1] + '</td>';
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
		annuaireLia.splice(index, 1);
		showListeLia();
	}

	function addDetailLia() {
		var lia = document.getElementById('lia').value;

		if (lia == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-lia")[0].innerHTML = '<span style="color:red">Veuillez sélectionner</span>';
		} else {
			document.getElementsByClassName("retour-lia")[0].innerHTML = '';
			var contactLia = new Object();
			contactLia.lia = lia;
			annuaireLia.push(contactLia);
			showListeLia();
		}
	}

	addLia.addEventListener('click', addDetailLia);

	function showListeLia() {
		var contenuLia = "";
		var tailleTableauLia = annuaireLia.length;

		for (var i = 0; i < tailleTableauLia; i++) {

			var tabLia = annuaireLia[i].lia.split("-/-");

			contenuLia += '<tr>';
			contenuLia += '<td><input type="hidden" name="lia[]" value="' + tabLia[0] + '"/>' + tabLia[1] + '</td>';
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
		annuaireLap.splice(index, 1);
		showListeLap();
	}

	function addDetailLap() {
		var lap = document.getElementById('lap').value;

		if (lap == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-lap")[0].innerHTML = '<span style="color:red">Veuillez sélectionner</span>';
		} else {
			document.getElementsByClassName("retour-lap")[0].innerHTML = '';
			var contactLap = new Object();
			contactLap.lap = lap;
			annuaireLap.push(contactLap);
			showListeLap();
		}
	}

	addLap.addEventListener('click', addDetailLap);

	function showListeLap() {
		var contenuLap = "";
		var tailleTableauLap = annuaireLap.length;

		for (var i = 0; i < tailleTableauLap; i++) {

			var tabLap = annuaireLap[i].lap.split("-/-");

			contenuLap += '<tr>';
			contenuLap += '<td><input type="hidden" name="lap[]" value="' + tabLap[0] + '"/>' + tabLap[1] + '</td>';
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
		annuaireCardio.splice(index, 1);
		showListeCardio();
	}

	function addDetailCardio() {
		var act_cardio = document.getElementById('act_cardio').value;

		if (act_cardio == '') {
			// alert('Veuillez renseigner les tous les champs.');	
			document.getElementsByClassName("retour-cardio")[0].innerHTML = '<span style="color:red">Veuillez sélectionner l\'examen cardiologique</span>';
		} else {
			document.getElementsByClassName("retour-cardio")[0].innerHTML = '';
			var contactCardio = new Object();
			contactCardio.act_cardio = act_cardio;
			annuaireCardio.push(contactCardio);
			showListeCardio();
		}
	}

	addCardio.addEventListener('click', addDetailCardio);

	function showListeCardio() {
		var contenuCardio = "";
		var tailleTableauCardio = annuaireCardio.length;

		for (var i = 0; i < tailleTableauCardio; i++) {

			var tabCardio = annuaireCardio[i].act_cardio.split("-/-");

			contenuCardio += '<tr>';
			contenuCardio += '<td><input type="hidden" name="act_cardio[]" value="' + tabCardio[0] + '"/><input type="hidden" name="uni[]" value="' + tabCardio[2] + '"/><input type="hidden" name="duree[]" value="' + tabCardio[3] + '"/>' + tabCardio[1] + '</td>';
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
		annuaireAvis.splice(index, 1);
		showListeAvis();
	}

	function addDetailAvis() {
		var specialite = document.getElementById('specialite').value;
		var motifs = document.getElementById('motifs').value;

		if (specialite == '' || motifs == '') {
			alert('Veuillez renseigner les tous les champs.');
			// document.getElementsByClassName("retour-cardio")[0].innerHTML='<span style="color:red">Veuillez sélectionner l\'examen cardiologique</span>';
		} else {
			// document.getElementsByClassName("retour-cardio")[0].innerHTML='';
			var contactAvis = new Object();
			contactAvis.specialite = specialite;
			contactAvis.motifs = motifs;
			annuaireAvis.push(contactAvis);
			showListeAvis();
		}
	}

	addAvis.addEventListener('click', addDetailAvis);

	function showListeAvis() {
		var contenuAvis = "";
		var tailleTableauAvis = annuaireAvis.length;

		for (var i = 0; i < tailleTableauAvis; i++) {

			var tabAvis = annuaireAvis[i].specialite.split("-/-");

			contenuAvis += '<tr>';
			contenuAvis += '<td><input type="hidden" name="specialite[]" value="' + tabAvis[0] + '"/>' + tabAvis[1] + '</td>';
			contenuAvis += '<td><input type="hidden" name="motif[]" value="' + annuaireAvis[i].motifs + '"/>' + annuaireAvis[i].motifs + '</td>';
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
		annuaireRdv.splice(index, 1);
		showListeRdv();
	}

	function addDetailRdv() {
		var motifRdv = document.getElementById('motifRdv').value;
		var heureRdv = document.getElementById('heureRdv').value;
		var dateRdv = document.getElementById('dateRdv').value;

		if (motifRdv == '' || heureRdv == '' || dateRdv == '') {
			alert('Veuillez renseigner le champs.');
		} else {
			var contactRdv = new Object();
			contactRdv.motifRdv = motifRdv;
			contactRdv.heureRdv = heureRdv;
			contactRdv.dateRdv = dateRdv;
			annuaireRdv.push(contactRdv);
			showListeRdv();
		}
	}

	addRdv.addEventListener('click', addDetailRdv);

	function showListeRdv() {
		var contenuRdv = "";
		var tailleTableauRdv = annuaireRdv.length;

		for (var i = 0; i < tailleTableauRdv; i++) {


			contenuRdv += '<tr>';
			contenuRdv += '<td><input type="hidden" name="dateRdv[]" value="' + annuaireRdv[i].dateRdv + '"/>' + annuaireRdv[i].dateRdv + '</td>';
			contenuRdv += '<td><input type="hidden" name="heureRdv[]" value="' + annuaireRdv[i].heureRdv + '"/>' + annuaireRdv[i].heureRdv + '</td>';
			contenuRdv += '<td><input type="hidden" name="motifRdv[]" value="' + annuaireRdv[i].motifRdv + '"/>' + annuaireRdv[i].motifRdv + '</td>';
			contenuRdv += '<td class="text-center"><a href="javascript:();" onClick="removeRdv(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
			contenuRdv += '</tr>';
		}

		listeRdv.innerHTML = contenuRdv;
		// alert(contenu);
	}
</script>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>