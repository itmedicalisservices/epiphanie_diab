
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeSer = $this->md_parametre->liste_services_actifs(); ?>
<?php $listeUni = $this->md_parametre->liste_unites_actifs(); ?>
<?php $liste = $this->md_parametre->liste_frais_divers_actifs(); ?>
<?php $listetya = $this->md_parametre->liste_typeacte_actifs(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des actes/frais divers (<?php echo count($liste) ;?>)</h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_unite pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Ajouter </b></button>
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
						   
							<thead>
								<tr>
									<th>Désignation</th>
									<th>Frais concerne les patients ?</th>
									<th>Libellé quotes-parts</th>
									<th>Unité</th>
									<!--<th>Service</th>-->
									<th style="width:60px">Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr align="center">									
									<td>
										<span class="champs_lac2<?php echo $l->lac_id ?>"><?php echo $l->lac_sLibelle; ?></span>
										<form id='form-edit-lac2<?php echo $l->lac_id ?>'>
											<textarea class="cacher input_lac2<?php echo $l->lac_id ?>" style='width:100%' name='lib'><?php echo $l->lac_sLibelle; ?></textarea>
											<input type="hidden" value="<?php echo $l->lac_id ?>" name="id"/>
											<input type="hidden" value="<?php echo $l->lac_sLibelle ?>" name="nom"/>
										</form>
									</td>
									
									<td>
										<span class="champs_duree<?php echo $l->lac_id ?>"><?php echo $l->lac_sSta; ?> </span>
										<form id='form-edit-duree<?php echo $l->lac_id ?>'>
											<select class="cacher input_duree<?php echo $l->lac_id ?>" name="duree" style="width:100%;padding-bottom:10px;padding-top:10px" rel="">
												<option value="OUI" <?php if($l->lac_sSta=='OUI'){echo "selected='selected'";} ?>>OUI</option>
												<option value="NON" <?php if($l->lac_sSta=='NON'){echo "selected='selected'";} ?>>NON</option>
											</select>
										</form>
									</td>
									<td>
										<span class="champs_tya2<?php echo $l->lac_id ?>"><?php if(is_null($l->tya_id)){echo 'N/A';}else{ echo $l->tya_sLib;}; ?></span>
										<form id='form-edit_tya2<?php echo $l->lac_id ?>'>
											<select class="cacher input_tya2<?php echo $l->lac_id ?>" name="tya" style="width:100%;padding-bottom:10px;padding-top:10px">
													<option value="NON-/-N/A"> N/A </option>
												<?php if(is_null($l->tya_id)){?>
													<?php $lste = $this->md_parametre->liste_typeacte_actifs($l->tya_id); foreach($lste AS $lt){ ?>
													<option value="<?php echo $lt->tya_id; ?>-/-<?php echo $lt->tya_sLib; ?>"><?php echo $lt->tya_sLib; ?></option>
													<?php } ?>												
												<?php }else{ ?>												
													<?php $lste = $this->md_parametre->liste_typeacte_actifs($l->tya_id); foreach($lste AS $lt){ ?>
													<option value="<?php echo $lt->tya_id; ?>-/-<?php echo $lt->tya_sLib; ?>" <?php if($lt->tya_id == $l->tya_id){echo "selected='selected'";} ?>><?php echo $lt->tya_sLib; ?></option>
													<?php } ?>
												<?php } ?>
											</select>
										</form>
									</td>
									<td>
										<span class="champs_uni2<?php echo $l->lac_id ?>"><?php echo $l->uni_sLibelle; ?></span>
										<form id='form-edit_uni2<?php echo $l->lac_id ?>'>
											<select class="cacher input_uni2<?php echo $l->lac_id ?>" name="uni" style="width:100%;padding-bottom:10px;padding-top:10px">
												<?php $lst = $this->md_parametre->liste_unite_services_actifs($l->ser_id); foreach($lst AS $ls){ ?>
												<option value="<?php echo $ls->uni_id; ?>-/-<?php echo $ls->uni_sLibelle; ?>" <?php if($ls->uni_id == $l->uni_id){echo "selected='selected'";} ?>><?php echo $ls->uni_sLibelle; ?></option>
												<?php } ?>
											</select>
										</form>
									</td>
									<td class="text-center">
										<a href="javascript:();" rel="<?php echo $l->lac_id; ?>" class="editActeFinal2 confirm_lac2<?php echo $l->lac_id; ?> cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
										<a href="javascript:();" rel="<?php echo $l->lac_id; ?>" class="editActeAnnule2 annule_lac2<?php echo $l->lac_id; ?> text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
										<a href="javascript:();" rel="<?php echo $l->lac_id; ?>" class="editActe2 clique_lac2<?php echo $l->lac_id; ?>" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;
										<a onClick="return confirm('Êtes-vous sûr de supprimer cet acte ?')" href="<?php echo site_url("parametre/supprimer_acte_divers/".$l->lac_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
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
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Ajoutez des nouveaux actes/frais divers</h2>
							
						</div>
						<div class="body table-responsive">
							<form id="form-fraisdivers">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="">* Désignation</th>
											<th style="">* Libellé quotes-parts</th>
											<th style="">* Unité</th>
											<th style=""  class="text-center">Frais concerne patients ?</th>
										</tr>
										<tr>
											<td>
												<input class="obligatoire" type="text" name="lib" id="lib" style="width:100%" placeholder="Acte/Frais"/>
											</td>
											
											<td>
												<select class="obligatoire" name="tya" id="" style="padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez le libellé * -----</option>
													<option value="NON"> N/A </option>
													<?php foreach($listetya AS $t){ ?>
													<option value="<?php echo $t->tya_id; ?>"><?php echo $t->tya_sLib; ?></option>
													<?php } ?>
												</select>
											</td>
											
											<td>
												<select class="obligatoire" name="uni" id="" style="padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez l'unité * -----</option>
													<?php foreach($listeUni AS $u){ ?>
													<option value="<?php echo $u->uni_id; ?>"><?php echo $u->uni_sLibelle; ?></option>
													<?php } ?>
												</select>
											</td>

											
											<td class="text-center">
												<select name="check" id="" class="obligatoire" style="padding-bottom:5px;padding-top:5px">
													<option value="">----- Définir * -----</option>
													<option value="OUI">OUI</option>
													<option value="NON">NON</option>
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
                <a href="javascript:();" class="btn btn-success waves-effect addFrais" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>