<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();

if($acte==NULL){
	$liste  = $this->md_patient->liste_rapport_annulation($date1,$date2);
}else{
	$liste  = $this->md_patient->liste_rapport_annulation($date1,$date2,$data["acte"]);
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
		<title>Rapport Annulation Facture</title>
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
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">RAPPORT DES ANNULATIONS</span></td>
					</tr>
				</table>				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>
				<table class="list" style="width:100%;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr>
							<td width="4%" align="center">ORDRE</td>
							<td width="16%" align="center">N° FAC/OP.</td>
							<td width="23%" align="center">DATE & HEURE</td>
							<td width="29%" align="center">TYPE OPERATION</td>
							<td width="" align="center">MONTANT(XAF)</td>						
							<td width="24%" align="center">EFFECTUEE PAR:</td>
						</tr>
					</thead>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php $som =0; $cpt =1;foreach($liste AS $m){?>
						<tr align="center">
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $cpt; ?></b>
							</td>							
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}elseif($m->fac_sObjet=="6"){echo $m->fac_id.substr($m->fac_sNumero,-8);}else{ echo substr($m->fac_sNumero,4);}; ?></b>
							</td>
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
							</td>										
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6"){echo ' ('.$m->fac_sNumero.')';};?></b> 
							</td>				
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php if($m->fac_sObjet=="6"){echo number_format(abs($m->fac_iRemise),0,",",".");}else{ echo number_format($m->fac_iMontantPaye,0,",",".");}; ?></b>
							</td>									
							<td style="margin-top:7px;border-bottom:1px dotted #000">
								<b><?php $pers = $this->md_personnel->recup_personnel($m->per_id); echo $pers->per_sNom.' '.$pers->per_sPrenom; ?></b>
							</td>
						</tr>
						<?php if($m->fac_sObjet=="6"){$som +=abs($m->fac_iRemise);}else{$som +=$m->fac_iMontantPaye;}; $cpt+=1;}?>
						<tr>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
							<td align="right" style="font-weight:bold;font-size:7pt;border-bottom:1px dotted #000" >TOTAL </td>
							<td align="center" style="font-weight:bold;font-size:7pt;border-bottom:1px dotted #000" width="35%"><?php echo number_format($som,0,",",".") ;?></td>
							<td style="margin-top:7px;border-bottom:1px dotted #000"></td>
						</tr>
					</tbody>
				</table>
			
			
			</div>	

		</div>
	</body>
</html>
