
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	if($user->flt_sLib == 'Administration' || $user->per_iTypeCompte == 26) {
		$liste = $this->md_patient->liste_facture_frais_divers();
	}else{
		$liste = $this->md_patient->liste_facture_frais_divers($this->session->diabcare); 
	}
?>


<section class="content">

    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des factures frais divers</h2>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr align="center">
									<td><b>Patient/Enseigne</b></td>
									<td><b>Acte</b></td>
									<td><b>Montant Payé (<small>FCFA</small>)</b></td>
									<td><b>Date Opération</b></td>
									<td><b>N° Facture</b></td>
									<?php if($user->flt_sLib == 'Administration' || $user->flt_sLib == 'Comptabilite'){?>
									<td class="text-center"><b>Effectuée par :</b></td>
									<?php }?>
									<td style="width:60px"><b>Action</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php //var_dump($liste) ?>
							<?php foreach($liste AS $l){ ?>
							<?php if(date("Y-m-d") < $l->fac_dDateValAnnul){?>
								<tr align="center" <?php if($l->fac_iSta==2){echo' style="background:pink"';}?>>
									<td>
										<b><?php if(!is_null($l->fac_sLoc)){echo $l->fac_sLoc;}else{ $pat = $this->md_patient->recup_patient($l->pat_id); echo $pat->pat_sNom.' '.$pat->pat_sPrenom.' ('.$pat->pat_sMatricule.')';}; ?></b>
									</td>												
									<td>
										<?php echo $l->lac_sLibelle; ?> 
									</td>						
									<td>
										<?php echo number_format($l->fac_iMontantPaye,0,",","."); ?> 
									</td>								

									<td>
										<?php echo $this->md_config->affDateFrNum($l->fac_dDatePaie); ?>
									</td>								
									<td>
										<?php echo $l->fac_sNumero; ?>
									</td>									
									<?php if($user->flt_sLib == 'Administration' || $user->per_iTypeCompte == 26){?>									
									<td>
										<b><?php $pers = $this->md_personnel->recup_personnel($l->per_iElf); echo $pers->per_sNom.' '.$pers->per_sPrenom; ?></b>
									</td>
									<?php }?>

									<td class="text-center">
									<?php if($user->flt_sLib != 'Administration'){?>
										<a href="<?php echo site_url("impression/recu_caisse/".$l->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a> &nbsp;&nbsp;
									<?php }else{?>	
										<?php if((date("H:i") > '17:30') && (date("H:i") <= '23:59')){?>
											<em>Reportée</em>
										<?php }else{?>
											<?php if(is_null($l->fac_iStAnnul)){?>
												<?php if($l->fac_iSta == 1){?>
													<a onClick="return confirm('Êtes-vous sûr de vouloir annuler cette facture ?')" href="<?php echo site_url("facture/annuler_facture_frais_divers/".$l->fac_id);?>" class="text-danger" title="Annuler cette facture ?" ><i class="fa fa-times" style="font-size:20px"></i></a>
												<?php }else{?>
													<a onClick="return confirm('Êtes-vous sûr de vouloir restaurer cette facture ?')" href="<?php echo site_url("facture/restaure_facture_frais_divers/".$l->fac_id);?>" class="text-success" title="Restaurer cette facture ?" ><i class="fa fa-history" style="font-size:20px"></i></a>
												<?php }?>
											<?php }else{?>
												<em>Aucune possible !</em>
											<?php }?>
										<?php }?>
									<?php }?>
									</td>
								</tr>
								<?php }?>
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
							<h2>Ajoutez des nouvelles spécialités hospitalières</h2>
							
						</div>
						<div class="body table-responsive">
							<form id="form-spe">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th style="width:32%">Type personnel</th>
											<th style="width:32%">Domaine</th>
											<th style="width:32%">Spécialité</th>
											<th style="width:60px"  class="text-center"><i class="fa fa-wrench"></i></th>
										</tr>
										<tr>
											<td>
												<select id="typePer" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez le type de personnel * -----</option>
													<?php foreach($listeType AS $d){ ?>
													<option value="<?php echo $d->tpe_id; ?>-/-<?php echo $d->tpe_sLibelle; ?>"><?php echo $d->tpe_sLibelle; ?></option>
													<?php } ?>
												</select>
											</td>
											<td>
												<select id="domaine" style="width:100%;padding-bottom:5px;padding-top:5px">
													<option value="">----- Choisissez le domaine * -----</option>
													
												</select>
											</td>
											<td>
												<input type="text" id="lib" style="width:100%" placeholder="Saisissez le nom de la spécialté dans ce champs"/>
												
											</td>
											
											<td class="text-center">
												<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey" id="addSpe"><i class="fa fa-plus"></i></a>
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
                <a href="javascript:();" class="btn btn-success waves-effect addSpe" style="color:#fff"><i class="fa fa-check"></i> Enregistrer</a>
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
            <div class="modal-body text-center"> Spécialité(s) enregistée(s) avec succès <br><i style="font-size:40px" class="fa fa-hospital-o"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        'use strict';
		
        var listeUni = document.querySelector('#tbody');
        var addSpe = document.querySelector('#addSpe');
        var annuaire;
        annuaire = new Array();

        function removeSpe(index) {
            annuaire.splice(index,1);
            showListeSpe();	
        }

        function addDetailSpe() 
        {
            var lib 	            = document.getElementById('lib').value;
            var domaine 	            = document.getElementById('domaine').value;
            var typePer 	            = document.getElementById('typePer').value;
			
            if(lib == '' || typePer == ''|| domaine == '') {
                alert('Veuillez renseigner le champs.');	
            }
            else {
                var contact = new Object();
                contact.lib	        = lib;
                contact.domaine	    = domaine;
                contact.typePer	        = typePer;
                annuaire.push(contact);
                showListeSpe();	
				document.getElementById('lib').value="";
            }
        }

        addSpe.addEventListener('click', addDetailSpe);

        function showListeSpe() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
                
            for(var i = 0; i < tailleTableau; i++) {
				
				var tabType = annuaire[i].typePer.split("-/-");
				var tabDom = annuaire[i].domaine.split("-/-");
				
                contenu += '<tr>';
                contenu += '<td>' + tabType[1] + '</td>';
                contenu += '<td><input type="hidden" name="pst[]" value="'+ tabDom[0]+'"/>' + tabDom[1] + '</td>';
				 contenu += '<td><input type="hidden" name="lib[]" value="'+ annuaire[i].lib+'"/>' + annuaire[i].lib + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeSpe(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
            }

            listeUni.innerHTML = contenu;
			// alert(contenu);
        }
    
        </script>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>