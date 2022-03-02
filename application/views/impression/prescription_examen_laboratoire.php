
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$sej = $this->md_patient->sejour($id);
$acm = $this->md_patient->acm_patient($sej->acm_id);
$patient = $this->md_patient->recup_patient($acm->pat_id); 
$elt = $this->md_patient->laboratoire_sejour($id);
 //var_dump((count($elt)/2));
// die();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Prescription examen laboratoire</title>
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
			<table style="width:100%; height:100px margin-bottom:50px;" align="center">
				<tr>
					<td  align="center" ><img src="<?php echo base_url($info->str_sLogo) ;?>" width="150px" height="100px" /></td>
					<td  align="center" ><span style="font-weight:bold;font-size:18pt"><?php echo $info->str_sEnseigne  ;?><span></br> <span style="font-weight:normal;font-size:15pt">LABORATOIRE D'ANALYSE MEDICAL</span></br> <span style="font-weight:normal;font-size:15pt"><?php echo $info->str_sAdresse  ;?></span></br> <em style="font-weight:normal;font-size:15pt">Tel: <?php echo $info->str_sTel  ;?></em></td>
				</tr>
			</table>
			<?php

// var_dump($elt);

?>
			<br><br><br>
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Prescription examen laboratoire</td>
				</tr>
				
			</table>
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:20px;" align="right">Date: <?php echo date("d-m-Y");?></td>
				</tr>
				
			</table>
			
			<table style="width:100%; height:50px; font-size:15px">
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
			<br><br>
			<table style="width:100%; font-size:12px; margin-left:10%;" border="1" cellspacing="0">
				<thead style="width:100%;" align="center">
					<?php if(count($elt)> 1){ ?>
						<th colspan="2">Examen(s) à faire</th>
					<?php }else{ ?>
						<th >Examen(s) à faire</th>
					<?php } ?>
				</thead>
				<tbody class="corps">
					<tr style="height:30px; width:100%;"> 
						<?php if(count($elt)> 1){ ?>
							<?php if((count($elt) % 2)== 0){ ?>
								<td >
									<?php for($i=0;$i<(int)(count($elt)/2);$i++){ ?>
										<?php echo $elt[$i]->lac_sLibelle; ?><br>
									<?php }	?>
								</td>
								<td>
									<?php for($i=(int)(count($elt)/2);$i<count($elt);$i++){ ?>
										<?php echo $elt[$i]->lac_sLibelle; ?><br>
									<?php }	?>
								</td>
							<?php }else{ ?>
								<td >
									<?php for($i=0;$i<(int)(count($elt)/2);$i++){ ?>
										<?php echo $elt[$i]->lac_sLibelle; ?><br>
									<?php }	?>
									<?php echo $elt[count($elt)-1]->lac_sLibelle; ?>
								</td>
								<td >
									<?php for($i=(int)(count($elt)/2);$i<count($elt);$i++){ ?>
										<?php echo $elt[$i]->lac_sLibelle; ?><br>
									<?php }	?>
								</td>
							<?php } ?>
						<?php }else{ ?>
							<?php for($i=0;$i<count($elt);$i++){ ?>
								<td style="width:100%;">
									<?php echo $elt[$i]->lac_sLibelle; ?>
								</td>
							<?php }	?>
						<?php } ?>
					</tr>
				</tbody>
			</table>
			
			<table class="footer" style="width:100%; font-weight:bold; font-size:12px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u><?php echo $info->str_sEmail   ;?></u></i></span></span>
					</td>
				</tr>
				<tr>
					<td style="font-size:12px" align="center">tel:<?php echo $info->str_sTel   ;?></td>
				</tr>
			
			</table>
				
		</div>
	</body>
</html>