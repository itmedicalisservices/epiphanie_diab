<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$gyneco_obs_a = $this->md_patient->gyneco_a($id);
$patient = $this->md_patient->acm_patient($gyneco_obs_a->acm_id);
$medecin = $this->md_personnel->recup_personnel($gyneco_obs_a->per_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
// var_dump($gyneco_obs_a, $patient, $medecin);
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
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Echographie < 12 SA</td></tr>
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
									<th style="border:1px solid #000">Nombre d'embryons</th>
									<th style="border:1px solid #000">Type de grossesse</th>
									<th style="border:1px solid #000">Membrane</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sIndication;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sVoie;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sCondition;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_iNEmbre;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sTypeGross;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sMembrane;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:255px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td>Embryon A</td></tr>
								<tr style="height:25px;">
									<td colspan="7"><ul><li><span style="font-weight:bold">Embryon</span></li></ul></td>
								</tr>
								<tr><td colspan="7" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Visibilité du foetus</th>
									<th style="border:1px solid #000">Sac gest : LCC - A</th>
									<th style="border:1px solid #000">Bip - A </th>
									<th style="border:1px solid #000">Activité cardiaque</th>
									<th style="border:1px solid #000">RCF - A</th>
									<th style="border:1px solid #000">Morphologie de l'extrémité cephalique - A</th>
									<th style="border:1px solid #000">Morphologie des membres - A </th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sVisibilite ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_iLcc . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_iBip . ' mm';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sActCard ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_iRcf . ' bpm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sMorphoExt ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sMorphoMemb ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:460px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="5"><ul><li><span style="font-weight:bold">Sac gestationnel</span></li></ul></td>
								</tr>
								<tr><td colspan="5" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Localisation</th>
									<th style="border:1px solid #000">Tonicité</th>
									<th style="border:1px solid #000">Trophoblaste </th>
									<th style="border:1px solid #000">Diamètre</th>
									<th style="border:1px solid #000">Décollement</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sLocalisation ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sToniocite ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sTrophoblaste ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_iDiametre . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sDecollement ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:570px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td>Foetus</td></tr>
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold">Ovaire droit</span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Taille</th>
									<th style="border:1px solid #000">Aspect</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_iOvDroit . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sOvDroitAspect ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:690px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold">Ovaire gauche</span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Taille</th>
									<th style="border:1px solid #000">Aspect</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_iOvGauche . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_a->goa_sOvGaucheAspect ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:815px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td colspan="1" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Conclusion</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" colspan="1" align="center"><?= $gyneco_obs_a->goa_sConclusion ;?></td>
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