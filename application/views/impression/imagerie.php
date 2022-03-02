<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$elmt = $this->md_patient->rapport_imagerie($id,25);
// $e = $this->md_patient->medecin_prescripteur_imagerie($elmt->sea_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
$med = $this->md_personnel->recup_personnel_hospitalisation();
var_dump($elmt);
die();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rapport imagerie</title>
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
							<tr><td align="right" colspan="2">Date: <?php echo $this->md_config->affDateTimeFr($elmt->aci_dDate); ?></td></tr>
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Examen imagerie</td></tr>
							<tr>
								<td style="font-weight:bold;padding-top:40px"><?php echo $elmt->pat_sCivilite .' '.$elmt->pat_sNom .' '. $elmt->pat_sPrenom; ?></td>
								<td style="font-weight:bold;padding-top:40px" align="right">Prescripteur: <?php echo $med->per_sTitre .' '. $med->per_sNom .' '. $med->per_sPrenom ?></td>
							</tr>
						</table>
						
						<table class="table" style="width:100%;padding-top:200px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
								<tr style="height:25px;">
									<th>Acte imagerie</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td><?=$elmt->lac_sLibelle;?></td>
								</tr>
							</tbody>
							<tr><td colspan="4" style="width:100%;height:10px;"></td></tr>
							<thead align="left">
								<tr>
									<th>Conclusion:</th>
								</tr>
							</thead>
							<tr><td><?=$elmt->aci_sCompteRendu;?></td></tr>
						</table>
						<table style="width:100%;padding-bottom:160px;clear:both;"></table>
						
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