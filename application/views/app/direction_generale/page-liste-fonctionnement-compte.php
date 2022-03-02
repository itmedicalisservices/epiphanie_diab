
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_fonctionnement->liste_compte_fonctionnement(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        </div>
        <div class="row clearfix">
		
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>ÉTATS D'INVESTISSEMENTS</h2>
					</div>
					<div class="body">
						<form id="form-bud-fonct">
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
								<input type="hidden" name="id" value="<?php //echo $fonc->fcp_id;?>" class="">
	
								<div class="col-sm-3">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="budFonc">Chercher</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Charges de FONCTIONNEMENT</h2>
                    </div>
                    <div class="body table-responsive" id="afficheBudFonc"> 
						<table class="table table-bordered table-striped table-hover " id="exemple">
							<thead>
								<tr>
									<th>N° DE COMPTE</th>
									<th>LIBELLES DE COMPTES</th>
								</tr>
							</thead>
							<tbody>
							<?php $somGle=0; foreach($liste AS $l){ ?>
								<tr>
									<td>
										<strong><?=$l->cpt_iNumero;?></strong>
									</td>
									<td>
										<strong><?php 
													$rep = $this->md_fonctionnement->recup_sous_compte($l->cpt_id); echo $rep->fcp_sLibelle;
												?>
										</strong>
										<?php $re = $this->md_fonctionnement->recup_lib_sous_compte($rep->fcp_id); ?>
										<table style="width:100%" class=" " id="">
											<thead>
												<tr>
													<th style="color:#4f7ca0;text-decoration:underline">Libellés de sous comptes</th>
													<th style="color:#4f7ca0;text-decoration:underline">Cumul</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
										<?php if($re==NULL){echo'<tr><td colspan="2"><em>Aucun sous libellé renseigné</em></td></tr>';}else{$som=0; foreach($re AS $r){?>
											<tr>
												<td><?=$r->sfc_sLibelle;?></td>
												<td><?php $montant = $this->md_fonctionnement->budget_fonct_courant($r->sfc_id);$som=$som + $montant->somme; echo number_format($montant->somme,0,",","."); ?> Fcfa</td>
												<td class="text-center">
													<a href="<?php echo site_url("fonctionnement/lib_sous_fonct_courant/".$r->sfc_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Opération</a>
												</td>
											</tr>
										<?php }?>
											<tr>
												<td><strong>Total (<?=$rep->fcp_sLibelle;?>)</strong></td>
												<td><strong><?php echo number_format($som,0,",",".");$somGle=$somGle+$som ?> Fcfa </strong></td>
											</tr>
										<?php }?>
										</tbody>
										</table>
									</td>									
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan=""><strong>TOTAL GLOBAL</strong></td>
									<td align="center" colspan=""><strong><?php echo number_format($somGle,0,",","."); ?>  Fcfa </strong></td>
								</tr>
							</tfoot>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>