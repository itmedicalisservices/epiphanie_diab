<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_chirurgie->tableau_panning_operation(); ?>
<?php $planing = $this->md_patient->panning_operation(); 
$odij = date("Y-m-d"); $heure = date("H:i:s");?>
<section class="content page-calendar">
		<div class="row clearfix">
			<div class="col-sm-12">
				<div class="card m-t-20">
						<?php foreach($planing AS $r){?>
						<input type="hidden" name="couleurRdv" class="couleurRdv" value="<?php if($r->pop_dDate == $odij AND $r->pop_tHeureDebutOpe<=$heure){echo "b-l b-2x b-success";}elseif($r->pop_dDate == $odij AND $r->pop_tHeureDebutOpe>$heure){echo "b-l b-2x b-success bg-warning";}elseif($r->pop_dDate < $odij AND $r->pop_tHeureDebutOpe<=$heure){echo "b-l b-2x b-lightred";}elseif($r->pop_dDate < $odij AND $r->pop_tHeureDebutOpe>$heure){echo "b-l b-2x b-lightred bg-warning";}elseif($r->pop_dDate > $odij){echo "bg-cyan";} ?>"/>
						<input type="hidden" name="dateHeureRdv" class="dateHeureRdv" value="<?php echo $r->pop_dDate; ?>T<?php echo $r->pop_tHeureDebut; ?>"/>
						<input type="hidden" name="objetRdv" class="objetRdv" value="<?php echo $r->bop_sLibelle." dans la ".$r->sop_sLibelle.", opération prévue par : "; ?><?php echo $r->per_sTitre." ".$r->per_sNom." ".$r->per_sPrenom; ?> / <?php echo $r->lac_sLibelle; ?>"/>
						<?php } ?>
					<div class="body">
						<button type="button" class="btn btn-raised btn-success btn-sm m-r-0 m-t-0" id="change-view-today">Aujourd'hui</button>
						<button type="button" class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-day" >Jour</button>
						<button type="button" class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-week">Semaine</button>
						<button type="button" class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-month">Mois</button>                        
						<div id="calendar"></div>
					</div>
				</div>
			</div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Planning de l'occupation des salles d'opération</h2>  
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover">
						   
							<thead>
								<tr>
									<th>Acte</th>
									<th>Patient</th>
									<th>Salle / Bloc</th>
									<th>Equipe tech.</th>
									<th>Date</th>
									<th>Début</th>
									<th>Fin</th>
									<!--<th>Description</th>-->
									<th style="width:60px">Avis de l'anesthésiste </th>
									<th>Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<?php echo $l->lac_sLibelle; ?>	
									</td>
									<td>
										<?php echo $l->pat_sCivilite; ?> <?php echo $l->pat_sNom; ?>	<?php echo $l->pat_sPrenom; ?>	
									</td>
									<td>
										<?php echo $l->sop_sLibelle; ?>	/ <?php echo $l->bop_sLibelle; ?>
									</td>
									<td>
										<a href="javascript:();"  rel="<?php echo $l->pop_id; ?>" class="voir_modifier_equipe" title="Voir la liste">Voir <i class="zmdi zmdi-accounts-alt" style="font-size:20px"></i></a>	
									</td>
									<td>
										<?php echo $this->md_config->affDateFrNum($l->pop_dDate); ?>	
									</td>
									<td>
										<?php echo $l->pop_tHeureDebut; ?>	
									</td>
									<td>
										<?php echo $l->pop_tHeureFin; ?>	
									</td> 									
									<!--<td>
										<?php //echo $l->pop_sDescription; ?>	
									</td> -->
									<td align="center">
											<?php if($l->avs_sAvis==NULL){echo '<em>En attente</em>';}else{ echo $l->avs_sAvis;}; ?><!--<a href="javascript:();"  rel="<?php //echo $l->pop_id; ?>" class="voir_avis"><b><i class="fa fa-file-text" style="font-size:23px"></i><br>Consulter</b></a>-->
									</td> 
									<td>
									<?php if($l->avs_sAvis!=NULL){?>
										<a rel="<?php echo $l->pop_id;?>" href="javascript:void();" class="btn bg-blue-grey waves-effect btn-sm rapporOperation" title="Valider">rapport</a> 
										<a href="#<?php echo site_url("chirurgie/supprimer_operation/".$l->pop_id); ?>"  class="" title="Imprimer ce planning"><i style="font-size:20px" class="fa fa-print"></i></a>
									<?php }?>	
										<a onClick="return confirm('Êtes-vous sûr de supprimer cette opération du planning ?')" href="<?php echo site_url("chirurgie/supprimer_operation/".$l->pop_id); ?>"  class="" title="Supprimer ce planning"><i style="font-size:20px" class="fa fa-trash text-danger"></i></a>
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
<div class="modal fade" id="voirModEquipe" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Constitution de l'équipe technique</h2>
						</div>
						<div class="body table-responsive" id="modif">
							
						</div>
					</div>
				</div>
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Large Size -->
<div class="modal fade" id="voirAvis" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Avis de l'anesthésiste</h2>
						</div>
						<div class="body table-responsive" id="lire"></div>
					</div>
				</div>
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">

						<div class="body table-responsive" id="retourRapportOperation"></div>
					</div>
				</div>
			
			</div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>



<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>
