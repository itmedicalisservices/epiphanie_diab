
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_parametre->liste_compte_fonctionnement_actifs(); ?>
<?php $li = $this->md_parametre->liste_sous_compte_fonct_actifs(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left"><b>Charges de fonctionnement</b>/ Liste des libellés sous de comptes (<?php echo count($li) ;?>)</h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Nouveau</b></button>
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
							<thead>
								<tr>
									<th>N° de compte</th>
									<th>Libellé des comptes</th>
									<th>Libellé des sous comptes</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php foreach($li AS $list){ ?>
								<tr>
									<td>
										<strong><?php echo $list->cpt_iNumero; ?></strong>
									</td>								
									<td>
										<strong><?php echo $list->fcp_sLibelle; ?></strong>
									</td>
									<td>
										<?php echo $list->sfc_sLibelle; ?>
									</td>									
									<td class="text-center">
										<a href="#<?php echo site_url("parametre/modifier_compte/".$list->sfc_id); ?>" class="" title="Modifier"><i class="zmdi zmdi-edit"></i></a>
										<a onClick="return confirm('Êtes-vous sûr de supprimer ce sous libellé de compte ?')" href="<?php echo site_url("parametre/supprimer_compte_sous_fonct/".$list->sfc_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
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
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Créer les libellés des comptes </h2>
						</div>
						<div class="body table-responsive">
							<div class="col-lg-12 col-md-12 col-sm-12 retour-fonct"></div>
							<form id="form-fonct">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Libellé des comptes *</th>
											<th style="width:48%">Libellé des sous comptes *</th>
										</tr>
										<tr>
											<td>
												<select name="cpt" style="height:30px;width:100%" class="obligatoire">
													<option value="">--- sélectionner *---</option>
													<?php foreach($liste AS $l){?>
													<option value="<?=$l->fcp_id;?>"><?=$l->fcp_sLibelle;?></option>
													<?php }?>
												</select>
											</td>											
											<td>
												<input type="text" name="lib" class="obligatoire" style="width:100%"  placeholder=""/>
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
                <a href="javascript:();" class="btn btn-success waves-effect addSousFoncCpt" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
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
            <div class="modal-body text-center"> Entreprise enregistée avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>