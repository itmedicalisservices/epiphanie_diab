
	
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_patient->compteur_caisse($this->session->diabcare,date("Y-m-d")); ?>
<?php $listeper = $this->md_personnel->recup_personnel_caisse3(NULL, date("Y-m-d")); ?>
<?php //$listeper2 = $this->md_personnel->recup_personnel_caisse2(); ?>

<section class="content home" style="min-height:700px" >
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>JOURNAL PAR USAGER</h2>
            <small class="text-muted"></small>
        </div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>DÉFINIR UNE PLAGE DE RECHERCHE</h2>
						<?php //echo count($listeper2);?>
					</div>
					<div class="body">
						<form id="form-mvtcprincipal">
							<div class="row clearfix">
								<div class="col-sm-3">
									<div class="form-group">
										Du<input type="text" name="premierJour" id="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date debut">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										Au<input type="text" name="dernierJour" id="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date fin">
									</div>
								</div>

								<div class="col-sm-2">
									<div class="form-group drop-custum">
									<label>* Type d'Actes</label>
										<select name="acte" class="form-control obligatoire show-tick">
											<option value="2">Tous les actes</option>
											<option value="0">Actes médicaux</option>
											<option value="1">Frais/actes Divers</option>
										</select>
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group drop-custum">
									<label>* Type de mouvement</label>
										<select name="jrnal" class="form-control obligatoire show-tick">
											<option value="0">Journal de caisses</option>
											<option value="1">Journal des encais.</option>
										</select>
									</div>
								</div>
	
								<div class="col-sm-2">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="cprincipal">Valider</button>
									
								</div>
							</div>
						</form>
						<span class="retourmvtcp"></span>
					</div>
				</div>
			</div>
		</div>
		
		 <div class="row clearfix" id="affichemvtcp">

			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
					<?php //var_dump($listeper)?>
					<?php $somtotale=0; foreach($listeper AS $lp){?>
					<?php $nb = $this->md_personnel->nb_mvt_actif_caissier($lp->per_id);?>
					<?php if($nb->nb >=1){?>
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px;">
							<thead>	
								<tr align="center">
									<td  colspan="6"><b>JOURNAL DE CAISSE PAR USAGER</b></td>
								</tr>	
								<tr>
									<td align="left" colspan="6"><b style="font-weight:700"><span style="text-decoration:underline"> <?php $per = $this->md_personnel->recup_personnel($lp->per_id); echo $per->per_sNom.' '.$per->per_sPrenom;?></span></b></td>
								</tr>								
								<tr align="center">
									<td><b>Ordre</b></td>
									<td><b>N°Facture(Opération)</b></td>
									<td><b>Date & Heure</b></td>
									<td><b>Type Opération</b></td>
									<td><b>Montant (<small>FCFA</small>)</b></td>
									<td><b>Actions</b></td>
								</tr>
							</thead>
						    <?php $mouvements = $this->md_patient->liste_tout_mouvement_caisse_reduite($lp->per_id); ?>
							<tbody>
							<?php $cpt=1;$somcumul=0; if(empty($mouvements)){echo '<tr><td colspan="6"><em>Aucun mouvement détecté pour cet usager</em></td></tr>';}else{ foreach($mouvements AS $m){ ?>
								<tr align="center" <?php if($m->fac_sObjet=="8" || $m->fac_sObjet=="6"){echo' style="background:pink"';}?> >
									<td>
										<b><?php echo $cpt; ?></b>
									</td>					
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}elseif($m->fac_sObjet=="6"){echo $m->fac_id.substr($m->fac_sNumero,-8);}elseif($m->fac_sObjet=="8"){echo $m->fac_id;}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
										<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6" || $m->fac_sObjet=="8"){echo ' ('.$m->fac_sNumero.')';};?></b> 
									</td>
									<td>
										<b><?php if($m->fac_sObjet=="6"){echo number_format($m->fac_iRemise,0,",",".");}else{ echo number_format($m->fac_iMontantPaye,0,",",".");}; ?></b>
									</td>
									<td class="text-center">
										<?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){?>
											<a href="<?php echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:16px"></i></a> &nbsp;&nbsp;
											<?php if($m->fac_sObjet!="5"){?>
											<a href="<?php echo site_url("facture/detail/".$m->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:16px"></i></a>
											<?php }?>
										<?php }?>
									</td>
								</tr>
							<?php  if($m->fac_iSta==1){if($m->fac_sObjet=="6"){$somcumul +=$m->fac_iRemise;}else{$somcumul +=$m->fac_iMontantPaye;} ;}$cpt+=1;}}  ?><!--$m->fac_sObjet!="3" exclu la sommation de passation-->
								<tr>
									<td align="right" colspan="4"><b style="font-weight:700">TOTAL:</b></td>
									<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul,0,",","."); ?></b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
								</tr>		
							</tbody>						
						<?php }?>
						<?php  if($nb->nb >=1){$somtotale +=$somcumul;};}?>
						
							
							<tfoot>
								<tr>
									<td align="right" colspan="4"><b style="font-weight:900"><?php if($somtotale==0){echo '<em>AUCUNE CAISSE OUVERTE !</em>';}else{echo 'TOTAL GENERAL:';};?></b></td>
									<td align="center" colspan=""><b style="font-weight:900"><?php if($somtotale==0){echo '';}else{echo number_format($somtotale,0,",",".");};?></b></td>
									<td align="right" colspan=""></td>
								</tr>
							</tfoot>
						</table>
                    </div>
                </div>
            </div>
			
        </div>

	</div>
</section>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>