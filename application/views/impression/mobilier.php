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
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">RAPPORT MENSUEL SNIS</td>
				</tr>
			</table>
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">7.3- MOBILIER</td> 
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="2">Désignation</th>
						<th style="font-size:12px;" colspan="2">Quantité</th>
						<th style="font-size:12px;" rowspan="2">Total</th>
					</tr>
					<tr> 
						<th style="font-size:12px;width:200px">Bon</th>
						<th style="font-size:12px;width:200px">Hors d'usage</th>
					</tr>
				</thead>
				
				<tbody class="corps">
					<tr> 
						<td style="font-size:11.5px;" align="center">1</td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">3</td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
					<tr> 
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
				</tbody>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : inscrire le type de mobilier.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 2</b> : inscrire dans les sous colonne les quantités selon l'état et le type de mobilier.</b></td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : inscrire le total.</b></td>
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