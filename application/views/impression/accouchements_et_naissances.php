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
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">2.9 ACCOUCHEMENTS ET NAISSANCES</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;width:50px;background:rgb(255,149,149)" rowspan="4" >STRUCTURES (1)</th>
						<th style="font-size:12px;" colspan="3">Type Accouchements (2)</th>
						<th style="font-size:12px;" rowspan="4">A domicile (3)</th>
						<th style="font-size:12px;" rowspan="4">Total (4)</th>
						<th style="font-size:12px;" colspan="16">Naissances (5)</th>
						<th style="font-size:12px;" rowspan="4">Observations (6)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;width:65px" rowspan="2">Accouch. Eutoc.</th>
						<th style="font-size:12px;width:65px" rowspan="2">Accouch. Dystoc.</th>
						<th style="font-size:12px;width:65px" rowspan="2">Césarienne</th>
						<th style="font-size:12px;" colspan="2">Mono foetal</th>
						<th style="font-size:12px;" colspan="2">Gemel.</th>
						<th style="font-size:12px;" colspan="2">Enf. Vivant (a)</th>
						<th style="font-size:12px;" colspan="2">Morts Nés (b)</th>
						<th style="font-size:12px;" colspan="2">Prématuré (né entre 28 et 37 sem.)</th>
						<th style="font-size:12px;" colspan="2">Poids < 2500g</th>
						<th style="font-size:12px;" colspan="2">Décès</th>
						<th style="font-size:12px;" colspan="2">Total de naissances (a+b)</th>
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
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
						<th style="font-size:12px;width:60px">M</th>
						<th style="font-size:12px;width:60px">F</th>
					</tr>
					
				</thead>
				
				<tbody class="corps">
					<tr> 
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
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
					</tr>
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
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center">4</td>
						<td style="font-size:11.5px;" align="center">4</td>
					</tr>
				</tbody>
				<tfoot>
						<td style="font-size:11.5px;background:rgb(255,149,149)" align="center">Total</td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"></td>
					</tr>
				</tfoot>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : </td>
				</tr>
				<tr> 
					<td style="width:30%"><b>Colonne 2</b> : inscrire dans les sous colonnes les types d'accouchement enregistrés <br>
						<u>Accouchements eutocique:</u> Ce sont les accouchements normaux (par voie basse).<br>
						<u>Accouchements dystocique:</u> Ce sont les accouchements par la voie basse mais qui nécessitent l'utilisation des forceps, ventouses, ...<br>
						<u>Accouchements par Césarienne:</u> On a eu recours à l'intervvention chirurgicale pour sortir le bébé de l'utérus de la mère.
					</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : inscrire le nombre d'accouchement à domicile</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 4 : inscrire le total des accouchements</b></td>
				</tr>
				<tr> 
					<td style="width:30%"><b>Colonne 5 : inscrire</b> dans les sous colonnes le nombre de naissances enregistrés selon le sexe ainsi que le total (avec précision).<br>
						<u>Mono-foetal:</u> naissance d'un enfant<br>
						<u>Gémelaire:</u> Naissance de deux ou plusieurs enfants<br>
						<u>Vivant:</u> C'est le nouveau-né qui crie et respire (dont toutes les fonctions vitales existent à la sortie de l'utérus de la mère).<br>
						<u>Mort-né:</u> C'est le nouveau-né qui est mort dans l'utérus de la mère.<br>
						<u>Prématuré:</u> C'est le nouveau-né qui est né entre 28 et 37 semaines d'amenorrhée.<br>
						<u>Poids < 2500 g:</u> C'est le nouveau-né de petit poids de naissance quelque soit l'âge de la grossesse.<br>
						<u>Décès:</u> C'est le nouveau-né qui décède entre le 1er et le 28eme jour.<br>
						<b><u>Total de naissances : c'est la somme des naissances vivantes et des mort-nés (a+b)</u></b>
					</td>
				</tr>
				<tr> 
					<td style="width:30%"><b>Colonne 6</b> : Inscrire le nombre de cas référés en précisant si la cause de cette référence est l'accouchhement ou l'etat du nouveau-né</td>
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