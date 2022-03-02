<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	if($user->flt_sLib=='Neurologie'){
		$ser = 400;
	}
	elseif($user->flt_sLib=='Cardiologie'){
		$ser = 399;
	}
	elseif($user->flt_sLib=='Ophtamologie'){
		$ser = 401;
	}
	elseif($user->per_iTypeCompte==14){
		$ser = 42;
	}
	elseif($user->per_iTypeCompte==19){
		$ser = 46;
	}
	elseif($user->per_iTypeCompte==20){
		$ser = 47;
	}
	elseif($user->per_iTypeCompte==21){
		$ser = 32;
	}
	$listeEncours = $this->md_patient->liste_acm_exploration_fait($ser);
 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des examens faits</h2>
								<?php //var_dump($listeEncours) ?>
							</div>
							<div class="body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Patient</th>
											<th>Examen</th>
											<th>Médecin prescripteur</th>
											<th>Jour de l'acte</th>
											<th>Médecin examinateur</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){
										$e = $this->md_patient->medecin_prescripteur_exploration($le->sea_id);
									?>
										<tr>
											<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b><br> ('.$le->pat_sMatricule.')'; ?></td>
											<td class="text-center"><?php echo $le->lac_sLibelle ; ?> <br> dans l'unité<br><b><?php echo $le->uni_sLibelle ; ?></b></td>
											<td class="text-center"><?php if(!is_null($e)){echo $e->per_sNom.'</b> '.$e->per_sPrenom ;}else{echo "<span style='color:red'>Prescription externe</span><br><br>
											<b>".$le->aef_sNom."</b> ".$le->aef_sPrenom;} ?></td>
											<td class="text-center"><?php echo $this->md_config->affDateTimeFr($le->aef_dDate);?></td>
											<td class="text-center"><?php echo $le->per_sNom.'</b> '.$le->per_sPrenom ; ?></td>
											<td class="text-center">
												<a href="javascript:();"><i class="fa fa-print" style="font-size:40px"></i></a>
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