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
								<h2>Les patients en attente en maternité</h2>
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
											<td><?php echo $le->lac_sLibelle; ?></td>
											<td><?php $reste = $this->md_config->joursRestantDateTime($le->acm_dDateExp); echo $reste;?></td>
											<td class="text-center">
												<a rel="<?php echo $le->acm_id;?>" class="maternite" href="javascript:();"><b><i class="fa fa-stethoscope" style="font-size:23px"></i><br>Consulter</b></a>
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


<div class="modal fade" id="modalMaternite" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						
						<div class="body table-responsive">
							<form id="form-hos">
								<div class="row clearfix">
									<div class="col-sm-12 retour-hos"></div>
									<div class="col-sm-12 retour-hostFinal"></div>
									<div class="col-sm-6">
										<div class="form-line">
											<label style="color:#000"><b>Unité *</b></label>
											<div class="form-group drop-custum">
												<select name="uni" class="form-control unitePresc obligatoire show-tick">
													<option value="">------------ Choisir l'unité --------------</option>
													<?php $unites = $this->md_parametre->liste_unite_services_actifs(36);foreach($unites AS $u){?>
														<option value="<?php echo $u->uni_id; ?>"><?php echo $u->uni_sLibelle; ?></option>
													<?php } ?>
												</select>
											</div>
											
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-line">
											<label style="color:#000"><b>Chambre *</b></label>
											<div class="form-group drop-custum">
												<select name="cha" class="form-control chambrePresc obligatoire show-tick">
													<option value="">-- Choisir la chambre --</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-line">
											<label style="color:#000"><b>Lit *</b></label>
											<div class="form-group drop-custum">
												<select name="lit" class="form-control litPresc obligatoire show-tick">
													<option value="">-- Choisir le lit --</option>
													
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<div class="form-line">
												<label style="color:#000"><b>Type d'hospitalisation *</b></label>
												<select name="type" class="form-control obligatoire show-tick">
													<option value="Standard">Standard</option>
													<option value="Patient en isolation">Patient en isolation</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="form-group">
											<div class="form-line">
												<label style="color:#000"><b>Motif *</b></label>
												<textarea name="motif" class="form-control obligatoire"></textarea>
												<input type="hidden" id="recep" name="id">
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row clearfix">
									
									<div class="col-sm-12">
										<button type="submit" class="btn btn-raised bg-blue-grey" id="mat">MATERNER</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			
			</div>
          
        </div>
    </div>
</div>