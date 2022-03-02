
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = date("Y-m-d",$maDate). "\n";
	$montant = $this->md_patient->montant($delai,$fait);
	$montant_assurance = $this->md_patient->montant_assurance($delai,$fait);
	$montant_patient = $this->md_patient->montant_patient($delai,$fait);
	$montant_service = $this->md_patient->montant_service($delai,$fait);
	$depose =$montant->paye;
	
	$acte = $this->md_patient->montant_par_acte_recette($delai,$fait);
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="parActeNumeroCpt">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="row clearfix" id="afficheMontantNumCpt">
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par acte & par Numéro de compte</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table id="example" class="table table-hover">
								<thead>
									<tr>
										<th style="width:130px">Numéro compte</th>
										<th>Acte médical</th>
										<th>Montant généré</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($acte AS $a){ ?>
									<tr>
										<td><strong><?php if($a->cpt_id==NULL){echo '<em>Pas renseigné</em>';}else{$actesous = $this->md_patient->montant_par_acte_recette_sous($a->cpt_id,$delai,$fait); $rep = $this->md_recette->recup_lib_compte_recette($a->cpt_id); echo $rep->cpt_iNumero;}; ?></strong></td>
										<td><?php if(isset($rep)){ if($rep->cpt_iNumero==70619){echo '<strong>Actes Chirurgicaux : <a title="voir les détails des actes chirurgicaux" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine"> voir détails </a></strong>';
										
										echo '<div class="" id="accordion_1" role="tablist" aria-multiselectable="true">

												<div id="collapseNine" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
													<div class="panel-body"> 
														<div class="row">';	
												foreach($actesous AS $as){ 
										echo '
												<li style="width:100%;margin-left:4%;margin-right:4%;"><span style="color:#4f7ca0">'.$as->lac_sLibelle.' : '.'</span><span style="float:right;color:#4f7ca0;color:#4f7ca0">'.number_format($as->montant,0,",",".").' Fcfa'.'</span></li>
											';
											};
										echo '			</div>		
													</div>
												</div>
										</div>';
											}elseif($rep->cpt_iNumero==70618){echo '<strong>Actes Stomatologiques : <a role="button" data-toggle="collapse" data-parent="#accordion_1" title="voir les détails des actes stomatologiques" href="#collapseNine_1" aria-expanded="true" aria-controls="collapseNine_1"> voir détails </a></strong>';
											
											echo '<div class="" id="accordion_1" role="tablist" aria-multiselectable="true">

												<div id="collapseNine_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
													<div class="panel-body"> 
														<div class="row">';
											
											foreach($actesous AS $as){ 
										echo '
												<li style="width:100%;margin-left:4%;margin-right:4%;"><span style="color:#4f7ca0">'.$as->lac_sLibelle.' : '.'</span><span style="float:right;color:#4f7ca0">'.number_format($as->montant,0,",",".").' Fcfa'.'</span></li> 
											';
											};
										echo '				</div>		
													</div>
												</div>
										
										</div>';
											}
										
										else{ echo '<strong>'.$a->lac_sLibelle.'<strong>';};}else{echo '<strong>'.$a->lac_sLibelle.'<strong>';}; ?></td>
										<th><?php echo number_format($a->montant,0,",","."); ?> <small> Fcfa</small></th>
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
							<h2>Montant à recouvrir aux assurances</h2>
							
						</div>
						<div class="body table-responsive" id="afficheMontantAss">
							<div class="row">
								<?php foreach($montant_assurance AS $m){ ?>
								<div class="col-md-10"><?php echo $m->ass_sLibelle; ?><span class="pull-right"><?php echo number_format($m->mtAssurance,2,",","."); ?> <small>FCFA</small></span></div>
								<div class="col-md-2"><a href="<?php echo site_url("caisse/recouvrementAssurance/".$m->ass_id); ?>"><i class="fa fa-arrow-right"></i></a></div>
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
							<h2>Montant à recouvrir chez les clients</h2>
							
						</div>
						<div class="body table-responsive" id="afficheMontantPat">
							<div class="row">
								<?php foreach($montant_patient AS $m){ ?>
								<div class="col-md-5"><?php echo $m->pat_sNom." ".$m->pat_sPrenom; ?></div>
								<div class="col-md-6">(<?php echo $m->pat_sMatricule ?>)<span class="pull-right"><?php echo number_format($m->dette,2,",","."); ?> <small>FCFA</small></span></div>
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

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>