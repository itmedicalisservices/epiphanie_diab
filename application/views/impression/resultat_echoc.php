<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$gyneco_obs_c = $this->md_patient->gyneco_c($id);
$patient = $this->md_patient->acm_patient($gyneco_obs_c->acm_id);
$medecin = $this->md_personnel->recup_personnel($gyneco_obs_c->per_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
// var_dump($gyneco_obs_c, $patient, $medecin);
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
			<table style="width:100%;clear: both;margin">
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
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Echographie 2ème trimestre</td></tr>
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
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sIndication;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sVoie;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sCondition;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iNfoetus;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sType;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sMembrane;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:255px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td>Foetus</td></tr>
								<tr style="height:25px;">
									<td colspan="4"><ul><li><span style="font-weight:bold">Présentation et vitalité</span></li></ul></td>
								</tr>
								<tr><td colspan="4" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Présentation - A</th>
									<th style="border:1px solid #000">Activité cardiaque - A</th>
									<th style="border:1px solid #000">RCF - A </th>
									<th style="border:1px solid #000">MAF - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sPresentation ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sActCardiaque ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iRcf . ' bpm';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sMaf ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:375px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="5"><ul><li><span style="font-weight:bold">Biométrie</span></li></ul></td>
								</tr>
								<tr><td colspan="5" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">BIP - A</th>
									<th style="border:1px solid #000">PC - A</th>
									<th style="border:1px solid #000">PA - A </th>
									<th style="border:1px solid #000">Fémur - A</th>
									<th style="border:1px solid #000">Poids instimé</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iBip . ' mm';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iPc . ' mm';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iPa . ' mm';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iFemur . ' mm' ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iPoids ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:475px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold">Morphologie</span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Morphologie générale - A</th>
									<th style="border:1px solid #000">OGE - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sMorpho ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sOge ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:575px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="3"><ul><li><span style="font-weight:bold">Annexes</span></li></ul></td>
								</tr>
								<tr><td colspan="3" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Liquide et cordon - A</th>
									<th style="border:1px solid #000">PGC - A</th>
									<th style="border:1px solid #000">Placenta - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sLiquide ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iPgc . ' mm';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sPlacenta ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:675px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold">Doppler ombilic</span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Dop ombilic IR - A</th>
									<th style="border:1px solid #000">Dop ombilic Flux en Dia - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopIR ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopFlux ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:775px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="3"><ul><li><span style="font-weight:bold">Doppler ACM</span></li></ul></td>
								</tr>
								<tr><td colspan="3" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Dop ACM IR - A</th>
									<th style="border:1px solid #000">Dop ACM Vitesse - A</th>
									<th style="border:1px solid #000">Dop ACM MoM - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sAcmIR ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iDopAcmVitesse . ' cm/s';?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopAcmMOM ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:875px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold">Doppler Arantus</span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Dop Arantus IR - A</th>
									<th style="border:1px solid #000">Dop Arantius onde A - A</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopArantiusIR ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopArantiusOnde ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:975px;clear:both" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td>Utérus</td></tr>
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold">Doppler utérus</span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Dop utérin Dt IR</th>
									<th style="border:1px solid #000">Dop utérin Dt Notch</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopUterinDtIR ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopUterinDtNotch ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:1075px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold"></span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Dop utérin G IR</th>
									<th style="border:1px solid #000">Dop utérin Dt Notch</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopUterinGIR ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sDopUterinGNotch ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:1150px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="2"><ul><li><span style="font-weight:bold">Col</span></li></ul></td>
								</tr>
								<tr><td colspan="2" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Longueur</th>
									<th style="border:1px solid #000">Antonnoir</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_iColLongueur ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sColEntonnoir ;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:1300px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td colspan="1" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Conclusion</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000;" align="center"><?=$gyneco_obs_c->goc_sConclusion ;?></td>
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