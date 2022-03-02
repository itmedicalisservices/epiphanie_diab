<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user = $this->md_connexion->personnel_connect();
$info = $this->md_parametre->info_structure(); 
$patient = $this->md_patient->rapport_laboratoire($id, 458);
$list = $this->md_laboratoire->liste_element_exament_tube($patient->ala_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);
//var_dump($patient);
//die();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Prescription Laboratoire</title>
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
					<td  align="center" ><img src="<?php echo base_url($info->str_sLogo) ;?>" width="150px" height="100px" /></td>
					<td  align="center" ><span style="font-weight:bold;font-size:18pt"><?php echo $info->str_sEnseigne  ;?><span></br> <span style="font-weight:normal;font-size:15pt">LABORATOIRE D'ANALYSE MEDICAL</span></br> <span style="font-weight:normal;font-size:15pt"><?php echo $info->str_sAdresse  ;?></span></br> <em style="font-weight:normal;font-size:15pt">Tel: <?php echo $info->str_sTel  ;?></em></td>
				</tr>
			</table>
			<table style="width:100%;padding-top:30px;" align="right">
				<tr style="width:100%;">
					<td style="width:30%;"></td>
					<td  style="font-size:20pt;font-weight:500;width:60%;border:1px solid #000;" align="center">BULLETIN D'EXAMENS</td>
					<td style="width:30%;"></td>
				</tr>
				<tr style="width:100%;">
					<td style="font-weight:bold;padding-top:40px " colspan="2">
						<span>Nom et Prénom : <?php echo $patient->pat_sCivilite .' '.$patient->pat_sNom .' '. $patient->pat_sPrenom; ?></span>
						</br><span>Sexe : <?php if($patient->pat_sSexe == "H"){ echo "Masculin";}else{ echo "Feminin";}?></span>
						</br><span>Prescripteur:<?php echo $patient->ala_sTitre .' '. $patient->ala_sNom .' '. $patient->ala_sPrenom ?></span>
					</td>
					<td style="font-weight:bold;padding-top:40px" align="right">Effectué le: <?php echo date("d-m-Y",strtotime($patient->acm_dDate));?></td>
				</tr>
			</table>
			<table style="width:100%;padding-top:250px;" align="right">
				<tr><td colspan="2" style="font-size:15pt;font-weight:300;" align="center"></td></tr>
			</table>
			<table style="width:100%;padding-top:30px;clear: both;">
				<tr>
					<!-- Liste des medecins -->
					<td style="width:100%;">
						<table style="width:100%;padding-top:250px;" align="right">
							<tr><td colspan="2" style="font-size:15pt;font-weight:300;" align="center"><?php echo $patient->lac_sLibelle;?></td></tr>
						</table>
						<?php foreach($list as $l): ?>
						<table class="table" style="width:100%;padding-top:270px;clear:both;" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="left">
							
								<tr>
									<td colspan="4" style="height:10px">Type d'examen: <span style="font-weight:bold;"><?php echo $l->tex_sLibelle;?></span> </td>
								</tr>
								<tr><td colspan="4" style="height:10px"></td></tr>
								<tr style="height:25px;" align="center">
									<th style="border:1px solid #000">Rubrique</th>
									<th style="border:1px solid #000">Valeur</th>
									<th style="border:1px solid #000">Unité</th>
									<th style="border:1px solid #000">Norme</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height:50px;">  
									<td style="border:1px solid #000" align="center"><?=$l->ela_sLibelle;?></td>
									<td style="border:1px solid #000;" align="center"><?=$l->tan_iValeur;?></td>
									<?php if (!empty($l->ela_sUnite)): ?>
									<td style="border:1px solid #000;" align="center"><?=$l->ela_sUnite;?></td>
									<?php else: ?>
									<td style="border:1px solid #000;" align="center">/</td>
									<?php endif ?>
									<td style="border:1px solid #000;" align="center"><?=$l->ela_iValMin;?> - <?=$l->ela_iValMax;?></td>
								</tr>
							</tbody>
							<tr><td colspan="4" style="width:100%;height:10px;border-top:1px solid #000"></td></tr>
							<thead align="left">
								<tr>
									<th>Conclusion:</th>
								</tr>
							</thead>
							<tr><td><?=$l->tan_sRapport;?></td></tr>
						</table>
						<table style="width:100%;padding-bottom:160px;clear:both;border:1px solid #000;"></table>
						<?php endforeach ?>
					</td>
				</tr>
			</table>

			<!-- Pied de page
			<table class="footer" style="width:100%;font-weight:bold; font-size:12px">
				<tr>
					<td align="center"><b>Email:</b> <span style="color:maroon"><?php echo $info->str_sEmail;?></span> <b>Tel:</b> <span style="color:maroon"><?php echo $info->str_sTel;?> / <?php echo $info->str_sTel_2;?></span></td>
				</tr>
			</table>-->
		</div>
	</body>
</html>