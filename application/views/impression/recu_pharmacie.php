<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Réçu</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0px;}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body style="font-family:cursive">
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style=" padding:5px 10px 0px 10px" class="recu">
			<!-- En-tête du reçu -->
			<table style="width:100%; height:50px" >
				<tr>
					<td  align="center" ><img src="assets/img/hopital.png" style="width:40px; height:40px" border="0" /></td>
					<td  align="center"style="width:70%; height:50px; font-weight:bold; font-size:14px; color:blue">PHARMACIE MEDICALIS<br>
						<span style="color:black; font-size:10px"><i><u>votre pharmacie de proximité</u></i></span>
					</td>
					<td  align="center" style="font-size:10px"><img src="assets/img/hopital.png" style="width:40px; height:40px" border="0" /></td>
				</tr>
				<tr>
					<td style="font-weight:bold; font-size:8px">Service: Pharmaicie</td>
				</tr>
			</table>
		 <!-- Corps de reçu -->
			<table style="width:100%; height:50px; font-size:12px">
				<td style="width:30%">Réçu N:</td>
				<td style="width:70%" align="right">Date et heure</td>
			</table>
			
			<table style="width:100%; height:50px; font-size:12px">
				<tr>
					<td style="width:40%; font-weight:bold">Mode de paiement: </td>
					<td style="width:60%">comptant</td>
				</tr>
				<tr>
					<td style="width:40%; font-weight:bold"></td>
					<td style="width:60%">Assureur: AGC</td>
				</tr>
				<tr>
					<td style="width:40%; font-weight:bold"></td>
					<td style="width:60%">Bande d'achat: N°2526544</td>
				</tr>
				<tr style="height:15px">
					<td></td>
					<td></td>
				</tr>
			</table>
			
			
				
			<table style="width:100%; font-size:10px">
				<thead>
					<th>Qté</th>
					<th align="left">Désignation</th>
					<th align="right">Prix Unitaire</th>
					<th align="right">Prix Total</th>
				</thead>
				<tbody class="corps">
					<tr>
						<td align="center">02</td>
						<td align="left">Vitaminal</td>
						<td align="right">500 Fcfa</td>
						<td align="right">1.000 Fcfa</td>
					</tr>
					<tr>
						<td align="center">03</td>
						<td align="left">Asparo</td>
						<td align="right">2.000 Fcfa</td>
						<td align="right">6.000 Fcfa</td>
					</tr>
					<tr>
						<td align="center">01</td>
						<td align="left">Anaflam</td>
						<td align="right">10.000 Fcfa</td>
						<td align="right">10.000 F cfa</td>
					</tr>
					<tr>
						<td align="center">01</td>
						<td align="left">Dakin</td>
						<td align="right">2000 Fcfa</td>
						<td align="right">600 F cfa</td>
					</tr>
					<tr>
						<td align="center">01</td>
						<td align="left">Anakin</td>
						<td align="right">600 Fcfa</td>
						<td align="right">600 F cfa</td>
					</tr>
					<tr>
						<td align="center">01</td>
						<td align="left">Anaflam</td>
						<td align="right">10.000 Fcfa</td>
						<td align="right">10.000 F cfa</td>
					</tr>
					<tr>
						<td align="center">01</td>
						<td align="left">Dakin</td>
						<td align="right">2000 Fcfa</td>
						<td align="right">600 F cfa</td>
					</tr>
					<tr>
						<td align="center">01</td>
						<td align="left">Anakin</td>
						<td align="right">600 Fcfa</td>
						<td align="right">600 F cfa</td>
					</tr>	
					<tr>
						<td align="center">01</td>
						<td align="left">Dakin</td>
						<td align="right">2000 Fcfa</td>
						<td align="right">600 F cfa</td>
					</tr>
					<tr>
						<td align="center">01</td>
						<td align="left">Anakin</td>
						<td align="right">600 Fcfa</td>
						<td align="right">600 F cfa</td>
					</tr>
					<tr style="height:40px">
						<td></td>
						<td></td>
						<td align="right" style="font-weight:bold">TOTAL:</td>
						<td align="right" style="font-weight:bold">100.250 F cfa</td>
					</tr>
				</tbody>
			</table>
			
			<table class="footer" style="width:100%; font-weight:bold; font-size:10px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u>pharmacie@medicalis.com</u></i></span></span>
					</td>
				</tr>
				<tr>
					<td align="center" style="font-size:10px">tel:(+242) 06 839 20 56 / 06 888 52 88 / 06 598 58 87</td>
				</tr>
			
			</table>

				

		</div>
	</body>
</html>