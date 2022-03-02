
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeCpt = $this->md_parametre->liste_compte_actifs(); ?>
<?php //$liste = $this->md_parametre->liste_sous_compte_actifs(); ?>
<?php $montant = $this->md_budget->montant_lib_sous_compte(); ?>


<?php $lib = $this->md_budget->recup_detail_compte($id); ?>
<?php $liste = $this->md_budget->liste_mouvement_suivi_budget_courant($id); ?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Détails Suivi du budget ->> <strong><?php echo $lib->scp_sLibelle;?></strong></h2>
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
							<thead>
								<tr>
									<th align="text-center" colspan="3">LISTE DES DEPENSES EFFECTUEES</th>
								</tr>
								<tr>
									<th>Date Opération</th>
									<th>Montant</th>
									<th>Motif</th>
									<th>sous compte</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($liste AS $l){?>
								<tr>
									<td><?php echo $this->md_config->affDateFrNum($l->opb_dDate) ;?></td>
									<td><?php echo number_format($l->opb_iMontant,0,",",".");?> Fcfa</td>
									<td><?php echo $l->opb_sMotif;?></td>
									<td>
										<?php $lib = $this->md_budget->liste_libelle_sous_compte($l->slc_id); echo $lib->slc_sLibelle;?>
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