<?php 
	
	// $listeEncours = $this->md_patient->liste_acm_encours(date("Y-m-d H:i:s"),$user->ser_id);
	// $listeExpire = $this->md_patient->liste_acm_expire(date("Y-m-d H:i:s"),$this->session->diabcare);

 ?>
<!--<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Les patients en attente de consultation</h2>
							</div>
							<div class="body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Photo</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Acte médical</th>
											
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
											
											<td>
												<?php if($le->recep_iPer==0){echo '<em>Pas renseigné</em>';}else{ echo '<a href="javascript:void();"><b>'.$le->per_sNom.' '.$le->per_sPrenom.'</b></a>'; };?>
											</td>
											<td class="text-center">
												<a href="<?php echo site_url("diabetologie/faire/".$le->acm_id); ?>"><b><i class="fa fa-stethoscope" style="font-size:23px"></i><br>Consulter</b></a>
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
</section>-->


<?php 
	
	$listeEncours = $this->md_patient->liste_hospitalisation();
	
 ?>
<section class="content home">
    <div class="container-fluid"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des patients en hospitalisation </h2>
							</div>
							<div class="body table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Localisation</th>
											<th>disposition</th>
											<th>Début d'hospitalisation</th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo $le->pat_sMatricule; ?></td>
											<td><?php echo $le->pat_sNom; ?></td>
											<td><?php echo $le->pat_sPrenom; ?></td>
											<td>
												Service : <b><?php echo $le->ser_sLibelle; ?></b><br>
												Unité :<b><?php echo $le->uni_sLibelle; ?></b><br>
												<?php echo $le->cha_sLibelle; ?><br>
												<?php echo $le->lit_sLibelle; ?>
											</td>
											<td><?php echo $le->hos_sType; ?></td>
											<td class="text-center"><?php echo $this->md_config->affDateFrNum($le->hos_dDate);?></td>
											<td class="text-center">
												<?php if($user->per_iTypeCompte!=5){ ?>
													<a href="<?php echo site_url("hospitalisation/patient_hospitalise/".$le->hos_id); ?>"><b><i class="fa fa-bed" style="font-size:23px"></i><br>Consulter</b></a>
												<?php }else{ ?>
													<a href="<?php echo site_url("hospitalisation/voir/".$le->hos_id); ?>"><b>Voir <?php var_dump($le->hos_id);?></b></a>
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
 