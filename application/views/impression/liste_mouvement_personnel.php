<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();
$liste = $this->md_patient->liste_tout_mouvement_caisse($id);
$debutdate = $this->md_patient->liste_tout_mouvement_caisse_datedebut($id);
$findate = $this->md_patient->liste_tout_mouvement_caisse_datefin($id);


// var_dump($liste);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Réçu</title>
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
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">JOURNAL DE CAISSE</span></td>
					</tr>
				</table>					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:120px; height:50px;margin-right:35px" border="0" /></td>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($debutdate->madate==$findate->madate){echo 'DU: '.$this->md_config->affDateFrNum($debutdate->madate);}else{echo 'DU: '.$this->md_config->affDateFrNum($debutdate->madate).' AU: '.$this->md_config->affDateFrNum($findate->madate);} ;?></span></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:120px; height:50px" border="0" /></td>
					</tr>
				</table>	
				
				<table style="width:100%;height:12px;padding:0px;margin-top:5px;font-size:7pt">
					<tr>
						<td style="width:60%;font-weight:bold">NOMBRE D'ENREGISTREMENTS: <?php echo count($liste);?></td>
						<td style="width:40%"></td>
					</tr>
				</table>
				
				<table class="list" style="width:100%;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr>
							<th align="center">N° FAC/OPÉRATION</th>
							<th align="center">DATE & HEURE OPÉRATION</th>						
							<th align="center">TYPE OPÉRATION</th>
							<th align="center">MONTANT</th>
						</tr>
					</thead>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php $som =0;foreach($liste AS $l){?>
						<tr <?php if($l->fac_sObjet=="6"){echo' style="background:pink"';}?>>
							<td align="center"><?php if($l->fac_sObjet=="5" || $l->fac_sObjet=="Paiement des actes médicaux"){echo $l->fac_sNumero;}elseif($l->fac_sObjet=="6"){echo $l->fac_id.substr($l->fac_sNumero,-8);}else{ echo substr($l->fac_sNumero,4);}; ?></td>
							<td align="center"><?php echo substr($this->md_config->affDateTimeFr($l->fac_dDatePaieTime),2); ?></td>
							<td align="center"><?php if($l->fac_sObjet=="6"){echo $this->md_config->objetFacture($l->fac_sObjet).' '.$l->fac_sNumero;}else{echo $this->md_config->objetFacture($l->fac_sObjet);}; ?></td>
							<td align="center"><?php echo number_format($l->fac_iMontantPaye,0,",","."); ?></td>
						</tr>
					<?php $som +=$l->fac_iMontantPaye;}?>
						
					</tbody>
				</table>
				<table style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000">
					<tr>
						<td colspan="3" align="right" style="font-weight:bold;font-size:7pt" >TOTAL</td>
						<td align="right" style="font-weight:bold;font-size:7pt" width="35%"><?php echo number_format($som,0,",",".") ;?>  <span style="margin-right:25px">FCFA</span></td>
					</tr>
				</table>

				
				<table style="width:100%;margin-top:20px">
					<tr>
						<td  style="width:50%;font-weight:bold;font-size:7pt"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold"><!--Nom de la personne qui a payé--></span> <span style="text-align:right"></td>
					</tr>
				</table>
			
			
			</div>	

		</div>
	</body>
</html>
