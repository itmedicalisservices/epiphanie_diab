
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_patient->compteur_caisse($this->session->diabcare); ?>

<section class="content">

    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Mon point total de caisse</h2>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<th>N° Facture</th>
									<th>Montant Payé (FCFA)</th>
									<th>Date Opération</th>
								</tr>
							</thead>
						   
							<tbody>
							
							<?php $som=0; foreach($liste AS $l){ ?>
								<tr align="center">									
									<td>
										<?php echo $l->fac_sNumero; ?>
									</td>
									<td>
										<?php  echo number_format($l->fac_iMontantPaye,0,",",".");?>
									</td>
									<td>
										<?php echo $this->md_config->affDateFrNum($l->fac_dDatePaie); ?>
									</td>
								</tr> 
							 <?php $som +=$l->fac_iMontantPaye; } ?>								
							<?php if(!empty($liste)){?>
								<tr>									
									<td style="background:#4f7ca0;color:#fff;display:">
										<b><?=$user->per_sNom.' '.$user->per_sPrenom;?><br>
										N° matricule: <?=$user->per_sMatricule;?></b>
									</td>
									<td style="background:#4f7ca0;color:#fff;display:">
										<b>Signature : </b>
									</td>
									<td style="background:#4f7ca0;color:#fff;display:">
										<b>Total : <?php echo number_format($som,0,",",".") ;?></b> <small>FCFA</small>
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>