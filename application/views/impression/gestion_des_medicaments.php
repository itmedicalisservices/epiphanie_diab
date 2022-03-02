<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$liste = $this->md_pharmacie->liste_entrees_avec_parametre($premier,$dernier);
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
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">V- GESTION DES MEDICAMENTS</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;">Médicaments et dispositifs médicaux (1)</th>
						<th style="font-size:12px;">Nombre de jours de rupture (2)</th>
						<th style="font-size:12px;">Observation (3)</th>
					</tr>
				</thead>
				
				<tbody class="corps">
					<?php $cpt=1; 
					$som_1=0;$som_2=0; $som_3=0;$som_4=0;$som_5=0;
					$som_6=0;$som_7=0; $som_8=0;$som_9=0;$som_10=0;
					$som_11=0;$som_12=0; $som_13=0;$som_14=0;$som_15=0;
					$som_16=0;$som_17=0; $som_18=0;$som_19=0;$som_20=0;

					foreach($liste AS $l) {?>
					<tr> 
						<td style="font-size:11.5px;"><?php echo $l->med_sNc.' '.$l->med_iDosage.' '.$l->med_sUnite.' '.$l->for_sLibelle ?></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
					<?php } ?>
				</tbody>
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