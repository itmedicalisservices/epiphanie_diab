<?php 
	include(dirname(__FILE__) . '/../includes/header.php');


	// $date = new DateTime();
    // $premier = $date->format('Y-m-01');
	// $dernier = $date->format('Y-m-t');    
	
	$premier = date('Y-m-d');
	$dernier = NULL;

	$liste = $this->md_patient->liste_compteur_acte($premier, $dernier);
	

?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Compteur des actes médicaux</h2>
            <small class="text-muted"></small>
			<?php //var_dump($liste);?>
        </div>
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Période</h2>
					</div>
					<div class="body">
						<form id="form-cpt-acte">
							<div class="row clearfix">
								<div class="col-sm-5">
									<div class="form-group">
										Du<input type="text" name="premierJour" id="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date debut">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Au<input type="text" name="dernierJour" id="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date fin">
									</div>
								</div>
	
								<div class="col-sm-2">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="valcptacte">Valider</button>
								</div>
							</div>
						</form>
						<span class="valcptacte"></span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row clearfix" id="affichecptact">

			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px;">
						   
							<thead>	
								<tr align="center">
									<td><b>Date & Heure</b></td>
									<td><b>Acte Médical</b></td>
									<td><b>Patient</b></td>
									<td><b>Auteur</b></td>
								</tr>
							</thead>
							<tbody>
							<?php if(empty($liste)){echo '<tr><td colspan="6"><em>Aucune donnée disponible !</em></td></tr>';}else{ foreach($liste AS $l){ ?>
								<tr align="center">
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($l->aco_dDateTime),2); ?></b>
									</td>
									<td>
										<b><?php $act = $this->md_parametre->recup_act($l->lac_id); echo $act->lac_sLibelle; ?></b> 
									</td>								
									<td>
										<b><?php $pat = $this->md_patient->recup_patient($l->pat_id);echo $pat->pat_sNom.' '.$pat->pat_sPrenom; ?></b> 
									</td>								
									<td>
										<b><?php $per = $this->md_personnel->recup_personnel($l->per_id);echo $per->per_sNom.' '.$per->per_sPrenom; ?></b>
									</td>
								</tr>
							<?php }}  ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="center" colspan="5"><b style="font-weight:900">NOMBRE TOTAL D'ACTES: <?php echo count($liste); ?> </b></td>
								</tr>
							</tfoot>
						</table>
                    </div>
                </div>
            </div>
			
        </div>
            
        </div> 
        
	</div>

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>