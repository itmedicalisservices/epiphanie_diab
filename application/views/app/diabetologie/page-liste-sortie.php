<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	
	$listeEncours = $this->md_patient->liste_hospitalisation2();
	
 ?>
<section class="content home">
    <div class="container-fluid"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des patients en hospitalisation</h2>
							</div>
							<div class="body table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Date de Naissance</th>
											<th>Localisation</th>
											<th>disposition</th>
											<th>Début d'hospitalisation</th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo $le->pat_sMatricule; ?></td>
											<td><?php echo $le->pat_sNom; ?></td>
											<td><?php echo $le->pat_sPrenom; ?></td>
											<td><?php echo $le->pat_dDateNaiss; ?></td>
											<td>
												Service : <b><?php echo $le->ser_sLibelle; ?></b><br>
												Unité :<b><?php echo $le->uni_sLibelle; ?></b><br>
												<?php echo $le->cha_sLibelle; ?><br>
												<?php echo $le->lit_sLibelle; ?>
											</td>
											<td><?php echo $le->hos_sType; ?></td>
											<td class="text-center"><?php echo $this->md_config->affDateFrNum($le->hos_dDate);?></td>
											<td class="text-center">
												
												<a href="javascript:()" rel="<?php echo $le->hos_id; ?>" data-toggle="modal" data-target="#fin_hos" class="btn btn-danger fin_hos" style="color:white; font-size:11px"><i class="fa fa-remove"></i> Fin de l'hospitalisation</a>
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
            
            <div role="tabpanel" class="tab-pane page-calendar" id="sales">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
			
                    </div>
                </div>
            </div>  
			
            <div role="tabpanel" class="tab-pane page-calendar" id="sales2">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
			
                     
                    </div>
                </div>
            </div>  
			
			


        </div>
    </div>

	
</section>



<div class="modal fade" id="fin_hos"  role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="" id="defaultModalLabel">HOSPITALISATION</h4>
			</div>
			<div class="modal-body">
				<!--A modifier-->
				<form id="fin-hos">
					
				</form>
				<!--A modifier-->
				<form id="motif-fin">
					<div class="form-group">
						<label class="text-left">Motif de fin d'hospitalisation</label>
						<select name="motif" class="form-control obligatoire" style="border:1px solid black">
							<option value="">------- Choisir -------</option>
							<option value="1">Sotrie Normal</option>
							<option value="2">Sortie contre avis du medicale</option>
							<option value="3">Référés en sortie</option>
							<option value="4">Transferer à la sortie</option>
							<option value="5">Evasions</option>
							<option value="6">Evacués</option>
							<option value="7">Décès</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success waves-effect" style="color:#fff" onClick="var finHos = confirm('Voulez-vous mettre fin à l\'hospitalisation du patient ?'); if(finHos){finHospitalisation();}" > Fin d'hospitalisation</button>
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Annuler</button>
			</div>
		</div>
	</div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>