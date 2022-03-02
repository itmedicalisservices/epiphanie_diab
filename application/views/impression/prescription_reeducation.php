<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$element = $this->md_patient->reeducation_sejour($id);


foreach ($element as $l) {
	$acm = $this->md_patient->acm_patient($l->acm_id);
}

$per = $this->md_personnel->liste_personnel_medical(7,1);
// $med = $this->md_patient->medecin_prescripteur_reeducation($id);
$med = $this->md_personnel->recup_personnel_hospitalisation();
?>

<?php // var_dump($acm, $element, $med);
	  // die();
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Prescription rééducation</title>
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
							<tr><td align="right" colspan="2">Brazzaville, <?php echo $this->md_config->affDateTimeFr($acm->acm_dDate); ?></td></tr>
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:40px" align="center">Presscription en rééducation</td></tr>
							<tr>
								<td style="font-weight:bold;padding-top:40px"><?php echo $acm->pat_sCivilite .' '.$acm->pat_sNom .' '. $acm->pat_sPrenom; ?></td>
								<td style="font-weight:bold;padding-top:40px" align="right">Prescripteur: <?php echo $med->per_sTitre .' '. $med->per_sNom .' '. $med->per_sPrenom ?></td>
							</tr>
						</table>
						<table style="width:100%;padding-top:230px;clear:both" align="right" cellspacing="0">
							<thead style="paddind:50px;" align="center">
								<tr style="height:25px;">
									<th>Acte de rééducation</th>
									<th>Nombre de scéance</th>
									<th>Statut</th>
								</tr>
							</thead>
							<tbody >
							<?php foreach($element AS $e){ ?>
								<tr style="height:50px">  
									<td><?php echo $e->lac_sLibelle; ?></td>
									<td align="center"><?php echo $e->ree_iNbPrinscrit; ?></td>
									<td align="center"><?php if($e->ree_iNombre==0){
													echo '<span style="color:green"><strong>Seance(s) terminée(s)</strong></span>';
												}elseif($e->ree_iNombre==$e->ree_iNbPrinscrit){
													echo '<span style="color:green"><strong>Seance(s) en attente(s)</strong></span>';
													}elseif($e->ree_iNombre!=$e->ree_iNbPrinscrit){
														echo '<span style="color:green"><strong>Seance(s) en cours</strong></span>';
													} ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</td>
				</tr>
			</table>

			<!-- Pied de page-->
			<table class="footer" style="width:100%;font-weight:bold; font-size:12px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u><?php echo $info->str_sEmail   ;?></u></i></span></span>
					</td>
				</tr>
				<tr>
					<td style="font-size:12px" align="center">tel:<?php echo $info->str_sTel   ;?></td>
				</tr>
			
			</table>
				
		</div>
	</body>
</html>