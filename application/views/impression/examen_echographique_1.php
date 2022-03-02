<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$echographie = $this->md_patient->examen_echographique($id);
$patient = $this->md_patient->acm_patient($echographie->acm_id);
$medecin = $this->md_personnel->recup_personnel($echographie->per_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
// var_dump($echographie, $patient, $medecin);
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
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Fiche 1 d'examen échographique</td></tr>
							<tr>
								<td style="font-weight:bold;padding-top:40px">Patient: <?php echo $patient->pat_sCivilite .' '.$patient->pat_sNom .' '. $patient->pat_sPrenom; ?></td>
								<td style="font-weight:bold;padding-top:40px" align="right">Prescripteur: <?php echo $medecin->per_sTitre .' '. $medecin->per_sNom .' '. $medecin->per_sPrenom ?></td>
							</tr>
						</table>
						
						<table class="table" style="width:100%;padding-top:150px;clear:both;" align="right" cellspacing="0">
							
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="4">
										<h2 style="font-size:15px;">Echographie gynécologique</h2>
										<ul><li><span style="font-weight:bold">Renseignements généraux</span></li></ul>
									</td>
								</tr>
								
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">DDR</th>
									<th style="border:1px solid #000">Contexte gynécologique </th>
									<th style="border:1px solid #000">Conditions de réalisation</th>
									<th style="border:1px solid #000">Voie d'examen</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000"><?= $this->md_config->dateEN2FR($echographie->eec_sDdr) ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$echographie->eec_sContexte;?></td>
									<td style="border:1px solid #000;" align="center"><?=$echographie->eec_sRealisation;?></td>
									<td style="border:1px solid #000;" align="center"><?=$echographie->eec_sExamen;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:285px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<td colspan="4"><ul><li><span style="font-weight:bold">Indications</span></li></ul></td>
								</tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Utérus</th>
									<th style="border:1px solid #000">Annaxes</th>
									<th style="border:1px solid #000">Autres</th>
									<th style="border:1px solid #000">Texte libre </th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000"><?=$echographie->eec_sUterus;?></td>
									<td style="border:1px solid #000;" align="center"><?=$echographie->eec_sAnnexe ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$echographie->eec_sAutres ;?></td>
									<td style="border:1px solid #000;" align="center"><?=$echographie->eec_sTexte;?></td>
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