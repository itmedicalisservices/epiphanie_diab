<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();


$montant = $this->md_patient->montant_cprincipal($date1,$date2);

$depose =$montant->paye;
$acte = $this->md_patient->montant_par_type_cprincipal($date1,$date2);
// $rub = $this->md_patient->remise_parubrique($date1,$date2);

$diminueencaisse = $this->md_patient->diminue_encaisse_total_parubrique($date1,$date2);
if(!is_null($diminueencaisse->diminueencaisse)){
	$resultat = number_format($depose,0,",",".").' - '.number_format(abs($diminueencaisse->diminueencaisse),0,",",".").' = '.number_format($depose + $diminueencaisse->diminueencaisse,0,",",".");
}else{
	$resultat = number_format($depose,0,",",".");
}

$qpt = $this->md_patient->quotes_parts($date1,$date2);

// var_dump($id);
// var_dump($date1);
// var_dump($date2);
// var_dump($liste);
// return ;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SITUATION DE QUOTES-PARTS</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif; font-size:4pt;}
			table.footer{ position:fixed; bottom:40; left:0; right:0}
			.list td{ padding:2px 10px;}

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body>
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style="padding:25px 20px 0px 20px" class="recu">
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
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">SITUATION DE QUOTES-PARTS</span></td>
					</tr>
				</table>
				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'PERIODE DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'PERIODE DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>	
								
				<table class="list" style="width:100%;border-collapse:collapse;margin-top:12px;" >
					<thead style="background:#92cddc;color:#000;text-transform:uppercase;font-weight:bold;font-size:7pt;">							
						<tr align="center">
						  <td  style="vertical-align:middle;border:1px solid #000" rowspan="2"><b>ORDRE</b></td>
						  <td  style="vertical-align:middle;border:1px solid #000" rowspan="2"><b>LIB. SERVICE</b></td>
						  <td  style="vertical-align:middle;border:1px solid #000" rowspan="2"><b>T. GÉNÉRAL (XAF)</b></td>
						  <td style="border:1px solid #000" colspan="3"><b>PART SER. (XAF)</b></td>
						  <td style="border:1px solid #000" colspan="3"><b>PART ADM. (XAF)</b></td>
						</tr>					 
						
						<tr align="center">
						  <td style="border-right:1px solid #000"><b>CONSULTATIONS</b></td>
						  <td style="border-right:1px solid #000"><b>AUTRES ACTES</b></td>
						  <td style="border-right:1px solid #000"><b>TOTAL</b></td>						  
						  
						  <td style="border-right:1px solid #000"><b>CONSULTATIONS</b></td>
						  <td style="border-right:1px solid #000"><b>AUTRES ACTES</b></td>
						  <td style="border-right:1px solid #000"><b>TOTAL</b></td>	
						</tr>
					</thead>

					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:10px;">
						<?php $cpt=1;$adm=0;$ser=0; $admCsl=0;$serCsl=0; foreach($qpt AS $q){ ?>
						<?php $rcupSer = $this->md_parametre->recup_service($q->ser_id);?>
						<tr>
							<td style="border:1px solid #000;" align="center"><?php echo $cpt; ?></td>
							<td style="border:1px solid #000;" align="center"><?php echo $rcupSer->ser_sLibelle; ?></td>
							<td style="border:1px solid #000;" align="center"><?php echo number_format($q->admin + $q->service + $q->adminCsl + $q->serviceCsl,0,",","."); ?></td>
							<td style="border:1px solid #000;" align="center"><?php echo number_format($q->serviceCsl,0,",","."); ?></td>
							<td style="border:1px solid #000;" align="center"><?php echo number_format($q->service,0,",","."); ?></td>
							<td style="border:1px solid #000;" align="center"><?php echo number_format($q->service + $q->serviceCsl,0,",","."); ?></td>
							
							<td style="border:1px solid #000;" align="center"><?php echo number_format($q->adminCsl,0,",","."); ?></td>
							<td style="border:1px solid #000;" align="center"><?php echo number_format($q->admin,0,",","."); ?></td>
							<td style="border:1px solid #000;" align="center"><?php echo number_format($q->admin + $q->adminCsl,0,",","."); ?></td>
						</tr>
					<?php $cpt+=1;$adm+=$q->admin;$ser+=$q->service;$admCsl+=$q->adminCsl;$serCsl+=$q->serviceCsl;} ?>
					</tbody>
					<tfoot class="corps" style="font-weight:bold;font-size:7pt;padding:21px;border:1px solid #000">
						<tr>
							<td align="right" colspan="2"><b style="font-weight:900;text-decoration:underline"></b></td>
							<td align="center" colspan=""><b style="font-weight:900;text-decoration:underline"><?php echo number_format($adm + $ser + $admCsl + $serCsl,0,",","."); ?></b></td>										
							<td align="center" colspan=""><b style="font-weight:900;text-decoration:underline"><?php echo number_format($serCsl,0,",","."); ?></b></td>										
							<td align="center" colspan=""><b style="font-weight:900;text-decoration:underline"><?php echo number_format($ser,0,",","."); ?></b></td>	
							
							<td align="center" colspan=""><b style="font-weight:900;text-decoration:underline"><?php echo number_format($serCsl + $ser,0,",","."); ?></b></td>																								
							<td align="center" colspan=""><b style="font-weight:900;text-decoration:underline"><?php echo number_format($admCsl,0,",","."); ?></b></td>																								
							<td align="center" colspan=""><b style="font-weight:900;text-decoration:underline"><?php echo number_format($adm,0,",","."); ?></b></td>																								
							<td align="center" colspan=""><b style="font-weight:900;text-decoration:underline"><?php echo number_format($admCsl + $adm,0,",","."); ?></b></td>																								
						</tr>											
					</tfoot>
				</table>

			</div>	

		</div>
	</body>
</html>
