<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $sommecumul = $this->md_patient->total_encaissee($this->session->diabcare); ?>
<?php $sommecumulannulation = $this->md_patient->total_annulation_caissee($this->session->diabcare); ?>
<?php $liste = $this->md_parametre->liste_approvisionnement(); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>APPROVISIONNEMENT </h2>
            <small class="text-muted">ÉPIPHANIE, votre application de gestion hospitalière</small><a class="nav-link" href="#"> <b>SOLDE : <?php echo number_format($sommecumul->cumul + $sommecumulannulation->cumulannulation,0,",",".") ;?> FCFA</b></a>
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
											<div class="col-lg-4 col-md-4 col-sm-12">
												<div class="card">
													<div class="header">
														<h2>Approvisionnement de caisse <small>renseignez tous les champs marqués par des (*)</small> </h2>
													</div>
													<div class="body">
														<form id="form-appro">
															<div class="row clearfix">
																<div class="col-sm-12">
																	<div class="form-group">
																		<div class="form-line">
																			<label>* Montant Souhaité (Un entier)</label>
																			<input type="text" min="0" name="montant" class="form-control obligatoire" placeholder="" >
																		</div>
																	</div>
																</div>
															</div>
															<br><br><br><br>
															<div class="row clearfix">
																<div class="col-sm-12">
																	<button type="submit" class="btn btn-raised bg-blue-grey " id="appro">Demande Appro.</button>
																	<br>
																	<span class="retour-appro"></span>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>											
											<div class="col-lg-8 col-md-8 col-sm-12">
												<div class="card">
													<div class="header">
														<h2 class=" pull-left">liste mouvements appro.</h2>
													</div>
													<div class="body table-responsive"> 
														<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
														   
															<thead>
																<tr align="center">
																	<td><b>Date demande</b></td>
																	<td><b>Montant Souhaité</b></td>
																	<td><b>Montant Accordé</b></td>
																	<td><b>Statut</b></td>
																	<td style="width:60px"><b>Action</b></td>
																</tr>
															</thead>
														   
															<tbody>
															<?php if(empty($liste)){echo '<tr><td colspan="5"><em>Aucun appro. demandé</em></td></tr>';}else{ foreach($liste AS $l){ ?>
																<tr align="center">
																	<td>
																		<b><?php echo substr($this->md_config->affDateTimeFr($l->apr_dDate),2); ?></b>
																	</td>												
																	<td>
																		<?php echo number_format($l->apr_iDmd,0,",","."); ?>  
																	</td>						
																	<td>
																		<?php echo number_format($l->apr_iRep,0,",","."); ?> 
																	</td>								

																	<td>
																		<?php if($l->apr_iSta==0){echo '<em style="color:white;background:orange;font-size:16px;border-radius:30%">en attente</em>';}elseif($l->apr_iSta==1){echo '<em style="color:white;background:green;font-size:16px;border-radius:30%">validé</em>';}elseif($l->apr_iSta==2){echo '<em style="color:white;background:red;font-size:16px;border-radius:30%">Rejeté</em>';};?>
																	</td>																	

																	<td class="text-center">
																		<?php if($l->apr_iSta!=1){?>
																			<a onClick="return confirm('Êtes-vous sûr de vouloir supprimer ?')" href="<?php echo site_url("caisse/supprimer_appro/".$l->apr_id);?>" class="text-danger" title="" ><i class="fa fa-times" style="font-size:20px"></i></a>
																		<?php } ?>
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
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Tabs With Custom Animations -->
			<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finishPatient" id="finishPatient">BLUE GREY</button>
			</div>
		</section>


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