<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 

$info = $this->md_parametre->info_structure(); 
$ord = $this->md_patient->recup_ordonnance($id); 
$element = $this->md_patient->element_ordonnance($id);
$verif = $this->md_patient->verif_element_ord($id);
$med = $this->md_personnel->recup_personnel_hospitalisation();
$ord_hospitalisation = $this->md_patient->recup_ordonnance_hospitalisation($id);

// var_dump($ord, $id, $element, $med);
// die();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ordonnance</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif;font-size:10pt}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }
			.corps td{padding:5px 5px;}

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body>
		<div style="padding:0px 30px 0px 30px" >
			<!-- En-tête du reçu -->
			<table align="center">
				<tr>
					<td  align="center" ><img src="<?php echo base_url($info->str_sLogo);?>" width="150px" height="100px" /></td>
					<td  align="center" ><span style="font-weight:bold;font-size:11pt"><?php echo $info->str_sEnseigne  ;?><span></br> <span style="font-weight:normal;font-size:10pt">LABORATOIRE D'ANALYSE MEDICAL</span></br> <span style="font-weight:normal;font-size:10pt"><?php echo $info->str_sAdresse  ;?></span></br> <em style="font-weight:normal;font-size:10pt">Tel: <?php echo $info->str_sTel  ;?></em></td>
				</tr>
			</table>
			<table style="width:100%; height:100px" >			
				<tr>
					<td style="font-weight:500;font-size:15pt" align="center">ORDONNANCE MEDICALE</td>
				</tr>
			</table>
			<table style="width:100%; height:150px;">				
				<tr>
					<td colspan="3" style="padding-bottom:30px"><span style="font-weight:bold">Prescripteur:</span></br><?php echo $ord->per_sTitre.' '.$ord->per_sNom.' '.$ord->per_sPrenom  ;?> (<?php $spt = $this->md_parametre->recup_specialite($ord->spt_id); echo $spt->spt_sLibelle;?>)</td>
				</tr>	
				<tr>
					<td style="padding-bottom:10px"><span style="font-weight:bold">Patient:</span> <?php echo $ord->pat_sNom.' '.$ord->pat_sPrenom  ;?></td>
					<td align="center" style="padding-bottom:10px"></td>
					<td align="right" style="padding-bottom:10px"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo substr(substr($this->md_config->affDateTimeFr($ord->ord_dDate),3),0,-11); ?></span></td>
				</tr>
				<tr>
					<td style="padding-bottom:20px"><span style="font-weight:bold">ID:</span> <?php echo $ord->pat_sMatricule ;?>  </td>	
					<td align="center" style="padding-bottom:20px"></td>
					<td align="right" style="padding-bottom:20px"><span style="font-weight:bold">N°</span> <span style="text-align:right"><?php echo $ord->ord_id ;?></span></td>
				</tr>					
			
			</table>


			<!-- Corps de reçu -->
			<table style="width:100%;border:2px dotted black" class="corps">
				<thead align="center">
					<?php if(is_null($verif->elo_sOuvert)){?>
						<tr align="left">
							<th>Produit</th>
							<th>Qté</th>
							<th>Posologie</th>
							<th>Durée</th>
							<th>Ren.</th>
							<th>Frequence</th>
						</tr>
					<?php }else{?>
						<tr>
							<th colspan="6">Produit(s) prescript(s)</th>
						</tr>
					<?php }?>
				</thead>
				<tbody align="" style="padding:0">
				<?php foreach($element AS $e){?>
					<?php if(is_null($e->elo_sOuvert)){?>
					<?php 
						if($e->elo_iDuree >1){
							$jour="jours";
						}
						else{
							$jour="jour";
						}
					?>
						<tr>
							<td><?php echo $e->elo_sProduit; ?></td>
							<td>X <?php echo $e->elo_iQuantite; ?></td>
							<td><?php echo $e->elo_sPosologie; ?></td>
							<td><?php echo $e->elo_iDuree.' '.$jour; ?></td>
							<td><?php echo $e->elo_sRenew;?></td>
							<td><?php echo $e->elo_sFreq; ?></td>
						</tr>
					<?php }else{?>
						<tr>
							<td><?=nl2br($e->elo_sOuvert);?></td>
						</tr>
					<?php } ?>
				<?php }?>
				</tbody>
			</table>
			<table>
				<tr>
					<td  align="left" style="width:100%; height:100px">Signature du médecin : 
					</td>
				</tr>
			</table>
		 
			
			<!-- footer -->
			<table class="footer text-center" style="width:100%;">
				<tr>
					<td align="center"><b>Email:</b> <span style="color:maroon"><?php echo $info->str_sEmail;?></span> <b>Tel:</b> <span style="color:maroon"><?php echo $info->str_sTel;?> / <?php echo $info->str_sTel_2;?></span></td>
				</tr>
			</table>
				
		</div>
	</body>
</html>