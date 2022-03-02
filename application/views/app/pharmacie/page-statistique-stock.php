<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$bilan_produit = $this->md_pharmacie->bilan_medicament_stock();
	$vfvs = $this->md_pharmacie->valuer_financiere_vente_stock();
	$vfas = $this->md_pharmacie->valuer_financiere_achat_stock();
	$sqs = $this->md_pharmacie->somme_quantite_stock();
	$liste_produit_stock = $this->md_pharmacie->liste_entrees();
?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Résultat des statistiques de la pharmacie</h2>
            <small class="text-muted">Welcome to Swift application</small>
        </div>
       
        <div class="row clearfix">
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
		
		 <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Bilan médicaments en stock</h2>
                       
                    </div>
                    <div class="body" style="max-height:400px;overflow:auto">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Désignation</th>
                                        <th>Nb entrée</th>
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
                                        <td><?php echo $rp->med_sNc.' '.$rp->cat_sLibelle.' '.$rp->fam_sLibelle.' '.$rp->for_sLibelle.' '.$rp->med_iDosage.''.$rp->med_sUnite; ?></td>
                                        <td>
                                            <?php echo $bilan->total; ?> fois
                                        </td>
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

		<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Point Financier Périodique</h2>
                       
                    </div>
                    <div class="body" style="max-height:400px;overflow:auto">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Etat des comptes fournisseur</th>
                                        <th>Etat des comptes clients</th>
                                        <th>Etat des ventes au comptant</th>
                                        <th>Marge Bénéficiaire </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($bilan_produit AS $bilan){ 
									$rp = $this->md_pharmacie->recup_produit($bilan->med_id);
								?>
                                    <tr>
                                        <td><?php echo $rp->med_sNc.' '.$rp->cat_sLibelle.' '.$rp->fam_sLibelle.' '.$rp->for_sLibelle.' '.$rp->med_iDosage.''.$rp->med_sUnite; ?></td>
                                        <td>
                                            <?php echo $bilan->total; ?> fois
                                        </td>
										<td>
                                            <?php echo $bilan->quantite; ?>
                                        </td>
										<td>
                                            <?php echo number_format($bilan->achat,2,",","."); ?>
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
		
		
		
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Hospital Survey</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="line_chart" height="70"></canvas>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>