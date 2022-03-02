
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php
$liste = $this->md_patient->liste_mouvement_caisse_facture($this->session->diabcare,date("Y-m-d"),date("Y-m-d"),0,0); 
$premier=date("Y-m-d");
$dernier=date("Y-m-d");
$data1=0;
$data2=0;
?>

<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>JOURNAL DE CAISSE PAR N° FACTURE</h2>
            <small class="text-muted"></small>
        </div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>DÉFINIR UNE PLAGE DE RECHERCHE</h2>
						
					</div>
					<div class="body">
						<form id="form-rechmouvement">
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

								<div class="col-sm-2">
									<div class="form-group drop-custum">
									<label>* Type d'Actes</label>
										<select name="acte" class="form-control obligatoire show-tick">
											<option value="2">Tous les actes</option>
											<option value="0">Actes médicaux</option>
											<option value="1">Frais/actes Divers</option>
										</select>
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group drop-custum">
									<label>* Type de mouvement</label>
										<select name="jrnal" class="form-control obligatoire show-tick">
											<option value="0">Journal de caisse</option>
											<option value="1">Journal des encais.</option>
										</select>
									</div>
								</div>
	
								<div class="col-sm-2">
								<br><br>
									<button type="button" class="btn btn-raised bg-blue-grey" id="valmouv">Valider</button>
									
								</div>
							</div>
						</form>
						<span class="retourmvt"></span>
					</div>
				</div>
			</div>
		</div>
		
		 <div class="row clearfix" id="affichemvt">

			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px;">
						   
							<thead>
								<tr align="center">
									<td>
										<a title="Imprimer tous les mouvements" href="<?php  echo site_url("impression/mouvement_caisse_facture/".$this->session->diabcare."/".$premier."/".$dernier."/".$data1."/".$data2);?>" class="btn btn-sm btn-raised bg-blue-grey" style="color:white;font-size:13px"><i class="fa fa-print"></i>  mouvements (<?php echo count($liste);?>)</a>
									</td>
									<td colspan="5"><!--<input type="text" class="form-control" placeholder="Recherche ..." />--></td>
								</tr>	
								<tr align="center">
									<td><b>Ordre</b></td>
									<td><b>N°Facture(Opération)</b></td>
									<td><b>Date & Heure</b></td>
									<td><b>Type Opération</b></td>
									<td><b>Montant (<small>FCFA</small>)</b></td>
									<td><b>Actions</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php $cpt = 1;$somcumul = 0; if(empty($liste)){echo '<tr><td colspan="6"><em>Aucune donnée disponible</em></td></tr>';}else{ foreach($liste AS $m){ ?>
								<tr align="center" <?php if($m->fac_sObjet=="8" || $m->fac_sObjet=="6"){echo' style="background:pink"';}?><?php if($m->fac_sObjet=='2'){echo' style="display:none"';}?>>
									<td>
										<b><?php echo $cpt; ?></b>
									</td>									
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
										<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6" || $m->fac_sObjet=="8"){echo ' ('.$m->fac_sNumero.')';};?></b> 
									</td>
									<td>
										<b>
											<?php 
												if($m->fac_sObjet=="6"){
													echo number_format($m->fac_iRemise,0,",",".");
												}elseif($m->fac_sObjet=="10"){
													echo number_format($m->fac_iEx,0,",",".");
												}elseif($m->fac_sObjet=="9"){
													echo number_format($m->fac_iDef,0,",",".");
												}
												else{ 
													echo number_format($m->fac_iMontantPaye,0,",",".");
												}
											;?>
										</b>
									</td>
									<td class="text-center">
										<?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){?>
										
											<a href="<?php echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:16px"></i></a> &nbsp;&nbsp;
											<?php if($m->fac_sObjet!="5"){?>
											<a href="<?php echo site_url("facture/detail/".$m->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:16px"></i></a>
											<?php }?>
										<?php }?>
									</td>
								</tr>
							<?php $somcumul = $somcumul +$m->fac_iMontantPaye ;}}  ?>
							</tbody>
							<tfoot>
								<tr>
									<td align="right" colspan="4"><b style="font-weight:700">TOTAL: </b></td>
									<td align="center" colspan=""><b style="font-weight:700"><?php echo number_format($somcumul,0,",","."); ?></b></td>
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