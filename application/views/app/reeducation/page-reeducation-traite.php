<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	
	$listeEncours = $this->md_patient->liste_acm_reeducation_fait(date("Y-m-d H:i:s"),30);
 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des scéances de réeducation clôturées</h2>
								<?php //var_dump($listeEncours) ?>
							</div>
							<div class="body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover">
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
												<?php if(is_null($le->per_sAvatar)){ ?>
													<i>La prescription est externe de l'hôpitale</i><br>
												<?php echo "<a href='".base_url($le->ree_sPrescription)."' target='_blank'><i class='fa fa-download'></i> Télécharger</a>";}else{echo 'Le '. $this->md_config->affDateFrNum($le->ree_dDate)."<br>";echo $this->md_config->joursRestantDateTime($le->ree_dDate);echo "<br>Par :<b>".$le->per_sNom.'</b> '.$le->per_sPrenom;} ?>
													
											</td>
											<td class="text-center">
												<a title="Imprimer le compte rendu" href="<?php echo site_url("impression/rapport_reeduction/".$le->ree_id); ?>"><b><i class="fa fa-print" style="font-size:30px"></i></b></a>
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