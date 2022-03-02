<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$f = $this->md_patient->recup_equipement($mat_id);
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Modifier un produit</h2>
            <small class="text-muted">MÉDICALIS, votre application de gestion hospitalière</small>
        </div>
		
		<!-- Tabs With Custom Animations -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<a href="<?php echo site_url("compteur/liste_equipement");?>" style="margin-left:15px">Retour</a>
					<div class="header">
						<h2> pharmacie </h2>
					</div>
					<div class="body">
						<div class="row clearfix">
							<div class="col-sm-12 col-md-12 col-lg-12"> 
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">		
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="card">
													<div class="header">
														<h2><!--Informations du fournisseur--> <small>renseignez tous les champs marqués par des (*)</small> </h2>
													</div>
													<div class="body">
														<form id="form-edit-equipement">
															<div class="row clearfix">
																<div class="col-sm-12 retour"></div>
																<div class="col-sm-4">
																	<div class="form-group">
																		<label>Désignation *</label>
																		<div class="form-line">
																			<input type="text" name="lib" value="<?php echo $f->mat_sLib; ?>" class="form-control deja obligatoire" >
																			<input style="display:none" type="text" name="id" value="<?php echo $f->mat_id; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-4">
																	<div class="form-group drop-custum">
																		<label>Catégorie *</label>
																		<select name="cat" id="cat" class="form-control deja obligatoire">
																			<option value="Matériel Lourd" <?php if($f->mat_sType==="Matériel Lourd"){echo 'selected="selected"';} ?>>Matériel Lourd</option>
																			<option value="Matériel médico-technique" <?php if($f->mat_sType==="Matériel médico-technique"){echo 'selected="selected"';} ?>>Matériel médico-technique</option>
																			<option value="Matériel roulan" <?php if($f->mat_sType==="Matériel roulan"){echo 'selected="selected"';} ?>>Matériel roulan</option>
																			<option value="Mobilier" <?php if($f->mat_sType==="Mobilier"){echo 'selected="selected"';} ?>>Mobilier</option>
																		</select>
																	</div>
																</div>

																<div class="col-sm-4">
																	<div class="form-group drop-custum">
																		<label>Qualité *</label>
																		<select name="qlt" id="qlt" class="form-control deja obligatoire">
																			<option value="Bon" <?php if($f->mat_sQualite==="Bon"){echo 'selected="selected"';} ?>>Bon</option>
																			<option value="En panne" <?php if($f->mat_sQualite==="En panne"){echo 'selected="selected"';} ?>>En panne</option>
																			<option value="Hors d'usage" <?php if($f->mat_sQualite==="Hors d'usage"){echo 'selected="selected"';} ?>>Hors d'usage</option>
																		</select>
																	</div>
																</div>	
															</div>														
															<div class="row clearfix">		
																<div class="col-sm-3">
																	<button type="button" class="btn btn-raised bg-blue-grey" id="editEquipement">Modifier</button>
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