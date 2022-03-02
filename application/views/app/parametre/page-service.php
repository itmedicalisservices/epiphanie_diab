
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeDirect = $this->md_personnel->liste_departements_actifs(); ?>
<?php //$liste = $this->md_parametre->liste_services_actifs(); ?>
<?php $lflt = $this->md_parametre->liste_fonctionnalite_actifs(); ?>
<?php 
	$articleParPage = 30;
	
	/* Personnel medical */
	$articleTotaux  = count($this->md_parametre->nb_services_actifs());
	$pagesTotales  = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle  = $_GET['page'];
	}else{
		$pageActuelle  = 1;
	}
	
	
	$liste = $this->md_parametre->liste_services($articleParPage,$pageActuelle);


 ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des services de l'hôpital (<?php echo $articleTotaux ;?>)</h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Ajouter un nouveau</b></button>
                        <br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
                    </div>
                    <div class="body table-responsive" style="overflow:auto;height:500px">
						<table class="table table-bordered table-striped table-hover " id="">
						   
							<thead>
								<tr>
									<th>Désignation du service</th>
									<th>Direction</th>
									<th>Fonctionnalité</th>
									<th style="width:10%">Action</th>
								</tr>
							</thead>
						   
							<tbody id="service_table">
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<span class="champs_ser<?php echo $l->ser_id ?>"><?php echo $l->ser_sLibelle; ?></span>
										<form id='form-edit-ser<?php echo $l->ser_id ?>'>
											<textarea class="cacher input_ser<?php echo $l->ser_id ?>" style='width:100%' name='lib'><?php echo $l->ser_sLibelle; ?></textarea>
											<input type="hidden" value="<?php echo $l->ser_id ?>" name="id"/>
											<input type="hidden" value="<?php echo $l->ser_sLibelle ?>" name="nom"/>
										</form>
									</td>
									<td>
										<span class="champs_dep<?php echo $l->ser_id ?>"><?php echo $l->dep_sLibelle; ?></span>
										<form id='form-edit_dep<?php echo $l->ser_id ?>'>
											<select class="cacher input_dep<?php echo $l->ser_id ?>" name="dep" style="width:100%;padding-bottom:10px;padding-top:10px">
												<?php foreach($listeDirect AS $d){ ?>
												<option value="<?php echo $d->dep_id; ?>-/-<?php echo $d->dep_sLibelle; ?>" <?php if($d->dep_id == $l->dep_id){echo "selected='selected'";} ?>><?php echo $d->dep_sLibelle; ?></option>
												<?php } ?>
											</select>
										</form>
									</td>									
									<td>
										<span class="champs_flt<?php echo $l->ser_id ?>"><?php echo $l->flt_sLib; ?></span>
										<form id='form-edit_flt<?php echo $l->ser_id ?>'>
											<select class="cacher input_flt<?php echo $l->ser_id ?>" name="flt" style="width:100%;padding-bottom:10px;padding-top:10px">
												<?php foreach($lflt AS $f){ ?>
												<option value="<?php echo $f->flt_id; ?>-/-<?php echo $f->flt_sLib; ?>" <?php if($f->flt_id == $l->flt_id){echo "selected='selected'";} ?>><?php echo $f->flt_sLib; ?></option>
												<?php } ?>
											</select>
										</form>
									</td>
									<td class="text-center">
										<a href="javascript:();" rel="<?php echo $l->ser_id; ?>" class="editServiceFinal confirm_ser<?php echo $l->ser_id; ?> cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
										<a href="javascript:();" rel="<?php echo $l->ser_id; ?>" class="editServiceAnnule annule_ser<?php echo $l->ser_id; ?> text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
										<a href="javascript:();" rel="<?php echo $l->ser_id; ?>" class="editService clique_ser<?php echo $l->ser_id; ?>" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;
										<a onClick="return confirm('Êtes-vous sûr de supprimer ce service ?')" href="<?php echo site_url("parametre/supprimer_service/".$l->ser_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
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
									 <li class="page-item"><a class="page-link" href="<?php echo site_url("parametre/service");?>/?page=<?=$i?>"><?=$i?></a></li>
									<?php } } ?>
								</ul>
							</div>
						</div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Ajoutez des nouveaux services à l'hôpital</h2>
							
						</div>
						<div class="body table-responsive">
							<form id="form-ser">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Désignation du service</th>
											<th style="width:48%">Direction</th>
											<th style="width:48%">Fonctionnalité</th>
											<th style="width:60px"  class="text-center"><i class="fa fa-wrench"></i></th>
										</tr>
										<tr>
											<td>
												<input type="text" id="lib" style="width:100%" placeholder="Saisissez le nom du service dans ce champs"/>
												
											</td>
											<td>
												<select id="dep" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez la direction du service * -----</option>
													<?php foreach($listeDirect AS $d){ ?>
													<option value="<?php echo $d->dep_id; ?>-/-<?php echo $d->dep_sLibelle; ?>"><?php echo $d->dep_sLibelle; ?></option>
													<?php } ?>
												</select>
											</td>											
											<td>
												<select id="flt" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez la fonctionnalité * -----</option>
													<?php foreach($lflt AS $f){ ?>
													<option value="<?php echo $f->flt_id; ?>-/-<?php echo $f->flt_sLib; ?>"><?php echo $f->flt_sLib; ?></option>
													<?php } ?>
												</select>
											</td>
											<td class="text-center">
												<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addSer"><i class="fa fa-plus"></i></a>
											</td>
										</tr>
									</thead>
								   
									<tbody id="tbody"></tbody>
								</table>
							</form>
							
						</div>
					</div>
				</div>
			
			</div>
            <div class="modal-footer">
                <a href="javascript:();" class="btn btn-success waves-effect addSer" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finish" id="finish">BLUE GREY</button>
<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE DES RESSOURCES HUMAINES</h4>
            </div>
            <div class="modal-body text-center"> Service(s) enregisté(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
    <script>
    $( document ).ready(function() {
        // console.log( "document loaded" );
		$('#search').keyup(function(){
			search_table($(this).val());
		});
		
		function search_table(value){
			$('#service_table tr').each(function(){
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
    <script type="text/javascript">
        'use strict';
		
        var listeSer = document.querySelector('#tbody');
        var addSer = document.querySelector('#addSer');
        var annuaire;
        annuaire = new Array();

        function removeSer(index) {
            annuaire.splice(index,1);
            showListeSer();	
        }

        function addDetailSer() 
        {
            var lib 	            = document.getElementById('lib').value;
            var dep 	            = document.getElementById('dep').value;
            var flt 	            = document.getElementById('flt').value;
            if(lib == '' || dep == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contact = new Object();
                contact.lib	        = lib;
                contact.dep	        = dep;
                contact.flt	        = flt;
                annuaire.push(contact);
                showListeSer();	
				document.getElementById('lib').value="";
            }
        }

        addSer.addEventListener('click', addDetailSer);

        function showListeSer() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
				
				var tabDep = annuaire[i].dep.split("-/-");
				var tabFlt = annuaire[i].flt.split("-/-");
				
                contenu += '<tr>';
                contenu += '<td><input type="hidden" name="lib[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
                contenu += '<td><input type="hidden" name="dep[]" value="'+ tabDep[0]+'"/>' + tabDep[1] + '</td>';
                contenu += '<td><input type="hidden" name="flt[]" value="'+ tabFlt[0]+'"/>' + tabFlt[1] + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeSer(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeSer.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>