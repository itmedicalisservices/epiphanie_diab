<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
// $acm = $this->md_patient->acm_patient($id);
$c = $this->md_patient->constante_sejour($id);
$patient = $this->md_patient->recup_patient($c->pat_id); 


// var_dump($c, $id);
// die();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Constante vitale</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0px;}
			table.footer{ position:fixed; bottom:40px; left:0px; center:0px; }

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
					<td  align="center" ><?php echo $info->str_sVille.', '.$this->md_config->affDateTimeFr($c->con_dDate);?></td>
				</tr>	
			</table>	
			<table style="width:100%; height:50px; font-size:10px">
				<tr>
					<td  style="width:40%"><b>Nom (s):</b> <?php echo $patient->pat_sNom;?> </td>
				</tr>
				<tr>
					<td  style="width:40%"><b>Prénom(s):</b> <?php echo $patient->pat_sPrenom;?> </td>	
				</tr>
				<tr>
					<td  style="width:40%"><b>ID:</b> <?php echo $patient->pat_sMatricule;?></td>	
				</tr>
			</table>
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Constantes Vitales</td>
				</tr>
				
			</table>
			<br>
			<table align="center" style="width:100%; height:100px" >				
				<tr>
					<td style="width:50%" align="left" ><b>Tension arterielle (mmHg)</b>: <?php echo $c->con_iTensionSys / 10; ?>/<?php echo $c->con_iTensionDia / 10; ?></td>
					<td style="width:50%" align="right" ><b>Température (° C)</b>: <?php if(is_null($c->con_iTemperature)){}else{ echo $c->con_iTemperature;}; ?></td>
				</tr>				
				<tr>
					<td style="width:50%" align="left" ><b>Corps cétonique</b>: <?php if(is_null($c->con_sCetonique)){}else{ echo $c->con_sCetonique;}; ?></td>
					<td style="width:50%" align="right" ><b>Poids (KG)</b>: <?php if(is_null($c->con_fPoids)){}else{ echo $c->con_fPoids;}; ?></td>
				</tr>					
				<tr>
					<td style="width:50%"  align="left" ><b>Taille (cm)</b>: <?php if(is_null($c->con_fTaille)){}else{ echo $c->con_fTaille;}; ?></td>
					<td style="width:50%" align="right" ><b>Glycémie (G/L)</b>: <?php if(is_null($c->con_iGlmie)){}else{ echo $c->con_iGlmie;}; ?></td>
				</tr>					
				<tr>
					<td style="width:50%"  align="left" ><b>Tour de taille (cm)</b>: <?php if(is_null($c->con_fTourTaille)){}else{echo $c->con_fTourTaille;}; ?></td>
					<td style="width:50%" align="right" ><b>IMC (Kg/m2)</b>: <?php echo round(((100*$c->con_fPoids)/($c->con_fTaille*$c->con_fTaille)),2); ?></td>
				</tr>				
				<tr>
					<td style="width:50%"  align="left" ><b>PAS debout BG</b>: <?php if(is_null($c->con_iPdbg)){}else{ echo $c->con_iPdbg;}; ?></td>
					<td style="width:50%" align="right" ><b>PAS debout BD</b>: <?php if(is_null($c->con_iPdbd)){}else{ echo $c->con_iPdbd;}; ?></td>
				</tr>				
				<tr>
					<td style="width:50%"  align="left" ><b>PAS couché BG</b>: <?php if(is_null($c->con_iPcbg)){}else{ echo $c->con_iPcbg;}; ?></td>
					<td style="width:50%" align="right" ><b>PAS couché BD</b>: <?php if(is_null($c->con_iPcbd)){}else{ echo $c->con_iPcbd;}; ?></td>
				</tr>					
				<tr>
					<td align="left" ><b>Observations</b>:</td>
				</tr>						
			</table>
			<div style="text-align:justify">
				<?php if(is_null($c->con_sObs)){echo '<i>Non renseignée</i>';}else{ echo $c->con_sObs;}; ?>
			</div>
		 <!-- Corps de reçu -->	
			<table class="footer" style="width:100%; font-weight:bold; font-size:12px">
				<tr>
					<td align="center"><b>Email:</b> <span style="color:maroon"><?php echo $info->str_sEmail;?></span> <b>Tel:</b> <span style="color:maroon"><?php echo $info->str_sTel;?> / <?php echo $info->str_sTel_2;?></span></td>
				</tr>
			</table>
				
		</div>
	</body>
</html>