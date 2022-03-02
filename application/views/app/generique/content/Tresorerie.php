	
	
<?php //$liste = $this->md_patient-> liste_element_caisse(); ?>
<?php $listeH = $this->md_patient-> liste_element_caisse_hos(); ?>
<?php $sommecumul = $this->md_patient->total_encaissee($this->session->diabcare); ?>
<?php //$sommecumulannulation = $this->md_patient->total_annulation_caissee($this->session->diabcare); ?>

<?php $actesdiv = $this->md_parametre->liste_frais_divers_actifs(); ?>
<?php $locataire = $this->md_parametre->liste_locataire_actifs(); ?>
<?php $mouvements = $this->md_patient->liste_tout_mouvement_caisse($this->session->diabcare); ?>
<?php $datedebut = $this->md_patient->liste_tout_mouvement_caisse_datedebut($this->session->diabcare); ?>
<?php $listeactesdiv = $this->md_parametre->liste_acts_divers_actifs(); ?>
<?php $listepatient = $this->md_patient->liste_patient(); ?>
<?php 
	$articleParPage = 500;
	
	/* tout le monde */
	$articleTotaux  = count($this->md_patient->nb_element_caisse());
	$pagesTotales = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle = $_GET['page'];
	}else{
		$pageActuelle = 1;
	}
	
	$liste = $this->md_patient->liste_element_caisse($articleParPage,$pageActuelle);
	$listepms = $this->md_personnel->liste_personnel_medical_sante();
	// $liste = $this->md_patient->liste_patient();
	
	
	
	// var_dump($pms);
 ?>

<section class="content home">
    <div class="container-fluid" style="height:45px;padding-top:1%;">
		<b style="text-decoration:underline;">ETAT DE CAISSE</b>:<b <?php if(is_null($user->per_iCnx)){echo 'style="color:red"';}else{echo 'style="color:green "';};?>><?php  if(is_null($user->per_iCnx)){echo ' INACTIF';}else{echo ' ACTIF';};?> </b>
		<a style="float:right" <?php if(is_null($user->per_iCnx)){echo 'id="ouverturecaisse"';}else{echo 'id="fermeturecaisse"';};?> class="" href="javascript:;"> 
			<?php if(is_null($user->per_iCnx)){?>
				<span style="text-decoration:underline;color:green">OUVERTURE DE CAISSE</span>
			<?php }else{?>
				<span style="text-decoration:underline;color:red">CLÔTURE DE CAISSE</span>
			<?php }?>
		</a>	
    </div>    
	
	<div class="container-fluid">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#income"> <span>Caisse normale</span></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sales"> <span>Caisse hospitalisation</span></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#divers"> <span>Caisse frais Divers</span></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mvt"> <span>Mouvements</span></a></li>
			<a class="nav-link" href="javascript:;" style="color:green"> <b>SOLDE : <?php echo number_format($sommecumul->cumul,0,",",".") ;?> <small>FCFA</small></b></a>
			<a title="Actualiser" class="nav-link pull-right"  href="<?php echo site_url("app"); ?>"> <i style="font-size:20px" class="fa fa-refresh"></i></a>
        </ul> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="header">	
								<h2>liste des actes médicaux en attente de paiement (<?php echo count($liste); ?>)<?php if($user->per_iCnx===0){?><button id="facture" type="button" class="btn bg-blue-grey waves-effect pull-right cacher" style="color:#fff"><i class="fa fa-check"></i> <b>Faire une facture</b></button><?php }?></h2>
								<br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
							
							<?php //var_dump($listepms);?>
							
							</div>
							<div class="body table-responsive" style="overflow:auto;height:500px">
								<form id="form-facture">
									<table  class="table table-bordered table-striped table-hover" >
										<thead>
											<tr>
												<th>#</th>
												<th style="width:15%">Date</th>
												<th style="width:15%">ID</th>
												<th>Nom complet</th>
												<th>Acte médical</th>
												<th>Coût(Fcfa)</th>
											</tr>
										</thead>
									   
										<tbody id="acte_table">
											<?php foreach($liste AS $l){ ?>
												<tr>
													<td>
													<?php if($user->per_iCnx==1){?>
														<input type="hidden" name="pat" value="<?php echo $l->pat_id; ?>"/>
														<?php }?>
														<div class="switch">
															<label>
																<input type="checkbox" class="checkPatient" name="id[]" value="<?php echo $l->acm_id . '-/-' .$l->pat_id; ?>">
																<span class="lever"></span>
															</label>
														</div>
													</td>
													<td>
														<?php echo $this->md_config->affDateTimeFr($l->acm_dDate); ?>
													</td>
													<td>
														<?php echo $l->pat_sMatricule; ?>
														
													</td>
													<td>
														<?php echo $l->pat_sNom; ?> <?php echo $l->pat_sPrenom; ?>
													</td>
													<td>
														<?php 
														if(is_null($l->acm_sDent)){
																$dent = "";
															}
															else{
																$dent = " - ".$l->acm_sDent;
															} echo $l->lac_sLibelle.$dent ; 
														?>
													</td>
													<td>
														<?php echo number_format($l->lac_iCout,0,",","."); ?>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
								
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
											 <li class="page-item"><a class="page-link" href="<?php echo site_url("app");?>/?page=<?=$i?>"><?=$i?></a></li>
											<?php } } ?>
										</ul>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
                          
            </div>
            
            <div role="tabpanel" class="tab-pane page-calendar" id="sales">
                <div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="header">
								<h2>liste des actes médicaux en attente de paiement (<?php echo count($listeH); ?>) <?php if($user->per_iCnx===0){?><button id="facture_2" type="button" class="btn bg-blue-grey waves-effect pull-right cacher" style="color:#fff"><i class="fa fa-check"></i> <b>Faire une facture</b></button><?php }?></h2>
							</div>
							<div class="body table-responsive">
								<form id="form-facture_2">
									<table id="example8" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>ID</th>
												<th>Nom complet</th>
												<th>Acte médical</th>
												<th>Coût(Fcfa)</th>
												<th>Date</th>
											</tr>
										</thead>
									   
										<tbody>
											<?php foreach($listeH AS $l){ ?>
												<?php //if($l->lac_sLibelle!="Hospitalisation"){ ?>
													<tr>
														<td>
															<input type="hidden" name="pat" value="<?php echo $l->pat_id; ?>"/>
															<div class="switch">
																<label>
																	<input type="checkbox" class="checkPatient_2" name="id[]" value="<?php echo $l->acm_id . '-/-' .$l->pat_id; ?>">
																	<span class="lever"></span>
																</label>
															</div>
														</td>
														<td>
															<?php echo $l->pat_sMatricule; ?>
															
														</td>
														<td>
															<?php echo $l->pat_sNom; ?> <?php echo $l->pat_sPrenom; ?>
														</td>
														<td>
															<?php if(is_null($l->lac_sLibelle)){echo "Séjour occupation du lit";}else{echo $l->lac_sLibelle;} ?>
														</td>
														<td>
															<?php if(is_null($l->lac_sLibelle)){echo number_format($l->acm_iCoutHos,0,",",".");}else{echo number_format($l->lac_iCout,0,",",".");} ?> <small>FCFA</small>
														</td>
														<td>
															<?php echo $this->md_config->affDateTimeFr($l->acm_dDate); ?>
														</td>
													</tr>
											<?php //} ?>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
            </div>        

			
            <div role="tabpanel" class="tab-pane page-calendar" id="divers">
                <div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="header">

							</div>
							<div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="card">
											<div class="header">
												<h2>Paiement des actes et frais divers <br><small>renseignez tous les champs marqués par des (*)</small> </h2>
											</div><br><br><br><br><br><br>
											<div class="body">
												<form id="form-actedivers" action="<?php echo site_url('caisse/ajoutFactureActeDivers');?>" method="post">
													<div class="row clearfix">
														<div class="col-sm-6">
															<div class="form-group drop-custum">
																<label>* Acte/Frais Divers</label>
																<select id="actefrais" style="padding-left:8px;width:100%" class="form-control show-tick obligatoire fraisDivers">
																	<option value=""></option>
																	<?php foreach($listeactesdiv AS $s){?>
																	<optgroup style="font-size:16px" label="<?php echo $s->ser_sLibelle; ?>">
																	<?php $listeACte = $this->md_parametre->liste_acts_divers_service_actifs($s->ser_id); ?>
																	<?php foreach($listeACte AS $la){ ?>
																	<option value="<?=$la->lac_id;?>-/-<?=$la->uni_id;?>-/-<?=$la->lac_sSta;?>"><?=$la->lac_sLibelle;?></option>
																	<?php } ?>
																	</optgroup>
																	<?php };?>
																</select>
																<input type="hidden" id="actefrais2" name="acte" class="" placeholder="Saisissez le montant ici">
															</div>
														</div>													
														<div class="col-sm-6 cacher" id="blocMedPrsct">
															<div class="form-group drop-custum">
																<label>Médecin Prescripteur</label>
																<select id="medPrst" style="padding-left:8px;width:100%" class="form-control show-tick medPrst">
																	<option value=""></option>
																	<?php foreach($listepms AS $la){ ?>
																	<option value="<?=$la->per_id;?>"><?=$la->per_sNom.' '.$la->per_sPrenom;?></option>
																	<?php } ?>
																</select>
																<input type="hidden" id="medPrst2" name="medPrst" class="" placeholder="">
															</div>
														</div>			
													</div>	
													<div class="row clearfix">
														<div class="col-sm-4 cacher" id="blocpatient">
															<div class="form-group">
																<div class="form-line">
																	<label>* Patient</label>
																	<select id="patient" style="padding-left:8px" name="" class="form-control show-tick ">
																	<!--<option value="">-- Sélectionner --</option>-->
																	</select>
																	<input type="hidden"  id="patient2"  name="patient" class="" placeholder="">
																</div>
															</div>
														</div>			
														<div class="col-sm-4 cacher" id="blocmontant">
															<div class="form-group">
																<div class="form-line">
																	<label>* Montant à payer (Obligatoire)</label>
																	<input id="montpay" min="0"  type="text"  class="form-control obligatoire montpay" placeholder="">
																	<input type="hidden"  id="montpay2"  name="montpay" class="">
																</div>
															</div>
														</div>													
														<div class="col-sm-4 cacher" id="blocpatientchange">
															<div class="form-group">
																<div class="form-line">
																	<label></label>
																	<br>
																	<a href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey patientconcernechange" id="">Changer le patient</a>
																</div>
															</div>
														</div>												
														<div class="col-sm-4 cacher" id="blocpersonne">
															<div class="form-group">
																<div class="form-line">
																	<label>* Personne/Enseigne (Obligatoire)</label>
																	<input name=""  id="personne"  type="text" class="form-control personne" placeholder="">
																	<input type="hidden"  id="personne2"  name="personne" class="" placeholder="">
																</div>
															</div>
														</div>															
														<div class="col-sm-4 cacher" id="bloccontact" style="display:none">
															<div class="form-group">
																<div class="form-line">
																	<label>Téléphone (Optionnel)</label>
																	<input id="tel"  type="text" class="form-control  tel" placeholder="">
																	<input type="hidden"  id="tel2"  name="tel" class="" placeholder="">
																</div>
															</div>
														</div>															
														<div class="col-sm-12 cacher" id="blocdesc">
															<div class="form-group">
																<div class="form-line">
																	<label>Libellé/Motif (Optionnel)</label>
																	<textarea name="" id="contenu" class="form-control contenu"></textarea>
																	<input type="hidden"  id="contenu2"  name="contenu" class="" placeholder="">
																</div>
															</div>
														</div>															
													</div>
													<?php if($user->per_iCnx===0){?>
													<div class="row clearfix cacher" id="blocbtn">
														<div class="col-sm-12">
															<button type="submit" class="btn btn-raised bg-blue-grey " id="actedivers" style="color:#fff"><i class="fa fa-check"></i> Encaisser</button>
															<span class="retour-actedivers"></span>
														</div>														
													</div>
													<?php }?>
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
            
            <div role="tabpanel" class="tab-pane page-calendar" id="mvt">
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive"> 
						<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr align="center">
									<td><b>N°Facture(Opération)</b></td>
									<td><b>Date & Heure</b></td>
									<td><b>Type Opération</b></td>
									<td><b>Montant (<small>FCFA</small>)</b></td>
									<td><b>Actions</b></td>
								</tr>
							</thead>
						   
							<tbody>
							<?php //var_dump($mouvements);?>
							<?php $somcumul=0; if(empty($mouvements)){echo '<tr><td colspan="5"><em>Aucun mouvement enregistré</em></td></tr>';}else{ foreach($mouvements AS $m){ ?>
								<tr align="center" <?php if($m->fac_sObjet=="8" || $m->fac_sObjet=="6"){echo' style="background:pink"';}?><?php if($m->fac_sObjet=='2'){echo' style="display:none"';}?>>
									<td>
										<b><?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){echo $m->fac_sNumero;}elseif($m->fac_sObjet=="6"){echo $m->fac_id.substr($m->fac_sNumero,-8);}elseif($m->fac_sObjet=="8"){echo $m->fac_id;}else{ echo substr($m->fac_sNumero,4);}; ?></b>
									</td>
									<td>
										<b><?php echo substr($this->md_config->affDateTimeFr($m->fac_dDatePaieTime),2); ?></b>
									</td>
									<td>
										<b><?php echo $this->md_config->objetFacture($m->fac_sObjet); ?><?php if($m->fac_sObjet=="6" || $m->fac_sObjet=="8"){echo ' ('.$m->fac_sNumero.')';};?></b> 
									</td>
									<td>
										<b><?php if($m->fac_sObjet=="6"){echo number_format($m->fac_iRemise,0,",",".");}else{ echo number_format($m->fac_iMontantPaye,0,",",".");}; ?></b>
									</td>
									<td class="text-center">
										<?php if($m->fac_sObjet=="5" || $m->fac_sObjet=="Paiement des actes médicaux"){?>
										
											<a href="<?php echo site_url("impression/recu_caisse/".$m->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a> &nbsp;&nbsp;
											<?php if($m->fac_sObjet!="5"){?>
											<a href="<?php echo site_url("facture/detail/".$m->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:20px"></i></a>
											<?php }?>
										<?php }?>
									</td>
								</tr>
							<?php $somcumul = $somcumul +$m->fac_iMontantPaye ;}}  ?>
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




<div class="modal fade" id="openmodalpatient" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document" style="margin-top:2px; max-width:70%">
        <div class="modal-content text-center">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="header">
								<h2>Liste des Patients (<?php echo count($listepatient);?>)</h2>
								<!--<input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />-->
							</div>
							<div class="body table-responsive" style="height:350px">
								<table  id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>N° Matricule</th>
											<th>Nom complet</th>
											<th>Tél. 1</th>
											<th>Tél. 2</th>
											<th style="width:60px">Choisir</th>
										</tr>
									</thead>
								   
									<tbody>
									<?php foreach($listepatient AS $l){ ?>
										<tr>
											<td><?php echo $l->pat_sMatricule; ?></td>
											<td><?php echo $l->pat_sNom.' '.$l->pat_sPrenom; ?> </td>
											<td><?php if(!is_null($l->pat_sTel)){echo $l->pat_sTel;}else{echo "<i>Non renseigné</i>";} ?></td>
											<td><?php if(!is_null($l->pat_sOtherPhone)){echo $l->pat_sOtherPhone;}else{echo "<i>Non renseigné</i>";} ?></td>
											<td><a style="margin:0px" rel="<?php echo $l->pat_id; ?>" href="javascript:();" class="btn btn-sm waves-effect bg-blue-grey patientconcerne" id=""><i class="fa fa-plus"></i></a></td>
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


<?php //if($user->per_iCnx==0){?>
<div class="modal fade" id="closecaisse" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header" >
				<h4 class="modal-title cacher" id="opentext2" style="color:red" >VOUS AVEZ CLÔTURE VOTRE CAISSE  <i class="fa fa-check"></i></h4>
                <h4 class="modal-title" id="closetext2" style="color:green">VOTRE CAISSE EST OUVERTE </h4>
            </div>
            <div class="modal-body text-center"> Veuillez saisir votre mot de passe pour clôturer votre caisse </div>

			<form id="form-closecaisse">
				<div class="row clearfix">
					<div class="col-sm-8">
						<div class="form-group">
							<div class="form-line">
								<input type="password" style="padding-left:5%" name="pwd" class="form-control obligatoire" placeholder="  Saisissez votre mot de passe *">
							</div><span class="retour"></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<button type="button" class="btn btn-success waves-effect closecaisse" style="color:#fff"> Clôturer</button>
						</div>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>

<?php //}?>
<?php if(is_null($user->per_iCnx)){?>
<div class="modal fade" id="opencaisse" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header" >
				<h4 class="modal-title cacher" id="opentext" style="color:green" >VOUS AVEZ OUVERT VOTRE CAISSE <i class="fa fa-check"></i></h4>
                <h4 class="modal-title" style="" id="closetext" style="color:red">VOTRE CAISSE EST FERMÉE ! </h4>
            </div>
            <div class="modal-body text-center"> Veuillez saisir votre mot de passe pour effectuer l'ouverture de votre caisse </div>

			<form id="form-opencaisse">
				<div class="row clearfix">
					<div class="col-sm-8">
						<div class="form-group">
							<div class="form-line">
								<input type="password" style="padding-left:5%" name="pwd" class="form-control obligatoire" placeholder="  Saisissez votre mot de passe *">
							</div><span class="retour"></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<button type="button" class="btn btn-success waves-effect opencaisse" style="color:#fff"> Ouvrir</button>
						</div>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>
<?php }?>
<!-- Large Size -->
<div class="modal fade" id="modalPaye" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="margin-top:5px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
			<form action="<?php echo site_url('caisse/ajoutFactureCaisse');?>" method="POST" id="form-caisse" style="margin-top:-30px">
				<div class="modal-body" style="max-height:600px; overflow:auto;">
				
					 <div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							
							<div class="body table-responsive">
								<div class="col-md-12" id="recepFact"></div></div>
						</div>
					</div>
				
				</div>
				<div class="modal-footer">
					<button id="btn-encaiss" onclick="this.style.display='none'" type="submit" class="btn btn-success waves-effect caisse" style="color:#fff"><i class="fa fa-check"></i> Encaisser</button>
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
				</div>
			</form>
        </div>
    </div>
</div>

<button style="display:none" type="button" class="btn bg-blue-grey waves-effect finish" id="finish">BLUE GREY</button>
<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-left:70px" id="defaultModalLabel">SERVICE DE CAISSE</h4>
            </div>
            <div class="modal-body text-center"> Facture(s) reglée(s) <br><i style="font-size:40px" class="fa fa-bank"></i></div>
            <div class="refresh"></div>
        </div>
    </div>
</div>

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
    <script>
	    $( document ).ready(function(){
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
	
	
	   // $( document ).ready(function() {
		// $('#search').keyup(function(){
			// search_table($(this).val());
		// });
		
		// function search_table(value){
			// $('#acte_divers_table tr').each(function(){
				// var found = 'false';
				// $(this).each(function(){
					// if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
					// {
						// found = 'true';
					// }
				// });
				// if(found == 'true'){
					// $(this).show();
				// }else{	
					// $(this).hide();
				// }
			// });
		// }
    // });
 
    // $( window ).on( "load", function() {
        // console.log( "window loaded" );
    // });
    </script>