﻿
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_parametre->liste_destock_reactif(); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Réactifs destockés </h2>
						<?php //var_dump($liste);?>
					</div>
                    <div class="body table-responsive"> 
						<form id="form-destockage">
							<table id="example" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>Réactif</th>
										<th>Nombre</th>
										<th>Code</th>
										<!--<th>Image code</th>-->
										<th>Motif</th>
										<th>Date destockage</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($liste AS $l){?>
									<tr>
										<td><?php echo $l->rea_sLibelle ;?></td>
										<td><?php echo $l->res_iNb ;?></td>
										<td><?php echo $l->res_sCode ;?></td>
										<!--<td><img style="width:100px" src="<?php// echo base_url($l->res_sImg);?>"/></td>-->
										<td><?php echo $l->res_sMotif;?></td>
										<td><?php echo $this->md_config->affDateFrNum($l->res_dDateDestockage);?></td>
									</tr>
								<?php }?>
								</tbody>
							</table>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Ajoutez des accessoires dans le stock</h2>
							
						</div>
						<div class="body table-responsive">
							<form id="form-arm">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="">Réactif *</th>
											<th style="">Quantité *</th>
											<th style="">Seuil *</th>
											<th style=""  class="text-center"><i class="fa fa-wrench"></i></th>
										</tr>
										<tr>
											
											<td>
												<select id="dep" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez le réactif -----</option>
													<?php foreach($liste AS $l){ ?>
													<option value="<?php echo $l->rea_id; ?>-/-<?php echo $l->rea_sLibelle; ?>"><?php echo $l->rea_sLibelle; ?></option>
													<?php } ?>
												</select>
											</td>
											<td>
												<input type="number" id="lib" style="width:100%" placeholder=""/>
											</td>				
											<td>
												<input type="number" id="seuil" style="width:100%" placeholder=""/>
											</td>
											<td class="text-center">
												<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addEntreeAcc"><i class="fa fa-plus"></i></a>
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
                <a href="javascript:();" class="btn btn-success waves-effect addEntreeRea" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="mdModalDestockVolontaire" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title text-center" style="" id="defaultModalLabel">LABORATOIRE</h4>
				- <span id="nombre"></span>
            </div>
            <div class="modal-body"> 
				<p class=" text-center" style="color:red">Cette action supprimera tous les réactifs sélectionnés du stock<br>Voulez vous continuez ?  </p><br>
				<form id="form-motif">
					<textarea  style="width:100%"  name="motif" rows="4" placeholder="Décrire le motif de destockage ici"></textarea>
				</form>
			</div>
            <div class="modal-footer">
                <a href="javascript:();" onClick="return confirm('Dernier avertissement, valider si oui');" class="btn btn-success waves-effect destockReactif" style="color:#fff"><i class="fa fa-check"></i> OUI</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Annuler</button>
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
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE D'ADMINISTRATION APP</h4>
            </div>
            <div class="modal-body text-center"> Opération effectuée avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        'use strict';
		
        var listeArm = document.querySelector('#tbody');
        var addEntreeAcc = document.querySelector('#addEntreeAcc');
        var annuaire;
        annuaire = new Array();

        function removeArm(index) {
            annuaire.splice(index,1);
            showListeArm();	
        }

        function addDetailArm() 
        {
            var seuil 	            = document.getElementById('seuil').value;
            var lib 	            = document.getElementById('lib').value;
            var dep 	            = document.getElementById('dep').value;
            if(lib == '' || dep == '' || seuil == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contact = new Object();
                contact.seuil	    = seuil;
                contact.lib	        = lib;
                contact.dep	        = dep;
                annuaire.push(contact);
                showListeArm();	
				document.getElementById('seuil').value="";
				document.getElementById('lib').value="";
            }
        }

        addEntreeAcc.addEventListener('click', addDetailArm);

        function showListeArm() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
				
				var tabDep = annuaire[i].dep.split("-/-");
				
                contenu += '<tr>';
				contenu += '<td><input type="hidden" name="dep[]" value="'+ tabDep[0]+'"/>' + tabDep[1] + '</td>';
                contenu += '<td><input type="hidden" name="qte[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
                contenu += '<td><input type="hidden" name="seuil[]" value="'+ annuaire[i].seuil+'"/>' + annuaire[i].seuil + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeArm(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeArm.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>