<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeRdv = $this->md_rdv->liste_des_rdv(); ?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des rendez-vous </h2>
                    </div>
					
					
                    <div class="body table-responsive"> 
					
						<table id="example" class="table table-bordered table-striped table-hover">
						   
							<thead>
								<tr>
									<th>Demandeur</th>
									<th>Date</th>
									<th>Heure</th>
									<th>Destinataire</th>
									<th>Objet</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
							<?php  //var_dump($liste)?>
							<tbody>

								<?php foreach($listeRdv AS $lr){ ?>
								<tr <?php if(($lr->dir_dDate==date("Y-m-d") AND $lr->dir_tHeure<date("H:i:s")) OR $lr->dir_dDate<date("Y-m-d")){ ?>class="table-danger"<?php } ?>>
									<td><?php if(is_null($lr->pat_id)){echo $lr->dir_sNom.' '.$lr->dir_sPrenom;}else{$pat = $this->md_patient->recup_patient($lr->pat_id); echo $pat->pat_sNom." ".$pat->pat_sPrenom;};?>
									 </td>
									<td><?php echo $this->md_config->affDateFrNum($lr->dir_dDate);?></td>
									<td><?php echo substr($lr->dir_tHeure,0,8);?></td>
									<td><?php echo $lr->per_sNom;?> <?php echo $lr->per_sPrenom;?> </td>
									<td><?php echo $lr->dir_sObjet;?></td>
									<td>	
										<a onClick="return confirm('Êtes-vous sûr d\'annuler le rendez-vous ?')" href="<?php echo site_url("rdv/annulerRdv/".$lr->dir_id); ?>" class="delete" title="annuler"><i class="fa fa-remove text-danger" style="font-size:20px"></i></a>
										<a onClick="return confirm('Êtes-vous sûr d\'accorder l\'audience ?')" href="<?php echo site_url("rdv/validerRdv/".$lr->dir_id); ?>" class="delete" title="annuler"><i class="fa fa-check text-success" style="font-size:20px"></i></a>
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