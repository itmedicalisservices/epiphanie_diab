
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = date("Y-m-d",$maDate). "\n";

	$NbrePatPer  = $this->md_patient->liste_stats_patient_encours($delai,date('Y-m-d'));
	// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
	$NbrePatDec  = $this->md_patient->stats_nombre_deces_encours($delai,date('Y-m-d'));
	$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($delai,date('Y-m-d'));
	// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
	$NbrePDiag  = $this->md_patient->stats_diagnostiques_encours($delai,date('Y-m-d'));
	$diagnostique = $this->md_patient->stats_diagnostiques($delai,date('Y-m-d'));
	$statService = $this->md_patient->stats_services($delai,date('Y-m-d'));
	$st = $this->md_patient->liste_maladie_retenue();
	
	
// $aujourdhui = date("Y-m-d");

// $maDateMoinun = strtotime($aujourdhui."- 365 days");
// $moinsun = date("Y-m-d",$maDateMoinun). "\n";

// $maDate14 = strtotime($aujourdhui."- 1460 days");
// $m14 = date("Y-m-d",$maDate14). "\n";

// $maDate514 = strtotime($aujourdhui."- 5110 days");
// $m514 = date("Y-m-d",$maDate514). "\n";

// $maDate1549 = strtotime($aujourdhui."- 17885 days");
// $m1549 = date("Y-m-d",$maDate1549). "\n";

// $maDate50plus = strtotime($aujourdhui."- 18250 days");
// $m50plus = date("Y-m-d",$maDate50plus). "\n";

// $date1 = '2019-02-25';
// $date2 = '2019-09-27';
// $resf = $this->md_patient->rapport_maladie_1_a_49_cas_femme(2,$m1549,$m514,$date1,$date2);
// $resh = $this->md_patient->rapport_maladie_1_a_49_cas_homme(2,$m1549,$m514,$date1,$date2);

?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Consultation externe</h2>
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
						<form id="rapport-epidem" action="<?php echo site_url("impression/consultation_externe"); ?>" method="post">
							<div class="row clearfix">
								<div class="col-sm-10 retour">
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Du<input type="date" name="premierJour" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Au<input type="date" name="dernierJour" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								
								<div class="col-sm-2">
								<br><br>
									<button type="submit" class="btn btn-raised bg-blue-grey" id="epidem">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
            
        </div>
        
	</div>

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>