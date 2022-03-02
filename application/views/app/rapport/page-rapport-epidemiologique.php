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
	
	$nbNewCOMP1 = $this->md_rapport->nbNewCOMP1($premier,$dernier); 
    $nbOldCOMP1 = $this->md_rapport->nbOldCOMP1($premier); 
	$nbNewCOMP2 = $this->md_rapport->nbNewCOMP2($premier,$dernier); 
    $nbOldCOMP2 = $this->md_rapport->nbOldCOMP2($premier); 
	$nbNewCOMP3 = $this->md_rapport->nbNewCOMP3($premier,$dernier); 
    $nbOldCOMP3 = $this->md_rapport->nbOldCOMP3($premier); 
	$nbNewCOMP4 = $this->md_rapport->nbNewCOMP4($premier,$dernier); 
    $nbOldCOMP4 = $this->md_rapport->nbOldCOMP4($premier); 
	$nbNewCOMP5 = $this->md_rapport->nbNewCOMP5($premier,$dernier); 
    $nbOldCOMP5 = $this->md_rapport->nbOldCOMP5($premier); 
	$nbNewCOMP6 = $this->md_rapport->nbNewCOMP6($premier,$dernier); 
    $nbOldCOMP6 = $this->md_rapport->nbOldCOMP6($premier); 
	$nbNewCOMP7 = $this->md_rapport->nbNewCOMP7($premier,$dernier); 
    $nbOldCOMP7 = $this->md_rapport->nbOldCOMP7($premier); 
	$nbNewCOMP8 = $this->md_rapport->nbNewCOMP8($premier,$dernier); 
    $nbOldCOMP8 = $this->md_rapport->nbOldCOMP8($premier);
	$nbNewCOMP9 = $this->md_rapport->nbNewCOMP9($premier,$dernier); 
    $nbOldCOMP9 = $this->md_rapport->nbOldCOMP9($premier); 	
	$nbNewCOMP10 = $this->md_rapport->nbNewCOMP10($premier,$dernier); 
    $nbOldCOMP10 = $this->md_rapport->nbOldCOMP10($premier); 
	$nbNewCOMP11 = $this->md_rapport->nbNewCOMP11($premier,$dernier); 
    $nbOldCOMP11 = $this->md_rapport->nbOldCOMP11($premier); 
	
	
	$nbNewTYR1 = $this->md_rapport->nbNewTYR1($premier,$dernier); 
    $nbOldTYR1 = $this->md_rapport->nbOldTYR1($premier); 
	$nbNewTYR2 = $this->md_rapport->nbNewTYR2($premier,$dernier); 
    $nbOldTYR2 = $this->md_rapport->nbOldTYR2($premier);
	$nbNewTYR3 = $this->md_rapport->nbNewTYR3($premier,$dernier); 
    $nbOldTYR3 = $this->md_rapport->nbOldTYR3($premier);
	$nbNewTYR4 = $this->md_rapport->nbNewTYR4($premier,$dernier); 
    $nbOldTYR4 = $this->md_rapport->nbOldTYR4($premier);
	$nbNewTYR5 = $this->md_rapport->nbNewTYR5($premier,$dernier); 
    $nbOldTYR5 = $this->md_rapport->nbOldTYR5($premier);
	$nbNewTYRAutre = $this->md_rapport->nbNewTYRAutre($premier,$dernier); 
    $nbOldTYRAutre = $this->md_rapport->nbOldTYRAutre($premier);
	
	$nbNewHYP = $this->md_rapport->nbNewHYP($premier,$dernier); 
    $nbOldHYP = $this->md_rapport->nbOldHYP($premier);
	$nbNewHYPAutre = $this->md_rapport->nbNewHYPAutre($premier,$dernier); 
    $nbOldHYPAutre = $this->md_rapport->nbOldHYPAutre($premier);
	
	$nbNewHYPMet = $this->md_rapport->nbNewHYPMet($premier,$dernier); 
    $nbOldHYPMet = $this->md_rapport->nbOldHYPMet($premier);
	
	$nbNewHYPEnd = $this->md_rapport->nbNewHYPEnd($premier,$dernier); 
    $nbOldHYPEnd = $this->md_rapport->nbOldHYPEnd($premier);
	
	$nbNewHYPNut = $this->md_rapport->nbNewHYPNut($premier,$dernier); 
    $nbOldHYPNut = $this->md_rapport->nbOldHYPNut($premier);
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
									
									<td  colspan="2" align="center"><?php echo $nbOldCOMP1->nb;?></td>
									<td  colspan="2" align="center"><?php echo $nbNewCOMP1->nb;?></td> 
									<td  colspan="2" align="center"><?php echo $nbOldCOMP1->nb + $nbNewCOMP1->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP2->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP2->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP2->nb + $nbNewCOMP2->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP3->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP3->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP3->nb + $nbNewCOMP3->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP1->nb + $nbOldCOMP2->nb + $nbOldCOMP3->nb;?></td>
									<td align="center"><?php echo $nbNewCOMP1->nb + $nbNewCOMP2->nb + $nbNewCOMP3->nb;?></td>
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
									<td  align="center"><?php echo $nbOldCOMP4->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP4->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP4->nb + $nbNewCOMP4->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP5->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP5->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP5->nb + $nbNewCOMP5->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP6->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP6->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP6->nb + $nbNewCOMP6->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP7->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP7->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP7->nb + $nbNewCOMP7->nb;?></td>
									<td align="center"><?php echo $nbOldCOMP4->nb + $nbOldCOMP5->nb + $nbOldCOMP6->nb + $nbOldCOMP7->nb;?></td>
									<td align="center"><?php echo $nbNewCOMP4->nb + $nbNewCOMP5->nb + $nbNewCOMP6->nb + $nbNewCOMP7->nb;?></td>
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
									<td  align="center"><?php echo $nbOldCOMP8->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP8->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP8->nb + $nbNewCOMP8->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP9->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP9->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP9->nb + $nbNewCOMP9->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP10->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP10->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP10->nb + $nbNewCOMP10->nb;?></td>
									<td  align="center"><?php echo $nbOldCOMP11->nb;?></td>
									<td  align="center"><?php echo $nbNewCOMP11->nb;?></td> 
									<td  align="center"><?php echo $nbOldCOMP11->nb + $nbNewCOMP11->nb;?></td>
									<td align="center"><?php echo $nbOldCOMP8->nb + $nbOldCOMP9->nb + $nbOldCOMP10->nb + $nbOldCOMP11->nb;?></td>
									<td align="center"><?php echo $nbNewCOMP8->nb + $nbNewCOMP9->nb + $nbNewCOMP10->nb + $nbNewCOMP11->nb;?></td>
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
									<td  align="center"><?php echo $nbOldTYR1->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR1->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR1->nb + $nbNewTYR1->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR2->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR2->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR2->nb + $nbNewTYR2->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR3->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR3->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR3->nb + $nbNewTYR3->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR4->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR4->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR4->nb + $nbNewTYR4->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR5->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR5->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR5->nb + $nbNewTYR5->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYRAutre->nb;?></td>
									<td  align="center"><?php echo $nbNewTYRAutre->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYRAutre->nb + $nbNewTYRAutre->nb;?></td>
									
									<td align="center"><?php echo $nbOldTYR1->nb + $nbOldTYR2->nb + $nbOldTYR3->nb + $nbOldTYR4->nb + $nbOldTYR5->nb + $nbOldTYRAutre->nb;?></td>
									<td align="center"><?php echo $nbNewTYR1->nb + $nbNewTYR2->nb + $nbNewTYR3->nb + $nbNewTYR4->nb + $nbNewTYR5->nb + $nbNewTYRAutre->nb;?></td>
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
									<td  align="center"><?php echo $nbOldHYP->nb;?></td>
									<td  align="center"><?php echo $nbNewHYP->nb;?></td> 
									<td  align="center"><?php echo $nbOldHYP->nb + $nbNewHYP->nb;?></td>
									
									<td  align="center"><?php echo $nbOldHYPAutre->nb;?></td>
									<td  align="center"><?php echo $nbNewHYPAutre->nb;?></td> 
									<td  align="center"><?php echo $nbOldHYPAutre->nb + $nbNewHYPAutre->nb;?></td>
									
									<td align="center"><?php echo $nbOldHYP->nb + $nbOldHYPAutre->nb;?></td>
									<td align="center"><?php echo $nbNewHYPAutre->nb + $nbNewHYP->nb;?></td>
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
									<td  align="center"><?php echo $nbOldHYPEnd->nb;?></td>
									<td  align="center"><?php echo $nbNewHYPEnd->nb;?></td> 
									<td  align="center"><?php echo $nbOldHYPEnd->nb + $nbNewHYPEnd->nb;?></td>
									
									<td  align="center"><?php echo $nbOldHYPMet->nb;?></td>
									<td  align="center"><?php echo $nbNewHYPMet->nb;?></td> 
									<td  align="center"><?php echo $nbOldHYPMet->nb + $nbNewHYPMet->nb;?></td>
									
									<td  align="center"><?php echo $nbOldHYPNut->nb;?></td>
									<td  align="center"><?php echo $nbNewHYPNut->nb;?></td> 
									<td  align="center"><?php echo $nbOldHYPNut->nb + $nbNewHYPNut->nb;?></td>
									
									<td align="center"><?php echo $nbOldHYPEnd->nb + $nbOldHYPMet->nb + $nbOldHYPNut->nb;?></td>
									<td align="center"><?php echo $nbNewHYPEnd->nb + $nbNewHYPMet->nb + $nbNewHYPNut->nb;?></td>
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