<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$listeEncours = $this->md_patient->liste_acm_imagerie_fait(25);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Imagérie actes clôturés</title>
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
			<table style="width:100%; height:50px" >
				<tr>
					<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:40px; height:40px" border="0" /></td>
					
					<td  align="right" style="width:100%; height:50px; font-size:10px"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></td>
				</tr>
			</table>
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Liste des examens faits</td>
				</tr>			
			</table>
			<br>
		 <!-- Corps de reçu -->
			
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<th>Patient</th>
					<th>Acte imagérie</th>
					<th>Médecin prescripteur</th>
					<th>Jour de l'acte</th>
					<th>Radiologue</th>
				</thead>
				<tbody class="corps">
					<?php foreach($listeEncours AS $le){ 
						$e = $this->md_patient->medecin_prescripteur_imagerie($le->sea_id); 
					?>
						<tr>
							<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b><br> ('.$le->pat_sMatricule.')'; ?></td>
							<td class="text-center"><?php echo $le->lac_sLibelle ; ?> <br><br> dans l'unité<br><br><b><?php echo $le->uni_sLibelle ; ?></b></td>
							<td class="text-center"><?php if(!is_null($e->per_sAvatar)){echo "<img src='".base_url($e->per_sAvatar)."' width='65' height='65'/><br><b>".$e->per_sNom.'</b> '.$e->per_sPrenom." <br>(".$e->per_sMatricule.")";}else{echo "<span style='color:red'>pas encore renseigné</span>";} ?></td>
							<td class="text-center"><?php echo $this->md_config->affDateTimeFr($le->aci_dDate);?></td>
							<td class="text-center"><?php echo "<img src='".base_url($le->per_sAvatar)."' width='65' height='65'/><br><b>".$le->per_sNom.'</b> '.$le->per_sPrenom." <br>(".$le->per_sMatricule.")"; ?></td>
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