
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeActeLabo = $this->md_parametre->liste_acts_laboratoires_actifs(); ?><!--decommenter et corriger le bug-->
<?php $liste = $this->md_parametre->liste_element_analyse_actifs(); ?>
<?php $listeType = $this->md_parametre->liste_type_examen_actifs(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Liste des elements à analyser </h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Ajouter un nouveau</b></button>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
						   
							<thead>
								<tr>
									<th>Elément à analyser</th>
									<th>Type examen</th>
									<th>Acte médical</th>
									<th>Valeur minimale</th>
									<th>Valeur maximale</th>
									<th>Unité</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
						   <?php //var_dump($liste); ?>
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<?php echo $l->ela_sLibelle; ?>
									</td>
									<td>
										<?php echo $l->tex_sLibelle; ?>
									</td>
									<td>
										<?php echo $l->lac_sLibelle; ?>
									</td>				
									<td>
										<?php echo $l->ela_iValMin; ?> 
									</td>									
									<td>
										<?php echo $l->ela_iValMax; ?> 
									</td>									
									<td>		
										<?php echo $l->ela_sUnite; ?>
									</td>									
									<td class="text-center">
										<a href="javascript:();" rel="<?php echo $l->ela_id; ?>" class="editTypeExamenFinal confirm_ser<?php echo $l->ela_id; ?> cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
										<a href="javascript:();" rel="<?php echo $l->ela_id; ?>" class="editTypeExamenAnnule annule_ser<?php echo $l->ela_id; ?> text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
										<a href="javascript:();" rel="<?php echo $l->ela_id; ?>" class="editTypeExamen clique_ser<?php echo $l->ela_id; ?>" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;
										<a onClick="return confirm('Êtes-vous sûr de supprimer cet élément ?')" href="<?php echo site_url("parametre/supprimer_element_analyse/".$l->ela_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
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
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Ajoutez les éléments à analyse</h2>
						</div>
						<div class="body table-responsive">
							<form id="form-ser">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:23%">Elément à analyser *</th>
											<th style="width:23%">Type examen *</th>
											<th style="width:23%">Acte médical *</th>
											<th style="width:200px">Valeur min *</th>
											<th style="width:200px">Valeur max *</th>
											<th style="width:200px">Unité </th>
											<th style=""  class="text-center"><i class="fa fa-wrench"></i></th>
										</tr>
										<tr>
										<?php //var_dump($liste)?>
											<td>
												<input type="text" id="lib" style="width:" placeholder=""/>
												
											</td>
											<td>
												<select id="tex" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez le type d'examen * -----</option>
													<?php foreach($listeType AS $t){ ?>
														<option value="<?php echo $t->tex_id; ?>-/-<?php echo $t->tex_sLibelle; ?>"><?php echo $t->tex_sLibelle; ?></option>
													<?php } ?>
												</select>
											</td>
											<td>
												<select id="lac" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez l'acte médical * -----</option>
													<?php foreach($listeActeLabo AS $t){ ?>
														<option value="<?php echo $t->lac_id; ?>-/-<?php echo $t->lac_sLibelle; ?>"><?php echo $t->lac_sLibelle; ?></option>
													<?php } ?>
												</select>
											</td>
											<td>
												<input type="text" id="v1" style="width:100%" placeholder=""/>
											</td>											
											<td>
												<input type="text" id="v2" style="width:100%" placeholder=""/>
											</td>
											<td>
												<input type="text" id="unite" style="width:100%" placeholder=""/>
											</td>
											<td class="text-center">
												<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addElementAnalyse"><i class="fa fa-plus"></i></a>
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
                <a href="javascript:();" class="btn btn-success waves-effect addElementAnalyse" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
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
            <div class="modal-body text-center"> element(s) analyse enregisté(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        'use strict';
		
        var listeSer = document.querySelector('#tbody');
        var addElementAnalyse = document.querySelector('#addElementAnalyse');
        var annuaire;
        annuaire = new Array();

        function removeSer(index) {
            annuaire.splice(index,1);
            showListeSer();	
        }

        function addDetailSer() 
        {
            var lib 	            = document.getElementById('lib').value;
            var lac 	            = document.getElementById('lac').value;
            var tex 	            = document.getElementById('tex').value;
            var v1 	            = document.getElementById('v1').value;
            var v2 	            = document.getElementById('v2').value;
            var unite 	            = document.getElementById('unite').value;
            if(lib == '' || tex == '' || lac == '' || v1 == '' || v2 == '') {
                alert('Veuillez renseigner tous les champs.');	
            }
            else {
                var contact = new Object();
                contact.lib	        = lib;
                contact.lac	        = lac;
                contact.tex	        = tex;
                contact.v1	        = v1;
                contact.v2	        = v2;
                contact.unite	        = unite;
                annuaire.push(contact);
                showListeSer();	
				document.getElementById('lib').value="";
				document.getElementById('v1').value="";
				document.getElementById('v2').value="";
				document.getElementById('unite').value="";
            }
        }

        addElementAnalyse.addEventListener('click', addDetailSer);

        function showListeSer() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
				
				var tabLac = annuaire[i].lac.split("-/-");
				var tabTex = annuaire[i].tex.split("-/-");
				
                contenu += '<tr>';
				contenu += '<td><input type="hidden" name="lib[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
                contenu += '<td><input type="hidden" name="tex[]" value="'+ tabTex[0]+'"/>' + tabTex[1] + '</td>';
                contenu += '<td><input type="hidden" name="lac[]" value="'+ tabLac[0]+'"/>' + tabLac[1] + '</td>';
				contenu += '<td><input type="hidden" name="v1[]" value="'+ annuaire[i].v1+'"/>' + annuaire[i].v1 + '</td>';
				contenu += '<td><input type="hidden" name="v2[]" value="'+ annuaire[i].v2+'"/>' + annuaire[i].v2 + '</td>';
				contenu += '<td><input type="hidden" name="unite[]" value="'+ annuaire[i].unite+'"/>' + annuaire[i].unite + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeSer(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeSer.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>