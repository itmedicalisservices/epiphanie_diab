
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
$liste = $this->md_patient->liste_facture_acte($this->session->diabcare,date("Y-m-d"),date("Y-m-d")); 
$premier=date("Y-m-d");
$dernier=date("Y-m-d");
?>
<?php //$liste2 = $this->md_patient->recup_acm(1651); ?>

<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>JOURNAL DE CAISSE PAR ACTE</h2>
            <small class="text-muted"></small>
        </div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>DÉFINIR UNE PLAGE DE RECHERCHE</h2>
						<?php //var_dump($liste2);?>
					</div>
					<div class="body">
						<form id="form-valmvtacte">
							<div class="row clearfix">
								<div class="col-sm-5">
									<div class="form-group">
										Du<input type="text" name="premierJour" id="premierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date debut">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Au<input type="text" name="dernierJour" id="dernierJour" class="datepicker form-control obligatoire" placeholder="Sélectionner la date fin">
									</div>
								</div>

								<!--<div class="col-sm-3">
									<div class="form-group drop-custum">
									<label>* Type d'Actes</label>
										<select name="acte" class="form-control obligatoire show-tick">
											<option value="">Tous</option>
											<option value="0">Actes Médicaux</option>
											<option value="1">Frais Divers</option>
										</select>
									</div>
								</div>-->
	
								<div class="col-sm-2">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="valmvtacte">Valider</button>
								</div>
							</div>
						</form>
						<span class="valmvtacte"></span>
					</div>
				</div>
			</div>
		</div>
		
		 <div class="row clearfix" id="affichemvtact">

			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px;">
						   
							<thead>
								<tr align="center">
									<td>
										<a title="Imprimer tous les mouvements" href="<?php echo site_url("impression/mouvement_caisse_acte/".$this->session->diabcare."/".$premier."/".$dernier);;?>" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  mouvements (<?php echo count($liste);?>)</a>
									</td>
									<td colspan="4"></td>
								</tr>	
								<tr align="center">
									<td><b>Date & Heure Opération</b></td>
									<td><b>Libellé actes</b></td>
									<td><b>Montant Encaissé (<small>FCFA</small>)</b></td>
									<td><b>Patient</b></td>
									<td><b>Provenance</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php $somcumul = 0; if(empty($liste)){echo '<tr><td colspan="6"><em>Merci de définir une plage de recherche</em></td></tr>';}else{ foreach($liste AS $m){ ?>
								<tr align="center" <?php if($m->elf_iSta==1){echo' style="background:pink"';}?>>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->elf_dDate),2); ?></b>
									</td>
									<td>
										<b><?php $acte = $this->md_patient->recup_acm($m->acm_id);echo $acte->lac_sLibelle; ?></b> 
									</td>								
									<td>
										<b><?php echo number_format($m->elf_iCout,0,",","."); ?></b> 
									</td>
									<td>
										<b><?php if($m->pat_iElf!=0){$pat = $this->md_patient->recup_patient($m->pat_iElf);echo $pat->pat_sNom.' '.$pat->pat_sPrenom.' ('.$pat->pat_sMatricule.')';}else{echo $m->loc_sElf;}; ?></b>
									</td>									
									<td>
										<b><?php $acte = $this->md_patient->recup_acm($m->acm_id);echo $acte->uni_sLibelle; ?></b>
									</td>
								</tr>
							<?php if($m->elf_iSta==0){$somcumul = $somcumul +$m->elf_iCout;} ;}}  ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="center" colspan="5"><b style="font-weight:900">TOTAL: <?php echo number_format($somcumul,0,",","."); ?> FCFA</b></td>
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