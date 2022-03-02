
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_budget->liste_compte_investissements(); ?>
<?php //$montant = $this->md_budget->montant_lib_sous_compte(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
		
			<!--<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>ÉTATS D'INVESTISSEMENTS</h2>
						
					</div>
					<div class="body">
						<form id="form-bud-courant">
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
									<button type="button" class="btn btn-raised bg-blue-grey" id="budCourant">Chercher</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	-->
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Charges d'investissements</h2>
                    </div>
                    <div class="body table-responsive" id="afficheBudCourant"> 
						<table class="table table-bordered table-striped table-hover " id="exemple">
							<thead>
								<tr>
									<th>N° DE COMPTE</th>
									<th>LIBELLES DE COMPTES</th>
								</tr>
							</thead>
							<tbody>
							<?php $somme=0;$sommeStable=0; foreach($liste AS $l){ ?>
								<tr>
									<td>
										<strong><?=$l->cpt_iNumero;?></strong>
									</td>
									<td>
										<strong><?php 
													$rep = $this->md_budget->recup_sous_compte($l->cpt_id); echo $rep->scp_sLibelle;
												?>
										</strong>
										<?php $re = $this->md_budget->recup_lib_sous_compte($rep->scp_id); ?>
										<?php //var_dump($re) ?>
										<table style="width:100%" class=" " id="">
											<thead>
												<tr>
													<th>Libellés de sous comptes</th>
													<th>Montant alloué</th>
													<th>Reste</th>
													<th style="width:60px">Action</th>
												</tr>
											</thead>
											<tbody>
										<?php if($re==NULL){echo'<br><em>Aucun sous libellé renseigné</em>';}else{ $som=0;$somStable=0; foreach($re AS $r){?>
											<tr>
												<td><?=$r->slc_sLibelle;?></td>
												<td><?=number_format($r->slc_iMontStable,0,",",".");$somStable=$somStable+$r->slc_iMontStable;?> Fcfa</td>
												<td <?php if($r->slc_iMontant==0){ echo 'style="color:red"';};?>><?=number_format($r->slc_iMontant,0,",",".");$som=$som+$r->slc_iMontant;?> Fcfa</td>
												<td>
													<a href="<?php echo site_url("budget/lib_sous_compte_courant/".$r->slc_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Opération</a>
												</td>
											</tr>
										<?php }?>
											<tr>
												<td><strong>Sous total</strong></td>
												<td><strong><?php echo number_format($somStable,0,",","."); $sommeStable = $sommeStable+$somStable;?> Fcfa </strong></td>
												<td><strong><?php echo number_format($som,0,",","."); $somme = $somme+$som;?> Fcfa </strong></td>
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
									<td align="center" colspan=""><strong>Montant alloué : <?php echo number_format($sommeStable,0,",","."); ?>  Fcfa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Montant utilisé : <?php echo number_format($somme,0,",","."); ?>  Fcfa</strong></td>
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