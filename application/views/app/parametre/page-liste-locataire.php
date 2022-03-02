
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_parametre->liste_locataire_actifs(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des enseignes ou personnes à contacter (<?php echo count($liste) ;?>)</h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Ajouter un nouveau</b></button>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
						   
							<thead>
								<tr>
									<th>Nom/Enseigne</th>
									<th>Tél.</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<span class="champs_ser<?php echo $l->loc_id ?>"><?php echo $l->loc_sLib; ?></span>
										<form id='form-edit-ser<?php echo $l->loc_id ?>'>
											<textarea class="cacher input_ser<?php echo $l->loc_id ?>" style='width:100%' name='lib'><?php echo $l->loc_sLib; ?></textarea>
											<input type="hidden" value="<?php echo $l->loc_id ?>" name="id"/>
											<input type="hidden" value="<?php echo $l->loc_sLib ?>" name="nom"/>
										</form>
									</td>									
									<td>
										<span class="champs_dep<?php echo $l->loc_id ?>"><?php echo $l->loc_sTel; ?></span>
										<form id='form-edit_dep<?php echo $l->loc_id ?>'>
											<textarea class="cacher input_dep<?php echo $l->loc_id ?>" style='width:100%' name='dep'><?php echo $l->loc_sTel; ?></textarea>
											<input type="hidden" value="<?php echo $l->loc_id ?>" name="id"/>
											<input type="hidden" value="<?php echo $l->loc_sTel ?>" name="nom"/>
										</form>
									</td>
									<td class="text-center">
										<a href="javascript:();" rel="<?php echo $l->loc_id; ?>" class="editLocataireFinal confirm_ser<?php echo $l->loc_id; ?> cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
										<a href="javascript:();" rel="<?php echo $l->loc_id; ?>" class="editLocataireAnnule annule_ser<?php echo $l->loc_id; ?> text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
										<!--<a href="javascript:();" rel="<?php //echo $l->loc_id; ?>" class="editLocataire clique_ser<?php //echo $l->loc_id; ?>" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;-->
										<a onClick="return confirm('Êtes-vous sûr de supprimer ?')" href="<?php echo site_url("parametre/supprimer_locataire/".$l->loc_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
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
							<h2>Ajoutez des enseignes ou personnes à contacter</h2>
							
						</div>
						<div class="body table-responsive">
							<form id="form-locataire">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:48%">Nom/Enseigne</th>
											<th style="width:48%">Tél.</th>
											<th style="width:60px"  class="text-center"><i class="fa fa-wrench"></i></th>
										</tr>
										<tr>
											<td>
												<input type="text" id="lib" style="width:100%" placeholder="Saisissez le nom"/>
											</td>											
											<td>
												<input type="text" id="dep" style="width:100%" placeholder="Saisissez le tél "/>
											</td>
											<td class="text-center">
												<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addLoc"><i class="fa fa-plus"></i></a>
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
                <a href="javascript:();" class="btn btn-success waves-effect addLoc" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
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
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">ADMINISTRATION</h4>
            </div>
            <div class="modal-body text-center"> enseigne(s) enregistée(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        'use strict';
		
        var listeLoc = document.querySelector('#tbody');
        var addLoc = document.querySelector('#addLoc');
        var annuaire;
        annuaire = new Array();

        function removeSer(index) {
            annuaire.splice(index,1);
            showListeLoc();	
        }

        function addDetailSer() 
        {
            var lib 	            = document.getElementById('lib').value;
            var dep 	            = document.getElementById('dep').value;
            if(lib == '' || dep == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contact = new Object();
                contact.lib	        = lib;
                contact.dep	        = dep;
                annuaire.push(contact);
                showListeLoc();	
				document.getElementById('lib').value="";
				document.getElementById('dep').value="";
            }
        }

        addLoc.addEventListener('click', addDetailSer);

        function showListeLoc() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
								
                contenu += '<tr>';
                contenu += '<td><input type="hidden" name="lib[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
                contenu += '<td><input type="hidden" name="dep[]" value="'+ annuaire[i].dep+'"/>' + annuaire[i].dep + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeSer(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeLoc.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>