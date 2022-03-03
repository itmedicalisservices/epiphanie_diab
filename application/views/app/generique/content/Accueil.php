<?php 
	// $articleParPage = 500;
	
	// /* tout le monde */
	// $articleTotaux  = count($this->md_patient->nb_patients());
	// $pagesTotales = ceil($articleTotaux/$articleParPage);
	// if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		// $_GET['page'] = intval($_GET['page']);
		// $pageActuelle = $_GET['page'];
	// }else{
		// $pageActuelle = 1;
	// }
	
	// $liste = $this->md_patient->liste_patients($articleParPage,$pageActuelle);
	////$liste = $this->md_patient->liste_patient();
	
	
	// var_dump($pms);
 ?>
 
 
 
 
<!--<section class="content home">
    <div class="container-fluid"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des Patients (<?php echo $articleTotaux;?>)</h2>
								<br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
							</div>
							<div class="body table-responsive" style="overflow:auto;height:500px"> 
								<table  id="patient_table" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:15%">N° Matricule</th>
											<th>Photo</th>
											<th style="width:20%">Nom complet</th>
											<th style="width:90px">Age</th>
											<th>Tél. 1</th>
											<th>Tél. 2</th>
											<th>Adresse</th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($liste AS $l){ ?>
										<tr>
											<td><?php echo $l->pat_sMatricule; ?></td>
											<td><a href="#" class="p-profile-pix"><img src="<?php echo base_url($l->pat_sAvatar); ?>" width="40" height="40" alt="user" class="img-thumbnail img-fluid"></a></td>
											<td><a href="<?php echo site_url("patient/voir/".$l->pat_id); ?>"><?php echo $l->pat_sNom; ?> </a> </td>
											<td><?php echo $l->pat_sPrenom; ?></td>
											<td><?php $ageAnnee= $this->md_config->ageAnnee($l->pat_dDateNaiss); if($ageAnnee>1){echo $ageAnnee." ans";}else if($ageAnnee ==1){echo $ageAnnee." an";}else{echo $this->md_config->ageMois($l->pat_dDateNaiss)." mois";} ?></td>
											<td><?php if(!is_null($l->pat_sTel)){echo $l->pat_sTel;}else{echo "<i>Non renseigné</i>";} ?></td>
											<td><?php if(!is_null($l->pat_sAdresse)){echo $l->pat_sAdresse;}else{echo "<i>Non renseignée</i>";} ?></td>
											<td>
												<a href="<?php echo site_url("patient/accueil/".$l->pat_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Orienter</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							<?php if($articleTotaux >$articleParPage){ ?>
								<div class="row clearfix">
									<div class="col-sm-12 text-center">
										<ul class="pagination">
											<?php
												for($i=1;$i<=$pagesTotales;$i++){
													if($i==$pageActuelle){
											?>
											<li class="page-item active"><a class="page-link" href="javascript:();"><?=$i?></a></li>
											<?php }else{  ?>
											 <li class="page-item"><a class="page-link" href="<?php echo site_url("app");?>/?page=<?=$i?>"><?=$i?></a></li>
											<?php } } ?>
										</ul>
									</div>
								</div>
							<?php } ?>
						</div>
                        
                    </div>
                </div>
            </div>           
        </div>
    </div>
</section>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
    <script>
    $( document ).ready(function() {
        // console.log( "document loaded" );
		$('#search').keyup(function(){
			search_table($(this).val());
		});
		
		function search_table(value){
			$('#patient_table tr').each(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
					{
						found = 'true';
					}
				});
				if(found == 'true'){
					$(this).show();
				}else{	
					$(this).hide();
				}
			});
		}
    });
 
    // $( window ).on( "load", function() {
        // console.log( "window loaded" );
    // });
    </script>-->
	


<?php 
	$articleParPage = 500;
	
	/* tout le monde */
	$articleTotaux  = count($this->md_patient->nb_patients());
	$pagesTotales = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle = $_GET['page'];
	}else{
		$pageActuelle = 1;
	}
	
	$liste = $this->md_patient->liste_patients($articleParPage,$pageActuelle);
	// $liste = $this->md_patient->liste_patient();
	
	
	
	// var_dump($pms);
 ?>
 
 
 
 
<section class="content home">
    <div class="container-fluid"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="header">
								<h2>Liste des Patients (<?php echo $articleTotaux;?>)</h2>
								<br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
							</div>
							<div class="body table-responsive" style="overflow:auto;height:500px"> 
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:15%">N° Matricule</th>
											<th>Photo</th>
											<th style="width:20%">Nom complet</th>
											<!--<th style="width:90px">Age</th>-->
											<th>Tél. 1</th>
											<th>Tél. 2</th>
											<th>Adresse</th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody id="patient_table">
									<?php foreach($liste AS $l){ ?>
										<tr>
											<td><?php echo $l->pat_sMatricule; ?></td>
											<td><a href="#" class="p-profile-pix"><img src="<?php echo base_url($l->pat_sAvatar); ?>" width="40" height="40" alt="user" class="img-thumbnail img-fluid"></a></td>
											<td><a href="<?php echo site_url("patient/voir/".$l->pat_id); ?>"><?php echo $l->pat_sNom.' '.$l->pat_sPrenom; ?> </a> </td>
											<!--<td><?php //$ageAnnee= $this->md_config->ageAnnee($l->pat_dDateNaiss); if($ageAnnee>1){echo $ageAnnee." ans";}else if($ageAnnee ==1){echo $ageAnnee." an";}else{echo $this->md_config->ageMois($l->pat_dDateNaiss)." mois";} ?></td>-->
											<td><?php if(!is_null($l->pat_sTel)){echo $l->pat_sTel;}else{echo "<i>Non renseigné</i>";} ?></td>
											<td><?php if(!is_null($l->pat_sOtherPhone)){echo $l->pat_sOtherPhone;}else{echo "<i>Non renseigné</i>";} ?></td>
											<td><?php if(!is_null($l->pat_sAdresse)){echo $l->pat_sAdresse;}else{echo "<i>Non renseignée</i>";} ?></td>
											<td>
												<a href="javascript:();" rel="<?php echo $l->pat_id;  ?>" class="btn bg-blue-grey ajout_hosp waves-effect btn-sm" style="color:#fff">Hospitaliser</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>

							</div>
							<?php if($articleTotaux >$articleParPage){ ?>
								<div class="row clearfix">
									<div class="col-sm-12 text-center">
										<ul class="pagination">
											<?php
												for($i=1;$i<=$pagesTotales;$i++){
													if($i==$pageActuelle){
											?>
											<li class="page-item active"><a class="page-link" href="javascript:();"><?=$i?></a></li>
											<?php }else{  ?>
											 <li class="page-item"><a class="page-link" href="<?php echo site_url("patient/liste");?>/?page=<?=$i?>"><?=$i?></a></li>
											<?php } } ?>
										</ul>
									</div>
								</div>
							<?php } ?>
						</div>
                        
                    </div>
                </div>
            </div>           
        </div>
    </div>
</section>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel"></h4>
			</div>
			<div class="modal-body" style="max-height:500px; overflow:auto;">
			
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
					<div class="header" style="margin-top:45px">
						<h2>Hospitalisation <small>renseignez tous les champs marqués par des (*)</small> </h2>
					</div>
						<div class="body table-responsive" >
							<form id="form-hos">
								<div class="row clearfix">
									<div class="col-sm-12 retour-hos"></div>
									<div class="col-sm-12 retour-hostFinal"></div>
									<div class="col-sm-3">
										<div class="form-line">
											<label style="color:#000"><b>Chambre *</b></label>
											<div class="form-group drop-custum">
												<input type="hidden" name="pat" class="form-control " id="patientID"/>
												<input type="hidden" name="uni" class="form-control " value="202" />
												<select name="cha" class="form-control chambrePresc obligatoire show-tick">
													<option value="">-- Choisir la chambre --</option>
													<?php $chambres = $this->md_parametre->liste_chambre_unite_dispo(202); foreach($chambres as $C){ ?>
														<option value="<?=$C->cha_id;?>"><?=$C->cha_sLibelle;?></option>
													<?php } ?>
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
									<div class="col-sm-3">
										<div class="form-group">
											<div class="form-line">
												<label style="color:#000"><b>Type d\'hospitalisation *</b></label>
												<select name="type" class="form-control obligatoire show-tick">
													<option value="Standard">Standard</option>
													<option value="Patient en isolation">Patient en isolation</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<div class="form-line">
												<label style="color:#000"><b>Mode d'admission *</b></label>
												<select name="motif" class="form-control obligatoire">
													<option value="">-- Choisir le mode --</option>
													<option value="Admission par l'urgence">Admission par l'urgence</option>
													<option value="mission direct">Amission direct</option>
													<option value="Transferer à l'entré">Transferer à l'entré</option>
												</select>
											</div>
										</div>
									</div>
								</div>
														
								<br>
								<div class="row clearfix">
									
									<div class="col-sm-12">
										<button type="submit" class="btn btn-raised bg-blue-grey pull-right" id="enregistrerHospi">HOSPITALISER</button>
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

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
    <script>
    $( document ).ready(function() {
        // console.log( "document loaded" );
		$('#search').keyup(function(){
			search_table($(this).val());
		});
		
		function search_table(value){
			$('#patient_table tr').each(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
					{
						found = 'true';
					}
				});
				if(found == 'true'){
					$(this).show();
				}else{	
					$(this).hide();
				}
			});
		}
    });
 
    // $( window ).on( "load", function() {
        // console.log( "window loaded" );
    // });
    </script>