<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $per = $this->md_personnel->editer_personnel($id); ?>
<?php $specialite = $this->md_parametre->liste_specialites_poste_actifs($per->pst_id); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Attribuer un nouveau mot de passe</h2>
            <small class="text-muted">MÉDICALIS, votre application de gestion hospitalière</small>
        </div>
		
		<!-- Tabs With Custom Animations -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2> Administration</h2>
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
														<h2>Attribuer un nouveau mot de passe <small>renseignez tous les champs marqués par des (*)</small> </h2>
													</div>
													<div class="body">
														<form id="form-">
															<div class="row clearfix">
																<div class="col-sm-12 retourpass"></div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Nom </label>
																		<div class="form-line">
																			<input type="text" name="" class="form-control obligatoire" placeholder="" value="<?php echo $per->per_sNom;?>" readonly>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Prénom</label>
																		<div class="form-line">
																			<input type="text" name="" class="form-control" placeholder="" value="<?=$per->per_sPrenom;?>" readonly>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row clearfix">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Nouveau mot de passe *</label>
																		<div class="form-line">
																			<input type="password" name="npass" class="form-control obligatoire npass" placeholder="" value="">
																			<input type="hidden" name="id" value="<?php echo $per->per_id ;?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>Confirmer nouveau mot de passe *</label>
																		<div class="form-line">
																			<input type="password" name="cpass" class="form-control obligatoire cpass" placeholder="" value="">
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-sm-12">
																<button type="button" class="btn btn-raised bg-blue-grey" id="">Modifier</button>
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