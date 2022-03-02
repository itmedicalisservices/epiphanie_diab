<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();

if($mvt==0){
	$liste  = $this->md_patient->liste_facture_assure_ticket($mvt, $date1,$date2);
	$lib = 'ETAT DES TICKETS MODERATEURS';
}else{
	$liste  = $this->md_patient->liste_facture_assure_ticket($mvt, $date1,$date2);
	$lib = 'ETAT DES TICKETS MODERATEURS PAR ASSUREUR';
}


// var_dump($id);
// var_dump($date1);
// var_dump($date2);
// var_dump($liste);
// return ;
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $lib;?></title>
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
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline"><?php echo $lib;?></span></td>
					</tr>
				</table>				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>
				
				<?php if($mvt == 0){?>
				<table class="list" style="width:100%;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr align="center">
							<td width="" align="center">Ordre</td>
							<td>Patient</td>
							<td>Assureur</td>
							<td>Total </td>
							<td>Payé par l'assurance</td>
							<td>Payé par le patient</td>
							<td>Date Opération</td>
							<td>N° Facture</td>
						</tr>
					</thead>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php $total=0; $ass=0; $pat=0; $cpt =1;foreach($liste AS $l){?>
						<tr align="center">
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $cpt; ?></b>
							</td>							
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $l->pat_sNom; ?> <?php echo $l->pat_sPrenom; ?></b>
							</td>
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $l->ass_sLibelle; ?></b>
							</td>										
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo number_format($l->fac_iMontant,0,",","."); ?> XAF</b> 
							</td>				
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo number_format($l->fac_iMontantAss,0,",","."); ?> XAF</b>
							</td>				
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo number_format($l->fac_iMontantPaye,0,",","."); ?> XAF</b>
							</td>						
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $this->md_config->affDateFrNum($l->fac_dDatePaie); ?></b>
							</td>							
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $l->fac_sNumero; ?></b>
							</td>									
						</tr>
						<?php $total+=$l->fac_iMontant; $ass+=$l->fac_iMontantAss; $pat+=$l->fac_iMontantPaye; $cpt+=1;}?>
						<tr>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
							<td align="center" style="font-weight:bold;font-size:7pt;border-bottom:1px dotted #000" >CUMUL </td>
							<td align="center" style="font-weight:bold;font-size:7pt;border-bottom:1px dotted #000" width="35%"><?php echo number_format($total,0,",",".") ;?> XAF</td>
							<td align="center" style="margin-top:7px;border-bottom:1px dotted #000"><?php echo number_format($ass,0,",",".") ;?> XAF</td>
							<td align="center" style="margin-top:7px;border-bottom:1px dotted #000"><?php echo number_format($pat,0,",",".") ;?> XAF</td>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
						</tr>
					</tbody>
				</table>
				<?php }else{?>
				<table class="list" style="width:100%;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr align="center">
							<td width="4%" align="center">Ordre</td>
							<td>Assureur</td>
							<td>Total (XAF)</td>
						</tr>
					</thead>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php $total=0; $cpt=1;foreach($liste AS $l){?>
						<tr align="center">
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $cpt; ?></b>
							</td>							
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php $ass = $this->md_parametre->recup_assureur($l->ass_id); echo $ass->ass_sLibelle; ?></b>
							</td>
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo number_format($l->cumul,0,",",".") ;?></b>
							</td>																			
						</tr>
						<?php $total+=$l->cumul; $cpt+=1;}?>
						<tr>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
							<td align="right" style="font-weight:bold;font-size:7pt;border-bottom:1px dotted #000" >CUMUL </td>
							<td align="center" style="font-weight:bold;font-size:7pt;border-bottom:1px dotted #000" width="35%"><?php echo number_format($total,0,",",".") ;?></td>
						</tr>
					</tbody>
				</table>
				<?php }?>
			</div>	

		</div>
	</body>
</html>
