<?php 
	$listeEncours = $this->md_patient->liste_acm_reeducation(date("Y-m-d H:i:s"),$user->ser_id);
 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des prescriptions de r�education</h2>
								<?php //var_dump($listeEncours) ?>
							</div>
							<div class="body table-responsive">
								<table id="example4" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Patient</th>
											<th>Acte soin</th>
											<th>Prescrit</th>
										
											<th class="text-center">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b> ('.$le->pat_sMatricule.')'; ?></td>
											<td><?php echo $le->lac_sLibelle ; ?></td>
											<td>
												<?php if(is_null($le->per_sAvatar)){if(is_null($le->ree_sPrescription)){ ?>
													<i>La prescription est externe de l'h�pitale</i><br>
													<span class="text-left" id="text_<?php echo $le->ree_id;?>">Joignez-la prescription</span><br>
													<form id="reeduc_<?php echo $le->ree_id;?>">
														<input type="file" name="prescrip" id="prescrip_<?php echo $le->ree_id;?>"/>
														<input type="hidden" name="id" value="<?php echo $le->ree_id;?>"/>
													</form>
												<?php }else{echo "<i>La prescription est externe de l'h�pitale</i><br><a href='".base_url($le->ree_sPrescription)."' target='_blank'><i class='fa fa-download'></i> T�l�charger</a>";}}else{echo 'Le '. $this->md_config->affDateFrNum($le->ree_dDate)."<br>";echo $this->md_config->joursRestantDateTime($le->ree_dDate);echo "<br>Par : <b>".$le->per_sNom.'</b> '.$le->per_sPrenom;} ?>
													
											</td>
											<td class="text-center">
												<?php if(is_null($le->per_sAvatar)){if(is_null($le->ree_sPrescription)){ ?>
												<a href="<?php echo site_url("reeducation/seance/".$le->ree_id); ?>" rel="<?php echo $le->ree_id;?>" class="reeduc"><b><br>Pointage</b></a>
												<?php }else{?> 
												<a href="<?php echo site_url("reeducation/seance/".$le->ree_id); ?>"><b><br>Pointage</b></a>
												<?php }}else{ ?>
												<a href="<?php echo site_url("reeducation/seance/".$le->ree_id); ?>"><b><br>Pointage</b></a>
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