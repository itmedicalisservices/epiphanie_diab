<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();


$remises = $this->md_patient->liste_remise($date1,$date2);
// var_dump($id);
// var_dump($date1);
// var_dump($date2);
// var_dump($liste);
// return ;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ETAT DES REMISES</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif; font-size:4pt;}
			table.footer{ position:fixed; bottom:40; left:0; right:0}
			.list td{ padding:2px 10px;}

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body >
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style=" padding:25px 10px 0px 10px" class="recu">
			<!-- En-tête du reçu -->
			<!--<table style="width:100%; height:50px" >
				<tr>
					<td  align="center" ><span style="font-weight:bold;font-size:8pt">RECU D'ENCAISSEMENT</span></td>
				</tr>
			</table>-->
			<div style="" class="recu">

					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:120px; height:50px;margin-right:35px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:120px; height:50px" border="0" /></td>
					</tr>
				</table>	
								
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">SITUATION DES REMISES PAR SERVICE</span></td>
					</tr>
				</table>				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>
				
				<table class="list" style="width:100%;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr align="center">
							<td><b>Libellé Service</b></td>
							<td width="" align=""><b>N°Facture</b></td>
							<td width="" align=""><b>Date Opération</b></td>
							<td width="" align=""><b>Patient</b></td>
							<td width="" align=""><b>Montant (XAF)</b></td>
							<td width="" align=""><b>Remise (XAF)</b></td>
							<td width="" align=""><b>Encaissé (XAF)</b></td>
							<td width="" align=""><b>Auteur</b></td>
						</tr>
					</thead>

					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php $total=0;$encaisse=0;$rem=0;foreach($remises AS $r){ ?>
						<tr>
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php echo $r->ser_sLibelle; ?></b> 
							</td>									
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php echo $r->fac_sNumero; ?></b> 
							</td>									
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php echo substr($this->md_config->affDateTimeFr($r->fac_dDatePaieTime),2); ?></b> 
							</td>
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php $pat = $this->md_patient->recup_patient($r->pat_id); echo $pat->pat_sNom.' '.$pat->pat_sPrenom; ?></b>
							</td>	
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php echo number_format($r->fac_iMontant,0,",","."); ?></b>
							</td>										
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php echo number_format($r->fac_iMontant - $r->fac_iMontantPaye,0,",","."); ?></b>
							</td>								
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php echo number_format($r->fac_iMontantPaye,0,",","."); ?></b>
							</td>									
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								<b><?php $fac = $this->md_patient->recup_facture($r->fac_id); $per = $this->md_personnel->recup_personnel($fac->per_id); echo $per->per_sNom.' '.$per->per_sPrenom; ?></b>
							</td>
						</tr>
					<?php $total+=$r->fac_iMontant;$encaisse+=$r->fac_iMontantPaye;$rem+=$r->fac_iMontant - $r->fac_iMontantPaye;}?>
						<tr>
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 
							</td>									
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 
							</td>									
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 
							</td>									
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 <b>Total Général</b>
							</td>										
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 <b><?php echo number_format($total,0,",","."); ?></b>
							</td>										
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 <b><?php echo number_format($rem,0,",","."); ?></b>
							</td>										
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 <b><?php echo number_format($encaisse,0,",","."); ?></b>
							</td>										
							<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">
								 
							</td>									
						</tr>
					</tbody>
				</table>
			</div>	
		</div>
	</body>
</html>
