<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $sommecumul = $this->md_patient->total_encaissee($this->session->diabcare); ?>
<?php $sommecumulannulation = $this->md_patient->total_annulation_caissee($this->session->diabcare); ?>
<?php $listecaissier = $this->md_personnel->recup_personnel_caisse($this->session->diabcare); ?>
<?php $liste = $this->md_parametre->liste_cession($this->session->diabcare); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <b>DEMANDE DE CESSION </h2>
            <small class="text-muted">ÉPIPHANIE, votre application de gestion hospitalière</small>
			<a class="nav-link" href="#"> <b>SOLDE : <?php echo number_format($sommecumul->cumul + $sommecumulannulation->cumulannulation,0,",",".") ;?> FCFA</b></a>
        </div>
		
		<!-- Tabs With Custom Animations -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="body">
						<div class="row clearfix">
							<div class="col-sm-12 col-md-12 col-lg-12"> 
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">		
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="card">
													<div class="header">
														<h2>Demande de cession <small>renseignez tous les champs marqués par des (*)</small> </h2>
													</div>
													<div class="body">
														<form id="form-cession">
															<div class="row clearfix">
																<div class="col-sm-6">
																	<div class="form-group">
																		<div class="form-line">
																			<label>* Solde en caisse</label>
																			<input type="number" value="<?php echo $sommecumul->cumul + $sommecumulannulation->cumulannulation ;?>" id="cumul2" min="0" name="sommecumul" class="form-control" placeholder="" readonly>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label>* Espèces</label>
																		<div class="form-line">
																			<input type="text" min="0" name="espece2" id="espece2" class="form-control obligatoire" placeholder="">
																		</div>
																	</div>
																</div>	
															</div>
															<?php if($user->per_iCnx===0){?>
															<div class="row clearfix">																
																<div class="col-sm-12">
																	<div class="form-group">
																		<span id="repcession"></span>
																	</div>
																</div>
															</div>
															<?php }?>
															<div class="row clearfix">
																<div class="col-sm-12">
																<?php if($user->per_iCnx===0){?>
																	<button type="button" class="btn btn-raised bg-blue-grey cacher" id="cession">valider la demande</button>
																<?php }?>
																	<span class="retour-cession"></span>
																</div>
															</div>
														</form>
													</div>
												</div>												
											</div>
										</div>
									</div>
							
								</div>
							</div>   

							<div class="col-lg-12 col-md-12 col-sm-12">
								<hr>
								<hr>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="header">
										<h2 class=" pull-left">Mes cessions de caisse</h2>
									</div>
									<div class="body table-responsive"> 
										<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
											<thead>
												<tr align="center">
													<td><b>Montant En Caisse</b></td>
													<td><b>Espèces</b></td>
													<td><b>Date & Heure Demande</b></td>
													<td><b>Statut</b></td>
													<td style=""><b>Action</b></td>
												</tr>
											</thead>
											<tbody>
											
											<?php if(empty($liste)){echo '<tr><td colspan="6"><em>Aucune cession enregistrée</em></td></tr>';}else{ foreach($liste AS $l){ ?>
											<tr align="center">
												<td>
													<?php echo number_format($l->ces_iMontant,0,",","."); ?>
												</td>									
												<td>
													<?php echo number_format($l->ces_iEsp,0,",","."); ?>
												</td>													
												<td>
													<?php echo $this->md_config->affDateTimeFr($l->ces_dDate); ?>
												</td>					
												<td>
													<?php if($l->ces_iSta==0){
													echo '<em style="color:white;background:orange;font-size:16px;border-radius:30%">en attente</em>';
													}elseif($l->ces_iSta==1){
														echo '<em style="color:white;background:green;font-size:16px;border-radius:30%">validée</em>';
													}elseif($l->ces_iSta==2){echo '<em style="color:white;background:red;font-size:16px;border-radius:30%">Rejetée/Annulée</em>';
													};?>
												</td>	
												<td class="text-center">
													<?php if($l->ces_iSta==0){?>
														<a title="Cliquer ici pour annuler la demande de cession" href="javascript:;" style="font-size:18px" class="text-danger annulationcession" ><i class="fa fa-remove"></i>	</a>
													<?php }else{?><em>Aucune</em><?php } ?>
												</td>
											</tr>
											<?php }} ?>
											
											</tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Tabs With Custom Animations -->
<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finishPatient" id="finishPatient">BLUE GREY</button>
    </div>
</section>

<?php if($user->per_iCnx===1){?>
<div class="modal fade" id="cancelcession" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header" >
				<h4 class="modal-title cacher" id="opentext2" style="color:green" >VOUS AVEZ ANNULÉ LA CESSION DE VOTRE CAISSE <i class="fa fa-check"></i></h4>
                <h4 class="modal-title" id="closetext2" style="color:red">CESSION DE CAISSE EN ATTENTE DE VALIDATION</h4>
            </div>
            <div class="modal-body text-center"> Veuillez saisir votre mot de passe pour annuler la demande de cession </div>

		<form id="form-cancelcession">
			<div class="row clearfix">
				<div class="col-sm-8">
					<div class="form-group">
						<div class="form-line">
							<input type="password" style="padding-left:5%" name="pwd" class="form-control obligatoire" placeholder="  Saisissez votre mot de passe *">
						</div><span class="retour"></span>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<button type="button" class="btn btn-success waves-effect cancelcession" style="color:#fff"> Annuler</button>
					</div>
				</div>
			</div>
        </form>
		</div>
    </div>
</div>
<?php }?>
<!-- For Material Design Colors -->
<div class="modal fade" id="mdModalPatient" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE ACCUEIL</h4>
            </div>
            <div class="modal-body text-center"> Patient enregistré avec succès <br><img src="<?php echo base_url("assets/images/icons8-attendance-50.png");?>"/></div>
            <div id="refresh"></div>
        </div>
    </div>
</div>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>