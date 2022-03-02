<?php include(dirname(__FILE__) . '/../includes/header.php'); $patient = $this->md_patient->recup_patient($id);?>
<?php $liste = $this->md_parametre->liste_entreprise_convention_actifs(); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Page modification patient</h2>
            <small class="text-muted">MÉDICALIS, votre application de gestion hospitalière</small>
        </div>
		
		<!-- Tabs With Custom Animations -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2> </h2>
					</div>
					<div class="body">
						<div class="row clearfix">
							<div class="col-sm-3 col-md-3 col-lg-3"> 
								<img src="<?php echo base_url($patient->pat_sAvatar); ?>" width="100%" />
							</div>
							<div class="col-sm-9 col-md-9 col-lg-9"> 
							
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">		
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="card">
													<div class="header">
														<h2>Informations du patient <small>renseignez tous les champs marqués par des (*)</small> </h2>
														
													</div>
													<div class="body">
														<form id="form-edit-pat">
															<div class="row clearfix">
																<div class="col-sm-12 retour-edit-pat"></div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<div class="form-line">
																			<label>Nom *</label>
																			<input type="text" name="nom" class="form-control obligatoire" value="<?php echo $patient->pat_sNom; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<div class="form-line">
																			<label>Prénom</label>
																			<input type="text" name="prenom" class="form-control" value="<?php echo $patient->pat_sPrenom; ?>">
																		</div>
																	</div>
																</div>
															</div>
															<div class="row clearfix">
																<div class="col-sm-4">
																	<div class="form-group drop-custum">
																		<label>Gentre *</label>
																		<select name="genre" class="form-control obligatoire show-tick">
																			<option value="H" <?php if($patient->pat_sSexe=="H"){echo "selected='selected'";} ?>>Homme</option>
																			<option value="F" <?php if($patient->pat_sSexe=="F"){echo "selected='selected'";} ?>>Femme</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group drop-custum">
																		<label>Situation familiale *</label>
																		<select name="situation" class="form-control obligatoire show-tick">
																			<option value="Célibataire" <?php if($patient->pat_sSituationMat=="Célibataire"){echo "selected='selected'";} ?>>Célibataire</option>
																			<option value="Marié(e)" <?php if($patient->pat_sSituationMat=="Marié(e)"){echo "selected='selected'";} ?>>Marié(e)</option>
																			<option value="Divorcé(e)" <?php if($patient->pat_sSituationMat=="Divorcé(e)"){echo "selected='selected'";} ?>>Divorcé(e)</option>
																			<option value="Veuf(ve)" <?php if($patient->pat_sSituationMat=="Veuf(ve)"){echo "selected='selected'";} ?>>Veuf(ve)</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group">
																		<div class="form-line">
																			<label>Date naissance *</label>
																			<input type="date" name="date_naiss" value="<?php echo $patient->pat_dDateNaiss; ?>" class=" form-control obligatoire" placeholder="Date de naissance *">
																		</div>
																	</div>
																</div>
															</div>
															<div class="row clearfix">
																<div class="col-sm-4">
																	<div class="form-group">
																		<div class="form-line">
																			<label>Numéro de téléphone</label>
																			<input type="text" name="tel" class="form-control tel" value="<?php echo $patient->pat_sTel; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group">
																		<div class="form-line">
																			<label>Profession </label>
																			<input type="text" name="profession" class="form-control " value="<?php echo $patient->pat_sProfession; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group">
																		<div class="form-group">
																			<div class="form-line">
																				<label>Nationalité</label>
																				<input type="text" name="natio" class="form-control " value="<?php echo $patient->pat_sNatio; ?>">
																			</div>
																		</div>
																	</div>
																</div>	
																
																<div class="col-sm-9">
																	<div class="form-group">
																		<div class="form-group">
																			<div class="form-line">
																				<label>Adresse</label>
																				<input type="text" name="adresse" class="form-control " value="<?php echo $patient->pat_sAdresse; ?>">
																			</div>
																		</div>
																	</div>
																</div>			
																
																<div class="col-sm-3">
																	<div class="form-group">
																		<div class="form-line">
																			<label>Téléphone (Parent)</label>
																			<input type="text" name="otherPhone" class="form-control otherPhone" value="<?php echo $patient->pat_sOtherPhone; ?>">
																		</div>
																	</div>
																</div>																
																<div class="col-sm-8">

																</div>
																<div class="col-sm-6 cacher">
																	<div class="form-group">
																		<div class="form-group">
																			<div class="form-line">
																				<textarea rows="4" name="activite" class="form-control" placeholder="<?php if(is_null($patient->pat_sAct)){echo 'Activité professionnelle';}; ?>" ><?php if(is_null($patient->pat_sAct)){echo '';}else{ echo $patient->pat_sAct;}; ?></textarea>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-4">
																	<label>Photo</label>
																	<div class="fallback">
																		<input name="photo" type="file" class="form-control photo" />
																		<input name="id" type="hidden" value="<?php echo $patient->pat_id; ?>" />
																		<input name="photo2" type="hidden" value="<?php echo $patient->pat_sAvatar; ?>" />
																	</div>
																</div>
	
																<div class="col-sm-12">
																	<button type="submit" class="btn btn-raised bg-blue-grey" id="ModifierPatient">Enregistrer</button>
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
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Tabs With Custom Animations -->
    </div>
</section>

<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finish" id="finish">BLUE GREY</button>
<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE ACCUEIL</h4>
            </div>
            <div class="modal-body text-center"> Donnée(s) modifiée(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>