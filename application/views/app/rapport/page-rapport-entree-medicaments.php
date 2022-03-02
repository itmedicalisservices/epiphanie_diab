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

    $liste = $this->md_pharmacie->liste_entrees_medicament($premier,$dernier);     
?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Rapport d'entree de medicaments</h2>
            <small class="text-muted"></small>
        </div>
		
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
                        <h2 class="header h4"><a class="small" href="<?php echo site_url("impression/rapport_entree_medicaments/$premier/$dernier"); ?>">Imprimer</a></h2>
                        <div class="body table-responsive"> 
                            <div class="text-center" style="color:red"></div>
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr> 
                                            <th class="text-center" rowspan="2">N° (1)</th>
                                            <th class="text-center" rowspan="2">Désignation (2)</th>
                                            <th class="text-center" rowspan="2">Dosage (3)</th>
                                            <th class="text-center" rowspan="2">Présentation (4)</th>
                                            <th class="text-center" colspan="2">Quantité (5)</th>
                                            <th class="text-center" rowspan="2">Prix unitaire (6)</th>
                                            <th class="text-center" rowspan="2">Code total d'achat (7)</th>
                                            <th class="text-center" rowspan="2">Date de péremtion (8)</th>
                                            <th class="text-center" rowspan="2">Origine (CSS, COMEG, Don) (9)</th>
                                            <th class="text-center" rowspan="2">Observation (10)</th>
                                        </tr>
                                        <tr> 
                                            <th class="text-center">Report stock restant</th>
                                            <th class="text-center">Stock récéptionnée</th>
                                        </tr>
                                    </thead>
                                    <tbody class="corps">
                                        <?php $cpt=1; 
                                        $som_1=0;$som_2=0; $som_3=0;$som_4=0;$som_5=0;
                                        $som_6=0;$som_7=0; $som_8=0;$som_9=0;$som_10=0;
                                        $som_11=0;$som_12=0; $som_13=0;$som_14=0;$som_15=0;
                                        $som_16=0;$som_17=0; $som_18=0;$som_19=0;$som_20=0;

                                        foreach($liste AS $l) {?>
                                        <tr> 
                                            <td align="center">
                                                <?php if(strlen($cpt)==1){
                                                        echo '0'.$cpt++;
                                                    }else{
                                                        echo $cpt++;
                                                    }
                                                ;?>
                                            </td>
                                            <td><?php echo strtoupper($l->med_sNc) ?></td>
                                            <td align="center"><?php echo $l->med_iDosage.' '.$l->med_sUnite?></td>
                                            <td align="center"><?php echo $l->for_sLibelle?></td>
                                            <td align="center"><?php echo $l->ach_iQte?></td>
                                            <td align="center"><?php echo $l->dac_iQte?></td>
                                            <td align="center"><?php echo $l->dac_iPrixAchat?></td>
                                            <td align="center"><?php echo $l->dac_iPrixTotalAchat?></td>
                                            <td align="center"><?php echo $l->dac_dDateExpiration?></td>
                                            <td><?php echo $l->frs_sEnseigne?></td>
                                            <td align="center"><?php ?></td>
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

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>