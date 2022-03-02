<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$gyneco_obs_b = $this->md_patient->gyneco_b($id);
$patient = $this->md_patient->acm_patient($gyneco_obs_b->acm_id);
$medecin = $this->md_personnel->recup_personnel($gyneco_obs_b->per_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
// var_dump($gyneco_obs_b, $patient, $medecin);
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
		<div style="padding:10px 30px 0px 30px" >
			<!-- En-tête du reçu -->
			<table align="center">
				<tr>
					<td  align="center" ><img src="<?php echo base_url($info->str_sLogo) ;?>" width="100px" height="100px" /><br><span style="font-weight:bold;font-size:18pt"><?php echo $info->str_sEnseigne  ;?><span></td>
				</tr>
			</table>
			<table style="width:100%;padding-top:30px;clear: both;">
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
					
					<td style="width:100%;">
						<table style="width:100%;" align="right">
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Echographie 1er trimestre</td></tr>
							<tr>
								<td style="font-weight:bold;padding-top:40px">Patient: <?php echo $patient->pat_sCivilite .' '.$patient->pat_sNom .' '. $patient->pat_sPrenom; ?></td>
								<td style="font-weight:bold;padding-top:40px" align="right">Prescripteur: <?php echo $medecin->per_sTitre .' '. $medecin->per_sNom .' '. $medecin->per_sPrenom ?></td>
							</tr>
						</table>
						
						<table class="table" style="width:100%;padding-top:175px;margin-bottom:100px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								
								
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Indication</th>
									<th style="border:1px solid #000">Voie d'examen</th>
									<th style="border:1px solid #000">Conditions de réalisation</th>
									<th style="border:1px solid #000">Nombre de foetus</th>
									<th style="border:1px solid #000">Type de grossesse</th>
									<th style="border:1px solid #000">Membrane</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sIndication;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sVoie;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sCondition;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_iNfoetus;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sTypeGross;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sMembrane;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:255px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr ><td>Foetus</td></tr>
								<!-- <tr style="height:25px;">
									<td colspan="7"><ul><li><span style="font-weight:bold">Embryon</span></li></ul></td>
								</tr>
								<tr><td colspan="7" style="height:10px"></td></tr> -->
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Activité cardiaque - A</th>
									<th style="border:1px solid #000">RCF - A</th>
									<th style="border:1px solid #000">MAF - A </th>
									<th style="border:1px solid #000">LCC - A</th>
									<th style="border:1px solid #000">BIP - A</th>
									<th style="border:1px solid #000">PA - A</th>
									<th style="border:1px solid #000">Clarté nuque - A </th>
									<th style="border:1px solid #000">Férum - A </th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sActCardiaque ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_iRcf . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sMaf . ' mm';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_iLcc . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_iBip . ' bpm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_iPa . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_iClarteNuque . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_iFemur . ' mm' ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:370px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<!-- <tr style="height:25px;">
									<td colspan="5"><ul><li><span style="font-weight:bold">Sac gestationnel</span></li></ul></td>
								</tr>
								<tr><td colspan="5" style="height:10px"></td></tr> -->
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Morpho de pôle céphalique - A</th>
									<th style="border:1px solid #000">Abdomen - A</th>
									<th style="border:1px solid #000">Aspect des membranes - A</th>
									<th style="border:1px solid #000">Liquide amniotique - A</th>
									<th style="border:1px solid #000">Tropoblaste: localisation - A</th>
									<th style="border:1px solid #000">Tropoblaste: aspect - A</th>
									<th style="border:1px solid #000">Décollement - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sMorphoExt ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sAbdomen ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sAspectMemb ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sLquide ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sLocalisation ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sAspect ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sDecollement ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:530px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td colspan="1" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Conclusion</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_b->gob_sConclusion ;?></td>
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