<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$liste = $this->md_patient->liste_maladie_retenue($premier,$dernier); 
$aujourdhui = date("Y-m-d");

$maDateMoinun = strtotime($aujourdhui."- 365 days");
$moinsun = date("Y-m-d",$maDateMoinun). "\n";

$maDate115 = strtotime($aujourdhui."- 5475 days");
$m115 = date("Y-m-d",$maDate115). "\n";

$maDate1517 = strtotime($aujourdhui."- 6205 days");
$m1517 = date("Y-m-d",$maDate1517). "\n";

$maDate1835 = strtotime($aujourdhui."- 12775 days");
$m1835 = date("Y-m-d",$maDate1835). "\n";

$maDate36plus = strtotime($aujourdhui."- 13140‬ days");
$m36plus = date("Y-m-d",$maDate36plus). "\n";

//var_dump($m1517);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rapport</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0px;}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }

		</style>
	</head>
	<body style="font-family:verdana">
		<div style="width:100%;padding:10px 2px 0px 2px" >
			<!-- En-tête du reçu -->
			
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">RAPPORT MENSUEL DE L'HOPITAL DE REFERENCE</td>
				</tr>
			</table>
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">2.7 CONSULTATIONS DES FEMMES ENCEINTES MALADE SELON LEUR AGE ET L'AGE DE LA GROSSESSE</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="3">Pathologie (1)</th>
						<th style="font-size:12px;width:50px;background:rgb(255,149,149)" rowspan="2" >Code CIM (2)</th>
						<th style="font-size:12px;" colspan="12">Cas par âge et par sexe (3)</th>
						<th style="font-size:12px;" rowspan="3">Total (4)</th>
						<th style="font-size:12px;" rowspan="3">Observations (5)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;" colspan="4">1 - 3 mois</th>
						<th style="font-size:12px;" colspan="4">4 - 6 mois</th>
						<th style="font-size:12px;" colspan="4">7 - 9 mois</th>
					</tr>
					<tr> 
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<th style="font-size:12px;width:60px">-15 ans</th>
						<th style="font-size:12px;width:60px">15 - 17 ans</th>
						<th style="font-size:12px;width:60px">18 - 35 ans</th>
						<th style="font-size:12px;width:60px">36 ans et +</th>
						<th style="font-size:12px;width:60px">-15 ans</th>
						<th style="font-size:12px;width:60px">15 - 17 ans</th>
						<th style="font-size:12px;width:60px">18 - 35 ans</th>
						<th style="font-size:12px;width:60px">36 ans et +</th>
						<th style="font-size:12px;width:60px">-15 ans</th>
						<th style="font-size:12px;width:60px">18 - 35 ans</th>
						<th style="font-size:12px;width:60px">18 - 35 ans</th>
						<th style="font-size:12px;width:60px">36 ans et +</th>
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
						<td style="font-size:11.5px;"><?php echo $l->sma_sLibelle?></td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center"><?php $m15Moins3 = $this->md_patient->rapport_femme_enceinte_malade_moins_15($l->sma_id,$m115);echo $m15Moins3->nb;$som_1+=$m15Moins3->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f1517Moins3 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1517,$m115);echo $f1517Moins3->nb;$som_2+=$f1517Moins3->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f1835Moin3 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1835,$m1517);echo $f1835Moin3->nb;$som_3+=$f1835Moin3->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f36plusMoins3 = $this->md_patient->rapport_femme_enceinte_malade_63_et_plus($l->sma_id,$m36plus);echo $f36plusMoins3->nb;$som_4+=$f36plusMoins3->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $m15Moins6 = $this->md_patient->rapport_femme_enceinte_malade_moins_15($l->sma_id,$m115);echo $m15Moins6->nb;$som_4+=$m15Moins6->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f1517Moins6 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1517,$m115);echo $f1517Moins6->nb;$som_5+=$f1517Moins6->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f1835Moins6 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1835,$m1517);echo $f1835Moins6->nb;$som_6+=$f1835Moins6->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f36plusMoins6 = $this->md_patient->rapport_femme_enceinte_malade_63_et_plus($l->sma_id,$m36plus);echo $f36plusMoins6->nb;$som_7+=$f36plusMoins6->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $m15Moins9 = $this->md_patient->rapport_femme_enceinte_malade_moins_15($l->sma_id,$m115);echo $m15Moins9->nb;$som_1+=$m15Moins9->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f1517Moins9 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1517,$m115);echo $f1517Moins9->nb;$som_2+=$f1517Moins9->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f1835Moins9 = $this->md_patient->rapport_femme_enceinte_malade_15_35($l->sma_id,$m1835,$m1517);echo $f1835Moins9->nb;$som_3+=$f1835Moins9->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $f36plusMoins9 = $this->md_patient->rapport_femme_enceinte_malade_63_et_plus($l->sma_id,$m36plus);echo $f36plusMoins9->nb;$som_4+=$f36plusMoins9->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $m15Moins3->nb + $f1517Moins3->nb + $f1835Moin3->nb + $f36plusMoins3->nb + $m15Moins6->nb + $f1517Moins6->nb + $f1835Moins6->nb + $f36plusMoins6->nb + $m15Moins9->nb + $f1517Moins9->nb + $f1835Moins9->nb + $f36plusMoins9->nb; ?></td>
						<td style="font-size:11.5px;" align="center"><?php ?></td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<td style="font-size:11.5px;font-weight:bold">Total</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_1; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_2; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_3; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_4; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_5; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_6; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_7; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_8; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_9; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_10; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_11; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_12; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_13; ?></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
				</tfoot>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : Liste des pathologies. Celles-ci sont répertoriées à partir du registre de consultation prénatale (CPN), registre du bloc d'accouchements et suite des couches.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 2</b> : Code de classification internationale des maladies <b>à ne pas remplir.</b></td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : Inscrire les cas pathologiques enregistrés selon la tranche d'âge et de la grossesse.</b></td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : Inscrire le total des cas.</b></td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 4</b> : Inscrire le nombre de cas référés.</td>
					<td style="width:20%"></td>
				</tr>
				
			</table>
			<table class="footer" style="width:100%; font-weight:bold; font-size:12px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u>magasin@medicalis.com</u></i></span></span>
					</td>
				</tr>
				<tr>
					<td style="font-size:12px" align="center">tel:(+242) 06 839 20 56 / 06 888 52 88 / 06 598 58 87</td>
				</tr>
			
			</table>
				
		</div>
	</body>
</html>