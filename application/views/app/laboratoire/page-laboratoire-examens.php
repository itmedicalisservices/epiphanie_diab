<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	$listeTube = $this->md_patient->liste_tube_laboratoire_faire($user->ser_id);
 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Effectuer un rapport pour chaque élément à analyser</h2>
							</div>
							<div class="body table-responsive">
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane in active" id="profile"> <b></b>
										<table id="" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Patient</th>
													<th>Acte laboratoire</th>
													<th>Médécin prescripteur</th>
													<th>Prélévement</th>
												</tr>
											</thead>
											<tbody>
											<?php foreach($listeTube AS $le){ ?>
												<tr>
													<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b> ('.$le->pat_sMatricule.')'; ?></td>
													<td><?php echo $le->lac_sLibelle ; ?></td>
													<td class="text-center" style="font-size:13px">
														<?php if(is_null($le->per_sAvatar)){ ?>
															<i>La prescription est externe de l'hôpitale</i><br><br>
															<?php echo $le->ala_sTitre." ".$le->ala_sNom." ".$le->ala_sPrenom; ?>
															<br><br>
															<?php if(!is_null($le->ala_sPrescription)){ ?><a href="<?php echo base_url($le->ala_sPrescription); ?>" target="_blank"><i class="fa fa-download"></i> Télécharger</a>
															<?php }}else{echo "<b>".$le->per_sNom.'</b> '.$le->per_sPrenom;} ?>
													</td>
													<td class="">
														<table>
															<tr>
																<th>Elément analyse</th>
																<th>Type examen</th>
																<th>Numéro</th>
																<th>Code à barre</th>
																<th>Action</th>
															</tr>
															<?php $list = $this->md_laboratoire->liste_element_exament_tube($le->ala_id); foreach($list AS $l){?>
																<tr>
																	<td><?=$l->ela_sLibelle;?></td>
																	<td><?=$l->tex_sLibelle;?></td>
																	<td><?=$l->tan_sNum;?></td>
																	<td><img src="<?php echo base_url($l->tan_sImg) ;?>" style="width:50%"/></td>
																	<?php if($l->tan_iSta==1){?>
																	<td><a rel="<?=$l->tan_id;?>" id="" class="rapportlabo" href="#"><b>rapport</b></a></td>
																	<?php };?>
																</tr>
															<?php };?>
														</table>
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
                 
        </div>
    </div>
</section>
<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Résultat laboratoire</h2>
						</div>
						<div class="body table-responsive" id="retourlaboratoire"></div>
					</div>
				</div>
			
			</div>
            <div class="modal-footer">
                <a href="javascript:();" class="btn btn-success waves-effect addRapport" style="color:#fff"><i class="fa fa-check"></i> valider</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>