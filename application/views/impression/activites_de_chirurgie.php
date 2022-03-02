<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<pre><?php $listeActeChi = $this->md_parametre->liste_acts_chirurgie_actifs(); ?></pre>



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
					<td style="font-size:15px; height:16px; font-weight:bold" align="center">2.4 ACTIVITES DE CHIRURGIE</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;">Types d'intervention (1)</th>
						<th style="font-size:12px;">Nombre de Malades Opérés (2)</th>
						<th style="font-size:12px;">Décès sur table (3)</th>
					</tr>
				</thead>
				
				<tbody class="corps">
					<?php $compteur = 0 ?>
					<?php foreach($listeActeChi as $k): ?>
					<?php $nbDecChi = $this->md_patient->nb_deces_chirurgie($k->lac_id,$premier,$dernier); $nbPatOp = $this->md_patient->nb_malade_opore($k->lac_id,$premier,$dernier);?>
					<?php if($nbPatOp->nb != 0 || $nbDecChi->nb != 0): ?>
					<tr> 
						<td style="font-size:11.5px;"><?php echo $k->lac_sLibelle ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatOp = $this->md_patient->nb_malade_opore($k->lac_id,$premier,$dernier); echo $nbPatOp->nb; ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbDecChi = $this->md_patient->nb_deces_chirurgie($k->lac_id,$premier,$dernier); echo $nbDecChi->nb; ?></td>
						<?php $compteur++; ?>
					</tr>
					<?php endif; ?>
					<?php endforeach; ?>
					<?php if($compteur === 0): ?>
					<tr><td colspan="4"><p style="text-align:center;color:red;">Aucun resultat trouvé</p></td></tr>
					<?php endif; ?>
				</tbody>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : Inscrire le type d'intervention. EX: appendicecectomie, césarienne, myomectomie, etc.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 2</b> : Inscrire le nombre de malades opérés par type d'intervetion.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : Nombre de décès enregistrés par type d'intervention.</td>
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