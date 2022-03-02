
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_patient->compteur_caisse($this->session->diabcare,date("Y-m-d")); ?>
<?php $lannulation = $this->md_patient->recup_facture_annulee(); ?>

<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>LISTE DES FACTURES ANNULÉES</h2>
            <small class="text-muted"></small>
        </div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>DÉFINIR UNE PLAGE DE RECHERCHE</h2>
						
					</div>
					<div class="body">
						<form id="form-rapportannul">
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

								<div class="col-sm-3">
									<div class="form-group drop-custum">
									<label>* Type d'Actes</label>
										<select name="acte" class="form-control obligatoire show-tick">
											<option value="">Tous</option>
											<!--<option value="0">Actes Médicaux</option>
											<option value="1">Frais Divers</option>-->
										</select>
									</div>
								</div>
	
								<div class="col-sm-3">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="valrapport">Valider</button>
									
								</div>
							</div>
						</form>
						<span class="retourrapport"></span>
					</div>
				</div>
			</div>
		</div>
		
		 <div class="row clearfix" id="afficherapport">

			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px;">
						   <?php //var_dump($lannulation);?>
							<thead>
								<tr align="center">
									<td><b>N°Facture(Opération)</b></td>
									<td><b>Date & Heure</b></td>
									<td><b>Type Opération</b></td>
									<td><b>Montant (<small>FCFA</small>)</b></td>
									<td><b>Effectuée par:</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php $somcumul=0; if(empty($lannulation)){echo '<tr><td colspan="5"><em>Merci de définir une plage de recherche</em></td></tr>';}else{ foreach($lannulation AS $m){ ?>
								<tr align="center">
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
										<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6"){echo ' ('.$m->fac_sNumero.')';};?></b> 
									</td>
									<td>
										<b><?php if($m->fac_sObjet=="6"){echo number_format(abs($m->fac_iRemise),0,",",".");}else{ echo number_format($m->fac_iMontantPaye,0,",",".");}; ?></b>
									</td>									
									<td>
										<b><?php $pers = $this->md_personnel->recup_personnel($m->per_id); echo $pers->per_sNom.' '.$pers->per_sPrenom; ?></b>
									</td>
								</tr>
							<?php if($m->fac_sObjet=="6"){$somcumul +=abs($m->fac_iRemise);}else{$somcumul +=$m->fac_iMontantPaye;};}}  ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="right" colspan="3"><b style="font-weight:900">TOTAL: </b></td>
									<td align="center" colspan=""><b style="font-weight:900"><?php echo number_format($somcumul,0,",","."); ?></b></td>
									<td align="right" colspan=""><b style="font-weight:700"></b></td>
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