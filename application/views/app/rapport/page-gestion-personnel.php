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

    $liste = $this->md_parametre->liste_postes_actifs();    
?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion du personnel : <span class="small">Personnel par qualification, sexe et structure</span></h2>
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
                        <h2 class="header h4"><a class="small" href="<?php echo site_url("impression/gestion_du_personnel/$premier/$dernier"); ?>">Imprimer</a></h2>

                        <div class="body table-responsive"> 
                            <div class="text-center" style="color:red"></div>
                                <table id="example" class="table text-center table-bordered table-striped table-hover">
                                    <thead>
                                        <tr> 
                                            <th class="text-center" rowspan="2">Qualification (1)</th>
                                            <th class="text-center" colspan="2">Sexe (2)</th>
                                            <th class="text-center" rowspan="2">Observation (3)</th>
                                        </tr>
                                        <tr> 
                                            <th class="text-center">M</th>
                                            <th class="text-center">F</th>
                                        </tr>
                                    </thead>
                                    <tbody class="corps">
                                        <?php $cpt=1; 
                                        $som_1=0;$som_2=0; $som_3=0;$som_4=0;$som_5=0;

                                        foreach($liste AS $l) {?>
                                        <tr> 
                                            <td align="center"><?php echo $l->pst_sLibelle ?></td>
                                            <td align="center"><?php $nbPerH = $this->md_personnel->nb_complete_personnel_post($l->pst_id,"M"); echo $nbPerH->nb; $som_1 += $nbPerH->nb; ?></td>
                                            <td align="center"><?php $nbPerF = $this->md_personnel->nb_complete_personnel_post($l->pst_id,"F"); echo $nbPerF->nb; $som_2 += $nbPerF->nb ?></td>
                                            <td align="center"></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="font-size:11.5px;font-weight:bold">Total</td>
                                            <td style="font-size:11.5px;" align="center"><?php echo $som_1 ?></td>
                                            <td style="font-size:11.5px;" align="center"><?php echo $som_2 ?></td>
                                            <td style="font-size:11.5px;" align="center"></td>
                                        </tr>
                                    </tfoot>
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