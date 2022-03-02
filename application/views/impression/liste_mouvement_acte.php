<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();


$liste = $this->md_patient->liste_facture_acte($id, $date1, $date2);



// var_dump($id);
// var_dump($date1);
// var_dump($date2);
// var_dump($liste);
// return ;
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
						<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:120px; height:50px;margin-right:35px;background:white" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url('assets/images/1601337616-1598782768.png') ;?>" style="width:120px; height:50px" border="0" /></td>
					</tr>
				</table>	
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline">JOURNAL DE CAISSE</span></td>
					</tr>
				</table>
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
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
						<tr align="center">
							<td><b>Date & Heure Opération</b></td>
							<td><b>Libellé actes</b></td>
							<td><b>Montant Encaissé (<small>FCFA</small>)</b></td>
							<td><b>Patient</b></td>
							<td><b>Provenance</b></td>
						</tr>
					</thead>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php $somcumul =0;foreach($liste AS $m){?>
						<tr>
							<td align="center"><?php echo substr($this->md_config->affDateTimeFr($m->elf_dDate),2); ?></td>
							<td align="center"><?php $acte = $this->md_patient->recup_acm($m->acm_id);echo $acte->lac_sLibelle; ?></td>
							<td align="center"><?php echo number_format($m->elf_iCout,0,",","."); ?></td>
							<td align="center"><?php if($m->pat_iElf!=0){$pat = $this->md_patient->recup_patient($m->pat_iElf);echo $pat->pat_sNom.' '.$pat->pat_sPrenom.' ('.$pat->pat_sMatricule.')';}else{echo $m->loc_sElf;}; ?></td>
							<td align="center"><?php $acte = $this->md_patient->recup_acm($m->acm_id);echo $acte->uni_sLibelle; ?></td>
						</tr>
					<?php $somcumul+=$m->elf_iCout;}?>
						
					</tbody>
				</table>
				<table style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000">
					<tr>
						<td colspan="5" align="center" style="font-weight:bold;font-size:7pt" >TOTAL : <?php echo number_format($somcumul,0,",",".") ;?>  <span style="margin-right:25px">FCFA</span></td>
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
