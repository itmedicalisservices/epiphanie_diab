<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $per = $this->md_personnel->editer_personnel($id); ?>
<?php $specialite = $this->md_parametre->liste_specialites_poste_actifs($per->pst_id); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Ajouter un personnel</h2>
            <small class="text-muted">MÉDICALIS, votre application de gestion hospitalière</small>
        </div>
		
		<!-- Tabs With Custom Animations -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2> Direction des ressources humaines</h2>
					</div>
					<div class="body">
						<div class="row clearfix">
							<div class="col-sm-12 col-md-12 col-lg-12"> 
								<!-- Nav tabs -->
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">		
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="card">
													<div class="header">
														<h2>Informations personnelles <small>renseignez tous les champs marqués par des (*)<?php //var_dump($per) ;?></small> </h2>
													</div>
													<div class="body">
														<form id="info-per">
															<div class="row clearfix">
																<div class="col-sm-12 retour1"></div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Nom *</label>
																		<div class="form-line">
																			<input type="text" name="nom" class="form-control obligatoire" placeholder="" value="<?php echo $per->per_sNom;?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Autres Noms</label>
																		<div class="form-line">
																			<input type="text" name="autres_noms" class="form-control" placeholder="" value="<?=$per->per_sAutresNoms;?>">
																		</div>
																	</div>
																</div>
															</div>
															<div class="row clearfix">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Prénom</label>
																		<div class="form-line">
																			<input type="text" name="prenom" class="form-control" placeholder="" value="<?=$per->per_sPrenom;?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Autres Prénoms</label>
																		<div class="form-line">
																			<input type="text" name="autres_prenoms" class="form-control" placeholder="" value="<?=$per->per_sAutresPrenoms;?>">
																		</div>
																	</div>
																</div>
															</div>
															<div class="row clearfix">
																<div class="col-sm-3">
																	<div class="form-group">
																		<label>Date de naissance *</label>
																		<div class="form-line">
																			<input type="date" name="date_naiss" class=" form-control obligatoire" placeholder="" value="<?=$per->per_dDateNaiss;?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-3">
																	<div class="form-group drop-custum">
																		<label>Genre *</label>
																		<select name="genre" class="form-control obligatoire show-tick">
																			<option value="H" <?php if($per->per_sSexe=="H"){echo 'selected="selected"';};?>>Homme</option>
																			<option value="F" <?php if($per->per_sSexe=="F"){echo 'selected="selected"';};?>>Femme</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-3">
																	<div class="form-group drop-custum">
																		<label>Situation Matrimoniale *</label>
																		<select name="situation" class="form-control obligatoire show-tick">
																			<option value="Célibataire" <?php if($per->per_sSituation=="Célibataire"){echo 'selected="selected"';};?>>Célibataire</option>
																			<option value="Marié(e)" <?php if($per->per_sSituation=="Marié(e)"){echo 'selected="selected"';};?>>Marié(e)</option>
																			<option value="Divorcé(e)" <?php if($per->per_sSituation=="Divorcé(e)"){echo 'selected="selected"';};?>>Divorcé(e)</option>
																			<option value="Veuf(ve)" <?php if($per->per_sSituation=="Veuf(ve)"){echo 'selected="selected"';};?>>Veuf(ve)</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-3">
																	<div class="form-group">
																		<label>Nombre d'enfant *</label>
																		<div class="form-line">
																			<input type="number" name="nb_enfant" class="form-control obligatoire" placeholder="" value="<?=$per->per_iNombreEnf;?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group drop-custum">
																		<label>Pathologie chronique ou héréditaire</label>
																		<select name="pathologie" class="form-control pathologie obligatoire show-tick">
																			<option value="Non" <?php if($per->per_sPathologie=="Non"){echo 'selected="selected"';} ;?>>Non</option>
																			<option value="Oui" <?php if($per->per_sPathologie=="Oui"){echo 'selected="selected"';} ;?>>Oui</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-6 group-cacher cacher">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="text" name="maladie" class="form-control maladie" placeholder="Nom de la maladie *">
																		</div>
																	</div>
																</div>
																
																<div class="col-sm-12">
																	<div class="form-group">
																		<div class="form-group">
																			<label>Adresse *</label>
																			<div class="form-line">
																				<textarea rows="4" name="adresse" class="form-control obligatoire no-resize" ><?php echo $per->per_sAdresse ;?></textarea>
																			</div>
																		</div>
																	</div>
																</div>
																
															<div class="row clearfix">
																<div class="col-sm-12 retour2"></div>
																<div class="col-sm-6">
																	<div class="form-group drop-custum">
																		<label>Domaine professionnel hospitalier *</label>
																		<select name="poste" class="form-control obligatoire posteDomaine show-tick">
																			<option value="">-- Domaine professionnel hospitalier * --</option>
																			<?php $poste = $this->md_parametre->liste_postes_actifs(); foreach($poste AS $p){ ?>
																			<option value="<?php echo $p->pst_id; ?>" <?php if($p->pst_id==$per->pst_id){echo 'selected="selected"';} ;?>><?php echo $p->pst_sLibelle; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group drop-custum">
																		<label>Spécialité *</label>
																		<select name="specialite" class="form-control specialitePoste obligatoire show-tick">
																		<?php foreach($specialite AS $s){?>
																			<option value="<?php echo $s->spt_id ;?>"><?php echo $s->spt_sLibelle ;?></option>
																		<?php ;}?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="row clearfix">
																<div class="col-sm-12">
																	<div class="form-group drop-custum">
																		<label>Direction de travail *</label>
																		<select name="departement" class="form-control obligatoire show-tick">
																			<option value="">-- Direction de travail * --</option>
																			<?php $depart = $this->md_parametre->liste_departements_actifs(); foreach($depart AS $d){ ?>
																			<option value="<?php echo $d->dep_id; ?>" <?php if($d->dep_id==$per->dep_id){echo 'selected="selected"';} ;?>><?php echo $d->dep_sLibelle; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="row clearfix">
																<div class="col-sm-6">
																	<div class="form-group drop-custum">
																		<label>Titre de l'employé *</label>
																		<select name="titre" class="form-control obligatoire show-tick">
																			<option value="pdt" <?php if($per->per_sTitre==NULL){echo 'selected="selected"';};?> >Pas de titre</option>
																			<option value="DR." <?php if($per->per_sTitre=="DR."){echo 'selected="selected"';};?>>Docteur</option>
																			<option value="PR." <?php if($per->per_sTitre=="PR."){echo 'selected="selected"';};?>>Professeur</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Date de recrutement</label>
																		<div class="form-line">
																			<input type="date" name="date_recru" class=" form-control obligatoire" placeholder="Date de recrutement *" value="<?php echo $per->per_dDateRecrut ;?>">
																			<input type="hidden" name="id" value="<?php echo $per->per_id ;?>">
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-sm-12">
																<button type="button" class="btn btn-raised bg-blue-grey" id="modifPersonnel">Modifier</button>
															</div>
														</form>
														<div class="col-md-12">
														<hr>
														</div>
														<div class="col-md-12">
														<div class="card">
															<div class="header">
																<!--
																<h2>Information de compte <small>Renseignez tous les champs marqués par des (*)</small> </h2>
																-->
															</div>
															<div class="body">
																<!--<form id="info-compte-modif">
																	<div class="row clearfix">
																		<div class="col-sm-12 retour3"></div>
																		<div class="col-sm-6">
																			<div class="form-group">
																				<div class="form-line">
																					<input type="password" name="pass" class="form-control pass" placeholder="Mot de passe">
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-6">
																			<div class="form-group">
																				<div class="form-line">
																					<input type="password" name="cpass" class="form-control cpass" placeholder="Confirmer le mot de passe">
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<button type="submit" class="btn btn-raised bg-blue-grey" id="terminer">Modifier</button>
																		</div>
																	</div>
																</form>-->
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
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Tabs With Custom Animations -->
<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finish" id="finish">BLUE GREY</button>
    </div>
</section>


<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE DES RESSOURCES HUMAINES</h4>
            </div>
            <div class="modal-body text-center"> Employé ajouté avec succès <br><img src="<?php echo base_url("assets/images/icons8-attendance-50.png");?>"/></div>
            <div id="refresh"></div>
        </div>
    </div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>