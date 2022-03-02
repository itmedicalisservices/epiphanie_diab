
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	if ($user->flt_sLib == 'Administration' || $user->flt_sLib == 'Comptabilite'){
		$liste = $this->md_patient->liste_facture_assure3();
	}else{
		$liste = $this->md_patient->liste_facture_assure2($this->session->diabcare);
	}
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
		<?php if ($user->flt_sLib == 'Administration' || $user->flt_sLib == 'Comptabilite'){?>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>DÉFINIR UNE PLAGE DE RECHERCHE</h2>
						<?php //echo count($listeper2);?>
					</div>
					<div class="body">
						<form id="form-ticket">
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
								<div class="col-sm-4">
									<div class="form-group drop-custum">
									<label>* Type de mouvement</label>
										<select name="mvt" class="form-control obligatoire show-tick">
											<option value="0">Tickets modérateurs</option>
											<option value="1">Tickets modérateurs par assureur</option>
										</select>
									</div>
								</div>
	
								<div class="col-sm-2">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="ticket">Valider</button>
									
								</div>
							</div>
						</form>
						<span class="retourticket"></span>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
        <div class="row clearfix" id="afficheticket">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des factures assurées</h2>
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<th>Patient</th>
									<th>Assureur</th>
									<th>Total</th>
									<th>Payé par l'assurance</th>
									<!--<th style="width:10px">Rémise</th>-->
									<th>Payé par le patient</th>
									<th>Date Opération</th>
									<th>N° Facture</th>
									<?php if($user->flt_sLib == 'Administration' || $user->flt_sLib == 'Comptabilite'){?>
									<th class="text-center">Auteur</th>
									<?php }?>
									<th style="width:10px">Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php //var_dump($liste) ?>
							<?php foreach($liste AS $l){ ?>
							<?php if(date("Y-m-d") < $l->fac_dDateValAnnul){?>
								<tr>
									<td>
										<?php echo $l->pat_sNom; ?> <?php echo $l->pat_sPrenom; ?>
									</td>
									<td>
										<?php echo $l->ass_sLibelle; ?>
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontant,0,",","."); ?></b> <small>FCFA</small>
									</td>
									<td>
										<b><?php echo number_format($l->fac_iMontantAss,0,",","."); ?></b> <small>FCFA</small>
									</td>
									<!--<td>
										<?php //if(is_null($l->fac_iMontantReduc) || $l->fac_iMontantReduc == 0){ echo "<i>Pas de réduction</i>";} else { ?>
										<b><?php// echo number_format($l->fac_iMontantReduc,0,",","."); ?></b> <small>FCFA</small>
										<?php// } ?>
									</td>-->
									<td>
										<b><?php echo number_format($l->fac_iMontantPaye,0,",","."); ?></b> <small>FCFA</small>
									</td>
									<td>
										<?php echo $this->md_config->affDateFrNum($l->fac_dDatePaie); ?>
									</td>									
									<td>
										<?php echo $l->fac_sNumero; ?>
									</td>	
									<?php if($user->per_iTypeCompte==0 || $user->per_iTypeCompte == 26){?>									
									<td>
										<b><?php $pers = $this->md_personnel->recup_personnel($l->per_id); echo $pers->per_sNom.' '.$pers->per_sPrenom; ?></b>
									</td>
									<?php }?>
									<!--
									<td class="text-center" style="padding:0;width:10%">
										<?php if($l->ass_id==NULL){?>
											<?php if($l->fac_iReste==0){?>
												<i class='label label-success'> payée</i>
											<?php }else{?>
													<?php if($l->fac_iMontantPaye==0){?>
														<i class='label label-danger'>non payée</i>
													<?php }else{?>
														<i class='label label-warning'>avancée</i>
													<?php }?>
											<?php }?>
										<?php }else{?>
											<?php if($l->fac_iMontantAss==0){?>
												<?php if($l->fac_iReste==0){?>
													<i class='label label-success'> payée</i>
												<?php }else{?>
													<?php if($l->fac_iMontantPaye==0){?>
														<i class='label label-danger'>non payée</i>
													<?php }else{?>
														<i class='label label-warning'>avancée</i>
													<?php }?>
												<?php }?>
											<?php }else{?>
												<?php if($l->fac_iSituationAss==0){?>
													<i class='label label-danger'>non payée</i>
												<?php }else{?>
													<i class='label label-success'> payée</i>
												<?php }?>
											<?php }?>
										<?php }?>
									</td>
									-->
									<td class="text-center">
									<?php if($user->flt_sLib != 'Administration'){?>
										<a href="<?php echo site_url("impression/recu_caisse/".$l->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a> &nbsp;&nbsp;
										<a href="<?php echo site_url("facture/detail/".$l->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:20px"></i></a>
									<?php }else{?>
										<?php if((date("H:i") > '17:30') && (date("H:i") <= '23:59')){?>
											<em>Reportée</em>
										<?php }else{?>
											<?php if(is_null($l->fac_iStAnnul)){?>
												<?php if($l->fac_iSta == 1){?>
													<a onClick="return confirm('Êtes-vous sûr de vouloir annuler cette facture ?')" href="<?php echo site_url("facture/annuler_facture_assuree/".$l->fac_id);?>" class="text-danger" title="Annuler cette facture ?" ><i class="fa fa-times" style="font-size:20px"></i></a>
												<?php }else{?>	
													<a onClick="return confirm('Êtes-vous sûr de vouloir restaurer cette facture ?')" href="<?php echo site_url("facture/restaure_facture_assuree/".$l->fac_id);?>" class="text-success" title="Restaurer cette facture ?" ><i class="fa fa-history" style="font-size:20px"></i></a>
												<?php }?>
											<?php }else{?>
												<em>Aucune possible !</em>
											<?php }?>
										<?php }?>
									<?php }?>
									</td>
								</tr>
								<?php  }?>
							<?php } ?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>