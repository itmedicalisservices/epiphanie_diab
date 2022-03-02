
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_recette->liste_compte_recette(); ?>
<?php $montant = $this->md_budget->montant_lib_sous_compte(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			<!--<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>ETAT DES RECETTES</h2>
						
					</div>
					<div class="body">
						<form id="form-recher-fonc">
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
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="cherFonc">Chercher</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	-->
            <div class="col-lg-12 col-md-12 col-sm-12" id="afficheRech">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">RECETTES</h2>
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="">
							<thead>
								<tr>
									<th>N° DE COMPTE</th>
									<th>DESIGNATION</th>
								</tr>
							</thead>
							<tbody>
							<?php $som=0; foreach($liste AS $l){ ?>
								<tr>
									<td>
										<strong><?=$l->cpt_iNumero;?></strong>
									</td>
									<td>
										<strong><?php 
													$rep = $this->md_recette->recup_recette($l->cpt_id);
												?>
											<table class=" " id="" style="width:100%">
											<tbody>
												<?php if($rep==false){echo '<tr><td colspan="2"><em>Aucun libellé disponible</em></td></tr>';}else{  foreach($rep AS $r){?>
												<tr>
													<td style="width:40%"><?=$r->rec_sLibelle;?></td>
													<?php $rectt = $this->md_recette->recup_mouvement_recette($r->rec_id); ?>
													<td style="width:30%" align="center"><?php if($rectt==NULL){echo'<em>aucune action effectuée</em>';}else{ echo substr($rectt->mor_dDate,5,2).'-'.substr($rectt->mor_dDate,0,4);}; ?> </td>
													<td style="width:30%" align="center"><?php if($rectt==NULL){echo'<em>aucune action effectuée</em>';}else{ echo number_format($rectt->mor_iMontant ,0,",",".").'Fcfa';}; ?> </td>
													<?php if($user->per_iTypeCompte!=26){?>
													<td align="center">
														<a href="<?php echo site_url("recette/recette_courante/".$r->rec_id); ?>" class="btn bg-blue-grey waves-effect btn-sm" style="color:#fff">Opération</a>
													</td>
													<?php }?>
												</tr>
												<?php }?>
												<?php }?>
											</tbody>
											</table>
										</strong>
									</td>									
								</tr>
							<?php } ?>
							</tbody>
						<!--	<tfoot>
								<tr>
									<td colspan=""><strong>TOTAL DEPENSES</strong></td>
									<td align="right" colspan=""><strong><?php //echo number_format($som,0,",","."); ?>  Fcfa</strong></td>
								</tr>
							</tfoot>-->
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>