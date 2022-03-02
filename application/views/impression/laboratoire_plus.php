<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user = $this->md_connexion->personnel_connect();
$info = $this->md_parametre->info_structure(); 
$ala = explode('-', $data);
$patient = $this->md_patient->rapport_laboratoire($ala[0], 458);
$list = $this->md_laboratoire->liste_element_exament_tube($patient->ala_id);
$per = $this->md_personnel->liste_personnel_medical(7,1);

var_dump($ala);
//die();
//$donnees=explode("*/*",$data);

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
			<table>
			<thead>
				<table align="center">
					<tr>
						<td  align="center" ><img src="<?php echo base_url($info->str_sLogo) ;?>" width="150px" height="100px" /></td>
						<td  align="center" ><span style="font-weight:bold;font-size:18pt"><?php echo $info->str_sEnseigne  ;?><span></br> <span style="font-weight:normal;font-size:15pt">LABORATOIRE D'ANALYSE MEDICAL</span></br> <span style="font-weight:normal;font-size:15pt"><?php echo $info->str_sAdresse  ;?></span></br> <em style="font-weight:normal;font-size:15pt">Tel: <?php echo $info->str_sTel  ;?></em></td>
					</tr>
				</table>
			</thead>
			<tbody>
				<!--<table style="width:100%;clear: both;"> Liste des medecins -->
					<tr>
						<td>
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
						</td>
					</tr>
					
					<?php foreach($ala as $a){?>
					<tr>
						<td style="width:100%;">
							
							<?php $patient1 = $this->md_patient->rapport_laboratoire($a, 458); ?>
							<?php $list1 = $this->md_laboratoire->liste_element_exament_tube($patient1->ala_id); ?>
							<?php if(($patient->pat_id == $patient1->pat_id) AND ($patient->ala_sNom .' '. $patient->ala_sPrenom == $patient1->ala_sNom .' '. $patient1->ala_sPrenom)){ ?>
							<div style="width:100%;padding-top:30px;">
								<table style="width:100%;padding-top:170px;" align="right">
									<tr><td colspan="2" style="font-size:15pt;font-weight:300;" align="center"><?php echo $patient1->lac_sLibelle;?></td></tr>
								</table>
								<?php foreach($list1 as $l){ ?>
								<table class="table" style="width:100%;padding-top:200px;clear:both;" align="right" cellspacing="0">
									<thead style="paddind:50px;" align="left">
										<tr>
											<td colspan="3" style="height:10px">Type d'examen: <span style="font-weight:bold;"><?php echo $l->tex_sLibelle;?></span> </td>
										</tr>
										<tr><td colspan="3" style="height:10px"></td></tr>
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
									
									<tfooter align="left" >
										<tr><th colspan="4"></th></tr>
										<tr>
											<th colspan="4">Conclusion:</th>
										</tr>
										<tr><td colspan="4" ><span ><?=$l->tan_sRapport;?></span><br></td></tr>
										<tr><th colspan="4"></th></tr>
									</tfooter>
									
								</table>
								<table style="width:100%;padding-bottom:160px;clear:both;border:1px solid #000;"></table>
								<?php } ?>
								</div>
								
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				<!-- Liste des medecins</table>-->
			</tbody>
			
				
					
				</table>
			</table>
			
			

			<!-- Pied de page-->
			
		</div>
	</body>
</html>