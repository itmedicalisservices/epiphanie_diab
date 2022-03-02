 <?php 
	
	$listeEncours = $this->md_patient->liste_acm_infirmerie(date("Y-m-d H:i:s"),$user->ser_id);

 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card" style="min-height:480px">
							<div class="header">
								<h2>Liste des soins � faire</h2>
								<?php //var_dump($listeEncours) ?>
							</div>
							<div class="body table-responsive">
								<table id="example_copy_1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Patient</th>
											<th>Acte soin</th>
											<th>Prescrit</th>
											<th>Heure demarrage</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b> ('.$le->pat_sMatricule.')'; ?></td>
											<td><?php echo $le->lac_sLibelle ; ?></td>
											<td><?php echo $this->md_config->affDateTimeFr($le->soi_dDtatePres)."<br>";echo $this->md_config->joursRestantDateTime($le->soi_dDtatePres); ?></td>
											<td><?php echo $le->soi_tHeureDem ; ?></td>
											<td class="text-center">
												<a href="<?php echo site_url("infirmerie/patient_assigne/".$le->soi_id); ?>"><b><i class="fa fa-stethoscope" style="font-size:23px"></i><br>Suivi du protocole de soin</b></a>
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