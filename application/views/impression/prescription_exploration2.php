<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$acm = $this->md_patient->acm_patient($id);
$patient = $this->md_patient->recup_patient($acm->pat_id); 
$element = $this->md_patient->exploration_sejour($id);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Prescription exploration fonctionnelle</title>
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
					<td  align="left" ><img src="<?php echo base_url($patient->pat_sAvatar);?>" style="width:40px; height:40px" border="0" /></td>
					<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:40px; height:40px" border="0" /></td>
				</tr>	
			</table>
			<table style="width:100%; height:50px; font-size:10px">
				<tr>
					<td  style="width:40%">Nom (s): <?php echo $patient->pat_sNom;?> </td>
				</tr>
				<tr>
					<td  style="width:40%">Prénom(s): <?php echo $patient->pat_sPrenom;?> </td>	
				</tr>
				<tr>
					<td  style="width:40%">ID: <?php echo $patient->pat_sMatricule;?></td>	
				</tr>
			</table>
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Prescription exploration fonctionnelle</td>
				</tr>
				
			</table>
			<br>
		 <!-- Corps de reçu -->
			<div style="float:left; margin-left:100px">
				<h4>* Acte(s) d'exploration</h4>
				<table style="width:200%; font-size:12px" border="1" cellspacing="0">
					<thead>
						<th>Prescription</th>
					</thead>
					<tbody class="corps">
						<?php foreach($element AS $e){ ?>
						<tr style="height:30px">  
							<td><?php echo $e->lac_sLibelle; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			
			<div style="float:left; margin-left:300px">
				<h4>* Indications</h4>
				<div style="width:60%; border:2px solid black; padding:20px">
					<p><?php echo $element->efc_sDescription; ?></p>
				</div>	
			</div>
			<table class="footer" style="width:100%; font-weight:bold; font-size:10px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u><?php echo $info->str_sEmail   ;?></u></i></span></span>
					</td>
				</tr>
				<tr>
					<td align="center" style="font-size:10px">tel:<?php echo $info->str_sTel   ;?></td>
				</tr>
			
			</table>
				
		</div>
	</body>
</html>



