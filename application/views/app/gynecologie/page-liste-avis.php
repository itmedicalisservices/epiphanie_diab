<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	$listeAvisEncours = $this->md_patient->liste_avis_encours(date("Y-m-d H:i:s"),$user->ser_id);
 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des avis</h2>
							
							</div>
							<div class="body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Motif </th>
											<th>Médecin demandeur</th>
											<th>Service </th>
											<th>N° Matricule</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Acte médical</th>
											<th>Date de l'avis </th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeAvisEncours AS $le){ ?>
										<tr>
											<td><?php echo $le->avs_sLibelle; ?></td>
											<td><?php echo $le->per_sNom.' '.$le->per_sPrenom; ?></td>
											<td><?php echo $le->ser_sLibelle ?></td>
											<td><?php echo $le->pat_sMatricule; ?></td>
											<td><?php echo $le->pat_sNom; ?></td>
											<td><?php echo $le->pat_sPrenom; ?></td>
											<td><?php echo $le->lac_sLibelle; ?></td>
											<td><?php echo $this->md_config->affDateFrNum($le->avs_dDate); ?></td>
											<td class="text-center">
												<a href="javascript:;<?php echo site_url("gynecologie/consultation_avis/".$le->acm_id."/".$le->avs_id); ?>"><b><i class="fa fa-stethoscope" style="font-size:23px"></i><br>Consulter</b></a>
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
            
		           
        </div>
    </div>
</section>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>