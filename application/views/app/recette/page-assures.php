
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_patient->liste_facture_assure(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des factures assurées</h2>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<th>Assureur</th>
									<th>N° Facture</th>
									<th>Total</th>
									<th>Payé par le patient <small>FCFA</small></th>
									<th>Payé par l'assurance <small>FCFA</small></th>
									<th>Reste à payer <small>FCFA</small></th>
									<th>Date Opération</th>
									<th class="text-center">Statut</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<?php echo $l->ass_sLibelle; ?>
									</td>
									<td>
										<?php echo $l->fac_sNumero; ?>
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontant,0,",","."); ?></b> 
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontantPaye,0,",","."); ?></b> 
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontantAss,0,",","."); ?></b>
									</td>
									<td>
										<b><?php echo number_format($l->fac_iReste,0,",","."); ?></b>
									</td>
									<td>
										<?php echo $this->md_config->affDateFrNum($l->fac_dDatePaie); ?>
									</td>									
									<td class="text-center" style="padding:0;width:10%">
										<?php if($l->ass_id==NULL){?>
											<?php if($l->fac_iReste==0){?>
												<i class='label label-success'> payée</i>
											<?php }else{?>
													<?php if($l->fac_iMontantPaye==0){?>
														<i class='label label-danger'>non payée</i>
													<?php }else{?>
														<i class='label label-warning'>avancée</i>
													<?php }?>
											<?php }?>
										<?php }else{?>
											<?php if($l->fac_iMontantAss==0){?>
												<?php if($l->fac_iReste==0){?>
													<i class='label label-success'> payée</i>
												<?php }else{?>
													<?php if($l->fac_iMontantPaye==0){?>
														<i class='label label-danger'>non payée</i>
													<?php }else{?>
														<i class='label label-warning'>avancée</i>
													<?php }?>
												<?php }?>
											<?php }else{?>
												<?php if($l->fac_iSituationAss==0){?>
													<i class='label label-danger'>non payée</i>
												<?php }else{?>
													<i class='label label-success'> payée</i>
												<?php }?>
											<?php }?>
										<?php }?>
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

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>