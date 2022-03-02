<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $patient = $this->md_patient->recup_patient($id); ?>
<?php $listeService = $this->md_parametre->liste_services_acte_actifs($id); ?>
<?php $liste = $this->md_personnel->liste_personnel_medico(); ?>
<?php// $l = $this->md_patient->liste_personnel_medic(1); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Accueil patient</h2>
            <small class="text-muted">ÉPIPHANIE, votre application de gestion hospitalière</small>
        </div>
		
		<!-- Tabs With Custom Animations -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2> Orientation </h2>
						<?php //var_dump($listeService)?>
					</div>
					<div class="body">
						<div class="row clearfix">
							<div class="col-sm-12 col-md-12 col-lg-12"> 
							
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">		
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="card">
													<div class="header">
														<h2><span style="font-size:12px"><?php echo $patient->pat_sCivilite; ?></span> <?php echo $patient->pat_sNom." ".$patient->pat_sPrenom ?> <?php if(!is_null($patient->pat_sTel)){echo "- ".$patient->pat_sTel;} ?> <span class="pull-right"> <span style="font-size:12px">Code du patient</span> : <b style="text-decoration:underline"><?php echo $patient->pat_sMatricule; ?></b></span></h2>
													</div>
													<div class="body">
														<form id="form-orientation">
															<input style="" type="hidden" name="id" value="<?php echo $patient->pat_id; ?>" />
															<div class="row clearfix">
																<div class="col-sm-12">
																	<table class="table table-bordered table-striped table-hover">
																		<thead>
																			<tr>
																				<th colspan="4">Liste des actes médicaux *</th>
																				<th colspan="">Médecin traitant</th>
																				<th colspan="" style="width:60px"  class="text-center"><i class="fa fa-wrench"></i></th>
																			</tr>
																			<tr>
																				<td colspan="4">
																					<select name="acte" style="width:100%;padding:10px" id="acte" class="acte select2 obligatoire show-tick">
																						<!--<option value="">-- Sélection de l'acte médical * --</option>-->
																						<option value=""></option>
																						<?php foreach($listeService  AS $s){ ?>
																						<optgroup style="font-size:16px" label="<?php echo $s->ser_sLibelle; ?>">
																								<?php $listeACte = $this->md_parametre->liste_acts_service_actifs($s->ser_id); ?>
																								<?php foreach($listeACte AS $la){ ?>
																								<option value="<?php echo $la->lac_id; ?>-/-<?php echo ucfirst($la->lac_sLibelle); ?>"><?php echo ucfirst($la->lac_sLibelle); ?></option>
																								<?php } ?>
																						</optgroup>
																						<?php } ?>
																					</select>
																					<input style="" type="hidden" name="" id="ser" />
																					<input style="" type="hidden" name="" id="uni" />
																					<input style="" type="hidden" name="" id="idUni" />
																					<input style="" type="hidden" name="" id="cout" />
																					<input style="" type="hidden" name="" id="idSer" />
																				</td>
																				<td>
																					<select name="perIdMed" id="perIdMed" class="selectMedecin" style="padding:10px;width:100%">
																						<option value=""></option>

																					</select>
																				</td>
																				<td colspan="" class="text-center">
																					<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey cacher" id="addOrient"><i class="fa fa-plus"></i></a>
																				</td>
																			</tr>		
																			<!--<tr>
																				<td colspan="4"  class="text-center"><input style="width:80%" type="" name="" id="" /></td>
																			</tr>	-->						
																			<tr>
																				<th style="width:22%">Acte médical *</th>
																				<th style="width:22%" class="">Service *</th>
																				<th style="width:22%" class="">Unité *</th>
																				<th style="width:10%"  class="">Coût(Fcfa)</th>
																				<th style="width:120px"  class="">Médecin Traitant</th>
																				<th colspan="" style="width:60px" class="text-center"><i class="fa fa-wrench"></i></th>
																			</tr>								
																		</thead>
																		<tbody id="tbody"></tbody>
																	</table>
																	<div class="form-group pull-left retour"></div>
																	<button type="submit" class="btn btn-raised bg-blue-grey pull-right" id="validerActe">Valider</button>
																</div>
															</div>
												
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
							
								</div>
							</div>                           
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Tabs With Custom Animations -->
<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finishOrient" id="finishOrient">BLUE GREY</button>
    </div>
</section>


<!-- For Material Design Colors -->
<div class="modal fade" id="mdModalOrientation" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE ACCUEIL</h4>
            </div>
            <div class="modal-body text-center"> Le patient doit maintenant passer à la caisse <br> <img src="<?php echo base_url("assets/images/icons8-attendance-50.png");?>"/></div>
            <div id="refresh"></div>
        </div>
    </div>
</div>

  <script type="text/javascript">
        'use strict';
		
		// function addPoint(nombre){
			// var chaine = nombre.toString();
			// var tab = chaine.split('');
			// var output = "";
			// var count = 0;
			
			// for(var i = 0; i < tab.length; i++){
				// var first = tab[i+1];
				// var second = tab[i+2];
				// var third = tab[i+3];
				
				// var next = [];
				
				// if(first){next.push(first);}
				// if(second){next.push(second);}
				// if(third){next.push(third);}
				
				// output+=tab[i];
				// count++;
				// console.log(count, next.length);
				// console.log(output);
				// if(next.length == 3 && count == 1){
					// output+=".";
				// }
				// console.log(output);
				// if(count == 3){count=0;}
				
			// }
			// return output;
		// }
		
		
		function addPoint(nombre){
			var output = new Intl.NumberFormat('de-DE').format(nombre);
			return output;
		}
		
		
		
        var liste = document.querySelector('#tbody');
        var addOrient = document.querySelector('#addOrient');
        var annuaire;
        annuaire = new Array();

        function removeSer(index) {
            annuaire.splice(index,1);
            showListe();	
        }

        function addDetail() 
        {
            var acte 	            = document.getElementById('acte').value;
            var perIdMed 	            = document.getElementById('perIdMed').value;
            var ser 	            = document.getElementById('ser').value;
            var uni 	            = document.getElementById('uni').value;
            var idUni 	            = document.getElementById('idUni').value;
            var cout 	            = document.getElementById('cout').value;
            var idSer 	            = document.getElementById('idSer').value;
            if(acte == '' || ser == '' || uni == '' || idUni == '' || cout == '' || idSer == '') {
                // alert('Veuillez renseigner le champs.');	
            }
            else {
                var contact = new Object();
                contact.acte	    = acte;
                contact.perIdMed	= perIdMed;
                contact.ser	        = ser;
                contact.uni	        = uni;
                contact.idUni	    = idUni;
                contact.cout	    = cout;
                contact.idSer	    = idSer;
                annuaire.push(contact);
                showListe();	
				// document.getElementById('acte').value="";
				// document.getElementById('acte').innerHTML='<option value="">-- Sélection de l\'acte médical * --</option>';
				document.getElementById('perIdMed').innerHTML='<option value="0-/-Aucun">Sélectionner le médecin</option>';
				// document.getElementById('perIdMed').value="";
				// document.getElementById('ser').value="";
				// document.getElementById('uni').value="";
				// document.getElementById('idUni').value="";
				// document.getElementById('cout').value="";
            }
        }

        addOrient.addEventListener('click', addDetail);

        function showListe() 
        {
            var contenu="";
            var tailleTableau = annuaire.length;            
            var total = 0; 
            for(var i = 0; i < tailleTableau; i++) {
				var tabActe = annuaire[i].acte.split("-/-");
				var tabPer = annuaire[i].perIdMed.split("-/-");
				
                contenu += '<tr>';
                contenu += '<td><input type="hidden" name="acte[]" value="'+ tabActe[0]+'"/>' + tabActe[1] + '</td>';
                contenu += '<td><input type="hidden" name="ser[]" value="'+ annuaire[i].idSer+'"/>' + annuaire[i].ser + '</td>';
                contenu += '<td><input type="hidden" name="uni[]" value="'+ annuaire[i].idUni+'"/>' + annuaire[i].uni + '</td>';
                contenu += '<td>' + addPoint(annuaire[i].cout) + '</td>';
				contenu += '<td><input type="hidden" name="perIdMed[]" value="'+ tabPer[0]+'"/>' + tabPer[1] + '</td>';
                contenu += '<td class="text-center"><a href="javascript:();" onClick="removeSer(' + i + ')" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a></td>';
                contenu += '</tr>';
				
				total+=parseInt(annuaire[i].cout);
            }		
			
			contenu += '<tr>';
			contenu += '<td colspan="3" align="right"><b> Total</b></td>';
			contenu += '<td colspan="6">' + addPoint(total) + '</td>';
			contenu += '</tr>';

            liste.innerHTML = contenu;
			// alert(contenu);
        }

        </script>


<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>