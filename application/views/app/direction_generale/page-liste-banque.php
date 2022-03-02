
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeActeLabo = $this->md_parametre->liste_acts_laboratoires_actifs(); ?>
<?php $liste = $this->md_parametre->liste_banque_actifs(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des banques </h2>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="">
							<thead>
								<tr>
									<th>Logo</th>
									<th>Banque</th>
									<th>Montant</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $som=0; foreach($liste AS $l){ ?>
								<tr>
									<td>
										<a href="#" class="p-profile-pix"><img src="<?php echo base_url($l->bnq_sLogo) ;?>" width="50" height="50" alt="user" class=""></a>
									</td>
									<td>
										<?php echo $l->bnq_sEnseigne; ?>
									</td>									
									<td>
										<strong><?php echo number_format($l->bnq_iMontant,0,",","."); $som = $som+$l->bnq_iMontant;?> Fcfa</strong>
									</td>
									<td class="text-center">
										<a href="<?php echo site_url("banque/banque_courant/".$l->bnq_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Opération</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2"><strong>TOTAL</strong></td>
									<td colspan="2"><strong><?php echo number_format($som,0,",","."); ?>  Fcfa</strong></td>
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