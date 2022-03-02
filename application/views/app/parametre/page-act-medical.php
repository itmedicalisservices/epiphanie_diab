﻿
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $listeSer = $this->md_parametre->liste_services_actifs(); ?>
<?php $listeUni = $this->md_parametre->liste_unites_actifs(); ?>
<?php //$liste = $this->md_parametre->liste_acts_actifs(); ?>
<?php $listetype = $this->md_parametre->liste_typeacte_actifs(); ?>
<?php //$listeCptRecet = $this->md_recette->liste_compte_recette(); ?>
<?php 
	$articleParPage = 400;
	
	/* Personnel medical */
	$articleTotaux  = count($this->md_parametre->nb_acte_medical());
	$pagesTotales  = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle  = $_GET['page'];
	}else{
		$pageActuelle  = 1;
	}
	
	
	$liste = $this->md_parametre->liste_actes_medicaux($articleParPage,$pageActuelle);


 ?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        </div>
        <div class="row clearfix">
			<!--<a  href="<?php //echo site_url("parametre/ajoutActesAja"); ?>" class="">ajouter</a>-->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des actes médicaux de l'hopital (<?php echo $articleTotaux ;?>)</h2><button style="" type="button" class="btn bg-blue-grey waves-effect ajout_unite pull-right" style="color:#fff"><i class="fa fa-plus"></i> <b>Ajouter un nouvel acte</b></button>
                        <br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
                    </div>
                    <div class="body table-responsive" style="overflow:auto;height:500px"> 
						<table class="table table-bordered table-striped table-hover ">
						   
							<thead>
								<tr>
									<th>Acte</th>
									<th>Coût (<small>FCFA</small>)</th>
									<th>Durée(jrs)</th>
									<th>Unité</th>
									<th>Service</th>
									<th>Libellé quotes-parts</th>
									<th style="width:80px">Action</th>
								</tr>
							</thead>
						   
							<tbody  id="acte_table">
							<?php foreach($liste AS $l){ ?>
								<tr>									
									<td>
										<span class="champs_lac<?php echo $l->lac_id ?>"><?php echo $l->lac_sLibelle; ?></span>
										<form id='form-edit-lac<?php echo $l->lac_id ?>'>
											<textarea class="cacher input_lac<?php echo $l->lac_id ?>" style='width:100%' name='lib'><?php echo $l->lac_sLibelle; ?></textarea>
											<input type="hidden" value="<?php echo $l->lac_id ?>" name="id"/>
											<input type="hidden" value="<?php echo $l->lac_sLibelle ?>" name="nom"/>
										</form>
									</td>
									
									<td>
										<span class="champs_cout<?php echo $l->lac_id ?>"><?php echo number_format($l->lac_iCout,0,",","."); ?> </span>
										<form id='form-edit-cout<?php echo $l->lac_id ?>'>
											<input type="text" class="cacher input_cout<?php echo $l->lac_id ?>" style='width:100%' name='cout' value="<?php echo $l->lac_iCout; ?>"/>
										</form>
									</td>
									
									<td>
										<span class="champs_duree<?php echo $l->lac_id ?>"><?php echo $l->lac_iDure; ?> </span>
										<form id='form-edit-duree<?php echo $l->lac_id ?>'>
											<input type="text" class="cacher input_duree<?php echo $l->lac_id ?>" style='width:100%' name='duree' value="<?php echo $l->lac_iDure; ?>"/>
										</form>
									</td>

									<td>
										<span class="champs_uni<?php echo $l->lac_id ?>"><?php echo $l->uni_sLibelle; ?></span>
										<form id='form-edit_uni<?php echo $l->lac_id ?>'>
											<select class="cacher input_uni<?php echo $l->lac_id ?>" name="uni" style="width:100%;padding-bottom:10px;padding-top:10px">
												<?php $lst = $this->md_parametre->liste_unite_services_actifs($l->ser_id); foreach($lst AS $ls){ ?>
												<option value="<?php echo $ls->uni_id; ?>-/-<?php echo $ls->uni_sLibelle; ?>" <?php if($ls->uni_id == $l->uni_id){echo "selected='selected'";} ?>><?php echo $ls->uni_sLibelle; ?></option>
												<?php } ?>
											</select>
										</form>
									</td>
									<td>
										<span class="champs_ser<?php echo $l->lac_id ?>"><?php echo $l->ser_sLibelle; ?></span>
										<form id='form-edit_ser<?php echo $l->lac_id ?>'>
											<select class="cacher clickSer input_ser<?php echo $l->lac_id ?>" name="ser" style="width:100%;padding-bottom:10px;padding-top:10px" rel="<?php echo $l->lac_id ?>">
												<?php foreach($listeSer AS $d){ ?>
												<option value="<?php echo $d->ser_id; ?>-/-<?php echo $d->ser_sLibelle; ?>" <?php if($d->ser_id == $l->ser_id){echo "selected='selected'";} ?>><?php echo $d->ser_sLibelle; ?></option>
												<?php } ?>
											</select>
										</form>
									</td>									
									<td>
										<span class="champs_tya<?php echo $l->lac_id ?>"><?php echo $l->tya_sLib; ?></span>
										<form id='form-edit_tya<?php echo $l->lac_id ?>'>
											<select class="cacher input_tya<?php echo $l->lac_id ?>" name="tya" style="width:100%;padding-bottom:10px;padding-top:10px" rel="<?php echo $l->lac_id ?>">
												<?php foreach($listetype AS $t){ ?>
												<option value="<?php echo $t->tya_id; ?>-/-<?php echo $t->tya_sLib; ?>" <?php if($t->tya_id == $l->tya_id){echo "selected='selected'";} ?>><?php echo $t->tya_sLib; ?></option>
												<?php } ?>
											</select>
										</form>
									</td>
									<td class="text-center">
										<a href="javascript:();" rel="<?php echo $l->lac_id; ?>" class="editActeFinal confirm_lac<?php echo $l->lac_id; ?> cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
										<a href="javascript:();" rel="<?php echo $l->lac_id; ?>" class="editActeAnnule annule_lac<?php echo $l->lac_id; ?> text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
										<a href="javascript:();" rel="<?php echo $l->lac_id; ?>" class="editActe clique_lac<?php echo $l->lac_id; ?>" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;
										<a onClick="return confirm('Êtes-vous sûr de supprimer cet acte ?')" href="<?php echo site_url("parametre/supprimer_act/".$l->lac_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
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
									 <li class="page-item"><a class="page-link" href="<?php echo site_url("parametre/acte_medical");?>/?page=<?=$i?>"><?=$i?></a></li>
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
    <div class="modal-dialog modal-lg" role="document" style="margin-top:20px; max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body" style="max-height:500px; overflow:auto;">
			
				 <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2>Ajoutez des nouveaux actes médicaux</h2>
						</div>
						<div class="body table-responsive">
							<form id="form-lac">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:25%">* Désignation de l'acte</th>
											<th style="width:5%">* Coût(FCFA)</th>
											<th style="width:5%">*Durée(Jrs)</th>
											<th style="width:20%">* Service</th>
											<th style="width:25%">* Unité</th>
											<th style="width:20%">* Libellé quotes-parts</th>
											<th style=""  class="text-center"><i class="fa fa-wrench"></i></th>
										</tr>
										<tr>
											<td>
												<input type="text" id="lib" style="width:100%" placeholder="Acte"/>
												
											</td>
											<td>
												<input type="number"  min="0" id="cout" style="width:100%" placeholder="Coût"/>
												
											</td>
											<td>
												<input type="number" min="0" id="duree" style="width:100%" placeholder="Durée"/>
												
											</td>
											<td>
												<select id="ser" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- sélectionner * -----</option>
													<?php foreach($listeSer AS $d){ ?>
													<option value="<?php echo $d->ser_id; ?>-/-<?php echo $d->ser_sLibelle; ?>"><?php echo $d->ser_sLibelle; ?></option>
													<?php } ?>
												</select>
											</td>
											<td>
												<select id="uni" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- sélectionner * -----</option>
													
												</select>
											</td>											
											<td>
											
												<select id="tya" style="width:100%;padding-bottom:5px;padding-top:5px">
												<option value="">----- sélectionner * -----</option>
												<?php foreach($listetype AS $t){ ?>
													<option value="<?php echo $t->tya_id; ?>-/-<?php echo $t->tya_sLib; ?>" ><?php echo $t->tya_sLib; ?></option>
												<?php } ?>
												</select>
											
											</td>
											
											<td class="text-center">
												<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addAct"><i class="fa fa-plus"></i></a>
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
                <a href="javascript:();" class="btn btn-success waves-effect addAct" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
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
            <div class="modal-body text-center"> Acte(s) enregisté(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
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
			$('#acte_table tr').each(function(){
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
    <script type="text/javascript">
        'use strict';
		
        var listeAct = document.querySelector('#tbody');
        var addAct = document.querySelector('#addAct');
        var annuaire;
        annuaire = new Array();

        function removeAct(index) {
            annuaire.splice(index,1);
            showListeAct();	
        }

        function addDetailAct() 
        {
            var lib 	            = document.getElementById('lib').value;
            var cout 	            = document.getElementById('cout').value;
            var duree 	            = document.getElementById('duree').value;
            var ser 	            = document.getElementById('ser').value;
            var tya 	            = document.getElementById('tya').value;
            var uni 	            = document.getElementById('uni').value;
			
            if(lib == '' || uni == ''|| ser == ''|| cout == ''|| duree == ''|| tya == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contact = new Object();
                contact.lib	        = lib;
                contact.cout	    = cout;
                contact.duree	    = duree;
                contact.ser	    	= ser;
                contact.tya	    	= tya;
                contact.uni	      = uni;
                annuaire.push(contact);
                showListeAct();	
				document.getElementById('lib').value="";
				document.getElementById('cout').value="";
				document.getElementById('duree').value="";
            }
        }

        addAct.addEventListener('click', addDetailAct);

        function showListeAct() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
				
				var tabType = annuaire[i].ser.split("-/-");
				var tabDom = annuaire[i].uni.split("-/-");
				var tabTypeacte = annuaire[i].tya.split("-/-");
				
                contenu += '<tr>'; 
				contenu += '<td><input type="hidden" name="lib[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
				contenu += '<td><input type="hidden" name="cout[]" value="'+ annuaire[i].cout+'"/>' + annuaire[i].cout + ' <small>FCFA</small></td>';
				contenu += '<td><input type="hidden" name="duree[]" value="'+ annuaire[i].duree+'"/>' + annuaire[i].duree + ' jrs </td>';
                contenu += '<td>' + tabType[1] + '</td>';
                contenu += '<td><input type="hidden" name="uni[]" value="'+ tabDom[0]+'"/>' + tabDom[1] + '</td>';
                contenu += '<td><input type="hidden" name="tya[]" value="'+ tabTypeacte[0]+'"/>' + tabTypeacte[1] + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeAct(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeAct.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>