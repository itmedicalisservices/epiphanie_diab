<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$per = $this->md_personnel->liste_personnel_medical(7,1);
/*var_dump($patient,$element,$elmt);
die();*/

	$rapport = $this->md_patient->rapport_reeducation($id,30);
	$elt = $this->md_patient->element_rapport_reeducation($rapport->ree_id);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Compte rendu réeducation</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif;font-size:10pt}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }
			table{border-collapse:collapse;}
		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	<body>
		<div style="padding:10px 30px 0px 30px" >
			<!-- En-tête du reçu -->
			<?php //var_dump($rapport) ;?>
			<table align="center">
				<tr>
					<td  align="center" ><img src="<?php echo base_url($info->str_sLogo) ;?>" width="100px" height="100px" /><br><span style="font-weight:bold;font-size:18pt"><?php echo $info->str_sEnseigne  ;?><span></td>
				</tr>
			</table>
			<table style="width:100%;padding-top:30px;clear: both;">
				<tr>
					<!-- Liste des medecins -->
					<td style="width:40%">
						<table style="width:100%;border-right:1px dotted #000;">
							<?php foreach ($per as $k): ?>
							<tr>
								<td style="font-weight:700"><?php echo $k->per_sTitre .' '. $k->per_sNom .' '.$k->per_sPrenom;?></td>
							</tr>
							<tr>
								<td><?php echo $k->spt_sLibelle;?></td>
							</tr>
							<tr>
								<td style="padding-bottom:10px;">Tel: <?php echo $k->per_sTel;?></td>
							</tr>
							<?php  endforeach ;?>
						</table>
					</td>
					
					<td style="width:100%;">
						<table style="width:100%;" align="right">
							<tr><td align="right" colspan="2">Brazzaville, <?php echo $this->md_config->affDateFrNum($rapport->ree_dDate); ?></td></tr>
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px;text-decoration:underline" align="center">Compte rendu réeducation</td></tr>
							<tr>
								<td style="font-weight:bold;padding-top:30px">Patient :<br><?php echo $rapport->pat_sCivilite .' '.$rapport->pat_sNom .' '. $rapport->pat_sPrenom; ?></td>
								<td style="font-weight:bold;padding-top:30px" align="right"><?php if($rapport->per_id==NULL){echo 'Prescription externe';}else{echo 'Prescripteur :<br>'.$rapport->per_sTitre .' '. $rapport->per_sNom .' '. $rapport->per_sPrenom; }?></td>
							</tr>
						</table>
						<table style="width:100%;padding-top:230px;clear:both" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<th>Jour</th>
									<th>Heure </th>
									<th>Observation</th>
								</tr>
							</thead>
							<tbody >
							<?php foreach($elt AS $e){ ?>
								<tr style="height:50px">  
									<td><?php echo $this->md_config->affDateFrNum($e->sre_dJour); ?></td>
									<td><?php echo $e->sre_tHeureDebut; ?></td>
									<td><?php echo $e->sre_sObservation; ?></td>
								</tr><br>
							<?php } ?>
							</tbody>
						</table>
					</td>
				</tr>
			</table>
			<?php if($rapport->ree_sPrescription != NULL){ ?>
				<table align="center">
					<tr>
						<td><b>Fichier joint :</b></td>
						<td  align="center" ><img src="<?php echo base_url($rapport->ree_sPrescription ) ;?>" style="width:95%" /></td>
					</tr>
				</table>
			<?php } ?>

			<!-- Pied de page-->
			<table class="footer" style="width:100%;font-weight:bold; font-size:12px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u><?php echo $info->str_sEmail ;?></u></i></span></span>
					</td>
				</tr>
				<tr>
					<td style="font-size:12px" align="center">tel: <?php echo $info->str_sTel ;?> <?php if($info->str_sTel_2!=NULL){echo '/ '. $info->str_sTel_2;} ;?> <?php if($info->str_sTel_3!=NULL){echo '/ '. $info->str_sTel_3;} ;?>  </td>
				</tr>
			
			</table>
				
		</div>
	</body>
</html>