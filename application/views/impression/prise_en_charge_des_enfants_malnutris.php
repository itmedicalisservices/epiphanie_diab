<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">2.11 PRISE EN CHARGE DES ENFANTS MALNUTRIS</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="4" >Age des Enfants (1)</th>
						<th style="font-size:12px;width:50px;background:rgb(255,149,149)" rowspan="4" ><u>Fin du mois précédent (2)</u></th>
						<th style="font-size:12px;" colspan="6"><u>Entrée du mois (3)</u></th>
						<th style="font-size:12px;" colspan="14">Sorties (4)</th>
						<th style="font-size:12px;width:90px" rowspan="2">Reste fin du mois (5) R= 2+3-4</th>
					</tr>
					<tr> 
						<th style="font-size:12px;width:65px" colspan="2">P/T < 70% ou PB < 11cm</th>
						<th style="font-size:12px;width:65px" colspan="2">Oedèmes</th>
						<th style="font-size:12px;width:65px" colspan="2">Total</th>
						<th style="font-size:12px;width:65px" colspan="2">Guéris</th>
						<th style="font-size:12px;width:65px" colspan="2">Abandans</th>
						<th style="font-size:12px;width:65px" colspan="2">Décès</th>
						<th style="font-size:12px;width:65px" colspan="2">Référés</th>
						<th style="font-size:12px;width:65px" colspan="2">Critères non atteints</th>
						<th style="font-size:12px;width:65px" colspan="2">Erreurs d'admission</th>
						<th style="font-size:12px;width:65px" colspan="2">Total sorties (d)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px">M</th>
						<th style="font-size:12px;width:50px">F</th>
						<th style="font-size:12px;width:50px"></th>
					</tr>
					
				</thead>
				
				<tbody class="corps">
					<tr> 
						<td style="font-size:11.5px;" align="center">< 6 mois</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">6 - 11 mois</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">12 - 23 mois</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">24 - 59 mois</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">6 - 8 ans</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">9 - 18 ans</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">Total</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">%</td>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center"></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">2</td>
					</tr>
				</tbody>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : âge des enfants</td>
					<td style="width:20%"><b>Colonne 4</b> : Inscrir le nombre d'enfants déchargés.</td>
				</tr>
				<tr> 
					<td style="width:30%"><b>Colonne 2</b> : Inscrire le nombre de malnutris du mois précédent </td>
					<td style="width:30%"><b>Colonne 5</b> : Inscrire le nombre total d'enfants bénéficiares à la fin du mois</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : inscrire le nombre total d'enfants pris en charge selon le sexe quelque soit l'etat nutritionnel</td>
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