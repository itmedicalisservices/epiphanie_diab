
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $fonc = $this->md_fonctionnement->recup_compte_fonct_courant($id); ?>
<?php $liste = $this->md_fonctionnement->liste_mouvement_depenses($id); ?>
<?php $montant = $this->md_fonctionnement->montant_fonctionnement($id); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			<?php //var_dump($fonc);?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="">
							<thead>
								<tr>
									<th><b><?php echo $fonc->fcp_sLibelle ;?></b></th>
									<th><b>CUMUL</b><br><b style="font-size:30px"><?php echo number_format($montant->montant,0,",",".");?> Fcfa</b></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
                    </div>  
					
                    <div class="header">
						<button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-left" style="color:#fff">
							<i class="fa fa-plus"></i> 
							<b>Nouvelle dépense</b>
						</button>																
                    </div>	
                </div>	
            </div>	
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>ÉTATS DES DÉPENSES</h2>
						
					</div>
					<div class="body">
						<form id="form-recherche-dep">
							<div class="row clearfix">
								<div class="col-sm-3">
									<div class="form-group">
										Du<input type="text" name="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										Au<input type="text" name="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<input type="hidden" name="id" value="<?php echo $fonc->fcp_id;?>" class="">
	
								<div class="col-sm-3">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="chercherDepenses">Chercher</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des cinq (5) dernières dépenses</h2>
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
									<td><?php echo $this->md_config->affDateFrNum($l->mde_dDate) ;?></td>
									<td><?php echo number_format($l->mde_iMontant,0,",",".");?> Fcfa</td>
									<td><?php echo nl2br($l->mde_sMotif) ;?></td>
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
							<h2>Nouvelle dépense</h2>
						</div>
						<div class="body table-responsive">
							<div class="col-lg-12 col-md-12 col-sm-12 retour-depenses"></div>
							<form id="form-depenses">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Montant Dépensé *</th>
										</tr>
										<tr>
											<td>
												<input type="number" min="0" name="montant" class="obligatoire montant" style="width:100%"  placeholder=""/>
												<input type="hidden" name="id" value="<?php echo $fonc->fcp_id ;?>"/>
											</td>											
										</tr>										
										<tr>
											<td colspan="2">
												<label style="color:#000"><b>Motif de dépense</b></label>
												<textarea style="width:100%" rows="4" name="motif" class="obligatoire motif"></textarea>
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
                <a href="javascript:();" class="btn btn-success waves-effect addDepenses" style="color:#fff"><i class="fa fa-check"></i> Valider</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>