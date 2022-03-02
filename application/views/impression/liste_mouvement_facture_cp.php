<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
$user = $this->md_connexion->personnel_connect();

$listeper = $this->md_personnel->recup_personnel_caisse3($date1, $date2); 
$cumulanencaispas = $this->md_patient->annule_cumul_encaisse_passation($date1, $date2); 
$libelle = $this->md_config->typeJrnl($typemvt, $acte);
$montant = $this->md_patient->montant_cprincipal($date1, $date2);

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $libelle;?></title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif; font-size:4pt;}
			table.footer{ position:fixed; bottom:40; left:0; right:0}
			<!--.list td{ padding:2px 10px;}-->

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body >
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style="padding:25px 20px 0px 20px" class="">
			<!-- En-tête du reçu -->
			<!--<table style="width:100%; height:50px" >
				<tr>
					<td  align="center" ><span style="font-weight:bold;font-size:8pt">RECU D'ENCAISSEMENT</span></td>
				</tr>
			</table>-->
			<div style="" class="recu">
			<?php //var_dump($listeper);?>

					
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:120px; height:50px;margin-right:35px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:120px; height:50px" border="0" /></td>
					</tr>
				</table>	
								
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:14pt;text-decoration:underline"><?php echo $libelle;?> PAR USAGER</span></td>
					</tr>
				</table>				
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:10pt"> <?php if($date1==$date2){echo 'DU: '.$this->md_config->affDateFrNum($date1);}else{echo 'DU: '.$this->md_config->affDateFrNum($date1).' AU: '.$this->md_config->affDateFrNum($date2);} ;?></span></td>
					</tr>
				</table>
				
				<?php $somtotale =0; foreach($listeper AS $lp){?>
				<table style="width:100%;margin-top:20px;">
					<tr>
						<td style="width:50%;font-weight:bold;font-size:7pt"><b style="font-weight:700"><span style="text-decoration:underline"> <?php $per = $this->md_personnel->recup_personnel($lp->per_id); echo $per->per_sNom.' '.$per->per_sPrenom;?></span></b></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold"><!--Nom de la personne qui a payé--></span> <span style="text-align:right"></td>
					</tr>
				</table>
				<table class="list" style="width:100%;" >
					<thead style="background:#000;color:#fff;text-transform:uppercase;font-weight:bold;font-size:7pt;">
						<tr>
							<th width="-5%" align="center">ORDRE</th>
							<th width="20%" align="center">N° FAC/OPÉRATION</th>
							<th width="20%" align="center">DATE & HEURE OPÉRATION</th>						
							<th width="20%" width="80%" align="center">TYPE OPÉRATION</th>
							<th width="20%" align="center">MONTANT (XAF)</th>
						</tr>
					</thead>
					<?php $liste = $this->md_patient->liste_mouvement_caisse_facture_cp($lp->per_id, $date1, $date2, $acte, $typemvt);;?>
					<tbody class="corps" style="font-weight:bold;font-size:7pt;padding-top:20px;">
					<?php //var_dump($liste)?>
					<?php $som =0; $cpt =1;foreach($liste AS $l){?>
						<tr <?php if($l->fac_sObjet=="8" || $l->fac_sObjet=="6"){echo' style="background:pink"';}?><?php if($l->fac_sObjet=='2'){echo' style="display:none"';}?>>
							<td align="center"><?php echo $cpt; ?></td>
							<td align="center"><?php if($l->fac_sObjet=="5" || $l->fac_sObjet=="Paiement des actes médicaux"){echo $l->fac_sNumero;}elseif($l->fac_sObjet=="6"){echo $l->fac_id.substr($l->fac_sNumero,-8);}elseif($l->fac_sObjet=="8"){echo $l->fac_id;}else{ echo substr($l->fac_sNumero,4);}; ?></td>
							<td align="center"><?php echo substr($this->md_config->affDateTimeFr($l->fac_dDatePaieTime),2); ?></td>
							<td align="center"><?php echo $this->md_config->objetFacture($l->fac_sObjet); ?><?php if($l->fac_sObjet=="6" || $l->fac_sObjet=="8"){echo ' ('.$l->fac_sNumero.')';};?></td>
							<td align="center">
							<?php 
								if($l->fac_sObjet=="6"){
									echo number_format($l->fac_iRemise,0,",",".");
								}elseif($l->fac_sObjet=="10"){
									echo number_format($l->fac_iEx,0,",",".");
								}elseif($l->fac_sObjet=="9"){
									echo number_format($l->fac_iDef,0,",",".");
								}else{ 
									echo number_format($l->fac_iMontantPaye,0,",",".");
								}
							;?>
							</td>
						</tr>

					<?php if($l->fac_iSta==1){if($l->fac_sObjet=="6"){$som +=$l->fac_iRemise;}elseif($l->fac_sObjet=="10"){$som +=$l->fac_iEx;}elseif($l->fac_sObjet=="9"){$som +=$l->fac_iDef;}else{$som +=$l->fac_iMontantPaye;}};$cpt+=1;}?>
					<tr>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center">TOTAL</td>
						<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($som,0,",",".") ;?></td>
					</tr>
					
					<?php if($typemvt==0){?>
						<?php $annulation = $this->md_parametre->recup_liste_annulation_caissier($lp->per_id, $date1, $date2);?>
						<?php if(!empty($annulation)){?>
							<?php foreach($annulation AS $a){?>
								<tr>
									<td align="center"></td>
									<td align="center"><?php echo $a->fac_sNum;?></td>
									<td align="center"><?php echo substr($this->md_config->affDateTimeFr($a->anf_dDateTime),2); ?></td>
									<td align="center">ANNULATION</td>
									<td align="center"><?php echo number_format($a->anf_iMontant,0,",","."); ?></td>
								</tr>
							<?php }?>					
						<?php }?>					
					
						<?php $cession = $this->md_parametre->recup_liste_cession_caissier($lp->per_id, $date1, $date2);?>
						<?php $passation = $this->md_parametre->recup_liste_passation_caissier($lp->per_id, $date1, $date2);?>
						<?php if(!empty($cession) && empty($passation)){?>
							<?php $cumulMont=0;$cumulEsp=0;$ordineCes=1;$cumulCes=0;foreach($cession AS $c){?>
								<tr>
									<td align="center"></td>
									<td align="center"><?php echo substr($c->ces_sNumOperation,4);?></td>
									<td align="center"><?php echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?></td>
									<td align="center">CESSION <?php if(count($cession) > 1){echo 'N° '.$ordineCes;}?></td>
									<td align="center"><?php echo number_format($c->ces_iTotal,0,",","."); ?></td>
								</tr>	
							<?php $cumulMont+=$c->ces_iMontant;$cumulEsp+=$c->ces_iEsp;$ordineCes+=1;$cumulCes+=$c->ces_iTotal;}?>
							<?php if(count($cession) > 1){?>
								<tr>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center">TOTAL CESSION</td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($cumulCes,0,",","."); ?></td>
								</tr>
							<?php }?>	
							<?php $reslt = $cumulEsp - $cumulMont;?>
							<?php if($reslt!=0){?>
							<tr>
								<td align="center"></td>
								<td align="center"><?php //echo substr($c->ces_sNumOperation,4);?></td>
								<td align="center"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?></td>
								<td align="center"><?php if($reslt > 0){echo 'EXCEDENT';}elseif($reslt < 0){echo 'DEFICIT';}?></td>
								<td align="center"><?php echo number_format($reslt,0,",","."); ?></td>
							</tr>
							<?php }?>
							<tr>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center">SOLDE</td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($som + $cumulCes + $reslt,0,",","."); ?></td>
							</tr>
						<?php }elseif(empty($cession) && !empty($passation)){?>						
					
							<?php $cumulMont=0;$cumulEsp=0;$ordinePas=1;$cumulPas=0;foreach($passation AS $p){?>
								<tr>
									<td align="center"></td>
									<td align="center"><?php echo substr($p->pas_sNum,4);?></td>
									<td align="center"><?php echo substr($this->md_config->affDateTimeFr($p->pas_dDateTime),2); ?></td>
									<td align="center">PASSATION <?php if(count($passation) > 1){echo 'N° '.$ordinePas;}?></td>
									<td align="center"><?php echo number_format($p->pas_iTotal,0,",","."); ?></td>
								</tr>	
							<?php $cumulMont+=$p->pas_iMontant;$cumulEsp+=$p->pas_iEsp;$cumulPas+=$p->pas_iTotal;$ordinePas+=1;}?>	
							<?php if(count($passation) > 1){?>
								<tr>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center">TOTAL PASSATION</td>
									<td style="width:100%;margin-top:7px;border-top:1px dotted #000" align="center"><?php echo number_format($cumulPas,0,",","."); ?></td>
								</tr>
							<?php }?>
							<?php $reslt = $cumulEsp - $cumulMont;?>
							<?php if($reslt!=0){?>
							<tr>
								<td align="center"></td>
								<td align="center"><?php //echo substr($c->ces_sNumOperation,4);?></td>
								<td align="center"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?></td>
								<td align="center"><?php if($reslt > 0){echo 'EXCEDENT';}elseif($reslt < 0){echo 'DEFICIT';}?></td>
								<td align="center"><?php echo number_format($reslt,0,",","."); ?></td>
							</tr>
							<?php }?>
							<tr>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center">SOLDE</td>
								<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($som + $cumulPas + $reslt,0,",","."); ?></td>
							</tr>
						<?php }elseif(!empty($cession) && !empty($passation)){?>
							<?php $cumulMontCes=0;$cumulEspCes=0;$ordineCes=1;$cumulCes=0; foreach($cession AS $c){?>
								<tr>
									<td align="center"></td>
									<td align="center"><?php echo substr($c->ces_sNumOperation,4);?></td>
									<td align="center"><?php echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?></td>
									<td align="center">CESSION <?php if(count($cession) > 1){echo 'N° '.$ordineCes;}?></td>
									<td align="center"><?php echo number_format($c->ces_iTotal,0,",","."); ?></td>
								</tr>
							<?php $cumulMontCes+=$c->ces_iMontant;$cumulEspCes+=$c->ces_iEsp;$ordineCes+=1;$cumulCes+=$c->ces_iTotal;}?>	
							<?php if(count($cession) > 1){?>
								<tr>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center">TOTAL CESSION</td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($cumulCes,0,",","."); ?></td>
								</tr>
							<?php }?>
							<?php $resltCes = $cumulEspCes - $cumulMontCes;?>
							<?php if($resltCes!=0){?>
							<tr>
								<td align="center"></td>
								<td align="center"><?php //echo substr($c->ces_sNumOperation,4);?></td>
								<td align="center"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?></td>
								<td align="center"><?php if($resltCes > 0){echo 'EXCEDENT';}elseif($resltCes < 0){echo 'DEFICIT';}?></td>
								<td align="center"><?php echo number_format($resltCes,0,",","."); ?></td>
							</tr>
							<?php }?>
							<?php $cumulMontPas=0;$cumulEspPas=0;$ordinePas=1;$cumulPas=0;foreach($passation AS $p){?>							
								<tr>
									<td align="center"></td>
									<td align="center"><?php echo substr($p->pas_sNum,4);?></td>
									<td align="center"><?php echo substr($this->md_config->affDateTimeFr($p->pas_dDateTime),2); ?></td>
									<td align="center">PASSATION <?php if(count($passation) > 1){echo 'N° '.$ordinePas;}?></td>
									<td align="center"><?php echo number_format($p->pas_iTotal,0,",","."); ?></td>
								</tr>
							<?php $cumulMontPas+=$p->pas_iMontant;$cumulEspPas+=$p->pas_iEsp;$cumulPas+=$p->pas_iTotal;$ordinePas+=1;}?>
								<?php if(count($passation) > 1){?>
								<tr>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center">TOTAL PASSATION</td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;border-top:1px dotted #000" align="center"><?php echo number_format($cumulPas,0,",","."); ?></td>
								</tr>
								<?php }?>	
								<?php $resltPas = $cumulEspPas - $cumulMontPas;?>
								<?php if($resltPas!=0){?>
								<tr>
									<td align="center"></td>
									<td align="center"><?php //echo substr($c->ces_sNumOperation,4);?></td>
									<td align="center"><?php //echo substr($this->md_config->affDateTimeFr($c->ces_dDate),2); ?></td>
									<td align="center"><?php if($resltPas > 0){echo 'EXCEDENT';}elseif($resltPas < 0){echo 'DEFICIT';}?></td>
									<td align="center"><?php echo number_format($resltPas,0,",","."); ?></td>
								</tr>
								<?php }?>	
								<tr>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center"></td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center">SOLDE</td>
									<td style="width:100%;margin-top:7px;border-bottom:1px dotted #000;" align="center"><?php echo number_format($som + $cumulCes + $cumulPas + $resltPas + $resltCes,0,",","."); ?></td>
								</tr>
						<?php }?>	
					<?php }?>

					</tbody>
				</table>
			<?php $somtotale +=$som;}?>
				<table class="list" style="width:100%;margin-top:17px;" >
					<tr>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-top:1px dotted #000;border-bottom:1px dotted #000;border-left:1px dotted #000;" align="center">Total Général Encaissé</td>
						<td style="width:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-top:1px dotted #000;border-bottom:1px dotted #000;border-left:1px dotted #000;border-right:1px dotted #000;" align="center"><?php if($typemvt==0){$result = $somtotale - $cumulanencaispas->cumulannencaisspas;}else{$result = $somtotale;} echo number_format($result,0,",",".") ;?> XAF</td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
					</tr>					
					<tr>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-bottom:1px dotted #000;border-left:1px dotted #000;" align="center">Total Remise</td>
						<td style="width:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-bottom:1px dotted #000;border-left:1px dotted #000;border-right:1px dotted #000;" align="center"><?php echo number_format($montant->perte + $montant->assurance,0,",",".") ;?> XAF</td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
					</tr>					
					<?php if($typemvt!=0){?>
					<?php $recupRslt = $this->md_config->cumulPassCess($date1, $date2);$tab = explode('-/-', $recupRslt);?>
					<tr>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-left:1px dotted #000;" align="center">Total Excedent</td>
						<td style="width:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-left:1px dotted #000;border-right:1px dotted #000;" align="center"><?php  echo number_format($tab[0],0,",",".") ;?> XAF</td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
					</tr>			
					<tr>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;text-transform:uppercase;font-weight:bold;font-size:7pt;" align="center"></td>
						<td style="width:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-top:1px dotted #000;border-left:1px dotted #000;border-bottom:1px dotted #000;" align="center">Total Déficit</td>
						<td style="backgroundwidth:100%;margin-top:7px;font-weight:bold;font-size:10pt;border-top:1px dotted #000;border-left:1px dotted #000;border-bottom:1px dotted #000;border-right:1px dotted #000;" align="center"><?php  echo number_format($tab[1],0,",",".") ;?> XAF</td><!--$cumulanencaispas->cumulannencaisspas retrache les encaisse passation de caisse-->
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>	
		</div>
	</body>
</html>
