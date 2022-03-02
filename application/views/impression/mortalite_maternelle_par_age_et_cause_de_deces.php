<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$liste = $this->md_patient->liste_maladie_retenue(); 
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
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">2.10 MORALITE MATERNELLE PAR ÂGE ET CAUSE DE DECES</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="4" >Cause (1)</th>
						<th style="font-size:12px;background:rgb(255,149,149)" rowspan="4" >Code CIM (2)</th>
						<th style="font-size:12px;" colspan="4">Décès  par tranches d'âge (3)</th>
						<th style="font-size:12px;" rowspan="4">Total (4)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;" rowspan="2">- 15 ans</th>
						<th style="font-size:12px;" rowspan="2">15 - 17 ans</th>
						<th style="font-size:12px;" rowspan="2">18 - 35 ans</th>
						<th style="font-size:12px;" rowspan="2">36 ans et +</th>
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
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : Notifier la cause ayant engendré la mort maternelle</td>
				</tr>
				<tr> 
					<td style="width:30%"><b>Colonne 2</b> : Code des classification internationale des maladies <b>à ne pas remplir</b></td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : inscrire dans les sous colonnes le nombre de décès maternelle enregistrés par tranche d'âge selon la cause de décès avant et après l'accouchement.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 4 : inscrire le nombre total de décès maternels selon la cause</b></td>
				</tr>
				<tr> 
					<td style="width:30%"><b><u>N.B.</u> : </b> Est considéré décès maternelle tous décès de femme dont les facteurs ayant occasionné sa mort sont liés avec la grossesse avant l'accouchement ou après l'accouchement</td>
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