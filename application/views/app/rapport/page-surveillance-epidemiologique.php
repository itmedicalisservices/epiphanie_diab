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
	
$liste = $this->md_patient->liste_maladie_retenue($premier,$dernier); 
$liste2 = $this->md_patient->liste_hospitalisation1($premier,$dernier); 
$aujourdhui = date("Y-m-d");

$maDateMoinun = strtotime($aujourdhui."- 365 days");
$moinsun = date("Y-m-d",$maDateMoinun). "\n";

$maDate14 = strtotime($aujourdhui."- 1460 days");
$m14 = date("Y-m-d",$maDate14). "\n";

$maDate514 = strtotime($aujourdhui."- 5110 days");
$m514 = date("Y-m-d",$maDate514). "\n";

$maDate1549 = strtotime($aujourdhui."- 17885 days");
$m1549 = date("Y-m-d",$maDate1549). "\n";

$maDate50plus = strtotime($aujourdhui."- 18250 days");
$m50plus = date("Y-m-d",$maDate50plus). "\n";

?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Surveillance Epidemiologique de maladies cibles</h2>
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

                        <h2 class="header h4">1. Rélévé Mensuel de Survellance Epidemiologique de maladies cibles
						<br><a class="small" href="<?php echo site_url("impression/rapport_epidemiologie/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive"> 
							<table id="example1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th  class="text-center" rowspan="4">N° (1)</th>
										<th  class="text-center" rowspan="4">Maladie (2)</th>
										<th  class="text-center" style="background:rgb(255,149,149)" rowspan="4" >Code CIM (3)</th>
										<th  class="text-center" colspan="24">Cas et décès par tranche d'âge et sexe (4)</th>
										<th  class="text-center" colspan="2" rowspan="2">Total général (5)</th>
										<th  class="text-center" rowspan="4">Observations (6)</th>
									</tr>
									<tr> 
										<th class="text-center" colspan="4">-1 an</th>
										<th class="text-center" colspan="4">1 - 4 ans</th>
										<th class="text-center" colspan="4">5 - 14 ans</th>
										<th class="text-center" colspan="4">15 - 49 ans</th>
										<th class="text-center" colspan="4">50 ans et +</th>
										<th class="text-center" colspan="4">Total</th>
									</tr>
									<tr> 
										<th class="text-center" colspan="2">Cas</th>
										<th class="text-center" colspan="2">Décès</th>
										<th class="text-center" colspan="2">cas</th>
										<th class="text-center" colspan="2">Décès</th>
										<th class="text-center" colspan="2">Cas</th>
										<th class="text-center" colspan="2">Décès</th>
										<th class="text-center" colspan="2">Cas</th>
										<th class="text-center" colspan="2">Décès</th>
										<th class="text-center" colspan="2">Cas</th>
										<th class="text-center" colspan="2">Décès</th>
										<th class="text-center" colspan="2">Cas</th>
										<th class="text-center" colspan="2">Décès</th>
										<th class="text-center" >Cas</th>
										<th class="text-center" >Décès</th>
									</tr>
									<tr> 
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th></th>
										<th></th>
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
										<td style="font-size:11.5px;" align="center">
											<?php 
												if(strlen($cpt)==1){
													echo '0'.$cpt++;
												}else{
													echo $cpt++;
												}
											;?>
										</td>
										<td><?php echo $l->sma_sLibelle?></td>
										<td style="background:rgb(255,149,149)" align="center"><!--D143--></td>
										<td align="center"><?php $chmoisun = $this->md_patient->rapport_maladie_moin_1_cas_homme($l->sma_id,$moinsun);echo $chmoisun->nb;$som_1=$som_1+$chmoisun->nb;?></td>
										<td align="center"><?php $cfmoisun = $this->md_patient->rapport_maladie_moin_1_cas_femme($l->sma_id, $moinsun); echo $cfmoisun->nb;$som_2=$som_2+$cfmoisun->nb;?></td>
										<td align="center"><?php $dhmoisun = $this->md_patient->rapport_maladie_moin_1_deces_homme($l->sma_id,$moinsun); echo $dhmoisun->nb;$som_3=$som_3+$dhmoisun->nb;?></td>
										<td align="center"><?php $dfmoisun = $this->md_patient->rapport_maladie_moin_1_deces_femme($l->sma_id,$moinsun); echo $dfmoisun->nb;$som_4=$som_4+$dfmoisun->nb;?></td>
										<td align="center"><?php $ch14 = $this->md_patient->rapport_maladie_1_a_49_cas_homme($l->sma_id,$m14,$moinsun); echo $ch14->nb;$som_5=$som_5+$ch14->nb;?></td>
										<td align="center"><?php $cf14 = $this->md_patient->rapport_maladie_1_a_49_cas_femme($l->sma_id,$m14,$moinsun); echo $cf14->nb;$som_6=$som_6+$cf14->nb;?></td>
										<td align="center"><?php $dh14 = $this->md_patient->rapport_maladie_1_a_49_deces_homme($l->sma_id,$m14,$moinsun); echo $dh14->nb;$som_7=$som_7+$dh14->nb;?></td>
										<td align="center"><?php $df14 = $this->md_patient->rapport_maladie_1_a_49_deces_femme($l->sma_id,$m14,$moinsun); echo $df14->nb;$som_8=$som_8+$df14->nb;?></td>
										<td align="center"><?php $ch514 = $this->md_patient->rapport_maladie_1_a_49_cas_homme($l->sma_id,$m514,$m14 ); echo $ch514->nb;$som_9=$som_9+$ch514->nb;?></td>
										<td align="center"><?php $cf514 = $this->md_patient->rapport_maladie_1_a_49_cas_femme($l->sma_id,$m514,$m14 ); echo $cf514->nb;$som_10=$som_10+$cf514->nb;?></td>
										<td align="center"><?php $dh514 = $this->md_patient->rapport_maladie_1_a_49_deces_homme($l->sma_id,$m514,$m14); echo $dh514->nb;$som_11=$som_11+$dh514->nb;?></td>
										<td align="center"><?php $df514 = $this->md_patient->rapport_maladie_1_a_49_deces_femme($l->sma_id,$m514,$m14); echo $df514->nb;$som_12=$som_12+$df514->nb;?></td>
										<td align="center"><?php $ch1549 = $this->md_patient->rapport_maladie_1_a_49_cas_homme($l->sma_id,$m1549,$m514); echo $ch1549->nb;$som_13=$som_13+$ch1549->nb;?></td>
										<td align="center"><?php $cf1549 = $this->md_patient->rapport_maladie_1_a_49_cas_femme($l->sma_id,$m1549,$m514); echo $cf1549->nb; $som_14=$som_14+$cf1549->nb;?></td>
										<td align="center"><?php $dh1549 = $this->md_patient->rapport_maladie_1_a_49_deces_homme($l->sma_id,$m1549,$m514); echo $dh1549->nb;$som_15=$som_15+$dh1549->nb;?></td>
										<td align="center"><?php $df1549 = $this->md_patient->rapport_maladie_1_a_49_deces_femme($l->sma_id,$m1549,$m514); echo $df1549->nb;$som_16=$som_16+$df1549->nb;?></td>
										<td align="center"><?php $ch50plus = $this->md_patient->rapport_maladie_50_et_plus_cas_homme($l->sma_id,$m50plus); echo $ch50plus->nb;$som_17=$som_17+$ch50plus->nb;?></td>
										<td align="center"><?php $cf50plus = $this->md_patient->rapport_maladie_50_et_plus_cas_femme($l->sma_id,$m50plus); echo $cf50plus->nb;$som_18=$som_18+$cf50plus->nb;?></td>
										<td align="center"><?php $dh50plus = $this->md_patient->rapport_maladie_50_et_plus_deces_homme($l->sma_id); echo $dh50plus->nb;$som_19=$som_19+$dh50plus->nb;?></td>
										<td align="center"><?php $df50plus = $this->md_patient->rapport_maladie_50_et_plus_deces_femme($l->sma_id); echo $df50plus->nb;$som_20=$som_20+$df50plus->nb;?></td>
										<td align="center"><?php echo $chmoisun->nb + $ch14->nb + $ch514->nb + $ch1549->nb + $ch50plus->nb ;?></td>
										<td align="center"><?php echo $cfmoisun->nb + $cf14->nb + $cf514->nb + $cf1549->nb + $cf50plus->nb ;?></td>
										<td align="center"><?php echo $dhmoisun->nb + $dh14->nb + $dh514->nb + $dh1549->nb + $dh50plus->nb ;?></td>
										<td align="center"><?php echo $dfmoisun->nb + $df14->nb + $df514->nb + $df1549->nb + $df50plus->nb ;?></td>
										<td align="center"><?php echo $chmoisun->nb + $ch14->nb + $ch514->nb + $ch1549->nb + $ch50plus->nb + $cfmoisun->nb + $cf14->nb + $cf514->nb + $cf1549->nb + $cf50plus->nb;?></td>
										<td align="center"><?php echo $dhmoisun->nb + $dh14->nb + $dh514->nb + $dh1549->nb + $dh50plus->nb + $dfmoisun->nb + $df14->nb + $df514->nb + $df1549->nb + $df50plus->nb;?></td>
										<td ></td>
									</tr>
									<?php }?>
								</tbody>
								<tfoot>
									<tr>
										<td style="font-size:11.5px;font-weight:bold" colspan="2">Total</td>
										<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
										<td align="center"><?php echo $som_1 ;?></td>
										<td align="center"><?php echo $som_2 ;?></td>
										<td align="center"><?php echo $som_3 ;?></td>
										<td align="center"><?php echo $som_4 ;?></td>
										<td align="center"><?php echo $som_5 ;?></td>
										<td align="center"><?php echo $som_6 ;?></td>
										<td align="center"><?php echo $som_7 ;?></td>
										<td align="center"><?php echo $som_8 ;?></td>
										<td align="center"><?php echo $som_9 ;?></td>
										<td align="center"><?php echo $som_10 ;?></td>
										<td align="center"><?php echo $som_11 ;?></td>
										<td align="center"><?php echo $som_12 ;?></td>
										<td align="center"><?php echo $som_13 ;?></td>
										<td align="center"><?php echo $som_14 ;?></td>
										<td align="center"><?php echo $som_15 ;?></td>
										<td align="center"><?php echo $som_16 ;?></td>
										<td align="center"><?php echo $som_17 ;?></td>
										<td align="center"><?php echo $som_18 ;?></td>
										<td align="center"><?php echo $som_19 ;?></td>
										<td align="center"><?php echo $som_20 ;?></td>
										<td align="center"><?php echo $som_1 + $som_5 + $som_9 + $som_13 + $som_17 ;?></td>
										<td align="center"><?php echo $som_2 + $som_6 + $som_10 + $som_14 + $som_18 ;?></td>
										<td align="center"><?php echo $som_3 + $som_7 + $som_11 + $som_15 + $som_19 ;?></td>
										<td align="center"><?php echo $som_4 + $som_8 + $som_12 + $som_16 + $som_20 ;?></td>
										<td align="center"><?php echo $som_1 + $som_2 + $som_5 + $som_6 + $som_9 + $som_10 + $som_13 + $som_14 + $som_17 + $som_18 ;?></td>
										<td align="center"><?php echo $som_3 + $som_4 + $som_7 + $som_8 + $som_11 + $som_12 + $som_15 + $som_16 + $som_19 + $som_20 ;?></td>
										<td style="font-size:11.5px;"></td>
									</tr>
								</tfoot>
							</table>
						</div>

                        <h2 class="header h4 mt-5">2. Répatition des malades hospitalisé
						<br><a class="small" href="<?php echo site_url("impression/repartition_malade_hospitalises/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr> 
											<th  class="text-center" rowspan="4">N° (1)</th>
											<th  class="text-center" rowspan="4">Causes d'hospitalisation (2)</th>
											<th  class="text-center" style="background:rgb(255,149,149)" rowspan="4" >Code CIM (3)</th>
											<th  class="text-center" colspan="24">Cas et décès par tranche d'âge et sexe (4)</th>
											<th  class="text-center" colspan="2" rowspan="2">Total général (5)</th>
											<th  class="text-center" rowspan="4">Observations (6)</th>
										</tr>
										<tr> 
											<th class="text-center" colspan="4">-1 an</th>
											<th class="text-center" colspan="4">1 - 4 ans</th>
											<th class="text-center" colspan="4">5 - 14 ans</th>
											<th class="text-center" colspan="4">15 - 49 ans</th>
											<th class="text-center" colspan="4">50 ans et +</th>
											<th class="text-center" colspan="4">Total</th>
										</tr>
										<tr> 
											<th class="text-center" colspan="2">Cas</th>
											<th class="text-center" colspan="2">Décès</th>
											<th class="text-center" colspan="2">cas</th>
											<th class="text-center" colspan="2">Décès</th>
											<th class="text-center" colspan="2">Cas</th>
											<th class="text-center" colspan="2">Décès</th>
											<th class="text-center" colspan="2">Cas</th>
											<th class="text-center" colspan="2">Décès</th>
											<th class="text-center" colspan="2">Cas</th>
											<th class="text-center" colspan="2">Décès</th>
											<th class="text-center" colspan="2">Cas</th>
											<th class="text-center" colspan="2">Décès</th>
											<th class="text-center" >Cas</th>
											<th class="text-center" >Décès</th>
										</tr>
										<tr> 
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th>M</th>
											<th>F</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
                                    <tbody class="corps">
                                        <?php $cpt=1; 
                                        $som_1=0;$som_2=0; $som_3=0;$som_4=0;$som_5=0;
                                        $som_6=0;$som_7=0; $som_8=0;$som_9=0;$som_10=0;
                                        $som_11=0;$som_12=0; $som_13=0;$som_14=0;$som_15=0;
                                        $som_16=0;$som_17=0; $som_18=0;$som_19=0;$som_20=0;

                                        foreach($liste2 AS $l) { ?>
										<tr> 
											<td style="font-size:11.5px;text-align:center">
												<?php 
													if(strlen($cpt)==1){
														echo '0'.$cpt++;
													}else{
														echo $cpt++;
													}
												;?>
											</td>
											<td><?php echo $l->hos_sMotif?></td>
											<td style="background:rgb(255,149,149)" align="center"></td>
											<td align="center"><?php $chmoisun = $this->md_patient->repartition_malades_hospitalise_moins_1_cas_homme($l->hos_sMotif,$moinsun); echo $chmoisun->nb; $som_1=$som_1+$chmoisun->nb; ?></td>
											<td align="center"><?php $cfmoisun = $this->md_patient->repartition_malades_hospitalise_moins_1_cas_femme($l->hos_sMotif,$moinsun); echo $cfmoisun->nb; $som_2=$som_2+$cfmoisun->nb; ?></td>
											<td align="center"><?php $dhmoisun = $this->md_patient->repartition_malades_hospitalise_moins_1_deces_homme($l->hos_sMotif,$moinsun); echo $dhmoisun->nb; $som_3=$som_3+$dhmoisun->nb; ?></td>
											<td align="center"><?php $dfmoisun = $this->md_patient->repartition_malades_hospitalise_moins_1_deces_femme($l->hos_sMotif,$moinsun); echo $dfmoisun->nb; $som_4=$som_4+$dfmoisun->nb; ?></td>
											<td align="center"><?php $ch14 = $this->md_patient->repartition_malades_hospitalise_1_a_49_cas_homme($l->hos_sMotif,$m14,$moinsun); echo $ch14->nb; $som_5=$som_5+$ch14->nb; ?></td>
											<td align="center"><?php $cf14 = $this->md_patient->repartition_malades_hospitalise_1_a_49_cas_femme($l->hos_sMotif,$m14,$moinsun); echo $cf14->nb;$som_6=$som_6+$cf14->nb; ?></td>
											<td align="center"><?php $dh14 = $this->md_patient->repartition_malades_hospitalise_1_a_49_deces_homme($l->hos_sMotif,$m14,$moinsun); echo $dh14->nb;$som_7=$som_7+$dh14->nb; ?></td>
											<td align="center"><?php $df14 = $this->md_patient->repartition_malades_hospitalise_1_a_49_deces_femme($l->hos_sMotif,$m14,$moinsun); echo $df14->nb;$som_8=$som_8+$df14->nb; ?></td>
											<td align="center"><?php $ch514 = $this->md_patient->repartition_malades_hospitalise_1_a_49_cas_homme($l->hos_sMotif,$m514,$m14 ); echo $ch514->nb;$som_9=$som_9+$ch514->nb;?></td>
											<td align="center"><?php $cf514 = $this->md_patient->repartition_malades_hospitalise_1_a_49_cas_femme($l->hos_sMotif,$m514,$m14 ); echo $cf514->nb;$som_10=$som_10+$cf514->nb;?></td>
											<td align="center"><?php $dh514 = $this->md_patient->repartition_malades_hospitalise_1_a_49_deces_homme($l->hos_sMotif,$m514,$m14 ); echo $dh514->nb;$som_11=$som_11+$dh514->nb;?></td>
											<td align="center"><?php $df514 = $this->md_patient->repartition_malades_hospitalise_1_a_49_deces_femme($l->hos_sMotif,$m514,$m14 ); echo $df514->nb;$som_12=$som_12+$df514->nb;?></td>
											<td align="center"><?php $ch1549 = $this->md_patient->repartition_malades_hospitalise_1_a_49_cas_homme($l->hos_sMotif,$m1549,$m514); echo $ch1549->nb;$som_13=$som_13+$ch1549->nb;?></td>
											<td align="center"><?php $cf1549 = $this->md_patient->repartition_malades_hospitalise_1_a_49_cas_femme($l->hos_sMotif,$m1549,$m514); echo $cf1549->nb;$som_14=$som_14+$cf1549->nb;?></td>
											<td align="center"><?php $dh1549 = $this->md_patient->repartition_malades_hospitalise_1_a_49_deces_homme($l->hos_sMotif,$m1549,$m514); echo $dh1549->nb;$som_15=$som_15+$dh1549->nb;?></td>
											<td align="center"><?php $df1549 = $this->md_patient->repartition_malades_hospitalise_1_a_49_deces_femme($l->hos_sMotif,$m1549,$m514); echo $df1549->nb;$som_16=$som_16+$df1549->nb;?></td>
											<td align="center"><?php $ch50plus = $this->md_patient->repartition_malades_hospitalise_50_et_plus_cas_homme($l->hos_sMotif,$m50plus); echo $ch50plus->nb;$som_17=$som_17+$ch50plus->nb;?></td>
											<td align="center"><?php $cf50plus = $this->md_patient->repartition_malades_hospitalise_50_et_plus_cas_femme($l->hos_sMotif,$m50plus); echo $cf50plus->nb;$som_18=$som_18+$cf50plus->nb;?></td>
											<td align="center"><?php $dh50plus = $this->md_patient->repartition_malades_hospitalise_50_et_plus_deces_homme($l->hos_sMotif,$m50plus); echo $dh50plus->nb;$som_19=$som_19+$dh50plus->nb;?></td>
											<td align="center"><?php $df50plus = $this->md_patient->repartition_malades_hospitalise_50_et_plus_deces_femme($l->hos_sMotif,$m50plus); echo $df50plus->nb;$som_20=$som_20+$df50plus->nb;?></td>
											<td align="center"><?php echo $chmoisun->nb + $ch14->nb + $ch514->nb + $ch1549->nb + $ch50plus->nb ;?></td>
											<td align="center"><?php echo $cfmoisun->nb + $cf14->nb + $cf514->nb + $cf1549->nb + $cf50plus->nb ;?></td>
											<td align="center"><?php echo $dhmoisun->nb + $dh14->nb + $dh514->nb + $dh1549->nb + $dh50plus->nb ;?></td>
											<td align="center"><?php echo $dfmoisun->nb + $df14->nb + $df514->nb + $df1549->nb + $df50plus->nb ;?></td>
											<td align="center"><?php echo $chmoisun->nb + $ch14->nb + $ch514->nb + $ch1549->nb + $ch50plus->nb + $cfmoisun->nb + $cf14->nb + $cf514->nb + $cf1549->nb + $cf50plus->nb;?></td>
											<td align="center"><?php echo $dhmoisun->nb + $dh14->nb + $dh514->nb + $dh1549->nb + $dh50plus->nb + $dfmoisun->nb + $df14->nb + $df514->nb + $df1549->nb + $df50plus->nb;?></td>
											<td style="font-size:11.5px;"></td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<td style="font-weight:bold" colspan="2">Total</td>
											<td style="background:rgb(255,149,149)" align="center"></td>
											<td align="center"><?php echo $som_1 ;?></td>
											<td align="center"><?php echo $som_2 ;?></td>
											<td align="center"><?php echo $som_3 ;?></td>
											<td align="center"><?php echo $som_4 ;?></td>
											<td align="center"><?php echo $som_5 ;?></td>
											<td align="center"><?php echo $som_6 ;?></td>
											<td align="center"><?php echo $som_7 ;?></td>
											<td align="center"><?php echo $som_8 ;?></td>
											<td align="center"><?php echo $som_9 ;?></td>
											<td align="center"><?php echo $som_10 ;?></td>
											<td align="center"><?php echo $som_11 ;?></td>
											<td align="center"><?php echo $som_12 ;?></td>
											<td align="center"><?php echo $som_13 ;?></td>
											<td align="center"><?php echo $som_14 ;?></td>
											<td align="center"><?php echo $som_15 ;?></td>
											<td align="center"><?php echo $som_16 ;?></td>
											<td align="center"><?php echo $som_17 ;?></td>
											<td align="center"><?php echo $som_18 ;?></td>
											<td align="center"><?php echo $som_19 ;?></td>
											<td align="center"><?php echo $som_20 ;?></td>
											<td align="center"><?php echo $som_1 + $som_5 + $som_9 + $som_13 + $som_17 ;?></td>
											<td align="center"><?php echo $som_2 + $som_6 + $som_10 + $som_14 + $som_18 ;?></td>
											<td align="center"><?php echo $som_3 + $som_7 + $som_11 + $som_15 + $som_19 ;?></td>
											<td align="center"><?php echo $som_4 + $som_8 + $som_12 + $som_16 + $som_20 ;?></td>
											<td align="center"><?php echo $som_1 + $som_2 + $som_5 + $som_6 + $som_9 + $som_10 + $som_13 + $som_14 + $som_17 + $som_18 ;?></td>
											<td align="center"><?php echo $som_3 + $som_4 + $som_7 + $som_8 + $som_11 + $som_12 + $som_15 + $som_16 + $som_19 + $som_20 ;?></td>
											<td></td>
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

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>