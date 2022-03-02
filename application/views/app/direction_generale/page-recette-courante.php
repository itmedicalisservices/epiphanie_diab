
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $rec = $this->md_recette->recup_recette_courante($id); ?>
<?php $liste = $this->md_recette->liste_mouvement_recette($id); ?>
<?php //$montant = $this->md_fonctionnement->montant_fonctionnement($id); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			<?php //var_dump($fonc);?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="">
							<thead>
								<tr>
									<th><b><?php echo $rec->rec_sLibelle ;?></b></th>
									<!--<th><b>CUMUL</b><br><b style="font-size:30px"><?php //echo number_format($montant->montant,0,",",".");?> Fcfa</b></th>-->
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
                    </div>  
					
                    <div class="header">
						<button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-left" style="color:#fff">
							<i class="fa fa-plus"></i> 
							<b>Ajouter</b>
						</button>																
                    </div>	
                </div>	
            </div>	
			<!--<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>ÉTATS DES DÉPENSES</h2>
						
					</div>
					<div class="body">
						<form id="form-recherche-dep">
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
								<input type="hidden" name="id" value="<?php// echo $rec->rec_id;?>" class="">
	
								<div class="col-sm-3">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="chercherDepenses">Chercher</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		-->
			<div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des recettes</h2>
                    </div>
                    <div class="body table-responsive" id="afficheRecherche"> 
						<table class="table table-bordered table-striped table-hover " id="example">
							<thead>
								<tr>
									<th>Date Opération</th>
									<th>Montant</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($liste AS $l){?>
								<tr>
									<td><?php echo substr($l->mor_dDate,5,2).'-'.substr($l->mor_dDate,0,4) ;?></td>
									<td><?php echo number_format($l->mor_iMontant,0,",",".");?> Fcfa</td>
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
							<h2></h2>
						</div>
						<div class="body table-responsive">
							<div class="col-lg-12 col-md-12 col-sm-12 retour-recette"></div>
							<form id="form-recette">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Montant *</th>
											<th style="width:48%">Mois *</th>
										</tr>
										<tr>
											<td>
												<input type="number" min="0" name="montant" class="obligatoire montant" style="width:100%"  placeholder=""/>
												<input type="hidden" name="id" value="<?php echo $rec->rec_id ;?>"/>
											</td>			
											<td>
												<select style="width:100%;height:30px" name="mois" class="obligatoire">
													<option value="-01-" <?php if(date('m')=="01"){echo'selected="selected"';};?>>Janvier</option>
													<option value="-02-" <?php if(date('m')=="02"){echo'selected="selected"';};?>>Février</option>
													<option value="-03-" <?php if(date('m')=="03"){echo'selected="selected"';};?>>Mars</option>
													<option value="-04-" <?php if(date('m')=="04"){echo'selected="selected"';};?>>Avril</option>
													<option value="-05-" <?php if(date('m')=="05"){echo'selected="selected"';};?>>Mai</option>
													<option value="-06-" <?php if(date('m')=="06"){echo'selected="selected"';};?>>Juin</option>
													<option value="-07-" <?php if(date('m')=="07"){echo'selected="selected"';};?>>Juillet</option>
													<option value="-08-" <?php if(date('m')=="08"){echo'selected="selected"';};?>>Août</option>
													<option value="-09-" <?php if(date('m')=="09"){echo'selected="selected"';};?>>Septembre</option>
													<option value="-10-" <?php if(date('m')=="10"){echo'selected="selected"';};?>>Octobre</option>
													<option value="-11-" <?php if(date('m')=="11"){echo'selected="selected"';};?>>Novembre</option>
													<option value="-12-" <?php if(date('m')=="12"){echo'selected="selected"';};?>>Décembre</option>
												</select>
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
                <a href="javascript:();" class="btn btn-success waves-effect addRec" style="color:#fff"><i class="fa fa-check"></i> Valider</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>