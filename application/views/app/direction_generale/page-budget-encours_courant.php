
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $budget = $this->md_budget->recup_lib_sous_courant($id); ?>
<?php $recupsouscompte = $this->md_budget->recup_sous_compte_1($budget->scp_id); ?>
<?php $recupnumerocompte = $this->md_budget->recup_numero_compte($recupsouscompte->cpt_id); ?>
<?php $liste = $this->md_budget->liste_mouvement_budget_courant($id); ?>
<?php //$montant = $this->md_budget->budget_alloue_cournat($id); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
		<?php //var_dump($montant) ;?>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="">
							<thead>
								<tr>
									<th colspan="3"><b style="">Numéro de compte : <?php echo $recupnumerocompte->cpt_iNumero ;?> ->></b><b style="">Libellé du compte : <?php echo $recupsouscompte->scp_sLibelle ;?> ->> </b><b style="">Libellé du sous compte : <?php echo  $budget->slc_sLibelle ;?> </b></th>
									
								</tr>
							</thead>
							<tbody>
								<th colspan="3"><b style="">Montant alloué : <?php echo  number_format($budget->slc_iMontant,0,",",".") ;?> Fcfa</b></th>
							</tbody>
						</table>
                    </div>  
					
                    <div class="header">
						<button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-left" style="color:#fff">
							<i class="fa fa-plus"></i> 
							<b>Alloué un montant</b>
						</button>						
						<button style="" type="button" class="btn bg-blue-grey waves-effect retrait pull-left" style="color:#fff">
							<i class="fa fa-minus"></i> 
							<b>Effectuer une Opération</b>
						</button>																	
						<button style="" type="button" class="btn bg-red waves-effect  	 pull-right" style="color:#fff">
							<i class="fa fa-minus"></i> 
							<b>Fin opération</b>
						</button>											
                    </div>	
                </div>	
            </div>	
			<!--<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>États des mouvements</h2>
						
					</div>
					<div class="body">
						<form id="form-recherche">
							<div class="row clearfix">
								<div class="col-sm-4">
									<div class="form-group">
										Du<input type="text" name="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										Au<input type="text" name="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
	
								<div class="col-sm-2">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="chercher">Chercher</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		-->
			<div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des mouvements</h2>
                    </div>
                    <div class="body table-responsive" id="afficheRecherche"> 
						<table class="table table-bordered table-striped table-hover " id="example">
							<thead>
								<tr>
									<th>Date Opération</th>
									<th>Montant</th>
									<th>Motif</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($liste AS $l){?>
								<tr>
									<td><?php echo $this->md_config->affDateFrNum($l->opb_dDate) ;?></td>
									<td><?php echo number_format($l->opb_iMontant,0,",",".");?> Fcfa</td>
									<td><?php echo $l->opb_sMotif;?></td>
								</tr>																
							<?php }?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Large Size -->
<div class="modal fade" id="largeMod" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Effectuer une opération</h2>
						</div>
						<div class="body table-responsive">
							<div class="col-lg-12 col-md-12 col-sm-12 retour-operation"></div>
							<form id="form-operation">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Montant de l'opération *</th>
										</tr>
										<tr>
											<td>
												<input type="number" min="0" name="montant" class="obligatoire montant" style="width:100%"  placeholder=""/>
												<input type="hidden" name="id" value="<?php echo  $budget->slc_id ;?>"/>
												<input type="hidden" name="scpId" value="<?php echo $recupsouscompte->scp_id ;?>"/>
											</td>											
										</tr>										
										<tr>
											<td colspan="2">
												<label style="color:#000"><b>Motif de l'opération *</b></label>
												<textarea style="width:100%" rows="4" name="motif" class="motif obligatoire"></textarea>
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
                <a href="javascript:();" class="btn btn-success waves-effect addOperation" style="color:#fff"><i class="fa fa-check"></i> Valider</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


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
							<h2>Alloué un montant</h2>
						</div>
						<div class="body table-responsive">
							<div class="col-lg-12 col-md-12 col-sm-12 retour-alloue"></div>
							<form id="form-alloue">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Montant à allouer *</th>
										</tr>
										<tr>
											<td>
												<input type="number" min="0" name="montant" class="obligatoire montant" style="width:100%"  placeholder=""/>
												<input type="hidden" name="id" value="<?php echo  $budget->slc_id ;?>"/>
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
                <a href="javascript:();" class="btn btn-success waves-effect alloue" style="color:#fff"><i class="fa fa-check"></i> Valider</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>