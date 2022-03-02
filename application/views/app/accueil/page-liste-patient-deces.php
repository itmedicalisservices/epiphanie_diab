<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	
	$liste = $this->md_patient->liste_patients_decedes();
	
	
	
	// var_dump($pms);
 ?>
 
 
 
 
<section class="content home">
    <div class="container-fluid"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des Patients décèdés dans cet hôpital</h2>
							</div>
							<div class="body table-responsive">
								<table  id="example" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Nom & Prénom</th>
											<th>Age</th>
											<th>Date et heure</th>
											<th>Service/unité</th>
											<th>Cause</th>
											<th>Était en</th>
											<th>Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($liste AS $l){ ?>
										<tr>
											<td><?php echo $l->pat_sMatricule; ?></td>
											<td><a href="<?php echo site_url("patient/voir/".$l->pat_id); ?>"><?php echo $l->pat_sNom; ?> <?php echo $l->pat_sPrenom; ?></a> </td>
											<td><?php $ageAnnee= $this->md_config->ageAnnee($l->pat_dDateNaiss); if($ageAnnee>1){echo $ageAnnee." ans";}else if($ageAnnee ==1){echo $ageAnnee." an";}else{echo $this->md_config->ageMois($l->pat_dDateNaiss)." mois";} ?></td>
											<td><?php echo $this->md_config->affDateFrNum($l->dec_dDateDeces)." à ".$l->dec_tHeureDeces; ?> </td>
											<td><?php echo $l->ser_sLibelle." / ".$l->uni_sLibelle; ?></td>
											<td class="text-danger"><b><?php echo $l->dec_sCause; ?></b></td>
											<td><?php echo $l->lac_sLibelle; ?></td>
											<td><a href="<?php echo site_url("patient/voir/".$l->pat_id); ?>" class="" title="Voir détails"><i class="fa fa-eye text-success" style="font-size:20px"></i></a></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
                        
                    </div>
                </div>
            </div>           
        </div>
    </div>
</section>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>
 
