
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<section class="content home">
    <div class="container-fluid">
      
        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Notifictaions <small>Vous trouveriez ici l'ensemble de toutes les activités de l'application </small> </h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                          <table id="example" class="table table-striped">
                            <thead>
                              <tr> 
								<th style="width:90px" class="text-center">Date</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Action</th>
                                <th style="width:150px">Détail</th>
                              </tr>
                            </thead>
                            <tbody>
							<?php $noti=$this->md_rapport->listNotifications(); foreach($noti AS $n){ ?>
                              <tr>
								<td class="text-center"><?php echo $this->md_config->affDateTimeFr($n->log_dDate);?></td>
                                <td>
									<?php
										if(!is_null($n->per_sAvatar)){
											echo "<img src='".base_url($n->per_sAvatar)."' width='67' height='60'/>";
										}
										else{
											echo "<img src='".base_url("assets/images/inconnu.jpg")."' width='67' height='60'/>";
										}
									?>
								</td>
                                <td>
									<?php
										if(!is_null($n->per_sNom)){
											echo $n->per_sNom.' '.$n->per_sAutresNoms;
										}
										else{
											echo "Inconnu(e)";
										}
									?> 
								</td>
                                <td>
									<?php
										if(!is_null($n->per_sPrenom)){
											echo $n->per_sPrenom.' '.$n->per_sAutresPrenoms;
										}
										else{
											echo "Inconnu(e)";
										}
									?> 
								</td>
								<td>
									<?php  ?>
									<span class="label label-<?php
										if($n->log_sIcone == "nouveau membre"){
											echo 'success';
										}
										else if($n->log_sIcone == "achat"){
											echo 'info';
										}
										else if($n->log_sIcone == "suppression"){
											echo 'danger';
										}
										else if($n->log_sIcone == "modification"){
											echo 'orange';
										}
										else if($n->log_sIcone == "commentaire post"){
											echo 'default';
										}
										else if($n->log_sIcone == "modification compte"){
											echo 'success';
										}
										else if($n->log_sIcone == "connexion"){
											echo 'success';
										}
										else if($n->log_sIcone == "déconnexion"){
											echo 'warning';
										}
										else if($n->log_sIcone == "connexion échouée"){
											echo 'danger';
										}
									?>"><?php echo $n->log_sIcone;  ?></span> 
								
								</td>
                                <td>
									<?php 
										if(is_null($n->log_sActionDetail)){
											echo $n->log_sAction;
										}
										else{
											echo $n->log_sActionDetail; 
										}
										?>
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
</section>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>