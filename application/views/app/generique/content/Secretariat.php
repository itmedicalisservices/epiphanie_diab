
<?php 
	$listeEncours = $this->md_patient->liste_acm_encours2(date("Y-m-d H:i:s"));
 ?>
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="header">
								<h2>Prise des constantes vitales</h2>
								<br><br><input type="text" name="search2" id="search2" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
							</div>
							<div class="body table-responsive" style="overflow:auto;height:500px">
								<table id="" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Photo</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Acte médical</th>
											<!--<th>jours de consultation</th>-->
											<th style="width:60px">Action</th>
										</tr>
									</thead>
								   
									<tbody id="pconste">
									<?php foreach($listeEncours AS $le){ ?>
										<tr>
											<td><?php echo $le->pat_sMatricule; ?></td>
											<td><img src="<?php echo base_url($le->pat_sAvatar); ?>" class="img-thumbnail " alt="profile-image" width="40" height="40"></td>
											<td><?php echo $le->pat_sNom; ?></td>
											<td><?php echo $le->pat_sPrenom; ?></td>
											<td><?php echo $le->lac_sLibelle; ?></td>
											<!--<td><?php //$reste = $this->md_config->joursRestantDateTime($le->acm_dDateExp); echo $reste;?></td>-->
											<td class="text-center">
												<a href="<?php echo site_url("diabetologie/prise_cste/".$le->acm_id); ?>"><b><i class="fa fa-stethoscope" style="font-size:23px"></i><br>Effectuer</b></a>
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


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
<script>
	$( document ).ready(function(){
		$('#search2').keyup(function(){
			search_table($(this).val());
		});
		
		function search_table(value){
			$('#pconste tr').each(function(){
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

</script>