<?php 
	
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = NULL;
	$montant = $this->md_patient->montant($delai,$fait);
	$montant_assurance = $this->md_patient->montant_assurance($delai,$fait,0);
	$mtAssurance = 0;
	foreach($montant_assurance AS $as){
		$mtAssurance += $as->mtAssurance;
	}
	$montant_patient = $this->md_patient->montant_patient($delai,$fait);
	$montant_service = $this->md_patient->montant_service($delai,$fait);
	$depose =$montant->paye;
 ?>

 
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Résultats Financiers</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Statistiques de caisse</h2>
						
					</div>
					<div class="body">
						<form id="stat-caisse">
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="valider">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="row clearfix" id="afficheMontant">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Montant encaissé</div>
                        <div class="number"><?php echo number_format($depose,0,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
			
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-assurance"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant pour les assurances</div>
                        <div class="number">
							<?php echo number_format($mtAssurance ,0,",","."); ?> <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>			
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Pertes (Réduction)</div>
                        <div class="number">
							<?php echo number_format($montant->perte ,0,",","."); ?> <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
            <!--
			 <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"><a href="<?php echo  site_url("facture/impaye"); ?>"> <i class="fa fa-arrow-right"></i></a> </div>
                    <div class="content">
                        <div class="text">Nombre de factures impayés</div>
                        <div class="number"><?php echo count($this->md_patient->liste_facture_impaye()); ?></div>
                    </div>
                </div>
            </div>
			
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-patient"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant à recouvrir chez les patients</div>
                        <div class="number">
							<?php echo number_format($montant->reste,0,",","."); ?> <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			-->
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par service</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th>Service</th>
										<th>Montant généré (fcfa)</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($montant_service AS $l){ ?>
									<tr>
										<td><?php echo $l->ser_sLibelle; ?></td>
										<th><?php echo number_format($l->montant,0,",","."); ?></th>
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


<!-- Large Size -->
<div class="modal fade" id="modalAssurance" tabindex="-1" role="dialog">
	<div class="modal-dialog default-modals" role="document" style="margin-top:20px;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel"></h4>
			</div>
			<div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Voir s'il y a des montants à recouvrir chez les assurances</h2>
						</div>
						<div class="body table-responsive" id="afficheMontantAss">
							<div class="row">
								<?php foreach($montant_assurance AS $m){ ?>
								<div class="col-md-10"><?php echo $m->ass_sLibelle; ?><span class="pull-right"><?php echo number_format($m->mtAssurance,0,",","."); ?> <small>FCFA</small></span></div>
								<div class="col-md-2"><a title="Voir" href="<?php echo site_url("caisse/recouvrementAssurance/".$m->ass_id); ?>"><i style="font-size:16px" class="fa fa-eye"></i></a></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>

<!-- Large Size -->
<div class="modal fade" id="clic-patient" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document" style="margin-top:20px;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel"></h4>
			</div>
			<div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Montant � recouvrir chez les clients</h2>
							
						</div>
						<div class="body table-responsive" id="afficheMontantPat">
							<div class="row">
								<?php foreach($montant_patient AS $m){ ?>
								<div class="col-md-5"><?php echo $m->pat_sNom." ".$m->pat_sPrenom; ?></div>
								<div class="col-md-6">(<?php echo $m->pat_sMatricule ?>)<span class="pull-right"><?php echo number_format($m->dette,0,",","."); ?> <small>FCFA</small></span></div>
								<div class="col-md-1"><a href="<?php echo site_url("caisse/recouvrementPatient/".$m->pat_id); ?>"><i class="fa fa-arrow-right"></i></a></div>
								<hr>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
 