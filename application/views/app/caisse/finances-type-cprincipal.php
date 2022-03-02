
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$delai = NULL;
	$montant = $this->md_patient->montant_cprincipal($delai,$fait);
	$depose =$montant->paye;
	
	// $acte = $this->md_patient->montant_par_type_cprincipal($delai,$fait);
	// $rub = $this->md_patient->remise_parubrique($delai,$fait);
	$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($delai,$fait);
	$diminueencaissedujour = $this->md_patient->diminue_encaisse_total_parubrique_dujour();
	if(!is_null($diminueencaisse->diminueencaisse)){$resultat = $depose + $diminueencaisse->diminueencaisse;}else{$resultat = $depose;}
	if(!is_null($diminueencaissedujour->diminueencaissedujour)){$rep = $diminueencaissedujour->diminueencaissedujour;}else{$rep = 0;}
	
	// $listerubactive = $this->md_patient->liste_rubrique_active(NULL, $fait); 
	$qpt = $this->md_patient->quotes_parts($delai, $fait); 
 ?>


	<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>FINANCES QUOTES-PARTS</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Statistiques de caisse</h2>
						<?php //var_dump($qpt);?>
					</div>
					<div class="body">
						<form id="stat-caissetypecp">
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="parTypecp">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="row clearfix" id="afficheMontanttypecp">
		
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
						<h2>FINANCES de Quotes-parts</h2>
						
					</div>
					
					
					<table id="" class="table table-bordered">
					<thead>
						<tr align="center">
						  <td  style="vertical-align:middle" rowspan="2"><b>LIB. SERVICE</b></td>
						  <td  style="vertical-align:middle" rowspan="2"><b>T. GÉNÉRAL</b></td>
						  <td colspan="3"><b>PART SER.</b></td>
						  <td colspan="3"><b>PART ADM.</b></td>
						</tr>					 
						
						<tr>
						  <td><b>CONSULTATIONS</b></td>
						  <td><b>AUTRES ACTES</b></td>
						  <td><b>TOTAL</b></td>						  
						  
						  <td><b>CONSULTATIONS</b></td>
						  <td><b>AUTRES ACTES</b></td>
						  <td><b>TOTAL</b></td>	
						</tr>
					</thead>
					<tbody>
					<?php $adm=0;$ser=0; $admCsl=0;$serCsl=0; foreach($qpt AS $q){ ?>
					<?php $rcupSer = $this->md_parametre->recup_service($q->ser_id);?>
					 <tr align="center">
						  <td align="center"><b><?php echo $rcupSer->ser_sLibelle; ?></b></td>
						  <td><b><?php echo number_format($q->admin + $q->service + $q->adminCsl + $q->serviceCsl,0,",","."); ?></b></td>
						  
						  <td><b><?php echo number_format($q->serviceCsl,0,",","."); ?></b></td>
						  <td><b><?php echo number_format($q->service,0,",","."); ?></b></td>
						  <td><b><?php echo number_format($q->service + $q->serviceCsl,0,",","."); ?></b></td>						 

						  <td><b><?php echo number_format($q->adminCsl,0,",","."); ?></b></td>
						  <td><b><?php echo number_format($q->admin,0,",","."); ?></b></td>
						  <td><b><?php echo number_format($q->admin + $q->adminCsl,0,",","."); ?></b></td>
					 </tr>
					 <?php $adm+=$q->admin;$ser+=$q->service;$admCsl+=$q->adminCsl;$serCsl+=$q->serviceCsl;} ?>
					</tbody>
					<tfoot>								
						<tr>
							<td width="25%" align="center">
								<b></b>
							</td>										
							<td width="25%" align="center">
								<b><?php echo number_format($adm + $ser + $admCsl + $serCsl,0,",","."); ?></b>
							</td>			
							<td width="25%" align="center">
								<b><?php echo number_format($serCsl,0,",","."); ?></b>
							</td>											
							<td width="25%" align="center">
								<b><?php echo number_format($ser,0,",","."); ?></b>
							</td>									
							<td width="25%" align="center">
								<b><?php echo number_format($serCsl + $ser,0,",","."); ?></b>
							</td>			
							<td width="25%" align="center">
								<b><?php echo number_format($admCsl,0,",","."); ?></b>
							</td>											
							<td width="25%" align="center">
								<b><?php echo number_format($adm,0,",","."); ?></b>
							</td>									
							<td width="25%" align="center">
								<b><?php echo number_format($admCsl + $adm,0,",","."); ?></b>
							</td>																							
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