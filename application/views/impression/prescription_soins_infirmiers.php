<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$acm = $this->md_patient->acm_patient($id);
// $patient = $this->md_patient->recup_patient($acm->pat_id); 
$element = $this->md_patient->soins_infirmiers_sejour($id);

foreach ($element as $l) {
	$acm = $this->md_patient->acm_patient($l->acm_id);
}

// var_dump($acm, $element);
// die();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Prescription des soins infirmiers</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0px;}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	<body style="font-family:verdana">
		<div style="padding:10px 30px 0px 30px" >
			<!-- En-tête du reçu -->
			<table style="width:100%; height:100px" >
				<tr>
					<td  align="left" ><img src="<?php echo base_url($acm->pat_sAvatar);?>" style="width:40px; height:40px" border="0" /></td>
					<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:40px; height:40px" border="0" /></td>
				</tr>	
			</table>
			<table style="width:100%; height:50px; font-size:10px">
				<tr>
					<td  style="width:40%">Nom (s): <?php echo $acm->pat_sNom;?> </td>
				</tr>
				<tr>
					<td  style="width:40%">Prénom(s): <?php echo $acm->pat_sPrenom;?> </td>	
				</tr>
				<tr>
					<td  style="width:40%">ID: <?php echo $acm->pat_sMatricule;?></td>	
				</tr>
			</table>
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Prescription des soins infirmiers</td>
				</tr>
				
			</table>
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<th align="center">Actes soins</th>
					<th align="center">Service/unité</th>
					<th align="center">Heure</th>
					<th align="center">Consigne</th>
					<th align="center">Infirmier(ère) traitant</th>
					<th align="center">Observation</th>
				</thead>
				<tbody class="corps">
				<?php foreach($element AS $e) {?>
					<tr style="height:30px">  
						<td><?php echo $e->lac_sLibelle; ?></td>
						<td><?php echo $e->ser_sLibelle; ?> / <?php echo $e->uni_sLibelle; ?></td>
						<td align="center"><?php echo $e->soi_tHeureDem; ?></td>
						<td><?php echo $e->soi_sConsigne; ?></td>
						<td align="center"><?php echo $e->per_sNom; ?> <?php echo $e->per_sPrenom; ?> <!-- (<?php // cho $e->per_sMatricule; ?>)</td> -->
						<td><?php echo $e->soi_sObservation; ?></td>
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