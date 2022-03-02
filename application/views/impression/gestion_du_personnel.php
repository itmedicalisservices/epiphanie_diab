<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$liste = $this->md_parametre->liste_postes_actifs();
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
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">RAPPORT MENSUEL SNIS</td>
				</tr>
			</table>
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">VIII GESTION DU PERSONNEL : Personnel pa qualification, sex et structures</td> 
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="2">Qualification (1)</th>
						<th style="font-size:12px;" colspan="2">Sexe (2)</th>
						<th style="font-size:12px;" rowspan="2">Observation (3)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;width:200px">M</th>
						<th style="font-size:12px;width:200px">F</th>
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
						<td style="font-size:11.5px;"><?php echo $l->pst_sLibelle ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPerH = $this->md_personnel->nb_complete_personnel_post($l->pst_id,"M"); echo $nbPerH->nb; $som_1 += $nbPerH->nb; ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPerF = $this->md_personnel->nb_complete_personnel_post($l->pst_id,"F"); echo $nbPerF->nb; $som_2 += $nbPerF->nb; ?></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td style="font-size:11.5px;font-weight:bold">Total</td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_1 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $som_2 ?></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
				</tfoot>
			</table>
			
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : inscrire les differentes qualifications des personnels en service dans la CSS Exemple : médecin, infirmier diplomé d'etat</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 2</b> : inscrire le nombre des agents selon le sexe</b></td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : inscrire toutes les informations utlies non indiquées dans les colonnes précedentes (en formtion, ...)</td>
				</tr>
				
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%">Commentaires :</td>
				</tr>
				<tr> 
					<td style="width:20%">Suggestions</td>
				</tr>
				<tr> 
					<td style="width:20%">Conclusion</td>
				</tr>
				<tr><td style="height:30px"></td></tr>
				<tr> 
					<td style="width:20%" align="center">Fait à ..................................</td>
				</tr>
				<tr><td style="height:30px"></td></tr>
				<tr> 
					<td style="width:20%" align="center">Le directeur de l'hopital</td>
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