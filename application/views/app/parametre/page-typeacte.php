
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeRub = $this->md_parametre->liste_rubrique_actifs(); ?>
<?php $liste = $this->md_parametre->liste_acte_groupe_actifs(); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Libellé & Quotes-parts (<?php echo count($liste) ;?>)</h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_service pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Ajouter un nouveau</b></button>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
						   
							<thead>
								<tr>
									<th style="width:40%">Libellé</th>
									<th style="width:25%">Service(%)</th>
									<th style="width:25%">Administration(%)</th>
									<th style="width:10%">Actions</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<span class="champs_ser<?php echo $l->tya_id ?>"><?php echo $l->tya_sLib; ?></span>
										<form id='form-edit-actgpe<?php echo $l->tya_id ;?>'>
											<textarea class="cacher input_ser<?php echo $l->tya_id ?>" style='width:100%' name='lib'><?php echo $l->tya_sLib; ?></textarea>
											<input type="hidden" value="<?php echo $l->tya_id ;?>" name="id"/>
											<input type="hidden" value="<?php echo $l->tya_sLib; ?>" name="nom"/>
										</form>
									</td>									
									<td>
										<span class="champs_ser2<?php echo $l->tya_id ?>"><?php echo $l->tya_iSer; ?></span>
										<form id='form-edit-actgpe2<?php echo $l->tya_id ;?>'>
											<input type="number" value="<?php echo $l->tya_iSer; ?>" min="0" rel="<?php echo $l->tya_id; ?>" class="cacher input_2 input_ser2<?php echo $l->tya_id ?>" style='width:100%;height:49px' name='service'/>
											<input type="hidden" value="<?php echo $l->tya_iSer; ?>" name="nom"/>
										</form>
									</td>									
									<td>
										<span class="champs_ser3<?php echo $l->tya_id ?>"><?php echo $l->tya_iAdm; ?></span>
										<form id='form-edit-actgpe3<?php echo $l->tya_id ;?>'>
											<textarea class="cacher input_ser3<?php echo $l->tya_id ?>" style='width:100%' name='admin' readonly><?php echo $l->tya_iAdm; ?></textarea>
											<input type="hidden" value="<?php echo $l->tya_iAdm; ?>" name="nom"/>
										</form>
									</td>								
									<td class="text-center">
										<a href="javascript:();" rel="<?php echo $l->tya_id; ?>" class="editActegpeFinal confirm_ser<?php echo $l->tya_id; ?> cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
										<a href="javascript:();" rel="<?php echo $l->tya_id; ?>" class="editActegpeAnnule annule_ser<?php echo $l->tya_id; ?> text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
										<a href="javascript:();" rel="<?php echo $l->tya_id; ?>" class="editActegpe clique_ser<?php echo $l->tya_id; ?>" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;
										<a onClick="return confirm('Êtes-vous sûr de supprimer ?')" href="<?php echo site_url("parametre/supprimer_acte_groupe/".$l->tya_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
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
							<h2>Ajoutez des Libellés & quotes-parts</h2>
							
						</div>
						<div class="body table-responsive">
							<form id="form-actegpe">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:30%">Libellé</th>
											<th style="width:30%">Service(%)</th>
											<th style="width:30%">Administration(%)</th>
											<th style="width:10%"  class="text-center"><i class="fa fa-wrench"></i></th>
										</tr>
										<tr>
											<td>
												<input type="text" id="lib" style="width:100%" placeholder="Saisissez la designation"/>
											</td>										
											<td>
												<input type="number" min="0" id="PourSer" style="width:100%" placeholder="Saisissez le pourcentage du service"/>
											</td>										
											<td>
												<input type="number" min="0" id="PourAdm" style="width:100%" placeholder="Champ en lecture seule" readonly />
											</td>										
											<td class="text-center">
												<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addactegpe"><i class="fa fa-plus"></i></a>
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
                <a href="javascript:();" class="btn btn-success waves-effect addactegpe" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
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
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE ADMINISTRATION</h4>
            </div>
            <div class="modal-body text-center"> Libellés(s) enregisté(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        'use strict';
		
        var listeSer = document.querySelector('#tbody');
        var addactegpe = document.querySelector('#addactegpe');
        var annuaire;
        annuaire = new Array();

        function removeSer(index) {
            annuaire.splice(index,1);
            showListeSer();	
        }

        function addDetailSer() 
        {
            var lib 	            = document.getElementById('lib').value;
            var PourSer 	            = document.getElementById('PourSer').value;
            var PourAdm 	            = document.getElementById('PourAdm').value;
            if(lib == '' || PourSer == '' || PourAdm == '') {
                alert('Veuillez renseigner tous les champs.');	
            }
            else {
                var contact = new Object();
                contact.lib	        = lib;
                contact.PourSer	    = PourSer;
                contact.PourAdm	    = PourAdm;
                annuaire.push(contact);
                showListeSer();	
				document.getElementById('lib').value="";
				document.getElementById('PourSer').value="";
				document.getElementById('PourAdm').value="";
            }
        }

        addactegpe.addEventListener('click', addDetailSer);

        function showListeSer() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
								
                contenu += '<tr>';
                contenu += '<td><input type="hidden" name="lib[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
                contenu += '<td><input type="hidden" name="PourSer[]" value="'+ annuaire[i].PourSer+'"/>' + annuaire[i].PourSer + '</td>';
                contenu += '<td><input type="hidden" name="PourAdm[]" value="'+ annuaire[i].PourAdm+'"/>' + annuaire[i].PourAdm + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeSer(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeSer.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>