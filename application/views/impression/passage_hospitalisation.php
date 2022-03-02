<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
// $actes_medicaux_en_hospitalisation = $this->md_patient->liste_actes_medicaux_patient_hospitalisation($id);
$listeEncours = $this->md_patient->journal_hospitalisation($id);
// var_dump($id, $listeEncours);
// die();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Prescription d'hospitalisation</title>
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
					<td  align="left" ><img src="<?php echo base_url($listeEncours->pat_sAvatar);?>" style="width:40px; height:40px" border="0" /></td>
					<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:40px; height:40px" border="0" /></td>
				</tr>	
			</table>
			<table style="width:100%; height:50px; font-size:10px">
				<tr>
					<td  style="width:40%">Nom (s): <?php echo $listeEncours->pat_sNom;?> </td>
				</tr>
				<tr>
					<td  style="width:40%">Prénom(s): <?php echo $listeEncours->pat_sPrenom;?> </td>	
				</tr>
				<tr>
					<td  style="width:40%">ID: <?php echo $listeEncours->pat_sMatricule;?></td>	
				</tr>
			</table>
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Passage en hospitalisation</td>
				</tr>
				
			</table>
			<br>
		 <!-- Corps de reçu -->
		 
			<p><strong>Service : </strong><?php echo $listeEncours->ser_sLibelle; ?></p>
			
			<p><strong>Unité : </strong><?php echo $listeEncours->uni_sLibelle; ?></p>
			
			
			<p><strong>Salle : </strong><?php echo $listeEncours->cha_sLibelle; ?></p>
			
			
			<p><strong>Lit : </strong><?php echo $listeEncours->lit_sLibelle; ?></p>
			
				
			<p><strong>Type d'hospitalisation : </strong><?php echo $listeEncours->hos_sType; ?></p>
		
				
			<p><strong>Mode d'entrée : </strong><?php echo $listeEncours->hos_sMotif; ?></p>
			
			<p><strong>Durée d'hospitalisation : </strong>Du <?php echo $this->md_config->affDateFrNum($listeEncours->fac_dDatePaie);?> au <?php echo $this->md_config->affDateFrNum($listeEncours->hos_dDateSortie);?></p>

					
			<table class="footer" style="width:100%; font-weight:bold; font-size:12px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u><?php echo $info->str_sEmail;?></u></i></span></span>
					</td>
				</tr>
				<tr>
					<td style="font-size:12px" align="center">tel:<?php echo $info->str_sTel;?></td>
				</tr>
			
			</table>
				
		</div>
	</body>
</html>