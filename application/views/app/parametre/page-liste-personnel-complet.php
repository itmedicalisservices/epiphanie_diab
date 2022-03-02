<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_personnel-> nb_complete_personnel(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>LISTE COMPLÈTE DU PERSONNEL (<?php echo count($liste) ;?>)</h2>
                        
                    </div>
                    <div class="body table-responsive">
                        <table id="example" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>N° Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Direction</th>
                                    <th>Domaine</th>
									<th>Spécialiste en</th>
                                    <th>Téléphone</th>
                                    
                                    <th style="width:60px">Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td><?php echo $l->per_sMatricule; ?></td>
									<td><?php echo $l->per_sNom; ?></td>
									<td><?php echo $l->per_sPrenom; ?></td>
									<td><?php echo $l->dep_sLibelle; ?></td>
									<td><?php echo $l->pst_sLibelle; ?></td>
									<td><?php echo $l->spt_sLibelle; ?></td>
									<td><?php echo $l->per_sTel; ?></td>
									<td align="center">
										<a href="<?php echo site_url("parametre/editer/".$l->per_id); ?>" class="" title="Attribuer un nouveau mot de passe"><i class="fa fa-edit" style="font-size:20px"></i></a> 
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

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>