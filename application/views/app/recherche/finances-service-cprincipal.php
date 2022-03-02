
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$delai = NULL;
	$montant = $this->md_patient->montant_cprincipal($delai,$fait);
	$montant_service = $this->md_patient->montant_service_cprincipal($delai,$fait);
	$depose =$montant->paye;
	
	$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($delai,$fait);
	if(!is_null($diminueencaisse->diminueencaisse)){$resultat = $depose + $diminueencaisse->diminueencaisse;}else{$resultat = $depose;}
	
 ?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>FINANCES PAR SERVICE</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Statistiques de caisse</h2>
						
					</div>
					<div class="body">
						<form id="stat-caisseservicecp">
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="validerservicecp">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="row clearfix" id="afficheMontantservicecp">
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
							<?php echo number_format($montant->perte + $montant->assurance,0,",","."); ?> <small>FCFA</small>
						</div>
                    </div>
                </div>
            </div>
			<?php //var_dump($montant_service);?>

		    <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
					<div class="header">
						<h2>CUMUL Point de caisse par service</h2>
					</div>
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<td align="left"><b>LIB. SERVICE</b></td>
									<td align="center"><b>T. GÉNÉRAL</b></td>
									<td align="center"><b>T. REMISE</b></td>
									<td align="center" align=""><b>T. ENCAISSÉ</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php $total=0;$rem=0;$encaiss=0; if(empty($montant_service)){echo '<tr><td colspan="5"><em>Aucun mouvement enregistré</em></td></tr>';}else{ foreach($montant_service AS $l){ ?>
								<tr>
									<td align="left">
										<b><?php echo $l->ser_sLibelle; ?></b> 
									</td>
									<td  align="center">
										<b><?php echo number_format($l->montant,0,",","."); ?></b>
									</td>									
									<td  align="center">
										<b><?php echo number_format($l->reduc,0,",","."); ?></b>
									</td>									
									<td  align="center">
										<b><?php echo number_format(abs($l->montant - $l->reduc),0,",","."); ?></b>
									</td>
								</tr>
							<?php $total+=$l->montant;$rem+=$l->reduc;$encaiss+=$l->montant - $l->reduc;}}  ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="center" colspan=""><b style="font-weight:700;text-decoration:underline"> </b></td>
									<td align="center" colspan=""><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($total,0,",","."); ?></b></td>
									<td align="center" colspan=""><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($rem,0,",","."); ?></b></td>
									<td align="center" colspan=""><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($encaiss,0,",","."); ?></b></td>
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