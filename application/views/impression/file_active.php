<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$pat = $this->md_patient->recup_patient($patient); 
$infodiab = $this->md_patient->recupinfodiabete($patient);
$facrisque = $this->md_patient->facteurRisque($patient);
$constante = $this->md_patient->constanteDonneeClinique($patient); 

// var_dump($risque);
// return;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>FILE ACTIVE</title>
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
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:4pt">FILE ACTIVE</span></td>
					</tr>
				</table>					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><span style="font-weight:bold;font-size:4pt">I. Identification</span></td>
					</tr>
				</table>		
				<table style="width:100%; height:20px;margin-top:-5px">
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">NOM COMPLET :</span> <?php echo $pat->pat_sNom.' '.$pat->pat_sPrenom  ;?></td>
					</tr>
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">ID:</span> <?php echo $pat->pat_sMatricule ;?>  </td>	
					</tr>					
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">AGE:</span> 
						<?php $ageAnnee= $this->md_config->ageAnnee($pat->pat_dDateNaiss); if($ageAnnee>1){echo $ageAnnee." ans";}else if($ageAnnee ==1){echo $ageAnnee." an";}else{echo $this->md_config->ageMois($pat->pat_dDateNaiss)." mois";} ?>
						</td>	
					</tr>					
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">SEXE:</span> <?php if($pat->pat_sSexe=="H"){echo "Homme";}else{echo "Femme";}?>  </td>	
					</tr>									
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">ADRESSE:</span> <?php echo $pat->pat_sAdresse;?>  </td>	
					</tr>									
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">TELEPHONE:</span> <?php echo $pat->pat_sTel;?>/<?php echo $pat->pat_sOtherPhone;?>  </td>	
					</tr>						
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">PROFESSION:</span> <?php echo $pat->pat_sProfession;?>  </td>	
					</tr>					
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">SITUATION MATRIMONIALE:</span> <?php echo $pat->pat_sSituationMat;?>  </td>	
					</tr>				
				</table>	
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><span style="font-weight:bold;font-size:4pt">II. Diabète</span></td>
					</tr>
				</table>	
				<table style="width:100%; height:20px;margin-top:-5px">
				<?php if($infodiab){?>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">DECOUVERTE RECENTE:</span> <?php if(is_null($infodiab->ind_sRecente)){echo '<em>néant</em>';}else{ if($infodiab->ind_sRecente==1){echo 'OUI';}else{echo 'NON';}; };?>	</td>
						<td  style="width:50%"><span style="font-weight:bold">DATE DECOUVERTE :</span> <?php if(is_null($infodiab->ind_dDec)){echo '<em>néant</em>';}else{echo $this->md_config->affDateFrNum($infodiab->ind_dDec);};?></td>
						<td  style="width:50%"><span style="font-weight:bold">ANCIENNETE :</span> 
						<?php 
							if(is_null($infodiab->ind_dDec)){echo '<em>néant</em>';}else{
							$ageAnnee= $this->md_config->ageAnnee($infodiab->ind_dDec); 
								if($ageAnnee>1 || $ageAnnee ==1){echo " En année";}else{
									$mois = $this->md_config->ageMois($infodiab->ind_dDec);
									if($mois == 0){echo " Moins d'un mois";}else{echo " En mois";}
								}
							}
						?>
						</td>
					</tr>					
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">TYPE :</span> <?php if(is_null($infodiab->dgq_id)){echo '<em>néant</em>';}else{ $diagnos = $this->md_parametre->recupDiagnostique($infodiab->dgq_id); echo $diagnos->dgq_sLib;};?></td>
						<td  style="width:50%"><span style="font-weight:bold">SUIVI REGULIER :</span> <?php if(is_null($infodiab->ind_sSuivi)){echo '<em>néant</em>';}else{ if($infodiab->ind_sSuivi==1){echo 'OUI';}else{echo 'NON';} ;};?></td>
						<td  style="width:50%"><span style="font-weight:bold">RYTHME VISITES :</span> <?php if(is_null($infodiab->ind_sRythme)){echo '<em>néant</em>';}else{ if($infodiab->ind_sRythme==0){echo 'Une fois/trimestre';}elseif($infodiab->ind_sRythme==1){echo 'Une fois/semestre';}else{echo 'Une fois/année';};} ;?></td>
					</tr>										
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">QUALITE GLYCEMIES :</span> <?php if(is_null($infodiab->ind_sQlte)){echo '<em>néant</em>';}else{ if($infodiab->ind_sQlte==0){echo 'Mauvaise';}elseif($infodiab->ind_sQlte==1){echo 'Bonne';}else{echo 'Non précisée';};};?></td>
						<td  style="width:50%"><span style="font-weight:bold">DERNIER ABA1C :</span> <?php if(!is_null($infodiab->ind_dDateDern)){echo $this->md_config->affDateFrNum($infodiab->ind_dDateDern);}else{echo '<em>Non renseigné</em>';}?></td>
						<td  style="width:50%"><span style="font-weight:bold">TRAITEMENT ACTUEL :</span> 
						<?php 
							if(is_null($infodiab->ind_sTrait)){echo '<em>néant</em>';}else{ 
							if($infodiab->ind_sTrait==0){echo 'Insuline';}elseif($infodiab->ind_sTrait==1){echo 'Sulfamide hypoglycémiant';}elseif($infodiab->ind_sTrait==2){echo 'Biguanide';}elseif($infodiab->ind_sTrait==3){echo 'Sulfamide + biguanide';}elseif($infodiab->ind_sTrait==4){echo 'Insuline + biguanide';}elseif($infodiab->ind_sTrait==5){echo 'Régime seul';}else{echo 'Aucun';};
							if($infodiab->ind_sTrait==1){if($infodiab->ind_sTypeTrait==0){echo ' (Glibenclamide)';}elseif($infodiab->ind_sTypeTrait==1){echo ' (Glicazide)';}else{echo ' (Autre)';};}
							};
						?>
						</td>
					</tr>
					<tr>
						<td style="width:50%"><span style="font-weight:bold">CHOLESTEROL TOTAL (CT): </span> <?php if(is_null($infodiab->ind_iChol)){echo '<em>néant</em>';}else{ echo $infodiab->ind_iChol;} ;?></td>
						<td style="width:50%"><span style="font-weight:bold">TRIGLUCERIDES (TRG): </span> <?php if(is_null($infodiab->ind_iTri)){echo '<em>néant</em>';}else{ echo $infodiab->ind_iTri;} ;?></td>
						<td style="width:50%"><span style="font-weight:bold">HDL-C : </span> <?php if(is_null($infodiab->ind_iHdl)){echo '<em>néant</em>';}else{ echo $infodiab->ind_iHdl;} ;?></td>
					</tr>						
					<tr>
						<td style="width:50%"><span style="font-weight:bold">LDL-C : </span> <?php if(is_null($infodiab->ind_iLdl)){echo '<em>néant</em>';}else{ echo $infodiab->ind_iLdl;} ;?></td>
					</tr>						
				<?php }else{?>
					<tr>
						<td  style="width:50%"><em>Aucune donnée trouvée !</em></td>
					</tr>
				<?php }?>
				</table>				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><span style="font-weight:bold;font-size:4pt">III. Facteurs de risque</span></td>
					</tr>
				</table>	
				<table style="width:100%; height:20px;margin-top:-5px">
				<?php if($facrisque){?>					
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">HTA :</span> <?php if($facrisque){if($facrisque->far_iHta==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">Obésité :</span> <?php if($facrisque){if($facrisque->far_iObs==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">Sédentarité :</span> <?php if($facrisque){if($facrisque->far_iSed==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">Dyslipidémie  :</span> <?php if($facrisque){if($facrisque->far_iDys==1){echo'OUI';}else{echo 'NON';};}?></td>
					</tr>					
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Habitude de vie</span> </td>
					</tr>						
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Tabac :</span> <?php if($facrisque){if($facrisque->far_iTab==1){echo'OUI';}elseif($facrisque->far_iTab==2){echo'ARRET';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">Alcool :</span> <?php if($facrisque){if($facrisque->far_iAl==1){echo'OUI';}elseif($facrisque->far_iAl==2){echo'ARRET';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold"></span></td>
						<td  style="width:50%"><span style="font-weight:bold"></span></td>
					</tr>
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Antécédent familiaux </span> </td>
					</tr>					
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">HTA:</span> <?php if($facrisque){if($facrisque->far_iHta_2==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">Diabète:</span> <?php if($facrisque){if($facrisque->far_iDiab==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td colspan="2" style="width:50%"><span style="font-weight:bold">Autre </span>
						<?php if($facrisque){if(!is_null($facrisque->far_sOther)){echo'OUI ('.$facrisque->far_sOther.')';}else{echo 'NON';};}?>
						</td>
					</tr>													
				<?php }else{?>
					<tr>
						<td  style="width:50%"><em>Aucune donnée trouvée !</em></td>
					</tr>
				<?php }?>
				
				<?php if($constante){?>		
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Données clinique</span> </td>
					</tr>				
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Tension :</span> <?php echo $constante->cdc_iTensionSys.'/'.$constante->cdc_iTensionDia.'mmHg';?></td>
						<td  style="width:50%"><span style="font-weight:bold">Poids :</span> <?php echo $constante->cdc_fPoids.'Kg';?></td>
						<td  style="width:50%"><span style="font-weight:bold">Taille :</span> <?php echo $constante->cdc_fTaille.'Cm';?></td>
						<td  style="width:50%"><span style="font-weight:bold">IMC  :</span> <?php echo $result = round((($constante->cdc_fPoids)/(($constante->cdc_fTaille*$constante->cdc_fTaille/10000))),2). 'kg/m2 ';?> <?php if($result > 30){echo ' (Obèse)';} ;?></td>
					</tr>					
						
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Glycémie :</span> <?php echo $constante->cdc_iGlmie. 'G/L ';?></td>
						<td  style="width:50%"><span style="font-weight:bold">Température :</span> <?php if(is_null($constante->cdc_iTemperature)){echo '<em>Néant</em>';}else{echo $constante->cdc_iTemperature.'°C';};?></td>
						<td  style="width:50%"><span style="font-weight:bold">Pouls :</span> <?php if(is_null($constante->cdc_fPoulsation)){echo '<em>Néant</em>';}else{echo $constante->cdc_fPoulsation.'pulsations/mn';};?></td>
						<td  style="width:50%"><span style="font-weight:bold">Tour taille :</span><?php if(is_null($constante->cdc_fTourTaille)){echo '<em>Néant</em>';}else{echo $constante->cdc_fTourTaille.'Cm';};?> <?php if($pat->pat_sSexe=='H'){if($constante->cdc_fTourTaille > 102){echo '(Obésité Abdominale)';}}else{if($constante->cdc_fTourTaille > 88){echo '(Obésité Abdominale)';}};?></td>
					</tr>						
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Corps cét. :</span> <?php if(is_null($constante->cdc_sCetonique)){echo '<em>Néant</em>';}else{echo $constante->cdc_sCetonique;};?></td>
						<td  style="width:50%"><span style="font-weight:bold">PAS debout BG:</span> <?php if(is_null($constante->cdc_iPdbg)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPdbg.'mmHg';};?></td>
						<td  style="width:50%"><span style="font-weight:bold">PAS debout BD :</span> <?php if(is_null($constante->cdc_iPdbd)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPdbd.'mmHg';};?></td>
						<td  style="width:50%"><span style="font-weight:bold">PAS couché BG :</span><?php if(is_null($constante->cdc_iPcbg)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPcbg.'mmHg';};?></td>
					</tr>					
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">PAS couché BD:</span> <?php if(is_null($constante->cdc_iPcbd)){echo '<em>Néant</em>';}else{echo $constante->cdc_iPcbd.'mmHg';};?></td>
						<td  style="width:50%"><span style="font-weight:bold"></span> </td>
						<td  style="width:50%"><span style="font-weight:bold"></span> </td>
						<td  style="width:50%"><span style="font-weight:bold"></span></td>
					</tr>
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Observations :</span> <?php if(is_null($constante->cdc_sObs)){echo '<em>Néant</em>';}else{echo nl2br($constante->cdc_sObs);};?></td>
					</tr>																	
				<?php }else{?>
					<tr>
						<td  style="width:50%"><em>Aucune donnée trouvée !</em></td>
					</tr>
				<?php }?>
				
				<?php if($facrisque){?>							
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Complications</span> </td>
					</tr>					
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Macroangiopathie </span> </td>
					</tr>						
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Cœur et vaisseaux </span> </td>
					</tr>				
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">1.	Coeur </span> </td>
					</tr>				
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Cardiopathie :</span> <?php if($facrisque){if($facrisque->far_iCardio==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">HTA :</span> <?php if($facrisque){if($facrisque->far_iHta_3==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td colspan="2" style="width:50%"><span style="font-weight:bold">Normal :</span> 
						<?php if($facrisque){if(!is_null($facrisque->far_iChronol)){echo'OUI';}else{echo 'NON';};}?>
						<?php if($facrisque){if(!is_null($facrisque->far_iChronol)){if($facrisque->far_iChronol==0){echo ' (avant le diabète)';}elseif($facrisque->far_iChronol==1){echo' (après le diabète)';}else{echo' (simultanément)';};}}?>
						</td>
					</tr>					
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">2.	Vaisseaux </span> </td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Echo Doppler:</span> <?php if($facrisque){if($facrisque->far_iEcho==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">AVC :</span> <?php if($facrisque){if($facrisque->far_iAvc==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold"></span></td>
						<td  style="width:50%"><span style="font-weight:bold"></span></td>
					</tr>
					<tr>
						<td colspan="4" style="width:50%"><span style="font-weight:bold">Microangiopathie </span> </td>
					</tr>					
					<tr>
						<td  style="width:50%"><span style="font-weight:bold">Néphro. diab.:</span> <?php if($facrisque){if($facrisque->far_iNephro==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td  style="width:50%"><span style="font-weight:bold">Neuro.diab.:</span> <?php if($facrisque){if($facrisque->far_iNeuro==1){echo'OUI';}else{echo 'NON';};}?></td>
						<td colspan="2" style="width:50%"><span style="font-weight:bold">Rétino. diab. </span>
						<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){echo'OUI';}else{echo 'NON';};}?>
						<?php if($facrisque){if(!is_null($facrisque->far_iTyperetino)){if($facrisque->far_iTyperetino==0){echo ' (Rétinopathie non proliférante)';}elseif($facrisque->far_iTyperetino==1){echo' (Rétinopathie proliférante)';}else{echo' (Maculopathie diabétique)';};}}?>
						</td>
					</tr>													
				<?php }?>
				</table>				
				<!--<table class="footer" style="width:100%;">
					<tr>
						<td align="center"><b>Email:</b> <span style="color:maroon"><?php// echo $info->str_sEmail;?></span> <b>Tel:</b> <span style="color:maroon"><?php //echo $info->str_sTel;?> / <?php //echo $info->str_sTel_2;?></span></td>
					</tr>
				</table>-->
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