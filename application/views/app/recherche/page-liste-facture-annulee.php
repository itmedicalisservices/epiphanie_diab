
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	if($user->per_iTypeCompte == 0 || $user->per_iTypeCompte == 26) {
		$liste = $this->md_patient->liste_facture_annulee3();
	}else{
		$liste = $this->md_patient->liste_facture_annulee2($this->session->diabcare);
	}
 ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des factures annulées</h2>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<th>Client</th>
									<th>Assureur</th>
									<th>Montant total</th>
									<th>Payé par l'assurance</th>
									<th>Réduction</th>
									<th>Payé par le client</th>
									<th>N° Facture</th>
									<?php if($user->per_iTypeCompte==0 || $user->per_iTypeCompte == 26){?>	
									<th>Effectuée</th>
									<?php } ?>								
									<?php if($user->per_iTypeCompte==0){?>	
									<th>Action</th>
									<?php } ?>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<?php echo $l->pat_sNom; ?> <?php echo $l->pat_sPrenom; ?>
									</td>
									<td>
										<?php if(is_null($l->ass_sLibelle)){echo "<i class='text-danger'>pas d'assurance</i>";}else{echo $l->ass_sLibelle;} ?>
									</td>
									<td>
										<?php echo $l->fac_iMontant; ?> <small>FCFA</small>
									</td>
									<td>
										<span class='<?php if(is_null($l->ass_sLibelle)){echo "text-danger";}?>'><?php echo $l->fac_iMontantAss; ?> <small>FCFA</small></span>
									</td>
									<td>
										<?php if(is_null($l->fac_iMontantReduc) || $l->fac_iMontantReduc == 0){ echo "<i>Pas de réduction</i>";} else { ?>
										<b><?php echo number_format($l->fac_iMontantReduc,0,",","."); ?></b> <small>FCFA</small>
										<?php }?>
									</td>
									<td>
										<?php echo $l->fac_iMontantPaye; ?> <small>FCFA</small>
									</td>
									<td>
										<?php echo $l->fac_sNumero; ?>
									</td>		
									<?php if($user->per_iTypeCompte==0 || $user->per_iTypeCompte == 26){?>						
									<td>
										<b><?php $pers = $this->md_personnel->recup_personnel($l->per_id); echo $pers->per_sNom.' '.$pers->per_sPrenom; ?></b>
									</td>
									<?php }?>								
									<?php if($user->per_iTypeCompte==0){?>						
									<td>
										<a onClick="return confirm('Êtes-vous sûr de vouloir restaurer cette facture ?')" href="<?php echo site_url("facture/restaure_facture/".$l->fac_id);?>" class="text-success" title="Restaurer cette facture ?" ><i class="fa fa-history" style="font-size:20px"></i></a>
									</td>
									<?php }?>
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