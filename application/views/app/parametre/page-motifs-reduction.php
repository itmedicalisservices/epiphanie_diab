
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_parametre->liste_motifs_reduction(); ?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-6 col-sm-12">
				<div class="card">
                    <div class="header">
                        <h2>Ajoutez des motifs de réduction</h2>
                        
                    </div>
                    <div class="body table-responsive">
						<form id="form-mod">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th style="width:70%">Désignation</th>
										<th>Taux de réduction(%)</th>
										<th style="width:60px"  class="text-center"><i class="fa fa-wrench"></i></th>
									</tr>
			
									<tr>
										<td>
											<input type="text" id="lib" style="width:100%" placeholder="Saisissez dans ce champs"/>
										</td>
									
										<td>
											<input type="number" id="taux" style="width:100%" value="1"/>
										</td>
																	
										<td class="text-center">
											<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addMod"><i class="fa fa-plus"></i></a>
										</td>
									</tr>
								</thead>
							   
								<tbody id="tbody"></tbody>
							</table>
						</form>
						<a href="javascript:();" class="btn btn-success waves-effect addMotifRed" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
                    </div>
                </div>
			</div>
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>liste des motifs de réduction</h2>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table class="table table-bordered table-striped table-hover " id="example">
						   
							<thead>
								<tr>
									<th>Désignation</th>
									<th>Taux de réduction(%)</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<span class="champs<?php echo $l->mod_id ?>"><?php echo $l->mod_sLibelle; ?></span>
										<form id='form-edit-mod<?php echo $l->mod_id ?>'>
											<textarea class="cacher input<?php echo $l->mod_id ?>" style='width:100%' name='lib'><?php echo $l->mod_sLibelle; ?></textarea>
											<input type="hidden" value="<?php echo $l->mod_id ?>" name="id"/>
											<input type="hidden" value="<?php echo $l->mod_sLibelle ?>" name="nom"/>
										</form>
									</td>
									<td>
										<span class="champsTaux<?php echo $l->mod_id ?>"><?php echo $l->mod_iTaux; ?>%</span>
										<form id='form-edit-taux<?php echo $l->mod_id ?>'>
											<input class="cacher taux<?php echo $l->mod_id ?>" style='width:100%' value="<?php echo $l->mod_iTaux; ?>" name='taux'/>
											<input type="hidden" value="<?php echo $l->mod_id ?>" name="id"/>
										</form>
									</td>
									
									<td class="text-center">
										<a href="javascript:();" rel="<?php echo $l->mod_id; ?>" class="editModifReductionFinal confirm<?php echo $l->mod_id; ?> cacher" title="Modifier" style="text-decoration:underline">Modifier</a>
										<a href="javascript:();" rel="<?php echo $l->mod_id; ?>" class="editModifAnnule annule<?php echo $l->mod_id; ?> text-danger cacher" title="Annuler" style="text-decoration:underline">Annuler</a> &nbsp;
										<a href="javascript:();" rel="<?php echo $l->mod_id; ?>" class="editMotifReduction clique<?php echo $l->mod_id; ?>" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;
										<a onClick="return confirm('Êtes-vous sûr de supprimer cette activité professionnelle ?')" href="<?php echo site_url("parametre/supprimer_motif_reduction/".$l->mod_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
		<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finish" id="finish">BLUE GREY</button>
    </div>
</section>

<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE D'ADMINISTRATION</h4>
            </div>
            <div class="modal-body text-center"> Motif(s) de réduction enregisté(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        'use strict';
		
        var listeSal = document.querySelector('#tbody');
        var addAcc = document.querySelector('#addMod');
        var annuaire;
        annuaire = new Array();

        function removeCat(index) {
            annuaire.splice(index,1);
            showListeSal();	
        }

        function addDetailSal() 
        {
            var lib 	            = document.getElementById('lib').value;
            var taux 	            = document.getElementById('taux').value;
            if(lib == '' || taux== '') {
                alert('Veuillez renseigner tous les champs.');	
            }
            else {
                var contact = new Object();
                contact.lib	        = lib;
                contact.taux	        = taux;
                annuaire.push(contact);
                showListeSal();	
				document.getElementById('lib').value="";
				document.getElementById('taux').value=1;
            }
        }

        addAcc.addEventListener('click', addDetailSal);

        function showListeSal() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
                contenu += '<tr>';
                contenu += '<td><input type="hidden" name="lib[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
                contenu += '<td><input type="hidden" name="taux[]" value="'+ annuaire[i].taux+'"/>' + annuaire[i].taux + '%</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeCat(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeSal.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>