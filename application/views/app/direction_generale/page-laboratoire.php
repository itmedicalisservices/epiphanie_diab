
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = date("Y-m-d",$maDate). "\n";
		
	$listeActeLabo = $this->md_parametre->liste_acts_laboratoires_actifs();
		
 ?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Résultat des statistiques du laboratoire</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="body">
						<form id="stat-laboratoire">
							<div class="row clearfix">
								<div class="col-sm-5">
									<div class="form-group">
										Du<input type="text" name="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Au<input type="text" name="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-2">
								<br><br>
									<button type="submit" class="btn btn-raised bg-blue-grey" id="rapport">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        <div class="row clearfix" id="afficherapport">
            
			<div class="col-lg-6 col-md-6 col-sm-6" style="height:auto">
                <div class="info-box-4 hover-zoom-effect" style="height:auto; width:100%">
                    <div class="content">
                        <div class="text">Nombre d'examens réalisés </div>
						<?php
						foreach($listeActeLabo AS $r){
							$nb=$this->md_laboratoire->recup_rapport_laboratoire($r->lac_id,$delai,$fait);
							echo '<div class="text">'.$r->lac_sLibelle.'  -> <span class="pull-right">'.$nb->nb.'</span></div>';
						}?>
                   </div>
                </div>
            </div>
			
			<!--
			<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Nombre d'élements distribués par réactif</div>
						<?php 
					//	foreach($listeActeLabo AS $r){
						//	$nbEx = $this->md_laboratoire->recup_nombre_element($r->lac_id,$delai,$fait);
						//	echo '<div class="number"><small>'.$r->lac_sLibelle.' '.$nbEx->nb.'</small></div>';
						//} ?>
                   </div>
                </div>
            </div>
			-->
        </div>
	</div>

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>