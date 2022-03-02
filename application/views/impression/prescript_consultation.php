<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure();  
// $acm = $this->md_patient->acm_patient($id);
$sej = $this->md_parametre->recupSejour($id);
$acm = $this->md_parametre->recupAcm($sej->acm_id);
$patient = $this->md_patient->recup_patient($acm->pat_id); 
$c = $this->md_patient->consultation_sejour($id);



// var_dump($patient);
// var_dump($c);

// return;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Consultation</title>
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
					<td  align="left" ><img src="<?php echo base_url($patient->pat_sAvatar);?>" style="width:100px; height:100px" border="0" /></td>
					<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:175px; height:90px" border="0" /></td>
				</tr>	
			</table>
			<table style="width:100%;" >
				<tr>
					<td  align="center" ><?php echo $info->str_sVille.', '.$this->md_config->affDateTimeFr($c->csl_dDate);?></td>
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
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Consultation du diabète</td>
				</tr>
				
			</table>
			<br>
		 <!-- Corps de reçu -->
		 
		 	<table align="center" style="width:100%; height:100px" >				
				<tr>
					<td style="width:50%" align="left" ><b>Motif de consultation</b>: <br><?php echo $c->csl_sMotif; ?></td>
					<td style="width:50%" align="right" ><b>Examen clinique</b>: <br><?php echo $c->csl_sObservation; ?></td>	
				</tr>				
				<tr>
					<td style="width:50%" align="left" ><b>Anamnèse</b>: <br><?php echo $c->csl_sAnamnese; ?></td>
					<td style="width:50%" align="right" ><b>Résumé Syndromique</b>: <br><?php echo $c->csl_sResume; ?></td>
				</tr>					
				<tr>
					<td style="width:50%"  align="left" ><b>Diagnostique</b>: <br><?php if(is_null($c->dgq_id)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $diagnos = $this->md_parametre->recupDiagnostique($c->dgq_id); echo $diagnos->dgq_sLib;} ?></td>
					<td style="width:50%" align="right" ><b>Autre diagnostique</b>: <br><?php echo $c->csl_sOtherDgq; ?></td>
				</tr>				
				<tr>
					<td style="width:50%"  align="left" ><b>Co-mordibité/FDR</b>: <br><?php if(is_null($c->com_id)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $com = $this->md_parametre->recupComordite($c->com_id); echo $com->com_sLib;}?></td>
					<td style="width:50%" align="right" ><b>Complicat./Micro-vasculaire</b>: <br><?php if(is_null($c->cmp_iMicro)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $cmp = $this->md_parametre->recupComplication($c->cmp_iMicro); echo $cmp->cmp_sLib; }?></td>
				</tr>				
				<tr>
					<td style="width:50%"  align="left" ><b>Complicat./Macro-vasculaire</b>: <br><?php if(is_null($c->cmp_iMacro)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $cmp = $this->md_parametre->recupComplication($c->cmp_iMacro); echo $cmp->cmp_sLib;} ?></td>
					<td style="width:50%" align="right" ><b>Complicat./Pied diabétique</b>: <br><?php if(is_null($c->cmp_iPied)){echo "<i class='text-danger'>Non renseigné</i>";}else{ $cmp = $this->md_parametre->recupComplication($c->cmp_iPied); echo $cmp->cmp_sLib;} ?></td>
				</tr>					
				<tr>
					<td align="left" ><b>Autre complication</b>: <br><?php if(is_null($c->csl_sOtherCmp)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sOtherCmp;}?></td>
				</tr>					
				<tr>
					<td align="left" ><b>Conclusion</b>: <br><?php if(is_null($c->csl_sCcl)){echo "<i class='text-danger'>Non renseigné</i>";}else{echo $c->csl_sCcl;}?></td>
				</tr>						
			</table>
			<table class="footer" style="width:100%; font-weight:bold; font-size:12px">
				<tr>
					<td align="center"><b>Email:</b> <span style="color:maroon"><?php echo $info->str_sEmail;?></span> <b>Tel:</b> <span style="color:maroon"><?php echo $info->str_sTel;?> / <?php echo $info->str_sTel_2;?></span></td>
				</tr>
			</table>
				
		</div>
	</body>
</html>