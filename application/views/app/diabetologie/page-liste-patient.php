<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	$articleParPage = 12;
	
	/* tout le monde */
	$articleTotaux  = count($this->md_patient->nb_patients());
	$pagesTotales = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle = $_GET['page'];
	}else{
		$pageActuelle = 1;
	}
	
	$listes = $this->md_patient->liste_patients($articleParPage,$pageActuelle);
	$liste = $this->md_patient->liste_patient();
	
	
	
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
								<h2>Rechercher le dossier patient (<?php echo $articleTotaux;?>)</h2>
							</div>
							<div class="body table-responsive">
								<table  id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Photo</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Age</th>
											<th>Téléphone</th>
											<th>Adresse</th>
											<th style="width:60px">Consulter</th>
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
											<td><a href="<?php echo site_url("impression/dossier_medical_passage/".$l->pat_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">le dossier</a></td>
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
 
