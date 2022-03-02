<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();


$montant = $this->md_patient->montant_cprincipal($date1,$date2);

$depose =$montant->paye;
$acte = $this->md_patient->montant_par_acte_cprincipal($date1,$date2); 

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
		<title>SITUATION DE CAISSE PAR ACTE</title>
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
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">SITUATION DE CAISSE PAR ACTE</span></td>
					</tr>
				</table>					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'PERIODE DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'PERIODE DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>	

				<table class="list" style="width:100%;border-collapse:collapse;margin-top:12px;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;border:2p solid #000">
						<tr>
							<td width="5%" align="center"><b>ORDRE</b></td>
							<td align="left"><b>ACTE</b></td>
							<td width="20%" align="right"><b>MONTANT</b></td>
						</tr>
					</thead>

					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:10px;">
					<?php $cpt=1;foreach($acte AS $a){?>
						<tr>
							<td style="border:1px solid #000;" align="center"><?php echo $cpt; ?></td>
							<td style="border:1px solid #000;" align="left"><?php echo $a->lac_sLibelle; ?></td>
							<td style="border:1px solid #000" width="20%" align="right"><?php echo number_format($a->montant,0,",","."); ?></td>
						</tr>
					<?php $cpt+=1;}?>
					</tbody>
					<tfoot class="corps" style="font-weight:bold;font-size:7pt;padding:21px;border:1px solid #000">
						<tr>
							<td style="padding-top:5px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> </b></td>
							<td style="padding-top:5px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> TOTAL GÉNÉRAL</b></td>
							<td style="padding-top:5px;border-left:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($montant->montant,0,",","."); ?></b></td>
						</tr>						
						<tr>
							<td style="padding-top:5px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> </b></td>
							<td style="padding-top:5px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> TOTAL REMISE</b></td>
							<td align="right" style="padding-top:5px;border-left:1px solid #000"><b style="font-weight:700;text-decoration:underline"> <?php echo number_format($montant->perte + $montant->assurance,0,",","."); ?></b></td>
						</tr>						
						<tr>
							<td style="padding-top:5px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> </b></td>
							<td style="padding-top:5px;padding-bottom:7px;border-right:1px solid #000" align="right"><b style="font-weight:700;text-decoration:underline"> TOTAL ENCAISSEMENT</b></td>
							<td align="right" style="padding-top:5px;padding-bottom:7px;border-left:1px solid #000"><b style="font-weight:700;text-decoration:underline"> <?php echo $resultat; ?></b></td>
						</tr>
					</tfoot>
				</table>

			</div>	

		</div>
	</body>
</html>
