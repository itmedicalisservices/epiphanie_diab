
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$delai = NULL;
	$montant = $this->md_patient->montant_cprincipal($delai,$fait);
	$depose =$montant->paye;
	
	$acte = $this->md_patient->montant_par_acte_cprincipal($delai,$fait);
	$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($delai,$fait);
	if(!is_null($diminueencaisse->diminueencaisse)){$resultat = $depose + $diminueencaisse->diminueencaisse;}else{$resultat = $depose;}
 ?>


	<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>FINANCES PAR ACTE</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Statistiques de caisse</h2>
					</div>
					<div class="body">
						<form id="stat-caisseactecp">
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="parActecp">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="row clearfix" id="afficheMontantactecp">
		
		    <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL GÉNÉRAL</div>
                        <div class="number"><?php echo number_format($montant->montant,0,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>	

			
		    <div class="col-lg-4 col-md-4 col-sm-6">
				<div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL ENCAISSÉ</div>
                        <div class="number"><?php echo number_format($resultat,0,",","."); ?> <small>FCFA</small></div>
                    </div>
                </div>
            </div>

			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect bg-red">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">TOTAL REMISE</div>
                        <div class="number">
							<?php echo number_format($montant->perte + $montant->assurance ,0,",","."); ?> <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
		
		    <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
										<div class="header">
						<h2>Point de caisse par acte</h2>
						
					</div>
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<td align="left"><b>ACTE</b></td>
									<td width="20%" align="right"><b>MONTANT</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php //var_dump($acte);?>
							<?php $somcumul=0; if(empty($acte)){echo '<tr><td colspan="5"><em>Aucun mouvement enregistré</em></td></tr>';}else{ foreach($acte AS $a){ ?>
								<tr>
									<td align="left">
										<b><?php echo $a->lac_sLibelle; ?></b> 
									</td>
									<td  align="right">
										<b><?php echo number_format($a->montant,0,",","."); ?></b>
									</td>
								</tr>
							<?php }}  ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="right" style="" colspan=""><b style="font-weight:700;text-decoration:underline">TOTAL GÉNÉRAL</b>:</td>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($montant->montant,0,",","."); ?></b></td>
								</tr>								
								<tr>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline">TOTAL REMISE</b>:</td>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($montant->perte + $montant->assurance,0,",","."); ?></b></td>
								</tr>								
								<tr>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline">TOTAL ENCAISSEMENT</b>:</td>
									<td align="right" colspan=""><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($resultat,0,",","."); ?></b></td>
								</tr>
							</tfoot>
						</table>
                    </div>
                </div>
            </div>
		
            
        </div>
        
	</div>

</section>




<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>