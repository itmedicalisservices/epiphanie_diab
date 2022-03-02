<?php 	
$listeApres = $this->md_patient->liste_acm_encours(date("Y-m-d H:i:s"),$this->session->diabcare);
 $liste = $this->md_chirurgie->liste_acm_anesth_encours(date("Y-m-d H:i:s"));
 ?>
<section class="content home">
    <div class="container-fluid">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>LISTE DES PATIENTS EN ATTENTE D'AVIS DE L'ANESTHÉSISTE</h2>
							</div>
							<div class="body table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Opération à réaliser</th>
											<th>Date de l'opération</th>
											<th>Heure de début</th>
											<th>Heure de fin</th>
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($liste AS $le){ ?>
										<tr>
											<td><?php echo $le->pat_sMatricule; ?></td>
											<td><?php echo $le->pat_sNom; ?></td>
											<td><?php echo $le->pat_sPrenom; ?></td>
											<td><?php echo $le->lac_sLibelle; ?></td>
											<td><?php echo $this->md_config->affDateFrNum($le->pop_dDate); ?></td>
											<td><?php echo $le->pop_tHeureDebut; ?>	</td>
											<td><?php echo $le->pop_tHeureFin; ?>	</td> 
											<td class="text-center">
												<a href="<?php echo site_url("chirurgie/consulter_anesthesiste/".$le->acm_id); ?>"><b><i class="fa fa-file-text" style="font-size:23px"></i><br>Consulter</b></a>
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
            
               
        </div>
    </div>
</section>