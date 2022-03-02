<?php 	
$listeEncours = $this->md_patient->liste_acm_encours(date("Y-m-d H:i:s"),$user->ser_id);

 ?>
<section class="content home">
    <div class="container-fluid">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Consultation préopératoire</h2>
							</div>
							<div class="body table-responsive">
								<table id="example5" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Photo</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Acte médical</th>
											<th>Date d'opération</th>
											<th>Médecin</th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo $le->pat_sMatricule; ?></td>
											<td><img src="<?php echo base_url($le->pat_sAvatar); ?>" class="img-thumbnail " alt="profile-image" width="40" height="40"></td>
											<td><?php echo $le->pat_sNom; ?></td>
											<td><?php echo $le->pat_sPrenom; ?></td>
											<td><?php echo $le->lac_sLibelle; ?></td>
											<td><?php $reste = $this->md_config->joursRestantDateTime($le->acm_dDateExp); echo $reste;?></td>
											<td>
												<?php if($le->recep_iPer==0){echo '<em>Pas renseigné</em>';}else{ echo '<a href="javascript:void();"><b>'.$le->per_sNom.' '.$le->per_sPrenom.'</b></a>'; };?>
											</td>
											<td class="text-center">
												<a href="<?php echo site_url("chirurgie/consulter/".$le->acm_id); ?>"><b><i class="fa fa-stethoscope" style="font-size:23px"></i><br>Consulter</b></a>
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