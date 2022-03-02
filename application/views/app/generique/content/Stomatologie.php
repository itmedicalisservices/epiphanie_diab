
<?php 
	$listeEncours = $this->md_patient->liste_acm_encours(date("Y-m-d H:i:s"),$user->ser_id);
	$listeExpire = $this->md_patient->liste_acm_expire(date("Y-m-d H:i:s"),$this->session->diabcare);

 ?>

 
 <section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des patients en attente de consultation</h2>
							</div>
							<div class="body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N� Matricule</th>
											<th>Photo</th>
											<th>Nom</th>
											<th>Pr�nom</th>
											<th>Acte m�dical</th>
											<th>jours de consultation</th>
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
											<td>					
											<?php 
												if(is_null($le->acm_sDent)){
														$dent = "";
													}
													else{
														$dent = " - ".$le->acm_sDent;
													} echo $le->lac_sLibelle.$dent ; 
												?>
											</td>
											<td><?php $reste = $this->md_config->joursRestantDateTime($le->acm_dDateExp); echo $reste;?></td>
											<td class="text-center">
												<?php if($le->lac_id == 130){ ?>
												<a href="<?php echo site_url("stomatologie/faire/".$le->acm_id); ?>"><b><i class="fa fa-stethoscope" style="font-size:23px"></i><br>Consulter</b></a>
												<?php }else{ ?>
												<a href="<?php echo site_url("exploration/examen_stomatologique/".$le->acm_id); ?>"><b>D�finir le traitement</b></a>
												<?php } ?>
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