<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	
	$listeEncours = $this->md_patient->liste_hospitalisation_cloture();

 ?>
<section class="content home">
    <div class="container-fluid"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des patients en hospitalisation</h2>
							</div>
							<div class="body table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Nom & Prénom</th>
											<th>Localisation</th>
											<th>disposition</th>
											<th>date d'hospitalisation</th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo $le->pat_sMatricule; ?></td>
											<td><?php echo $le->pat_sNom; ?> <?php echo $le->pat_sPrenom; ?></td>
											
											<td>
												Service : <b><?php echo $le->ser_sLibelle; ?></b><br>
												Unité :<b><?php echo $le->uni_sLibelle; ?></b><br>
												<?php echo $le->cha_sLibelle; ?><br>
												<?php echo $le->lit_sLibelle; ?>
											</td>
											<td><?php echo $le->hos_sType; ?></td>
											<td>
												Début : <?php echo $this->md_config->affDateFrNum($le->fac_dDatePaie);?><br>
												Fin : <?php echo $this->md_config->affDateFrNum($le->hos_dDateSortie);?><br>
											</td>
											<td class="text-center">
												<a href="<?php echo site_url("hospitalisation/voir/".$le->hos_id); ?>"><b>Voir</b></a> | 
												<a href="<?php echo site_url("impression/dossier_medical_hospitalisation/".$le->hos_id); ?>"><b>Imprimer</b></a>
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
            
            <div role="tabpanel" class="tab-pane page-calendar" id="sales">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
			
                    </div>
                </div>
            </div>  
			
            <div role="tabpanel" class="tab-pane page-calendar" id="sales2">
               
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
			
                     
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>