<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$liste = $this->md_pharmacie->liste_entrees_medicament($premier,$dernier); 
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
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">IV RAPPORT D'ENTREE DES MEDICAMENTS</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="2">N° (1)</th>
						<th style="font-size:12px;" rowspan="2">Désignation (2)</th>
						<th style="font-size:12px;" rowspan="2">Dosage (3)</th>
						<th style="font-size:12px;" rowspan="2">Présentation (4)</th>
						<th style="font-size:12px;" colspan="2">Quantité (5)</th>
						<th style="font-size:12px;" rowspan="2">Prix unitaire (6)</th>
						<th style="font-size:12px;" rowspan="2">Code total d'achat (7)</th>
						<th style="font-size:12px;" rowspan="2">Date de péremtion (8)</th>
						<th style="font-size:12px;" rowspan="2">Origine (CSS, COMEG, Don) (9)</th>
						<th style="font-size:12px;" rowspan="2">Observation (10)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;">Report stock restant</th>
						<th style="font-size:12px;">Stock récéptionnée</th>
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
						<td style="font-size:11.5px;" align="center">
							<?php if(strlen($cpt)==1){
									echo '0'.$cpt++;
								}else{
									echo $cpt++;
								}
							;?>
						</td>
						<td style="font-size:11.5px;"><?php echo strtoupper($l->med_sNc) ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $l->med_iDosage.' '.$l->med_sUnite?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $l->for_sLibelle?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $l->ach_iQte?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $l->dac_iQte?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $l->dac_iPrixAchat?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $l->dac_iPrixTotalAchat?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $l->dac_dDateExpiration?></td>
						<td style="font-size:11.5px;"><?php echo $l->frs_sEnseigne; ?></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : inscrire le numéro d'ordre.</td>
					<td style="width:20%"><b>Colonne 6</b> : indiquer le prix unitaire d'achat.</td>
				</tr>
				<tr> 
					<td style="width:30%"><b>Colonne 2</b> : inscrire en <u>majuscule</u> le nom du médicament. EX: PARACETAMOL.</td>
					<td style="width:30%"><b>Colonne 7</b> : indiquer le coût total d'âchat.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : indiquer le dosage. EX: 500mg</td>
					<td style="width:30%"><b>Colonne 8</b> : indiquer la date de péremption inscrite sur l'emballage.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 4</b> : indiquer la orme de presentation. EX: (comprimé, gélule, ampoule, litre, kg).</td>
					<td style="width:30%"><b>Colonne 9</b> : indiquer l'origine du médicament (CSS, COMEG, Don, ...).</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 5</b> : inscrire dans les sous colonnes les quantités restantes (report) et les quantité réceptionnées.</td>
					<td style="width:30%"><b>Colonne 10</b> : indiquer toutes les informations utiles qui ne figurent pas sur les colonnes précedentes.</td>
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