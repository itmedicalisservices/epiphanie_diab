
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = date("Y-m-d",$maDate). "\n";

	$date = new DateTime();
    $premier = $date->format('Y-m-01');
	$dernier = $date->format('Y-m-t');

	$data = $this->input->post();
		
	if (!empty($data['dernierJour']) || !empty($data['premierJour'])) {
		$premier = $data['premierJour'];
		$dernier = $data['dernierJour'];
	}

	$date = date("Y-m-d");
	$casReferer = "Cas réferer";
	$contreReferer = "Contre  réferer";
	$autoReferer = "Auto réferer";
	$guerison = "Guérison"; $remission = "Rémission"; $evasion = "Evasion"; $refere = "Référé"; $deces = "Décès"; $demande = "A la demande";
	$result = $this->md_patient->nombre_nouveau_malade_medecine($date);
	$listeActeChi = $this->md_parametre->liste_acts_chirurgie_actifs();
	$listeACteRad = $this->md_parametre->liste_acts_radiologie_actifs(); 
	$listeActeLab = $this->md_parametre->liste_acts_laboratoires_actifs();

	
	$liste = $this->md_patient->liste_maladie_retenue($premier,$dernier); 
	$aujourdhui = date("Y-m-d");
	
	$maDateMoinun = strtotime($aujourdhui."- 365 days");
	$moinsun = date("Y-m-d",$maDateMoinun). "\n";
	
	$maDate14 = strtotime($aujourdhui."- 1460 days");
	$m14 = date("Y-m-d",$maDate14). "\n";
	
	$maDate514 = strtotime($aujourdhui."- 5110 days");
	$m514 = date("Y-m-d",$maDate514). "\n";
	
	$maDate1549 = strtotime($aujourdhui."- 17885 days");
	$m1549 = date("Y-m-d",$maDate1549). "\n";
	
	$maDate50plus = strtotime($aujourdhui."- 18250 days");
	$m50plus = date("Y-m-d",$maDate50plus). "\n";

	$maDate115 = strtotime($aujourdhui."- 5475 days");
$m115 = date("Y-m-d",$maDate115). "\n";

$maDate1517 = strtotime($aujourdhui."- 6205 days");
$m1517 = date("Y-m-d",$maDate1517). "\n";

$maDate1835 = strtotime($aujourdhui."- 12775 days");
$m1835 = date("Y-m-d",$maDate1835). "\n";

$maDate36plus = strtotime($aujourdhui."- 13140‬ days");
$m36plus = date("Y-m-d",$maDate36plus). "\n";

// $date1 = '2019-02-25';
// $date2 = '2019-09-27';
// $resf = $this->md_patient->rapport_maladie_1_a_49_cas_femme(2,$m1549,$m514,$date1,$date2);
// $resh = $this->md_patient->rapport_maladie_1_a_49_cas_homme(2,$m1549,$m514,$date1,$date2);

?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Indicateur hospitaliers</h2>
            <small class="text-muted"></small>
        </div>
		
		
		<?php //var_dump($resf) ;?>
		<?php //var_dump($resh) ;?>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Rapport SNIS</h2>
					</div>
					<div class="body">
						<form id="rapport-epidem" action="" method="post">
							<div class="row clearfix">
								<div class="col-sm-10 retour">
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Du<input type="date" name="premierJour" value="<?php if(!empty($premier)){echo $premier;} ?>" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Au<input type="date" name="dernierJour" value="<?php if(!empty($dernier)){echo $dernier;} ?>" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								
								<div class="col-sm-2">
								<br><br>
									<button type="submit" class="btn btn-raised bg-blue-grey" id="epidem">Valider</button>
								</div>
							</div>
						</form>
						
                        <h2 class="header h4">1. CSI à PMAE et Hospitaux de base 
						<br><a class="small" href="<?php echo site_url("impression/csi_pmae_hopitaus_de_base/$premier/$dernier"); ?>">Imprimer</a></h2>						
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th rowspan="2">Services (1)</th>
										<th rowspan="2" >Nombre de lits (2)</th>
										<th rowspan="2">Entrée (3)</th>
										<th rowspan="2">Cas référés (4)</th>
										<th rowspan="2">Contre référés (5)</th>
										<th rowspan="2">Auto référés (6)</th>
										<th rowspan="2">Journées d'hôspitalisation (7)</th>
										<th colspan="6">Sortie (8)</th>
									</tr>
									<tr> 
										<th>Guérison</th>
										<th>Rémission</th>
										<th>évasions</th>
										<th>A la demande</th>
										<th>Référé</th>
										<th>Décès</th>
									</tr>
									
								</thead>
								
								<tbody class="corps">
									<?php
										$somLit_1=0;$somLit_2=0; $somLit_3=0;$somLit_4=0;
										$somEntre_1=0;$somEntre_2=0;$somEntre_3=0; $somEntre_4=0;
										$somCasRef_1=0;$somCasRef_2=0; $somCasRef_3=0;$somCasRef_4=0;
										$somContreRef_1=0;$somContreRef_2=0; $somContreRef_3=0;$somContreRef_4=0;
										$somAutoRef_1=0;$somAutoRef_2=0; $somAutoRef_3=0;$somAutoRef_4=0;
										$somPatSortieG_1=0;$somPatSortieG_2=0;$somPatSortieG_3=0;$somPatSortieG_4=0;
										$somPatSortieRm_1=0;$somPatSortieRm_2=0;$somPatSortieRm_3=0;$somPatSortieRm_4=0;
										$somPatSortieE_1=0;$somPatSortieE_2=0;$somPatSortieE_3=0;$somPatSortieE_4=0;
										$somPatSortieD_1=0;$somPatSortieD_2=0;$somPatSortieD_3=0;$somPatSortieD_4=0;
										$somPatSortieR_1=0;$somPatSortieR_2=0;$somPatSortieR_3=0;$somPatSortieR_4=0;
										$somPatSortieDec_1=0;$somPatSortieDec_2=0;$somPatSortieDec_3=0;$somPatSortieDec_4=0;
										
									?>
									<tr> 
										<td>Médecine</td>
										<td align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_medecine(); echo $nbLitMed->nb; $somLit_1 = $somLit_1 + $nbLitMed->nb ?></td>
										<td align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_medecine($date); echo $nbEntreMed->nb; $somEntre_1 = $somEntre_1 + $nbEntreMed->nb ?></td>
										<td align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_medecine($casReferer); echo $nbCasRef->nb; $somCasRef_1 = $somCasRef_1 + $nbCasRef->nb ?></td>
										<td align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_medecine($contreReferer); echo $nbContreRef->nb; $somContreRef_1 = $somContreRef_1 + $nbContreRef->nb ?></td>
										<td align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_medecine($autoReferer); echo $nbAutoRef->nb; $somAutoRef_1 = $somAutoRef_1 + $nbAutoRef->nb ?></td>
										<td align="center">2</td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$guerison); echo $nbPatSortie->nb; $somPatSortieG_1 = $somPatSortieG_1 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$remission); echo $nbPatSortie->nb; $somPatSortieRm_1 = $somPatSortieRm_1 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$evasion); echo $nbPatSortie->nb; $somPatSortieE_1 = $somPatSortieE_1 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$demande); echo $nbPatSortie->nb; $somPatSortieD_1 = $somPatSortieD_1 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$refere); echo $nbPatSortie->nb; $somPatSortieR_1 = $somPatSortieR_1 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$deces); echo $nbPatSortie->nb; $somPatSortieDec_1 = $somPatSortieDec_1 + $nbPatSortie->nb ?></td>
									</tr>
										<td>Pédiatrie</td>
										<td align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_pediatrie(); echo $nbLitMed->nb; $somLit_2 = $somLit_2 + $nbLitMed->nb ?></td>
										<td align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_pediatrie($date); echo $nbEntreMed->nb; $somEntre_2 = $somEntre_2 + $nbEntreMed->nb ?></td>
										<td align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_pediatrie($casReferer); echo $nbCasRef->nb; $somCasRef_2 = $somCasRef_2 + $nbCasRef->nb ?></td>
										<td align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_pediatrie($contreReferer); echo $nbContreRef->nb; $somContreRef_2 = $somContreRef_2 + $nbContreRef->nb ?></td>
										<td align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_pediatrie($autoReferer); echo $nbAutoRef->nb; $somAutoRef_2 = $somAutoRef_2 + $nbAutoRef->nb ?></td>
										<td align="center">2</td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$guerison); echo $nbPatSortie->nb; $somPatSortieG_2 = $somPatSortieG_2 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$remission); echo $nbPatSortie->nb; $somPatSortieRm_2 = $somPatSortieRm_2 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$evasion); echo $nbPatSortie->nb; $somPatSortieE_2 = $somPatSortieE_2 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$demande); echo $nbPatSortie->nb; $somPatSortieD_2 = $somPatSortieD_2 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$refere); echo $nbPatSortie->nb; $somPatSortieR_2 = $somPatSortieR_2 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$deces); echo $nbPatSortie->nb; $somPatSortieDec_2 = $somPatSortieDec_2 + $nbPatSortie->nb ?></td>
									</tr>
									</tr>
										<td>Chirurgie</td>
										<td align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_chirurgie(); echo $nbLitMed->nb; $somLit_3 = $somLit_3 + $nbLitMed->nb ?></td>
										<td align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_chirurgie($date); echo $nbEntreMed->nb; $somEntre_3 = $somEntre_3 + $nbEntreMed->nb ?></td>
										<td align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_chirurgie($casReferer); echo $nbCasRef->nb; $somCasRef_3 = $somCasRef_3 + $nbCasRef->nb ?></td>
										<td align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_chirurgie($contreReferer); echo $nbContreRef->nb; $somContreRef_3 = $somContreRef_3 + $nbContreRef->nb ?></td>
										<td align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_chirurgie($autoReferer); echo $nbAutoRef->nb; $somAutoRef_3 = $somAutoRef_3 + $nbAutoRef->nb ?></td>
										<td align="center">2</td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$guerison); echo $nbPatSortie->nb; $somPatSortieG_3 = $somPatSortieG_3 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$remission); echo $nbPatSortie->nb; $somPatSortieRm_3 = $somPatSortieRm_3 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$evasion); echo $nbPatSortie->nb; $somPatSortieE_3 = $somPatSortieE_3 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$demande); echo $nbPatSortie->nb; $somPatSortieD_3 = $somPatSortieD_3 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$refere); echo $nbPatSortie->nb; $somPatSortieR_3 = $somPatSortieR_3 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$deces); echo $nbPatSortie->nb; $somPatSortieDec_3 = $somPatSortieDec_3 + $nbPatSortie->nb ?></td>
									</tr>
									</tr>
										<td>Maternité</td>
										<td align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_maternite(); echo $nbLitMed->nb; $somLit_4 = $somLit_4 + $nbLitMed->nb ?></td>
										<td align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_maternite($date); echo $nbEntreMed->nb; $somEntre_4 = $somEntre_4 + $nbEntreMed->nb ?></td>
										<td align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_maternite($casReferer); echo $nbCasRef->nb; $somCasRef_4 = $somCasRef_4 + $nbCasRef->nb ?></td>
										<td align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_maternite($contreReferer); echo $nbContreRef->nb; $somContreRef_4 = $somContreRef_4 + $nbContreRef->nb ?></td>
										<td align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_maternite($autoReferer); echo $nbAutoRef->nb; $somAutoRef_4 = $somAutoRef_4 + $nbAutoRef->nb ?></td>
										<td align="center">2</td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$guerison); echo $nbPatSortie->nb; $somPatSortieG_4 = $somPatSortieG_4 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$remission); echo $nbPatSortie->nb; $somPatSortieRm_4 = $somPatSortieRm_4 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$evasion); echo $nbPatSortie->nb; $somPatSortieE_4 = $somPatSortieE_4 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$demande); echo $nbPatSortie->nb; $somPatSortieD_4 = $somPatSortieD_4 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$refere); echo $nbPatSortie->nb; $somPatSortieR_4 = $somPatSortieR_4 + $nbPatSortie->nb ?></td>
										<td align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$deces); echo $nbPatSortie->nb; $somPatSortieDec_4 = $somPatSortieDec_4 + $nbPatSortie->nb ?></td>
									</tr>
								</tbody>
								<tfoot>
									<td style="font-weight:bold">Total</td>
										<td align="center"><?php echo $somLit_1 + $somLit_2 + $somLit_3 + $somLit_4 ?></td>
										<td align="center"><?php echo $somEntre_1 + $somEntre_2 + $somEntre_3 + $somEntre_4 ?></td>
										<td align="center"><?php echo $somCasRef_1 + $somCasRef_2 + $somCasRef_3 + $somCasRef_4 ?></td>
										<td align="center"><?php echo $somContreRef_1 + $somContreRef_2 + $somContreRef_3 + $somContreRef_4 ?></td>
										<td align="center"><?php echo $somAutoRef_1 + $somAutoRef_2 + $somAutoRef_3 + $somAutoRef_4 ?></td>
										<td align="center"></td>
										<td align="center"><?php echo $somPatSortieG_1 + $somPatSortieG_2 + $somPatSortieG_3 + $somPatSortieG_4 ?></td>
										<td align="center"><?php echo $somPatSortieRm_1 + $somPatSortieRm_2 + $somPatSortieRm_3 + $somAutoRef_4 ?></td>
										<td align="center"><?php echo $somPatSortieE_1 + $somPatSortieE_2 + $somPatSortieE_3 + $somPatSortieE_4 ?></td>
										<td align="center"><?php echo $somPatSortieD_1 + $somPatSortieD_2 + $somPatSortieD_3 + $somPatSortieD_4 ?></td>
										<td align="center"><?php echo $somPatSortieR_1 + $somPatSortieR_2 + $somPatSortieR_3 + $somPatSortieR_4 ?></td>
										<td align="center"><?php echo $somPatSortieDec_1 + $somPatSortieDec_2 + $somPatSortieDec_3 + $somPatSortieDec_4 ?></td>
									</tr>
								</tfoot>
							</table>
						</div>

						<h2 class="header h4 mt-5">2. Consultations externes
						<br><a class="small" href="<?php echo site_url("impression/consultation_externe/$premier/$dernier"); ?>">Imprimer</a></h2>	

						<div class="table-responsive">
							<table id="example2" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th style="" rowspan="4">Motif de consultation / Diagnostic (1)</th>
										<th style="background:rgb(255,149,149)" rowspan="4" >Code CIM (2)</th>
										<th colspan="3">Cas (3)</th>
										<th colspan="10">Cas par âge et par sexe (4)</th>
										<th colspan="4">Total général (5)</th>
									</tr>
									<tr> 
										<th rowspan="2">NC</th>
										<th rowspan="2">AC</th>
										<th rowspan="2">Total</th>
										<th colspan="2">-1 an</th>
										<th colspan="2">1 - 4 ans</th>
										<th colspan="2">5 - 14 ans</th>
										<th colspan="2">15 - 49 ans</th>
										<th colspan="2">50 ans et +</th>
										<th colspan="3">Nombre</th>
										<th rowspan="2">%</th>
									</tr>
									<tr> 
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>Total</th>
									</tr>
									
								</thead>
								
								<tbody class="corps">
									<?php $cpt=1; 
									$som_1=0;$som_2=0; $som_3=0;$som_4=0;$som_5=0;
									$som_6=0;$som_7=0; $som_8=0;$som_9=0;$som_10=0;
									$som_11=0;$som_12=0; $som_13=0;$som_14=0;$som_15=0;
									$som_16=0;$som_17=0; $som_18=0;$som_19=0;$som_20=0;

									foreach($liste AS $l) { ?>
									<tr> 
										<td><?php echo $l->sma_sLibelle?></td>
										<td style="background:rgb(255,149,149)" align="center"></td>
										<td align="center"><?php $nc = $this->md_patient->rapport_maladie_nouveau($l->sma_id,"2019-09-05","2019-09-12");echo $nc->nb;$som_1=$som_1+$nc->nb;?></td>
										<td align="center"><?php $ac = $this->md_patient->rapport_maladie_ancien($l->sma_id,"2019-09-05");echo $ac->nb;$som_2=$som_2+$ac->nb;?></td>
										<td align="center"><?php echo $nc->nb + $ac->nb; ?></td>
										<td align="center"><?php $chmoisun = $this->md_patient->rapport_maladie_moin_1($l->sma_id,$moinsun,"H");echo $chmoisun->nb;$som_4=$som_4+$chmoisun->nb;?></td>
										<td align="center"><?php $cfmoisun = $this->md_patient->rapport_maladie_moin_1($l->sma_id, $moinsun,"F"); echo $cfmoisun->nb;$som_5=$som_5+$cfmoisun->nb;?></td>
										<td align="center"><?php $ch14 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m14,$moinsun,"H"); echo $ch14->nb;$som_6=$som_6+$ch14->nb;?></td>
										<td align="center"><?php $cf14 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m14,$moinsun,"F"); echo $cf14->nb;$som_7=$som_7+$cf14->nb;?></td>
										<td align="center"><?php $ch514 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m514,$m14,"H"); echo $ch514->nb;$som_8=$som_8+$ch514->nb;?></td>
										<td align="center"><?php $cf514 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m514,$m14,"F"); echo $cf514->nb;$som_9=$som_9+$cf514->nb;?></td>
										<td align="center"><?php $ch1549 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m1549,$m514,"H"); echo $ch1549->nb;$som_10=$som_10+$ch1549->nb;?></td>
										<td align="center"><?php $cf1549 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m1549,$m514,"F"); echo $cf1549->nb; $som_11=$som_11+$cf1549->nb;?></td>
										<td align="center"><?php $ch50plus = $this->md_patient->rapport_maladie_50_et_plus($l->sma_id,$m50plus,"H"); echo $ch50plus->nb;$som_12=$som_12+$ch50plus->nb;?></td>
										<td align="center"><?php $cf50plus = $this->md_patient->rapport_maladie_50_et_plus($l->sma_id,$m50plus,"F"); echo $cf50plus->nb;$som_13=$som_13+$cf50plus->nb;?></td>
										<td align="center"><?php echo $totalH = $chmoisun->nb + $ch14->nb + $ch514->nb + $ch1549->nb + $ch50plus->nb ;?></td>
										<td align="center"><?php echo $totalF = $cfmoisun->nb + $cf14->nb + $cf514->nb + $cf1549->nb + $cf50plus->nb ;?></td>
										<td align="center"><?php echo $total = $totalH + $totalF; ?></td>
										<td align="center"><?php echo $total/100; ?></td>
									</tr>
									<?php }?>
								</tbody>
								<tfoot>
									<td style="font-weight:bold">Total</td>
										<td style="background:rgb(255,149,149)" align="center"></td>
										<td align="center"><?php echo $som_1 ;?></td>
										<td align="center"><?php echo $som_2 ;?></td>
										<td align="center"><?php echo $som_1 + $som_2 ;?></td>
										<td align="center"><?php echo $som_4 ;?></td>
										<td align="center"><?php echo $som_5 ;?></td>
										<td align="center"><?php echo $som_6 ;?></td>
										<td align="center"><?php echo $som_7 ;?></td>
										<td align="center"><?php echo $som_8 ;?></td>
										<td align="center"><?php echo $som_9 ;?></td>
										<td align="center"><?php echo $som_10 ;?></td>
										<td align="center"><?php echo $som_11 ;?></td>
										<td align="center"><?php echo $som_12 ;?></td>
										<td align="center"><?php echo $som_13 ;?></td>
										<td align="center"><?php echo $som_4 + $som_6 + $som_8 + $som_10 + $som_12 ;?></td>
										<td align="center"><?php echo $som_5 + $som_7 + $som_9 + $som_11 + $som_13 ;?></td>
										<td align="center"><?php echo $som = $som_4 + $som_5 + $som_6 + $som_7 + $som_8 + $som_9 + $som_10 + $som_11 + $som_12 + $som_13 ;?></td></td>
										<td align="center"><?php echo $som/100; ?></td>
									</tr>
								</tfoot>
							</table>
						</div>

						<h2 class="header h4 mt-5">3. Activités de chirurgie
						<br><a class="small" href="<?php echo site_url("impression/activite_chirurgie/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
							<table id="example_copy_1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th>Types d'intervention (1)</th>
										<th>Nombre de Malades Opérés (2)</th>
										<th>Décès sur table (3)</th>
									</tr>
								</thead>
								
								<tbody class="corps">
									<?php $compteur = 0 ?>
									<?php foreach($listeActeChi as $k): ?>
									<?php $nbDecChi = $this->md_patient->nb_deces_chirurgie($k->lac_id,$premier,$dernier); $nbPatOp = $this->md_patient->nb_malade_opore($k->lac_id,$premier,$dernier); ?>
									<?php if($nbPatOp->nb != 0 || $nbDecChi->nb != 0): ?>
									<tr> 
										<td><?php echo $k->lac_sLibelle ?></td>
										<td align="center"><?php $nbPatOp = $this->md_patient->nb_malade_opore($k->lac_id,$premier,$dernier); echo $nbPatOp->nb; ?></td>
										<td align="center"><?php $nbDecChi = $this->md_patient->nb_deces_chirurgie($k->lac_id,$premier,$dernier); echo $nbDecChi->nb; ?></td>
										<?php $compteur++; ?>
									</tr>
									<?php endif; ?>
									<?php endforeach; ?>
									<?php if($compteur === 0): ?>
									<tr><td colspan="4"><p style="text-align:center;color:red;">Aucun resultat trouvé</p></td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>

						<h2 class="header h4 mt-5">4. Activités de radiologie
						<br><a class="small" href="<?php echo site_url("impression/activite_radiologie/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
							<table id="example_copy_2" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th>N° d'ordre (1)</th>
										<th>Type d'examens (2)</th>
										<th>Nombre d'examens réalisés (3)</th>
										<th>Observation (4)</th>
									</tr>
								</thead>
								
								<tbody class="corps">
									<?php $cpt=1; 
									$compter = 0;
									foreach($listeACteRad AS $l) {?>
									<?php $nbExaMed = $this->md_parametre->nb_examen_imagerie($l->lac_id,$premier,$dernier);?>
									<?php if($nbExaMed->nb != 0): ?>
									<tr> 
										<td align="center" style="font-size:11.5px;">
											<?php 
												if(strlen($cpt)==1){
													echo '0'.$cpt++;
												}else{
													echo $cpt++;
												}
											;?>
										</td>
										<td ><?php echo $l->lac_sLibelle; ?></td>
										<td align="center"><?php echo $nbExaMed->nb; ?></td>
										<td align="center"></td>
										<?php $compter++; ?>
									</tr>
									<?php endif; ?>
									<?php ;} ?>
									<?php if($compter === 0): ?>
									<tr><td colspan="4"><p style="text-align:center;color:red;">Aucun resultat trouvé</p></td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>

						<h2 class="header h4 mt-5">5. Activités de laboratoire
						<br><a class="small" href="<?php echo site_url("impression/activite_laboratoire/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
							<table id="example_copy_4" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th>N° d'ordre</th>
										<th>Type d'examens (2)</th>
										<th>Nombre d'examens réalisés (3)</th>
										<th>Observation (4)</th>
									</tr>
								</thead>
								
								<tbody class="corps">
									<?php $cpt=1; 
									$compter = 0;
									foreach($listeActeLab as $l):?> 
									<?php $nbExaLab = $this->md_patient->nb_examen_laboratoire($l->lac_id,$premier,$dernier); $nbExaLab->nb;?>
									<?php if($nbExaLab->nb != 0): ?>
									<tr> 
										<td align="center" style="font-size:11.5px;">
											<?php 
												if(strlen($cpt)==1){
													echo '0'.$cpt++;
												}else{
													echo $cpt++;
												}
											;?>
										</td>
										<td><?php echo $l->lac_sLibelle; ?></td>
										<td align="center"><?php echo $nbExaLab->nb; ?></td>
										<td align="center"></td>
										<?php $compter++ ?>
									</tr>
									<?php endif; ?>
									<?php  endforeach; ?>
									<?php if($compter === 0): ?>
									<tr><td colspan="4"><p style="text-align:center;color:red;">Aucun resultat trouvé</p></td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>

						<h2 class="header h4 mt-5">6. Consultations des femmes enceintes malades selon leur âge de la grossesse
						<br><a class="small" href="<?php echo site_url("impression/consultation_femme_enceintes/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
							<table id="example_copy_5" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th rowspan="3">Pathologie (1)</th>
										<th style="width:50px;background:rgb(255,149,149)" rowspan="2" >Code CIM (2)</th>
										<th colspan="12">Cas par âge et par sexe (3)</th>
										<th rowspan="4">Total (4)</th>
										<th rowspan="4">Observations (5)</th>
									</tr>
									<tr> 
										<th colspan="4">1 - 3 mois</th>
										<th colspan="4">4 - 6 mois</th>
										<th colspan="4">7 - 9 mois</th>
									</tr>
									<tr> 
										<td style="background:rgb(255,149,149)" align="center"></td>
										<th>-15 ans</th>
										<th>15 - 17 ans</th>
										<th>18 - 35 ans</th>
										<th>36 ans et +</th>
										<th>-15 ans</th>
										<th>15 - 17 ans</th>
										<th>18 - 35 ans</th>
										<th>36 ans et +</th>
										<th>-15 ans</th>
										<th>18 - 35 ans</th>
										<th>18 - 35 ans</th>
										<th>36 ans et +</th>
									</tr>
								</thead>
								
								<tbody class="corps">
									<?php $cpt=1; 
									$som_1=0;$som_2=0; $som_3=0;$som_4=0;$som_5=0;
									$som_6=0;$som_7=0; $som_8=0;$som_9=0;$som_10=0;
									$som_11=0;$som_12=0; $som_13=0;$som_14=0;$som_15=0;
									$som_16=0;$som_17=0; $som_18=0;$som_19=0;$som_20=0;

									foreach($liste AS $l) { ?>
									<tr> 
										<td><?php echo $l->sma_sLibelle?></td>
										<td style="background:rgb(255,149,149)" align="center"></td>
										<td align="center"><?php $m15Moins3 = $this->md_patient->rapport_femme_enceinte_malade_moins_15($l->sma_id,$m115);echo $m15Moins3->nb;$som_1+=$m15Moins3->nb;?></td>
										<td align="center"><?php $f1517Moins3 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1517,$m115);echo $f1517Moins3->nb;$som_2+=$f1517Moins3->nb;?></td>
										<td align="center"><?php $f1835Moin3 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1835,$m1517);echo $f1835Moin3->nb;$som_3+=$f1835Moin3->nb;?></td>
										<td align="center"><?php $f36plusMoins3 = $this->md_patient->rapport_femme_enceinte_malade_63_et_plus($l->sma_id,$m36plus);echo $f36plusMoins3->nb;$som_4+=$f36plusMoins3->nb;?></td>
										<td align="center"><?php $m15Moins6 = $this->md_patient->rapport_femme_enceinte_malade_moins_15($l->sma_id,$m115);echo $m15Moins6->nb;$som_4+=$m15Moins6->nb;?></td>
										<td align="center"><?php $f1517Moins6 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1517,$m115);echo $f1517Moins6->nb;$som_5+=$f1517Moins6->nb;?></td>
										<td align="center"><?php $f1835Moins6 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1835,$m1517);echo $f1835Moins6->nb;$som_6+=$f1835Moins6->nb;?></td>
										<td align="center"><?php $f36plusMoins6 = $this->md_patient->rapport_femme_enceinte_malade_63_et_plus($l->sma_id,$m36plus);echo $f36plusMoins6->nb;$som_7+=$f36plusMoins6->nb;?></td>
										<td align="center"><?php $m15Moins9 = $this->md_patient->rapport_femme_enceinte_malade_moins_15($l->sma_id,$m115);echo $m15Moins9->nb;$som_1+=$m15Moins9->nb;?></td>
										<td align="center"><?php $f1517Moins9 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1517,$m115);echo $f1517Moins9->nb;$som_2+=$f1517Moins9->nb;?></td>
										<td align="center"><?php $f1835Moins9 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1835,$m1517);echo $f1835Moins9->nb;$som_3+=$f1835Moins9->nb;?></td>
										<td align="center"><?php $f36plusMoins9 = $this->md_patient->rapport_femme_enceinte_malade_63_et_plus($l->sma_id,$m36plus);echo $f36plusMoins9->nb;$som_4+=$f36plusMoins9->nb;?></td>
										<td align="center"><?php echo $m15Moins3->nb + $f1517Moins3->nb + $f1835Moin3->nb + $f36plusMoins3->nb + $m15Moins6->nb + $f1517Moins6->nb + $f1835Moins6->nb + $f36plusMoins6->nb + $m15Moins9->nb + $f1517Moins9->nb + $f1835Moins9->nb + $f36plusMoins9->nb; ?></td>
										<td align="center"><?php ?></td>
									</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<td style="font-weight:bold">Total</td>
										<td style="background:rgb(255,149,149)" align="center"></td>
										<td align="center"><?php echo $som_1; ?></td>
										<td align="center"><?php echo $som_2; ?></td>
										<td align="center"><?php echo $som_3; ?></td>
										<td align="center"><?php echo $som_4; ?></td>
										<td align="center"><?php echo $som_5; ?></td>
										<td align="center"><?php echo $som_6; ?></td>
										<td align="center"><?php echo $som_7; ?></td>
										<td align="center"><?php echo $som_8; ?></td>
										<td align="center"><?php echo $som_9; ?></td>
										<td align="center"><?php echo $som_10; ?></td>
										<td align="center"><?php echo $som_11; ?></td>
										<td align="center"><?php echo $som_12; ?></td>
										<td align="center"><?php echo $som_13; ?></td>
										<td align="center"></td>
									</tr>
								</tfoot>
							</table>
						</div>

						<h2 class="header h4 mt-5">7. Consultations des femmes en post natal selon l'âge
						<br><a class="small" href="<?php echo site_url("impression/consultation_femme_post_natal/$premier/$dernier"); ?>">Imprimer</a></h2>

						<div class="table-responsive">
							<table id="example_copy_6" class="table table-bordered table-striped table-hover">
								<thead>
									<tr> 
										<th rowspan="2">Pathologie (1)</th>
										<th style="background:rgb(255,149,149)" rowspan="2" >Code CIM (2)</th>
										<th colspan="4">Cas par tranche d'âge (3)</th>
										<th rowspan="2">Total (4)</th>
										<th rowspan="2">Observations (5)</th>
									</tr>
									<tr> 
										<th>-15 ans</th>
										<th>15 - 17 ans</th>
										<th>18 - 35 ans</th>
										<th>36 ans et +</th>
									</tr>
								</thead>
								
								<tbody class="corps">
									<?php $cpt=1; 
									$som_1=0;$som_2=0; $som_3=0;$som_4=0;$som_5=0;
									$som_6=0;$som_7=0; $som_8=0;$som_9=0;$som_10=0;
									$som_11=0;$som_12=0; $som_13=0;$som_14=0;$som_15=0;
									$som_16=0;$som_17=0; $som_18=0;$som_19=0;$som_20=0;

									foreach($liste AS $l) { ?>
									<tr> 
										<td><?php echo $l->sma_sLibelle?></td>
										<td style="background:rgb(255,149,149)" align="center"></td>
										<td align="center"><?php $m15 = $this->md_patient->rapport_femme_enceinte_malade_moins_15($l->sma_id,$m115);echo $m15->nb;$som_1+=$m15->nb;?></td>
										<td align="center"><?php $f1517 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1517,$m115);echo $f1517->nb;$som_2+=$f1517->nb;?></td>
										<td align="center"><?php $f1835 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1835,$m1517);echo $f1835->nb;$som_3+=$f1835->nb;?></td>
										<td align="center"><?php $f36plus = $this->md_patient->rapport_femme_enceinte_malade_63_et_plus($l->sma_id,$m36plus);echo $f36plus->nb;$som_4+=$f36plus->nb;?></td>
										<td align="center"><?php echo $m15->nb + $f1517->nb + $f1835->nb + $f36plus->nb ?></td>
										<td align="center"><?php ?></td>
									</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<td style="font-weight:bold">Total</td>
										<td style="background:rgb(255,149,149)" align="center"></td>
										<td align="center"><?php echo $som_1 ?></td>
										<td align="center"><?php echo $som_2 ?></td>
										<td align="center"><?php echo $som_3 ?></td>
										<td align="center"><?php echo $som_4 ?></td>
										<td align="center"><?php echo $som_1 + $som_2 + $som_3 + $som_4 ?></td>
										<td align="center"></td>
									</tr>
								</tfoot>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>