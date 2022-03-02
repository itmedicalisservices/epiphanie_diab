<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = date("Y-m-d",$maDate). "\n";

	$date = new DateTime();
    $premier = $date->format('Y-m-01');
	$dernier = $date->format('Y-m-t');

	$data = $this->input->post();
		
	if (!empty($data['dernierJour']) || !empty($data['premierJour'])) {
		$premier = $data['premierJour'];
		$dernier = $data['dernierJour'];
    }

    $liste = $this->md_pharmacie->liste_entrees_avec_parametre($premier,$dernier); 

?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Indicateur hospitaliers</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<?php //var_dump($resf) ;?>
		<?php //var_dump($resh) ;?>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Rapport SNIS</h2>
					</div>
					<div class="body">
						<form id="rapport-epidem" action="" method="post">
							<div class="row clearfix">
								<div class="col-sm-10 retour">
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Du<input type="date" name="premierJour" value="<?php if(!empty($premier)){echo $premier;} ?>" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Au<input type="date" name="dernierJour" value="<?php if(!empty($dernier)){echo $dernier;} ?>" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								
								<div class="col-sm-2">
								<br><br>
									<button type="submit" class="btn btn-raised bg-blue-grey" id="epidem">Valider</button>
								</div>
							</div>
						</form>
						
                        <h2 class="header h4">1. Matériel Lourd
						<br><a class="small" href="<?php echo site_url("impression/csi_pmae_hopitaus_de_base/$premier/$dernier"); ?>">Imprimer</a></h2>						
						<div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr> 
                                        <th rowspan="2">Désignation</th>
                                        <th class="text-center" colspan="3">Quantité</th>
                                        <th rowspan="2">Total</th>
                                    </tr>
                                    <tr> 
                                        <th>Bon</th>
                                        <th>En panne</th>
                                        <th>Hors d'usage</th>
                                    </tr>
                                </thead>
                                <tbody class="corps">
                                    <?php
                                    $eqLourd = $this->md_patient->liste_materiel_par_type("Matériel Lourd",$premier,$dernier); 
                                    foreach($eqLourd AS $eq) {?>
                                    <tr> 
                                        <td><?php echo $eq->mat_sLib; ?></td>
                                        <td align="center"><?php $Eq1 = $this->md_patient->nbEquipement($eq->mat_sLib,"Bon"); echo $Eq1->nb; ?></td>
                                        <td align="center"><?php $Eq2 = $this->md_patient->nbEquipement($eq->mat_sLib,"En panne"); echo $Eq2->nb; ?></td>
                                        <td align="center"><?php $Eq3 = $this->md_patient->nbEquipement($eq->mat_sLib,"Hors d'usage"); echo $Eq3->nb; ?></td>
                                        <td align="center"><?php echo $Eq1->nb + $Eq2->nb + $Eq3->nb; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
						</div>

						<h2 class="header h4 mt-5">2. Matériel médico-technique
						<br><a class="small" href="<?php echo site_url("impression/consultation_externe/$premier/$dernier"); ?>">Imprimer</a></h2>	

						<div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr> 
                                        <th rowspan="2">Désignation</th>
                                        <th class="text-center" colspan="3">Quantité</th>
                                        <th rowspan="2">Total</th>
                                    </tr>
                                    <tr> 
                                        <th>Bon</th>
                                        <th>En panne</th>
                                        <th>Hors d'usage</th>
                                    </tr>
                                </thead>
                                <tbody class="corps">
                                    <?php
                                    $eqMedico = $this->md_patient->liste_materiel_par_type("Matériel médico-technique",$premier,$dernier); 
                                    foreach($eqMedico AS $eq) {?>
                                    <tr> 
                                        <td><?php echo $eq->mat_sLib; ?></td>
                                        <td align="center"><?php $Eq1 = $this->md_patient->nbEquipement($eq->mat_sLib,"Bon"); echo $Eq1->nb; ?></td>
                                        <td align="center"><?php $Eq2 = $this->md_patient->nbEquipement($eq->mat_sLib,"En panne"); echo $Eq2->nb; ?></td>
                                        <td align="center"><?php $Eq3 = $this->md_patient->nbEquipement($eq->mat_sLib,"Hors d'usage"); echo $Eq3->nb; ?></td>
                                        <td align="center"><?php echo $Eq1->nb + $Eq2->nb + $Eq3->nb; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
						</div>

						<h2 class="header h4 mt-5">3. Matériel roulan
						<br><a class="small" href="<?php echo site_url("impression/activite_chirurgie/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
                            <table id="example_copy_1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr> 
                                        <th rowspan="2">Désignation</th>
                                        <th class="text-center" colspan="3">Quantité</th>
                                        <th rowspan="2">Total</th>
                                    </tr>
                                    <tr> 
                                        <th>Bon</th>
                                        <th>En panne</th>
                                        <th>Hors d'usage</th>
                                    </tr>
                                </thead>
                                <tbody class="corps">
                                    <?php
                                    $eqRoulan = $this->md_patient->liste_materiel_par_type("Matériel roulan",$premier,$dernier); 
                                    foreach($eqRoulan AS $eq) {?>
                                    <tr> 
                                        <td><?php echo $eq->mat_sLib; ?></td>
                                        <td align="center"><?php $Eq1 = $this->md_patient->nbEquipement($eq->mat_sLib,"Bon"); echo $Eq1->nb; ?></td>
                                        <td align="center"><?php $Eq2 = $this->md_patient->nbEquipement($eq->mat_sLib,"En panne"); echo $Eq2->nb; ?></td>
                                        <td align="center"><?php $Eq3 = $this->md_patient->nbEquipement($eq->mat_sLib,"Hors d'usage"); echo $Eq3->nb; ?></td>
                                        <td align="center"><?php echo $Eq1->nb + $Eq2->nb + $Eq3->nb; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
						</div>

						<h2 class="header h4 mt-5">4. Mobilier
						<br><a class="small" href="<?php echo site_url("impression/activite_radiologie/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
                            <table id="example_copy_2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr> 
                                        <th rowspan="2">Désignation</th>
                                        <th class="text-center" colspan="3">Quantité</th>
                                        <th rowspan="2">Total</th>
                                    </tr>
                                    <tr> 
                                        <th>Bon</th>
                                        <th>En panne</th>
                                        <th>Hors d'usage</th>
                                    </tr>
                                </thead>
                                <tbody class="corps">
                                    <?php
                                    $mobilier = $this->md_patient->liste_materiel_par_type("Mobilier",$premier,$dernier); 
                                    foreach($mobilier AS $eq) {?>
                                    <tr>
                                        <td><?php echo $eq->mat_sLib; ?></td>
                                        <td align="center"><?php $Eq1 = $this->md_patient->nbEquipement($eq->mat_sLib,"Bon"); echo $Eq1->nb; ?></td>
                                        <td align="center"><?php $Eq2 = $this->md_patient->nbEquipement($eq->mat_sLib,"En panne"); echo $Eq2->nb; ?></td>
                                        <td align="center"><?php $Eq3 = $this->md_patient->nbEquipement($eq->mat_sLib,"Hors d'usage"); echo $Eq3->nb; ?></td>
                                        <td align="center"><?php echo $Eq1->nb + $Eq2->nb + $Eq3->nb; ?></td>
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

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>