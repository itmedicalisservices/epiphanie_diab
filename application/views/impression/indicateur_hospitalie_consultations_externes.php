<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">2.2 CONSULTATIONS EXTERNES	</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="3">Motif de consultation / Diagnostic (1)</th>
						<th style="font-size:12px;width:50px;background:rgb(255,149,149)" rowspan="3" >Code CIM (2)</th>
						<th style="font-size:12px;" colspan="3">Cas (3)</th>
						<th style="font-size:12px;" colspan="10">Cas par âge et par sexe (4)</th>
						<th style="font-size:12px;" colspan="4">Total général (5)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;width:65px" rowspan="2">NC</th>
						<th style="font-size:12px;width:65px" rowspan="2">AC</th>
						<th style="font-size:12px;width:65px" rowspan="2">Total</th>
						<th style="font-size:12px;" colspan="2">-1 an</th>
						<th style="font-size:12px;" colspan="2">1 - 4 ans</th>
						<th style="font-size:12px;" colspan="2">5 - 14 ans</th>
						<th style="font-size:12px;" colspan="2">15 - 49 ans</th>
						<th style="font-size:12px;" colspan="2">50 ans et +</th>
						<th style="font-size:12px;" colspan="3">Nombre</th>
						<th style="font-size:12px;width:65px;" rowspan="2">%</th>
					</tr>
					<tr> 
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
						<th style="font-size:12px;width:60px">Total</th>
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
						<td style="font-size:11.5px;" align="center"><?php $nc = $this->md_patient->rapport_maladie_nouveau($l->sma_id,"2019-09-05","2019-09-12");echo $nc->nb;$som_1=$som_1+$nc->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $ac = $this->md_patient->rapport_maladie_ancien($l->sma_id,"2019-09-05");echo $ac->nb;$som_2=$som_2+$ac->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $nc->nb + $ac->nb; ?></td>
						<td style="font-size:11.5px;" align="center"><?php $chmoisun = $this->md_patient->rapport_maladie_moin_1($l->sma_id,$moinsun,"H");echo $chmoisun->nb;$som_4=$som_4+$chmoisun->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $cfmoisun = $this->md_patient->rapport_maladie_moin_1($l->sma_id, $moinsun,"F"); echo $cfmoisun->nb;$som_5=$som_5+$cfmoisun->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $ch14 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m14,$moinsun,"H"); echo $ch14->nb;$som_6=$som_6+$ch14->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $cf14 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m14,$moinsun,"F"); echo $cf14->nb;$som_7=$som_7+$cf14->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $ch514 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m514,$m14,"H"); echo $ch514->nb;$som_8=$som_8+$ch514->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $cf514 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m514,$m14,"F"); echo $cf514->nb;$som_9=$som_9+$cf514->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $ch1549 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m1549,$m514,"H"); echo $ch1549->nb;$som_10=$som_10+$ch1549->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $cf1549 = $this->md_patient->rapport_maladie_1_a_49($l->sma_id,$m1549,$m514,"F"); echo $cf1549->nb; $som_11=$som_11+$cf1549->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $ch50plus = $this->md_patient->rapport_maladie_50_et_plus($l->sma_id,$m50plus,"H"); echo $ch50plus->nb;$som_12=$som_12+$ch50plus->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php $cf50plus = $this->md_patient->rapport_maladie_50_et_plus($l->sma_id,$m50plus,"F"); echo $cf50plus->nb;$som_13=$som_13+$cf50plus->nb;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $totalH = $chmoisun->nb + $ch14->nb + $ch514->nb + $ch1549->nb + $ch50plus->nb ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $totalF = $cfmoisun->nb + $cf14->nb + $cf514->nb + $cf1549->nb + $cf50plus->nb ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $total = $totalH + $totalF; ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $total/100; ?></td>
					</tr>
					<?php }?>
				</tbody>
				<tfoot>
					<td style="font-size:11.5px;font-weight:bold">Total</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_1 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_2 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_1 + $som_2 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_4 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_5 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_6 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_7 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_8 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_9 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_10 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_11 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_12 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_13 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_4 + $som_6 + $som_8 + $som_10 + $som_12 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_5 + $som_7 + $som_9 + $som_11 + $som_13 ;?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som = $som_4 + $som_5 + $som_6 + $som_7 + $som_8 + $som_9 + $som_10 + $som_11 + $som_12 + $som_13 ;?></td></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som/100; ?></td>
					</tr>
				</tfoot>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : Inscrire le motif de consultation ou le diagnostique.</td>
					<td style="width:20%"><b>Colonne 4</b> : Inscrire dans les sous colonnes le nombre de cas par service selon les motifs de consultation/diagnostic,les tranches d'âges et le sexe</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 2</b> : Code de classification internationale des maladies <b>à ne pas remplir.</b></td>
					<td style="width:20%"><b>Colonne 4</b> : Inscrire le total de cas reçus par service selon le motif de consultation/diagnostic, toutes tranches d'âge et sexe confindus.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : Inscrire dans les sous colonnes le nombre d'anciens et nouveaux cas reçus</td>
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