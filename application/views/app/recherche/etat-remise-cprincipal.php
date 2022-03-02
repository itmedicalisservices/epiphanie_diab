
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$delai = NULL;
	$montant = $this->md_patient->montant_cprincipal($delai,$fait);
	$montant_service = $this->md_patient->montant_service_cprincipal($delai,$fait);
	$depose =$montant->paye;
	
	
	$remises = $this->md_patient->liste_remise($delai,$fait);
	$total=0;$encaisse=0;$rem=0;
	// $remisesser = $this->md_patient->liste_remise_service();
 ?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>ETAT DES REMISES PAR SERVICE</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>définir une plage de recherche</h2>
						
					</div>
					<div class="body">
						<form id="stat-remisecaissecp">
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="validerremisecp">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="row clearfix" id="afficheremisecp">
		
					<?php //var_dump($remises);?>
					<?php //var_dump($remisesser);?>
		
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
                        <div class="number"><?php echo number_format($depose,0,",","."); ?> <small>FCFA</small></div>
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

		    <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
					<div class="header">
						<h2> remises par service</h2>
					</div>
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<td colspan="8" align="center"><b>SITUATION DES REMISES PAR SERVICE</b></td>
								</tr>									
								<!--<tr>
									<td colspan="8" align="left"><b style="text-decoration:underline">SERVICE</b></td>
								</tr>		-->						
								<tr align="center">
									<td><b>Libellé Service</b></td>
									<td width="" align=""><b>N°Facture</b></td>
									<td width="" align=""><b>Date Opération</b></td>
									<td width="" align=""><b>Patient</b></td>
									<td width="" align=""><b>Montant</b></td>
									<td width="" align=""><b>Remise</b></td>
									<td width="" align=""><b>Encaissé</b></td>
									<td width="" align=""><b>Auteur</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php if(empty($remises)){echo '<tr><td colspan="8"><em>Aucun mouvement enregistré</em></td></tr>';}else{ foreach($remises AS $r){ ?>
								<tr>
									<td align="center">
										<b><?php echo $r->ser_sLibelle; ?></b> 
									</td>									
									<td align="center">
										<b><?php echo $r->fac_sNumero; ?></b> 
									</td>									
									<td align="center">
										<b><?php echo substr($this->md_config->affDateTimeFr($r->fac_dDatePaieTime),2); ?></b> 
									</td>
									<td  align="center">
										<b><?php $pat = $this->md_patient->recup_patient($r->pat_id); echo $pat->pat_sNom.' '.$pat->pat_sPrenom; ?></b>
									</td>	
									<td  align="center">
										<b><?php echo number_format($r->fac_iMontant,0,",","."); ?></b>
									</td>										
									<td  align="center">
										<b><?php echo number_format($r->fac_iMontant - $r->fac_iMontantPaye,0,",","."); ?></b>
									</td>								
									<td  align="center">
										<b><?php echo number_format($r->fac_iMontantPaye,0,",","."); ?></b>
									</td>									
									<td  align="center">
										<b><?php $fac = $this->md_patient->recup_facture($r->fac_id); $per = $this->md_personnel->recup_personnel($fac->per_id); echo $per->per_sNom.' '.$per->per_sPrenom; ?></b>
									</td>
								</tr>
							<?php $total+=$r->fac_iMontant;$encaisse+=$r->fac_iMontantPaye;$rem+=$r->fac_iMontant - $r->fac_iMontantPaye;}}  ?>
								<tr>
									<td align="center">
										 
									</td>									
									<td align="center">
										 
									</td>									
									<td align="center">
										 
									</td>									
									<td align="center">
										 <b>Total Général</b>
									</td>										
									<td align="center">
										 <b><?php echo number_format($total,0,",","."); ?></b>
									</td>										
									<td align="center">
										 <b><?php echo number_format($rem,0,",","."); ?></b>
									</td>										
									<td align="center">
										 <b><?php echo number_format($encaisse,0,",","."); ?></b>
									</td>										
									<td align="center">
										 
									</td>									
								</tr>
							</tbody>
						</table>
                    </div>
                </div>
            </div>			    	
            
        </div>
        
	</div>

</section>




<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>