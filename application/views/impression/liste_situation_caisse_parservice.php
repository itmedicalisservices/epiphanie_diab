<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();


$montant = $this->md_patient->montant_cprincipal($date1,$date2);
$montant_service = $this->md_patient->montant_service_cprincipal($date1,$date2);
$depose =$montant->paye;

$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($date1,$date2);
if(!is_null($diminueencaisse->diminueencaisse)){
	$resultat = number_format($depose,0,",",".").' - '.number_format(abs($diminueencaisse->diminueencaisse),0,",",".").' = '.number_format($depose + $diminueencaisse->diminueencaisse,0,",",".");
}else{
	$resultat = number_format($depose,0,",",".");
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
		<title>SITUATION DE CAISSE PAR SERVICE</title>
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
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">SITUATION DE CAISSE PAR SERVICE</span></td>
					</tr>
				</table>					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'PERIODE DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'PERIODE DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>	
				
				<table class="list" style="width:100%;border-collapse:collapse;margin-top:10px;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;border:2p solid #000">
						<tr>
							<td width="5%" align="center"><b>ORDRE</b></td>
							<td align="left"><b>LIB. SERVICE</b></td>
							<td width="20%" align="center"><b>T. GÉNÉRAL</b></td>
							<td width="20%" align="center"><b>T. REMISE</b></td>
							<td width="20%" align="center"><b>T. ENCAISSÉ</b></td>
						</tr>
					</thead>

					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:10px;">
					<?php $total=0;$rem=0;$encaiss=0;$cpt=1;foreach($montant_service AS $l){?>
						<tr>
							<td style="border:1px solid #000;" align="center"><?php echo $cpt; ?></td>
							<td style="border:1px solid #000;border-collapse:collapse" align="left"><?php echo $l->ser_sLibelle; ?></td>
							<td style="border:1px solid #000" width="20%" align="center"><?php echo number_format($l->montant,0,",","."); ?></td>
							<td style="border:1px solid #000" width="20%" align="center"><?php echo number_format($l->reduc,0,",","."); ?></td>
							<td style="border:1px solid #000" width="20%" align="center"><?php echo number_format($l->montant - $l->reduc,0,",","."); ?></td>
						</tr>
					<?php $cpt+=1;$total+=$l->montant;$rem+=$l->reduc;$encaiss+=$l->montant - $l->reduc;}?>
					</tbody>
					<tfoot class="corps" style="font-weight:bold;font-size:7pt;padding:21px;border:1px solid #000">
						<tr>
							<td style="padding-top:5px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> </b></td>
							<td style="padding-top:5px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> </b></td>
							<td style="padding-top:5px;border-left:1px solid #000" align="center"><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($total,0,",","."); ?></b></td>
							<td style="padding-top:5px;border-left:1px solid #000" align="center"><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($rem,0,",","."); ?></b></td>
							<td style="padding-top:5px;border-left:1px solid #000" align="center"><b style="font-weight:700;text-decoration:underline"> <?php $resultat; ?></b></td>
						</tr>						
					</tfoot>
				</table>

			</div>	

		</div>
	</body>
</html>
