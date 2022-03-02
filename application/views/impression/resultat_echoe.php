<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$gyneco_obs_e = $this->md_patient->gyneco_e($id);
$patient = $this->md_patient->acm_patient($gyneco_obs_e->acm_id);
$medecin = $this->md_personnel->recup_personnel($gyneco_obs_e->per_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
// var_dump($gyneco_obs_e, $patient, $medecin);
// die();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Prescription imagerie</title>
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
		<div style="padding:10px 30px 0px 30px;margin">
			<!-- En-tête du reçu -->
			<table align="center">
				<tr>
					<td  align="center" ><img src="<?php echo base_url($info->str_sLogo) ;?>" width="100px" height="100px" /><br><span style="font-weight:bold;font-size:18pt"><?php echo $info->str_sEnseigne  ;?><span></td>
				</tr>
			</table>
			<table style="width:100%;padding-top:30px;clear: both;margin">
				<tr>
					<!-- Liste des medecins -->
					<td style="width:40%">
						<table style="width:100%;">
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
					
					<td style="width:100%;margin-bottom:-150px;">
						<table style="width:100%;" align="right">
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Issue de grossesse</td></tr>
							<tr>
								<td style="font-weight:bold;padding-top:40px">Patient: <?php echo $patient->pat_sCivilite .' '.$patient->pat_sNom .' '. $patient->pat_sPrenom; ?></td>
								<td style="font-weight:bold;padding-top:40px" align="right">Prescripteur: <?php echo $medecin->per_sTitre .' '. $medecin->per_sNom .' '. $medecin->per_sPrenom ?></td>
							</tr>
						</table>
						
						<table class="table" style="width:100%;padding-top:175px;margin-bottom:100px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								
								
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Date d'accouchement </th>
									<th style="border:1px solid #000">Lieu</th>
									<th style="border:1px solid #000">Nombre de foetus</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?= $this->md_config->dateEN2FR($gyneco_obs_e->goe_dDate);?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_sLieu;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_iNfoetus;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:255px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td style="font-weight:bold;">Foetus</td></tr>
								<tr><td colspan="6" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Prénom - A</th>
									<th style="border:1px solid #000">Sexe - A</th>
									<th style="border:1px solid #000">Poids - A</th>
									<th style="border:1px solid #000">MAF - AMAF - A</th>
									<th style="border:1px solid #000">Etat de santé - A</th>
									<th style="border:1px solid #000">Terme - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_sPrenom ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_sSexe ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_iPoids ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_sModalite ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_sEtat ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_e->goe_sTerm ;?></td>
								</tr>
							</tbody>
						</table>
						<table style="width:100%;padding-bottom:160px;clear:both;border:1px solid #000;"></table>
					</td>
				</tr>
			</table>

			<!-- Pied de page-->
			<table class="footer" style="width:100%;font-weight:bold; font-size:12px">
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