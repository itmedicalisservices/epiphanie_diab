
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
 
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
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Total produit en stock</div>
                        <div class="number"> <?php echo $sqs->total; ?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Valeur financière du stock (coût d'achat)</div>
                        <div class="number"><?php $achat = $vfas->total; echo number_format($achat,2,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Valeur financière du stock (vente)</div>
                        <div class="number"><?php $vente=$vfvs->total; echo number_format($vente,2,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon">  </div>
                    <div class="content">
                        <div class="text">Bénéfice en stock</div>
                        <div class="number"><?php echo number_format($vente - $achat,2,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>
        </div>
			
		 <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Bilan médicaments en stock</h2>
                       
                    </div>
                    <div class="body" style="max-height:400px;overflow:auto">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Désignation</th>
                                        <th>Qté stock</th>
                                        <th>Total achat <small>(Fcfa)</small></th>
                                        <th>Total vente <small>(Fcfa)</small></th>
                                        <th>Bénéfice prévu <small>(Fcfa)</small></th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($bilan_produit AS $bilan){ 
									$rp = $this->md_pharmacie->recup_produit($bilan->med_id);
								?>
                                    <tr>
                                        <td><?php echo $rp->med_sNc.' '.$rp->for_sLibelle.' '.$rp->med_iDosage.''.$rp->med_sUnite; ?></td>
										<td>
                                            <?php echo $bilan->quantite; ?>
                                        </td>
										<td>
                                            <?php echo number_format($bilan->achat,2,",","."); ?>
                                        </td>
										<td>
                                            <?php echo number_format($bilan->vente,2,",","."); ?>
                                        </td>
										<td>
                                            <?php echo number_format($bilan->vente - $bilan->achat,2,",","."); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
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

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>