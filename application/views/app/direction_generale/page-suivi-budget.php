
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeCpt = $this->md_parametre->liste_compte_actifs(); ?>
<?php $liste = $this->md_parametre->liste_sous_compte_actifs(); ?>
<?php $montant = $this->md_budget->montant_lib_sous_compte(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Suivi du budget</h2>
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
							<thead>
								<tr>
									<th>Libellés de comptes</th>
									<th>Montant alloué</th>
									<th>Reste</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($liste AS $l){?>
								<tr>
									<td><?=$l->scp_sLibelle;?></td>
									<?php $mont = $this->md_budget->montant_lib_compte($l->scp_id); ?>
									<td><strong><?php echo number_format($mont->stable,0,",",".");?> Fcfa</strong></td>
									<td <?php if($mont->instable==0){echo 'style="color:red"';};?>><strong><?php echo number_format($mont->instable,0,",",".");?> Fcfa</strong></td>
									<td>
										<a href="<?php echo site_url("budget/suivi_budget_courant/".$l->scp_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Détails</a>
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
                    </div>
                </div>
        </div>
    </div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>