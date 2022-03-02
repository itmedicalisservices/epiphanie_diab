<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_patient->liste_recouvrement_patient($pat); ?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Montant à recouvrir chez le client  </h2>
                    </div>
					
					
                    <div class="body table-responsive"> 
					
						<table  id="example" class="table table-bordered table-striped table-hover">
						   
							<thead>
								<tr>
									<th>Patient</th>
									<th>Numéro patient</th>
									<th>Montant dû</th>
									<th>Date</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
							<?php  //var_dump($liste)?>
							<tbody>

								<?php foreach($liste AS $lr){ ?>
								<tr>
									<td><?php echo $lr->pat_sNom." ".$lr->pat_sPrenom;?></td>
									<td><?php echo $lr->pat_sMatricule;?></td>
									<td><?php echo number_format($lr->fac_iReste,2,",",".");?> <small>fcfa</small></td>
									<td><?php echo $this->md_config->affDateFrNum($lr->fac_dDatePaie);?></td>
									<td>	
										
										<a onClick="return confirm('Êtes-vous sûr de pouvoir valider le paiement ?')" href="<?php echo site_url("caisse/payeFacturePat/".$lr->fac_id); ?>" class="delete" title="annuler"><b>Payé</b></a>
										
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