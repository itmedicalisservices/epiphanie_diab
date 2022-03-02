<?php 
	
	// $listeEncours = $this->md_patient->liste_acm_encours(date("Y-m-d H:i:s"),384);
	// $listeExpire = $this->md_patient->liste_acm_expire(date("Y-m-d H:i:s"),$this->session->diabcare);
	
	$articleParPage = 700;
	
	/* tout le monde */
	$articleTotaux  = count($this->md_rapport->nb_notif());
	$pagesTotales = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle = $_GET['page'];
	}else{
		$pageActuelle = 1;
	}
	
	$liste = $this->md_rapport->listNotifications($articleParPage,$pageActuelle);
	
 ?>

<section class="content home">
    <div class="container-fluid">
      
        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Journal des opérations du logiciel <small>Vous trouveriez ici l'ensemble de toutes les activités de l'application </small> </h2>
                        <br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
                    </div>
                    <div class="body">
                        <div class="body table-responsive" style="overflow:auto;height:500px"> 
                          <table class="table table-striped">
                            <thead>
                              <tr> 
								<th style="width:20%" class="text-center">Date</th>
                                <th>Image</th>
                                <th>Nom complet</th>
                                <th style="10%">Action</th>
                                <th style="width:35%">Détail</th>
                              </tr>
                            </thead>
                            <tbody id="log_table">
							<?php  foreach($liste AS $n){ ?>
                              <tr>
								<td class="text-center"><?php echo $this->md_config->affDateTimeFr($n->log_dDate);?></td>
                                <td>
									<?php
										if(!is_null($n->per_sAvatar)){
											echo "<img style='border-radius:50%' src='".base_url($n->per_sAvatar)."' width='67' height='67'/>";
										}
										else{
											echo "<img style='border-radius:50%' src='".base_url("assets/images/inconnu.jpg")."' width='67' height='67'/>";
										}
									?>
								</td>
                                <td>
									<?php
										if(!is_null($n->per_sNom || !is_null($n->per_sPrenom))){
											echo $n->per_sNom.' '.$n->per_sAutresNoms.' '.$n->per_sPrenom.' '.$n->per_sAutresPrenoms;
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
						
						<?php if($articleTotaux >$articleParPage){ ?>
							<div class="row clearfix">
								<div class="col-sm-12 text-center">
									<ul class="pagination">
										<?php
											for($i=1;$i<=$pagesTotales;$i++){
												if($i==$pageActuelle){
										?>
										<li class="page-item active"><a class="page-link" href="javascript:();"><?=$i?></a></li>
										<?php }else{  ?>
										 <li class="page-item"><a class="page-link" href="<?php echo site_url("app");?>/?page=<?=$i?>"><?=$i?></a></li>
										<?php } } ?>
									</ul>
								</div>
							</div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>

	</div>
</section>

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
    <script>
    $( document ).ready(function() {
        // console.log( "document loaded" );
		$('#search').keyup(function(){
			search_table($(this).val());
		});
		
		function search_table(value){
			$('#log_table tr').each(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
					{
						found = 'true';
					}
				});
				if(found == 'true'){
					$(this).show();
				}else{	
					$(this).hide();
				}
			});
		}
    });
 
    // $( window ).on( "load", function() {
        // console.log( "window loaded" );
    // });
    </script>