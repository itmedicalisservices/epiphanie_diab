<?php $info = $this->md_parametre->info_structure(); ?>
<?php $engagement = $this->md_patient->recup_engagement_a_payer($id); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Réçu</title>
		<meta charset="UTF-8">
	</head>
	
	<body style="font-family:arial">
		<div style="width:100%; padding:5px 10px 0px 10px" >
			<!-- En-tête -->
			<table style="width:100%; height:50px" >
				<tr>
					<td  align="center" style="height:50px; font-weight:bold;">
						<b style="font-size:30px">MAISON MEDICALE FRANCE - CONGO</b><br>
						<span>Consultation, Soins, Kinésithérapie, Laboratoire, Radiologie, ECG</span><br>
						<div style="width:180px;border-top:1px solid black;margin-top:7px"></div>
					</td>
				</tr>
				
			</table>
			<!-- Corps -->
			
			<table style="width:100%;margin-top:20px" >
				<tr>
					<th style="font-size:20px;height:60px">
						ENGAGEMENT DE PAYER
					</th>
				</tr>
				<tr>
					<td>
						Je, soussigné(e)
					</td>
				</tr>
				<tr>
					<td>
						Nom(s) ........................................................................... 
						Prénom ..............................................................................
					</td>
				</tr>
				<tr>
					<td>
						Adresse ......................................................................................................................................................................
						<br>....................................................................................................................................................................................<br><br>
					</td>
				</tr>
				
				<tr>
					<td>
						Déclare m'engagé à régler les frais de séjour et les honoraires dûs par mon hospitalisation ou dûs par l'hospitalisé 
						et verser les comptes correspondants.
						<br><br>
					</td>
				</tr>
				<tr>
					<td>
						De :
					</td>
				</tr>
				<tr>
					<td>
						<img src="puce.png"/> Moi même
					</td>
				</tr>
				<tr>
					<td>
						<img src="puce.png"/> M. Mme Mlle ............................................................... 
						Prénom .............................................................................
					</td>
				</tr>
				<tr>
					<td>
						Adresse du malade à la sortie  ....................................................................................................................................
						<br>....................................................................................................................................................................................
					</td>
				</tr>
				<tr>
					<td>
						Lien de parenté  ..........................................................................................................................................................<br><br>
						<br><br>
						<br><br>
						<br><br>
					</td>
				</tr>
			</table>
			
			<table style="width:100%;margin-top:20px" >
				
				<tr>
					<td style="width:420px"></td>
					<td>
						&laquo; Lu et approuvé &raquo; , le ................................................<br><br>
					</td>
				</tr>
				<tr>
					<td style="width:420px"></td>
					<td>
						Signature
						<br><br>
						<br><br>
					</td>
				</tr>
			</table>
			
			
			<!-- bas de page -->
			<table style="width:100%;border-top:3px solid black;font-size:14px" >
				<tr>
					<td align="center">1104, Rue Lampakou sur avenue Loutassi, Plateau des 15 ans,</td>
				</tr>
				<tr>
					<td align="center">E-mail : medecincongo@yahoo.fr</td>
				</tr>
				<tr>
					<td align="center">BP : 574 Brazzaville - République du Congo<br><br></td>
				</tr>
			</table>
				
		</div>
	</body>
</html>
 