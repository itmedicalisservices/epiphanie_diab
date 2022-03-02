<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$perineal = $this->md_patient->examen_perineal($id);
$patient = $this->md_patient->acm_patient($perineal->acm_id);
$medecin = $this->md_personnel->recup_personnel($perineal->per_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
// var_dump($perineal, $patient, $medecin);
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
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Fiche examen périnéal</td></tr>
							<tr>
								<td style="font-weight:bold;padding-top:40px">Patient: <?php echo $patient->pat_sCivilite .' '.$patient->pat_sNom .' '. $patient->pat_sPrenom; ?></td>
								<td style="font-weight:bold;padding-top:40px" align="right">Prescripteur: <?php echo $medecin->per_sTitre .' '. $medecin->per_sNom .' '. $medecin->per_sPrenom ?></td>
							</tr>
						</table>
						
						<table class="table" style="width:100%;padding-top:200px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td colspan="5" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Pilosité</th>
									<th style="border:1px solid #000">Pigmentation</th>
									<th style="border:1px solid #000">Séquelles obstétricales</th>
									<th style="border:1px solid #000">Distance ano-vulvaire</th>
									<th style="border:1px solid #000">Infection cutanéo-muqueuse</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000"><?=$perineal->exp_sPilo;?></td>
									<td style="border:1px solid #000;" align="center"><?=$perineal->exp_sPig;?></td>
									<td style="border:1px solid #000;" align="center"><?=$perineal->exp_sSequelle;?></td>
									<td style="border:1px solid #000;" align="center"><?=$perineal->exp_sDistance;?></td>
									<td style="border:1px solid #000;" align="center"><?=$perineal->exp_sInfec_1;?></td>
								</tr>
							</tbody>
						</table>
						
						<table class="table" style="width:100%;padding-top:320px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr><td colspan="4" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Infection bartholinite</th>
									<th style="border:1px solid #000">Lésion traumatiques</th>
									<th style="border:1px solid #000">Infection des glandes cutanéo-muqueuses</th>
									<th style="border:1px solid #000">Développement des grandes lèvres, petites lèvres et clitoris </th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000"><?=$perineal->exp_sInfec_2;?></td>
									<td style="border:1px solid #000;" align="center"><?=$perineal->exp_sLesion;?></td>
									<td style="border:1px solid #000;" align="center"><?=$perineal->exp_sInfec_3;?></td>
									<td style="border:1px solid #000;" align="center"><?=$perineal->exp_sDev;?></td>
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