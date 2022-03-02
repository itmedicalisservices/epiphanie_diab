<?php 

	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = date("Y-m-d",$maDate). "\n";
	
	$NbrePatPer  = $this->md_patient->liste_stats_patient_encours(false,date('Y-m-d'));
	// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
	$NbrePatDec  = $this->md_patient->stats_nombre_deces_encours($delai,date('Y-m-d'));
	$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($delai,date('Y-m-d'));
	// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
	$NbrePDiag  = $this->md_patient->stats_diagnostiques_encours($delai,date('Y-m-d'));
	$diagnostique = $this->md_patient->stats_diagnostiques($delai,date('Y-m-d'));
	$statService = $this->md_patient->stats_services(false,date('Y-m-d'));
?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Résultat d'accueil</h2>
            <small class="text-muted"></small>
        </div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Statistiques sur l'activité médicale</h2>
						
					</div>
					<div class="body">
						<form id="statistique">
							<div class="row clearfix">
								<div class="col-sm-2">
									<div class="form-group">
										Du<input type="text" name="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										Au<input type="text" name="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group drop-custum">
										<label>* Age minimal</label>
										<select name="ageMinimal" class="form-control obligatoire show-tick">
											<option value="">-- Sélectionner --</option>
											<?php for ($i=0; $i<=100; $i++) {?>
											<option value="<?php echo $i;?>" class="drop-custum"><?php echo $i;?></option>
											<?php  } ?>
										</select>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group drop-custum">
									<label>* Age maximal</label>
										<select name="ageMaximal" class="form-control obligatoire show-tick">
											<option value="">-- Sélectionner --</option>
											<?php for ($i=0; $i<=100; $i++) {?>
											<option value="<?php echo $i;?>" class="drop-custum"><?php echo $i;?></option>
											<?php  } ?>
										</select>
									</div>	
								</div>
								<div class="col-sm-2">
									<div class="form-group drop-custum">
									<label>* Genre</label>
										<select name="genre" class="form-control obligatoire show-tick">
											<option value="">Tous</option>
											<option value="H">Homme</option>
											<option value="F">Femme</option>
										</select>
									</div>
								</div>
	
								<div class="col-sm-2">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="valider">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		 <div class="row clearfix" id="affiche">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">

                    <div class="content">
                        <div class="text">Nombre de patients reçu</div>
                        <div class="number"><?php echo $NbrePatPer->nb;?> </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="content">
                        <div class="text">nombre de cas de décès</div>
                        <div class="number"><?php echo $NbrePatDec->nb;?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="content">
                        <div class="text">nombre de naissance déclarée</div>
                        <div class="number"><?php echo $NbrePatNais->nb;?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-6 col-md-6 col-sm-6" style="height:auto">
                <div class="info-box-4 hover-zoom-effect" style="height:auto">
                    <div class="content">
                        <div class="text">Nombre d'actes enregistrés à la caisse</div>
						<?php foreach ($statService AS $s) {?>
							<div class="text"><?php echo $s->ser_sLibelle; ?> <span class="pull-right"><?php echo $s->nb; ?></span></div>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" style="height:auto">
                <div class="info-box-4 hover-zoom-effect" style="height:auto; width:100%">
                    <div class="content">
                        <div class="text">statistique des diagnostiques</div>
						<?php foreach ($diagnostique AS $d) {?>
							<div class="text"><?php echo $d->mal_sLibelle; ?> <span class="pull-right"><?php echo $d->nb; ?></span></div>
						<?php } ?>
                    </div>
                </div>
            </div> 
			
        </div>

	</div>

</section>