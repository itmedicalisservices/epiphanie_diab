
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
	
	
	if($user->per_iTypeCompte==4){
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
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Montant encaissé</div>
                        <div class="number"><?php echo number_format($depose,2,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
			
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-assurance"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant à recouvrir aux assurances</div>
                        <div class="number">
							<?php echo number_format($montant->assurance,2,",","."); ?> <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
            
			 <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo  site_url("facture/impaye"); ?>"> <i class="fa fa-arrow-right"></i></a> </div>
                    <div class="content">
                        <div class="text">Nombre de factures impayés</div>
                        <div class="number"><?php echo count($this->md_patient->liste_facture_impaye()); ?></div>
                    </div>
                </div>
            </div>
			
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> </div>
                    <div class="content">
						<div class="icon"><a href="javascript:();" class="clic-patient"> <i class="fa fa-arrow-right"></i></a> </div>
                        <div class="text">Montant à recouvrir chez les patients</div>
                        <div class="number">
							<?php echo number_format($montant->reste,2,",","."); ?> <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			
			<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Point de caisse par service</h2>
						
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Service</th>
										<th>Montant généré</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($montant_service AS $l){ ?>
									<tr>
										<td><?php echo $l->ser_sLibelle; ?></td>
										<th><?php echo $l->montant; ?> <small>fcfa</small></th>
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
<?php 
}	
	elseif($user->per_iTypeCompte==7){
		
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

<?php 
}elseif($user->per_iTypeCompte==2){
	$bilan_produit = $this->md_pharmacie->bilan_medicament_stock();
	$vfvs = $this->md_pharmacie->valuer_financiere_vente_stock();
	$vfas = $this->md_pharmacie->valuer_financiere_achat_stock();
	$sqs = $this->md_pharmacie->somme_quantite_stock();
	$liste_produit_stock = $this->md_pharmacie->liste_entrees();
	
	$list = $this->md_pharmacie->recup_annee_vente();
?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Résultat des statistiques de la pharmacie</h2>
            <small class="text-muted"></small>
        </div>
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="body">
						<form id="stat-pharmacie">
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="statpharmacie">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
       
        <div class="row clearfix" id="affichestatpharmacie">
			 <div class="col-lg-2 col-md-2 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Total produit en stock</div>
                        <div class="number"> <?php echo $sqs->total; ?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Valeur financière du stock (coût d'achat)</div>
                        <div class="number"><?php $achat = $vfas->total; echo number_format($achat,2,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Valeur financière du stock (vente)</div>
                        <div class="number"><?php $vente=$vfvs->total; echo number_format($vente,2,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Bénéfice en stock</div>
                        <div class="number"><?php echo number_format($vente - $achat,2,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
        </div>
			


		
		<div class="row clearfix" >
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card" style="margin:0">
					<div class="header">
						<div class="row">
							<div class="col-md-9 text-right">
								Sélectionner l'année
							</div>
							<div class="col-md-3">
								<select class="form-control" name="annee" id="annee" style="border:1px solid #ccc">
									<?php foreach($list AS $l){ if(!is_null($l->dates)){?>
										<option value="<?php echo $l->dates;?>" <?php if($l->dates == date("Y")){echo "selected";} ?>><?php echo $l->dates;?></option>
									<?php }} ?>
								</select>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div id="chart">
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<div class="row">
								<div class="col-md-10">
									<h2>Etat sur le nombre de produits vendus par période</h2>
									<?php $listNbMois = $this->md_pharmacie->vente_annee(date("Y")); foreach($listNbMois AS $ls){ ?>
									<input type="hidden" class="mois" value="<?php echo $ls->mois; ?>" />
									<input type="hidden" class="nombre" value="<?php echo $ls->nb; ?>" />
									<?php }?>
								</div>
							</div>
							<div class="body">
								<canvas id="etat_vente" height="70"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<div class="row">
								<div class="col-md-10">
									<h2>Etat sur les ventes de médicaments par période</h2>
									<?php $listMontantMois = $this->md_pharmacie->vente_annee(date("Y")); foreach($listMontantMois AS $ls){ ?>
									<input type="hidden" class="mois_prix" value="<?php echo $ls->mois; ?>" />
									<input type="hidden" class="montant_prix" value="<?php echo $ls->montant; ?>" />
									<?php }?>
								</div>
								
							</div>
							<div class="body">
								<canvas id="etat_vente_prix" height="70"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php 
}elseif($user->per_iTypeCompte==3){


$NbrePatPer  = $this->md_patient->liste_stats_patient_encours($delai,date('Y-m-d'));
	// $NbrePatPerEntre  = $this->md_patient->liste_stats_patient($a, $b);
	$NbrePatDec  = $this->md_patient->stats_nombre_deces_encours($delai,date('Y-m-d'));
	$NbrePatNais  = $this->md_patient->stats_nombre_naissance_encours($delai,date('Y-m-d'));
	// $NbrePatDecEntre  = $this->md_patient->stats_nombre_deces($a, $b);
	$NbrePDiag  = $this->md_patient->stats_diagnostiques_encours($delai,date('Y-m-d'));
	$diagnostique = $this->md_patient->stats_diagnostiques($delai,date('Y-m-d'));
	$statService = $this->md_patient->stats_services($delai,date('Y-m-d'));

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
						<h2>Statistiques sur l'activité médical</h2>
						
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
                <div class="info-box-4 hover-zoom-effect">

                    <div class="content">
                        <div class="text">Nombre de patients reçu</div>
                        <div class="number"><?php echo $NbrePatPer->nb;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="content">
                        <div class="text">nombre de cas de décès</div>
                        <div class="number"><?php echo $NbrePatDec->nb;?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="content">
                        <div class="text">nombre de naissance déclarée</div>
                        <div class="number"><?php echo $NbrePatNais->nb;?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-6 col-md-6 col-sm-6" style="height:auto">
                <div class="info-box-4 hover-zoom-effect" style="height:auto">
                    <div class="content">
                        <div class="text">Nombre de patients reçu par service</div>
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

<?php 
}elseif($user->per_iTypeCompte==10){
/* Personnel medical */
	$articleTotauxPms  = count($this->md_personnel->nb_personnel_medical());
/* personnel non medical */
	$articleTotauxPns  = count($this->md_personnel->nb_personnel_non_medical());
/* personnel medico-technique */
	$articleTotauxPts  = count($this->md_personnel->nb_complete_medico_technique());
	
/* tout le monde */
	$articleTotauxLps  = count($this->md_personnel->nb_complete_personnel());
	
$liste = $this->md_parametre->liste_specialites_actifs();
$listeSer = $this->md_parametre->liste_services_actifs();
?>


<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Statistiques sur le personnel, pour un total de <?php echo $articleTotauxLps; ?></h2>
            <small class="text-muted"></small>
        </div>
       
        <div class="row clearfix">
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Personnel médical</div>
                        <div class="number">Total <?php echo $articleTotauxPms; ?> <input type="hidden" id="pm" value="<?php echo $articleTotauxPms; ?>"/></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Personnel médico-technique</div>
                        <div class="number">Total <?php echo $articleTotauxPts; ?> <input type="hidden" id="pmt" value="<?php echo $articleTotauxPts; ?>"/></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Personnel non médical</div>
                        <div class="number">Total <?php echo $articleTotauxPns; ?> <input type="hidden" id="pnm" value="<?php echo $articleTotauxPns; ?>"/></div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="row clearfix">
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Nombre d'employés par qualification</h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Qualification</th>
                                        <th>Nombre d'employés</th>
                                        <th>Nombre de docteur</th>
                                        <th>Nombre de professeur</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($listeSer AS $s){ //$per = $this->md_personnel->liste_personnel_specialite($l->spt_id); ?>
                                    <tr>
                                        <td><?php echo $s->ser_sLibelle; ?></td>
                                        <th><?php $recupPer = $this->md_personnel->personnel_service($s->ser_id); echo $recupPer->nb; ?></th>
                                        <th><?php $recupDoc = $this->md_personnel->docteur_service($s->ser_id); echo $recupDoc->nb; ?></th>
                                        <th><?php $recupProf = $this->md_personnel->professeur_service($s->ser_id); echo $recupProf->nb; ?></th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="row clearfix">
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Nombre d'employés par spécialité</h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="example_copy" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>spécialité</th>
                                        <th>Nombre d'employés</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($liste AS $l){ $per = $this->md_personnel->liste_personnel_specialite($l->spt_id); ?>
                                    <tr>
                                        <td><?php echo $l->spt_sLibelle; ?></td>
                                        <th><?php echo  count($per); ?></th>
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

<?php 	
}
?>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>