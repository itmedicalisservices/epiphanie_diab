
<?php 
	$patient = $this->md_patient->rapport_laboratoire($id, 27);
	$info = $this->md_parametre->info_structure();
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Laboratoire</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0px;}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }

		</style>
	</head>
	<body style="font-family:verdana">
		<div style="padding:10px 30px 0px 30px" >
			<!-- En-tête du reçu -->
			<table style="width:100%; height:100px" >
				<tr>
					<td  align="left" ><img src="<?php echo base_url($patient->pat_sAvatar) ;?>" width="60px" height="70px" border="0" /></td>
					<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" width="60px" height="70px" border="0" /></td>
				</tr>	
			</table>
			<table style="width:100%; height:50px; font-size:10px">
				<tr>
					<td  style="width:40%">Nom (s): <?php echo $patient->pat_sNom ;?></td>
				</tr>
				<tr>
					<td  style="width:40%">Prénom(s): <?php echo $patient->pat_sPrenom ;?></td>	
				</tr>
				<tr>
					<td  style="width:40%">ID: <?php echo $patient->pat_sMatricule ;?></td>	
				</tr>
			</table>
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">FICHE LABORATOIRE</td>
				</tr>
				<tr> 
					<td style="font-size:15px; height:20px;" align="center"><u>EXAMEN</u>:<span style="font-size:15px; height:20px; font-weight:bold"><?php echo $patient->lac_sLibelle ;?></span></td>
				</tr>
				
				
			</table>
			<br>
		 <!-- Corps de reçu -->
			<?php $list = $this->md_laboratoire->liste_element_exament_tube($patient->ala_id); foreach($list AS $l){?>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<td style="font-size:15px; height:20px;" align="left"  colspan="4">Type d'examen: <?=$l->tex_sLibelle;?></td>
					</tr>
				</thead>
				<thead>
					<th>Rubrique</th>
					<th>Valeur</th>
					<th>Unité</th>
					<th>Norme</th>
				</thead>
				<tbody class="corps">
					<tr style="height:30px">  
						<td><?=$l->ela_sLibelle;?></td>
						<td><?=$l->tan_iValeur;?></td>
						<td><?=$l->ela_sUnite;?></td>
						<td><?=$l->ela_iValMin;?> - <?=$l->ela_iValMax;?></td>
				</tbody>
			</table>
					<b><u>Conclusion</u>: </b><span style="font-size:13px"><?=$l->tan_sRapport;?><span>
			<br><br>
			<?php };?>
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