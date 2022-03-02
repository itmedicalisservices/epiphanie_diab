<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); $fac = $this->md_patient->detail_facture($id); $elt = $this->md_patient->element_facture($id);
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
			.list td{ padding:2px 10px;}

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body >
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style=" padding:5px 10px 0px 10px" class="recu">
			<!-- En-tête du reçu -->
			<!--<table style="width:100%; height:50px" >
				<tr>
					<td  align="center" ><span style="font-weight:bold;font-size:8pt">RECU D'ENCAISSEMENT</span></td>
				</tr>
			</table>-->
			<div style="height:45%;" class="recu">
			<?php if($facdivers->fac_sObjet!="5"){?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:60px; height:20px" border="0" /></td>
						<td  align="center" ><span style="font-weight:bold;font-size:5pt">PASSATION DE CAISSE</span></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>		
				<table style="width:100%; height:20px;margin-top:-4px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Nom (s):</span> <?php echo $fac->pat_sNom ;?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Prénom(s):</span> <?php echo $fac->pat_sPrenom   ;?>  </td>	
						<td align="right"   style="width:50%;"><span style="font-weight:bold">FACTURE N° :</span> <span style="text-align:right"><?php $fac->fac_sNumero ;?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">ID:</span> <?php echo $fac->pat_sMatricule ;?></td>	
					</tr>
				</table>
				<!--<table style="width:100%; height:5px;font-weight:bold;">
					<td align="center">FACTURE</td>	
				</table>-->
				<!-- Corps de reçu -->
		
				<table style="width:100%;height:12px;padding:0px;margin-top:-5px">
					<tr>
						<td style="width:40%;font-weight:bold">Mode de paiement: </td>
						<td style="width:60%"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></td>
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
				
				<table class="list" style="width:100%;border-collapse:collapse;border:1px dotted #000;margin-top:-5px" >
					<thead style="text-transform:uppercase;">
						<th align="center">Acte</th>
						<?php if(!is_null($fac->ass_id)){?>
						<th align="center">Couverture assurance</th>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<th align="center">Période</th>
						<?php }?>
						<th align="center">Coût</th>
					</thead>
					<tbody class="corps">
						<?php //var_dump($elt)?>
						<?php foreach($elt AS $e){?>
							<tr>
								<td align="left"><?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?></td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="left">
									<?php $recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($recup){echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du coût de l\'acte médical';}else{echo 'Acte non couvert par l\'assureur';};?> 
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="left">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="right"><?php echo number_format($e->elf_iCout,0,",",".") ;?> <span>FCFA</span></td>
							</tr>	
						<?php }?>
					</tbody>
				</table>
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td align="right" style="font-weight:bold" >TOTAL</td>
						<td align="right" style="font-weight:bold" width="35%"><?php echo number_format($fac->fac_iMontant,0,",",".") ;?>  <span>FCFA</span></td>
					</tr>
				</table>
					
				<table style="width:100%;">
					<?php if(!is_null($fac->ass_id)){ ;?>
						<tr>
							<td align="right">Montant payé par l'assureur</span>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantAss,0,",",".") ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
						<tr>
							<td align="right">Montant payé par le patient</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php if($fac->fac_iMontantReduc ==0 || is_null($fac->fac_iMontantReduc)){}else{ ?>
						<tr>
							<td align="right">Réduction</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantReduc,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
					
				</table>
				
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Le Patient</span> <span style="text-align:right"></td>
					</tr>
				</table>
			
			<?php }else{?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:60px; height:20px" border="0" /></td>
						<td  align="center" ><span style="font-weight:bold;font-size:5pt">FACTURE D'ENCAISSEMENT</span></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>		
				<table style="width:100%; height:20px;margin-top:-4px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Nom/Enseigne:</span> <?php if(!is_null($facdivers->loc_id)){echo $facdivers->loc_sLib;}elseif(is_null($facdivers->loc_id)){echo '<em>Anonyme</em>';} ;?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Contact:</span> <?php echo $facdivers->loc_sTel;   ;?>  </td>	
						<td align="right"   style="width:50%;"><span style="font-weight:bold">FACTURE N° :</span> <span style="text-align:right"><?php echo $facdivers->fac_sNumero ;?></span></td>
					</tr>

				</table>
				<!--<table style="width:100%; height:5px;font-weight:bold;">
					<td align="center">FACTURE</td>	
				</table>-->
				<!-- Corps de reçu -->
		
				<table style="width:100%;height:12px;padding:0px;margin-top:-5px">
					<tr>
						<td style="width:40%;font-weight:bold">Mode de paiement: </td>
						<td style="width:60%"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></td>
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
				
				<table class="list" style="width:100%;border-collapse:collapse;border:1px dotted #000;margin-top:-5px" >
					<thead style="text-transform:uppercase;">
						<th align="center">Acte</th>
						<?php if(!is_null($fac->ass_id)){?>
						<th align="center">Couverture assurance</th>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<th align="center">Période</th>
						<?php }?>
						<th align="center">Coût</th>
					</thead>
					<tbody class="corps">
					<?php if($facdivers->fac_sObjet == 5){?>
						<td align="center"><?php echo $facdivers->lac_sLibelle;?></td>
						<td align="center"><?php echo $facdivers->fac_iMontantPaye;?></td>
					<?php }else{?>
						<?php //var_dump($elt)?>
						<?php foreach($elt AS $e){?>
							<tr>
								<td align="left"><?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?></td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="left">
									<?php $recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($recup){echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du coût de l\'acte médical';}else{echo 'Acte non couvert par l\'assureur';};?> 
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="left">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="right"><?php echo number_format($e->elf_iCout,0,",",".") ;?> <span>FCFA</span></td>
							</tr>	
						<?php }?>
					<?php }?>
					</tbody>
				</table>
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td align="right" style="font-weight:bold" >TOTAL</td>
						<td align="right" style="font-weight:bold" width="35%"><?php echo number_format($facdivers->fac_iMontantPaye,0,",",".") ;?>  <span>FCFA</span></td>
					</tr>
				</table>
					
				<table style="width:100%;">
					<?php if(!is_null($fac->ass_id)){ ;?>
						<tr>
							<td align="right">Montant payé par l'assureur</span>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantAss,0,",",".") ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
						<tr>
							<td align="right">Montant payé</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php if($fac->fac_iMontantReduc ==0 || is_null($fac->fac_iMontantReduc)){}else{ ?>
						<tr>
							<td align="right">Réduction</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantReduc,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
					
				</table>
				
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold"><!--Nom de la personne qui a payé--></span> <span style="text-align:right"></td>
					</tr>
				</table>
			
			<?php }?>
			
			</div>			
			<div style="border-top:1px dotted #000;width:100%;height:10px;margin-top:2.2%"></div>
						<div style="height:45%;" class="recu">
			<?php if($facdivers->fac_sObjet!="5"){?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:60px; height:20px" border="0" /></td>
						<td  align="center" ><span style="font-weight:bold;font-size:5pt">FACTURE D'ENCAISSEMENT</span></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>		
				<table style="width:100%; height:20px;margin-top:-4px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Nom (s):</span> <?php echo $fac->pat_sNom ;?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Prénom(s):</span> <?php echo $fac->pat_sPrenom   ;?>  </td>	
						<td align="right"   style="width:50%;"><span style="font-weight:bold">FACTURE N° :</span> <span style="text-align:right"><?php $fac->fac_sNumero ;?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">ID:</span> <?php echo $fac->pat_sMatricule ;?></td>	
					</tr>
				</table>
				<!--<table style="width:100%; height:5px;font-weight:bold;">
					<td align="center">FACTURE</td>	
				</table>-->
				<!-- Corps de reçu -->
		
				<table style="width:100%;height:12px;padding:0px;margin-top:-5px">
					<tr>
						<td style="width:40%;font-weight:bold">Mode de paiement: </td>
						<td style="width:60%"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></td>
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
				
				<table class="list" style="width:100%;border-collapse:collapse;border:1px dotted #000;margin-top:-5px" >
					<thead style="text-transform:uppercase;">
						<th align="center">Acte</th>
						<?php if(!is_null($fac->ass_id)){?>
						<th align="center">Couverture assurance</th>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<th align="center">Période</th>
						<?php }?>
						<th align="center">Coût</th>
					</thead>
					<tbody class="corps">
						<?php //var_dump($elt)?>
						<?php foreach($elt AS $e){?>
							<tr>
								<td align="left"><?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?></td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="left">
									<?php $recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($recup){echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du coût de l\'acte médical';}else{echo 'Acte non couvert par l\'assureur';};?> 
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="left">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="right"><?php echo number_format($e->elf_iCout,0,",",".") ;?> <span>FCFA</span></td>
							</tr>	
						<?php }?>
					</tbody>
				</table>
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td align="right" style="font-weight:bold" >TOTAL</td>
						<td align="right" style="font-weight:bold" width="35%"><?php echo number_format($fac->fac_iMontant,0,",",".") ;?>  <span>FCFA</span></td>
					</tr>
				</table>
					
				<table style="width:100%;">
					<?php if(!is_null($fac->ass_id)){ ;?>
						<tr>
							<td align="right">Montant payé par l'assureur</span>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantAss,0,",",".") ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
						<tr>
							<td align="right">Montant payé par le patient</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php if($fac->fac_iMontantReduc ==0 || is_null($fac->fac_iMontantReduc)){}else{ ?>
						<tr>
							<td align="right">Réduction</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantReduc,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
					
				</table>
				
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Le Patient</span> <span style="text-align:right"></td>
					</tr>
				</table>
			
			<?php }else{?>
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:60px; height:20px" border="0" /></td>
						<td  align="center" ><span style="font-weight:bold;font-size:5pt">FACTURE D'ENCAISSEMENT</span></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>		
				<table style="width:100%; height:20px;margin-top:-4px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">Nom/Enseigne:</span> <?php if(!is_null($facdivers->loc_id)){echo $facdivers->loc_sLib;}elseif(is_null($facdivers->loc_id)){echo '<em>Anonyme</em>';} ;?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date:</span> <span style="text-align:right"><?php echo $this->md_config->affDateFrNum($fac->fac_dDatePaie) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Contact:</span> <?php echo $facdivers->loc_sTel;   ;?>  </td>	
						<td align="right"   style="width:50%;"><span style="font-weight:bold">FACTURE N° :</span> <span style="text-align:right"><?php echo $facdivers->fac_sNumero ;?></span></td>
					</tr>
				</table>
				<!--<table style="width:100%; height:5px;font-weight:bold;">
					<td align="center">FACTURE</td>	
				</table>-->
				<!-- Corps de reçu -->
		
				<table style="width:100%;height:12px;padding:0px;margin-top:-5px">
					<tr>
						<td style="width:40%;font-weight:bold">Mode de paiement: </td>
						<td style="width:60%"><?php if(is_null($fac->ass_id)){echo 'comptant';}else{echo 'Par assurance';} ;?></td>
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
				
				<table class="list" style="width:100%;border-collapse:collapse;border:1px dotted #000;margin-top:-5px" >
					<thead style="text-transform:uppercase;">
						<th align="center">Acte</th>
						<?php if(!is_null($fac->ass_id)){?>
						<th align="center">Couverture assurance</th>
						<?php }?>
						
						<?php if(!is_null($fac->acm_iHosId)){?>
							<th align="center">Période</th>
						<?php }?>
						<th align="center">Coût</th>
					</thead>
					<tbody class="corps">
					<?php if($facdivers->fac_sObjet == 5){?>
						<td align="center"><?php echo $facdivers->lac_sLibelle;?></td>
						<td align="center"><?php echo $facdivers->fac_iMontantPaye;?></td>
					<?php }else{?>
						<?php //var_dump($elt)?>
						<?php foreach($elt AS $e){?>
							<tr>
								<td align="left"><?php if(!is_null($e->lac_sLibelle)){echo $e->lac_sLibelle;}else{echo 'Séjour occupation du lit';}?></td>
								<?php if(!is_null($fac->ass_id)){?>
								<td align="left">
									<?php $recup = $this->md_parametre->recup_acte_couvert($e->lac_id,$fac->tas_id);?>
									<?php if($recup){echo 'L\'assureur couvre '. $fac->tas_iTaux.' % du coût de l\'acte médical';}else{echo 'Acte non couvert par l\'assureur';};?> 
								</td>
								<?php }?>							
								
								<?php if(!is_null($fac->acm_iHosId)){?>
								<td align="left">
									<?php if(!is_null($e->hos_dDateSortie)){?>
										<?php echo 'du '. $this->md_config->affDateTimeFr($e->hos_dDate, 'date').' - '.$this->md_config->affDateTimeFr($e->hos_dDateSortie, 'date') ;?>
									<?php }else{?>
										<?php echo 'depuis '. $this->md_config->affDateTimeFr($e->hos_dDate) ;?>
									<?php }?>
								</td>
								<?php }?>	
								<td align="right"><?php echo number_format($e->elf_iCout,0,",",".") ;?> <span>FCFA</span></td>
							</tr>	
						<?php }?>
					<?php }?>
					</tbody>
				</table>
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td align="right" style="font-weight:bold" >TOTAL</td>
						<td align="right" style="font-weight:bold" width="35%"><?php echo number_format($facdivers->fac_iMontantPaye,0,",",".") ;?>  <span>FCFA</span></td>
					</tr>
				</table>
					
				<table style="width:100%;">
					<?php if(!is_null($fac->ass_id)){ ;?>
						<tr>
							<td align="right">Montant payé par l'assureur</span>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantAss,0,",",".") ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
						<tr>
							<td align="right">Montant payé</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantPaye,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php if($fac->fac_iMontantReduc ==0 || is_null($fac->fac_iMontantReduc)){}else{ ?>
						<tr>
							<td align="right">Réduction</td>
							<td align="right" width="35%"><?php echo number_format($fac->fac_iMontantReduc,0,",",".")   ;?> <span>FCFA</span></td>
						</tr>
					<?php }?>
					
				</table>
				
				<table style="width:100%;margin-top:-2px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold"><?php if($user->per_sSexe=='H'){echo 'CAISSIER';}else{echo 'CAISSIERE';};?>:</span> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold"><!--Nom de la personne qui a payé--></span> <span style="text-align:right"></td>
					</tr>
				</table>
			
			<?php }?>
			
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