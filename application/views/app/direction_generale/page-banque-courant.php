
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $banque = $this->md_banque->recup_banque_courant($id); ?>
<?php $liste = $this->md_banque->liste_mouvement_actifs($id); ?>
<?php $solde = $this->md_banque->solde_banque($id); ?>
<?php $sol = $this->md_banque->solde_banque_courant($id); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			<?php //var_dump($sol);?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="">
							<thead>
								<tr>
									<th><img src="<?php echo base_url($banque->bnq_sLogo);?>" style="width:100px;heigh:auto" class="img-fluid" alt=""></th>
									<th><b><?php echo $banque->bnq_sEnseigne ;?></b></th>
									<th><b>SOLDE</b><br><b style="font-size:30px"><?php echo number_format($banque->bnq_iMontant,0,",",".");?> Fcfa</b></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
                    </div>  
					
                    <div class="header">
						<button style="width:14%" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-left" style="color:#fff">
							<i class="fa fa-plus"></i> 
							<b>Dépot</b>
						</button>						
						<button style="width:14%" type="button" class="btn bg-blue-grey waves-effect retrait pull-left" style="color:#fff">
							<i class="fa fa-minus"></i> 
							<b>Retrait</b>
						</button>											
                    </div>	
                </div>	
            </div>	
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>États des mouvements bancaires et leurs justificatifs</h2>
						
					</div>
					<div class="body">
						<form id="form-recherche">
							<div class="row clearfix">
								<div class="col-sm-3">
									<div class="form-group">
										Du<input type="text" name="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										Au<input type="text" name="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="form-group drop-custum">
										<label>Type mouvement</label>
										<select name="mouvement" class="form-control obligatoire show-tick">
											<option value="">-- Sélectionner --</option>
											<option value="1">dépot</option>
											<option value="0">retrait</option>
											<option value="2">tous</option>
										</select>
										<input type="hidden" name="idBnq" value="<?php echo $banque->bnq_id ;?>"/>
									</div>
								</div>
	
								<div class="col-sm-3">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="chercher">Chercher</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des dix (10) derniers mouvements</h2>
                    </div>
                    <div class="body table-responsive" id="afficheRecherche"> 
						<table class="table table-bordered table-striped table-hover " id="example">
							<thead>
								<tr>
									<th>Date Opération</th>
									<th>Solde</th>
									<th>Justificatif</th>
									<th>Motif</th>
									<th>Mouvement</th>
									<th>Effectuée par </th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($liste AS $l){?>
								<tr>
									<td><?php echo $this->md_config->affDateFrNum($l->mvt_dDateOper) ;?></td>
									<td><?php echo number_format($l->mvt_iMontant,0,",",".");?> Fcfa</td>
									<td>
										<?php if($l->mvt_sFichier==NULL){echo'Non renseigné';}else{echo"<a href='".base_url($l->mvt_sFichier)."' target='_blank'><strong><i class='fa fa-download'></i> Télécharger</strong></a>";}?>
									</td>
									<td>
										<?php if($l->mvt_sMotif==NULL){echo 'Non renseigné';}else{ echo nl2br($l->mvt_sMotif); };?>
									</td>
									<td>
										<?php if($l->mvt_iType==1){
											echo '<span style="color:green">dépôt <i class="fa fa-arrow-left"></i></span>';
										}else{
											echo '<span style="color:red">retrait <i class="fa fa-arrow-right"></i></span>';
										}?>
									</td>
									<td><strong><?php echo $l->per_sNom.' '.$l->per_sPrenom;?></strong></td>
								</tr>																
							<?php }?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Large Size -->
<div class="modal fade" id="largeMod" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Effectuer un nouveau retrait</h2>
						</div>
						<div class="body table-responsive">
							<div class="col-lg-12 col-md-12 col-sm-12 retour-retrait"></div>
							<form id="form-retrait">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Montant à retier *</th>
											<th style="width:48%">Joindre un justificatif *</th>
										</tr>
										<tr>
											<td>
												<input type="number" min="0" name="montant" class="obligatoire montant" style="width:100%"  placeholder=""/>
												<input type="hidden" name="id" value="<?php echo $banque->bnq_id ;?>"/>
											</td>											
											<td>
												<input type="file" name="justificatif" class="justificatif" style="width:100%"  placeholder=""/>
											</td>
										</tr>										
										<tr>
											<td colspan="2">
												<label style="color:#000"><b>Motif de l'opération *</b></label>
												<textarea style="width:100%" rows="4" name="motif" class="motif"></textarea>
											</td>											
										</tr>
									</thead>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
            <div class="modal-footer">
                <a href="javascript:();" class="btn btn-success waves-effect addRtrait" style="color:#fff"><i class="fa fa-check"></i> Valider</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Effectuer un nouveau dépot</h2>
						</div>
						<div class="body table-responsive">
							<div class="col-lg-12 col-md-12 col-sm-12 retour-depot"></div>
							<form id="form-depot">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Montant à déposer *</th>
											<th style="width:48%">Joindre un justificatif *</th>
										</tr>
										<tr>
											<td>
												<input type="number" min="0" name="montant" class="obligatoire montant" style="width:100%"  placeholder=""/>
												<input type="hidden" name="id" value="<?php echo $banque->bnq_id ;?>"/>
											</td>											
											<td>
												<input type="file" name="justificatif" class="justificatif" style="width:100%"  placeholder=""/>
											</td>
										</tr>										
										<tr>
											<td colspan="2">
												<label style="color:#000"><b>Motif de l'opération</b></label>
												<textarea style="width:100%" rows="4" name="motif" class=" motif"></textarea>
											</td>											
										</tr>
									</thead>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
            <div class="modal-footer">
                <a href="javascript:();" class="btn btn-success waves-effect addDepot" style="color:#fff"><i class="fa fa-check"></i> Valider</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>