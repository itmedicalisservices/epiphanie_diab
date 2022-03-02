<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$listeEncours = $this->md_patient->liste_acm_laboratoire(date("Y-m-d H:i:s"),27);
$listeTube = $this->md_patient->liste_tube_laboratoire(27);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Prélèvements laboratoire</title>
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
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">Prélèvements laboratoire effctués</td>
				</tr>			
			</table>
			<br>
		 <!-- Corps de reçu -->
			
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<th>Patient</th>
					<th>Acte laboratoire</th>
					<th>Médecin prescripteur</th>
					<th>Prélèvements</th>
				</thead>
				<tbody class="corps">
					<?php foreach($listeTube AS $le){ ?>
						<tr>
							<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b> ('.$le->pat_sMatricule.')'; ?></td>
							<td><?php echo $le->lac_sLibelle ; ?></td>
							<td class="text-center" style="font-size:13px">
								<?php if(is_null($le->per_sAvatar)){ ?>
									<i>La prescription est externe de l'hôpitale</i><br><br>
									<a href="<?php echo base_url($le->ala_sPrescription); ?>" target="_blank"><i class="fa fa-download"></i> Télécharger</a>
								<?php }else{echo "<img src='".base_url($le->per_sAvatar)."' width='50' height='50'/><br><b>".$le->per_sNom.'</b> '.$le->per_sPrenom." <br>(".$le->per_sMatricule.")";} ?>
							</td>
							<td class="">
								<table>
									<tr>
										<th>Elément analyse</th>
										<th>Type examen</th>
										<th>Numéro</th>
										<th>Code à barre</th>
									</tr>
									
									<?php $list = $this->md_laboratoire->liste_element_exament_tube($le->ala_id); foreach($list AS $l){?>
										<tr>
											<td><?=$l->ela_sLibelle;?></td>
											<td><?=$l->tex_sLibelle;?></td>
											<td><?=$l->tan_sNum;?></td>
											<td><img src="<?php echo base_url($l->tan_sImg) ;?>" style="width:50%"/></td>
										</tr>
									<?php };?>
								</table>
							</td>
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