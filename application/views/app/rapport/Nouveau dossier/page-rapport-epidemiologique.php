<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$premier = date("Y-m-d");
	$dernier = NULL;
    $nbOldCltDiab = $this->md_rapport->nbOldConsultdiab($premier,$dernier); 
    $nbNewCltDiab = $this->md_rapport->nbNewConsultdiab($premier,$dernier); 
    $nbNewdt1 = $this->md_rapport->nbNewDT1($premier,$dernier); 
    $nbOlddt1 = $this->md_rapport->nbOldDT1($premier);     
	$nbNewdt2 = $this->md_rapport->nbNewDT2($premier,$dernier); 
    $nbOlddt2 = $this->md_rapport->nbOldDT2($premier); 	
	$nbNewdt3 = $this->md_rapport->nbNewDT3($premier,$dernier); 
    $nbOlddt3 = $this->md_rapport->nbOldDT3($premier); 
	$nbNewdt4 = $this->md_rapport->nbNewDT4($premier,$dernier); 
    $nbOlddt4 = $this->md_rapport->nbOldDT4($premier); 	
	$nbNewAutre = $this->md_rapport->nbNewAutreCas($premier,$dernier); 
    $nbOldAutre = $this->md_rapport->nbOldAutreCas($premier); 
// var_dump($data);
// var_dump($nbOldCltDiab);
?>

<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>RAPPORT EPIDEMIOLOGIQUE</h2>
            <small class="text-muted"></small>
        </div>		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>RAPPORT EPIDEMIOLOGIQUE </h2>
					</div>
					<div class="body">
						<form id="form-rapport">
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
									<button type="submit" class="btn btn-raised bg-blue-grey" id="validerRapport">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <div class="row clearfix" id="afficheRappEpi">

		    <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<div class="header">
							<a title="Imprimer le rapport" href="<?php echo site_url("impression/csi_pmae_hopitaus_de_base/$premier/$dernier"); ?>" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i> Imprimer le Journal </a>
							<h2>1. Tableau récapitulatif des cas de Diabete par type</h2>
						</div>
						<table id="" class="table table-bordered table-striped table-hover">
							<thead>
								<tr> 
									<th colspan="3" class="text-center">Csultat. diabète</th>
									<th colspan="3" class="text-center"> DT1</th>
									<th colspan="3" class="text-center"> DT2</th>
									<th colspan="3" class="text-center"> DG</th>
									<th colspan="3" class="text-center"> Gestationnel</th>
									<th class="text-center" colspan="3">Autres Cas</th>
									<th class="text-center" colspan="3">Total</th>
								</tr>
								<tr> 
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>										
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th  class="text-center">T</th>
									
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
								</tr>
								
							</thead>
							<tbody class="corps">
								<tr> 
									<td align="center"><?php echo $nbOldCltDiab->nb;?></td>
									<td align="center"><?php echo $nbNewCltDiab->nb;?></td>
									<td align="center"><?php echo $nbOldCltDiab->nb + $nbNewCltDiab->nb;?></td>
									<td align="center"><?php echo $nbOlddt1->nb;?></td>
									<td align="center"><?php echo $nbNewdt1->nb;?></td> 
									<td align="center"><?php echo $nbNewdt1->nb + $nbOlddt1->nb;?></td>									
									<td align="center"><?php echo $nbOlddt2->nb;?></td>
									<td align="center"><?php echo $nbNewdt2->nb;?></td> 
									<td align="center"><?php echo $nbNewdt2->nb + $nbOlddt2->nb;?></td>									
									<td align="center"><?php echo $nbOlddt3->nb;?></td>
									<td align="center"><?php echo $nbNewdt3->nb;?></td> 
									<td align="center"><?php echo $nbNewdt3->nb + $nbOlddt3->nb;?></td>									
									<td align="center"><?php echo $nbOlddt4->nb;?></td>
									<td align="center"><?php echo $nbNewdt4->nb;?></td> 
									<td align="center"><?php echo $nbNewdt4->nb + $nbOlddt4->nb;?></td>									
									<td align="center"><?php echo $nbOldAutre->nb;?></td>
									<td align="center"><?php echo $nbNewAutre->nb;?></td> 
									<td align="center"><?php echo $nbOldAutre->nb + $nbNewAutre->nb;?></td>
									
									<td align="center"><?php echo $nbOldCltDiab->nb + $nbOlddt1->nb + $nbOlddt2->nb + $nbOlddt3->nb + $nbOlddt4->nb + $nbOldAutre->nb;?></td>
									<td align="center"><?php echo $nbNewCltDiab->nb + $nbNewdt1->nb + $nbNewdt2->nb + $nbNewdt3->nb + $nbNewdt4->nb + $nbNewAutre->nb;?></td>
									<td align="center"><?php echo $nbNewCltDiab->nb + $nbNewdt1->nb + $nbNewdt2->nb + $nbNewdt3->nb + $nbNewdt4->nb + $nbNewAutre->nb + $nbOldCltDiab->nb + $nbOlddt1->nb + $nbOlddt2->nb + $nbOlddt3->nb + $nbOlddt4->nb + $nbOldAutre->nb;?></td>
								</tr>
							</tbody>
						</table>
                    </div>                   
					<div class="body table-responsive"> 
						<div class="header">
							<h2>2. Tableau récapitulatif des cas de Diabete Compliqué</h2>
						</div>
						<table id="" class="table table-bordered ">
							<thead>
								
							</thead>
							<tbody class="corps1">
								<tr> 
									<th rowspan="3" style="vertical-align:middle" class="text-center">Complication Micro-vasculaires</th>
									<th colspan="6" class="text-center">Rénopathie</th>
									<th class="text-center" colspan="3">Néphropathie</th>
									<th class="text-center" colspan="3">Neuropathie</th>
									<th class="text-center" colspan="2">Total</th>
								   
								</tr>
								<tr > 
									<th class="text-center" colspan="2">A</th>
									<th class="text-center" colspan="2">N</th>
									<th class="text-center" colspan="2">T</th> 
									
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
								   
								</tr>
								
								<tr>
									
									<td  colspan="2" align="center">0</td>
									<td  colspan="2" align="center">0</td> 
									<td  colspan="2" align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
								</tr>
							</tbody>
							<tbody class="corps2">
								<tr> 
									<th rowspan="3" style="vertical-align:middle" class="text-center">Complication Macro-vasculaires</th>
									<th colspan="3" class="text-center">HTA</th>
									<th class="text-center" colspan="3">Cardiopathie</th>
									<th class="text-center" colspan="3">AVC</th>
									<th class="text-center" colspan="3">AOMI</th>
									<th class="text-center" colspan="2">Total</th>
								   
								</tr>
								<tr class="text-center"> 
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th> 
									
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
								   
								</tr>
								
								<tr>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
								</tr>
							</tbody>
							<tbody class="corps3">
								<tr> 
									<th rowspan="3" style="vertical-align:middle" class="text-center">Complication Pied diabétique</th>
									<th colspan="3" class="text-center">Vasculaire</th>
									<th class="text-center" colspan="3">Neurologique</th>
									<th class="text-center" colspan="3">Infecté</th>
									<th class="text-center" colspan="3">Mixte</th>
									<th class="text-center" colspan="2">Total</th>
								   
								</tr>
								<tr > 
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th> 
									
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									
								</tr>
								<tr>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
								</tr>
							</tbody>
						</table>
                    </div>					
					<div class="body table-responsive"> 
						<div class="header">
							<h2>3.Tableau récapitulatif cas de tyroïde</h2>
						</div>
						<table id="" class="table table-bordered table-striped table-hover">
							<thead>
								<tr> 
									<th colspan="3" class="text-center">Goitre simple</th>
									<th class="text-center" colspan="3">Goitre avec hyper-thyroïdie </th>
									<th class="text-center" colspan="3">Goitre avec hypo-thyroïdie </th>
									<th class="text-center" colspan="3">Hyper-thyroïdie (Basedow)</th>
									<th class="text-center" colspan="3">Hypo-thyroïdie secondaire</th>
									<th class="text-center" colspan="3">Autres </th>
									<th class="text-center" colspan="2">Total </th>
									
								</tr>
								<tr > 
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>

									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
								   
								</tr>
							</thead>
							<tbody class="corps">
								<tr>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td> 
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td> 
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td>
								</tr>
							</tbody>
						</table>
                    </div>					
					<div class="body table-responsive"> 
						<div class="header">
							<h2>4. Tableau récapitulatif cas d'hypophyse</h2>
						</div>
					   <table id="" class="table table-bordered table-striped table-hover">
							<thead>
								<tr> 
									<th class="text-center" colspan="3">Adénome hypophysaire</th>
									<th class="text-center" colspan="3">Autres </th>
									<th class="text-center" colspan="2">Total </th>
								</tr>
								<tr class="text-center"> 
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
								   
								</tr>
							</thead>
							<tbody class="corps">
								
								<tr>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td>
								</tr>
							</tbody>
						</table>
                    </div>					
					<div class="body table-responsive">
						<div class="header">
							<h2>5. Tableau récapitulatif autres pathologies</h2>
						</div>
						<table id="" class="table table-bordered table-striped table-hover">
							<thead>
								<tr> 
									<th class="text-center" colspan="3">Endocriniennes</th>
									<th class="text-center" colspan="3">Métaboliques</th>
									<th class="text-center" colspan="3">Nutritionnelle</th>
									<th class="text-center" colspan="2">Total</th>
								</tr>
								<tr > 
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									
								</tr>
							</thead>
							<tbody class="corps">
							
								<tr>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td>
								</tr>
							</tbody>
						</table>
                    </div>					
					<div class="body table-responsive">
						<div class="header">
							<h2>6. Tableau récapitulatif autres Consultation</h2>
						</div>
						<table id="" class="table table-bordered table-striped table-hover">
							<thead>
								<tr> 
									<th class="text-center" colspan="3">Stomatologie</th>
									<th class="text-center" colspan="3">Cardiologie</th>
									<th class="text-center" colspan="3">Neurologie</th>
									<th class="text-center" colspan="2">Total</th>
								</tr>
								<tr > 
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									<th class="text-center">T</th>
									
									<th class="text-center">A</th>
									<th class="text-center">N</th>
									
								</tr>
							</thead>
							<tbody class="corps">
								<tr>
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td> 
									<td align="center">0</td>
									
									<td align="center">0</td>
									<td align="center">0</td>
									<td align="center">0</td>
									
								   
									<td align="center">0</td>
									<td align="center">0</td>
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