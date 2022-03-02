<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$fac = $this->md_patient->detail_facture($id); 
$elt = $this->md_patient->element_facture($id);
$user = $this->md_connexion->personnel_connect();

$facdivers = $this->md_patient->detail_facture_divers($id);




// if(!is_null($facdivers->loc_id)){
	// $locataire = $this->md_parametre->recup_locataire($facdivers->loc_id);
// }
// $actedivers = $this->md_parametre->recup_acte_divers($facdivers->fdi_id); 

// var_dump($facdivers);

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
		<!--	.list td{ padding:2px 10px;}-->

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body >
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style=" padding:-3px 15px 0px 15px" class="recu">
			<!-- En-tête du reçu -->
			<!--<table style="width:100%; height:50px" >
				<tr>
					<td  align="center" ><span style="font-weight:bold;font-size:8pt">RECU D'ENCAISSEMENT</span></td>
				</tr>
			</table>-->
			<div style="height:45%;font-size:4px" class="recu">
			<?php if($facdivers->fac_sObjet!="5"){?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
						<td align="center"   style="width:50%"><img src="<?php if(is_null($fac->fac_sQrcode)){echo 'QRCODE';}else{ echo base_url($fac->fac_sQrcode) ;};?>" style="width:30px; height:30px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url('assets/images/1601337616-1598782768.png') ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:4pt">RECU DE CAISSE</span></td>
					</tr>
				</table>		
				<table style="width:100%; height:20px;margin-top:-5px">
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Patient:</span> <?php echo $fac->pat_sNom.' '.$fac->pat_sPrenom  ;?></td>
						
						<td align="right" style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">ID:</span> <?php echo $fac->pat_sMatricule ;?>  </td>	
						<td align="center"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold">N° :</span> <span style="text-align:right"><?php echo $fac->fac_sNumero ;?></span></td>
					</tr>				
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">Mode de paiement:</span> <span style="font-weight:normal"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></span></td>	
						<td align="center"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold"><?php if(!is_null($fac->ass_id)){echo 'Assureur:';} ;?> </span> <span style="text-align:right"><?php if(!is_null($fac->ass_id)){echo $fac->ass_sLibelle;} ;?></span></td>
					</tr>
				</table>

				<!--width:100%;border-collapse:collapse;border:1px dotted #000;margin-top:-5px-->
				<table class="list" style="width:100%;margin-top:-2px" >
					<thead style="text-transform:uppercase;width:100%;border-collapse:collapse;border-top:1px dotted #000;border-left:1px dotted #000;border-right:1px dotted #000">
						<td style="font-weight:bold" align="center"><?php if(count($elt) > 1){echo 'Actes';}else{echo 'Acte';};?></td>
						<?php if(!is_null($fac->ass_id)){?>
						<td style="font-weight:bold" align="center">Couverture assurance</td>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<td style="font-weight:bold" align="center">Période</td>
						<?php }?>
						<td style="font-weight:bold" align="center"><?php if(count($elt) > 1){echo 'montants';}else{echo 'montant';};?></td>
					</thead>
					<tbody class="corps"  style="width:100%;border-collapse:collapse;border-left:1px dotted #000;border-right:1px dotted #000;border-bottom:1px dotted #000;">
						<?php //var_dump($elt)?>
						<?php $verif=0; foreach($elt AS $e){?>
							<tr>
								<td align="center" style="padding-top:-2px;">
									<?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?>
								</td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="center" style="padding-top:-2px;">
									<?php //$recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($verif!=0){echo '';}else{ echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du montant de la facture';};?> 
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="center" style="padding-top:-2px;">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="center" style="padding-top:-2px;"><?php echo number_format($e->elf_iCout,0,",",".") ;?> XAF</td>
							</tr>	
						<?php $verif+=1;}?>
					</tbody>					
					
					<tbody class="corps">
						<tr>
							<td <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> style="font-weight:bold" align="right">TOTAL</td>
							<td style="font-weight:bold" align="center"><?php echo number_format($fac->fac_iMontant,0,",",".") ;?> XAF</td>
						</tr>				
						<?php if(!is_null($fac->ass_id)){ ;?>
							<tr>
								<td style="padding-top:-1px;" <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> align="right">Montant payé par l'assureur</span>
								<td  style="padding-top:-1px;"align="center"><?php echo number_format($fac->fac_iMontantAss,0,",",".") ;?> XAF</td>
							</tr>
						<?php }?>					
						<?php if($fac->fac_iMontantReduc ==0 || is_null($fac->fac_iMontantReduc)){}else{ ?>
							<tr>
								<td style="padding-top:-1px;" <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> align="right">Réduction</td>
								<td style="padding-top:-1px;" align="center"><?php echo number_format($fac->fac_iMontantReduc,0,",",".")   ;?> XAF</td>
							</tr>
						<?php }?>
						<tr>
							<td style="padding-top:-1px;" <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> align="right">Montant payé</td>
							<td style="padding-top:-1px;" align="center"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> XAF</td>
						</tr>
					</tbody>
				</table>				
				
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;padding-top:-2px;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right"   style="width:50%;padding-top:-2px;"><span style="font-weight:bold">Patient</span> </td>
					</tr>
				</table>				
			
			<?php }else{?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
						<td align="center"   style="width:50%"><img src="<?php echo base_url($fac->fac_sQrcode) ;?>" style="width:30px; height:30px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url('assets/images/1601337616-1598782768.png') ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:4pt">RECU DE CAISSE</span></td>
					</tr>
				</table>		
				
				<table style="width:100%; height:20px;margin-top:-4px">
				<?php if(is_null($facdivers->fac_sLoc)){?>
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Patient:</span> <?php echo $facdivers->pat_sNom.' '.$facdivers->pat_sPrenom  ;?></td>
						<td align="center"   style="width:50%"><span style="font-weight:bold">Dr.</span> <span style="text-align:right"><?=$personne;?></span></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">ID:</span> <?php echo $facdivers->pat_sMatricule ;?>  </td>	
						<td align="center"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold">N° :</span> <span style="text-align:right"><?php echo $facdivers->fac_sNumero ;?></span></td>
					</tr>					
					<?php }else{?>
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Nom/Enseigne:</span> <?php echo $facdivers->fac_sLoc ;?></td>
						<td align="center"   style="width:50%"></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($facdivers->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">Libellé/Motif:</span> <?php if(!is_null($facdivers->fac_sDesc)){ echo nl2br($facdivers->fac_sDesc);}else{echo '<em>Non renseigné</em>';} ;?> </td>	
						<td align="right"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold">N° :</span> <span style="text-align:right"><?php echo $facdivers->fac_sNumero ;?></span></td>
					</tr>
					<?php }?>
				</table>

				<!-- Corps de reçu -->
		
				<table style="width:100%;height:12px;padding:0px;margin-top:-5px">
					<tr>
						<td style="width:40%;font-weight:bold;padding-top:-9px">Mode de paiement: <span style="font-weight:normal"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></span></td>
						<td style="width:60%;color:white"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></td>
					</tr>
					<tr>
						<td style="width:40%; font-weight:bold"></td>
						<td style="width:60%"><?php if(!is_null($fac->ass_id)){echo 'Assureur: <b>'.$fac->ass_sLibelle.'</b>';} ;?></td>
					</tr>
				
					<tr style="height:15px">
						<td></td>
						<td></td>
					</tr>
				</table>
				
				<table class="list" style="width:100%;margin-top:-15px" >
					<thead style="text-transform:uppercase;width:100%;border-collapse:collapse;border-top:1px dotted #000;border-left:1px dotted #000;border-right:1px dotted #000">
						<td align="center">Acte</td>
						<?php if(!is_null($fac->ass_id)){?>
						<td align="center">Couverture assurance</td>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<td align="center">Période</td>
						<?php }?>
						<td align="center">montant</td>
					</thead>
					<tbody class="corps" style="width:100%;border-collapse:collapse;border-left:1px dotted #000;border-right:1px dotted #000;border-bottom:1px dotted #000">
					<?php if($facdivers->fac_sObjet == 5){?>
						<tr>
							<td align="center" style="padding-top:-2px;"><?php echo $facdivers->lac_sLibelle;?></td>
							<td align="center" style="padding-top:-2px;"><?php echo number_format($facdivers->fac_iMontantPaye,0,",",".");?> XAF</td>
						</tr>
					<?php }else{?>
						<?php //var_dump($elt)?>
						<?php $verif=0; foreach($elt AS $e){?>
							<tr>
								<td align="center"><?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?></td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="center">
									<?php //$recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($verif!=0){echo '';}else{ echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du montant de la facture';};?>
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="center">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="center"><?php echo number_format($e->elf_iCout,0,",",".") ;?> XAF</td>
							</tr>	
						<?php $verif+=1;}?>
					<?php }?>
					</tbody>						
					
					<tbody class="corps">
						<tr>
							<td align="right" style="font-weight:bold" >TOTAL</td>
							<td align="center" style="font-weight:bold"><?php echo number_format($facdivers->fac_iMontantPaye,0,",",".") ;?> XAF</td>
						</tr>
						<tr>
							<td align="right"  style="padding-top:-1px;">Montant payé</td>
							<td align="center"  style="padding-top:-1px;"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> XAF</td>
						</tr>
					</tbody>					
					
				</table>

				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;padding-top:-2px;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right" style="width:50%"><span style="font-weight:bold"><?php if(is_null($facdivers->fac_sLoc)){echo 'Patient';}else{echo 'Client';};?></span> <span style="text-align:right"></td>
					</tr>
				</table>
			
			<?php }?>
			<table class="" style="width:100%;margin-top:17%">
				<tr>
					<td align="center"><b>Email:</b> <span style="color:maroon"><?php echo $info->str_sEmail;?></span> <b>Tel:</b> <span style="color:maroon"><?php echo $info->str_sTel;?> / <?php echo $info->str_sTel_2;?></span></td>
				</tr>
			</table>
			</div>			
			<div style="border-top:1px dotted #000;width:100%;height:10px;margin-top:2.2%"></div>
					<div style="height:45%;font-size:4px" class="recu">
			<?php if($facdivers->fac_sObjet!="5"){?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
						<td align="center"   style="width:50%"><img src="<?php if(is_null($fac->fac_sQrcode)){echo 'QRCODE';}else{ echo base_url($fac->fac_sQrcode) ;};?>" style="width:30px; height:30px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url('assets/images/1601337616-1598782768.png') ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:4pt">RECU DE CAISSE</span></td>
					</tr>
				</table>		
				<table style="width:100%; height:20px;margin-top:-5px">
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Patient:</span> <?php echo $fac->pat_sNom.' '.$fac->pat_sPrenom  ;?></td>
						
						<td align="right" style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">ID:</span> <?php echo $fac->pat_sMatricule ;?>  </td>	
						<td align="center"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold">N° :</span> <span style="text-align:right"><?php echo $fac->fac_sNumero ;?></span></td>
					</tr>				
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">Mode de paiement:</span> <span style="font-weight:normal"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></span></td>	
						<td align="center"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold"><?php if(!is_null($fac->ass_id)){echo 'Assureur:';} ;?> </span> <span style="text-align:right"><?php if(!is_null($fac->ass_id)){echo $fac->ass_sLibelle;} ;?></span></td>
					</tr>
				</table>

				<!--width:100%;border-collapse:collapse;border:1px dotted #000;margin-top:-5px-->
				<table class="list" style="width:100%;margin-top:-2px" >
					<thead style="text-transform:uppercase;width:100%;border-collapse:collapse;border-top:1px dotted #000;border-left:1px dotted #000;border-right:1px dotted #000">
						<td style="font-weight:bold" align="center"><?php if(count($elt) > 1){echo 'Actes';}else{echo 'Acte';};?></td>
						<?php if(!is_null($fac->ass_id)){?>
						<td style="font-weight:bold" align="center">Couverture assurance</td>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<td style="font-weight:bold" align="center">Période</td>
						<?php }?>
						<td style="font-weight:bold" align="center"><?php if(count($elt) > 1){echo 'montants';}else{echo 'montant';};?></td>
					</thead>
					<tbody class="corps"  style="width:100%;border-collapse:collapse;border-left:1px dotted #000;border-right:1px dotted #000;border-bottom:1px dotted #000;">
						<?php //var_dump($elt)?>
						<?php $verif=0; foreach($elt AS $e){?>
							<tr>
								<td align="center" style="padding-top:-2px;">
									<?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?>
								</td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="center" style="padding-top:-2px;">
									<?php //$recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($verif!=0){echo '';}else{ echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du montant de la facture';};?> 
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="center" style="padding-top:-2px;">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="center" style="padding-top:-2px;"><?php echo number_format($e->elf_iCout,0,",",".") ;?> XAF</td>
							</tr>	
						<?php $verif+=1;}?>
					</tbody>					
					
					<tbody class="corps">
						<tr>
							<td <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> style="font-weight:bold" align="right">TOTAL</td>
							<td style="font-weight:bold" align="center"><?php echo number_format($fac->fac_iMontant,0,",",".") ;?> XAF</td>
						</tr>				
						<?php if(!is_null($fac->ass_id)){ ;?>
							<tr>
								<td style="padding-top:-1px;" <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> align="right">Montant payé par l'assureur</span>
								<td  style="padding-top:-1px;"align="center"><?php echo number_format($fac->fac_iMontantAss,0,",",".") ;?> XAF</td>
							</tr>
						<?php }?>					
						<?php if($fac->fac_iMontantReduc ==0 || is_null($fac->fac_iMontantReduc)){}else{ ?>
							<tr>
								<td style="padding-top:-1px;" <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> align="right">Réduction</td>
								<td style="padding-top:-1px;" align="center"><?php echo number_format($fac->fac_iMontantReduc,0,",",".")   ;?> XAF</td>
							</tr>
						<?php }?>
						<tr>
							<td style="padding-top:-1px;" <?php if(!is_null($fac->ass_id)){echo 'colspan="2"';};?> align="right">Montant payé</td>
							<td style="padding-top:-1px;" align="center"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> XAF</td>
						</tr>
					</tbody>
				</table>				
				
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;padding-top:-2px;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right"   style="width:50%;padding-top:-2px;"><span style="font-weight:bold">Patient</span> </td>
					</tr>
				</table>				
			
			<?php }else{?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
						<td align="center"   style="width:50%"><img src="<?php echo base_url($fac->fac_sQrcode) ;?>" style="width:30px; height:30px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url('assets/images/1601337616-1598782768.png') ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:4pt">RECU DE CAISSE</span></td>
					</tr>
				</table>		
				
				<table style="width:100%; height:20px;margin-top:-4px">
				<?php if(is_null($facdivers->fac_sLoc)){?>
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Patient:</span> <?php echo $facdivers->pat_sNom.' '.$facdivers->pat_sPrenom  ;?></td>
						<td align="center"   style="width:50%"><span style="font-weight:bold">Dr.</span> <span style="text-align:right"><?=$personne;?></span></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">ID:</span> <?php echo $facdivers->pat_sMatricule ;?>  </td>	
						<td align="center"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold">N° :</span> <span style="text-align:right"><?php echo $facdivers->fac_sNumero ;?></span></td>
					</tr>					
					<?php }else{?>
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Nom/Enseigne:</span> <?php echo $facdivers->fac_sLoc ;?></td>
						<td align="center"   style="width:50%"></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($facdivers->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%;padding-top:-2px"><span style="font-weight:bold">Libellé/Motif:</span> <?php if(!is_null($facdivers->fac_sDesc)){ echo nl2br($facdivers->fac_sDesc);}else{echo '<em>Non renseigné</em>';} ;?> </td>	
						<td align="right"   style="width:50%;padding-top:-2px"></td>
						<td align="right"   style="width:50%;padding-top:-2px"><span style="font-weight:bold">N° :</span> <span style="text-align:right"><?php echo $facdivers->fac_sNumero ;?></span></td>
					</tr>
					<?php }?>
				</table>

				<!-- Corps de reçu -->
		
				<table style="width:100%;height:12px;padding:0px;margin-top:-5px">
					<tr>
						<td style="width:40%;font-weight:bold;padding-top:-9px">Mode de paiement: <span style="font-weight:normal"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></span></td>
						<td style="width:60%;color:white"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></td>
					</tr>
					<tr>
						<td style="width:40%; font-weight:bold"></td>
						<td style="width:60%"><?php if(!is_null($fac->ass_id)){echo 'Assureur: <b>'.$fac->ass_sLibelle.'</b>';} ;?></td>
					</tr>
				
					<tr style="height:15px">
						<td></td>
						<td></td>
					</tr>
				</table>
				
				<table class="list" style="width:100%;margin-top:-15px" >
					<thead style="text-transform:uppercase;width:100%;border-collapse:collapse;border-top:1px dotted #000;border-left:1px dotted #000;border-right:1px dotted #000">
						<td align="center">Acte</td>
						<?php if(!is_null($fac->ass_id)){?>
						<td align="center">Couverture assurance</td>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<td align="center">Période</td>
						<?php }?>
						<td align="center">montant</td>
					</thead>
					<tbody class="corps" style="width:100%;border-collapse:collapse;border-left:1px dotted #000;border-right:1px dotted #000;border-bottom:1px dotted #000">
					<?php if($facdivers->fac_sObjet == 5){?>
						<tr>
							<td align="center" style="padding-top:-2px;"><?php echo $facdivers->lac_sLibelle;?></td>
							<td align="center" style="padding-top:-2px;"><?php echo number_format($facdivers->fac_iMontantPaye,0,",",".");?> XAF</td>
						</tr>
					<?php }else{?>
						<?php //var_dump($elt)?>
						<?php $verif=0; foreach($elt AS $e){?>
							<tr>
								<td align="center"><?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?></td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="center">
									<?php //$recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($verif!=0){echo '';}else{ echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du montant de la facture';};?>
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="center">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="center"><?php echo number_format($e->elf_iCout,0,",",".") ;?> XAF</td>
							</tr>	
						<?php $verif+=1;}?>
					<?php }?>
					</tbody>						
					
					<tbody class="corps">
						<tr>
							<td align="right" style="font-weight:bold" >TOTAL</td>
							<td align="center" style="font-weight:bold"><?php echo number_format($facdivers->fac_iMontantPaye,0,",",".") ;?> XAF</td>
						</tr>
						<tr>
							<td align="right"  style="padding-top:-1px;">Montant payé</td>
							<td align="center"  style="padding-top:-1px;"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> XAF</td>
						</tr>
					</tbody>					
					
				</table>

				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;padding-top:-2px;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right" style="width:50%"><span style="font-weight:bold"><?php if(is_null($facdivers->fac_sLoc)){echo 'Patient';}else{echo 'Client';};?></span> <span style="text-align:right"></td>
					</tr>
				</table>
			
			<?php }?>
			<table class="" style="width:100%;margin-top:17%">
				<tr>
					<td align="center"><b>Email:</b> <span style="color:maroon"><?php echo $info->str_sEmail;?></span> <b>Tel:</b> <span style="color:maroon"><?php echo $info->str_sTel;?> / <?php echo $info->str_sTel_2;?></span></td>
				</tr>
			</table>
			</div>	
			<!--<table class="" style="width:100%;">
				<tr>
					<td  align="center" style="width:100%">
						<span>Tél: <span style="color:maroon"><u><?php //echo $info->str_sTel;?></u></span></span>
						<span>Email: <span style="color:maroon"><u><?php //echo $info->str_sEmail;?></u></span></span>
					</td>
				</tr>
				<tr>
					<td align="center">Tel:<?php //echo $info->str_sTel;?></td>
				</tr>
			</table>-->
		</div>
	</body>
</html>