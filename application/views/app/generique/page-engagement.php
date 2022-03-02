
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_patient->engagement_a_payer(); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des engagement à payer </h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_unite pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Ajouter un nouveau</b></button>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover">
						   
							<thead>
								<tr>
									<th>Nom</th>
									<th>Prénom</th>
									<th>date</th>
									<th>Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<?php echo $l->enp_sNom; ?>
									</td>
									<td>
										<?php echo $l->enp_sPrenom; ?>
									</td>
									<td>
										<?php echo $this->md_config->affDateFrNum($l->enp_dDate); ?>
									</td>
									<td>
										<a href="<?php echo site_url("impression/engagement/".$l->enp_id); ?>"><i class="fa fa-print" style="font-size:20px"></i></a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:10px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Ajoutez un nouvel engagement à payer</h2>
							
						</div>
						
						<form id="form-eng" action="<?php echo site_url("document/ajoutEngagement"); ?>" method="POST">
						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-12 retour"></div>
								<div class="col-sm-6">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="nom" class="form-control obligatoire" placeholder="Nom(s) *">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="prenom" class="form-control" placeholder="Prénom(s)">
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-group">
											<div class="form-line">
												<textarea rows="4" name="adresse" class="form-control no-resize" placeholder="Adresse complète..."></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group drop-custum">
										<select name="pour" class="form-control obligatoire show-tick eng">
											<option value="">-- Engagement pour * --</option>
											<option value="moi">Moi même</option>
											<option value="autre">Une tièrce personne</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4 cacher" id="divnom">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="nomP" id="nomP" class="form-control" placeholder="Nom(s) *">
										</div>
									</div>
								</div>
								<div class="col-sm-5 cacher" id="divprenom">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="prenomP" id="prenomP" class="form-control" placeholder="Prénom(s)">
										</div>
									</div>
								</div>
							</div>
							
							<div class="row clearfix">
								
								<div class="col-sm-12 cacher" id="divparente">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="parente" id="parente" class="form-control" placeholder="Lien de parenté">
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-group">
											<div class="form-line">
												<textarea rows="4" name="adresseP" class="form-control obligatoire no-resize" placeholder="Adresse du malade à la sortie..."></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			
			</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect addEngagement" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
			</form>
							
        </div>
    </div>
</div>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>