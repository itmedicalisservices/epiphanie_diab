<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 

	$liste = $this->md_patient->liste_compteur_acte($premier, $dernier);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Compteur actes médicaux</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif; font-size:4pt;}
			table.footer{ position:fixed; bottom:40; left:0; right:0}
			.list td{ padding:2px 10px;}

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body >
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style="padding:25px 20px 0px 20px" class="recu">
			<div style="" class="recu">

					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:120px; height:50px;margin-right:35px;background:white" border="0" /></td>
						<td  align="center" ><img src="<?php echo base_url('assets/images/1601337616-1598782768.png') ;?>" style="width:120px; height:50px" border="0" /></td>
						<td  align="right" style="font-size:16px">Brazzaville, le <?php echo $this->md_config->affDateFrNum( date('Y-m-d')) ;?></td>
					</tr>
				</table>	
								
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">Compteur des actes médicaux</span></td>
					</tr>
				</table>				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($premier==$dernier){echo 'PERIODE DU: '.$this->md_config->affDateFrNum($premier);}else{echo 'PERIODE DU: '.$this->md_config->affDateFrNum($premier).' AU: '.$this->md_config->affDateFrNum($dernier);} ;?></span></td>
					</tr>
				</table>				
				<table class="list" style="width:100%;" >
					<thead style="text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr align="left">
							<td colspan="4"><b>Nombre Total Comptabilisé: <?php echo count($liste); ?></b></td>
						</tr>						
					</thead>					
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">						
						<tr align="center">
							<td><b>Date & Heure</b></td>
							<td><b>Acte Médical</b></td>
							<td><b>Patient</b></td>
							<td><b>Auteur</b></td>
						</tr>
					</thead>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php foreach($liste AS $l){?>
						<tr align="center">
							<td>
								<b><?php echo substr($this->md_config->affDateTimeFr($l->aco_dDateTime),2); ?></b>
							</td>
							<td>
								<b><?php $act = $this->md_parametre->recup_act($l->lac_id); echo $act->lac_sLibelle; ?></b> 
							</td>								
							<td>
								<b><?php $pat = $this->md_patient->recup_patient($l->pat_id);echo $pat->pat_sNom.' '.$pat->pat_sPrenom; ?></b> 
							</td>								
							<td>
								<b><?php $per = $this->md_personnel->recup_personnel($l->per_id);echo $per->per_sNom.' '.$per->per_sPrenom; ?></b>
							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			</div>	

		</div>
	</body>
</html>
