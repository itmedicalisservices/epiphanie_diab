<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	$articleParPage = 500;
	
	/* tout le monde */
	$articleTotaux  = count($this->md_patient->nb_patients());
	$pagesTotales = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle = $_GET['page'];
	}else{
		$pageActuelle = 1;
	}
	
	$liste = $this->md_patient->liste_patients($articleParPage,$pageActuelle);
	// $liste = $this->md_patient->liste_patient();
	
	
	
	// var_dump($pms);
 ?>
 
 
 
 
<section class="content home">
    <div class="container-fluid"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des Patients (<?php echo $articleTotaux;?>)</h2>
								<br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
							</div>
							<div class="body table-responsive" style="overflow:auto;height:500px"> 
								<table  id="patient_mod_table" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:15%">N° Matricule</th>
											<th>Photo</th>
											<th style="width:20%">Nom complet</th>
											<th style="width:90px">Age</th>
											<th>Tél. 1</th>
											<th>Tél. 2</th>
											<th>Adresse</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($liste AS $l){ ?>
										<tr>
											<td><?php echo $l->pat_sMatricule; ?></td>
											<td><a href="#" class="p-profile-pix"><img src="<?php echo base_url($l->pat_sAvatar); ?>" width="40" height="40" alt="user" class="img-thumbnail img-fluid"></a></td>
											<td><a href="<?php echo site_url("patient/voir/".$l->pat_id); ?>"><?php echo $l->pat_sNom.' '.$l->pat_sPrenom; ?> </a> </td>
											<td><?php $ageAnnee= $this->md_config->ageAnnee($l->pat_dDateNaiss); if($ageAnnee>1){echo $ageAnnee." ans";}else if($ageAnnee ==1){echo $ageAnnee." an";}else{echo $this->md_config->ageMois($l->pat_dDateNaiss)." mois";} ?></td>
											<td><?php if(!is_null($l->pat_sTel)){echo $l->pat_sTel;}else{echo "<i>Non renseigné</i>";} ?></td>
											<td><?php if(!is_null($l->pat_sOtherPhone)){echo $l->pat_sOtherPhone;}else{echo "<i>Non renseignée</i>";} ?></td>
											<td><?php if(!is_null($l->pat_sAdresse)){echo $l->pat_sAdresse;}else{echo "<i>Non renseignée</i>";} ?></td>
											<td>
												<a onclick="return confirm('Confirmez-vous la suppression de ce patient ?');" href="<?php echo site_url("patient/supprimer_patient/".$l->pat_id);?>" class=""><i  style="font-size:18px" class="zmdi zmdi-delete text-danger"></i></a>
											&nbsp;&nbsp; 
												<a href="<?php echo site_url("patient/modifier/".$l->pat_id); ?>" class="" title="Modifier"><i style="font-size:18px" class="zmdi zmdi-edit"></i></a> 
											&nbsp;&nbsp;
											<a href="<?php echo site_url("patient/voir/".$l->pat_id); ?>" class="" title="Voir détails"><i style="font-size:18px" class="fa fa-eye text-success"></i></a></td>
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
											 <li class="page-item"><a class="page-link" href="<?php echo site_url("patient/liste_modifier_patient");?>/?page=<?=$i?>"><?=$i?></a></li>
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
			$('#patient_mod_table tr').each(function(){
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
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>
 
