<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	
	if($user->per_iTypeCompte==16){
		$ser = 43;
	}
	elseif($user->per_iTypeCompte==15){
		$ser = 4;
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
	
	$listeEncours = $this->md_patient->liste_acm_exploration(date("Y-m-d H:i:s"),$ser);

 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des actes reçus</h2>
								<?php //var_dump($listeEncours) ?>
							</div>
							<div class="body table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Patient</th>
											<th>Acte exploration fonctionnelle</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b> ('.$le->pat_sMatricule.')'; ?></td>
											<td><?php echo $le->lac_sLibelle ; ?></td>
											<td class="text-center">
												<a href="<?php echo site_url("exploration/patient_en_examen/".$le->aef_id); ?>"><b>Donner les résultats</b></a>
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