<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();

$listeper = $this->md_personnel->recup_personnel_caisse2(); 
$listeper2 = $this->md_personnel->recup_personnel_caisse3($date1, $date2); 

// var_dump($id);
// var_dump($date1);
// var_dump($date2);
// var_dump($liste);
// return ;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Journal d'encaissement</title>
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
			<?php //var_dump($listeper2);?>

					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:120px; height:50px;margin-right:35px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:120px; height:50px" border="0" /></td>
					</tr>
				</table>	
								
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">JOURNAL D'ENCAISSEMENT PAR USAGER</span></td>
					</tr>
				</table>				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>
				
				<?php $somtotale =0; foreach($listeper2 AS $lp){?>
				<table style="width:100%;margin-top:20px;">
					<tr>
						<td style="width:50%;font-weight:bold;font-size:7pt"><b style="font-weight:700"><span style="text-decoration:underline"> <?php $per = $this->md_personnel->recup_personnel($lp->per_id); echo $per->per_sNom.' '.$per->per_sPrenom;?></span></b></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold"><!--Nom de la personne qui a payé--></span> <span style="text-align:right"></td>
					</tr>
				</table>
				<table class="list" style="width:100%;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr>
							<td width="5%" align="center">ORDRE</td>
							<th align="center">N° FAC/OPÉRATION</th>
							<th align="center">DATE & HEURE OPÉRATION</th>						
							<th align="center">TYPE OPÉRATION</th>
							<th align="center">MONTANT (XAF)</th>
						</tr>
					</thead>
					<?php 
					if($acte==NULL){
					$liste = $this->md_patient->journal_encaissement($lp->per_id, $date1, $date2,$acte=false);
					}else{
					$liste = $this->md_patient->journal_encaissement($lp->per_id, $date1, $date2,$acte);
					}
					;?>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php //var_dump($liste)?>
					<?php $som =0; $cpt =1;foreach($liste AS $l){?>
						<tr <?php if($l->fac_iSta==2){echo' style="background:pink"';}?> <?php if($l->fac_sObjet=="2" || $l->fac_sObjet=="7"){echo 'style="display:none"';} ?>>
							<td align="center"><?php echo $cpt; ?></td>
							<td align="center"><?php if($l->fac_sObjet=="5" || $l->fac_sObjet=="Paiement des actes médicaux"){echo $l->fac_sNumero;}elseif($l->fac_sObjet=="6"){echo $l->fac_id.substr($l->fac_sNumero,-8);}else{ echo substr($l->fac_sNumero,4);}; ?></td>
							<td align="center"><?php echo substr($this->md_config->affDateTimeFr($l->fac_dDatePaieTime),2); ?></td>
							<td align="center"><?php if($l->fac_iSta==2){echo'ANNULATION';}else{echo $this->md_config->objetFacture($l->fac_sObjet);}; ?></td>
							<td align="center"><?php if($l->fac_sObjet=="2" || $l->fac_sObjet=="7"){echo number_format($l->fac_iTot,0,",",".");}elseif($l->fac_sObjet=="6"){echo number_format($l->fac_iRemise,0,",",".");}else{ echo number_format($l->fac_iMontantPaye,0,",",".");}; ?></td>
						</tr>
						
									
					
					<?php 
						if($l->fac_sObjet=="2"){
						$numero = substr($l->fac_sNumero,4);
						$passation = 0;
						$ladate =  $l->fac_dDatePaieTime;
						$exedent =  $l->fac_iEx;
						$result=0;
						$deficit =  $l->fac_iDef;
						$passation =$l->fac_iTot;
					}?>									
					<?php 
						if($l->fac_sObjet=="7"){
						$numero = substr($l->fac_sNumero,4);
						$passation = 0;
						$ladate =  $l->fac_dDatePaieTime;
						$exedent =  $l->fac_iEx;
						$result=0;
						$deficit =  $l->fac_iDef;
						$passation =$l->fac_iTot;

					}?>
					<?php $numero = substr($l->fac_sNumero,4);$ladate =  $l->fac_dDatePaieTime;if($l->fac_iSta==1){$som +=$l->fac_iMontantPaye;};$cpt+=1;$passation =$l->fac_iTot;$exedent =  $l->fac_iEx;$deficit =  $l->fac_iDef;}?>
					<tr>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center">TOTAL</td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($som,0,",",".") ;?></td>
					</tr>
					<?php if(isset($passation)){?>
					<tr>
						<td align="center" style="color:#fff"><?php echo $numero; ?></td>
						<td align="center"><?php echo $numero; ?></td>
						<td align="center"><?php echo substr($this->md_config->affDateTimeFr($ladate),2); ?></td>
						<td align="center"><?php if($l->fac_sObjet=="7"){echo 'CESSION';}else{echo 'PASSATION CAISSE';} ;?></td>
						<td align="center"><?php echo number_format($passation,0,",",".") ;?></td>
					</tr>
					<tr>
						<td align="center" style="color:#fff"><?php echo $numero; ?></td>
						<td align="center"><?php echo $numero; ?></td>
						<td align="center"><?php echo substr($this->md_config->affDateTimeFr($ladate),2); ?></td>
						<td align="center">EXCEDENT/DEFICIT</td>
						<td align="center" ><?php echo number_format($exedent+$deficit,0,",",".") ;?></td>
					</tr>	
					<tr>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center">SOLDE</td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($passation+$exedent+$deficit+$som,0,",",".") ;?></td>
					</tr>	
					<?php }?>
					</tbody>
				</table>
			<?php $somtotale +=$som;}?>
				<table class="list" style="width:100%;margin-top:17px;" >
					<tr>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:10pt;border-left:2px dotted #000;border-bottom:2px dotted #000;" align="center">TOTAL GENERAL</td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:10pt;border-bottom:2px dotted #000;" align="center"><?php echo number_format($somtotale,0,",",".") ;?> XAF</td>
					</tr>
					</tbody>
				</table>
			</div>	
		</div>
	</body>
</html>
