
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_patient->liste_materiel(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des équipements paramétrés</h2><button type="button" class="btn bg-blue-grey waves-effect ajout_service pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b> nouveau</b></button>
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover">
						   
							<thead>
								<tr>
									<th style="">Designation </th>
									<th style="">Catégorie </th>
									<th style="">Qualité </th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<th class="text-success"><?=$l->mat_sLib;?></th>
									<td><?=$l->mat_sType;?></td>
									<td><?php if($l->mat_sQualite == "En panne"): ?><span class="text-danger">En panne</span><?php else: echo $l->mat_sQualite; endif;?>
									<td class="text-center">
										<a href="<?php echo site_url("compteur/modifier_equipement/".$l->mat_id); ?>" class="delete" title="modifier"><i class="fa fa-edit text-success" style="font-size:20px"></i></a>&nbsp;&nbsp;
										<a onClick="return confirm('Êtes-vous sûr de supprimer cet equipement ?')" href="<?php echo site_url("compteur/supprimer_equipement/".$l->mat_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>&nbsp;&nbsp;
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


<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px;max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Ajoutez un nouveau equipement</h2>
							
						</div>
						<div class="body table-responsive">
							<form id="form-equipement">
							<div class="col-lg-12 col-md-12 col-sm-12 retour"></div>
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="">Designation *</th>
											<th style="">Catégorie *</th>
											<th style="">Qualité *</th>
										</tr>
										<tr>
											<td>
												<input type="text" name="lib" class="obligatoire" placeholder=""/>
											</td>
											<td>	
												<select name="cat" id="cat" class="form-control obligatoire"   style="">
													<option value="">-- Catégorie * --</option>
													<option value="Matériel Lourd">Matériel Lourd</option>
													<option value="Matériel médico-technique">Matériel médico-technique</option>
													<option value="Matériel roulan">Matériel roulan</option>
													<option value="Mobilier">Mobilier</option>
												</select>
											</td>
											<td>	
												<select name="qlt" id="qlt" class="form-control obligatoire"   style="">
													<option value="">-- Qualite * --</option>
													<option value="Bon">Bon</option>
													<option value="En panne">En panne</option>
													<option value="Hors d'usage">Hors d'usage</option>
												</select>
											</td>	
										</tr>
									</thead>
								 </table>	
							</form>
						</div>
					</div>
				</div>
			</div>
            <div class="modal-footer">
                <a href="javascript:();" class="btn btn-success waves-effect addMateriel" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finish" id="finish">BLUE GREY</button>
<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE DES RESSOURCES HUMAINES</h4>
            </div>
            <div class="modal-body text-center"> Opération effectuée avec succès <br><img src="<?php echo base_url("assets/images/icons8-attendance-50.png");?>"/></div>
            <div id="refresh"></div>
        </div>
    </div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>